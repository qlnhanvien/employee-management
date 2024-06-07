<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function postLogin(Request $req)
    {
        if (Auth::attempt(['email' => $req->email, 'password' => $req->password])){
            return redirect()->route('dashboard');
        }

        return redirect() ->back()->with('error','Wrong account or password');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function postRegister(Request $req)
    {
        try {
            $users = User::all();
            foreach ($users as $user) {
                if ($req->email == $user->email) {
                    return redirect()->route('register')->with('err','Email already exists');
                }
            }

            if ($req->confirmPassword !== $req->password) {
                return redirect()->route('register')->with('err','Passwords do not match, please try again');
            }

            $req->merge(['password'=> Hash::make($req->password)]);
            User::create($req ->all());
        } catch (\Throwable $th){
            dd($th);
        }
        return redirect()->route('login')->with('success','Account successfully created');
    }

    public function forgot()
    {
        return view('auth.forgot');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);


        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status == Password::RESET_LINK_SENT) {
            $token = Password::createToken(User::where('email', $request->email)->first());
            $resetUrl = url(config('app.url').route('password.reset', ['token' => $token, 'email' => $request->email], false));

            Mail::to($request->email)->send(new ResetPasswordMail($resetUrl));

            return back()->with(['status' => __($status)]);
        }

        return back()->withErrors(['email' => __($status)]);
    }

    public function showResetForm(Request $request, $token = null)
    {
        return view('auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                    'remember_token' => \Str::random(60),
                ])->save();
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'You have successfully logged out.');
    }

}
