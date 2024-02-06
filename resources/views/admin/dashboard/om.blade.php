{{-- {{(dd(count()))}} --}}
<div class="card-body" style="overflow: scroll;">
    <input type="hidden" value="{{ json_encode($data[4]) }}" class="dist_">
    <div class="">
        <div class="mt-4 mt-xl-0">
            <form class="mb-4">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="formrow-email-input">District Name
                                :</label>
                            <select class="form-select dist">
                                <option selected="selected" value="">All District</option>
                                @php
                                    $dists1 = [];
                                @endphp
                                @foreach ($data[4] as $key => $item)
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
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="formrow-password-input">Type</label>
                            <select class="form-select status">
                                <option selected="selected" value="">All</option>
                                <option value="DAY_NULM">DAY_NULM</option>
                                <option value="NON DAY_NULM">NON DAY_NULM</option>
                                <option value="TEMPORARY">TEMPORARY</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="example-date-input" class="col-md-4 col-form-label">From Date
                                :</label>
                            <div class="">
                                <input class="form-control" id="min1" type="text" value="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="example-date-input" class="col-md-4 col-form-label">To Date
                                :</label>
                            <div class="">
                                <input class="form-control" id="max1" type="text" value="">
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <button type="button"
                    class="btn btn-primary w-sm waves-effect waves-light">Search</button> --}}
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
                {{-- <div class="card">
                    <div class="card-body">
                        <div id="chart" data-colors='["#1f58c7", "#4976cf","#6a92e1", "#e6ecf9"]' class="apex-charts" dir="ltr"></div>
                    </div>
                </div> --}}
                <div class="row">

                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <div>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar">
                                            <div class="avatar-title rounded bg-primary-subtle ">
                                                <i class="bx bx-check-shield font-size-24 mb-0 text-primary"></i>
                                            </div>
                                        </div>

                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="mb-0 font-size-15">Total Shelter Home</h6>
                                        </div>
                                    </div>

                                    <div>
                                        <h4 class="mt-4 pt-1 mb-0 font-size-22 shelter_home_left">{{ count($data[3]) }}
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <div>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar">
                                            <div class="avatar-title rounded bg-primary-subtle ">
                                                <i class="bx bx-check-shield font-size-24 mb-0 text-primary"></i>
                                            </div>
                                        </div>

                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="mb-0 font-size-15">Total Shelter Home Occupancy Entered</h6>
                                        </div>
                                    </div>

                                    <div>
                                        <h4 class="mt-4 pt-1 mb-0 font-size-22 shelter_home_count">{{ count($data[3]) }}
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <div>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar">
                                            <div class="avatar-title rounded bg-primary-subtle ">
                                                <i class="bx bx-cart-alt font-size-24 mb-0 text-primary"></i>
                                            </div>
                                        </div>

                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="mb-0 font-size-15 ">Total Capacity</h6>
                                        </div>
                                    </div>

                                    <div>
                                        <h4 class="mt-4 pt-1 mb-0 font-size-22">{{ $data[5][0] }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <div>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar">
                                            <div class="avatar-title rounded bg-primary-subtle ">
                                                <i class="bx bx-cart-alt font-size-24 mb-0 text-primary"></i>
                                            </div>
                                        </div>

                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="mb-0 font-size-15 ">Total Capacity of Entered Shelter Home</h6>
                                        </div>
                                    </div>

                                    <div>
                                        <h4 class="mt-4 pt-1 mb-0 font-size-22 capacity_remaining">{{ $data[5][0] }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <div>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar">
                                            <div class="avatar-title rounded bg-primary-subtle ">
                                                <i class="bx bx-package font-size-24 mb-0 text-primary"></i>
                                            </div>
                                        </div>

                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="mb-0 font-size-15 ">Total Occupancy</h6>
                                        </div>


                                    </div>

                                    <div>
                                        <h4 class="mt-4 pt-1 mb-0 font-size-22 total_ocupancy">
                                            {{ $data[5][1] }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <div>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar">
                                            <div class="avatar-title rounded bg-primary-subtle ">
                                                <i class="bx bx-rocket font-size-24 mb-0 text-primary"></i>
                                            </div>
                                        </div>

                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="mb-0 font-size-15 ">Remaining Shelter Home for Entry</h6>
                                        </div>

                                    </div>

                                    <div>
                                        <h4 class="mt-4 pt-1 mb-0 font-size-22 total_occuo_approved1">{{count($data[3]) - $data[8]}}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <div>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar">
                                            <div class="avatar-title rounded bg-primary-subtle ">
                                                <i class="bx bx-rocket font-size-24 mb-0 text-primary"></i>
                                            </div>
                                        </div>

                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="mb-0 font-size-15 ">Total Ocupancy Approved </h6>
                                        </div>

                                    </div>

                                    <div>
                                        <h4 class="mt-4 pt-1 mb-0 font-size-22 total_occuo_approved">0</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <div>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar">
                                            <div class="avatar-title rounded bg-primary-subtle ">
                                                <i class="bx bx-rocket font-size-24 mb-0 text-primary"></i>
                                            </div>
                                        </div>

                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="mb-0 font-size-15 ">Pending for Approval </h6>
                                        </div>

                                    </div>

                                    <div>
                                        <h4 class="mt-4 pt-1 mb-0 font-size-22 total_occuo_pending">0</h4>
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
            <table class="table table-bordered om_table border-primary mb-0 datatable gridjs-table">
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
                    @foreach ($data[7] as $key => $item)
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
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    setTimeout(() => {
        var data_ocupancy = JSON.parse("{{ $data[5][2] }}".replace(/&quot;/g, '"'));
        var total_shelter_home_entry = "{{ count($data[3]) }}";
        var table2 = $('.om_table').dataTable({
            "pageLength": 100,
            dom: 'Bfrtip',
            buttons: [
                'csv', 'pdf'
            ],
        });
        $('select.dist').on('change', function() {
            $ocupancy = get_ocupancy(data_ocupancy, $(this).val(), '', '', '');
            table2.api().columns(1).search($(this).val()).draw();
        });
        $('select.ulbs').on('change', function() {
            $ocupancy = get_ocupancy(data_ocupancy, $('#Operation select.dist').val(), $(this).val(),
            '');
            table2.api().columns(2).search($(this).val()).draw();
        });
        $('select.location').on('change', function() {
            $ocupancy = get_ocupancy(data_ocupancy, $('#Operation select.dist').val(), $(
                '#Operation select.ulbs').val(), $(this).val());
                table2.api().columns(3).search($(this).val()).draw();
            });
            
            $('select.status').on('change', function() {
                // $ocupancy = get_ocupancy(data_ocupancy, $(this).val(), '', '', '');
                table2.api().columns(7).search($(this).val()).draw();
            });

        addSerialNumberToTable_om(table2);
        $('#Operation svg a').on('click', function(e) {
            $('#Operation svg a').removeClass('active');
            $(this).addClass('active');
            e.preventDefault();
            e = $(this).attr('xlink:title');
            table2.api().columns(1).search('^' + e + '$', true, false).draw()
        })

        table2.api().on('draw', function() {
            // Call a function to add serial numbers
            addSerialNumberToTable_om(table2);
        });

        function addSerialNumberToTable_om(table2) {
            var rows = table2.api().rows({
                'search': 'applied'
            }).nodes();
            var shelter_home_count = rows.length;
            var capacity_count = 0;
            var capacity_minus = 0;
            var total_occuo_approved = 0;
            for (var i = 0; i < rows.length; i++) {
                var serialCell = $(rows[i]).find('td:eq(0)');
                var approve_check = $(rows[i]).find('td:eq(16)').text();
                if(approve_check.trim() == 'Approved'){
                    total_occuo_approved++;
                }
                if (!serialCell.length) {
                    $(rows[i]).append('<td></td>');
                    serialCell = $(rows[i]).find('td:eq(0)');
                }

                var dd = $(rows[i]).find('td:eq(4)').html();
                capacity_count += parseInt(dd);
                serialCell.text(i + 1);

                var dd = $(rows[i]).find('td:eq(15)').html();
                capacity_minus += parseInt(dd);
            }
            $('#Operation .total_occuo_approved').html(total_occuo_approved);
            $('#Operation .capacity_remaining').html(capacity_count - capacity_minus);
            $('#Operation .capacity_count').html(capacity_count);
            $('#Operation .shelter_home_count').html(shelter_home_count);
            // $('#Operation .shelter_home_left').html(total_shelter_home_entry - shelter_home_count);
            $('#Operation .total_occuo_pending').html(shelter_home_count - total_occuo_approved);
        }


        var dists1 = "{{ json_encode($dists1) }}";
        var dists1 = dists1.replace(/&quot;/g, '"');
        $('#Operation svg a').each(function() {
            if (!dists1.includes(capitalizeFirstLetter($(this).attr('xlink:title')))) {
                $(this).find('path').attr('fill', '#808080')
            }
        })

        function capitalizeFirstLetter(str) {
            return str.charAt(0).toUpperCase() + str.slice(1);
        }

        function get_ocupancy(data, dist, ulb, location) {
            console.log(dist, ulb, location);
            var fcount = 0;
            if (ulb != '') {
                count = data[dist][ulb];
                if (count != undefined) {
                    for (aa in count) {
                        if (count[aa] != undefined) {
                            fcount += (count[aa]).length
                        }
                    }
                }
            } else if (location != '') {
                count = data[dist][ulb][location];
                if (count != undefined) {
                    // for (aa in count) {
                    fcount += (count).length
                    // if (count[aa] != undefined) {
                    // }
                    // }
                }

            } else {
                count = data[dist];
                if (count != undefined) {
                    for (aa in count) {
                        if (count[aa] != undefined) {
                            for (bb in count[aa]) {
                                fcount += (count[aa][bb]).length
                            }
                        }
                    }
                }
            }
            $('#Operation .total_ocupancy').html(fcount);
            // for(dis in data){
            // if(dist == dis){
            //     Object.keys(dis).length
            //     if(ulb != ''){
            //         console.log(data[dis])
            //     }
            // }else{
            // }
            // }
        }

        $(document).ready(function() {
            let minDate1, maxDate1;

            // Custom filtering function for date range
            $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
                if (settings.nTable.id == "DataTables_Table_3") {
                    let min = minDate1.val() ? moment(minDate1.val(), 'DD-MM-YYYY') : null;
                    let max = minDate1.val() ? moment(maxDate1.val(), 'DD-MM-YYYY') : null;
                    let date = moment(data[5], 'DD-MM-YYYY').add({ hours: 5, minutes: 30 });

                    // debugger;
                    if (
                        (min === null && max === null) ||
                        (min === null && date <= max) ||
                        (min <= date && max === null) ||
                        (min <= date && date <= max)
                    ) {
                        return true;
                    }
                    return false;
                }
                return true;
            });

            // Initialize DateTime for date inputs
            minDate1 = new DateTime('#min1', {
                format: 'DD-MM-YYYY'
            });
            maxDate1 = new DateTime('#max1', {
                format: 'DD-MM-YYYY'
            });

            // Set default date range to today
            let today = moment().format('DD-MM-YYYY');
            minDate1.val(today);
            maxDate1.val(today);

            // Event listeners for date inputs
            $('#min1, #max1').on('change', function() {
                table2.api().draw();
            });
            table2.api().draw();
        });

    }, 2000);
</script>
