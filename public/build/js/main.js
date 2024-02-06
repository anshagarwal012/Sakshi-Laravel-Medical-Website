var table ;
if (window.location.pathname == '/dashboard') {
    $(document).find('select.dist').on('change', function () {
        dist = JSON.parse($('.pri.active').find('.dist_').val())
        var val = $(this).val();
        var ulbs = ['<option selected="selected" value="">Select City</option>']
        var ulbss
        for (ulb in dist[val]) {
            if (ulbss != dist[val][ulb].ulb) {
                ulbss = dist[val][ulb].ulb
                ulbs.push('<option value="' + dist[val][ulb].ulb + '">' + dist[val][ulb].ulb + '</option>')
            }
        }
        $('.pri.active select.ulbs').html('')
        $('.pri.active select.ulbs').append(ulbs.join(''))
    })

    $(document).find('select.ulbs').on('change', function () {
        dist = JSON.parse($('.pri.active').find('.dist_').val())
        if (dist != '') {
            var val = $('.pri.active select.dist').val();
            var location = ['<option selected="selected" value="">All Locations</option>']
            var locations
            for (ulb in dist[val]) {
                if (locations != dist[val][ulb].functional_shelter) {
                    locations = dist[val][ulb].functional_shelter
                    location.push('<option value="' + dist[val][ulb].functional_shelter + '">' + dist[val][ulb].functional_shelter + '</option>')
                }
            }
            $('.pri.active select.location').html('')
            $('.pri.active select.location').append(location.join(''))
        } else {
            alert('Please Select Dist First');
        }
    })

    $(document).find('select.location').on('change', function () {
        dist = JSON.parse($('.pri.active').find('.dist_').val())
        if (dist != '') {
            // debugger;
            var val = $('select.dist').val();
            var ulb = $('select.ulbs').val();
            var location = $('.location').val();
            // var capacity = ['<option selected="selected" value="">All capacitys</option>']
            // var capacitys
            for (ulb in dist[val]) {
                if (dist[val][ulb].functional_shelter == location) {
                    $('.capacity').val(dist[val][ulb].Capacity)
                }
            }
        }
    })
} else {
    table = $('.datatable').dataTable({
        "pageLength": 100,
        dom: 'Bfrtip',
        buttons: [
            'csv', 'pdf'
        ],
    });
    $('select.dist').on('change', function () {
        table.api().columns(1).search($(this).val()).draw();
    });
    $('select.ulbs').on('change', function () {
        table.api().columns(2).search($(this).val()).draw();
    });
    $('select.location').on('change', function () {
        table.api().columns(3).search($(this).val()).draw();
    });
    $('select.status').on('change', function () {
        table.api().columns(5).search($(this).val()).draw();
    });
    $('select.dist').on('change', function () {
        dist = JSON.parse($('.dist_').val())
        var val = $(this).val();
        var ulbs = ['<option selected="selected" value="">Select City</option>']
        var ulbss
        for (ulb in dist[val]) {
            if (ulbss != dist[val][ulb].ulb) {
                ulbss = dist[val][ulb].ulb
                ulbs.push('<option value="' + dist[val][ulb].ulb + '">' + dist[val][ulb].ulb + '</option>')
            }
        }
        $('select.ulbs').html('')
        $('select.ulbs').append(ulbs.join(''))
    })

    $('select.ulbs').on('change', function () {
        dist = JSON.parse($('.dist_').val())
        if (dist != '') {
            var val = $('select.dist').val();
            var location = ['<option selected="selected" value="">All Locations</option>']
            var locations
            for (ulb in dist[val]) {
                if (locations != dist[val][ulb].functional_shelter) {
                    locations = dist[val][ulb].functional_shelter
                    location.push('<option value="' + dist[val][ulb].functional_shelter + '">' + dist[val][ulb].functional_shelter + '</option>')
                }
            }
            $('select.location').html('')
            $('select.location').append(location.join(''))
        } else {
            alert('Please Select Dist First');
        }
    })

    $('select.location').on('change', function () {
        dist = JSON.parse($('.dist_').val())
        if (dist != '') {
            // debugger;
            var val = $('select.dist').val();
            var ulb = $('select.ulbs').val();
            var location = $('.location').val();
            // var capacity = ['<option selected="selected" value="">All capacitys</option>']
            // var capacitys
            for (ulb in dist[val]) {
                if (dist[val][ulb].functional_shelter == location) {
                    $('.capacity').val(dist[val][ulb].Capacity)
                }
            }
        }
    })
    table.on('draw.dt', function () {
        addSerialNumberToTable(table);
    });    
}

$('.dropdown-toggle').on('click', function () {
    if ($(this).siblings('div').hasClass('show')) {
        $(this).siblings('div').removeClass('show')
    } else {
        $(this).siblings('div').addClass('show')
    }
})


function addSerialNumberToTable(table) {
    // Get all rows in the table body
    var rows = table.api().rows({ 'search': 'applied' }).nodes();
    // Loop through each row and add a serial number
    for (var i = 0; i < rows.length; i++) {
        // Check if the serial number cell already exists
        var serialCell = $(rows[i]).find('td:eq(0)');

        // If it doesn't exist, create and append a new cell
        if (!serialCell.length) {
            $(rows[i]).append('<td></td>');
            serialCell = $(rows[i]).find('td:eq(0)');
        }

        // Add the serial number
        serialCell.text(i + 1);
    }
}

function updateColumns(apiEndpoint, newColumns) {
    // Clear existing columns
    if ($.fn.dataTable.isDataTable('.datatable')) {
        $('.datatable').DataTable().clear().destroy();
    }

    // Reinitialize DataTables with new columns
    table = $('.datatable').dataTable({
        "pageLength": 100,
        dom: 'Bfrtip',
        buttons: [
            'csv', 'pdf'
        ],
        ajax: {
            url: apiEndpoint,
            dataSrc: ''
        },
        columns: newColumns
    });
}








function ok_console_stamp() {
    console.log('%c Website built by weblytechnolab.com ', 'background: #E28564; color: #333; font-weight: bold; text-transform: uppercase;padding:2.5px 10px;border-radius:5px;');
}

String.prototype.stripSlashes = function () {
    return this.replace(/\\(.)/mg, "$1");
}
function htmlEntities(str) {
    return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
}
const sleep = m => new Promise(r => setTimeout(r, m))

function serialize_to_object(formdata, $) {
    var data = {};
    $(formdata).each(function (index, obj) {
        data[obj.name] = obj.value;
    });
    return data;
}
ok_console_stamp()