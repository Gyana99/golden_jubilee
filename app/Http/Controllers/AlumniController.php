<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;


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

    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'name'         => 'required|string|max:255',
            'email'        => 'nullable|email|unique:alumni,email', // optional but unique if entered
            'phone'        => 'nullable|string|max:20',             // optional phone
            'passout_year' => 'nullable|integer',
            'photo'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->except('photo');
        //dd($data);
        // Handle photo upload
        if ($request->hasFile('photo')) {
            $extension = $request->file('photo')->getClientOriginalExtension();
            $filename = strtolower(str_replace(' ', '_', $request->name))
                . '_' . rand(1000, 9999)
                . '_' . now()->format('YmdHis')
                . '.' . $extension;

            $request->file('photo')->storeAs('public/alumniphoto', $filename);
            $data['photo'] = $filename;
        }

        // Create new alumni record
        $alumni = Alumni::create($data);

        return redirect()
            ->route('alumni.index')
            ->with('success', 'Alumnus saved successfully.');
    }


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
    public function update(Request $request, Alumni $alumni)
    {
        $request->validate([
            'name'         => 'required|string|max:255',
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
    public function storeByUser(Request $request, Alumni $alumni)
    {
        if ($request->isMethod('POST')) {
            // Validation
            $request->validate([
                'name'         => 'required|string|max:255',
                'email'        => 'nullable|email|unique:alumni,email', // optional but unique if entered
                'phone'        => 'nullable|string|max:20',             // optional phone
                'passout_year' => 'required|integer',
                'photo'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            ]);

            $data = $request->except('photo');
            // dd();
            // Handle photo upload
            if ($request->hasFile('photo')) {
                $extension = $request->file('photo')->getClientOriginalExtension();
                $filename = strtolower(str_replace(' ', '_', $request->name))
                    . '_' . rand(1000, 9999)
                    . '_' . now()->format('YmdHis')
                    . '.' . $extension;

                $request->file('photo')->storeAs('public/alumniphoto', $filename);
                $data['photo'] = $filename;
            }

            // 1️⃣ Create the alumni record
            $alumni = Alumni::create($data);

            // 2️⃣ Generate the Alumni ID (UGBN + auto-increment ID)
            $alumniId = 'UGBN' . $alumni->id;

            // 3️⃣ Update the record with the generated Alumni ID
            $alumni->update(['alumni_id' => $alumniId]);
            $details = [
                'name' => $data['name'],       // dynamically from registration form
                'subject' => 'Registration Successful',
                'emailid' => $data['email'] ,   // user email
                'alumniId' => $alumniId
            ];

            try {
                Mail::send('emails.test', ['details' => $details], function ($message) use ($details) {
                    $message->to($details['emailid'])          // use 'emailid' key
                        ->subject($details['subject']);    // dynamic subject
                });

                // return "✅ Mail sent successfully!";
            } catch (\Exception $e) {
                // Log the error in database
                $error = [
                    'mailid' => $data['email'],
                    'page' => 'user registration',
                    'error' => $e->getMessage(),
                    'created_at' => now(),  // make sure your table has created_at column
                    'updated_at' => now()
                ];

                DB::table('maillog')->insert($error);

                // return "❌ Mail sending failed: " . $e->getMessage();
            }

            return  redirect('alumni-registration');
        }

        return view('website.alumniregistration');
    }
    /**
     * Approve or Reject the specified alumnus.
     */
    public function approve($id)
    {
        // dd($id);
        try {
            $alumni = Alumni::find($id);
            //dd($alumni->update(['status' => 1]));
            if ($alumni->status == 0) {
                // Pending → Approve
                $alumni->update(['status' => 1]);

                //DB::table('alumni')->where('id',$id)->update(['status'=>1]);
                $message = 'Alumni approved successfully.';
            } else {
                // Approved → Reject
                //DB::table('alumni')->where('id',$id)->update(['status'=>0]);
                $alumni->update(['status' => 0]);
                $message = 'Alumni marked as not approved.';
            }

            return redirect()->back()->with('success', $message);
        } catch (\Exception $e) {
            // Log the error if needed
            //Log::error('Alumni approval error: ' . $e->getMessage());
            dd($e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }
    }
}
