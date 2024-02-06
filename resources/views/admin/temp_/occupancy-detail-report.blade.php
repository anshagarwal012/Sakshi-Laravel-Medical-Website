@extends('layouts.master')
@section('title')
    Occupancy Details Report
@endsection
@section('css')
    <!-- plugin css -->
    <link href="{{ URL::asset('build/libs/jsvectormap/css/jsvectormap.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('page-title')
    Occupancy Details Report
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
                        <h3 class="card-title text-center text-primary m-0">Occupancy Details Report</h3>
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
                                            @elseif ($users[0]['type'] == 'AG' || $users[0]['type'] == 'UL' || $users[0]['type'] == 'DU' || $users[0]['type'] == 'CA')
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
                                            @elseif ($users[0]['type'] == 'AG' || $users[0]['type'] == 'CA')
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
                                            @elseif ($users[0]['type'] == 'AG' || $users[0]['type'] == 'CA')
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
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <input class="btn btn-primary" id="search" type="button" value="Search">
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
                                        <th>Location</th>
                                        <th>Capacity</th>
                                        <th>Date of Occupancy</th>
                                        <th>Date of Submission</th>
                                        <th>Type</th>
                                        <th>Self Male</th>
                                        <th>Self Female</th>
                                        <th>Self Transgender</th>
                                        <th>Mobilized Male</th>
                                        <th>Mobilized Female</th>
                                        <th>Mobilized Transgender</th>
                                        <th>Occupancy Detail File</th>
                                        <th>Total</th>
                                        <th>Approval Status</th>
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
                                            <td>{{ $item['ulbs'] }}</td>
                                            <td>{{ $item['location'] }}</td>
                                            <td>{{ $item['capacity'] }}</td>
                                            <td>{{ $item['functional_date'] }}</td>
                                            <td>{{ $item['created_at'] }}</td>
                                            <td>{{ $item['Structure'] }}</td>
                                            <td>{{ $item['self_male'] }}</td>
                                            <td>{{ $item['self_female'] }}</td>
                                            <td>{{ $item['self_transgender'] }}</td>
                                            <td>{{ $item['mobilized_male'] }}</td>
                                            <td>{{ $item['mobilized_female'] }}</td>
                                            <td>{{ $item['mobilized_transgender'] }}</td>
                                            <td>
                                                @if ($item['occupancydetailsfile'] != null)
                                                    <a
                                                        href="{{ url('admin/public/storage/uploads/' . $item['occupancydetailsfile']) }}">Download</a>
                                                @else
                                                    Not Available
                                                @endif
                                            </td>
                                            <td>{{ (int) $item['self_male'] + (int) $item['self_female'] + (int) $item['self_transgender'] + (int) $item['mobilized_male'] + (int) $item['mobilized_female'] + (int) $item['mobilized_transgender'] }}
                                            </td>
                                            <td>
                                                @if ($item['approve'] == 1)
                                                    Approved
                                                @elseif ($item['approve'] == 2)
                                                    Rejected
                                                @else
                                                    Pending
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
        <script>
            $('#search').on('click', function() {
                var from = $('#min').val()
                var to = $('#max').val()
                var updatedColumns = [{
                        data: null,
                        render: function(data, type, row, meta) {
                            if(row.occupancydetailsfile != ''){
                                row.occupancydetailsfile = '<a href="admin/public/storage/uploads/'+row.occupancydetailsfile+'">Download</a>';
                            }else{
                                row.occupancydetailsfile = 'Not Available';
                            }

                            if(row.approve == 1){
                                row.approve = "Approved";
                            }else if(row.approve == 2){
                                row.approve = "Rejected";
                            }else{
                                row.approve = "Pending";
                            }
                            row.total = row.self_male+row.self_female+row.self_transgender+row.mobilized_male+row.mobilized_female+row.mobilized_transgender;
                            return meta.row + 1;
                        }
                    },
                    {data: 'dist'},
                    {data: 'ulbs'},
                    {data: 'location'},
                    {data: 'capacity'},
                    {data: 'functional_date'},
                    {data: 'created_at'},
                    {data: 'Structure'},
                    {data: 'self_male'},
                    {data: 'self_female'},
                    {data: 'self_transgender'},
                    {data: 'mobilized_male'},
                    {data: 'mobilized_female'},
                    {data: 'mobilized_transgender'},
                    {data: 'occupancydetailsfile'},
                    {data: 'total'},
                    {data: 'approve'},
                ];
                updateColumns('/api/occupancy_detail_report/' + from + '/' + to, updatedColumns);
            })

            // Initialize DateTime for date inputs
            minDate = new DateTime('#min', {
                format: 'DD-MM-YYYY'
            });
            maxDate = new DateTime('#max', {
                format: 'DD-MM-YYYY'
            })

            table.api().order([5, 'asc']).draw();
        </script>
        @if ($users[0]['type'] == 'SU')
        @elseif ($users[0]['type'] == 'UL' || $users[0]['type'] == 'DU')
            <script>
                table.api().columns(1).search('^{{ $users[0]['district_code'] }}$', true, false).draw();
                // table.api().columns(2).search('^{{ $users[0]['city_code'] }}$',true,false).draw();
                // table.api().columns(3).search("{{ $users[0]['agency_code'] }}").draw();
            </script>
        @elseif ($users[0]['type'] == 'AG' || $users[0]['type'] == 'CA')
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
                    // let min = minDate.val() ? moment(minDate.val(), 'DD-MM-YYYY') : null;
                    // let max = minDate.val() ? moment(maxDate.val(), 'DD-MM-YYYY') : null;
                    // let date = moment(data[5], 'DD-MM-YYYY')

                    let min = minDate.val();
                    let max = maxDate.val();
                    let [day, month, year] = data[5].split('-')
                    let date = new Date(year, month - 1, day, 05, 30, 0)
                    // console.log('min:', min, 'max:', max, 'date:', date.format('DD-MM-YYYY'));
                    // debugger;
                    // console.log((min <= date), date <= max, min,max,date)
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

                // // Event listeners for date inputs
                // $('#min, #max').on('change', function() {
                //     table.api().draw();
                // });

                $('#search').on('click', function() {
                    table.api().draw();
                });

                // // Draw callback to update serial numbers
                // table.api().on('draw', function() {
                //     updateSerialNumbers();
                // });

                // // Function to update serial numbers
                // function updateSerialNumbers() {
                //     table.api().rows().every(function(rowIdx, tableLoop, rowLoop) {
                //         let data = this.data();
                //         data[0] = rowLoop + 1;
                //         this.invalidate().draw(false);
                //     });
                // }

            });
        </script> --}}
        <script src="{{ URL::asset('build/js/app.js') }}"></script>
    @endsection
