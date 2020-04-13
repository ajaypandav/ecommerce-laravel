<?php 
	$categoriesMenu = DB::table('categories')->where('status', 1)->orderBy('position', 'ASC')->get();
	$logo = DB::table('options')->where('key', '=', 'logo')->first();
	$title = DB::table('options')->where('key', '=', 'site_title')->first();
?>
<header class="header1">
	<div class="container-menu-header">
		<div class="topbar">
			<div class="topbar-social">
				<a href="#" class="topbar-social-item fa fa-facebook"></a>
				<a href="#" class="topbar-social-item fa fa-instagram"></a>
				<a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
				<a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
				<a href="#" class="topbar-social-item fa fa-youtube-play"></a>
			</div>
			<!-- <span class="topbar-child1">
				Free shipping for standard order over ₹1000
			</span> -->
			<div class="topbar-child2">
				<span class="topbar-email">
					<a href="tel:+919999999999" class="__cf_email__ mr-2"><i class="fa fa-mobile"></i> +91 99999 99999</a>
					<a href="mailto:abc@domain.com" class="__cf_email__"><i class="fa fa-envelope"></i> abc@domain.com</a>
				</span>
			</div>
		</div>
		<div class="wrap_header">
			<a href="{{ url('/') }}" class="logo">
				<img src="{{ asset('uploads') }}/{{ $logo->value }}" alt="{{ $title->value }}">
			</a>
			<div class="wrap_menu">
				<nav class="menu">
					<ul class="main_menu">
						<li class="{{ request()->is('/') ? 'active' : '' }}">
							<a href="{{ url('/') }}">Home</a>
						</li>
						@foreach($categoriesMenu as $category)
							<li class="{{ request()->is('categories/'.$category->url) ? 'active' : '' }}">
								<a href="{{ url('/') }}/categories/{{ $category->url }}">{{ $category->title }}</a>
							</li>
						@endforeach
						<li class="{{ request()->is('blog') ? 'active' : '' }}">
							<a href="{{ url('/blog') }}">Blog</a>
						</li>
						<li class="{{ request()->is('about') ? 'active' : '' }}">
							<a href="{{ url('/about') }}">About</a>
						</li>
						<li class="{{ request()->is('contact') ? 'active' : '' }}">
							<a href="{{ url('/contact') }}">Contact</a>
						</li>
					</ul>
				</nav>
			</div>
			<div class="header-icons">
				<a href="{{ url('/myaccount') }}" class="header-wrapicon1 dis-block">
					<img src="{{ asset('front/images/icons/icon-header-01.png') }}" class="header-icon1" alt="ICON">
				</a>
				<span class="linedivide1"></span>
				<div class="header-wrapicon2 cart-header">
					
				</div>
			</div>
		</div>
	</div>
	<div class="wrap_header_mobile">
		<a href="{{ url('/') }}" class="logo-mobile">
			<img src="{{ asset('uploads') }}/{{ $logo->value }}" alt="{{ $title->value }}">
		</a>
		<div class="btn-show-menu">
			<div class="header-icons-mobile">
				<a href="{{ url('/') }}/myaccount" class="header-wrapicon1 dis-block">
					<img src="{{ asset('front/images/icons/icon-header-01.png') }}" class="header-icon1" alt="ICON">
				</a>
				<span class="linedivide2"></span>
				<div class="header-wrapicon2 cart-header">
					
				</div>
			</div>
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>
	</div>
	<div class="wrap-side-menu">
		<nav class="side-menu">
			<ul class="main-menu">
				<!-- <li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
					<span class="topbar-child1">
						Free shipping for standard order over ₹1000
					</span>
				</li> -->
				<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
					<div class="topbar-child2-mobile">
						<span class="topbar-email">
							<a href="tel:+919999999999" class="__cf_email__ mr-2"><i class="fa fa-mobile"></i> +91 99999 99999</a>
							<a href="mailto:abc@domain.com" class="__cf_email__"><i class="fa fa-envelope"></i> abc@domain.com</a>
						</span>
					</div>
				</li>
				<li class="item-topbar-mobile p-l-10">
					<div class="topbar-social-mobile">
						<a href="#" class="topbar-social-item fa fa-facebook"></a>
						<a href="#" class="topbar-social-item fa fa-instagram"></a>
						<a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
						<a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
						<a href="#" class="topbar-social-item fa fa-youtube-play"></a>
					</div>
				</li>
				<li class="item-menu-mobile">
					<a href="{{ url('/') }}">Home</a>
				</li>
				@foreach($categoriesMenu as $category)
					<li class="item-menu-mobile">
						<a href="{{ url('/') }}/categories/{{ $category->url }}">{{ $category->title }}</a>
					</li>
				@endforeach
				<li class="item-menu-mobile">
					<a href="{{ url('/blog') }}">Blog</a>
				</li>
				<li class="item-menu-mobile">
					<a href="{{ url('/about') }}">About</a>
				</li>
				<li class="item-menu-mobile">
					<a href="{{ url('/contact') }}">Contact</a>
				</li>
			</ul>
		</nav>
	</div>
</header>