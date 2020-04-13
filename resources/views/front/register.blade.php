<?php $site_title = DB::table('options')->where('key', '=', 'site_title')->first(); ?>
@extends('front.layouts.default')

@section('css_before')
	<title>Login | {{ $site_title->value }}</title>
@endsection

@section('content')
	<section class="bg-title-page flex-col-c-m custom-header" style="background-image: url({{ asset('front/images/custom-page-header.jpg') }});">
		<h2 class="text-white font-weight-bold"> Create an Account </h2>
	</section>

	<section class="bgwhite p-t-66 p-b-38">
		<div class="container">
			<form method="post" id="register-form" action="{{ route('register') }}">
				@csrf
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="firstname"> First Name <span>*</span></label>
							<input type="text" name="firstname" id="firstname" class="form-control border-secondary border rounded-0" placeholder="First Name" required="" value="{{ old('firstname') }}">
							@if ($errors->has('firstname'))
	                            <label class="error">{{ $errors->first('firstname') }}</label>
	                        @endif
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="middlename"> Middle Name </label>
							<input type="text" name="middlename" id="middlename" class="form-control border-secondary border rounded-0" placeholder="Middle Name" value="{{ old('middlename') }}">
							@if ($errors->has('middlename'))
	                            <label class="error">{{ $errors->first('middlename') }}</label>
	                        @endif
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="lastname"> Last Name <span>*</span></label>
							<input type="text" name="lastname" id="lastname" class="form-control border-secondary border rounded-0" placeholder="Last Name" required="" value="{{ old('lastname') }}">
							@if ($errors->has('lastname'))
	                            <label class="error">{{ $errors->first('lastname') }}</label>
	                        @endif
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="email"> Email Address <span>*</span></label>
							<input type="email" name="email" id="email" class="form-control border-secondary border rounded-0" placeholder="Email Address" required="" value="{{ old('email') }}">
							@if ($errors->has('email'))
	                            <label class="error">{{ $errors->first('email') }}</label>
	                        @endif
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="password"> Password <span>*</span></label>
							<input type="password" name="password" id="password" class="form-control border-secondary border rounded-0" placeholder="Password" required="">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="passagain"> Confirm Password <span>*</span></label>
							<input type="password" name="passagain" id="passagain" class="form-control border-secondary border rounded-0" placeholder="Confirm Password" required="">
						</div>
					</div>
				</div>
				<div class="row mt-4 text-center">
					<div class="col-md-6 text-md-left">
						<div class="form-group">
							<button type="submit" name="register" value="register" class="bg1 bo-rad-23 hov1 s-text1 trans-0-4 size14"> Register </button>
						</div>
					</div>
					<div class="col-md-6 text-md-right">
						<a href="{{ url('login') }}">Alreay have an account?</a>
					</div>
				</div>
			</form>
		</div>
	</section>
@endsection

@section('js_after')
$wishlist
<script type="text/javascript">
    $(document).ready(function() {
    	$('#register-form').validate({
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
            },
            rules: {
            	password: {
            		required: true,
            		minlength: 6
            	},
            	passagain: {
            		required: true,
            		equalTo: '#password'
            	}
            },
            messages: {
            	password: {
            		minlength: 'Please enter password 6 character long.'
            	},
            	passagain: {
            		equalTo: 'Please enter same password again.'
            	}
            }
    	});
    });
</script>
@endsection