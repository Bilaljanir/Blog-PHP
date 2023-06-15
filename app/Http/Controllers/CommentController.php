<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function getPostComments($post_id){
        $comments = Comment::with('user')
            ->where('post_id', $post_id)->latest()->get();
        return response()->json($comments);
    }

    public function store(Request $request){
        $comment = Comment::create([
            'user_id' => $request->user_id,
            'post_id' => $request->post_id,
            'body' => $request->body,
        ]);
        return response()->json($comment->load('user'));
    }
    public function destroy(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);
        // Vérifiez si l'utilisateur actuel est autorisé à supprimer le commentaire
        if ($comment->user_id === $request->user_id) {
            $comment->delete();
            return response()->json(['message' => 'Commentaire supprimé avec succès']);
        } else {
            return response()->json(['message' => 'Vous n\'êtes pas autorisé à supprimer ce commentaire'], 403);
        }
    }


}
