@extends('layouts.vege')
@section('content')
<div class="hero-wrap hero-bread" style="background-image: url('{{asset('images/bg_1.jpg')}}');">
	<div class="container">
		<div class="row no-gutters slider-text align-items-center justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
				<p class="breadcrumbs"><span class="mr-2"><a href="{{route('home')}}">Home</a></span> <span>Cart</span></p>
				<h1 class="mb-0 bread">My Cart</h1>
			</div>
		</div>
	</div>
</div>
<section class="ftco-section ftco-cart">
	<div class="container">
		<div class="row">
			<div class="col-md-12 ftco-animate">
				@if(session('success'))
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						{{session('success')}}
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				@endif
				@if(session('warning'))
					<div class="alert alert-warning alert-dismissible fade show" role="alert">
						{{session('warning')}}
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				@endif
				<div class="cart-list">
					<table class="table">
						<thead class="thead-primary">
							<tr class="text-center">
								<th>Action</th>
								<th>Image</th>
								<th>Product name</th>
								<th>Price</th>
								<th>Quantity</th>
								<th>Total</th>
							</tr>
						</thead>
						<tbody class="body">
							<!-- html from main2.js -->
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div class="row justify-content-end">
			<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
				<div class="cart-total mb-3">
					<h3>Coupon Code</h3>
					<p>Enter your promotion code if you have one</p>
					<form action="{{route('promo')}}" class="info" method="post">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="form-group">
							<label for="">Promotion code</label>
							<input type="text" class="form-control text-left px-3" placeholder="">
						</div>
						<button type="submit" class="btn btn-primary py-3 px-4">Apply Promotion Code</button>
					</form>
				</div>
			</div>
			<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
				<div class="cart-total mb-3">
					<h3>Estimate shipping and tax</h3>
					<p>Enter your destination to get a shipping estimate</p>
					<form action="{{route('checkDeliveryFee')}}" class="info" method="post">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" id="defaultAddress" value="{{$defaultAddress}}" />
						<div class="form-group">
							<label for="city">Town/City</label>
							@if(!empty($address))
								<input type="text" id="city" name="city" class="form-control text-left px-3" placeholder="" value="{{isset($address->city) ? $address->city : $address['city']}}">
							@else
								<input type="text" id="city" name="city" class="form-control text-left px-3" placeholder="">
							@endif
						</div>
						<div class="form-group">
							<label for="postcode">Zip/Postal Code</label>
							@if(!empty($address))
								<input type="text" id="postcode" name="postcode" class="form-control text-left px-3" placeholder="" value="{{isset($address->postcode) ? $address->postcode : $address['postcode']}}">
							@else
								<input type="text" id="postcode" name="postcode" class="form-control text-left px-3" placeholder="">
							@endif
						</div>
						<div class="form-group">
							<label for="state">State/Province</label>
							@if(!empty($address))
								<input type="text" id="state" name="state" class="form-control text-left px-3" placeholder="" value="{{isset($address->state) ? $address->state : $address['state']}}">
							@else
								<input type="text" id="state" name="state" class="form-control text-left px-3" placeholder="">
							@endif
						</div>
						<div class="form-group">
							<label for="country">Country</label>
							@if(!empty($address))
								<input type="text" id="country" name="country" class="form-control text-left px-3" placeholder="" value="{{isset($address->country) ? $address->country : $address['country']}}">
							@else
								<input type="text" id="country" name="country" class="form-control text-left px-3" placeholder="">
							@endif
						</div>
						@if(!empty($deliveryfee))
							<input type="hidden" id="deliveryFee" value="{{$deliveryfee}}" />
						@endif
						<button type="submit" class="btn btn-primary py-3 px-4">Estimate</button>
					</form>
				</div>
			</div>
			<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
				<div id="cartTotal" class="cart-total mb-3">
					<!-- html from main2.js -->
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
				<p><a href="{{route('checkout')}}" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
			</div>
		</div>
	</div>
</section>

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
<script type="text/javascript">


	console.log("Cart Page running ");
	
	
	let defaultAddress = $('#defaultAddress').val();
	localStorage.setItem("defaultAddress", defaultAddress);
	defaultAddress = JSON.parse(defaultAddress);

	let city = $('#city').val();
	let state = $('#state').val();
	let postcode = $('#postcode').val();
	let country = $('#country').val();
	if (city != defaultAddress.city || state != defaultAddress.state || postcode != defaultAddress.postcode || country != defaultAddress.country) {
		let deliveryPlace = {city: city, postcode: postcode, state: state, country: country};
		localStorage.setItem("deliveryPlace", JSON.stringify(deliveryPlace));
	}
	
	let deliveryFee = $('#deliveryFee').val();
	deliveryFee = parseInt(deliveryFee);
	// console.log(typeof deliveryFee);

	localStorage.setItem("deliveryFee", deliveryFee);

function displayCart(){
	let cartItems = localStorage.getItem("productsInCart");
	cartItems = JSON.parse(cartItems);
	let productContainer = $(".body");

	console.log(cartItems);
	let cartCost = localStorage.getItem("totalCost"); 
	cartCost = JSON.parse(cartCost);
	let deliveryCost = localStorage.getItem("deliveryFee");
	deliveryCost = JSON.parse(deliveryCost);
		// console.log(typeof deliveryCost);

	let overallCost = cartCost + deliveryCost;
	localStorage.setItem("overallCost", overallCost);
	
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

	if (cartItems && productContainer) {
		// console.log('abc');
		productContainer.html('');
		Object.values(cartItems).map(item => {
			productContainer.append(`
				<tr class="text-center">
					<td id="${item.name}" class="product-remove"><a><span class="ion-ios-close"></span></a></td>
					<td><img src="./public/uploads/vegeFoodsPhoto/${item.photo}" style="width:150px; display=block;"></td>
					<td class="product-name">
						<h3 id="productName">${item.name}</h3>
					</td>
					<td class="price">RM${item.price}</td>
					<td class="quantity">
						<div class="input-group mb-3">
							<button type="button" id="${item.name}minus" class="quantity-left-minus btn"  data-type="minus" data-field="">
								<i class="ion-ios-remove"></i>
							</button>
							<input type="text" name="quantity" id="${item.name}quantity" class="quantity form-control input-number" value="${item.inCart}" min="1" max="100">
							<button type="button" id="${item.name}plus" class="quantity-right-plus btn" data-type="plus" data-field="">
								<i class="ion-ios-add"></i>
							</button>
						</div>
					</td>

					<td class="total">RM${item.price * item.inCart}</td>
				</tr>
			`);
		});
	}else{
		productContainer.innerHTML ='';
		productContainer.innerHTML += `<p>No cart</p>`;
	}	
}

function onLoadCartNumbers(){
	let productNumbers = localStorage.getItem('cartNumbers'); //check localstorage 
	if (productNumbers) {
		document.querySelector('.cta a span').textContent = productNumbers; //cart number changed on nav bar
	}
}

function cartNumbers(){
	// console.log("the product is ", product);
	let productNumbers = localStorage.getItem('cartNumbers');
	productNumbers = parseInt(productNumbers);

	if (productNumbers) {

		localStorage.setItem('cartNumbers', productNumbers + 1);
		document.querySelector('.cta a span').textContent = productNumbers + 1;
	}else{
		localStorage.setItem('cartNumbers', 1);
		document.querySelector('.cta a span').textContent = 1;
	}	

}


onLoadCartNumbers();
displayCart();


// $('.testing').click(function(){
// 	console.log('okkkkk');
// });


//remove product when click
//generate from javascript innerhtml or jquery append function will no have event
//code html will have event when the tag ready to create event
$('.body').on('click','.product-remove',function(){
	console.log('test')
	var products = localStorage.getItem("productsInCart");
	products = JSON.parse(products);
		//console.log(products);
		var productNamefromIdAttr = $(this).attr('id');

		//console.log("remove product " + productNamefromIdAttr);

		// var productName = $('#productName').text();
		// console.log("remove product 2 " + productName);
		// localStorage.removeItem('productsInCart');

		if (products != null) {
			if (products[productNamefromIdAttr] != null) {

				let productNumbers = localStorage.getItem('cartNumbers');
				productNumbers = parseInt(productNumbers);
				if (productNumbers) {
					productNumbers = productNumbers - products[productNamefromIdAttr].inCart;
					localStorage.setItem('cartNumbers', productNumbers);
				}

				delete products[productNamefromIdAttr];
				localStorage.setItem("productsInCart", JSON.stringify(products));
				//console.log("delete successful " + products[productNamefromIdAttr]);
				console.log(products);
				displayCart();
				onLoadCartNumbers();
			}else{
				console.log("delete unsuccessful");
			}
		}

	});


$('.body').on('click','.quantity-right-plus',function(e){
	// Stop acting like a button
	e.preventDefault();
		console.log('plus');
		var command = "plus";

		var products = localStorage.getItem("productsInCart");
		products = JSON.parse(products);

		var productNamefromIdAttr = $(this).attr('id');
		var productName = productNamefromIdAttr.replace('plus','');
		console.log(productName);
		if (products != null) {
			if (products[productName] != null) {
				// Get the field name
				// var quantity = parseInt($('#productNamefromIdAttrquantity').val());
				// console.log("abc0" + quantity);
				// // If is not undefined
				// $('#productNamefromIdAttrquantity').val(quantity + 1);
				    // Increment
				products[productName].inCart += 1;
				localStorage.setItem("productsInCart", JSON.stringify(products));
				
				console.log('plusend');
			}

			let productNumbers = localStorage.getItem('cartNumbers');
			productNumbers = parseInt(productNumbers);

			if (productNumbers) {
				localStorage.setItem('cartNumbers', productNumbers + 1);
				document.querySelector('.cta a span').textContent = productNumbers + 1;
			}
			totalCost(products[productName].price, command);
			displayCart();
			onLoadCartNumbers();
		}else{
			console.log("plus unsuccessful");
		}

	
});

$('.body').on('click','.quantity-left-minus',function(e){
    // Stop acting like a button
    var command = "minus";
    e.preventDefault();
    	var products = localStorage.getItem("productsInCart");
		products = JSON.parse(products);

		var productNamefromIdAttr = $(this).attr('id');
		var productName = productNamefromIdAttr.replace('minus','');
		if (products != null) {
			console.log("abc");
			if (products[productName] != null) {

	        	products[productName].inCart -= 1;
	        	if (products[productName].inCart == 0) {
	        		delete products[productName];
	        		localStorage.setItem("productsInCart", JSON.stringify(products));
	        		displayCart();
	        	}
	        	localStorage.setItem("productsInCart", JSON.stringify(products));

	        	let productNumbers = localStorage.getItem('cartNumbers');
				productNumbers = parseInt(productNumbers);

				if (productNumbers) {
					localStorage.setItem('cartNumbers', productNumbers - 1);
					document.querySelector('.cta a span').textContent = productNumbers - 1;
				}
				totalCost(products[productName].price, command);
				displayCart();
				onLoadCartNumbers();
			}


		}else{
			console.log("minus unsuccessful");
		}
});

function totalCost(productPrice, command){
	// console.log("The product price is", product.price);
	let cartCost = localStorage.getItem('totalCost');
	cartCost = parseInt(cartCost);

	let price = parseInt(productPrice);
	
	// console.log("my cart cost is", cartCost);
	// console.log(typeof cartCost); //show datatype

	if (cartCost != null) {
		if (command == "minus") {
			localStorage.setItem("totalCost", cartCost - price);
		}else if(command == "plus"){
			localStorage.setItem("totalCost", cartCost + price);
		}
	}
}

</script>
@endsection