<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display listing
     */
    public function index()
    {
        $data = Gallery::latest()->paginate(10);
        return view('gallery.index', compact('data'));
    }

    /**
     * Show create form
     */
    public function create()
    {
        return view('gallery.create');
    }

    /**
     * Store data
     */
    public function store(Request $request)
    {
        $request->validate([
            'category'   => 'required|in:teacher,event',
            'media'      => 'required|file|mimes:jpg,jpeg,png,mp4,mov,avi|max:10240',
            'media_type' => 'required|in:image,video',
        ]);

        // Extra validation based on category
        if ($request->category == 'teacher') {
            $request->validate([
                'name' => 'required|string|max:255',
                'age'  => 'required|numeric',
            ]);
        }

        if ($request->category == 'event') {
            $request->validate([
                'heading' => 'required|string|max:255',
            ]);
        }

        // Upload file
        $fileName = null;
        if ($request->hasFile('media')) {
            $fileName = time() . '.' . $request->media->extension();
            $request->media->storeAs('gallery', $fileName, 'public');
        }

        Gallery::create([
            'category'   => $request->category,
            'name'       => $request->name,
            'age'        => $request->age,
            'heading'    => $request->heading,
            'media_type' => $request->media_type,
            'media'      => $fileName,
            'status'     => 0
        ]);

        return redirect()->route('gallery.index')
            ->with('success', 'Gallery item added successfully');
    }

    /**
     * Show edit form
     */
    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('gallery.edit', compact('gallery'));
    }

    /**
     * Update data
     */
    public function update(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($id);

        $request->validate([
            'category'   => 'required|in:teacher,event',
            'media_type' => 'required|in:image,video',
        ]);

        if ($request->category == 'teacher') {
            $request->validate([
                'name' => 'required|string|max:255',
                'age'  => 'required|numeric',
            ]);
        }

        if ($request->category == 'event') {
            $request->validate([
                'heading' => 'required|string|max:255',
            ]);
        }

        // Update file if uploaded
        if ($request->hasFile('media')) {
            $fileName = time() . '.' . $request->media->extension();
            $request->media->storeAs('gallery', $fileName, 'public');
            $gallery->media = $fileName;
        }

        $gallery->category   = $request->category;
        $gallery->name       = $request->name;
        $gallery->age        = $request->age;
        $gallery->heading    = $request->heading;
        $gallery->media_type = $request->media_type;

        $gallery->save();

        return redirect()->route('gallery.index')
            ->with('success', 'Gallery item updated successfully');
    }

    /**
     * Delete
     */
    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);

        // Optional: delete file
        if ($gallery->media && Storage::disk('public')->exists('gallery/' . $gallery->media)) {
            Storage::disk('public')->delete('gallery/' . $gallery->media);
        }

        $gallery->delete();

        return back()->with('success', 'Deleted successfully');
    }

    /**
     * Approve / Toggle Status
     */
    public function approve($id)
    {
        $gallery = Gallery::findOrFail($id);
        $gallery->status = $gallery->status == 1 ? 0 : 1;
        $gallery->save();

        return back()->with('success', 'Status updated');
    }
    public function getDataForView()
    {
        
        $teachers = \App\Models\Gallery::where('category', 'teacher')
            ->where('status', 1)
            ->get();

        $events = \App\Models\Gallery::where('category', 'event')
            ->where('status', 1)
            ->get();

        return view('website.memory', compact('teachers', 'events'));

        //  return view('website.memory', compact('completed', 'ongoing', 'upcoming'));
    }
}
