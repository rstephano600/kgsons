@extends('layouts.app')

@section('title', 'Create Invoice')

@section('content')
<div class="container-fluid">
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <h2 class="h3 fw-semibold text-dark mb-4">Create New Invoice</h2>

            <form id="invoice-form" method="POST" action="{{ route('invoices.store') }}">
                @csrf

                <div class="row mb-4">
                    <!-- Client Information -->
                    <div class="col-md-6 mb-3">
                        <label for="client_id" class="form-label">Client <span class="text-danger">*</span></label>
                        <input type="text" name="client" id="client" class="form-control" required>
                    </div>

                    <!-- Invoice Dates -->
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="invoice_date" class="form-label">Invoice Date <span class="text-danger">*</span></label>
                                <input type="date" name="invoice_date" id="invoice_date" 
                                       class="form-control" required
                                       value="{{ old('invoice_date', date('Y-m-d')) }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="due_date" class="form-label">Due Date <span class="text-danger">*</span></label>
                                <input type="date" name="due_date" id="due_date" 
                                       class="form-control" required
                                       value="{{ old('due_date', date('Y-m-d', strtotime('+30 days'))) }}">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Invoice Items -->
                <div class="mb-4">
                    <h3 class="h5 fw-medium text-dark mb-3">Invoice Items</h3>
                    <div id="items-container">
                        <div class="item-row row g-2 align-items-center mb-2">
                            <div class="col-md-5">
                                <input type="text" name="items[0][product]" 
                                       class="form-control" 
                                       placeholder="Product description" required>
                            </div>
                            <div class="col-md-2">
                                <input type="number" name="items[0][quantity]" 
                                       class="form-control quantity" 
                                       placeholder="Qty" min="1" value="1" required>
                            </div>
                            <div class="col-md-3">
                                <input type="number" step="0.01" name="items[0][unit_price]" 
                                       class="form-control unit-price" 
                                       placeholder="Unit Price" required>
                            </div>
                            <div class="col-md-2 d-flex align-items-center">
                                <span class="item-total fw-medium">0.00</span>
                                <button type="button" class="btn btn-sm btn-link text-danger remove-item d-none ms-2">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <button type="button" id="add-item" class="btn btn-outline-secondary mt-2">
                        <i class="fas fa-plus me-2"></i> Add Item
                    </button>
                </div>

                <!-- Totals -->
                <div class="row mb-4">
                    <div class="col-md-8"></div>
                    <div class="col-md-4">
                        <div class="bg-light p-3 rounded">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="fw-medium">Subtotal:</span>
                                <span id="subtotal">0.00</span>
                            </div>
                            <div class="d-flex justify-between mb-2">
                                <span class="fw-medium">Tax (15%):</span>
                                <span id="tax">0.00</span>
                            </div>
                            <div class="d-flex justify-between fw-bold fs-5">
                                <span>Total:</span>
                                <span id="total">0.00</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Notes -->
                <div class="mb-4">
                    <label for="notes" class="form-label">Notes</label>
                    <textarea name="notes" id="notes" rows="3" class="form-control">{{ old('notes') }}</textarea>
                </div>

                <!-- Form Actions -->
                <div class="d-flex justify-content-end gap-2">
                    <button type="reset" class="btn btn-outline-secondary">
                        <i class="fas fa-undo me-2"></i> Reset
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i> Create Invoice
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add new item row
    let itemCount = 1;
    document.getElementById('add-item').addEventListener('click', function() {
        const template = document.querySelector('.item-row');
        const newRow = template.cloneNode(true);
        
        // Update the name attributes
        newRow.innerHTML = newRow.innerHTML.replace(/items\[0\]/g, `items[${itemCount}]`);
        
        // Show remove button and clear values
        newRow.querySelector('.remove-item').classList.remove('d-none');
        newRow.querySelector('input[name^="items"]').value = '';
        newRow.querySelector('.quantity').value = '1';
        newRow.querySelector('.unit-price').value = '';
        newRow.querySelector('.item-total').textContent = '0.00';
        
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
        if (e.target.classList.contains('quantity') || e.target.classList.contains('unit-price')) {
            calculateItemTotal(e.target.closest('.item-row'));
            calculateTotals();
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

    // Initial calculation
    calculateTotals();
});
</script>
@endpush