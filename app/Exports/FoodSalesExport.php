<?php

namespace App\Exports;

use App\Models\FoodSale;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class FoodSalesExport implements FromView
{
    protected $startDate;
    protected $endDate;
    protected $user;

    public function __construct($startDate, $endDate, $user)
    {
        $this->startDate = $startDate;
        $this->endDate   = $endDate;
        $this->user      = $user;
    }

    public function view(): View
    {
        $query = FoodSale::query()->with('food');

        if ($this->startDate && $this->endDate) {
            $query->whereBetween('paid_at', [$this->startDate, $this->endDate]);
        }

        $sales = $query->get();

        $totalSales = $sales->sum('total');
        $paidSales  = $sales->where('is_paid', true)->sum('total');
        $unpaidSales = $sales->where('is_paid', false)->sum('total');

        return view('system.pos.sales.food_sales_pdf', [
            'sales'       => $sales,
            'startDate'   => $this->startDate,
            'endDate'     => $this->endDate,
            'totalSales'  => $totalSales,
            'paidSales'   => $paidSales,
            'unpaidSales' => $unpaidSales,
            'user'        => $this->user,
        ]);
    }
}
