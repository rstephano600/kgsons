<li class="px-2">
    <a href="{{ route('secretary.dashboard') }}" 
       class="nav-item flex items-center px-4 py-3 text-sm text-gray-600 rounded-lg hover:text-gray-800 @if(Route::is('secretary.dashboard')) active @endif">
        <i class="nav-icon fas fa-tachometer-alt mr-3"></i>
        <span>Dashboard</span>
    </a>
</li>
<li class="px-2">
    <a href="{{ route('secretary.appointments') }}" 
       class="nav-item flex items-center px-4 py-3 text-sm text-gray-600 rounded-lg hover:text-gray-800 @if(Route::is('secretary.appointments')) active @endif">
        <i class="nav-icon fas fa-calendar-alt mr-3"></i>
        <span>Appointments</span>
    </a>
</li>
<li class="px-2">
    <a href="{{ route('secretary.documents') }}" 
       class="nav-item flex items-center px-4 py-3 text-sm text-gray-600 rounded-lg hover:text-gray-800 @if(Route::is('secretary.documents')) active @endif">
        <i class="nav-icon fas fa-file-alt mr-3"></i>
        <span>Documents</span>
    </a>
</li>