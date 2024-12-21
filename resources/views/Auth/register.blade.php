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

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow-lg" style="width: 400px;">
        <div class="card-body">
            <h3 class="card-title text-center mb-4">Create Account</h3>

            <form action="{{ route('register') }}" method="POST" novalidate>
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                        required>
                </div>

                <div class="mb-3 text-center">
                    <button type="submit" class="btn btn-primary w-100">Register</button>
                </div>

                <div class="text-center">
                    <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
                </div>
            </form>
        </div>
    </div>
</div>
@extends('Front.layouts.footer')
