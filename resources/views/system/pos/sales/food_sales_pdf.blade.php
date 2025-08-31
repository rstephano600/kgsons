<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Food Sales Report</title>
    <style>
        body { font-family: "DejaVu Sans", sans-serif; font-size: 12px; }
        .header { text-align: center; margin-bottom: 20px; }
        .header img { max-height: 60px; margin-bottom: 10px; }
        h2 { margin: 5px 0; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        table, th, td { border: 1px solid #000; }
        th { background: #f2f2f2; font-weight: bold; }
        th, td { padding: 6px; text-align: center; }
        .summary { margin-top: 20px; font-weight: bold; }
        .footer { margin-top: 50px; font-size: 12px; }
        .sign { margin-top: 40px; }
    </style>
</head>
<body>

    <!-- Header -->
    <div class="header">
        <img src="{{ asset('images/kgsons.png') }}" alt="Logo">
        <h2>KGSONS LOYAL FOOD</h2>
        <p><strong>Food Sales Report</strong></p>
        <p>Date Range: {{ $startDate ?? '---' }} to {{ $endDate ?? '---' }}</p>
    </div>

    <!-- Sales Table -->
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Food</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
                <th>Payment</th>
                <th>Paid</th>
                <th>Paid At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sales as $index => $sale)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $sale->food->name ?? 'N/A' }}</td>
                    <td>{{ $sale->quantity }}</td>
                    <td>{{ number_format($sale->price, 0) }}</td>
                    <td>{{ number_format($sale->total, 0) }}</td>
                    <td>{{ $sale->payment_method }}</td>
                    <td>{{ $sale->is_paid ? 'Yes' : 'No' }}</td>
                    <td>{{ $sale->paid_at ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Summary -->
    <div class="summary">
        <p>Total Sales: {{ number_format($totalSales, 0) }} TZS</p>
        <p>Total Paid: {{ number_format($paidSales, 0) }} TZS</p>
        <p>Total Unpaid: {{ number_format($unpaidSales, 0) }} TZS</p>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>Printed by: {{ $user->name ?? 'System' }}</p>
        <p>Date: {{ now()->format('Y-m-d H:i') }}</p>

        <div class="sign">
            <p>__________________________</p>
            <p>Signature</p>
        </div>
    </div>

</body>
</html>
