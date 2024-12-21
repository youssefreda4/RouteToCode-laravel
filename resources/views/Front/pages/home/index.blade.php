@extends('Front.layouts.master')
@section('front.content')
    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-5">
            <div class="row gx-5 align-items-center justify-content-center">
                <div class="col-lg-8 col-xl-7 col-xxl-6">
                    <div class="my-5 text-center text-xl-start">
                        <h2 class="fw-bolder text-white mb-2">Your Guide to the Developer's Path
                        </h2>
                        <p class="lead fw-normal text-white-50 mb-4">Welcome to RouteToCode a blog for developers navigating
                            the world of programming. Whether you're a beginner or an expert, find insights, tips, and
                            tutorials to guide your coding journey and fuel your innovation</p>
                        {{-- <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                            <a class="btn btn-primary btn-lg px-4 me-sm-3" href="#features">Get Started</a>
                            <a class="btn btn-outline-light btn-lg px-4" href="#!">Learn More</a>
                        </div> --}}
                    </div>
                </div>
                <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"><img class="img-fluid rounded-3 my-5"
                        src="{{ asset('front') }}/assets/image/laravel.png" alt="..." /></div>
            </div>
        </div>
    </header>
    <!-- Features Section -->
    <section class="py-5" id="features">
        <div class="container px-5 my-5">
            <div class="row gx-5">
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h2 class="fw-bolder mb-0">Empowering Developers, One Step at a Time.</h2>
                </div>
                <div class="col-lg-8">
                    <div class="row gx-5 row-cols-1 row-cols-md-2">
                        <div class="col mb-5 h-100">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3">
                                <i class="bi bi-code-slash"></i>
                            </div>
                            <h2 class="h5">In-Depth Tutorials</h2>
                            <p class="mb-0">Master programming concepts with step-by-step guides tailored for all skill
                                levels.</p>
                        </div>
                        <div class="col mb-5 h-100">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3">
                                <i class="bi bi-lightbulb"></i>
                            </div>
                            <h2 class="h5">Expert Tips</h2>
                            <p class="mb-0">Get practical advice and coding best practices from experienced developers.
                            </p>
                        </div>
                        <div class="col mb-5 mb-md-0 h-100">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3">
                                <i class="bi bi-diagram-3"></i>
                            </div>
                            <h2 class="h5">Project Ideas</h2>
                            <p class="mb-0">Explore creative project ideas to sharpen your skills and build your
                                portfolio.</p>
                        </div>
                        <div class="col h-100">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3">
                                <i class="bi bi-chat-dots"></i>
                            </div>
                            <h2 class="h5">Community Insights</h2>
                            <p class="mb-0">Stay connected with developer trends and insights from the coding community.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonial Section -->
    <div class="py-5 bg-light">
        <div class="container px-5 my-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-10 col-xl-7">
                    <div class="text-center">
                        <div class="d-flex align-items-center justify-content-center">
                            <img class="rounded-circle me-3" src="{{ asset('default.png') }}" alt="User Avatar"
                                width="60px" />
                            <div class="fw-bold">
                                Yousser Reda
                                <span class="fw-bold text-primary mx-1">/</span>
                                Back-End Developer
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Blog preview section-->
    <section class="py-5">
        <div class="container px-5 my-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-8 col-xl-6">
                    <div class="text-center">
                        <h2 class="fw-bolder">Latest Posts from RouteToCode</h2>
                        <p class="lead fw-normal text-muted mb-5">Don’t miss out! . Be part of the community shaping the
                            future of coding.</p>
                    </div>
                </div>
            </div>


            <div class="row gx-5">
                @foreach ($posts as $post)
                    <div class="col-lg-4 mb-5">
                        <div class="card h-100 shadow border-0">
                            <img class="card-img-top" src="{{ $post->image() }}" width="600" height="350"
                                alt="..." />
                            <div class="card-body p-4">
                                <div class="badge bg-primary bg-gradient rounded-pill mb-2">{{ $post->category->name }}
                                </div>
                                {{-- <a class="text-decoration-none link-dark stretched-link" href="#!"> --}}
                                    <h5 class="card-title mb-3">{{ $post->title }}</h5>
                                {{-- </a> --}}
                                <p class="card-text mb-0">{{ $post->description }}</p>
                            </div>
                            <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                <div class="d-flex align-items-end justify-content-between">
                                    <div class="d-flex align-items-center">
                                        @if ($post->image != null)
                                            <img class="rounded-circle me-3" src="{{ $post->user->image() }}" alt="..."
                                                width="50px" />
                                        @endif
                                        <div class="small">
                                            <div class="fw-bold">{{ $post->user->name }}</div>
                                            <div class="text-muted">{{ $post->created_at->format('d M  Y') }} &middot;
                                                {{ $post->created_at->diffForHumans() }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


                {{-- <div class="col-lg-4 mb-5">
                    <div class="card h-100 shadow border-0">
                        <img class="card-img-top" src="https://dummyimage.com/600x350/adb5bd/495057" alt="..." />
                        <div class="card-body p-4">
                            <div class="badge bg-primary bg-gradient rounded-pill mb-2">Media</div>
                            <a class="text-decoration-none link-dark stretched-link" href="#!">
                                <h5 class="card-title mb-3">Another blog post title</h5>
                            </a>
                            <p class="card-text mb-0">This text is a bit longer to illustrate the adaptive height
                                of each card. Some quick example text to build on the card title and make up the
                                bulk of the card's content.</p>
                        </div>
                        <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                            <div class="d-flex align-items-end justify-content-between">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d"
                                        alt="..." />
                                    <div class="small">
                                        <div class="fw-bold">Josiah Barclay</div>
                                        <div class="text-muted">March 23, 2023 &middot; 4 min read</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-5">
                    <div class="card h-100 shadow border-0">
                        <img class="card-img-top" src="https://dummyimage.com/600x350/6c757d/343a40" alt="..." />
                        <div class="card-body p-4">
                            <div class="badge bg-primary bg-gradient rounded-pill mb-2">News</div>
                            <a class="text-decoration-none link-dark stretched-link" href="#!">
                                <h5 class="card-title mb-3">The last blog post title is a little bit longer than
                                    the others</h5>
                            </a>
                            <p class="card-text mb-0">Some more quick example text to build on the card title and
                                make up the bulk of the card's content.</p>
                        </div>
                        <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                            <div class="d-flex align-items-end justify-content-between">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d"
                                        alt="..." />
                                    <div class="small">
                                        <div class="fw-bold">Evelyn Martinez</div>
                                        <div class="text-muted">April 2, 2023 &middot; 10 min read</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
            <!-- Call to action-->
            @guest
                <aside class="bg-primary bg-gradient rounded-3 p-4 p-sm-5 mt-5">
                    <div
                        class="d-flex align-items-center justify-content-between flex-column flex-xl-row text-center text-xl-start">
                        <div class="mb-4 mb-xl-0">
                            <div class="fs-3 fw-bold text-white">Join Us at RouteToCode!</div>
                            <div class="text-white-50">Sign up to become part of our developer community and get access to the
                                latest tutorials, tips, and coding resources.</div>
                        </div>
                        <div class="ms-xl-4">
                            <a href="{{ route('register') }}" class="btn btn-outline-light">Register Now</a>
                        </div>
                    </div>
                </aside>
            @endguest

        </div>
    </section>
@endsection
