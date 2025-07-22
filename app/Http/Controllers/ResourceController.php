<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function index()
    {
        $resources = Resource::all();
        return view('resources.index', compact('resources'));
    }

    public function create()
    {
        return view('resources.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'resource_name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'description' => 'nullable|string',
            'url' => 'nullable|string|max:255',
            'access_instructions' => 'nullable|string',
            'owner_team_id' => 'nullable|integer',
            'documentation' => 'nullable|string|max:255',
            'access_level' => 'nullable|string|max:255',
        ]);
        Resource::create($validated);
        return redirect()->route('resources.index')->with('success', 'Resource created successfully.');
    }

    public function show(Resource $resource)
    {
        return view('resources.show', compact('resource'));
    }

    public function edit(Resource $resource)
    {
        return view('resources.edit', compact('resource'));
    }

    public function update(Request $request, Resource $resource)
    {
        $validated = $request->validate([
            'resource_name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'description' => 'nullable|string',
            'url' => 'nullable|string|max:255',
            'access_instructions' => 'nullable|string',
            'owner_team_id' => 'nullable|integer',
            'documentation' => 'nullable|string|max:255',
            'access_level' => 'nullable|string|max:255',
        ]);
        $resource->update($validated);
        return redirect()->route('resources.index')->with('success', 'Resource updated successfully.');
    }

    public function destroy(Resource $resource)
    {
        $resource->delete();
        return redirect()->route('resources.index')->with('success', 'Resource deleted successfully.');
    }
}