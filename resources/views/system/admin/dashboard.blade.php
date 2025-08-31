@extends('layouts.app')

@section('title', 'Dashboard')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item">
                <a href="#" class="text-decoration-none">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="mb-4">
        <h2 class="h3 fw-semibold text-dark">Welcome back, {{ Auth::user()->name }}!</h2>
        <p class="text-muted mb-0">Here's what's happening with your account today.</p>
    </div>
    
    <!-- Stats Cards -->
    <div class="row mb-4">
        <div class="col-12 col-md-6 col-lg-3 mb-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted small mb-1">Total Projects</p>
                            <p class="h4 fw-semibold mb-0">24</p>
                        </div>
                        <div class="p-3 rounded-circle bg-primary bg-opacity-10 text-primary">
                            <i class="fas fa-project-diagram"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <span class="badge bg-success bg-opacity-10 text-success">+2.5%</span>
                        <span class="text-muted small ms-2">from last month</span>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- More stat cards would go here in similar col structure -->
    </div>
    

    
    <!-- Quick Actions -->
    <div class="row">
        <div class="col-12 col-md-6 mb-3 mb-md-0">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <h3 class="h5 fw-medium mb-3">Quick Actions</h3>
                    <div class="row g-3">

                    <!-- User Management -->
                    <div class="col-6">
                        <a href="{{ route('users.users.index') }}" class="d-block p-3 border rounded text-center text-decoration-none hover-shadow">
                            <i class="fas fa-users text-primary fs-4 mb-2"></i>
                            <p class="mb-0 small fw-medium">User Management</p>
                        </a>
                    </div>

                    <!-- Add Food Sales -->
                    <div class="col-6">
                        <a href="{{ route('food_sales.index') }}" class="d-block p-3 border rounded text-center text-decoration-none hover-shadow">
                            <i class="fas fa-cash-register text-primary fs-4 mb-2"></i>
                            <p class="mb-0 small fw-medium">Add Food Sales</p>
                        </a>
                    </div>

                    <!-- Add Drink Sales -->
                    <div class="col-6">
                        <a href="{{ route('drink_sales.index') }}" class="d-block p-3 border rounded text-center text-decoration-none hover-shadow">
                            <i class="fas fa-cash-register text-primary fs-4 mb-2"></i>
                            <p class="mb-0 small fw-medium">Add Drinks Sales</p>
                        </a>
                    </div>

                    <!-- Food Sales Report -->
                    <div class="col-6">
                        <a href="{{ route('reports.food_sales') }}" class="d-block p-3 border rounded text-center text-decoration-none hover-shadow">
                            <i class="fas fa-receipt text-primary fs-4 mb-2"></i>
                            <p class="mb-0 small fw-medium">Food Sales Report</p>
                        </a>
                    </div>

                    <!-- Drink Sales Report -->
                    <div class="col-6">
                        <a href="{{ route('reports.drink_sales') }}" class="d-block p-3 border rounded text-center text-decoration-none hover-shadow">
                            <i class="fas fa-receipt text-primary fs-4 mb-2"></i>
                            <p class="mb-0 small fw-medium">Drink Sales Report</p>
                        </a>
                    </div>

                    <!-- Customer Servers -->
                    <div class="col-6">
                        <a href="{{ route('customer_services.index') }}" class="d-block p-3 border rounded text-center text-decoration-none hover-shadow">
                            <i class="fas fa-user-check text-primary fs-4 mb-2"></i>
                            <p class="mb-0 small fw-medium">Customer Servers</p>
                        </a>
                    </div>

                    <!-- Food Management -->
                    <div class="col-6">
                        <a href="{{ route('foods.index') }}" class="d-block p-3 border rounded text-center text-decoration-none hover-shadow">
                            <i class="fas fa-utensils text-primary fs-4 mb-2"></i>
                            <p class="mb-0 small fw-medium">Food Management</p>
                        </a>
                    </div>

                    <!-- Drinks Management -->
                    <div class="col-6">
                        <a href="{{ route('drinks.index') }}" class="d-block p-3 border rounded text-center text-decoration-none hover-shadow">
                            <i class="fas fa-wine-glass text-primary fs-4 mb-2"></i>
                            <p class="mb-0 small fw-medium">Drinks Management</p>
                        </a>
                    </div>

                    <!-- User Logs -->
                    <div class="col-6">
                        <a href="{{ route('user-logins.index') }}" class="d-block p-3 border rounded text-center text-decoration-none hover-shadow">
                            <i class="fas fa-users text-primary fs-4 mb-2"></i>
                            <p class="mb-0 small fw-medium">User Logs</p>
                        </a>
                    </div>

                    <!-- System Settings -->
                    <div class="col-6">
                        <a href="{{ route('admin.settings') }}" class="d-block p-3 border rounded text-center text-decoration-none hover-shadow">
                            <i class="fas fa-cog text-primary fs-4 mb-2"></i>
                            <p class="mb-0 small fw-medium">System Settings</p>
                        </a>
                    </div>

                    <!-- Reports -->
                    <div class="col-6">
                        <a href="{{ route('admin.reports') }}" class="d-block p-3 border rounded text-center text-decoration-none hover-shadow">
                            <i class="fas fa-chart-bar text-primary fs-4 mb-2"></i>
                            <p class="mb-0 small fw-medium">Reports</p>
                        </a>
                    </div>

                    </div>
                </div>
            </div>
        </div>
        
        <!-- Deadline Reports -->
<div class="col-12 col-md-6">
    <div class="card border-0 shadow-sm h-100">
        <div class="card-body">
            <h3 class="h5 fw-medium mb-3">Deadline Reports</h3>

            <!-- Deadline Item 1 -->
            <div class="d-flex align-items-center mb-3">
                <div class="flex-shrink-0">
                    <div class="bg-danger bg-opacity-10 text-danger p-2 rounded-circle">
                        <i class="fas fa-exclamation-circle"></i>
                    </div>
                </div>
                <div class="flex-grow-1 ms-3">
                    <p class="mb-0 fw-medium">Quarterly Report</p>
                    <p class="mb-0 small text-muted">Due in 3 days</p>
                </div>
            </div>

            <!-- Deadline Item 2 -->
            <div class="d-flex align-items-center mb-3">
                <div class="flex-shrink-0">
                    <div class="bg-warning bg-opacity-10 text-warning p-2 rounded-circle">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                </div>
                <div class="flex-grow-1 ms-3">
                    <p class="mb-0 fw-medium">Annual Financial Summary</p>
                    <p class="mb-0 small text-muted">Due in 7 days</p>
                </div>
            </div>

            <!-- Deadline Item 3 -->
            <div class="d-flex align-items-center mb-3">
                <div class="flex-shrink-0">
                    <div class="bg-info bg-opacity-10 text-info p-2 rounded-circle">
                        <i class="fas fa-file-invoice"></i>
                    </div>
                </div>
                <div class="flex-grow-1 ms-3">
                    <p class="mb-0 fw-medium">Client Invoice Review</p>
                    <p class="mb-0 small text-muted">Due tomorrow</p>
                </div>
            </div>

            <!-- Deadline Item 4 -->
            <div class="d-flex align-items-center">
                <div class="flex-shrink-0">
                    <div class="bg-secondary bg-opacity-10 text-secondary p-2 rounded-circle">
                        <i class="fas fa-clipboard-check"></i>
                    </div>
                </div>
                <div class="flex-grow-1 ms-3">
                    <p class="mb-0 fw-medium">Project Alpha Closure</p>
                    <p class="mb-0 small text-muted">Due in 10 days</p>
                </div>
            </div>

        </div>
    </div>
</div>

    </div>
    </div>
@endsection

<style>
    .hover-shadow:hover {
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        transition: box-shadow 0.15s ease-in-out;
    }
    .breadcrumb {
        padding: 0;
        background: transparent;
    }
</style>