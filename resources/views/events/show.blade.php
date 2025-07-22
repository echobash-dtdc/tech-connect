@extends('layouts.app')

@section('content')
    <div class="container mx-auto max-w-4xl">
        <h1 class="text-2xl font-bold mb-4">{{ $event->event_name }}</h1>
        <p><strong>Type:</strong> {{ $event->type }}</p>
        <p><strong>Date:</strong> {{ $event->date_time }}</p>
        <p><strong>Description:</strong> {{ $event->description }}</p>
        <p><strong>Status:</strong> {{ $event->status }}</p>
        <a href="{{ route('events.index') }}" class="text-blue-500">Back to List</a>
    </div>
@endsection 