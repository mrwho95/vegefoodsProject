@extends('layouts.vege')
@section('content')
<div class="container">
	<h3>Edit Address</h3><br>
	<div class="card" style="padding: 5%;">
		<form action="{{route('user.address.update', $address->id)}}" class="billing-form" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		@method('PUT')
		<div class="row align-items-end">
			<div class="col-md-6">
				<div class="form-group">
					<label for="fullname">Full Name</label>
					<input type="text" name="fullname" class="form-control" value="{{$address->fullname}}" required>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="phonenumber">Phone Number</label>
					<input type="text" name="phonenumber" class="form-control" value="{{$address->phonenumber}}" required>
				</div>
			</div>
			<div class="w-100"></div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="streetaddress">Street Address</label>
						<input type="text" name="streetaddress1" class="form-control" placeholder="House number and street name" value="{{$address->streetaddress1}}" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<input type="text" name="streetaddress2" class="form-control" placeholder="Appartment, suite, unit etc: (optional)" value="{{$address->streetaddress2}}">
					</div>
				</div>
				<div class="w-100"></div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="towncity">Town / City</label>
						<input type="text" name="city" class="form-control" value="{{$address->city}}" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="postcodezip">Postcode / ZIP *</label>
						<input type="text" name="postcode" class="form-control" value="{{$address->postcode}}" required>
					</div>
				</div>
				<div class="w-100"></div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="state">State</label>
						<input type="text" name="state" class="form-control" value="{{$address->state}}" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="country">Country</label>
						<div class="select-wrap">
							<div class="icon"><span class="ion-ios-arrow-down"></span></div>
							<select name="country" class="form-control" value="{{$address->country}}">
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
				<div class="w-100"></div>
				<div class="col-md-12">
					<div class="form-group mt-4">
						<div class="radio">
							@if($address->defaultaddress == "1")
								<label class="mr-3"><input type="checkbox" name="defaultaddress" value="{{$address->defaultaddress}}" checked> Set as default address</label>
							@else
								<label class="mr-3"><input type="checkbox" name="defaultaddress" value="{{$address->defaultaddress}}"> Set as default address</label>
							@endif
						</div>
					</div>
				</div>
			<button type="submit" class="btn btn-primary py-3 px-4">Update</button>
		</div>
		</form>
	</div><br>

</div>
@endsection

@section('javascripts')
<script type="text/javascript">
	function onLoadCartNumbers(){
		let productNumbers = localStorage.getItem('cartNumbers'); //check localstorage 
		if (productNumbers) {
			document.querySelector('.cta a span').textContent = productNumbers; //cart number changed on nav bar
		}
	}

	onLoadCartNumbers();
</script>
@endsection