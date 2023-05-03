
<!doctype html>
<html lang="en">
<head>
    {!! Meta::toHtml() !!}

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('frontend') }}/assets/images/favicon.ico">

    <!-- Choise Css -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/libs/choices.js/public/assets/styles/choices.min.css">

    <!-- Swiper Css -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/libs/swiper/swiper-bundle.min.css">

    <!-- Bootstrap Css -->
    <link href="{{ asset('frontend') }}/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('frontend') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('frontend') }}/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <!--Custom Css-->
    @livewireStyles
</head>

<body>
    <!--start page Loader -->
    {{-- <div id="preloader">
        <div id="status">
            <ul>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                </ul>
        </div>
    </div> --}}
    <!--end page Loader -->

    <!-- Begin page -->
        @include('frontend.layouts.navbar')

        <!-- START TOP-BAR -->
        <div class="top-bar">
            <div class="container-fluid custom-container">
                <div class="row g-0 align-items-center">
                    <div class="col-md-7">
                        <ul class="list-inline mb-0 text-center text-md-start">
                            <li class="list-inline-item">
                                <p class="fs-13 mb-0"> <i class="mdi mdi-map-marker"></i> Your Location: <a href="javascript:void(0)" class="text-dark">New Caledonia</a></p>
                            </li>
                            <li class="list-inline-item">
                                <ul class="topbar-social-menu list-inline mb-0">
                                    <li class="list-inline-item"><a href="javascript:void(0)" class="social-link"><i
                                                class="uil uil-whatsapp"></i></a></li>
                                    <li class="list-inline-item"><a href="javascript:void(0)" class="social-link"><i
                                                class="uil uil-facebook-messenger-alt"></i></a></li>
                                    <li class="list-inline-item"><a href="javascript:void(0)" class="social-link"><i
                                                class="uil uil-instagram"></i></a></li>
                                    <li class="list-inline-item"><a href="javascript:void(0)" class="social-link"><i
                                                class="uil uil-envelope"></i></a></li>
                                    <li class="list-inline-item"><a href="javascript:void(0)" class="social-link"><i
                                                class="uil uil-twitter-alt"></i></a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!--end col-->
                    <div class="col-md-5">
                        <ul class="list-inline mb-0 text-center text-md-end">
                            @if (!Auth::check())
                                <li class="list-inline-item py-2 me-2 align-middle">
                                    <a href="/login" class="text-dark fw-medium fs-13"><i class="uil uil-sign-in-alt"></i> Sign In</a>
                                </li>
                            @endif
                            <li class="list-inline-item align-middle">
                                <div class="dropdown d-inline-block language-switch">
                                    <button type="button" class="btn" data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <img id="header-lang-img" src="{{ asset('frontend') }}/assets/images/flags/us.jpg" alt="Header Language" height="16" />
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="eng">
                                            <img src="{{ asset('frontend') }}/assets/images/flags/us.jpg" alt="user-image" class="me-1" height="12" />
                                            <span class="align-middle">English</span>
                                        </a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="sp">
                                            <img src="{{ asset('frontend') }}/assets/images/flags/spain.jpg" alt="user-image" class="me-1" height="12" />
                                            <span class="align-middle">Spanish</span>
                                        </a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="gr">
                                            <img src="{{ asset('frontend') }}/assets/images/flags/germany.jpg" alt="user-image" class="me-1" height="12" />
                                            <span class="align-middle">German</span>
                                        </a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="it">
                                            <img src="{{ asset('frontend') }}/assets/images/flags/italy.jpg" alt="user-image" class="me-1" height="12" />
                                            <span class="align-middle">Italian</span>
                                        </a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="ru">
                                            <img src="{{ asset('frontend') }}/assets/images/flags/russia.jpg" alt="user-image" class="me-1" height="12" />
                                            <span class="align-middle">Russian</span>
                                        </a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </div>
            <!--end container-->
        </div>
        <!-- END TOP-BAR -->

        {{ $slot }}

        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- JAVASCRIPT -->
    @livewireScripts

    <script src="{{ asset('frontend') }}/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://unicons.iconscout.com/release/v4.0.0/script/monochrome/bundle.js"></script>


    <!-- Choice Js -->
    <script src="{{ asset('frontend') }}/assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>

    <!-- Swiper Js -->
    <script src="{{ asset('frontend') }}/assets/libs/swiper/swiper-bundle.min.js"></script>

    <!-- Index Js -->
    <script src="{{ asset('frontend') }}/assets/js/pages/job-list.init.js"></script>

    <!-- Switcher Js -->
    <script src="{{ asset('frontend') }}/assets/js/pages/switcher.init.js"></script>

    <script src="{{ asset('frontend') }}/assets/js/pages/index.init.js"></script>

    <!-- App Js -->
    <script src="{{ asset('frontend') }}/assets/js/app.js"></script>
    @stack('scripts')

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <x-livewire-alert::scripts />

</body>
</html>
