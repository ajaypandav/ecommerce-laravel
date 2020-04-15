<?php $site_title = DB::table('options')->where('key', '=', 'site_title')->first(); ?>
@extends('front.layouts.default')

@section('css_before')
	<title>{{ $category->title }} | {{ $site_title->value }}</title>
@endsection

@section('css_after')
<link rel="stylesheet" type="text/css" href="{{ asset('front/vendor/noui/nouislider.min.css') }}">
@endsection

@section('content')
	<section class="bg-title-page flex-col-c-m" style="background-image: url({{ $header_image }});">
		    <h2 class="text-white font-weight-bold"> {{ $category->title }} </h2>
		</section>

		<section class="bgwhite p-t-55 p-b-65">
		    <div class="container">
		        <div class="row">
		            <div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
		                <div class="leftbar p-r-20 p-r-0-sm">
		                    <h4 class="m-text14 p-b-32"> Filters </h4>
		                    <div class="filter-price p-t-22 p-b-50 bo3">
		                        <div class="m-text15 p-b-17">
		                            Price
		                        </div>
		                        <div class="wra-filter-bar">
		                            <div id="filter-bar"></div>
		                        </div>
		                        <div class="flex-sb-m flex-w p-t-16">
		                            <div class="s-text3 p-t-10 p-b-10">
		                                Range: ₹<span id="value-lower">{{ $min_price }}</span> - ₹<span id="value-upper">{{ $max_price }}</span>
		                            </div>
		                            <div class="w-size11">
		                                <button class="flex-c-m size4 bg7 bo-rad-15 hov1 s-text14 trans-0-4" onclick="rangeFilter();">
		                                    Filter
		                                </button>
		                            </div>
		                        </div>
		                    </div>
		                    <div class="search-product pos-relative bo4 of-hidden">
		                        <input class="s-text7 size6 p-l-23 p-r-50" type="text" name="search-product" placeholder="Search Products...">
		                        <button class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4">
		                            <i class="fs-12 fa fa-search" aria-hidden="true"></i>
		                        </button>
		                    </div>
		                </div>
		            </div>
		            <div class="col-sm-6 col-md-8 col-lg-9 p-b-50">

		                <div class="flex-sb-m flex-w p-b-35">
		                    <div class="flex-w">
		                        <div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
		                            <select class="selection-2" name="sorting" onchange="sortProduct(this.value);">
		                                <option value="">Default Sorting</option>
		                                <option value="asc" @if($request->sort == 'asc') selected @endif>Price: low to high</option>
		                                <option value="desc" @if($request->sort == 'desc') selected @endif>Price: high to low</option>
		                            </select>
		                        </div>
		                    </div>
		                    <!-- <span class="s-text8 p-t-5 p-b-5"> Showing 1–12 of 16 results </span> -->
		                </div>

		                <div class="row">
		                	@foreach($products as $product)
		                		<?php 
		                			$image = DB::table('products_images')->where('pid', $product->id)->first();

		                			if (!empty($image->image)) {
		                				$imgSrc = URL::to('/public/uploads/products/large').'/'.$image->image;
		                			} else {
		                				$imgSrc = asset('front/images/product-default.jpg');
		                			}
		                		?>
		                		<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
			                        <div class="block2">
			                            <div class="block2-img wrap-pic-w of-hidden pos-relative">
			                                <img src="{{ $imgSrc }}" alt="{{ $product->product_name }}">
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
			                                <a href="{{ url('/') }}/product/{{ $product->url }}" class="block2-name dis-block s-text3 p-b-5"> {{ $product->product_name }} </a>
			                                <span class="block2-price m-text6 p-r-5"> ₹ {{ $product->price }} </span>
			                            </div>
			                        </div>
			                    </div>
		                	@endforeach
		                </div>
		                {{ $products->links('front.include.pagination', ['data' => $products, 'limit' => 7, 'request' => $request]) }}
		            </div>
		        </div>
		    </div>
		</section>
@endsection

@section('js_after')
	<div id="dropDownSelect2"></div>
	<script type="text/javascript" src="{{ asset('front/vendor/noui/nouislider.min.js') }}"></script>
	<script type="text/javascript">
			/*[ No ui ]
		    ===========================================================*/
		    var filterBar = document.getElementById('filter-bar');

		    noUiSlider.create(filterBar, {
		        start: [ {!! $range_start !!}, {!! $range_end !!} ],
		        connect: true,
		        range: {
		            'min': {!! $min_price !!},
		            'max': {!! $max_price !!}
		        }
		    });

		    var skipValues = [
		    	document.getElementById('value-lower'),
		    	document.getElementById('value-upper')
		    ];

		    filterBar.noUiSlider.on('update', function( values, handle ) {
		        skipValues[handle].innerHTML = Math.round(values[handle]) ;
		    });

			$(".selection-2").select2({
				minimumResultsForSearch: 20,
				dropdownParent: $('#dropDownSelect2')
			});

			function sortProduct(sort) {
				window.location.href = '?sort=' + sort;
			}

			function rangeFilter() {
				var min = Number($('#value-lower').html());
				var max = Number($('#value-upper').html());

				window.location.href="?min="+min+"&max="+max;
			}
		</script>
@endsection