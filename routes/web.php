<?php
use Illuminate\Support\Facades\Route;



Route::get('/', function () {return view('home');})->name('home');

Route::get('/game', fn() => view('game/game'))->name('game');

Route::get('/gallery', fn() => view('gallery'))->name('gallery');

Route::get('/ourStory', fn() => view('ourstory'))->name('ourStory');
Route::get('/bucketlist', fn() => view('bucketlist'))->name('bucketlist');
