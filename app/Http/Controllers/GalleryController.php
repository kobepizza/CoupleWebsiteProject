<?php

namespace App\Http\Controllers;
use App\Models\Memory;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index() {
    $allMemories = \App\Models\Memory::all();
    $randomEight = \App\Models\Memory::inRandomOrder()->limit(8)->get();
    
    return view('gallery', [
        'allMemories' => $allMemories,
        'memories' => $randomEight // Keep this name so your grid code doesn't break
    ]);
   
}

public function upload(Request $request) {
    $request->validate([
        'image' => 'required|image',
    ]);

    $path = $request->file('image')->store('memories', 'public');

    Memory::create([
        'image' => $path,
        'title' => $request->title,
        'description' => $request->description,
    ]);

    return back();
}
}
