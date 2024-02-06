<div class="card-body">
    <input type="hidden" value="{{ json_encode($dist) }}" class="dist_">
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
                                    $dists = [];
                                @endphp
                                @foreach ($data[2][2] as $key => $item)
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
                    {{-- <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="formrow-password-input">Shelter Home
                                Status</label>
                            <select class="form-select status">
                                <option selected="selected" value="">All</option>
                                <option value="Functional">Functional</option>
                                <option value="Temporary">Under construction</option>
                            </select>
                        </div>
                    </div> --}}
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
                        <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="#808080" class="bi bi-dot" viewBox="0 0 16 16">
                            <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3"/>
                          </svg>
                          <span style="margin-left: -30px">No Data</span>
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
                                            <h6 class="mb-0 font-size-15">Number of under construction shelter home.
                                            </h6>
                                        </div>
                                    </div>

                                    <div>
                                        <h4 class="mt-4 pt-1 mb-0 font-size-22 shelter_home">00</h4>
                                        {{-- <h4 class="mt-4 pt-1 mb-0 font-size-22 shelter_home">{{ json_decode($data[1])[2] }}</h4> --}}
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
                                            <h6 class="mb-0 font-size-15">Total Capacity</h6>
                                        </div>
                                    </div>

                                    <div>
                                        <h4 class="mt-4 pt-1 mb-0 font-size-22 capacity">{{ json_decode($data[1])[3] }}</h4>
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
                                            <h6 class="mb-0 font-size-15">Physical Progress</h6>
                                        </div>


                                    </div>

                                    <div>
                                        <h4 class="mt-4 pt-1 mb-0 font-size-22 physical">
                                            {{ number_format($data[2][1], 2) }}%</h4>
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
                                            <h6 class="mb-0 font-size-15">Financial Progress</h6>
                                        </div>

                                    </div>

                                    <div>
                                        <h4 class="mt-4 pt-1 mb-0 font-size-22 financial">
                                            {{ number_format($data[2][0], 2) }}%</h4>
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
    <div class="tab-content p-3 text-muted">
        <div class="tab-pane active" id="shelter_home_construction_details" role="tabpanel">
            <table class="table table-bordered border-primary mb-0 physical_table gridjs-table">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>District Name</th>
                        <th>City Name</th>
                        <th>Location</th>
                        <th>Capacity</th>
                        <th>Physical Progress</th>
                        <th>Financial Progress</th>
                        <th>Process Date</th>
                        <th>Upload Image</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data[0] as $key => $item)
                        <tr>
                            <td>{{ $item['id'] }}</td>
                            <td>{{ $item['dist'] }}</td>
                            <td>{{ $item['ulbs'] }}</td>
                            <td>{{ $item['shelter_home_Name'] }}</td>
                            <td>{{ $item['capacity'] }}</td>
                            <td>{{ $item['physical_progress'] }}%</td>
                            <td>{{ $item['financial_progress'] }}%</td>
                            <td>{{ $item['process_date'] }}</td>
                            <td>
                                @if ($item['upload_image'] != null)
                                    <img class="img-fluid" width="50px"
                                        src="{{ url('admin/public/storage/uploads/' . $item['upload_image']) }}"
                                        alt="">
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

        var table1 = $('.physical_table').dataTable({
            "pageLength": 100,
            dom: 'Bfrtip',
            buttons: [
                'csv', 'pdf'
            ],
        });
        $('#Physical select.dist').on('change', function() {
            table1.api().columns(1).search($(this).val()).draw();
        });
        $('#Physical select.ulbs').on('change', function() {
            table1.api().columns(2).search($(this).val()).draw();
        });
        $('#Physical select.location').on('change', function() {
            table1.api().columns(3).search($(this).val()).draw();
        });
        $('#Physical select.status').on('change', function() {
            table1.api().columns(5).search($(this).val()).draw();
        });


        addSerialNumberToTable_phy(table1);
        $('#Physical svg a').on('click', function(e) {
            $('svg a').removeClass('active');
            $(this).addClass('active');
            e.preventDefault();
            e = $(this).attr('xlink:title');
            table1.api().columns(1).search('^' + e + '$', true, false).draw()
        })

        table1.api().on('draw', function() {
            // Call a function to add serial numbers
            addSerialNumberToTable_phy(table1);
        });
        
        function addSerialNumberToTable_phy(table1) {
            var rows = table1.api().rows({
                'search': 'applied'
            }).nodes();
            var physical = 0;
            var financial = 0;
            var capacity = 0;
            var Shelter = rows.length;
            for (var i = 0; i < rows.length; i++) {
                var serialCell = $(rows[i]).find('td:eq(0)');
                if (!serialCell.length) {
                    $(rows[i]).append('<td></td>');
                    serialCell = $(rows[i]).find('td:eq(0)');
                }
                serialCell.text(i + 1);
                var dd = $(rows[i]).find('td:eq(5)').html();
                physical += parseInt(dd.slice(0, -1));
                var dd = $(rows[i]).find('td:eq(6)').html();
                financial += parseInt(dd.slice(0, -1));

                var dd = $(rows[i]).find('td:eq(4)').html();
                capacity += parseInt(dd);

            }
            $('#Physical .physical').html(isNaN((physical / rows.length)) ? 0 : (physical / rows.length)
                .toFixed(2) + "%");
            $('#Physical .financial').html(isNaN((financial / rows.length)) ? 0 : (financial / rows.length).toFixed(2) +"%");
            $('#Physical .capacity').html(capacity);
            $('#Physical .shelter_home').html(Shelter);
        }

        var dists = "{{ json_encode($dists) }}";
        var dists = dists.replace(/&quot;/g, '"');
        $('#Physical svg a').each(function() {
            if (!dists.includes(capitalizeFirstLetter($(this).attr('xlink:title')))) {
                $(this).find('path').attr('fill', '#808080')
            }
        })

        function capitalizeFirstLetter(str) {
            return str.charAt(0).toUpperCase() + str.slice(1);
        }
    }, 2000);
</script>
