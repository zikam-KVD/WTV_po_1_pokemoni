<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use App\Models\Typ;
use Exception;
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
        try {
            $zkontrolovano = $request->validate([
                'typ-nazev' => 'required|unique:types,nazev|min:5|max:64',
                'typ-color' => 'required|unique:types,barva|hex_color',
            ]);

            Typ::insert([
                "nazev" => $request['typ-nazev'],
                "barva" => $zkontrolovano['typ-color'],
            ]);

            return back()->with("message", "Typ " . $request['typ-nazev'] . " byl přidán.");
        } catch(Exception $e) {
            return back()->with("message", "Chyba:  " . $e->getMessage());
        }
    }

    /**
     * Funkce vypisuje blade, kde je mozne vytvaret noveho pokemona.
     */
    public function adminPokemoni()
    {
        return view('pridejPokemona', ['typy' => Typ::all()]);
    }

    public function pridatPokemona(Request $request)
    {
        $validovano = $request->validate([
            'pokemon-name' => 'required|unique:pokemons,nazev|min:3',
            'pokemon-typ' => 'required|exists:types,id',
            'pokemon-image' => 'required|extensions:png',
        ]);

        $obrazek = $request->file("pokemon-image");
        $obrNazev = $validovano["pokemon-name"] . "." . $obrazek->getClientOriginalExtension();
        $obrazek->move(public_path() . '/images', $obrNazev);

        Pokemon::insert([
            "nazev" => $validovano["pokemon-name"],
            "druh" => $validovano["pokemon-typ"],
            "url_obrazku" => $obrNazev,
        ]);

        return back()->with("message", "Vytvořil jsi " . $validovano["pokemon-name"]. ".");

    }

    public function smazaniTypu(int $id)
    {
        $typ = Typ::find($id);

        if(null === $typ) {
            return back()->with("message", "Tento tyúp neexistuje");
        } else {
            $typ->delete();
            return back()->with("message", "Typ pokémona byl smazán.");
        }


    }
}
