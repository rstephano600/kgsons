<?php
namespace App\Http\Controllers;

use App\Models\Drink;
use App\Helpers\LogActivity;
use Illuminate\Http\Request;

class DrinkController extends Controller
{
    public function index(Request $request)
    {
        $query = Drink::query();

        // Search by name
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Filter by stock availability
        if ($request->filled('stock_status')) {
            if ($request->stock_status === 'in_stock') {
                $query->where('stock', '>', 0);
            } elseif ($request->stock_status === 'out_of_stock') {
                $query->where('stock', '=', 0);
            }
        }

        // Filter by price range
        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }
        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        $drinks = $query->latest()->paginate(10);

        return view('system.pos.drinks.index', compact('drinks'));
    }

    public function create()
    {
        return view('system.pos.drinks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'category'  => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        $drink = Drink::create([
            'name'       => $request->name,
            'category'       => $request->category,
            'price'      => $request->price,
            'stock'      => $request->stock,
            'created_by' => auth()->id(),
        ]);

        LogActivity::add(
        'create',
        'Drinks',
        $drink->id,
        'Created a new Drink: ' . $drink->name
    );
        return redirect()->route('drinks.index')->with('success', 'Drink added successfully!');
    }

    public function show(Drink $drink)
    {
        return view('system.pos.drinks.show', compact('drink'));
    }

    public function edit(Drink $drink)
    {
        return view('system.pos.drinks.edit', compact('drink'));
    }

    public function update(Request $request, Drink $drink)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        $drink->update([
            'name'       => $request->name,
            'price'      => $request->price,
            'stock'      => $request->stock,
            'updated_by' => auth()->id(),
        ]);

        LogActivity::add(
        'update',
        'Drinks',
        $drink->id,
        'updated a drink: ' . $drink->name
    );

        return redirect()->route('drinks.index')->with('success', 'Drink updated successfully!');
    }

    public function destroy(Drink $drink)
    {
        $drink->delete();
        LogActivity::add(
        'Delete',
        'Drinks',
        $drink->id,
        'Deleted a drink: ' . $drink->name
    );
        return redirect()->route('drinks.index')->with('success', 'Drink deleted successfully!');
    }
}
