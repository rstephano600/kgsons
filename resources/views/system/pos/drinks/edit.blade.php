@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Drink</h2>

    <form action="{{ route('drinks.update', $drink->id) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label class="form-label">Drink Name</label>
            <input type="text" name="name" class="form-control" required value="{{ old('name', $drink->name) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Category</label>
            <select name="category" class="form-select">
                <option value="">Select Category</option>
                <option value="Soft Drink" {{ $drink->category=='Soft Drink' ? 'selected' : '' }}>Soft Drink</option>
                <option value="Alcoholic" {{ $drink->category=='Alcoholic' ? 'selected' : '' }}>Alcoholic</option>
                <option value="Juice" {{ $drink->category=='Juice' ? 'selected' : '' }}>Juice</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="number" step="0.01" name="price" class="form-control" required value="{{ old('price', $drink->price) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Stock</label>
            <input type="number" name="stock" class="form-control" required value="{{ old('stock', $drink->stock) }}">
        </div>

        <button type="submit" class="btn btn-primary">Update Drink</button>
        <a href="{{ route('drinks.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
