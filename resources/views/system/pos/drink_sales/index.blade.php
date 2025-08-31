@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Drink Sales</h2>

    <!-- Search & Filters -->
    <form method="GET" action="{{ route('drink_sales.index') }}" class="row g-3 mb-3">
        <div class="col-md-4">
            <input type="text" name="search" class="form-control"
                   placeholder="Search by drink name or staff"
                   value="{{ request('search') }}">
        </div>
        <div class="col-md-3">
            <select name="payment_status" class="form-select">
                <option value="">-- Filter by Payment Status --</option>
                <option value="paid" {{ request('payment_status')=='paid' ? 'selected' : '' }}>Paid</option>
                <option value="unpaid" {{ request('payment_status')=='unpaid' ? 'selected' : '' }}>Unpaid</option>
            </select>
        </div>
        <div class="col-md-3">
            <input type="date" name="date" class="form-control" value="{{ request('date') }}">
        </div>
        <div class="col-md-2">
            <button class="btn btn-primary w-100">Filter</button>
        </div>
    </form>

    <a href="{{ route('drink_sales.create') }}" class="btn btn-success mb-3">+ Record Sale</a>

    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Drink</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
                <th>Served By</th>
                <th>Payment</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($drinkSales as $sale)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $sale->drink->name }}</td>
                    <td>{{ $sale->quantity }}</td>
                    <td>{{ number_format($sale->price, 2) }}</td>
                    <td>{{ number_format($sale->total, 2) }}</td>
                    <td>{{ $sale->service->service_name ?? 'N/A' }}</td>
                        <td>
    @if(!$sale->is_paid)
        <form action="{{ route('drink_sales.markPaid', $sale->id) }}" method="POST" class="d-inline">
            @csrf
            <select name="payment_method" required class="form-select form-select-sm d-inline w-auto">
                <option value="cash">Cash</option>
                <option value="lipa">Lipa</option>
                <option value="bank_transfer">Bank Transfer</option>
            </select>
            <button type="submit" class="btn btn-warning btn-sm">Mark Paid</button>
        </form>
    @else
        <span class="badge bg-success">Paid ({{ ucfirst($sale->payment_method) }})</span>
    @endif
</td>
                    <td>{{ $sale->created_at->format('Y-m-d H:i') }}</td>
                    <td>
                        <a href="{{ route('drink_sales.show', $sale) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('drink_sales.edit', $sale) }}" class="btn btn-warning btn-sm">Edit</a>
                                @if(in_array(Auth::user()->role, ['admin','secretary']))
                        <form action="{{ route('drink_sales.destroy', $sale) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Are you sure to delete this record?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm">Del</button>
                        </form>
                                @endif
                    </td>
                </tr>
            @empty
                <tr><td colspan="9" class="text-center">No drink sales found.</td></tr>
            @endforelse
        </tbody>
    </table>

    {{ $drinkSales->links('pagination::bootstrap-5') }}
</div>
@endsection
