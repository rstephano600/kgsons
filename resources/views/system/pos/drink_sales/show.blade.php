@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Drink Sale Details</h2>

    <div class="card">
        <div class="card-body">
            <p><strong>Drink:</strong> {{ $drinkSale->drink->name }}</p>
            <p><strong>Quantity:</strong> {{ $drinkSale->quantity }}</p>
            <p><strong>Price:</strong> {{ number_format($drinkSale->price, 2) }}</p>
            <p><strong>Total:</strong> {{ number_format($drinkSale->total, 2) }}</p>
            <p><strong>Served By:</strong> {{ $drinkSale->service->service_name ?? 'N/A' }}</p>
            <p><strong>Payment Method:</strong> {{ $drinkSale->payment_method ?? 'N/A' }}</p>
            <p><strong>Status:</strong>
                @if($drinkSale->is_paid)
                    <span class="badge bg-success">Paid</span>
                @else
                    <span class="badge bg-danger">Unpaid</span>
                @endif
            </p>
            <p><strong>Recorded By:</strong> {{ $drinkSale->creator->name ?? 'System' }}</p>
            <p><strong>Date:</strong> {{ $drinkSale->created_at->format('Y-m-d H:i') }}</p>
        </div>
    </div>

    <a href="{{ route('drink_sales.index') }}" class="btn btn-secondary mt-3">Back</a>
</div>
@endsection
