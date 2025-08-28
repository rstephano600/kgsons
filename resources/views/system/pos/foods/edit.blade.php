@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-3">Edit Food: {{ $food->name }}</h3>

    <form action="{{ route('foods.update', $food) }}" method="POST" class="row g-3">
        @csrf @method('PUT')

        <div class="col-md-6">
            <label class="form-label">Food Name</label>
            <input type="text" name="name" value="{{ old('name', $food->name) }}" class="form-control" required>
            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="col-md-3">
            <label class="form-label">Price</label>
            <input type="number" step="0.01" name="price" value="{{ old('price', $food->price) }}" class="form-control" required>
            @error('price') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="col-md-3">
            <label class="form-label">Stock</label>
            <input type="number" name="stock" value="{{ old('stock', $food->stock) }}" class="form-control">
            @error('stock') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="col-md-4">
            <label class="form-label">Category</label>
            <input type="text" name="category" value="{{ old('category', $food->category) }}" class="form-control">
            @error('category') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="col-md-4">
            <label class="form-label">Status</label>
            <select name="is_active" class="form-select">
                <option value="1" @selected($food->is_active)>Active</option>
                <option value="0" @selected(!$food->is_active)>Inactive</option>
            </select>
        </div>

        <div class="col-12">
            <button class="btn btn-primary">Update</button>
            <a href="{{ route('foods.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </form>
</div>
@endsection
