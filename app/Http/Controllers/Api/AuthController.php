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

    //update image profile & face_embedding
    public function updateProfile(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'face_embedding' => 'required',
        ]);

        $user = $request->user();
        $image = $request->file('image');
        $face_embedding = $request->face_embedding;

        //save image
        $image->storeAs('public/images', $image->hashName());
        $user->image_url = $image->hashName();
        $user->face_embedding = $face_embedding;
        $user->save();

        return response([
            'message' => 'Profile updated',
            'user' => $user
        ], 200);
    }
}
