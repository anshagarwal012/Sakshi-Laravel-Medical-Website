<section class="blog_section section_space_lg">
    <div class="container">
        <div class="section_heading">
            <h2 class="section_heading_text mb-0">Recommended Articles</h2>
        </div>
        <div class="row">
            @foreach ($recent as $cat)
                <div class="col-lg-4">
                    <div class="blog_item">
                        <div class="blog_image">
                            <a class="blog_image_wrap" href="/blogs/{{ \Str::slug($cat['name']) }}">
                                <img src="{{ $cat['image'] }}" alt="{{ $cat['name'] }}">
                            </a>
                        </div>
                        <div class="blog_content">
                            <ul class="post_category unordered_list">
                                <li><a href="#!">{{ $cat['category']['name'] }}</a></li>
                            </ul>
                            <ul class="post_meta unordered_list">
                                <li>{{ $cat['created_at'] }}</li>
                            </ul>
                            <h3 class="item_title">
                                <a href="/blogs/{{ \Str::slug($cat['name']) }}">{{ $cat['name'] }}</a>
                            </h3>
                            <p>{{ $cat['desc'] }}</p>
                            <a class="btn-link" href="/blogs/{{ \Str::slug($cat['name']) }}">
                                <span class="btn_text">Read More</span>
                                <span class="btn_icon"><i class="fa-solid fa-arrow-up-right"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
