<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPasswordMail;

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

        // Tìm người dùng bằng email
        $user = User::where('email', $request->email)->first();

        if ($user) {
            // Tạo token đặt lại mật khẩu
            $token = Password::createToken($user);

            DB::table('password_resets')->insert([
                'email' => $request ->email,
                'token' => $token,
                'created_at' => now(),
            ]);

            // Tạo URL đặt lại mật khẩu
            $resetUrl = url(route('password.reset', ['token' => $token, 'email' => $request->email]));
            dd($resetUrl);
            $email = $request->email;
            // Gửi email bằng ResetPasswordMail mailable của bạn
            Mail::to($email)->send(new ResetPasswordMail($resetUrl));

            return back()->with('status', 'We have emailed your password reset link!');
        }

        return back()->withErrors(['email' => 'We can\'t find a user with that email address.']);
    }

    public function showResetForm(Request $request, $token = null)
    {
        return view('emails.resetPassword')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    public function reset(Request $request)
    {

//        dd($request->all());


        $token = DB::table('password_resets')
                    ->select('token')
                    ->where('token', $request->token)
                    ->where('email', $request->email)
                    ->get();


        if($token) {
            DB::table('users')
                ->where('email', $request->email)
                ->update(['password' => Hash::make($request->password)]);
        }

        return redirect()->route('login')->with('success', 'You have successfully changed your password.');

    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'You have successfully logged out.');
    }

}
