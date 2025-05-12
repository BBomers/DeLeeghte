<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wedstrijd extends Model
{
    use HasFactory;

    protected $fillable = ['naam', 'categorie_id', 'zichtbaarheid', 'date'];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function inschrijvingens()
    {
        return $this->hasMany(Inschrijvingens::class);
    }

    public function wegingens()
    {
        return $this->hasMany(Wegingens::class);
    }
}
