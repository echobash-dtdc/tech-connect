<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('date_time')->get();
        return view('events.index', compact('events'));
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('events.show', compact('event'));
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'event_name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date_time' => 'required|date',
            'duration' => 'nullable|integer',
            'location_link' => 'nullable|string|max:255',
            'organizer_id' => 'required|integer',
            'target_audience' => 'nullable|string',
            'registration_link' => 'nullable|string|max:255',
            'materials' => 'nullable|string|max:255',
            'status' => 'required|string|max:255',
            'attendee_limit' => 'nullable|integer',
        ]);
        Event::create($validated);
        return redirect()->route('events.index')->with('success', 'Event created successfully.');
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('events.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'event_name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date_time' => 'required|date',
            'duration' => 'nullable|integer',
            'location_link' => 'nullable|string|max:255',
            'organizer_id' => 'required|integer',
            'target_audience' => 'nullable|string',
            'registration_link' => 'nullable|string|max:255',
            'materials' => 'nullable|string|max:255',
            'status' => 'required|string|max:255',
            'attendee_limit' => 'nullable|integer',
        ]);
        $event = Event::findOrFail($id);
        $event->update($validated);
        return redirect()->route('events.index')->with('success', 'Event updated successfully.');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
        return redirect()->route('events.index')->with('success', 'Event deleted successfully.');
    }
}