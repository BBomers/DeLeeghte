<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inschrijvingens extends Model
{
    use HasFactory;

    protected $fillable = [
        'wedstrijd_id',
        'uuid_id', 'stek',
        'uuid_id_two', 'stek_two',
        'uuid_id_tree', 'stek_tree',
        'uuid_id_four', 'stek_four',
    ];

    // Relatie naar de wedstrijd
    public function wedstrijd()
    {
        return $this->belongsTo(Wedstrijd::class);
    }

    // Persoon 1 (verplicht)
    public function persoon1()
    {
        return $this->belongsTo(Uuid::class, 'uuid_id');
    }

    // Persoon 2 (optioneel)
    public function persoon2()
    {
        return $this->belongsTo(Uuid::class, 'uuid_id_two');
    }

    // Persoon 3 (optioneel)
    public function persoon3()
    {
        return $this->belongsTo(Uuid::class, 'uuid_id_tree');
    }

    // Persoon 4 (optioneel)
    public function persoon4()
    {
        return $this->belongsTo(Uuid::class, 'uuid_id_four');
    }
    // Alle wegingen gekoppeld aan deze inschrijving
    public function wegingens()
    {
        return $this->hasMany(Wegingens::class, 'inschrijvingen_id');
    }
}
