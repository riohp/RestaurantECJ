<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Table;
class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();
        return view('reservations.index', compact('reservations'));
    }


    public function create()
    {
        
        $tables = Table::all();

        
        $availableTables = $tables->filter(function ($table) {
            
            return $table->isAvailableForReservation(request('start_time'), request('end_time'));
        });

        return view('reservations.create', compact('tables', 'availableTables'));
    }



    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'full_name' => 'required|max:255',
            'cellphone' => 'required|max:255',
            'id_table' => 'required|exists:tables,id',
            'start_time' => 'required|date_format:Y-m-d\TH:i',
            'end_time' => 'required|date_format:H:i',
        ]);
    
        $table = Table::findOrFail($validatedData['id_table']);
    
        // Formatear la fecha y hora de inicio
        $startTime = \Carbon\Carbon::createFromFormat('Y-m-d\TH:i', $validatedData['start_time'])->format('Y-m-d H:i:s');
    
        // Obtener la hora de fin y ajustarla a la misma fecha que la hora de inicio
        $endTime = \Carbon\Carbon::createFromFormat('H:i', $validatedData['end_time'])->format('Y-m-d H:i:s');
    
        // Verificar la disponibilidad de la mesa
        if (!$table->isAvailableForReservation($startTime, $endTime)) {
            return redirect()->back()->withErrors(['error' => 'La mesa no está disponible para la reserva en este rango de tiempo.']);
        }
    
    
        Reservation::create([
            'full_name' => $validatedData['full_name'],
            'cellphone' => $validatedData['cellphone'],
            'id_table' => $validatedData['id_table'],
            'start_time' => $startTime,
            'end_time' => $endTime,
        ]);
    
        return redirect()->route('reservation.index')->with('success', 'Reservación creada correctamente');
    }
    




    public function show(Request $request)
    {
        $reservationId = $request->input('reservation');
        $reservation = Reservation::find($reservationId);
        return view('reservations.show', compact('reservation'));
    }

    public function edit(Request $request)
    {
        $reservationId = $request->input('reservation');
        $reservation = Reservation::find($reservationId);
        return view('reservations.edit', compact('reservation'));
    }

    public function update(Request $request, Reservation $reservation)
    {
        $validatedData = $request->validate([
            'full_name' => 'required|max:255',
            'cellphone' => 'required|max:255',
            'id_table' => 'required|max:255',
            'start_time' => 'required|max:255',
            'end_time' => 'required|max:255',
        ]);
        $reservation->update($validatedData);

        return redirect()->route('reservations.index')->with('success', 'Reservación actualizada correctamente');
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
