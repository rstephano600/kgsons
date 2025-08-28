<li class="px-2">
    <a href="{{ route('admin.dashboard') }}" 
       class="nav-item d-flex align-items-center px-3 py-2 text-decoration-none text-muted rounded @if(Route::is('admin.dashboard')) active @endif">
        <i class="nav-icon fas fa-tachometer-alt me-3"></i>
        <span>Dashboard</span>
    </a>
</li>
<li class="px-2">
    <a href="{{ route('users.users.index') }}" 
       class="nav-item d-flex align-items-center px-3 py-2 text-decoration-none text-muted rounded @if(Route::is('admin.users.*')) active @endif">
        <i class="nav-icon fas fa-users me-3"></i>
        <span>User Management</span>
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
    <a href="{{ route('services.index') }}" 
       class="nav-item flex items-center px-4 py-3 text-sm text-gray-600 rounded-lg hover:text-gray-800 @if(Route::is('services.*')) active @endif">
        <i class="nav-icon fas fa-user-check mr-3"></i>
        <span>Services</span>
    </a>
</li>

<li class="px-2">
    <a href="{{ route('foods.index') }}" 
       class="nav-item d-flex align-items-center px-3 py-2 text-decoration-none text-muted rounded @if(Route::is('foods.*')) active @endif">
        <i class="nav-icon fas fa-utensils me-3"></i>
        <span>Food's</span> 
    </a>
</li>
<li class="px-2">
    <a href="{{ route('user-logins.index') }}" 
       class="nav-item d-flex align-items-center px-3 py-2 text-decoration-none text-muted rounded @if(Route::is('admin.user-logins.*')) active @endif">
        <i class="nav-icon fas fa-users me-3"></i>
        <span>User Logs</span>
    </a>
</li>
<li class="px-2">
    <a href="{{ route('admin.settings') }}" 
       class="nav-item d-flex align-items-center px-3 py-2 text-decoration-none text-muted rounded @if(Route::is('admin.settings')) active @endif">
        <i class="nav-icon fas fa-cog me-3"></i>
        <span>System Settings</span>
    </a>
</li>
<li class="px-2">
    <a href="{{ route('admin.reports') }}" 
       class="nav-item d-flex align-items-center px-3 py-2 text-decoration-none text-muted rounded @if(Route::is('admin.reports')) active @endif">
        <i class="nav-icon fas fa-chart-bar me-3"></i>
        <span>Reports</span>
    </a>
</li>