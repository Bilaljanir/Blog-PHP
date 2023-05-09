<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
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

    public function postsByTag(Tag $tag): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('home')->with([
            'posts' => $tag->posts()->paginate(10),
            'tag' => $tag
        ]);
    }

    public function changeLang($lang): \Illuminate\Http\RedirectResponse
    {
        session()->forget('lang');
        session()->put('lang', $lang);
        return redirect()->back();
    }

    public function searchByTerm(Request $request): \Illuminate\Http\JsonResponse
    {
        $posts = Post::orderBy('created_at','desc')
            ->where('title_en', 'like', '%'.$request->term.'%')
            ->orWhere('title_fr', 'like', '%'.$request->term.'%')
            ->published()->get();
        return response()->json($posts);
    }
}
