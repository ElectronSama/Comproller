<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dolgozo;

class DolgozoController extends Controller
{
    public function destroy($id)
    {
        $dolgozo = Dolgozo::find($id);

        if ($dolgozo) 
        {
            $dolgozo->delete();
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'A dolgozó nem található!'], 404);
    }

    public function show($id)
    {
        $dolgozo = Dolgozo::find($id);

        if ($dolgozo) 
        {
            return response()->json([
                'success' => true,
                'dolgozo' => $dolgozo,
            ]);
        } 
        else 
        {
            return response()->json([
                'success' => false,
                'message' => 'Dolgozó nem található.',
            ]);
        }
    }

    public function update(Request $request) 
    {
        $dolgozo = Dolgozo::find($request->id);
        if (!$dolgozo) 
        {
            return response()->json(['success' => false, 'error' => 'Dolgozó nem található!']);
        }
    
        $dolgozo->Vezeteknev = $request->vezeteknev;
        $dolgozo->Keresztnev = $request->keresztnev;
        $dolgozo->Email = $request->email;
        $dolgozo->Telefonszam = $request->telefonszam;
        $dolgozo->Munkakor = $request->munkakor;
        $dolgozo->save();
    
        return response()->json(['success' => true]);
    } 

}