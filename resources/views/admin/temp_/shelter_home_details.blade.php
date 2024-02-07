@extends('layouts.master')
@section('title')
    Enter Shelter Home Details
@endsection

@section('page-title')
    Enter Shelter Home Details
@endsection
@section('body')

    <body data-layout="horizontal">
    @endsection
    @section('content')
    @if (session('success'))
    <script>
        alert("{{ session('success') }}")
    </script>
@endif
        <input type="hidden" value="{{ json_encode($dist) }}" class="dist_">
        <div class="row mt-4">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title text-center text-primary m-0">Enter Shelter Home Details</h3>
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
                                        <label class="form-label col-md-4" for="formrow-password-input">ULB Name :</label>
                                        <div class="col-md-8">
                                            <select class="form-select ulbs" name="ulb">
                                                <option selected="selected" value="">All ULBs</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="form-label col-md-4" for="formrow-email-input">Shelter Location Name :</label>
                                        <div class="col-md-8">
                                            <input class="form-control" type="text" required name="name">                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-4 col-form-label">Capacity :</label>
                                        <div class="col-md-8">
                                            <input class="form-control" type="number" required name="capacity"
                                                value="">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-4 col-form-label">Shelter Home run By
                                            :</label>
                                        <div class="col-md-8">
                                            <input class="form-control" type="text" required name="run_by"
                                                value="">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-4 col-form-label"> Nodal Officer Name
                                            :</label>
                                        <div class="col-md-8">
                                            <input class="form-control" type="text" required name="officer"
                                                value="">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-4 col-form-label">Mobile No :</label>
                                        <div class="col-md-8">
                                            <input class="form-control" type="number" max="9999999999" required name="mob"
                                                value="">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="example-date-input" class="col-md-4 col-form-label"> Funcational
                                            Date</label>
                                        <div class="col-md-8">
                                            <input class="form-control" type="date" required name="functional_date"
                                                value="">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="example-date-input" class="col-md-4 col-form-label">Type of
                                            Structure</label>
                                        <div class="col-md-8 d-flex justify-content-between">
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" checked name="Structure" type="radio" required value="DAY_NULM">
                                                <label class="form-check-label">
                                                    DAY_NULM
                                                </label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" name="Structure" type="radio" required value="NON DAY_NULM">
                                                <label class="form-check-label">
                                                    NON DAY_NULM
                                                </label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" name="Structure" type="radio" required value="TEMPORARY">
                                                <label class="form-check-label">
                                                    TEMPORARY
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row ">
                                        <label for="example-date-input" class="col-md-4 col-form-label">Shelter Home
                                            Status :</label>
                                        <div class="col-md-8 d-flex gx-3">
                                            <div class="form-check mb-3 me-3">
                                                <input class="form-check-input" type="radio" checked name="status" required value="Functional">
                                                <label class="form-check-label">
                                                    Functional
                                                </label>
                                            </div>
                                            <div class="form-check mb-3 me-3">
                                                <input class="form-check-input" type="radio" name="status" required value="Temporary">
                                                <label class="form-check-label">
                                                    Temporary
                                                </label>
                                            </div>
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
