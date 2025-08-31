<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Sales & Expense Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #007bff;
            padding-bottom: 15px;
        }
        .header h1 {
            color: #007bff;
            margin: 0;
            font-size: 24px;
        }
        .header p {
            margin: 5px 0;
            color: #666;
        }
        .summary-cards {
            display: table;
            width: 100%;
            margin-bottom: 30px;
        }
        .summary-card {
            display: table-cell;
            width: 25%;
            text-align: center;
            padding: 15px;
            border: 1px solid #ddd;
            background-color: #f8f9fa;
        }
        .summary-card h3 {
            margin: 0 0 5px 0;
            font-size: 14px;
            color: #666;
            text-transform: uppercase;
        }
        .summary-card .value {
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }
        .summary-card.sales .value { color: #28a745; }
        .summary-card.expenses .value { color: #dc3545; }
        .summary-card.profit .value { color: #17a2b8; }
        .summary-card.margin .value { color: #ffc107; }
        
        .section {
            margin-bottom: 30px;
        }
        .section-title {
            font-size: 16px;
            font-weight: bold;
            color: #007bff;
            margin-bottom: 15px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f8f9fa;
            font-weight: bold;
            color: #495057;
        }
        .text-right { text-align: right; }
        .text-center { text-align: center; }
        .font-bold { font-weight: bold; }
        .text-success { color: #28a745; }
        .text-danger { color: #dc3545; }
        .text-info { color: #17a2b8; }
        .badge {
            padding: 3px 6px;
            border-radius: 3px;
            font-size: 10px;
            color: white;
        }
        .badge-success { background-color: #28a745; }
        .badge-info { background-color: #17a2b8; }
        .badge-warning { background-color: #ffc107; color: #000; }
        .badge-danger { background-color: #dc3545; }
        
        .footer {
            position: fixed;
            bottom: 20px;
            left: 0;
            right: 0;
            text-align: center;
            font-size: 10px;
            color: #666;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }
        
        .page-break {
            page-break-before: always;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Sales & Expense Report</h1>
        <p>Period: {{ ucfirst($period) }} Report</p>
        <p>From: {{ \Carbon\Carbon::parse($startDate)->format('M d, Y') }} 
           To: {{ \Carbon\Carbon::parse($endDate)->format('M d, Y') }}</p>
        <p>Generated on: {{ \Carbon\Carbon::now()->format('M d, Y H:i:s') }}</p>
    </div>

    <!-- Summary Cards -->
    <div class="summary-cards">
        <div class="summary-card sales">
            <h3>Total Sales</h3>
            <div class="value">${{ number_format($totals['total_sales'], 2) }}</div>
        </div>
        <div class="summary-card expenses">
            <h3>Total Expenses</h3>
            <div class="value">${{ number_format($totals['total_expenses'], 2) }}</div>
        </div>
        <div class="summary-card profit">
            <h3>Net Profit</h3>
            <div class="value {{ $totals['net_profit'] >= 0 ? 'text-success' : 'text-danger' }}">
                ${{ number_format($totals['net_profit'], 2) }}
            </div>
        </div>
        <div class="summary-card margin">
            <h3>Profit Margin</h3>
            <div class="value">{{ $totals['profit_margin'] }}%</div>
        </div>
    </div>

    <!-- Drink Sales -->
    @if($salesData['drinks']->count() > 0)
    <div class="section">
        <div class="section-title">Drink Sales ({{ $salesData['drinks']->count() }} items)</div>
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Drink</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Total</th>
                    <th>Payment</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($salesData['drinks'] as $sale)
                <tr>
                    <td>{{ $sale->created_at->format('M d, Y H:i') }}</td>
                    <td>{{ $sale->drink->name ?? 'N/A' }}</td>
                    <td class="text-center">{{ $sale->quantity }}</td>
                    <td class="text-right">${{ number_format($sale->price, 2) }}</td>
                    <td class="text-right font-bold">${{ number_format($sale->total, 2) }}</td>
                    <td class="text-center">
                        <span class="badge badge-{{ $sale->payment_method == 'cash' ? 'success' : ($sale->payment_method == 'card' ? 'info' : 'warning') }}">
                            {{ ucfirst($sale->payment_method) }}
                        </span>
                    </td>
                    <td class="text-center">
                        <span class="badge badge-{{ $sale->is_paid ? 'success' : 'warning' }}">
                            {{ $sale->is_paid ? 'Paid' : 'Pending' }}
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr style="background-color: #e9ecef;">
                    <th colspan="4">Drinks Subtotal:</th>
                    <th class="text-right">${{ number_format($salesData['drink_total'], 2) }}</th>
                    <th colspan="2"></th>
                </tr>
            </tfoot>
        </table>
    </div>
    @endif

    <!-- Food Sales -->
    @if($salesData['foods']->count() > 0)
    <div class="section {{ $salesData['drinks']->count() > 0 ? 'page-break' : '' }}">
        <div class="section-title">Food Sales ({{ $salesData['foods']->count() }} items)</div>
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Food</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Total</th>
                    <th>Payment</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($salesData['foods'] as $sale)
                <tr>
                    <td>{{ $sale->created_at->format('M d, Y H:i') }}</td>
                    <td>{{ $sale->food->name ?? 'N/A' }}</td>
                    <td class="text-center">{{ $sale->quantity }}</td>
                    <td class="text-right">${{ number_format($sale->price, 2) }}</td>
                    <td class="text-right font-bold">${{ number_format($sale->total, 2) }}</td>
                    <td class="text-center">
                        <span class="badge badge-{{ $sale->payment_method == 'cash' ? 'success' : ($sale->payment_method == 'card' ? 'info' : 'warning') }}">
                            {{ ucfirst($sale->payment_method) }}
                        </span>
                    </td>
                    <td class="text-center">
                        <span class="badge badge-{{ $sale->is_paid ? 'success' : 'warning' }}">
                            {{ $sale->is_paid ? 'Paid' : 'Pending' }}
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr style="background-color: #e9ecef;">
                    <th colspan="4">Foods Subtotal:</th>
                    <th class="text-right">${{ number_format($salesData['food_total'], 2) }}</th>
                    <th colspan="2"></th>
                </tr>
            </tfoot>
        </table>
    </div>
    @endif

    <!-- Expenses -->
    @if($expenseData['expenses']->count() > 0)
    <div class="section page-break">
        <div class="section-title">Expenses ({{ $expenseData['expenses']->count() }} items)</div>
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Category</th>
                    <th>Item</th>
                    <th>Amount</th>
                    <th>Payment Method</th>
                    <th>Note</th>
                </tr>
            </thead>
            <tbody>
                @foreach($expenseData['expenses'] as $expense)
                <tr>
                    <td>{{ $expense->expense_date->format('M d, Y') }}</td>
                    <td>{{ $expense->category->name ?? 'Uncategorized' }}</td>
                    <td>{{ $expense->item_name }}</td>
                    <td class="text-right font-bold text-danger">${{ number_format($expense->amount, 2) }}</td>
                    <td class="text-center">
                        <span class="badge badge-{{ $expense->payment_method == 'cash' ? 'success' : ($expense->payment_method == 'card' ? 'info' : 'warning') }}">
                            {{ ucfirst($expense->payment_method) }}
                        </span>
                    </td>
                    <td>{{ Str::limit($expense->note, 50) }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr style="background-color: #e9ecef;">
                    <th colspan="3">Total Expenses:</th>
                    <th class="text-right text-danger">${{ number_format($expenseData['total_expenses'], 2) }}</th>
                    <th colspan="2"></th>
                </tr>
            </tfoot>
        </table>
    </div>
    @endif

    <!-- Final Summary -->
    <div class="section" style="margin-top: 40px;">
        <div class="section-title">Financial Summary</div>
        <table style="width: 50%; margin: 0 auto;">
            <tr>
                <td class="font-bold">Total Sales Revenue:</td>
                <td class="text-right font-bold text-success">${{ number_format($totals['total_sales'], 2) }}</td>
            </tr>
            <tr>
                <td class="font-bold">Total Expenses:</td>
                <td class="text-right font-bold text-danger">${{ number_format($totals['total_expenses'], 2) }}</td>
            </tr>
            <tr style="border-top: 2px solid #333;">
                <td class="font-bold">Net Profit/Loss:</td>
                <td class="text-right font-bold {{ $totals['net_profit'] >= 0 ? 'text-success' : 'text-danger' }}">
                    ${{ number_format($totals['net_profit'], 2) }}
                </td>
            </tr>
            <tr>
                <td class="font-bold">Profit Margin:</td>
                <td class="text-right font-bold">{{ $totals['profit_margin'] }}%</td>
            </tr>
        </table>
    </div>

    <div class="footer">
        <p>Generated by Sales Management System | Page <span class="pagenum"></span></p>
    </div>
</body>
</html>