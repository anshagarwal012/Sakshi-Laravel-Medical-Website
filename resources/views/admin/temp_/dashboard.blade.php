@extends('layouts.master')
@section('title')
    {{ucwords(str_replace('-',' ',(request()->segment(2))))}}
@endsection

@section('page-title')
    {{ucwords(str_replace('-',' ',(request()->segment(2))))}}
@endsection
@section('body')
    {{-- @php --}}
    {{-- @endphp --}}

    <body data-layout="horizontal">
    @endsection
    @section('content')
        <style>
            svg a:hover path {
                /* fill: #7532ff; */
                fill-opacity: 1
            }

            svg a.active path {
                /* fill: #7532ff; */
                fill-opacity: 1
            }

            .nav-tabs-custom .nav-item .nav-link.active {
                color: #1f58c7;
                background-color: transparent;
            }

            .nav-link .card {
                margin: 5px;
                box-shadow: none;
                border: none;
            }

            .nav-tabs-custom .nav-item {
                border-radius: 30px;
            }
        </style>
        {{-- {{dd($dist)}} --}}
        <div class="row mt-4">
            @if (session('message'))
                <script>
                    alert("{{ session('message') }}")
                </script>
            @endif
            <div class="col-lg-12">
                <div class="card">
                    <ul class="nav nav-tabs nav-tabs-custom nav-justified gap-3" role="tablist">
                        <li class="nav-item bg-success border-50" role="presentation">
                            <a class="nav-link active" data-bs-toggle="tab" href="#Physical" role="tab"
                                aria-selected="true">
                                <div class="card bg-success">
                                    <div class="card-body px-0">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="mb-0 font-size-22 text-white">Physical Progress</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item bg-danger border-50" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#Financial" role="tab" aria-selected="false"
                                tabindex="-1">
                                <div class="card bg-danger">
                                    <div class="card-body px-0">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="mb-0 font-size-22 text-white">Financial Progress</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item bg-primary border-50" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#Operation" role="tab" aria-selected="false"
                                tabindex="-1">
                                <div class="card bg-primary">
                                    <div class="card-body px-0">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="mb-0 font-size-22 text-white">Operation and Maintainance</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content p-3">
                        <div class="tab-pane pri active show" id="Physical" role="tabpanel">
                            @include('dashboard/physical')
                        </div>
                        <div class="tab-pane pri" id="Financial" role="tabpanel">
                            @include('dashboard/financial')
                        </div>
                        <div class="tab-pane pri" id="Operation" role="tabpanel">
                            @include('dashboard/om')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('scripts')
        <script>
            $('.container-fluid')[0].classList.remove('container-fluid')
        </script>
        <!-- apexcharts -->
        <script src="{{ URL::asset('build/libs/apexcharts/apexcharts.min.js') }}"></script>

        {{-- <!-- Vector map-->
        <script src="{{ URL::asset('build/libs/jsvectormap/js/jsvectormap.min.js') }}"></script>
        <script src="{{ URL::asset('build/libs/jsvectormap/maps/world-merc.js') }}"></script>

        <script src="{{ URL::asset('build/js/pages/dashboard.init.js') }}"></script> --}}
        <!-- App js -->
        <script src="{{ URL::asset('build/js/app.js') }}"></script>
        <script>
            // var options = {
            // series: {{ $data[1] }},
            // chart: {
            // width: 380,
            // type: 'pie',
            // },
            // labels: ['Total Dist', 'Total Cities', 'Location', 'Total Capacity'],
            // responsive: [{
            // breakpoint: 480,
            // options: {
            //     chart: {
            //     width: 200
            //     },
            //     legend: {
            //     position: 'bottom'
            //     }
            // }
            // }]
            // };

            // var chart = new ApexCharts(document.querySelector("#chart"), options);
            // chart.render();
        </script>
    @endsection
