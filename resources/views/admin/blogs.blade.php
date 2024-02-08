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
                        <div class="dist_table">
                            <div class="table-responsive">
                                <table class="table table-bordered border-primary mb-0 datatable gridjs-table">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Category Name</th>
                                            <th>Title</th>
                                            <th>Short Description</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $key => $item)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $item['category']['name'] }}</td>
                                                <td>{{ $item['name'] }}</td>
                                                <td>{{ $item['desc'] }}</td>
                                                <td> <img src="{{ $item['image'] }}" alt="Handle with Ease" width="100">
                                                </td>
                                                <td>
                                                    <div class="d-flex">
                                                        <form action="{{ url()->current() }}" class="d-inline"
                                                            method="POST">
                                                            @method('PUT')
                                                            @csrf
                                                            <input type="submit" class="btn btn-primary me-1"
                                                                value="Edit">
                                                            <input type="hidden" name="id"
                                                                value="{{ $item['id'] }}">
                                                        </form>
                                                        <form action="{{ url()->current() }}" class="d-inline"
                                                            method="POST">
                                                            @method('delete')
                                                            @csrf
                                                            <input type="submit" class="btn btn-danger me-1"
                                                                value="Delete">
                                                            <input type="hidden" name="id"
                                                                value="{{ $item['id'] }}">
                                                        </form>
                                                    </div>
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
