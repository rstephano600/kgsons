@extends('layouts.app')

@section('title', 'Manager Dashboard')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <div class="mb-6 flex justify-between items-center">
        <h2 class="text-2xl font-semibold text-gray-800">Manager Dashboard</h2>
        <div class="text-sm text-gray-500">Team Members: 14</div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <div class="bg-indigo-50 rounded-lg p-4 border border-indigo-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-indigo-800">Active Projects</p>
                    <p class="text-2xl font-bold text-indigo-600">7</p>
                </div>
                <i class="fas fa-project-diagram text-indigo-400 text-2xl"></i>
            </div>
        </div>

        <div class="bg-purple-50 rounded-lg p-4 border border-purple-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-purple-800">Tasks Due</p>
                    <p class="text-2xl font-bold text-purple-600">9</p>
                </div>
                <i class="fas fa-clipboard-list text-purple-400 text-2xl"></i>
            </div>
        </div>

        <div class="bg-teal-50 rounded-lg p-4 border border-teal-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-teal-800">Team Availability</p>
                    <p class="text-2xl font-bold text-teal-600">92%</p>
                </div>
                <i class="fas fa-user-check text-teal-400 text-2xl"></i>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="bg-white rounded-lg border border-gray-200 p-4 lg:col-span-2">
            <h3 class="text-lg font-medium text-gray-800 mb-4">Project Status</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500">Project</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500">Progress</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500">Deadline</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach(range(1,4) as $item)
                        <tr>
                            <td class="px-4 py-3 whitespace-nowrap text-sm font-medium">Project {{ $item }}</td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <div class="w-full bg-gray-200 rounded-full h-2.5">
                                    <div class="bg-blue-600 h-2.5 rounded-full" 
                                         style="width: {{ rand(30, 90) }}%"></div>
                                </div>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                {{ now()->addDays(rand(1,30))->format('M d') }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="bg-white rounded-lg border border-gray-200 p-4">
            <h3 class="text-lg font-medium text-gray-800 mb-4">Team Members</h3>
            <div class="space-y-3">
                @foreach(range(1,5) as $item)
                <div class="flex items-center">
                    <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gray-300 flex items-center justify-center">
                        <span class="text-gray-600 font-medium">U{{ $item }}</span>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-gray-900">Team Member {{ $item }}</p>
                        <p class="text-xs text-gray-500">{{ ['Design','Dev','QA','PM','Marketing'][$item-1] }}</p>
                    </div>
                </div>
                @endforeach
                <a href="#" class="block text-center text-sm text-blue-600 hover:text-blue-800 mt-2">
                    View All Team Members →
                </a>
            </div>
        </div>
    </div>
</div>
@endsection