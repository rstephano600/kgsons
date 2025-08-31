<?php

namespace App\Http\Controllers;

use App\Models\SystemLog;
use Illuminate\Http\Request;

class SystemLogController extends Controller
{
public function index(Request $request)
{
        $query = SystemLog::with('user')->latest();

    // Search by user name (text search)
    if ($request->filled('user')) {
        $query->whereHas('user', function ($q) use ($request) {
            $q->where('name', 'like', '%' . $request->user . '%');
        });
    }
    // 🔎 Filter by action (create/update/delete etc.)
    if ($request->filled('action')) {
        $query->where('action', $request->action);
    }

    // 🔎 Filter by model (Expense, Product, etc.)
    if ($request->filled('model')) {
        $query->where('model', $request->model);
    }

    // 🔎 Filter by date range
    if ($request->filled('date_from') && $request->filled('date_to')) {
        $query->whereBetween('created_at', [
            $request->date_from . " 00:00:00",
            $request->date_to . " 23:59:59"
        ]);
    }

    $logs = $query->latest()->paginate(100);

    // send filters back to view to keep selected values
    return view('system.system_logs.index', compact('logs'))
        ->with('filters', $request->all());
}


}

