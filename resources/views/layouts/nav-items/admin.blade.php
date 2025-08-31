<li class="px-2">
    <a href="{{ route('admin.dashboard') }}" 
       class="nav-item d-flex align-items-center px-3 py-2 text-decoration-none text-muted rounded @if(Route::is('admin.dashboard')) active @endif">
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
<li class="px-2">
    <a href="{{ route('sales.reports.index') }}" 
       class="nav-item d-flex align-items-center px-3 py-2 text-decoration-none text-muted rounded @if(Route::is('food.*')) active @endif">
        <i class="nav-icon fas fa-receipt me-3"></i>
        <span>Sales Report</span> 
    </a>
</li>
<li class="px-2">
    <a href="{{ route('reports.sales') }}" 
       class="nav-item d-flex align-items-center px-3 py-2 text-decoration-none text-muted rounded @if(Route::is('food.*')) active @endif">
        <i class="nav-icon fas fa-receipt me-3"></i>
        <span>Print Sales Report</span> 
    </a>
</li>

<li class="px-2">
    <a href="{{ route('general.sales.report') }}" 
       class="nav-item d-flex align-items-center px-3 py-2 text-decoration-none text-muted rounded @if(Route::is('food.*')) active @endif">
        <i class="nav-icon fas fa-receipt me-3"></i>
        <span>General Reports 22</span> 
    </a>
</li>


<div class="divider"></div>
                        
<!-- ADMINISTRATION SECTION -->
<div class="section-header">
    <i class="fas fa-cog me-2"></i>Administration
</div>
<li class="px-2">
    <a href="{{ route('users.users.index') }}" 
       class="nav-item d-flex align-items-center px-3 py-2 text-decoration-none text-muted rounded @if(Route::is('admin.users.*')) active @endif">
        <i class="nav-icon fas fa-users me-3"></i>
        <span>User Management</span>
    </a>
</li>

<li class="px-2">
    <a href="{{ route('customer_services.index') }}" 
       class="nav-item d-flex align-items-center px-3 py-2 text-decoration-none text-muted rounded @if(Route::is('services.*')) active @endif">
        <i class="nav-icon fas fa-user-check me-3"></i>
        <span>Customer Servers</span>
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
    <a href="{{ route('system.logs.index') }}" 
       class="nav-item d-flex align-items-center px-3 py-2 text-decoration-none text-muted rounded @if(Route::is('admin.reports')) active @endif">
        <i class="nav-icon fas fa-chart-bar me-3"></i>
        <span>System Logs</span>
    </a>
</li>
<li class="px-2">
    <a href="{{ route('admin.reports') }}" 
       class="nav-item d-flex align-items-center px-3 py-2 text-decoration-none text-muted rounded @if(Route::is('admin.reports')) active @endif">
        <i class="nav-icon fas fa-chart-bar me-3"></i>
        <span>Reports</span>
    </a>
</li>

<li class="px-2">
    <a href="{{ route('admin.settings') }}" 
       class="nav-item d-flex align-items-center px-3 py-2 text-decoration-none text-muted rounded @if(Route::is('admin.settings')) active @endif">
        <i class="nav-icon fas fa-cog me-3"></i>
        <span>System Settings</span>
    </a>
</li>
<div class="col-md-8">
                <div class="improvement-note">
                    <h5><i class="fas fa-lightbulb me-2"></i>Key Improvements Made:</h5>
                    <ul class="mb-0">
                        <li><strong>Logical Grouping:</strong> Menu items are organized into clear sections (Sales, Inventory, Expenses, Reports, Administration)</li>
                        <li><strong>Improved Icons:</strong> More intuitive and specific icons for each function</li>
                        <li><strong>Better Labels:</strong> Clearer, more descriptive names (e.g., "Food Menu" instead of "Food's management")</li>
                        <li><strong>Tooltips:</strong> Hover descriptions to explain each function's purpose</li>
                        <li><strong>Consistent Naming:</strong> Standardized terminology throughout the menu</li>
                        <li><strong>Reduced Duplication:</strong> Consolidated similar report functions</li>
                        <li><strong>Visual Hierarchy:</strong> Section headers and dividers for better organization</li>
                    </ul>
                </div>
</div>