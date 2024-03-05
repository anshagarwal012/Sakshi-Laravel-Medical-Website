<section class="faq_section" style="padding-bottom:10rem">
    <div class="container">
        <div class="section_heading">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2 class="section_heading_text mb-0">Latest Blogs</h2>
                </div>
                <div class="col-md-6 d-none d-md-flex justify-content-end">
                    <a class="btn btn-primary" href="/blogs">
                        <span class="btn_text" data-text="More Blogs">
                            More Blogs
                        </span>
                        <span class="btn_icon">
                            <i class="fa-solid fa-arrow-up-right"></i>
                        </span>
                    </a>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            @foreach ($data['blogs'] as $cat)
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog_item">
                        <div class="blog_image">
                            <a class="blog_image_wrap" href="/blogs/{{ $cat['id'] }}/{{ \Str::slug($cat['name']) }}">
                                <img src="{{ $cat['image'] }}" alt="{{ $cat['name'] }}">
                            </a>
                        </div>
                        <div class="blog_content">
                            {{-- <ul class="post_category unordered_list">
                                <li><a href="#!">{{ $cat['category']['name'] }}</a></li>
                            </ul> --}}
                            <ul class="post_meta unordered_list">
                                <li>{{ $cat['created_at'] }}</li>
                            </ul>
                            <h3 class="item_title">
                                <a
                                    href="/blogs/{{ $cat['id'] }}/{{ \Str::slug($cat['name']) }}">{{ $cat['name'] }}</a>
                            </h3>
                            <p>{{ $cat['desc'] }}</p>
<<<<<<< HEAD
                            <p>
                                <a class="btn-link" href="/blogs/{{ $cat['id'] }}/{{ \Str::slug($cat['name']) }}">
                                    <span class="btn_text">Read More</span>
                                    <span class="btn_icon"><i class="fa-solid fa-arrow-up-right"></i></span>
                                </a>
                            </p>
=======
                            <a class="btn-link" href="/blogs/{{ $cat['id'] }}/{{ \Str::slug($cat['name']) }}">
                                <span class="btn_text">More</span>
                                <span class="btn_icon"><i class="fa-solid fa-arrow-up-right"></i></span>
                            </a>
>>>>>>> ea6b1923b3807401f5dbe0521ec61382b23d4c42
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="btn_wrap pb-0 text-center d-md-none d-block">
            <a class="btn btn-primary" href="/blogs">
                <span class="btn_text" data-text="More Blogs">
                    More Blogs
                </span>
                <span class="btn_icon">
                    <i class="fa-solid fa-arrow-up-right"></i>
                </span>
            </a>
        </div>
    </div>
</section>
