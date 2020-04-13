<?php $site_title = DB::table('options')->where('key', '=', 'site_title')->first(); ?>
@extends('front.layouts.default')

@section('css_before')
	<title>Checkout | {{ $site_title->value }}</title>
@endsection

@section('content')
	<section class="bg-title-page flex-col-c-m" style="background-image: url({{ asset('front/images/custom-page-header.jpg') }});">
		<h2 class="font-weight-bold text-white"> Checkout </h2>
	</section>

	<section class="bgwhite p-t-66 p-b-38">
		<div class="container">
			<div class="row">
				@if(Session::has('success'))
				<div class="col-md-12">
		            <div class="alert alert-success">
		                {{ Session::get('success') }}
		            </div>
		        </div>
		        @endif

		        @if(Session::has('error'))
				<div class="col-md-12">
		            <div class="alert alert-danger">
		                {{ Session::get('error') }}
		            </div>
		        </div>
		        @endif
		    </div>

		    @if(!empty($cartData))
		    @if(!Session::has('customer'))
		    <div class="row mb-2">
		    	<div class="col-md-12">
		    		<a href="{{ url('/login') }}" class="font-weight-bold">Already registered? Click here to login</a>
		    	</div>
		    </div>
		    @endif
		    
		    <div class="card">
  				<div class="card-body">
				    <form method="post" id="checkout-form" action="{{ route('checkout.place') }}">
						@csrf
					    <div class="row">
							<div class="col-md-5 border-right">
								<h6 class="mb-3 font-weight-bold">Billing Address</h6>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="firstname" class="mb-1">First Name <span class="text-danger">*</span></label>
											<input type="text" name="firstname" id="firstname" class="form-control border-secondary border rounded-0" placeholder="First Name" value="@if(old('firstname')) {{ old('firstname') }} @elseif($customer->firstname) {{ $customer->firstname }} @endif" required="">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="lastname" class="mb-1">Last Name <span class="text-danger">*</span></label>
											<input type="text" name="lastname" id="lastname" class="form-control border-secondary border rounded-0" placeholder="Last Name" value="@if(old('lastname')) {{ old('lastname') }} @elseif($customer->lastname) {{ $customer->lastname }} @endif" required="">
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="email" class="mb-1">Email Address <span class="text-danger">*</span></label>
									<input type="email" name="email" id="email" class="form-control border-secondary border rounded-0" placeholder="Email Address" value="@if(old('email')) {{ old('email') }} @elseif($customer->email) {{ $customer->email }} @endif" required="">
								</div>
								<div class="form-group">
									<label for="mobileno" class="mb-1">Mobile Number <span class="text-danger">*</span></label>
									<input type="text" name="mobileno" id="mobileno" class="form-control border-secondary border rounded-0 number" placeholder="Mobile No" value="{{ old('mobileno') }}" required="" minlength="10">
								</div>
								<div class="form-group">
									<label for="address1" class="mb-1">Address <span class="text-danger">*</span></label>
									<input type="text" name="address1" id="address1" class="form-control border-secondary border rounded-0 mb-2" placeholder="Address Line 1" value="{{ old('address1') }}" required="">
									<input type="text" name="address2" id="address2" class="form-control border-secondary border rounded-0" placeholder="Address Line 2" value="{{ old('address2') }}">
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="zipcode" class="mb-1">Zipcode <span class="text-danger">*</span></label>
											<input type="text" name="zipcode" id="zipcode" class="form-control border-secondary border rounded-0 number" placeholder="Zipcode" value="{{ old('zipcode') }}" required="">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="city" class="mb-1">City <span class="text-danger">*</span></label>
											<input type="text" name="city" id="city" class="form-control border-secondary border rounded-0" placeholder="City" value="{{ old('city') }}" required="">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="state" class="mb-1">State <span class="text-danger">*</span></label>
											<input type="text" name="state" id="state" class="form-control border-secondary border rounded-0" placeholder="State" value="{{ old('state') }}" required="">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="country" class="mb-1">Country <span class="text-danger">*</span></label>
			                                <select class="form-control border-secondary border rounded-0" name="country" id="country" required="">
			                                    <option value="">Select Country</option>
			                                    <option value="India" @if(old('country') == 'India') selected @endif>India</option>
			                                </select>
										</div>
									</div>
								</div>

								@if(!Session::has('customer'))
								<h6 class="mb-2 font-weight-bold">Checkout as</h6>
								<div class="form-group">
									<div class="d-inline">
								  		<input type="radio" name="checkout_as" id="register" value="register" required="" checked="">
									  	<label class="mb-0" for="register">Register</label>
									</div>
									<div class="d-inline ml-2">
								  		<input type="radio" name="checkout_as" id="guest" value="guest" required="" @if(old('checkout_as') == 'guest') checked="" @endif>
									  	<label class="mb-0" for="guest">Guest</label>
									</div>
								</div>

								<div class="row" id="register_div">
									<div class="col-md-6">
										<div class="form-group">
											<label for="password" class="mb-1">Password <span class="text-danger">*</span></label>
											<input type="password" name="password" id="password" class="form-control border-secondary border rounded-0" placeholder="Password" required="">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="conf_password" class="mb-1">Confirm Password <span class="text-danger">*</span></label>
											<input type="password" name="conf_password" id="conf_password" class="form-control border-secondary border rounded-0" placeholder="Confirm Password" required="">
										</div>
									</div>
								</div>
								@else
								<input type="hidden" name="checkout_as" value="registered" />
								@endif
							</div>
							<div class="col-md-7">
								<h6 class="mb-3 font-weight-bold">Confirm Your Order</h6>

								<table class="table table-bordered">
									<thead>
										<tr>
											<th>Product Name</th>
											<th>Unit Price</th>
											<th>Quantity</th>
											<th>Sub Total</th>
										</tr>
									</thead>
									<tbody>
										<?php $cartTotal = 0; ?>
										@foreach($cartData as $cart)
										<?php 
											$product = DB::table('products')->where('id', $cart->pid)->first();
											$cartTotal += ($product->price * $cart->qty);
										?>
											<tr>
												<td>{{ $product->product_name }}</td>
												<td>₹{{ $product->price }}</td>
												<td>{{ $cart->qty }}</td>
												<td>₹{{ $product->price * $cart->qty }}</td>
											</tr>
										@endforeach
										<tr>
											<td colspan="3">Sub Total</td>
											<td>₹{{ $cartTotal }}</td>
										</tr>
										<tr>
											<td colspan="3">Shipping Charge</td>
											<td>₹0</td>
										</tr>
										<tr>
											<td colspan="3" class="font-weight-bold">Grand Total</td>
											<td>₹{{ $cartTotal }}</td>
										</tr>
									</tbody>
								</table>

								<h6 class="mb-2 pt-2 font-weight-bold">Payment Method</h6>

								<div class="form-group">
									<div class="">
								  		<input type="radio" name="payment_method" id="payment_method" value="cod" required="" @if(old('payment_method') == 'cod') checked="" @endif>
									  	<label class="mb-0" for="payment_method">Cash on Delivery</label>
									</div>
								</div>

								<div class="form-group">
									<label for="comment" class="mb-1"> Comment </label>
									<textarea class="form-control" name="comment" id="comment" placeholder="Comment" rows="4">{{ old('comment') }}</textarea>
								</div>

								<div class="form-group mb-0" align="right">
									<button type="submit" name="login" value="login" class="bg1 bo-rad-23 hov1 s-text1 trans-0-4 size14 font-weight-bold"> Place Order </button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
			@else
				<p>Shopping cart is empty.</p>
				<p>Click <a href="{{ url('/') }}">here</a> to continue shopping.</p>
			@endif
		</div>
	</section>
@endsection

@section('js_after')
$wishlist
<script type="text/javascript">
    $(document).ready(function() {
    	$('#checkout-form').validate({
    		errorClass: 'error animated fadeInDown mb-0 mt-1',
            errorPlacement: (error, e) => {
                $(e).parents('.form-group').append(error);
            },
            highlight: e => {
                $(e).closest('.form-group').removeClass('is-invalid').addClass('is-invalid');
            },
            success: e => {
                $(e).closest('.form-group').removeClass('is-invalid');
                $(e).remove();
            },
            rules: {
            	zipcode: {
            		minlength: 6
            	},
            	password: {
            		minlength: 6
            	},
            	conf_password: {
            		equalTo: '#password'
            	}
            },
            messages: {
            	conf_password: {
            		equalTo: 'Enter same password again.'
            	}
            }
    	});

    	$('input[name="checkout_as"]').on('change', function() {
    		if (this.value == 'guest') {
    			$('#register_div').fadeOut('slow');
    		} else {
    			$('#register_div').fadeIn('slow');
    		}
    	})
    });
</script>
@endsection