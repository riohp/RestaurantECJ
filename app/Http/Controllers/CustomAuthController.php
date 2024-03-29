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
            if (Auth::user()->role == 'admin') {
                return redirect()->route('dashboard')->withSuccess('Has iniciado sesión correctamente');
            }elseif (Auth::user()->role == 'client') {
                return redirect()->route('delivery.create')->withSuccess('Has iniciado sesión correctamente');
            }elseif (Auth::user()->role == 'waiter') {
                return redirect()->route('table.index')->withSuccess('Has iniciado sesión correctamente');
            }elseif (Auth::user()->role == 'cashier') {
                return redirect()->route('invoice.index')->withSuccess('Has iniciado sesión correctamente');
            }
        }
        return redirect("login")->withInput($request->only('email'))->withErrors(['validOff' => 'Email o contraseña no son correctas. Intentalo de nuevo.',]);
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
