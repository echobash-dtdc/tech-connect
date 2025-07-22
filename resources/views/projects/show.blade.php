@extends('layouts.app')

@section('content')
    <div class="container mx-auto max-w-4xl">
        <h1 class="text-2xl font-bold mb-4">{{ $project->project_name }}</h1>

        <p><strong>Description:</strong> {{ $project->description }}</p>
        <p><strong>Status:</strong> {{ $project->status }}</p>
        <p><strong>Domain:</strong> {{ $project->domain }}</p>
        <p><strong>Start Date:</strong> {{ $project->start_date }}</p>
        <p><strong>End Date:</strong> {{ $project->end_date }}</p>

        <!-- Add other fields as necessary -->

        <a href="{{ route('projects.edit', $project) }}" class="text-green-500">Edit</a>
    </div>
@endsection