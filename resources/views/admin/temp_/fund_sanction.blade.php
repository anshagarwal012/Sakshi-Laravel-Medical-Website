@extends('layouts.master')
@section('title')
    Fund Sanction
@endsection

@section('page-title')
    Fund Sanction
@endsection
@section('body')

    <body data-layout="horizontal">
    @endsection
    @section('content')
        <input type="hidden" value="{{ json_encode($dist) }}" class="dist_">
        @if (session('success'))
            <script>
                alert('{{ session('success') }}')
            </script>
        @endif
        <div class="row mt-4">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title text-center text-primary m-0">Fund Sanction</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ url()->current() }}" method="POST">
                            @csrf
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <div class="mb-3 row">
                                        <label class="col-md-4 col-form-label">District Name :</label>
                                        <div class="col-md-8">
                                            <select class="form-select dist" name="dist">
                                                <option selected="selected" value="">All District</option>
                                                @foreach ($dist as $key => $item)
                                                    <option class="text-capitalize" value="{{ $key }}">
                                                        {{ $key }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-md-4 col-form-label">ULB Name:</label>
                                        <div class="col-md-8">
                                            <select class="form-select ulbs" required name="ulb_name">
                                                <option value="">Select City</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-md-4 col-form-label"> Location Name :</label>
                                        <div class="col-md-8">
                                            <select class="form-select location" required name="location_name">
                                                <option value="">Select Location</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-4 col-form-label">Capacity :</label>
                                        <div class="col-md-8">
                                            <input class="form-control capacity" type="text" readonly value=""
                                                required name="capacity">
                                        </div>
                                    </div>


                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-4 col-form-label">Sanction Fund by
                                            SLPSC ₹:</label>
                                        <div class="col-md-8">
                                            <input class="form-control sanctionfundbyslpsc" type="number" min="0.1"
                                                step="0.001" value="0.0" required name="sanction_fund_by_slpsc">
                                            <br>
                                            <h6 class="text-danger">(Amount in Lakh)</h6>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-4 col-form-label"> Total Released
                                            Fund ₹:</label>
                                        <div class="col-md-8">
                                            <input class="form-control totalreleasedfund" type="number" min="0.1"
                                                step="0.001" value="0.0" required name="total_released_fund">
                                            <br>
                                            <h6 class="text-danger">(Amount in Lakh)</h6>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-4 col-form-label"> Remaining Fund ₹:
                                        </label>
                                        <div class="col-md-8">
                                            <input class="form-control remainingfund" readonly type="number" min="0"
                                                value="0.0" required name="remaining_fund">
                                            <br>
                                            <h6 class="text-danger">(Amount in Lakh)</h6>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-md-4 col-form-label">Sanctioned By :</label>
                                        <div class="col-md-8">
                                            <select class="form-select" readonly required name="sanctioned">
                                                <option value="SUDA">SUDA</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="d-flex mb-3 justify-content-center">
                                        <button type="submit"
                                            class="btn btn-primary mx-2 w-sm waves-effect waves-light">Save</button>
                                        <!--button type="button"
                                                    class="btn btn-success mx-2 w-sm waves-effect waves-light">Cancel</-->
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
        <script>
            $('[name="sanction_fund_by_slpsc"],[name="total_released_fund"]').on('keyup', function() {
                $('[name="remaining_fund"]').val(parseFloat($('[name="sanction_fund_by_slpsc"]').val()) - parseFloat($(
                    '[name="total_released_fund"]').val()))
            })
            $($('form')[2]).find('button[type="submit"]').on('click', function(e) {
                e.preventDefault()
                if (Math.sign($('.remainingfund').val()) < 0) {
                    alert('Remaning Fund Can\'t in Negative');
                } else {
                    $($('form')[2]).submit()
                }
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
