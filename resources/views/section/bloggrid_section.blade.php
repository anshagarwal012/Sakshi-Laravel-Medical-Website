<section class="blog_section section_space_lg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    @foreach ($data['blogs'] as $cat)
                        <div class="col-md-6">
                            <div class="blog_item">
                                <div class="blog_image">
                                    <a class="blog_image_wrap" href="/blogs/{{\Str::slug($cat['name'])}}">
                                        <img src="{{$cat['image']}}" alt="{{$cat['name']}}">
                                    </a>
                                </div>
                                <div class="blog_content">
                                    <ul class="post_category unordered_list">
                                        <li><a href="#!">{{$cat['category']['name']}}</a></li>
                                    </ul>
                                    <ul class="post_meta unordered_list">
                                        <li>{{$cat['created_at']}}</li>
                                    </ul>
                                    <h3 class="item_title">
                                        <a href="/blogs/{{\Str::slug($cat['name'])}}">{{$cat['name']}}</a>
                                    </h3>
                                    <p>{{$cat['desc']}}</p>
                                    <a class="btn-link" href="/blogs/{{\Str::slug($cat['name'])}}">
                                        <span class="btn_text">Read More</span>
                                        <span class="btn_icon"><i class="fa-solid fa-arrow-up-right"></i></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{-- <div class="pagination_wrap">
                    <ul class="pagination_nav unordered_list justify-content-center">
                        <li class="active"><a href="#!">1</a></li>
                        <li><a href="#!">2</a></li>
                        <li><a href="#!">3</a></li>
                        <li><a href="#!">...</a></li>
                        <li><a href="#!">10</a></li>
                    </ul>
                </div> --}}
            </div>

            <div class="col-lg-4">
                <aside class="sidebar ps-lg-4">
                    <div class="form-group">
                        <input id="sidebar_search" class="form-control" type="search" name="search"
                            placeholder="Search">
                        <button type="submit" class="input_icon">
                            <i class="fa-regular fa-magnifying-glass"></i>
                        </button>
                    </div>
                    <div class="sidebar_widget">
                        <h3 class="sidebar_widget_title">
                            <span class="title_icon">
                                <img src="assets/images/site_logo/favourite_icon.svg"
                                    alt="Talking Minds - Psychotherapist Site Template">
                            </span>
                            <span class="title_text">Categories</span>
                        </h3>
                        <ul class="post_category_list unordered_list_block">
                            @foreach ($data['Category'] as $cat)
                            <li>
                                <a href="#!">
                                    <span class="category_name">{{$cat['name']}}</span>
                                    {{-- <span class="category_counter">{{$cat['count']}}</span> --}}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="sidebar_widget">
                        <h3 class="sidebar_widget_title">
                            <span class="title_icon">
                                <img src="assets/images/site_logo/favourite_icon.svg"
                                    alt="Talking Minds - Psychotherapist Site Template">
                            </span>
                            <span class="title_text">Recommended Articles</span>
                        </h3>
                        <ul class="reecommended_post_group unordered_list_block">
                            @foreach ( $data['blogs'] as $cat)
                            <li>
                                <div class="blog_item_small">
                                    <div class="blog_image">
                                        <a class="blog_image_wrap" href="/blogs/{{ \Str::slug($cat['name']) }}">
                                            <img src="{{ $cat['image'] }}" alt="{{ $cat['name'] }}">
                                        </a>
                                    </div>
                                    <div class="blog_content">
                                        <h3 class="item_title">
                                            <a href="/blogs/{{ \Str::slug($cat['name']) }}">{{ $cat['name'] }}</a>
                                        </h3>
                                        <ul class="post_meta unordered_list">
                                            <li>{{ $cat['created_at'] }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>
