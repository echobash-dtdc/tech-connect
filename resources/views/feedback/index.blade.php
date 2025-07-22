@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-4">Feedback</h1>
    <a href="{{ route('feedback.create') }}" class="inline-block mb-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Submit Feedback</a>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded shadow">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border-b">ID</th>
                    <th class="px-4 py-2 border-b">Subject</th>
                    <th class="px-4 py-2 border-b">Type</th>
                    <th class="px-4 py-2 border-b">Priority</th>
                    <th class="px-4 py-2 border-b">Status</th>
                    <th class="px-4 py-2 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($feedbacks as $feedback)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 border-b">{{ $feedback->id }}</td>
                        <td class="px-4 py-2 border-b">{{ $feedback->subject }}</td>
                        <td class="px-4 py-2 border-b">{{ $feedback->type }}</td>
                        <td class="px-4 py-2 border-b">{{ $feedback->priority }}</td>
                        <td class="px-4 py-2 border-b">{{ $feedback->status }}</td>
                        <td class="px-4 py-2 border-b space-x-2">
                            <a href="{{ route('feedback.show', $feedback->id) }}" class="inline-block px-3 py-1 bg-gray-200 text-gray-800 rounded hover:bg-gray-300">View</a>
                            <a href="{{ route('feedback.edit', $feedback->id) }}" class="inline-block px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-700">Edit</a>
                            <form action="{{ route('feedback.destroy', $feedback->id) }}" method="POST" class="inline">
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