<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;

    protected $fillable =[
        'client_id',
        'cellphone',
        'address',
        'invoice_id',
        'status'
    ];

    public function changeStatus()
    {
        $this->status = !$this->status; // Alternar entre 0 y 1
        $this->save(); 
    }

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    public function client()
    {
        return $this->belongsTo(User::class);
    }    
}
