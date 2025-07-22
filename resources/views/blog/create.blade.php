@extends('layouts.app')

@section('content')

<div class="container mx-auto px-4 py-6 max-w-2xl">
    <h1 class="text-2xl font-bold mb-4">Create Blog Post</h1>
    <form action="{{ route('blog.store') }}" method="POST" class="space-y-4 bg-white p-6 rounded shadow">
        @csrf
        <div>
            <label for="title" class="block font-semibold mb-1">Title</label>
            <input type="text" class="w-full border border-gray-300 rounded px-3 py-2" id="title" name="title" required>
        </div>

        <div>
            <label for="author_id" class="block font-semibold mb-1">Author (Team Member ID)</label>
            <input type="number" class="w-full border border-gray-300 rounded px-3 py-2" id="author_id" name="author_id" required>
        </div>

        <x-markdown-editor name="content" :value="old('content')" />

        <div>
            <label for="category" class="block font-semibold mb-1">Category</label>
            <input type="text" class="w-full border border-gray-300 rounded px-3 py-2" id="category" name="category" required>
        </div>

        <div>
            <label for="tags" class="block font-semibold mb-1">Tags (JSON)</label>
            <textarea class="w-full border border-gray-300 rounded px-3 py-2" id="tags" name="tags"></textarea>
        </div>

        <div>
            <label for="featured_image" class="block font-semibold mb-1">Featured Image (File Path)</label>
            <input type="text" class="w-full border border-gray-300 rounded px-3 py-2" id="featured_image" name="featured_image">
        </div>

        <div>
            <label for="status" class="block font-semibold mb-1">Status</label>
            <input type="text" class="w-full border border-gray-300 rounded px-3 py-2" id="status" name="status" value="Draft">
        </div>

        <div>
            <label for="publish_date" class="block font-semibold mb-1">Publish Date</label>
            <input type="date" class="w-full border border-gray-300 rounded px-3 py-2" id="publish_date" name="publish_date">
        </div>

        <div>
            <label for="views_count" class="block font-semibold mb-1">Views Count</label>
            <input type="number" class="w-full border border-gray-300 rounded px-3 py-2" id="views_count" name="views_count" value="0">
        </div>

        <div>
            <label for="reading_time" class="block font-semibold mb-1">Reading Time</label>
            <input type="text" class="w-full border border-gray-300 rounded px-3 py-2" id="reading_time" name="reading_time">
        </div>

        <div>
            <label for="featured" class="block font-semibold mb-1">Featured</label>
            <select class="w-full border border-gray-300 rounded px-3 py-2" id="featured" name="featured">
                <option value="0">No</option>
                <option value="1">Yes</option>
            </select>
        </div>

        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Create</button>
    </form>
</div>
@endsection