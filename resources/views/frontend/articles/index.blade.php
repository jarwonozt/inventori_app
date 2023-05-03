<x-frontend-master>

<div class="main-content">

    <div class="page-content">

        <!-- Start home -->
        <section class="page-title-box">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="text-center text-white">
                            <h3 class="mb-4">Blog</h3>
                            <div class="page-next">
                                <nav class="d-inline-block" aria-label="breadcrumb text-center">
                                    <ol class="breadcrumb justify-content-center">
                                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                        <li class="breadcrumb-item"><a href="javascript:void(0)">Blog</a></li>
                                        <li class="breadcrumb-item active" aria-current="page"> Blog </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </div>
            <!--end container-->
        </section>
        <!-- end home -->

        <!-- START SHAPE -->
        <div class="position-relative" style="z-index: 1">
            <div class="shape">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 250">
                    <path fill="#FFFFFF" fill-opacity="1"
                        d="M0,192L120,202.7C240,213,480,235,720,234.7C960,235,1200,213,1320,202.7L1440,192L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z"></path>
                </svg>
            </div>
        </div>
        <!-- END SHAPE -->


        <!-- START BLOG-PAGE -->
        <section class="section">
            <div class="container">
                @if(isset($headline))
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <div class="mb-4">
                            <h4>Latest & Trending Article</h4>
                        </div>
                    </div><!--end col-->
                    <div class="col-lg-7">
                        <div class="post-preview overflow-hidden rounded-3 mb-3 mb-lg-0">
                            <a href="/post/{{ $headline->slug }}"><img src="{{ $headline->image ? asset(config('app.POST_BIG')).'/'.$headline->image : asset('frontend').'/assets/images/blog/img-04.jpg' }}" alt="Blog" class="img-fluid blog-img" /></a>
                        </div>
                    </div><!--end col-->
                    <div class="col-lg-5">
                        <article class="post position-relative">
                            <div class="post ms-lg-4">
                                <p class="text-muted mb-2"><b>{{ $headline->getCategory->name }}</b> - {{ $headline->date }}</p>
                                <h5 class="mb-3"><a href="/post/{{ $headline->slug }}" class="primary-link">{{ $headline->title }}</a></h5>
                                <p class="text-muted">
                                    {!! \Illuminate\Support\Str::words($headline->content, 30) !!}
                                </p>
                                <div class="d-flex align-items-center mt-4">
                                    <div class="flex-shrink-0">
                                        <img src="{{ asset('frontend') }}/assets/images/user/img-01.jpg" alt="" class="avatar-sm rounded-circle">
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <p class="text-muted mb-0">Post by</p>
                                        <a href="blog-author.html" class="primary-link"><h6 class="fs-16 mb-0">{{ $headline->getUser->name }} </h6></a>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
                @else
                    <h1>Comming soon...</h1>
                @endif
                <div class="row mt-5">
                    <div class="col-lg-12">
                        <div>
                            <h4>All Article</h4>
                        </div>
                    </div>
                    @forelse ($data as $post)
                        <div class="col-lg-4">
                            <article class="post position-relative mt-4">
                                <div class="post-preview overflow-hidden mb-3 rounded-3">
                                    <a href="/post/{{ isset($headline->slug) ? $headline->slug : '' }}"><img src="{{ $post->image ? asset(config('app.POST_MID')).'/'.$post->image : asset('frontend').'/assets/images/blog/img-06.jpg'}}" alt="" class="img-fluid blog-img"></a>
                                </div>
                                <p class="text-muted mb-2"><b>{{ $post->getCategory->name }}</b> - {{ $post->date }}</p>
                                <h5 class="mb-3"><a href="/post/{{ $post->slug }}" class="primary-link">{{ $post->title }}</a></h5>
                                <p class="text-muted">
                                    {!! \Illuminate\Support\Str::words($post->content, 20) !!}
                                </p>
                            </article>
                        </div>
                    @empty
                        <h1>Coming Soon...</h1>
                    @endforelse
                </div>
                <div class="mt-2 d-flex justify-content-center">
                    {{ $data->links() }}
                </div>
            </div>
        </section>

    </div>

    <section class="bg-subscribe">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-6">
                    <div class="text-center text-lg-start">
                        <h4 class="text-white">Get New Jobs Notification!</h4>
                        <p class="text-white-50 mb-0">Subscribe & get all related jobs notification.</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mt-4 mt-lg-0">
                        <form class="subscribe-form" action="#">
                            <div class="input-group justify-content-center justify-content-lg-end">
                                <input type="text" class="form-control" id="subscribe" placeholder="Enter your email">
                                <button class="btn btn-primary" type="button" id="subscribebtn">Subscribe</button>
                            </div>
                        </form><!--end form-->
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end container-->
        <div class="email-img d-none d-lg-block">
            <img src="{{ asset('frontend') }}/assets/images/subscribe.png" alt="" class="img-fluid">
        </div>
    </section>

    <!-- START FOOTER -->
    <section class="bg-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="footer-item mt-4 mt-lg-0 me-lg-5">
                        <h4 class="text-white mb-4">Jobcy</h4>
                        <p class="text-white-50">It is a long established fact that a reader will be of a page reader
                            will be of at its layout.</p>
                        <p class="text-white mt-3">Follow Us on:</p>
                        <ul class="footer-social-menu list-inline mb-0">
                            <li class="list-inline-item"><a href="#"><i class="uil uil-facebook-f"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="uil uil-linkedin-alt"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="uil uil-google"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="uil uil-twitter"></i></a></li>
                        </ul>
                    </div>
                </div><!--end col-->
                <div class="col-lg-2 col-6">
                    <div class="footer-item mt-4 mt-lg-0">
                        <p class="fs-16 text-white mb-4">Company</p>
                        <ul class="list-unstyled footer-list mb-0">
                            <li><a href="about.html"><i class="mdi mdi-chevron-right"></i> About Us</a></li>
                            <li><a href="contact.html"><i class="mdi mdi-chevron-right"></i> Contact Us</a></li>
                            <li><a href="services.html"><i class="mdi mdi-chevron-right"></i> Services</a></li>
                            <li><a href="blog.html"><i class="mdi mdi-chevron-right"></i> Blog</a></li>
                            <li><a href="team.html"><i class="mdi mdi-chevron-right"></i> Team</a></li>
                            <li><a href="pricing.html"><i class="mdi mdi-chevron-right"></i> Pricing</a></li>
                        </ul>
                    </div>
                </div><!--end col-->
                <div class="col-lg-2 col-6">
                    <div class="footer-item mt-4 mt-lg-0">
                        <p class="fs-16 text-white mb-4">For Jobs</p>
                        <ul class="list-unstyled footer-list mb-0">
                            <li><a href="job-categories.html"><i class="mdi mdi-chevron-right"></i> Browser Categories</a></li>
                            <li><a href="job-list.html"><i class="mdi mdi-chevron-right"></i> Browser Jobs</a></li>
                            <li><a href="job-details.html"><i class="mdi mdi-chevron-right"></i> Job Details</a></li>
                            <li><a href="bookmark-jobs.html"><i class="mdi mdi-chevron-right"></i> Bookmark Jobs</a></li>
                        </ul>
                    </div>
                </div><!--end col-->
                <div class="col-lg-2 col-6">
                    <div class="footer-item mt-4 mt-lg-0">
                        <p class="text-white fs-16 mb-4">For Candidates</p>
                        <ul class="list-unstyled footer-list mb-0">
                            <li><a href="candidate-list.html"><i class="mdi mdi-chevron-right"></i> Candidate List</a></li>
                            <li><a href="candidate-grid.html"><i class="mdi mdi-chevron-right"></i> Candidate Grid</a></li>
                            <li><a href="candidate-details.html"><i class="mdi mdi-chevron-right"></i> Candidate Details</a></li>
                        </ul>
                    </div>
                </div><!--end col-->
                <div class="col-lg-2 col-6">
                    <div class="footer-item mt-4 mt-lg-0">
                        <p class="fs-16 text-white mb-4">Support</p>
                        <ul class="list-unstyled footer-list mb-0">
                            <li><a href="contact.html"><i class="mdi mdi-chevron-right"></i> Help Center</a></li>
                            <li><a href="faqs.html"><i class="mdi mdi-chevron-right"></i> FAQ'S</a></li>
                            <li><a href="privacy-policy.html"><i class="mdi mdi-chevron-right"></i> Privacy Policy</a></li>
                        </ul>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section>
    <!-- END FOOTER -->

    <!-- START FOOTER-ALT -->
    <div class="footer-alt">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p class="text-white-50 text-center mb-0">
                        <script>document.write(new Date().getFullYear())</script> &copy; Jobcy - Job Listing Page
                        Template by <a href="https://themeforest.net/search/themesdesign" target="_blank"
                            class="text-reset text-decoration-underline">Themesdesign</a>
                    </p>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </div>
    <!-- END FOOTER -->

    <!-- Style switcher -->
    <div id="style-switcher" onclick="toggleSwitcher()" style="left: -165px;">
        <div>
            <h6>Select your color</h6>
            <ul class="pattern list-unstyled mb-0">
                <li>
                    <a class="color-list color1" href="javascript: void(0);" onclick="setColorGreen()"></a>
                </li>
                <li>
                    <a class="color-list color2" href="javascript: void(0);" onclick="setColor('blue')"></a>
                </li>
                <li>
                    <a class="color-list color3" href="javascript: void(0);" onclick="setColor('green')"></a>
                </li>
            </ul>
            <div class="mt-3">
                <h6>Light/dark Layout</h6>
                <div class="text-center mt-3">
                    <!-- light-dark mode -->
                    <a href="javascript: void(0);" id="mode" class="mode-btn text-white rounded-3">
                        <i class="uil uil-brightness mode-dark mx-auto"></i>
                        <i class="uil uil-moon mode-light"></i>
                    </a>
                    <!-- END light-dark Mode -->
                </div>
            </div>
        </div>
        <div class="bottom d-none d-md-block" >
            <a href="javascript: void(0);" class="settings rounded-end"><i class="mdi mdi-cog mdi-spin"></i></a>
        </div>
    </div>
    <!-- end switcher-->

    <!--start back-to-top-->
    <button onclick="topFunction()" id="back-to-top">
        <i class="mdi mdi-arrow-up"></i>
    </button>
    <!--end back-to-top-->
</div>

</x-frontend-master>
