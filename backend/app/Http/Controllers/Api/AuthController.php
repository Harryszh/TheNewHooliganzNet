<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'required|string|confirmed|min:6'
        ]);

        $user = User::create([
            'name' => $fields['name'],
            'password' => bcrypt($fields['password'])
        ]);

        $token = $user->createToken('apiToken')->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token
        ], 201);
    }

    public function login(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string',
            'password' => 'required|string'
        ]);

        if (!Auth::attempt(['name' => $fields['name'], 'password' => $fields['password']])) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $user = Auth::user();
        $token = $user->createToken('apiToken')->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Logged out']);
    }
}
