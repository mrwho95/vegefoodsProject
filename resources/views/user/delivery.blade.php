@extends('layouts.vege')

@section('styles')
<!-- datatables -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
@endsection

@section('content')
<div class="container">
	<h3>Delivery Place</h3><br>
	<div class="table-responsive">
		<table id="delivery_table" class="table table-bordered table-striped" style="width: 100%;">
			<thead>
				<tr>
					<th>City / Town</th>
					<th>Zip / Postal Code</th>
					<th>State / Province</th>
					<th>Country</th>
					<th>Price (RM)</th>
				</tr>
			</thead>
			<tbody>
            @foreach ($deliveryPlace as $value)
                <tr>
                    <td>{{ $value->city }}</td>
                    <td>{{ $value->postcode }}</td>
                    <td>{{ $value->state }}</td>
                    <td>{{ $value->country }}</td>
                    <td>{{ $value->price }}</td>
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
            $('#delivery_table').DataTable();
        });


	function onLoadCartNumbers(){
		let productNumbers = localStorage.getItem('cartNumbers'); //check localstorage 
		if (productNumbers) {
			document.querySelector('.cta a span').textContent = productNumbers; //cart number changed on nav bar
		}
	}

	onLoadCartNumbers();

</script>
@endsection