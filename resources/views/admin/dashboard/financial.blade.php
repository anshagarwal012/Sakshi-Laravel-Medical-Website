<ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link card-body active text-white" style="background: var(--bs-orange) !important;"
            data-bs-toggle="tab" href="#shelter_home_details" role="tab" aria-selected="true">
            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
            <span class="d-none d-sm-block">Functional Shelter Home</span>
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link card-body text-white" style="background: var(--bs-dark) !important;" data-bs-toggle="tab"
            href="#shelter_home_construction_details1" role="tab" aria-selected="false" tabindex="-1">
            <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
            <span class="d-none d-sm-block">Under Construction Shelter Home</span>
        </a>
    </li>
</ul>
<div class="tab-content p-3">
    <div class="tab-pane active show" id="shelter_home_details" role="tabpanel">
        <div class="row">
            <div class="card-body">
                <input type="hidden" value="{{ json_encode($data[4]) }}" class="dist_">
                <div class="">
                    <div class="mt-4 mt-xl-0">
                        <form class="mb-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="formrow-email-input">District Name :</label>
                                        <select class="form-select dist">
                                            <option selected="selected" value="">All District</option>
                                            @php
                                                $dists = [];
                                            @endphp
                                            @foreach ($data[4] as $key => $item)
                                                @php
                                                    $dists[] = $key;
                                                @endphp
                                                <option class="text-capitalize" value="{{ $key }}">
                                                    {{ $key }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="formrow-password-input">ULB Name
                                            :</label>
                                        <select class="form-select ulbs">
                                            <option selected="selected" value="">All ULBs</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="formrow-email-input">Location
                                            Name</label>
                                        <select class="form-select location">
                                            <option selected="selected" value="">All Locations</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-body pb-0">
                                    @include('dashboard/map')
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="card bg-primary text-white"
                                        style="background: var(--bs-indigo) !important;">
                                        <div class="card-body">
                                            <div>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-0  text-white font-size-20 add_text_map">Functional Shelter
                                                            Home</h6>
                                                    </div>
                                                </div>
                                                <div>
                                                    <h4
                                                        class="mt-4 pt-1 mb-0 font-size-22 text-white shelter_homes_count">
                                                        {{ count($data[3]) }}</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="card bg-primary text-white">
                                        <div class="card-body">
                                            <div>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-0  text-white font-size-20">Fund Sanction
                                                        </h6>
                                                    </div>
                                                </div>
                                                <div>
                                                    <h4 class="mt-4 pt-1 mb-0 font-size-22 text-white Sanction">
                                                        00</h4><span>(lakh)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="card bg-secondary text-white">
                                        <div class="card-body">
                                            <div>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-0  text-white font-size-20">Fund Release
                                                        </h6>
                                                    </div>
                                                </div>
                                                <div>
                                                    <h4 class="mt-4 pt-1 mb-0 font-size-22 text-white Release">
                                                        00</h4><span>(lakh)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="card bg-warning text-white">
                                        <div class="card-body">
                                            <div>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-0  text-white font-size-20">Fund Remaining
                                                        </h6>
                                                    </div>
                                                </div>
                                                <div>
                                                    <h4 class="mt-4 pt-1 mb-0 font-size-22 text-white Remaining">
                                                        00</h4><span>(lakh)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="card bg-danger text-white">
                                        <div class="card-body">
                                            <div>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-0  text-white font-size-20">Fund Demand
                                                        </h6>
                                                    </div>
                                                </div>
                                                <div>
                                                    <h4 class="mt-4 pt-1 mb-0 font-size-22 text-white Demand">
                                                        00</h4><span>(lakh)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="card bg-info text-white">
                                        <div class="card-body">
                                            <div>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-0  text-white font-size-20">Fund Utilized
                                                        </h6>
                                                    </div>
                                                </div>
                                                <div>
                                                    <h4 class="mt-4 pt-1 mb-0 font-size-22 text-white Utilized">
                                                        00</h4><span>(lakh)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="card bg-success text-white">
                                        <div class="card-body">
                                            <div>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-0  text-white font-size-20">Fund Unspent
                                                        </h6>
                                                    </div>
                                                </div>
                                                <div>
                                                    <h4 class="mt-4 pt-1 mb-0 font-size-22 text-white Unspent">
                                                        00</h4><span>(lakh)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tab panes -->
                <div class="tab-content p-3 text-muted table-responsive">
                    <div class="tab-pane active" id="shelter_home_construction_details" role="tabpanel">
                        <table class="table table-bordered border-primary mb-0 financial_table gridjs-table">
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
                                    {{-- <th>Fund Demand Date from Agency</th> --}}
                                    <th>Fund Demand Amount from Agency</th>
                                    {{-- <th>Upload letter from Agency</th> --}}
                                    {{-- <th>Fund Demand Date from ULB</th> --}}
                                    <th>Fund Demand Amount from ULB</th>
                                    {{-- <th>Upload letter From ULB</th> --}}
                                    {{-- <th>Fund Demand Date from DUDA</th> --}}
                                    <th>Fund Demand Amount from DUDA</th>
                                    {{-- <th>Upload letter From DUDA</th> --}}
                                    {{-- <th>Pending Remark (ULB/DUDA)</th> --}}
                                    <th>Fund Released by SUDA</th>
                                    {{-- <th>Fund Released Date by SUDA</th> --}}
                                    <th>Fund Released by DUDA</th>
                                    {{-- <th>Fund Released Date by DUDA</th> --}}
                                    <th>Fund Released by ULB</th>
                                    {{-- <th>Fund Released Date by ULB</th> --}}
                                    <th>Fund Utilized by Agency</th>
                                    {{-- <th>Utilization Date</th> --}}
                                    {{-- <th>Upload Utilization Certificate</th> --}}
                                    <th>Fund Utilized by ULB</th>
                                    {{-- <th>Utilization Date</th> --}}
                                    {{-- <th>Upload Utilization Certificate</th> --}}
                                    <th>Fund Utilized by DUDA</th>
                                    <th>Fund Unspent By District</th>
                                    {{-- <th>Utilization Date</th> --}}
                                    {{-- <th>Upload Utilization Certificate</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 0;
                                    // dd($data[6]);
                                @endphp
                                @foreach ($data[6] as $key => $item)
                                    @foreach ($item as $key1 => $item1)
                                        @foreach ($item1 as $key2 => $item2)
                                            {{-- {{ dd($item2[0]) }} --}}
                                            {{-- @php
                                                try {
                                                    $item2[0]['demand_date'];
                                                } catch (\Throwable $th) {
                                                    dd($item1);
                                                }
                                            @endphp --}}
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>{{ $key }}</td>
                                                <td>{{ $key1 }}</td>
                                                <td>{{ $key2 }}</td>
                                                <td>{{ $item2[0]['capacity'] ?? 00 }}</td>
                                                <td>{{ number_format(($item2[0]['sanction_fund_by_slpsc'] ?? 00 ),3,'.', ',') }}</td>
                                                <td>{{ number_format(($item2[0]['total_released_fund'] ?? 00 ),3,'.', ',') }}</td>
                                                <td>{{ number_format(($item2[0]['remaining_fund'] ?? 00 ),3,'.', ',') }}</td>
                                                {{-- <td>{{ ($item2[0]['fund_amount'] ?? '') ?'':($item2[0]['demand_date']??"") }}</td> --}}
                                                <td>{{ (($item2[0]['fund_amount']?? '') == '' || ($item2[0]['fund_amount']?? '') == 0)  ? '' :$item2[0]['fund_amount']}}</td>
                                                {{-- <td>
                                                    @if (($item2[0]['upload_demand_letter']?? '') != null)
                                                        <a
                                                            href="{{ url('admin/public/storage/uploads/' . $item2[0]['upload_demand_letter']) }}">Download</a>
                                                    @endif
                                                </td> --}}
                                                {{-- <td>{{ $item2[0]['ulb_date'] ?? '' }}</td> --}}
                                                <td>{{ (($item2[0]['fund_amount']?? '') == '' || ($item2[0]['fund_amount']?? '') == 0)  ? '' :$item2[0]['fund_amount']}}</td>
                                                {{-- <td>
                                                    @if (($item2[0]['ulb_demand_letter']?? '') != null)
                                                        <a
                                                            href="{{ url('admin/public/storage/uploads/' . $item2[0]['ulb_demand_letter']) }}">Download</a>
                                                    @endif
                                                </td> --}}


                                                {{-- <td>{{ $item2[0]['duda_date']?? '' }}</td> --}}
                                                <td>{{ (($item2[0]['fund_amount']?? '') == '' || ($item2[0]['fund_amount']?? '') == 0)  ? '' :$item2[0]['fund_amount']}}</td>
                                                {{-- <td>
                                                    @if (($item2[0]['duda_demand_letter']?? '') != null)
                                                        <a
                                                            href="{{ url('admin/public/storage/uploads/' . $item2[0]['duda_demand_letter']) }}">Download</a>
                                                    @endif
                                                </td> --}}
                                                {{-- <td>{{ $item2[0]['suda_remark'] ?? '' }}</td> --}}
                                                <td>{{ $item2[0]['suda_released_amount'] ?? '' }}</td>
                                                {{-- <td>{{ $item2[0]['suda_date'] ?? '' }}</td> --}}
                                                <td>{{ $item2[0]['duda_demand_approve'] ?? '' }}</td>
                                                {{-- <td>{{ $item2[0]['duda_date'] ?? '' }}</td> --}}
                                                <td>{{ $item2[0]['ulb_demand_approve'] ?? '' }}</td>
                                                {{-- <td>{{ $item2[0]['ulb_date'] ?? '' }}</td> --}}
                                                <td>
                                                    @if (($item2[0]['duda_approve'] ?? null) == '1')
                                                        {{$item2[0]['fund_amount'] ?? 0}}
                                                        @else
                                                        
                                                    @endif
                                                </td>
                                                {{-- <td>{{ ($item2[0]['fund_amount'] ?? '') ?($item2[0]['demand_date']??""):"" }}</td> --}}
                                                {{-- <td>
                                                    @if (($item2[0]['utilization_certificate']?? '') != null)
                                                        <a
                                                            href="{{ url('admin/public/storage/uploads/' . $item2[0]['utilization_certificate']) }}">Download</a>
                                                    @endif
                                                </td> --}}
                                                <td>{{ $item2[0]['utilization_amount']?? '' }}</td>
                                                {{-- <td>{{ $item2[0]['ulb_date'] ?? ''}}</td> --}}
                                                {{-- <td>
                                                    @if (($item2[0]['utilization_certificate']?? '') != null)
                                                        <a
                                                            href="{{ url('admin/public/storage/uploads/' . $item2[0]['utilization_certificate']) }}">Download</a>
                                                    @endif
                                                </td> --}}
                                                <td>{{ $item2[0]['utilization_amount']?? '' }}</td>
                                                {{-- <td>{{ $item2[0]['ulb_date']?? '' }}</td> --}}
                                                {{-- <td>
                                                    @if (($item2[0]['utilization_certificate']?? '') != null)
                                                    <a
                                                    href="{{ url('admin/public/storage/uploads/' . $item2[0]['utilization_certificate']) }}">Download</a>
                                                    @endif
                                                </td> --}}
                                                @php
                                                    $unspend_dis = (($item2[0]['total_released_fund'] ?? 0)+ ($item2[0]['suda_released_amount'] ?? 0)-($item2[0]['utilization_amount'] ?? 0))
                                                @endphp
                                                 <td>{{ number_format($unspend_dis , 3, '.', ',') }}</td>
                                            </tr>

                                            @php
                                                $i++;
                                            @endphp
                                        @endforeach
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane" id="shelter_home_construction_details1" role="tabpanel">
        <div class="row">
            <div class="card-body">
                <input type="hidden" value="{{ json_encode($dist) }}" class="dist_">
                <div class="">
                    <div class="mt-4 mt-xl-0">
                        <form class="mb-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="formrow-email-input">District Name :</label>
                                        <select class="form-select dist">
                                            <option selected="selected" value="">All District</option>
                                            @php
                                                $dists1 = [];
                                            @endphp
                                            @foreach ($data[2][2] as $key => $item)
                                                @php
                                                    $dists1[] = $key;
                                                @endphp
                                                <option class="text-capitalize" value="{{ $key }}">
                                                    {{ $key }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="formrow-password-input">ULB Name
                                            :</label>
                                        <select class="form-select ulbs">
                                            <option selected="selected" value="">All ULBs</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="formrow-email-input">Location
                                            Name</label>
                                        <select class="form-select location">
                                            <option selected="selected" value="">All Locations</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-body pb-0">
                                    @include('dashboard/map')
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="card bg-success text-white"
                                        style="background: var(--bs-indigo) !important;">
                                        <div class="card-body">
                                            <div>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-0  text-white font-size-20">Under Construction
                                                            Shelter Home</h6>
                                                    </div>
                                                </div>
                                                <div>
                                                    <h4 class="mt-4 pt-1 mb-0 font-size-22 text-white">
                                                        {{ json_decode($data[1])[2] }}</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="card bg-primary text-white">
                                        <div class="card-body">
                                            <div>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-0  text-white font-size-20">Fund Sanction
                                                        </h6>
                                                    </div>
                                                </div>
                                                <div>
                                                    <h4 class="mt-4 pt-1 mb-0 font-size-22 text-white Sanction">
                                                        00</h4><span>(lakh)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="card bg-secondary text-white">
                                        <div class="card-body">
                                            <div>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-0  text-white font-size-20">Fund Release
                                                        </h6>
                                                    </div>
                                                </div>
                                                <div>
                                                    <h4 class="mt-4 pt-1 mb-0 font-size-22 text-white Release">
                                                        00</h4><span>(lakh)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="card bg-warning text-white">
                                        <div class="card-body">
                                            <div>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-0  text-white font-size-20">Fund Remaining
                                                        </h6>
                                                    </div>
                                                </div>
                                                <div>
                                                    <h4 class="mt-4 pt-1 mb-0 font-size-22 text-white Remaining">
                                                        00</h4><span>(lakh)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="card bg-danger text-white">
                                        <div class="card-body">
                                            <div>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-0  text-white font-size-20">Fund Demand
                                                        </h6>
                                                    </div>
                                                </div>
                                                <div>
                                                    <h4 class="mt-4 pt-1 mb-0 font-size-22 text-white Demand">
                                                        00</h4><span>(lakh)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="card bg-info text-white">
                                        <div class="card-body">
                                            <div>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-0  text-white font-size-20">Fund Utilized
                                                        </h6>
                                                    </div>
                                                </div>
                                                <div>
                                                    <h4 class="mt-4 pt-1 mb-0 font-size-22 text-white Utilized">
                                                        00</h4><span>(lakh)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="card bg-success text-white">
                                        <div class="card-body">
                                            <div>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-0  text-white font-size-20">Fund Unspent
                                                        </h6>
                                                    </div>
                                                </div>
                                                <div>
                                                    <h4 class="mt-4 pt-1 mb-0 font-size-22 text-white Unspent">
                                                        00</h4><span>(lakh)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tab panes -->
                <div class="tab-content p-3 text-muted table-responsive">
                    <div class="tab-pane active" id="shelter_home_construction_details" role="tabpanel">
                        <table class="table table-bordered border-primary mb-0 financial_table_ gridjs-table">
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
                                    <th>Fund Demand Amount from Agency</th>
                                    <th>Upload letter from Agency</th>
                                    <th>Fund Demand Date from ULB</th>
                                    <th>Fund Demand Amount from ULB</th>
                                    <th>Upload letter From ULB</th>
                                    <th>Fund Demand Date from DUDA</th>
                                    <th>Fund Demand Amount from DUDA</th>
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
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 0;
                                    // dd($data[2][2] )
                                @endphp
                                @foreach ($data[2][2] as $key => $item)
                                    @foreach ($item as $key1 => $item1)
                                        {{-- @foreach ($item1 as $key2 => $item2) --}}
                                            {{-- {{ dd($item2) }} --}}
                                            
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>{{ $key }}</td>
                                                <td>{{ $item1['ulb'] }}</td>
                                                <td>{{ $item1['functional_shelter'] }}</td>
                                                <td>{{ $item1['Capacity'] ?? 00 }}</td>
                                                <td>{{ $item1[0]['sanction_fund_by_slpsc'] ?? 00 }}</td>
                                                <td>{{ number_format(($item1[0]['total_released_fund'] ?? 00 ),3,'.', ',') }}</td>
                                                <td>{{ number_format(($item1[0]['remaining_fund'] ?? 00 ),3,'.', ',') }}</td>
                                                <td>{{ $item['demand_date'] ?? '' }}</td>
                                                <td>{{ $item['total_released_fund'] ?? '' }}</td>
                                                <td>
                                                    @if (($item['upload_demand_letter']?? '') != null)
                                                        <a
                                                            href="{{ url('admin/public/storage/uploads/' . $item['upload_demand_letter']) }}">Download</a>
                                                    @endif
                                                </td>
                                                <td>{{ $item['ulb_date'] ?? '' }}</td>
                                                <td>{{ $item['total_released_fund']?? '' }}</td>
                                                <td>
                                                    @if (($item['ulb_demand_letter']?? '') != null)
                                                        <a
                                                            href="{{ url('admin/public/storage/uploads/' . $item['ulb_demand_letter']) }}">Download</a>
                                                    @endif
                                                </td>
                                                <td>{{ $item['duda_date']?? '' }}</td>
                                                <td>{{ $item['total_released_fund'] ?? ''}}</td>
                                                <td>
                                                    @if (($item['duda_demand_letter']?? '') != null)
                                                        <a
                                                            href="{{ url('admin/public/storage/uploads/' . $item['duda_demand_letter']) }}">Download</a>
                                                    @endif
                                                </td>
                                                <td>{{ $item['suda_remark'] ?? '' }}</td>
                                                <td>{{ $item['suda_released_amount'] ?? '' }}</td>
                                                <td>{{ $item['suda_date'] ?? '' }}</td>
                                                <td>{{ $item['fund_amount'] ?? '' }}</td>
                                                <td>{{ $item['duda_date'] ?? '' }}</td>
                                                <td>{{ $item['fund_amount'] ?? '' }}</td>
                                                <td>{{ $item['ulb_date'] ?? '' }}</td>
                                                <td>{{ $item['demand_date'] ?? '' }}</td>
                                                <td>{{ $item['demand_date'] ?? '' }}</td>
                                                <td>
                                                    @if (($item['utilization_certificate']?? '') != null)
                                                        <a
                                                            href="{{ url('admin/public/storage/uploads/' . $item['utilization_certificate']) }}">Download</a>
                                                    @endif
                                                </td>
                                                <td>{{ $item['utilization_amount']?? '' }}</td>
                                                <td>{{ $item['ulb_date'] ?? ''}}</td>
                                                <td>
                                                    @if (($item['utilization_certificate']?? '') != null)
                                                        <a
                                                            href="{{ url('admin/public/storage/uploads/' . $item['utilization_certificate']) }}">Download</a>
                                                    @endif
                                                </td>
                                                <td>{{ $item['utilization_amount']?? '' }}</td>
                                                <td>{{ $item['ulb_date']?? '' }}</td>
                                                <td>
                                                    @if (($item['utilization_certificate']?? '') != null)
                                                        <a
                                                            href="{{ url('admin/public/storage/uploads/' . $item['utilization_certificate']) }}">Download</a>
                                                    @endif
                                                </td>
                                            </tr>

                                            @php
                                                $i++;
                                            @endphp
                                        @endforeach
                                    {{-- @endforeach --}}
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    setTimeout(() => {
        // Physical 
        var table2 = $('.financial_table').dataTable({
            "pageLength": 100,
            dom: 'Bfrtip',
            buttons: [
                'csv', 'pdf'
            ],
        });
        $('#Financial #shelter_home_details select.dist').on('change', function() {
            table2.api().columns(1).search($(this).val()).draw();
        });
        $('#Financial #shelter_home_details select.ulbs').on('change', function() {
            table2.api().columns(2).search($(this).val()).draw();
        });
        $('#Financial #shelter_home_details select.location').on('change', function() {
            table2.api().columns(3).search($(this).val()).draw();
        });
        $('#Financial #shelter_home_details select.status').on('change', function() {
            table2.api().columns(5).search($(this).val()).draw();
        });


        addSerialNumberToTable_finan(table2);
        $('#Financial #shelter_home_details svg a').on('click', function(e) {
            $('svg a').removeClass('active');
            $(this).addClass('active');
            e.preventDefault();
            e = $(this).attr('xlink:title');
            $(document).find('.add_text_map').text('Functional Shelter Home ('+e+')')
            table2.api().columns(1).search('^' + e + '$', true, false).draw()
        })

        table2.api().on('draw', function() {
            // Call a function to add serial numbers
            addSerialNumberToTable_finan(table2);
        });

        function addSerialNumberToTable_finan(table2) {
            var rows = table2.api().rows({
                'search': 'applied'
            }).nodes();
            var Sanction = 0;
            var Release = 0;
            var Remaining = 0;
            var Demand = 0;
            var Utilized = 0;
            var Unspent = 0;
            for (var i = 0; i < rows.length; i++) {
                var serialCell = $(rows[i]).find('td:eq(0)');
                if (!serialCell.length) {
                    $(rows[i]).append('<td></td>');
                    serialCell = $(rows[i]).find('td:eq(0)');
                }
                serialCell.text(i + 1);

                var dd = $(rows[i]).find('td:eq(5)').html();
                if(dd!=''){
                    Sanction += parseFloat(dd);
                }

                var dd = $(rows[i]).find('td:eq(6)').html();
                var dd_ = $(rows[i]).find('td:eq(11)').html();
                if(dd!=''){
                    Release += parseFloat(dd);
                }
                if(dd_!=''){
                    Release += parseFloat(dd_);
                }

                var dd = $(rows[i]).find('td:eq(7)').html();
                if(dd!=''){
                    Remaining += parseFloat(dd);
                }

                var dd = $(rows[i]).find('td:eq(10)').html();
                if(dd!=''){
                    Demand += parseFloat(dd);
                }

                var dd = $(rows[i]).find('td:eq(16)').html();
                if(dd!=''){
                    Utilized += parseFloat(dd);
                }

                // debugger
            }
            $('#Financial #shelter_home_details .Sanction').html(Sanction.toFixed(2));
            $('#Financial #shelter_home_details .Release').html(Release.toFixed(2));
            $('#Financial #shelter_home_details .Remaining').html(Remaining.toFixed(2));
            $('#Financial #shelter_home_details .Demand').html(Demand.toFixed(2));
            $('#Financial #shelter_home_details .Utilized').html(Utilized.toFixed(2));
            $('#Financial #shelter_home_details .Unspent').html((Release.toFixed(2) - Utilized.toFixed(2)).toFixed(2));
            $('#Financial #shelter_home_details .shelter_homes_count').html(rows.length);
        }

        var dists = "{{ json_encode($dists) }}";
        var dists = dists.replace(/&quot;/g, '"');
        $('#Financial #shelter_home_details svg a').each(function() {
            if (!dists.includes(capitalizeFirstLetter($(this).attr('xlink:title')))) {
                $(this).find('path').attr('fill', '#808080')
            }
        })

        function capitalizeFirstLetter(str) {
            return str.charAt(0).toUpperCase() + str.slice(1);
        }

        // Under Construction

        var table5 = $('.financial_table_').dataTable({
            "pageLength": 100,
            dom: 'Bfrtip',
            buttons: [
                'csv', 'pdf'
            ],
        });
        $('#Financial #shelter_home_construction_details1 select.dist').on('change', function() {
            table5.api().columns(1).search($(this).val()).draw();
        });
        $('#Financial #shelter_home_construction_details1 select.ulbs').on('change', function() {
            table5.api().columns(2).search($(this).val()).draw();
        });
        $('#Financial #shelter_home_construction_details1 select.location').on('change', function() {
            table5.api().columns(3).search($(this).val()).draw();
        });
        $('#Financial #shelter_home_construction_details1 select.status').on('change', function() {
            table5.api().columns(5).search($(this).val()).draw();
        });


        addSerialNumberToTable_finan_construction(table5);
        $('#Financial #shelter_home_construction_details1 svg a').on('click', function(e) {
            $('svg a').removeClass('active');
            $(this).addClass('active');
            e.preventDefault();
            e = $(this).attr('xlink:title');
            table5.api().columns(1).search('^' + e + '$', true, false).draw()
        })

        table5.api().on('draw', function() {
            // Call a function to add serial numbers
            addSerialNumberToTable_finan_construction(table5);
        });

        function addSerialNumberToTable_finan_construction(table5) {
            var rows = table5.api().rows({
                'search': 'applied'
            }).nodes();
            var Sanction = 0;
            var Release = 0;
            var Remaining = 0;
            var Demand = 0;
            var Utilized = 0;
            var Unspent = 0;
            for (var i = 0; i < rows.length; i++) {
                var serialCell = $(rows[i]).find('td:eq(0)');
                if (!serialCell.length) {
                    $(rows[i]).append('<td></td>');
                    serialCell = $(rows[i]).find('td:eq(0)');
                }
                serialCell.text(i + 1);
                var dd = $(rows[i]).find('td:eq(5)').html();
                Sanction += parseFloat(dd);
                var dd = $(rows[i]).find('td:eq(6)').html();
                Release += parseFloat(dd);
                var dd = $(rows[i]).find('td:eq(7)').html();
                Remaining += parseFloat(dd);
            }
            $('#Financial #shelter_home_construction_details1 .Sanction').html(Sanction.toFixed(2));
            $('#Financial #shelter_home_construction_details1 .Release').html(Release.toFixed(2));
            $('#Financial #shelter_home_construction_details1 .Remaining').html(Remaining.toFixed(2));
            $('#Financial #shelter_home_construction_details1 .shelter_homes_count').html(rows.length);
        }

        var dists = "{{ json_encode($dists1) }}";
        var dists = dists.replace(/&quot;/g, '"');
        $('#Financial #shelter_home_construction_details1 svg a').each(function() {
            if (!dists.includes(capitalizeFirstLetter_($(this).attr('xlink:title')))) {
                $(this).find('path').attr('fill', '#808080')
            }
        })

        function capitalizeFirstLetter_(str) {
            return str.charAt(0).toUpperCase() + str.slice(1);
        }
    }, 2000);
</script>
