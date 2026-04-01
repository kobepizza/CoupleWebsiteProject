<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Story;

class StoryController extends Controller
{
  public function index()
    {
        $stories = Story::orderBy('order')->get();
        return view('ourstory', compact('stories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:jpg,jpeg,png'
        ]);

        $path = null;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('stories', 'public');
        }

        Story::create([
            'title' => $request->title,
            'content' => $request->input('content'),
            'image' => $path,
            'order' => Story::count() + 1
        ]);

        return back()->with('success', 'Story added 💞');
    }

    public function destroy($id)
{
    $story = Story::findOrFail($id);
    $story->delete();

    return back()->with('success', 'Deleted 💔');
}

public function update(Request $request, $id)
{
    $story = Story::findOrFail($id);

    $story->update([
        'title' => $request->input('title'),
        'content' => $request->input('content'),
    ]);

    return back()->with('success', 'Updated ✨');
}
}
