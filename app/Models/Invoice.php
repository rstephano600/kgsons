<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'client',
        'invoice_number',
        'invoice_date',
        'due_date',
        'subtotal',
        'tax',
        'total',
        'notes',
        'paid_at',
    ];

    protected $dates = [
        'invoice_date',
        'due_date',
        'paid_at',
    ];

    public function items()
    {
        return $this->hasMany(InvoiceItem::class);
    }
}
