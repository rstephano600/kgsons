@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Add Expenses</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Please fix the errors below.<br><br>
            <ul>
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('expenses.store') }}" method="POST">
        @csrf

        <div id="expenses-wrapper">
            <div class="row g-3 mb-3 expense-item">
                <div class="col-md-3">
                    <select name="expenses[0][expense_category_id]" class="form-select" required>
                        <option value="">Choose Category</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <input type="text" name="expenses[0][item_name]" class="form-control" placeholder="Item name" required>
                </div>
                <div class="col-md-2">
                    <input type="number" name="expenses[0][amount]" class="form-control" placeholder="Amount" step="0.01" required>
                </div>
                <div class="col-md-2">
                    <input type="date" name="expenses[0][expense_date]" class="form-control" required>
                </div>
                <div class="col-md-2 d-flex align-items-center">
                    <button type="button" class="btn btn-danger remove-expense">X</button>
                </div>
            </div>
        </div>

        <div class="mb-3">
            <button type="button" class="btn btn-info" id="add-expense">+ Add More</button>
        </div>

        <button type="submit" class="btn btn-success">Save Expenses</button>
        <a href="{{ route('expenses.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<script>
let expenseIndex = 1;

document.getElementById('add-expense').addEventListener('click', function() {
    const wrapper = document.getElementById('expenses-wrapper');
    const newRow = document.createElement('div');
    newRow.classList.add('row', 'g-3', 'mb-3', 'expense-item');

    newRow.innerHTML = `
        <div class="col-md-3">
            <select name="expenses[${expenseIndex}][expense_category_id]" class="form-select" required>
                <option value="">Choose Category</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <input type="text" name="expenses[${expenseIndex}][item_name]" class="form-control" placeholder="item name" required>
        </div>
        <div class="col-md-2">
            <input type="number" name="expenses[${expenseIndex}][amount]" class="form-control" placeholder="Amount" step="0.01" required>
        </div>
        <div class="col-md-2">
            <input type="date" name="expenses[${expenseIndex}][expense_date]" class="form-control" required>
        </div>
        <div class="col-md-2 d-flex align-items-center">
            <button type="button" class="btn btn-danger remove-expense">X</button>
        </div>
    `;

    wrapper.appendChild(newRow);
    expenseIndex++;
});

document.addEventListener('click', function(e) {
    if (e.target.classList.contains('remove-expense')) {
        e.target.closest('.expense-item').remove();
    }
});
</script>
@endsection
