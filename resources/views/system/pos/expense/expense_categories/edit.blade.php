@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Expense Category</h2>

    <form action="{{ route('expense_categories.update', $expenseCategory->id) }}" method="POST" class="card p-4 shadow-sm">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" name="name" id="name"
                   class="form-control @error('name') is-invalid @enderror"
                   value="{{ old('name', $expenseCategory->name) }}" required>
            @error('name') 
                <div class="invalid-feedback">{{ $message }}</div> 
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description (Optional)</label>
            <textarea name="description" id="description" rows="3"
                      class="form-control @error('description') is-invalid @enderror">{{ old('description', $expenseCategory->description) }}</textarea>
            @error('description') 
                <div class="invalid-feedback">{{ $message }}</div> 
            @enderror
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('expense_categories.index') }}" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary">Update Category</button>
        </div>
    </form>
</div>
@endsection
