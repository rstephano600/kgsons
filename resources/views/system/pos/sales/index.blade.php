@extends('layouts.app')

@section('title', 'Dashboard - POS System')

@section('content')
<div class="container-fluid py-4">
    <!-- Header Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="h3 mb-0 text-primary">
                    <i class="fas fa-chart-line me-2"></i>Sales Dashboard
                </h1>
                <div class="d-flex gap-2">
                    <!-- Period Filter Buttons -->
                    <div class="btn-group" role="group" aria-label="Period filter">
                        <input type="radio" class="btn-check" name="period" id="day" value="day" {{ $period == 'day' ? 'checked' : '' }}>
                        <label class="btn btn-outline-primary" for="day">Today</label>

                        <input type="radio" class="btn-check" name="period" id="week" value="week" {{ $period == 'week' ? 'checked' : '' }}>
                        <label class="btn btn-outline-primary" for="week">This Week</label>

                        <input type="radio" class="btn-check" name="period" id="month" value="month" {{ $period == 'month' ? 'checked' : '' }}>
                        <label class="btn btn-outline-primary" for="month">This Month</label>

                        <input type="radio" class="btn-check" name="period" id="year" value="year" {{ $period == 'year' ? 'checked' : '' }}>
                        <label class="btn btn-outline-primary" for="year">This Year</label>
                    </div>
                    
                    <!-- Export Button -->
                    <div class="dropdown">
                        <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            <i class="fas fa-download me-1"></i>Export Report
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item export-btn" href="#" data-format="pdf">
                                <i class="fas fa-file-pdf me-2"></i>PDF Report
                            </a></li>
                            <li><a class="dropdown-item export-btn" href="#" data-format="excel">
                                <i class="fas fa-file-excel me-2"></i>Excel Report
                            </a></li>
                            <li><a class="dropdown-item export-btn" href="#" data-format="csv">
                                <i class="fas fa-file-csv me-2"></i>CSV Report
                            </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Loading Spinner -->
    <div id="loading-spinner" class="d-none text-center py-5">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        <p class="mt-2">Loading dashboard data...</p>
    </div>

    <!-- Dashboard Content -->
    <div id="dashboard-content">
        <!-- Summary Cards -->
        <div class="row mb-4">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="card-title text-muted mb-1">Total Revenue</h6>
                                <h3 class="mb-0 text-success">
                                    ${{ number_format($combined_stats['total_revenue'], 2) }}
                                </h3>
                            </div>
                            <div class="text-success">
                                <i class="fas fa-dollar-sign fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="card-title text-muted mb-1">Total Orders</h6>
                                <h3 class="mb-0 text-primary">
                                    {{ number_format($combined_stats['total_orders']) }}
                                </h3>
                            </div>
                            <div class="text-primary">
                                <i class="fas fa-shopping-cart fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="card-title text-muted mb-1">Items Sold</h6>
                                <h3 class="mb-0 text-info">
                                    {{ number_format($combined_stats['total_items_sold']) }}
                                </h3>
                            </div>
                            <div class="text-info">
                                <i class="fas fa-boxes fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="card-title text-muted mb-1">Paid Orders</h6>
                                <h3 class="mb-0 text-success">
                                    {{ number_format($combined_stats['paid_orders']) }}
                                </h3>
                                @if($combined_stats['unpaid_orders'] > 0)
                                    <small class="text-warning">
                                        {{ $combined_stats['unpaid_orders'] }} unpaid
                                    </small>
                                @endif
                            </div>
                            <div class="text-success">
                                <i class="fas fa-check-circle fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sales Breakdown -->
        <div class="row mb-4">
            <!-- Drink Sales -->
            <div class="col-lg-6 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-glass-martini me-2"></i>Drink Sales
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <p class="mb-1"><strong>Revenue:</strong></p>
                                <h4 class="text-primary">${{ number_format($drink_sales['total_sales'], 2) }}</h4>
                            </div>
                            <div class="col-6">
                                <p class="mb-1"><strong>Orders:</strong></p>
                                <h4 class="text-info">{{ number_format($drink_sales['total_orders']) }}</h4>
                            </div>
                        </div>
                        
                        <hr>
                        
                        <h6 class="mb-3">Top Selling Drinks</h6>
                        @forelse($drink_sales['top_drinks'] as $drink)
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span>{{ $drink->name }}</span>
                                <div class="text-end">
                                    <small class="text-muted d-block">{{ $drink->total_quantity }} sold</small>
                                    <strong>${{ number_format($drink->total_sales, 2) }}</strong>
                                </div>
                            </div>
                        @empty
                            <p class="text-muted">No drink sales for this period</p>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Food Sales -->
            <div class="col-lg-6 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-warning text-dark">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-utensils me-2"></i>Food Sales
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <p class="mb-1"><strong>Revenue:</strong></p>
                                <h4 class="text-warning">${{ number_format($food_sales['total_sales'], 2) }}</h4>
                            </div>
                            <div class="col-6">
                                <p class="mb-1"><strong>Orders:</strong></p>
                                <h4 class="text-info">{{ number_format($food_sales['total_orders']) }}</h4>
                            </div>
                        </div>
                        
                        <hr>
                        
                        <h6 class="mb-3">Top Selling Foods</h6>
                        @forelse($food_sales['top_foods'] as $food)
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span>{{ $food->name }}</span>
                                <div class="text-end">
                                    <small class="text-muted d-block">{{ $food->total_quantity }} sold</small>
                                    <strong>${{ number_format($food->total_sales, 2) }}</strong>
                                </div>
                            </div>
                        @empty
                            <p class="text-muted">No food sales for this period</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        <!-- Payment Methods -->
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-info text-white">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-credit-card me-2"></i>Drink Payment Methods
                        </h5>
                    </div>
                    <div class="card-body">
                        @forelse($drink_sales['payment_methods'] as $method)
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="fw-semibold">{{ ucfirst($method->payment_method ?? 'N/A') }}</span>
                                <div class="text-end">
                                    <div class="badge bg-secondary">{{ $method->count }} orders</div>
                                    <div class="fw-bold">${{ number_format($method->total, 2) }}</div>
                                </div>
                            </div>
                        @empty
                            <p class="text-muted">No payment data available</p>
                        @endforelse
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mb-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-success text-white">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-credit-card me-2"></i>Food Payment Methods
                        </h5>
                    </div>
                    <div class="card-body">
                        @forelse($food_sales['payment_methods'] as $method)
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="fw-semibold">{{ ucfirst($method->payment_method ?? 'N/A') }}</span>
                                <div class="text-end">
                                    <div class="badge bg-secondary">{{ $method->count }} orders</div>
                                    <div class="fw-bold">${{ number_format($method->total, 2) }}</div>
                                </div>
                            </div>
                        @empty
                            <p class="text-muted">No payment data available</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Success Toast -->
<div class="toast-container position-fixed top-0 end-0 p-3">
    <div id="success-toast" class="toast" role="alert">
        <div class="toast-header">
            <i class="fas fa-check-circle text-success me-2"></i>
            <strong class="me-auto">Success</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
        </div>
        <div class="toast-body"></div>
    </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const periodButtons = document.querySelectorAll('input[name="period"]');
    const loadingSpinner = document.getElementById('loading-spinner');
    const dashboardContent = document.getElementById('dashboard-content');
    const exportButtons = document.querySelectorAll('.export-btn');
    
    // Period filter functionality
    periodButtons.forEach(button => {
        button.addEventListener('change', function() {
            if (this.checked) {
                updateDashboard(this.value);
            }
        });
    });
    
    // Export functionality
    exportButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const format = this.dataset.format;
            const currentPeriod = document.querySelector('input[name="period"]:checked').value;
            exportReport(format, currentPeriod);
        });
    });
    
    function updateDashboard(period) {
        // Show loading spinner
        loadingSpinner.classList.remove('d-none');
        dashboardContent.style.opacity = '0.5';
        
        // Make AJAX request
        fetch(`{{ route('dashboard.index') }}?period=${period}`, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json',
            }
        })
        .then(response => response.json())
        .then(data => {
            // Reload the page with new period parameter
            window.location.href = `{{ route('dashboard.index') }}?period=${period}`;
        })
        .catch(error => {
            console.error('Error:', error);
            showToast('Error loading dashboard data', 'error');
        })
        .finally(() => {
            loadingSpinner.classList.add('d-none');
            dashboardContent.style.opacity = '1';
        });
    }
    
    function exportReport(format, period) {
        const exportUrl = `{{ route('dashboard.export') }}?format=${format}&period=${period}`;
        
        fetch(exportUrl)
        .then(response => response.json())
        .then(data => {
            showToast(`Report exported successfully as ${format.toUpperCase()}`, 'success');
        })
        .catch(error => {
            console.error('Export error:', error);
            showToast('Error exporting report', 'error');
        });
    }
    
    function showToast(message, type = 'success') {
        const toast = document.getElementById('success-toast');
        const toastBody = toast.querySelector('.toast-body');
        const toastIcon = toast.querySelector('.toast-header i');
        
        toastBody.textContent = message;
        
        if (type === 'error') {
            toastIcon.className = 'fas fa-exclamation-circle text-danger me-2';
        } else {
            toastIcon.className = 'fas fa-check-circle text-success me-2';
        }
        
        const bsToast = new bootstrap.Toast(toast);
        bsToast.show();
    }
});
</script>
@endsection

@section('styles')
<style>
.card {
    transition: transform 0.2s ease-in-out;
}

.card:hover {
    transform: translateY(-2px);
}

.btn-check:checked + .btn {
    transform: scale(0.98);
}

.toast-container {
    z-index: 1050;
}
</style>
@endsection