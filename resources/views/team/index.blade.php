@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-4">Team Members</h1>
    <a href="{{ route('team.create') }}" class="inline-block mb-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Add Team Member</a>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded shadow">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border-b">ID</th>
                    <th class="px-4 py-2 border-b">Name</th>
                    <th class="px-4 py-2 border-b">Email</th>
                    <th class="px-4 py-2 border-b">Role</th>
                    <th class="px-4 py-2 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($members as $member)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 border-b">{{ $member->id }}</td>
                        <td class="px-4 py-2 border-b">{{ $member->full_name }}</td>
                        <td class="px-4 py-2 border-b">{{ $member->email }}</td>
                        <td class="px-4 py-2 border-b">{{ $member->role_title }}</td>
                        <td class="px-4 py-2 border-b space-x-2">
                            <a href="{{ route('team.show', $member->id) }}" class="inline-block px-3 py-1 bg-gray-200 text-gray-800 rounded hover:bg-gray-300">View</a>
                            <a href="{{ route('team.edit', $member->id) }}" class="inline-block px-3 py-1 bg-yellow-400 text-white rounded hover:bg-yellow-500">Edit</a>
                            <form action="{{ route('team.destroy', $member->id) }}" method="POST" class="inline">
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