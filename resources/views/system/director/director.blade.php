@extends('layouts.app')

@section('title', 'Director Dashboard')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <div class="mb-6 flex justify-between items-center">
        <h2 class="text-2xl font-semibold text-gray-800">Director Dashboard</h2>
        <div class="text-sm text-gray-500">Last updated: {{ now()->format('M d, Y H:i') }}</div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <!-- Stats Cards -->
        <div class="bg-blue-50 rounded-lg p-4 border border-blue-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-blue-800">Total Departments</p>
                    <p class="text-2xl font-bold text-blue-600">24</p>
                </div>
                <i class="fas fa-building text-blue-400 text-2xl"></i>
            </div>
        </div>

        <div class="bg-green-50 rounded-lg p-4 border border-green-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-green-800">Pending Approvals</p>
                    <p class="text-2xl font-bold text-green-600">15</p>
                </div>
                <i class="fas fa-clipboard-check text-green-400 text-2xl"></i>
            </div>
        </div>

        <div class="bg-purple-50 rounded-lg p-4 border border-purple-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-purple-800">Budget Utilization</p>
                    <p class="text-2xl font-bold text-purple-600">78%</p>
                </div>
                <i class="fas fa-chart-pie text-purple-400 text-2xl"></i>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Recent Activities -->
        <div class="bg-white rounded-lg border border-gray-200 p-4">
            <h3 class="text-lg font-medium text-gray-800 mb-4">Recent Activities</h3>
            <div class="space-y-4">
                @foreach(range(1,5) as $item)
                <div class="border-b pb-3 last:border-0 last:pb-0">
                    <p class="text-sm font-medium">New project proposal submitted</p>
                    <p class="text-xs text-gray-500">Department of Finance • 2 hours ago</p>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white rounded-lg border border-gray-200 p-4">
            <h3 class="text-lg font-medium text-gray-800 mb-4">Quick Actions</h3>
            <div class="grid grid-cols-2 gap-3">
                <a href="#" class="btn-secondary py-2 text-center">
                    <i class="fas fa-file-alt mr-2"></i> Reports
                </a>
                <a href="#" class="btn-secondary py-2 text-center">
                    <i class="fas fa-users mr-2"></i> Staff
                </a>
                <a href="#" class="btn-secondary py-2 text-center">
                    <i class="fas fa-chart-line mr-2"></i> Analytics
                </a>
                <a href="#" class="btn-secondary py-2 text-center">
                    <i class="fas fa-cog mr-2"></i> Settings
                </a>
            </div>
        </div>
    </div>
</div>
@endsection