
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="Login JCMS">
    <meta name="keywords" content="jcms, login, application">
    <meta name="author" content="jarwonozt">
    <title>LOGIN</title>
    <link rel="apple-touch-icon" href="{{ asset('assets') }}/images/ico/apple-icon-120x120.png">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets') }}/images/ico/favicon.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/colors.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/components.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/themes/bordered-layout.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/themes/semi-dark-layout.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/plugins/forms/form-validation.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/pages/page-auth.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/vendors/css/tables/datatable/dataTables.bootstrap4.min.css">

</head>

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-v1 px-2">
                    <div class="auth-inner py-2">
                        <!-- Login v1 -->
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="javascript:void(0);" class="brand-logo">
                                    <h2 class="brand-text text-primary ml-1">{{ strtoupper(website()->name) }}</h2>
                                </a>
                                @if (session('status'))
                                    <div class="alert alert-danger">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                @if ($errors->any())
                                    <div class="alert alert-danger p-1">
                                        <div class="font-medium text-red-600">{{ __('Whoops! Something went wrong.') }}</div>

                                        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <h5 for="login-email" class="fh5">Email</h5>
                                        <input type="text" class="form-control" id="login-email" name="email" placeholder="john@example.com" aria-describedby="login-email" tabindex="1" autofocus required/>
                                    </div>

                                    <div class="form-group">
                                        <div class="d-flex justify-content-between">
                                            <h5 for="login-password">Password</>
                                        </div>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input type="password" class="form-control form-control-merge" id="login-password" name="password" tabindex="2" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="login-password" required/>
                                            <div class="input-group-append">
                                                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-lg btn-primary btn-block" tabindex="4">LOGIN</button>
                                </form>

                                {{-- <p class="text-center mt-2">
                                    <span>New on our platform?</span>
                                    <a href="page-auth-register-v1.html">
                                        <span>Create an account</span>
                                    </a>
                                </p>

                                <div class="divider my-2">
                                    <div class="divider-text">or</div>
                                </div>

                                <div class="auth-footer-btn d-flex justify-content-center">
                                    <a href="javascript:void(0)" class="btn btn-facebook">
                                        <i data-feather="facebook"></i>
                                    </a>
                                    <a href="javascript:void(0)" class="btn btn-twitter white">
                                        <i data-feather="twitter"></i>
                                    </a>
                                    <a href="javascript:void(0)" class="btn btn-google">
                                        <i data-feather="mail"></i>
                                    </a>
                                    <a href="javascript:void(0)" class="btn btn-github">
                                        <i data-feather="github"></i>
                                    </a>
                                </div>
                            </div> --}}
                        </div>
                        <!-- /Login v1 -->
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END: Content-->


    <script src="{{ asset('assets') }}/vendors/js/vendors.min.js"></script>
    <script src="{{ asset('assets') }}/js/core/app-menu.js"></script>
    <script src="{{ asset('assets') }}/js/core/app.js"></script>
    <script src="{{ asset('assets') }}/js/scripts/pages/page-auth-login.js"></script>

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>

</body>

</html>
