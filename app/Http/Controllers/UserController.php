<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
 

class UserController extends Controller
{
    /**
     * Display a listing of the users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new user.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
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
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'role' => 'required|in:admin,cashier,waiter',
            'status' => 'required|integer|between:0,1',
        ]);

        // Hashear la contraseña
        $validatedData['password'] = bcrypt($request->password);

        // Crear un nuevo usuario
        User::create($validatedData);

        // Redirigir a la página adecuada
        return redirect()->route('users.index')->with('success', 'Usuario creado correctamente');
    }

    /**
     * Display the specified user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {   
        
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,User $user)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|in:admin,cashier,waiter',
            'status' => 'required|integer|between:0,1',
        ]);

        // Actualizar el usuario
        $user->update($validatedData);

        // Redirigir a la página adecuada
        return redirect()->route('users.index')->with('success', 'Usuario actualizado correctamente');
    }

    /**
     * Remove the specified user from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->status = 0; // Desactivar el usuario
        $user->save();
        return redirect()->route('users.index')->with('success', 'Usuario desactivado correctamente');
    }

    public function activate(User $user)
    {
        $user->status = 1; // Activar el usuario
        $user->save();
        return redirect()->route('users.index')->with('success', 'Usuario activado correctamente');
    }
    
}
