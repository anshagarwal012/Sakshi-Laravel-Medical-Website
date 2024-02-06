@extends('layouts.master')
@section('title')
    Create user credentials
@endsection
@section('css')
    <!-- plugin css -->
    <link href="{{ URL::asset('build/libs/jsvectormap/css/jsvectormap.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('page-title')
    Create user credentials
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
                        <h3 class="card-title text-center text-primary m-0">Create user credentials</h3>
                    </div>
                    <div class="card-body">
                        <div class="mt-4 mt-xl-0">
                            <form class="mb-4">
                                <div class="row justify-content-center">
                                    <div class="col-md-12">
                                        <div class="mb-3 row ">
                                            <label for="example-date-input" class="col-md-4 col-form-label">
                                                Select User Type to Create Credential:</label>
                                            <div class="col-md-8 d-flex gx-3">
                                                <div class="form-check mb-3 me-3">
                                                    <input class="form-check-input change" type="radio" name="formRadios"
                                                        value="District" checked="checked">
                                                    <label class="form-check-label" for="formRadios1">
                                                        District
                                                    </label>
                                                </div>
                                                <div class="form-check mb-3 me-3">
                                                    <input class="form-check-input change" type="radio" name="formRadios"
                                                        value="ULB">
                                                    <label class="form-check-label" for="formRadios1">
                                                        ULB
                                                    </label>
                                                </div>
                                                <div class="form-check mb-3 me-3">
                                                    <input class="form-check-input change" type="radio" name="formRadios"
                                                        value="Shelter_Home_Agency">
                                                    <label class="form-check-label" for="formRadios1">
                                                        Shelter Home Agency
                                                    </label>
                                                </div>
                                                <div class="form-check mb-3 me-3">
                                                    <input class="form-check-input change" type="radio" name="formRadios"
                                                        value="Shelter_Home_Construction_Agency">
                                                    <label class="form-check-label" for="formRadios1">
                                                        Shelter Home Construction Agency
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3 row dist">
                                            <div class="col-md-4">
                                                <label class="form-label" for="formrow-email-input">District Name :</label>
                                            </div>
                                            <div class="col-md-8">
                                                <select class="form-select dist">
                                                    <option disabled selected="selected" value="">All District
                                                    </option>
                                                    @foreach ($dist as $key => $item)
                                                        <option class="text-capitalize" value="{{ $key }}">
                                                            {{ $key }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row ulbs" style="display: none;">
                                            <div class="col-md-4">
                                                <label class="form-label" for="formrow-email-input">ULB Name :</label>
                                            </div>
                                            <div class="col-md-8">
                                                <select class="form-select ulbs">
                                                    <option disabled selected="selected" value="">All ULBs</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row agency" style="display: none;">
                                            <div class="col-md-4">
                                                <label class="form-label" for="formrow-email-input">Shelter Home Agency</label>
                                            </div>
                                            <div class="col-md-8">
                                                <select class="form-select location">
                                                    <option disabled selected="selected" value="">All Agency</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row location" style="display: none;">
                                            <div class="col-md-4">
                                                <label class="form-label" for="formrow-email-input">Shelter Home
                                                    Construction Agency :</label>
                                            </div>
                                            <div class="col-md-8">
                                                <select class="form-select location">
                                                    <option selected="selected" value="">All Construction Agency
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <button type="button" class="btn btn-success w-sm waves-effect waves-light show_tables">Show</button> --}}
                            </form>
                        </div>
                        <div class="dist_table">
                            <div class="table-responsive">
                                <table class="table table-bordered border-primary mb-0 datatable gridjs-table">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>District Name</th>
                                            <th>UserName</th>
                                            <th>Password</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data[0] as $key => $item)
                                        @if ($item['district_code'] != null && trim($item['type']) == 'DU')
                                                <tr>
                                                    <td>{{ $item['id'] }}</td>
                                                    <td>{{ $item['district_code'] }}</td>
                                                    <td>{{ $item['username']}}</td>
                                                    <td>{{ $item['password']}}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary create_pass waves-effect waves-light" data-user="DU" 
                                                        data-dist="{{ $item['district_code'] }}" data-ulb="{{ $item['city_code'] }}" data-location="{{ $item['agency_code'] }}"data-id="{{ $item['id'] }}"data-bs-toggle="modal" data-bs-target=".bs-example-modal-center" >Edit</button>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="ulbs_table" style="display: none;">
                            <div class="table-responsive">
                                <table class="table table-bordered border-primary mb-0 datatable gridjs-table">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>District Name</th>
                                            <th>ULB</th>
                                            <th>UserName</th>
                                            <th>Password</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data[0] as $key => $item)
                                        @if ($item['district_code'] != null && trim($item['type']) == 'UL')
                                                <tr>
                                                    <td>{{ $item['id'] }}</td>
                                                    <td>{{ $item['district_code'] }}</td>
                                                    <td>{{ $item['city_code'] }}</td>
                                                    <td>{{ $item['username']}}</td>
                                                    <td>{{ $item['password']}}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary create_pass waves-effect waves-light" data-user="UL" 
                                                        data-dist="{{ $item['district_code'] }}" data-ulb="{{ $item['city_code'] }}" data-location="{{ $item['agency_code'] }}"data-id="{{ $item['id'] }}"data-bs-toggle="modal" data-bs-target=".bs-example-modal-center" >Edit</button>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="agency_table" style="display: none;">
                            <div class="table-responsive">
                                <table class="table table-bordered border-primary mb-0 datatable gridjs-table">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>District Name</th>
                                            <th>ULB</th>
                                            <th>Shelter Home</th>
                                            <th>UserName</th>
                                            <th>Password</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data[0] as $key => $item)
                                        @if ($item['district_code'] != null && trim($item['type']) == 'AG')
                                                <tr>
                                                    <td>{{ $item['id'] }}</td>
                                                    <td>{{ $item['district_code'] }}</td>
                                                    <td>{{ $item['city_code'] }}</td>
                                                    <td>{{ $item['agency_code'] }}</td>
                                                    <td>{{ $item['username']}}</td>
                                                    <td>{{ $item['password']}}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary create_pass waves-effect waves-light" data-user="AG" 
                                                        data-dist="{{ $item['district_code'] }}" data-ulb="{{ $item['city_code'] }}" data-location="{{ $item['agency_code'] }}"data-id="{{ $item['id'] }}"data-bs-toggle="modal" data-bs-target=".bs-example-modal-center" >Edit</button>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="location_table" style="display: none;">
                            <div class="table-responsive">
                                <table class="table table-bordered border-primary mb-0 datatable gridjs-table">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>District Name</th>
                                            <th>ULB</th>
                                            <th>Shelter Construction Home</th>
                                            <th>UserName</th>
                                            <th>Password</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data[0] as $key => $item)
                                        @if ($item['district_code'] != null && trim($item['type']) == 'CA')
                                                <tr>
                                                    <td>{{ $item['id'] }}</td>
                                                    <td>{{ $item['district_code'] }}</td>
                                                    <td>{{ $item['city_code'] }}</td>
                                                    <td>{{ $item['agency_code'] }}</td>
                                                    <td>{{ $item['username']}}</td>
                                                    <td>{{ $item['password']}}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary create_pass waves-effect waves-light" data-user="CA" 
                                                        data-dist="{{ $item['district_code'] }}" data-ulb="{{ $item['city_code'] }}" data-location="{{ $item['agency_code'] }}"data-id="{{ $item['id'] }}"data-bs-toggle="modal" data-bs-target=".bs-example-modal-center" >Edit</button>
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
            <div class="modal fade bs-example-modal-center" data-bs-backdrop="static" tabindex="-1" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Create User</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="card-body">
                        <div class="row justify-content-center">
                            <input class="form-control type" type="hidden" name="type">
                            <input class="form-control user_id" type="hidden" name="user_id">
                            <input class="form-control dist" type="hidden" name="dist">
                            <input class="form-control ulb" type="hidden" name="ulb">
                            <input class="form-control location" type="hidden" name="location">
                            <div class="col-md-12">
                                <div class="mb-3 row">
                                    <div class="col-md-4">
                                        <label class="form-label">Username</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input class="form-control username" type="text" name="username">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <div class="col-md-4">
                                        <label class="form-label">New Password</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input class="form-control Password" type="text" name="Password">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <div class="col-md-4">
                                        <label class="form-label">Confirm Password</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input class="form-control cPassword" type="text" name="cPassword">
                                    </div>
                                </div>
                                <button type="button" class="btn btn-success w-sm waves-effect submit_user waves-light">Save</button>
                            </div>
                        </div>
                    </div>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>
        @section('scripts')
            <script>
                $('.change').on('change', function() {
                    val = $(this).val();
                    switch (val) {
                        case 'District':
                            $('div.dist').show()
                            $('div.ulbs').hide()
                            $('div.agency').hide()
                            $('div.location').hide()
                            $('.dist_table').show()
                            $('.ulbs_table').hide()
                            $('.agency_table').hide()
                            $('.location_table').hide()
                            break;
                        case 'ULB':
                            $('div.dist').show()
                            $('div.ulbs').show()
                            $('div.agency').hide()
                            $('div.location').hide()
                            $('.dist_table').hide()
                            $('.ulbs_table').show()
                            $('.agency_table').hide()
                            $('.location_table').hide()
                            break;
                        case 'Shelter_Home_Agency':
                            $('div.dist').show()
                            $('div.ulbs').show()
                            $('div.agency').show()
                            $('div.location').hide()
                            $('.dist_table').hide()
                            $('.ulbs_table').hide()
                            $('.agency_table').show()
                            $('.location_table').hide()
                            break;
                        case 'Shelter_Home_Construction_Agency':
                            $('div.dist').show()
                            $('div.ulbs').show()
                            $('div.agency').hide()
                            $('div.location').show()
                            $('.dist_table').hide()
                            $('.ulbs_table').hide()
                            $('.agency_table').hide()
                            $('.location_table').show()
                            break;
                    }
                })
                $('.submit_user').on('click', function(){
                    if($('.username').val() == ''){
                        alert('Please Enter username'); return false
                    }
                    if($('.Password').val() == ''){
                        alert('Please Enter Password'); return false
                    }
                    if($('.cPassword').val() == ''){
                        alert('Please Enter cPassword'); return false
                    }
                    if($('.Password').val() != $('.Password').val()){
                        alert('Password & Confirm Password Not Same'); return false
                    }

                    $.post('/api/users/create_pass/'+$('.user_id').val() ,{
                        'username' : $('.username').val(),
                        'password' : $('.Password').val(),
                        'cPassword' : $('.cPassword').val(),
                        'district_code' : $('.dist').val(),
                        'city_code' : $('.ulb').val(),
                        'agency_code' : $('.location').val(),
                        'type' : $('.type').val(),
                    },function(response){
                        response = JSON.parse(response);
                        if(response.status){
                            alert('Password Updated Successfully');
                            location.reload();
                        }else{
                            alert('Something went wrong');
                            console.log(response);;
                        }
                    })
                })
                $('.create_pass').on('click', function(){
                   $('.dist').val($(this).data('dist'))
                   $('.ulb').val($(this).data('ulb'))
                   $('.location').val($(this).data('location'))
                   $('.type').val($(this).data('user'))
                   $('.user_id').val($(this).data('id'))
                })
            </script>
            <!-- apexcharts -->
            {{-- <script src="{{ URL::asset('build/libs/apexcharts/apexcharts.min.js') }}"></script> --}}

            {{-- <!-- Vector map-->
        <script src="{{ URL::asset('build/libs/jsvectormap/js/jsvectormap.min.js') }}"></script>
        <script src="{{ URL::asset('build/libs/jsvectormap/maps/world-merc.js') }}"></script>

        <script src="{{ URL::asset('build/js/pages/dashboard.init.js') }}"></script> --}}
            <!-- App js -->
            <script src="{{ URL::asset('build/js/app.js') }}"></script>
        @endsection
