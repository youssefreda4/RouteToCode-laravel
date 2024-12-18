<?php

namespace App\Http\Controllers\Admin\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::with('user')
            ->orderBy('id', "DESC")
            ->paginate(12);
        return view('Admin.pages.comments.index', compact('comments'));
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $request->validate([
            'search' => 'required|string',
        ]);
        $comments = Comment::orderBy('id', 'DESC')
            ->where('content', 'LIKE', '%' . $search . '%')
            ->paginate('12')
            ->withQueryString();
        return view('Admin.pages.comments.index', compact('comments'));
    }

    public function post(Comment $comment)
    {
        return view('Admin.pages.comments.post', compact('comment'));
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('dashboard.comments.view')->with('success', 'Comment deleted successfully');
    }
}
