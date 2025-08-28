@extends('layouts.app')

@section('title', 'Create Invoice')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-2xl font-semibold mb-6">Create New Invoice</h2>

        <form id="invoice-form" method="POST" action="{{ route('invoices.store') }}">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <!-- Client Information -->
                <div>
                    <label for="client_id" class="block text-sm font-medium text-gray-700 mb-1">Client *</label>
                    <input type="text" name="client" id="client" class="form-input w-full" required>
                </div>

                <!-- Invoice Dates -->
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="invoice_date" class="block text-sm font-medium text-gray-700 mb-1">Invoice Date *</label>
                        <input type="date" name="invoice_date" id="invoice_date" 
                               class="form-input w-full" required
                               value="{{ old('invoice_date', date('Y-m-d')) }}">
                    </div>
                    <div>
                        <label for="due_date" class="block text-sm font-medium text-gray-700 mb-1">Due Date *</label>
                        <input type="date" name="due_date" id="due_date" 
                               class="form-input w-full" required
                               value="{{ old('due_date', date('Y-m-d', strtotime('+30 days'))) }}"
                    </div>
                </div>
            </div>

            <!-- Invoice Items -->
            <div class="mb-6">
                <h3 class="text-lg font-medium text-gray-800 mb-3">Invoice Items</h3>
                <div id="items-container">
                    <div class="item-row grid grid-cols-12 gap-3 mb-3">
                        <div class="col-span-5">
<div class="row">
    <div class="col-md-6">
        <input type="text" name="items[0][product]" class="form-control" placeholder="Enter product name" required>
    </div>
    <div class="col-md-3">
        <input type="number" step="0.01" name="items[0][unit_price]" class="form-control" placeholder="Enter price" required>
    </div>
</div>

                        </div>
                        <div class="col-span-2">
                            <input type="number" name="items[0][quantity]" 
                                   class="form-input quantity" 
                                   placeholder="Qty" min="1" value="1" required>
                        </div>
                        <div class="col-span-3">
                            <input type="number" step="0.01" name="items[0][unit_price]" 
                                   class="form-input unit-price" 
                                   placeholder="Unit Price" required>
                        </div>
                        <div class="col-span-2 flex items-center">
                            <span class="item-total">0.00</span>
                            <button type="button" class="ml-2 text-red-500 remove-item hidden">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <button type="button" id="add-item" class="btn-secondary mt-2">
                    <i class="fas fa-plus mr-2"></i> Add Item
                </button>
            </div>

            <!-- Totals -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                <div class="md:col-span-2"></div>
                <div class="bg-gray-50 p-4 rounded-lg">
                    <div class="flex justify-between mb-2">
                        <span class="font-medium">Subtotal:</span>
                        <span id="subtotal">0.00</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span class="font-medium">Tax (15%):</span>
                        <span id="tax">0.00</span>
                    </div>
                    <div class="flex justify-between text-lg font-bold">
                        <span>Total:</span>
                        <span id="total">0.00</span>
                    </div>
                </div>
            </div>

            <!-- Notes -->
            <div class="mb-6">
                <label for="notes" class="block text-sm font-medium text-gray-700 mb-1">Notes</label>
                <textarea name="notes" id="notes" rows="3" class="form-textarea w-full">{{ old('notes') }}</textarea>
            </div>

            <!-- Form Actions -->
            <div class="flex justify-end space-x-3">
                <button type="reset" class="btn-secondary">
                    <i class="fas fa-undo mr-2"></i> Reset
                </button>
                <button type="submit" class="btn-primary">
                    <i class="fas fa-save mr-2"></i> Create Invoice
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add new item row
    let itemCount = 1;
    document.getElementById('add-item').addEventListener('click', function() {
        const newRow = document.querySelector('.item-row').cloneNode(true);
        newRow.innerHTML = newRow.innerHTML.replace(/items\[0\]/g, `items[${itemCount}]`);
        newRow.querySelector('.remove-item').classList.remove('hidden');
        document.getElementById('items-container').appendChild(newRow);
        itemCount++;
    });

    // Remove item row
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-item') || e.target.closest('.remove-item')) {
            const row = e.target.closest('.item-row');
            if (document.querySelectorAll('.item-row').length > 1) {
                row.remove();
                calculateTotals();
            }
        }
    });

    // Calculate totals when values change
    document.addEventListener('input', function(e) {
        if (e.target.classList.contains('quantity') || 
            e.target.classList.contains('unit-price') ||
            e.target.classList.contains('product-select')) {
            calculateItemTotal(e.target.closest('.item-row'));
            calculateTotals();
        }
    });

    // Set unit price when product selected
    document.addEventListener('change', function(e) {
        if (e.target.classList.contains('product-select')) {
            const selectedOption = e.target.options[e.target.selectedIndex];
            const unitPrice = selectedOption.getAttribute('data-price');
            if (unitPrice) {
                e.target.closest('.item-row').querySelector('.unit-price').value = unitPrice;
                calculateItemTotal(e.target.closest('.item-row'));
                calculateTotals();
            }
        }
    });

    // Calculate item total
    function calculateItemTotal(row) {
        const quantity = parseFloat(row.querySelector('.quantity').value) || 0;
        const unitPrice = parseFloat(row.querySelector('.unit-price').value) || 0;
        const total = quantity * unitPrice;
        row.querySelector('.item-total').textContent = total.toFixed(2);
    }

    // Calculate all totals
    function calculateTotals() {
        let subtotal = 0;
        document.querySelectorAll('.item-row').forEach(row => {
            subtotal += parseFloat(row.querySelector('.item-total').textContent) || 0;
        });

        const tax = subtotal * 0.15;
        const total = subtotal + tax;

        document.getElementById('subtotal').textContent = subtotal.toFixed(2);
        document.getElementById('tax').textContent = tax.toFixed(2);
        document.getElementById('total').textContent = total.toFixed(2);
    }
});
</script>
@endpush