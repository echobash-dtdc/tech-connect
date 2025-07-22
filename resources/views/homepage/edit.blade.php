@extends('layouts.app')

@section('content')
<div class="container mx-auto max-w-2xl px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Edit Homepage Content</h1>
    <form action="{{ route('homepage-content.update', $homepageContent->id) }}" method="POST" class="space-y-4 bg-white p-6 rounded shadow">
        @csrf
        @method('PUT')
        <div>
            <label for="section_name" class="block font-semibold mb-1">Section Name</label>
            <input type="text" class="w-full border border-gray-300 rounded px-3 py-2" id="section_name" name="section_name" value="{{ old('section_name', $homepageContent->section_name) }}" required>
        </div>
        <div>
            <label for="content_type" class="block font-semibold mb-1">Content Type</label>
            <select class="w-full border border-gray-300 rounded px-3 py-2" id="content_type" name="content_type" required>
                <option value="Banner" {{ old('content_type', $homepageContent->content_type) == 'Banner' ? 'selected' : '' }}>Banner</option>
                <option value="Leadership Message" {{ old('content_type', $homepageContent->content_type) == 'Leadership Message' ? 'selected' : '' }}>Leadership Message</option>
                <option value="Quick Link" {{ old('content_type', $homepageContent->content_type) == 'Quick Link' ? 'selected' : '' }}>Quick Link</option>
                <option value="Highlight Card" {{ old('content_type', $homepageContent->content_type) == 'Highlight Card' ? 'selected' : '' }}>Highlight Card</option>
            </select>
        </div>
        <div>
            <label for="title" class="block font-semibold mb-1">Title</label>
            <input type="text" class="w-full border border-gray-300 rounded px-3 py-2" id="title" name="title" value="{{ old('title', $homepageContent->title) }}">
        </div>
        <div>
            <label for="content" class="block font-semibold mb-1">Content</label>
            <textarea class="w-full border border-gray-300 rounded px-3 py-2" id="content" name="content">{{ old('content', $homepageContent->content) }}</textarea>
        </div>
        <div>
            <label for="image_icon" class="block font-semibold mb-1">Image/Icon</label>
            <input type="text" class="w-full border border-gray-300 rounded px-3 py-2" id="image_icon" name="image_icon" value="{{ old('image_icon', $homepageContent->image_icon) }}">
        </div>
        <div>
            <label for="link_url" class="block font-semibold mb-1">Link URL</label>
            <input type="text" class="w-full border border-gray-300 rounded px-3 py-2" id="link_url" name="link_url" value="{{ old('link_url', $homepageContent->link_url) }}">
        </div>
        <div>
            <label for="display_order" class="block font-semibold mb-1">Display Order</label>
            <input type="number" class="w-full border border-gray-300 rounded px-3 py-2" id="display_order" name="display_order" value="{{ old('display_order', $homepageContent->display_order) }}">
        </div>
        <div>
            <label for="active" class="block font-semibold mb-1">Active</label>
            <select class="w-full border border-gray-300 rounded px-3 py-2" id="active" name="active">
                <option value="1" {{ old('active', $homepageContent->active) == 1 ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ old('active', $homepageContent->active) == 0 ? 'selected' : '' }}>No</option>
            </select>
        </div>
        <div>
            <label for="start_date" class="block font-semibold mb-1">Start Date</label>
            <input type="date" class="w-full border border-gray-300 rounded px-3 py-2" id="start_date" name="start_date" value="{{ old('start_date', $homepageContent->start_date) }}">
        </div>
        <div>
            <label for="end_date" class="block font-semibold mb-1">End Date</label>
            <input type="date" class="w-full border border-gray-300 rounded px-3 py-2" id="end_date" name="end_date" value="{{ old('end_date', $homepageContent->end_date) }}">
        </div>
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Update</button>
    </form>
</div>
@endsection 