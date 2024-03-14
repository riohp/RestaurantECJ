<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryProduct extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id', 
        'deliveries_id',
        'description',
        'status',
    ];


    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function delivery()
    {
        return $this->belongsTo(Delivery::class, 'deliveries_id');
    }
}
