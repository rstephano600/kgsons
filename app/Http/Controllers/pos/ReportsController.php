<?php

namespace App\Http\Controllers\pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DrinkSale;
use App\Models\FoodSale;
use App\Models\Expense;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ReportsExport;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportsController extends Controller
{
    public function index(Request $request)
    {
        $period = $request->get('period', 'day');
        $startDate = $request->get('start_date');
        $endDate = $request->get('end_date');
        $search = $request->get('search');
        $paymentMethod = $request->get('payment_method');

        // Set default date range based on period
        if (!$startDate || !$endDate) {
            switch ($period) {
                case 'week':
                    $startDate = Carbon::now()->startOfWeek()->format('Y-m-d');
                    $endDate = Carbon::now()->endOfWeek()->format('Y-m-d');
                    break;
                case 'month':
                    $startDate = Carbon::now()->startOfMonth()->format('Y-m-d');
                    $endDate = Carbon::now()->endOfMonth()->format('Y-m-d');
                    break;
                case 'year':
                    $startDate = Carbon::now()->startOfYear()->format('Y-m-d');
                    $endDate = Carbon::now()->endOfYear()->format('Y-m-d');
                    break;
                default:
                    $startDate = Carbon::today()->format('Y-m-d');
                    $endDate = Carbon::today()->format('Y-m-d');
            }
        }

        // Get sales data
        $salesData = $this->getSalesData($startDate, $endDate, $search, $paymentMethod);
        
        // Get expense data
        $expenseData = $this->getExpenseData($startDate, $endDate, $search, $paymentMethod);

        // Calculate totals
        $totals = $this->calculateTotals($salesData, $expenseData);

        // Get chart data for visualization
        $chartData = $this->getChartData($startDate, $endDate, $period);

        return view('system.pos.all-reports.index', compact(
            'salesData', 
            'expenseData', 
            'totals', 
            'chartData',
            'period', 
            'startDate', 
            'endDate', 
            'search', 
            'paymentMethod'
        ));
    }

    private function getSalesData($startDate, $endDate, $search = null, $paymentMethod = null)
    {
        // Drink Sales
        $drinkSales = DrinkSale::with(['drink', 'service', 'createdBy'])
            ->whereBetween('created_at', [$startDate . ' 00:00:00', $endDate . ' 23:59:59'])
            ->when($search, function ($query) use ($search) {
                $query->whereHas('drink', function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%");
                });
            })
            ->when($paymentMethod, function ($query) use ($paymentMethod) {
                $query->where('payment_method', $paymentMethod);
            })
            ->orderBy('created_at', 'desc')
            ->get();

        // Food Sales
        $foodSales = FoodSale::with(['food', 'service', 'creator'])
            ->whereBetween('created_at', [$startDate . ' 00:00:00', $endDate . ' 23:59:59'])
            ->when($search, function ($query) use ($search) {
                $query->whereHas('food', function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%");
                });
            })
            ->when($paymentMethod, function ($query) use ($paymentMethod) {
                $query->where('payment_method', $paymentMethod);
            })
            ->orderBy('created_at', 'desc')
            ->get();

        return [
            'drinks' => $drinkSales,
            'foods' => $foodSales,
            'drink_total' => $drinkSales->sum('total'),
            'food_total' => $foodSales->sum('total'),
            'total_sales' => $drinkSales->sum('total') + $foodSales->sum('total')
        ];
    }

    private function getExpenseData($startDate, $endDate, $search = null, $paymentMethod = null)
    {
        $expenses = Expense::with(['category', 'creator'])
            ->whereBetween('expense_date', [$startDate, $endDate])
            ->when($search, function ($query) use ($search) {
                $query->where('item_name', 'like', "%{$search}%")
                      ->orWhereHas('category', function ($q) use ($search) {
                          $q->where('name', 'like', "%{$search}%");
                      });
            })
            ->when($paymentMethod, function ($query) use ($paymentMethod) {
                $query->where('payment_method', $paymentMethod);
            })
            ->orderBy('expense_date', 'desc')
            ->get();

        return [
            'expenses' => $expenses,
            'total_expenses' => $expenses->sum('amount')
        ];
    }

    private function calculateTotals($salesData, $expenseData)
    {
        $totalSales = $salesData['total_sales'];
        $totalExpenses = $expenseData['total_expenses'];
        $netProfit = $totalSales - $totalExpenses;

        return [
            'total_sales' => $totalSales,
            'total_expenses' => $totalExpenses,
            'net_profit' => $netProfit,
            'profit_margin' => $totalSales > 0 ? round(($netProfit / $totalSales) * 100, 2) : 0
        ];
    }

    private function getChartData($startDate, $endDate, $period)
    {
        $dates = [];
        $salesData = [];
        $expenseData = [];

        $start = Carbon::parse($startDate);
        $end = Carbon::parse($endDate);

        switch ($period) {
            case 'day':
                while ($start <= $end) {
                    $date = $start->format('Y-m-d');
                    $dates[] = $start->format('M d');
                    
                    $dailySales = DrinkSale::whereDate('created_at', $date)->sum('total') +
                                 FoodSale::whereDate('created_at', $date)->sum('total');
                    $dailyExpenses = Expense::whereDate('expense_date', $date)->sum('amount');
                    
                    $salesData[] = $dailySales;
                    $expenseData[] = $dailyExpenses;
                    
                    $start->addDay();
                }
                break;
            case 'week':
                while ($start <= $end) {
                    $weekStart = $start->startOfWeek()->format('Y-m-d');
                    $weekEnd = $start->endOfWeek()->format('Y-m-d');
                    $dates[] = 'Week ' . $start->weekOfYear;
                    
                    $weeklySales = DrinkSale::whereBetween('created_at', [$weekStart, $weekEnd])->sum('total') +
                                  FoodSale::whereBetween('created_at', [$weekStart, $weekEnd])->sum('total');
                    $weeklyExpenses = Expense::whereBetween('expense_date', [$weekStart, $weekEnd])->sum('amount');
                    
                    $salesData[] = $weeklySales;
                    $expenseData[] = $weeklyExpenses;
                    
                    $start->addWeek();
                }
                break;
            case 'month':
                while ($start <= $end) {
                    $monthStart = $start->startOfMonth()->format('Y-m-d');
                    $monthEnd = $start->endOfMonth()->format('Y-m-d');
                    $dates[] = $start->format('M Y');
                    
                    $monthlySales = DrinkSale::whereBetween('created_at', [$monthStart, $monthEnd])->sum('total') +
                                   FoodSale::whereBetween('created_at', [$monthStart, $monthEnd])->sum('total');
                    $monthlyExpenses = Expense::whereBetween('expense_date', [$monthStart, $monthEnd])->sum('amount');
                    
                    $salesData[] = $monthlySales;
                    $expenseData[] = $monthlyExpenses;
                    
                    $start->addMonth();
                }
                break;
        }

        return [
            'labels' => $dates,
            'sales' => $salesData,
            'expenses' => $expenseData
        ];
    }

    public function exportPdf(Request $request)
    {
        $period = $request->get('period', 'day');
        $startDate = $request->get('start_date', Carbon::today()->format('Y-m-d'));
        $endDate = $request->get('end_date', Carbon::today()->format('Y-m-d'));
        $search = $request->get('search');
        $paymentMethod = $request->get('payment_method');

        $salesData = $this->getSalesData($startDate, $endDate, $search, $paymentMethod);
        $expenseData = $this->getExpenseData($startDate, $endDate, $search, $paymentMethod);
        $totals = $this->calculateTotals($salesData, $expenseData);

        $pdf = Pdf::loadView('system.pos.all-reports.pdf', compact(
            'salesData', 
            'expenseData', 
            'totals', 
            'startDate', 
            'endDate',
            'period'
        ));

        return $pdf->download('sales-report-' . $startDate . '-to-' . $endDate . '.pdf');
    }

    public function exportExcel(Request $request)
    {
        $period = $request->get('period', 'day');
        $startDate = $request->get('start_date', Carbon::today()->format('Y-m-d'));
        $endDate = $request->get('end_date', Carbon::today()->format('Y-m-d'));
        $search = $request->get('search');
        $paymentMethod = $request->get('payment_method');

        return Excel::download(
            new ReportsExport($startDate, $endDate, $search, $paymentMethod), 
            'sales-report-' . $startDate . '-to-' . $endDate . '.xlsx'
        );
    }

    public function exportCsv(Request $request)
    {
        $period = $request->get('period', 'day');
        $startDate = $request->get('start_date', Carbon::today()->format('Y-m-d'));
        $endDate = $request->get('end_date', Carbon::today()->format('Y-m-d'));
        $search = $request->get('search');
        $paymentMethod = $request->get('payment_method');

        return Excel::download(
            new ReportsExport($startDate, $endDate, $search, $paymentMethod), 
            'sales-report-' . $startDate . '-to-' . $endDate . '.csv',
            \Maatwebsite\Excel\Excel::CSV
        );
    }
}