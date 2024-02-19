<section class="consultation_section section_space_lg">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="image_widget">
                    <img src="assets/images/about/about_image_11-min.jpg" alt="Handle with Ease">
                    <div class="image_shape bg_secondary_light"></div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="section_heading">
                    <h2 class="section_heading_text mb-0">
                        Take Care of Your Health
                    </h2>
                </div>
                <form action="/api/booking" method="POST" class="form-group">
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
                                <label for="select_therapy">Section</label>
                                <select id="select_therapy" class="form-select" aria-label="Therapy Select Options"
                                    name="section">
                                    @foreach ($data['services'] as $Services)
                                        <option value="{{ $Services['id'] }}">{{ $Services['title'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="input_calendar">Calendar</label>
                                <input id="input_calendar" class="form-control" type="date" name="calendar">
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
    </script>
@endsection
