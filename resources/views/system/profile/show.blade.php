@extends('layouts.app')

@section('title', 'My Profile')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item">
                <a href="#" class="text-decoration-none">Dashboard</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">My Profile</li>
        </ol>
    </nav>
@endsection

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-body">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4">
            <div class="d-flex align-items-center mb-3 mb-md-0">
                <div class="me-4">
                    <img class="rounded-circle object-fit-cover border" 
                         src="{{ $user->photo ? asset('storage/'.$user->photo) : asset('images/default-avatar.png') }}" 
                         alt="{{ $user->name }}" style="width: 80px; height: 80px;">
                </div>
                <div>
                    <h2 class="h4 fw-semibold text-dark mb-0">{{ $user->name }}</h2>
                    <p class="text-muted mb-0">{{ $user->role_name }}</p>
                </div>
            </div>
            <a href="{{ route('profile.edit') }}" class="btn btn-primary">
                <i class="fas fa-edit me-2"></i> Edit Profile
            </a>
        </div>

        <div class="row g-4">
            <!-- Personal Information -->
            <div class="col-md-6">
                <div class="card border">
                    <div class="card-body">
                        <h3 class="h5 fw-medium text-dark mb-3">Personal Information</h3>
                        <div class="vstack gap-3">
                            <div>
                                <p class="small text-muted mb-1">Full Name</p>
                                <p class="mb-0 text-dark">{{ $user->name }}</p>
                            </div>
                            <div>
                                <p class="small text-muted mb-1">Email Address</p>
                                <p class="mb-0 text-dark">{{ $user->email }}</p>
                            </div>
                            <div>
                                <p class="small text-muted mb-1">Phone Number</p>
                                <p class="mb-0 text-dark">{{ $user->phone ?? 'Not provided' }}</p>
                            </div>
                            <div>
                                <p class="small text-muted mb-1">Account Status</p>
                                <span class="badge 
                                    @if($user->status === 'active') bg-success bg-opacity-10 text-success
                                    @else bg-danger bg-opacity-10 text-danger @endif">
                                    {{ ucfirst($user->status) }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Account Information -->
            <div class="col-md-6">
                <div class="card border">
                    <div class="card-body">
                        <h3 class="h5 fw-medium text-dark mb-3">Account Information</h3>
                        <div class="vstack gap-3">
                            <div>
                                <p class="small text-muted mb-1">Role</p>
                                <span class="badge 
                                    @if($user->role === 'admin') bg-purple bg-opacity-10 text-purple
                                    @elseif(in_array($user->role, ['director', 'assistantdirector'])) bg-primary bg-opacity-10 text-primary
                                    @elseif(in_array($user->role, ['manager', 'secretary'])) bg-success bg-opacity-10 text-success
                                    @elseif($user->role === 'staff') bg-warning bg-opacity-10 text-warning
                                    @else bg-secondary bg-opacity-10 text-secondary @endif">
                                    {{ $user->role_name }}
                                </span>
                            </div>
                            <div>
                                <p class="small text-muted mb-1">Member Since</p>
                                <p class="mb-0 text-dark">{{ $user->created_at->format('M d, Y') }}</p>
                            </div>
                            <div>
                                <p class="small text-muted mb-1">Last Login</p>
                                <p class="mb-0 text-dark">{{ $user->last_login_at ? $user->last_login_at->diffForHumans() : 'Never' }}</p>
                            </div>
                            <div>
                                <p class="small text-muted mb-1">Password</p>
                                <p class="mb-0 text-dark">••••••••</p>
                                <a href="{{ route('profile.edit') }}#password" class="small text-primary text-decoration-none">
                                    Change Password
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
    .bg-purple {
        background-color: #6f42c1 !important;
    }
    .text-purple {
        color: #6f42c1 !important;
    }
</style>