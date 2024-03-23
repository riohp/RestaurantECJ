<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Exception;


class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(25);
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(UserRequest $request)
    {
        User::create($request->validated());
        return redirect()->route('users.index')->with('success', 'Usuario creado correctamente');
    }

    public function show(Request $request)
    {

        $encryptedId = $request->input('encrypted_id');
        $id = Crypt::decryptString($encryptedId);

        // Deserializar el ID encriptado para obtener el valor numérico
        $id = unserialize($id);

        // Buscar el usuario por su ID
        $user = User::findOrFail($id);

        return view('users.show', compact('user'));
    }



    public function edit(Request $request)
    {
        $encryptedId = $request->input('encrypted_id');
        $id = Crypt::decryptString($encryptedId);

        // Deserializar el ID encriptado para obtener el valor numérico
        $id = unserialize($id);

        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }



    public function update(UserRequest $request, $encrypted_id)
    {
        // Desencriptar el ID del usuario
        $userId = Crypt::decryptString($encrypted_id);

        // Deserializar el ID encriptado para obtener el valor numérico
        $userId = unserialize($userId);


       
        $user = User::findOrFail($userId);
        $user->update($request->validated());


        // Redirigir a la página de índice con un mensaje de éxito
        return redirect()->route('users.index')->with('success', 'Usuario actualizado correctamente');
    }


    public function destroy(User $user)
    {
        $user->status = 0;
        $user->save();

        return redirect()->route('users.index')->with('success', 'Usuario desactivado correctamente');
    }

    public function activate(User $user)
    {
        $user->status = 1;
        $user->save();

        return redirect()->route('users.index')->with('success', 'Usuario activado correctamente');
    }
}
