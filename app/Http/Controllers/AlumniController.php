<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class AlumniController extends Controller
{
    /**
     * Display a listing of alumni.
     */
    public function index()
    {
        $alumni = Alumni::latest()->paginate(10);
        return view('alumni.index', compact('alumni'));
    }

    /**
     * Show the form for creating a new alumnus.
     */
    public function create()
    {
        return view('alumni.create');
    }

    /**
     * Store a newly created alumnus in storage.
     */



    /**
     * Display the specified alumnus.
     */
    public function show(Alumni $alumni)
    {
        return view('alumni.show', compact('alumni'));
    }

    /**
     * Show the form for editing the specified alumnus.
     */
    public function edit(Alumni $alumni)
    {
        return view('alumni.edit', compact('alumni'));
    }

    /**
     * Update the specified alumnus in storage.
     */
    public function update(Request $request,Alumni $alumni)
    {
        $request->validate([
            'name'         => 'required|string|max:255',
            'batch'        => 'nullable|string|max:255',
            'email'        => 'required|email|unique:alumni,email,' . $alumni->id,
            'phone'        => 'nullable|string|max:20',
            'passout_year' => 'nullable|integer',
            'photo'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->except('photo');

        // Handle photo upload
        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($alumni->photo && Storage::exists('public/alumniphoto/' . $alumni->photo)) {
                Storage::delete('public/alumniphoto/' . $alumni->photo);
            }

            $extension = $request->file('photo')->getClientOriginalExtension();
            $filename = strtolower(str_replace(' ', '_', $request->name))
                . '_' . rand(1000, 9999)
                . '_' . now()->format('YmdHis')
                . '.' . $extension;

            $request->file('photo')->storeAs('public/alumniphoto', $filename);

            $data['photo'] = $filename;
        }

        $alumni->update($data);

        return redirect()
            ->route('alumni.index')
            ->with('success', 'Alumnus updated successfully.');
    }

    /**
     * Remove the specified alumnus from storage.
     */
    public function destroy($id)
    {
        $alumni = Alumni::findOrFail($id);
        $alumni->delete();

        return redirect()
            ->route('alumni.index')
            ->with('success', 'Alumnus deleted successfully.');
    }
}
