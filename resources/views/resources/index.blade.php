@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-4">Resources</h1>
    <a href="{{ route('resources.create') }}" class="inline-block mb-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Create Resource</a>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded shadow">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border-b">ID</th>
                    <th class="px-4 py-2 border-b">Name</th>
                    <th class="px-4 py-2 border-b">Type</th>
                    <th class="px-4 py-2 border-b">Owner Team</th>
                    <th class="px-4 py-2 border-b">Access Level</th>
                    <th class="px-4 py-2 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($resources as $resource)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 border-b">{{ $resource->id }}</td>
                        <td class="px-4 py-2 border-b">{{ $resource->resource_name }}</td>
                        <td class="px-4 py-2 border-b">{{ $resource->type }}</td>
                        <td class="px-4 py-2 border-b">{{ $resource->owner_team_id }}</td>
                        <td class="px-4 py-2 border-b">{{ $resource->access_level }}</td>
                        <td class="px-4 py-2 border-b space-x-2">
                            <a href="{{ route('resources.show', $resource->id) }}" class="inline-block px-3 py-1 bg-gray-200 text-gray-800 rounded hover:bg-gray-300">View</a>
                            <a href="{{ route('resources.edit', $resource->id) }}" class="inline-block px-3 py-1 bg-yellow-400 text-white rounded hover:bg-yellow-500">Edit</a>
                            <form action="{{ route('resources.destroy', $resource->id) }}" method="POST" class="inline">
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