<?php

namespace App\Http\Controllers;

use App\Models\Dolgozo;
use Illuminate\Http\Request;
use App\Models\DolgozokReszlet;

class DolgozoController extends Controller
{
    public function index()
    {
        $dolgozok = Dolgozo::all();
        $dolgozokreszletek = DolgozokReszlet::select('ReszletID', 'Cim', 'SzuletesiDatum', 'Bankszamlaszam')->get();

        return view('dolgozok', compact('dolgozok', 'dolgozokreszletek'));
    }
}