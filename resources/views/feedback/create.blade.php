@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6 max-w-2xl">
    <h1 class="text-2xl font-bold mb-4">Submit Feedback</h1>
    <form action="{{ route('feedback.store') }}" method="POST" class="space-y-4 bg-white p-6 rounded shadow">
        @csrf
        <div>
            <label for="subject" class="block font-semibold mb-1">Subject</label>
            <input type="text" class="w-full border border-gray-300 rounded px-3 py-2" id="subject" name="subject" required>
        </div>
        <div>
            <label for="submitted_by" class="block font-semibold mb-1">Submitted By (Team Member ID)</label>
            <input type="number" class="w-full border border-gray-300 rounded px-3 py-2" id="submitted_by" name="submitted_by">
        </div>
        <div>
            <label for="type" class="block font-semibold mb-1">Type</label>
            <select class="w-full border border-gray-300 rounded px-3 py-2" id="type" name="type" required>
                <option value="Feedback">Feedback</option>
                <option value="Bug Report">Bug Report</option>
                <option value="Feature Request">Feature Request</option>
                <option value="Content Suggestion">Content Suggestion</option>
            </select>
        </div>
        <div>
            <label for="description" class="block font-semibold mb-1">Description</label>
            <textarea class="w-full border border-gray-300 rounded px-3 py-2" id="description" name="description" required></textarea>
        </div>
        <div>
            <label for="priority" class="block font-semibold mb-1">Priority</label>
            <select class="w-full border border-gray-300 rounded px-3 py-2" id="priority" name="priority" required>
                <option value="High">High</option>
                <option value="Medium">Medium</option>
                <option value="Low">Low</option>
            </select>
        </div>
        <div>
            <label for="status" class="block font-semibold mb-1">Status</label>
            <select class="w-full border border-gray-300 rounded px-3 py-2" id="status" name="status" required>
                <option value="New">New</option>
                <option value="In Review">In Review</option>
                <option value="Resolved">Resolved</option>
                <option value="Closed">Closed</option>
            </select>
        </div>
        <div>
            <label for="assigned_to" class="block font-semibold mb-1">Assigned To (Team Member ID)</label>
            <input type="number" class="w-full border border-gray-300 rounded px-3 py-2" id="assigned_to" name="assigned_to">
        </div>
        <div>
            <label for="response" class="block font-semibold mb-1">Response</label>
            <textarea class="w-full border border-gray-300 rounded px-3 py-2" id="response" name="response"></textarea>
        </div>
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Submit</button>
    </form>
</div>
@endsection 