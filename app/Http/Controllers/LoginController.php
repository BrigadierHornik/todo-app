<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\User;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required|min:6'
            ],
        [
            'email.required' => 'Email is required',
            'email.email' => 'Email is not in valid format',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 6 characters'
        ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['error' => $e->validator->errors()], 422);
        }
        
        //return response()->json(['message' => 'Valid'], 200);


        //$user = User::where('email', $request->email)->first();

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            return response()->json(['message' => 'Login successful'], 200);
        }
        //$token = $user->createToken('auth')->plainTextToken;
        return response()->json(['error' => 'Login failed'], 401);
        //return response()->json(['message' => 'Login successful', 'email' => $email, 'password' => $password], 200);*/
    }

    public function test(Request $request)
    {
        return response()->json(['message' => 'Login successful'], 200);
    }

    public function hashpassword(Request $request)
    {
        $password = $request->input('password');
        return response()->json(['password' => Hash::make($password, [PASSWORD_BCRYPT_DEFAULT_COST])], 200);
    }
}