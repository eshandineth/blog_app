<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    // List all posts
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    // Show form to create a new post
    public function create()
    {
        return view('posts.create');
    }

    // Store a new post
    public function store(Request $request)
{
    // Validate the request data
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',  // Image validation
    ]);

    // Store the post data
    $post = new Post();
    $post->title = $validated['title'];
    $post->content = $validated['content'];

    // Handle image upload manually
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        // Define a custom filename
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        // Move the file to the public/images folder
        $image->move(public_path('images'), $imageName);
        // Store the image path in the database (relative to public directory)
        $post->image = 'images/' . $imageName;
    }

    $post->user_id = Auth::user()->id;
    $post->save();

    return redirect()->route('posts.index')->with('success', 'Post created successfully!');
}


    // Show a specific post
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    // Show form to edit a post
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required|max:255',
        'content' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Image validation
    ]);

    $post = Post::findOrFail($id);
    $post->title = $request->title;
    $post->content = $request->content;

    /// Handle image upload manually
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        // Define a custom filename
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        // Move the file to the public/images folder
        $image->move(public_path('images'), $imageName);
        // Store the image path in the database (relative to public directory)
        $post->image = 'images/' . $imageName;
    }

    $post->save();

    return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
}


    // Delete a post
    public function destroy($id)
    {
        Post::findOrFail($id)->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');
    }
}
