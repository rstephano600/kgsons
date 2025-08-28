<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); // You will create this view
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Check user status
            if ($user->status !== 'active') {
                Auth::logout();
                return back()->withErrors(['email' => 'Account is ' . $user->status]);
            }

            // Store login information
            DB::table('user_logins')->insert([
                'user_id'    => $user->id,
                'login_time' => Carbon::now(),
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Set cache for online status
            Cache::put('user-is-online-' . $user->id, true, now()->addMinutes(10));

    switch ($user->role) {
    case 'admin':
        return redirect()->route('admin.dashboard');
    case 'director':
        return redirect()->route('director.dashboard');
    case 'assistantdirector':
        return redirect()->route('assistantdirector.dashboard');
    case 'manager':
        return redirect()->route('manager.dashboard');
    case 'secretary':
        return redirect()->route('secretary.dashboard');
    case 'staff':
        return redirect()->route('staff.dashboard');
    case 'customer':
        return redirect()->route('customer.dashboard');
    case 'user':
        return redirect()->route('user.dashboard');
    default:
        return redirect()->route('dashboard');
}
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout(Request $request)
    {
        $user = Auth::user();

        // Remove from online cache
        Cache::forget('user-is-online-' . $user->id);

        Auth::logout();
        return redirect('/login');
    }



}
