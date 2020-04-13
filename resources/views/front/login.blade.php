<?php $site_title = DB::table('options')->where('key', '=', 'site_title')->first(); ?>
@extends('front.layouts.default')

@section('css_before')
	<title>Login | {{ $site_title->value }}</title>
@endsection

@section('content')
	<section class="bg-title-page flex-col-c-m custom-header" style="background-image: url({{ asset('front/images/custom-page-header.jpg') }});">
		<h2 class="text-white font-weight-bold"> Login or Create Account </h2>
	</section>

	<section class="bgwhite p-t-66 p-b-38">
		<div class="container">
			<div class="row">
				@if(Session::has('success'))
				<div class="col-md-12">
		            <div class="alert alert-success">
		                {{ Session::get('success') }}
		            </div>
		        </div>
		        @endif

				<div class="col-md-6">
					<h6 class="mb-3 font-weight-bold">REGISTERED CUSTOMERS</h6>
					<p class="mb-4">If you have an account with us, please log in.</p>
					@if(Session::has('error'))
                        <div class="alert alert-danger">{{ Session::get('error') }}</div>
                    @endif
					<form method="post" id="login-form" action="{{ route('login') }}">
						@csrf
						<div class="form-group">
							<label for="email">Email Address</label>
							<input type="email" name="email" id="email" class="form-control border-secondary border rounded-0" placeholder="Email Address" value="{{ old('email') }}" required="">
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" name="password" id="password" class="form-control border-secondary border rounded-0" placeholder="Password" required="">
						</div>
						<div class="form-group mt-4">
							<button type="submit" name="login" value="login" class="bg1 bo-rad-23 hov1 s-text1 trans-0-4 size14"> Login </button>
							<a href="" class="ml-3">Forgot your password?</a>
						</div>
					</form>
				</div>
				<div class="col-md-6">
					<h6 class="mb-3 font-weight-bold">NEW CUSTOMERS</h6>
					<p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
					<div class="size11 trans-0-4 mt-4">
                        <a href="{{ url('/register') }}" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                            Create an Account
                        </a>
                    </div>
				</div>
			</div>
		</div>
	</section>
@endsection

@section('js_after')
$wishlist
<script type="text/javascript">
    $(document).ready(function() {
    	$('#login-form').validate({
    		errorClass: 'error animated fadeInDown mb-0 mt-1',
            errorPlacement: (error, e) => {
                $(e).parents('.form-group').append(error);
            },
            highlight: e => {
                $(e).closest('.form-group').removeClass('is-invalid').addClass('is-invalid');
            },
            success: e => {
                $(e).closest('.form-group').removeClass('is-invalid');
                $(e).remove();
            }
    	});
    });
</script>
@endsection