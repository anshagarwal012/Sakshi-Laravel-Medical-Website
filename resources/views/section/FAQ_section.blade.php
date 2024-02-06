<section class="faq_section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="images_group_widget">
                    <ul class="unordered_list">
                        <li><img src="assets/images/about/as1.jpg"></li>
                        <li><img src="assets/images/about/as2.jpg"></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="ps-lg-5">
                    <div class="section_heading mb-lg-4 mb-2">
                        <h2 class="section_heading_text mb-0">
                            {{$data['faqs']['title']}}
                        </h2>
                    </div>
                    <div class="accordion" id="faq_accordion">
                        @foreach ($data['faqs']['faqs'] as $key => $value)
                            <div class="accordion-item">
                                <div class="accordion-header" id="heading_{{$key}}">
                                    <button class="accordion-button {{$key != 0 ? 'collapsed':''}}" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse_{{$key}}" aria-expanded="true" aria-controls="collapse_{{$key}}">
                                        {{$value['question']}}
                                    </button>
                                </div>
                                <div id="collapse_{{$key}}" class="accordion-collapse collapse {{$key == 0 ? 'show':''}}"
                                    aria-labelledby="heading_{{$key}}" data-bs-parent="#faq_accordion">
                                    <div class="accordion-body">
                                        <p class="m-0">{{$value['answer']}}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
