<!doctype html>
<?php 
    $favicon = DB::table('options')->where('key', '=', 'favicon')->first();
?>
<html lang="{{ config('app.locale') }}" class="no-focus">
    <head>
        @yield('css_before')

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="{{ asset('uploads') }}/{{ $favicon->value }}" />
        <link rel="stylesheet" href="{{ asset('front/css/google-fonts-muli.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('front/vendor/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('front/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('front/fonts/themify/themify-icons.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('front/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('front/fonts/elegant-font/html-css/style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('front/vendor/animate/animate.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('front/vendor/css-hamburgers/hamburgers.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('front/vendor/animsition/css/animsition.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('front/vendor/select2/select2.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('front/vendor/daterangepicker/daterangepicker.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('front/vendor/slick/slick.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('front/vendor/lightbox2/css/lightbox.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('front/css/util.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('front/css/main.css') }}">

        @yield('css_after')
    </head>
    <body class="animsition">
        <!-- Start: Header -->
        @include('front.include.header')
        <!-- End: Header -->

        <!-- Start: Content -->
        @yield('content')
        <!-- End: Content -->

        <!-- Start: Footer -->
        @include('front.include.footer')
        <!-- End: Footer -->

        <script type="text/javascript" src="{{ asset('front/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('front/vendor/animsition/js/animsition.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('front/vendor/bootstrap/js/popper.js') }}"></script>
        <script type="text/javascript" src="{{ asset('front/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('front/vendor/select2/select2.min.js') }}"></script>
        <script type="text/javascript">
            $(".selection-1").select2({
                minimumResultsForSearch: 20,
                dropdownParent: $('#dropDownSelect1')
            });
        </script>
        <script type="text/javascript" src="{{ asset('front/vendor/slick/slick.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('front/js/slick-custom.js') }}"></script>
        <script type="text/javascript" src="{{ asset('front/vendor/countdowntime/countdowntime.js') }}"></script>
        <script type="text/javascript" src="{{ asset('front/vendor/lightbox2/js/lightbox.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('front/vendor/sweetalert/sweetalert.min.js') }}"></script>
        <script src="{{ asset('front/js/main.js') }}" type="text/javascript"></script>
        <script src="{{ asset('front/js/jquery.validate.min.js') }}" type="text/javascript"></script>
        
        <script type="text/javascript">
            $(document).ready(function() {
                loadHeaderCart();

                $('#subscribe-form').validate({
                    errorClass: 'error animated fadeInDown mb-0',
                    errorPlacement: (error, e) => {
                        error.insertAfter($(e).parents('.form-group'));
                    },
                    submitHandler: function(form) {
                        var email = $('#subscribe_email').val();

                        $.ajax({
                            url: '{{ url('subscribe') }}',
                            type: 'POST',
                            data: {email: email, _token: '{{ csrf_token() }}'},
                            success: function(response) {
                                if (response == 'true') {
                                    swal('Subscribed', "Email subscribed successfully !", "success");
                                    $('#subscribe-form')[0].reset();
                                } else if (response == 'exist') {
                                    swal('Exist', "This email is already subscribed !", "error");
                                } else {
                                    swal('Wrong', "Something went wrong !", "error");
                                }
                            }
                        });

                        return false;
                    }
                });
            });

            function addToCart(pid, qty = 1) {
                $.ajax({
                    url: '{{ url('cart/add') }}',
                    type: 'POST',
                    data: {pid: pid, _token: '{{ csrf_token() }}', qty: qty},
                    success: function(response) {
                        if (response == 'true') {
                            swal('Added', "Product is added to cart !", "success");
                            loadHeaderCart();
                        } else if (response == 'exist') {
                            swal('Exist', "Product already exist in cart !", "error");
                        } else {
                            swal('Wrong', "Something went wrong !", "error");
                        }
                    }
                });
            }

            function loadHeaderCart() {
                $.ajax({
                    url: '{{ url('cart/header') }}',
                    success: function(response) {
                        $('.cart-header').html(response);
                    }
                });
            }

            function deleteFromCart(cartid) {
                $.ajax({
                    url: '{{ url('cart/delete') }}/'+cartid,
                    success: function(response) {
                        if (response == 'true') {
                            swal('Deleted', "Product is deleted from cart !", "success");
                            loadHeaderCart();
                        } else {
                            swal('Wrong', "Something went wrong !", "error");
                        }
                    }
                });
            }

            $('.block2-btn-addwishlist').on('click', function() {
                var pid = $(this).attr('data-id');

                $.ajax({
                    url: '{{ url('wishlist/add') }}',
                    type: 'POST',
                    data: {pid: pid, _token: '{{ csrf_token() }}'},
                    success: function(response) {
                        if (response == 'not-logged-in') {
                            window.location.href = '{{ url("/login") }}';
                        } else if (response == 'true') {
                            swal('Added', "Product is added to wishlist !", "success");
                        } else if (response == 'exist') {
                            swal('Exist', "Product already exist in wishlist !", "error");
                        } else {
                            swal('Wrong', "Something went wrong !", "error");
                        }
                    }
                });
            });
        </script>

        @yield('js_after')        
    </body>
</html>
