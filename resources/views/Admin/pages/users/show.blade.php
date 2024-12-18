@extends('Admin.layouts.master')
@section('admin.content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">User Details</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Home</a></li>
                            <li class="breadcrumb-item active">User Details</li>
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
                    <!-- left column -->
                    <div class="col-md-12">

                        <!-- Profile Details-->

                        <!-- Skills-->
                        <div class="card mb-4">
                            <div class="card-header">Skills</div>
                            <div class="card-body">
                                @forelse ($user->skill as $skill)
                                    <span class="badge bg-warning text-dark fs-4 px-3 py-2 my-1">{{ $skill->name }}</span>
                                @empty
                                    <span class="badge bg-danger my-1">
                                        No skills!
                                    </span>
                                @endforelse
                            </div>
                        </div>

                        <!-- About Me-->
                        <div class="card mb-4">
                            <div class="card-header">About Me</div>
                            <div class="card-body">
                                <p>{!! $user->about !!}</p>
                            </div>
                        </div>
                        <!-- Contact Details-->
                        <div class="card mb-4">
                            <div class="card-header">Contact Details</div>
                            <div class="card-body">
                                <ul class="list-unstyled">
                                    <li><strong>Email:</strong> {{ $user->email }}</li>
                                    <li><strong>Phone:</strong> {{ $user->phone }}</li>
                                    <li><strong>Address:</strong> {{ $user->address }}</li>
                                </ul>
                            </div>
                        </div>
                        <!-- Recent Activity-->
                        <div class="card mb-4">
                            <div class="card-header">Recent Activity</div>
                            <div class="card-body">
                                @forelse ($user->post as $post)
                                    <ul>
                                        <li>Title Post: <a href="#">{{ $post->title }}</a>
                                        </li>
                                    </ul>
                                @empty
                                    <div class="text-center alert alert-info">
                                        There is no posts !
                                    </div>
                                @endforelse
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- / col -->
    </div>
@endsection
