<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
 

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }


    public function create()
    {
        return view('users.create');
    }


    public function store(UserRequest $request)
    {
        User::create($request)->validated();
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

    public function update(UserRequest $request, User $user)
    {
     
        User::where('id', $user->id)->update($request->validated());
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
