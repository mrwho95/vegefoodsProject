@extends('layouts.vege')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6">
			@if(count($addresses) > 0 )
				<h3>My Address</h3>
			@else
				<h3>No Address</h3>
			@endif
		</div>
		<div class="col-md-6">
			<a href="{{route('address.create')}}" class="btn btn-primary float-right">Add New Address</a>
		</div>
	</div>
	
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
	<hr>
	@if(count($addresses) > 0)
		@foreach($addresses as $data)
			<div class="row justify-content-center">
				<div class="col-md-9">
					<div class="shadow-lg p-3 mb-5 bg-white rounded">
						<div class="row">
							<div class="col-md-4">
								<p class="card-title">Full Name</p>
								<p class="card-title">Phone</p>
								<p class="card-title">Address</p>
							</div>
							<div class="col-md-4">
								<p class="card-text">{{$data->fullname}}</p>
								<p class="card-text">{{$data->phonenumber}}</p>
								<p class="card-text">{{$data->streetaddress1}} {{$data->streetaddress2}}, {{$data->city}}, {{$data->postcode}} {{$data->state}}, {{$data->country}}</p>
							</div>
							<div class="col-md-4">
								@if($data->defaultaddress == "1")
									<p class="card-title float-right"><strong>Default Address</strong></p><br>
								@else
									<a href="#" class="btn btn-info float-right">Set As Default Address</a><br><br>
								@endif
								<a href="{{route('address.edit', $data->id)}}" class="btn btn-warning float-right">Edit Address</a><br><br>
								<a href="{{route('addressDestroy', $data->id)}}" class="btn btn-danger float-right">Delete Address</a>
							</div>
						</div>
					</div>
				</div>
			</div><hr>
		@endforeach
	@else
		
	@endif
	
</div>
@endsection