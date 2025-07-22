@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-3xl font-bold mb-6">Team Hierarchy</h1>
        <div class="space-y-6">
            @foreach ($departments as $department)
                <div class="bg-white p-6 rounded shadow">
                    <h2 class="text-2xl font-semibold mb-4">{{ $department->name }}</h2>
                    <ul class="space-y-4">
                        @foreach ($department->members as $member)
                            @include('team.partials.member-hierarchy-item', ['member' => $member, 'level' => 0])
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </div>
@endsection