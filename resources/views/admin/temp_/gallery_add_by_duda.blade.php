@extends('layouts.master')
@section('title')
    Gallery Add
@endsection
@section('css')
    <!-- plugin css -->
    <link href="{{ URL::asset('build/libs/jsvectormap/css/jsvectormap.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('page-title')
    Gallery Add
@endsection
@section('body')

    <body data-layout="horizontal">
    @endsection
    @section('content')
        <input type="hidden" value="{{ json_encode($dist) }}" class="dist_">
        <div class="row mt-4">
            @if (session('success'))
                <script>
                    alert('{{ session('success') }}');
                </script>
            @endif
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title text-center text-primary m-0">Gallery Add</h3>
                    </div>
                    <div class="card-body">
                        <div class="mt-4 mt-xl-0">
                            <form class="mb-4" action="{{ url()->current() }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="formrow-email-input">District Name
                                                :</label>
                                            <input type="hidden" name="dist" value="{{ $users[0]['district_code'] }}">
                                            <select class="form-select dist" disabled>
                                                <option class="text-capitalize" selected
                                                    value="{{ $users[0]['district_code'] }}">
                                                    {{ $users[0]['district_code'] }}</option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="formFile" class="form-label">Add Gallery Image</label>
                                        <input class="form-control" type="file" required name="img_path" id="formFile"
                                            accept=".jpg, .jpeg, .png">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit"
                                        class="btn btn-primary w-sm waves-effect waves-light">Add</button>
                                </div>
                            </form>
                        </div>
                        <div class="dist_table">
                            <div class="table-responsive">
                                <table class="table table-bordered border-primary mb-0 datatable gridjs-table">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>District Name</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data[1] as $key => $item)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $item['dist'] }}</td>
                                                <td><a href="{{ $item['full_path'] }}" target="_blank">
                                                    @if (strpos($item['full_path'], '.mp4'))
                                                        <video width="100" src="{{ $item['full_path'] }}"></video>
                                                    @else
                                                        <img src="{{ $item['full_path'] }}" width="100">
                                                    @endif
                                                </a>
                                            </td>
                                                <td>
                                                    <form action="{{ url()->current() }}" class="col-md-6 text-center p-0"
                                                        method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <input type="submit" class="btn btn-danger" value="Delete">
                                                        <input type="hidden" name="id" value="{{ $item['id'] }}">
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('scripts')
        <script src="{{ URL::asset('build/js/app.js') }}"></script>
    @endsection
