<?php
//Api/AuthController.php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * 'password' => 'required|string|confirmed|min:1', // hier erlauben wir z. B. "1"
     * Login – Sanctum SPA (Session-basiert)
     */
    public function login(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'password' => 'required|string',
        ]);

        if (!Auth::attempt($request->only('name', 'password'))) {
            return response()->json(['message' => 'Falsche Zugangsdaten'], 401);
        }

        $request->session()->regenerate();

        return response()->json(['message' => 'Login erfolgreich']);
    }

    /**
     * Logout – Sanctum SPA (Session beenden)
     */
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json(['message' => 'Logout erfolgreich']);
    }
}
