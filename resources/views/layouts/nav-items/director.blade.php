<li class="px-2">
    <a href="{{ route('director.dashboard') }}" 
       class="nav-item flex items-center px-4 py-3 text-sm text-gray-600 rounded-lg hover:text-gray-800 @if(Route::is('director.dashboard')) active @endif">
        <i class="nav-icon fas fa-tachometer-alt mr-3"></i>
        <span>Dashboard</span>
    </a>
</li>
<li class="px-2">
    <a href="{{ route('director.financials') }}" 
       class="nav-item flex items-center px-4 py-3 text-sm text-gray-600 rounded-lg hover:text-gray-800 @if(Route::is('director.financials')) active @endif">
        <i class="nav-icon fas fa-money-bill-wave mr-3"></i>
        <span>Financial Reports</span>
    </a>
</li>
<li class="px-2">
    <a href="{{ route('director.projects') }}" 
       class="nav-item flex items-center px-4 py-3 text-sm text-gray-600 rounded-lg hover:text-gray-800 @if(Route::is('director.projects')) active @endif">
        <i class="nav-icon fas fa-project-diagram mr-3"></i>
        <span>Projects</span>
    </a>
</li>