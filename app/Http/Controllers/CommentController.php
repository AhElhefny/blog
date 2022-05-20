<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function storeComment(Post $post){
        $data=request()->validate([
            'body' => 'required|min:7|max:255',
        ]);
        $data['user_id']=auth()->user()->id;
        $post->comments()->create($data);
        return response()->json($data);
    }

    public function destroy(Comment $comment){
        $comment->delete();
        return back();
    }
}
