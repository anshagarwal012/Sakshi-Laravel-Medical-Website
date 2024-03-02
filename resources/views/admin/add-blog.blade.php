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
                        <form action="{{ url()->current() }}" class="align-item-center p-0 mb-4" enctype='multipart/form-data'
                            method="POST">
                            @csrf
                            <div id="addproduct-accordion" class="custom-accordion">
                                <div class="card">
                                    <a href="#addproduct-productinfo-collapse" class="text-body" data-bs-toggle="collapse"
                                        aria-expanded="false" aria-controls="addproduct-productinfo-collapse">
                                        <div class="p-4">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar">
                                                        <div
                                                            class="avatar-title rounded-circle bg-primary-subtle  text-primary">
                                                            <h5 class="text-primary font-size-17 mb-0">01</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <h5 class="font-size-16 mb-1">Blog Info</h5>
                                                    <p class="text-muted text-truncate mb-0">Fill all information below</p>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
                                                </div>

                                            </div>

                                        </div>
                                    </a>

                                    <div id="addproduct-productinfo-collapse" class="collapse show"
                                        data-bs-parent="#addproduct-accordion" style="">
                                        <div class="p-4 border-top">
                                            <form>
                                                <div class="mb-3">
                                                    <label class="form-label" for="productname">Tittle</label>
                                                    <input id="productname" required name="name" placeholder="Title"
                                                        type="text" class="form-control">
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3  d-none">
                                                            <input type="hidden" name="category_id"
                                                                value="{{ $data['category'][0]['id'] }}">
                                                            <label class="form-label">Category</label>
                                                            {{-- <select class="form-control" required name="category_id">
                                                                <option value="">Select</option>
                                                                @foreach ($data['category'] as $item)
                                                                    <option value="{{ $item['id'] }}">
                                                                        {{ $item['name'] }}</option>
                                                                @endforeach
                                                            </select> --}}
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="choices-single-specifications"
                                                                class="form-label">Blog Image</label>
                                                            <input type="file" name="image" required
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="choices-single-specifications"
                                                                class="form-label">Short
                                                                Description</label>
                                                            <textarea class="form-control" id="productdesc" required name="desc" placeholder="Short Description" rows="5"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-0">
                                                    <label class="form-label" for="productdesc">Description</label>
                                                    <div id="snow-editor" style="height: 300px;" class="description"></div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="continer d-flex justify-content-end ">
                                    <input type="submit" class="btn btn-primary me-1 mt-3 force_submit" value="Submit">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('scripts')
        <script src="{{ URL::asset('build/libs/quill/quill.min.js') }}"></script>
        <script>
            var quill = new Quill('#snow-editor', {
                theme: 'snow',
                modules: {
                    'toolbar': [
                        [{
                            'font': []
                        }, {
                            'size': []
                        }],
                        ['bold', 'italic', 'underline', 'strike'],
                        [{
                            'color': []
                        }, {
                            'background': []
                        }],
                        [{
                            'script': 'super'
                        }, {
                            'script': 'sub'
                        }],
                        [{
                            'header': [false, 1, 2, 3, 4, 5, 6]
                        }, 'blockquote', 'code-block'],
                        [{
                            'list': 'ordered'
                        }, {
                            'list': 'bullet'
                        }, {
                            'indent': '-1'
                        }, {
                            'indent': '+1'
                        }],
                        ['direction', {
                            'align': []
                        }],
                        ['link', 'image', 'video'],
                        ['clean']
                    ]
                },
            });
            $('.force_submit').on('click', function(e) {
                e.preventDefault();
                var description = quill.root.innerHTML;
                $('form').append('<textarea name="long_des" class="d-none">' + description + '</textarea>')
                $('form').submit();
            })
        </script>
    @endsection
    @section('css')
        <link rel="stylesheet" href="{{ URL::asset('build/libs/quill/quill.snow.css') }}">
    @endsection
