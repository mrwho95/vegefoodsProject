@extends('layouts.vegeAdmin')

@section('styles')
<!-- datatables -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
@endsection

@section('content')
<div class="container">
	<h3>Product Datatable</h3><br>
	<a href="{{route('admin.products.create')}}" class="btn btn-primary">Add Product</a><br><br>
	@if(session('success'))
	<div class="alert alert-success alert-dismissible fade show" role="alert">
		{{session('success')}}
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div><br>
	@endif
	@if(session('warning'))
	<div class="alert alert-warning alert-dismissible fade show" role="alert">
		{{session('warning')}}
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div><br>
	@endif
	<div class="table-responsive">
		<table id="product_table" class="table table-bordered table-striped" style="width: 100%;">
			<thead>
				<tr>
					<th>Photo</th>
					<th>Name</th>
					<th>Price</th>
					<th>Weight</th>
					<th>Category</th>
					<th>Quantity</th>
					<th>Description</th>
					<th>Action</th>
				</tr>
			</thead>
		</table><br>    
	</div>
</div>
@endsection

@section('javascripts')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
<script>
	$(document).ready(function (){
		$('#product_table').DataTable({
			processing: true,
			serverSide: true,
			ajax: {
				url: "{{ route('admin.productTable') }}",
			},
			columns: [
			{
				data: 'photo',
				name: 'photo'
			},
			{
				data: 'name',
				name: 'name'
			},
			{
				data: 'price',
				name: 'price'
			},
			{
				data: 'weight',
				name: 'weight'
			},
			{
				data: 'category',
				name: 'category'
			},
			{
				data: 'quantity',
				name: 'quantity'
			},
			{
				data: 'description',
				name: 'description'
			},
			{
				data: 'action',
				name: 'action',
				orderable: false
			}
			]
		});
	});
</script>
@endsection()