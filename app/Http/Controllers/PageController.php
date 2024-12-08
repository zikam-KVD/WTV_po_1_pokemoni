<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use App\Models\Typ;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Tohle vrací blade indexu
     */
    public function ukazIndex()
    {
        $pokemoni = Pokemon::all();
        return view('welcome', ['pokemons' => $pokemoni]);
    }

    //Tohle vraci pohled detailu pokemona
    public function ukazDetail(int $id)
    {
        $poke = Pokemon::find($id);
        if (!$poke) {   //$poke === null
            abort(404);
        }
        //$typ = Typ::find($poke->druh);
        return view('detail', ['pokemon' => $poke/*, 'typ' => $typ*/]);
    }


    /**
     * Tohle vypisuje všechny pokemony nějakého typu.
     * @param $typ: int
     */
    public function ukazPokemonyPodleTypu(int $typ)
    {
        $typ = Typ::find($typ);

        if(!$typ){
            abort(404);
        }

        return view('pokemoniTypy', ['pokemons' => $typ->pokemon]);
    }

    public function jaNevimTreba(Request $request)
    {
        $zkontrolovano = $request->validate([
            'typ-nazev' => 'required|unique:types,nazev|min:5|max:64',
            'typ-color' => 'required|unique:types,barva|hex_color',
        ]);

        Typ::insert([
            "nazev" => $request['typ-nazev'],
            "barva" => $zkontrolovano['typ-color'],
        ]);

        return back()->with("message", "Typ " . $request['typ-nazev'] . " byl přidán.");
    }
}
