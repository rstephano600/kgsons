<li class="px-2">
    <a href="{{ route('manager.dashboard') }}" 
       class="nav-item flex items-center px-4 py-3 text-sm text-gray-600 rounded-lg hover:text-gray-800 @if(Route::is('manager.dashboard')) active @endif">
        <i class="nav-icon fas fa-tachometer-alt mr-3"></i>
        <span>Dashboard</span>
    </a>
</li>
<li class="px-2">
    <a href="{{ route('manager.tasks') }}" 
       class="nav-item flex items-center px-4 py-3 text-sm text-gray-600 rounded-lg hover:text-gray-800 @if(Route::is('manager.tasks')) active @endif">
        <i class="nav-icon fas fa-tasks mr-3"></i>
        <span>Tasks</span>
    </a>
</li>
<li class="px-2">
    <a href="{{ route('manager.performance') }}" 
       class="nav-item flex items-center px-4 py-3 text-sm text-gray-600 rounded-lg hover:text-gray-800 @if(Route::is('manager.performance')) active @endif">
        <i class="nav-icon fas fa-chart-line mr-3"></i>
        <span>Performance</span>
    </a>
</li>