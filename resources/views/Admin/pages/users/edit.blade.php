@extends('Admin.layouts.master')
@section('admin.content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Create User</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Create User</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <x-error></x-error>
                        <x-success></x-success>

                        <div class="card card-primary">

                            <!-- form start -->

                            <form action="{{ route('dashboard.users.update', $user->id) }}" method="POST"
                                enctype="multipart/form-data" novalidate>

                                @method('PUT')
                                @csrf

                                <div class="card-body">
                                    <!-- Name Field -->
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" name="name" id="name"
                                            placeholder="User Name" value="{{ $user->name }}" required>
                                    </div>

                                    <!-- Email Field -->
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" name="email" id="email"
                                            placeholder="User Email" value="{{ $user->email }}" required>
                                    </div>

                                    <!-- phone Field -->
                                    <div class="form-group">
                                        <label for="phone">Phone (Egypt - +20)</label>
                                        <input type="text" class="form-control" name="phone" placeholder="Phone Number"
                                            value="{{ $user->phone }}" required>
                                    </div>

                                    <!-- about Field -->
                                    <div class="form-group">
                                        <label for="about">About</label>
                                        <textarea name="about" class="form-control" placeholder="About You" cols="30" rows="4">
                                            {{ $user->about }}
                                        </textarea>
                                    </div>

                                    <!-- address Field -->
                                    <div class="form-group">
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


                                    <!-- Image Field -->
                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="image"
                                                    id="image">
                                                <label class="custom-file-label" for="image">Choose file</label>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Image view --}}
                                    @if ($user->image != null)
                                        <label for="image">Photo</label>
                                        <div class="mb-3 ">
                                            <img src="{{ $user->image() }}" width="700px" class="rounded" alt="">
                                        </div>
                                    @endif

                                    <!-- Password Field -->
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" name="password" id="password"
                                            placeholder="Password" required>
                                    </div>

                                    <!-- Confirm Password Field -->
                                    <div class="form-group">
                                        <label for="password_confirmation">Confirm Password</label>
                                        <input type="password" class="form-control" name="password_confirmation"
                                            id="password_confirmation" placeholder="Confirm Password" required>
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">update</button>
                                </div>
                            </form>

                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- / col -->
    </div>
@endsection
