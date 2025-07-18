<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{    
    public function register(Request $request) 
    { 
        $request->validate([
            'name' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:1',
        ]);

        $user = User::create([
            'name' => $request->name,
            'password' => Hash::make($request->password),
        ]);

        // Optional: Token für API (wenn Sanctum aktiv)
        if (method_exists($user, 'createToken')) {
            return response()->json([
                'user' => $user,
                'token' => $user->createToken('auth_token')->plainTextToken,
            ]);
        }

        return response()->json(['user' => $user], 201);
    }
}
