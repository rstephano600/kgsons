<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sales Report</title>
    <style>
        body {
            font-family: 'DejaVu Sans', Arial, sans-serif;
            font-size: 12px;
            color: #333;
            margin: 20px;
        }
        .report-header {
            text-align: center;
            border-bottom: 2px solid #2c3e50;
            margin-bottom: 20px;
            padding-bottom: 10px;
        }
        .company-logo {
            max-height: 70px;
        }
        .report-title {
            font-weight: bold;
            text-transform: uppercase;
            margin: 8px 0;
            color: #2c3e50;
        }
        .date-generated {
            font-size: 11px;
            color: #6c757d;
            margin-top: 5px;
        }
        .summary-card {
            border-left: 4px solid #3498db;
            background: #f5f7fa;
            padding: 10px 15px;
            margin-bottom: 20px;
        }
        .summary-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .summary-list li {
            border-bottom: 1px dashed #ddd;
            padding: 4px 0;
        }
        .summary-list li:last-child {
            border-bottom: none;
        }
        .section-title {
            background: #164f88;
            color: #fff;
            padding: 6px 10px;
            margin: 15px 0 8px 0;
            font-size: 13px;
            font-weight: bold;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 18px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 6px 8px;
            font-size: 12px;
        }
        th {
            background: #454a50;
            color: #fff;
            font-weight: 600;
        }
        tr:nth-child(even) {
            background: #f9f9f9;
        }
        .text-success {
            color: #28a745;
            font-weight: bold;
        }
        .text-danger {
            color: #dc3545;
            font-weight: bold;
        }
        .report-footer {
            text-align: center;
            font-size: 11px;
            color: #6c757d;
            border-top: 1px solid #ddd;
            margin-top: 30px;
            padding-top: 8px;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="report-header">
        <img src="{{ public_path('images/kgsons.png') }}" alt="KGSONS Logo" class="company-logo">
        <h2 class="report-title">KGSONS LOYAL FOOD</h2>
        <h3 class="report-title">Sales Report</h3>
        <p><strong>Period:</strong> {{ $from }} to {{ $to }}</p>
        <div class="date-generated">Generated on: {{ now()->format('Y-m-d H:i') }}</div>
    </div>

    <!-- Summary -->
    <div class="summary-card">
        <h4>Summary</h4>
        <ul class="summary-list">
            <li>Total Food Sales: <strong>{{ number_format($totals['food'], 2) }}</strong></li>
            <li>Total Drink Sales: <strong>{{ number_format($totals['drinks'], 2) }}</strong></li>
            <li>Grand Total Sales: <strong>{{ number_format($totals['grand'], 2) }}</strong></li>
            <li>Total Expenses: <strong class="text-danger">{{ number_format($totals['expenses'], 2) }}</strong></li>
            <li>
                Profit / Loss:
                <strong class="{{ $totals['profit'] >= 0 ? 'text-success' : 'text-danger' }}">
                    {{ number_format($totals['profit'], 2) }}
                </strong>
            </li>
        </ul>
    </div>

    @if($showDetails)
        <!-- Sales Details -->
        <div class="section-title">Sales Details</div>
        @foreach($groupedSales as $date => $sales)
            <h5>{{ $date }} - Sales</h5>
            <table>
                <thead>
                    <tr>
                        <th>Type</th>
                        <th>Item</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Payment</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sales as $sale)
                        <tr>
                            <td>{{ isset($sale->food_id) ? 'Food' : 'Drink' }}</td>
                            <td>{{ $sale->food->name ?? $sale->drink->name }}</td>
                            <td>{{ $sale->quantity }}</td>
                            <td>{{ number_format($sale->price, 2) }}</td>
                            <td>{{ number_format($sale->total, 2) }}</td>
                            <td>{{ $sale->payment_method ?? 'Unpaid' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endforeach

        <!-- Expenses Details -->
        @if($expenseData->count())
            <div class="section-title">Expenses Details</div>
            @foreach($groupedExpenses as $date => $expenses)
                <h5>{{ $date }} - Expenses</h5>
                <table>
                    <thead>
                        <tr>
                            <th>Category</th>
                            <th>Item</th>
                            <th>Amount</th>
                            <th>Note</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($expenses as $expense)
                            <tr>
                                <td>{{ $expense->category->name ?? 'N/A' }}</td>
                                <td>{{ $expense->item_name }}</td>
                                <td>{{ number_format($expense->amount, 2) }}</td>
                                <td>{{ $expense->note }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endforeach
        @endif
    @endif

    <!-- Footer -->
    <div class="report-footer">
        Confidential Report – For Internal Use Only<br>
        KGSONS Company Limited | kgsons.co.tz | POS v1 © 2025 All rights reserved
    </div>
</body>
</html>
