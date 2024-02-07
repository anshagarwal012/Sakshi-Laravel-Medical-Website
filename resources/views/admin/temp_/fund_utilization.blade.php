@extends('layouts.master')
@section('title')
    Fund Demand & Utilization
@endsection

@section('page-title')
    Fund Demand & Utilization
@endsection
@section('body')

    <body data-layout="horizontal">
    @endsection
    @section('content')
        {{-- {{dd($data[0]->toArray()[0])}} --}}
        <input type="hidden" value="{{ json_encode($dist) }}" class="dist_">
        <div class="row mt-4">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title text-center text-primary m-0">Fund Utilization</h3>
                    </div>
                    <div class="card-body">
                    </div>
                    @if (session('success'))
                            <script>alert('{{ session('success') }}')</script>
                        @endif
                        <form action="{{ url()->current() }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <div class="mb-3 row">
                                        <label class="col-md-4 col-form-label">District Name :</label>
                                        <div class="col-md-8">
                                            <input type="hidden" name="sanction_fund_id" value="{{$data[0]->toArray()[0]['id']}}">
                                            @if ($users[0]['type'] == 'DU' || $users[0]['type'] == 'UL')
                                            @elseif ($users[0]['type'] == 'AG')
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
                                    <div class="mb-3 row">
                                        <label class="col-md-4 col-form-label">ULB Name:</label>
                                        <div class="col-md-8">

                                            @if ($users[0]['type'] == 'SU')
                                                <select class="form-select ulbs">
                                                    <option selected="selected" value="">All ULBs</option>
                                                </select>
                                            @elseif ($users[0]['type'] == 'AG')
                                                <select class="form-select ulbs" disabled>
                                                    <option class="text-capitalize" selected
                                                        value="{{ $users[0]['city_code'] }}">
                                                        {{ $users[0]['city_code'] }}</option>
                                                </select>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-md-4 col-form-label"> Location Name :</label>
                                        <div class="col-md-8">

                                            @if ($users[0]['type'] == 'SU')
                                                <select class="form-select location">
                                                    <option selected="selected" value="">All location</option>
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

                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-4 col-form-label">Capacity :</label>
                                        <div class="col-md-8">
                                            <input class="form-control capacity" type="text" readonly value="{{$data[0]->toArray()[0]['capacity']}}"
                                                required name="capacity">
                                        </div>
                                    </div>


                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-4 col-form-label">Sanction Fund by
                                            SLPSC ₹:</label>
                                        <div class="col-md-8">
                                            <input class="form-control sanctionfundbyslpsc" readonly type="number" required
                                                name="sanction_fund_by_slpsc" value="{{$data[0]->toArray()[0]['sanction_fund_by_slpsc']}}">

                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-4 col-form-label"> Total Released Fund
                                            ₹:</label>
                                        <div class="col-md-8">
                                            <input class="form-control totalreleasedfund" readonly type="number" required
                                                name="total_released_fund" value="{{$data[0]->toArray()[0]['total_released_fund']}}">

                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-4 col-form-label"> Remaining Fund ₹:
                                        </label>
                                        <div class="col-md-8">
                                            <input class="form-control remainingfund" readonly type="number" required
                                                name="remaining_fund" value="{{$data[0]->toArray()[0]['remaining_fund']}}">

                                        </div>
                                    </div>
                                    {{-- <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-4 col-form-label"> Fund Demand ₹:
                                        </label>
                                    <div class="col-md-8">
                                            <input class="form-control fund_demand" min="0" step="0.001" type="number" required max="{{$data[0]->toArray()[0]['remaining_fund']}}"
                                                name="fund_amount">
                                            <br>
                                            <h6 class="text-danger">(Amount in Lakh)</h6>
                                        </div>
                                    </div> --}}
                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-4 col-form-label"> {{--Demand--}} Date :
                                        </label>
                                        <div class="col-md-8">
                                            <input class="form-control fund_demand" type="date" required
                                                name="demand_date">
                                        </div>
                                    </div>

                                    {{-- <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-4 col-form-label"> Upload Demand
                                            Letter:
                                        </label>
                                        <div class="col-md-8">
                                            <input class="form-control demand_letter" type="file"
                                                name="upload_demand_letter">
                                        </div>
                                    </div> --}}
                                    {{-- <h5>Utilization Details :</h5> --}}
                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-4 col-form-label"> Utilized Amount:
                                        </label>
                                        <div class="col-md-8">
                                            <input class="form-control utilized_amount mb-3" min="0" step="0.001" type="number" required
                                                name="utilization_amount">
                                            <h6 class="text-danger">(Amount in Lakh)</h6>
                                        </div>
                                    </div>
                                    
                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-4 col-form-label"> Upload
                                            Utilization Certificate:
                                        </label>
                                        <div class="col-md-8">
                                            <input class="form-control utilization_certificate" type="file" required
                                                name="utilization_certificate">
                                        </div>
                                    </div>
                                    <div class="d-flex mb-3 justify-content-center">
                                        <button type="submit" class="btn btn-primary mx-2 w-sm waves-effect waves-light">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
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
