<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BlogController extends Controller
{
    public function index()
    {
        $posts = BlogPost::orderBy('publish_date', 'desc')->paginate(10);
        return view('blog.index', compact('posts'));
    }

    public function getBlogs() {
        // Fix the get line to properly chain withHeaders before get
        $response = Http::withHeaders([
            'Authorization' => sprintf("Token %s", ENV('BASEROW_DB_TOKEN'))
        ])->get('https://resolved-silkworm-eminent.ngrok-free.app/api/database/rows/table/777/?user_field_names=true');

        if ($response->failed()) {
            return response()->json(['error' => 'Failed to fetch blogs'], 500);
        }
        return response()->json($response->json());
    }

    public function show($id)
    {
        $post = BlogPost::with('author')->findOrFail($id);
        return view('blog.show', compact('post'));
    }

    public function create()
    {
        return view('blog.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author_id' => 'required|integer',
            'content' => 'required|string',
            'category' => 'required|string|max:255',
            'tags' => 'nullable|string',
            'featured_image' => 'nullable|string|max:255',
            'status' => 'required|string|max:255',
            'publish_date' => 'nullable|date',
            'views_count' => 'nullable|integer',
            'reading_time' => 'nullable|string|max:255',
            'featured' => 'nullable|boolean',
        ]);
        BlogPost::create($validated);
        return redirect()->route('blog.index')->with('success', 'Blog post created successfully.');
    }

    public function edit($id)
    {
        $post = BlogPost::findOrFail($id);
        return view('blog.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author_id' => 'required|integer',
            'content' => 'required|string',
            'category' => 'required|string|max:255',
            'tags' => 'nullable|string',
            'featured_image' => 'nullable|string|max:255',
            'status' => 'required|string|max:255',
            'publish_date' => 'nullable|date',
            'views_count' => 'nullable|integer',
            'reading_time' => 'nullable|string|max:255',
            'featured' => 'nullable|boolean',
        ]);
        $post = BlogPost::findOrFail($id);
        $post->update($validated);
        return redirect()->route('blog.index')->with('success', 'Blog post updated successfully.');
    }

    public function destroy($id)
    {
        $post = BlogPost::findOrFail($id);
        $post->delete();
        return redirect()->route('blog.index')->with('success', 'Blog post deleted successfully.');
    }
}