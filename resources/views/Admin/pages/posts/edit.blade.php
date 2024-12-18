@extends('Admin.layouts.master')
@section('admin.content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Post</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Edit Post</li>
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

                            <form action="{{ route('dashboard.posts.update', $post->id) }}" method="POST"
                                class="form border rounded p-3" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf

                                <div class="mb-3">
                                    <label for="title" class="form-label">Post Title</label>
                                    <input type="text" class="form-control" value="{{ $post->title }}" name="title"
                                        id="title" placeholder="Enter post title">
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Post Description</label>
                                    <textarea class="form-control" name="description" id="description" cols="30" rows="5"
                                        placeholder="Enter post description">{{ $post->description }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="">Tags</label>
                                    <select name="tags[]" class="form-control" multiple>
                                        @foreach ($tags as $tag)
                                            <option @if ($post->tag->contains('id', $tag->id)) selected @endif
                                                value="{{ $tag->id }}">{{ $tag->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="">Categories</label>
                                    <select name="category_id" class="form-control">
                                        <option selected>Select Category</option>
                                        @foreach ($categories as $category)
                                            <option @selected($post->category_id == $category->id) value="{{ $category->id }}">
                                                {{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Image Field -->
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="image" id="image">
                                            <label class="custom-file-label" for="image">Choose file</label>
                                        </div>
                                    </div>
                                </div>

                                {{-- Image view --}}
                                @if ($post->image != null)
                                    <label for="image">Photo</label>
                                    <div class="mb-3 ">
                                        <img src="{{ $post->image() }}" width="700px" class="rounded" alt="">
                                    </div>
                                @endif

                                <div class="mb-3 ">
                                    <input type="submit" class="btn btn-primary" value="Update">
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
