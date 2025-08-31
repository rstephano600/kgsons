{{-- resources/views/system/reports/print_sales.blade.php --}}
<!DOCTYPE html>
<html>
<head>
    <title>Sales Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body onload="window.print()">
<div class="container mt-4">
    <h3>Sales Report</h3>
    <p><strong>Period:</strong> {{ $from }} to {{ $to }}</p>

    <h5>Summary</h5>
    <ul>
        <li>Total Food Sales: <strong>{{ number_format($totals['food'], 2) }}</strong></li>
        <li>Total Drink Sales: <strong>{{ number_format($totals['drinks'], 2) }}</strong></li>
        <li>Grand Total: <strong>{{ number_format($totals['grand'], 2) }}</strong></li>
    </ul>

    @if($showDetails)
        @foreach($groupedSales as $date => $sales)
            <h6 class="mt-3">{{ $date }}</h6>
            <table class="table table-sm table-bordered">
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
    @endif
</div>
</body>
</html>
