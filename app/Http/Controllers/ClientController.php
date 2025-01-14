<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Table;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Paginación de clientes
        $clients = Client::paginate(10);  
        return view('admin.clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Obtener todos los clientes y las mesas
        $clients = Client::all();
        $tables = Table::all();
        
        // Pasar los clientes y las mesas a la vista
        return view('admin.clients.create', compact('clients', 'tables'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Crear el cliente en la base de datos
        Client::create($request->all());
        
        // Redirigir al listado de clientes con un mensaje de éxito
        return to_route('clients.index')->with('status', 'Cliente registrado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        // Mostrar la vista con los detalles del cliente
        return view('admin.clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        // Mostrar la vista de edición con los datos del cliente
        return view('admin.clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        // Actualizar los datos del cliente
        $client->update($request->all());
        
        // Redirigir al listado de clientes con un mensaje de éxito
        return to_route('clients.index')->with('status', 'Cliente actualizado');
    }

    /**
     * Show the confirmation page for deleting the specified resource.
     */
    public function destroyConfirm(Client $client)
    {
        // Mostrar la vista de confirmación para eliminar un cliente
        return view('admin.clients.delete', compact('client'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        // Eliminar el cliente de la base de datos
        $client->delete();
        
        // Redirigir al listado de clientes con un mensaje de éxito
        return to_route('clients.index')->with('status', 'Cliente eliminado');
    }
}
