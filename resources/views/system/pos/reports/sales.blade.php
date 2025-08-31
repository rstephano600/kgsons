{{-- resources/views/system/reports/sales.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-3">Sales Report</h3>

    {{-- Filter Form --}}
    <form method="GET" action="{{ route('reports.sales') }}" class="row g-3 mb-4">
        <div class="col-md-3">
            <label>From Date</label>
            <input type="date" name="from_date" class="form-control" value="{{ $from }}">
        </div>
        <div class="col-md-3">
            <label>To Date</label>
            <input type="date" name="to_date" class="form-control" value="{{ $to }}">
        </div>
        <div class="col-md-3">
            <label>Show Details</label>
            <select name="show_details" class="form-select">
                <option value="1" {{ $showDetails ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ !$showDetails ? 'selected' : '' }}>No</option>
            </select>
        </div>
        <div class="col-md-3 align-self-end">
            <button class="btn btn-primary w-100">Generate Report</button>
        </div>
    </form>

    @if($from && $to)
    <div class="mb-3">
        <h5>Summary ({{ $from }} to {{ $to }})</h5>
        <ul>
            <li>Total Food Sales: <strong>{{ number_format($totals['food'], 2) }}</strong></li>
            <li>Total Drink Sales: <strong>{{ number_format($totals['drinks'], 2) }}</strong></li>
            <li>Grand Total: <strong>{{ number_format($totals['grand'], 2) }}</strong></li>
        </ul>
    </div>

    {{-- Detailed Table --}}
    @if($showDetails)
        @foreach($groupedSales as $date => $sales)
            <h6 class="mt-4">{{ $date }}</h6>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Type</th>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Payment</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sales as $sale)
                        <tr>
                            <td>{{ isset($sale->food_id) ? 'Food' : 'Drink' }}</td>
                            <td>{{ $sale->food->name ?? $sale->drink->name }}</td>
                            <td>{{ $sale->quantity }}</td>
                            <td>{{ number_format($sale->price, 2) }}</td>
                            <td>{{ number_format($sale->total, 2) }}</td>
                            <td>{{ $sale->payment_method ?? 'Unpaid' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endforeach
    @endif

    {{-- Print Button --}}
    <form method="POST" action="{{ route('reports.sales.print') }}" target="_blank">
        @csrf
        <input type="hidden" name="from_date" value="{{ $from }}">
        <input type="hidden" name="to_date" value="{{ $to }}">
        <input type="hidden" name="show_details" value="{{ $showDetails }}">
        <button class="btn btn-success mt-3">Print Report</button>
    </form>
    @endif
</div>
@endsection
