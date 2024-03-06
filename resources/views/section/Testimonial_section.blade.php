<section class="testimonial_section section_space_lg">
    <div class="container">
        <div class="section_heading text-center">
            <h2 class="section_heading_text">What Patients Say</h2>
            <p class="section_heading_description mb-0">
                Customers Review And Response
            </p>
        </div>

        <div class="testimonial_carousel">
            <div class="carousel_2col row" data-slick='{"arrows":false}'>
                @foreach ($data['testimonials'] as $item)
                    <div class="carousel_item col-6">
                        <div class="testimonial_item">
                            <div class="image-review style="width: 18rem;>
                                <img class=""src="{{ asset($item['images']) }}" alt="Handle with Ease">
                            </div>
                            <ul class="rating_star unordered_list">
                                {!! str_repeat('<li><i class="fa-solid fa-star"></i></li>', $item['ratings']) !!}
                                {!! str_repeat('<li><i class="fa-solid fa-star empty"></i></li>', 5 - $item['ratings']) !!}
                            </ul>
                            <div class="author_box">
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
