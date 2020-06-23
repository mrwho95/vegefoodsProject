@extends('layouts.vege')
@section('content')
<div class="container">
	<h3>Add New Address</h3><br>
	<div class="card" style="padding: 5%;">
		<form action="{{route('address.store')}}" class="billing-form" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="row align-items-end">
			<div class="col-md-6">
				<div class="form-group">
					<label for="fullname">Full Name</label>
					<input type="text" name="fullname" class="form-control" placeholder="Receiver's Name" required>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="phonenumber">Phone Number</label>
					<input type="text" name="phonenumber" class="form-control" placeholder="Receiver's Phone Number" required>
				</div>
			</div>
			<div class="w-100"></div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="streetaddress">Street Address</label>
						<input type="text" name="streetaddress1" class="form-control" placeholder="House number and street name" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<input type="text" name="streetaddress2" class="form-control" placeholder="Appartment, suite, unit etc: (optional)">
					</div>
				</div>
				<div class="w-100"></div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="towncity">Town / City</label>
						<input type="text" name="city" class="form-control" placeholder="" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="postcodezip">Postcode / ZIP *</label>
						<input type="text" name="postcode" class="form-control" placeholder="" required>
					</div>
				</div>
				<div class="w-100"></div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="state">State</label>
						<input type="text" name="state" class="form-control" placeholder="" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="country">Country</label>
						<div class="select-wrap">
							<div class="icon"><span class="ion-ios-arrow-down"></span></div>
							<select name="country" class="form-control" value="Malaysia">
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
							<label class="mr-3"><input type="checkbox" name="defaultaddress" value="1"> Set as default address</label>
						</div>
					</div>
				</div>
			<button type="submit" class="btn btn-primary py-3 px-4">Submit</button>
		</div>
		</form>
	</div><br>

</div>
@endsection