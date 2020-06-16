@extends('layouts.vegeAdmin')
@section('content')
<div class="container">
	<h3>Promotion</h3><br>
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
		<h4>New Promotion Code</h4>
		<form action="{{route('addPromo')}}" class="bg-white p-5 contact-form" method="POST">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<input type="text" name="name" class="form-control" placeholder="Promotion Name" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<input type="text" name="code" class="form-control" placeholder="Promotion Code" value="<?php echo substr(uniqid(), 7);?>" required>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<input type="text" name="discount" class="form-control" placeholder="Promotion Discount" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<input type="text" name="availability" class="form-control" placeholder="Promotion Availability" required>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<i class="icon_calendar"></i>
						<input type="date" name="expired" class="form-control" placeholder="Expired Date" required>
					</div>
				</div>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary py-3 px-5">Add</button>
			</div>
		</form>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="deletePromotionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Promotion Code</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p align="center" style="margin:0;">Are you sure you want to remove this data?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" id="deletePromotion">Delete</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="editPromotionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Promotion Code</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form method="POST" id="editPromotionForm">
      		<input type="hidden" name="_token" value="{{ csrf_token() }}">
      		<input type="text" id="name" name="name" class="form-control" placeholder="Promotion Name" required><br>
	     	<input type="text" id="code" name="code" class="form-control" placeholder="Promotion Code" required><br>
	     	<input type="text" id="discount" name="discount" class="form-control" placeholder="Promotion Discount" required><br>
	     	<input type="text" id="availability" name="availability" class="form-control" placeholder="Promotion Availability" required><br>
	     	<i class="icon_calendar"></i>
			<input type="date" id="expired" name="expired" class="form-control" placeholder="Expired Date" required><br>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<input type="hidden" name="promoId" id="promoId">
	        	<button type="submit" class="btn btn-primary">Update</button>
	        </div>
      	</form>
      </div>
    </div>
  </div>
</div>
@endsection