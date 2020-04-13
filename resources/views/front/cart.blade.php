<?php $site_title = DB::table('options')->where('key', '=', 'site_title')->first(); $subTotal = $cartTotal = 0; ?>
@extends('front.layouts.default')

@section('css_before')
<title>Cart | {{ $site_title->value }}</title>
@endsection

@section('content')
<section class="bg-title-page flex-col-c-m" style="background-image: url({{ asset('front/images/custom-page-header.jpg') }});">
    <h2 class="font-weight-bold text-white"> Cart </h2>
</section>

<section class="cart bgwhite p-t-70 p-b-100">
    <div class="container">
        @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
        @endif

        @if(!empty($cartData))
        <form method="post" action="{{ route('cart.update') }}">
            @csrf
            <div class="container-table-cart pos-relative">
                <div class="wrap-table-shopping-cart bgwhite">
                    <table class="table-shopping-cart">
                        <tr class="table-head">
                            <th class="column-1"></th>
                            <th class="column-2">Product</th>
                            <th class="column-3">Price</th>
                            <th class="column-4 p-l-70">Quantity</th>
                            <th class="column-5">Total</th>
                        </tr>
                        @foreach($cartData as $cart)
                            <?php 
                                $product = DB::table('products')->where('id', $cart->pid)->first();
                                $imageData = DB::table('products_images')->where('pid', $cart->pid)->first();

                                if (!empty($imageData)) {
                                    $image = asset('uploads/products/large/' . $imageData->image);
                                } else {
                                    $image = asset('front/images/product-default.jpg');
                                }

                                $subTotal += ($cart->qty * $product->price);
                                $cartTotal = $subTotal;
                            ?>
                            <input type="hidden" name="cartid[]" value="{{ $cart->id }}">
                            <tr class="table-row">
                                <td class="column-1">
                                    <div class="cart-img-product b-rad-4 o-f-hidden" onclick="deleteCart({!! $cart->id !!});">
                                        <img src="{{ $image }}" alt="{{ $product->product_name }}">
                                    </div>
                                </td>
                                <td class="column-2"><a href="{{ url('/product/').'/'.$product->url }}">{{ $product->product_name }}</a></td>
                                <td class="column-3">₹{{ $product->price }}</td>
                                <td class="column-4">
                                    <div class="flex-w bo5 of-hidden w-size17">
                                        <button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
                                            <i class="fs-12 fa fa-minus" aria-hidden="true"></i>
                                        </button>
                                        <input name="qty[]" class="size8 m-text18 t-center num-product" type="number" name="num-product1" value="{{ $cart->qty }}" min="0" max="{{ $product->stock }}">
                                        <button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
                                            <i class="fs-12 fa fa-plus" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </td>
                                <td class="column-5">₹{{ $product->price*$cart->qty }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
                <div class="flex-w flex-m w-full-sm">
                    <div class="size11 bo4 m-r-10">
                        <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="coupon-code" placeholder="Coupon Code">
                    </div>
                    <div class="size12 trans-0-4 m-t-10 m-b-10 m-r-10">
                        <button type="submit" name="applyCoupon" value="applyCoupon" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4"> Apply coupon </button>
                    </div>
                </div>
                <div class="size10 trans-0-4 m-t-10 m-b-10">
                    <button type="submit" name="updateCart" value="updateCart" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4"> Update Cart </button>
                </div>
            </div>
        </form>
        <div class="bo9 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
            <h5 class="m-text20 p-b-24"> Cart Totals </h5>
            <div class="row">
                <div class="col-md-6 mr-auto">
                    <div class="flex-w flex-sb p-b-20">
                        <span class="s-text18"> Shipping: </span>
                        <div class="">
                            <p class="s-text8 p-b-23">
                                There are no shipping methods available. Please double check your address, or contact us if you need any help.
                            </p>
                            <span class="s-text19"> Calculate Shipping </span>
                            <div class="rs2-select2 rs3-select2 rs4-select2 bo4 of-hidden w-size21 m-t-8 m-b-12">
                                <select class="selection-2" name="country">
                                    <option>Select a country...</option>
                                    <option>US</option>
                                    <option>UK</option>
                                    <option>Japan</option>
                                </select>
                            </div>
                            <div class="size13 bo4 m-b-12">
                                <input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="state" placeholder="State /  country">
                            </div>
                            <div class="size13 bo4 m-b-22">
                                <input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="postcode" placeholder="Postcode / Zip">
                            </div>
                            <div class="size14 trans-0-4 m-b-10">
                                <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4"> Update Totals </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="flex-w flex-sb-m p-b-12">
                        <span class="s-text18 w-full-sm"> Subtotal: </span>
                        <span class="m-text21 w-full-sm"> ₹{{ $subTotal }} </span>
                    </div>
                    <div class="flex-w flex-sb-m p-b-12">
                        <span class="s-text18 w-full-sm"> Shipping Charge: </span>
                        <span class="m-text21 w-full-sm"> ₹0 </span>
                    </div>
                    <div class="flex-w flex-sb-m p-b-30">
                        <span class="s-text18 w-full-sm"> Total: </span>
                        <span class="m-text21 w-full-sm"> ₹{{ $cartTotal }} </span>
                    </div>
                    <div class="size15 trans-0-4">
                        <a href="{{ url('/checkout') }}" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                            Proceed to Checkout
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @else
        <p>Cart is empty</p>
        <p>Click <a href="{{ url('/') }}">here</a> to continue shopping.</p>
        @endif
    </div>
</section>
@endsection

@section('js_after')
<div id="dropDownSelect2"></div>
<script type="text/javascript">
    $(".selection-2").select2({
        minimumResultsForSearch: 20,
        dropdownParent: $('#dropDownSelect2')
    });

    function deleteCart(cartid) {
        $.ajax({
            url: '{{ url('cart/delete') }}/'+cartid,
            success: function(response) {
                if (response == 'true') {
                    location.reload();
                } else {
                    swal('Wrong', "Something went wrong !", "error");
                }
            }
        });
    }
</script>
@endsection