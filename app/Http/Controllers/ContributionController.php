<?php

namespace App\Http\Controllers;

use App\Models\Contribution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContributionController extends Controller
{
    public function index()
    {
        $contributions = Contribution::with('alumni') // load alumni relation
            ->latest()
            ->paginate(10);
        // dd($contributions);
        return view('contributions.index', compact('contributions'));
    }

    public function create()
    {
        $alumni = \App\Models\Alumni::all();
        return view('contributions.create', compact('alumni'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'alumni_id'     => 'required|exists:alumni,id',
            'amount'        => 'required|numeric|min:1',
            'payment_date'  => 'required|date',
            'payment_photo' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();

        // Get alumni record (for name)
        $alumni = \App\Models\Alumni::findOrFail($request->alumni_id);

        if ($request->hasFile('payment_photo')) {
            // Sanitize alumni name for safe filename
            $safeName = preg_replace('/[^A-Za-z0-9]/', '_', strtolower($alumni->name));

            // Unique filename
            $filename = $safeName . '_' . date('Ymd_His') . '_' . rand(1000, 9999) . '.' .
                $request->file('payment_photo')->getClientOriginalExtension();

            // Store in storage/app/public/payments
            $data['payment_photo'] = $request->file('payment_photo')->storeAs('payments', $filename, 'public');
        }

        Contribution::create($data);

        return redirect()
            ->route('contributions.index')
            ->with('success', 'Contribution added successfully.');
    }


    public function edit(Contribution $contribution)
    {
        $alumni = \App\Models\Alumni::all();
        return view('contributions.edit', compact('contribution', 'alumni'));
    }

    public function update(Request $request, Contribution $contribution)
    {
        $request->validate([
            'alumni_name' => 'required|string|max:255',
            'passout_year' => 'nullable|digits:4',
            'alumni_id' => 'nullable|string|max:50',
            'amount' => 'required|numeric|min:1',
            'payment_date' => 'required|date',
            'payment_photo' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('payment_photo')) {
            $data['payment_photo'] = $request->file('payment_photo')->store('payments', 'public');
        }

        $contribution->update($data);

        return redirect()->route('contributions.index')->with('success', 'Contribution updated successfully.');
    }

    public function destroy(Contribution $contribution)
    {
        $contribution->delete();
        return redirect()->route('contributions.index')->with('success', 'Contribution deleted.');
    }
}
