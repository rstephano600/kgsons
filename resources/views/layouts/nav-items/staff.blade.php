<li class="px-2">
    <a href="{{ route('staff.dashboard') }}" 
       class="nav-item flex items-center px-4 py-3 text-sm text-gray-600 rounded-lg hover:text-gray-800 @if(Route::is('staff.dashboard')) active @endif">
        <i class="nav-icon fas fa-tachometer-alt mr-3"></i>
        <span>Dashboard</span>
    </a>
</li>
<li class="px-2">
    <a href="{{ route('staff.tasks') }}" 
       class="nav-item flex items-center px-4 py-3 text-sm text-gray-600 rounded-lg hover:text-gray-800 @if(Route::is('staff.tasks')) active @endif">
        <i class="nav-icon fas fa-tasks mr-3"></i>
        <span>My Tasks</span>
    </a>
</li>
<li class="px-2">
    <a href="{{ route('staff.attendance') }}" 
       class="nav-item flex items-center px-4 py-3 text-sm text-gray-600 rounded-lg hover:text-gray-800 @if(Route::is('staff.attendance')) active @endif">
        <i class="nav-icon fas fa-calendar-check mr-3"></i>
        <span>Attendance</span>
    </a>
</li>