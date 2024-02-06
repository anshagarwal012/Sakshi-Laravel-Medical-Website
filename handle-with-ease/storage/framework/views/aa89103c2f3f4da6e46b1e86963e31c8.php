<header class="site_header">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-3 col-5">
          <div class="site_logo">
            <a class="site_link" href="<?php echo e(url("index.html")); ?>">
              <img src="<?php echo e(asset("/assets/images/site_logo/site_logo_primary.svg")); ?>" alt="Site Logo – Talking Minds – Psychotherapist Site Template">
            </a>
          </div>
        </div>
        <div class="col-lg-6 col-2">
          <nav class="main_menu navbar navbar-expand-lg">
            <div class="main_menu_inner collapse navbar-collapse justify-content-center" id="main_menu_dropdown">
              <ul class="main_menu_list unordered_list">
                <li class="active">
                  <a class="nav-link" href="<?php echo e(url("index.html")); ?>">Home</a>
                </li>
                <li>
                  <a class="nav-link" href="<?php echo e(url("about.html")); ?>">About</a>
                </li>
                <li class="dropdown">
                  <a class="nav-link" href="<?php echo e(url("#")); ?>" id="programs_submenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Programs
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="programs_submenu">
                    <li><a href="<?php echo e(url("service.html")); ?>">Our Services</a></li>
                    <li><a href="<?php echo e(url("service_details.html")); ?>">Depression Therapy</a></li>
                    <li><a href="<?php echo e(url("service_details_2.html")); ?>">Relationships</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a class="nav-link" href="<?php echo e(url("#")); ?>" id="help_submenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Help
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="help_submenu">
                    <li><a href="<?php echo e(url("team.html")); ?>">Our Team</a></li>
                    <li><a href="<?php echo e(url("gallery.html")); ?>">Our Gallery</a></li>
                    <li class="dropdown">
                      <a class="nav-link" href="<?php echo e(url("#")); ?>" id="blog_submenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Blogs
                      </a>
                      <ul class="dropdown-menu" aria-labelledby="blog_submenu">
                        <li><a href="<?php echo e(url("blog.html")); ?>">Blog Grid</a></li>
                        <li><a href="<?php echo e(url("blog_list.html")); ?>">Blog Listing</a></li>
                        <li><a href="<?php echo e(url("blog_details.html")); ?>">Blog Details</a></li>
                      </ul>
                    </li>
                    <li><a href="<?php echo e(url("faq.html")); ?>">F.A.Q.</a></li>
                    <li><a href="<?php echo e(url("error.html")); ?>">404 Error</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a class="nav-link" href="<?php echo e(url("#")); ?>" id="contact_submenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Contact
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="contact_submenu">
                    <li><a class="nav-link" href="<?php echo e(url("contact.html")); ?>">Clinic Contacts</a></li>
                    <li><a class="nav-link" href="<?php echo e(url("contact_2.html")); ?>">Contact Information</a></li>
                    <li><a class="nav-link" href="<?php echo e(url("contact_3.html")); ?>">Contact Details</a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </nav>
        </div>
        <div class="col-lg-3 col-5">
          <ul class="header_btns_group unordered_list justify-content-end">
            <li>
              <button class="mobile_menu_btn" type="button" data-bs-toggle="collapse" data-bs-target="#main_menu_dropdown" aria-expanded="false" aria-label="Toggle navigation">
                <i class="far fa-bars"></i>
              </button>
            </li>
            <li>
              <a class="btn_hotline" href="<?php echo e(url("tel:+8801680636189")); ?>">
                <span class="btn_icon">
                  <i class="fa-solid fa-phone"></i>
                </span>
                <span class="btn_text">+880-1680-6361-89</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </header>
<?php /**PATH E:\Ansh\psychotherapist\Template\Sakshi-Laravel-Medical-Website\handle-with-ease\resources\views/layout/header.blade.php ENDPATH**/ ?>