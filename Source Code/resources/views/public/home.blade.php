@extends('layout.public')
@section("title")
    <title>Qorrah | Home</title>
    <meta name="description" content="Online Appointments Registeration system for book driving lessons">
@endsection
@section('content')
{{-- 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> --}}

<!-- Intro Banner
================================================== -->
<div class="intro-banner dark-overlay" data-background-image={{asset("assets/images/LandingCover.jpg")}}>

	<!-- Transparent Header Spacer -->
	<div class="transparent-header-spacer"></div>

	<div class="container">
		
		<!-- Intro Headline -->
		<div class="row">
			<div class="col-md-12">
				<div class="banner-headline">
					<h3>
						<strong>Hire talented trainees for any job, any time.</strong>
						<br>
						<span>The first place of talented and creatives ready for your project.</span>
					</h3>
				</div>
			</div>
		</div>
		
		<!-- Search Bar -->
		<div class="row">
			<div class="col-md-12">
				
				<form method="get" action="{{ route('jobs') }}">
					<div class="intro-banner-search-form margin-top-95">

					<!-- City Field -->
					<div class="intro-search-field">
						<label for ="intro-keywords" class="field-title ripple-effect">Where?</label>
						<select class="selectpicker default" data-selected-text-format="count" name="cities" data-live-search="true" data-size="7" title="All cites" >
									<option selected value='All'>All</option>
											<option value='Amman'>Amman</option>
											<option value='Irbid'>Irbid</option>
											<option value='Zarqa'>Zarqa</option>
											<option value='Ajloun'>Ajloun</option>
											<option value='Jerash'>Jerash</option>
											<option value='Salt'>Salt</option>
											<option value='Mafraq'>Mafraq</option>
											<option value='Karak'>Karak</option>
											<option value="Ma'an">Ma'an</option>
											<option value='Madaba'>Madaba</option>
											<option value='Tafilah'>Tafilah</option>
											<option value='Aqaba'>Aqaba</option>
						</select>
					</div>
					<!-- major Field -->
					<div class="intro-search-field">
						<label for ="intro-keywords" class="field-title ripple-effect">What major?</label>
						<select class="selectpicker default" data-selected-text-format="count" name="majors" data-live-search="true" data-size="7" title="All majors" >
									<option selected value='All'>All</option>
											@foreach($majors as $major)
											<option  value="{{$major->major}}">{{$major->major}}
											</option>
											@endforeach
						</select>
					</div>
					<!-- type Field -->
					<div class="intro-search-field">
						<label for ="intro-keywords" class="field-title ripple-effect">What type?</label>
						<select class="selectpicker default" data-selected-text-format="count" name="types" data-size="7" title="All types" >
									<option selected value='All' >All</option>
									<option value='Full time Paid'>Full time Paid</option>
									<option value='Full time Unpaid'>Full time Unpaid</option>
									<option value='Part time Paid'>Part time Paid</option>
									<option value='Part time Unpaid'>Part time Unpaid</option>
						</select>
					</div>

					<!-- Button -->
					<div class="intro-search-button">
						<button type="submit" class="button ripple-effect">Search</button>
					</div>
				</div>
					</form>
			</div>
		</div>

		<!-- Stats -->
		<div class="row">
			<div class="col-md-12">
				<ul class="intro-stats margin-top-45 hide-under-992px">
					{{-- <li>
						<strong class="counter">1,586</strong>
						<span>Jobs Posted</span>
					</li>
					<li>
						<strong class="counter">3,543</strong>
						<span>Tasks Posted</span>
					</li>
					<li>
						<strong class="counter">1,232</strong>
						<span>Freelancers</span>
					</li> --}}
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


<!-- Features Jobs -->
<div class="section gray margin-top-45 padding-top-65 padding-bottom-75"  >
	<div class="container">
		<div class="row ">
			<div class="col-xl-2" ></div>
			<div class="col-xl-8 ">
				
				<!-- Section Headline -->
				<div class="section-headline margin-top-0 margin-bottom-35">
					<h3>Recent Jobs</h3>
					<a href="{{ url('/jobs') }}" class="headline-link">Browse All Jobs</a>
				</div>
				
				<!-- Jobs Container -->
				<div class="tasks-list-container compact-list margin-top-35">
						@foreach ($positions as $position)
						<!-- Job -->
						<a href={{ route('job', ['id'=>$position->position_id]) }}  class="task-listing">
	
							<!-- Job Listing Details -->
							<div class="task-listing-details">
	
								<!-- Details -->
								<div class="task-listing-description">
									<h3 class="task-listing-title">{{"$position->name"}} </h3>
									<span>{{"$position->company_name"}}</span>
									<ul class="task-icons">
										@if (!($position->city))
										<li><i class="icon-material-outline-location-on"></i> {{"$position->company_city"}}</li>
										@else
										<li><i class="icon-material-outline-location-on"></i> {{"$position->city"}}</li>
											
										@endif
										@if ( ($date = (strtotime(date("Y-m-d"))  - strtotime(explode(" " , $position->created_at)[0]))) < 60*60*24 )
										<li><i class="icon-material-outline-access-time"></i> {{'today'}} </li>
										@else 
										<li><i class="icon-material-outline-access-time"></i> {{ round( ($date)/(60*60*24), 0, PHP_ROUND_HALF_DOWN) . 'd'}}</li>
										@endif
										<li><i class="icon-line-awesome-balance-scale"></i> {{$position->status}}</li>
									</ul>
									<div class="task-tags margin-top-15">

										@foreach (explode(',', $position['skills']) as $skill)
										<span>{{"$skill"}}</span>
										@endforeach


									</div>
								</div>
	
							</div>
	
							<div class="task-listing-bid">
								<form style="position: absolute; bottom: 15px;right: 15%;">
									@if (!(Auth::check()) )
									<button formaction="{{ route('register') }}">
										<span class="button button-sliding-icon ripple-effect">Register Now <i class="icon-material-outline-arrow-right-alt"></i></span>
									</button>
									@else 
									<button formaction={{ route('job', ['id'=>$position->position_id]) }}>
										<span class="button button-sliding-icon ripple-effect">Apply Now <i class="icon-material-outline-arrow-right-alt"></i></span>
									</button>
									@endif
								</form>
							</div>
						</a>	
						@endforeach

				</div>
				<!-- Jobs Container / End -->

			</div>
			<div class="col-xl-2" ></div>

		</div>
	</div>
</div>
<!-- Featured Jobs / End -->

<!-- Icon Boxes -->
<div class="section  padding-top-65 padding-bottom-65">
	<div class="container">
		<div class="row">

			<div class="col-xl-12">
				<!-- Section Headline -->
				<div class="section-headline centered margin-top-0 margin-bottom-5">
					<h3>How It Works?</h3>
				</div>
			</div>
			
			<div class="col-xl-4 col-md-4">
				<!-- Icon Box -->
				<div class="icon-box with-line">
					<!-- Icon -->
					<div class="icon-box-circle">
						<div class="icon-box-circle-inner">
							<i class="icon-line-awesome-lock"></i>
							<div class="icon-box-check"><i class="icon-material-outline-check"></i></div>
						</div>
					</div>
					<h3>Create an Account</h3>
					<p>Bring to the table win-win survival strategies to ensure proactive domination going forward.</p>
				</div>
			</div>

			<div class="col-xl-4 col-md-4">
				<!-- Icon Box -->
				<div class="icon-box with-line">
					<!-- Icon -->
					<div class="icon-box-circle">
						<div class="icon-box-circle-inner">
							<i class="icon-line-awesome-legal"></i>
							<div class="icon-box-check"><i class="icon-material-outline-check"></i></div>
						</div>
					</div>
					<h3>Post a Training</h3>
					<p>Efficiently unleash cross-media information without. Quickly maximize return on investment.</p>
				</div>
			</div>

			<div class="col-xl-4 col-md-4">
				<!-- Icon Box -->
				<div class="icon-box">
					<!-- Icon -->
					<div class="icon-box-circle">
						<div class="icon-box-circle-inner">
							<i class=" icon-line-awesome-trophy"></i>
							<div class="icon-box-check"><i class="icon-material-outline-check"></i></div>
						</div>
					</div>
					<h3>Get a Trainee</h3>
					<p>Obtain an adequate trainee with the perfect skills compatible with your firm.</p>
				</div>
			</div>

		</div>
	</div>
</div>
<!-- Icon Boxes / End -->


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


{{-- <!-- Counters -->
<div class="section padding-top-70 padding-bottom-75">
	<div class="container">
		<div class="row">

			<div class="col-xl-12">
				<div class="counters-container">
					
					<!-- Counter -->
					<div class="single-counter">
						<i class="icon-line-awesome-suitcase"></i>
						<div class="counter-inner">
							<h3><span class="counter">1,586</span></h3>
							<span class="counter-title">Jobs Posted</span>
						</div>
					</div>

					<!-- Counter -->
					<div class="single-counter">
						<i class="icon-line-awesome-legal"></i>
						<div class="counter-inner">
							<h3><span class="counter">3,543</span></h3>
							<span class="counter-title">Tasks Posted</span>
						</div>
					</div>

					<!-- Counter -->
					<div class="single-counter">
						<i class="icon-line-awesome-user"></i>
						<div class="counter-inner">
							<h3><span class="counter">2,413</span></h3>
							<span class="counter-title">Active Members</span>
						</div>
					</div>

					<!-- Counter -->
					<div class="single-counter">
						<i class="icon-line-awesome-trophy"></i>
						<div class="counter-inner">
							<h3><span class="counter">99</span>%</h3>
							<span class="counter-title">Satisfaction Rate</span>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
<!-- Counters / End --> --}}

   
    @endsection
 