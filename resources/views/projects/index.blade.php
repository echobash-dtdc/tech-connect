@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">Projects & Initiatives</h1>
        <a href="{{ route('projects.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">New Project</a>
        <table class="min-w-full mt-4 bg-white shadow">
            <thead>
                <tr>
                    <th class="px-4 py-2">Project Name</th>
                    <th class="px-4 py-2">Status</th>
                    <th class="px-4 py-2">Domain</th>
                    <th class="px-4 py-2">Start Date</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <td class="border px-4 py-2">{{ $project->project_name }}</td>
                        <td class="border px-4 py-2">{{ $project->status }}</td>
                        <td class="border px-4 py-2">{{ $project->domain }}</td>
                        <td class="border px-4 py-2">{{ $project->start_date }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('projects.show', $project) }}" class="text-blue-500">View</a> |
                            <a href="{{ route('projects.edit', $project) }}" class="text-green-500">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection