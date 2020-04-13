<?php $cartTotal = 0; ?>
<img src="{{ asset('front/images/icons/icon-header-02.png') }}" class="header-icon1 js-show-header-dropdown" alt="ICON">
<span class="header-icons-noti">{{ count($cartData) }}</span>
<div class="header-cart header-dropdown">
	@if(!empty($cartData))
		<ul class="header-cart-wrapitem">
			@foreach($cartData as $cart)
				<?php 
					$image = DB::table('products_images')->where('pid', $cart->pid)->first();
					$cartTotal += ($cart->price * $cart->qty);

					if (!empty($image)) {
		                $image = asset('uploads/products/large/' . $image->image);
		            } else {
		                $image = asset('front/images/product-default.jpg');
		            }
				?>
				<li class="header-cart-item">
					<div class="header-cart-item-img" onclick="deleteFromCart({{ $cart->id }});">
						<img src="{{ $image }}" alt="{{ $cart->product_name }}">
					</div>
					<div class="header-cart-item-txt">
						<a href="{{ url('/product/').'/'.$cart->url }}" class="header-cart-item-name">
							{{ $cart->product_name }}
						</a>
						<span class="header-cart-item-info">
							{{ $cart->qty }} x ₹{{ $cart->price }}
						</span>
					</div>
				</li>
			@endforeach
		</ul>
		<div class="header-cart-total">
			Total: ₹{{ $cartTotal }}
		</div>
		<div class="header-cart-buttons">
			<div class="header-cart-wrapbtn">
				<a href="{{ url('/cart') }}" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
					View Cart
				</a>
			</div>
			<div class="header-cart-wrapbtn">
				<a href="{{ url('checkout') }}" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
					Check Out
				</a>
			</div>
		</div>
	@else
		Cart is empty
	@endif
</div>
<script type="text/javascript">
	$('.js-show-header-dropdown').on('click', function() {
        $(this).parent().find('.header-dropdown')
    });
    var menu = $('.js-show-header-dropdown');
    var sub_menu_is_showed = -1;
    for (var i = 0; i < menu.length; i++) {
        $(menu[i]).on('click', function() {
            if (jQuery.inArray(this, menu) == sub_menu_is_showed) {
                $(this).parent().find('.header-dropdown').toggleClass('show-header-dropdown');
                sub_menu_is_showed = -1;
            } else {
                for (var i = 0; i < menu.length; i++) {
                    $(menu[i]).parent().find('.header-dropdown').removeClass("show-header-dropdown");
                }
                $(this).parent().find('.header-dropdown').toggleClass('show-header-dropdown');
                sub_menu_is_showed = jQuery.inArray(this, menu);
            }
        });
    }
    $(".js-show-header-dropdown, .header-dropdown").click(function(event) {
        event.stopPropagation();
    });
    $(window).on("click", function() {
        for (var i = 0; i < menu.length; i++) {
            $(menu[i]).parent().find('.header-dropdown').removeClass("show-header-dropdown");
        }
        sub_menu_is_showed = -1;
    });
</script>