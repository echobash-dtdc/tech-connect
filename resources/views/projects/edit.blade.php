@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-4">Edit Resource</h1>
    <form action="{{ route('projects.update', $project->id) }}" method="POST" class="space-y-4 bg-white p-6 rounded shadow">
        @csrf
        @method('PUT')
        <div>
            <label for="project_name" class="block font-semibold mb-1">Project Name</label>
            <input type="text" class="w-full border border-gray-300 rounded px-3 py-2" id="project_name" name="project_name" value="{{ old('project_name', $project->project_name) }}" required>
        </div>
        <div>
            <label for="type" class="block font-semibold mb-1">Status</label>
            <input type="text" class="w-full border border-gray-300 rounded px-3 py-2" id="status" name="status" value="{{ old('status', $project->status) }}" required>
        </div>
        <x-markdown-editor name="description" :value="old('description', $project->description)" />
        <div>
            <label for="url" class="block font-semibold mb-1">Domain</label>
            <input type="text" class="w-full border border-gray-300 rounded px-3 py-2" id="url" name="url" value="{{ old('domain', $project->domain) }}">
        </div>
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Update</button>
    </form>
</div>
@endsection 