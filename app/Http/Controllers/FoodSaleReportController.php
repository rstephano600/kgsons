<?php

namespace App\Http\Controllers;

use App\Models\FoodSale;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\FoodSalesExport;

class FoodSaleReportController extends Controller
{
    public function index(Request $request)
    {
        // Filters
        $startDate = $request->input('start_date');
        $endDate   = $request->input('end_date');

        $query = FoodSale::query()->where('is_paid', true);

        if ($startDate && $endDate) {
            $query->whereBetween('paid_at', [$startDate, $endDate]);
        }

        $sales = $query->get();

        // Summary Calculations
        $todaySales = FoodSale::whereDate('paid_at', Carbon::today())->sum('total');
        $weekSales  = FoodSale::whereBetween('paid_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('total');
        $monthSales = FoodSale::whereMonth('paid_at', Carbon::now()->month)->sum('total');
        $yearSales  = FoodSale::whereYear('paid_at', Carbon::now()->year)->sum('total');
        $totalSales = FoodSale::sum('total');

        return view('system.pos.sales.food_sales_dashboard', compact(
            'sales',
            'todaySales',
            'weekSales',
            'monthSales',
            'yearSales',
            'totalSales',
            'startDate',
            'endDate'
        ));
    }


public function export(Request $request)
{
    $startDate = $request->input('start_date');
    $endDate   = $request->input('end_date');
    $format    = $request->input('format', 'xlsx'); // default Excel

    $fileName = 'food_sales_' . now()->format('Ymd_His');
    $user     = auth()->user();

    if ($format === 'pdf') {
        return \Excel::download(new FoodSalesExport($startDate, $endDate, $user), $fileName . '.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
    } elseif ($format === 'csv') {
        return \Excel::download(new FoodSalesExport($startDate, $endDate, $user), $fileName . '.csv', \Maatwebsite\Excel\Excel::CSV);
    }

    return \Excel::download(new FoodSalesExport($startDate, $endDate, $user), $fileName . '.xlsx');
}

}
