@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Record New Sale</h2>

    <form action="{{ route('food_sales.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="food_id" class="form-label">Select Food</label>
            <select id="food_id" name="food_id" class="form-select" data-bs-toggle="select" required>
                <option value="">-- Search and Select Food --</option>
                @foreach($foods as $food)
                    <option value="{{ $food->id }}">
                        {{ $food->name }} ({{ number_format($food->price,2) }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" name="quantity" id="quantity" class="form-control" value="1" min="1" required>
        </div>
<div class="mb-3">
    <label for="service_id" class="form-label">Served By</label>
    <select name="service_id" id="service_id" class="form-select" required>
        <option value="">-- Select Service Staff --</option>
        @foreach($services as $service)
            <option value="{{ $service->id }}">
                {{ $service->service_name }} - {{ $service->user->name }}
            </option>
        @endforeach
    </select>
</div>


        <button type="submit" class="btn btn-success">Save Sale</button>
    </form>
</div>

{{-- Enable searchable dropdown --}}
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/js/select2.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/css/select2.min.css" rel="stylesheet" />
<script>
    document.addEventListener("DOMContentLoaded", function() {
        $('#food_id').select2({
            placeholder: "Search for food",
            allowClear: true
        });
    });
</script>
@endsection
