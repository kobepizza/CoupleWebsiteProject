<?php
use App\Http\Controllers\GalleryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoryController;





Route::get('/', function () {return view('home');})->name('home');

Route::get('/game', fn() => view('game/game'))->name('game');

Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
Route::post('/gallery/upload', [GalleryController::class, 'upload'])->name('upload');

Route::delete('/story/{id}', [StoryController::class, 'destroy'])->name('story.delete');
Route::put('/story/{id}', [StoryController::class, 'update'])->name('story.update');
Route::get('/ourStory', [StoryController::class, 'index'])->name('ourStory');
Route::post('/our-story', [StoryController::class, 'store'])->name('story.store');

Route::get('/bucketlist', fn() => view('bucketlist'))->name('bucketlist');
