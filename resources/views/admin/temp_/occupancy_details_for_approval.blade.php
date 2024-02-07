@extends('layouts.master')
@section('title')
    Occupancy Details For Approval
@endsection

@section('page-title')
    Occupancy Details For Approval
@endsection
@section('body')

    <body data-layout="horizontal">
    @endsection
    @section('content')
        <input type="hidden" value="{{ json_encode($dist) }}" class="dist_">
        <div class="row mt-4">
            @if (session('success'))
                <script>
                    alert("{{ session('success') }}")
                </script>
            @endif
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title text-center text-primary m-0">Occupancy Details For Approval</h3>
                    </div>
                    <div class="card-body">
                        <div class="">
                            <div class="mt-4 mt-xl-0">
                                {{-- {{dd(get_defined_vars())}} --}}
                                <form class="mb-4">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="formrow-email-input">District Name :</label>
                                                @if ($users[0]['type'] == 'AG' || $users[0]['type'] == 'UL' || $users[0]['type'] == 'DU')
                                                    <select class="form-select dist" disabled>
                                                        {{-- <option selected="selected" value="">All District</option> --}}
                                                        @foreach ($dist as $key => $item)
                                                            <option class="text-capitalize"
                                                                value="{{ $users[0]['district_code'] }}">
                                                                {{ $users[0]['district_code'] }}</option>
                                                        @endforeach
                                                    </select>
                                                @else
                                                    <select class="form-select dist">
                                                        <option selected="selected" value="">All District</option>
                                                        @foreach ($dist as $key => $item)
                                                            <option class="text-capitalize" value="{{ $key }}">
                                                                {{ $key }}</option>
                                                        @endforeach
                                                    </select>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="formrow-password-input">ULB Name :</label>
                                                @if ($users[0]['type'] == 'SU')
                                                    <select class="form-select ulbs">
                                                        <option selected="selected" value="">All ULBs</option>
                                                    </select>
                                                @elseif ($users[0]['type'] == 'AG' || $users[0]['type'] == 'UL')
                                                    <select class="form-select ulbs" disabled>
                                                        <option class="text-capitalize" selected
                                                            value="{{ $users[0]['city_code'] }}">
                                                            {{ $users[0]['city_code'] }}</option>
                                                    </select>
                                                @elseif ($users[0]['type'] == 'DU')
                                                <select class="form-select location">
                                                        <option selected="selected" value="">All Locations</option>
                                                        @foreach ($dist[$users[0]['district_code']] as $key => $item)
                                                            @if ($item['ulb'] == $users[0]['city_code'])
                                                                <option class="text-capitalize"
                                                                    value="{{ $item['ulb'] }}">
                                                                    {{ $item['ulb'] }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="formrow-email-input">Location Name</label>
                                                @if ($users[0]['type'] == 'UL' || $users[0]['type'] == 'DU')
                                                    <select class="form-select location">
                                                        <option selected="selected" value="">All Locations</option>
                                                        @foreach ($dist[$users[0]['district_code']] as $key => $item)
                                                            @if ($item['ulb'] == $users[0]['city_code'])
                                                                <option class="text-capitalize"
                                                                    value="{{ $item['functional_shelter'] }}">
                                                                    {{ $item['functional_shelter'] }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                @elseif ($users[0]['type'] == 'SU')
                                                    <select class="form-select location">
                                                        <option selected="selected" value="">All Locations</option>
                                                    </select>
                                                @elseif ($users[0]['type'] == 'AG')
                                                    <select class="form-select location" disabled>
                                                        <option class="text-capitalize" selected
                                                            value="{{ $users[0]['agency_code'] }}">
                                                            {{ $users[0]['agency_code'] }}</option>
                                                    </select>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6"></div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="example-date-input" class="col-md-4 col-form-label">From Date
                                                    :</label>
                                                <div class="">
                                                    <input class="form-control" type="date" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="example-date-input" class="col-md-4 col-form-label">To Date
                                                    :</label>
                                                <div class="">
                                                    <input class="form-control" type="date" value="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <button type="button"
                                        class="btn btn-primary w-sm waves-effect waves-light">Search</button> --}}
                                </form>
                            </div>
                        </div>

                        <table class="table table-bordered border-primary mb-0 datatable gridjs-table">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>District Name</th>
                                    <th>City Name</th>
                                    <th>Location</th>
                                    <th>Capacity</th>
                                    <th>Date of Submission</th>
                                    <th>Agency Submission</th>
                                    <th>Self</th>
                                    <th>Mobilized</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                        use Carbon\Carbon;
                                    @endphp
                                @foreach ($data[3] as $key => $item)
                                    <tr>
                                        <td>{{ $item['id'] }}</td>
                                        <td>{{ $item['dist'] }}</td>
                                        <td>{{ $item['ulbs'] }}</td>
                                        <td>{{ $item['location'] }}</td>
                                        <td>{{ $item['capacity'] }}</td>
                                        <td>{{ $item['functional_date'] }}</td>
                                        <td>{{ $item['created_at'] }}</td>
                                        <td>{{ (int) $item['self_male'] + (int) $item['self_female'] + (int) $item['self_transgender'] }}
                                        </td>
                                        <td>{{ (int) $item['mobilized_male'] + (int) $item['mobilized_female'] + (int) $item['mobilized_transgender'] }}
                                        </td>
                                        <td>{{ (int) $item['self_male'] + (int) $item['self_female'] + (int) $item['self_transgender'] + (int) $item['mobilized_male'] + (int) $item['mobilized_female'] + (int) $item['mobilized_transgender'] }}
                                        </td>
                                        <td>
                                            @if (!$item['approve'])
                                                <a href="/api/occupancy_details_for_approval/1/{{ $item['id'] }}/{{ $users[0]['type'] }}"
                                                    class="btn btn-success">Approve</a>
                                                <a href="/api/occupancy_details_for_approval/2/{{ $item['id'] }}/{{ $users[0]['type'] }}"
                                                    class="btn btn-danger">Reject</a>
                                            @else
                                                @if ($item['approve'] == 2)
                                                    <p>Rejected By {{ $item['approve_by'] }}</p>
                                                @else
                                                    <p>Approved By {{ $item['approve_by'] }}</p>
                                                @endif
                                            @endif
                                            {{-- @endif --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('scripts')
        @if ($users[0]['type'] == 'SU')
        @elseif ($users[0]['type'] == 'UL' || $users[0]['type'] == 'DU')
            <script>
                table.api().columns(1).search('^{{ $users[0]['district_code'] }}$', true, false).draw();
                table.api().columns(2).search('^{{ $users[0]['city_code'] }}$', true, false).draw();
                // table.api().columns(3).search("{{ $users[0]['agency_code'] }}").draw();
            </script>
        @elseif ($users[0]['type'] == 'AG')
            <script>
                table.api().columns(1).search('^{{ $users[0]['district_code'] }}$', true, false).draw();
                table.api().columns(2).search('^{{ $users[0]['city_code'] }}$', true, false).draw();
                table.api().columns(3).search('^{{ $users[0]['agency_code'] }}$', true, false).draw();
            </script>
        @endif
        <!-- apexcharts -->
        {{-- <script src="{{ URL::asset('build/libs/apexcharts/apexcharts.min.js') }}"></script> --}}

        {{-- <!-- Vector map-->
        <script src="{{ URL::asset('build/libs/jsvectormap/js/jsvectormap.min.js') }}"></script>
        <script src="{{ URL::asset('build/libs/jsvectormap/maps/world-merc.js') }}"></script>

        <script src="{{ URL::asset('build/js/pages/dashboard.init.js') }}"></script> --}}
        <!-- App js -->
        <script src="{{ URL::asset('build/js/app.js') }}"></script>
    @endsection
