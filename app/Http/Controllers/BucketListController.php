<?php

namespace App\Http\Controllers;
use App\Models\Bucket;
use App\Models\Journey;
use Illuminate\Http\Request;

class BucketListController extends Controller
{
  // SHOW PAGE
    public function index()
    {
        $buckets = Bucket::latest()->get();
        $journeys = Journey::orderBy('id')->get();

        return view('bucketlist', compact('buckets', 'journeys'));
    }

    // STORE (ADD NEW)
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
            'status' => 'required',
        ]);

        Bucket::create($request->all());

        return back()->with('success', 'Added successfully 🎉');
    }

    // UPDATE (EDIT)
    public function update(Request $request, $id)
    {
        $bucket = Bucket::findOrFail($id);

        $bucket->update([
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category,
            'status' => $request->status,
        ]);

        return back()->with('success', 'Updated ✨');
    }

    // DELETE
    public function destroy($id)
    {
        $bucket = Bucket::findOrFail($id);
        $bucket->delete();

        return back()->with('success', 'Deleted 🗑');
    }
}
