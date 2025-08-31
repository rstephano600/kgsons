@extends('layouts.app')

@section('title', 'User Login Logs')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item">
                <a href="#" class="text-decoration-none">Dashboard</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Login Logs</li>
        </ol>
    </nav>
@endsection

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="h3 fw-semibold text-dark">User Login Activity</h2>
            <div class="d-flex align-items-center gap-2">
                <span class="small text-muted">Total Logs: {{ $logins->total() }}</span>
            </div>
        </div>

        <!-- Filters -->
        <div class="card border mb-4">
            <div class="card-body">
                <form method="GET" action="{{ route('user-logins.index') }}">
                    <div class="row g-3">
                        <!-- Search -->
                        <div class="col-md-3">
                            <label for="search" class="form-label">Search</label>
                            <input type="text" name="search" id="search" 
                                   class="form-control" 
                                   placeholder="Name, email or IP" 
                                   value="{{ request('search') }}">
                        </div>

                        <!-- Role Filter -->
                        <div class="col-md-2">
                            <label for="role" class="form-label">Role</label>
                            <select name="role" id="role" class="form-select">
                                <option value="">All Roles</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role }}" {{ request('role') == $role ? 'selected' : '' }}>
                                        {{ ucfirst($role) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Date Filter -->
                        <div class="col-md-2">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" name="date" id="date" 
                                   class="form-control" 
                                   value="{{ request('date') }}">
                        </div>

                        <!-- Action Buttons -->
                        <div class="col-md-3 d-flex align-items-end gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-filter me-2"></i> Filter
                            </button>
                            <a href="{{ route('user-logins.index') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-sync-alt me-2"></i> Reset
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Logs Table -->
        <div class="card border">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="border-0">User</th>
                                <th class="border-0">Email</th>
                                <th class="border-0">Role</th>
                                <th class="border-0">IP Address</th>
                                <th class="border-0">Device</th>
                                <th class="border-0">Login Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($logins as $login)
                            <tr>
                                <td>
                                    <div class="fw-medium text-dark">{{ $login->name }}</div>
                                </td>
                                <td class="text-dark">{{ $login->email }}</td>
                                <td>
                                    <span class="badge bg-primary bg-opacity-10 text-primary">
                                        {{ ucfirst($login->role) }}
                                    </span>
                                </td>
                                <td class="text-muted">{{ $login->ip_address }}</td>
                                <td class="text-muted">
                                    <span class="device-tooltip" data-bs-toggle="tooltip" 
                                          title="{{ $login->user_agent }}">
                                        {{ Str::limit($login->user_agent, 50) }}
                                    </span>
                                </td>
                                <td class="text-muted">
                                    {{ \Carbon\Carbon::parse($login->login_time)->format('d M Y, H:i') }}
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center py-4 text-muted">
                                    No login records found matching your criteria.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        @if($logins->hasPages())
            <div class="d-flex justify-content-center mt-4">
                {{ $logins->withQueryString()->links('pagination::bootstrap-5') }}
            </div>
        @endif
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Initialize Bootstrap tooltips
    document.addEventListener('DOMContentLoaded', function() {
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        const tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl, {
                placement: 'top',
                trigger: 'hover'
            });
        });
    });
</script>
@endpush