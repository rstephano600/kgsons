<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index(Request $request)
    {
        $query = Food::query();

        // simple search & filters
        if ($s = $request->get('s')) {
            $query->where('name', 'like', "%{$s}%")
                  ->orWhere('category', 'like', "%{$s}%");
        }
        if ($request->filled('active')) {
            $query->where('is_active', (bool)$request->boolean('active'));
        }

        $foods = $query->latest()->paginate(10)->withQueryString();

        return view('system.pos.foods.index', compact('foods'));
    }

    public function create()
    {
        return view('system.pos.foods.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'     => ['required','string','max:255'],
            'price'    => ['required','numeric','min:0'],
            'category' => ['nullable','string','max:100'],
            'stock'    => ['nullable','integer','min:0'],
            'is_active'=> ['nullable','boolean'],
        ]);

        $data['is_active'] = $request->boolean('is_active', true);
        $data['stock']     = $data['stock'] ?? 0;

        Food::create($data);

        return redirect()->route('foods.index')->with('success', 'Food item created.');
    }

    public function show(Food $food)
    {
        return view('system.pos.foods.show', compact('food'));
    }

    public function edit(Food $food)
    {
        return view('system.pos.foods.edit', compact('food'));
    }

    public function update(Request $request, Food $food)
    {
        $data = $request->validate([
            'name'     => ['required','string','max:255'],
            'price'    => ['required','numeric','min:0'],
            'category' => ['nullable','string','max:100'],
            'stock'    => ['nullable','integer','min:0'],
            'is_active'=> ['nullable','boolean'],
        ]);

        $data['is_active'] = $request->boolean('is_active', true);
        $data['stock']     = $data['stock'] ?? 0;

        $food->update($data);

        return redirect()->route('foods.index')->with('success', 'Food item updated.');
    }

    public function uupdate(Request $request, FoodSale $foodSale)
{
    $foodSale->update([
        'quantity'       => $request->quantity,
        'total_price'    => $foodSale->food->price * $request->quantity,
        'updated_by'     => auth()->id(),
        'payment_method' => $request->payment_method,
    ]);

    return redirect()->route('food_sales.index')->with('success', 'Sale updated successfully.');
}


    public function destroy(Food $food)
    {
        $food->delete();

        return back()->with('success', 'Food item deleted.');
    }
}
