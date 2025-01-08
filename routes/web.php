<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DolgozoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/rolunk', function () {
    return view('rolunk');
});

Route::get('/kapcsolat', function () {
    return view('kapcsolat');
});

Route::get('/profil', function () {
    return view('profil');
});

Route::get('/dolgozok', [DolgozoController::class, 'index']);
