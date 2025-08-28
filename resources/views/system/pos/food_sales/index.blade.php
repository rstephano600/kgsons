@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Food Sales</h2>

    <!-- Search Form -->
    <form action="{{ route('food_sales.index') }}" method="GET" class="row g-3 mb-3">
        <div class="col-md-4">
            <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Search by food name">
        </div>
        <div class="col-md-3">
            <input type="date" name="date" value="{{ request('date') }}" class="form-control">
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
        <div class="col-md-3 text-end">
            <a href="{{ route('food_sales.create') }}" class="btn btn-success">+ New Sale</a>
        </div>
    </form>

    <!-- Sales Table -->
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Food</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>P status</th>
                    <!-- <th>Sold By</th> -->
                    <th>Sale Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($foodSales as $sale)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $sale->food->name }}</td>
                        <td>{{ $sale->quantity }}</td>
                        <td>{{ number_format($sale->total, 2) }}</td>
                        <td>
    @if(!$sale->is_paid)
        <form action="{{ route('food_sales.markPaid', $sale->id) }}" method="POST" class="d-inline">
            @csrf
            <select name="payment_method" required class="form-select form-select-sm d-inline w-auto">
                <option value="cash">Cash</option>
                <option value="lipa">Lipa</option>
                <option value="bank_transfer">Bank Transfer</option>
            </select>
            <button type="submit" class="btn btn-success btn-sm">Mark Paid</button>
        </form>
    @else
        <span class="badge bg-success">Paid ({{ ucfirst($sale->payment_method) }})</span>
    @endif
</td>

                        <!-- <td>{{ $sale->user->name ?? 'Cashier' }}</td> -->
                        <td>{{ $sale->created_at }}</td>
                        <td>
                            <!-- <a href="{{ route('food_sales.edit', $sale->id) }}" class="btn btn-sm btn-warning">Edit</a> -->
                            <a href="{{ route('food_sales.show', $sale->id) }}" class="btn btn-sm btn-info">View</a>
                            <!-- <form action="{{ route('food_sales.destroy', $sale->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this sale?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </form> -->
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">No sales found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-3">
        {{ $foodSales->links() }}
    </div>
</div>
@endsection
