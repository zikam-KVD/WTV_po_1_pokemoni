<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/detail-pokemona', function() {
    return view('detail');
})->name("detail");
