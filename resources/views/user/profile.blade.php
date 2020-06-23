@extends('layouts.vege')
@section('content')
<div class="container">
	<h3>User's Profile</h3>
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
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="shadow-lg p-3 mb-5 bg-white rounded">
				<div class="row">
					<div class="col-md-4">
						@if(empty($userData->photo))
							<img src="{{asset('images/user.jpg')}}" style="width:200px; height:200px; border-radius:50%;" alt="image" />
						@else
							<img src="{{asset('uploads/vegeFoodsPhoto/'.$userData->photo)}}" style="width:200px; height:200px; border-radius:50%;" alt="image" />
						@endif
					</div>
					<div class="col-md-8">
						<h5>{{$userData->name}}</h5>
						<p class="card-title">Email: {{$userData->email}}</p>
						<p class="card-title">Phone Number: {{$userData->phonenumber}}</p>
						<p class="card-title">Address: {{$userData->address}}</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<h4>Edit User's Profile</h4>
	<div class="card" style="padding: 5%;">
		<form action="{{route('updateProfile')}}" class="billing-form" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="row align-items-end">
			<div class="col-md-6">
				<div class="form-group">
					<label for="Name">Name</label>
					<input type="text" name="name" class="form-control" value="{{$userData->name}}" required>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="Email">Email</label>
					<input type="text" name="email" class="form-control" value="{{$userData->email}}" required>
				</div>
			</div>
			<div class="w-100"></div>
			<div class="col-md-6">
				<div class="form-group">
					<div class="form-group">
						<label for="phonenumber">Phone Number</label>
						<input type="text" name="phonenumber" class="form-control"  placeholder="Your Phone Number" required>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="address">Address</label>
					<input type="text" name="address" class="form-control" placeholder="Your Address" required>
				</div>
			</div>
			<div class="w-100"></div>
			<div class="col-md-6">
				<label for="Photo">Photo</label>
				<input type="file" name="photo" required>
			</div>
			<button type="submit" class="btn btn-primary py-3 px-4">Update</button>
		</div>
		</form>
	</div>
	
	
</div>
@endsection