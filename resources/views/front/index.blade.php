<?php $site_title = DB::table('options')->where('key', '=', 'site_title')->first(); ?>
@extends('front.layouts.default')

@section('css_before')
	<title>{{ $site_title->value }}</title>
@endsection

@section('content')
	<section class="slide1">
		<div class="wrap-slick1">
			<div class="slick1">
				@foreach($banners as $banner)
					<div class="item-slick1 item2-slick" style="background-image: url({{URL::to('/').'/public/uploads/banner/'.$banner->image }});">
						<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
							<!-- <span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="rotateInDownLeft">
								Women Collection 2018
							</span> -->
							@if(!empty($banner->banner_title))
								<h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="fadeInUp"> {{ $banner->banner_title }} </h2>
							@endif
							
							@if(!empty($banner->shop_link))
								<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="zoomIn">
									<a href="{{ url('/').'/'.$banner->shop_link }}" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
										Shop Now
									</a>
								</div>
							@endif
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</section>
	@if(!empty($featured))
		<section class="newproduct bgwhite p-t-45 p-b-65">
			<div class="container">
				<div class="sec-title p-b-60">
					<h3 class="m-text5 t-center"> Featured Products </h3>
				</div>
				<div class="wrap-slick2">
					<div class="slick2">
						@foreach($featured as $product)
							<?php 
								$image = DB::table('products_images')->where('pid', $product->id)->first();
							?>
							<div class="item-slick2 p-l-15 p-r-15">
								<div class="block2">
									<div class="block2-img wrap-pic-w of-hidden pos-relative">
										<img src="{{URL::to('/').'/public/uploads/products/large/'. $image->image }}" alt="{{ $product->product_name }}">
										<div class="block2-overlay trans-0-4">
											<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4" data-id="{{ $product->id }}">
												<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
												<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
											</a>
											<div class="block2-btn-addcart w-size1 trans-0-4">
												<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" onclick="addToCart({{ $product->id }});">
												Add to Cart
												</button>
											</div>
										</div>
									</div>
									<div class="block2-txt p-t-20">
										<a href="{{ url('/').'/product/'.$product->url }}" class="block2-name dis-block s-text3 p-b-5 text-ellipse">
											{{ $product->product_name }}
										</a>
										<span class="block2-price m-text6 p-r-5">
											₹ {{ $product->price }}
										</span>
									</div>
								</div>
							</div>
						@endforeach
					</div>
				</div>
			</div>
		</section>
	@endif
	@if(!empty($blogs))
	<section class="blog bgwhite p-t-45 p-b-65">
		<div class="container">
			<div class="sec-title p-b-52">
				<h3 class="m-text5 t-center"> Our Blog </h3>
			</div>
			<div class="row">
				@foreach($blogs as $blog)
					<div class="col-sm-10 col-md-4 p-b-30 m-l-r-auto">
						<div class="block3 blog-index">
							<a href="{{ url('/blog-detail').'/'.$blog->url }}" class="block3-img dis-block hov-img-zoom">
								<img src="{{URL::to('/').'/public/uploads/blog/'.$blog->image }}" alt="{{ $blog->title }}">
							</a>
							<div class="block3-txt p-t-14">
								<h4 class="p-b-7 text-ellipse">
								<a href="{{ url('/blog-detail').'/'.$blog->url }}" class="m-text11" title="{{ $blog->title }}">{{ $blog->title }}</a>
								</h4>
								<span class="s-text6">By</span> <span class="s-text7">{{ $blog->author }}</span>
								<span class="s-text6">on</span> <span class="s-text7">{{ date('F d, Y', strtotime($blog->created_at)) }}</span>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</section>
	@endif

	@if(!empty($instaImages))
	<section class="instagram p-t-20">
		<div class="sec-title p-b-52 p-l-15 p-r-15">
			<h3 class="m-text5 t-center">
			@ follow us on Instagram
			</h3>
		</div>
		<div class="flex-w">
			@foreach($instaImages as $insta)
				<div class="block4 wrap-pic-w">
					<img src="{{ $insta->images->standard_resolution->url }}" alt="{{ $insta->user->full_name }}">
					<a href="{{ $insta->link }}" class="block4-overlay sizefull ab-t-l trans-0-4" target="_blank">
						<span class="block4-overlay-heart s-text9 flex-m trans-0-4 p-l-40 p-t-25">
							<i class="icon_heart_alt fs-20 p-r-12" aria-hidden="true"></i>
							<span class="p-t-2">{{ $insta->likes->count }}</span>
						</span>
						<div class="block4-overlay-txt trans-0-4 p-l-40 p-r-25 p-b-30">
							<p class="s-text10 m-b-15 h-size1 of-hidden">
								{{ $insta->caption->text }}
							</p>
							<span class="s-text9">
								Photo by {{ $insta->user->username }}
							</span>
						</div>
					</a>
				</div>
			@endforeach
		</div>
	</section>
	@endif

	<section class="shipping bgwhite p-t-62 p-b-46">
		<div class="flex-w p-l-15 p-r-15">
			<div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
				<h4 class="m-text12 t-center">
				Free Delivery Worldwide
				</h4>
				<a href="#" class="s-text11 t-center">
					Click here for more info
				</a>
			</div>
			<div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 bo2 respon2">
				<h4 class="m-text12 t-center">
				30 Days Return
				</h4>
				<span class="s-text11 t-center">
					Simply return it within 30 days for an exchange.
				</span>
			</div>
			<div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
				<h4 class="m-text12 t-center">
				Store Opening
				</h4>
				<span class="s-text11 t-center">
					Shop open from Monday to Sunday
				</span>
			</div>
		</div>
	</section>
@endsection
