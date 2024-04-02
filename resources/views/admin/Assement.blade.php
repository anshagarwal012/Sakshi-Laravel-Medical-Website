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
                                            <th>S.no</th>
                                            <th>Name</th>
                                            <th>Date of Birth</th>
                                            <th>Contact Number</th>
                                            <th>Email</th>
                                            <th>Address</th>
                                            <th>Emergency Contact</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $key => $item)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $item['data']['Name'] }}</td>
                                                <td>{{ $item['data']['Date_of_Birth'] }}</td>
                                                <td>{{ $item['data']['Contact_Number'] }}</td>
                                                <td>{{ $item['data']['Email'] }}</td>
                                                <td>{{ $item['data']['Address'] }}</td>
                                                <td>{{ $item['data']['Emergency_Contact'] }}</td>
                                                <td>
                                                    <button class="btn btn-primary me-1"
                                                        onclick="openModal('{{ $item['id'] }}')">View Details</button>
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

        <!-- Modal -->
        <div class="modal fade" id="detailsModal" tabindex="-1" aria-labelledby="detailsModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="detailsModalLabel">Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Data will be populated here -->
                    </div>
                </div>
            </div>
        </div>
    @endsection
