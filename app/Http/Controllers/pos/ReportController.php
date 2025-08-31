<?php

namespace App\Http\Controllers\pos;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\FoodSale;
use App\Models\DrinkSale;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function index(Request $request)
    {
                // Filters
        $startDate = $request->input('start_date');
        $endDate   = $request->input('end_date');
        $payment   = $request->input('payment_method');

        // Totals
        $todayTotal = FoodSale::sum('total') + DrinkSale::sum('total');

        $dayTotal = FoodSale::whereDate('created_at', Carbon::today())->sum('total') +
                    DrinkSale::whereDate('created_at', Carbon::today())->sum('total');

        $weekTotal = FoodSale::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('total') +
                     DrinkSale::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('total');

        $monthTotal = FoodSale::whereMonth('created_at', Carbon::now()->month)->sum('total') +
                      DrinkSale::whereMonth('created_at', Carbon::now()->month)->sum('total');

        $yearTotal = FoodSale::whereYear('created_at', Carbon::now()->year)->sum('total') +
                     DrinkSale::whereYear('created_at', Carbon::now()->year)->sum('total');

        $totalSalesDrink = FoodSale::sum('total');
        $totalSalesFood = DrinkSale::sum('total');

        $salesTotal = $totalSalesDrink + $totalSalesFood;
        

        // Paginated tables
        $foodSales = FoodSale::with(['food', 'service'])
                    ->when($startDate && $endDate, function($query) use ($startDate, $endDate) {
                    $query->whereBetween('created_at', [$startDate, $endDate]);
                    })
                    ->when($payment, function($query) use ($payment) {
                    $query->where('payment_method', $payment);
                    })
                    ->orderBy('created_at', 'desc')
                    ->paginate(10, ['*'], 'food_page');

        $drinkSales = DrinkSale::with(['drink', 'service'])
                    ->when($startDate && $endDate, function($query) use ($startDate, $endDate) {
                    $query->whereBetween('created_at', [$startDate, $endDate]);
                    })
                    ->when($payment, function($query) use ($payment) {
                    $query->where('payment_method', $payment);
                    })
                    ->orderBy('created_at', 'desc')
                    ->paginate(10, ['*'], 'drink_page');

                            // Totals
        $totalFood  = $foodSales->sum('total');
        $totalDrink = $drinkSales->sum('total');
        $grandTotal = $totalFood + $totalDrink;

        return view('system.pos.reports.index', compact(
            'dayTotal', 'weekTotal', 'monthTotal', 'yearTotal', 'foodSales', 'drinkSales', 'totalFood', 'totalDrink', 'grandTotal', 'salesTotal'
        ));
    }

    public function salesReport(Request $request)
    {
        $from = $request->input('from_date');
        $to = $request->input('to_date');
        $showDetails = $request->input('show_details', true);

        $foodSales = collect();
        $drinkSales = collect();
        $groupedSales = collect();
        $totals = [
            'food' => 0,
            'drinks' => 0,
            'grand' => 0,
        ];

        if ($from && $to) {
            $foodSales = FoodSale::whereBetween(DB::raw('DATE(created_at)'), [$from, $to])->get();
            $drinkSales = DrinkSale::whereBetween(DB::raw('DATE(created_at)'), [$from, $to])->get();

            $groupedSales = $foodSales->merge($drinkSales)
                ->groupBy(function ($sale) {
                    return Carbon::parse($sale->created_at)->toDateString();
                });

            $totals['food'] = $foodSales->sum('total');
            $totals['drinks'] = $drinkSales->sum('total');
            $totals['grand'] = $totals['food'] + $totals['drinks'];
        }

        return view('system.pos.reports.sales', compact('from', 'to', 'foodSales', 'drinkSales', 'groupedSales', 'totals', 'showDetails'));
    }

    public function printSalesReport(Request $request)
    {
        $from = $request->input('from_date');
        $to = $request->input('to_date');
        $showDetails = $request->input('show_details', false);

        $foodSales = FoodSale::whereBetween(DB::raw('DATE(created_at)'), [$from, $to])->get();
        $drinkSales = DrinkSale::whereBetween(DB::raw('DATE(created_at)'), [$from, $to])->get();

        $groupedSales = $foodSales->merge($drinkSales)
            ->groupBy(function ($sale) {
                return Carbon::parse($sale->created_at)->toDateString();
            });

        $totals = [
            'food' => $foodSales->sum('total'),
            'drinks' => $drinkSales->sum('total'),
            'grand' => $foodSales->sum('total') + $drinkSales->sum('total'),
        ];

        return view('system.pos.reports.print_sales', compact('from', 'to', 'foodSales', 'drinkSales', 'groupedSales', 'totals', 'showDetails'));
    }
}

