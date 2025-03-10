<?php 
	$categoriesMenu = DB::table('categories')->where('status', 1)->orderBy('position', 'ASC')->get();
?>
<footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">
	<div class="flex-w p-b-90">
		<div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
			<h4 class="s-text12 p-b-30">
			GET IN TOUCH
			</h4>
			<div>
				<p class="s-text7 w-size27">
					Any questions? Call us on +91 99999 99999
				</p>
				<div class="flex-m p-t-30">
					<a href="#" class="fs-18 color1 p-r-20 fa fa-facebook"></a>
					<a href="#" class="fs-18 color1 p-r-20 fa fa-instagram"></a>
					<a href="#" class="fs-18 color1 p-r-20 fa fa-pinterest-p"></a>
					<a href="#" class="fs-18 color1 p-r-20 fa fa-snapchat-ghost"></a>
					<a href="#" class="fs-18 color1 p-r-20 fa fa-youtube-play"></a>
				</div>
			</div>
		</div>
		<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
			<h4 class="s-text12 p-b-30">
			Categories
			</h4>
			<ul>
				@foreach($categoriesMenu as $category)
					<li class="p-b-9">
						<a class="s-text7" href="{{ url('/') }}/categories/{{ $category->url }}">{{ $category->title }}</a>
					</li>
				@endforeach
			</ul>
		</div>
		<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
			<h4 class="s-text12 p-b-30">
			Links
			</h4>
			<ul>
				<li class="p-b-9">
					<a href="#" class="s-text7">
						Search
					</a>
				</li>
				<li class="p-b-9">
					<a href="{{ url('/about') }}" class="s-text7">
						About Us
					</a>
				</li>
				<li class="p-b-9">
					<a href="{{ url('/contact') }}" class="s-text7">
						Contact Us
					</a>
				</li>
				<li class="p-b-9">
					<a href="#" class="s-text7">
						Returns
					</a>
				</li>
			</ul>
		</div>
		<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
			<h4 class="s-text12 p-b-30">
			Help
			</h4>
			<ul>
				<li class="p-b-9">
					<a href="#" class="s-text7">
						Track Order
					</a>
				</li>
				<li class="p-b-9">
					<a href="#" class="s-text7">
						Returns
					</a>
				</li>
				<li class="p-b-9">
					<a href="#" class="s-text7">
						Shipping
					</a>
				</li>
				<li class="p-b-9">
					<a href="#" class="s-text7">
						FAQs
					</a>
				</li>
			</ul>
		</div>
		<div class="w-size8 p-t-30 p-l-15 p-r-15 respon3">
			<h4 class="s-text12 p-b-30">
			Newsletter
			</h4>
			<form id="subscribe-form" method="post">
				<div class="effect1 w-size9 form-group mb-0">
					<input class="s-text7 bg6 w-full p-b-5" type="email" id="subscribe_email" name="subscribe_email" placeholder="email@example.com" required="">
					<span class="effect1-line"></span>
				</div>
				<div class="w-size2 p-t-20">
					<button class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4" type="submit">
					Subscribe
					</button>
				</div>
			</form>
		</div>
	</div>
	<div class="t-center p-l-15 p-r-15">
		<a href="#">
			<img class="h-size2" src="{{ asset('front/images/icons/paypal.png') }}" alt="IMG-PAYPAL">
		</a>
		<a href="#">
			<img class="h-size2" src="{{ asset('front/images/icons/visa.png') }}" alt="IMG-VISA">
		</a>
		<a href="#">
			<img class="h-size2" src="{{ asset('front/images/icons/mastercard.png') }}" alt="IMG-MASTERCARD">
		</a>
		<a href="#">
			<img class="h-size2" src="{{ asset('front/images/icons/express.png') }}" alt="IMG-EXPRESS">
		</a>
		<a href="#">
			<img class="h-size2" src="{{ asset('front/images/icons/discover.png') }}" alt="IMG-DISCOVER">
		</a>
		<div class="t-center s-text8 p-t-20">
			Copyright © <script>document.write(new Date().getFullYear());</script> eCommerce. All rights reserved.
		</div>
	</div>
</footer>
<div class="btn-back-to-top bg0-hov" id="myBtn">
	<span class="symbol-btn-back-to-top">
		<i class="fa fa-angle-double-up" aria-hidden="true"></i>
	</span>
</div>
<div id="dropDownSelect1"></div>