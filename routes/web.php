<?php

use App\Models\Pokemon;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    $pokemoni = Pokemon::all();

    return view('welcome', ['pokemons' => $pokemoni]);
});

Route::get('/detail-pokemona/{id}', function(int $id) {
    $poke = Pokemon::find($id);

    return view('detail', ['pokemon' => $poke]);
})->name("detail");
