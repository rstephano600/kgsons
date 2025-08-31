@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Drink Details</h2>

    <div class="card shadow-sm p-3">
        <h4>{{ $drink->name }}</h4>
        <p><strong>Category:</strong> {{ $drink->category ?? '-' }}</p>
        <p><strong>Price:</strong> {{ number_format($drink->price, 2) }}</p>
        <p><strong>Stock:</strong> {{ $drink->stock }}</p>
        <p><strong>Created At:</strong> {{ $drink->created_at->format('Y-m-d H:i') }}</p>
        <p><strong>Updated At:</strong> {{ $drink->updated_at->format('Y-m-d H:i') }}</p>
    </div>

    <a href="{{ route('drinks.edit', $drink->id) }}" class="btn btn-warning mt-3">Edit</a>
    <a href="{{ route('drinks.index') }}" class="btn btn-secondary mt-3">Back</a>
</div>
@endsection
