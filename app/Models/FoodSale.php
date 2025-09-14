<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodSale extends Model
{
    use HasFactory;

    protected $fillable = [
        'food_id',
        'quantity',
        'price',
        'total',
        'created_by',
        'updated_by',
        'payment_method',
        'is_paid',
        'paid_at',
        'serviced_by',
    ];

    public function food()
    {
        return $this->belongsTo(Food::class);
    }
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
public function service()
{
    return $this->belongsTo(User::class, 'serviced_by');
}
public function servicedBy()
{
    return $this->belongsTo(User::class, 'serviced_by');
}


}
