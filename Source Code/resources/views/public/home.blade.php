@extends('layout.public')
@section("title")
    <title>Qorrah | {!! $manage->hometitle !!}</title>
    <meta name="description" content="{!! $manage->homedescription !!}">
 <meta name="keywords" content="{!! $manage->homekeywords !!}">

@endsection
@section('content')

<!-- Intro Banner
================================================== -->
<div class="intro-banner dark-overlay" data-background-image={{asset("assets/images/profile/$manage->homeimage")}}>

	<!-- Transparent Header Spacer -->
	<div class="transparent-header-spacer"></div>

	<div class="container">
		
		<!-- Intro Headline -->
		<div class="row">
			<div class="col-md-12">
				<div class="banner-headline" style='float:right'>

					{!! $manage->hometopdiscription !!}

				</div>
			</div>
		</div>
		
		<!-- Search Bar -->
		<div class="row">
			<div class="col-md-12">
				
				<a href="/majors">
					<button class="button  button-sliding-icon ripple-effect" style="font-size: 1.4rem ; float:right ; padding:10px 20px">تصفح التخصصات<i class="icon-material-outline-arrow-right-alt"></i></button>
				</a>
			</div>
		</div>

		<!-- Stats -->
		<div class="row">
			<div class="col-md-12">
				<ul class="intro-stats margin-top-45 hide-under-992px">

				</ul>
			</div>
		</div>

	</div>
</div>


<!-- Content
================================================== -->

<!-- Popular Job Categories -->
<div class="section margin-top-65 margin-bottom-30">
	<div class="container">
		<div class="row">

			<!-- Section Headline -->
			<div class="col-xl-12">
				<div class="section-headline centered margin-top-0 margin-bottom-45">
					<h3>All cities</h3>
				</div>
			</div>

			@foreach($cities as $city)
			<div class="col-xl-3 col-md-6">
				<!-- Photo Box -->
				<a href="/jobs?cities={{$city}}" class="photo-box small" data-background-image={{asset("assets/images/$city.jpg")}}>
					<div class="photo-box-content">
						<h3>{{$city}}</h3>
						<span></span>
					</div>
				</a>
			</div>
			@endforeach

		</div>
	</div>
</div>
<!-- Features Cities / End -->

<div class="section gray border-top padding-top-45 padding-bottom-45">
	<!-- Logo Carousel -->
	<div class="container">
		<div class="row">
			<div class="col-xl-12">
				<!-- Carousel -->
				<div class="col-md-12">
					<div class="logo-carousel">

						@foreach ($Companies as $company)
						<div class="carousel-item">
							<a href="/profile/{{$company->user_id}}"  title="{{$company->name}}"><img src={{asset("assets/images/profile/$company->image")}} alt="{{$company->name}}"> </a>
						</div>
						@endforeach
						
					
						
					</div>
				</div>
				<!-- Carousel / End -->
			</div>
		</div>
	</div>
</div>


<!-- Testimonials -->
<div class="section gray padding-top-65 padding-bottom-55">
	
	<div class="container">
		<div class="row">
			<div class="col-xl-12">
				<!-- Section Headline -->
				<div class="section-headline centered margin-top-0 margin-bottom-5">
					<h3>Testimonials</h3>
				</div>
			</div>
		</div>
	</div>

	@if (count($testimonials))
	<!-- Categories Carousel -->
	<div class="fullwidth-carousel-container margin-top-20">
		<div class="testimonial-carousel testimonials">

			@foreach ($testimonials as $testimonial)
			<!-- Item -->
			<div class="fw-carousel-review">
				<div class="testimonial-box">
					<div class="testimonial-avatar">
						<img src={{asset("assets/images/profile/$testimonial->image")}} alt={{"$testimonial->name"}}>
					</div>
					<div class="testimonial-author">
						<h4>{{"$testimonial->name"}}</h4>
						 <span>{{"$testimonial->title"}}</span>
					</div>
					<div class="testimonial">{{"$testimonial->text"}}</div>
				</div>
			</div>
			@endforeach

		</div>
	</div>
	<!-- Categories Carousel / End -->
		
	@endif


</div>
<!-- Testimonials / End -->

   
    @endsection
 