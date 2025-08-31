@extends('layouts.app')

@section('title', 'Staff Dashboard')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="h3 fw-semibold text-dark">Staff Dashboard</h2>
            <div class="small text-muted">Current Task: Complete monthly report</div>
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
        <div class="row mb-4">
            <!-- Assigned Tasks Card -->
            <div class="col-md-4 mb-3">
                <div class="card border-0 bg-primary bg-opacity-10">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="small fw-medium text-primary mb-1">Assigned Tasks</p>
                                <p class="h4 fw-bold text-primary mb-0">7</p>
                            </div>
                            <i class="fas fa-clipboard-check text-primary opacity-75 fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Approval Card -->
            <div class="col-md-4 mb-3">
                <div class="card border-0 bg-warning bg-opacity-10">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="small fw-medium text-warning mb-1">Pending Approval</p>
                                <p class="h4 fw-bold text-warning mb-0">3</p>
                            </div>
                            <i class="fas fa-hourglass-half text-warning opacity-75 fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Completed This Week Card -->
            <div class="col-md-4 mb-3">
                <div class="card border-0 bg-success bg-opacity-10">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="small fw-medium text-success mb-1">Completed This Week</p>
                                <p class="h4 fw-bold text-success mb-0">5</p>
                            </div>
                            <i class="fas fa-check-circle text-success opacity-75 fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- My Tasks -->
        <div class="card border">
            <div class="card-body">
                <h3 class="h5 fw-medium text-dark mb-3">My Tasks</h3>
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="border-0">Task</th>
                                <th class="border-0">Priority</th>
                                <th class="border-0">Due Date</th>
                                <th class="border-0">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(range(1,5) as $item)
                            <tr>
                                <td class="fw-medium">Task {{ $item }}</td>
                                <td>
                                    <span class="badge 
                                        @if($item == 1) bg-danger bg-opacity-10 text-danger
                                        @elseif($item == 2) bg-warning bg-opacity-10 text-warning
                                        @else bg-secondary bg-opacity-10 text-secondary @endif">
                                        @if($item == 1) High
                                        @elseif($item == 2) Medium
                                        @else Low @endif
                                    </span>
                                </td>
                                <td class="text-muted">
                                    {{ now()->addDays($item)->format('M d') }}
                                </td>
                                <td>
                                    <span class="badge 
                                        @if($item%3 == 0) bg-success bg-opacity-10 text-success
                                        @elseif($item%3 == 1) bg-primary bg-opacity-10 text-primary
                                        @else bg-secondary bg-opacity-10 text-secondary @endif">
                                        @if($item%3 == 0) Completed
                                        @elseif($item%3 == 1) In Progress
                                        @else Pending @endif
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
