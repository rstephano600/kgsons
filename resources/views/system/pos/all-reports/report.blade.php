@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Sales & Expense Report</h2>

    <form method="GET" action="{{ route('general.sales.report') }}" class="row g-3 mb-4">
        <div class="col-md-3">
            <select name="period" class="form-select" onchange="this.form.submit()">
                <option value="day" {{ $period=='day'?'selected':'' }}>Today</option>
                <option value="week" {{ $period=='week'?'selected':'' }}>This Week</option>
                <option value="month" {{ $period=='month'?'selected':'' }}>This Month</option>
                <option value="year" {{ $period=='year'?'selected':'' }}>This Year</option>
                <option value="custom" {{ $period=='custom'?'selected':'' }}>Custom</option>
            </select>
        </div>

        @if($period == 'custom')
            <div class="col-md-3">
                <input type="date" name="from" value="{{ request('from') }}" class="form-control">
            </div>
            <div class="col-md-3">
                <input type="date" name="to" value="{{ request('to') }}" class="form-control">
            </div>
            <div class="col-md-3">
                <button class="btn btn-primary">Filter</button>
            </div>
        @endif
    </form>

    <div class="row">
        <div class="col-md-3">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5>Food Sales</h5>
                    <h3>{{ number_format($foodSales, 2) }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <h5>Drink Sales</h5>
                    <h3>{{ number_format($drinkSales, 2) }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-warning text-dark">
                <div class="card-body">
                    <h5>Expenses</h5>
                    <h3>{{ number_format($expenses, 2) }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5>Profit</h5>
                    <h3>{{ number_format($profit, 2) }}</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-4">
        <a href="{{ route('general.sales.export', request()->all()) }}" class="btn btn-success">Export Excel</a>
    </div>
</div>
@endsection
