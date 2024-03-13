<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;

    protected $fillable =[
        'full_name',
        'cellphone',
        'address',
        'invoice_id'
    ];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    
}
