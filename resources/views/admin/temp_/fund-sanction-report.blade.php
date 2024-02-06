@extends('layouts.master')
@section('title')
    Fund Sanction Report
@endsection
@section('css')
    <!-- plugin css -->
    <link href="{{ URL::asset('build/libs/jsvectormap/css/jsvectormap.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('page-title')
    Fund Sanction Report
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
                        <h3 class="card-title text-center text-primary m-0">Fund Sanction Report</h3>
                    </div>
                    @if (session('success'))
                        <script>
                            alert("{{ session('success') }}")
                        </script>
                    @endif
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
                                                {{-- {{ dd($dist[$users[0]['district_code']], $users[0]['city_code']) }} --}}
                                                <select class="form-select ulbs">
                                                    <option selected="selected" value="">All ULBS</option>
                                                    @php
                                                        $t = '';
                                                    @endphp
                                                    @foreach ($dist[$users[0]['district_code']] as $key => $item)
                                                        {{-- @if ($item['ulb'] == $users[0]['city_code']) --}}
                                                        @if ($t != $item['ulb'])
                                                            @php
                                                                $t = $item['ulb'];
                                                            @endphp
                                                            <option class="text-capitalize" value="{{ $item['ulb'] }}">
                                                                {{ $item['ulb'] }}</option>
                                                        @endif
                                                        {{-- @endif --}}
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
                                <div class="row">
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
                                {{-- <button type="button" class="btn btn-primary w-sm waves-effect waves-light">Search</button> --}}
                            </form>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered border-primary mb-0 datatable gridjs-table">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>District Name</th>
                                        <th>City Name</th>
                                        <th>Agency Name</th>
                                        <th>Capacity</th>
                                        <th>Sanctioned Fund</th>
                                        <th>Released Fund</th>
                                        <th>Remaining Fund</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        use Carbon\Carbon;
                                    @endphp
                                    @foreach ($data[0] as $key => $item)
                                        {{-- {{dd($item)}} --}}
                                        <tr>
                                            <td>{{ $item['id'] }}</td>
                                            <td>{{ $item['dist'] }}</td>
                                            <td>{{ $item['ulb_name'] }}</td>
                                            <td>{{ $item['location_name'] }}</td>
                                            <td>{{ $item['capacity'] }}</td>
                                            <td class="text-right">{{ number_format($item['sanction_fund_by_slpsc'], 3, '.', ',') }}</td>
                                            <td class="text-right">{{ number_format($item['total_released_fund'], 3, '.', ',') }}</td>
                                            <td class="text-right">{{ number_format($item['remaining_fund'], 3, '.', ',') }}</td>
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
        @if ($users[0]['type'] == 'SU')
        @elseif ($users[0]['type'] == 'UL' || $users[0]['type'] == 'DU')
            <script>
                table.api().columns(1).search('^{{ $users[0]['district_code'] }}$', true, false).draw();
                // table.api().columns(2).search('^{{ $users[0]['city_code'] }}$',true,false).draw();
                // table.api().columns(3).search("{{ $users[0]['agency_code'] }}").draw();
            </script>
        @elseif ($users[0]['type'] == 'AG')
            <script>
                table.api().columns(1).search("{{ $users[0]['district_code'] }}").draw();
                table.api().columns(2).search("{{ $users[0]['city_code'] }}").draw();
                table.api().columns(3).search("{{ $users[0]['agency_code'] }}").draw();
            </script>
        @endif
        {{-- <script>
            $(document).ready(function() {
                let minDate, maxDate;

                // Custom filtering function for date range
                $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
                    let min = minDate.val() ? moment(minDate.val(), 'DD-MM-YYYY') : null;
                    let max = minDate.val() ? moment(maxDate.val(), 'DD-MM-YYYY') : null;
                    let date = moment(data[5], 'DD-MM-YYYY')
                    // debugger;
                    if (
                        (min === "" && max === "") ||
                        (min === "" && date <= max) ||
                        (min <= date && max === "") ||
                        (min <= date && date <= max)
                    ) {
                        return true;
                    }
                    return false;
                });

                // Initialize DateTime for date inputs
                minDate = new DateTime('#min', {
                    format: 'DD-MM-YYYY'
                });
                maxDate = new DateTime('#max', {
                    format: 'DD-MM-YYYY'
                });

                // Event listeners for date inputs
                $('#min, #max').on('change', function() {
                    table.api().draw();
                });
            });
        </script> --}}
        <script src="{{ URL::asset('build/js/app.js') }}"></script>
    @endsection
