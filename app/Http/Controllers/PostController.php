<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('admin.posts.index')->with([
            'posts' => $posts
        ]);
    }

    public function create()
    {
        //
    }

    public function store(StorePostRequest $request)
    {
        //
    }


    public function show(Post $post)
    {
        $next = Post::where('id', '>', $post->id )->orderBy('id')->first();
        $previous = Post::where('id', '<', $post->id )->orderBy('id', 'desc')->first();
        return view('post.show')->with([
            'post' => $post,
            'next'=> $next,
            'previous' => $previous
        ]);
    }

    public function edit(Post $post)
    {
        //
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    public function destroy(Post $post)
    {
        //
    }

    public function togglePublished(Post $post)
    {
        //
    }

    public function togglePremium(Post $post)
    {
        //
    }
}
