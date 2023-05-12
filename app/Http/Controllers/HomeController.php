<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $posts = Post::published()->simple()->latest()->paginate(10);
        $postsPremium = Post::published()->premium()->latest()->get();
        return view('home')->with([
            'posts' => $posts,
            'postsPremium' => $postsPremium
        ]);
    }

    public function postsByCategory(Category $category)
    {
        $posts = $category->posts()->latest()->paginate(9);
        $categories = Category::withCount('posts')->orderBy('name_en')->get();

        return view('home', compact('posts', 'categories', 'category'));
    }
}
