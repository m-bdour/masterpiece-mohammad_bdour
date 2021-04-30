@extends('layout.public')
@section("title")
<title>Qorrah | Jobs</title>
<meta name="description" content="a platform that provides the link between students who are looking for specialized training
 with institutions that have training vacancies">
 <meta name="keywords" content="Qorrah, Jobs, Training">


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
		<form method="get" action="{{ route('jobs') }}">
				<div class="sidebar-container">
						<!-- City Field -->
						<div class="sidebar-widget">
							<h3>city</h3>
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
						<div class="sidebar-widget">
							<h3>Major</h3>
							<select class="selectpicker default" data-selected-text-format="count" name="majors" data-live-search="true" data-size="7" title="All majors" >
										<option selected value='All'>All</option>
												@foreach($majors as $major)
												<option  value="{{$major->major}}">{{$major->major}}
												</option>
												@endforeach
							</select>
						</div>
						<!-- type Field -->
						<div class="sidebar-widget">
							<h3>Type</h3>
							<select class="selectpicker default" data-selected-text-format="count" name="types" data-size="3" title="All types" >
										<option selected value='All' >All</option>
										<option value='Full time Paid'>Full time Paid</option>
										<option value='Full time Unpaid'>Full time Unpaid</option>
										<option value='Part time Paid'>Part time Paid</option>
										<option value='Part time Unpaid'>Part time Unpaid</option>
							</select>
						</div>
					
				</div>
				<!-- Sidebar Container / End -->

				<!-- Search Button -->
				<div class="sidebar-search-button-container">
					<button  type="submit" class="button ripple-effect">Search</button>
					<a href="{{ url('/jobs') }}"><button class="button ripple-effect margin-top-20">All jobs</button></a>

				</div>
				<!-- Search Button / End-->

		    </form>
		</div>
	</div>
	<!-- Full Page Sidebar / End -->
	
	<!-- Full Page Content -->
	<div class="full-page-content-container" data-simplebar>
		<div class="full-page-content-inner">

			<h3 class="page-title">Search Results</h3>

			<div class="listings-container grid-layout margin-top-35">
				@foreach ($jobs as $job)
				<!-- Job Listing -->
				<a href={{ route('job', ['id'=>$job->position_id]) }} class="job-listing">

					<!-- Job Listing Details -->
					<div class="job-listing-details">
						<!-- Logo -->
						<div class="job-listing-company-logo">								
							<img src={{asset("assets/images/profile/$job->company_image")}} alt="{{$job->company_name}}">
						</div>

						<!-- Details -->
						<div class="job-listing-description">
							<h4 class="job-listing-company">{{$job->company_name}}</h4>
							<h3 class="job-listing-title">{{$job->name}}</h3>
						</div>
					</div>

					<!-- Job Listing Footer -->
					<div class="job-listing-footer">
						<ul>
							@if ($job->city == null)
								
							<li><i class="icon-material-outline-location-on"></i> {{$job->company_city}}</li>
							@else
							<li><i class="icon-material-outline-location-on"></i> {{$job->city}}</li>
							@endif
							<li><i class="icon-material-outline-business-center"></i> {{$job->type}}</li>
		
							@if ( ($date = (strtotime(date("Y-m-d"))  - strtotime(explode(" " , $job->created_at)[0]))) < 60*60*24 )
							<li><i class="icon-material-outline-access-time"></i> {{'today'}} </li>
							@else 
							<li><i class="icon-material-outline-access-time"></i> {{ round( ($date)/(60*60*24), 0, PHP_ROUND_HALF_DOWN) . 'd'}}</li>
							@endif
							<li><i class="icon-line-awesome-balance-scale"></i> {{$job->status}}</li>

						</ul>
					</div>
				</a>
                @endforeach

				@if (count($jobs) <1)
									<!-- Job Listing -->
				<a href="#" class=" center inactiveLink">

					<!-- Job Listing Details -->
					<div class="job-listing-details">
						<!-- Logo -->
						<div class="job-listing-company-logo">								
						</div>

						<!-- Details -->
						<div class="job-listing-description">
							<h3 class="job-listing-company">Sorry, No results for this search.</h3>
						</div>
					</div>

	
				</a>
				@endif

			</div>
			@if (count($jobs) >1)

			<div class="pagination-block">
				{{  $jobs->appends(request()->input())->links('layout.paginationlinks') }}

			</div>
			@endif
		</div>
	</div>
	<!-- Full Page Content / End -->

</div>


@endsection