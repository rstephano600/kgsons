<!DOCTYPE html>
<html>
<head>
    <title>Drink Sales Report</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        .header { text-align: center; margin-bottom: 20px; }
        .header h2 { margin: 5px 0; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        table, th, td { border: 1px solid #333; padding: 6px; text-align: center; }
        th { background: #222; color: #fff; }
        .summary { margin-top: 20px; font-weight: bold; }
    </style>
</head>
<body>
    <div class="header">
        <img src="{{ public_path('images/logo.png') }}" alt="Logo" height="60">
        <h2>KGSONS LOYAL FOOD</h2>
        <p><strong>Drink Sales Report</strong></p>
        <p>Date Range: {{ $startDate }} to {{ $endDate }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Drink</th>
                <th>Category</th>
                <th>Price (TZS)</th>
                <!-- <th>Stock</th> -->
                <!-- <th>Status</th> -->
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sales as $index => $sale)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $sale->drink->name }}</td>
                    <td>{{ $sale->drink->category }}</td>
                    <td>{{ number_format($sale->price, 2) }}</td>
                    <!-- <td>{{ $sale->stock }}</td> -->
                    <!-- <td>{{ ucfirst($sale->status) }}</td> -->
                    <td>{{ $sale->created_at->format('Y-m-d') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="summary">
        <p>Total Sales: {{ number_format($sale->sum('price'), 2) }} TZS</p>
        <p>Total Paid: {{ number_format($sale->where('is_paid', '1')->sum('price'), 2) }} TZS</p>
        <p>Total Unpaid: {{ number_format($sale->where('is_paid', '0')->sum('price'), 2) }} TZS</p>
        <br><br>
        <p>Printed by: ___________________</p>
        <p>Signature: ___________________</p>
        <p>Date: {{ now()->format('Y-m-d') }}</p>
    </div>
</body>
</html>
