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
Route::get('/registry', function () {
    $Dolgozok = DB::table('nyilvantartas')->get();
    return view('nyilvantartas', ['Dolgozok' => $Dolgozok]);
})->name('registry.index');

// Nyilvántartás új dolgozó hozzáadása //
Route::post('/registry', function (Request $request) {

    $validatedData = $request->validate([
        'Keresztnev' => 'required|string|max:255',
        'Vezeteknev' => 'required|string|max:255',
        'Szuletesi_datum' => 'required|date',
        'Anyja_neve' => 'required|string|max:255',
        'Tajszam' => 'required|string|max:255',
        'Adoszam' => 'required|string|max:255',
        'Bankszamlaszam' => 'nullable|string|max:255',
        'Cim' => 'required|string|max:255',
        'Allampolgarsag' => 'required|string|max:255',
        'Tartozkodasi_hely' => 'nullable|string|max:255',
        'Szemelyigazolvany_szam' => 'required|string|max:255',
        'Email' => 'required|email|max:255',
        'Telefonszam' => 'required|string|max:255',
        'Munkakor' => 'required|string|max:255',
    ]);

    DB::table('nyilvantartas')->insert($validatedData);

    return redirect()->route('registry.index')->with('success', 'Dolgozó sikeresen hozzáadva.');
})->name('registry.store');

// Irányítópult //
Route::get('/dashboard', function () {
    $Dolgozok = DB::table('nyilvantartas')->get();
    $Dolgozokszama = DB::table('nyilvantartas')->count();
    return view('iranyitopult', ['Dolgozok' => $Dolgozok, 'Dolgozokszama' => $Dolgozokszama]);
});

// Dolgozók kezelése //
Route::get('/dolgozok', [DolgozoController::class, 'index']);
Route::get('/dolgozok/{id}', [DolgozoController::class, 'show']);
Route::delete('/dolgozok/{id}', [DolgozoController::class, 'destroy'])->name('dolgozok.destroy');

// Admin jogosultság //
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