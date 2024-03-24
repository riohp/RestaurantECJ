<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;
class CustomAuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }  
      
    public function customLogin(Request $request)
    {
       
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect("/dashboard")->withSuccess("Has iniciado sesión correctamente");
        }
  
        return redirect("login")->withSuccess('las credenciales proporcionadas son incorrectas');
    }
    public function registration()
    {
        return view('auth.registration');
    }
      
    public function store(RegisterRequest $request)
    {
        $userValidated = $request->validated();
        $userValidated['password'] = Hash::make($request->password);
        $userValidated['role'] = 'client';
        $userValidated['status'] = 1;
        User::create($userValidated);
        return redirect()->route('login')->with('success', 'Usuario creado correctamente');
    }

    
    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
}