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
});
