<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Table extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable =[
        'nombre',
        'capaciodad',
        'location',
        'status'
    ];


    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'id_table');
    }
    //valido que la mesa este disponible
    public function isAvailableForReservation($startTime, $endTime)
    {

        $startDateTime = \Carbon\Carbon::parse($startTime);
        $endDateTime = \Carbon\Carbon::parse($endTime);

        return $this->reservations()
            ->where(function ($query) use ($startDateTime, $endDateTime) {
                $query->where('start_time', '>=', $endDateTime)
                    ->orWhere('end_time', '<=', $startDateTime);
            })
            ->doesntExist();
    }
}
