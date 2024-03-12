<header class="site_header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-2 col-5">
                <div class="site_logo">
                    <a class="site_link" href="/">
                        <img src="/assets/images/site_logo/company.png" alt="handle With Ease" width="213"
                            height="38">
                    </a>
                </div>
            </div>
            <div class="col-lg-7 col-2">
                <nav class="main_menu navbar navbar-expand-lg">
                    <div class="main_menu_inner text-center collapse navbar-collapse justify-content-center"
                        id="main_menu_dropdown">
                        {{-- {{ dd(request()->path()) }} --}}
                        <ul class="main_menu_list unordered_list" style="flex-wrap: nowrap">
                            <li class="{{ request()->path() == '/' ? 'active' : '' }}">
                                <a class="nav-link" href="/">Home</a>
                            </li>
                            <li class="{{ request()->path() == 'about' ? 'active' : '' }}">
                                <a class="nav-link" href="/about">About</a>
                            </li>
                            <li class="{{ request()->path() == 'Our_Service' ? 'active' : '' }}">
                                <a class="nav-link" href="/Our_Service">Service</a>
                            </li>
                            <li class="{{ request()->path() == 'our_gallery' ? 'active' : '' }}">
                                <a class="nav-link" href="/our_gallery">Gallery</a>
                            </li>
                            <li class="{{ request()->path() == 'review' ? 'active' : '' }}">
                                <a class="nav-link" href="/review">Review</a>
                            </li>
                            <li class="{{ request()->path() == 'blogs' ? 'active' : '' }}">
                                <a class="nav-link" href="/blogs">Blog</a>
                            </li>
                            <li class="{{ request()->path() == 'assessment-form' ? 'active' : '' }}">
                                <a class="nav-link" href="/assessment-form">Assessment Form</a>
                            </li>
                            <li class="{{ request()->path() == 'contact' ? 'active' : '' }}">
                                <a class="nav-link" href="/contact">Contact</a>
                            </li>

                        </ul>
                    </div>
                </nav>
            </div>
            <div class="col-lg-3 col-5">
                <ul class="header_btns_group unordered_list justify-content-end">
                    <li>
                        <button class="mobile_menu_btn" type="button" data-bs-toggle="collapse"
                            data-bs-target="#main_menu_dropdown" aria-expanded="false" aria-label="Toggle navigation">
                            <i class="far fa-bars"></i>
                        </button>
                    </li>
                    <li>
                        <a class="btn_hotline" href="/book">
                            <!--span class="btn_icon">
                                <i class="fa-solid fa-phone"></i>
                            </span-->
                            <span class="btn btn-primary btn-sm py-2">Book Appointment</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
