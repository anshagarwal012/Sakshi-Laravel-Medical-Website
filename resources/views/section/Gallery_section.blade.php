<section class="gallery_section section_space_lg">
    <div class="container">
        <div class="section_heading text-center">
            <h2 class="section_heading_text">Client Photo</h2>
            <p class="section_heading_description mb-0">
                People are connected with us
            </p>
        </div>

        <div class="zoom-gallery row justify-content-center">
            @foreach ($data['gallery']['photo'] as $key)
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <a class="gallery_item popup_image" href="{{ $key }}">
                        <img src="{{ $key }}" alt="Handle with Ease">
                    </a>
                </div>
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
