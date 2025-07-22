<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $members = TeamMember::all();
        return view('team.index', compact('members'));
    }

    public function create()
    {
        return view('team.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'role_title' => 'nullable|string|max:255',
            'department' => 'nullable|string|max:255',
            'team' => 'nullable|string|max:255',
            'photo' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'skills' => 'nullable|string',
            'contact_number' => 'nullable|string|max:255',
            'manager_id' => 'nullable|integer',
            'linkedin_url' => 'nullable|string|max:255',
            'active' => 'nullable|boolean',
            'join_date' => 'nullable|date',
        ]);
        TeamMember::create($validated);
        return redirect()->route('team.index')->with('success', 'Team member created successfully.');
    }

    public function show(TeamMember $team)
    {
        return view('team.show', ['member' => $team]);
    }

    public function edit(TeamMember $team)
    {
        return view('team.edit', ['member' => $team]);
    }

    public function update(Request $request, TeamMember $team)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'role_title' => 'nullable|string|max:255',
            'department' => 'nullable|string|max:255',
            'team' => 'nullable|string|max:255',
            'photo' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'skills' => 'nullable|string',
            'contact_number' => 'nullable|string|max:255',
            'manager_id' => 'nullable|integer',
            'linkedin_url' => 'nullable|string|max:255',
            'active' => 'nullable|boolean',
            'join_date' => 'nullable|date',
        ]);
        $team->update($validated);
        return redirect()->route('team.index')->with('success', 'Team member updated successfully.');
    }

    public function destroy(TeamMember $team)
    {
        $team->delete();
        return redirect()->route('team.index')->with('success', 'Team member deleted successfully.');
    }
}