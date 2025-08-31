@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Add Expense Category</h2>

    <form action="{{ route('expense_categories.store') }}" method="POST" class="card p-4 shadow-sm">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" name="name" id="name"
                   class="form-control @error('name') is-invalid @enderror"
                   value="{{ old('name') }}" required>
            @error('name') 
                <div class="invalid-feedback">{{ $message }}</div> 
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description (Optional)</label>
            <textarea name="description" id="description" rows="3"
                      class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
            @error('description') 
                <div class="invalid-feedback">{{ $message }}</div> 
            @enderror
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('expense_categories.index') }}" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-success">Save Category</button>
        </div>
    </form>
</div>
@endsection
