<li class="px-2">
    <a href="{{ route('assistant-director.dashboard') }}" 
       class="nav-item flex items-center px-4 py-3 text-sm text-gray-600 rounded-lg hover:text-gray-800 @if(Route::is('assistant-director.dashboard')) active @endif">
        <i class="nav-icon fas fa-tachometer-alt mr-3"></i>
        <span>Dashboard</span>
    </a>
</li>
<li class="px-2">
    <a href="{{ route('assistant-director.operations') }}" 
       class="nav-item flex items-center px-4 py-3 text-sm text-gray-600 rounded-lg hover:text-gray-800 @if(Route::is('assistant-director.operations')) active @endif">
        <i class="nav-icon fas fa-cogs mr-3"></i>
        <span>Operations</span>
    </a>
</li>
<li class="px-2">
    <a href="{{ route('assistant-director.team') }}" 
       class="nav-item flex items-center px-4 py-3 text-sm text-gray-600 rounded-lg hover:text-gray-800 @if(Route::is('assistant-director.team')) active @endif">
        <i class="nav-icon fas fa-users mr-3"></i>
        <span>Team Management</span>
    </a>
</li>