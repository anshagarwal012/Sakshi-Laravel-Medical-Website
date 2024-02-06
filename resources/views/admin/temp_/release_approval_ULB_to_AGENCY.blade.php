@extends('layouts.master')
@section('title')
    Fund Release ULB To Agency
@endsection
@section('css')
    <!-- plugin css -->
    <link href="{{ URL::asset('build/libs/jsvectormap/css/jsvectormap.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('page-title')
    Fund Release ULB To Agency
@endsection
@section('body')

    <body data-layout="horizontal">
    @endsection
    @section('content')
    {{-- {{dd(session('success'))}} --}}
        @if (session('success'))
            <script>
                alert('{{ session('success') }}')
            </script>
        @endif
        <div class="row mt-4">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title text-center text-primary m-0">Fund Release ULB To Agency</h3>
                    </div>
                    <div class="card-body">
                        <div class="mt-4 mt-xl-0">
                            <form class="mb-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="formrow-email-input">District Name :</label>
                                            <select class="form-select dist" disabled>
                                                @foreach ($dist as $key => $item)
                                                    <option class="text-capitalize"
                                                        value="{{ $users[0]['district_code'] }}">
                                                        {{ $users[0]['district_code'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="formrow-password-input">ULB Name :</label>
                                            <select class="form-select ulbs" disabled>
                                                <option class="text-capitalize" selected
                                                    value="{{ $users[0]['city_code'] }}">
                                                    {{ $users[0]['city_code'] }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="formrow-email-input">Location Name</label>
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
                                <button type="button" class="btn btn-primary w-sm waves-effect waves-light">Search</button>
                            </form>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered border-primary mb-0 datatable gridjs-table">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>District Name</th>
                                        <th>City Name</th>
                                        <th>Location Name</th>
                                        <th>Capacity</th>
                                        <th>Sanction Amount</th>
                                        <th>Fund Released</th>
                                        <th>Remaining Fund</th>
                                        <th>Fund Demand</th>
                                        <th>Demand Date</th>
                                        <th>Suda Release Date</th>
                                        <th>Suda Decision</th>
                                        <th>Suda Release Letter</th>
                                        <th>Suda Release Type</th>
                                        <th>Suda Release Amount</th>
                                        <th>Suda Remark</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data[3] as $key => $item)
                                        @if ($item['suda_decision'] == 1)
                                            <tr>
                                                <td>{{ $item['fd_id'] }}</td>
                                                <td>{{ $item['dist'] }}</td>
                                                <td>{{ $item['ulb_name'] }}</td>
                                                <td>{{ $item['location_name'] }}</td>
                                                <td>{{ $item['capacity'] }}</td>
                                                <td>{{ $item['sanction_fund_by_slpsc'] }}</td>
                                                <td>{{ $item['total_released_fund'] }}</td>
                                                <td>{{ $item['remaining_fund'] }}</td>
                                                <td>{{ $item['fund_amount'] }}</td>
                                                <td>{{ $item['demand_date'] }}</td>
                                                <td>{{ $item['suda_date'] }}</td>
                                                <td>{{ 'Approved' }}</td>
                                                <td>
                                                    @if ($item['suda_released_letter'] != null)
                                                        <a
                                                            href="{{ url('admin/public/storage/uploads/' . $item['suda_released_letter']) }}">Download</a>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item['suda_released_type'] == 1)
                                                        Partial
                                                    @else
                                                        Full
                                                    @endif
                                                </td>
                                                <td>{{ $item['suda_released_amount'] }}</td>
                                                <td>{{ $item['suda_remark'] }}</td>
                                                <td>
                                                    @if ($item['ulb_demand_approve'] != 1 )
                                                        <a class="btn btn-primary" href="/api/release_approval_ULB_to_AGENCY/1/{{ $item['fd_id'] }}">Approved</a>
                                                    @else
                                                    Approved
                                                    @endif
                                                </td>
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
            $('.submit_user').on('click', function() {
                if ($('.username').val() == '') {
                    alert('Please Enter username');
                    return false
                }
                if ($('.Password').val() == '') {
                    alert('Please Enter Password');
                    return false
                }
                if ($('.cPassword').val() == '') {
                    alert('Please Enter cPassword');
                    return false
                }
                if ($('.Password').val() != $('.Password').val()) {
                    alert('Password & Confirm Password Not Same');
                    return false
                }

                $.post('/api/users/create_pass/' + $('.user_id').val(), {
                    'username': $('.username').val(),
                    'password': $('.Password').val(),
                    'cPassword': $('.cPassword').val(),
                    'district_code': $('.dist').val(),
                    'city_code': $('.ulb').val(),
                    'agency_code': $('.location').val(),
                    'type': $('.type').val(),
                }, function(response) {
                    response = JSON.parse(response);
                    if (response.status) {
                        alert('Password Updated Successfully');
                        location.reload();
                    } else {
                        alert('Something went wrong');
                        console.log(response);;
                    }
                })
            })
            $(document).find('.create_pass').on('click', function(e) {
                var location = $(this).attr('data-location')
                var fund_demand = $(this).attr('data-fund_demand')
                var id = $(this).attr('data-id')
                $(document).find('.loc').html(location)
                $(document).find('.fulb').html(fund_demand)
                $(document).find('.fd_id').val(id)
            })
        </script>
        @if ($users[0]['type'] == 'SU')
        @elseif ($users[0]['type'] == 'UL')
            <script>
                table.api().columns(1).search('^{{ $users[0]['district_code'] }}$', true, false).draw();
                table.api().columns(2).search('^{{ $users[0]['city_code'] }}$', true, false).draw();
                // table.api().columns(3).search("{{ $users[0]['agency_code'] }}").draw();
            </script>
        @elseif ($users[0]['type'] == 'DU')
            <script>
                table.api().columns(1).search('^{{ $users[0]['district_code'] }}$', true, false).draw();
            </script>
        @elseif ($users[0]['type'] == 'AG')
            <script>
                table.api().columns(1).search('^{{ $users[0]['district_code'] }}$', true, false).draw();
                table.api().columns(2).search('^{{ $users[0]['city_code'] }}$', true, false).draw();
                table.api().columns(3).search('^{{ $users[0]['agency_code'] }}$', true, false).draw();
            </script>
        @endif
        <script src="{{ URL::asset('build/js/app.js') }}"></script>
    @endsection
