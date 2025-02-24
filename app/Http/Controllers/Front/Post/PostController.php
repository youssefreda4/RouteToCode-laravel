<?php

namespace App\Http\Controllers\Front\Post;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Front\EditPostRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Front\PostRequest;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id', 'DESC')
            ->with('user', 'tag', 'category')
            ->paginate(8);
        $categories = Category::all();
        return view('Front.pages.posts.index', compact('posts', 'categories'));
    }

    public function show(Post $post)
    {
        return view('Front.pages.posts.show', compact('post'));
    }
    public function postsCategory(Category $category)
    {
        return view('Front.pages.posts.category', compact('category'));
    }

    public function postsTag(Tag $tag)
    {
        return view('Front.pages.posts.tag', compact('tag'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('Front.pages.posts.create', compact('tags', 'categories'));
    }

    public function store(PostRequest $request)
    {
        $post = $request->validated();
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('/');
            $post['image'] = $image;
        }
        $post['user_id'] =  Auth::guard('web')->user()->id;
        $post = Post::create($post);
        $post->tag()->sync($request->tags);
        return redirect()->route('front.posts.view')->with('success', 'Post added successfully');
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('Front.pages.posts.edit', compact('post', 'categories', 'tags'));
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
            'user_id' => Auth::guard('admin')->user()->id,
            'category_id' => $request->category_id,
        ]);
        $post->tag()->sync($request->tags);
        return redirect()->route('front.posts.view')->with('success', 'Post updated successfully');
    }

    public function destroy(Post $post)
    {
        $postImage = $post->image;
        File::delete($postImage);
        $post->delete();
        return redirect()->route('front.posts.view')->with('success', 'Post deleted successfully');
    }
}
