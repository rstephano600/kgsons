<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'website.home')->name('home');
Route::view('/about', 'website.about')->name('about');
Route::view('/contact', 'website.contact')->name('contact');
Route::view('/mission', 'website.mission')->name('mission');
Route::view('/projects', 'website.projects')->name('projects');
Route::view('/clients', 'website.clients')->name('clients');

// Services Routes
Route::prefix('services')->group(function () {
    Route::view('', 'website.services.services')->name('services.services');
    Route::view('/electrical-wires-cables', 'website.services.electrical-wires')->name('services.electrical-wires');
    Route::view('/electrical-equipment-componets', 'website.services.electrical-equipment')->name('services.electrical-equipment');
    Route::view('/building-products', 'website.services.building-products')->name('services.building-products');
    Route::view('/building-compound', 'website.services.building-compound')->name('services.building-compound');
    Route::view('/road-works', 'website.services.road-works')->name('services.road-works');
    Route::view('/labour-based', 'website.services.labour-based')->name('services.labour-based');
    Route::view('/revenue-collection', 'website.services.revenue-collection')->name('services.revenue-collection');
    Route::view('/food-services', 'website.services.food')->name('services.food');
    Route::view('/food-services/government-food', 'website.services.government-food')->name('services.government-food');
    Route::view('/cleaning-services', 'website.services.cleaning')->name('services.cleaning');
    Route::view('/hotel-reservation', 'website.services.hotel')->name('services.hotel');
    Route::view('/hotel-venue-decoration', 'website.services.venue-decoration')->name('services.venue-decoration');
    Route::view('/catering-services', 'website.services.catering')->name('services.catering');
    Route::view('/warehousing', 'website.services.warehousing')->name('services.warehousing');
});




use App\Http\Controllers\Auth\LoginController;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

    use App\Http\Controllers\Auth\RegisteredUserController;
    // Registration Routes
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Director\DirectorDashboardController;
use App\Http\Controllers\AssistantDirector\AssistantDirectorDashboardController;
use App\Http\Controllers\Manager\ManagerDashboardController;
use App\Http\Controllers\Secretary\SecretaryDashboardController;
use App\Http\Controllers\Staff\StaffDashboardController;
use App\Http\Controllers\Customer\CustomerDashboardController;


Route::middleware(['auth'])->group(function () {
    Route::get('/director/dashboard', fn() => view('system.director.director'))->name('director.dashboard');
    Route::get('/assistantdirector/dashboard', fn() => view('system.assistantdirector.assistantdirector'))->name('assistantdirector.dashboard');
    Route::get('/manager/dashboard', fn() => view('system.manager.manager'))->name('manager.dashboard');
    Route::get('/secretary/dashboard', fn() => view('system.secretary.secretary'))->name('secretary.dashboard');
    Route::get('/staff/dashboard', fn() => view('system.staff.staff'))->name('staff.dashboard');
    Route::get('/customer/dashboard', fn() => view('system.customer.customer'))->name('customer.dashboard');
    Route::get('/user/dashboard', fn() => view('system.user.user'))->name('user.dashboard');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', fn() => view('system.admin.dashboard'))->name('admin.dashboard');
});


// Admin Routes
Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/users', [AdminDashboardController::class, 'users'])->name('users.index');
    Route::get('/settings', [AdminDashboardController::class, 'settings'])->name('settings');
    Route::get('/reports', [AdminDashboardController::class, 'reports'])->name('reports');
    
    // Additional admin routes can be added here
});
use App\Http\Controllers\users\UserLoginController;
use App\Http\Controllers\company\InvoiceController;

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/user-logins', [UserLoginController::class, 'index'])->name('user-logins.index');
});
Route::middleware('auth')->group(function () {
    Route::get('/invoices/create', [InvoiceController::class, 'create'])->name('invoices.create');
    Route::post('/invoices', [InvoiceController::class, 'store'])->name('invoices.store');
    Route::get('/invoices/{invoice}', [InvoiceController::class, 'show'])->name('invoices.show');
    Route::get('/invoices/{invoice}/print', [InvoiceController::class, 'print'])->name('invoices.print');
});


use App\Http\Controllers\users\UsersController;
// Admin Routes
Route::prefix('System-users')->name('users.')->middleware(['auth', 'role:admin,director,secretary'])->group(function () {
    Route::get('/', [UsersController::class, 'index'])->name('users.index');
    Route::get('/create', [UsersController::class, 'create'])->name('users.create');
    Route::post('/store', [UsersController::class, 'store'])->name('users.store');
    Route::get('/users/{user}', [UsersController::class, 'show'])->name('users.show');
    Route::get('/users/{user}/edit', [UsersController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UsersController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UsersController::class, 'destroy'])->name('users.destroy');

    

});


// Profile Routes
use App\Http\Controllers\user\ProfileController;
Route::prefix('profile')->middleware('auth')->group(function () {
    Route::get('/', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/update', [ProfileController::class, 'update'])->name('profile.update');
});


use App\Http\Controllers\FoodController;
use App\Http\Controllers\FoodSaleController;

Route::resource('foods', FoodController::class);
Route::resource('food_sales', \App\Http\Controllers\FoodSaleController::class);
Route::post('food_sales/{foodSale}/mark-paid', [FoodSaleController::class, 'markPaid'])->name('food_sales.markPaid');


use App\Http\Controllers\ServiceController;
use App\Http\Controllers\DrinkController;
use App\Http\Controllers\DrinkSaleController;

Route::middleware(['auth'])->group(function () {
    Route::resource('customer_services', ServiceController::class);
    Route::resource('drinks', DrinkController::class);
    Route::resource('drink_sales', DrinkSaleController::class);
    Route::post('drink_sales/{drinkSale}/mark-paid', [DrinkSaleController::class, 'markPaid'])->name('drink_sales.markPaid');
});


use App\Http\Controllers\SalesDashboardController;
// Dashboard routes
Route::get('/Sales/dashboard', [SalesDashboardController::class, 'index'])->name('sales_dashboard.index');
Route::get('/Sales/dashboard/export', [SalesDashboardController::class, 'exportReport'])->name('sales_dashboard.export');

use App\Http\Controllers\FoodSaleReportController;

Route::get('/reports/food-sales', [FoodSaleReportController::class, 'index'])->name('reports.food_sales');
Route::get('/reports/food-sales/export', [FoodSaleReportController::class, 'export'])->name('reports.food_sales.export');

use App\Http\Controllers\DrinkSaleReportController;

Route::get('/reports/drink-sales', [DrinkSaleReportController::class, 'index'])->name('reports.drink_sales');
Route::get('/reports/drink-sales/export', [DrinkSaleReportController::class, 'export'])->name('reports.drink_sales.export');

use App\Http\Controllers\pos\ReportController;

Route::get('/summary/reports/sales', [ReportController::class, 'index'])->name('sales.reports.index');
// routes/web.php
Route::get('/reports/sales', [ReportController::class, 'salesReport'])->name('reports.sales');
Route::post('/reports/sales/print', [ReportController::class, 'printSalesReport'])->name('reports.sales.print');
Route::get('/sales-reports/export-pdf', [ReportController::class, 'exportPdf'])->name('sales.reports.exportPdf');
        // routes/web.php
Route::get('reports/export-pdf', [ReportController::class, 'exportPdf2'])->name('sales.export.pdf');
Route::get('reports/export-excel', [ReportController::class, 'exportExcel2'])->name('sales.export.excel');

use App\Http\Controllers\pos\ExpenseCategoryController;
use App\Http\Controllers\pos\ExpenseController;
Route::resource('expense_categories', ExpenseCategoryController::class);
Route::resource('expenses', ExpenseController::class);


use App\Http\Controllers\pos\ReportsController;

// Add these routes to your existing web.php file

Route::middleware(['auth'])->group(function () {
    
    // Reports Routes
    Route::prefix('reports')->name('general.reports.')->group(function () {
        Route::get('/pos/Reportpage', [ReportsController::class, 'index'])->name('index');
        Route::get('/Pos/export/pdf', [ReportsController::class, 'exportPdf'])->name('export.pdf');
        Route::get('/pos/export/excel', [ReportsController::class, 'exportExcel'])->name('export.excel');
        Route::get('/pos/export/csv', [ReportsController::class, 'exportCsv'])->name('export.csv');


    });
    
});

use App\Http\Controllers\pos\SalesReportController;

// Sales Reports
Route::get('/general/sales-report', [SalesReportController::class, 'index'])->name('general.sales.report');
Route::get('/general/sales-report/export', [SalesReportController::class, 'export'])->name('general.sales.export');

use App\Http\Controllers\SystemLogController;
Route::get('/System-logs', [SystemLogController::class, 'index'])->name('system.logs.index');
