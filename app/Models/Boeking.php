<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boeking extends Model
{
    use HasFactory;

    // De tabelnaam is boekings, dit hoeft niet gespecificeerd te worden als je naam conventies volgt
    protected $table = 'boekings';

    // Velden die massaal ingevuld kunnen worden
    protected $fillable = [
        'naam',
        'telefoonnummer',
        'email',
        'datum',
        'prijs',
        'voldaan',
        'mollie_id',
        'stek',
        'dagdeel_1',
        'dagdeel_2',
        'dagdeel_3',
        'arrangement',
        'betaling',
        'regelement',
        'pallets_2mm',
        'pallets_4mm',
        'pallets_6mm',
    ];

    // Date fields die automatisch behandeld worden als Carbon instances
    protected $dates = [
        'datum', // Zorgt ervoor dat de datum als een Carbon object wordt behandeld
        'created_at',
        'updated_at',
    ];
}
