@extends('layout.public')
@section("title")
<title>Qorrah | Trainees</title>
<meta name="description" content="Online Appointments Registeration system for book driving lessons">

<style>
	#wrapper {
		padding-top: 0 !important;
	}
</style>

@endsection
@section('content')

<!-- Spacer -->
<div class="margin-top-90"></div>
<!-- Spacer / End-->

<!-- Page Content
================================================== -->
<div class="full-page-container">

	<div class="full-page-sidebar">
		<div class="full-page-sidebar-inner" data-simplebar>

			<!-- all Button / End-->
			<form method="get" action="{{ route('trainees') }}">
				<div class="sidebar-container">
					<!-- City Field -->
					<div class="sidebar-widget">
						<h3>city</h3>
						<select class="selectpicker default" data-selected-text-format="count" name="city" data-live-search="true" data-size="7" title="All cites">
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
					<div class="sidebar-widget">
						<h3>Major</h3>
						<select class="selectpicker default" data-selected-text-format="count" name="major" data-live-search="true" data-size="7" title="All ">
							<option selected value='All'>All</option>
							@foreach($majors as $major)
							<option value="{{$major->major_id}}">{{$major->major}}
							</option>
							@endforeach
						</select>
					</div>
					<!-- type Field -->
					<div class="sidebar-widget">
						<h4>Skill</h4>
						<input type="text" class="with-border" name="skill" id="skill" placeholder="All" value="{{ old('skill') }}">
						@if ($errors->has('skill'))
						<div class="text-danger">{{ $errors->first('skill') }}</div>
						@endif

					</div>

				</div>
				<!-- Sidebar Container / End -->

				<!-- Search Button -->
				<div class="sidebar-search-button-container center">
					<a href="{{ url('/trainees') }}" ><span class="button ripple-effect margin-top-20">All Trainees</span></a>
					<button type="submit" class="button ripple-effect">Search</button>

				</div>
				<!-- Search Button / End-->

			</form>
		</div>
	</div>
	<!-- Full Page Sidebar / End -->

	<!-- Full Page Content -->
	<div class="full-page-content-container" data-simplebar>
		<div class="full-page-content-inner">

			<h3 class="page-title">{{count($trainees)}} Results</h3>

			<div class="listings-container grid-layout margin-top-35">
				@foreach ($trainees as $trainee)

				<!-- Job Listing -->

				@if (!(Auth::check()) || (Auth::user()->type != 'admin' && Auth::user()->type != 'company' && Auth::id() != $trainee->user_id ) ) 	
					<a href="" class="job-listing inactiveLink">
						@else 
						<a href={{ route('profile', ['id'=>$trainee->user_id]) }} class="job-listing">
				@endif


					<!-- Job Listing Details -->
					<div class="job-listing-details">
						<!-- Logo -->
						<div class="job-listing-company-logo">
							<img src={{asset("assets/images/profile/$trainee->image")}} alt="{{$trainee->name}}">
						</div>

						<!-- Details -->
						<div class="job-listing-description">
							<h4 class="job-listing-company">{{$trainee->name}}</h4>
							<h3 class="job-listing-title">{{$trainee->title}}</h3>
						</div>
					</div>

					<!-- Job Listing Footer -->
					<div class="job-listing-footer">
						<ul>
							<li><i class="icon-material-outline-location-on"></i> {{$trainee->city}}</li>
							<li><i class="icon-material-outline-business-center"></i> {{$trainee->major}}</li>

						</ul>
					</div>
				</a>
				@endforeach

				@if (count($trainees ) <1)

							<!-- No Job Listing -->
							<a href={{ route('trainees') }} class="job-listing">

								<!-- No Job Listing Details -->
								<div class="job-listing-details">
									<!-- Logo -->
									<div class="job-listing-company-logo">
									</div>
			
									<!-- Details -->
									<div class="job-listing-description">
										<h4 class="job-listing-company">No trainees with this search</h4>
										<h3 class="job-listing-title">See all</h3>


									</div>
								</div>
			
								<!-- Job Listing Footer -->
								<div class="job-listing-footer">
									<ul>			
									</ul>
								</div>
							</a>
					
				@endif

			</div>

			@if (count($trainees ) > 4)
			<div class="pagination-block">
				{{ $trainees->appends(request()->input())->links('layout.paginationlinks') }}

			</div>
			@endif

		</div>
	</div>
	<!-- Full Page Content / End -->

</div>


@endsection