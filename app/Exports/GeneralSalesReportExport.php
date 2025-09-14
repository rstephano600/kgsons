<?php

namespace App\Exports;

use App\Models\FoodSale;
use App\Models\DrinkSale;
use App\Models\Expense;
use Carbon\Carbon;
use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SalesReportExport implements FromCollection, WithHeadings
{
    protected $from, $to;

    public function __construct($from, $to)
    {
        $this->from = $from;
        $this->to   = $to;
    }

    public function collection()
    {
        $foodSales = FoodSale::whereBetween(DB::raw('DATE(created_at)'), [$this->from, $this->to])->get();
        $drinkSales = DrinkSale::whereBetween(DB::raw('DATE(created_at)'), [$this->from, $this->to])->get();
        $expenses   = Expense::whereBetween('expense_date', [$this->from, $this->to])->get();

        $report = collect();

        $report->push([
            'Total Food Sales'  => $foodSales->sum('total'),
            'Total Drink Sales' => $drinkSales->sum('total'),
            'Grand Total'       => $foodSales->sum('total') + $drinkSales->sum('total'),
            'Total Expenses'    => $expenses->sum('amount'),
            'Profit/Loss'       => ($foodSales->sum('total') + $drinkSales->sum('total')) - $expenses->sum('amount'),
        ]);

        return $report;
    }

    public function headings(): array
    {
        return [
            'Total Food Sales',
            'Total Drink Sales',
            'Grand Total',
            'Total Expenses',
            'Profit/Loss',
        ];
    }
}
