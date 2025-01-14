<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Http\Requests\Staff\StoreRequest; // Asegúrate de importar el StoreRequest
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staff = Staff::paginate(10);  // Paginación de personal
        return view('admin.staff.index', compact('staff'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.staff.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        // Validar los datos del formulario usando el StoreRequest
        $validated = $request->validated(); // Obtener datos validados

        // Si hay imagen, se guarda
        if ($request->hasFile('photo')) {
            $filename = time() . '.' . $request->photo->extension();  // Usar 'photo' en lugar de 'image'
            $request->photo->move(public_path('image/staff'), $filename);
            $validated['photo'] = $filename; // Asignar el nombre de la imagen al campo 'photo'
        }

        // Crear el miembro del staff con los datos validados
        Staff::create($validated);

        return to_route('staff.index')->with('status', 'Nuevo miembro del staff agregado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Staff $staff)
    {
        return view('admin.staff.show', compact('staff'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Staff $staff)
    {
        return view('admin.staff.edit', compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Staff $staff)
    {
        // Validar los datos
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'phone' => 'required|numeric|digits_between:10,15',
            'photo' => 'nullable|image|max:10240',
        ]);

        // Si se sube una nueva imagen, se guarda
        if ($request->hasFile('photo')) {
            $filename = time() . '.' . $request->photo->extension(); // Usar 'photo' en lugar de 'image'
            $request->photo->move(public_path('image/staff'), $filename);
            $validated['photo'] = $filename; // Asignar el nombre de la imagen al campo 'photo'
        }

        // Actualizar el miembro del staff con los datos validados
        $staff->update($validated);

        return to_route('staff.index')->with('status', 'Miembro del staff actualizado');
    }

    /**
     * Show the confirmation page for deleting the specified resource.
     */
    public function destroyConfirm(Staff $staff)
    {
        return view('admin.staff.delete', compact('staff'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Staff $staff)
    {
        $staff->delete();
        return to_route('staff.index')->with('status', 'Personal eliminado');
    }
}
