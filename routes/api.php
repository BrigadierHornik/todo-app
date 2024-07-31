<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:web');


Route::post('/login', [LoginController::class, 'login'])->middleware('web')->name('login');
Route::post('/hashpassword', [LoginController::class, 'hashpassword']);