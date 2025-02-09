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

class DolgozoController extends Controller
{
    // Nyilvántartás listázása
    public function index()
    {
        $Dolgozok = DB::table('nyilvantartas')->get();
        return view('nyilvantartas', ['Dolgozok' => $Dolgozok]);
    }

    // Új dolgozó hozzáadása
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'Keresztnev' => 'required|string|max:255',
            'Vezeteknev' => 'required|string|max:255',
            'Nem' => 'nullable|string|max:255',
            'Szuletesi_datum' => 'required|date',
            'Szuletesi_hely' => 'required|string|max:255',
            'Anyja_neve' => 'required|string|max:255',
            'Tajszam' => 'required|string|size:9',
            'Adoszam' => 'required|string|size:10',
            'Bankszamlaszam' => 'nullable|string|size:24',
            'Email' => 'required|email|max:255',
            'Telefonszam' => 'required|string|max:15',
            'Alaporaber' => 'required|numeric|min:0|max:9999999.99',
            'Irsz' => 'required|string|size:4',
            'Telepules' => 'required|string|max:255',
            'Utca_ut' => 'required|string|max:255',
            'Hazszam' => 'required|string|max:10',
            'Allampolgarsag' => 'required|string|max:255',
            'Tartozkodasi_hely' => 'nullable|string|max:255',
            'Muszak' => 'required|string|max:255',
            'Munkakor' => 'required|string|max:255',
            'Megjegyzes' => 'nullable|string|max:255',
        ]);

        // Alapértelmezett értékek beállítása, ha nincs megadva
        $validatedData['Bankszamlaszam'] = $validatedData['Bankszamlaszam'] ?? '';
        $validatedData['Megjegyzes'] = $validatedData['Megjegyzes'] ?? '';

        DB::table('nyilvantartas')->insert($validatedData);

        return redirect()->route('registry.index')->with('success', 'Dolgozó sikeresen hozzáadva.');
    }

    // Dolgozó adatainak frissítése
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'DolgozoID' => 'required|integer|exists:nyilvantartas,DolgozoID',
            'Keresztnev' => 'required|string|max:255',
            'Vezeteknev' => 'required|string|max:255',
            'Nem' => 'nullable|string|max:255',
            'Szuletesi_datum' => 'required|date',
            'Szuletesi_hely' => 'required|string|max:255',
            'Anyja_neve' => 'required|string|max:255',
            'Tajszam' => 'required|string|size:9',
            'Adoszam' => 'required|string|size:10',
            'Bankszamlaszam' => 'nullable|string|size:24',
            'Email' => 'required|email|max:255',
            'Telefonszam' => 'required|string|max:15',
            'Alaporaber' => 'required|numeric|min:0|max:9999999.99',
            'Irsz' => 'required|string|size:4',
            'Telepules' => 'required|string|max:255',
            'Utca_ut' => 'required|string|max:255',
            'Hazszam' => 'required|string|max:10',
            'Allampolgarsag' => 'required|string|max:255',
            'Tartozkodasi_hely' => 'nullable|string|max:255',
            'Muszak' => 'required|string|max:255',
            'Munkakor' => 'required|string|max:255',
            'Megjegyzes' => 'nullable|string|max:255',
        ]);

        DB::table('nyilvantartas')
            ->where('DolgozoID', $validatedData['DolgozoID'])
            ->update($validatedData);

        return redirect()->route('registry.index')->with('success', 'Dolgozó adatai frissítve.');
    }

    // Dolgozó törlése
    public function destroy($id)
    {
        DB::table('nyilvantartas')->where('DolgozoID', $id)->delete();
        return redirect()->route('registry.index')->with('success', 'Dolgozó sikeresen törölve.');
    }
}
