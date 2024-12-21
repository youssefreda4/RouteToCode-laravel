<?php

namespace App\Http\Controllers\Front\Home;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id', 'DESC')
            ->with('user', 'category')
            ->limit(3)
            ->get();
        return view('Front.pages.home.index', compact('posts'));
    }
}
