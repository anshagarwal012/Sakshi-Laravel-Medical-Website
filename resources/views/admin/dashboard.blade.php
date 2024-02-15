@extends('admin.layouts.master')
@section('title')
    {{ ucwords(str_replace('-', ' ', request()->segment(2))) }}
@endsection

@section('page-title')
    {{ ucwords(str_replace('-', ' ', request()->segment(2))) }}
@endsection
@section('body')

    <body data-layout="horizontal">
    @endsection
    @section('content')
        <div class="row mt-4">
            @if (session('messages'))
                <script>
                    alert("{{ session('messages') }}")
                </script>
            @endif
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title text-center text-primary m-0">
                            {{ ucwords(str_replace('-', ' ', request()->segment(2))) }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="row row-cols-1 row-cols-md-3 g-4">
                            <div class="col-lg-4">
                                <div class="card bg-danger border-danger text-white-50">
                                    <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                        <h5 class="mb-4 text-white ">Category</h5>
                                        <div class="count">
                                            <p class="card-title text-white fs-4 text-center">
                                                {{ $data['Category'] }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card bg-primary border-primary text-white-50">
                                    <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                        <h5 class="mb-4 text-white">Services</h5>
                                        <div class="count">
                                            <p class="card-title text-white fs-4 text-center">
                                                {{ $data['Services'] }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card bg-success border-success text-white-50">
                                    <div class="card-body d-flex flex-column align-items-center justify-content-center ">
                                        <h5 class="mb-4 text-white">FAQ</h5>
                                        <div class="count">
                                            <p class="card-title text-white fs-4 text-center">
                                                {{ $data['FAQ'] }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-cols-1 row-cols-md-3 g-4">
                            <div class="col-lg-4">
                                <div class="card bg-danger border-danger text-white-50">
                                    <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                        <h5 class="mb-4 text-white">Blogs</h5>
                                        <div class="count">
                                            <p class="card-title text-white fs-4 text-center">
                                                {{ $data['Blogs'] }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card bg-primary border-primary text-white-50">
                                    <div class="card-body d-flex flex-column align-items-center justify-content-center ">
                                        <h5 class="mb-4 text-white">Reviews</h5>
                                        <div class="count">
                                            <p class="card-title text-white fs-4 text-center">
                                                {{ $data['Reviews'] }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card bg-success border-success text-white-50">
                                    <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                        <h5 class="mb-4 text-white">Contact Us</h5>
                                        <div class="count">
                                            <p class="card-title text-white fs-4 text-center">
                                                {{ $data['Contact'] }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
