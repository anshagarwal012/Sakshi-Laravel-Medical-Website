<section class="contact_section section_space_lg">
    <div class="container">
        <div class="conatiner_box">
            <div class="section_heading mb-4">
                <div class="row justify-content-lg-between">
                    <div class="col-lg-6">
                        <h2 class="section_heading_text mb-0">
                            Take care of your health now
                        </h2>
                    </div>
                    <div class="col-lg-6">
                        <p class="section_heading_description mb-0 ps-lg-4">
                            We are available to help you So contact us now
                        </p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-lg-between">
                <div class="col-lg-6 mb-lg-0 mb-4">
                    <form action="/api/contact" method="POST" class="form-group">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="input_name">Name</label>
                                    <input id="input_name" class="form-control" type="text" name="Name"
                                        placeholder="Your name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="input_phone">Phone</label>
                                    <input id="input_phone" class="form-control" type="number" name="PhoneNumber"
                                        placeholder="Phone number">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group mb-4">
                                    <label for="input_message">Message</label>
                                    <textarea id="input_message" class="form-control" name="Message" placeholder="Your message"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary submit-contact">
                                    <span class="btn_text" data-text="Contact Us">
                                        Contact Us
                                    </span>
                                    <span class="btn_icon">
                                        <i class="fa-solid fa-arrow-up-right"></i>
                                    </span>
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="col-lg-6">
                    <div>
                        <div class="row mb-5">
                            <div class="col-md-6">
                                <ul class="contact_info_list unordered_list_block">
                                    <li>
                                        <div class="item_icon">
                                            <i class="fa-solid fa-phone"></i>
                                        </div>
                                        <div class="item_content">
                                            <a href="tel://+918299626136">
                                                <h3 class="item_title">Phone Number</h3>
                                                <p class="item_info mb-0">+918299626136</p>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="contact_info_list unordered_list_block">
                                    <li>
                                        <div class="item_icon">
                                            <i class="fa-solid fa-envelope"></i>
                                        </div>
                                        <div class="item_content">
                                            <a href="mailto:info@handlewithease.com">
                                                <h3 class="item_title">Email</h3>
                                                <p class="item_info mb-0">info@handlewithease.com</p>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <h3 class="social_title">Follow Us:</h3>
                        <ul class="social_links unordered_list">
                            <li><a class="bg-primary" href="https://www.facebook.com/handlewitheaseofficial"><i
                                        class="fa-brands fa-facebook-f"></i></a></li>
                            <li><a class="bg-primary" href="https://www.instagram.com/handle_with_ease/"><i
                                        class="fa-brands fa-instagram"></i></a></li>
                            <!--li><a class="bg-primary" href="#!"><i class="fa-brands fa-twitter"></i></a></li-->
                            <li><a class="bg-primary" href="https://api.whatsapp.com/send/?phone=918299626136"><i
                                        class="fa-brands fa-whatsapp"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@section('scripts')
    <script>
        $(function() {
            $('.submit-contact').on('click', function(e) {
                e.preventDefault();
                if ($('[name="Name"]').val() != '' && $('[name="PhoneNumber"]').val() != '' && $(
                        '[name="Message"]').val() != '') {
                    $d = $('form').serializeArray()
                    $d = serialize_to_object($d, $)
                    $.post('/api/contact', $d, function(r) {
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
