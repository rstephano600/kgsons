@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Food Sale Details</h2>

    <div class="card">
        <div class="card-body">
            <p><strong>Food:</strong> {{ $foodSale->food->name }}</p>
            <p><strong>Quantity:</strong> {{ $foodSale->quantity }}</p>
            <p><strong>Total Price:</strong> {{ number_format($foodSale->total, 2) }}</p>
            <p><strong>Sold By:</strong> {{ $foodSale->user->name ?? 'Cashier' }}</p>
            <p><strong>Sale Date:</strong> {{ $foodSale->created_at }}</p>
        </div>
    </div>

    <a href="{{ route('food_sales.index') }}" class="btn btn-secondary mt-3">Back</a>
</div>
@endsection
