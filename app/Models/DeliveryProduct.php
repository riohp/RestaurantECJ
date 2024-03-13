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
    ];
}
