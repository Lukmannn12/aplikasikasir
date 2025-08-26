<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PesananItem extends Model
{
    protected $fillable = ['pesanan_id', 'product_id', 'quantity', 'price', 'subtotal'];

    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
