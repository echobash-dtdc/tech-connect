@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Innovation Ideas</h1>
    <a href="{{ route('innovation.create') }}" class="btn btn-primary mb-3">Submit Idea</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Submitted By</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ideas as $idea)
                <tr>
                    <td>{{ $idea->id }}</td>
                    <td>{{ $idea->idea_title }}</td>
                    <td>{{ $idea->submitted_by }}</td>
                    <td>{{ $idea->status }}</td>
                    <td>
                        <a href="{{ route('innovation.show', $idea->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('innovation.edit', $idea->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('innovation.destroy', $idea->id) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection 