<?php

namespace App\Http\Controllers;

use App\Models\InnovationHub;
use Illuminate\Http\Request;

class InnovationController extends Controller
{
    public function index()
    {
        $ideas = InnovationHub::all();
        return view('innovation.index', compact('ideas'));
    }

    public function create()
    {
        return view('innovation.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'idea_title' => 'required|string|max:255',
            'submitted_by' => 'required|integer',
            'description' => 'required|string',
            'category' => 'required|string',
            'status' => 'required|string',
            'business_impact' => 'nullable|string',
            'technical_feasibility' => 'nullable|integer',
            'assigned_to' => 'nullable|integer',
            'comments' => 'nullable|string',
            'attachments' => 'nullable|string',
        ]);
        InnovationHub::create($validated);
        return redirect()->route('innovation.index')->with('success', 'Innovation idea created successfully.');
    }

    public function show(InnovationHub $innovation)
    {
        return view('innovation.show', ['idea' => $innovation]);
    }

    public function edit(InnovationHub $innovation)
    {
        return view('innovation.edit', ['idea' => $innovation]);
    }

    public function update(Request $request, InnovationHub $innovation)
    {
        $validated = $request->validate([
            'idea_title' => 'required|string|max:255',
            'submitted_by' => 'required|integer',
            'description' => 'required|string',
            'category' => 'required|string',
            'status' => 'required|string',
            'business_impact' => 'nullable|string',
            'technical_feasibility' => 'nullable|integer',
            'assigned_to' => 'nullable|integer',
            'comments' => 'nullable|string',
            'attachments' => 'nullable|string',
        ]);
        $innovation->update($validated);
        return redirect()->route('innovation.index')->with('success', 'Innovation idea updated successfully.');
    }

    public function destroy(InnovationHub $innovation)
    {
        $innovation->delete();
        return redirect()->route('innovation.index')->with('success', 'Innovation idea deleted successfully.');
    }
}