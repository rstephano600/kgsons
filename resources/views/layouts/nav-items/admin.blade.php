<li class="px-2">
    <a href="{{ route('admin.dashboard') }}" 
       class="nav-item flex items-center px-4 py-3 text-sm text-gray-600 rounded-lg hover:text-gray-800 @if(Route::is('admin.dashboard')) active @endif">
        <i class="nav-icon fas fa-tachometer-alt mr-3"></i>
        <span>Dashboard</span>
    </a>
</li>
<li class="px-2">
    <a href="{{ route('users.users.index') }}" 
       class="nav-item flex items-center px-4 py-3 text-sm text-gray-600 rounded-lg hover:text-gray-800 @if(Route::is('admin.users.*')) active @endif">
        <i class="nav-icon fas fa-users mr-3"></i>
        <span>User Management</span>
    </a>
</li>
<li class="px-2">
    <a href="{{ route('admin.settings') }}" 
       class="nav-item flex items-center px-4 py-3 text-sm text-gray-600 rounded-lg hover:text-gray-800 @if(Route::is('admin.settings')) active @endif">
        <i class="nav-icon fas fa-cog mr-3"></i>
        <span>System Settings</span>
    </a>
</li>
<li class="px-2">
    <a href="{{ route('admin.reports') }}" 
       class="nav-item flex items-center px-4 py-3 text-sm text-gray-600 rounded-lg hover:text-gray-800 @if(Route::is('admin.reports')) active @endif">
        <i class="nav-icon fas fa-chart-bar mr-3"></i>
        <span>Reports</span>
    </a>
</li>