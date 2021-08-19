@extends('layouts.vege')
@section('content')
<div class="container">
	<h3>My Purchases</h3><br>
	@if(count($order) > 0)
		@foreach($order as $elements)
		<div class="shadow-lg p-3 mb-5 bg-white rounded">
			<div style="padding: 0 5%;">
				<div class="row justify-content-between">
					<div class="col-lg-4">
						<p>Booking Code: <strong>{{$elements['orderunique_id']}}</strong></p>
					</div>
					<div class="col-lg-4">
						<p class="float-right">Status: <strong>{{$elements['status']}}</strong></p>
					</div>
				</div>
				@foreach($elements['orderdetails'] as $data)
				<div class="row">
					<div class="col-lg-3">
						@foreach($product as $productData)
							@if($data['product_id'] == $productData->id)
								<img class="d-block w-100" src="{{asset('uploads/vegeFoodsPhoto/'.$productData->photo)}}" alt="First slide" style="width: 50px; height: 150px;">
							@endif
						@endforeach
					</div>
					<div class="col-lg-3">
						<h5 class="card-title">Item:</h5>
						<h5 class="card-title">Quantity:</h5>
					</div>
					<div class="col-lg-3">
						<h5 class="card-text">{{$data->productName}}</h5>
						<h5 class="card-text">{{$data->wishQuantity}}</h5>
					</div>
					<div class="col-lg-3">
						<h4 class="card-text" style="color: #1f7a1f">RM{{$data->productPrice}}</h4>
					</div>
				</div><hr>
				@endforeach
				<div class="row justify-content-between">
					<div class="col-lg-4">

					</div>
					<div class="col-lg-4">
						 <h5>Delivery Fee: RM{{$elements['delivery']}}</h5>
					</div>
				</div>
				<div class="row justify-content-between">
					<div class="col-lg-8">
						 <a href="{{route('shop')}}" class="btn btn-primary py-2 px-3">Buy Again</a>
						 <a href="{{route('shop')}}" class="btn btn-primary py-2 px-3">Check Delivery</a>
					</div>
					<div class="col-lg-4">
						 <strong style="font-size: 20pt; color: #1f7a1f">Total Cost: RM{{$elements['totalprice']}}</strong><br>
					</div>
				</div>
			</div>
		</div>
		@endforeach
	@else
		<p>No order is taken place...</p>
	@endif
	
</div>
@endsection