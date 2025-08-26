<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $fillable = ['customer_id', 'total_price', 'status', 'payment_method', 'cash_amount'];

    public function items()
    {
        return $this->hasMany(PesananItem::class);
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

}
