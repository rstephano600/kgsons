<?php


    use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;
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











// Home Route (redirects to appropriate dashboard based on role)
Route::get('/login', function () {
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
Route::get('/login', function () {
    return auth()->check() ? redirect()->route('home') : redirect()->route('login');
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
