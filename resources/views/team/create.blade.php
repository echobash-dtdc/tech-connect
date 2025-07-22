@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-6 max-w-2xl">
        <h1 class="text-2xl font-bold mb-4">Add Team Member</h1>
        <form action="{{ route('team.store') }}" method="POST" class="space-y-4 bg-white p-6 rounded shadow"
            enctype="multipart/form-data">
            @csrf
            <div>
                <label for="full_name" class="block font-semibold mb-1">Full Name</label>
                <input type="text" class="w-full border border-gray-300 rounded px-3 py-2" id="full_name" name="full_name"
                    required>
            </div>
            <div>
                <label for="email" class="block font-semibold mb-1">Email</label>
                <input type="email" class="w-full border border-gray-300 rounded px-3 py-2" id="email" name="email"
                    required>
            </div>
            <div>
                <label for="role_title" class="block font-semibold mb-1">Role Title</label>
                <input type="text" class="w-full border border-gray-300 rounded px-3 py-2" id="role_title"
                    name="role_title">
            </div>
            <div>
                <label for="department_id" class="block font-semibold mb-1">Department</label>
                <select class="w-full border border-gray-300 rounded px-3 py-2" id="department_id" name="department_id">
                    <option value="">Select Department</option>
                    @foreach($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="team_id" class="block font-semibold mb-1">Team</label>
                <select class="w-full border border-gray-300 rounded px-3 py-2" id="team_id" name="team_id">
                    <option value="">Select Team</option>
                    @foreach($teams as $team)
                        <option value="{{ $team->id }}">{{ $team->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="photo" class="block font-semibold mb-1">Photo</label>
                <input type="file" class="w-full border border-gray-300 rounded px-3 py-2" id="photo" name="photo">
            </div>
            <div>
                <label for="bio" class="block font-semibold mb-1">Bio</label>
                <textarea class="w-full border border-gray-300 rounded px-3 py-2" id="bio" name="bio">{}</textarea>
            </div>
            <div>
                <label for="skills" class="block font-semibold mb-1">Skills (JSON)</label>
                <textarea class="w-full border border-gray-300 rounded px-3 py-2" id="skills" name="skills">{}</textarea>
            </div>
            <div>
                <label for="contact_number" class="block font-semibold mb-1">Contact Number</label>
                <input type="text" class="w-full border border-gray-300 rounded px-3 py-2" id="contact_number"
                    name="contact_number">
            </div>
            <div>
                <label for="manager_id" class="block font-semibold mb-1">Manager (Team Member)</label>
                <select class="w-full border border-gray-300 rounded px-3 py-2" id="manager_id" name="manager_id">
                    <option value="">Select Manager</option>
                    @foreach($teamMembers as $member)
                        <option value="{{ $member->id }}">{{ $member->full_name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="direct_reports" class="block font-semibold mb-1">Direct Reports (Team Members)</label>
                <select class="w-full border border-gray-300 rounded px-3 py-2" id="direct_reports" name="direct_reports[]"
                    multiple>
                    @foreach($teamMembers as $member)
                        <option value="{{ $member->id }}">{{ $member->full_name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="linkedin_url" class="block font-semibold mb-1">LinkedIn URL</label>
                <input type="text" class="w-full border border-gray-300 rounded px-3 py-2" id="linkedin_url"
                    name="linkedin_url">
            </div>
            <div>
                <label for="active" class="block font-semibold mb-1">Active</label>
                <select class="w-full border border-gray-300 rounded px-3 py-2" id="active" name="active">
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
            </div>
            <div>
                <label for="join_date" class="block font-semibold mb-1">Join Date</label>
                <input type="date" class="w-full border border-gray-300 rounded px-3 py-2" id="join_date" name="join_date">
            </div>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Add</button>
        </form>
    </div>
@endsection

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#manager_id').select2({
                placeholder: 'Select Manager',
                allowClear: true,
                width: '100%'
            });
            $('#direct_reports').select2({
                placeholder: 'Select Direct Reports',
                allowClear: true,
                width: '100%'
            });
            $('#department_id').select2({
                placeholder: 'Select Department',
                allowClear: true,
                width: '100%'
            });

            $('#department_id').change(function () {
                var departmentId = $(this).val();
                if (departmentId) {
                    $.ajax({
                        url: '/team/get-teams/' + departmentId,
                        type: 'GET',
                        dataType: 'json',
                        success: function (data) {
                            $('#team_id').empty().append('<option value="">Select Team</option>');
                            $.each(data, function (key, value) {
                                $('#team_id').append('<option value="' + value.id + '">' + value.name + '</option>');
                            });
                        }
                    });
                } else {
                    $('#team_id').empty().append('<option value="">Select Team</option>');
                }
            });
        });
    </script>
@endpush