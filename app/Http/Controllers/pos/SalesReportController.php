<?php

namespace App\Http\Controllers\pos;

use App\Http\Controllers\Controller;

use App\Models\FoodSale;
use App\Models\DrinkSale;
use App\Models\Expense;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SalesReportExport;

class SalesReportController extends Controller
{
    public function index(Request $request)
    {
        // Filters
        $period = $request->input('period', 'day'); // day, week, month, year, custom
        $from = $request->input('from');
        $to = $request->input('to');

        // Default date ranges
        $startDate = Carbon::today();
        $endDate = Carbon::now();

        switch ($period) {
            case 'week':
                $startDate = Carbon::now()->startOfWeek();
                $endDate = Carbon::now()->endOfWeek();
                break;
            case 'month':
                $startDate = Carbon::now()->startOfMonth();
                $endDate = Carbon::now()->endOfMonth();
                break;
            case 'year':
                $startDate = Carbon::now()->startOfYear();
                $endDate = Carbon::now()->endOfYear();
                break;
            case 'custom':
                $startDate = Carbon::parse($from);
                $endDate = Carbon::parse($to);
                break;
            default: // day
                $startDate = Carbon::today();
                $endDate = Carbon::today()->endOfDay();
        }

        // Query food sales
        $foodSales = FoodSale::whereBetween('created_at', [$startDate, $endDate])->sum('total');
        $drinkSales = DrinkSale::whereBetween('created_at', [$startDate, $endDate])->sum('total');
        $expenses = Expense::whereBetween('expense_date', [$startDate, $endDate])->sum('amount');

        $profit = ($foodSales + $drinkSales) - $expenses;

        return view('system.pos.all-reports.report', compact('period', 'startDate', 'endDate', 'foodSales', 'drinkSales', 'expenses', 'profit'));
    }

    public function export(Request $request)
    {
        return Excel::download(new SalesReportExport($request), 'sales_report.xlsx');
    }
}
