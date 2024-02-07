@extends('layouts.master')
@section('title')
    {{ucwords(str_replace('-',' ',(request()->segment(2))))}}
@endsection

@section('page-title')
    {{ucwords(str_replace('-',' ',(request()->segment(2))))}}
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
                        <h3 class="card-title text-center text-primary m-0">{{ucwords(str_replace('-',' ',(request()->segment(2))))}}</h3>
                    </div>
                    <div class="card-body">
                        <div class="">
                            <div class="mt-4 mt-xl-0">
                                <form class="mb-4">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="formrow-email-input">District Name :</label>
                                                @if ($users[0]['type'] == 'AG' || $users[0]['type'] == 'CA' || $users[0]['type'] == 'UL' || $users[0]['type'] == 'DU')
                                                    <select class="form-select dist" disabled>
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
                                                @elseif ($users[0]['type'] == 'AG' || $users[0]['type'] == 'CA' || $users[0]['type'] == 'UL')
                                                    <select class="form-select ulbs" disabled>
                                                        <option class="text-capitalize" selected
                                                            value="{{ $users[0]['city_code'] }}">
                                                            {{ $users[0]['city_code'] }}</option>
                                                    </select>
                                                @elseif ($users[0]['type'] == 'DU')
                                                    <select class="form-select ulbs" name="ulbs">
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
                                                @elseif ($users[0]['type'] == 'CA' || $users[0]['type'] == 'AG')
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
                                                <select class="form-select status">
                                                    <option selected="selected" value="">All</option>
                                                    <option value="Functional">Functional</option>
                                                    <option value="Temporary">Under construction</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <button type="button"
                                        class="btn btn-primary w-sm waves-effect waves-light">Search</button> --}}
                                </form>
                            </div>
                        </div>

                        {{-- <div class="card"> --}}
                        {{-- <div class="card-body"> --}}
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#shelter_home_details" role="tab"
                                    aria-selected="false">
                                    <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                    <span class="d-none d-sm-block">Shelter Home Details</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#shelter_home_construction_details"
                                    role="tab" aria-selected="true">
                                    <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                    <span class="d-none d-sm-block">Shelter Home Construction Details</span>
                                </a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content p-3 text-muted">
                            <div class="tab-pane active" id="shelter_home_details" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table table-bordered border-primary mb-0 datatable gridjs-table">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>District Name</th>
                                                <th>City Name</th>
                                                <th>Location</th>
                                                <th>Capacity</th>
                                                <th>Status</th>
                                                <th>Structure</th>
                                                @if ($users[0]['type'] == 'SU')
                                                    <th>Action</th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data[0] as $key => $item)
                                                <tr>
                                                    <td>{{ $item['id'] }}</td>
                                                    <td>{{ $item['dist'] }}</td>
                                                    <td>{{ $item['ulb'] }}</td>
                                                    <td>{{ $item['name'] }}</td>
                                                    <td>{{ $item['capacity'] }}</td>
                                                    <td>{{ $item['status'] }}</td>
                                                    <td>{{ $item['Structure'] }}</td>
                                                    @if ($users[0]['type'] == 'SU')
                                                        <td>
                                                            <form action="{{ url()->current() }}"
                                                                class="col-md-6 text-center p-0" method="POST">
                                                                @method('delete')
                                                                @csrf
                                                                <input type="submit" class="btn delete_check btn-danger me-1"
                                                                    value="Delete">
                                                                <input type="hidden" name="id" value="{{ $item['id'] }}">
                                                                <input type="hidden" name="type" value="shelterhome">
                                                            </form>

                                                        </td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <div class="tab-pane" id="shelter_home_construction_details" role="tabpanel">
                                <table class="table table-bordered border-primary mb-0 datatable gridjs-table">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>District Name</th>
                                            <th>City Name</th>
                                            <th>Location</th>
                                            <th>Capacity</th>
                                            <th>Status</th>
                                            <th>Sanction Date</th>
                                            @if ($users[0]['type'] == 'SU')
                                            <th>Action</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data[1] as $key => $item)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $item['dist'] }}</td>
                                                <td>{{ $item['ulb_name'] }}</td>
                                                <td>{{ $item['shelter_home_Name'] }}</td>
                                                <td>{{ $item['capacity'] }}</td>
                                                <td>Under Construction</td>
                                                <td>{{ $item['sanction_date'] }}</td>
                                                @if ($users[0]['type'] == 'SU')
                                                <td>
                                                    <form action="{{ url()->current() }}"
                                                        class="col-md-6 text-center p-0" method="POST">
                                                        @method('delete')
                                                        @csrf
                                                        <input type="submit" class="btn delete_check btn-danger me-1"
                                                            value="Delete">
                                                        <input type="hidden" name="id" value="{{ $item['id'] }}">
                                                        <input type="hidden" name="type" value="shelterhome_cons">
                                                    </form>

                                                </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{-- </div><!-- end card-body --> --}}
                        {{-- </div> --}}


                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('scripts')
        @if ($users[0]['type'] == 'SU')
            <script>
                setTimeout(() => {
                    $(document).on('click','.delete_check',function(e){
                    e.preventDefault();
                    if(confirm('Are You Sure You Want To Delete This ?')){
                        $(this).closest('form').submit();
                    }
                    
                })
                });
            </script>
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
            {{-- table.api().columns(2).search('^{{ $users[0]['city_code'] }}$', true, false).draw(); --}}
        @elseif ($users[0]['type'] == 'AG' || $users[0]['type'] == 'CA')
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
