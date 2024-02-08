<header class="ishorizontal-topbar">
    <div class="navbar-header my-3">
        <div class="d-flex my-4">
            <!-- LOGO -->
            {{-- <div class="navbar-brand-box"> --}}
            <a href="/" class="logo logo-dark">
                <span class="logo-sm">
                    <img src="{{ URL::asset('assets/images/site_logo/company.jpg') }}" class="" width="200">
                </span>
                <span class="logo-lg">
                    <img src="{{ URL::asset('assets/images/site_logo/company.jpg') }}" class="" width="200">
                </span>
            </a>
            <button type="button" class="btn btn-sm px-3 font-size-24 d-lg-none header-item" data-bs-toggle="collapse"
                data-bs-target="#topnav-menu-content">
                <i class="bx bx-menu align-middle"></i>
            </button>
        </div>
    </div>
    <div class="topnav">
        <div class="container-fluid">
            <nav class="navbar navbar-light navbar-expand-lg topnav-menu d-flex">
                <div class="collapse navbar-collapse" id="topnav-menu-content">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/dashboard" id="topnav-dashboard" role="button">
                                <i class="bx bx-home-alt icon nav-icon"></i>
                                <span data-key="t-dashboards">Dashboards</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="/admin/category" id="topnav-dashboard" role="button">
                                <i class="bx bx-file-find icon nav-icon"></i>
                                <span data-key="t-dashboards">Category</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="/admin/services" id="topnav-dashboard" role="button">
                                <i class="bx bx-layer icon nav-icon"></i>
                                <span data-key="t-dashboards">Services</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="/admin/faqs" id="topnav-dashboard" role="button">
                                <i class="bx bx-conversation icon nav-icon"></i>
                                <span data-key="t-dashboards">Faqs</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="/admin/blogs" id="topnav-dashboard"
                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-plus-medical icon nav-icon"></i>
                                <span data-key="t-dashboards">Blogs</span>
                                <div class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-dashboard">
                                <a href="/admin/blogs" class="dropdown-item" data-key="t-ecommerce">All Blogs</a>
                                <a href="/admin/add-blog" class="dropdown-item" data-key="t-sales">Add Blogs</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="/admin/review" id="topnav-dashboard" role="button">
                                <i class="bx bx-user icon nav-icon"></i>
                                <span data-key="t-dashboards">Reviews</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="/admin/gallery" id="topnav-dashboard" role="button">
                                <i class="bx bxs-photo-album icon nav-icon"></i>
                                <span data-key="t-dashboards">Gallery</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="/admin/contact" id="topnav-dashboard" role="button">
                                <i class="bx bxs-contact icon nav-icon"></i>
                                <span data-key="t-dashboards">Contact Us</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="/admin/logout" id="topnav-dashboard" role="button">
                                <i class="bx bx-log-out-circle icon nav-icon"></i>
                                <span data-key="t-dashboards">Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>
