<!doctype html>
<html lang="en" class="no-focus">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <title>Login | Learn Laravel</title>

        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="robots" content="noindex, nofollow">

        <!-- Open Graph Meta -->
        <meta property="og:title" content="">
        <meta property="og:site_name" content="">
        <meta property="og:description" content="">
        <meta property="og:type" content="website">
        <meta property="og:url" content="">
        <meta property="og:image" content="">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="{{ asset('media/favicons/favicon.png') }}">
        <link rel="icon" sizes="192x192" type="image/png" href="{{ asset('media/favicons/favicon-192x192.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('media/favicons/apple-touch-icon-180x180.png') }}">

        <!-- Stylesheets -->

        <!-- Fonts and Codebase framework -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,400i,600,700">
        <link rel="stylesheet" id="css-main" href="{{ asset('/css/codebase.css') }}">
        <script>window.Laravel = {!! json_encode(['csrfToken' => csrf_token(),]) !!};</script>
    </head>
    <body>
        <div id="page-container" class="main-content-boxed">

            <!-- Main Container -->
            <main id="main-container">

                <!-- Page Content -->
                <div class="bg-gd-dusk">
                    <div class="hero-static content content-full bg-white invisible" data-toggle="appear">
                        <!-- Header -->
                        <div class="py-30 px-5 text-center">
                            <a class="link-effect font-w700" href="{{ url('/') }}">
                                <i class="si si-fire"></i>
                                <span class="font-size-xl text-primary-dark">Learn</span><span class="font-size-xl">Laravel</span>
                            </a>
                            <h1 class="h2 font-w700 mt-50 mb-10">Welcome to Your Dashboard</h1>
                            <h2 class="h4 font-w400 text-muted mb-0">Please sign in</h2>
                        </div>
                        <!-- END Header -->

                        <!-- Sign In Form -->
                        <div class="row justify-content-center px-5">
                            <div class="col-sm-8 col-md-6 col-xl-4">
                                <form method="POST" action="{{ url('admin') }}" class="js-validation-signin">
                                    @csrf
                                    @if($errors->any())
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $errors->first() }}</strong>
                                        </span>
                                    @endif
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <div class="form-material floating">
                                                <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}">
                                                <label for="username">Username</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <div class="form-material floating">
                                                <input type="password" class="form-control" id="password" name="password">
                                                <label for="password">Password</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row gutters-tiny">
                                        <div class="col-12 mb-10">
                                            <button type="submit" class="btn btn-block btn-hero btn-noborder btn-rounded btn-alt-primary">
                                                <i class="si si-login mr-10"></i> Sign In
                                            </button>
                                        </div>
                                        <div class="col-sm-12 mb-5">
                                            <a class="btn btn-block btn-noborder btn-rounded btn-alt-secondary" href="op_auth_reminder.html">
                                                <i class="fa fa-warning text-muted mr-5"></i> Forgot password
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- END Sign In Form -->
                    </div>
                </div>
                <!-- END Page Content -->

            </main>
            <!-- END Main Container -->
        </div>
        <!-- END Page Container -->

        <script src="{{ asset('js/codebase.core.min.js') }}"></script>

        <!-- Codebase Core JS -->
        <script src="{{ asset('js/codebase.app.js') }}"></script>

        <!-- Laravel Scaffolding JS -->
        <!-- <script src="{{ mix('js/laravel.app.js') }}"></script> -->

        <!-- Page JS Plugins -->
        <script src="{{asset('js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>

        <!-- Page JS Code -->
        <script>
            jQuery(".js-validation-signin").validate({
                errorClass: "invalid-feedback animated fadeInDown",
                errorElement: "div",
                errorPlacement: function(e, n) {
                    jQuery(n).parents(".form-group > div").append(e)
                },
                highlight: function(e) {
                    jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-invalid")
                },
                success: function(e) {
                    jQuery(e).closest(".form-group").removeClass("is-invalid"), jQuery(e).remove()
                },
                rules: {
                    "username": {
                        required: !0,
                        minlength: 3
                    },
                    "password": {
                        required: !0,
                        minlength: 5
                    }
                },
                messages: {
                    "username": {
                        required: "Please enter a username",
                        minlength: "Your username must consist of at least 3 characters"
                    },
                    "password": {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 5 characters long"
                    }
                }
            });
        </script>

    </body>
</html>