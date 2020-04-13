<?php $site_title = DB::table('options')->where('key', '=', 'site_title')->first(); ?>
@extends('front.layouts.default')

@section('css_before')
	<title>{{ $product->product_name }} | {{ $site_title->value }}</title>
@endsection

@section('css_after')
	<link rel="stylesheet" type="text/css" href="{{ asset('front/vendor/zoomy/zoomy.css') }}">
@endsection


@section('content')
	<div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm">
	    <a href="{{ url('/') }}" class="s-text16"> Home <i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i></a>
	    <a href="{{ url('/categories') }}/{{ $category->url }}" class="s-text16"> {{ $category->title }} <i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i></a>
	    <span class="s-text17"> {{ $product->product_name }} </span>
	</div>

	<div class="container bgwhite p-t-35 p-b-80">
	    <div class="flex-w flex-sb">
	        <div class="w-size13 p-t-30 respon5">
	            <div class="wrap-slick3 flex-sb flex-w">
	                <div class="wrap-slick3-dots"></div>
	                <div class="slick3">
	                	@foreach($images as $image)
	                		<div class="item-slick3" data-thumb="{{ $image->thumbnail }}">
		                        <div class="wrap-pic-w">
		                            <img src="{{ $image->large }}">
		                        </div>
		                    </div>
	                	@endforeach
	                </div>
	            </div>
	        </div>
	        <div class="w-size14 p-t-30 respon5">
	            <h4 class="product-detail-name m-text16 p-b-13"> {{ $product->product_name }} </h4>
	            <span class="m-text17">₹ {{ $product->price }} </span>
	            <p class="s-text8 p-t-10">{{ $product->tag_line }}</p>

	            <div class="p-t-33 p-b-60">
	                <div class="flex-m flex-w p-b-10">
	                    <div class="s-text15 w-size15 t-center">
	                        Size
	                    </div>
	                    <div class="rs2-select2 rs3-select2 bo4 of-hidden w-size16">
	                        <select class="selection-2" name="size">
	                            <option>Choose an option</option>
	                            <option>Size S</option>
	                            <option>Size M</option>
	                            <option>Size L</option>
	                            <option>Size XL</option>
	                        </select>
	                    </div>
	                </div>
	                <div class="flex-m flex-w">
	                    <div class="s-text15 w-size15 t-center">
	                        Color
	                    </div>
	                    <div class="rs2-select2 rs3-select2 bo4 of-hidden w-size16">
	                        <select class="selection-2" name="color">
	                            <option>Choose an option</option>
	                            <option>Gray</option>
	                            <option>Red</option>
	                            <option>Black</option>
	                            <option>Blue</option>
	                        </select>
	                    </div>
	                </div>
	                <div class="flex-r-m flex-w p-t-10">
	                    <div class="w-size16 flex-m flex-w">
	                        <div class="flex-w bo5 of-hidden m-r-22 m-t-10 m-b-10">
	                            <button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
	                                <i class="fs-12 fa fa-minus" aria-hidden="true"></i>
	                            </button>
	                            <input class="size8 m-text18 t-center num-product" type="number" name="num-product" id="qty" value="1" min="0" max="{{ $product->stock }}">
	                            <button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
	                                <i class="fs-12 fa fa-plus" aria-hidden="true"></i>
	                            </button>
	                        </div>
	                        <div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
	                            <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4 add-to-cart" data-id="{{ $product->id }}">
	                                Add to Cart
	                            </button>
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <div class="p-b-45">
	                <span class="s-text8 m-r-35">SKU: {{ $product->product_id }}</span>
	                <span class="s-text8">Categories: Mug, Design</span>
	            </div>

	            <div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content">
	                <h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
	                	Description
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>
	                <div class="dropdown-content dis-none p-t-15 p-b-23">
	                    <p class="s-text8">{{ $product->description }}</p>
	                </div>
	            </div>
	            <div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
	                <h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
	                	Additional information
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>
	                <div class="dropdown-content dis-none p-t-15 p-b-23">
	                    <p class="s-text8">
	                        Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat
	                    </p>
	                </div>
	            </div>
	            <div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
	                <h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
	Reviews (0)
	<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
	<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
	</h5>
	                <div class="dropdown-content dis-none p-t-15 p-b-23">
	                    <p class="s-text8">
	                        Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat
	                    </p>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>

	@if (!empty($relatedPro))
		<section class="relateproduct bgwhite p-t-45 p-b-138">
		    <div class="container">
		        <div class="sec-title p-b-60">
		            <h3 class="m-text5 t-center"> Related Products </h3>
		        </div>

		        <div class="wrap-slick2">
		            <div class="slick2">
		            	@foreach($relatedPro as $related)
			            	<?php 
			            		$image = DB::table('products_images')->where('pid', $related->id)->first();

			            		if (!empty($image->image)) {
	                				$imgSrc = URL::to('/public/uploads/products/large').'/'.$image->image;
	                			} else {
	                				$imgSrc = asset('front/images/product-default.jpg');
	                			}
			            	?>
		            		<div class="item-slick2 p-l-15 p-r-15">
			                    <div class="block2">
			                        <div class="block2-img wrap-pic-w of-hidden pos-relative">
			                            <img src="{{ $imgSrc }}" alt="{{ $related->product_name }}">
			                            <div class="block2-overlay trans-0-4">
			                                <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4" data-id="{{ $related->id }}">
			                                    <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
			                                    <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
			                                </a>
			                                <div class="block2-btn-addcart w-size1 trans-0-4">
			                                    <button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" onclick="addToCart({{ $related->id }});">
			                                        Add to Cart
			                                    </button>
			                                </div>
			                            </div>
			                        </div>
			                        <div class="block2-txt p-t-20">
			                            <a href="{{ url('/') }}/product/{{ $related->url }}" class="block2-name dis-block s-text3 p-b-5"> {{ $related->product_name }} </a>
			                            <span class="block2-price m-text6 p-r-5"> ₹ {{ $related->price }} </span>
			                        </div>
			                    </div>
			                </div>
		            	@endforeach
		            </div>
		        </div>
		    </div>
		</section>
	@endif
@endsection

@section('js_after')
	<div id="dropDownSelect2"></div>
	<script type="text/javascript" src="{{ asset('front/vendor/zoomy/zoomy.js') }}"></script>
	<script type="text/javascript">
		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect2')
		});

		$('.add-to-cart').on('click', function() {
			var pid = $(this).attr('data-id');
			var qty = $('#qty').val();

			addToCart(pid, qty);
		});

		$(document).ready(function (){
			imageZoom();
		});

		$(".slick3").on("afterChange", function (){
	    	imageZoom();
		});

		function imageZoom() {
			var image = $('.slick3').find('.slick-active').find('img').attr('src');

	    	var urls = [image];
		    var options = {};

	    	$('.slick3').find('.slick-active').find('.wrap-pic-w').zoomy(urls,options);
		}
	</script>
@endsection