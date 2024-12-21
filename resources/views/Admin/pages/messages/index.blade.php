@extends('Admin.layouts.master')
@section('admin.content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">All Messages</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Home</a></li>
                            <li class="breadcrumb-item active">All Messages</li>
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
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">Email</th>
                                            <th class="text-center">Phone</th>
                                            <th class="text-center">Content</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @forelse ($messages as $message)
                                            <tr>
                                                <td>{{ $message->id }}</td>
                                                <td class="text-center">{{ $message->name }}</td>
                                                <td class="text-center">{{ $message->email }}</td>
                                                <td class="text-center">{{ $message->phone }}</td>
                                                <td class="text-center">{{ $message->content }}</td>
                                            </tr>
                                        @empty
                                            <div class="text-center alert alert-info">
                                                There is no messages !
                                            </div>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="p-3">
                                {{ $messages->links() }}
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </section>
        <!-- / col -->
    </div>
@endsection
