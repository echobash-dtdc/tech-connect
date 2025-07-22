<?php

namespace App\Http\Controllers;

use App\Models\HomepageContent;
use App\Models\Project;
use App\Models\BlogPost;
use App\Models\Event;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $banner = HomepageContent::where('content_type', 'Banner')->where('active', true)->first();
        $leadership = HomepageContent::where('content_type', 'Leadership Message')->where('active', true)->first();
        $featuredProjects = Project::where('visibility', true)->take(5)->get();
        $latestPosts = BlogPost::where('status', 'Published')->orderBy('publish_date', 'desc')->take(3)->get();
        $upcomingEvents = Event::where('date_time', '>=', now())->orderBy('date_time')->get();

        return view('homepage.index', compact('banner', 'leadership', 'featuredProjects', 'latestPosts', 'upcomingEvents'));
    }

    public function contentIndex()
    {
        $contents = HomepageContent::all();
        return view('homepage.content', compact('contents'));
    }

    public function create()
    {
        return view('homepage.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'section_name' => 'required|string|max:255',
            'content_type' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'image_icon' => 'nullable|string|max:255',
            'link_url' => 'nullable|string|max:255',
            'display_order' => 'nullable|integer',
            'active' => 'required|boolean',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
        ]);
        HomepageContent::create($validated);
        return redirect()->route('homepage-content.index')->with('success', 'Homepage content created successfully.');
    }

    public function show(HomepageContent $homepageContent)
    {
        return view('homepage.show', compact('homepageContent'));
    }

    public function edit(HomepageContent $homepageContent)
    {
        return view('homepage.edit', compact('homepageContent'));
    }

    public function update(Request $request, HomepageContent $homepageContent)
    {
        $validated = $request->validate([
            'section_name' => 'required|string|max:255',
            'content_type' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'image_icon' => 'nullable|string|max:255',
            'link_url' => 'nullable|string|max:255',
            'display_order' => 'nullable|integer',
            'active' => 'required|boolean',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
        ]);
        $homepageContent->update($validated);
        return redirect()->route('homepage-content.index')->with('success', 'Homepage content updated successfully.');
    }

    public function destroy(HomepageContent $homepageContent)
    {
        $homepageContent->delete();
        return redirect()->route('homepage-content.index')->with('success', 'Homepage content deleted successfully.');
    }
}