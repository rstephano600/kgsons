@extends('layouts.app')

@section('title', 'Sales & Expense Reports')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-chart-line me-2"></i>Sales & Expense Reports
        </h1>
        <div class="btn-group" role="group">
            <button type="button" class="btn btn-outline-success" onclick="exportReport('pdf')">
                <i class="fas fa-file-pdf me-1"></i>PDF
            </button>
            <button type="button" class="btn btn-outline-success" onclick="exportReport('excel')">
                <i class="fas fa-file-excel me-1"></i>Excel
            </button>
            <button type="button" class="btn btn-outline-success" onclick="exportReport('csv')">
                <i class="fas fa-file-csv me-1"></i>CSV
            </button>
        </div>
    </div>

    <!-- Filters -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-filter me-2"></i>Filters & Search
            </h6>
            <button class="btn btn-sm btn-outline-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#filtersCollapse">
                <i class="fas fa-chevron-down"></i>
            </button>
        </div>
        <div class="collapse show" id="filtersCollapse">
            <div class="card-body">
                <form method="GET" action="{{ route('general.reports.index') }}" class="row g-3">
                    <div class="col-md-2">
                        <label class="form-label">Period</label>
                        <select name="period" class="form-select" id="periodSelect">
                            <option value="day" {{ $period == 'day' ? 'selected' : '' }}>Daily</option>
                            <option value="week" {{ $period == 'week' ? 'selected' : '' }}>Weekly</option>
                            <option value="month" {{ $period == 'month' ? 'selected' : '' }}>Monthly</option>
                            <option value="year" {{ $period == 'year' ? 'selected' : '' }}>Yearly</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Start Date</label>
                        <input type="date" name="start_date" class="form-control" value="{{ $startDate }}">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">End Date</label>
                        <input type="date" name="end_date" class="form-control" value="{{ $endDate }}">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Payment Method</label>
                        <select name="payment_method" class="form-select">
                            <option value="">All Methods</option>
                            <option value="cash" {{ $paymentMethod == 'cash' ? 'selected' : '' }}>Cash</option>
                            <option value="card" {{ $paymentMethod == 'card' ? 'selected' : '' }}>Card</option>
                            <option value="mobile" {{ $paymentMethod == 'mobile' ? 'selected' : '' }}>Mobile Money</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Search</label>
                        <input type="text" name="search" class="form-control" placeholder="Search items..." value="{{ $search }}">
                    </div>
                    <div class="col-md-1">
                        <label class="form-label">&nbsp;</label>
                        <button type="submit" class="btn btn-primary d-block">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Summary Cards -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Sales</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                ${{ number_format($totals['total_sales'], 2) }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Total Expenses</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                ${{ number_format($totals['total_expenses'], 2) }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-credit-card fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Net Profit</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 {{ $totals['net_profit'] >= 0 ? 'text-success' : 'text-danger' }}">
                                ${{ number_format($totals['net_profit'], 2) }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-chart-line fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Profit Margin</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $totals['profit_margin'] }}%
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-percentage fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart -->
    <div class="row mb-4">
        <div class="col-xl-12">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-chart-area me-2"></i>Sales vs Expenses Trend
                    </h6>
                </div>
                <div class="card-body">
                    <canvas id="revenueChart" width="100%" height="30"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Detailed Tables -->
    <div class="row">
        <!-- Sales Table -->
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-shopping-cart me-2"></i>Sales Details
                    </h6>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs" id="salesTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="drinks-tab" data-bs-toggle="tab" data-bs-target="#drinks" type="button" role="tab">
                                Drinks ({{ $salesData['drinks']->count() }})
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="foods-tab" data-bs-toggle="tab" data-bs-target="#foods" type="button" role="tab">
                                Foods ({{ $salesData['foods']->count() }})
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content" id="salesTabContent">
                        <div class="tab-pane fade show active" id="drinks" role="tabpanel">
                            <div class="table-responsive mt-3">
                                <table class="table table-bordered table-striped">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>Date</th>
                                            <th>Drink</th>
                                            <th>Qty</th>
                                            <th>Price</th>
                                            <th>Total</th>
                                            <th>Payment</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($salesData['drinks'] as $sale)
                                        <tr>
                                            <td>{{ $sale->created_at->format('M d, Y H:i') }}</td>
                                            <td>{{ $sale->drink->name ?? 'N/A' }}</td>
                                            <td>{{ $sale->quantity }}</td>
                                            <td>${{ number_format($sale->price, 2) }}</td>
                                            <td class="fw-bold">${{ number_format($sale->total, 2) }}</td>
                                            <td>
                                                <span class="badge bg-{{ $sale->payment_method == 'cash' ? 'success' : ($sale->payment_method == 'card' ? 'info' : 'warning') }}">
                                                    {{ ucfirst($sale->payment_method) }}
                                                </span>
                                            </td>
                                            <td>
                                                @if($sale->is_paid)
                                                    <span class="badge bg-success">Paid</span>
                                                @else
                                                    <span class="badge bg-warning">Pending</span>
                                                @endif
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="7" class="text-center text-muted">No drink sales found</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                    @if($salesData['drinks']->count() > 0)
                                    <tfoot class="table-light">
                                        <tr>
                                            <th colspan="4">Drinks Total:</th>
                                            <th colspan="3">${{ number_format($salesData['drink_total'], 2) }}</th>
                                        </tr>
                                    </tfoot>
                                    @endif
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="foods" role="tabpanel">
                            <div class="table-responsive mt-3">
                                <table class="table table-bordered table-striped">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>Date</th>
                                            <th>Food</th>
                                            <th>Qty</th>
                                            <th>Price</th>
                                            <th>Total</th>
                                            <th>Payment</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($salesData['foods'] as $sale)
                                        <tr>
                                            <td>{{ $sale->created_at->format('M d, Y H:i') }}</td>
                                            <td>{{ $sale->food->name ?? 'N/A' }}</td>
                                            <td>{{ $sale->quantity }}</td>
                                            <td>${{ number_format($sale->price, 2) }}</td>
                                            <td class="fw-bold">${{ number_format($sale->total, 2) }}</td>
                                            <td>
                                                <span class="badge bg-{{ $sale->payment_method == 'cash' ? 'success' : ($sale->payment_method == 'card' ? 'info' : 'warning') }}">
                                                    {{ ucfirst($sale->payment_method) }}
                                                </span>
                                            </td>
                                            <td>
                                                @if($sale->is_paid)
                                                    <span class="badge bg-success">Paid</span>
                                                @else
                                                    <span class="badge bg-warning">Pending</span>
                                                @endif
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="7" class="text-center text-muted">No food sales found</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                    @if($salesData['foods']->count() > 0)
                                    <tfoot class="table-light">
                                        <tr>
                                            <th colspan="4">Foods Total:</th>
                                            <th colspan="3">${{ number_format($salesData['food_total'], 2) }}</th>
                                        </tr>
                                    </tfoot>
                                    @endif
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Expenses Table -->
        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-receipt me-2"></i>Expenses ({{ $expenseData['expenses']->count() }})
                    </h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive" style="max-height: 600px; overflow-y: auto;">
                        <table class="table table-bordered table-striped table-sm">
                            <thead class="table-dark sticky-top">
                                <tr>
                                    <th>Date</th>
                                    <th>Item</th>
                                    <th>Amount</th>
                                    <th>Payment</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($expenseData['expenses'] as $expense)
                                <tr>
                                    <td>{{ $expense->expense_date->format('M d') }}</td>
                                    <td>
                                        <div class="fw-bold">{{ $expense->item_name }}</div>
                                        <small class="text-muted">{{ $expense->category->name ?? 'Uncategorized' }}</small>
                                    </td>
                                    <td class="fw-bold text-danger">${{ number_format($expense->amount, 2) }}</td>
                                    <td>
                                        <span class="badge bg-{{ $expense->payment_method == 'cash' ? 'success' : ($expense->payment_method == 'card' ? 'info' : 'warning') }} text-xs">
                                            {{ ucfirst($expense->payment_method) }}
                                        </span>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted">No expenses found</td>
                                </tr>
                                @endforelse
                            </tbody>
                            @if($expenseData['expenses']->count() > 0)
                            <tfoot class="table-light sticky-bottom">
                                <tr>
                                    <th colspan="2">Total Expenses:</th>
                                    <th colspan="2" class="text-danger">${{ number_format($expenseData['total_expenses'], 2) }}</th>
                                </tr>
                            </tfoot>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
// Chart configuration
const ctx = document.getElementById('revenueChart').getContext('2d');
const revenueChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: {!! json_encode($chartData['labels']) !!},
        datasets: [{
            label: 'Sales',
            data: {!! json_encode($chartData['sales']) !!},
            borderColor: 'rgb(54, 162, 235)',
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            tension: 0.1,
            fill: true
        }, {
            label: 'Expenses',
            data: {!! json_encode($chartData['expenses']) !!},
            borderColor: 'rgb(255, 99, 132)',
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            tension: 0.1,
            fill: true
        }]
    },
    options: {
        responsive: true,
        interaction: {
            mode: 'index',
            intersect: false,
        },
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    callback: function(value, index, ticks) {
                        return ' + value.toLocaleString();
                    }
                }
            }
        },
        plugins: {
            tooltip: {
                callbacks: {
                    label: function(context) {
                        return context.dataset.label + ':  + context.parsed.y.toLocaleString();
                    }
                }
            }
        }
    }
});

// Export functions
function exportReport(format) {
    const params = new URLSearchParams(window.location.search);
    params.set('format', format);
    
    let url;
    switch(format) {
        case 'pdf':
            url = '{{ route("general.reports.export.pdf") }}?' + params.toString();
            break;
        case 'excel':
            url = '{{ route("general.reports.export.excel") }}?' + params.toString();
            break;
        case 'csv':
            url = '{{ route("general.reports.export.csv") }}?' + params.toString();
            break;
        default:
            return;
    }
    
    window.open(url, '_blank');
}

// Period select change handler
document.getElementById('periodSelect').addEventListener('change', function() {
    const period = this.value;
    const startDateInput = document.querySelector('input[name="start_date"]');
    const endDateInput = document.querySelector('input[name="end_date"]');
    
    const today = new Date();
    let startDate, endDate;
    
    switch(period) {
        case 'day':
            startDate = endDate = today.toISOString().split('T')[0];
            break;
        case 'week':
            const startOfWeek = new Date(today.setDate(today.getDate() - today.getDay()));
            const endOfWeek = new Date(today.setDate(today.getDate() - today.getDay() + 6));
            startDate = startOfWeek.toISOString().split('T')[0];
            endDate = endOfWeek.toISOString().split('T')[0];
            break;
        case 'month':
            startDate = new Date(today.getFullYear(), today.getMonth(), 1).toISOString().split('T')[0];
            endDate = new Date(today.getFullYear(), today.getMonth() + 1, 0).toISOString().split('T')[0];
            break;
        case 'year':
            startDate = new Date(today.getFullYear(), 0, 1).toISOString().split('T')[0];
            endDate = new Date(today.getFullYear(), 11, 31).toISOString().split('T')[0];
            break;
    }
    
    startDateInput.value = startDate;
    endDateInput.value = endDate;
});

// Auto-submit form on period change
document.getElementById('periodSelect').addEventListener('change', function() {
    setTimeout(() => {
        this.closest('form').submit();
    }, 100);
});
</script>

@endsection