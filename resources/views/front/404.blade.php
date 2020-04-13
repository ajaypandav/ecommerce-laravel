<?php $site_title = DB::table('options')->where('key', '=', 'site_title')->first(); ?>
@extends('front.layouts.default')

@section('css_before')
	<title>404 | {{ $site_title->value }}</title>
@endsection

@section('content')
	<section class="bgwhite p-t-66 p-b-38">
		<div class="container">
			<div class="row">
				<div class="col-md-12 error-page text-center">
					<h1 class="fs-100 font-weight-bold">404</h1>
					<p class="font-weight-bold fs-30">Page Not Found</p>
				</div>
			</div>
		</div>
	</section>
@endsection