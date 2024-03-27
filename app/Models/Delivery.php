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
        if ($this->status == 1) {
            $this->status = 0;
        } else {
            $this->status = 1;
        }
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
