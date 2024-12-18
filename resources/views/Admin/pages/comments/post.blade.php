@extends('Admin.layouts.master')
@section('admin.content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Show Post</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Show Post</li>
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
                        <div>
                            <x-error></x-error>
                            <x-success></x-success>
                        </div>
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <!-- Post content-->
                                <article>
                                    <!-- Post header-->
                                    <header class="mb-4">
                                        <!-- Post title-->
                                        <h1 class="fw-bolder mb-1">{{ $comment->post->title }}</h1>
                                        <!-- Post meta content-->
                                        <div class="text-muted fst-italic mb-2">Posted on
                                            {{ $comment->post->created_at->diffForHumans() }} by
                                            <strong>{{ $comment->post->user->name }}</strong>
                                        </div>
                                        <span
                                            class="badge bg-info my-1 my-1 fs-4 px-3 py-2 my-1">{{ $comment->post->category->name }}</span>
                                        <!-- Post categories-->
                                        @forelse ($comment->post->tag as $tag)
                                            <span
                                                class="badge bg-warning my-1 my-1 fs-4 px-3 py-2 my-1">{{ $tag->name }}</span>
                                        @empty
                                            <span class="badge bg-danger my-1 fs-4 px-3 py-2 my-1">
                                                No tags!
                                            </span>
                                        @endforelse
                                    </header>
                                    <!-- Preview image figure-->
                                    <figure class="mb-4"><img class="img-fluid rounded"
                                            src="{{ $comment->post->image() }}" width="500px" alt="..." />
                                    </figure>
                                    <!-- Post content-->
                                    <section class="mb-5">
                                        <p class="fs-5 mb-4">{{ $comment->post->description }}</p>
                                    </section>
                                </article>
                                <!-- Comments section-->
                                <section class="mb-5">
                                    <div class="card bg-light">
                                        <div class="card-body">
                                            <!-- Single comment-->
                                            <div class="d-flex">
                                                <div class="flex-shrink-0"><img class="rounded-circle"
                                                        src="https://dummyimage.com/50x50/ced4da/6c757d.jpg"
                                                        alt="..." /></div>
                                                <div class="ms-3 ml-2">
                                                    <div class="fw-bold">{{ $comment->user->name }}</div>
                                                    {{ $comment->content }}
                                                </div>
                                            </div>
                                            <div class="mt-3 ml-1">
                                                <!-- Delete Button -->
                                                <form action="{{ route('dashboard.comments.destroy', $comment->id) }}"
                                                    method="post" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">
                                                        <i>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor" class="bi bi-trash3-fill"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5" />
                                                            </svg>
                                                        </i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
