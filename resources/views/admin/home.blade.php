@extends('layouts.vegeAdmin')

@section('styles')
<!-- chartJs -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
@endsection

@section('content')
<div class="container">
	<h1>Dashboard</h1>
	<h4>Customer's Purchase</h4>
	<div class="row">
		<div class="col-lg-6">
			<div class="shadow-lg p-3 mb-5 bg-white rounded">
				<h5>Vegetables</h5>
					<!-- Chart's container -->
    			<div id="vegetableChart" style="height: 300px;"></div>
			</div>
		</div>
		<div class="col-lg-6">
			<div class="shadow-lg p-3 mb-5 bg-white rounded">
				<h5>Bakery</h5>
				<!-- Chart's container -->
	    		<div id="bakeryChart" style="height: 300px;"></div>
	    	</div>
		</div>
	</div><br><br>
	
	<div class="row">
		<div class="col-lg-6">
			<div class="shadow-lg p-3 mb-5 bg-white rounded">
				<h5>Fruit</h5>
				<!-- Chart's container -->
	    		<div id="fruitChart" style="height: 300px;"></div>
	    	</div>
		</div>
		<div class="col-lg-6">
			<div class="shadow-lg p-3 mb-5 bg-white rounded">
				<h5>Fruit Juice</h5>
				<!-- Chart's container -->
	    		<div id="fruitJuiceChart" style="height: 300px;"></div>
	    	</div>
		</div>
	</div><br><br>

	<div class="row">
		<div class="col-lg-6">
			<div class="shadow-lg p-3 mb-5 bg-white rounded">
				<h5>Meat</h5>
				<!-- Chart's container -->
	    		<div id="meatChart" style="height: 300px;"></div>
	    	</div>
		</div>
		<div class="col-lg-6">
			<div class="shadow-lg p-3 mb-5 bg-white rounded">
				<h5>Seafood</h5>
				<!-- Chart's container -->
	    		<div id="seafoodChart" style="height: 300px;"></div>
	    	</div>
		</div>
	</div><br><br>
	


</div>
@endsection

@section('javascripts')
 <!-- Charting library -->
    <script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
    <!-- Chartisan -->
    <script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>
    <!-- Your application script -->
    <script> 
   	const vegetableChart = new Chartisan({
        el: '#vegetableChart',
        url: "@chart('product_chart')",
        loader: {
		    size: [30, 30],
		    type: 'bar',
		    text: 'Loading some chart data...',
		  },
		error: {
		    color: '#ff00ff',
		    size: [30, 30],
		    text: 'Yarr! There was an error...',
		    textColor: '#ffff00',
		    type: 'general',
		    debug: true,
		  },
      });

      const meatChart = new Chartisan({
        el: '#meatChart',
        url: "@chart('meat_chart')",
      });

      const fruitChart = new Chartisan({
        el: '#fruitChart',
        url: "@chart('fruit_chart')",
      });

      const fruitJuiceChart = new Chartisan({
        el: '#fruitJuiceChart',
        url: "@chart('fruitjuice_chart')",
      });

      const seafoodChart = new Chartisan({
        el: '#seafoodChart',
        url: "@chart('seafood_chart')",
      });

      const bakeryChart = new Chartisan({
        el: '#bakeryChart',
        url: "@chart('bakery_chart')",
      });
    </script>
@endsection