<li class="px-2">
    <a href="{{ route('staff.dashboard') }}" 
       class="nav-item d-flex align-items-center px-3 py-2 text-decoration-none text-muted rounded @if(Route::is('staff.dashboard')) active @endif">
        <i class="nav-icon fas fa-tachometer-alt me-3"></i>
        <span>Dashboard</span>
    </a>
</li>
<li class="px-2">
    <a href="{{ route('food_sales.index') }}" 
       class="nav-item d-flex align-items-center px-3 py-2 text-decoration-none text-muted rounded @if(Route::is('staff.tasks')) active @endif">
        <i class="nav-icon fas fa-cash-register me-3"></i>
        <span>Food sales</span>
    </a>
</li>

<li class="px-2">
    <a href="" 
       class="nav-item d-flex align-items-center px-3 py-2 text-decoration-none text-muted rounded @if(Route::is('staff.tasks')) active @endif">
        <i class="nav-icon fas fa-tasks me-3"></i>
        <span>My Tasks</span>
    </a>
</li>
<li class="px-2">
    <a href="" 
       class="nav-item d-flex align-items-center px-3 py-2 text-decoration-none text-muted rounded @if(Route::is('staff.attendance')) active @endif">
        <i class="nav-icon fas fa-calendar-check me-3"></i>
        <span>Attendance</span>
    </a>
</li>