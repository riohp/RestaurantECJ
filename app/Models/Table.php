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
    $startTime = \Carbon\Carbon::parse($startTime)->format('Y-m-d H:i:s');
    // Formatea $startTime antes de usarlo en la consulta

    return !Reservation::where('id_table', $this->id)
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
