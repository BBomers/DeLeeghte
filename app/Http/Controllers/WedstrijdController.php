<?php

namespace App\Http\Controllers;

use App\Models\Wedstrijd;
use App\Models\Categorie;
use Illuminate\Http\Request;

class WedstrijdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wedstrijds =  Wedstrijd::with('categorie')
        ->orderBy('date', 'asc') // Sorteer op datum oplopend (oud naar nieuw)
        ->get();
        return view('admin.wedstrijd.index', compact('wedstrijds'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categorie::all(); // Get all categories for the dropdown
        return view('admin.wedstrijd.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valideer de gegevens
        $validated = $request->validate([
            'naam' => 'required|string|max:255',
            'categorie_id' => 'required|exists:categories,id',
            'zichtbaarheid' => 'required|boolean',
            'date' => 'date_format:Y-m-d',
        ]);
        
    
        // Maak een nieuwe wedstrijd aan
        Wedstrijd::create([
            'naam' => $validated['naam'],
            'categorie_id' => $validated['categorie_id'],
            'zichtbaarheid' => $validated['zichtbaarheid'],
            'date' => $validated['date'],
        ]);
    
        return redirect()->route('wedstrijd.index')->with('success', 'Wedstrijd created successfully');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wedstrijd $wedstrijd)
    {
        $categories = Categorie::all();
        return view('admin.wedstrijd.edit', compact('wedstrijd', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Wedstrijd $wedstrijd)
    {
        // Validation
        $validated = $request->validate([
            'naam' => 'required|string|max:255',
            'categorie_id' => 'required|exists:categories,id',
            'zichtbaarheid' => 'required|boolean',
            'date' => 'date_format:Y-m-d',
        ]);

        // Update wedstrijd
        $wedstrijd->update([
            'naam' => $validated['naam'],
            'categorie_id' => $validated['categorie_id'],
            'zichtbaarheid' => $validated['zichtbaarheid'],
            'date' => $validated['date'],
        ]);

        return redirect()->route('wedstrijd.index')->with('success', 'Wedstrijd updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wedstrijd $wedstrijd)
    {
        $wedstrijd->delete();
        return redirect()->route('wedstrijd.index')->with('success', 'Wedstrijd deleted successfully');
    }

    
    public function show(Wedstrijd $wedstrijd) {
        //$inschrijvingen = Inschrijving::where('wedstrijd_id', $wedstrijd->id)->get();

        return view('admin.wedstrijd.show', compact('wedstrijd'));
    }

    public function pooster($id)
    {
        // Hier kun je de $id gebruiken om gegevens op te halen of te verwerken
        $wedstrijd = Wedstrijd::findOrFail($id);
        $categorie = Categorie::findOrFail($wedstrijd->categorie_id);
        

        // Voorbeeld van wat je ermee zou kunnen doen
        return view('pooster', compact('wedstrijd', 'categorie'));
    }
}
