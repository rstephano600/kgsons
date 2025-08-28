@extends('layouts.app')

@section('title', 'Invoice #' . $invoice->invoice_number)

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold">Invoice #{{ $invoice->invoice_number }}</h1>
        <div class="flex space-x-2">
            <a href="{{ route('invoices.print', $invoice) }}" target="_blank" class="btn-secondary">
                <i class="fas fa-print mr-2"></i> Print
            </a>
            <a href="#" class="btn-primary">
                <i class="fas fa-envelope mr-2"></i> Send
            </a>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6 mb-6">
        <!-- Invoice Header -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div>
                <h3 class="text-lg font-semibold mb-2">From:</h3>
                <p class="font-bold">Your Company Name</p>
                <p>123 Business Street</p>
                <p>City, State 10001</p>
                <p>Phone: (123) 456-7890</p>
                <p>Email: info@yourcompany.com</p>
            </div>

            <div>
                <h3 class="text-lg font-semibold mb-2">To:</h3>
                <p class="font-bold">{{ $invoice->client}}</p>
            </div>

            <div class="md:text-right">
                <div class="bg-gray-50 p-4 rounded-lg inline-block">
                    <p class="font-semibold">Invoice #{{ $invoice->invoice_number }}</p>
                    <p><span class="font-medium">Date:</span> {{ $invoice->invoice_date}}</p>
                    <p><span class="font-medium">Due Date:</span> {{ $invoice->due_date}}</p>
                    <p><span class="font-medium">Status:</span> 
                        <span class="px-2 py-1 text-xs rounded-full 
                            @if($invoice->paid_at) bg-green-100 text-green-800
                            @elseif($invoice->due_date) bg-red-100 text-red-800
                            @else bg-yellow-100 text-yellow-800 @endif">
                            @if($invoice->paid_at) Paid
                            @elseif($invoice->due_date) Overdue
                            @else Pending @endif
                        </span>
                    </p>
                </div>
            </div>
        </div>

        <!-- Invoice Items -->
        <div class="mb-8">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Item</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantity</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Unit Price</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($invoice->items as $item)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $item->product }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $item->quantity }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ ($item->unit_price) }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ ($item->total) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Invoice Totals -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="md:col-span-2">
                @if($invoice->notes)
                <div class="bg-gray-50 p-4 rounded-lg">
                    <h4 class="font-medium mb-2">Notes</h4>
                    <p class="text-gray-700">{{ $invoice->notes }}</p>
                </div>
                @endif
            </div>
            <div class="bg-gray-50 p-4 rounded-lg">
                <div class="flex justify-between mb-2">
                    <span class="font-medium">Subtotal:</span>
                    <span>{{ ($invoice->subtotal) }}</span>
                </div>
                <div class="flex justify-between mb-2">
                    <span class="font-medium">Tax (15%):</span>
                    <span>{{ ($invoice->tax) }}</span>
                </div>
                <div class="flex justify-between text-lg font-bold border-t pt-2 mt-2">
                    <span>Total:</span>
                    <span>{{ ($invoice->total) }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection