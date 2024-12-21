<?php

namespace App\Http\Controllers\Front\Comment;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\CommentNotification;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Post $post, Request $request)
    {
        $content = $request->validate([
            'comment' => 'required|string|max:1000',
        ]);

        $data = Comment::create([
            'content' => $request->comment,
            'user_id' =>  Auth::user()->id,
            'post_id' => $post->id
        ]);
        $user = $post->user;
        $user->notify(new CommentNotification($data));

        return back()->with('success', 'Comment added successfully');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return back()->with('success', 'Comment deleted successfully');
    }
}
