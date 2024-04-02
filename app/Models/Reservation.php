<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'cellphone',
        'location', 
        'id_table',
        'start_time'
    ];

    public function table()
    {
        return $this->belongsTo(Table::class, 'id_table');
    }

    

   



}
