
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="JCMS merupakan basic cms untuk project laravel fullstack">
    <meta name="keywords" content="jcms, admin template, admin cms">
    <meta name="author" content="jarwonozt">
    <title>@yield('title') Dashboard</title>
    <link rel="apple-touch-icon" href="{{ asset('assets') }}/images/ico/apple-icon-120x120.png">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets') }}/images/ico/favicon.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">
    <meta name="_token" content="{{ csrf_token() }}">
    <style>
        [x-cloak] { display: none !important; }
    </style>

    @include('layouts.styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.1/css/font-awesome.min.css" integrity="sha512-H/zVLBHVS8ZRNSR8wrNZrGFpuHDyN6+p6uaADRefLS4yZYRxfF4049g1GhT+gDExFRB5Kf9jeGr8vueDsyBhhA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/style.css"> --}}
    @livewireStyles

    {{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}

</head>

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static" data-open="click" data-menu="vertical-menu-modern" data-col="">

    @include('layouts.navbar')
    @include('layouts.sidebar')

    {{ $slot }}
    @if (auth()->check() && auth()->user()->free_trial_days_left != null && auth()->user()->free_trial_days_left < 0 )
    <div class="modal fade text-left show" id="defaultSize" tabindex="-1" role="dialog" aria-labelledby="myModalLabel18" style="padding-right: 15px; display: block; background:rgba(0, 0, 0, 0.5);" aria-modal="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="demo-spacing-0">
                        <div class="alert alert-danger mt-1 alert-validation-msg" role="alert">
                            <div class="alert-body">
                                Your Free Trial is over. Please choose plan to continue.
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="text-center col-md-6 offset-md-3">
                            <h4>Unlimited Plan</h4>
                            <b>$199.99 per year</b>
                            <hr />
                            - <b>Unlimited</b> AdminPanels<br />
                            - All CRUDs and Modules<br />
                            - Unlimited Functions<br />
                            <hr />
                            <a href="/upgrade" class="btn btn-lg btn-primary">Pay $199.99</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    @include('layouts.footer')

    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>

    @livewireScripts
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <x-livewire-alert::scripts />

    @include('layouts.scripts')

</body>

</html>
