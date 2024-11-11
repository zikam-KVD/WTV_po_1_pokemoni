<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class vytvoreniTypu extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $typy = [
            ["ohnivý", "#ff4500"],
            ["vodní", "#00bfff"],
            ["normální", "#778899"],
            ["travnatý", "#228b22"],
        ];

        foreach($typy as $typ)
        {
            DB::table('types')->insert([
                "nazev" => $typ[0],
                "barva" => $typ[1],
            ]);
        }
    }
}
