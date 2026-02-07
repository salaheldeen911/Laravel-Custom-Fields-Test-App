<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
    {
        // Eager load custom fields values
        $posts = Post::withCustomFields()->latest()->get();

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(StorePostRequest $request)
    {
        DB::transaction(function () use ($request) {
            $post = Post::create($request->validated());
            $post->saveCustomFields($request->validated());
        });

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    public function show(Post $post)
    {
        return view('posts.show')->with('post', $post->loadCustomFields());
    }

    public function edit(Post $post)
    {
        return view('posts.edit')->with('post', $post->loadCustomFields());
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        DB::transaction(function () use ($request, $post) {
            // Don't update custom fields here directly via update(), use dedicated method
            $post->update($request->safe()->except(array_keys(Post::getCustomFieldRules())));
            $post->updateCustomFields($request->validated());
        });

        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
}
