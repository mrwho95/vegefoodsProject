<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Vegefoods</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- browser icon -->
    <link rel="shortcut icon" href="{{ asset('images/product-6.jpg') }}">
	
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
    @yield('styles')
  </head>
  <body class="goto-here">
		<div class="py-1 bg-primary">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
	    		<div class="col-lg-12 d-block">
		    		<div class="row d-flex">
		    			<div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						    <span class="text">+03-888 8888</span>
					    </div>
					    <div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
						    <span class="text">info@vegefood.com</span>
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
	      <a class="navbar-brand" href="{{route('user.home')}}">Vegefoods</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
            <!-- request::is('') == url pattern -->
            <!-- request::routeIs('') == route name pattern-->
	          <li class="nav-item {{ Request::is('user/home*') ? 'active' : '' }}"><a href="{{route('user.home')}}" class="nav-link">Home</a></li>
	          <li class="nav-item {{ Request::is('user/about*') ? 'active' : '' }}"><a href="{{route('user.about')}}" class="nav-link">About</a></li>
	          <li class="nav-item {{ Request::is('user/contact*') ? 'active' : '' }}"><a href="{{route('user.contact')}}" class="nav-link">Contact</a></li>
            <li class="nav-item dropdown {{ Request::is('user/shop*') ? 'active' : '' }}">
              <a class="nav-link dropdown-toggle" href="{{route('user.shop')}}" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
                <a class="dropdown-item {{ Request::is('user/shop*') ? 'active' : '' }}" href="{{route('user.shop')}}">Shop</a>
                <a class="dropdown-item {{ Request::is('user/review*') ? 'active' : '' }}" href="{{route('user.review')}}">Review</a>
                <a class="dropdown-item {{ Request::is('user/wishlist*') ? 'active' : '' }}" href="{{route('user.wishlist')}}">Wishlist</a>
                <a class="dropdown-item {{ Request::is('user/cart*') ? 'active' : '' }}" href="{{route('user.cart')}}">Cart</a>
                <a class="dropdown-item {{ Request::is('user/checkout*') ? 'active' : '' }}" href="{{route('user.checkout')}}">Checkout</a>
              </div>
            </li>
            <li class="nav-item dropdown {{ Request::is('user/blog*') ? 'active' : '' }}">
              <a class="nav-link dropdown-toggle" href="{{route('user.blog')}}" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
                <a class="dropdown-item {{ Request::is('user/blog*') ? 'active' : '' }}" href="{{route('user.blog')}}">Blog</a>
                <a class="dropdown-item {{ Request::is('user/delivery*') ? 'active' : '' }}" href="{{route('user.delivery')}}">Delivery</a>
              </div>
            </li>
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
                  <a class="dropdown-item {{ Request::is('user/profile') ? 'active' : '' }}" href="{{route('user.profile')}}">My profile</a>
                  <a class="dropdown-item {{ Request::is('user/address') ? 'active' : '' }}" href="{{route('user.address.index')}}">My address</a>
                  <a class="dropdown-item {{ Request::is('user/order*') ? 'active' : '' }}" href="{{route('user.order')}}">My purchase</a>
                  <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                </div>
              </li>
            @endguest
	          <li class="nav-item cta cta-colored"><a href="{{route('user.cart')}}" class="nav-link"><span class="icon-shopping_cart">[0]</span></a></li>
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
              <p>Vegefoods mart is a rapidly growing chain of new and improved mini-markets that meets consumers needs for groceries.</p>
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
                <li><a href="{{route('user.shop')}}" class="py-2 d-block">Shop</a></li>
                <li><a href="{{route('user.about')}}" class="py-2 d-block">About</a></li>
                <li><a href="{{route('user.review')}}" class="py-2 d-block">Review</a></li>
                <li><a href="{{route('user.contact')}}" class="py-2 d-block">Contact Us</a></li>
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
	                <li><a href="{{route('user.contact')}}" class="py-2 d-block">Contact</a></li>
	              </ul>
	            </div>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">Soho Suites KLCC Soho Suites KLCC, 20, Jalan Perak, Kuala Lumpur, 50450 Wilayah Persekutuan</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">03-888 8888</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@vegefood.com</span></a></li>
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
    
  @yield('javascripts')
  @include('sweetalert::alert')
    
  </body>
</html>