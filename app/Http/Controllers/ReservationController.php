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
            'id_table' => 'required|max:255',
            'start_time' => 'required|date_format:H:i', // Validar el formato de hora
            'end_time' => 'required|date_format:H:i', // Validar el formato de hora
        ]);

        
        $validatedData['start_time'] = date('Y-m-d') . ' ' . $validatedData['start_time'] . ':00';
        $validatedData['end_time'] = date('Y-m-d') . ' ' . $validatedData['end_time'] . ':00';

        Reservation::create($validatedData);

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
