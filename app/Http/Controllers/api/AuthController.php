<?php

namespace App\Http\Controllers\api;

use App\Mail\ResetPasswordMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController
{
    public function loginApi(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!$token = Auth::guard('api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::guard('api')->factory()->getTTL() * 60
        ]);
    }
    public function registerApi(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        // Create user
        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);

        // Create token
        $token = JWTAuth::fromUser($user);

        return response()->json([
            'message' => 'User successfully registered',
            'user' => $user,
            'token' => $token
        ], 201);
    }
    public function sendResetLinkEmail(Request $req)
    {
        try {
            $req->validate(['email' => 'required|email']);
            $user = User::where('email', $req->email)->first();
            if ($user) {
                $token = Password::createToken($user);

                DB::table('password_resets')->insert([
                    'email' => $req ->email,
                    'token' => $token,
                    'created_at' => now(),
                ]);

                $resetUrl = url(route('password.reset', ['token' => $token, 'email' => $req->email]));
                Mail::to($req->email)->send(new ResetPasswordMail($resetUrl));
                return back()->with('status', 'We have emailed your password reset link!');
            }
            return back()->withErrors(['email' => 'We can\'t find a user with that email address.']);
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
