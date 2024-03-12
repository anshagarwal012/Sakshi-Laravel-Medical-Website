<section class="gallery_section section_space_lg">
    <div class="container">
        <div class="section_heading text-center">
            <h2 class="section_heading_text">Client Photo</h2>
            <p class="section_heading_description mb-0">
                People are connected with us
            </p>
        </div>

        <div class="zoom-gallery row justify-content-center">
            @foreach ($data['gallery'] as $dataItem)
                @if ($dataItem['type'] == 'Photo')
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <a class="gallery_item popup_image" href="{{ $dataItem['images'] }}">
                            <img src="{{ $dataItem['images'] }}" class="w-100" alt="Handle with Ease">
                        </a>
                    </div>
                @else
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <a class="gallery_item popup_video" href="{{ $dataItem['images'] }}">
                            <video controls autoplay muted>
                                <source src="{{ $dataItem['images'] }}" class="" type="video/mp4">
                            </video>
                        </a>
                    </div>
                @endif
            @endforeach
        </div>
        @if ($gallery_button)
            <div class="btn_wrap pb-0 text-center">
                <a class="btn btn-primary" href="/our_gallery">
                    <span class="btn_text" data-text="See More Photos">
                        See More Photos
                    </span>
                    <span class="btn_icon">
                        <i class="fa-solid fa-arrow-up-right"></i>
                    </span>
                </a>
            </div>
        @endif
    </div>
</section>
