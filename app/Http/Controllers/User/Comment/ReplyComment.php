<?php

namespace App\Http\Controllers\User\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReplyComment extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(Request $request, Post $post, Comment $comment)
    {
        Comment::create([
            'user_id' => Auth::id(),
            'post_id' => $post->id,
            'body' => $request->bodyReply,
            'parent_id' => $comment->id,
            'like' => 0,
            'dislike' => 0,
        ]);
        return redirect()->back();
    }
}
