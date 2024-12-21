@extends('Front.layouts.master')
@section('front.content')
    <main class="flex-shrink-0">
        <!-- Header -->
        <header class="py-5">
            <div class="container px-5">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-xxl-6">
                        <div class="text-center my-5">
                            <h1 class="fw-bolder mb-3">Empowering Developers to Build the Web</h1>
                            <p class="lead fw-normal text-muted mb-4">At RouteToCode, we provide the tools, tutorials, and
                                resources developers need to create exceptional websites and web applications. Whether
                                you're just starting or looking to advance your skills, we've got you covered.</p>
                            <a class="btn btn-primary btn-lg" href="#scroll-target">Learn More About Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- About section one -->
        <section class="py-5 bg-light" id="scroll-target">
            <div class="container px-5 my-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6">
                        <img class="img-fluid rounded mb-5 mb-lg-0" src="{{ asset('front/assets/image/laravel.png') }}"
                            alt="Web Development" />
                    </div>
                    <div class="col-lg-6">
                        <h2 class="fw-bolder">Our Journey</h2>
                        <p class="lead fw-normal text-muted mb-0">RouteToCode started with a mission to simplify web
                            development for everyone. We believe that creating high-quality websites and applications should
                            be accessible to all, regardless of experience. Our step-by-step guides, templates, and
                            resources empower developers to turn their ideas into reality.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- About section two -->
        <section class="py-5">
            <div class="container px-5 my-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6 order-first order-lg-last">
                        <img class="img-fluid rounded mb-5 mb-lg-0" src="{{ asset('front/assets/image/laravel.png') }}"
                            alt="Growth" />
                    </div>
                    <div class="col-lg-6">
                        <h2 class="fw-bolder">Expanding Horizons</h2>
                        <p class="lead fw-normal text-muted mb-0">From coding tutorials to complete project templates,
                            RouteToCode has grown into a trusted resource for developers worldwide. Our commitment to
                            innovation ensures we stay ahead of the curve, providing the latest tools and insights for
                            modern web development.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Team members section-->
        <section class="py-5 bg-light">
            <div class="container px-5 my-5">
                <div class="text-center">
                    <h2 class="fw-bolder">Our team</h2>
                    <p class="lead fw-normal text-muted mb-5">Dedicated to quality and your success</p>
                </div>
                <div class="row gx-5 row-cols-1 row-cols-sm-2 row-cols-xl-4 justify-content-center">
                    <div class="col mb-5 mb-5 mb-xl-0">
                        <div class="text-center">
                            <img class="img-fluid rounded-circle mb-4 px-4"
                                src="https://dummyimage.com/150x150/ced4da/6c757d" alt="..." />
                            <h5 class="fw-bolder">Ibbie Eckart</h5>
                            <div class="fst-italic text-muted">Founder &amp; CEO</div>
                        </div>
                    </div>
                    <div class="col mb-5 mb-5 mb-xl-0">
                        <div class="text-center">
                            <img class="img-fluid rounded-circle mb-4 px-4"
                                src="https://dummyimage.com/150x150/ced4da/6c757d" alt="..." />
                            <h5 class="fw-bolder">Arden Vasek</h5>
                            <div class="fst-italic text-muted">CFO</div>
                        </div>
                    </div>
                    <div class="col mb-5 mb-5 mb-sm-0">
                        <div class="text-center">
                            <img class="img-fluid rounded-circle mb-4 px-4"
                                src="https://dummyimage.com/150x150/ced4da/6c757d" alt="..." />
                            <h5 class="fw-bolder">Toribio Nerthus</h5>
                            <div class="fst-italic text-muted">Operations Manager</div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="text-center">
                            <img class="img-fluid rounded-circle mb-4 px-4"
                                src="https://dummyimage.com/150x150/ced4da/6c757d" alt="..." />
                            <h5 class="fw-bolder">Malvina Cilla</h5>
                            <div class="fst-italic text-muted">CTO</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
