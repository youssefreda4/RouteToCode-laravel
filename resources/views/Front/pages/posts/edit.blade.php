@extends('Front.layouts.master')
@section('front.content')
    <section class="py-3">
        <div class="container">
            <div class="row ">
                <div class="col-12">
                    <x-error></x-error>
                    <x-success></x-success>
                    <form action="{{ route('front.posts.store') }}" method="POST" class="form  p-3"
                        enctype="multipart/form-data">

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
                                    <option @if ($post->tag->contains('id', $tag->id)) selected @endif value="{{ $tag->id }}">
                                        {{ $tag->name }}</option>
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
                        <div class="mb-4">
                            <label for="image">Image</label>
                            <input type="file" class="form-control" class="custom-file-input" name="image">
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
            </div>
        </div>
    </section>
@endsection
