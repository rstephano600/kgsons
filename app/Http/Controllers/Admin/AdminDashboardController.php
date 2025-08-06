<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function index()
    {
        return view('system.admin.dashboard', [
            'title' => 'Admin Dashboard',
            // Add any data you want to pass to the view
        ]);
    }

    /**
     * Display user management page.
     */
    public function users()
    {
        return view('system.users.index', [
            'title' => 'User Management',
        ]);
    }

    /**
     * Display system settings page.
     */
    public function settings()
    {
        return view('system.admin.settings', [
            'title' => 'System Settings',
        ]);
    }

    /**
     * Display reports page.
     */
    public function reports()
    {
        return view('system.admin.reports', [
            'title' => 'Reports',
        ]);
    }
}
