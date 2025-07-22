<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;
use Illuminate\Http\Request;
use App\Models\Team;

class TeamController extends Controller
{
    public function index(Request $request)
    {
        $departments = \App\Models\Department::all();
        $teams = \App\Models\Team::all();
        $allMembers = \App\Models\TeamMember::all();

        $query = TeamMember::with(['department', 'team']);

        if ($request->filled('department_id')) {
            $query->where('department_id', $request->department_id);
        }
        if ($request->filled('team_id')) {
            $query->where('team_id', $request->team_id);
        }
        if ($request->filled('member_id')) {
            $query->where('id', $request->member_id);
        }

        $members = $query->paginate(10)->appends($request->except('page'));

        return view('team.index', compact('members', 'departments', 'teams', 'allMembers'));
    }

    public function create()
    {
        $departments = \App\Models\Department::all();
        $teamMembers = \App\Models\TeamMember::all();
        $teams = \App\Models\Team::all(); // Add this line
        return view('team.create', compact('departments', 'teamMembers', 'teams'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:team_members,email',
            'role_title' => 'nullable|string|max:255',
            'department_id' => 'required|exists:departments,id',
            'team_id' => 'required|exists:teams,id',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'bio' => 'nullable|string',
            'skills' => 'nullable|string',
            'contact_number' => 'nullable|string|max:255',
            'manager_id' => 'nullable|exists:team_members,id',
            'direct_reports' => 'nullable|array',
            'linkedin_url' => 'nullable|string|max:255',
            'active' => 'nullable|boolean',
            'join_date' => 'nullable|date',
        ]);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos', 'public');
            $validated['photo'] = $path;
        }

        TeamMember::create($validated);
        return redirect()->route('team.index')->with('success', 'Team member created successfully.');
    }

    public function show(TeamMember $team)
    {
        return view('team.show', ['member' => $team]);
    }

    public function edit(TeamMember $team)
    {
        $departments = \App\Models\Department::all();
        $teamMembers = \App\Models\TeamMember::where('id', '!=', $team->id)->get();
        return view('team.edit', ['member' => $team, 'departments' => $departments, 'teamMembers' => $teamMembers]);
    }

    public function update(Request $request, TeamMember $team)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:team_members,email,' . $team->id,
            'role_title' => 'nullable|string|max:255',
            'department_id' => 'required|exists:departments,id',
            'team_id' => 'required|exists:teams,id',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'bio' => 'nullable|string',
            'skills' => 'nullable|string',
            'contact_number' => 'nullable|string|max:255',
            'manager_id' => 'nullable|exists:team_members,id',
            'direct_reports' => 'nullable|array',
            'linkedin_url' => 'nullable|string|max:255',
            'active' => 'nullable|boolean',
            'join_date' => 'nullable|date',
        ]);

        if ($request->hasFile('photo')) {
            // Delete old photo if it exists
            if ($team->photo) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($team->photo);
            }
            $path = $request->file('photo')->store('photos', 'public');
            $validated['photo'] = $path;
        }

        $team->update($validated);
        return redirect()->route('team.index')->with('success', 'Team member updated successfully.');
    }

    public function destroy(TeamMember $team)
    {
        $team->delete();
        return redirect()->route('team.index')->with('success', 'Team member deleted successfully.');
    }

    public function getTeams($departmentId)
    {
        $teams = Team::where('department_id', $departmentId)->get();
        return response()->json($teams);
    }

    public function hierarchy()
    {
        $departments = \App\Models\Department::with([
            'members' => function ($query) {
                $query->whereNull('manager_id')->with('allReports');
            }
        ])->get();

        return view('team.hierarchy', compact('departments'));
    }
}