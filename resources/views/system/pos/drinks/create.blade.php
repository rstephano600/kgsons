@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Add New Drink</h2>

    <form action="{{ route('drinks.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Drink Name</label>
            <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Category</label>
            <select name="category" class="form-select">
                <option value="">Select Category</option>
                <option value="Soft Drink">Soft Drink</option>
                <option value="Alcoholic">Alcoholic</option>
                <option value="Juice">Juice</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="number" step="0.01" name="price" class="form-control" required value="{{ old('price') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Stock</label>
            <input type="number" name="stock" class="form-control" required value="{{ old('stock', 0) }}">
        </div>

        <button type="submit" class="btn btn-primary">Save Drink</button>
        <a href="{{ route('drinks.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
