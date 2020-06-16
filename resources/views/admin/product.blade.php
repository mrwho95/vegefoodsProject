@extends('layouts.vegeAdmin')
@section('content')
<section class="ftco-section">
	<div class="container">
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
		@if(count($allProduct) > 0)
		<h3>Items</h3>
		@else
		<h3>Items Not Found</h3>
		@endif
		<div class="row justify-content-center">
			<div class="col-md-10 mb-5 text-center">
				<ul class="product-category">
					<li><a href="{{route('adminProducts.index')}}" class="{{ Request::is('adminProducts') ? 'active' : '' }}">All</a></li>
					<li><a href="{{route('adminVege', ['parameter'=>'vegetable']) }}" class="{{ Request::is('adminProducts/vegetable') ? 'active' : '' }}">Vegetables</a></li>
					<li><a href="{{route('adminVege', ['parameter'=>'fruit']) }}" class="{{ Request::is('adminProducts/fruit') ? 'active' : '' }}">Fruits</a></li>
					<li><a href="{{route('adminVege', ['parameter'=>'fruit juice']) }}" class="{{ Request::is('adminProducts/fruit juice') ? 'active' : '' }}">Fruit Juice</a></li>
					<li><a href="{{route('adminVege', ['parameter'=>'meat']) }}" class="{{ Request::is('adminProducts/meat') ? 'active' : '' }}">Meat</a></li>
					<li><a href="{{route('adminVege', ['parameter'=>'bakery']) }}" class="{{ Request::is('adminProducts/bakery') ? 'active' : '' }}">Bakery</a></li>
					<li><a href="{{route('adminVege', ['parameter'=>'seafood']) }}" class="{{ Request::is('adminProducts/seafood') ? 'active' : '' }}">Seafood</a></li>
				</ul>
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
							<a href="{{route('adminProducts.show', $data->id)}}" class="img-prod"><img class="img-fluid" src="{{asset('uploads/vegeFoodsPhoto/'.$data->photo)}}" alt="Colorlib Template">
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
			
			<!-- <div class="row mt-5">
				<div class="col text-center">
					<div class="block-27">
						<ul>
							<li><a href="#">&lt;</a></li>
							<li class="active"><span>1</span></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">5</a></li>
							<li><a href="#">&gt;</a></li>
						</ul>
					</div>
				</div>
			</div> -->
		</div>
	</section>
	@endsection