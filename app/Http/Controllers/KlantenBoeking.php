<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KlantenBoeking extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aankomend = Wedstrijd::with('categorie')
            ->whereDate('date', '>=', now()) // Alleen toekomstige of huidige datums
            ->orderBy('date', 'asc')         // Eerstvolgende wedstrijden eerst
            ->take(3)                         // Enkel de eerste 3
            ->get();
        $wedstrijden = Wedstrijd::with('categorie')
            ->whereDate('date', '>=', now()) // Alleen toekomstige of huidige datums
            ->orderBy('date', 'asc')         // Eerstvolgende wedstrijden eerst
            ->get();
        $boeking = Boeking::with('uuid')
            ->orderBy('date', 'asc')         // Eerstvolgende wedstrijden eerst
            ->get();
        return view('klantenBoeking', compact('aankomend', 'wedstrijden', 'Bookings'));
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
        //
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
