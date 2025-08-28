<?php


namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Food;
use App\Models\FoodSale;
use App\Models\Service;
use Illuminate\Http\Request;

class FoodSaleController extends Controller
{
// app/Http/Controllers/FoodSaleController.php
public function index(Request $request)
{
    $foodSales = \App\Models\FoodSale::with('food')
        ->when($request->filled('search'), function ($q) use ($request) {
            $term = $request->input('search');
            $q->whereHas('food', fn($fq) => $fq->where('name', 'like', "%{$term}%"));
        })
        ->when($request->filled('date'), function ($q) use ($request) {
            $q->whereDate('created_at', $request->input('date'));
        })
        ->latest()
        ->paginate(10)
        ->withQueryString();

    return view('system.pos.food_sales.index', compact('foodSales'));
}


    public function create()
    {
        $foods = Food::where('is_active', true)->get();
        $services = Service::with('user')->get();
        return view('system.pos.food_sales.create', compact('foods','services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'food_id'  => 'required|exists:foods,id',
            'quantity' => 'required|integer|min:1',
            'service_id' => 'required|exists:users,id',
        ]);

        $food = Food::findOrFail($request->food_id);
        $price = $food->price;
        $quantity = $request->quantity;
        $total = $price * $quantity;

        FoodSale::create([
            'food_id'  => $food->id,
            'quantity' => $quantity,
            'price'    => $price,
            'total'    => $total,
            'created_by'    => auth()->id(),
            'payment_method'=> $request->payment_method ?? null,
            'is_paid'       => false, // default unpaid
            'service_id' => $service_id,
        ]);

        return redirect()->route('food_sales.index')->with('success', 'Sale recorded successfully!');
    }

    public function show(FoodSale $foodSale)
    {
        return view('system.pos.food_sales.show', compact('foodSale'));
    }

    public function edit(FoodSale $foodSale)
    {
        $foods = Food::all();
        return view('system.pos.food_sales.edit', compact('foodSale','foods'));
    }

    public function update(Request $request, FoodSale $foodSale)
    {
        $request->validate([
            'food_id'  => 'required|exists:foods,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $food = Food::findOrFail($request->food_id);
        $price = $food->price;
        $quantity = $request->quantity;
        $total = $price * $quantity;

        $foodSale->update([
            'food_id'  => $food->id,
            'quantity' => $quantity,
            'price'    => $price,
            'total'    => $total,
        ]);

        return redirect()->route('food_sales.index')->with('success', 'Sale updated successfully!');
    }

    public function markPaid(FoodSale $foodSale, Request $request)
{
    $request->validate([
        'payment_method' => 'required|in:cash,lipa,bank_transfer',
    ]);

    $foodSale->update([
        'is_paid'   => true,
        'payment_method' => $request->payment_method,
        'paid_at'   => now(),
        'updated_by'=> auth()->id(),
    ]);

    return redirect()->route('food_sales.index')->with('success', 'Sale marked as paid.');
}


    public function destroy(FoodSale $foodSale)
    {
        $foodSale->delete();
        return redirect()->route('food_sales.index')->with('success', 'Sale deleted successfully!');
    }
}
