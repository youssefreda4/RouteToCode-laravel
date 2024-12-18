<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id', 'DESC')
            // ->with('post')
            ->paginate(12);
        return view('admin.pages.categories.index', compact('categories'));
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $request->validate([
            'search' => 'required|string',
        ]);
        $categories = Category::orderBy('id', 'DESC')
            ->where('name', 'LIKE', '%' . $search . '%')
            ->paginate('12')
            ->withQueryString();
        return view('Admin.pages.categories.index', compact('categories'));
    }

    public function posts(Category $category)
    {
        return view('Admin.pages.categories.posts',compact('category'));
    }

    public function create()
    {
        return view('Admin.pages.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:6|max:30',
        ]);
        Category::create([
            'name' => $request->name,
        ]);
        return redirect()->route('dashboard.categories.view')->with('success', 'Category created successfully');
    }

    public function edit(Category $category)
    {
        return view('Admin.pages.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|min:6|max:30',
        ]);

        $category->update([
            'name' => $request->name,
        ]);
        return redirect()->route('dashboard.categories.view')->with('success', 'Category updated successfully');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return back()->with('success', 'Category deleted successfully');
    }
}
