@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Innovation Idea</h1>
    <form action="{{ route('innovation.update', $idea->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="idea_title" class="form-label">Idea Title</label>
            <input type="text" class="form-control" id="idea_title" name="idea_title" value="{{ old('idea_title', $idea->idea_title) }}" required>
        </div>
        <div class="mb-3">
            <label for="submitted_by" class="form-label">Submitted By (Team Member ID)</label>
            <input type="number" class="form-control" id="submitted_by" name="submitted_by" value="{{ old('submitted_by', $idea->submitted_by) }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" required>{{ old('description', $idea->description) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select class="form-control" id="category" name="category" required>
                <option value="Hackathon" {{ old('category', $idea->category) == 'Hackathon' ? 'selected' : '' }}>Hackathon</option>
                <option value="POC" {{ old('category', $idea->category) == 'POC' ? 'selected' : '' }}>POC</option>
                <option value="Pilot" {{ old('category', $idea->category) == 'Pilot' ? 'selected' : '' }}>Pilot</option>
                <option value="Innovation" {{ old('category', $idea->category) == 'Innovation' ? 'selected' : '' }}>Innovation</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-control" id="status" name="status" required>
                <option value="Submitted" {{ old('status', $idea->status) == 'Submitted' ? 'selected' : '' }}>Submitted</option>
                <option value="Under Review" {{ old('status', $idea->status) == 'Under Review' ? 'selected' : '' }}>Under Review</option>
                <option value="Approved" {{ old('status', $idea->status) == 'Approved' ? 'selected' : '' }}>Approved</option>
                <option value="In Progress" {{ old('status', $idea->status) == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                <option value="Completed" {{ old('status', $idea->status) == 'Completed' ? 'selected' : '' }}>Completed</option>
                <option value="Rejected" {{ old('status', $idea->status) == 'Rejected' ? 'selected' : '' }}>Rejected</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="business_impact" class="form-label">Business Impact</label>
            <textarea class="form-control" id="business_impact" name="business_impact">{{ old('business_impact', $idea->business_impact) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="technical_feasibility" class="form-label">Technical Feasibility (1-5)</label>
            <input type="number" class="form-control" id="technical_feasibility" name="technical_feasibility" min="1" max="5" value="{{ old('technical_feasibility', $idea->technical_feasibility) }}">
        </div>
        <div class="mb-3">
            <label for="priority_score" class="form-label">Priority Score</label>
            <input type="number" class="form-control" id="priority_score" name="priority_score" value="{{ old('priority_score', $idea->priority_score) }}">
        </div>
        <div class="mb-3">
            <label for="assigned_to" class="form-label">Assigned To (Team Member ID)</label>
            <input type="number" class="form-control" id="assigned_to" name="assigned_to" value="{{ old('assigned_to', $idea->assigned_to) }}">
        </div>
        <div class="mb-3">
            <label for="comments" class="form-label">Comments</label>
            <textarea class="form-control" id="comments" name="comments">{{ old('comments', $idea->comments) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="attachments" class="form-label">Attachments (File Path)</label>
            <input type="text" class="form-control" id="attachments" name="attachments" value="{{ old('attachments', $idea->attachments) }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection 