<?php

namespace App\Http\Controllers\Admin\Skill;

use App\Models\Skill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::orderBy('id', 'DESC')
            ->paginate(12);
        return view('Admin.pages.skills.index', compact('skills'));
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $request->validate([
            'search' => 'required|string',
        ]);
        $skills = Skill::orderBy('id', 'DESC')
            ->where('name', 'LIKE', '%' . $search . '%')
            ->paginate('12')
            ->withQueryString();
        return view('Admin.pages.skills.index', compact('skills'));
    }

    public function users(Skill $skill)
    {
        $skill->with('user')->get();
        return view('admin.pages.skills.users',compact('skill'));
    }

    public function create()
    {
        return view('Admin.pages.skills.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:6|max:30',
        ]);
        Skill::create([
            'name' => $request->name,
        ]);
        return redirect()->route('dashboard.skills.view')->with('success', 'Skill created successfully');
    }

    public function edit(Skill $skill)
    {
        return view('Admin.skills.edit', compact('skill'));
    }

    public function update(Request $request, Skill $skill)
    {
        $request->validate([
            'name' => 'required|string|min:6|max:30',
        ]);

        $skill->update([
            'name' => $request->name,
        ]);
        return redirect()->route('dashboard.skills.view')->with('success', 'Skill updated successfully');
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();
        return back()->with('success', 'Skill deleted successfully');
    }
}
