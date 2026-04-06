<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;

class SongController extends Controller
{
   public function index()
    {
        $songs = Song::latest()->get();

        return view('oursong', compact('songs'));
    }

   public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'artist' => 'required',
        'mp3_file' => 'nullable|mimes:mp3,wav,ogg|max:10000', // max 10MB
    ]);

    $data = $request->all();

    if ($request->hasFile('mp3_file')) {
        $path = $request->file('mp3_file')->store('songs', 'public');
        $data['file_path'] = $path;
    }

    Song::create($data);
    return redirect()->back()->with('success', 'Song added! 🎵');
}

    public function update(Request $request, $id)
    {
        $song = Song::findOrFail($id);
        $song->update($request->all());

        return redirect()->back()->with('success', 'Track updated! ✨');
    }

    public function destroy($id)
    {
        Song::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Track removed. 💔');
    }
}
