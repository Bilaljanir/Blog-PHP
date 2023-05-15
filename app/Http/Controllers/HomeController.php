<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
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

    public function postsByCategory(Category $category): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('home')->with([
            'posts' => $category->posts()->paginate(10),
            'category' => $category,
        ]);
    }

    public function changeLang($lang): \Illuminate\Http\RedirectResponse
    {
        session()->forget('lang');
        session()->put('lang', $lang);
        return redirect()->back();
    }
}
