<?php $site_title = DB::table('options')->where('key', '=', 'site_title')->first(); ?>

@extends('front.layouts.default')

@section('css_before')
    <title>My Wishlist | {{ $site_title->value }}</title>
@endsection

@section('content')
    <section class="bg-title-page flex-col-c-m" style="background-image: url({{ asset('front/images/custom-page-header.jpg') }});">
        <h2 class="text-white font-weight-bold"> My Wishlist </h2>
    </section>

    <section class="bgwhite p-t-60">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-lg-3 p-b-75">
                    @include('front.include.customerSidebar')
                </div>
                <div class="col-md-8 col-lg-9 p-b-75">
                    @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    
                    @if(!empty($wishlistData))
                    <div class="row">
                        @foreach($wishlistData as $wishlist)
                        <?php 
                            $image = DB::table('products_images')->where('pid', $wishlist->pid)->first();

                            if (!empty($image->image)) {
                                $imgSrc = URL::to('/public/uploads/products/large').'/'.$image->image;
                            } else {
                                $imgSrc = asset('front/images/product-default.jpg');
                            }
                        ?>
                        <div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
                            <div class="block2">
                                <div class="block2-img wrap-pic-w of-hidden pos-relative">
                                    <img src="{{ $imgSrc }}" alt="{{ $wishlist->product_name }}">
                                    <div class="block2-overlay trans-0-4">
                                        <a href="{{ url('/myaccount/wishlist/'.$wishlist->id.'/delete') }}" class="block2-btn-towishlist hov-pointer trans-0-4">
                                            <i class="icon-wishlist icon_trash_alt" aria-hidden="true"></i>
                                            <i class="icon-wishlist icon_trash dis-none" aria-hidden="true"></i>
                                        </a>
                                        <div class="block2-btn-addcart w-size1 trans-0-4">
                                            <button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" onclick="addToCart({{ $wishlist->pid }});">
                                                Add to Cart
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="block2-txt p-t-20">
                                    <a href="{{ url('/') }}/product/{{ $wishlist->url }}" class="block2-name dis-block s-text3 p-b-5"> {{ $wishlist->product_name }} </a>
                                    <span class="block2-price m-text6 p-r-5"> ₹ {{ $wishlist->price }} </span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <p>Your wishlist is empty.</p>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
