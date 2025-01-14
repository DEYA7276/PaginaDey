<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Table;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todas las reservas con paginación
        $reservations = Reservation::paginate(10);

        return view('admin.reservations.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Obtener todos los clientes
        $clients = Client::all();

        // Obtener todas las tablas
        $tables = Table::all();

        // Pasar los clientes y las tablas a la vista
        return view('admin.reservations.create', compact('clients', 'tables'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación de datos del formulario
        $validated = $request->validate([
            'id_client' => 'required|exists:clients,id_client',
            'id_table' => 'required|exists:tables,id_table',
            'reservation_datetime' => 'required|date',
            'status' => 'required|in:pending,confirmed,canceled',
        ]);

        // Verificar si la mesa ya está reservada en la misma fecha y hora
        $existingReservation = Reservation::where('id_table', $request->id_table)
            ->where('reservation_datetime', $request->reservation_datetime)
            ->exists(); // Esto verificará si ya hay una reserva con esa mesa y fecha

        if ($existingReservation) {
            return back()->withErrors(['reservation_datetime' => 'La mesa ya está reservada en ese horario.'])->withInput();
        }

        // Crear la nueva reserva
        Reservation::create($validated);

        // Redirigir con mensaje de éxito
        return redirect()->route('reservations.index')->with('status', 'Reserva realizada con éxito');
    }


    
    public function show(Reservation $reservation)
    {
        // Mostrar detalles de la reserva
        return view('admin.reservations.show', compact('reservation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        // Obtener todos los clientes y las mesas
        $clients = Client::all();
        $tables = Table::all();

        // Pasar los datos a la vista
        return view('admin.reservations.edit', compact('reservation', 'clients', 'tables'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        // Validar los datos recibidos del formulario
        $validated = $request->validate([
            'id_client' => 'required|exists:clients,id_client', // Asegura que el cliente exista
            'id_table' => 'required|exists:tables,id_table',   // Asegura que la mesa exista
            'reservation_datetime' => 'required|date',         // Fecha y hora de la reserva
            'status' => 'required|in:pending,confirmed,canceled', // Estado de la reserva
        ]);

        // Actualizar la reserva con los nuevos datos
        $reservation->update($validated);

        // Redirigir a la lista de reservas con un mensaje de éxito
        return to_route('reservations.index')->with('status', 'Reservation updated successfully');
    }

    /**
     * Show the confirmation page for deleting the specified resource.
     */
    public function destroyConfirm(Reservation $reservation)
    {
        // Confirmación antes de eliminar la reserva
        return view('admin.reservations.delete', compact('reservation'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        // Eliminar la reserva
        $reservation->delete();

        // Redirigir a la lista de reservas con un mensaje de éxito
        return to_route('reservations.index')->with('status', 'Reservation deleted successfully');
    }
}
