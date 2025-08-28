@extends('layouts.app')

@section('title', 'Staff Dashboard')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <div class="mb-6 flex justify-between items-center">
        <h2 class="text-2xl font-semibold text-gray-800">Staff Dashboard</h2>
        <div class="text-sm text-gray-500">Current Task: Complete monthly report</div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <div class="bg-blue-50 rounded-lg p-4 border border-blue-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-blue-800">Assigned Tasks</p>
                    <p class="text-2xl font-bold text-blue-600">7</p>
                </div>
                <i class="fas fa-clipboard-check text-blue-400 text-2xl"></i>
            </div>
        </div>

        <div class="bg-orange-50 rounded-lg p-4 border border-orange-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-orange-800">Pending Approval</p>
                    <p class="text-2xl font-bold text-orange-600">3</p>
                </div>
                <i class="fas fa-hourglass-half text-orange-400 text-2xl"></i>
            </div>
        </div>

        <div class="bg-green-50 rounded-lg p-4 border border-green-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-green-800">Completed This Week</p>
                    <p class="text-2xl font-bold text-green-600">5</p>
                </div>
                <i class="fas fa-check-circle text-green-400 text-2xl"></i>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 gap-6">
        <!-- My Tasks -->
        <div class="bg-white rounded-lg border border-gray-200 p-4">
            <h3 class="text-lg font-medium text-gray-800 mb-4">My Tasks</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500">Task</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500">Priority</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500">Due Date</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500">Status</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach(range(1,5) as $item)
                        <tr>
                            <td class="px-4 py-3 whitespace-nowrap text-sm font-medium">Task {{ $item }}</td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <span class="px-2 py-1 text-xs rounded-full 
                                    @if($item == 1) bg-red-100 text-red-800
                                    @elseif($item == 2) bg-yellow-100 text-yellow-800
                                    @else bg-gray-100 text-gray-800 @endif">
                                    @if($item == 1) High
                                    @elseif($item == 2) Medium
                                    @else Low @endif
                                </span>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                {{ now()->addDays($item)->format('M d') }}
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <span class="px-2 py-1 text-xs rounded-full 
                                    @if($item%3 == 0) bg-green-100 text-green-800
                                    @elseif($item%3 == 1) bg-blue-100 text-blue-800
                                    @else bg-gray-100 text-gray-800 @endif">
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
@endsection