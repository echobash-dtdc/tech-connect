@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-4">Edit Resource</h1>
    <form action="{{ route('resources.update', $resource->id) }}" method="POST" class="space-y-4 bg-white p-6 rounded shadow">
        @csrf
        @method('PUT')
        <div>
            <label for="resource_name" class="block font-semibold mb-1">Resource Name</label>
            <input type="text" class="w-full border border-gray-300 rounded px-3 py-2" id="resource_name" name="resource_name" value="{{ old('resource_name', $resource->resource_name) }}" required>
        </div>
        <div>
            <label for="type" class="block font-semibold mb-1">Type</label>
            <input type="text" class="w-full border border-gray-300 rounded px-3 py-2" id="type" name="type" value="{{ old('type', $resource->type) }}" required>
        </div>
        <x-markdown-editor name="description" :value="old('description', $resource->description)" />
        <div>
            <label for="url" class="block font-semibold mb-1">URL</label>
            <input type="text" class="w-full border border-gray-300 rounded px-3 py-2" id="url" name="url" value="{{ old('url', $resource->url) }}">
        </div>
        <x-markdown-editor name="access_instructions" :value="old('access_instructions', $resource->access_instructions)" />
        <div>
            <label for="owner_team_id" class="block font-semibold mb-1">Owner Team (Team Member ID)</label>
            <input type="number" class="w-full border border-gray-300 rounded px-3 py-2" id="owner_team_id" name="owner_team_id" value="{{ old('owner_team_id', $resource->owner_team_id) }}">
        </div>
        <div>
            <label for="category" class="block font-semibold mb-1">Category (JSON)</label>
            <textarea class="w-full border border-gray-300 rounded px-3 py-2" id="category" name="category">{{ old('category', $resource->category) }}</textarea>
        </div>
        <div>
            <label for="documentation" class="block font-semibold mb-1">Documentation (File Path)</label>
            <input type="text" class="w-full border border-gray-300 rounded px-3 py-2" id="documentation" name="documentation" value="{{ old('documentation', $resource->documentation) }}">
        </div>
        <div>
            <label for="access_level" class="block font-semibold mb-1">Access Level</label>
            <input type="text" class="w-full border border-gray-300 rounded px-3 py-2" id="access_level" name="access_level" value="{{ old('access_level', $resource->access_level) }}">
        </div>
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Update</button>
    </form>
</div>
@endsection 