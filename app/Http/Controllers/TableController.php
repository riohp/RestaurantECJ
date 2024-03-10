<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Table;

class TableController extends Controller
{
    /**
     * Display a listing of the users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tables = Table::all();
        return view('table.index', compact('tables'));
    }

    /**
     * Show the form for creating a new user.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('table.create');
    }

    /**
     * Store a newly created user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'nombre' => 'required|max:255',
            'capaciodad' => 'required|integer',
            'location' => 'required|max:255',
            'status' => 'required|integer|between:0,1',
        ]);

        // Crear una nueva mesa
        Table::create($validatedData);

        // Redirigir a la página adecuada
        return redirect()->route('table.index')->with('success', 'Mesa creada correctamente');
    }

    /**
     * Display the specified table.
     * 
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function show(Table $table)
    {
        return view('table.show', compact('table'));
    }

    /**
     * Show the form for editing the specified table.
     * 
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function edit(Table $table)
    {
        return view('table.edit', compact('table'));
    }

    /**
     * Update the specified table in storage.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Table $table)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'nombre' => 'required|max:255',
            'capaciodad' => 'required|integer',
            'location' => 'required|max:255',
            'status' => 'required|integer|between:0,1',
        ]);

        // Actualizar la mesa
        $table->update($validatedData);

        // Redirigir a la página adecuada
        return redirect()->route('table.index')->with('success', 'Mesa actualizada correctamente');
    }
    
    /**
     * Remove the specified table from storage.
     * 
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function destroy(Table $table)
    {
        $table->status = 0;
        $table->save();
        return redirect()->route('table.index')->with('success', 'Mesa eliminada correctamente');
    }

    /**
     * Display a listing of the tables.
     * 
     * @return \Illuminate\Http\Response
     */
    public function activate(Table $table)
    {
        $table->status = 1; //activar mesa
        $table->save();
        return redirect()->route('table.index')->with('success', 'Mesa activada correctamente');
    }
}
