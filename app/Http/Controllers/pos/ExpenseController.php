<?php

namespace App\Http\Controllers\pos;

use App\Http\Controllers\Controller;

use App\Models\Expense;
use App\Models\ExpenseCategory;
use App\Helpers\LogActivity;
use Illuminate\Http\Request;


class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource with search, filter & pagination.
     */
    public function index(Request $request)
    {
        $query = Expense::with('category');

        // 🔍 Search by item name/description
        if ($request->filled('search')) {
            $query->where('item_name', 'like', '%' . $request->search . '%')
                  ->orWhere('item_name', 'like', '%' . $request->search . '%');
        }

        // 📂 Filter by category
        if ($request->filled('category_id')) {
            $query->where('expense_category_id', $request->category_id);
        }

        // 📅 Filter by date range
        if ($request->filled('from_date') && $request->filled('to_date')) {
            $query->whereBetween('expense_date', [$request->from_date, $request->to_date]);
        }

        $expenses = $query->orderBy('expense_date', 'desc')->paginate(10);
        $categories = ExpenseCategory::all();

        return view('system.pos.expense.expenses.index', compact('expenses', 'categories'));
    }

    /**
     * Show the form for creating new expenses.
     */
    public function create()
    {
        $categories = ExpenseCategory::all();
        return view('system.pos.expense.expenses.create', compact('categories'));
    }

    /**
     * Store multiple expenses at once.
     */
public function store(Request $request) 
{
$request->validate([
    'expenses.*.item_name' => 'required|string|max:255',
    'expenses.*.amount' => 'required|numeric|min:0',
    'expenses.*.expense_date' => 'required|date',
    'expenses.*.expense_category_id' => 'required|exists:expense_categories,id',
]);

foreach ($request->expenses as $exp) {
    $exp['created_by'] = auth()->id();

    // Create expense record
    $expense = Expense::create($exp);

    // Log the activity
    LogActivity::add(
        'create',
        'Expense',
        $expense->id,
        'Created a new expense: ' . $expense->item_name
    );
}

    return redirect()->route('expenses.index')->with('success', 'Expenses saved successfully!');
}


    /**
     * Show the form for editing a specific expense.
     */
    public function edit(Expense $expense)
    {
        $categories = ExpenseCategory::all();
        return view('system.pos.expense.expenses.edit', compact('expense', 'categories'));
    }

    /**
     * Update a specific expense.
     */
    public function update(Request $request, Expense $expense)
    {
$request->validate([
    'item_name' => 'required|string|max:255',
    'amount' => 'required|numeric|min:0',
    'expense_date' => 'required|date',
    'expense_category_id' => 'required|exists:expense_categories,id',
]);

// Inject updated_by (or overwrite created_by if you don’t have updated_by column)
$data = $request->only(['item_name', 'amount', 'expense_date', 'expense_category_id']);
$data['created_by'] = auth()->id();

$expense->update($data);

// Log activity
LogActivity::add(
    'update',
    'Expense',
    $expense->id,
    'Updated expense: ' . $expense->item_name
);


        return redirect()->route('expenses.index')->with('success', 'Expense updated successfully!');
    }

    /**
     * Remove the specified expense.
     */
    public function destroy(Expense $expense)
    {
        $expense->delete();

    LogActivity::add(
        'delete',
        'Expense',
        $expense->id,
        'Deleted an expense'
    );
        return redirect()->route('expenses.index')->with('success', 'Expense deleted successfully!');
    }
}
