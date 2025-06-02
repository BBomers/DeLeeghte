<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wedstrijd;
use App\Models\Categorie;
use App\Models\Uuid;
use App\Models\Boeking;

class KlantenBoekingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wedstrijden = Wedstrijd::with('categorie')
            ->whereDate('date', '>=', now()) // Alleen toekomstige of huidige datums
            ->orderBy('date', 'asc')         // Eerstvolgende wedstrijden eerst
            ->get();
        $boeking = Boeking::orderBy('datum', 'asc')
        ->get();
        return view('klantenBoeking', compact('wedstrijden', 'boeking'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Controleer input velden
        $validated = $request->validate([
            'naam' => 'required|string|max:255',
            'telefoon' => 'required|string|max:50',
            'email' => 'required|email|max:255',
            'datum' => 'required|date',
            'prijs' => 'required|numeric',
            'stek' => 'required|integer',
            'mollie_id' => 'nullable|string|max:255',
            'pallets_2mm' => 'nullable|integer',
            'pallets_4mm' => 'nullable|integer',
            'pallets_6mm' => 'nullable|integer',
            'betalingstype' => 'required|in:contant,online',
        ]);

                
        // nieuwe UUID aanmaken
        $uuid = Uuid::where('naam', $validated['naam'])
            ->where('telefoon', $validated['telefoon'])
            ->where('email', $validated['email'])
            ->first();

        if (!$uuid) {
            $uuid = Uuid::create([
                'naam' => $validated['naam'],
                'telefoon' => $validated['telefoon'],
                'email' => $validated['email'],
            ]);
        }

        // Controleren of ergeen wedstrijd is
        $wedstrijdExists = \App\Models\Wedstrijd::where('date', $validated['datum'])->exists();
        if ($wedstrijdExists) {
            return back()
                ->withErrors(['datum' => 'Er is al een wedstrijd gepland op deze datum.'])
                ->withInput();
        }

        // Controleren of er geen boeking is.
        $query = Boeking::where('datum', $validated['datum'])
                        ->where('stek', $validated['stek']);

        // Check dagdelen die aangevinkt zijn, en kijk of er overlap is
        $dagdelen = ['dagdeel_1', 'dagdeel_2', 'dagdeel_3'];
        $overlapExists = false;
        foreach ($dagdelen as $dagdeel) {
            if ($request->has($dagdeel)) {
                // Check of er een boeking is waar dat dagdeel true is
                $dagdeelConflict = (clone $query)
                    ->where($dagdeel, true)
                    ->exists();

                if ($dagdeelConflict) {
                    $overlapExists = true;
                    break;
                }
            }
        }

        if ($overlapExists) {
            return back()
                ->withErrors(['datum' => 'Er bestaat al een boeking op deze datum, stek en dagdeel.'])
                ->withInput();
        }

        // maak de boeking aan
        $boeking = Boeking::create([
            'uuid_id' => $uuid->id,
            'datum' => $validated['datum'],
            'prijs' => $validated['prijs'],
            'voldaan' => $request->has('voldaan'),
            'mollie_id' => $validated['mollie_id'] ?? null,
            'stek' => $validated['stek'],
            'dagdeel_1' => $request->has('dagdeel_1'),
            'dagdeel_2' => $request->has('dagdeel_2'),
            'dagdeel_3' => $request->has('dagdeel_3'),
            'arrangement' => $request->has('arrangement'),
            'betaling' => $request->has('betaling'),
            'regelement' => $request->has('regelement'),
            'pallets_2mm' => $validated['pallets_2mm'] ?? 0,
            'pallets_4mm' => $validated['pallets_4mm'] ?? 0,
            'pallets_6mm' => $validated['pallets_6mm'] ?? 0,
        ]);

        // Redirect of return
        if ($validated['betalingstype'] === 'online') {
            return redirect()->route('betalingen.start', ['boeking' => $boeking->id]);
        }

        
        return view('klantenboekingsucces')->with('success', 'Boeking succesvol opgeslagen.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
