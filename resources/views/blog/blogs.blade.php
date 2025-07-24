@extends('layouts.app')

@section('content')
@php use Illuminate\Support\Str; @endphp
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-4">Blog Postsasdfs</h1>
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
                @if(isset($blogs['results']))
                    @foreach ($blogs['results'] as $blog)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2 border-b">{{ $blog['id'] ?? '' }}</td>
                            <td class="px-4 py-2 border-b">{{ $blog['Title'] ?? '' }}</td>
                            <td class="px-4 py-2 border-b">
                                <div class="prose max-w-none">{!! Str::markdown($blog['Content'], [
    'html_input' => 'allow', // allow raw HTML
    'allow_unsafe_links' => true, // allow http/https links
]) !!}</div>
                            </td>
                            <td class="px-4 py-2 border-b">--</td>
                        </tr>
                    @endforeach
                @else
                    <tr><td colspan="5" class="text-center py-4">No blogs found.</td></tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection 