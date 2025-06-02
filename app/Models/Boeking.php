<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boeking extends Model
{
    use HasFactory;

    protected $table = 'boekings';

    protected $fillable = [
        'uuid_id',
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

    protected $casts = [
        'datum' => 'date',
        'prijs' => 'decimal:2',
        'voldaan' => 'boolean',
        'dagdeel_1' => 'boolean',
        'dagdeel_2' => 'boolean',
        'dagdeel_3' => 'boolean',
        'arrangement' => 'boolean',
        'betaling' => 'boolean',
        'regelement' => 'boolean',
    ];

    /**
     * Relatie naar het UUID-model
     */
    public function uuid()
    {
        return $this->belongsTo(Uuid::class);
    }
}
