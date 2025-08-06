<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AdminReportsController extends Controller
{
    /**
     * Display the reports dashboard.
     */
    public function index(Request $request)
    {
        // Default date range (last 30 days)
        $startDate = $request->input('start_date', now()->subDays(30)->format('Y-m-d'));
        $endDate = $request->input('end_date', now()->format('Y-m-d'));
        
        // Validate dates
        $request->validate([
            'start_date' => 'sometimes|date',
            'end_date' => 'sometimes|date|after_or_equal:start_date',
        ]);

        // User statistics
        $userStats = [
            'total' => User::count(),
            'active' => User::where('status', 'active')->count(),
            'new' => User::whereBetween('created_at', [$startDate, Carbon::parse($endDate)->endOfDay()])->count(),
            'byRole' => User::selectRaw('role, count(*) as count')
                ->groupBy('role')
                ->get()
                ->mapWithKeys(fn($item) => [$item->role => $item->count]),
        ];

        // Order statistics (if applicable)
        $orderStats = [
            'total' => Order::count(),
            'completed' => Order::where('status', 'completed')->count(),
            'revenue' => Order::where('status', 'completed')
                ->whereBetween('created_at', [$startDate, Carbon::parse($endDate)->endOfDay()])
                ->sum('total_amount'),
        ];

        return view('admin.reports.index', compact(
            'userStats', 
            'orderStats',
            'startDate',
            'endDate'
        ));
    }

    /**
     * Generate user report.
     */
    public function users(Request $request)
    {
        $query = User::query();
        
        // Apply filters
        if ($request->has('role') && $request->role !== 'all') {
            $query->where('role', $request->role);
        }
        
        if ($request->has('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }
        
        if ($request->has('date_from')) {
            $query->where('created_at', '>=', Carbon::parse($request->date_from));
        }
        
        if ($request->has('date_to')) {
            $query->where('created_at', '<=', Carbon::parse($request->date_to)->endOfDay());
        }
        
        $users = $query->paginate(20);
        
        return view('admin.reports.users', [
            'users' => $users,
            'roles' => User::roles(),
            'statuses' => User::statuses(),
            'filters' => $request->all(),
        ]);
    }

    /**
     * Export user report to CSV.
     */
    public function exportUsers(Request $request)
    {
        $query = User::query();
        
        // Apply the same filters as the users report
        if ($request->has('role') && $request->role !== 'all') {
            $query->where('role', $request->role);
        }
        
        if ($request->has('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }
        
        if ($request->has('date_from')) {
            $query->where('created_at', '>=', Carbon::parse($request->date_from));
        }
        
        if ($request->has('date_to')) {
            $query->where('created_at', '<=', Carbon::parse($request->date_to)->endOfDay());
        }
        
        $users = $query->get();
        
        $fileName = 'users-report-' . now()->format('Y-m-d') . '.csv';
        
        $headers = [
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        ];
        
        $callback = function() use ($users) {
            $file = fopen('php://output', 'w');
            
            // Header row
            fputcsv($file, [
                'ID', 'Name', 'Email', 'Phone', 'Role', 'Status', 'Created At'
            ]);
            
            // Data rows
            foreach ($users as $user) {
                fputcsv($file, [
                    $user->id,
                    $user->name,
                    $user->email,
                    $user->phone,
                    $user->role_name,
                    $user->status_name,
                    $user->created_at->format('Y-m-d H:i:s'),
                ]);
            }
            
            fclose($file);
        };
        
        return response()->stream($callback, 200, $headers);
    }
}