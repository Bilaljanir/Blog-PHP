<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function index()
    {
        $favorites = Favorite::where('user_id', auth()->user()->id)->get();
        return view('/favorites', compact('favorites'));
    }
    public function add(Request $postId)
    {
        $favorite = new Favorite();
        $favorite->post_id = $postId;
        $favorite->save();
    }
    }
