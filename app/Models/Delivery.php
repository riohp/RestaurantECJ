<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;

    protected $fillable =[
        'client_id',
        'full_name',
        'cellphone',
        'address',
        'invoice_id',
        'status',
    ];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    
}
