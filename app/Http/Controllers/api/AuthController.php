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
    public function sendResetLinkEmail(Request $request)
    {
        try {
            $request->validate(['email' => 'required|email']);
            $user = User::where('email', $request->email)->first();

            if (!$user) {
                return response()->json(['message' => 'We can\'t find a user with that email address.'], 404);
            }

            $token = Password::createToken($user);
            DB::table('password_resets')->insert([
                'email' => $request ->email,
                'token' => $token,
                'created_at' => now(),
            ]);

            $baseUrl = config('app.url');
            $resetUrl = $baseUrl . '/api/reset-password/' . $token . '?email=' . $request->email;
            Mail::to($request->email)->send(new ResetPasswordMail($resetUrl));

            return response()->json(['status' => 'success', 'message' => 'We have emailed your password reset link!'], 200);

        } catch (\Illuminate\Validation\ValidationException $e) {
            // Xử lý khi validation thất bại
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            // Xử lý các lỗi khác
            return response()->json(['error' => 'An unexpected error occurred.'], 500);
        }
    }
    public function resetPassword(Request $request)
    {
        try {
            $token = DB::table('password_resets')
                ->select('token')
                ->where('token', $request->token)
                ->where('email', $request->email)
                ->first();

            if(!$token) {
                return response()->json(['message' => 'Invalid token.'], 404);
            }

            if (now()->subMinutes(config('auth.passwords.users.expire'))->isAfter($token->created_at)) {
                return response()->json(['message' => 'This password reset token is invalid or has expired.'], 404);
            }

            $validator = Validator::make($request->all(), [
                'password' => 'required|string|min:6|confirmed',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all()], 422);
            }

            User::where('email', $request->email)
                ->update(['password' => Hash::make($request->password)]);

            DB::table('password_resets')->where('email', $request->email)->delete();

            return response()->json(['message' => 'Your password has been reset successfully.'], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to reset password.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    public function logoutApi(Request $request)
    {
        $token = $request->bearerToken();

        if ($token) {
            Auth::guard('api')->invalidate(true);

            return response()->json(['message' => 'Successfully logged out'], 200);
        }

        return response()->json(['error' => 'No active user session was found'], 400);
    }
}
