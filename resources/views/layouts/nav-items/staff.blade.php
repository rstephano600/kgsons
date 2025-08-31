<li class="px-2">
    <a href="{{ route('staff.dashboard') }}" 
       class="nav-item d-flex align-items-center px-3 py-2 text-decoration-none text-muted rounded @if(Route::is('staff.dashboard')) active @endif">
        <i class="nav-icon fas fa-tachometer-alt me-3"></i>
        <span>Dashboard</span>
    </a>
</li>

<div class="divider"></div>

<div class="section-header">
    <i class="fas fa-cash-register me-2"></i>Sales Operations
</div>
<li class="px-2">
    <a href="{{ route('food_sales.index') }}" 
       class="nav-item d-flex align-items-center px-3 py-2 text-decoration-none text-muted rounded @if(Route::is('staff.tasks')) active @endif">
        <i class="nav-icon fas fa-cash-register me-3"></i>
        <span>Add Food sales</span>
    </a>
</li>
<li class="px-2">
    <a href="{{ route('drink_sales.index') }}" 
       class="nav-item d-flex align-items-center px-3 py-2 text-decoration-none text-muted rounded @if(Route::is('food.*')) active @endif">
        <i class="nav-icon fas fa-cash-register me-3"></i>
        <span>Add Drinks Sales </span> 
    </a>
</li>

<div class="divider"></div>


                        
<!-- EXPENSE MANAGEMENT SECTION -->
<div class="section-header">
    <i class="fas fa-receipt me-2"></i>Expense Management
</div>
<li class="px-2">
    <a href="{{ route('expenses.index') }}" 
       class="nav-item d-flex align-items-center px-3 py-2 text-decoration-none text-muted rounded @if(Route::is('food.*')) active @endif">
        <i class="nav-icon fas fa-register me-3"></i>
        <span>Record Expenses </span> 
    </a>
</li>


<div class="divider"></div>
                        
<!-- REPORTS & ANALYTICS SECTION -->
<div class="section-header">
    <i class="fas fa-chart-line me-2"></i>Reports & Analytics
</div>
<li class="px-2">
    <a href="{{ route('reports.food_sales') }}" 
       class="nav-item d-flex align-items-center px-3 py-2 text-decoration-none text-muted rounded @if(Route::is('food.*')) active @endif">
        <i class="nav-icon fas fa-receipt me-3"></i>
        <span>Food Sales Report</span> 
    </a>
</li>
<li class="px-2">
    <a href="{{ route('reports.drink_sales') }}" 
       class="nav-item d-flex align-items-center px-3 py-2 text-decoration-none text-muted rounded @if(Route::is('food.*')) active @endif">
        <i class="nav-icon fas fa-receipt me-3"></i>
        <span>Drink Sales Report</span> 
    </a>
</li>
<li class="px-2">
    <a href="{{ route('general.reports.index') }}" 
       class="nav-item d-flex align-items-center px-3 py-2 text-decoration-none text-muted rounded @if(Route::is('food.*')) active @endif">
        <i class="nav-icon fas fa-receipt me-3"></i>
        <span>General Reports</span> 
    </a>
</li>
<li class="px-2">
    <a href="{{ route('reports.sales') }}" 
       class="nav-item d-flex align-items-center px-3 py-2 text-decoration-none text-muted rounded @if(Route::is('food.*')) active @endif">
        <i class="nav-icon fas fa-receipt me-3"></i>
        <span>Print Sales Report</span> 
    </a>
</li>

<div class="divider"></div><div class="divider"></div>