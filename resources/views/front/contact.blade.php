<?php $site_title = DB::table('options')->where('key', '=', 'site_title')->first(); ?>
@extends('front.layouts.default')

@section('css_before')
	<title>Contact Us | {{ $site_title->value }}</title>
@endsection

@section('content')
	<section class="bg-title-page flex-col-c-m" style="background-image: url({{ asset('front/images/custom-page-header.jpg') }});">
		<h2 class="font-weight-bold text-white"> Contact Us </h2>
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
					<h6 class="mb-3 font-weight-bold text-uppercase">Send us message</h6>

					<form method="post" id="contact-form" action="{{ route('contact.submit') }}">
						@csrf
						<div class="form-group">
							<input type="text" name="name" id="name" class="form-control border-secondary border rounded-0" placeholder="Name" value="{{ old('name') }}" required="">
						</div>
						<div class="form-group">
							<input type="email" name="email" id="email" class="form-control border-secondary border rounded-0" placeholder="Email" value="{{ old('email') }}" required="">
						</div>
						<div class="form-group">
							<input type="text" name="mobileno" id="mobileno" class="form-control border-secondary border rounded-0 number" placeholder="Mobile No" value="{{ old('mobileno') }}" required="">
						</div>
						<div class="form-group">
							<textarea name="message" id="message" class="form-control border-secondary border rounded-0" placeholder="Message">{{ old('message') }}</textarea>
						</div>
						<div class="form-group mt-4">
							<button type="submit" name="login" value="login" class="bg1 bo-rad-23 hov1 s-text1 trans-0-4 size14"> Submit </button>
						</div>
					</form>
				</div>
				<div class="col-md-5 ml-auto">
					<h6 class="mb-2 font-weight-bold"><i class="fa fa-map-marker mr-2"></i> Address</h6>
					<p>Surat, Gujarat, India.</p>

					<h6 class="mt-3 mb-2 font-weight-bold"><i class="fa fa-map-marker mr-2"></i> Phone</h6>
					<p>+91 99999 99999</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 mt-3">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d238132.63727384948!2d72.68220738859046!3d21.15946270544973!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04e59411d1563%3A0xfe4558290938b042!2sSurat%2C%20Gujarat!5e0!3m2!1sen!2sin!4v1585892494852!5m2!1sen!2sin" width="100%" height="350" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
				</div>
			</div>
		</div>
	</section>
@endsection

@section('js_after')
$wishlist
<script type="text/javascript">
    $(document).ready(function() {
    	$('#contact-form').validate({
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