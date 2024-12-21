@extends('Front.layouts.master')
@section('front.content')
    <main class="flex-shrink-0">
        <!-- Page content-->
        <section class="py-5">
            <div class="container px-5">
                <!-- Contact form-->
                <div class="bg-light rounded-3 py-5 px-4 px-md-5 mb-5">
                    <div class="text-center mb-5">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-envelope"></i>
                        </div>
                        <h1 class="fw-bolder">Get in touch</h1>
                        <p class="lead fw-normal text-muted mb-0">We'd love to hear from you</p>
                    </div>
                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-8 col-xl-6">
                            <x-error></x-error>
                            <x-success></x-success>
                            <form action="{{ route('front.contact.store') }}" method="POST" novalidate>

                                @csrf
                                <!-- Name input-->
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="name" type="text" name="name"
                                        placeholder="Enter your name..." value="{{ old('name') }}" data-sb-validations="required" />
                                    <label for="name">Full name</label>
                                </div>

                                <!-- Email address input-->
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="email" type="email" name="email"
                                        placeholder="name@example.com" value="{{ old('email') }}" data-sb-validations="required,email" />
                                    <label for="email">Email address</label>
                                </div>
                                <!-- Phone number input-->
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="phone" type="tel" name="phone"
                                        placeholder="01200000000" value="{{ old('phone') }}" data-sb-validations="required" />
                                    <label for="phone">Phone number</label>
                                </div>
                                <!-- Message input-->
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" id="message" type="text" name="content" placeholder="Enter your message here..."
                                        style="height: 10rem" data-sb-validations="required">{{ old('content') }}</textarea>
                                    <label for="message">Message</label>
                                </div>

                                <!-- Submit Button-->
                                <div class="d-grid"><button class="btn btn-primary btn-lg " id="submitButton"
                                        type="submit">Submit</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
