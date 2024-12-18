<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EditPostRequest;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\PostRequest;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user', 'tag', 'category')
            ->orderBy('id', 'DESC')
            ->paginate(12);
        return view('Admin.pages.posts.index', compact('posts'));
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $request->validate([
            'search' => 'required|string',
        ]);
        $posts = Post::orderBy('id', 'DESC')
            ->where('title', 'LIKE', '%' . $search . '%')
            ->paginate('12')
            ->withQueryString();
        return view('Admin.pages.posts.index', compact('posts'));
    }

    public function comments(Post $post)
    {
        return view('Admin.pages.posts.comments', compact('post'));
    }

    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('Admin.pages.posts.create', compact('tags', 'categories'));
    }

    public function store(PostRequest $request)
    {
        $post = $request->validated();
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('/public/posts');
            $post['image'] = $image;
        }
        $post['user_id'] = 50;
        $post = Post::create($post);
        $post->tag()->sync($request->tags);
        return redirect()->route('dashboard.posts.view')->with('success', 'Post added successfully');
    }

    public function edit(Post $post)
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('Admin.pages.posts.edit', compact('post', 'tags', 'categories'));
    }

    public function update(EditPostRequest $request, Post $post)
    {

        $old_image = $post->image;
        if ($request->hasFile('image')) {
            File::delete($old_image);
            $request->validate([
                'image' => 'image|mimes:png,jpg,jpeg,gif'
            ]);
            $image_name = $request->file('image')->store('/public/posts');
        } else {
            $image_name = $old_image;
        }

        $post->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $image_name,
            'user_id' => 50,
            'category_id' => $request->category_id,
        ]);
        $post->tag()->sync($request->tags);
        return redirect()->route('dashboard.posts.view')->with('success', 'Post updated successfully');
    }

    public function destroy(Post $post)
    {
        $imageNAme = $post->image;
        File::delete($imageNAme);
        $post->delete();
        return back()->with('success', 'Post deleted successfully');
    }
}
