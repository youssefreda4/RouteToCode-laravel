<?php

namespace App\Http\Controllers\Admin\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminRequest;
use App\Http\Requests\Admin\EditAdminRequest;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::orderBy('id', 'DESC')->paginate('12');
        return view('Admin.pages.admins.index', compact('admins'));
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $request->validate([
            'search' => 'required|string',
        ]);
        $admins = Admin::orderBy('id', 'DESC')
            ->where('name', 'LIKE', '%' . $search . '%')
            ->paginate('12')
            ->withQueryString();
        return view('Admin.pages.admins.index', compact('admins'));
    }

    public function create()
    {
        return view('Admin.pages.admins.create');
    }

    public function store(AdminRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('/public/admins');
        }
        $data['image'] = $image;
        Admin::create($data);

        return redirect()->route('dashboard.admins.view')->with('success', 'Admin created successfully');
    }

    public function edit(Admin $admin)
    {
        return view('Admin.pages.admins.edit', compact('admin'));
    }

    public function update(EditAdminRequest $request, Admin $admin)
    {
        $data = $request->validated();
        $imageNAme = $admin->image;
        if ($request->hasFile('image')) {
            File::delete($imageNAme);
            $imageNAme = $request->file('image')->store('/public/admins');
        }
        $data['password'] = $request->has('password') ? bcrypt($request->password) : $data->password;
        $data['image'] = $imageNAme;
        $admin->update($data);
        return redirect()->route('dashboard.admins.view')->with('success', 'Admin updated successfully');
    }

    public function destroy(Admin $admin)
    {
        $imageNAme = $admin->image;
        File::delete($imageNAme);
        $admin->delete();
        return back()->with('success', 'Admin deleted successfully');
    }
}
