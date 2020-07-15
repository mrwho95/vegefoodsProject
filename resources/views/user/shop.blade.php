@extends('layouts.vege')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
@endsection

@section('content')
<div class="hero-wrap hero-bread" style="background-image: url('{{asset('images/bg_1.jpg')}}');">
	<div class="container">
		<div class="row no-gutters slider-text align-items-center justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
				<p class="breadcrumbs"><span class="mr-2"><a href="{{route('home')}}">Home</a></span> <span>Products</span></p>
				<h1 class="mb-0 bread">Products</h1>
			</div>
		</div>
	</div>
</div>

<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-10 mb-5 text-center">
				<ul class="product-category">
					<li><a href="{{route('shop')}}" class="{{ Request::is('shop') ? 'active' : '' }}">All</a></li>
					<li><a href="{{route('product', ['parameter'=>'vegetable']) }}" class="{{ Request::is('product/vegetable') ? 'active' : '' }}">Vegetables</a></li>
					<li><a href="{{route('product', ['parameter'=>'fruit']) }}" class="{{ Request::is('product/fruit') ? 'active' : '' }}">Fruits</a></li>
					<li><a href="{{route('product', ['parameter'=>'fruit juice']) }}" class="{{ Request::is('product/fruit juice') ? 'active' : '' }}">Fruit Juice</a></li>
					<li><a href="{{route('product', ['parameter'=>'meat']) }}" class="{{ Request::is('product/meat') ? 'active' : '' }}">Meat</a></li>
					<li><a href="{{route('product', ['parameter'=>'bakery']) }}" class="{{ Request::is('product/bakery') ? 'active' : '' }}">Bakery</a></li>
					<li><a href="{{route('product', ['parameter'=>'seafood']) }}" class="{{ Request::is('product/seafood') ? 'active' : '' }}">Seafood</a></li>
				</ul>
				@if(count($allProduct) > 0)
					
				@else
					<h3>Items Not Found</h3>
				@endif
			</div>
		</div>
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
								<a href="#" class="d-flex justify-content-center align-items-center text-center">
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
			@if(count($allProduct) > 0)
				@foreach($allProduct as $data)
					<div class="col-md-6 col-lg-3 ftco-animate">
						<div class="product">
							<a href="{{route('product', $data->id)}}" class="img-prod"><img class="img-fluid" src="{{asset('uploads/vegeFoodsPhoto/'.$data->photo)}}" alt="Colorlib Template">
								<div class="overlay"></div>
							</a>
							<div class="text py-3 pb-4 px-3 text-center">
								<h3><a href="{{route('product', $data->id)}}" id="name">{{$data->name}}</a></h3>
								<div class="d-flex">
									<div class="pricing">
										<p class="price">RM<span id="price">{{$data->price}}</span></p>
									</div>
								</div>
								<div class="bottom-area d-flex px-3">
									<div class="m-auto d-flex" id="parent_id">
										<div id="testing"></div>
										<button id="{{$data}}" class="add-to-cart d-flex justify-content-center align-items-center text-center">
											<span><i class="ion-ios-cart"></i></span>
										</button>
										<!-- <a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
											<span><i class="ion-ios-menu"></i></span>
										</a> -->
										<button class="heart d-flex justify-content-center align-items-center ">
											<span><i class="ion-ios-heart"></i></span>
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				@endforeach
				{{ $allProduct->links() }}
			@else
				
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
<script type="text/javascript">

console.log('Running');

// let carts = document.querySelectorAll('.add-to-cart');
// console.log(carts.length);
$('.add-to-cart').click(function(){

	// var product_id = $(this).attr('id');
	var productData = $(this).attr('id');
	productData = JSON.parse(productData);
	// var testing_id = $(this).prev().attr('id');
	// var parent_id = $(this).closest('div').attr('id');
	console.log("product:" + productData);
	// console.log("testing_id:" + testing_id);
	// console.log("parent_id:" + parent_id);
	//console.log(this); //show tag and attribute information
	//insert data into localstorage
	var product = {id: productData.id, name: productData.name, price: productData.price, inCart: 0, photo: productData.photo};
	console.log("product selected:" + JSON.stringify(product));
	cartNumbers();
	totalCost(product.price);
	setItems(product);
	sweetAlert("Successful", "Item is added into cart!", "success");
})

// for (let i = 0; i < carts.length; i++){
// 	// console.log('Looping');
// 	carts[i].addEventListener('click', () => {
// 		// console.log("added to cart");
// 		cartNumbers(products[i]);
// 		totalCost(products[i]);
// 	})
// }

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

function setItems(product){
	console.log("Inside of set items function");
	console.log("this product is ",product);
	let cartItems = localStorage.getItem('productsInCart');
	// JSON.parse = data become javaScript object
	cartItems = JSON.parse(cartItems);

	if (cartItems != null) {

		if (cartItems[product.name] == undefined) {
			cartItems ={
				...cartItems,
				[product.name]: product
			}
		}else{
			cartItems[product.name].price += product.price;
		}
		cartItems[product.name].inCart += 1;
	}else{
		product.inCart = 1;
		cartItems = {
			[product.name]: product
		}
	}
	// json.stringtify = javaScript object become string
	localStorage.setItem("productsInCart", JSON.stringify(cartItems));
	
}

function totalCost(productPrice){
	// console.log("The product price is", product.price);
	let cartCost = localStorage.getItem('totalCost');
	let price = parseInt(productPrice);
	
	// console.log("my cart cost is", cartCost);
	// console.log(typeof cartCost); //show datatype

	if (cartCost != null) {
		cartCost = parseInt(cartCost);
		localStorage.setItem("totalCost", cartCost + price);
	}else{
		localStorage.setItem("totalCost", price);
	}
	
}

onLoadCartNumbers();

</script>
@endsection