@extends('layouts.app')

@section('title', 'Secretary Dashboard')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="h3 fw-semibold text-dark">Secretary Dashboard</h2>
            <div class="small text-muted">Today: {{ now()->format('l, F j') }}</div>
        </div>
<!-- Quick Links Section -->
<div class="card border mb-4">
    <div class="card-body">
        <h3 class="h5 fw-medium text-dark mb-3">Quick Links</h3>
        <div class="row g-3">
            <!-- Add Food Sales -->
            <div class="col-sm-6 col-md-3">
                <a href="{{ route('food_sales.index') }}" 
                   class="d-block p-3 border rounded text-center text-decoration-none hover-effect">
                    <i class="fas fa-cash-register text-primary fs-3 mb-2"></i>
                    <p class="mb-0 small fw-medium">Add Food Sales</p>
                </a>
            </div>
            
            <!-- Add Drinks Sales -->
            <div class="col-sm-6 col-md-3">
                <a href="{{ route('drink_sales.index') }}" 
                   class="d-block p-3 border rounded text-center text-decoration-none hover-effect">
                    <i class="fas fa-cash-register text-primary fs-3 mb-2"></i>
                    <p class="mb-0 small fw-medium">Add Drinks Sales</p>
                </a>
            </div>
            
            <!-- Food Sales Report -->
            <div class="col-sm-6 col-md-3">
                <a href="{{ route('reports.food_sales') }}" 
                   class="d-block p-3 border rounded text-center text-decoration-none hover-effect">
                    <i class="fas fa-receipt text-success fs-3 mb-2"></i>
                    <p class="mb-0 small fw-medium">Food Sales Report</p>
                </a>
            </div>
            
            <!-- Drink Sales Report -->
            <div class="col-sm-6 col-md-3">
                <a href="{{ route('reports.drink_sales') }}" 
                   class="d-block p-3 border rounded text-center text-decoration-none hover-effect">
                    <i class="fas fa-receipt text-success fs-3 mb-2"></i>
                    <p class="mb-0 small fw-medium">Drink Sales Report</p>
                </a>
            </div>
        </div>
    </div>
</div>

<style>
    .hover-effect {
        transition: all 0.2s ease-in-out;
    }
    .hover-effect:hover {
        transform: translateY(-2px);
        box-shadow: 0 0.25rem 0.5rem rgba(0, 0, 0, 0.1);
        border-color: var(--bs-primary) !important;
    }
</style>

<!-- 
        <div class="row mb-4">

            <div class="col-md-4 mb-3">
                <div class="card border-0 bg-pink bg-opacity-10">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="small fw-medium text-pink mb-1">Appointments Today</p>
                                <p class="h4 fw-bold text-pink mb-0">5</p>
                            </div>
                            <i class="fas fa-calendar-day text-pink opacity-75 fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="card border-0 bg-primary bg-opacity-10">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="small fw-medium text-primary mb-1">Pending Documents</p>
                                <p class="h4 fw-bold text-primary mb-0">12</p>
                            </div>
                            <i class="fas fa-file-alt text-primary opacity-75 fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="card border-0 bg-success bg-opacity-10">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="small fw-medium text-success mb-1">Messages</p>
                                <p class="h4 fw-bold text-success mb-0">8</p>
                            </div>
                            <i class="fas fa-envelope text-success opacity-75 fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <div class="row">
            <!-- Today's Schedule -->
            <div class="col-lg-6 mb-3">
                <div class="card border h-100">
                    <div class="card-body">
                        <h3 class="h5 fw-medium text-dark mb-3">Today's Schedule</h3>
                        <div class="vstack gap-3">
                            @foreach(range(1,3) as $item)
                            <div class="border-start border-primary border-3 ps-3 py-1">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <p class="fw-medium mb-0">Meeting with {{ ['Client A','Department Head','Vendor'][$item-1] }}</p>
                                        <p class="small text-muted mb-0">{{ 9+$item }}:00 - {{ 10+$item }}:00</p>
                                    </div>
                                    <span class="badge bg-primary bg-opacity-10 text-primary small">Conference Room {{ $item }}</span>
                                </div>
                            </div>
                            @endforeach
                            <a href="#" class="text-center small text-primary text-decoration-none mt-2">
                                View Full Calendar →
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="col-lg-6 mb-3">
                <div class="card border h-100">
                    <div class="card-body">
                        <h3 class="h5 fw-medium text-dark mb-3">Quick Actions</h3>
                        <div class="row g-2">
                            <div class="col-6">
                                <a href="#" class="btn btn-outline-secondary w-100 py-2">
                                    <i class="fas fa-plus me-2"></i> New Appointment
                                </a>
                            </div>
                            <div class="col-6">
                                <a href="#" class="btn btn-outline-secondary w-100 py-2">
                                    <i class="fas fa-file-import me-2"></i> Upload Document
                                </a>
                            </div>
                            <div class="col-6">
                                <a href="#" class="btn btn-outline-secondary w-100 py-2">
                                    <i class="fas fa-phone-alt me-2"></i> Call Log
                                </a>
                            </div>
                            <div class="col-6">
                                <a href="#" class="btn btn-outline-secondary w-100 py-2">
                                    <i class="fas fa-tasks me-2"></i> Task List
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
    .bg-pink {
        background-color: #d63384 !important;
    }
    .text-pink {
        color: #d63384 !important;
    }
</style>