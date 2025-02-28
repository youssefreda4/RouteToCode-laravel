@extends('Front.layouts.master')
@section('front.content')
    <section class="py-5">
        <div class="container px-5 my-5">
            <div class="row gx-5">

                <div class="col-lg-12">
                    <!-- Post content-->
                    <article>
                        <!-- Post header-->
                        <header class="mb-4">
                            <!-- Post title-->
                            <h1 class="fw-bolder mb-1">{{ $post->title }}</h1>
                            <!-- Post meta content-->
                            <div class="text-muted fst-italic mb-2">{{ $post->created_at->format('d M  Y') }} -
                                {{ $post->created_at->diffForHumans() }}</div>
                            <!-- Post categories-->
                            <a class="badge bg-primary text-decoration-none link-light"
                                href="{{ route('front.posts.category', $post->category->id) }}">{{ $post->category->name }}</a>
                            <div class="mt-3">
                                @forelse ($post->tag as $tag)
                                    <span class="badge bg-warning rounded my-1">{{ $tag->name }}</span>
                                @empty
                                    <span class="badge bg-danger rounded my-1">
                                        No tags!
                                    </span>
                                @endforelse
                            </div>
                        </header>
                        <!-- Preview image figure-->
                        @if ($post->image != null)
                            <figure class="mb-3"><img class="img-fluid rounded" src="{{ $post->image() }}" width="900px"
                                    height="400px" alt="..." /></figure>
                        @endif
                        <div class="d-flex align-items-center">
                            <img class="rounded-circle me-3" src="{{ $post->user->image() }}" alt="..." width="80px"
                                height="80px" />
                            <a class="text-decoration-none" href="{{ route('front.profile.show', $post->user->id) }}">
                                <div class="small">
                                    <div class="fw-bold" style="font-size: 1.25rem;">{{ $post->user->name }}</div>
                                </div>
                            </a>
                        </div>

                        <!-- Post content-->
                        <section class="mb-3">
                            <h3 class="fw-bolder mb-4 mt-5">Description :</h3>
                            <p class="fs-5 mb-4">{{ $post->description }}</p>

                        </section>

                        <form action="{{ route('front.likes.store', $post->id) }}" method="POST"
                            class="d-flex align-items-center mb-3">
                            @csrf
                            <button type="submit"
                                class="btn btn-outline-primary me-2 rounded
                            {{ $post->like->where('user_id', auth()->id())->isNotEmpty() ? 'active' : '' }}">
                                <i class="bi bi-heart"></i> Like {{ count($post->like) }}
                            </button>
                        </form>

                        @if ($post->user_id == auth()->user()->id)
                            <div class="d-flex align-items-center mb-3">
                                <a href="{{ route('front.posts.edit', $post->id) }}" class="btn btn-outline-primary me-2">
                                    <i class="bi bi-pencil"></i> Edit Post
                                </a>

                                <form action="{{ route('front.posts.destroy', $post->id) }}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger">
                                        <i class="pe-1 bi bi-trash"></i>Delete
                                    </button>
                                </form>
                            </div>
                        @endif

                    </article>
                    <!-- Comments section-->
                    <section>
                        <div class="card bg-light">
                            <div class="card-body">
                                <x-error></x-error>
                                <x-success></x-success>
                                <!-- Comment form-->
                                <form action="{{ route('front.comments.store', $post->id) }}" method="POST"
                                    class="mb-4">
                                    @csrf
                                    <div class="form-control">
                                        <label for="commentText" class="mb-2">Add Comment</label>
                                        <textarea class="form-control" name="comment" rows="4" placeholder="Join the discussion and leave a comment!"></textarea>

                                        <button type="submit" class="btn btn-primary mt-3 mb-3">Add</button>
                                    </div>
                                </form>


                                @forelse ($post->comment as $comment)
                                    <!-- Single comment-->
                                    <div class="d-flex mb-4 border p-3 rounded-3">
                                        <div class="flex-shrink-0">
                                            {{-- <img class="rounded-circle" src="{{ $comment->user->image() }}" width="50px"
                                                alt="..." /> --}}
                                            <img src="{{ Avatar::create($comment->user->name)->toBase64() }}" />
                                        </div>
                                        <div class="ms-3">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="fw-bold me-3">{{ $comment->user->name }}</div>
                                                <div class="text-muted ">
                                                    {{ $comment->created_at->diffForHumans() }}
                                                </div>
                                            </div>
                                            <p>{{ $comment->content }}</p>

                                            <!-- Delete button -->
                                            @if ($comment->user_id == auth()->user()->id || $post->user_id == auth()->user()->id)
                                                <form action="{{ route('front.comments.destroy', $comment->id) }}"
                                                    method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-outline-danger btn-sm me-3">Delete</button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                @empty
                                    <div class="text-center alert alert-info">
                                        No comments yet !
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
@endsection
