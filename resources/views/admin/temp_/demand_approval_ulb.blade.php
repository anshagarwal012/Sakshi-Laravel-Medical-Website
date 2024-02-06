@extends('layouts.master')
@section('title')
    Demand Approval ULB
@endsection
@section('css')
    <!-- plugin css -->
    <link href="{{ URL::asset('build/libs/jsvectormap/css/jsvectormap.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('page-title')
    Demand Approval ULB
@endsection
@section('body')

    <body data-layout="horizontal">
    @endsection
    @section('content')
        @if (session('success'))
            <script>
                alert('{{ session('success') }}')
            </script>
        @endif
        <div class="row mt-4">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title text-center text-primary m-0">Demand Approval ULB</h3>
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
                                        <th>Agency Demand Letter</th>
                                        <th>Utilization Certificate</th>
                                        <th>Utilized Amount</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data[3] as $key => $item)
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
                                            <td>
                                                @if ($item['upload_demand_letter'] != null)
                                                    <a
                                                        href="{{ url('admin/public/storage/uploads/' . $item['upload_demand_letter']) }}">Download</a>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($item['utilization_certificate'] != null)
                                                    <a
                                                        href="{{ url('admin/public/storage/uploads/' . $item['utilization_certificate']) }}">Download</a>
                                                @endif
                                            </td>
                                            <td>{{ $item['utilization_amount'] }}</td>
                                            <td>
                                                @if (!$item['ulb_approve'])
                                                    <button type="button"
                                                        class="btn btn-primary create_pass waves-effect waves-light"
                                                        data-location="{{ $item['location_name'] }}"
                                                        data-fund_demand="{{ $item['fund_amount'] ?? 0}}"
                                                        data-type="{{ $item['fund_amount'] ? 'demand' : 'utilize'}}"
                                                        data-id="{{ $item['fd_id'] }}" data-bs-toggle="modal"
                                                        data-bs-target=".bs-example-modal-center">Approve</button>
                                                @else
                                                    Approved By ULB
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
    <div class="modal fade bs-example-modal-center" data-bs-backdrop="static" tabindex="-1" style="display: none;"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Approval of Agency Demand by ULB</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url()->current() }}" method="POST" enctype="multipart/form-data">
                        @method('patch')
                        @csrf
                        <input type="hidden" class="fd_id" name="fd_id">
                        <input type="date" class="d-none" name="ulb_date" value="{{ date('Y-m-d') }}" />
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <div class="mb-3 row">
                                        <div class="col-md-5">
                                            <label class="form-label">Agency Name</label>
                                        </div>
                                        <div class="col-md-7">
                                            <label class="form-label loc">TEST</label>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <div class="col-md-5">
                                            <label class="form-label">Demand Fund By ULB</label>
                                        </div>
                                        <div class="col-md-7">
                                            <label class="form-label fulb">TEST</label>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <div class="col-md-5">
                                            <label class="form-label">Desision</label>
                                        </div>
                                        <div class="col-md-7">
                                            <div class=" row">
                                                {{-- <label for="example-date-input" class="col-md-4 col-form-label">Type of
                                        Structure</label> --}}
                                                <div
                                                    class="col-md-8 d-flex justify-content-between  align-self-center">
                                                    <div class="form-check ">
                                                        <input class="form-check-input" name="ulb_approve"
                                                            type="radio" checked="" required value="1">
                                                        <label class="form-check-label">Approved</label>
                                                    </div>
                                                    <div class="form-check ms-4 ">
                                                        <input class="form-check-input" name="ulb_approve"
                                                            type="radio" required value="0">
                                                        <label class="form-check-label">Rejected</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3 row letter_upload">
                                        {{-- <div class="col-md-5">
                                        <label class="form-label">Demand Fund By ULB</label>
                                    </div> --}}
                                        <div class="col-md-5">
                                            <label class="form-label change_letter_text">Upload demand letter</label>
                                        </div>
                                        <div class="col-md-7">
                                            <input class="form-control" type="file" name="ulb_demand_letter"
                                                id="formFile" accept=".pdf" required>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="col-md-5">
                                            <label class="form-label">Letter Number</label>
                                        </div>
                                        <div class="col-md-7">
                                            <input id="formletter" class="form-control" type="text" name="ulb_letter_number" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <div class="col-md-5">
                                            <label class="form-label">Remarks</label>
                                        </div>
                                        <div class="col-md-7">
                                            <textarea class="form-control" name="ulb_remark" required id="" cols="10" rows="10"
                                                style="height: 22px;"></textarea>
                                        </div>
                                    </div>
                                    <button type="submit"
                                        class="btn btn-success w-sm waves-effect waves-light">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    @section('scripts')
        <script>
            // $('.submit_user').on('click', function() {
            //     if ($('.username').val() == '') {
            //         alert('Please Enter username');
            //         return false
            //     }
            //     if ($('.Password').val() == '') {
            //         alert('Please Enter Password');
            //         return false
            //     }
            //     if ($('.cPassword').val() == '') {
            //         alert('Please Enter cPassword');
            //         return false
            //     }
            //     if ($('.Password').val() != $('.Password').val()) {
            //         alert('Password & Confirm Password Not Same');
            //         return false
            //     }

            //     $.post('/api/users/create_pass/' + $('.user_id').val(), {
            //         'username': $('.username').val(),
            //         'password': $('.Password').val(),
            //         'cPassword': $('.cPassword').val(),
            //         'district_code': $('.dist').val(),
            //         'city_code': $('.ulb').val(),
            //         'agency_code': $('.location').val(),
            //         'type': $('.type').val(),
            //     }, function(response) {
            //         response = JSON.parse(response);
            //         if (response.status) {
            //             alert('Password Updated Successfully');
            //             location.reload();
            //         } else {
            //             alert('Something went wrong');
            //             console.log(response);;
            //         }
            //     })
            // })
            $(document).on('click','.create_pass', function(e) {
                var type = $(this).attr('data-type')

                var location = $(this).attr('data-location')
                var fund_demand = $(this).attr('data-fund_demand')
                var id = $(this).attr('data-id')
                $(document).find('.loc').html(location)
                $(document).find('.fulb').html(fund_demand)
                $(document).find('.fd_id').val(id)
                if(type == 'utilize'){
                    $('#formFile').attr('name', 'ulb_utilize_letter');
                    $('.change_letter_text').text('Upload UC')
                }else{
                    $('#formFile').attr('name', 'ulb_demand_letter');
                    $('.change_letter_text').text('Upload Demand Letter')
                }
            })

            $('input[name="ulb_approve"]').change(function() {
                if ($(this).val() === '1') {
                    $('.letter_upload').show();  // Show the input field
                    $('#formFile').prop('required', true);  // Make it required
                    $('#formletter').prop('required', true);  // Make it required
                } else {
                    $('.letter_upload').hide();  // Hide the input field
                    $('#formFile').prop('required', false);  // Make it not required
                    $('#formletter').prop('required', false);  // Make it not required
                }
            });
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
