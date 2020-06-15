@extends('layouts.vegeAdmin')
@section('content')
<div class="container">
	<h3>Promotion</h3><br>
	<div class="table-responsive">
        <table id="promo_table" class="table table-bordered table-striped" style="width: 100%;">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Discount</th>
                    <th>Expired</th>
                    <th>Availability</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table><br>    
    </div>
	<div class="card" style="padding: 5%;">
		@if(session('success'))
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				{{session('success')}}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				</button>
			</div><br>
		@endif
		<h4>New Promotion Code</h4>
		<form action="{{route('addPromo')}}" class="bg-white p-5 contact-form" method="POST">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<input type="text" name="name" class="form-control" placeholder="Promotion Name">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<input type="text" name="code" class="form-control" placeholder="Promotion Code" value="<?php echo substr(uniqid(), 7);?>">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<input type="text" name="discount" class="form-control" placeholder="Promotion Discount">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<input type="text" name="availability" class="form-control" placeholder="Promotion Availability">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<i class="icon_calendar"></i>
						<input type="date" name="expired" class="form-control" placeholder="Expired Date">
					</div>
				</div>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary py-3 px-5">Add</button>
			</div>
		</form>
	</div>
</div>
@endsection