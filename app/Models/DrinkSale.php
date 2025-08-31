<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DrinkSale extends Model
{
    use HasFactory;

    protected $fillable = [
        'drink_id',
        'quantity',
        'price',
        'total',
        'service_id',
        'created_by',
        'updated_by',
        'payment_method',
        'is_paid',
        'paid_at',
    ];

    // Relations
    public function drink()
    {
        return $this->belongsTo(Drink::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
