<?php

namespace App\Http\Controllers\pos;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\FoodSale;
use App\Models\DrinkSale;
use App\Models\Expense;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PDF; // for PDF export
use Maatwebsite\Excel\Facades\Excel; // for Excel export
use App\Exports\SalesReportExport;

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

    // ==========================
    // Expense Calculations
    // ==========================

    // Filter expenses by date range if provided
    $expenses = Expense::when($startDate && $endDate, function($query) use ($startDate, $endDate) {
                        $query->whereBetween('expense_date', [$startDate, $endDate]);
                    })
                    ->orderBy('expense_date', 'desc')
                    ->paginate(10, ['*'], 'expense_page');

    $totalExpenses = Expense::when($startDate && $endDate, function($query) use ($startDate, $endDate) {
                            $query->whereBetween('expense_date', [$startDate, $endDate]);
                        })->sum('amount');

    // Profit or Loss
    $profitOrLoss = $grandTotal - $totalExpenses;

    return view('system.pos.reports.index', compact(
        'dayTotal',
        'weekTotal',
        'monthTotal',
        'yearTotal',
        'foodSales',
        'drinkSales',
        'totalFood',
        'totalDrink',
        'grandTotal',
        'salesTotal',
        'expenses',
        'totalExpenses',
        'profitOrLoss'
    ));
}


public function exportPdf(Request $request)
    {
        // Same logic as index
        $startDate = $request->input('start_date');
        $endDate   = $request->input('end_date');
        $payment   = $request->input('payment_method');

        $foodSales = FoodSale::with(['food', 'service'])
            ->when($startDate && $endDate, fn($q) => $q->whereBetween('created_at', [$startDate, $endDate]))
            ->when($payment, fn($q) => $q->where('payment_method', $payment))
            ->get();

        $drinkSales = DrinkSale::with(['drink', 'service'])
            ->when($startDate && $endDate, fn($q) => $q->whereBetween('created_at', [$startDate, $endDate]))
            ->when($payment, fn($q) => $q->where('payment_method', $payment))
            ->get();

        $expenses = Expense::when($startDate && $endDate, fn($q) => $q->whereBetween('expense_date', [$startDate, $endDate]))
            ->get();

        $totalFood = $foodSales->sum('total');
        $totalDrink = $drinkSales->sum('total');
        $grandTotal = $totalFood + $totalDrink;
        $totalExpenses = $expenses->sum('amount');
        $profitOrLoss = $grandTotal - $totalExpenses;

        $pdf = PDF::loadView('system.pos.reports.pdf', compact(
            'foodSales',
            'drinkSales',
            'expenses',
            'totalFood',
            'totalDrink',
            'grandTotal',
            'totalExpenses',
            'profitOrLoss'
        ))->setPaper('A4', 'portrait');

        return $pdf->download('Sales_Report.pdf');
    }


public function salesReport(Request $request)
{
    $from = $request->input('from_date');
    $to = $request->input('to_date');
    $showDetails = $request->input('show_details', true);

    $foodSales = collect();
    $drinkSales = collect();
    $expenseData = collect();
    $groupedSales = collect();

    $totals = [
        'food' => 0,
        'drinks' => 0,
        'grand' => 0,
        'expenses' => 0,
        'profit' => 0,
    ];

    if ($from && $to) {
        // Sales
        $foodSales = FoodSale::whereBetween(DB::raw('DATE(created_at)'), [$from, $to])->get();
        $drinkSales = DrinkSale::whereBetween(DB::raw('DATE(created_at)'), [$from, $to])->get();

        $groupedSales = $foodSales->merge($drinkSales)
            ->groupBy(function ($sale) {
                return Carbon::parse($sale->created_at)->toDateString();
            });

        $totals['food'] = $foodSales->sum('total');
        $totals['drinks'] = $drinkSales->sum('total');
        $totals['grand'] = $totals['food'] + $totals['drinks'];

        // Expenses
        $expenseData = Expense::whereBetween('expense_date', [$from, $to])->get();
        $totals['expenses'] = $expenseData->sum('amount');

        // Profit/Loss
        $totals['profit'] = $totals['grand'] - $totals['expenses'];
    }

    return view('system.pos.reports.sales', compact(
        'from',
        'to',
        'foodSales',
        'drinkSales',
        'expenseData',
        'groupedSales',
        'totals',
        'showDetails'
    ));
}


public function printSalesReport(Request $request)
{
    $from = $request->input('from_date');
    $to = $request->input('to_date');
    $showDetails = $request->input('show_details', false);

    // Sales
    $foodSales = FoodSale::whereBetween(DB::raw('DATE(created_at)'), [$from, $to])->get();
    $drinkSales = DrinkSale::whereBetween(DB::raw('DATE(created_at)'), [$from, $to])->get();

    $groupedSales = $foodSales->merge($drinkSales)
        ->groupBy(function ($sale) {
            return Carbon::parse($sale->created_at)->toDateString();
        });

    // Expenses
    $expenseData = Expense::whereBetween('expense_date', [$from, $to])->get();
    $groupedExpenses = $expenseData->groupBy(function ($exp) {
        return Carbon::parse($exp->expense_date)->toDateString();
    });

    // Totals
    $totals = [
        'food'     => $foodSales->sum('total'),
        'drinks'   => $drinkSales->sum('total'),
        'grand'    => $foodSales->sum('total') + $drinkSales->sum('total'),
        'expenses' => $expenseData->sum('amount'),
    ];
    $totals['profit'] = $totals['grand'] - $totals['expenses'];

    return view('system.pos.reports.print_sales', compact(
        'from',
        'to',
        'foodSales',
        'drinkSales',
        'expenseData',
        'groupedSales',
        'groupedExpenses',
        'totals',
        'showDetails'
    ));
}


 // PDF Export
    public function exportPdf2(Request $request)
    {
        $from = $request->input('from_date');
        $to   = $request->input('to_date');
        $showDetails = $request->input('show_details', true);

        // Sales
        $foodSales = FoodSale::whereBetween(DB::raw('DATE(created_at)'), [$from, $to])->get();
        $drinkSales = DrinkSale::whereBetween(DB::raw('DATE(created_at)'), [$from, $to])->get();
        $groupedSales = $foodSales->merge($drinkSales)
            ->groupBy(fn($sale) => Carbon::parse($sale->created_at)->toDateString());

        // Expenses
        $expenseData = Expense::whereBetween('expense_date', [$from, $to])->get();
        $groupedExpenses = $expenseData->groupBy(fn($exp) => Carbon::parse($exp->expense_date)->toDateString());

        // Totals
        $totals = [
            'food'     => $foodSales->sum('total'),
            'drinks'   => $drinkSales->sum('total'),
            'grand'    => $foodSales->sum('total') + $drinkSales->sum('total'),
            'expenses' => $expenseData->sum('amount'),
        ];
        $totals['profit'] = $totals['grand'] - $totals['expenses'];

        // Load PDF view
        $pdf = PDF::loadView('system.pos.reports.export_pdf', compact(
            'from','to','foodSales','drinkSales','expenseData',
            'groupedSales','groupedExpenses','totals','showDetails'
        ));

        return $pdf->download("sales_report_{$from}_to_{$to}.pdf");
    }

    // Excel Export
    public function exportExcel(Request $request)
    {
        $from = $request->input('from_date');
        $to   = $request->input('to_date');

        return Excel::download(new SalesReportExport($from, $to), "sales_report_{$from}_to_{$to}.xlsx");
    }

}

