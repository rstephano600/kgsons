<?php


namespace App\Exports;

use App\Models\FoodSale;
use App\Models\DrinkSale;
use App\Models\Expense;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class SalesReportExport implements FromView
{
    protected $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function view(): View
    {
        $period = $this->request->input('period', 'day');
        $from = $this->request->input('from');
        $to = $this->request->input('to');

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
            default:
                $startDate = Carbon::today();
                $endDate = Carbon::today()->endOfDay();
        }

        $foodSales = FoodSale::whereBetween('created_at', [$startDate, $endDate])->sum('total');
        $drinkSales = DrinkSale::whereBetween('created_at', [$startDate, $endDate])->sum('total');
        $expenses = Expense::whereBetween('expense_date', [$startDate, $endDate])->sum('amount');
        $profit = ($foodSales + $drinkSales) - $expenses;

        return view('system.pos.all-reports.export', compact('period', 'startDate', 'endDate', 'foodSales', 'drinkSales', 'expenses', 'profit'));
    }
}
