@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Food Menu</h3>
        <a href="{{ route('foods.create') }}" class="btn btn-primary">+ Add Food</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="GET" action="{{ route('foods.index') }}" class="row g-2 mb-3">
        <div class="col-md-4">
            <input type="text" name="s" value="{{ request('s') }}" class="form-control" placeholder="Search by name/category">
        </div>
        <div class="col-md-3">
            <select name="active" class="form-select">
                <option value="">-- Status --</option>
                <option value="1" @selected(request('active')==='1')>Active</option>
                <option value="0" @selected(request('active')==='0')>Inactive</option>
            </select>
        </div>
        <div class="col-md-2">
            <button class="btn btn-secondary">Filter</button>
        </div>
    </form>

    <table class="table table-bordered table-hover align-middle">
        <thead class="table-light">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Status</th>
                <th class="text-end">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($foods as $food)
            <tr>
                <td>{{ $food->id }}</td>
                <td>{{ $food->name }}</td>
                <td>{{ $food->category ?? '-' }}</td>
                <td>{{ number_format($food->price,2) }}</td>
                <td>{{ $food->stock }}</td>
                <td>
                    @if($food->is_active)
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-danger">Inactive</span>
                    @endif
                </td>
                <td class="text-end">
                    <a href="{{ route('foods.show', $food) }}" class="btn btn-sm btn-info">View</a>
                    <a href="{{ route('foods.edit', $food) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('foods.destroy', $food) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this food?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="7" class="text-center">No food items found.</td></tr>
            @endforelse
        </tbody>
    </table>

    {{ $foods->links() }}
</div>
@endsection
