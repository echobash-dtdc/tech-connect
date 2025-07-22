@extends('layouts.app')

@section('content')
<div class="container mx-auto max-w-xl py-10">
    <div class="bg-white p-8 rounded-2xl shadow-xl flex flex-col items-center text-center">
        <div class="w-24 h-24 rounded-full bg-blue-100 flex items-center justify-center mb-4 text-4xl font-bold text-blue-600">
            {{ strtoupper(substr($member->full_name, 0, 1)) }}
        </div>
        <h1 class="text-3xl font-extrabold mb-2 text-gray-800">{{ $member->full_name }}</h1>
        <div class="flex flex-wrap justify-center gap-2 mb-4">
            <span class="inline-block px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-xs font-semibold">{{ $member->role_title }}</span>
            <span class="inline-block px-3 py-1 bg-gray-100 text-gray-800 rounded-full text-xs font-semibold">{{ $member->department }}</span>
            <span class="inline-block px-3 py-1 bg-green-100 text-green-800 rounded-full text-xs font-semibold">Team: {{ $member->team }}</span>
        </div>
        <div class="mb-2">
            <span class="font-semibold text-gray-700">Email:</span>
            <a href="mailto:{{ $member->email }}" class="text-blue-600 hover:underline ml-1">{{ $member->email }}</a>
        </div>
        <div class="mb-2">
            <span class="font-semibold text-gray-700">Manager:</span>
            <span class="ml-1">{{ optional($member->manager)->full_name ?? 'N/A' }}</span>
        </div>
        <a href="{{ route('team.index') }}" class="mt-6 inline-block px-6 py-2 rounded-lg bg-blue-600 text-white font-semibold shadow hover:bg-blue-700 transition">Back to List</a>
    </div>
</div>
@endsection 