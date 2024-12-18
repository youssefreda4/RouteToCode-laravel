@extends('Admin.layouts.master')
@section('admin.content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Users who have skill : <strong>{{ $skill->name }} </strong></h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Home</a></li>
                            <li class="breadcrumb-item active">{{ $skill->name }}</li>
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
                        <!-- Skills-->
                        @forelse ($skill->user as $user)
                            <div class="card mb-4">
                                <div class="card-header">Developer Info</div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <span
                                            class="badge bg-warning text-dark fs-4 px-3 py-2 my-1">{{ $skill->name }}</span>
                                    </div>
                                    <ul class="list-unstyled">
                                        <li><strong>Email:</strong> {{ $user->email }}</li>
                                        <li><strong>Phone:</strong> {{ $user->phone }}</li>
                                        <li><strong>Address:</strong> {{ $user->address }}</li>
                                    </ul>
                                </div>
                            </div>
                        @empty
                            <span class="badge bg-danger my-1">
                                No users found!
                            </span>
                        @endforelse
                    </div>
                </div>
            </div>
        </section>
        <!-- / col -->
    </div>
@endsection
