<section class="service_section section_space_lg bg_primary_light">
    <div class="container">
        <div class="section_heading text-center">
            <h2 class="section_heading_text">What I'm Offer</h2>
        </div>
        <div class="row justify-content-center">
            @foreach ($data['services'] as $dataItem)
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="service_item">
                        <div class="item_icon">
                            <img src="{{$dataItem['image']}}" alt="Handle with Ease">
                        </div>
                        <div class="item_contact">
                            <h3 class="item_title">{{$dataItem['title']}}</h3>
                            <p>{{$dataItem['desc']}}</p>
                            <a class="btn-link" href="{{$dataItem['url']}}">
                                <span class="btn_text">More Info</span>
                                <span class="btn_icon"><i class="fa-solid fa-arrow-up-right"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="btn_wrap pb-0 text-center">
            <a class="btn btn-primary" href="/Our_Service">
                <span class="btn_text" data-text="All Services" href="/Our_Service">
                    All Services
                </span>
                <span class="btn_icon">
                    <i class="fa-solid fa-arrow-up-right"></i>
                </span>
            </a>
        </div>
    </div>
</section>
