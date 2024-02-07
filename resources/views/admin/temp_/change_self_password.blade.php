@extends('layouts.master')
@section('title')
    Shelter Home Construction Progress Report
@endsection

@section('page-title')
    Shelter Home Construction Progress Report
@endsection
@section('body')

    <body data-layout="horizontal">
    @endsection
    @section('content')
        <div class="row mt-4">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title text-center text-primary m-0">Shelter Home Construction Progress Report</h3>
                    </div>
                    <div class="card-body">
                        <div class="mt-4 mt-xl-0">
                            @if (session('response'))
                                <div class="alert alert-danger m-0">
                                    <ul>
                                        @foreach (session('response') as $key => $error)
                                            <li>{{ $error[0] }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <br>
                            @endif
                            @if (session('success'))
                                <script>
                                    alert('{{ session('success') }}')
                                </script>
                            @endif
                            <form action="{{ url()->current() }}" method="POST">
                                <div class="row justify-content-center">
                                    @csrf
                                    <div class="col-md-6">
                                        <div class="mb-3 row">
                                            <div class="col-md-4">
                                                <label class="form-label" for="formrow-email-input">Current
                                                    Password</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input class="form-control" type="text" name="current_pass"
                                                    value="">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <div class="col-md-4">
                                                <label class="form-label" for="formrow-email-input">New Password</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input class="form-control" type="text" name="newpass" value="">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <div class="col-md-4">
                                                <label class="form-label" for="formrow-email-input">Confirm
                                                    Password</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input class="form-control" type="text" name="confirm_pass"
                                                    value="">
                                            </div>
                                        </div>
                                        <button type="submit"
                                            class="btn btn-success w-sm waves-effect waves-light">Save</button>
                                    </div>
                                </div>
                            </form>

                        </div>
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
