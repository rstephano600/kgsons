<?php

namespace App\Http\Controllers;

use App\Models\DrinkSale;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DrinkSalesExport;

class DrinkSaleReportController extends Controller
{
    public function index(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate   = $request->input('end_date');

        $query = DrinkSale::query()->where('is_paid', true);

        if ($startDate && $endDate) {
            $query->whereBetween('paid_at', [$startDate, $endDate]);
        }

        $sales = $query->get();

        // Summary
        $todaySales = DrinkSale::whereDate('paid_at', Carbon::today())->sum('total');
        $weekSales  = DrinkSale::whereBetween('paid_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('total');
        $monthSales = DrinkSale::whereMonth('paid_at', Carbon::now()->month)->sum('total');
        $yearSales  = DrinkSale::whereYear('paid_at', Carbon::now()->year)->sum('total');
        $totalSales = DrinkSale::sum('total');

        return view('system.pos.sales.drink_sales_dashboard', compact(
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
        $format    = $request->input('format', 'xlsx');
        $fileName  = 'drink_sales_' . now()->format('Ymd_His');
        $user      = auth()->user();

        if ($format === 'pdf') {
            return Excel::download(new DrinkSalesExport($startDate, $endDate, $user), $fileName . '.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
        } elseif ($format === 'csv') {
            return Excel::download(new DrinkSalesExport($startDate, $endDate, $user), $fileName . '.csv', \Maatwebsite\Excel\Excel::CSV);
        }

        return Excel::download(new DrinkSalesExport($startDate, $endDate, $user), $fileName . '.xlsx');
    }

    
}
