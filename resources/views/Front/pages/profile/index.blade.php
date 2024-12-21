@extends('Front.layouts.master')
@section('front.content')
    <!-- Profile Page Content -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <x-error></x-error>
                <x-success></x-success>
            </div>
            <!-- Profile Sidebar -->
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <!-- Profile Picture -->
                        <img src="{{ $user->image() }}" alt="Profile Picture" class="img-fluid rounded-circle mb-3">
                        <h5 class="card-title">{{ $user->name }}</h5>
                        {{-- <p class="text-muted">Web Developer & Designer</p> --}}
                        <a href="{{ route('front.profile.edit', $user->id) }}" class="btn btn-primary mt-2">Edit Profile</a>
                    </div>
                </div>
                <!-- Additional Info -->
                <div class="card mb-4">
                    <div class="card-header">About</div>
                    <div class="card-body">
                        @if ($user->about)
                            <p>{{ $user->about }}</p>
                        @else
                            <span class="badge bg-danger rounded my-1">No About available</span>
                        @endif
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">Phone</div>
                    <div class="card-body">
                        @if ($user->phone)
                            <p>{{ $user->phone }}</p>
                        @else
                            <span class="badge bg-danger rounded my-1">No Phone available</span>
                        @endif
                    </div>
                </div>
                <!-- Categories or Skills -->
                <div class="card mb-4">
                    <div class="card-header">Skills</div>
                    <div class="card-body">
                        <ul class="list-unstyled mb-0">
                            @forelse ($user->skill as $skill)
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i>{{ $skill->name }}</li>
                            @empty
                                <span class="badge bg-danger rounded my-1">
                                    No Skills!
                                </span>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Profile Main Content -->
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-header">Social Media</div>
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <li class="mb-3">
                                <i>
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="22" height="22"
                                        viewBox="0 0 50 50">
                                        <path
                                            d="M25,3C12.85,3,3,12.85,3,25c0,11.03,8.125,20.137,18.712,21.728V30.831h-5.443v-5.783h5.443v-3.848 c0-6.371,3.104-9.168,8.399-9.168c2.536,0,3.877,0.188,4.512,0.274v5.048h-3.612c-2.248,0-3.033,2.131-3.033,4.533v3.161h6.588 l-0.894,5.783h-5.694v15.944C38.716,45.318,47,36.137,47,25C47,12.85,37.15,3,25,3z">
                                        </path>
                                    </svg>
                                </i>
                                @if ($user->linkedin)
                                    <a href="{{ $user->facebook }}" target="_blank" class="text-decoration-none">
                                        {{ $user->facebook }}
                                    </a>
                                @else
                                    <span class="badge bg-danger rounded my-1">No Facebook link available</span>
                                @endif

                            </li>
                            <li class="mb-3">
                                <i>
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="22" height="22"
                                        viewBox="0 0 30 30">
                                        <path
                                            d="M24,4H6C4.895,4,4,4.895,4,6v18c0,1.105,0.895,2,2,2h18c1.105,0,2-0.895,2-2V6C26,4.895,25.105,4,24,4z M10.954,22h-2.95 v-9.492h2.95V22z M9.449,11.151c-0.951,0-1.72-0.771-1.72-1.72c0-0.949,0.77-1.719,1.72-1.719c0.948,0,1.719,0.771,1.719,1.719 C11.168,10.38,10.397,11.151,9.449,11.151z M22.004,22h-2.948v-4.616c0-1.101-0.02-2.517-1.533-2.517 c-1.535,0-1.771,1.199-1.771,2.437V22h-2.948v-9.492h2.83v1.297h0.04c0.394-0.746,1.356-1.533,2.791-1.533 c2.987,0,3.539,1.966,3.539,4.522V22z">
                                        </path>
                                    </svg>
                                </i>
                                @if ($user->linkedin)
                                    <a href="{{ $user->linkedin }}" target="_blank" class="text-decoration-none">
                                        {{ $user->linkedin }}
                                    </a>
                                @else
                                    <span class="badge bg-danger rounded my-1">No LinkedIn link available</span>
                                @endif
                            </li>
                            <li>
                                <i>
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="22" height="22"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M10.9,2.1c-4.6,0.5-8.3,4.2-8.8,8.7c-0.5,4.7,2.2,8.9,6.3,10.5C8.7,21.4,9,21.2,9,20.8v-1.6c0,0-0.4,0.1-0.9,0.1 c-1.4,0-2-1.2-2.1-1.9c-0.1-0.4-0.3-0.7-0.6-1C5.1,16.3,5,16.3,5,16.2C5,16,5.3,16,5.4,16c0.6,0,1.1,0.7,1.3,1c0.5,0.8,1.1,1,1.4,1 c0.4,0,0.7-0.1,0.9-0.2c0.1-0.7,0.4-1.4,1-1.8c-2.3-0.5-4-1.8-4-4c0-1.1,0.5-2.2,1.2-3C7.1,8.8,7,8.3,7,7.6c0-0.4,0-0.9,0.2-1.3 C7.2,6.1,7.4,6,7.5,6c0,0,0.1,0,0.1,0C8.1,6.1,9.1,6.4,10,7.3C10.6,7.1,11.3,7,12,7s1.4,0.1,2,0.3c0.9-0.9,2-1.2,2.5-1.3 c0,0,0.1,0,0.1,0c0.2,0,0.3,0.1,0.4,0.3C17,6.7,17,7.2,17,7.6c0,0.8-0.1,1.2-0.2,1.4c0.7,0.8,1.2,1.8,1.2,3c0,2.2-1.7,3.5-4,4 c0.6,0.5,1,1.4,1,2.3v2.6c0,0.3,0.3,0.6,0.7,0.5c3.7-1.5,6.3-5.1,6.3-9.3C22,6.1,16.9,1.4,10.9,2.1z">
                                        </path>
                                    </svg>
                                </i>
                                @if ($user->linkedin)
                                    <a href="{{ $user->github }}" target="_blank" class="text-decoration-none">
                                        {{ $user->github }}
                                    </a>
                                @else
                                    <span class="badge bg-danger rounded my-1">No GitHub link available</span>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>


                <!-- Your Posts -->
                <div class="card mb-4">
                    <div class="card-header">Your Posts</div>
                    <div class="card-body">
                        <!-- Check if user has posts -->
                        @if ($user->post->isEmpty())
                            <span class="badge bg-danger rounded my-1"> You haven't created any posts yet. </span>
                            {{-- <p class="text-muted">You haven't created any posts yet.</p> --}}
                        @else
                            <ul class="list-group list-group-flush">
                                @foreach ($user->post as $post)
                                    <li class="list-group-item">
                                        <h5 class="mb-1">
                                            <a href="{{ route('front.posts.show', $post->id) }}"
                                                class="text-decoration-none">{{ $post->title }}</a>
                                        </h5>
                                        <small class="text-muted">Posted on
                                            {{ $post->created_at->format('F j, Y') }}</small>
                                        <div class="mt-2">
                                            <a href="{{ route('front.posts.edit', $post->id) }}"
                                                class="btn btn-sm btn-primary">
                                                <i class="bi bi-pencil"></i> Edit
                                            </a>
                                            <form action="{{ route('front.posts.destroy', $post->id) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="bi bi-trash"></i> Delete
                                                </button>
                                            </form>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
