@extends('Admin.layouts.master')
@section('admin.content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">All Posts</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Home</a></li>
                            <li class="breadcrumb-item active">All Posts</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Main row -->
                <div class="row">
                    <!--  col -->
                    <div class="col-md-12">
                        <div class="mb-4">
                            <form action="{{ route('dashboard.posts.search') }}" method="GET" class="d-flex gap-2"
                                novalidate>
                                <input type="text" class="form-control" name="search" placeholder="Post Title" required>
                                <button type="submit" class="btn btn-primary ml-3">Search</button>
                            </form>
                        </div>
                        <div>
                            <x-error></x-error>
                            <x-success></x-success>
                        </div>
                        <div class="card">

                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th class="text-center">Developer</th>
                                            <th class="text-center">Title</th>
                                            <th class="text-center">Description</th>
                                            <th class="text-center"> Comments</th>
                                            <th class="text-center">Tags</th>
                                            <th class="text-center">Image</th>
                                            <th class="text-center">Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        @forelse ($posts as $post)
                                            <tr>
                                                <td>{{ $post->id }}</td>
                                                <td class="text-center">{{ $post->user->name }}</td>
                                                <td class="text-center">{{ $post->title }}</td>
                                                <td class="text-center">{{ $post->description }}</td>
                                                <td class="text-center">
                                                    @if (count($post->comment) != 0)
                                                        <a href="{{ route('dashboard.posts.comments', $post->id) }}">
                                                            <span
                                                                class="badge bg-success my-1 fs-4 px-3 py-2 my-1">{{ count($post->comment) }}</span>
                                                        </a>
                                                    @else
                                                        <span class="badge bg-danger my-1 fs-4 px-3 py-2 my-1">No comments yet!</span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @forelse ($post->tag as $tag)
                                                        <span class="badge bg-warning my-1 fs-4 px-3 py-2 my-1">{{ $tag->name }}</span>
                                                        <br>
                                                    @empty
                                                        <span class="badge bg-danger my-1 fs-4 px-3 py-2 my-1">
                                                            No tags!
                                                        </span>
                                                    @endforelse
                                                </td>
                                                <td class="text-center">
                                                    <img src="{{ $post->image() }}" width="100px">
                                                </td>
                                                <td class="text-center">
                                                    <!-- Edit Button -->
                                                    <div class="m-1">
                                                        <a href="{{ route('dashboard.posts.edit', $post->id) }}"
                                                            class="btn btn-warning">
                                                            <i>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor"
                                                                    class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                                    <path fill-rule="evenodd"
                                                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                                                </svg>
                                                            </i>
                                                        </a>
                                                    </div>

                                                    <div class="m-1">
                                                        <form action="{{ route('dashboard.users.search') }}"
                                                            method="GET">
                                                            <input type="hidden" name="search"
                                                                value="{{ $post->user->name }}">
                                                            <button type="submit" class="btn btn-info">
                                                                <i>
                                                                    <svg class="w-6 h-6 text-gray-800 dark:text-white"
                                                                        aria-hidden="true"
                                                                        xmlns="http://www.w3.org/2000/svg" width="16"
                                                                        height="16" fill="none" viewBox="0 0 24 24">
                                                                        <path stroke="currentColor" stroke-width="2"
                                                                            d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                                                                        <path stroke="currentColor" stroke-width="2"
                                                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                                    </svg>
                                                                </i>
                                                            </button>
                                                        </form>
                                                    </div>

                                                    <div class="m-1">
                                                        <!-- Delete Button -->
                                                        <form action="{{ route('dashboard.posts.destroy', $post->id) }}"
                                                            method="post" style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">
                                                                <i>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                        height="16" fill="currentColor"
                                                                        class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                                                        <path
                                                                            d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5" />
                                                                    </svg>
                                                                </i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>

                                            </tr>
                                        @empty
                                            <div class="text-center alert alert-info">
                                                There is no posts !
                                            </div>
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="p-3">
                                {{ $posts->links() }}
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
    </div>
@endsection
