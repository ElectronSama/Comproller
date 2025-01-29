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

}