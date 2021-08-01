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

<!-- Modal -->
<div class="modal fade" id="deleteNewsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Delete News / Blogs</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p align="center" style="margin:0;">Are you sure you want to remove this News / Blogs?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" id="deleteNews">Delete</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="editNewsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit News / Blogs</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="POST" id="editNewsForm" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					@method('PUT')
					<input type="text" name="title" class="form-control title" placeholder="Title" required><br>
					<textarea type="text" class="description" placeholder="News / Blogs Description" name="description" style="width: 100%; height: 150px;" required></textarea>
					<label for="newsPhoto">Picture</label>
					<input type="file" name="newsPhoto"><br>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary">Update</button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						{{-- <input type="hidden" name="promoId" id="promoId"> --}}
					</div>
				</form>
			</div>
		</div>
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
        $(document).on('click', '.editNews', function(){
        	var url = '{{route("fetchNews", ":id")}}';
        	var news_id = $(this).attr('id');
        	url = url.replace(':id', news_id);
        	// console.log(fetchPromoUrl);
        	$.ajax({  
        		url:url,  
        		method:"GET",  
        		data:{id:news_id},  
        		dataType:"json",  
        		success:function(data)  
        		{  
        			console.log("data",data);
        			$('#editNewsModal').modal('show').attr('data-info',news_id);
        			$('#editNewsForm').find('.title').val(data['title']);  
        			$('#editNewsForm').find('.description').val(data['description']);
        			// $('#discount').val(data['discount']);
        			// $('#availability').val(data['availability']);
        			// $('#expired').val(data['expired']);
        			// $('#promoId').val(promo_id);    
        		},
        		error: function (request, status, error) {
			        sweetAlert(request.responseText, "", 'error');
			    }
        	})  
        });

        //update promotion code
        $(document).on('submit', '#editNewsForm', function(event){  
        	event.preventDefault(); 
        	// console.log(updatePromoUrl);
        	var id = $(this).parents('#editNewsModal').data('info');
        	if (!id) { 
        		sweetAlert("No Data Found", "", "error");
        		$('#editNewsForm').modal('hide');
        		return;
        	}
        	var url = '{{ route("updateNews", ":id") }}';
        	url = url.replace(':id', id);
        	$.ajax({  
        		url:url,  
        		method:'PUT',  
        		data:$(this).serialize(), 
        		dataType:"json", 
        		success:function(data)  
        		{  
        			console.log("data",data);
        			$('#editNewsModal').modal('hide');  
        			$('#news_table').DataTable().ajax.reload();
        			sweetAlert("News / Blogs Updated", "", "success");
        			// alert('Data Updated');
        		}  
        	});  
        });  

        // get id and show delete modal
        $(document).on('click', '.deleteNews', function(){
        	var news_id = $(this).attr('id');
        	$('#deleteNewsModal').modal('show').attr('data-info',news_id);
        });

        // delete news / blog code
        $('#deleteNews').click(function(){
        	var id = $(this).parents('#deleteNewsModal').data('info');
        	if (!id) { 
        		sweetAlert("No Data Found", "", "error");
        		$('#deleteNewsModal').modal('hide');
        		return;
        	}
        	var url = '{{ route("deleteNews", ":id") }}';
        	url = url.replace(':id', id);
        	$.ajax({
        		url:url,
        		success:function(data)
        		{
        			$('#deleteNewsModal').modal('hide');
        			$('#news_table').DataTable().ajax.reload();
        			sweetAlert("Data Deleted", "Deleted successfully!", "success");
        			// alert('Data Deleted');
        		}
        	})
        });
    });
</script>
@endsection