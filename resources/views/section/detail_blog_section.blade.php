<section class="blog_details_section section_space_lg pt-5 pb-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h2>{{$data['name']}}</h2><br>
                <div class="details_image">
                    <img src="{{ $data['image'] }}" alt="{{ $data['name'] }}">
                </div>
                <div class="details_content">
                    <ul class="post_meta unordered_list mb-4">
                        <li><i class="fa-regular fa-calendar-days"></i> {{ $data['created_at'] }}</li>
                    </ul>
                    {!! $data['long_des'] !!}
                </div>
            </div>
        </div>
    </div>
</section>
