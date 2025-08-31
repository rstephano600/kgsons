<li class="px-2">
    <a href="{{ route('secretary.dashboard') }}" 
       class="nav-item d-flex align-items-center px-3 py-2 text-decoration-none text-muted rounded @if(Route::is('secretary.dashboard')) active @endif">
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

                         <!-- INVENTORY MANAGEMENT SECTION -->
 <div class="section-header">
    <i class="fas fa-boxes me-2"></i>Inventory Manage
</div>
<li class="px-2">
    <a href="{{ route('foods.index') }}" 
       class="nav-item d-flex align-items-center px-3 py-2 text-decoration-none text-muted rounded @if(Route::is('food.*')) active @endif">
        <i class="nav-icon fas fa-utensils me-3"></i>
        <span>Food's management</span> 
    </a>
</li>
<li class="px-2">
    <a href="{{ route('drinks.index') }}" 
       class="nav-item d-flex align-items-center px-3 py-2 text-decoration-none text-muted rounded @if(Route::is('food.*')) active @endif">
        <i class="nav-icon fas fa-wine-glass me-3"></i>
        <span>Drinks management</span> 
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
<li class="px-2">
    <a href="{{ route('expense_categories.index') }}" 
       class="nav-item d-flex align-items-center px-3 py-2 text-decoration-none text-muted rounded @if(Route::is('food.*')) active @endif">
        <i class="nav-icon fas fa-register me-3"></i>
        <span>Expenses Categories</span> 
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



<div class="divider"></div>
<div class="divider"></div>
<li class="px-2">
    <a href="{{ route('invoices.create') }}" 
       class="nav-item d-flex align-items-center px-3 py-2 text-decoration-none text-muted rounded @if(Route::is('secretary.appointments')) active @endif">
        <i class="nav-icon fas fa-pen me-3"></i>
        <span>Invoices</span>
    </a>
</li>
<li class="px-2">
    <a href="#" 
       class="nav-item d-flex align-items-center px-3 py-2 text-decoration-none text-muted rounded @if(Route::is('secretary.appointments')) active @endif">
        <i class="nav-icon fas fa-calendar-alt me-3"></i>
        <span>Appointments</span>
    </a>
</li>
<li class="px-2">
    <a href="#" 
       class="nav-item d-flex align-items-center px-3 py-2 text-decoration-none text-muted rounded @if(Route::is('secretary.documents')) active @endif">
        <i class="nav-icon fas fa-file-alt me-3"></i>
        <span>Documents</span>
    </a>
</li>
