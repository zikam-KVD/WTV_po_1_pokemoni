<?php

use App\Models\Pokemon;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    $pokemoni = Pokemon::all();

    return view('welcome', ['pokemons' => $pokemoni]);
});

Route::get('/detail-pokemona', function() {
    return view('detail');
})->name("detail");
