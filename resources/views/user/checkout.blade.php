@extends('layouts.vege')
@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
@endsection

@section('content')
<div class="hero-wrap hero-bread" style="background-image: url('{{asset('images/bg_1.jpg')}}');">
	<div class="container">
		<div class="row no-gutters slider-text align-items-center justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
				<p class="breadcrumbs"><span class="mr-2"><a href="{{route('home')}}">Home</a></span> <span>Checkout</span></p>
				<h1 class="mb-0 bread">Checkout</h1>
			</div>
		</div>
	</div>
</div>

<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-xl-7 ftco-animate">
				<form action="{{route('orderProcess')}}" id="orderForm" class="billing-form" method="POST">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<h3 class="mb-4 billing-heading">Billing Details</h3>
					<div class="row align-items-end">
						<div class="col-md-12">
							<div class="form-group">
								<label for="fullname">Full Name</label>
								@if(!empty($user))
									<input type="text" name="fullname" class="form-control" value="{{$user->name}}" required>
								@else
									<input type="text" name="fullname" class="form-control" placeholder="" required>
								@endif
								
							</div>
						</div>
						<div class="w-100"></div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="phone">Phone</label>
								@if(!empty($user))
									<input type="text" name="phonenumber" class="form-control" placeholder="" value="{{$user->phonenumber}}" required>
								@else
									<input type="text" name="phonenumber" class="form-control" placeholder="" required>
								@endif
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="emailaddress">Email Address</label>
								@if(!empty($user))
									<input type="text" name="email" class="form-control" placeholder="" value="{{$user->email}}" required>
								@else
									<input type="text" name="email" class="form-control" placeholder="" required>
								@endif
							</div>
						</div>
						<div class="w-100"></div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="streetaddress">Street Address</label>
									<input type="text" id="streetaddress1" name="streetaddress1" class="form-control" placeholder="House number and street name" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<input type="text" id="streetaddress2" name="streetaddress2" class="form-control" placeholder="Appartment, suite, unit etc: (optional)">
							</div>
						</div>
						<div class="w-100"></div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="towncity">Town / City</label>
									<input type="text" id="city" name="city" class="form-control" placeholder="" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="postcodezip">Postcode / ZIP *</label>
									<input type="text" id="postcode" name="postcode" class="form-control" placeholder="" required>
							</div>
						</div>
						<div class="w-100"></div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="state">State</label>
									<input type="text" id="state" name="state" class="form-control" placeholder="" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="country">Country</label>
								<div class="select-wrap">
									<div class="icon"><span class="ion-ios-arrow-down"></span></div>
										<select name="country" id="country" class="form-control">
										<option value="Malaysia">Malaysia</option>
										<option value="France">France</option>
										<option value="Italy">Italy</option>
										<option value="Philippines">Philippines</option>
										<option value="South Korea">South Korea</option>
										<option value="Hongkong">Hongkong</option>
										<option value="Japan">Japan</option>
									</select>
								</div>
							</div>
						</div>
						<button  type="submit" class="btn btn-primary py-3 px-4">Place an order</button>
						<!-- <div class="w-100"></div>
						<div class="col-md-12">
							<div class="form-group mt-4">
								<div class="radio">
									<label class="mr-3"><input type="radio" name="optradio"> Create an Account? </label>
									<label><input type="radio" name="optradio"> Ship to different address</label>
								</div>
							</div>
						</div> -->
					</div>
				</form><!-- END -->
			</div>
			<div class="col-xl-5">
				<div class="row mt-5 pt-3">
					<div class="col-md-12 d-flex mb-5">
						<div id="cartTotal" class="cart-detail cart-total p-3 p-md-4">
							<!--html from main2.js -->
							<h3>Cart Totals</h3>
							<p class="d-flex">
								<span>Subtotal</span>
								<span>RM0.00</span>
							</p>
							<p class="d-flex">
								<span>Delivery</span>
								<span>RM0.00</span>
							</p>
							<p class="d-flex">
								<span>Discount</span>
								<span>RM0.00</span>
							</p>
							<hr>
							<p class="d-flex total-price">
								<span>Total</span>
								<span>RM0.00</span>
							</p>
						</div>
					</div>
					<div class="col-md-12">
						<div class="cart-detail p-3 p-md-4">
							<h3 class="billing-heading mb-4">Payment Method</h3>
							<div class="form-group">
								<div class="col-md-12">
									<div class="radio">
										<label><input type="radio" name="optradio" class="mr-2"> Direct Bank Tranfer</label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-12">
									<div class="radio">
										<label><input type="radio" name="optradio" class="mr-2"> Check Payment</label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-12">
									<div class="radio">
										<label><input type="radio" name="optradio" class="mr-2"> Paypal</label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-12">
									<div class="checkbox">
										<label><input type="checkbox" value="" class="mr-2"> I have read and accept the terms and conditions</label>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div> <!-- .col-md-8 -->
		</div>
	</div>
</section> <!-- .section -->

<section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
	<div class="container py-4">
		<div class="row d-flex justify-content-center py-5">
			<div class="col-md-6">
				<h2 style="font-size: 22px;" class="mb-0">Subcribe to our Newsletter</h2>
				<span>Get e-mail updates about our latest shops and special offers</span>
			</div>
			<div class="col-md-6 d-flex align-items-center">
				<form action="#" class="subscribe-form">
					<div class="form-group d-flex">
						<input type="text" class="form-control" placeholder="Enter email address">
						<input type="submit" value="Subscribe" class="submit px-3">
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
@endsection

@section('javascripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

<script type="text/javascript">

	let productsInCart = localStorage.getItem("productsInCart"); 
	let deliveryFee = localStorage.getItem("deliveryFee");
	let overallCost = localStorage.getItem("overallCost");
	// console.log("productsInCart:" + productsInCart);
	var url = "{{route('orderProcess')}}";
	var orderPage = "{{route('order')}}";
	$(document).on('submit', '#orderForm', function(event){  
        	event.preventDefault(); 
        	var fd = new FormData();
        	fd.append("product",productsInCart);
        	fd.append("deliveryFee", deliveryFee);
        	fd.append("overallCost", overallCost);
        	fd.append("user_details",JSON.stringify($(this).serializeArray()));
        	$.ajax({  
        		headers: {
				  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
        		url:url,  
        		method:'POST',  
        		data:fd, 
        		processData: false,
				contentType: false, 
        		success:function(data)  
        		{  
        			console.log((data));
        			///console.log("after success: " + JSON.stringify(data));
        			// $('#editPromotionModal').modal('hide');  
        			// $('#promo_table').DataTable().ajax.reload();
        			// alert('Data Updated');
        			sweetAlert("Congratulation", "Your order is taken place!", "success");
        			window.location.href = orderPage;
        			localStorage.clear();
        		},
        		error: function(data) {
        			console.log("error" + JSON.stringify(data));
        		}
        	});  
        });  

function displayCart(){
	let cartItems = localStorage.getItem("productsInCart");
	//json.parse is string to javascript object
	//json.parse = jsondecode
	//jsondecode is used in php
	//json.parse is used in javascript
	cartItems = JSON.parse(cartItems);

	let defaultAddress = localStorage.getItem("defaultAddress");
	defaultAddress = JSON.parse(defaultAddress);

	let deliveryPlace = localStorage.getItem("deliveryPlace");
	if (deliveryPlace) {
		deliveryPlace = JSON.parse(deliveryPlace);
		$('#city').val(deliveryPlace['city']);
		$('#postcode').val(deliveryPlace['postcode']);
		$('#state').val(deliveryPlace['state']);
		$('#country').val(deliveryPlace['country']);  
	}else{
		$('#streetaddress1').val(defaultAddress['streetaddress1']);
		$('#streetaddress2').val(defaultAddress['streetaddress2']);
		$('#city').val(defaultAddress['city']);
		$('#postcode').val(defaultAddress['postcode']);
		$('#state').val(defaultAddress['state']);
		$('#country').val(defaultAddress['country']);
	}

	let deliveryCost = localStorage.getItem("deliveryFee");
	deliveryCost = JSON.parse(deliveryCost);

	let overallCost = localStorage.getItem("overallCost");
	overallCost = JSON.parse(overallCost);

	// console.log(cartItems);
	let cartCost = localStorage.getItem('totalCost');
	let cartTotal = document.querySelector("#cartTotal");
	if (cartItems && cartTotal) {
		cartTotal.innerHTML = '';
		Object.values(cartItems).map(item => {
			cartTotal.innerHTML = `
				<h3>Cart Totals</h3>
					<p class="d-flex">
						<span>Subtotal</span>
						<span>RM${cartCost}</span>
					</p>
					<p class="d-flex">
						<span>Delivery</span>
						<span>RM${deliveryCost}</span>
					</p>
					<p class="d-flex">
						<span>Discount</span>
						<span>RM0.00</span>
					</p>
					<hr>
					<p class="d-flex total-price">
						<span>Total</span>
						<span>RM${overallCost}</span>
					</p>
			`;
		});
	}else{
		cartTotal.innerHTML = '';
		cartTotal.innerHTML = `
				<h3>Cart Totals</h3>
					<p class="d-flex">
						<span>Subtotal</span>
						<span>RM0.00</span>
					</p>
					<p class="d-flex">
						<span>Delivery</span>
						<span>RM0.00</span>
					</p>
					<p class="d-flex">
						<span>Discount</span>
						<span>RM0.00</span>
					</p>
					<hr>
					<p class="d-flex total-price">
						<span>Total</span>
						<span>RM0.00</span>
					</p>
			`;
	}
}

function onLoadCartNumbers(){
	let productNumbers = localStorage.getItem('cartNumbers'); //check localstorage 
	if (productNumbers) {
		document.querySelector('.cta a span').textContent = productNumbers; //cart number changed on nav bar
	}
}

onLoadCartNumbers();
displayCart();

</script>
@endsection