@extends('layouts.vegeAdmin')

@section('styles')
<!-- datatables -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
@endsection

@section('content')
<div class="container">
	<h3>Customer's Order</h3>
	<div class="table-responsive">
		<table id="order_table" class="table table-bordered table-striped" style="width: 100%;">
			<thead>
				<tr>
					<th>Customer</th>
					<th>Phone Number</th>
					<th>Address</th>
					<th>Order Code</th>
					<th>Product</th>
					<th>Wish Quantity</th>
					<th>Price</th>
					<th>Delivery Fee</th>
					<th>Discount</th>
					<th>Total Cost</th>
					<th>Status</th>
                    <th>Created At</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
            @foreach ($order as $elements)
                <tr>
                    <td>{{ $elements['fullname'] }}</td>
                    <td>{{ $elements['phonenumber'] }}</td>
                    <td>{{ $elements['address'] }}</td>
                    <td>{{ $elements['orderunique_id'] }}</td>
                    <td>
                    	@foreach($elements['orderdetails'] as $key => $data)
							<p>{{$data['productName']}}</p><br>
                    	@endforeach
                    </td>
                    <td>
                    	@foreach($elements['orderdetails'] as $key => $data)
							<p>{{$data['wishQuantity']}}</p><br>
                    	@endforeach
                    </td>
                    <td>
                    	@foreach($elements['orderdetails'] as $key => $data)
							<p>{{$data['productPrice']}}</p><br>
                    	@endforeach
                    </td>
                    <td>{{ $elements['delivery'] }}</td>
                    <td>
                    	@if(empty($elements['discount']))
                    		<p>0</p>
                    	@else
							{{$elements['discount']}}
                    	@endif
                	</td>
                    <td>{{ $elements['totalprice'] }}</td>
                    <td>{{ $elements['status'] }}</td>
                    <td>{{ $elements['created_at']}}</td>
					<td><button class="btn btn-warning btn-sm">Update</button>&nbsp;&nbsp;&nbsp;<button class="btn btn-danger btn-sm">Delete</button></td>
                </tr>
            @endforeach
            </tbody>
		</table><br>    
	</div>
</div>
@endsection

@section('javascripts')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
<script>
	$(document).ready( function () {
            $('#order_table').DataTable();
        });

</script>
@endsection