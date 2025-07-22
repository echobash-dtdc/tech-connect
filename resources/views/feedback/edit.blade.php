@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6 max-w-2xl">
    <h1 class="text-2xl font-bold mb-4">Edit Feedback</h1>
    <form action="{{ route('feedback.update', $feedback->id) }}" method="POST" class="space-y-4 bg-white p-6 rounded shadow">
        @csrf
        @method('PUT')
        <div>
            <label for="subject" class="block font-semibold mb-1">Subject</label>
            <input type="text" class="w-full border border-gray-300 rounded px-3 py-2" id="subject" name="subject" value="{{ old('subject', $feedback->subject) }}" required>
        </div>
        <div>
            <label for="submitted_by" class="block font-semibold mb-1">Submitted By (Team Member ID)</label>
            <input type="number" class="w-full border border-gray-300 rounded px-3 py-2" id="submitted_by" name="submitted_by" value="{{ old('submitted_by', $feedback->submitted_by) }}">
        </div>
        <div>
            <label for="type" class="block font-semibold mb-1">Type</label>
            <select class="w-full border border-gray-300 rounded px-3 py-2" id="type" name="type" required>
                <option value="Feedback" {{ old('type', $feedback->type) == 'Feedback' ? 'selected' : '' }}>Feedback</option>
                <option value="Bug Report" {{ old('type', $feedback->type) == 'Bug Report' ? 'selected' : '' }}>Bug Report</option>
                <option value="Feature Request" {{ old('type', $feedback->type) == 'Feature Request' ? 'selected' : '' }}>Feature Request</option>
                <option value="Content Suggestion" {{ old('type', $feedback->type) == 'Content Suggestion' ? 'selected' : '' }}>Content Suggestion</option>
            </select>
        </div>
        <div>
            <label for="description" class="block font-semibold mb-1">Description</label>
            <textarea class="w-full border border-gray-300 rounded px-3 py-2" id="description" name="description" required>{{ old('description', $feedback->description) }}</textarea>
        </div>
        <div>
            <label for="priority" class="block font-semibold mb-1">Priority</label>
            <select class="w-full border border-gray-300 rounded px-3 py-2" id="priority" name="priority" required>
                <option value="High" {{ old('priority', $feedback->priority) == 'High' ? 'selected' : '' }}>High</option>
                <option value="Medium" {{ old('priority', $feedback->priority) == 'Medium' ? 'selected' : '' }}>Medium</option>
                <option value="Low" {{ old('priority', $feedback->priority) == 'Low' ? 'selected' : '' }}>Low</option>
            </select>
        </div>
        <div>
            <label for="status" class="block font-semibold mb-1">Status</label>
            <select class="w-full border border-gray-300 rounded px-3 py-2" id="status" name="status" required>
                <option value="New" {{ old('status', $feedback->status) == 'New' ? 'selected' : '' }}>New</option>
                <option value="In Review" {{ old('status', $feedback->status) == 'In Review' ? 'selected' : '' }}>In Review</option>
                <option value="Resolved" {{ old('status', $feedback->status) == 'Resolved' ? 'selected' : '' }}>Resolved</option>
                <option value="Closed" {{ old('status', $feedback->status) == 'Closed' ? 'selected' : '' }}>Closed</option>
            </select>
        </div>
        <div>
            <label for="assigned_to" class="block font-semibold mb-1">Assigned To (Team Member ID)</label>
            <input type="number" class="w-full border border-gray-300 rounded px-3 py-2" id="assigned_to" name="assigned_to" value="{{ old('assigned_to', $feedback->assigned_to) }}">
        </div>
        <div>
            <label for="response" class="block font-semibold mb-1">Response</label>
            <textarea class="w-full border border-gray-300 rounded px-3 py-2" id="response" name="response">{{ old('response', $feedback->response) }}</textarea>
        </div>
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Update</button>
    </form>
</div>
@endsection 