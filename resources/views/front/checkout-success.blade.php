<?php $site_title = DB::table('options')->where('key', '=', 'site_title')->first(); ?>
@extends('front.layouts.default')

@section('css_before')
	<title>Order Success | {{ $site_title->value }}</title>
@endsection

@section('content')
	<section class="bg-title-page flex-col-c-m" style="background-image: url({{ asset('front/images/custom-page-header.jpg') }});">
		<h2 class="font-weight-bold text-white"> Order Success </h2>
	</section>

	<section class="bgwhite p-t-66 p-b-38">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<h5 class="mb-3 text-success">Order placed successfully.</h5>
					<h6 class="mb-1">Thank you for shopping with us.</h6>
					<h6>You will be redirect to home page within 5 seconds.</h6>
				</div>
			</div>
		</div>
	</section>
@endsection

@section('js_after')
	<script type="text/javascript">
		$(document).ready(function() {
			setTimeout(function() {
				window.location.href = '{{ url("/") }}';
			}, 5000);
		});
	</script>
@endsection