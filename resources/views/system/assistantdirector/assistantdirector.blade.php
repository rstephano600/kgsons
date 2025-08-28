@extends('layouts.app')

@section('title', 'Assistant Director Dashboard')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <div class="mb-6 flex justify-between items-center">
        <h2 class="text-2xl font-semibold text-gray-800">Assistant Director Dashboard</h2>
        <div class="text-sm text-gray-500">Assigned Departments: 5</div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <div class="bg-blue-50 rounded-lg p-4 border border-blue-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-blue-800">Pending Tasks</p>
                    <p class="text-2xl font-bold text-blue-600">8</p>
                </div>
                <i class="fas fa-tasks text-blue-400 text-2xl"></i>
            </div>
        </div>

        <div class="bg-orange-50 rounded-lg p-4 border border-orange-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-orange-800">Meetings Today</p>
                    <p class="text-2xl font-bold text-orange-600">3</p>
                </div>
                <i class="fas fa-calendar-alt text-orange-400 text-2xl"></i>
            </div>
        </div>

        <div class="bg-green-50 rounded-lg p-4 border border-green-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-green-800">Completed Projects</p>
                    <p class="text-2xl font-bold text-green-600">12</p>
                </div>
                <i class="fas fa-check-circle text-green-400 text-2xl"></i>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-white rounded-lg border border-gray-200 p-4">
            <h3 class="text-lg font-medium text-gray-800 mb-4">Upcoming Deadlines</h3>
            <div class="space-y-3">
                @foreach(range(1,3) as $item)
                <div class="flex items-start border-b pb-3 last:border-0 last:pb-0">
                    <div class="bg-red-100 text-red-800 rounded-full p-2 mr-3">
                        <i class="fas fa-exclamation text-sm"></i>
                    </div>
                    <div>
                        <p class="text-sm font-medium">Quarterly Report Submission</p>
                        <p class="text-xs text-gray-500">Due: Tomorrow • 10:00 AM</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="bg-white rounded-lg border border-gray-200 p-4">
            <h3 class="text-lg font-medium text-gray-800 mb-4">Department Overview</h3>
            <div class="space-y-2">
                <div class="flex justify-between items-center">
                    <span class="text-sm">Finance Department</span>
                    <span class="text-sm font-medium">85% Complete</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="bg-green-600 h-2 rounded-full" style="width: 85%"></div>
                </div>
                
                <div class="flex justify-between items-center mt-3">
                    <span class="text-sm">HR Department</span>
                    <span class="text-sm font-medium">62% Complete</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="bg-yellow-500 h-2 rounded-full" style="width: 62%"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection