@extends('admin.layouts.master')
@section('title')
    {{ucwords(str_replace('-',' ',(request()->segment(2))))}}
@endsection

@section('page-title')
    {{ucwords(str_replace('-',' ',(request()->segment(2))))}}
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
                        <h3 class="card-title text-center text-primary m-0">{{ucwords(str_replace('-',' ',(request()->segment(2))))}}</h3>
                    </div>
                    <div class="card-body">
                    </div>
                </div>
            </div>
        </div>
    @endsection

