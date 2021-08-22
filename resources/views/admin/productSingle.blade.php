@extends('layouts.vegeAdmin')
@section('content')
<section class="ftco-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 mb-5 ftco-animate">
				<a href="{{asset('uploads/vegeFoodsPhoto/'.$singleProduct->photo)}}" class="image-popup"><img src="{{asset('uploads/vegeFoodsPhoto/'.$singleProduct->photo)}}" class="img-fluid" alt="Colorlib Template"></a>
			</div>
			<div class="col-lg-6 product-details pl-md-5 ftco-animate">
				<h3>{{$singleProduct->name}}</h3>
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
				<p class="price"><span>RM{{$singleProduct->price}}</span></p>
				<p>{{$singleProduct->description}}</p>
				<div class="row mt-4">
					<div class="w-100"></div>
					<div class="col-md-12">
						<p style="color: #000;">{{$singleProduct->weight}} kg available in {{$singleProduct->quantity}} quantity</p>
					</div>
					
				</div>
				<p><a href="{{route('admin.products.index')}}" class="btn btn-black py-3 px-5">Back</a></p>
			</div>
		</div>
	</div>
</section>
@endsection