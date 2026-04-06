<?php

namespace App\Http\Controllers;

use App\Models\Journey;
use Illuminate\Http\Request;

class JourneyController extends Controller
{
    // STORE (ADD TIMELINE EVENT)
  public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date_label' => 'required',
            'color' => 'required',
        ]);

        Journey::create($request->all());

        return back()->with('success', 'Journey added 💞');
    }

    // UPDATE (EDIT TIMELINE EVENT)
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date_label' => 'required',
            'color' => 'required',
        ]);

        $journey = Journey::findOrFail($id);
        $journey->update($request->all());

        return back()->with('success', 'Journey updated! ✨');
    }

    // DELETE
    public function destroy($id)
    {
        $journey = Journey::findOrFail($id);
        $journey->delete();

        return back()->with('success', 'Removed');
    }
}
