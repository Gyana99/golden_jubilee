<?php

namespace App\Http\Controllers;

use App\Models\Magazine;
use App\Models\Alumni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MagazineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $magazines = Magazine::with('alumni')->latest()->paginate(10);
        return view('magazines.index', compact('magazines'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $alumni = Alumni::all();
        return view('magazines.create', compact('alumni'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'     => 'required|string|max:255',
            'alumni_id' => 'nullable|exists:alumni,id',
            'type'      => 'required|in:image,text',
            'image'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'details'   => 'nullable|string',
            'publish'   => 'boolean',
        ]);

        $data = $request->only(['title', 'alumni_id', 'type', 'details', 'publish']);
        $data['updated_by'] = Auth::id();

        if ($request->type === 'image' && $request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('magazines', 'public');
        }

        Magazine::create($data);

        return redirect()->route('magazines.index')->with('success', 'Magazine created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $magazine = Magazine::findOrFail($id);
        $alumni   = Alumni::all();
        return view('magazines.edit', compact('magazine', 'alumni'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $magazine = Magazine::findOrFail($id);

        $request->validate([
            'title'     => 'required|string|max:255',
            'alumni_id' => 'nullable|exists:alumni,id',
            'type'      => 'required|in:image,text',
            'image'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'details'   => 'nullable|string',
            'publish'   => 'boolean',
        ]);

        $data = $request->only(['title', 'alumni_id', 'type', 'details', 'publish']);
        $data['updated_by'] = Auth::id();

        if ($request->type === 'image' && $request->hasFile('image')) {
            // delete old if exists
            if ($magazine->image) {
                Storage::disk('public')->delete($magazine->image);
            }
            $data['image'] = $request->file('image')->store('magazines', 'public');
        } else {
            $data['image'] = $magazine->image; // keep old image if type is not image
        }

        $magazine->update($data);

        return redirect()->route('magazines.index')->with('success', 'Magazine updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $magazine = Magazine::findOrFail($id);

        if ($magazine->image) {
            Storage::disk('public')->delete($magazine->image);
        }

        $magazine->delete();

        return redirect()->route('magazines.index')->with('success', 'Magazine deleted successfully.');
    }
    /**
     * add Magazine by user.
     */
    public function addMagazineByUser(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'title'       => 'required|string|max:255',
                'alumni_id'   => 'required|exists:alumni,id',
                'type'        => 'required|in:image,text',
                'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
                'details'     => 'nullable|string',
            ]);

            $data = [
                'title'      => $request->title,
                'alumni_id'  => $request->alumni_id,
                'type'       => $request->type,
                'details'    => $request->type === 'text' ? $request->details : null,
                'created_at' => now(),
                'updated_at' => now(),
            ];
            $alumninyid = Alumni::find($request->alumni_id);
            // If type = image → save image
            if ($request->type === 'image' && $request->hasFile('image')) {
                $extension = $request->file('image')->getClientOriginalExtension();
                $filename = strtolower(str_replace(' ', '_', $alumninyid->name))
                    . '_' . rand(1000, 9999)
                    . '_' . now()->format('YmdHis')
                    . '.' . $extension;

                $request->file('image')->storeAs('public/magazines', $filename);

                $data['image'] = $filename;
                $data['details'] = null;
            }

            Magazine::create($data);

            return redirect()->back()->with('success', '📖 Magazine submitted successfully ✅');
        }

        // Fetch alumni list for dropdown
        $alumni = Alumni::all(['id', 'name', 'passout_year']);
        return view('website.addmagazine', compact('alumni'));
    }
}
