<?php

namespace App\Http\Controllers\Front\Profile;

use App\Models\User;
use App\Models\Skill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Front\EditUserRequest;

class ProfileController extends Controller
{
    public function index()
    {
        $userId = Auth::user()->id;
        $user = User::where('id', $userId)
            ->first();
        return view('Front.pages.profile.index', compact('user'));
    }

    public function show(User $user)
    {
        return view('Front.pages.profile.show', compact('user'));
    }

    public function edit(User $user)
    {
        $skills = Skill::all();
        return view('Front.pages.profile.edit', compact('user','skills'));
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
        if ($request->has('about')) {
            $data['about'] = nl2br($request->about);
        }
        $user->update($data);
        // $user->skill()->detach();
        $user->skill()->sync($request->skills);
        return redirect()->route('front.profile.view')->with('success', 'Profile updated successfully');
    }
}
