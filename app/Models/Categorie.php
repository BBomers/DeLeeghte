<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    protected $fillable = [
        'naam',
        'type',
        'beschrijving',
        'kleur',
        'max',
        'aantal_namen',
        'dagdeel_1',
        'dagdeel_2',
        'dagdeel_3',
        'stek_1', 'stek_2', 'stek_3', 'stek_4',
        'stek_5', 'stek_6', 'stek_7', 'stek_8',
        'stek_9', 'stek_10', 'stek_11', 'stek_12',
        'stek_13', 'stek_14', 'stek_15', 'stek_16',
        'stek_1a', 'stek_8a', 'stek_9a', 'stek_16a',
        'stek_17',
        'stek_18',
        'stek_19',
        'stek_20',
        'stek_22',
        'stek_23',
        'stek_24',
        'stek_25',
        'stek_26',
    ];

    // Als je nog relaties hebt met andere modellen zoals Wedstrijd:
    public function wedstrijds()
    {
        return $this->hasMany(Wedstrijd::class);
    }
}