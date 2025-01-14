<?php
namespace App\Http\Controllers;

use App\Models\Table;
use App\Models\Staff;
use Illuminate\Http\Request;

class TableController extends Controller
{
    /**
     * Show the form for creating a new table.
     */
    public function index()
    {
        // Obtener todas las tablas con paginación
        $tables = Table::paginate(10); 
        return view('admin.tables.index', compact('tables'));
    }

    public function create()
    {
        // Obtener todos los miembros del staff para mostrarlos en el formulario
        $member = Staff::pluck('name', 'id_staff'); // Usar el id_staff en lugar del id
        return view('admin.tables.create', compact('member'));
    }

    /**
     * Store a newly created table in the database.
     */
    public function store(Request $request)
    {
        // Validar los datos recibidos del formulario
        $validated = $request->validate([
            'table_number' => 'required|unique:tables,table_number|max:255',
            'capacity' => 'required|integer',
            'location' => 'required|string|max:255',
            'id_staff' => 'required|exists:staff,id_staff', // Asegúrate que el staff seleccionado sea válido
        ]);

        // Crear la nueva tabla en la base de datos
        Table::create($validated);

        // Redirigir a la lista de tablas con un mensaje de éxito
        return redirect()->route('tables.index')->with('status', 'Table created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Table $table)
    {
        return view('admin.tables.show', compact('table'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Table $table)
    {
        // Obtener todos los miembros del staff para mostrarlos en el formulario
        $member = Staff::pluck('name', 'id_staff'); // Usar el id_staff en lugar del id
        return view('admin.tables.edit', compact('table', 'member'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Table $table)
{
    // Validar los datos recibidos del formulario
    $validated = $request->validate([
       'table_number' => 'max:255',
            'capacity' => 'integer',
            'location' => 'string|max:255',
            'id_staff' => 'exists:staff,id_staff', 
    ]);

    // Actualizar la tabla con los nuevos datos
    $table->update($validated);

    // Redirigir a la lista de tablas con un mensaje de éxito
    return redirect()->route('tables.index')->with('status', 'Table updated successfully');
}


    /**
     * Show the confirmation page for deleting the specified resource.
     */
    public function destroyConfirm(Table $table)
    {
        return view('admin.tables.delete', compact('table'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Table $table)
    {
        // Eliminar la tabla
        $table->delete();

        // Redirigir a la lista de tablas con un mensaje de éxito
        return redirect()->route('tables.index')->with('status', 'Table deleted successfully');
    }
}
