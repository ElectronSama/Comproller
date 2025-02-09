<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DolgozoController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

// Főoldal //
Route::get('/', function () {
    return view('welcome');
});

// Oldalak //
Route::view('/contact', 'kapcsolat');
Route::view('/profile', 'profil');
Route::view('/dashboard', 'iranyitopult');
Route::view('/events', 'esemenyek');
Route::view('/worktime', 'munkaido');
Route::view('/payroll-calculation', 'berszamfejtes');

// Nyilvántartás lista //
Route::get('/registry', [DolgozoController::class, 'index'])->name('registry.index');

// Új dolgozó hozzáadása //
Route::post('/registry', [DolgozoController::class, 'store'])->name('registry.store');

// Dolgozó adatainak frissítése //
Route::put('/dolgozok/update', [DolgozoController::class, 'update'])->name('dolgozok.update');

// Dolgozó törlése //
Route::delete('/dolgozok/{id}', [DolgozoController::class, 'destroy'])->name('dolgozok.destroy');

// Irányítópult //
Route::get('/dashboard', function () {
    $Dolgozok = DB::table('nyilvantartas')->get();
    $Dolgozokszama = DB::table('nyilvantartas')->count();
    return view('iranyitopult', ['Dolgozok' => $Dolgozok, 'Dolgozokszama' => $Dolgozokszama]);
});

// Admin jogosultság beállítása //
Route::post('/api/set-admin-session', function (Request $request) {
    if ($request->admin === true) {
        session(['isAdmin' => true]);
    }
    return response()->json(['message' => 'Session frissítve.']);
});

// Kijelentkezés //
Route::post('/logout', function () {
    session()->flush();
    return redirect('/');
})->name('logout');