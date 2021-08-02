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
					<input type="hidden" name="newsid" class="newsid">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="text" name="title" class="form-control title" placeholder="Title" required><br>
					<textarea type="text" class="description" placeholder="News / Blogs Description" name="description" style="width: 100%; height: 150px;" required></textarea>
					<label for="newsPhoto">News / Blogs Picture</label>
					<input type="file" class="newsPhoto" class="form-control" name="newsPhoto"><br>
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
				data: 'updated_at',
				name: 'updated_at'
			},
			{
				data: 'action',
				name: 'action',
				orderable: false
			}
			]
		});


        //fetch news into modal form based on id
        $(document).on('click', '.editNews', function(){
        	var url = '{{route("fetchNews", ":id")}}';
        	var news_id = $(this).data('id');
        	url = url.replace(':id', news_id);
        	$.ajax({  
        		url:url,  
        		method:"GET",  
        		data:{id:news_id},  
        		dataType:"json",  
        		success:function(data)  
        		{  
        			console.log("data",data);
        			$('#editNewsModal').modal('show');
        			$('#editNewsForm').find('.title').val(data['title']);  
        			$('#editNewsForm').find('.description').val(data['description']);
        			$('#editNewsForm').find('.newsid').val(news_id);  
        		},
        		error: function (request, status, error) {
			        sweetAlert(request.responseText, "", 'error');
			    }
        	})  
        });

        //update news
        $(document).on('submit', '#editNewsForm', function(event){  
        	event.preventDefault();
        	// var fd = new FormData();		    
		    // var title = $(this).find('.title').val();
		    // var description = $(this).find('.description').val();

		    // console.log("file",newsPhoto);

		    
		    // var newsPhoto = $(this).find('.newsPhoto')[0].files[0].name;
		    // if (newsPhoto) {
		    // 	fd.append('newsPhoto',newsPhoto);
		    // }
		    // fd.append('title',title);
		    // fd.append('description',description);
		    // console.log("fd",newsPhoto);
		    // console.log("fd",title);


        	// var id = $(this).parents('#editNewsModal').data('id');
        	// // console.log("id",id);
        	// if (!id) { 
        	// 	sweetAlert("No Data Found", "", "error");
        	// 	$('#editNewsForm').modal('hide');
        	// 	return;
        	// }
        	// fd.append('id',id);
        	// console.log($(this).serializeArray());
        	// The serialize() method creates a URL encoded text string by serializing form values.
        	// The .serializeArray() method creates a JavaScript array of objects, ready to be encoded as a JSON string.
        	$.ajax({  
        		url:'{{ route("updateNews") }}',  
        		method:'POST',  
        		data:new FormData(this), 
        		dataType:'JSON',
			   	contentType: false,
			   	cache: false,
			   	processData: false,
        		success:function(data)  
        		{  
        			console.log("data1111",data);
        			$('#editNewsModal').modal('hide');  
        			$('#news_table').DataTable().ajax.reload();
        			sweetAlert("News / Blogs Updated", "", "success");
        			// alert('Data Updated');
        		},
        		error: function (request, status, error) {
			        sweetAlert(status, "", 'error');
			    }
        	});  
        });  

        // get id and show delete modal
        $(document).on('click', '.deleteNews', function(){
        	var news_id = $(this).data('id');
        	$('#deleteNewsModal').modal('show').attr('data-id',news_id);
        });

        // delete news / blog code
        $('#deleteNews').click(function(){
        	var id = $(this).parents('#deleteNewsModal').data('id');
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