@extends('layouts.app')

@section('content')
    <div class="container mx-auto max-w-4xl">
        <h1 class="text-2xl font-bold mb-4">Create Project</h1>
        <form method="POST" action="{{ route('projects.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-bold mb-2">Project Name</label>
                <input type="text" name="project_name" class="w-full border rounded px-3 py-2" required>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-bold mb-2">Description</label>
                <textarea name="description" rows="4" class="w-full border rounded px-3 py-2"></textarea>
            </div>

            <!-- Additional fields as needed -->

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Create</button>
        </form>
    </div>
@endsection