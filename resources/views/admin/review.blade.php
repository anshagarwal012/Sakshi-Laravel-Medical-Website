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
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Name</label>
                                            <input type="text" required name="title" required class="form-control"
                                                placeholder="Enter Name">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Rating</label>
                                            <select required name="stars" class="form-control">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5" selected>5</option>
                                            </select>
                                        </div>
                                        <div class="mb-3 file_upload_ d-none">
                                            <label class="form-label">Photo/Video</label>
                                            <input type="file" required name="path" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Review Type</label>
                                            <select required name="type" id="check_type" class="form-control">
                                                <option value="Text" selected>Text</option>
                                                <option value="Photo">Photo</option>
                                                <option value="Video">Video</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Description</label>
                                            <textarea required name="description" class="form-control" cols="30" rows="5"></textarea>
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
                                            <th>Type</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Image/Video</th>
                                            <th>Rating</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $key => $item)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $item['type'] }}</td>
                                                <td>{{ $item['title'] }}</td>
                                                <td>{{ $item['description'] }}</td>
                                                <td>
                                                    @if ($item['type'] == 'Photo')
                                                        <img width="50" src="{{ $item['path'] }}">
                                                    @elseif ($item['type'] == 'Video')
                                                        <video width="200" controls autoplay muted>
                                                            <source src="{{ $item['path'] }}" type="video/mp4">
                                                        </video>
                                                    @endif
                                                </td>
                                                <td>{{ $item['stars'] }}</td>
                                                <td>
                                                    <form action="{{ url()->current() }}" class="col-md-6 p-0"
                                                        method="POST">
                                                        @method('delete')
                                                        @csrf
                                                        <input type="submit" class="btn btn-danger me-1" value="Delete">
                                                        <input type="hidden" required name="id"
                                                            value="{{ $item['id'] }}">
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
        <script>
            $('#check_type').on('change', (e) => {
                if ($(e.target).val() == 'Text') {
                    $('.file_upload_').addClass('d-none')
                    $('[name="path"]').attr('required', !true)
                } else {
                    $('[name="path"]').attr('required', true)
                    $('.file_upload_').removeClass('d-none')
                }
            })
        </script>
    @endsection
