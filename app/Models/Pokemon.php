<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pokemon extends Model
{
    protected $table = "pokemons";
    protected $fillable = ["nazev", "druh", "url_obrazku"];

    //vazba na primární klíč v tabulce types
    public function typ(): BelongsTo
    {
        return $this->belongsTo(Typ::class, 'druh', 'id');
    }
}
