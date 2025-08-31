@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Expenses</h2>

    <!-- Search and Filter -->
    <form method="GET" action="{{ route('expenses.index') }}" class="row g-3 mb-4">
        <div class="col-md-3">
            <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                   placeholder="Search by item name">
        </div>
        <div class="col-md-3">
            <select name="category_id" class="form-select">
                <option value="">All Categories</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ request('category_id') == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary w-100">Filter</button>
        </div>
        <div class="col-md-2">
            <a href="{{ route('expenses.index') }}" class="btn btn-secondary w-100">Reset</a>
        </div>
        <div class="col-md-2">
            <a href="{{ route('expenses.create') }}" class="btn btn-success w-100">+ Add Expense</a>
        </div>
    </form>

    <!-- Table -->
    <div class="card shadow-sm">
        <div class="card-body table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Category</th>
                        <th>Item Name</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Created By</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($expenses as $expense)
                        <tr>
                            <td>{{ $loop->iteration + ($expenses->currentPage()-1) * $expenses->perPage() }}</td>
                            <td>{{ $expense->category->name ?? '-' }}</td>
                            <td>{{ $expense->item_name }}</td>
                            <td>{{ number_format($expense->amount, 2) }}</td>
                            <td>{{ $expense->expense_date->format('Y-m-d') }}</td>
                            <td>{{ $expense->user->name ?? 'N/A' }}</td>
                            <td>
                                <a href="{{ route('expenses.edit', $expense) }}" class="btn btn-sm btn-warning">Edit</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">No expenses found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="mt-3">
                {{ $expenses->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
