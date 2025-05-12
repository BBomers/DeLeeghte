<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Uuid extends Model
{
    use HasFactory;

    protected $fillable = ['naam', 'telefoon', 'email'];

    public function inschrijvingens()
    {
        return $this->hasMany(Inschrijvingens::class);
    }

    public function inschrijvingensTwo()
    {
        return $this->hasMany(Inschrijvingens::class, 'uuid_id_two');
    }

    public function inschrijvingensTree()
    {
        return $this->hasMany(Inschrijvingens::class, 'uuid_id_tree');
    }

    public function wegingens()
    {
        return $this->hasMany(Wegingens::class);
    }
}
