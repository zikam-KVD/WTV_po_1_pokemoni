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
