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


    public function isAvailableForReservation($startTime, $endTime)
{
    // Verificar si hay reservas que se superponen con la hora de inicio y fin de la nueva reserva
    $overlappingReservations = $this->reservations->filter(function ($reservation) use ($startTime, $endTime) {
        return $reservation->status == 1 && !($startTime >= $reservation->end_time || $endTime <= $reservation->start_time);

    })->count();

    return $this->status == 1 && $overlappingReservations == 0;
}

}
