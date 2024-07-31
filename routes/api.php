<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;



Route::middleware(['auth-api', 'web'])->group(function () {
    Route::get('/user', function (Request $request) {
        return response()->json($request->user());
    });
    Route::get('/test', [LoginController::class, 'test']);
    Route::post('/hashpassword', [LoginController::class, 'hashpassword']);
    
    Route::get('/logout', function (Request $request) {
        $request->session()->invalidate();
        $request->session()->regenerate();
        return response()->json(['message' => 'Logged out'], 200);
    });
    
});

Route::post('/login', [LoginController::class, 'login'])->middleware("web")->name('login');