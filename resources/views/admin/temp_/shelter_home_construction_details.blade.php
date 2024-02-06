@extends('layouts.master')
@section('title')
    Enter Shelter Home Construction Details
@endsection
@section('css')
    <!-- plugin css -->
    {{-- <link href="{{ URL::asset('build/libs/jsvectormap/css/jsvectormap.min.css') }}" rel="stylesheet" type="text/css" /> --}}
@endsection
@section('page-title')
    Enter Shelter Home Construction Details
@endsection
@section('body')
    @if (session('success'))
        <script>
            alert("{{ session('success') }}")
        </script>
    @endif

    <body data-layout="horizontal">
    @endsection
    @section('content')
        <input type="hidden" value="{{ json_encode($dist) }}" class="dist_">
        <div class="row mt-4">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title text-center text-primary m-0">Enter Shelter Home Construction Details</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ url()->current() }}" method="POST">
                            @csrf
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <div class="mb-3 row">
                                        <label class="col-md-4 col-form-label">District Name :</label>
                                        <div class="col-md-8">
                                            <select class="form-select dist" name="dist">
                                                <option selected="selected" value="">All District</option>
                                                @foreach ($dist as $key => $item)
                                                    <option class="text-capitalize" value="{{ $key }}">
                                                        {{ $key }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-md-4 col-form-label">ULB Name:</label>
                                        <div class="col-md-8">
                                            <select class="form-select ulbs" required name="ulb_name">
                                                <option selected="selected" value="">Select City</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-4 col-form-label">Shelter Home Name
                                            :</label>
                                        <div class="col-md-8">
                                            <input class="form-control" type="text" value="" required
                                                name="shelter_home_Name">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-4 col-form-label">Capacity :</label>
                                        <div class="col-md-8">
                                            <input class="form-control" type="text" value="" required
                                                name="capacity">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="example-date-input" class="col-md-4 col-form-label"> Sanction Date
                                        </label>
                                        <div class="col-md-8">
                                            <input class="form-control" type="date" value="" required
                                                name="sanction_date">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="example-date-input" class="col-md-4 col-form-label"> Completion
                                            Date</label>
                                        <div class="col-md-8">
                                            <input class="form-control" type="date" value=""
                                                name="completion_date">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-4 col-form-label">Sanction Fund
                                            ₹</label>
                                        <div class="col-md-8">
                                            <input class="form-control" type="text" value="" required
                                                name="sanction_fund">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-4 col-form-label">Released Fund
                                            ₹:</label>
                                        <div class="col-md-8">
                                            <input class="form-control" type="text" value="" required
                                                name="released_fund">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="example-date-input" class="col-md-4 col-form-label"> Last Fund Released
                                            date
                                            :</label>
                                        <div class="col-md-8">
                                            <input class="form-control" type="date" value="" required
                                                name="last_fund_released_date">
                                        </div>
                                    </div>
                                    <div class="d-flex mb-3 justify-content-center">
                                        <button type="submit"
                                            class="btn btn-primary mx-2 w-sm waves-effect waves-light">Save</button>
                                        {{-- <button type="button" class="btn btn-success mx-2 w-sm waves-effect waves-light">Cancel</button> --}}
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('scripts')
        <!-- apexcharts -->
        {{-- <script src="{{ URL::asset('build/libs/apexcharts/apexcharts.min.js') }}"></script> --}}

        {{-- <!-- Vector map-->
        <script src="{{ URL::asset('build/libs/jsvectormap/js/jsvectormap.min.js') }}"></script>
        <script src="{{ URL::asset('build/libs/jsvectormap/maps/world-merc.js') }}"></script>

        <script src="{{ URL::asset('build/js/pages/dashboard.init.js') }}"></script> --}}
        <!-- App js -->
        <script src="{{ URL::asset('build/js/app.js') }}"></script>
    @endsection
