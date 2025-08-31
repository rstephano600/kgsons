@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Food Sales Dashboard</h2>

    <!-- Summary Cards -->
    <div class="row mb-4">
        <div class="col-md-2"><div class="card"><div class="card-body text-center">Today<br><strong>{{ number_format($todaySales,0) }} TZS</strong></div></div></div>
        <div class="col-md-2"><div class="card"><div class="card-body text-center">This Week<br><strong>{{ number_format($weekSales,0) }} TZS</strong></div></div></div>
        <div class="col-md-2"><div class="card"><div class="card-body text-center">This Month<br><strong>{{ number_format($monthSales,0) }} TZS</strong></div></div></div>
        <div class="col-md-2"><div class="card"><div class="card-body text-center">This Year<br><strong>{{ number_format($yearSales,0) }} TZS</strong></div></div></div>
        <div class="col-md-2"><div class="card bg-success text-white"><div class="card-body text-center">Total<br><strong>{{ number_format($totalSales,0) }} TZS</strong></div></div></div>
    </div>

<!-- Filter Form -->
<div class="card shadow-sm mb-4">
    <div class="card-header bg-light">
        <h5 class="mb-0">Filter Sales Report</h5>
    </div>
    <div class="card-body">
        <form method="GET" action="{{ route('reports.food_sales') }}">
            <div class="row g-3">
                <!-- Start Date -->
                <div class="col-md-4">
                    <label class="form-label fw-bold">Start Date</label>
                    <input type="date" name="start_date" class="form-control" value="{{ $startDate }}">
                </div>

                <!-- End Date -->
                <div class="col-md-4">
                    <label class="form-label fw-bold">End Date</label>
                    <input type="date" name="end_date" class="form-control" value="{{ $endDate }}">
                </div>

                <!-- Buttons -->
                <div class="col-md-4 d-flex align-items-end">
                    <div class="btn-group w-100">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-funnel-fill me-1"></i> Filter
                        </button>
                        <button type="submit" formaction="{{ route('reports.food_sales.export') }}" name="format" value="xlsx" class="btn btn-success">
                            <i class="bi bi-file-earmark-excel-fill me-1"></i> Excel
                        </button>
                        <button type="submit" formaction="{{ route('reports.food_sales.export') }}" name="format" value="csv" class="btn btn-info">
                            <i class="bi bi-filetype-csv me-1"></i> CSV
                        </button>
                        <button type="submit" formaction="{{ route('reports.food_sales.export') }}" name="format" value="pdf" class="btn btn-danger">
                            <i class="bi bi-file-earmark-pdf-fill me-1"></i> PDF
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

    <!-- Sales Table -->
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th><th>Food</th><th>Qty</th><th>Price</th><th>Total</th><th>Payment</th><th>Paid At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sales as $index => $sale)
                <tr>
                    <td>{{ $index+1 }}</td>
                    <td>{{ $sale->food->name ?? 'N/A' }}</td>
                    <td>{{ $sale->quantity }}</td>
                    <td>{{ number_format($sale->price,0) }}</td>
                    <td>{{ number_format($sale->total,0) }}</td>
                    <td>{{ $sale->payment_method }}</td>
                    <td>{{ $sale->paid_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
