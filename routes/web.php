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



use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;


// Authentication Routes
Route::middleware('guest')->group(function () {
    // Login Routes
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
    
    // Registration Routes
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);
    
    // Password Reset Routes
    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');
    
    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');
    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.update');
});

// Logout Route
Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
            ->middleware('auth')
            ->name('logout');



use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Director\DirectorDashboardController;
use App\Http\Controllers\AssistantDirector\AssistantDirectorDashboardController;
use App\Http\Controllers\Manager\ManagerDashboardController;
use App\Http\Controllers\Secretary\SecretaryDashboardController;
use App\Http\Controllers\Staff\StaffDashboardController;
use App\Http\Controllers\Customer\CustomerDashboardController;



// Common Authenticated Routes
Route::middleware('auth')->group(function () {
    // Profile Routes (accessible to all roles)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Routes
Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/users', [AdminDashboardController::class, 'users'])->name('users.index');
    Route::get('/settings', [AdminDashboardController::class, 'settings'])->name('settings');
    Route::get('/reports', [AdminDashboardController::class, 'reports'])->name('reports');
    
    // Additional admin routes can be added here
});

// Director Routes
Route::prefix('director')->name('director.')->middleware(['auth', 'role:director'])->group(function () {
    Route::get('/dashboard', [DirectorDashboardController::class, 'index'])->name('dashboard');
    Route::get('/financials', [DirectorDashboardController::class, 'financials'])->name('financials');
    Route::get('/projects', [DirectorDashboardController::class, 'projects'])->name('projects');
    
    // Additional director routes can be added here
});

// Assistant Director Routes
Route::prefix('assistant-director')->name('assistant-director.')->middleware(['auth', 'role:assistantdirector'])->group(function () {
    Route::get('/dashboard', [AssistantDirectorDashboardController::class, 'index'])->name('dashboard');
    Route::get('/operations', [AssistantDirectorDashboardController::class, 'operations'])->name('operations');
    Route::get('/team', [AssistantDirectorDashboardController::class, 'team'])->name('team');
    
    // Additional assistant director routes can be added here
});

// Manager Routes
Route::prefix('manager')->name('manager.')->middleware(['auth', 'role:manager'])->group(function () {
    Route::get('/dashboard', [ManagerDashboardController::class, 'index'])->name('dashboard');
    Route::get('/tasks', [ManagerDashboardController::class, 'tasks'])->name('tasks');
    Route::get('/performance', [ManagerDashboardController::class, 'performance'])->name('performance');
    
    // Additional manager routes can be added here
});

// Secretary Routes
Route::prefix('secretary')->name('secretary.')->middleware(['auth', 'role:secretary'])->group(function () {
    Route::get('/dashboard', [SecretaryDashboardController::class, 'index'])->name('dashboard');
    Route::get('/appointments', [SecretaryDashboardController::class, 'appointments'])->name('appointments');
    Route::get('/documents', [SecretaryDashboardController::class, 'documents'])->name('documents');
    
    // Additional secretary routes can be added here
});

// Staff Routes
Route::prefix('staff')->name('staff.')->middleware(['auth', 'role:staff'])->group(function () {
    Route::get('/dashboard', [StaffDashboardController::class, 'index'])->name('dashboard');
    Route::get('/tasks', [StaffDashboardController::class, 'tasks'])->name('tasks');
    Route::get('/attendance', [StaffDashboardController::class, 'attendance'])->name('attendance');
    
    // Additional staff routes can be added here
});

// Customer Routes
Route::prefix('customer')->name('customer.')->middleware(['auth', 'role:customer'])->group(function () {
    Route::get('/dashboard', [CustomerDashboardController::class, 'index'])->name('dashboard');
    Route::get('/orders', [CustomerDashboardController::class, 'orders'])->name('orders');
    Route::get('/support', [CustomerDashboardController::class, 'support'])->name('support');
    
    // Additional customer routes can be added here
});

// Home Route (redirects to appropriate dashboard based on role)
Route::get('/home', function () {
    $user = auth()->user();
    
    return match($user->role) {
        'admin' => redirect()->route('admin.dashboard'),
        'director' => redirect()->route('director.dashboard'),
        'assistantdirector' => redirect()->route('assistant-director.dashboard'),
        'manager' => redirect()->route('manager.dashboard'),
        'secretary' => redirect()->route('secretary.dashboard'),
        'staff' => redirect()->route('staff.dashboard'),
        'customer' => redirect()->route('customer.dashboard'),
        default => redirect('/'),
    };
})->middleware('auth')->name('home');

// Default route redirects to login
Route::get('/', function () {
    return auth()->check() ? redirect()->route('home') : redirect()->route('login');
});

use App\Http\Controllers\users\UsersController;
// Admin Routes
Route::prefix('System-users')->name('users.')->middleware(['auth', 'role:admin,director,secretary'])->group(function () {
    Route::get('/', [UsersController::class, 'index'])->name('users.index');
    Route::get('/create', [UsersController::class, 'create'])->name('users.create');
    Route::get('/edit', [UsersController::class, 'edit'])->name('users.edit');
    Route::post('/store', [UsersController::class, 'store'])->name('users.store');
    Route::get('/show', [UsersController::class, 'show'])->name('users.show');
    Route::get('/destroy', [UsersController::class, 'destroy'])->name('users.destroy');

});