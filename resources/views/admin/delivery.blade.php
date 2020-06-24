@extends('layouts.vegeAdmin')
@section('content')
<div class="container">
	<h3>Delivery Place</h3>
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
	<br>
	<div class="table-responsive">
        <table id="delivery_table" class="table table-bordered table-striped" style="width: 100%;">
            <thead>
                <tr>
                    <th>City / Town</th>
                    <th>State / Province</th>
                    <th>Zip / Postal Code</th>
                    <th>Country</th>
                    <th>Price (RM)</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table><br>    
    </div>
	<div class="shadow-lg p-3 mb-5 bg-white rounded" style="padding: 5%;">
		<h4>New Delivery Place</h4>
		<form action="{{route('addDelivery')}}" class="bg-white p-5 contact-form" method="POST">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<input type="text" name="city" class="form-control" placeholder="City / Town" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<input type="text" name="state" class="form-control" placeholder="State / Province" required>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<input type="text" name="postcode" class="form-control" placeholder="Zip / Postal Code" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<input type="text" name="country" class="form-control" placeholder="Country" required>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<input type="text" name="price" class="form-control" placeholder="Price" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<button type="submit" class="btn btn-primary py-3 px-5 float-right">Add</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="deleteDeliveryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Delivery Place</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p align="center" style="margin:0;">Are you sure you want to remove this data?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" id="deleteDelivery">Delete</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="editDeliveryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Delivery Place</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form method="POST" id="editDeliveryForm">
      		<input type="hidden" name="_token" value="{{ csrf_token() }}">
      		<input type="text" id="city" name="city" class="form-control" placeholder="Delivery City" required><br>
	     	<input type="text" id="state" name="state" class="form-control" placeholder="Delivery State" required><br>
	     	<input type="text" id="postcode" name="postcode" class="form-control" placeholder="Delivery Postcode" required><br>
	     	<input type="text" id="country" name="country" class="form-control" placeholder="Delivery Country" required><br>
	     	<input type="text" id="price" name="price" class="form-control" placeholder="Delivery Price" required><br>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<input type="hidden" name="deliveryId" id="deliveryId">
	        	<button type="submit" class="btn btn-primary">Update</button>
	        </div>
      	</form>
      </div>
    </div>
  </div>
</div>
@endsection