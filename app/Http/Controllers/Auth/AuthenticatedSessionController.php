<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        // Redirect based on user role
        $redirectTo = match(auth()->user()->role) {
            'admin' => '/admin/dashboard',
            'director' => '/director/dashboard',
            'assistantdirector' => '/assistant-director/dashboard',
            'manager' => '/manager/dashboard',
            'secretary' => '/secretary/dashboard',
            'staff' => '/staff/dashboard',
            default => '/dashboard',
        };

        return redirect()->intended($redirectTo);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}