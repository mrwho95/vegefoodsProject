@extends('layouts.vegeAdmin')

@section('styles')
<!-- datatables -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">

<!-- sweetAlert2 -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

@endsection

@section('content')
<div class="container">
	<h3>News / Blogs</h3><br>
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
	<div class="table-responsive" style="margin-bottom: 20px;">
		<table id="news_table" class="table table-bordered table-striped" style="width: 100%;">
			<thead>
				<tr>
					<th>News / Blogs</th>
					<th>Title</th>
					<th>Description</th>
					<th>Date Time</th>
					<th>Action</th>
				</tr>
			</thead>
		</table>    
	</div>
	<div class="card" style="padding: 5%;">
		<h4>Add News / Blogs</h4>
		<form action="{{route('addNews')}}" class="bg-white p-5 contact-form" method="POST" enctype="multipart/form-data">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<input type="text" name="title" class="form-control" placeholder="News / Blogs Title" required>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<label for="newsPhoto">Picture</label>
					<input type="file" name="newsPhoto">
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<textarea type="text" placeholder="News / Blogs Description" name="description" style="width: 100%; height: 150px; margin-top: 50px;" required></textarea>
				</div>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary py-3 px-5">Add</button>
			</div>
		</form>
	</div>
</div>

@endsection

@section('javascripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
<script>
	$(document).ready(function (){
		$('#news_table').DataTable({
			processing: true,
			serverSide: true,
			ajax: {
				url: "{{ route('adminNews') }}",
			},
			columns: [
			{
				data: 'News / Blogs',
				name: 'News / Blogs'
			},
			{
				data: 'title',
				name: 'title'
			},
			{
				data: 'description',
				name: 'description'
			},
			{
				data: 'created_at',
				name: 'created_at'
			},
			{
				data: 'action',
				name: 'action',
				orderable: false
			}
			]
		});

		// var promo_id;
		// var updatePromoUrl = '{{route("updatePromo")}}';

        //fetch promotion code into modal form based on id
        // $(document).on('click', '.editPromo', function(){
        // 	var fetchPromoUrl = '{{route("fetchPromo", ":id")}}';
        // 	promo_id = $(this).attr('id');
        // 	fetchPromoUrl = fetchPromoUrl.replace(':id', promo_id);
        // 	console.log(fetchPromoUrl);
        // 	$.ajax({  
        // 		url:fetchPromoUrl,  
        // 		method:"GET",  
        // 		data:{promo_id:promo_id},  
        // 		dataType:"json",  
        // 		success:function(data)  
        // 		{  
        // 			console.log(data);
        // 			$('#editPromotionModal').modal('show');
        // 			$('#name').val(data['name']);  
        // 			$('#code').val(data['code']);
        // 			$('#discount').val(data['discount']);
        // 			$('#availability').val(data['availability']);
        // 			$('#expired').val(data['expired']);
        // 			$('#promoId').val(promo_id);    
        // 		}  
        // 	})  
        // });

        //update promotion code
        // $(document).on('submit', '#editPromotionForm', function(event){  
        // 	event.preventDefault(); 
        // 	console.log(updatePromoUrl);
        // 	$.ajax({  
        // 		url:updatePromoUrl,  
        // 		method:'POST',  
        // 		data:$(this).serialize(), 
        // 		dataType:"json", 
        // 		success:function(data)  
        // 		{  
        // 			console.log(data);
        // 			$('#editPromotionModal').modal('hide');  
        // 			$('#promo_table').DataTable().ajax.reload();
        // 			sweetAlert("Data Edited", "Data is edited successfully!", "success");
        // 			// alert('Data Updated');
        // 		}  
        // 	});  
        // });  

        // delete promotion code
        // var deletePromoUrl; 
        // $(document).on('click', '.deletePromo', function(){
        // 	deletePromoUrl = '{{ route("deletePromo", ":id") }}';
        // 	promo_id = $(this).attr('id');
        // 	deletePromoUrl = deletePromoUrl.replace(':id', promo_id);
        // 	$('#deletePromotionModal').modal('show');
        // });
        // $('#deletePromotion').click(function(){
        // 	$.ajax({
        // 		url:deletePromoUrl,
        // 		success:function(data)
        // 		{
        // 			$('#deletePromotionModal').modal('hide');
        // 			$('#promo_table').DataTable().ajax.reload();
        // 			sweetAlert("Data Deleted", "Data is deleted successfully!", "success");
        // 			// alert('Data Deleted');
        // 		}
        // 	})
        // });
    });
</script>
@endsection