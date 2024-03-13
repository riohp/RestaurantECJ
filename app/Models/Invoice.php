<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'total',
        'responsible_id',
        'tipo',
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

    public function items()
    {
        return $this->hasMany(ItemInvoice::class, 'invoice_id');
    }
    
    public function responsible()
    {
        return $this->belongsTo(User::class, 'responsible_id');
    }
}
