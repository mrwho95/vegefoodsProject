@extends('layouts.vege')
@section('content')
<div class="hero-wrap hero-bread" style="background-image: url('{{asset('images/bg_1.jpg')}}');">
	<div class="container">
		<div class="row no-gutters slider-text align-items-center justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
				<p class="breadcrumbs"><span class="mr-2"><a href="{{route('home')}}">Home</a></span> <span>Contact us</span></p>
				<h1 class="mb-0 bread">Contact us</h1>
			</div>
		</div>
	</div>
</div>

<section class="ftco-section contact-section bg-light">
	<div class="container">
		<div class="row d-flex mb-5 contact-info">
			<div class="w-100"></div>
			<div class="col-md-3 d-flex">
				<div class="info bg-white p-4">
					<p><span>Address:</span> 198 West 21th Street, Suite 721 New York NY 10016</p>
				</div>
			</div>
			<div class="col-md-3 d-flex">
				<div class="info bg-white p-4">
					<p><span>Phone:</span> <a href="tel://1234567920">+ 1235 2355 98</a></p>
				</div>
			</div>
			<div class="col-md-3 d-flex">
				<div class="info bg-white p-4">
					<p><span>Email:</span> <a href="mailto:info@yoursite.com">info@yoursite.com</a></p>
				</div>
			</div>
			<div class="col-md-3 d-flex">
				<div class="info bg-white p-4">
					<p><span>Website</span> <a href="#">yoursite.com</a></p>
				</div>
			</div>
		</div>
		<div class="row block-9">
			<div class="col-md-6 order-md-last d-flex">
				<form action="#" class="bg-white p-5 contact-form">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Your Name">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Your Email">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Subject">
					</div>
					<div class="form-group">
						<textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
					</div>
					<div class="form-group">
						<input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
					</div>
				</form>
				
			</div>

			<div class="col-md-6 d-flex">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3350.4881239402102!2d101.79807895967315!3d2.9796528436433793!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd67623ac647c0f68!2sTiara%20Park%20Homes!5e0!3m2!1sen!2smy!4v1585687184280!5m2!1sen!2smy" height="470" style="border:0;" width="100%">
				</iframe>
			</div>
		</div>
	</div>
</section>
@endsection