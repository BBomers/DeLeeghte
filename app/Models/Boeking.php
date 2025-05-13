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

    // ✅ Relatie naar de 'Uuid' (of wat jouw model ook heet)
    public function uuid()
    {
        return $this->belongsTo(Uuid::class, 'uuid_id');
    }
}
