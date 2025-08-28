@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-3">Food Details</h3>

    <div class="card shadow-sm">
        <div class="card-body">
            <h5 class="card-title">{{ $food->name }}</h5>
            <p class="card-text"><strong>Category:</strong> {{ $food->category ?? '-' }}</p>
            <p class="card-text"><strong>Price:</strong> {{ number_format($food->price,2) }}</p>
            <p class="card-text"><strong>Stock:</strong> {{ $food->stock }}</p>
            <p class="card-text">
                <strong>Status:</strong> 
                @if($food->is_active)
                    <span class="badge bg-success">Active</span>
                @else
                    <span class="badge bg-danger">Inactive</span>
                @endif
            </p>
            <p class="card-text"><small class="text-muted">Created: {{ $food->created_at->format('Y-m-d H:i') }}</small></p>
        </div>
        <div class="card-footer d-flex gap-2">
            <a href="{{ route('foods.edit', $food) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('foods.destroy', $food) }}" method="POST" onsubmit="return confirm('Delete this food?')">
                @csrf @method('DELETE')
                <button class="btn btn-danger">Delete</button>
            </form>
            <a href="{{ route('foods.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>
@endsection
