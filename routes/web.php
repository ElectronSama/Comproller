<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DolgozoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contact', function () {
    return view('kapcsolat');
});

Route::get('/profile', function () {
    return view('profil');
});

Route::get('/dashboard', function () {
    return view('iranyitopult');
});

Route::get('/events', function () {
    return view('esemenyek');
});
Route::get('/registry', function () {
    return view('nyilvantartas');
});

Route::get('/worktime', function () {
    return view('munkaido');
});

Route::get('/payroll-calculation', function () {
    return view('berszamfejtes');
});

Route::post('/api/set-admin-session', function (Illuminate\Http\Request $request) 
{
    if ($request->admin === true) 
    {
        session(['isAdmin' => true]);
    }
    return response()->json(['message' => 'Session frissítve.']);
});

Route::post('/logout', function () 
{
    session()->flush();
    return redirect('/');
})->name('logout');

Route::get('/registry', function () {
    $Dolgozok = DB::table('nyilvantartas')->get();
    return view('nyilvantartas', ['Dolgozok' => $Dolgozok]);
})->name('registry.index');

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

Route::get('/dashboard', function () {

    $Dolgozok = DB::table('nyilvantartas')->get();
    $Dolgozokszama = DB::table('nyilvantartas')->count();
    return view('iranyitopult', ['Dolgozok' => $Dolgozok, 'Dolgozokszama' => $Dolgozokszama]);
});

Route::get('/dolgozok', [DolgozoController::class, 'index']);

Route::delete('/dolgozok/{id}', [DolgozoController::class, 'destroy'])->name('dolgozok.destroy');

Route::get('/dolgozok/{id}', [DolgozoController::class, 'show']);
