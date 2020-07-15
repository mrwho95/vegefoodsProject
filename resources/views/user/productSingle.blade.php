@extends('layouts.vege')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
@endsection

@section('content')
<div class="hero-wrap hero-bread" style="background-image: url('{{asset('images/bg_1.jpg')}}');">
	<div class="container">
		<div class="row no-gutters slider-text align-items-center justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
				<p class="breadcrumbs"><span class="mr-2"><a href="{{route('home')}}">Home</a></span> <span class="mr-2"><a href="{{route('shop')}}">Product</a></span> <span>Product Single</span></p>
				<h1 class="mb-0 bread">Product Single</h1>
			</div>
		</div>
	</div>
</div>

<section class="ftco-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 mb-5 ftco-animate">
				<a href="{{asset('uploads/vegeFoodsPhoto/'.$singleProduct->photo)}}" class="image-popup"><img src="{{asset('uploads/vegeFoodsPhoto/'.$singleProduct->photo)}}" class="img-fluid" alt="Colorlib Template"></a>
				<input type="hidden" id="photo" value="{{$singleProduct->photo}}">
			</div>
			<div class="col-lg-6 product-details pl-md-5 ftco-animate">
				<h3 id="name">{{$singleProduct->name}}</h3>
				<!-- <div class="rating d-flex">
					<p class="text-left mr-4">
						<a href="#" class="mr-2">5.0</a>
						<a href="#"><span class="ion-ios-star-outline"></span></a>
						<a href="#"><span class="ion-ios-star-outline"></span></a>
						<a href="#"><span class="ion-ios-star-outline"></span></a>
						<a href="#"><span class="ion-ios-star-outline"></span></a>
						<a href="#"><span class="ion-ios-star-outline"></span></a>
					</p>
					<p class="text-left mr-4">
						<a href="#" class="mr-2" style="color: #000;">100 <span style="color: #bbb;">Rating</span></a>
					</p>
					<p class="text-left">
						<a href="#" class="mr-2" style="color: #000;">500 <span style="color: #bbb;">Sold</span></a>
					</p>
				</div> -->
				<p class="price">RM<span id="price">{{$singleProduct->price}}</span></p>
				<p>{{$singleProduct->description}}</p>
				<div class="row mt-4">
					<!-- <div class="col-md-6">
						<div class="form-group d-flex">
							<div class="select-wrap">
								<div class="icon"><span class="ion-ios-arrow-down"></span></div>
								<select name="" id="" class="form-control">
									<option value="">Small</option>
									<option value="">Medium</option>
									<option value="">Large</option>
									<option value="">Extra Large</option>
								</select>
							</div>
						</div>
					</div> -->
					<div class="w-100"></div>
					<div class="input-group col-md-6 d-flex mb-3">
						<span class="input-group-btn mr-2">
							<button type="button" class="quantity-left-minus btn"  data-type="minus" data-field="">
								<i class="ion-ios-remove"></i>
							</button>
						</span>
						<input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
						<span class="input-group-btn ml-2">
							<button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
								<i class="ion-ios-add"></i>
							</button>
						</span>
					</div>
					<div class="w-100"></div>
					<div class="col-md-12">
						<p style="color: #000;">{{$singleProduct->weight}} kg available in {{$singleProduct->quantity}} <strong>Stocks</strong></p>
						<input type="hidden" id="quantityRemain" value="{{$singleProduct->quantity}}">
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<p><a id="{{$singleProduct->id}}" class="add-item btn btn-primary py-3 px-5">Add to Cart</a></p>
					</div>
					<div class="col-md-6">
						<p><a href="{{route('shop')}}" class="btn btn-secondary py-3 px-5 float-right">Back to Shop</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center mb-3 pb-3">
			<div class="col-md-12 heading-section text-center ftco-animate">
				<span class="subheading">Products</span>
				<h2 class="mb-4">Related Products</h2>
				<!-- <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p> -->
			</div>
		</div>   		
	</div>
	<div class="container">
		<div class="row">
			<!-- <div class="col-md-6 col-lg-3 ftco-animate">
				<div class="product">
					<a href="#" class="img-prod"><img class="img-fluid" src="{{asset('images/product-1.jpg')}}" alt="Colorlib Template">
						<span class="status">30%</span>
						<div class="overlay"></div>
					</a>
					<div class="text py-3 pb-4 px-3 text-center">
						<h3><a href="#">Bell Pepper</a></h3>
						<div class="d-flex">
							<div class="pricing">
								<p class="price"><span class="mr-2 price-dc">$120.00</span><span class="price-sale">$80.00</span></p>
							</div>
						</div>
						<div class="bottom-area d-flex px-3">
							<div class="m-auto d-flex">
								<a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
									<span><i class="ion-ios-menu"></i></span>
								</a>
								<a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
									<span><i class="ion-ios-cart"></i></span>
								</a>
								<a href="#" class="heart d-flex justify-content-center align-items-center ">
									<span><i class="ion-ios-heart"></i></span>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div> -->
			@if(count($relatedProduct) > 0)
			@foreach($relatedProduct as $data)
			<div class="col-md-6 col-lg-3 ftco-animate">
				<div class="product">
					<a href="{{route('product', $data->id)}}" class="img-prod"><img class="img-fluid" src="{{asset('uploads/vegeFoodsPhoto/'.$data->photo)}}" alt="Colorlib Template">
						<div class="overlay"></div>
					</a>
					<div class="text py-3 pb-4 px-3 text-center">
						<h3><a href="#">{{$data->name}}</a></h3>
						<div class="d-flex">
							<div class="pricing">
								<p class="price"><span>RM{{$data->price}}</span></p>
							</div>
						</div>
						<!-- <div class="bottom-area d-flex px-3">
							<div class="m-auto d-flex">
								<a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
									<span><i class="ion-ios-menu"></i></span>
								</a>
								<a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
									<span><i class="ion-ios-cart"></i></span>
								</a>
								<a href="#" class="heart d-flex justify-content-center align-items-center ">
									<span><i class="ion-ios-heart"></i></span>
								</a>
							</div>
						</div> -->
					</div>
				</div>
			</div>
			@endforeach
			@endif
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

<script>
	console.log("single product page running");

	$(".add-item").click(function(){
		var productName = $('#name').text();
		var productPrice = $('#price').text();
		var productPhoto = $('#photo').val();
		var productQuantity = $('#quantity').val();
		var productRemain = $('#quantityRemain').val();
		var productId = parseInt($(this).attr('id'));
		var specificTotalProductPrice = productPrice * productQuantity;
		// console.log("Price " + specificTotalProductPrice);
		var product = {id: productId, name: productName, price: productPrice, inCart: productQuantity, photo: productPhoto};

		// check existing cartProductId
		// var cartProduct = localStorage.getItem(productId);
		// cartProduct = JSON.parse(cartProduct);
		// console.log("cartProduct:", cartProduct);
		// if (cartProduct != null) {
		// 	productQuantity = parseInt(productQuantity);
		// 	cartProduct.inCart = parseInt(cartProduct.inCart) + productQuantity;
		// 	console.log("cartProduct 2: ", cartProduct);
		// 	localStorage.setItem(productId, JSON.stringify(cartProduct));
		// }else{
		// 	localStorage.setItem(productId, JSON.stringify(product));
		// }
		cartNumbers(productQuantity);
		totalCost(specificTotalProductPrice);
		setItems(product)
		sweetAlert("Successful", "Item is added into cart!", "success");
	});

	function setItems(product){
		console.log("Inside of set items function");
		console.log("this product is ",product);
		let cartItems = localStorage.getItem('productsInCart');
		// JSON.parse = data become javaScript object
		cartItems = JSON.parse(cartItems);
		productQuantity = parseInt(product.inCart);
		productPrice = parseInt(product.price);

		if (cartItems != null) {

			if (cartItems[product.name] == undefined) {
				cartItems ={
					...cartItems,
					[product.name]: product
				}
				cartItems[product.name].inCart = productQuantity;

			}else{
				cartItems[product.name].inCart = parseInt(cartItems[product.name].inCart) + productQuantity;
				cartItems[product.name].price = parseInt(cartItems[product.name].price) + (productPrice * productQuantity); 
			}
		}else{
			product.inCart = productQuantity;
			cartItems = {
				[product.name]: product
			}
		}
		// json.stringtify = javaScript object become string
		localStorage.setItem("productsInCart", JSON.stringify(cartItems));
		
	}

	function totalCost(specificTotalProductPrice){
		// console.log("The product price is", product.price);
		let cartCost = localStorage.getItem('totalCost');
		let price = parseInt(specificTotalProductPrice);
		// console.log("my cart cost is", cartCost);
		// console.log(typeof cartCost); //show datatype

		if (cartCost != null) {
			cartCost = parseInt(cartCost);
			localStorage.setItem("totalCost", cartCost + price);
		}else{
			localStorage.setItem("totalCost", price);
		}
		
	}

	function cartNumbers(productQuantity){
		// console.log("the product is ", product);
		let productNumbers = localStorage.getItem('cartNumbers');
		productNumbers = parseInt(productNumbers);
		productQuantity = parseInt(productQuantity);

		if (productNumbers) {
			localStorage.setItem('cartNumbers', productNumbers + productQuantity);
			document.querySelector('.cta a span').textContent = productNumbers + productQuantity;
		}else{
			localStorage.setItem('cartNumbers', productQuantity);
			document.querySelector('.cta a span').textContent = productQuantity;
		}	

	}

	function onLoadCartNumbers(){
		let productNumbers = localStorage.getItem('cartNumbers'); //check localstorage 
		if (productNumbers) {
			document.querySelector('.cta a span').textContent = productNumbers; //cart number changed on nav bar
		}
	}

	var quantitiy=0;
	$('.quantity-right-plus').click(function(e){
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity').val());
            // If is not undefined
            $('#quantity').val(quantity + 1);
                // Increment
            });

	$('.quantity-left-minus').click(function(e){
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity').val());
            // If is not undefined
                // Increment
                if(quantity>0){
                	$('#quantity').val(quantity - 1);
                }
            });
	onLoadCartNumbers();
</script>
@endsection