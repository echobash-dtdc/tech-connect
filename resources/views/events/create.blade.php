@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-4">Create Event</h1>
    <form action="{{ route('events.store') }}" method="POST" class="space-y-4 bg-white p-6 rounded shadow">
        @csrf
        <div>
            <label for="event_name" class="block font-semibold mb-1">Event Name</label>
            <input type="text" class="w-full border border-gray-300 rounded px-3 py-2" id="event_name" name="event_name" required>
        </div>
        <div>
            <label for="type" class="block font-semibold mb-1">Type</label>
            <select class="w-full border border-gray-300 rounded px-3 py-2" id="type" name="type" required>
                <option value="Tech Meetup">Tech Meetup</option>
                <option value="Town Hall">Town Hall</option>
                <option value="Training">Training</option>
                <option value="Hackathon">Hackathon</option>
                <option value="Release">Release</option>
            </select>
        </div>
        <x-markdown-editor name="description" :value="old('description')" />
        <div>
            <label for="date_time" class="block font-semibold mb-1">Date & Time</label>
            <input type="datetime-local" class="w-full border border-gray-300 rounded px-3 py-2" id="date_time" name="date_time" required>
        </div>
        <div>
            <label for="duration" class="block font-semibold mb-1">Duration (minutes)</label>
            <input type="number" class="w-full border border-gray-300 rounded px-3 py-2" id="duration" name="duration">
        </div>
        <div>
            <label for="location_link" class="block font-semibold mb-1">Location Link</label>
            <input type="text" class="w-full border border-gray-300 rounded px-3 py-2" id="location_link" name="location_link">
        </div>
        <div>
            <label for="organizer_id" class="block font-semibold mb-1">Organizer (Team Member ID)</label>
            <input type="number" class="w-full border border-gray-300 rounded px-3 py-2" id="organizer_id" name="organizer_id" required>
        </div>
        <div>
            <label for="target_audience" class="block font-semibold mb-1">Target Audience (JSON)</label>
            <textarea class="w-full border border-gray-300 rounded px-3 py-2" id="target_audience" name="target_audience"></textarea>
        </div>
        <div>
            <label for="registration_link" class="block font-semibold mb-1">Registration Link</label>
            <input type="text" class="w-full border border-gray-300 rounded px-3 py-2" id="registration_link" name="registration_link">
        </div>
        <div>
            <label for="materials" class="block font-semibold mb-1">Materials</label>
            <input type="text" class="w-full border border-gray-300 rounded px-3 py-2" id="materials" name="materials">
        </div>
        <div>
            <label for="status" class="block font-semibold mb-1">Status</label>
            <select class="w-full border border-gray-300 rounded px-3 py-2" id="status" name="status" required>
                <option value="Upcoming">Upcoming</option>
                <option value="Ongoing">Ongoing</option>
                <option value="Completed">Completed</option>
                <option value="Cancelled">Cancelled</option>
            </select>
        </div>
        <div>
            <label for="attendee_limit" class="block font-semibold mb-1">Attendee Limit</label>
            <input type="number" class="w-full border border-gray-300 rounded px-3 py-2" id="attendee_limit" name="attendee_limit">
        </div>
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Create</button>
    </form>
</div>
@endsection 