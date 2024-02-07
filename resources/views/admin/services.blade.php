@extends('admin.layouts.master')
@section('title')
    Shelter Home Details Report
@endsection
@section('css')
    <!-- plugin css -->
    <link href="{{ URL::asset('build/libs/jsvectormap/css/jsvectormap.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('page-title')
    Shelter Home Details Report
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
                        <h3 class="card-title text-center text-primary m-0"></h3>
                    </div>
                    <div class="card-body">
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('scripts')
    @endsection
