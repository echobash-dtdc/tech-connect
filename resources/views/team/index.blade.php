@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold mb-4">Team Members</h1>
        <a href="{{ route('team.create') }}"
            class="inline-block mb-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Add Team Member</a>
        <!-- <a href="{{ route('team.hierarchy') }}"
                            class="inline-block mb-4 px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">View Team Hierarchy</a> -->

        <form method="GET" action="" class="mb-6 flex flex-wrap gap-4 items-end" id="filterForm">
            <div>
                <label for="department_id" class="block text-sm font-semibold mb-1">Department</label>
                <select name="department_id" id="department_id" class="w-48 border border-gray-300 rounded px-3 py-2">
                    <option value="">All Departments</option>
                    @foreach($departments as $department)
                        <option value="{{ $department->id }}" {{ request('department_id') == $department->id ? 'selected' : '' }}>
                            {{ $department->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="team_id" class="block text-sm font-semibold mb-1">Team</label>
                <select name="team_id" id="team_id" class="w-48 border border-gray-300 rounded px-3 py-2">
                    <option value="">All Teams</option>
                    @foreach($teams as $team)
                        <option value="{{ $team->id }}" data-department="{{ $team->department_id }}" {{ request('team_id') == $team->id ? 'selected' : '' }}>{{ $team->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="member_id" class="block text-sm font-semibold mb-1">Member</label>
                <select name="member_id" id="member_id" class="w-48 border border-gray-300 rounded px-3 py-2">
                    <option value="">All Members</option>
                    @foreach($allMembers as $member)
                        <option value="{{ $member->id }}" {{ request('member_id') == $member->id ? 'selected' : '' }}>
                            {{ $member->full_name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Filter</button>
                <a href="{{ route('team.index') }}" class="px-4 py-2 bg-gray-300 text-gray-800 rounded ml-2">Reset</a>
            </div>
        </form>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded shadow">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 border-b text-left">S.No</th>
                        <th class="px-4 py-2 border-b text-left">Name</th>
                        <th class="px-4 py-2 border-b text-left">Email</th>
                        <th class="px-4 py-2 border-b text-left">Role</th>
                        <th class="px-4 py-2 border-b text-left">Department</th>
                        <th class="px-4 py-2 border-b text-left">Team</th>
                        <th class="px-4 py-2 border-b text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($members as $member)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2 border-b">
                                {{ ($members->currentPage() - 1) * $members->perPage() + $loop->iteration }}
                            </td>
                            <td class="px-4 py-2 border-b">{{ $member->full_name }}</td>
                            <td class="px-4 py-2 border-b">{{ $member->email }}</td>
                            <td class="px-4 py-2 border-b">{{ $member->role_title }}</td>
                            <td class="px-4 py-2 border-b">{{ $member->department->name ?? 'N/A' }}</td>
                            <td class="px-4 py-2 border-b">{{ $member->team->name ?? 'N/A' }}</td>
                            <td class="px-4 py-2 border-b space-x-2">
                                <a href="{{ route('team.show', $member->id) }}"
                                    class="inline-block px-3 py-1 bg-gray-200 text-gray-800 rounded hover:bg-gray-300">View</a>
                                <a href="{{ route('team.edit', $member->id) }}"
                                    class="inline-block px-3 py-1 bg-yellow-400 text-white rounded hover:bg-yellow-500">Edit</a>
                                <form action="{{ route('team.destroy', $member->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="inline-block px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700"
                                        onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $members->links() }}
        </div>
    </div>

    @push('styles')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @endpush

    @push('scripts')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#department_id, #team_id, #member_id').select2({ width: '100%' });
                function filterTeams() {
                    var selectedDept = $('#department_id').val();
                    $('#team_id option').each(function () {
                        var dept = $(this).data('department');
                        if (!selectedDept || !dept || dept == selectedDept) {
                            $(this).show();
                        } else {
                            $(this).hide();
                        }
                    });
                    // If selected team is not in filtered, reset
                    if ($('#team_id option:selected').is(':hidden')) {
                        $('#team_id').val('');
                    }
                    $('#team_id').trigger('change.select2');
                }
                $('#department_id').on('change', filterTeams);
                filterTeams();
            });
        </script>
    @endpush
@endsection