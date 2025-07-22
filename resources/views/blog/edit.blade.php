@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6 max-w-2xl">
    <h1 class="text-2xl font-bold mb-4">Edit Blog Post</h1>
    <form action="{{ route('blog.update', $post->id) }}" method="POST" class="space-y-4 bg-white p-6 rounded shadow">
        @csrf
        @method('PUT')
        <div>
            <label for="title" class="block font-semibold mb-1">Title</label>
            <input type="text" class="w-full border border-gray-300 rounded px-3 py-2" id="title" name="title" value="{{ old('title', $post->title) }}" required>
        </div>
        <div>
            <label for="author_id" class="block font-semibold mb-1">Author (Team Member ID)</label>
            <input type="number" class="w-full border border-gray-300 rounded px-3 py-2" id="author_id" name="author_id" value="{{ old('author_id', $post->author_id) }}" required>
        </div>
        <div>
            <label for="content" class="block font-semibold mb-1">Content</label>
            <textarea class="w-full border border-gray-300 rounded px-3 py-2" id="content" name="content" required>{{ old('content', $post->content) }}</textarea>
        </div>
        <div>
            <label for="category" class="block font-semibold mb-1">Category</label>
            <input type="text" class="w-full border border-gray-300 rounded px-3 py-2" id="category" name="category" value="{{ old('category', $post->category) }}" required>
        </div>
        <div>
            <label for="tags" class="block font-semibold mb-1">Tags (JSON)</label>
            <textarea class="w-full border border-gray-300 rounded px-3 py-2" id="tags" name="tags">{{ old('tags', $post->tags) }}</textarea>
        </div>
        <div>
            <label for="featured_image" class="block font-semibold mb-1">Featured Image (File Path)</label>
            <input type="text" class="w-full border border-gray-300 rounded px-3 py-2" id="featured_image" name="featured_image" value="{{ old('featured_image', $post->featured_image) }}">
        </div>
        <div>
            <label for="status" class="block font-semibold mb-1">Status</label>
            <input type="text" class="w-full border border-gray-300 rounded px-3 py-2" id="status" name="status" value="{{ old('status', $post->status) }}">
        </div>
        <div>
            <label for="publish_date" class="block font-semibold mb-1">Publish Date</label>
            <input type="date" class="w-full border border-gray-300 rounded px-3 py-2" id="publish_date" name="publish_date" value="{{ old('publish_date', $post->publish_date) }}">
        </div>
        <div>
            <label for="views_count" class="block font-semibold mb-1">Views Count</label>
            <input type="number" class="w-full border border-gray-300 rounded px-3 py-2" id="views_count" name="views_count" value="{{ old('views_count', $post->views_count) }}">
        </div>
        <div>
            <label for="reading_time" class="block font-semibold mb-1">Reading Time</label>
            <input type="text" class="w-full border border-gray-300 rounded px-3 py-2" id="reading_time" name="reading_time" value="{{ old('reading_time', $post->reading_time) }}">
        </div>
        <div>
            <label for="featured" class="block font-semibold mb-1">Featured</label>
            <select class="w-full border border-gray-300 rounded px-3 py-2" id="featured" name="featured">
                <option value="0" {{ old('featured', $post->featured) == 0 ? 'selected' : '' }}>No</option>
                <option value="1" {{ old('featured', $post->featured) == 1 ? 'selected' : '' }}>Yes</option>
            </select>
        </div>
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Update</button>
    </form>
</div>
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            new SimpleMDE({ element: document.getElementById('content') });
        });
    </script>
@endpush 