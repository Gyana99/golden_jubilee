<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::latest()->paginate(10);
        return view('events.index', compact('events'));
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'heading'        => 'required|string|max:255',
            'about'          => 'nullable|string',
            'start_datetime' => 'required|date',
            'end_datetime'   => 'nullable|date|after_or_equal:start_datetime',
            'location'       => 'nullable|string|max:255',
        ]);

        Event::create($request->all());
        return redirect()->route('events.index')->with('success', 'Event created successfully.');
    }

    public function show(Event $event)
    {
        return view('events.show', compact('event'));
    }

    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $request->validate([
            'heading'        => 'required|string|max:255',
            'about'          => 'nullable|string',
            'start_datetime' => 'required|date',
            'end_datetime'   => 'nullable|date|after_or_equal:start_datetime',
            'location'       => 'nullable|string|max:255',
        ]);

        $event->update($request->all());
        return redirect()->route('events.index')->with('success', 'Event updated successfully.');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('events.index')->with('success', 'Event deleted successfully.');
    }
    public function getDataForView()
    {
        $events = \App\Models\Event::orderBy('start_datetime', 'desc')->get();
        $now = now();

        $completed = $events->filter(fn($e) => $e->end_datetime < $now);
        $ongoing   = $events->filter(fn($e) => $e->start_datetime <= $now && $e->end_datetime >= $now);
        $upcoming  = $events->filter(fn($e) => $e->start_datetime > $now);

        return view('website.event-details', compact('completed', 'ongoing', 'upcoming'));
    }
    public function cancel($id, $status)
    {
        if ($status == 1) {
            DB::table('events')
                ->where('id', $id)
                ->update([
                    'cancelled' => 1
                ]);
        }else if($status == 2){
             DB::table('events')
                ->where('id', $id)
                ->update([
                    'cancelled' => 0
                ]);
        }
        return redirect('/events');
    }
}
