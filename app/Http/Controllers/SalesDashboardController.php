<?php

namespace App\Http\Controllers;

use App\Models\DrinkSale;
use App\Models\FoodSale;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalesDashboardController extends Controller
{
    public function index(Request $request)
    {
        $period = $request->get('period', 'day'); // default to day
        
        $data = [
            'period' => $period,
            'drink_sales' => $this->getDrinkSalesData($period),
            'food_sales' => $this->getFoodSalesData($period),
            'combined_stats' => $this->getCombinedStats($period)
        ];

        if ($request->ajax()) {
            return response()->json($data);
        }

        return view('system.pos.sale_dashboard.index', $data);
    }

    private function getDrinkSalesData($period)
    {
        $query = DrinkSale::query();
        
        switch ($period) {
            case 'day':
                $query->whereDate('created_at', Carbon::today());
                break;
            case 'week':
                $query->whereBetween('created_at', [
                    Carbon::now()->startOfWeek(),
                    Carbon::now()->endOfWeek()
                ]);
                break;
            case 'month':
                $query->whereMonth('created_at', Carbon::now()->month)
                      ->whereYear('created_at', Carbon::now()->year);
                break;
            case 'year':
                $query->whereYear('created_at', Carbon::now()->year);
                break;
        }

        return [
            'total_sales' => $query->sum('total'),
            'total_quantity' => $query->sum('quantity'),
            'total_orders' => $query->count(),
            'paid_orders' => $query->where('is_paid', true)->count(),
            'unpaid_orders' => $query->where('is_paid', false)->count(),
            'payment_methods' => $query->select('payment_method', DB::raw('COUNT(*) as count'), DB::raw('SUM(total) as total'))
                                     ->groupBy('payment_method')
                                     ->get(),
            'top_drinks' => $query->join('drinks', 'drink_sales.drink_id', '=', 'drinks.id')
                                 ->select('drinks.name', DB::raw('SUM(drink_sales.quantity) as total_quantity'), DB::raw('SUM(drink_sales.total) as total_sales'))
                                 ->groupBy('drinks.id', 'drinks.name')
                                 ->orderBy('total_sales', 'desc')
                                 ->limit(5)
                                 ->get()
        ];
    }

    private function getFoodSalesData($period)
    {
        $query = FoodSale::query();
        
        switch ($period) {
            case 'day':
                $query->whereDate('created_at', Carbon::today());
                break;
            case 'week':
                $query->whereBetween('created_at', [
                    Carbon::now()->startOfWeek(),
                    Carbon::now()->endOfWeek()
                ]);
                break;
            case 'month':
                $query->whereMonth('created_at', Carbon::now()->month)
                      ->whereYear('created_at', Carbon::now()->year);
                break;
            case 'year':
                $query->whereYear('created_at', Carbon::now()->year);
                break;
        }

        return [
            'total_sales' => $query->sum('total'),
            'total_quantity' => $query->sum('quantity'),
            'total_orders' => $query->count(),
            'paid_orders' => $query->where('is_paid', true)->count(),
            'unpaid_orders' => $query->where('is_paid', false)->count(),
            'payment_methods' => $query->select('payment_method', DB::raw('COUNT(*) as count'), DB::raw('SUM(total) as total'))
                                     ->groupBy('payment_method')
                                     ->get(),
            'top_foods' => $query->join('foods', 'food_sales.food_id', '=', 'foods.id')
                                ->select('foods.name', DB::raw('SUM(food_sales.quantity) as total_quantity'), DB::raw('SUM(food_sales.total) as total_sales'))
                                ->groupBy('foods.id', 'foods.name')
                                ->orderBy('total_sales', 'desc')
                                ->limit(5)
                                ->get()
        ];
    }

    private function getCombinedStats($period)
    {
        $drinkStats = $this->getDrinkSalesData($period);
        $foodStats = $this->getFoodSalesData($period);

        return [
            'total_revenue' => $drinkStats['total_sales'] + $foodStats['total_sales'],
            'total_items_sold' => $drinkStats['total_quantity'] + $foodStats['total_quantity'],
            'total_orders' => $drinkStats['total_orders'] + $foodStats['total_orders'],
            'paid_orders' => $drinkStats['paid_orders'] + $foodStats['paid_orders'],
            'unpaid_orders' => $drinkStats['unpaid_orders'] + $foodStats['unpaid_orders']
        ];
    }

    public function exportReport(Request $request)
    {
        $period = $request->get('period', 'day');
        $format = $request->get('format', 'pdf'); // pdf, excel, csv
        
        $data = [
            'period' => $period,
            'drink_sales' => $this->getDrinkSalesData($period),
            'food_sales' => $this->getFoodSalesData($period),
            'combined_stats' => $this->getCombinedStats($period),
            'generated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ];

        // Here you would implement the actual export logic
        // For now, returning JSON for demonstration
        return response()->json([
            'message' => "Report exported as {$format} for period: {$period}",
            'data' => $data
        ]);
    }
}