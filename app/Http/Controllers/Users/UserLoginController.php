<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserLoginController extends Controller
{
    public function index(Request $request)
    {
        $query = DB::table('user_logins')
            ->join('users', 'user_logins.user_id', '=', 'users.id')
            ->select('user_logins.*', 'users.name', 'users.email', 'users.role')
            ->orderBy('user_logins.login_time', 'desc');

        // Search
        if ($request->search) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('users.name', 'like', "%$search%")
                  ->orWhere('users.email', 'like', "%$search%")
                  ->orWhere('user_logins.ip_address', 'like', "%$search%");
            });
        }

        // Filter by role
        if ($request->role) {
            $query->where('users.role', $request->role);
        }

        // Filter by date
        if ($request->date) {
            $query->whereDate('user_logins.login_time', $request->date);
        }

        $roles = DB::table('users')->distinct()->pluck('role');
        $logins = $query->paginate(10);

        return view('system.user_logins.index', compact('logins', 'roles'));
    }
}
