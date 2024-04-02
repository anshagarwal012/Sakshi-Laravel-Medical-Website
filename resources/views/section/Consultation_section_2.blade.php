<section class="consultation_section section_space_lg">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="image_widget">
                    <img src="assets/images/about/book page.jpg" alt="Handle with Ease">
                    <div class="image_shape bg_secondary_light"></div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="section_heading">
                    <h2 class="section_heading_text mb-0">
                        Take Care of Your Health
                    </h2>
                </div>
                <form action="/api/booking" method="POST" class="form-group" id="whatsappForm">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="input_name">Name</label>
                                <input id="input_name" class="form-control" type="text" name="name"
                                    placeholder="Your Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="input_phone">Phone</label>
                                <input id="input_phone" class="form-control" type="number" name="phone"
                                    placeholder="Mobile phone number">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="select_therapy">Services</label>
                                <select id="select_therapy" class="form-select" aria-label="Therapy Select Options"
                                    name="section">
                                    @foreach ($data['services'] as $Services)
                                        <option value="{{ $Services['title'] }}">{{ $Services['title'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="input_calendar">Calendar</label>
                                <input id="input_calendar" class="form-control" type="date" min="<?php echo date('Y-m-d'); ?>"
                                    name="calendar">
                            </div>
                        </div>
                    </div>
                    <div class="btn_wrap pb-0">
                        <button type="submit" class="btn btn-primary submit-booking">
                            <span class="btn_text" data-text="Book Appointment">
                                Book Appointment
                            </span>
                            <span class="btn_icon">
                                <i class="fa-solid fa-arrow-up-right"></i>
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@section('scripts')
    <script>
        $(function() {
            $('.submit-booking').on('click', function(e) {
                e.preventDefault();
                if ($('[name="Name"]').val() != '' && $('[name="phone"]').val() != '' && $(
                        '[name="service"]').val() != '' && $('[name="date"]').val() != '') {
                    $d = $('form').serializeArray()
                    $d = serialize_to_object($d, $)
                    $.post('/api/booking', $d, function(r) {
                        alert(r.message)
                        whatsapp();
                        location.reload()
                        // console.log(r);
                    })
                } else {
                    alert('Please Fill All The Details');
                }
            })
        })

        function serialize_to_object(formdata, $) {
            var data = {};
            $(formdata).each(function(index, obj) {
                data[obj.name] = obj.value;
            });
            return data;
        }

        function whatsapp() {
            var formData = new FormData(document.getElementById("whatsappForm"));
            var whatsappMessage = '';

            for (var pair of formData.entries()) {
                if (pair[0] !== "_token") {
                    if (pair[0] == 'section') {
                        whatsappMessage += '*Services :* ' + pair[1] + '\n';
                    } else {
                        whatsappMessage += '*' + pair[0].replace(/_/g, ' ') + ':* ' + pair[1] + '\n';
                    }
                }
            }

            var whatsappURL = 'https://wa.me/+918299626136?text=' + encodeURIComponent(whatsappMessage.trim()
            .toProperCase());
            window.open(whatsappURL)
        }
        String.prototype.toProperCase = function() {
            return this.replace(/\w\S*/g, function(txt) {
                return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
            });
        };
    </script>
@endsection
