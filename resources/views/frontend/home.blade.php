<x-frontend-master>

<div class="modal fade" id="signupModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body p-5">
                <div class="position-absolute end-0 top-0 p-3">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="auth-content">
                    <div class="w-100">
                        <div class="text-center mb-4">
                            <h5>Sign Up</h5>
                            <p class="text-muted">Sign Up and get access to all the features of Jobcy</p>
                        </div>
                        <form action="#" class="auth-form">
                            <div class="mb-3">
                                <label for="usernameInput" class="form-label">Username</label>
                                <input type="text" class="form-control" id="usernameInput" placeholder="Enter your username">
                            </div>
                            <div class="mb-3">
                                <label for="passwordInput" class="form-label">Email</label>
                                <input type="email" class="form-control" id="emailInput" placeholder="Enter your email">
                            </div>
                            <div class="mb-3">
                                <label for="emailInput" class="form-label">Password</label>
                                <input type="password" class="form-control" id="passwordInput" placeholder="Password">
                            </div>
                            <div class="mb-4">
                                <div class="form-check"><input class="form-check-input" type="checkbox" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">I agree to the <a href="javascript:void(0)" class="text-primary form-text text-decoration-underline">Terms and conditions</a></label>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary w-100">Sign Up</button>
                            </div>
                        </form>
                        <div class="mt-3 text-center">
                            <p class="mb-0">Already a member ? <a href="sign-in.html" class="form-text text-primary text-decoration-underline"> Sign-in </a></p>
                        </div>
                    </div>
                </div>
            </div><!--end modal-body-->
        </div><!--end modal-content-->
    </div><!--end modal-dialog-->
</div>

<div class="main-content">

    <div class="page-content">

        @include('frontend.layouts.header')

        <div class="position-relative">
            <div class="shape">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="1440" height="150" preserveAspectRatio="none" viewBox="0 0 1440 220">
                    <g mask="url(&quot;#SvgjsMask1004&quot;)" fill="none">
                        <path d="M 0,213 C 288,186.4 1152,106.6 1440,80L1440 250L0 250z" fill="rgba(255, 255, 255, 1)"></path>
                    </g>
                    <defs>
                        <mask id="SvgjsMask1004">
                            <rect width="1440" height="250" fill="#ffffff"></rect>
                        </mask>
                    </defs>
                </svg>
            </div>
        </div>

        @include('frontend.sections.categoryJobs')

        @include('frontend.sections.jobList')


        <!-- START PROCESS -->
        @include('frontend.sections.howToWork')
        @include('frontend.sections.jobCount')

        <!-- START TESTIMONIAL -->
        {{-- <section class="section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="section-title text-center mb-4 pb-2">
                            <h3 class="title mb-3">Happy Candidates</h3>
                            <p class="text-muted">Post a job to tell us about your project. We'll quickly match you with the
                                right freelancers.</p>
                        </div>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="swiper testimonialSlider pb-5">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="card testi-box">
                                        <div class="card-body">
                                            <div class="mb-4">
                                                <img src="{{ asset('frontend') }}/assets/images/logo/mailchimp.svg" height="50" alt="" />
                                            </div>
                                            <p class="testi-content lead text-muted mb-4">" Very well thought out and articulate communication.
                                                Clear milestones, deadlines and fast work. Patience. Infinite patience. No
                                                shortcuts. Even if the client is being careless. "</p>
                                            <h5 class="mb-0">Jeffrey Montgomery</h5>
                                            <p class="text-muted mb-0">Product Manager</p>
                                        </div>
                                    </div>
                                </div><!--end swiper-slide-->
                                <div class="swiper-slide">
                                    <div class="card testi-box">
                                        <div class="card-body">
                                            <div class="mb-4">
                                                <img src="{{ asset('frontend') }}/assets/images/logo/wordpress.svg" height="50" alt="" />
                                            </div>
                                            <p class="testi-content lead text-muted mb-4">" Very well thought out and articulate communication.
                                                Clear milestones, deadlines and fast work. Patience. Infinite patience. No
                                                shortcuts. Even if the client is being careless. "</p>
                                            <h5 class="mb-0">Rebecca Swartz</h5>
                                            <p class="text-muted mb-0">Creative Designer</p>
                                        </div>
                                    </div>
                                </div><!--end swiper-slide-->
                                <div class="swiper-slide">
                                    <div class="card testi-box">
                                        <div class="card-body">
                                            <div class="mb-4">
                                                <img src="{{ asset('frontend') }}/assets/images/logo/instagram.svg" height="50" alt="" />
                                            </div>
                                            <p class="testi-content lead text-muted mb-4">" Very well thought out and articulate communication.
                                                Clear milestones, deadlines and fast work. Patience. Infinite patience. No
                                                shortcuts. Even if the client is being careless. "</p>
                                            <h5 class="mb-0">Charles Dickens</h5>
                                            <p class="text-muted mb-0">Store Assistant</p>
                                        </div>
                                    </div>
                                </div><!--end swiper-slide-->
                            </div>
                            <!--end swiper-wrapper-->
                            <div class="swiper-pagination"></div>
                        </div>
                        <!--end swiper-container  -->
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </div>
        </section> --}}
        <!-- END TESTIMONIAL -->

        @include('frontend.sections.blog')

        <!-- START CLIENT -->
        @include('frontend.sections.client')
        <!-- END CLIENT -->

        <!-- START APPLY MODAL -->
        <div class="modal fade" id="applyNow" tabindex="-1" aria-labelledby="applyNow" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body p-5">
                        <div class="text-center mb-4">
                            <h5 class="modal-title" id="staticBackdropLabel">Apply For This Job</h5>
                        </div>
                        <div class="position-absolute end-0 top-0 p-3">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="mb-3">
                            <label for="nameControlInput" class="form-label">Name</label>
                            <input type="text" class="form-control" id="nameControlInput" placeholder="Enter your name">
                        </div>
                        <div class="mb-3">
                            <label for="emailControlInput2" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="emailControlInput2" placeholder="Enter your email">
                        </div>
                        <div class="mb-3">
                            <label for="messageControlTextarea" class="form-label">Message</label>
                            <textarea class="form-control" id="messageControlTextarea" rows="4" placeholder="Enter your message"></textarea>
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="inputGroupFile01">Resume Upload</label>
                            <input type="file" class="form-control" id="inputGroupFile01">
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Send Application</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- END APPLY MODAL -->

    </div>
    <!-- End Page-content -->

    @include('frontend.layouts.footer')
</div>
</x-frontend-master>
