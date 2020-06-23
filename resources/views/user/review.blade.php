@extends('layouts.vege')
@section('content')
<section class="ftco-section testimony-section">
	<div class="container">
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
		<div class="row justify-content-center mb-5 pb-3">
			<div class="col-md-7 heading-section ftco-animate text-center">
				<span class="subheading">Testimony</span>
				<h2 class="mb-4">Our satisfied customer says</h2>
				<!-- <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p> -->
			</div>
		</div>
		<div class="row ftco-animate">
			<div class="col-md-12">
				<div class="carousel-testimony owl-carousel">
					@if(count($reviews) > 0)
						@foreach($reviews as $data)
							<div class="item">
								<div class="testimony-wrap p-4 pb-5">
									 @foreach($user as $key => $value)
			                            @if($data->user_id == $value['id'])
			                                @if(empty($value['photo']))
											<div class="user-img mb-5" style="background-image: url('{{asset('images/user.jpg')}}')">
											@else
											<div class="user-img mb-5" style="background-image: url('{{asset('uploads/vegeFoodsPhoto/'.$value['photo'])}}')">
											@endif
			                            @endif
			                        @endforeach
										<span class="quote d-flex align-items-center justify-content-center">
											<i class="icon-quote-left"></i>
										</span>
									</div>
									<div class="text text-center">
										<span class="position">{{$data->name}}</span>
										<p class="name">{{$data->product}}</p>
										<p class="mb-5 pl-4 line">{{$data->message}}</p>	
									</div>
								</div>
							</div>
						@endforeach
					@else
						<div class="item">
							No Review
						</div>
					@endif
				</div>
			</div>
		</div>
	</div>
</section>

<div class="container">
	<h3>Add Vegefood Review</h3><br>
	<form action="{{route('addReview')}}" class="billing-form" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="row align-items-end">
			@if(!empty($userData))
			<div class="col-md-6">
				<div class="form-group">
					<label for="Name">Name</label>
					<input type="text" name="name" class="form-control" value="{{$userData->name}}" required>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="Email">Email</label>
					<input type="text" name="email" class="form-control" value="{{$userData->email}}" required>
				</div>
			</div>
			@else
			<div class="col-md-6">
				<div class="form-group">
					<label for="Name">Name</label>
					<input type="text" name="name" class="form-control" placeholder="Your Name" required>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="Email">Email</label>
					<input type="text" name="email" class="form-control" placeholder="Your Email" required>
				</div>
			</div>
			@endif
			<div class="w-100"></div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="Product">Product</label>
					<div class="select-wrap">
						<div class="icon"><span class="ion-ios-arrow-down"></span></div>
						<select name="product" id="" class="form-control">
							@foreach($products as $value)
							<option value="{{$value->name}}">{{$value->name}}</option>
							@endforeach
						</select>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="Rating">Rating</label>
					<input type="number" name="rating" class="form-control" min="0" max="5" placeholder="Your Rating" required>
				</div>
			</div>
			<div class="w-100"></div>
				<div class="col-md-12">
					<textarea type="text" placeholder="Review Message" name="message" style="width: 100%; height: 150px; margin-top: 50px;" required></textarea>
				</div>
			<button type="submit" class="btn btn-primary py-3 px-4">Submit Review</button>
	</div>
</form><br><br>
</div>
@endsection