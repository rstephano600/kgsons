@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Record Drink Sale</h2>

    <form action="{{ route('drink_sales.store') }}" method="POST">
        @csrf

        @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <div class="mb-3">
            <label for="drink_id" class="form-label">Drink</label>
            <select name="drink_id" id="drink_id" class="form-select" required>
                <option value="">-- Select Drink --</option>
                @foreach($drinks as $drink)
                    <option value="{{ $drink->id }}">{{ $drink->name }} ({{ number_format($drink->price,2) }})</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" name="quantity" id="quantity" class="form-control" value="1" min="1" required>
        </div>

        <!-- <div class="mb-3">
            <label for="service_id" class="form-label">Served By</label>
            <select name="service_id" id="service_id" class="form-select" required>
                <option value="">-- Select Staff --</option>
                @foreach($services as $service)
                    <option value="{{ $service->id }}">{{ $service->service_name }} - {{ $service->user->name }}</option>
                @endforeach
            </select>
        </div> -->


        <button type="submit" class="btn btn-primary">Save Sale</button>
        <a href="{{ route('drink_sales.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
