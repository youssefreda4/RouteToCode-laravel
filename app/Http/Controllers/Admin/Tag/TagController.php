<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::orderBy('id', 'DESC')
            ->paginate(12);
        return view('admin.pages.tags.index', compact('tags'));
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $request->validate([
            'search' => 'required|string',
        ]);
        $tags = Tag::orderBy('id', 'DESC')
            ->where('name', 'LIKE', '%' . $search . '%')
            ->paginate('12')
            ->withQueryString();
        return view('Admin.pages.tags.index', compact('tags'));
    }

    public function posts(Tag $tag)
    {
        return view('Admin.pages.tags.posts', compact('tag'));
    }

    public function create()
    {
        return view('Admin.pages.tags.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:2|max:30',
        ]);
        Tag::create([
            'name' => $request->name,
        ]);
        return redirect()->route('dashboard.tags.view')->with('success', 'Tag created successfully');
    }

    public function edit(Tag $tag)
    {
        return view('Admin.pages.tags.edit', compact('tag'));
    }

    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => 'required|string|min:2|max:30',
        ]);

        $tag->update([
            'name' => $request->name,
        ]);
        return redirect()->route('dashboard.tags.view')->with('success', 'Tag updated successfully');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return back()->with('success', 'Tag deleted successfully');
    }
}
