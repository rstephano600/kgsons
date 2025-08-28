@extends('layouts.app')

@section('title', 'Customer Dashboard')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <div class="mb-6 flex justify-between items-center">
        <h2 class="text-2xl font-semibold text-gray-800">Customer Dashboard</h2>
        <div class="text-sm text-gray-500">Member since {{ now()->subMonths(rand(1,24))->format('M Y') }}</div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <div class="bg-blue-50 rounded-lg p-4 border border-blue-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-blue-800">Active Projects</p>
                    <p class="text-2xl font-bold text-blue-600">2</p>
                </div>
                <i class="fas fa-project-diagram text-blue-400 text-2xl"></i>
            </div>
        </div>

        <div class="bg-green-50 rounded-lg p-4 border border-green-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-green-800">Support Tickets</p>
                    <p class="text-2xl font-bold text-green-600">1</p>
                </div>
                <i class="fas fa-ticket-alt text-green-400 text-2xl"></i>
            </div>
        </div>

        <div class="bg-purple-50 rounded-lg p-4 border border-purple-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-purple-800">Upcoming Payments</p>
                    <p class="text-2xl font-bold text-purple-600">$1,250</p>
                </div>
                <i class="fas fa-credit-card text-purple-400 text-2xl"></i>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Recent Projects -->
        <div class="bg-white rounded-lg border border-gray-200 p-4">
            <h3 class="text-lg font-medium text-gray-800 mb-4">Recent Projects</h3>
            <div class="space-y-4">
                @foreach(range(1,2) as $item)
                <div class="border rounded-lg p-3 hover:bg-gray-50">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="font-medium">Website Redesign {{ $item == 1 ? '(In Progress)' : '(Completed)' }}</p>
                            <p class="text-sm text-gray-600 mt-1">Last updated: {{ now()->subDays($item)->format('M d') }}</p>
                        </div>
                        <span class="text-xs px-2 py-1 rounded 
                            {{ $item == 1 ? 'bg-blue-100 text-blue-800' : 'bg-green-100 text-green-800' }}">
                            {{ $item == 1 ? 'Active' : 'Completed' }}
                        </span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2 mt-2">
                        <div class="bg-blue-600 h-2 rounded-full" style="width: {{ $item == 1 ? '65%' : '100%' }}"></div>
                    </div>
                </div>
                @endforeach
                <a href="#" class="block text-center text-sm text-blue-600 hover:text-blue-800 mt-2">
                    View All Projects →
                </a>
            </div>
        </div>

        <!-- Support -->
        <div class="bg-white rounded-lg border border-gray-200 p-4">
            <h3 class="text-lg font-medium text-gray-800 mb-4">Support Center</h3>
            <div class="space-y-3">
                <div class="p-3 bg-blue-50 rounded-lg">
                    <p class="font-medium">Ticket #{{ rand(1000,9999) }}</p>
                    <p class="text-sm text-gray-600">Status: <span class="text-green-600">Open</span></p>
                </div>
                <a href="#" class="btn-primary w-full text-center py-2">
                    <i class="fas fa-plus mr-2"></i> New Support Ticket
                </a>
                <div class="text-center mt-2">
                    <p class="text-sm text-gray-600">Emergency? Call us at <span class="font-medium">1-800-HELP-NOW</span></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection