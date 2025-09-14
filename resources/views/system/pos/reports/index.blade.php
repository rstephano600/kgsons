@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">📊 Sales & Expenses Report</h2>

    <!-- Summary Cards -->
    <div class="row mb-4">
        <div class="col-md-2"><div class="card"><div class="card-body text-center">Today<br><strong>{{ number_format($dayTotal,0) }} TZS</strong></div></div></div>
        <div class="col-md-2"><div class="card"><div class="card-body text-center">This Week<br><strong>{{ number_format($weekTotal,0) }} TZS</strong></div></div></div>
        <div class="col-md-2"><div class="card"><div class="card-body text-center">This Month<br><strong>{{ number_format($monthTotal,0) }} TZS</strong></div></div></div>
        <div class="col-md-2"><div class="card"><div class="card-body text-center">This Year<br><strong>{{ number_format($yearTotal,0) }} TZS</strong></div></div></div>
        <div class="col-md-2"><div class="card bg-success text-white"><div class="card-body text-center">Total Sales<br><strong>{{ number_format($salesTotal,0) }} TZS</strong></div></div></div>
    </div>

    <!-- Profit & Loss Summary -->
    <div class="card mb-4">
        <div class="card-header bg-dark text-white">📌 Summary</div>
        <div class="card-body">
            <table class="table table-bordered text-center">
                <thead class="table-secondary">
                    <tr>
                        <th>Total Sales</th>
                        <th>Total Expenses</th>
                        <th>Profit / Loss</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>{{ number_format($grandTotal, 2) }} TZS</strong></td>
                        <td><strong class="text-danger">{{ number_format($totalExpenses, 2) }} TZS</strong></td>
                        <td>
                            @if($profitOrLoss >= 0)
                                <strong class="text-success">{{ number_format($profitOrLoss, 2) }} TZS (Profit)</strong>
                            @else
                                <strong class="text-danger">{{ number_format($profitOrLoss, 2) }} TZS (Loss)</strong>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <a href="" class="btn btn-danger mt-2">
                📄 Export PDF
            </a>
        </div>
    </div>

    <!-- Filters -->
    <form method="GET" action="{{ route('sales.reports.index') }}" class="row g-3 mb-4">
        <div class="col-md-3">
            <label for="start_date" class="form-label">Start Date</label>
            <input type="date" name="start_date" id="start_date" class="form-control"
                   value="{{ request('start_date') }}">
        </div>
        <div class="col-md-3">
            <label for="end_date" class="form-label">End Date</label>
            <input type="date" name="end_date" id="end_date" class="form-control"
                   value="{{ request('end_date') }}">
        </div>
        <div class="col-md-3">
            <label for="payment_method" class="form-label">Payment Method</label>
            <select name="payment_method" id="payment_method" class="form-select">
                <option value="">-- All --</option>
                <option value="cash" {{ request('payment_method')=='cash' ? 'selected' : '' }}>Cash</option>
                <option value="lipa" {{ request('payment_method')=='lipa' ? 'selected' : '' }}>Lipa</option>
                <option value="bank transfer" {{ request('payment_method')=='bank transfer' ? 'selected' : '' }}>Bank Transfer</option>
            </select>
        </div>
        <div class="col-md-3 d-flex align-items-end">
            <button type="submit" class="btn btn-primary w-100">Filter</button>
        </div>
    </form>

    <!-- Food Sales Table -->
    <div class="card mb-4">
        <div class="card-header bg-success text-white">🍲 Food Sales</div>
        <div class="card-body table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Food</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Payment</th>
                        <th>Served By</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($foodSales as $sale)
                        <tr>
                            <td>{{ $sale->food->name ?? 'N/A' }}</td>
                            <td>{{ $sale->quantity }}</td>
                            <td>{{ number_format($sale->price, 2) }}</td>
                            <td>{{ number_format($sale->total, 2) }}</td>
                            <td>{{ ucfirst($sale->payment_method ?? 'Unpaid') }}</td>
                            <td>{{ $sale->service->service_name ?? 'N/A' }}</td>
                            <td>{{ $sale->created_at->format('d M Y') }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="7" class="text-center text-muted">No food sales found.</td></tr>
                    @endforelse
                </tbody>
            </table>
            {{ $foodSales->links('pagination::bootstrap-5') }}
        </div>
        <div class="card-footer fw-bold">Total Food Sales: {{ number_format($totalFood, 2) }}</div>
    </div>

    <!-- Drink Sales Table -->
    <div class="card mb-4">
        <div class="card-header bg-info text-white">🥤 Drink Sales</div>
        <div class="card-body table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Drink</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Payment</th>
                        <th>Served By</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($drinkSales as $sale)
                        <tr>
                            <td>{{ $sale->drink->name ?? 'N/A' }}</td>
                            <td>{{ $sale->quantity }}</td>
                            <td>{{ number_format($sale->price, 2) }}</td>
                            <td>{{ number_format($sale->total, 2) }}</td>
                            <td>{{ ucfirst($sale->payment_method ?? 'Unpaid') }}</td>
                            <td>{{ $sale->service->service_name ?? 'N/A' }}</td>
                            <td>{{ $sale->created_at->format('d M Y') }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="7" class="text-center text-muted">No drink sales found.</td></tr>
                    @endforelse
                </tbody>
            </table>
            {{ $drinkSales->links('pagination::bootstrap-5') }}
        </div>
        <div class="card-footer fw-bold">Total Drink Sales: {{ number_format($totalDrink, 2) }}</div>
    </div>

    <!-- Expenses Table -->
    <div class="card mb-4">
        <div class="card-header bg-danger text-white">💸 Expenses</div>
        <div class="card-body table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>Item</th>
                        <th>Amount</th>
                        <th>Payment Method</th>
                        <th>Note</th>
                        <th>Date</th>
                        <th>Added By</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($expenses as $expense)
                        <tr>
                            <td>{{ $expense->category->name ?? 'N/A' }}</td>
                            <td>{{ $expense->item_name }}</td>
                            <td>{{ number_format($expense->amount, 2) }}</td>
                            <td>{{ ucfirst($expense->payment_method ?? 'N/A') }}</td>
                            <td>{{ $expense->note ?? '-' }}</td>
                            <td>{{ $expense->expense_date->format('d M Y') }}</td>
                            <td>{{ $expense->creator->name ?? 'System' }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="7" class="text-center text-muted">No expenses found.</td></tr>
                    @endforelse
                </tbody>
            </table>
            {{ $expenses->links('pagination::bootstrap-5') }}
        </div>
        <div class="card-footer fw-bold text-danger">Total Expenses: {{ number_format($totalExpenses, 2) }}</div>
    </div>

    <!-- Grand Total -->
    <div class="alert alert-dark text-center fw-bold fs-5">
        💰 Grand Total Sales: {{ number_format($grandTotal, 2) }}
    </div>
</div>
@endsection
