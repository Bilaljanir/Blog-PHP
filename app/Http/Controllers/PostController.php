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
        //
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
        return view('post.show')->with([
            'post' => $post,
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
