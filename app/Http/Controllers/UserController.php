<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
 

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


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'cellphone' => 'required|max:10',
            'address' => 'required|max:255',
            'password' => 'required|min:8',
            'role' => 'required|in:admin,cashier,waiter,client',
            'status' => 'required|integer|between:0,1',
        ]);

        $validatedData['password'] = bcrypt($request->password);
        User::create($validatedData);
        return redirect()->route('users.index')->with('success', 'Usuario creado correctamente');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {   
        
        return view('users.edit', compact('user'));
    }

    public function update(Request $request,User $user)
    {
        
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'cellphone' => 'required|max:10',
            'address' => 'required|max:255',
            'role' => 'required|in:admin,cashier,waiter,client',
            'status' => 'required|integer|between:0,1',
        ]);

        
        $user->update($validatedData);

     
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
