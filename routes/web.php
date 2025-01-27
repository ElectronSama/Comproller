<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DolgozoController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/dolgozok', [DolgozoController::class, 'index']);

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
});
