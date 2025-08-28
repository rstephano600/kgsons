@extends('layouts.app')

@section('title', 'User Dashboard')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <div class="mb-6 flex justify-between items-center">
        <h2 class="text-2xl font-semibold text-gray-800">User Dashboard</h2>
        <div class="text-sm text-gray-500">Welcome back, {{ Auth::user()->name }}</div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <div class="bg-blue-50 rounded-lg p-4 border border-blue-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-blue-800">Profile Completeness</p>
                    <p class="text-2xl font-bold text-blue-600">75%</p>
                </div>
                <i class="fas fa-user-circle text-blue-400 text-2xl"></i>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-2 mt-2">
                <div class="bg-blue-600 h-2 rounded-full" style="width: 75%"></div>
            </div>
        </div>

        <div class="bg-green-50 rounded-lg p-4 border border-green-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-green-800">Active Sessions</p>
                    <p class="text-2xl font-bold text-green-600">1</p>
                </div>
                <i class="fas fa-laptop text-green-400 text-2xl"></i>
            </div>
        </div>

        <div class="bg-purple-50 rounded-lg p-4 border border-purple-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-purple-800">Notifications</p>
                    <p class="text-2xl font-bold text-purple-600">3</p>
                </div>
                <i class="fas fa-bell text-purple-400 text-2xl"></i>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 gap-6">
        <!-- Account Summary -->
        <div class="bg-white rounded-lg border border-gray-200 p-4">
            <h3 class="text-lg font-medium text-gray-800 mb-4">Account Summary</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <h4 class="text-sm font-medium text-gray-700 mb-2">Personal Information</h4>
                    <div class="text-sm">
                        <p class="mb-1"><span class="text-gray-500">Name:</span> {{ Auth::user()->name }}</p>
                        <p class="mb-1"><span class="text-gray-500">Email:</span> {{ Auth::user()->email }}</p>
                        <p><span class="text-gray-500">Last Login:</span> {{ \Carbon\Carbon::parse(Auth::user()->last_login_at)->diffForHumans() }}</p>
                    </div>
                </div>
                <div>
                    <h4 class="text-sm font-medium text-gray-700 mb-2">Security</h4>
                    <div class="space-y-2">
                        <div class="flex items-center">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            <span class="text-sm">Two-factor authentication</span>
                            <span class="ml-auto text-xs bg-gray-100 px-2 py-1 rounded">Optional</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            <span class="text-sm">Password updated</span>
                            <span class="ml-auto text-xs text-gray-500">{{ now()->subMonths(2)->format('M d, Y') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Links -->
        <div class="bg-white rounded-lg border border-gray-200 p-4">
            <h3 class="text-lg font-medium text-gray-800 mb-4">Quick Links</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                <a href="#" class="btn-secondary py-2 text-center">
                    <i class="fas fa-user-edit mr-2"></i> Edit Profile
                </a>
                <a href="#" class="btn-secondary py-2 text-center">
                    <i class="fas fa-lock mr-2"></i> Change Password
                </a>
                <a href="#" class="btn-secondary py-2 text-center">
                    <i class="fas fa-bell mr-2"></i> Notifications
                </a>
                <a href="#" class="btn-secondary py-2 text-center">
                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                </a>
            </div>
        </div>
    </div>
</div>
@endsection