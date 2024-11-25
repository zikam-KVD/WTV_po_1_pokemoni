<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Typ extends Model
{
    protected $table = "types";

    //vazba na cizí klíč v tabulce pokemons
    public function pokemon()
    {
        return $this->hasMany(Pokemon::class, 'druh', 'id');
    }
}
