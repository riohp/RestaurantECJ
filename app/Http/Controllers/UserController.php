<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Exception;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        if ($search && !empty($search)) {
            $users = User::where('name', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%')
                ->orWhere('cellphone', 'like', '%' . $search . '%')
                ->paginate(20)
                ->appends(['search' => $search]);
        } else {
            $users = User::paginate(20);
        }

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
        $idString = Crypt::decryptString($encryptedId);
        $id = unserialize($idString);
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(UserRequest $request)
    {
        $encryptedId = $request->input('encrypted_id');
        $idString = Crypt::decryptString($encryptedId);
        $id = unserialize($idString);
        $user = User::findOrFail($id);
    
        $validatedData = $request->validated();
    
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->cellphone = $validatedData['cellphone'];
        $user->address = $validatedData['address'];
        $user->role = $validatedData['role'];
        $user->status = $validatedData['status'];
    
        if ($request->filled('password')) {
            $user->password = Hash::make($validatedData['password']);
        }
    
        $user->save();
    
        return redirect()->route('users.index')->with('success', 'Usuario actualizado correctamente');
    }



    public function destroy(Request $request)
    {
        $encryptedId = $request->input('encrypted_id');
        $id = Crypt::decryptString($encryptedId);
        $id = unserialize($id);
        $user = User::findOrFail($id);
        $user->status = 0;
        $user->save();
        return redirect()->route('users.index')->with('success', 'Usuario eliminado correctamente');
    }

    public function activate(Request $request)
    {
        $encryptedId = $request->input('encrypted_id');
        $id = Crypt::decryptString($encryptedId);
        $id = unserialize($id);
        $user = User::findOrFail($id);
        $user->status = 1;
        $user->save();
        return redirect()->route('users.index')->with('success', 'Usuario activado correctamente');
    }
}
