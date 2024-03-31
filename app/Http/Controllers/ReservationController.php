<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Table;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();
        return view('reservations.index', compact('reservations'));
    }

public function store(Request $request)
{
    $validatedData = $request->validate([
        'full_name' => 'required|max:255',
        'cellphone' => 'required|max:255',
        'id_table' => 'required',
        'location' => 'required',
        'date_reservation' => 'required',
        'time_reservation' => 'required',
    ]);
    
    $validatedData['id_table'] = decrypt($validatedData['id_table']);

    $start_time = Carbon::createFromFormat('Y-m-d H:i', $validatedData['date_reservation'] . ' ' . $validatedData['time_reservation']);
    
    $minimum_time = $start_time->copy()->addHours(2);

    $overlappingReservations = DB::table('reservations')
        ->where('id_table', $validatedData['id_table']) 
        ->whereDate('start_time', $start_time->toDateString())
        ->where(function($query) use ($start_time, $minimum_time) {
            $query->whereBetween('start_time', [$start_time, $minimum_time])
                  ->orWhereBetween(DB::raw('DATE_ADD(start_time, INTERVAL 2 HOUR)'), [$start_time, $minimum_time]);
        })
        ->exists();

    if ($overlappingReservations) {
        return redirect()->route('reservation.reserve')->with('error', 'La mesa no está disponible para la reserva en este rango de tiempo.');
    }
    
    Reservation::create([
        'full_name' => $validatedData['full_name'],
        'cellphone' => $validatedData['cellphone'],
        'id_table' => $validatedData['id_table'],
        'location' => $validatedData['location'],
        'start_time' => $start_time,
    ]);
    return redirect()->route('reservation.reserve')->with('success', 'Reservación creada correctamente');
}

    
    
    


    

    public function reserve()
    {
        $tables = Table::all();
        return view('reservations.reserve', compact('tables'));
    }


    public function show(Request $request)
    {
        $reservationId = $request->input('reservation');
        $reservation = Reservation::find($reservationId);
        return view('reservations.show', compact('reservation'));
    }

    public function edit(Reservation $reservation)
    {
        $tables = Table::all();
        return view('reservations.edit', compact('reservation', 'tables'));
    }

    public function update(Request $request, Reservation $reservation)
{
    $validatedData = $request->validate([
        'full_name' => 'required|max:255',
        'cellphone' => 'required|max:255',
        'id_table' => 'required|exists:tables,id',
        'start_time' => 'required|date_format:Y-m-d\TH:i',
        'end_time' => 'required|date_format:H:i',
    ]);

    // No necesitas hacer cambios en el modelo Table ya que no estás usando su método isAvailableForReservation()

    // Obtener la mesa de la reserva
    $table = Table::findOrFail($validatedData['id_table']);

    // Formatear la hora de inicio
    $startTime = \Carbon\Carbon::createFromFormat('Y-m-d\TH:i', $validatedData['start_time']);

    // Formatear la hora de fin utilizando la fecha de inicio y la hora seleccionada en el formulario
    $endTime = $startTime->copy()->setTimeFromTimeString($validatedData['end_time']);

    // Verificar la disponibilidad de la mesa
    if (!$table->isTableAvailable($startTime, $endTime, $reservation->id)) {
        return redirect()->back()->withErrors(['error' => 'La mesa no está disponible para la reserva en este rango de tiempo.']);
    }

    // Actualizar la reserva con los datos validados
    $reservation->update([
        'full_name' => $validatedData['full_name'],
        'cellphone' => $validatedData['cellphone'],
        'id_table' => $validatedData['id_table'],
        'start_time' => $startTime,
        'end_time' => $endTime,
    ]);

    return redirect()->route('reservation.index')->with('success', 'Reservación actualizada correctamente');
}

    

    public function destroy(Reservation $reservation)
    {
        $reservation = Reservation::find($reservation->id);
    
        if ($reservation) {
            $reservation->delete();
            return redirect()->route('reservation.index')->with('success', 'Reservación eliminada correctamente');
        } else {
            return redirect()->route('reservation.index')->with('error', 'No se encontró la reservación');
        }
    }
    


}
