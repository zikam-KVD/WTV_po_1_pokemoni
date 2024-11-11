<?php

namespace Database\Seeders;

use App\Models\Pokemon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class vytvorPokemony extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //"nazev", "druh", "url_obrazku"
        $pokemons = [
            ["name" => "Bulbasaur", "type" => 4,"img" => "bulbasaur.png"],
            ["name" => "Squirtle", "type" => 2,"img" => "zelva.png"],
            /*
            ["name" => "Squirtle", "type" => 2,"img" => "zelva.png"],
            ["name" => "Squirtle", "type" => 2,"img" => "zelva.png"],
            ["name" => "Squirtle", "type" => 2,"img" => "zelva.png"],
            */
        ];

        foreach($pokemons as $poke)
        {
            Pokemon::insert([
                "nazev" => $poke["name"],
                "druh" => $poke["type"],
                "url_obrazku" => $poke["img"],
            ]);
        }

    }
}
