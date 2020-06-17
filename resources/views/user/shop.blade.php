@extends('layouts.vege')
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
			@if(count($allProduct) > 0)
				@foreach($allProduct as $data)
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