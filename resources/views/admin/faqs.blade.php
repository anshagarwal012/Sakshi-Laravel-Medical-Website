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
                        <div class="mt-4 mt-xl-0">
                            <form action="{{ url()->current() }}" class="align-item-center p-0 mb-4"
                                enctype='multipart/form-data' method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Question</label>
                                            <input type="text" name="question" required class="form-control"
                                                placeholder="Question">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Answer</label>
                                            <textarea name="answer" required cols="30" rows="5" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-primary me-1" value="Submit">
                            </form>
                        </div>
                        <div class="dist_table">
                            <div class="table-responsive">
                                <table class="table table-bordered border-primary mb-0 datatable gridjs-table">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Question</th>
                                            <th>Answer</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $key => $item)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $item['question'] }}</td>
                                                <td>{{ $item['answer'] }}</td>
                                                <td>
                                                    <form action="{{ url()->current() }}" class="col-md-6 p-0"
                                                        method="POST">
                                                        @method('delete')
                                                        @csrf
                                                        <input type="submit" class="btn btn-danger me-1" value="Delete">
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
