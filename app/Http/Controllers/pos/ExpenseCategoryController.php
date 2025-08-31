<?php

namespace App\Http\Controllers\pos;

use App\Http\Controllers\Controller;

use App\Models\ExpenseCategory;
use Illuminate\Http\Request;

class ExpenseCategoryController extends Controller
{
    /**
     * Display a listing of the expense categories with search and pagination.
     */
    public function index(Request $request)
    {
        $query = ExpenseCategory::query();

        // Search
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $categories = $query->latest()->paginate(10);

        return view('system.pos.expense.expense_categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new expense category.
     */
    public function create()
    {
        return view('system.pos.expense.expense_categories.create');
    }

    /**
     * Store a newly created expense category.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:expense_categories,name',
            'description' => 'nullable|string|max:500',
        ]);

        $expenseCategory = ExpenseCategory::create($validated);
        LogActivity::add(
        'create',
        'Expense Category',
        $expenseCategory->id,
        'Created a new expense category: ' . $expenseCategory->name
    );

        return redirect()->route('expense_categories.index')
            ->with('success', 'Expense category created successfully.');
    }

    /**
     * Show the form for editing the specified expense category.
     */
    public function edit(ExpenseCategory $expenseCategory)
    {
        return view('system.pos.expense.expense_categories.edit', compact('expenseCategory'));
    }

    /**
     * Update the specified expense category.
     */
    public function update(Request $request, ExpenseCategory $expenseCategory)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:expense_categories,name,' . $expenseCategory->id,
            'description' => 'nullable|string|max:500',
        ]);

        $expenseCategory->update($validated);
        LogActivity::add(
        'update',
        'Expense Category',
        $expenseCategory->id,
        'Created a new expense category: ' . $expenseCategory->name
    );

        return redirect()->route('expense_categories.index')
            ->with('success', 'Expense category updated successfully.');
    }

    /**
     * Remove the specified expense category.
     */
    public function destroy(ExpenseCategory $expenseCategory)
    {
        $expenseCategory->delete();
        LogActivity::add(
        'delete',
        'Expense Category',
        $expenseCategory->id,
        'Created a new expense category: ' . $expenseCategory->name
    );

        return redirect()->route('expense_categories.index')
            ->with('success', 'Expense category deleted successfully.');
    }
}
