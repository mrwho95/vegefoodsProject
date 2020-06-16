<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Vegefoods</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <!-- browser icon -->
    <link rel="shortcut icon" href="{{ asset('images/product-6.jpg') }}">

    <!-- datatables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
	
    <link rel="stylesheet" href="{{asset('css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">

    <link rel="stylesheet" href="{{asset('css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('css/ionicons.min.css')}}">

    <link rel="stylesheet" href="{{asset('css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery.timepicker.css')}}">

    
    <link rel="stylesheet" href="{{asset('css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('css/icomoon.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
  </head>
  <body class="goto-here">
		<div class="py-1 bg-primary">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
	    		<div class="col-lg-12 d-block">
		    		<div class="row d-flex">
		    			<div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						    <span class="text">+ 1235 2355 98</span>
					    </div>
					    <div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
						    <span class="text">youremail@email.com</span>
					    </div>
					    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
						    <span class="text">3-5 Business days delivery &amp; Free Returns</span>
					    </div>
				    </div>
			    </div>
		    </div>
		  </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="{{route('adminDashboard')}}">Vegefoods Admin</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
            <!-- request::is('') == url pattern -->
            <!-- request::routeIs('') == route name pattern-->
	          <li class="nav-item {{ Request::is('adminDashboard*') ? 'active' : '' }}"><a href="{{route('adminDashboard')}}" class="nav-link">Home</a></li>
	          <li class="nav-item dropdown {{ Request::is('adminProducts*') ? 'active' : '' }}">
              <a class="nav-link dropdown-toggle" href="{{route('adminProducts.index')}}" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Product</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
              	<a class="dropdown-item " href="{{route('adminProducts.index')}}">Product</a>
              	<a class="dropdown-item " href="{{route('adminProducts.create')}}">Add Product</a>
                <a class="dropdown-item " href="{{route('productTable')}}">Product Table</a>
              </div>
            </li>
	          <li class="nav-item {{ Request::is('adminCustomer*') ? 'active' : '' }}"><a href="{{route('adminCustomer')}}" class="nav-link">Customer</a></li>
	          <li class="nav-item {{ Request::is('adminPromotion*') ? 'active' : '' }}"><a href="{{route('adminPromotion')}}" class="nav-link">Promotion</a></li>
            @guest
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="{{route('login')}}" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Access</a>
                <div class="dropdown-menu" aria-labelledby="dropdown05">
                  <a class="dropdown-item {{ Request::is('login*') ? 'active' : '' }}" href="{{route('login')}}">{{ __('Login') }}</a>
                  @if (Route::has('register'))
                  <a class="dropdown-item {{ Request::is('Register*') ? 'active' : '' }}" href="{{route('register')}}">{{ __('Register') }}</a>
                  @endif
                </div>
              </li>
            @else
               <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="{{route('login')}}" id="dropdown06" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>
                <div class="dropdown-menu" aria-labelledby="dropdown06">
                  <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                </div>
              </li>
            @endguest
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->

    <div id = "app">
        <main class="">
            @yield('content')
        </main>
    </div>

    <footer class="ftco-footer ftco-section">
      <div class="container">
      	<div class="row">
      		<div class="mouse">
						<a href="#" class="mouse-icon">
							<div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
						</a>
					</div>
      	</div>
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Vegefoods</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="https://twitter.com/explore"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="https://www.facebook.com/"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="https://www.instagram.com/"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Menu</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Shop</a></li>
                <li><a href="#" class="py-2 d-block">About</a></li>
                <li><a href="#" class="py-2 d-block">Journal</a></li>
                <li><a href="#" class="py-2 d-block">Contact Us</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-4">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Help</h2>
              <div class="d-flex">
	              <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
	                <li><a href="#" class="py-2 d-block">Shipping Information</a></li>
	                <li><a href="#" class="py-2 d-block">Returns &amp; Exchange</a></li>
	                <li><a href="#" class="py-2 d-block">Terms &amp; Conditions</a></li>
	                <li><a href="#" class="py-2 d-block">Privacy Policy</a></li>
	              </ul>
	              <ul class="list-unstyled">
	                <li><a href="#" class="py-2 d-block">FAQs</a></li>
	                <li><a href="#" class="py-2 d-block">Contact</a></li>
	              </ul>
	            </div>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">Jalan Bukit Ria, Taman Bukit Mewah, 43000 Kajang, Selangor</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+03-8741 5736</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://github.com/mrwho95" target="_blank">Dennis Ngu</a>
						  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						</p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="{{asset('js/jquery.min.js')}}"></script>
  <script src="{{asset('js/jquery-migrate-3.0.1.min.js')}}"></script>
  <script src="{{asset('js/popper.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
  <script src="{{asset('js/jquery.easing.1.3.js')}}"></script>
  <script src="{{asset('js/jquery.waypoints.min.js')}}"></script>
  <script src="{{asset('js/jquery.stellar.min.js')}}"></script>
  <script src="{{asset('js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{asset('js/aos.js')}}"></script>
  <script src="{{asset('js/jquery.animateNumber.min.js')}}"></script>
  <script src="{{asset('js/bootstrap-datepicker.js')}}"></script>
  <script src="{{asset('js/scrollax.min.js')}}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="{{asset('js/google-map.js')}}"></script>
  <script src="{{asset('js/main.js')}}"></script>

  <script>
    $(document).ready(function(){

    var quantitiy=0;
       $('.quantity-right-plus').click(function(e){
            
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity').val());
            
            // If is not undefined
                
                $('#quantity').val(quantity + 1);

              
                // Increment
            
        });

         $('.quantity-left-minus').click(function(e){
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity').val());
            
            // If is not undefined
          
                // Increment
                if(quantity>0){
                $('#quantity').val(quantity - 1);
                }
        });
        
    });
  </script>

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>

    @include('sweetalert::alert')

  </body>
</html>

<script>
  $(document).ready(function(){

    $('#product_table').DataTable({
      processing: true,
      serverSide: true,
      ajax: {
        url: "{{ route('productTable') }}",
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

        $('#promo_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('adminPromotion') }}",
            },
            columns: [
            {
                data: 'name',
                name: 'name'
            },
            {
                data: 'code',
                name: 'code'
            },
            {
                data: 'discount',
                name: 'discount'
            },
            {
                data: 'expired',
                name: 'expired'
            },
            {
                data: 'availability',
                name: 'availability'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false
            }
            ]
        });

        var promo_id;
        var deletePromoUrl = '{{ route("deletePromo", ":id") }}';
        var fetchPromoUrl = '{{route("fetchPromo", ":id")}}';
        var updatePromoUrl = '{{route("updatePromo")}}';

        //fetch promotion code into modal form based on id
        $(document).on('click', '.edit', function(){
          promo_id = $(this).attr('id');
          fetchPromoUrl = fetchPromoUrl.replace(':id', promo_id);
          console.log(fetchPromoUrl);
          $.ajax({  
            url:fetchPromoUrl,  
            method:"GET",  
            data:{promo_id:promo_id},  
            dataType:"json",  
            success:function(data)  
            {  
              console.log(data);
              $('#editPromotionModal').modal('show');
              $('#name').val(data['name']);  
              $('#code').val(data['code']);
              $('#discount').val(data['discount']);
              $('#availability').val(data['availability']);
              $('#expired').val(data['expired']);
              $('#promoId').val(promo_id);    
            }  
          })  
        });

        //update promotion code
        $(document).on('submit', '#editPromotionForm', function(event){  
         event.preventDefault(); 
         console.log(updatePromoUrl);
         $.ajax({  
           url:updatePromoUrl,  
           method:'POST',  
           data:$(this).serialize(), 
           dataType:"json", 
           success:function(data)  
           {  
            console.log(data);
            $('#editPromotionModal').modal('hide');  
            $('#promo_table').DataTable().ajax.reload();
            alert('Data Updated');
          }  
        });  
       });  

        // delete promotion code
        $(document).on('click', '.delete', function(){
          promo_id = $(this).attr('id');
          deletePromoUrl = deletePromoUrl.replace(':id', promo_id);
          $('#deletePromotionModal').modal('show');
        });
        $('#deletePromotion').click(function(){
          $.ajax({
           url:deletePromoUrl,
           success:function(data)
           {
             $('#deletePromotionModal').modal('hide');
             $('#promo_table').DataTable().ajax.reload();
             alert('Data Deleted');
           }
         })
        });
      
    });
</script>