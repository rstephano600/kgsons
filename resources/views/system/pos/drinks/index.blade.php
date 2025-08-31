@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Drinks List</h2>

    <!-- Search & Filter -->
    <form method="GET" action="{{ route('drinks.index') }}" class="row g-2 mb-3">
        <div class="col-md-4">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by name..." class="form-control">
        </div>
        <div class="col-md-3">
            <select name="category" class="form-select">
                <option value="">All Categories</option>
                <option value="Soft Drink" {{ request('category')=='Soft Drink' ? 'selected' : '' }}>Soft Drink</option>
                <option value="Alcoholic" {{ request('category')=='Alcoholic' ? 'selected' : '' }}>Alcoholic</option>
                <option value="Juice" {{ request('category')=='Juice' ? 'selected' : '' }}>Juice</option>
            </select>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary w-100">Filter</button>
        </div>
        <div class="col-md-3 text-end">
            <a href="{{ route('drinks.create') }}" class="btn btn-success">+ Add Drink</a>
        </div>
    </form>

    <!-- Drinks Table -->
    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Created</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($drinks as $drink)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $drink->name }}</td>
                        <td>{{ $drink->category ?? '-' }}</td>
                        <td>{{ number_format($drink->price, 2) }}</td>
                        <td>{{ $drink->stock }}</td>
                        <td>{{ $drink->created_at->format('Y-m-d') }}</td>
                        <td>
                            <a href="{{ route('drinks.show', $drink->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('drinks.edit', $drink->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('drinks.destroy', $drink->id) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Are you sure to delete this drink?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="7" class="text-center">No drinks found</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-3">
        {{ $drinks->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
