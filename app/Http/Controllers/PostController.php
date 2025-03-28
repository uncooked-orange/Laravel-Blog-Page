<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at','desc')->get();
        return view('posts.index',compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $req)
{
    $val = $req->validate([
        'title' => 'required|max:255',
        'content' => 'required',
        'imagePath' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    ]);

    if ($req->hasFile('imagePath')) {
        $image = $req->file('imagePath');
        $imageName = time() . '_' . $image->getClientOriginalName(); // Unique file name
        Storage::disk('public')->putFileAs('images', $image, $imageName);
        $val['imagePath'] = $imageName; // Save the path for database
    }

    // Assign the logged-in user to the post
    $val['user_id'] = auth()->user()->id;

    Post::create($val);

    return redirect()->route('posts.index')->with('success', 'Post created successfully');
}

    public function show( Post $post)
    {
        return view('posts.show',compact('post'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit',compact('post'));
    }

    public function update(Request $req, Post $post)
{
    // Ensure the logged-in user is the owner of the post
    if ($post->user_id !== auth()->user()->id) {
        return redirect()->route('posts.index')->with('error', 'You are not authorized to update this post');
    }

    $val = $req->validate([
        'title' => 'required|max:255',
        'content' => 'required',
        'imagePath' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    ]);

    if ($req->hasFile('imagePath')) {
        $image = $req->file('imagePath');
        $imageName = time() . '_' . $image->getClientOriginalName(); // Unique file name
        Storage::disk('public')->putFileAs('images', $image, $imageName);
        $val['imagePath'] = $imageName; // Save the path for database
    }

    $post->update($val);

    return redirect()->route('posts.index')->with('success', 'Post Updated Successfully');
}


public function destroy(Post $post)
{
    // Ensure the logged-in user is the owner of the post
    if ($post->user_id !== auth()->user()->id) {
        return redirect()->route('posts.index')->with('error', 'You are not authorized to delete this post');
    }

    Storage::disk('public')->delete('images/' . $post->imagePath);
    $post->delete();

    return redirect()->route('posts.index')->with('success', 'Post Deleted Successfully');
}


}
