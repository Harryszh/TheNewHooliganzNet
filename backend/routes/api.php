<?php
use App\Http\Controlles\Auth\RegisteredUserController;
use App\Http\Controllers\Api\TeamController;

use App\Http\Controllers\Api\AuthController;

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

    


// 🔓 Öffentliche Routen (kein Login erforderlich)
/* Route::get('/register', [RegisteredUserController::class, 'register']); */
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

Route::get('/teams', [TeamController::class, 'index']);



Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);





// 📦 Debug-Route (öffentlich, nur für Testzwecke)
Route::middleware('guest.session')->get('/boot', function (Request $request) {
    return response()->json([
        'token' => session('guest_token'),
        'ip' => session('ip_address'),
    ]);
});
