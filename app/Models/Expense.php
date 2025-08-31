<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Expense extends Model
{
    protected $fillable = [
        'expense_category_id',
        'item_name',
        'amount',
        'expense_date',
        'payment_method',
        'note',
        'created_by',
    ];
    protected $casts = [
        'expense_date' => 'date',
    ];
    public function category()
    {
        return $this->belongsTo(ExpenseCategory::class, 'expense_category_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}

