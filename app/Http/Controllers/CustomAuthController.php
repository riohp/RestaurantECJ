<?php
namespace App\Http\Controllers;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use App\Mail\ForgotPasswordMail;
use Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Psy\Util\Str;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Str as SupportStr;
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


    public function forgot(){
        return view('auth.password.forgot-password');
    }

    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])->withInput($request->only('email'))
            : back()->withErrors(['email' => __($status)]);
    }

    public function resetPassword(string $token){
        return view('auth.password.pasword-change', ['token' => $token]);
    }

    public function updatePassword(Request $request){
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(SupportStr::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? back()->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }

    public function passwordChange(){
        return view('auth.password.pasword-change');
    }

    public function signOut() {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}
