<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TodoController;



Route::middleware(['auth-api', 'web'])->group(function () {
    Route::get('/user', function (Request $request) {
        return response()->json($request->user());
    });

    Route::get('/test', [LoginController::class, 'test']);
    
    Route::get('/logout', function (Request $request) {
        $request->session()->invalidate();
        $request->session()->regenerate();
        return response()->json(['message' => 'Logged out'], 200);
    });
    
    Route::get('/todos', [TodoController::class, 'index']);
    Route::post('/todos', [TodoController::class, 'store']);
    Route::get('/todos/{todo}', [TodoController::class, 'show']);
    Route::put('/todos/{todo}', [TodoController::class, 'update']);
    Route::delete('/todos/{todo}', [TodoController::class, 'destroy']);
    
});

Route::post('/login', [LoginController::class, 'login'])->middleware("web")->name('login');
Route::post('/hashpassword', [LoginController::class, 'hashpassword']);