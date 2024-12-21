@extends('Front.layouts.header')
<style>
    /* Add background image to the body */
    body {
        background-image: url({{ asset('front/assets/image/laravel.png') }});
        /* Replace with your image URL */
        background-size: cover;
        background-position: center;
        height: 100vh;
        margin: 0;
    }

    /* Optional: Add a background overlay */
    .overlay {
        background: rgba(0, 0, 0, 0.5);
        /* Dark overlay */
        height: 100%;
        width: 100%;
        position: absolute;
        top: 0;
        left: 0;
    }

    /* Center the content */
    .container {
        z-index: 1;
    }
</style>

<div class="overlay"></div>

<div class="container d-flex justify-content-center align-items-center vh-100 position-relative">
    <div class="card shadow-lg" style="width: 400px;">
        <div class="card-body">
            <h3 class="card-title text-center mb-4">Login </h3>
            <x-error></x-error>
            <form action="{{ route('login') }}" method="POST" novalidate>
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                    
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                    
                </div>

                <div class="mb-3 text-center">
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </div>
                <div class="text-center">
                    <p>Don't have an account? <a href="{{ route('register') }}">Sign up </a></p>
                </div>

            </form>
        </div>
    </div>
</div>
@extends('Front.layouts.footer')
