<?php

namespace App\Http\Controllers;
use App\Models\Memory;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index() {
    $memories = Memory::latest()->get();
    return view('gallery', compact('memories'));
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
