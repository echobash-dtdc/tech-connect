@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-4">Blog Posts</h1>
    <a href="{{ route('blog.create') }}" class="inline-block mb-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Create Blog Post</a>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded shadow">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border-b">ID</th>
                    <th class="px-4 py-2 border-b">Title</th>
                    <th class="px-4 py-2 border-b">Author</th>
                    <th class="px-4 py-2 border-b">Status</th>
                    <th class="px-4 py-2 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 border-b">{{ $post->id }}</td>
                        <td class="px-4 py-2 border-b">{{ $post->title }}</td>
                        <td class="px-4 py-2 border-b">{{ $post->author_id }}</td>
                        <td class="px-4 py-2 border-b">{{ $post->status }}</td>
                        <td class="px-4 py-2 border-b space-x-2">
                            <a href="{{ route('blog.show', $post->id) }}" class="inline-block px-3 py-1 bg-gray-200 text-gray-800 rounded hover:bg-gray-300">View</a>
                            <a href="{{ route('blog.edit', $post->id) }}" class="inline-block px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-700">Edit</a>
                            <form action="{{ route('blog.destroy', $post->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-block px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection 