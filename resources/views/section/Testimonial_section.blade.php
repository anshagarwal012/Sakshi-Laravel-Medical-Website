<section class="testimonial_section section_space_lg">
    <div class="container">
        <div class="section_heading text-center">
            <h2 class="section_heading_text">What Patients Say</h2>
            <p class="section_heading_description mb-0">
                Customers Review And Response
            </p>
        </div>
        <div class="testimonial_carousel">
            <div class="carousel_2col zoom-gallery row" data-slick='{"arrows":false}'>
                @foreach ($data['testimonials'] as $item)
                    <div class="carousel_item col-6">
                        <div class="testimonial_item">
                            <ul class="rating_star unordered_list">
                                {!! str_repeat('<li><i class="fa-solid fa-star"></i></li>', $item['stars']) !!}
                                {!! str_repeat('<li><i class="fa-solid fa-star empty"></i></li>', 5 - $item['stars']) !!}
                            </ul>
                            <div class="author_box">
                                @if ($item['type'] == 'Photo')
                                    <div class="author_box_image">
                                        <a class="popup_image" href="{{ $item['path'] }}">
                                            <img src="{{ $item['path'] }}" style="width: 150px" alt="handle with ease">
                                        </a>
                                    </div>
                                @elseif($item['type'] == 'Video')
                                    <div class="author_box_image">
                                        <a class="popup_video" href="{{ $item['path'] }}">
                                            <video width="150" controls autoplay muted>
                                                <source src="{{ $item['path'] }}" type="video/mp4">
                                            </video>
                                        </a>
                                    </div>
                                @endif
                                <div class="author_box_content">
                                    <h3 class="author_box_name">{{ $item['title'] }}</h3>
                                    <span class="author_box_designation">Patient</span>
                                </div>
                            </div>
                            <p class="mb-0">{{ $item['description'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
