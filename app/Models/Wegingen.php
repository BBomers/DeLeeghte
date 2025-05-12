<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wegingens extends Model
{
    use HasFactory;

    protected $fillable = ['wedstrijd_id', 'inschrijvingen_id', 'uuid_id', 'weging'];

    public function wedstrijd()
    {
        return $this->belongsTo(Wedstrijd::class);
    }

    public function inschrijving()
    {
        return $this->belongsTo(Inschrijvingens::class, 'inschrijvingen_id');
    }

    public function uuid()
    {
        return $this->belongsTo(Uuid::class);
    }
}
