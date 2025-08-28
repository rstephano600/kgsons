<?php

namespace App\Http\Controllers\company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Invoice;
// use App\Models\Client;
use App\Models\Product;

class InvoiceController extends Controller
{
    public function create()
    {
        // $clients = Client::orderBy('name')->get();
        // $products = Product::orderBy('name')->get();
        
        return view('system.company.invoices.create', );
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'client' => 'required|string|min:3',
            'invoice_date' => 'required|date',
            'due_date' => 'required|date|after_or_equal:invoice_date',
            'items' => 'required|array|min:1',
            'items.*.product' => 'required|string',
            'items.*.quantity' => 'required|numeric|min:1',
            'items.*.unit_price' => 'required|numeric|min:0',
            'notes' => 'nullable|string|max:500',
        ]);

        // Calculate totals
        $subtotal = 0;
        foreach ($request->items as $item) {
            $subtotal += $item['quantity'] * $item['unit_price'];
        }
        $tax = $subtotal * 0.15; // Assuming 15% tax
        $total = $subtotal + $tax;

        // Create invoice
        $invoice = Invoice::create([
            'client' => $request->client,
            'invoice_number' => 'INV-' . strtoupper(uniqid()),
            'invoice_date' => $request->invoice_date,
            'due_date' => $request->due_date,
            'subtotal' => $subtotal,
            'tax' => $tax,
            'total' => $total,
            'notes' => $request->notes,
        ]);

        // Add invoice items
        foreach ($request->items as $item) {
            $invoice->items()->create([
                'product' => $item['product'],
                'quantity' => $item['quantity'],
                'unit_price' => $item['unit_price'],
                'total' => $item['quantity'] * $item['unit_price'],
            ]);
        }

        return redirect()->route('invoices.show', $invoice)
            ->with('success', 'Invoice created successfully!');
    }

    public function show(Invoice $invoice)
    {
        return view('system.company.invoices.show', compact('invoice'));
    }

    public function print(Invoice $invoice)
    {
        return view('system.company.invoices.print', compact('invoice'));
    }
}