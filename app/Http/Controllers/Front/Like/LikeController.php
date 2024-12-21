<?php

namespace App\Http\Controllers\Front\Like;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Notifications\LikeNotification;

class LikeController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $user = $post->user;
        $user_id = Auth::user()->id;
        $findLike = Like::where('post_id', $post->id)
            ->where('user_id', $user_id)
            ->first();
        if ($findLike) {
            $findLike->delete();
            $user->notifications()
                ->first()
                ->delete();
            return back();
        }

        $like = Like::create([
            'post_id' => $post->id,
            'user_id' => $user_id
        ]);

        $user->notify(new LikeNotification($like));
        return back();
    }

    public function markAsRead($notification)
    {
        $notification = Auth::user()->notifications->find($notification);
        if ($notification) {
            $notification->markAsRead();
        }
        return back();
    }
}
