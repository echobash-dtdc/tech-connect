@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Submit Innovation Idea</h1>
    <form action="{{ route('innovation.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="idea_title" class="form-label">Idea Title</label>
            <input type="text" class="form-control" id="idea_title" name="idea_title" required>
        </div>
        <div class="mb-3">
            <label for="submitted_by" class="form-label">Submitted By (Team Member ID)</label>
            <input type="number" class="form-control" id="submitted_by" name="submitted_by" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" required></textarea>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select class="form-control" id="category" name="category" required>
                <option value="Hackathon">Hackathon</option>
                <option value="POC">POC</option>
                <option value="Pilot">Pilot</option>
                <option value="Innovation">Innovation</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-control" id="status" name="status" required>
                <option value="Submitted">Submitted</option>
                <option value="Under Review">Under Review</option>
                <option value="Approved">Approved</option>
                <option value="In Progress">In Progress</option>
                <option value="Completed">Completed</option>
                <option value="Rejected">Rejected</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="business_impact" class="form-label">Business Impact</label>
            <textarea class="form-control" id="business_impact" name="business_impact"></textarea>
        </div>
        <div class="mb-3">
            <label for="technical_feasibility" class="form-label">Technical Feasibility (1-5)</label>
            <input type="number" class="form-control" id="technical_feasibility" name="technical_feasibility" min="1" max="5">
        </div>
        <div class="mb-3">
            <label for="priority_score" class="form-label">Priority Score</label>
            <input type="number" class="form-control" id="priority_score" name="priority_score">
        </div>
        <div class="mb-3">
            <label for="assigned_to" class="form-label">Assigned To (Team Member ID)</label>
            <input type="number" class="form-control" id="assigned_to" name="assigned_to">
        </div>
        <div class="mb-3">
            <label for="comments" class="form-label">Comments</label>
            <textarea class="form-control" id="comments" name="comments"></textarea>
        </div>
        <div class="mb-3">
            <label for="attachments" class="form-label">Attachments (File Path)</label>
            <input type="text" class="form-control" id="attachments" name="attachments">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection 