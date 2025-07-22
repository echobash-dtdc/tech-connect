@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-4">Events</h1>
    <a href="{{ route('events.create') }}" class="inline-block mb-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Add Event</a>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded shadow">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border-b">ID</th>
                    <th class="px-4 py-2 border-b">Name</th>
                    <th class="px-4 py-2 border-b">Type</th>
                    <th class="px-4 py-2 border-b">Date & Time</th>
                    <th class="px-4 py-2 border-b">Status</th>
                    <th class="px-4 py-2 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 border-b">{{ $event->id }}</td>
                        <td class="px-4 py-2 border-b">{{ $event->event_name }}</td>
                        <td class="px-4 py-2 border-b">{{ $event->type }}</td>
                        <td class="px-4 py-2 border-b">{{ $event->date_time }}</td>
                        <td class="px-4 py-2 border-b">{{ $event->status }}</td>
                        <td class="px-4 py-2 border-b space-x-2">
                            <a href="{{ route('events.show', $event->id) }}" class="inline-block px-3 py-1 bg-gray-200 text-gray-800 rounded hover:bg-gray-300">View</a>
                            <a href="{{ route('events.edit', $event->id) }}" class="inline-block px-3 py-1 bg-yellow-400 text-white rounded hover:bg-yellow-500">Edit</a>
                            <form action="{{ route('events.destroy', $event->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-block px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection 