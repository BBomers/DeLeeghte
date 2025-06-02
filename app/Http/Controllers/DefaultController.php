<?php

namespace App\Http\Controllers;

use App\Models\Wedstrijd;
use App\Models\Categorie;
use Illuminate\Http\Request;

class DefaultController extends Controller
{
    public function kalender()
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
            $categories = Categorie::all();

        return view('kalender', compact('aankomend', 'wedstrijden', 'categories'));
    }

    
}
