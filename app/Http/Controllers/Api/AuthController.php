<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //login
    public function login(Request $request)
    {
        $loginData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $loginData['email'])->first();

        //check if user exists
        if (!$user) {
            return response([
                'message' => 'Invalid Email or Password'
            ], 401);
        }

        //check if password matches
        if (!Hash::check($loginData['password'], $user->password)) {
            return response([
                'message' => 'Invalid Email or Password'
            ], 401);
        }

        //generate token
        $token = $user->createToken('auth_token')->plainTextToken;

        return response([
            'user' => $user,
            'token' => $token
        ], 200);
    }

    //logout
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response([
            'message' => 'Logged out'
        ], 200);
    }
}
