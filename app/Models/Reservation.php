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
        'id_table',
        'start_time',
        'end_time'
    ];

    public function table()
    {
        return $this->belongsTo(Table::class, 'id_table');
    }

    

    public function isTableAvailable($startTime, $endTime, $tableId)
    {
        return !Reservation::where('id_table', $tableId)
            ->where(function ($query) use ($startTime, $endTime) {
                $query->whereBetween('start_time', [$startTime, $endTime])
                    ->orWhereBetween('end_time', [$startTime, $endTime])
                    ->orWhere(function ($query) use ($startTime, $endTime) {
                        $query->where('start_time', '<', $startTime)
                            ->where('end_time', '>', $endTime);
                    });
            })
            ->exists();
    }

}
