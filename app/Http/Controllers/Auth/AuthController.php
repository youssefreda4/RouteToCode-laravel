<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register()
    {
        return view('Auth.register');
    }

    public function login()
    {
        return view('Auth.login');
    }

    public function storeRegister(RegisterRequest $request)
    {
        $data = $request->validated();
        $user = User::create($data);
        Auth::login($user);
        return redirect()->route('front.home');
    }

    public function storeLogin(LoginRequest $request)
    {
        $data = $request->validated();
        if (Auth::guard('admin')->attempt($data)) {
            $user = Auth::guard('admin')->user();
            Auth::login($user);
            return redirect()->route('dashboard.home');
        } elseif (Auth::guard('web')->attempt($data)) {
            $user = Auth::guard('web')->user();
            Auth::login($user);
            return redirect()->route('front.home');
        }
        return back()->withErrors(['error' => 'Incorrect email or password']);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        Auth::guard('web')->logout();
        return redirect()->route('front.home');
    }
}
