@extends('layouts.app')

@section('title', 'Dashboard')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="flex items-center space-x-2">
            <li>
                <a href="#" class="text-gray-400 hover:text-gray-500">Home</a>
            </li>
            <li class="flex items-center">
                <i class="fas fa-chevron-right text-gray-400 text-xs mx-2"></i>
            </li>
            <li class="text-gray-600" aria-current="page">Dashboard</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">Welcome back, {{ Auth::user()->name }}!</h2>
        <p class="text-gray-600">Here's what's happening with your account today.</p>
    </div>
    
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Total Projects</p>
                    <p class="text-2xl font-semibold text-gray-800">24</p>
                </div>
                <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                    <i class="fas fa-project-diagram"></i>
                </div>
            </div>
            <div class="mt-4">
                <span class="text-sm text-green-600 font-medium">+2.5%</span>
                <span class="text-sm text-gray-500 ml-2">from last month</span>
            </div>
        </div>
        
        <!-- More stat cards -->
    </div>
    
    <!-- Recent Activity -->
    <div class="bg-white rounded-lg shadow overflow-hidden mb-6">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-800">Recent Activity</h3>
        </div>
        <div class="divide-y divide-gray-200">
            <!-- Activity items -->
        </div>
    </div>
    
    <!-- Quick Actions -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-medium text-gray-800 mb-4">Quick Actions</h3>
            <div class="grid grid-cols-2 gap-4">
                <a href="#" class="p-4 border border-gray-200 rounded-lg text-center hover:bg-gray-50 transition">
                    <i class="fas fa-plus text-blue-500 text-xl mb-2"></i>
                    <p class="text-sm font-medium">New Project</p>
                </a>
                <!-- More quick actions -->
            </div>
        </div>
        
        <!-- Upcoming Deadlines -->
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-medium text-gray-800 mb-4">Upcoming Deadlines</h3>
            <!-- Deadline items -->
        </div>
    </div>
@endsection