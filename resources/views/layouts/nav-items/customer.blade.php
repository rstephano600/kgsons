<li class="px-2">
    <a href="{{ route('customer.dashboard') }}" 
       class="nav-item flex items-center px-4 py-3 text-sm text-gray-600 rounded-lg hover:text-gray-800 @if(Route::is('customer.dashboard')) active @endif">
        <i class="nav-icon fas fa-tachometer-alt mr-3"></i>
        <span>Dashboard</span>
    </a>
</li>
<li class="px-2">
    <a href="{{ route('customer.orders') }}" 
       class="nav-item flex items-center px-4 py-3 text-sm text-gray-600 rounded-lg hover:text-gray-800 @if(Route::is('customer.orders')) active @endif">
        <i class="nav-icon fas fa-shopping-cart mr-3"></i>
        <span>My Orders</span>
    </a>
</li>
<li class="px-2">
    <a href="{{ route('customer.support') }}" 
       class="nav-item flex items-center px-4 py-3 text-sm text-gray-600 rounded-lg hover:text-gray-800 @if(Route::is('customer.support')) active @endif">
        <i class="nav-icon fas fa-headset mr-3"></i>
        <span>Support</span>
    </a>
</li>