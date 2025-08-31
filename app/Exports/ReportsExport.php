<?php

namespace App\Exports;

use App\Models\DrinkSale;
use App\Models\FoodSale;
use App\Models\Expense;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Font;
use Carbon\Carbon;

class ReportsExport implements WithMultipleSheets
{
    protected $startDate;
    protected $endDate;
    protected $search;
    protected $paymentMethod;

    public function __construct($startDate, $endDate, $search = null, $paymentMethod = null)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->search = $search;
        $this->paymentMethod = $paymentMethod;
    }

    public function sheets(): array
    {
        return [
            'Summary' => new SummarySheet($this->startDate, $this->endDate, $this->search, $this->paymentMethod),
            'Drink Sales' => new DrinkSalesSheet($this->startDate, $this->endDate, $this->search, $this->paymentMethod),
            'Food Sales' => new FoodSalesSheet($this->startDate, $this->endDate, $this->search, $this->paymentMethod),
            'Expenses' => new ExpensesSheet($this->startDate, $this->endDate, $this->search, $this->paymentMethod),
        ];
    }
}

class SummarySheet implements FromCollection, WithHeadings, WithMapping, WithTitle, WithStyles
{
    protected $startDate;
    protected $endDate;
    protected $search;
    protected $paymentMethod;

    public function __construct($startDate, $endDate, $search = null, $paymentMethod = null)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->search = $search;
        $this->paymentMethod = $paymentMethod;
    }

    public function collection()
    {
        // Get totals
        $drinkTotal = DrinkSale::whereBetween('created_at', [$this->startDate . ' 00:00:00', $this->endDate . ' 23:59:59'])
            ->when($this->paymentMethod, function ($query) {
                $query->where('payment_method', $this->paymentMethod);
            })
            ->sum('total');

        $foodTotal = FoodSale::whereBetween('created_at', [$this->startDate . ' 00:00:00', $this->endDate . ' 23:59:59'])
            ->when($this->paymentMethod, function ($query) {
                $query->where('payment_method', $this->paymentMethod);
            })
            ->sum('total');

        $expenseTotal = Expense::whereBetween('expense_date', [$this->startDate, $this->endDate])
            ->when($this->paymentMethod, function ($query) {
                $query->where('payment_method', $this->paymentMethod);
            })
            ->sum('amount');

        $totalSales = $drinkTotal + $foodTotal;
        $netProfit = $totalSales - $expenseTotal;
        $profitMargin = $totalSales > 0 ? round(($netProfit / $totalSales) * 100, 2) : 0;

        return collect([
            (object) [
                'metric' => 'Report Period',
                'value' => Carbon::parse($this->startDate)->format('M d, Y') . ' to ' . Carbon::parse($this->endDate)->format('M d, Y')
            ],
            (object) ['metric' => 'Generated On', 'value' => Carbon::now()->format('M d, Y H:i:s')],
            (object) ['metric' => '', 'value' => ''],
            (object) ['metric' => 'Drink Sales', 'value' => '$' . number_format($drinkTotal, 2)],
            (object) ['metric' => 'Food Sales', 'value' => '$' . number_format($foodTotal, 2)],
            (object) ['metric' => 'Total Sales', 'value' => '$' . number_format($totalSales, 2)],
            (object) ['metric' => 'Total Expenses', 'value' => '$' . number_format($expenseTotal, 2)],
            (object) ['metric' => 'Net Profit/Loss', 'value' => '$' . number_format($netProfit, 2)],
            (object) ['metric' => 'Profit Margin', 'value' => $profitMargin . '%'],
        ]);
    }

    public function headings(): array
    {
        return ['Metric', 'Value'];
    }

    public function map($row): array
    {
        return [
            $row->metric,
            $row->value,
        ];
    }

    public function title(): string
    {
        return 'Summary';
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true], 'fill' => ['fillType' => Fill::FILL_SOLID, 'color' => ['rgb' => 'E2E8F0']]],
            'A:B' => ['alignment' => ['wrapText' => true]],
        ];
    }
}

class DrinkSalesSheet implements FromCollection, WithHeadings, WithMapping, WithTitle, WithStyles
{
    protected $startDate;
    protected $endDate;
    protected $search;
    protected $paymentMethod;

    public function __construct($startDate, $endDate, $search = null, $paymentMethod = null)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->search = $search;
        $this->paymentMethod = $paymentMethod;
    }

    public function collection()
    {
        return DrinkSale::with(['drink', 'service', 'createdBy'])
            ->whereBetween('created_at', [$this->startDate . ' 00:00:00', $this->endDate . ' 23:59:59'])
            ->when($this->search, function ($query) {
                $query->whereHas('drink', function ($q) {
                    $q->where('name', 'like', "%{$this->search}%");
                });
            })
            ->when($this->paymentMethod, function ($query) {
                $query->where('payment_method', $this->paymentMethod);
            })
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function headings(): array
    {
        return [
            'Date',
            'Time',
            'Drink Name',
            'Quantity',
            'Unit Price',
            'Total Amount',
            'Payment Method',
            'Payment Status',
            'Service',
            'Created By'
        ];
    }

    public function map($sale): array
    {
        return [
            $sale->created_at->format('Y-m-d'),
            $sale->created_at->format('H:i:s'),
            $sale->drink->name ?? 'N/A',
            $sale->quantity,
            $sale->price,
            $sale->total,
            ucfirst($sale->payment_method),
            $sale->is_paid ? 'Paid' : 'Pending',
            $sale->service->name ?? 'N/A',
            $sale->createdBy->name ?? 'N/A'
        ];
    }

    public function title(): string
    {
        return 'Drink Sales';
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true], 'fill' => ['fillType' => Fill::FILL_SOLID, 'color' => ['rgb' => 'E2E8F0']]],
            'A:J' => ['alignment' => ['wrapText' => true]],
        ];
    }
}

class FoodSalesSheet implements FromCollection, WithHeadings, WithMapping, WithTitle, WithStyles
{
    protected $startDate;
    protected $endDate;
    protected $search;
    protected $paymentMethod;

    public function __construct($startDate, $endDate, $search = null, $paymentMethod = null)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->search = $search;
        $this->paymentMethod = $paymentMethod;
    }

    public function collection()
    {
        return FoodSale::with(['food', 'service', 'creator'])
            ->whereBetween('created_at', [$this->startDate . ' 00:00:00', $this->endDate . ' 23:59:59'])
            ->when($this->search, function ($query) {
                $query->whereHas('food', function ($q) {
                    $q->where('name', 'like', "%{$this->search}%");
                });
            })
            ->when($this->paymentMethod, function ($query) {
                $query->where('payment_method', $this->paymentMethod);
            })
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function headings(): array
    {
        return [
            'Date',
            'Time',
            'Food Name',
            'Quantity',
            'Unit Price',
            'Total Amount',
            'Payment Method',
            'Payment Status',
            'Service',
            'Created By'
        ];
    }

    public function map($sale): array
    {
        return [
            $sale->created_at->format('Y-m-d'),
            $sale->created_at->format('H:i:s'),
            $sale->food->name ?? 'N/A',
            $sale->quantity,
            $sale->price,
            $sale->total,
            ucfirst($sale->payment_method),
            $sale->is_paid ? 'Paid' : 'Pending',
            $sale->service->name ?? 'N/A',
            $sale->creator->name ?? 'N/A'
        ];
    }

    public function title(): string
    {
        return 'Food Sales';
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true], 'fill' => ['fillType' => Fill::FILL_SOLID, 'color' => ['rgb' => 'E2E8F0']]],
            'A:J' => ['alignment' => ['wrapText' => true]],
        ];
    }
}

class ExpensesSheet implements FromCollection, WithHeadings, WithMapping, WithTitle, WithStyles
{
    protected $startDate;
    protected $endDate;
    protected $search;
    protected $paymentMethod;

    public function __construct($startDate, $endDate, $search = null, $paymentMethod = null)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->search = $search;
        $this->paymentMethod = $paymentMethod;
    }

    public function collection()
    {
        return Expense::with(['category', 'creator'])
            ->whereBetween('expense_date', [$this->startDate, $this->endDate])
            ->when($this->search, function ($query) {
                $query->where('item_name', 'like', "%{$this->search}%")
                      ->orWhereHas('category', function ($q) {
                          $q->where('name', 'like', "%{$this->search}%");
                      });
            })
            ->when($this->paymentMethod, function ($query) {
                $query->where('payment_method', $this->paymentMethod);
            })
            ->orderBy('expense_date', 'desc')
            ->get();
    }

    public function headings(): array
    {
        return [
            'Date',
            'Category',
            'Item Name',
            'Amount',
            'Payment Method',
            'Note',
            'Created By'
        ];
    }

    public function map($expense): array
    {
        return [
            $expense->expense_date->format('Y-m-d'),
            $expense->category->name ?? 'Uncategorized',
            $expense->item_name,
            $expense->amount,
            ucfirst($expense->payment_method),
            $expense->note,
            $expense->creator->name ?? 'N/A'
        ];
    }

    public function title(): string
    {
        return 'Expenses';
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true], 'fill' => ['fillType' => Fill::FILL_SOLID, 'color' => ['rgb' => 'E2E8F0']]],
            'A:G' => ['alignment' => ['wrapText' => true]],
        ];
    }
}