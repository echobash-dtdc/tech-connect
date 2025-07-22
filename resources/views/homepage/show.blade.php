@extends('layouts.app')

@section('content')
<div class="container mx-auto py-10">
    <div class="bg-white p-12 rounded-2xl shadow-xl flex flex-col items-center text-center max-w-5xl mx-auto">
        <h1 class="text-4xl font-extrabold mb-6 text-gray-800">{{ $homepageContent->title }}</h1>

        <div class="flex flex-wrap justify-center gap-4 mb-6">
            <span class="inline-block px-4 py-2 bg-blue-100 text-blue-800 rounded-full text-sm font-semibold">
                Section Name: {{ $homepageContent->section_name }}
            </span>
            <span class="inline-block px-4 py-2 bg-gray-100 text-gray-800 rounded-full text-sm font-semibold">
                Active: {{ $homepageContent->active }}
            </span>
        </div>

        <div class="mb-8 text-left w-full max-w-4xl mx-auto">
            <h2 class="block font-semibold text-gray-700 mb-2 text-lg">Content:</h2>
            <article class="prose prose-lg max-w-none text-left mx-auto text-gray-900 dark:prose-invert">
                {!! \Illuminate\Support\Str::markdown($homepageContent->content) !!}
            </article>
            <div class="mt-4 text-xs text-gray-400">(Markdown formatted)</div>
        </div>

        <a href="{{ route('blog.index') }}" class="mt-8 inline-block px-8 py-3 rounded-lg bg-blue-600 text-white font-semibold shadow hover:bg-blue-700 transition">
            ← Back to Homepage List
        </a>
    </div>
</div>
@endsection