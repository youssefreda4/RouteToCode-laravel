@extends('Front.layouts.master')
@section('front.content')
    <section class="py-5">
        <div class="container px-5 my-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-12 text-center mb-5">
                    <div class=" rounded-3 p-4 bg-primary text-white shadow">
                        <h2 class="fw-bolder">{{ $category->name }}</h2>
                    </div>
                </div>
            </div>

            <div class="row gx-5">
                @foreach ($category->post as $post)
                    <div class="col-12 mb-5">
                        <div class="card border-0 shadow rounded-3 overflow-hidden">
                            <div class="card-body p-0">
                                <div class="row gx-0">
                                    <div class="col-lg-6 col-xl-5 py-lg-5">
                                        <div class="p-4 p-md-5">
                                            <div class="badge bg-primary bg-gradient rounded-pill mb-2">
                                                {{ $post->category->name }}</div>
                                            <div class=" mb-3">
                                                @forelse ($post->tag as $tag)
                                                    <a href="{{ route('front.posts.tag', $tag->id) }}"
                                                        class="text-decoration-none">
                                                        <span
                                                            class="badge bg-warning rounded-pill my-1">{{ $tag->name }}</span>
                                                    </a>
                                                @empty
                                                    <span class="badge bg-danger rounded-pill my-1">
                                                        No tags!
                                                    </span>
                                                @endforelse
                                            </div>

                                            <div class="d-flex align-items-center mb-3">
                                                <img class="rounded-circle me-3" src="{{ $post->user->image() }}"
                                                    alt="..." width="50px" />
                                                <a class="text-decoration-none"
                                                    href="{{ route('front.profile.show', $post->user->id) }}">
                                                    <div class="small">
                                                        <div class="fw-bold">{{ $post->user->name }}</div>
                                                        <div class="text-muted">{{ $post->created_at->format('d M  Y') }}
                                                            &middot;
                                                            {{ $post->created_at->diffForHumans() }}</div>
                                                    </div>
                                                </a>
                                            </div>

                                            <div class="h2 fw-bolder">{{ $post->title }}</div>
                                            <p>{{ Str::limit($post->description, 150, ' .......') }}</p>

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
                                                    <a href="{{ route('front.posts.edit', $post->id) }}"
                                                        class="btn btn-primary me-2">
                                                        <i class="bi bi-pencil"></i> Edit Post
                                                    </a>

                                                    <form action="{{ route('front.posts.destroy', $post->id) }}"
                                                        method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-outline-danger">Delete</button>
                                                    </form>
                                                </div>
                                            @endif

                                            <div class="mb-2">
                                                <a class="text-decoration-none"
                                                    href="{{ route('front.posts.show', $post->id) }}">
                                                    Show Post
                                                    <i class="bi bi-arrow-right"></i>
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                    @if ($post->image != null)
                                        <div class="col-lg-6 col-xl-7 d-flex justify-content-center">
                                            <div class="d-flex justify-content-center">
                                                <img src="{{ $post->image() }}" alt="" class="rounded img-fluid"
                                                    style="max-width: 100%; height: auto;">
                                            </div>
                                        </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{-- <div class="p-3">
                    {{ $posts->links() }}
                </div> --}}
            </div>
        </div>
    </section>
@endsection
