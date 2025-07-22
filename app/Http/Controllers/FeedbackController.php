<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::all();
        return view('feedback.index', compact('feedbacks'));
    }

    public function create()
    {
        return view('feedback.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'subject' => 'required|string|max:255',
            'submitted_by' => 'nullable|integer',
            'type' => 'required|string|max:255',
            'description' => 'required|string',
            'priority' => 'required|in:High,Medium,Low',
            'status' => 'nullable|string|max:255',
            'assigned_to' => 'nullable|integer',
            'response' => 'nullable|string',
        ]);
        Feedback::create($validated);
        return redirect()->route('feedback.index')->with('success', 'Feedback submitted!');
    }

    public function show(Feedback $feedback)
    {
        return view('feedback.show', compact('feedback'));
    }

    public function edit(Feedback $feedback)
    {
        return view('feedback.edit', compact('feedback'));
    }

    public function update(Request $request, Feedback $feedback)
    {
        $validated = $request->validate([
            'subject' => 'required|string|max:255',
            'submitted_by' => 'nullable|integer',
            'type' => 'required|string|max:255',
            'description' => 'required|string',
            'priority' => 'required|in:High,Medium,Low',
            'status' => 'nullable|string|max:255',
            'assigned_to' => 'nullable|integer',
            'response' => 'nullable|string',
        ]);
        $feedback->update($validated);
        return redirect()->route('feedback.index')->with('success', 'Feedback updated!');
    }

    public function destroy(Feedback $feedback)
    {
        $feedback->delete();
        return redirect()->route('feedback.index')->with('success', 'Feedback deleted!');
    }
}