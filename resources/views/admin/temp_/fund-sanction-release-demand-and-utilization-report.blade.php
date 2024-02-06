@extends('layouts.master')
@section('title')
    Fund Sanction, Release, Demand, And Utilization Report
@endsection
@section('css')
    <!-- plugin css -->
    <link href="{{ URL::asset('build/libs/jsvectormap/css/jsvectormap.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('page-title')
    Fund Sanction, Release, Demand, And Utilization Report
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
                        <h3 class="card-title text-center text-primary m-0">Fund Sanction, Release, Demand, And Utilization
                            Report</h3>
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
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="formrow-password-input">Shelter Home
                                                Status</label>
                                            <select class="form-select statuss">
                                                <option selected="selected" value="">All</option>
                                                <option value="shelter_home">Functional</option>
                                                <option value="shelter_home_construction">Under construction</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="example-date-input" class="col-md-4 col-form-label">From Date
                                                :</label>
                                            <div class="">
                                                <input class="form-control" id="min" type="text" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="example-date-input" class="col-md-4 col-form-label">To Date
                                                :</label>
                                            <div class="">
                                                <input class="form-control" id="max" type="text" value="">
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
                                        <th>ULB Name</th>
                                        <th>Shelter home/ Location</th>
                                        <th>Capacity</th>
                                        <th>Sanction fund by SLPSC</th>
                                        <th>Total Released fund</th>
                                        <th>Remaining Fund</th>
                                        <th>Fund Demand Date from Agency</th>
                                        <th>Upload letter from Agency</th>
                                        <th>Fund Demand Date from ULB</th>
                                        <th>Upload letter From ULB</th>
                                        <th>Fund Demand Date from DUDA</th>
                                        <th>Upload letter From DUDA</th>
                                        <th>Pending Remark (ULB/DUDA)</th>
                                        <th>Fund Released by SUDA</th>
                                        <th>Fund Released Date by SUDA</th>
                                        <th>Fund Released by DUDA</th>
                                        <th>Fund Released Date by DUDA</th>
                                        <th>Fund Released by ULB</th>
                                        <th>Fund Released Date by ULB</th>
                                        <th>Fund Utilized by Agency</th>
                                        <th>Utilization Date</th>
                                        <th>Upload Utilization Certificate</th>
                                        <th>Fund Utilized by ULB</th>
                                        <th>Utilization Date</th>
                                        <th>Upload Utilization Certificate</th>
                                        <th>Fund Utilized by DUDA</th>
                                        <th>Utilization Date</th>
                                        <th>Upload Utilization Certificate</th>
                                        <th>Shelter Home Type</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data[0] as $key => $item)
                                        {{-- {{dd($item)}} --}}
                                        @if ($item['duda_approve'] == '1')
                                            <tr>
                                                <td>{{ $item['fd_id'] }}</td>
                                                <td>{{ $item['dist'] }}</td>
                                                <td>{{ $item['ulb_name'] }}</td>
                                                <td>{{ $item['location_name'] }}</td>
                                                <td>{{ $item['capacity'] }}</td>
                                                <td class="text-right">{{ number_format($item['sanction_fund_by_slpsc'], 3, '.', ',') }}</td>
                                                <td class="text-right">{{ number_format($item['total_released_fund'], 3, '.', ',') }}</td>
                                                <td class="text-right">{{ number_format($item['remaining_fund'], 3, '.', ',') }}</td>
                                                <td>{{ $item['demand_date'] }}</td>
                                                <td>
                                                    @if ($item['upload_demand_letter'] != null)
                                                        <a
                                                            href="{{ url('admin/public/storage/uploads/' . $item['upload_demand_letter']) }}">Download</a>
                                                    @endif
                                                </td>
                                                <td>{{ $item['ulb_date'] }}</td>
                                                <td>
                                                    @if ($item['ulb_demand_letter'] != null)
                                                        <a
                                                            href="{{ url('admin/public/storage/uploads/' . $item['ulb_demand_letter']) }}">Download</a>
                                                    @endif
                                                </td>
                                                <td>{{ $item['duda_date'] }}</td>
                                                <td>
                                                    @if ($item['duda_demand_letter'] != null)
                                                        <a
                                                            href="{{ url('admin/public/storage/uploads/' . $item['duda_demand_letter']) }}">Download</a>
                                                    @endif
                                                </td>
                                                <td>{{ $item['suda_remark'] }}</td>
                                                <td class="text-right">{{ number_format($item['suda_released_amount'], 3, '.', ',') }}</td>
                                                <td>{{ $item['suda_date'] }}</td>
                                                <td class="text-right">{{ number_format($item['fund_amount'], 3, '.', ',') }}</td>
                                                <td>{{ $item['duda_date'] }}</td>
                                                <td class="text-right">{{ number_format($item['fund_amount'], 3, '.', ',') }}</td>
                                                <td>{{ $item['ulb_date'] }}</td>
                                                <td class="text-right">{{ number_format($item['fund_amount'], 3, '.', ',') }}</td>
                                                <td>{{ $item['demand_date'] }}</td>
                                                <td>
                                                    @if ($item['utilization_certificate'] != null)
                                                        <a
                                                            href="{{ url('admin/public/storage/uploads/' . $item['utilization_certificate']) }}">Download</a>
                                                    @endif
                                                </td>
                                                <td class="text-right">{{ number_format($item['utilization_amount'], 3, '.', ',') }}</td>
                                                <td>{{ $item['ulb_date'] }}</td>
                                                <td>
                                                    @if ($item['utilization_certificate'] != null)
                                                        <a
                                                            href="{{ url('admin/public/storage/uploads/' . $item['utilization_certificate']) }}">Download</a>
                                                    @endif
                                                </td>
                                                <td class="text-right">{{ number_format($item['utilization_amount'], 3, '.', ',') }}</td>
                                                <td>{{ $item['ulb_date'] }}</td>
                                                <td>
                                                    @if ($item['utilization_certificate'] != null)
                                                        <a
                                                            href="{{ url('admin/public/storage/uploads/' . $item['utilization_certificate']) }}">Download</a>
                                                    @endif
                                                </td>
                                                <td>{{ $item['type'] }}</td>
                                            </tr>
                                        @endif
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
        <script>
            table.api().order([8, 'asc']).draw();
        </script>
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
        <script>
            $(document).ready(function() {
                let minDate, maxDate;

                // Custom filtering function for date range
                $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
                    let min = minDate.val() ? moment(minDate.val(), 'DD-MM-YYYY') : null;
                    let max = minDate.val() ? moment(maxDate.val(), 'DD-MM-YYYY') : null;
                    let date = moment(data[8], 'DD-MM-YYYY')
                    if (
                        (min === null && max === null) ||
                        (min === null && date <= max) ||
                        (min <= date && max === null) ||
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
            $(document).on('change', '.statuss', function() {
                let columnIndex = table.api().column(30).index();
                table.api().column(columnIndex).search($(this).val()).draw();
            });
        </script>
        <script src="{{ URL::asset('build/js/app.js') }}"></script>
    @endsection
