@extends('layouts.app')

@section('title', 'Secretary Dashboard')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <div class="mb-6 flex justify-between items-center">
        <h2 class="text-2xl font-semibold text-gray-800">Secretary Dashboard</h2>
        <div class="text-sm text-gray-500">Today: {{ now()->format('l, F j') }}</div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <div class="bg-pink-50 rounded-lg p-4 border border-pink-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-pink-800">Appointments Today</p>
                    <p class="text-2xl font-bold text-pink-600">5</p>
                </div>
                <i class="fas fa-calendar-day text-pink-400 text-2xl"></i>
            </div>
        </div>

        <div class="bg-blue-50 rounded-lg p-4 border border-blue-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-blue-800">Pending Documents</p>
                    <p class="text-2xl font-bold text-blue-600">12</p>
                </div>
                <i class="fas fa-file-alt text-blue-400 text-2xl"></i>
            </div>
        </div>

        <div class="bg-green-50 rounded-lg p-4 border border-green-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-green-800">Messages</p>
                    <p class="text-2xl font-bold text-green-600">8</p>
                </div>
                <i class="fas fa-envelope text-green-400 text-2xl"></i>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Today's Schedule -->
        <div class="bg-white rounded-lg border border-gray-200 p-4">
            <h3 class="text-lg font-medium text-gray-800 mb-4">Today's Schedule</h3>
            <div class="space-y-4">
                @foreach(range(1,3) as $item)
                <div class="border-l-4 border-blue-500 pl-4 py-1">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="font-medium">Meeting with {{ ['Client A','Department Head','Vendor'][$item-1] }}</p>
                            <p class="text-sm text-gray-600">{{ 9+$item }}:00 - {{ 10+$item }}:00</p>
                        </div>
                        <span class="text-xs bg-blue-100 text-blue-800 px-2 py-1 rounded">Conference Room {{ $item }}</span>
                    </div>
                </div>
                @endforeach
                <a href="#" class="block text-center text-sm text-blue-600 hover:text-blue-800 mt-2">
                    View Full Calendar →
                </a>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white rounded-lg border border-gray-200 p-4">
            <h3 class="text-lg font-medium text-gray-800 mb-4">Quick Actions</h3>
            <div class="grid grid-cols-2 gap-3">
                <a href="#" class="btn-secondary py-2 text-center">
                    <i class="fas fa-plus mr-2"></i> New Appointment
                </a>
                <a href="#" class="btn-secondary py-2 text-center">
                    <i class="fas fa-file-import mr-2"></i> Upload Document
                </a>
                <a href="#" class="btn-secondary py-2 text-center">
                    <i class="fas fa-phone-alt mr-2"></i> Call Log
                </a>
                <a href="#" class="btn-secondary py-2 text-center">
                    <i class="fas fa-tasks mr-2"></i> Task List
                </a>
            </div>
        </div>
    </div>
</div>
@endsection