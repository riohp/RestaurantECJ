<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Table;
use Carbon\Carbon;
class ReservationController extends Controller
{
    public function index()
    {
        $search = request()->get('search');
        if ($search && !empty($search)) {
            $reservations = Reservation::where('full_name', 'like', '%' . $search . '%')
                ->paginate(20)
                ->appends(['search' => $search]);
        } else {
            $reservations = Reservation::paginate(20);
        }
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

    // Obtener la mesa
    $table = Table::findOrFail($validatedData['id_table']);

    // Formatear la fecha y hora de inicio
    $startTime = now()->format('Y-m-d H:i:s');

    // Obtener la duración de la reserva
    $duration = Carbon::parse($validatedData['end_time'])->diffInMinutes(Carbon::parse($validatedData['start_time']));

    // Calcular la fecha y hora de fin sumando la duración a la hora de inicio
    $endTime = Carbon::parse($startTime)->addMinutes($duration);

    // Verificar la disponibilidad de la mesa
    if (!$table->isTableAvailable($startTime, $endTime)) {
        return redirect()->back()->withErrors(['error' => 'La mesa no está disponible para la reserva en este rango de tiempo.']);
    }

    // Crear la reserva
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
