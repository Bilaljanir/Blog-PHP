<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function store(Request $request)
    {
        $favorite = new Favorite();
        $favorite->user_id = $request->user()->id;
        $favorite->post_id = $request->post_id;
        $favorite->save();

        return response()->json(['message' => 'Favorite added successfully']);
    }

    public function destroy(Favorite $favorite)
    {
        $favorite->delete();

        return response()->json(['message' => 'Favorite deleted successfully']);
    }

    public function index()
    {
        $favoritesCount = Favorite::count();

        return response()->json(['count' => $favoritesCount]);
    }
}
