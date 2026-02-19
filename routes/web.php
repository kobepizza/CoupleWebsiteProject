<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');


Route::get('/game', fn () => view('game/game'));

Route::get('/gallery', fn () => view('gallery'));

