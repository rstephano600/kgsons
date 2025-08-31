<?php

namespace App\Http\Controllers;

use App\Models\DrinkSale;
use App\Models\Drink;
use App\Models\Service;
use App\Helpers\LogActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DrinkSaleController extends Controller
{
    /**
     * Display a listing of drink sales with search & filters.
     */
    public function index(Request $request)
    {
        $query = DrinkSale::with(['drink', 'service', 'createdBy']);

        // Filters
        if ($request->filled('search')) {
            $search = $request->search;
            $query->whereHas('drink', function ($q) use ($search) {
                $q->where('name', 'like', "%$search%");
            });
        }

        if ($request->filled('payment_method')) {
            $query->where('payment_method', $request->payment_method);
        }

        if ($request->filled('is_paid')) {
            $query->where('is_paid', $request->is_paid);
        }

        $drinkSales = $query->latest()->paginate(100);

        return view('system.pos.drink_sales.index', compact('drinkSales'));
    }

    /**
     * Show the form for creating a new drink sale.
     */
    public function create()
    {
        $drinks = Drink::all();
        $services = Service::all();
        return view('system.pos.drink_sales.create', compact('drinks', 'services'));
    }

    /**
     * Store a newly created drink sale.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'drink_id' => 'required|exists:drinks,id',
            'quantity' => 'required|integer|min:1',
            'service_id' => 'nullable|exists:customer_services,id',
        ]);

    $drink = Drink::findOrFail($request->drink_id);
    $price = $drink->price;
    $quantity = $request->quantity;
    $total = $price * $quantity;

    $DrinkSale = DrinkSale::create([
        'drink_id'       => $drink->id,
        'quantity'      => $quantity,
        'price'         => $price,
        'total'         => $total,
        'created_by'    => auth()->id(),
        'payment_method'=> $request->payment_method ?? null,
        'is_paid'       => false,
        'service_id'    => $request->service_id,
    ]);

    LogActivity::add(
        'create',
        'Drink Sales',
        $DrinkSale->id,
        'created a new drink: ' . $DrinkSale->name
    );

        return redirect()->route('drink_sales.index')->with('success', 'Drink Sale recorded successfully.');
    }

    /**
     * Display the specified drink sale.
     */
    public function show(DrinkSale $drinkSale)
    {
        $drinkSale->load(['drink', 'service', 'createdBy']);
        return view('system.pos.drink_sales.show', compact('drinkSale'));
    }

    /**
     * Show the form for editing a drink sale.
     */
    public function edit(DrinkSale $drinkSale)
    {
        $drinks = Drink::all();
        $services = Service::all();
        return view('system.pos.drink_sales.edit', compact('drinkSale', 'drinks', 'services'));
    }

    /**
     * Update the specified drink sale.
     */
    public function update(Request $request, DrinkSale $drinkSale)
    {
        $validated = $request->validate([
            'drink_id' => 'required|exists:drinks,id',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'payment_method' => 'nullable|in:cash,lipa,bank transfer',
            'service_id' => 'nullable|exists:services,id',
        ]);

        $validated['total'] = $validated['price'] * $validated['quantity'];
        $validated['updated_by'] = Auth::id();

        $drinkSale->update($validated);

            LogActivity::add(
        'Update',
        'Drink Sales',
        $drinkSale->id,
        'Updated a  drink: ' . $drinkSale->name
    );


        return redirect()->route('drink-sales.index')->with('success', 'Drink Sale updated successfully.');
    }

    
    public function markPaid(DrinkSale $drinkSale, Request $request)
    {
    $request->validate([
        'payment_method' => 'required|in:cash,lipa,bank_transfer',
    ]);

    $drinkSale->update([
        'is_paid'   => true,
        'payment_method' => $request->payment_method,
        'paid_at'   => now(),
        'updated_by'=> auth()->id(),
    ]);

    LogActivity::add(
        'Mark paid',
        'Drink Sales',
        $drinkSale->id,
        'marked as paid a new drink: ' . $drinkSale->name
    );


    return redirect()->route('drink_sales.index')->with('success', 'Sale marked as paid.');
    }

    /**
     * Remove the specified drink sale.
     */
    public function destroy(DrinkSale $drinkSale)
    {
        $drinkSale->delete();
        LogActivity::add(
        'delete',
        'Drink Sales',
        $drinkSale->id,
        'Deleted a new drink: ' . $drinkSale->name
    );

        return redirect()->route('drink_sales.index')->with('success', 'Drink Sale deleted successfully.');
    }
}
