<?php

namespace App\Http\Controllers;

use App\Models\Wedstrijd;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;


class DefaultController extends Controller
{
    public function kalender()
    {
        $sorted = Wedstrijd::with('categorie')
            ->whereDate('date', '>=', Carbon::today())
            ->orderBy('date')
            ->limit(3)
            ->get();
        $wedstrijden = Wedstrijd::with('categorie')
            ->get();

        return view('kalender', compact('wedstrijden', 'sorted'));
    }
    
}
