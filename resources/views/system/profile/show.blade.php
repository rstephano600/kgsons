@extends('layouts.app')

@section('title', 'My Profile')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="flex items-center space-x-2">
            <li>
                <a href="#" class="text-gray-400 hover:text-gray-500">Dashboard</a>
            </li>
            <li class="flex items-center">
                <i class="fas fa-chevron-right text-gray-400 text-xs mx-2"></i>
            </li>
            <li class="text-gray-600" aria-current="page">My Profile</li>
        </ol>
    </nav>
@endsection

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <div class="flex flex-col md:flex-row items-start md:items-center justify-between mb-8">
        <div class="flex items-center mb-4 md:mb-0">
            <div class="mr-4">
                <img class="h-20 w-20 rounded-full object-cover border-2 border-gray-200" 
                     src="{{ $user->photo ? asset('storage/'.$user->photo) : asset('images/default-avatar.png') }}" 
                     alt="{{ $user->name }}">
            </div>
            <div>
                <h2 class="text-2xl font-semibold text-gray-800">{{ $user->name }}</h2>
                <p class="text-gray-600">{{ $user->role_name }}</p>
            </div>
        </div>
        <a href="{{ route('profile.edit') }}" class="btn-primary">
            <i class="fas fa-edit mr-2"></i> Edit Profile
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Personal Information -->
        <div class="bg-white rounded-lg border border-gray-200 p-6">
            <h3 class="text-lg font-medium text-gray-800 mb-4">Personal Information</h3>
            <div class="space-y-3">
                <div>
                    <p class="text-sm font-medium text-gray-500">Full Name</p>
                    <p class="text-gray-800">{{ $user->name }}</p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Email Address</p>
                    <p class="text-gray-800">{{ $user->email }}</p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Phone Number</p>
                    <p class="text-gray-800">{{ $user->phone ?? 'Not provided' }}</p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Account Status</p>
                    <span class="px-2 py-1 text-xs rounded-full 
                        @if($user->status === 'active') bg-green-100 text-green-800
                        @else bg-red-100 text-red-800 @endif">
                        {{ ucfirst($user->status) }}
                    </span>
                </div>
            </div>
        </div>

        <!-- Account Information -->
        <div class="bg-white rounded-lg border border-gray-200 p-6">
            <h3 class="text-lg font-medium text-gray-800 mb-4">Account Information</h3>
            <div class="space-y-3">
                <div>
                    <p class="text-sm font-medium text-gray-500">Role</p>
                    <span class="px-2 py-1 text-xs rounded-full 
                        @if($user->role === 'admin') bg-purple-100 text-purple-800
                        @elseif(in_array($user->role, ['director', 'assistantdirector'])) bg-blue-100 text-blue-800
                        @elseif(in_array($user->role, ['manager', 'secretary'])) bg-green-100 text-green-800
                        @elseif($user->role === 'staff') bg-yellow-100 text-yellow-800
                        @else bg-gray-100 text-gray-800 @endif">
                        {{ $user->role_name }}
                    </span>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Member Since</p>
                    <p class="text-gray-800">{{ $user->created_at->format('M d, Y') }}</p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Last Login</p>
                    <p class="text-gray-800">{{ $user->last_login_at ? $user->last_login_at->diffForHumans() : 'Never' }}</p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Password</p>
                    <p class="text-gray-800">••••••••</p>
                    <a href="{{ route('profile.edit') }}#password" class="text-sm text-blue-600 hover:text-blue-800">
                        Change Password
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection