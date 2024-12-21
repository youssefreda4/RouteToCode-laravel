@extends('Front.layouts.master')
@section('front.content')
    <!-- Profile Page Content -->
    <div class="container mt-5">
        <div class="row">
            <!-- Profile Main Content -->
            <div class="col-lg-12">
                <x-error></x-error>
                <x-success></x-success>
                <!-- Editable Profile Details -->
                <div class="card mb-4">
                    <div class="card-header">Edit Profile Details</div>
                    <div class="card-body">
                        <form action="{{ route('front.profile.update', $user->id) }}" method="POST"
                            enctype="multipart/form-data" novalidate>

                            @method('PUT')
                            @csrf

                            <div class="card-body">
                                <!-- Name Field -->
                                <div class="mb-3">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        placeholder="User Name" value="{{ $user->name }}" required>
                                </div>

                                <!-- Email Field -->
                                <div class="mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="User Email" value="{{ $user->email }}" required>
                                </div>

                                <!-- phone Field -->
                                <div class="mb-3">
                                    <label for="phone">Phone (Egypt - +20)</label>
                                    <input type="number" class="form-control" name="phone" placeholder="Phone Number"
                                        value="{{ $user->phone }}" required>
                                </div>

                                <!-- about Field -->
                                <div class="mb-3">
                                    <label for="about">About</label>
                                    <textarea name="about" class="form-control" placeholder="About You" cols="30" rows="4">{{ $user->about }}</textarea>
                                </div>


                                <!-- address Field -->
                                <div class="mb-3">
                                    <label for="address">Adress</label>
                                    <input type="text" class="form-control" name="address" placeholder="Address Name"
                                        value="{{ $user->address }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="">Skills</label>
                                    <select name="skills[]" class="form-control" multiple>
                                        @foreach ($skills as $skill)
                                            <option @if ($user->skill->contains('id', $skill->id)) selected @endif
                                                value="{{ $skill->id }}">{{ $skill->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="facebook" class="form-label">Facebook</label>
                                    <input type="url" name="facebook" id="facebook" class="form-control"
                                        placeholder="https://facebook.com/your-profile"
                                        value="{{ value($user->facebook) }}">
                                </div>

                                <div class="mb-3">
                                    <label for="github" class="form-label">GitHub</label>
                                    <input type="url" name="github" id="github" class="form-control"
                                        placeholder="https://github.com/your-profile" value="{{ value($user->github) }}">
                                </div>

                                <div class="mb-3">
                                    <label for="linkedin" class="form-label">LinkedIn</label>
                                    <input type="url" name="linkedin" id="linkedin" class="form-control"
                                        placeholder="https://linkedin.com/in/your-profile"
                                        value="{{ value($user->linkedin) }}">
                                </div>

                                <!-- Image Field -->
                                <div class="mb-3">
                                    <label for="image" class="form-label">Image</label>
                                    <input type="file" class="form-control" name="image" id="image">
                                </div>


                                {{-- Image view --}}
                                @if ($user->image != null)
                                    <label for="image">Photo</label>
                                    <div class="mb-3 ">
                                        <img src="{{ $user->image() }}" width="700px" class="rounded" alt="">
                                    </div>
                                @endif

                                <!-- Password Field -->
                                <div class="mb-3">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" id="password"
                                        placeholder="Password" required>
                                </div>

                                <!-- Confirm Password Field -->
                                <div class="mb-3">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <input type="password" class="form-control" name="password_confirmation"
                                        id="password_confirmation" placeholder="Confirm Password" required>
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary">update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
