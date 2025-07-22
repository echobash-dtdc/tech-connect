@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-4">Create Project</h1>
    <form action="{{ route('projects.store') }}" method="POST" class="space-y-4 bg-white p-6 rounded shadow">
        @csrf
        <div>
            <label for="resource_name" class="block font-semibold mb-1">Project Name</label>
            <input type="text" class="w-full border border-gray-300 rounded px-3 py-2" id="project_name" name="project_name" required>
        </div>
        <div>
            <label for="type" class="block font-semibold mb-1">Status</label>
            <input type="text" class="w-full border border-gray-300 rounded px-3 py-2" id="status" name="status" required>
        </div>
        <x-markdown-editor name="description" :value="old('description')" />
        <div>
            <label for="url" class="block font-semibold mb-1">Domain</label>
            <input type="text" class="w-full border border-gray-300 rounded px-3 py-2" id="domain" name="domain">
        </div>
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Create</button>
    </form>
</div>
@endsection 