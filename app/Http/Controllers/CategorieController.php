<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Categorie = Categorie::all();
        return view('admin.categorie.index', compact('Categorie'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categorie.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valideer de gegevens
        $validated = $request->validate([
            'naam' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'beschrijving' => 'required|string',
            'kleur' => 'required|string|max:7',
            'max' => 'required|integer|min:1',
            'aantal_namen' => 'required|integer|min:1',
            'dagdeel_1' => 'boolean',
            'dagdeel_2' => 'boolean',
            'dagdeel_3' => 'boolean',

            // Validatie voor de stekken
            'stek_1' => 'nullable|boolean',
            'stek_2' => 'nullable|boolean',
            'stek_3' => 'nullable|boolean',
            'stek_4' => 'nullable|boolean',
            'stek_5' => 'nullable|boolean',
            'stek_6' => 'nullable|boolean',
            'stek_7' => 'nullable|boolean',
            'stek_8' => 'nullable|boolean',
            'stek_9' => 'nullable|boolean',
            'stek_10' => 'nullable|boolean',
            'stek_11' => 'nullable|boolean',
            'stek_12' => 'nullable|boolean',
            'stek_13' => 'nullable|boolean',
            'stek_14' => 'nullable|boolean',
            'stek_15' => 'nullable|boolean',
            'stek_16' => 'nullable|boolean',
            'stek_1a' => 'nullable|boolean',
            'stek_8a' => 'nullable|boolean',
            'stek_9a' => 'nullable|boolean',
            'stek_16a' => 'nullable|boolean',
            'stek_17' => 'nullable|boolean',
            'stek_18' => 'nullable|boolean',
            'stek_19' => 'nullable|boolean',
            'stek_20' => 'nullable|boolean',
            'stek_21' => 'nullable|boolean',
            'stek_22' => 'nullable|boolean',
            'stek_23' => 'nullable|boolean',
            'stek_24' => 'nullable|boolean',
            'stek_25' => 'nullable|boolean',
            'stek_26' => 'nullable|boolean',
        ]);


        // Maak een nieuwe categorie aan
        Categorie::create([
            'naam' => $validated['naam'],
            'type' => $validated['type'],
            'beschrijving' => $validated['beschrijving'],
            'kleur' => $validated['kleur'],
            'max' => $validated['max'],
            'aantal_namen' => $validated['aantal_namen'],

            'dagdeel_1' => $validated['dagdeel_1'] ?? false,
            'dagdeel_2' => $validated['dagdeel_2'] ?? false,
            'dagdeel_3' => $validated['dagdeel_3'] ?? false,


            // Strekkenplan
            'stek_1' => $validated['stek_1'] ?? false,
            'stek_2' => $validated['stek_2'] ?? false,
            'stek_3' => $validated['stek_3'] ?? false,
            'stek_4' => $validated['stek_4'] ?? false,
            'stek_5' => $validated['stek_5'] ?? false,
            'stek_6' => $validated['stek_6'] ?? false,
            'stek_7' => $validated['stek_7'] ?? false,
            'stek_8' => $validated['stek_8'] ?? false,
            'stek_9' => $validated['stek_9'] ?? false,
            'stek_10' => $validated['stek_10'] ?? false,
            'stek_11' => $validated['stek_11'] ?? false,
            'stek_12' => $validated['stek_12'] ?? false,
            'stek_13' => $validated['stek_13'] ?? false,
            'stek_14' => $validated['stek_14'] ?? false,
            'stek_15' => $validated['stek_15'] ?? false,
            'stek_16' => $validated['stek_16'] ?? false,
            'stek_1a' => $validated['stek_1a'] ?? false,
            'stek_8a' => $validated['stek_8a'] ?? false,
            'stek_9a' => $validated['stek_9a'] ?? false,
            'stek_16a' => $validated['stek_16a'] ?? false,
            'stek_17' => $validated['stek_17'] ?? false,
            'stek_18' => $validated['stek_18'] ?? false,
            'stek_19' => $validated['stek_19'] ?? false,
            'stek_20' => $validated['stek_20'] ?? false,
            'stek_21' => $validated['stek_21'] ?? false,
            'stek_22' => $validated['stek_22'] ?? false,
            'stek_23' => $validated['stek_23'] ?? false,
            'stek_24' => $validated['stek_24'] ?? false,
            'stek_25' => $validated['stek_25'] ?? false,
            'stek_26' => $validated['stek_26'] ?? false,
        ]);

        // Redirect naar de index of een andere pagina na het opslaan
        return redirect()->route('categorie.index')->with('success', 'Categorie succesvol toegevoegd!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categorie $categorie)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categorie $categorie)
    {
        return view('admin.categorie.edit', compact('categorie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validatie van de inkomende data
        $validated = $request->validate([
            'naam' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'beschrijving' => 'nullable|string',
            'kleur' => 'required|string|max:7',
            'max' => 'required|integer|min:1',
            'aantal_namen' => 'required|integer|min:1',
            'dagdeel_1' => 'nullable|boolean',
            'dagdeel_2' => 'nullable|boolean',
            'dagdeel_3' => 'nullable|boolean',

            
            // Stekken validatie
            'stek_1' => 'nullable|boolean',
            'stek_2' => 'nullable|boolean',
            'stek_3' => 'nullable|boolean',
            'stek_4' => 'nullable|boolean',
            'stek_5' => 'nullable|boolean',
            'stek_6' => 'nullable|boolean',
            'stek_7' => 'nullable|boolean',
            'stek_8' => 'nullable|boolean',
            'stek_9' => 'nullable|boolean',
            'stek_10' => 'nullable|boolean',
            'stek_11' => 'nullable|boolean',
            'stek_12' => 'nullable|boolean',
            'stek_13' => 'nullable|boolean',
            'stek_14' => 'nullable|boolean',
            'stek_15' => 'nullable|boolean',
            'stek_16' => 'nullable|boolean',
            'stek_1a' => 'nullable|boolean',
            'stek_8a' => 'nullable|boolean',
            'stek_9a' => 'nullable|boolean',
            'stek_16a' => 'nullable|boolean',
            'stek_17' => 'nullable|boolean',
            'stek_18' => 'nullable|boolean',
            'stek_19' => 'nullable|boolean',
            'stek_20' => 'nullable|boolean',
            'stek_21' => 'nullable|boolean',
            'stek_22' => 'nullable|boolean',
            'stek_23' => 'nullable|boolean',
            'stek_24' => 'nullable|boolean',
            'stek_25' => 'nullable|boolean',
            'stek_26' => 'nullable|boolean',
        ]);
    
        // Haal de categorie op uit de database
        $category = Categorie::findOrFail($id);
    
        // Werk de categorie bij met de nieuwe data
        $category->update([
            'naam' => $validated['naam'],
            'type' => $validated['type'],
            'beschrijving' => $validated['beschrijving'],
            'kleur' => $validated['kleur'],
            'max' => $validated['max'],
            'aantal_namen' => $validated['aantal_namen'],
            'dagdeel_1' => $validated['dagdeel_1'] ?? false,
            'dagdeel_2' => $validated['dagdeel_2'] ?? false,
            'dagdeel_3' => $validated['dagdeel_3'] ?? false,

            'stek_1' => $validated['stek_1'] ?? false,
            'stek_2' => $validated['stek_2'] ?? false,
            'stek_3' => $validated['stek_3'] ?? false,
            'stek_4' => $validated['stek_4'] ?? false,
            'stek_5' => $validated['stek_5'] ?? false,
            'stek_6' => $validated['stek_6'] ?? false,
            'stek_7' => $validated['stek_7'] ?? false,
            'stek_8' => $validated['stek_8'] ?? false,
            'stek_9' => $validated['stek_9'] ?? false,
            'stek_10' => $validated['stek_10'] ?? false,
            'stek_11' => $validated['stek_11'] ?? false,
            'stek_12' => $validated['stek_12'] ?? false,
            'stek_13' => $validated['stek_13'] ?? false,
            'stek_14' => $validated['stek_14'] ?? false,
            'stek_15' => $validated['stek_15'] ?? false,
            'stek_16' => $validated['stek_16'] ?? false,
            'stek_1a' => $validated['stek_1a'] ?? false,
            'stek_8a' => $validated['stek_8a'] ?? false,
            'stek_9a' => $validated['stek_9a'] ?? false,
            'stek_16a' => $validated['stek_16a'] ?? false,
            'stek_17' => $validated['stek_17'] ?? false,
            'stek_18' => $validated['stek_18'] ?? false,
            'stek_19' => $validated['stek_19'] ?? false,
            'stek_20' => $validated['stek_20'] ?? false,
            'stek_21' => $validated['stek_21'] ?? false,
            'stek_22' => $validated['stek_22'] ?? false,
            'stek_23' => $validated['stek_23'] ?? false,
            'stek_24' => $validated['stek_24'] ?? false,
            'stek_25' => $validated['stek_25'] ?? false,
            'stek_26' => $validated['stek_26'] ?? false,
        ]);
    
        // Redirect terug naar de index met een succesbericht
        return redirect()->route('categorie.index')->with('success', 'Categorie succesvol bijgewerkt.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categorie $categorie)
    {
        $categorie->delete();

        return redirect()->route('categorie.index')->with('success', 'Notitie succesvol verwijderd!');
    }
}
