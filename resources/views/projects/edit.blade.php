@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Project</h1>
    <form action="{{ route('projects.update', $project->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="project_name" class="form-label">Project Name</label>
            <input type="text" class="form-control" id="project_name" name="project_name" value="{{ old('project_name', $project->project_name) }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description">{{ old('description', $project->description) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-control" id="status" name="status" required>
                <option value="Planning" {{ old('status', $project->status) == 'Planning' ? 'selected' : '' }}>Planning</option>
                <option value="In Progress" {{ old('status', $project->status) == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                <option value="Completed" {{ old('status', $project->status) == 'Completed' ? 'selected' : '' }}>Completed</option>
                <option value="On Hold" {{ old('status', $project->status) == 'On Hold' ? 'selected' : '' }}>On Hold</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="domain" class="form-label">Domain</label>
            <select class="form-control" id="domain" name="domain" required>
                <option value="Infrastructure" {{ old('domain', $project->domain) == 'Infrastructure' ? 'selected' : '' }}>Infrastructure</option>
                <option value="Security" {{ old('domain', $project->domain) == 'Security' ? 'selected' : '' }}>Security</option>
                <option value="Data" {{ old('domain', $project->domain) == 'Data' ? 'selected' : '' }}>Data</option>
                <option value="Frontend" {{ old('domain', $project->domain) == 'Frontend' ? 'selected' : '' }}>Frontend</option>
                <option value="Backend" {{ old('domain', $project->domain) == 'Backend' ? 'selected' : '' }}>Backend</option>
                <option value="DevOps" {{ old('domain', $project->domain) == 'DevOps' ? 'selected' : '' }}>DevOps</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="start_date" class="form-label">Start Date</label>
            <input type="date" class="form-control" id="start_date" name="start_date" value="{{ old('start_date', $project->start_date) }}">
        </div>
        <div class="mb-3">
            <label for="end_date" class="form-label">End Date</label>
            <input type="date" class="form-control" id="end_date" name="end_date" value="{{ old('end_date', $project->end_date) }}">
        </div>
        <div class="mb-3">
            <label for="project_lead_id" class="form-label">Project Lead (Team Member ID)</label>
            <input type="number" class="form-control" id="project_lead_id" name="project_lead_id" value="{{ old('project_lead_id', $project->project_lead_id) }}">
        </div>
        <div class="mb-3">
            <label for="team_members" class="form-label">Team Members (JSON)</label>
            <textarea class="form-control" id="team_members" name="team_members">{{ old('team_members', $project->team_members) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="technologies_used" class="form-label">Technologies Used (JSON)</label>
            <textarea class="form-control" id="technologies_used" name="technologies_used">{{ old('technologies_used', $project->technologies_used) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="architecture_diagram" class="form-label">Architecture Diagram (File Path)</label>
            <input type="text" class="form-control" id="architecture_diagram" name="architecture_diagram" value="{{ old('architecture_diagram', $project->architecture_diagram) }}">
        </div>
        <div class="mb-3">
            <label for="case_study" class="form-label">Case Study</label>
            <textarea class="form-control" id="case_study" name="case_study">{{ old('case_study', $project->case_study) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="outcomes_impact" class="form-label">Outcomes/Impact</label>
            <textarea class="form-control" id="outcomes_impact" name="outcomes_impact">{{ old('outcomes_impact', $project->outcomes_impact) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="priority" class="form-label">Priority</label>
            <select class="form-control" id="priority" name="priority">
                <option value="High" {{ old('priority', $project->priority) == 'High' ? 'selected' : '' }}>High</option>
                <option value="Medium" {{ old('priority', $project->priority) == 'Medium' ? 'selected' : '' }}>Medium</option>
                <option value="Low" {{ old('priority', $project->priority) == 'Low' ? 'selected' : '' }}>Low</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="visibility" class="form-label">Visibility</label>
            <select class="form-control" id="visibility" name="visibility">
                <option value="1" {{ old('visibility', $project->visibility) == 1 ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ old('visibility', $project->visibility) == 0 ? 'selected' : '' }}>No</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="tags" class="form-label">Tags (JSON)</label>
            <textarea class="form-control" id="tags" name="tags">{{ old('tags', $project->tags) }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection