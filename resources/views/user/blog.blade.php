@extends('layouts.vege')
@section('content')
<div class="hero-wrap hero-bread" style="background-image: url('{{asset('images/bg_1.jpg')}}');">
	<div class="container">
		<div class="row no-gutters slider-text align-items-center justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
				<p class="breadcrumbs"><span class="mr-2"><a href="{{route('user.home')}}">Home</a></span></p>
				<h1 class="mb-0 bread">News / Blog</h1>
			</div>
		</div>
	</div>
</div>

<section class="ftco-section ftco-degree-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 ftco-animate">
				<div class="row">
					@if(count($blogs) > 0)
						@foreach($blogs as $blog)
							<div class="col-md-12 d-flex ftco-animate">
								<div class="blog-entry align-self-stretch d-md-flex">
									<a href="{{route('user.singleBlog')}}" class="block-20" style="background-image: url('{{asset('uploads/vegeFoodsPhoto/'.$blog->news_photo)}}');">
									</a>
									<div class="text d-block pl-md-4">
										<div class="meta mb-3">
											<div><p>{{$blog->created_at}}</p></div>
											<div><p>Admin</p></div>
											{{-- <div><p class="meta-chat"><span class="icon-chat"></span> 3</p></div> --}}
										</div>
										<h3 class="heading"><p>{{$blog->title}}</p></h3>
										<p>{{$blog->description}}</p>
										<p><a href="{{route('user.singleBlog')}}" class="btn btn-primary py-2 px-3">Read more</a></p>
									</div>
								</div>
							</div>
						@endforeach
					@else
						<h3>No News / blogs Recently</h3>
					@endif
				</div>
			</div> <!-- .col-md-8 -->
			<div class="col-lg-4 sidebar ftco-animate">
				<div class="sidebar-box">
					<form action="#" class="search-form">
						<div class="form-group">
							<span class="icon ion-ios-search"></span>
							<input type="text" class="form-control" placeholder="Search...">
						</div>
					</form>
				</div>
				<div class="sidebar-box ftco-animate">
					<h3 class="heading">Categories</h3>
					<ul class="categories">
						<li><a href="{{route('user.product', ['parameter'=>'vegetable']) }}" class="{{ Request::is('user/product/vegetable') ? 'active' : '' }}">Vegetables <span>(12)</span></a></li>
						<li><a href="{{route('user.product', ['parameter'=>'fruit']) }}" class="{{ Request::is('user/product/fruit') ? 'active' : '' }}">Fruits <span>(22)</span></a></li>
						<li><a href="{{route('user.product', ['parameter'=>'fruit juice']) }}" class="{{ Request::is('user/product/fruit juice') ? 'active' : '' }}">Fruit Juice <span>(22)</span></a></li>
						<li><a href="{{route('user.product', ['parameter'=>'meat']) }}" class="{{ Request::is('user/product/meat') ? 'active' : '' }}">Meat <span>(37)</span></a></li>
						<li><a  href="{{route('user.product', ['parameter'=>'bakery']) }}" class="{{ Request::is('user/product/bakery') ? 'active' : '' }}">Bakery <span>(42)</span></a></li>
						<li><a href="{{route('user.product', ['parameter'=>'seafood']) }}" class="{{ Request::is('user/product/seafood') ? 'active' : '' }}">Seafood <span>(42)</span></a></li>
					</ul>
				</div>

				<div class="sidebar-box ftco-animate">
					@if(count($blogs) > 0) 
						<h3 class="heading">Recent News / Blog</h3>
						@foreach($blogs as $blog)
							<div class="block-21 mb-4 d-flex">
								<a class="blog-img mr-4" style="background-image: url('{{asset('uploads/vegeFoodsPhoto/'.$blog->news_photo)}}');"></a>
								<div class="text">
									<h3 class="heading-1"><p>{{$blog->title}}</p></h3>
									<div class="meta">
										<div><p><span class="icon-calendar"></span>{{$blog->created_at}}</p></div>
										<div><p><span class="icon-person"></span> Admin</p></div>
										{{-- <div><a href="#"><span class="icon-chat"></span> 19</a></div> --}}
									</div>
								</div>
							</div>
						@endforeach
					@else
						<h3 class="heading">No Recent News / Blog</h3>
					@endif
					
				</div>
				{{-- <div class="sidebar-box ftco-animate">
					<h3 class="heading">Tag Cloud</h3>
					<div class="tagcloud">
						<a href="#" class="tag-cloud-link">fruits</a>
						<a href="#" class="tag-cloud-link">tomatoe</a>
						<a href="#" class="tag-cloud-link">mango</a>
						<a href="#" class="tag-cloud-link">apple</a>
						<a href="#" class="tag-cloud-link">carrots</a>
						<a href="#" class="tag-cloud-link">orange</a>
						<a href="#" class="tag-cloud-link">pepper</a>
						<a href="#" class="tag-cloud-link">eggplant</a>
					</div>
				</div>

				<div class="sidebar-box ftco-animate">
					<h3 class="heading">Paragraph</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
				</div>
			</div> --}}
		</div>
	</div>
</section> <!-- .section -->
@endsection

@section('javascripts')
<script type="text/javascript">
	function onLoadCartNumbers(){
		let productNumbers = localStorage.getItem('cartNumbers'); //check localstorage 
		if (productNumbers) {
			document.querySelector('.cta a span').textContent = productNumbers; //cart number changed on nav bar
		}
	}

	onLoadCartNumbers();
</script>
@endsection