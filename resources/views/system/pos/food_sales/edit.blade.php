@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Food Sale</h2>

    <form action="{{ route('food_sales.update', $foodSale->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="food_id" class="form-label">Food</label>
            <select name="food_id" class="form-control" required>
                @foreach($foods as $food)
                    <option value="{{ $food->id }}" {{ $food->id == $foodSale->food_id ? 'selected' : '' }}>
                        {{ $food->name }} - {{ number_format($food->price, 2) }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" name="quantity" class="form-control" value="{{ $foodSale->quantity }}" min="1" required>
        </div>


        <button type="submit" class="btn btn-primary">Update Sale</button>
        <a href="{{ route('food_sales.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
