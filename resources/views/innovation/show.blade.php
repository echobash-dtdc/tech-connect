@extends('layouts.app')

@section('content')
    <div class="container mx-auto max-w-4xl">
        <h1 class="text-2xl font-bold mb-4">{{ $idea->idea_title }}</h1>
        <p><strong>Category:</strong> {{ $idea->category }}</p>
        <p><strong>Status:</strong> {{ $idea->status }}</p>
        <p><strong>Description:</strong> {{ $idea->description }}</p>
        <p><strong>Business Impact:</strong> {{ $idea->business_impact }}</p>
        <p><strong>Technical Feasibility:</strong> {{ $idea->technical_feasibility }}</p>
        <p><strong>Comments:</strong> {{ $idea->comments }}</p>
        <a href="{{ route('innovation.index') }}" class="text-blue-500">Back to List</a>
    </div>
@endsection 