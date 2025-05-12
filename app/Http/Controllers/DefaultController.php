<?php

namespace App\Http\Controllers;

use App\Models\Wedstrijd;
use App\Models\Categorie;
use Illuminate\Http\Request;

class DefaultController extends Controller
{
    public function kalender()
    {
        $wedstrijden = Wedstrijd::with('categorie')->get(); // Eager load categories for performance
        return view('kalender', compact('wedstrijden'));
    }
    
}
