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
    
    <!-- Recent Activity -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-header bg-white py-3">
            <h3 class="h5 fw-medium mb-0">Recent Activity</h3>
        </div>
        <div class="card-body p-0">
            <div class="list-group list-group-flush">
                <!-- Activity items would go here -->
                <div class="list-group-item border-0 py-3">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="bg-primary bg-opacity-10 text-primary p-2 rounded-circle">
                                <i class="fas fa-tasks"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <p class="mb-0 fw-medium">New task assigned</p>
                            <p class="mb-0 small text-muted">2 hours ago</p>
                        </div>
                    </div>
                </div>
                <!-- More activity items -->
            </div>
        </div>
    </div>
    
    <!-- Quick Actions -->
    <div class="row">
        <div class="col-12 col-md-6 mb-3 mb-md-0">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <h3 class="h5 fw-medium mb-3">Quick Actions</h3>
                    <div class="row g-3">
                        <div class="col-6">
                            <a href="#" class="d-block p-3 border rounded text-center text-decoration-none hover-shadow">
                                <i class="fas fa-plus text-primary fs-4 mb-2"></i>
                                <p class="mb-0 small fw-medium">New Project</p>
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="#" class="d-block p-3 border rounded text-center text-decoration-none hover-shadow">
                                <i class="fas fa-file-alt text-primary fs-4 mb-2"></i>
                                <p class="mb-0 small fw-medium">Reports</p>
                            </a>
                        </div>
                        <!-- More quick actions -->
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Upcoming Deadlines -->
        <div class="col-12 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <h3 class="h5 fw-medium mb-3">Upcoming Deadlines</h3>
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
                    <!-- More deadline items -->
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