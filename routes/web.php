<?php

use App\Http\Controllers\BucketListController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\JourneyController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\StoryController;
use Illuminate\Support\Facades\Route;







Route::get('/', function () {return view('home');})->name('home');

Route::get('/game', fn() => view('game/game'))->name('game');

Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
Route::post('/gallery/upload', [GalleryController::class, 'upload'])->name('upload');

Route::delete('/story/{id}', [StoryController::class, 'destroy'])->name('story.delete');
Route::put('/story/{id}', [StoryController::class, 'update'])->name('story.update');
Route::get('/ourStory', [StoryController::class, 'index'])->name('ourStory');
Route::post('/our-story', [StoryController::class, 'store'])->name('story.store');

Route::get('/bucketlist', [BucketListController::class, 'index'])->name('bucketlist');
Route::post('/bucket', [BucketListController::class, 'store']);
Route::put('/bucket/{id}', [BucketListController::class, 'update']);
Route::delete('/bucket/{id}', [BucketListController::class, 'destroy']);

// JOURNEY (timeline)
Route::post('/journey', [JourneyController::class, 'store'])->name('journey.store');
Route::put('/journey/{id}', [JourneyController::class, 'update'])->name('journey.update'); // Add this line
Route::delete('/journey/{id}', [JourneyController::class, 'destroy'])->name('journey.delete');


Route::get('/songs', [SongController::class, 'index'])->name('songs.index');
Route::post('/songs', [SongController::class, 'store'])->name('songs.store');
Route::put('/songs/{id}', [SongController::class, 'update'])->name('songs.update');
Route::delete('/songs/{id}', [SongController::class, 'destroy'])->name('songs.delete');

