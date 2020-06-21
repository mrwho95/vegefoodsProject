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
		<!-- <div class="row d-flex mb-5 contact-info">
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
		</div> -->
		<div class="row block-9">
			<div class="col-md-6 order-md-last d-flex">
				<form action="{{route('storeMessage')}}" class="bg-white p-5 contact-form">
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
					<div class="form-group">
						<input type="text" class="form-control" name="name" placeholder="Your Name" required>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="email" placeholder="Your Email" required>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="subject" placeholder="Subject" required>
					</div>
					<div class="form-group">
						<textarea name="message" cols="30" rows="7" class="form-control" placeholder="Message" required></textarea>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary py-3 px-5">Send Message</button>
					</div>
				</form>
				
			</div>

			<div class="col-md-6 d-flex">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.7753931271527!2d101.70778751444668!3d3.1538394540040637!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc37e14b0574d3%3A0x8937035ed7cfab33!2sSoho%20Suites%20KLCC!5e0!3m2!1sen!2smy!4v1592662395588!5m2!1sen!2smy" width="100%" height="600" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0">
                </iframe>
			</div>
		</div>
	</div>
</section>
@endsection