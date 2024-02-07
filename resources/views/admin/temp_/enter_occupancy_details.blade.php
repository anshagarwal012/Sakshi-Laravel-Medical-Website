@extends('layouts.master')
@section('title')
    Shelter Home Occupancy Entry
@endsection

@section('page-title')
    Shelter Home Occupancy Entry
@endsection
@section('body')

    <body data-layout="horizontal">
    @endsection
    @section('content')
        <input type="hidden" value="{{ json_encode($dist) }}" class="dist_">
        @if (isset($edit_data))
            <div class="row mt-4">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title text-center text-primary m-0">Shelter Home Occupancy Entry</h3>
                        </div>
                        <div class="card-body">
                            <div class="mt-4 mt-xl-0">
                                @if (session('success'))
                                    <script>
                                        alert('{{ session('success') }}');
                                    </script>
                                @endif
                                <form class="mb-4" action="/occupancy_details_edit_or_delete" method="POST"
                                    enctype="multipart/form-data">
                                    @method('patch')
                                    @csrf
                                    <input type="hidden" name="_id" value="{{ Request::segment(2) }}">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="formrow-email-input">District Name :</label>
                                                <select class="form-select dist" disabled name="dist">
                                                    <option selected="selected" value="{{ $edit_data->dist }}">
                                                        {{ $edit_data->dist }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">ULB Name :</label>
                                                <select class="form-select ulbs" disabled name="ulbs">
                                                    <option selected="selected" value="{{ $edit_data->ulbs }}">
                                                        {{ $edit_data->ulbs }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="formrow-email-input">Location Name</label>
                                                <select class="form-select location" disabled name="location">
                                                    <option selected="selected" value="{{ $edit_data->location }}">
                                                        {{ $edit_data->location }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Capacity</label>
                                                <input class="form-control" type="number" required
                                                    name="capacity"value="{{ $edit_data->capacity }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 row">
                                                <label for="example-date-input" class="col-md-4 col-form-label"> Date of
                                                    Ocupancy</label>
                                                <div class="col-md-8">
                                                    <input class="form-control" type="date" required
                                                        name="functional_date" value="{{ $edit_data->functional_date }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 row">
                                                <label for="example-date-input" class="col-md-4 col-form-label">Type of
                                                    Structure</label>
                                                <div class="col-md-8 d-flex justify-content-between">
                                                    <div class="form-check mb-3">
                                                        <input class="form-check-input" name="Structure" type="radio"
                                                            {{ $edit_data->Structure == 'DAY_NULM' ? 'checked' : '' }}
                                                            required value="DAY_NULM">
                                                        <label class="form-check-label">
                                                            DAY_NULM
                                                        </label>
                                                    </div>
                                                    {{-- <div class="form-check mb-3">
                                                        <input class="form-check-input" name="Structure" type="radio"
                                                            {{ $edit_data->Structure == 'NON DAY_NULM' ? 'checked' : '' }}
                                                            required value="NON DAY_NULM">
                                                        <label class="form-check-label">
                                                            NON DAY_NULM
                                                        </label>
                                                    </div>
                                                    <div class="form-check mb-3">
                                                        <input class="form-check-input" name="Structure" type="radio"
                                                            {{ $edit_data->Structure == 'TEMPORARY' ? 'checked' : '' }}
                                                            required value="TEMPORARY">
                                                        <label class="form-check-label">
                                                            TEMPORARY
                                                        </label>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <h6>Self :</h6>
                                        <div class="col-md-4">
                                            <div class="mb-3 row">
                                                <label for="example-date-input"
                                                    class="col-md-4 col-form-label">Male:</label>
                                                <div class="col-md-8">
                                                    <input class="form-control" type="number" required name="self_male"
                                                        value="{{ $edit_data->self_male }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3 row">
                                                <label for="example-date-input"
                                                    class="col-md-4 col-form-label">Female:</label>
                                                <div class="col-md-8">
                                                    <input class="form-control" type="number" required name="self_female"
                                                        value="{{ $edit_data->self_female }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3 row">
                                                <label for="example-date-input"
                                                    class="col-md-4 col-form-label">Transgender:</label>
                                                <div class="col-md-8">
                                                    <input class="form-control" type="number" required
                                                        name="self_transgender" value="{{ $edit_data->self_transgender }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <h6>Mobilized :</h6>
                                        <div class="col-md-4">
                                            <div class="mb-3 row">
                                                <label for="example-date-input"
                                                    class="col-md-4 col-form-label">Male:</label>
                                                <div class="col-md-8">
                                                    <input class="form-control" type="number" required
                                                        name="mobilized_male" value="{{ $edit_data->mobilized_male }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3 row">
                                                <label for="example-date-input"
                                                    class="col-md-4 col-form-label">Female:</label>
                                                <div class="col-md-8">
                                                    <input class="form-control" type="number" required
                                                        name="mobilized_female"
                                                        value="{{ $edit_data->mobilized_female }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3 row">
                                                <label for="example-date-input"
                                                    class="col-md-4 col-form-label">Transgender:</label>
                                                <div class="col-md-8">
                                                    <input class="form-control" type="number" required
                                                        name="mobilized_transgender"
                                                        value="{{ $edit_data->mobilized_transgender }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mt-4">
                                                <label for="formFile" class="form-label">Occupancy Details File :</label>
                                                <input class="form-control" type="file" name="file" id="formFile"
                                                    accept=".pdf">
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-auto">
                                            <button type="submit"
                                                class="btn btn-primary w-sm waves-effect waves-light">Save</button>
                                            <a href="{{ redirect()->back()->getTargetUrl() }}"
                                                class="btn btn-danger w-sm waves-effect waves-light">Cancel</a>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="row mt-4">
                @if (session('success'))
                    <script>
                        alert('{{ session('success') }}');
                    </script>
                @endif
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title text-center text-primary m-0">Shelter Home Occupancy Entry</h3>
                        </div>
                        <div class="card-body">
                            <div class="mt-4 mt-xl-0">

                                <form class="mb-4" action="{{ url()->current() }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="formrow-email-input">District Name
                                                    :</label>
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
                                                <label class="form-label">ULB Name :</label>
                                                @if ($users[0]['type'] == 'SU')
                                                    <select class="form-select ulbs" name="ulbs">
                                                        <option selected="selected" value="">All ULBs</option>
                                                    </select>
                                                @elseif ($users[0]['type'] == 'DU')
                                                    <select class="form-select ulbs" name="ulbs">
                                                        {{-- <option selected="selected" value="">All ULBS</option> --}}
                                                        @php
                                                            $t = '';
                                                        @endphp
                                                        @foreach ($dist[$users[0]['district_code']] as $key => $item)
                                                            {{-- @if ($item['ulb'] == $users[0]['city_code']) --}}
                                                            @if ($t != $item['ulb'])
                                                                @php
                                                                    $t = $item['ulb'];
                                                                @endphp
                                                                <option class="text-capitalize"
                                                                    value="{{ $item['ulb'] }}">
                                                                    {{ $item['ulb'] }}</option>
                                                            @endif
                                                            {{-- @endif --}}
                                                        @endforeach
                                                    </select>
                                                @elseif ($users[0]['type'] == 'UL')
                                                    <input type="hidden" name="ulbs"
                                                        value="{{ $users[0]['city_code'] }}">
                                                    <select class="form-select ulbs" name="ulbs" disabled>
                                                        <option class="text-capitalize" selected
                                                            value="{{ $users[0]['city_code'] }}">
                                                            {{ $users[0]['city_code'] }}</option>
                                                    </select>
                                                @elseif ($users[0]['type'] == 'AG')
                                                    <input type="hidden" name="ulbs"
                                                        value="{{ $users[0]['city_code'] }}">
                                                    <select class="form-select ulbs" name="ulbs" disabled>
                                                        <option class="text-capitalize" selected
                                                            value="{{ $users[0]['city_code'] }}">
                                                            {{ $users[0]['city_code'] }}</option>
                                                    </select>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Location :</label>
                                                @if ($users[0]['type'] == 'SU')
                                                    <select class="form-select location" name="location">
                                                        <option selected="selected" value="">All location</option>
                                                    </select>
                                                @elseif ($users[0]['type'] == 'UL' || $users[0]['type'] == 'DU')
                                                    @php
                                                        $temm_location = '';
                                                    @endphp
                                                    <select class="form-select location" name="location">
                                                        {{-- <option selected="selected" value="">All Locations</option> --}}
                                                        @foreach ($dist[$users[0]['district_code']] as $key => $item)
                                                            {{-- {{dd($item)}} --}}
                                                            @if ($item['functional_shelter'] != $temm_location)
                                                                @php
                                                                    $temm_location = $item['functional_shelter'];
                                                                @endphp
                                                                <option class="text-capitalize"
                                                                    value="{{ $item['functional_shelter'] }}">
                                                                    {{ $item['functional_shelter'] }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                @elseif ($users[0]['type'] == 'AG')
                                                    <input type="hidden" name="location"
                                                        value="{{ $users[0]['agency_code'] }}">
                                                    <select class="form-select location" name="location" disabled>
                                                        <option class="text-capitalize" selected
                                                            value="{{ $users[0]['agency_code'] }}">
                                                            {{ $users[0]['agency_code'] }}</option>
                                                    </select>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Capacity</label>
                                                <input class="form-control" type="number" readonly required
                                                    name="capacity"value="{{ $data[0]->capacity }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 row">
                                                <label for="example-date-input" class="col-md-4 col-form-label">
                                                    Date of Ocupancy</label>
                                                <div class="col-md-8">
                                                    @php
                                                        $yesterday = new DateTime('yesterday');
                                                    @endphp
                                                    <input class="form-control" type="date" required
                                                        name="functional_date" max="{{$yesterday->format('Y-m-d')}}" value="">
                                                </div>
                                            </div>
                                        </div>
                                        {{-- {{dd($data)}} --}}
                                        <style>
                                            label.form-check-label {
                                                font-size: 12px;
                                            }
                                        </style>
                                        <div class="col-md-6">
                                            <div class=" row">
                                                <label for="example-date-input" class="col-md-4 col-form-label">Type of
                                                    Structure</label>
                                                <div class="col-md-8 d-flex justify-content-between  align-self-center">
                                                    <div class="form-check ">
                                                        <input class="form-check-input" name="Structure" type="radio"
                                                            checked required value="DAY_NULM">
                                                        <label class="form-check-label">
                                                            DAY_NULM
                                                        </label>
                                                    </div>
                                                    {{-- <div class="form-check ">
                                                        <input class="form-check-input" name="Structure" type="radio"
                                                            required value="NON DAY_NULM">
                                                        <label class="form-check-label">
                                                            NON DAY_NULM
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="Structure" type="radio"
                                                            required value="TEMPORARY">
                                                        <label class="form-check-label">
                                                            TEMPORARY
                                                        </label>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <h6>Self :</h6>
                                        <div class="col-md-4">
                                            <div class="mb-3 row">
                                                <label for="example-date-input"
                                                    class="col-md-4 col-form-label">Male:</label>
                                                <div class="col-md-8">
                                                    <input class="form-control" type="number" required name="self_male"
                                                        value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3 row">
                                                <label for="example-date-input"
                                                    class="col-md-4 col-form-label">Female:</label>
                                                <div class="col-md-8">
                                                    <input class="form-control" type="number" required
                                                        name="self_female" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3 row">
                                                <label for="example-date-input"
                                                    class="col-md-4 col-form-label">Transgender:</label>
                                                <div class="col-md-8">
                                                    <input class="form-control" type="number" required
                                                        name="self_transgender" value="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <h6>Mobilized :</h6>
                                        <div class="col-md-4">
                                            <div class="mb-3 row">
                                                <label for="example-date-input"
                                                    class="col-md-4 col-form-label">Male:</label>
                                                <div class="col-md-8">
                                                    <input class="form-control" type="number" required
                                                        name="mobilized_male" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3 row">
                                                <label for="example-date-input"
                                                    class="col-md-4 col-form-label">Female:</label>
                                                <div class="col-md-8">
                                                    <input class="form-control" type="number" required
                                                        name="mobilized_female" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3 row">
                                                <label for="example-date-input"
                                                    class="col-md-4 col-form-label">Transgender:</label>
                                                <div class="col-md-8">
                                                    <input class="form-control" type="number" required
                                                        name="mobilized_transgender" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mt-4">
                                                <label for="formFile" class="form-label">Occupancy Details File :</label>
                                                <input class="form-control" type="file" name="file" id="formFile"
                                                    accept=".pdf">
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-auto">
                                            <button type="submit"
                                                class="btn btn-primary w-sm waves-effect waves-light">Save</button>
                                            <a href="{{ redirect()->back()->getTargetUrl() }}"
                                                class="btn btn-danger w-sm waves-effect waves-light">Cancel</a>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endsection
    @section('scripts')
        <script src="{{ URL::asset('build/js/app.js') }}"></script>
    @endsection
