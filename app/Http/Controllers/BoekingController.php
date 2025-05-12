<?php

namespace App\Http\Controllers;

use App\Models\Boeking;
use Illuminate\Http\Request;

class BoekingController extends Controller
{
    public function index()
    {
        $boekingen = Boeking::whereDate('datum', '>', now())
            ->orderBy('datum', 'asc')
            ->get();

        return view('admin.boekingen.index', compact('boekingen'));
    }

    public function create()
    {
        return view('admin.boekingen.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'naam' => 'required|string|max:255',
            'telefoonnummer' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'prijs' => 'required|numeric',
            'datum' => 'required|date|after_or_equal:today',
            'voldaan' => 'required|boolean',
            'mollie_id' => 'nullable|string|max:255',
            'stek' => 'required|integer|min:0|max:26',
            'dagdeel_1' => 'required|boolean',
            'dagdeel_2' => 'required|boolean',
            'dagdeel_3' => 'required|boolean',
            'arrangement' => 'required|boolean',
            'betaling' => 'required|boolean',
            'regelement' => 'required|boolean',
            'pallets_2mm' => 'required|integer|min:0',
            'pallets_4mm' => 'required|integer|min:0',
            'pallets_6mm' => 'required|integer|min:0',
        ]);

        $boeking = Boeking::create($validated);

        return redirect()->route('boeking.show', $boeking)->with('success', 'Boeking opgeslagen');
    }

    public function show(Boeking $boeking)
    {
        return view('admin.boekingen.show', compact('boeking'));
    }

    public function edit(Boeking $boeking)
    {
        return view('admin.boekingen.edit', compact('boeking'));
    }

    public function update(Request $request, Boeking $boeking)
    {
        $validated = $request->validate([
            'naam' => 'sometimes|string|max:255',
            'telefoonnummer' => 'sometimes|string|max:20',
            'email' => 'sometimes|email|max:255',
            'prijs' => 'sometimes|numeric',
            'datum' => 'required|date|after_or_equal:today',
            'voldaan' => 'sometimes|boolean',
            'mollie_id' => 'nullable|string|max:255',
            'stek' => 'required|integer|min:0|max:26',
            'dagdeel_1' => 'sometimes|boolean',
            'dagdeel_2' => 'sometimes|boolean',
            'dagdeel_3' => 'sometimes|boolean',
            'arrangement' => 'sometimes|boolean',
            'betaling' => 'sometimes|boolean',
            'regelement' => 'sometimes|boolean',
            'pallets_2mm' => 'sometimes|integer|min:0',
            'pallets_4mm' => 'sometimes|integer|min:0',
            'pallets_6mm' => 'sometimes|integer|min:0',
        ]);

        $boeking->update($validated);

        return redirect()->route('boeking.show', $boeking)->with('success', 'Boeking bijgewerkt');
    }

    public function destroy(Boeking $boeking)
    {
        $boeking->delete();

        return redirect()->route('boeking.index')->with('success', 'Boeking verwijderd');
    }
}
