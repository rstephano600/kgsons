@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Drink Sale</h2>

    <form action="{{ route('drink_sales.update', $drinkSale) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label for="drink_id" class="form-label">Drink</label>
            <select name="drink_id" id="drink_id" class="form-select" required>
                @foreach($drinks as $drink)
                    <option value="{{ $drink->id }}" {{ $drinkSale->drink_id == $drink->id ? 'selected' : '' }}>
                        {{ $drink->name }} ({{ number_format($drink->price,2) }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" name="quantity" id="quantity" class="form-control"
                   value="{{ $drinkSale->quantity }}" required min="1">
        </div>

        <div class="mb-3">
            <label for="service_id" class="form-label">Served By</label>
            <select name="service_id" id="service_id" class="form-select" required>
                @foreach($services as $service)
                    <option value="{{ $service->id }}" {{ $drinkSale->service_id == $service->id ? 'selected' : '' }}>
                        {{ $service->service_name }} - {{ $service->user->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="payment_method" class="form-label">Payment Method</label>
            <select name="payment_method" id="payment_method" class="form-select">
                <option value="cash" {{ $drinkSale->payment_method == 'cash' ? 'selected' : '' }}>Cash</option>
                <option value="mpesa" {{ $drinkSale->payment_method == 'mpesa' ? 'selected' : '' }}>M-Pesa</option>
                <option value="tigo_pesa" {{ $drinkSale->payment_method == 'tigo_pesa' ? 'selected' : '' }}>Tigo Pesa</option>
                <option value="airtel_money" {{ $drinkSale->payment_method == 'airtel_money' ? 'selected' : '' }}>Airtel Money</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Sale</button>
        <a href="{{ route('drink_sales.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
