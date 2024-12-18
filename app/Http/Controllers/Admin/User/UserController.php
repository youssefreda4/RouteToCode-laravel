<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EditUserRequest;
use App\Http\Requests\Admin\UserRequest;
use App\Models\Skill;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'DESC')->paginate('12');
        return view('Admin.pages.users.index', compact('users'));
    }

    public function show(User $user)
    {
        $user->with('post', 'skill')->get();
        return view('Admin.pages.users.show', compact('user'));
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $request->validate([
            'search' => 'required|string',
        ]);
        $users = User::orderBy('id', 'DESC')
            ->where('name', 'LIKE', '%' . $search . '%')
            ->paginate('12')
            ->withQueryString();
        return view('Admin.pages.users.index', compact('users'));
    }

    public function create()
    {
        $skills = Skill::all();
        return view('Admin.pages.users.create', compact('skills'));
    }

    public function store(UserRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('/public/users');
        }
        $data['image'] = $image;
        $user = User::create($data);
        $user->skill()->sync($request->skills);

        return redirect()->route('dashboard.users.view')->with('success', 'User created successfully');
    }

    public function edit(User $user)
    {
        $skills = Skill::all();
        return view('Admin.pages.users.edit', compact('user', 'skills'));
    }

    public function update(EditUserRequest $request, User $user)
    {
        $data = $request->validated();
        $imageNAme = $user->image;
        if ($request->hasFile('image')) {
            File::delete($imageNAme);
            $imageNAme = $request->file('image')->store('/public/users');
        }
        $data['password'] = $request->has('password') ? bcrypt($request->password) : $data->password;
        $data['image'] = $imageNAme;
        $data['about'] = nl2br($request->about);
        $user->update($data);
        // $user->skill()->detach();
        $user->skill()->sync($request->skills);
        return redirect()->route('dashboard.users.view')->with('success', 'User updated successfully');
    }

    public function destroy(User $user)
    {
        $imageNAme = $user->image;
        File::delete($imageNAme);
        $user->delete();
        return back()->with('success', 'User deleted successfully');
    }
}
