<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableProduct extends Model
{
    protected $fillable = [
        'table_id', 
        'product_id'
    ];

    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }
}
