<?php

use App\Http\Controllers\PageController;
use App\Models\Pokemon;
use App\Models\Typ;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, "ukazIndex"]);

Route::get(
    '/detail-pokemona/{id}',
    [PageController::class, 'ukazDetail']
)->name("detail");

Route::get(
    '/typy-pokemonu/{typ}',
    [PageController::class, 'ukazPokemonyPodleTypu']
)->name("typy");

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/pokemoni-typy', function () {
        $typy = Typ::all();

        return view('pokemoni-typy', ["typy" => $typy]);
    })->name('pokemoni-typy');

    //postova routa na pridani typu
    Route::post(
        '/pridani-barvy',
        [PageController::class, 'jaNevimTreba'
    ])->name('pridaniTypu');

    //Smazani typu, {id} udava, ze to bude chtit ID typu na smazani
    Route::post(
        '/smazani-typu/{id}',
        [PageController::class, 'smazaniTypu']
    )->name('admin.smazTyp');

    //jen zobrazuje view pro pridani pokemona (proto get)
    Route::get(
        '/pokemoni-pokemoni',
        [PageController::class, 'adminPokemoni']
    )->name('admin.pokemoni');

    //postova routa na pridavani pokemona
    Route::post(
        '/pridani-pokemona',
        [PageController::class, 'pridatPokemona'
    ])->name('admin.pridatPokemona');

});
