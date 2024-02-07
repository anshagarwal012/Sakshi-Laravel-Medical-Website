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
        <input type="hidden" value="{{ json_encode($dist) }}" class="dist_">
        <div class="row mt-4">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title text-center text-primary m-0">Shelter Home Construction Progress Report</h3>
                    </div>
                    <div class="card-body">
                        <div class="mt-4 mt-xl-0">
                            <form class="mb-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="formrow-email-input">District Name :</label>
                                            @if ($users[0]['type'] == 'SU')
                                                <select class="form-select dist" name="dist">
                                                    <option selected="selected" value="">All District</option>
                                                    @foreach ($dist as $key => $item)
                                                        <option class="text-capitalize" value="{{ $key }}">
                                                            {{ $key }}</option>
                                                    @endforeach
                                                </select>
                                            @elseif ($users[0]['type'] == 'AG' || $users[0]['type'] == 'UL' || $users[0]['type'] == 'DU')
                                                <input type="hidden" name="dist"
                                                    value="{{ $users[0]['district_code'] }}">
                                                <select class="form-select dist" disabled>
                                                    <option class="text-capitalize" selected
                                                        value="{{ $users[0]['district_code'] }}">
                                                        {{ $users[0]['district_code'] }}</option>
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
                                            @elseif ($users[0]['type'] == 'DU')
                                                {{-- {{dd($dist[$users[0]['district_code']])}}
                                                {{dd($dist,$users)}} --}}
                                                <select class="form-select ulbs">
                                                    {{-- <option selected="selected" value="">All ULBS</option> --}}
                                                    @php
                                                        $t = '';
                                                    @endphp
                                                    @foreach ($dist[$users[0]['district_code']] as $key => $item)
                                                        @if ($item['ulb'] == $users[0]['city_code'])
                                                            @if ($t != $item['ulb'])
                                                                @php
                                                                    $t = $item['ulb'];
                                                                @endphp
                                                                <option class="text-capitalize" value="{{ $item['ulb'] }}">
                                                                    {{ $item['ulb'] }}</option>
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                </select>
                                            @elseif ($users[0]['type'] == 'UL')
                                                <input type="hidden" name="ulbs" value="{{ $users[0]['city_code'] }}">
                                                <select class="form-select ulbs" disabled>
                                                    <option class="text-capitalize" selected
                                                        value="{{ $users[0]['city_code'] }}">
                                                        {{ $users[0]['city_code'] }}</option>
                                                </select>
                                            @elseif ($users[0]['type'] == 'AG')
                                                <input type="hidden" name="ulbs" value="{{ $users[0]['city_code'] }}">
                                                <select class="form-select ulbs" disabled>
                                                    <option class="text-capitalize" selected
                                                        value="{{ $users[0]['city_code'] }}">
                                                        {{ $users[0]['city_code'] }}</option>
                                                </select>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="formrow-email-input">Location Name</label>
                                            @if ($users[0]['type'] == 'SU')
                                                <select class="form-select location">
                                                    <option selected="selected" value="">All location</option>
                                                </select>
                                            @elseif ($users[0]['type'] == 'UL' || $users[0]['type'] == 'DU')
                                                <select class="form-select location">
                                                    {{-- <option selected="selected" value="">All Locations</option> --}}
                                                    @foreach ($dist[$users[0]['district_code']] as $key => $item)
                                                        @if ($item['ulb'] == $users[0]['city_code'])
                                                            <option class="text-capitalize"
                                                                value="{{ $item['functional_shelter'] }}">
                                                                {{ $item['functional_shelter'] }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            @elseif ($users[0]['type'] == 'AG')
                                                <input type="hidden" name="location"
                                                    value="{{ $users[0]['agency_code'] }}">
                                                <select class="form-select location" disabled>
                                                    <option class="text-capitalize" selected
                                                        value="{{ $users[0]['agency_code'] }}">
                                                        {{ $users[0]['agency_code'] }}</option>
                                                </select>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered border-primary mb-0 datatable gridjs-table">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>District Name</th>
                                        <th>City Name</th>
                                        <th>Location</th>
                                        <th>Capacity</th>
                                        <th>Physical Progress</th>
                                        <th>Financial Progress</th>
                                        <th>Progress Reported Date</th>
                                        <th>Current Image</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data[0] as $key => $item)
                                        <tr>
                                            <td>{{ $item['id'] }}</td>
                                            <td>{{ $item['dist'] }}</td>
                                            <td>{{ $item['ulbs'] }}</td>
                                            <td>{{ $item['shelter_home_Name'] }}</td>
                                            <td>{{ $item['capacity'] }}</td>
                                            <td>{{ $item['physical_progress'] }}</td>
                                            <td>{{ $item['financial_progress'] }}</td>
                                            <td>{{ $item['process_date'] }}</td>
                                            <td>
                                                @if ($item['upload_image'] != null)
                                                    <a
                                                        href="{{ url('admin/public/storage/uploads/' . $item['upload_image']) }}">View</a>
                                                @endif
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
