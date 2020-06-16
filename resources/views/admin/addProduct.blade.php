@extends('layouts.vegeAdmin')
@section('content')
<div class="container">
	<h3>Add Product</h3><br>
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
	<form action="{{route('adminProducts.store')}}" class="billing-form" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<h3 class="mb-4 billing-heading">Product Details</h3>
		<div class="row align-items-end">
			<div class="col-md-6">
				<div class="form-group">
					<label for="Name">Name</label>
					<input type="text" name="name" class="form-control" placeholder="" required>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="Price">Price</label>
					<input type="text" name="price" class="form-control" placeholder="" required>
				</div>
			</div>
			<div class="w-100"></div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="Category">Category</label>
					<div class="select-wrap">
						<div class="icon"><span class="ion-ios-arrow-down"></span></div>
						<select name="category" id="" class="form-control">
							<option value="vegetable">Vegetable</option>
							<option value="fruit">Fruit</option>
							<option value="fruit juice">Fruit Juice</option>
							<option value="meat">Meat</option>
							<option value="bakery">Bakery</option>
							<option value="seafood">Seafood</option>
						</select>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="Quantity">Quantity</label>
					<input type="number" name="quantity" class="form-control" placeholder="" required>
				</div>
			</div>
			<div class="w-100"></div>
				<div class="col-md-6">
					<label for="Weight">Weight</label>
					<input type="text" name="weight" class="form-control" placeholder="" required>
				</div>
				<div class="col-md-6">
					<label for="Photo">Photo</label>
					<input type="file" name="photo" required>
				</div>
			<div class="w-100"></div>
				<div class="col-md-12">
					<textarea type="text" placeholder="Product description" name="description" style="width: 100%; height: 150px; margin-top: 50px;" required></textarea>
				</div>
			<button type="submit" class="btn btn-primary py-3 px-4">Add Product</button>
	</div>
</form><br><br>
</div>
@endsection