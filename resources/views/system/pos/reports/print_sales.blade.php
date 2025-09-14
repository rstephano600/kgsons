<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @media print {
            body { 
                font-size: 12px; 
                margin: 0;
                padding: 15px;
                color: #333;
                background: #fff;
            }
            .container {
                width: 100%;
                max-width: 100%;
                padding: 0;
            }
            .no-print {
                display: none !important;
            }
            .page-break {
                page-break-before: always;
            }
            .table {
                page-break-inside: avoid;
            }
        }
        
        @media screen {
            body {
                background-color: #f8f9fa;
                padding: 20px;
            }
            .print-container {
                max-width: 8.5in;
                margin: 0 auto;
                background: white;
                box-shadow: 0 0 10px rgba(0,0,0,0.1);
                padding: 25px;
            }
        }
        
        body {
            font-family: 'Helvetica Neue', Arial, sans-serif;
            line-height: 1.5;
            color: #333;
        }
        
        .report-header {
            border-bottom: 2px solid #2c3e50;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }
        
        .logo-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 15px;
            height: 80px;
        }
        
        .company-logo {
            max-height: 90px;
            max-width: 100%;
        }
        
        .report-title {
            color: #2c3e50;
            font-weight: 700;
            text-transform: uppercase;
            margin: 10px 0;
        }
        
        .summary-card {
            border-left: 4px solid #3498db;
            background-color: #f8f9fa;
            padding: 15px;
            margin-bottom: 20px;
        }
        
        .summary-list {
            list-style: none;
            padding: 0;
        }
        
        .summary-list li {
            padding: 5px 0;
            border-bottom: 1px dashed #ddd;
        }
        
        .summary-list li:last-child {
            border-bottom: none;
        }
        
        .section-title {
            background-color: #164f88ff;
            color: white;
            padding: 8px 12px;
            margin: 20px 0 10px 0;
            border-radius: 4px;
            font-size: 14px;
            font-weight: 600;
            text-align: center;
        }
        
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        
        .table th {
            background-color: #454a50ff;
            color: white;
            padding: 8px;
            text-align: left;
            font-weight: 600;
        }
        
        .table td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }
        
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(0,0,0,.02);
        }
        
        .text-success {
            color: #28a745 !important;
            font-weight: bold;
        }
        
        .text-danger {
            color: #dc3545 !important;
            font-weight: bold;
        }
        
        .print-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 100;
        }
        
        .report-footer {
            margin-top: 30px;
            padding-top: 10px;
            border-top: 1px solid #ddd;
            text-align: center;
            font-size: 11px;
            color: #6c757d;
        }
        
        .date-generated {
            text-align: right;
            font-style: italic;
            margin-bottom: 10px;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <div class="print-container">
        <div class="container">
            <!-- Report Header with Logo -->
            <div class="report-header text-center">
                <div class="logo-container">
                    <!-- Replace with your company's logo -->
                    <img src="{{ asset('images/kgsons.png') }}" alt="Company Logo" class="company-logo">
                </div>
                <h4 class="report-title">KGSONS LOYAL FOOD</h4>
                <h4 class="report-title">Sales Report</h4>
                <p class="mb-0"><strong>Period:</strong> {{ $from }} to {{ $to }}</p>
                <div class="date-generated">Generated on: {{ date('Y-m-d H:i') }}</div>
            </div>
            
            <!-- Summary Section -->
            <div class="summary-card">
                <h5 class="mb-3">Summary</h5>
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
                <div class="sales-details">
                    <div class="section-title">Sales Details</div>
                    
                    @foreach($groupedSales as $date => $sales)
                        <h6 class="mt-3">{{ $date }} - Sales</h6>
                        <table class="table table-sm table-bordered table-striped">
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
                </div>
                
                <!-- Expenses Details -->
                @if($expenseData->count())
                    <div class="expenses-details">
                        <div class="section-title">Expenses Details</div>
                        
                        @foreach($groupedExpenses as $date => $expenses)
                            <h6 class="mt-4">{{ $date }} - Expenses</h6>
                            <table class="table table-sm table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Category</th>
                                        <th>Item</th>
                                        <th>Amount</th>
                                        <!-- <th>Payment Method</th> -->
                                        <th>Note</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($expenses as $expense)
                                        <tr>
                                            <td>{{ $expense->category->name ?? 'N/A' }}</td>
                                            <td>{{ $expense->item_name }}</td>
                                            <td>{{ number_format($expense->amount, 2) }}</td>
                                            <!-- <td>{{ $expense->payment_method }}</td> -->
                                            <td>{{ $expense->note }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endforeach
                    </div>
                @endif
            @endif
            
            <!-- Report Footer -->
            <div class="report-footer">
                <p>Confidential Report - For Internal Use Only</p>
                <p> kgsons company limited. kgsons.co.tz pos(v1) 2025 all right reserved</p>
            </div>
        </div>
    </div>
    
    <!-- Print Button (visible only on screen) -->
    <div class="no-print print-button">
        <button class="btn btn-primary btn-lg rounded-circle shadow" onclick="window.print()" title="Print Report">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
                <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/>
                <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
            </svg>
        </button>
    </div>
    
    <script>
        // Automatically trigger print when the page loads
        window.onload = function() {
            // You can keep the automatic print or remove it
            // window.print();
        };
    </script>
</body>
</html>