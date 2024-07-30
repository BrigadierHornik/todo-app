<?php

use Illuminate\Support\Facades\Route;
use App\Helpers\DarkmodeHelper;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('index');
});

Route::get('/{pathMatch}', function(){
    return view('index');
})->where('pathMatch', '.*');