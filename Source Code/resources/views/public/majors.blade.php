@extends('layout.public')
@section("title")
<title>Qorrah | majors</title>
<meta name="description" content="a platform that provides the link between students who are looking for specialized training
 with institutions that have training vacancies">
 <meta name="keywords" content="Qorrah, majors, Training">


<style>
    #wrapper {
    padding-top: 0 !important;
	
	}
	.grid-layout .job-listing-details {
		display : flex !important;
		align-items : center !important;
		justify-content : center !important;
		padding-right : 0;
		padding : 10px !important;
	}
	.majors-major-image {
		height : 100px !important;
		
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
		<div class="sidebar-container">
			<h3 >Search</h3>

		<!-- university Field -->
		<div class="sidebar-widget">
			<h5 style='font-weight : bold'>By university</h5>
			<form method="get" action="{{ route('majors') }}" id="universityForm">
			<select class="selectpicker default universitySelect" data-selected-text-format="count" name="university" data-live-search="true" data-size="5" title="All universities" >
				<option selected value='All'>All</option>
				@if (request()->get('university') != '' && request()->get('university') != null)
				@foreach($universities as $university)
					@if (request()->get('university')  == $university->university_id)
						<option selected value="{{"$university->university_id"}}">{{$university->name}}</option>
					@else
					<option value="{{"$university->university_id"}}">{{$university->name}}</option>
					@endif
				@endforeach
			@else
			@foreach($universities as $university)
			<option  value="{{$university->university_id}}">{{$university->name}}
			</option>
		@endforeach
			@endif				
			</select>
			</form>
		</div>		
		<!-- college Field -->
		<div class="sidebar-widget">
			<h5 style='font-weight : bold'>By college</h5>
			<form method="get" action="{{ route('majors') }}" id="collegeForm">
			<select class="selectpicker default collegeSelect" data-selected-text-format="count" name="college" data-live-search="true" data-size="5" title="All colleges" >
				<option selected value='All'>All</option>
				@if (request()->get('university') != '' && request()->get('university') != null)
				@foreach($colleges as $college)
					@if (request()->get('college')  == $college->college_id)
						<option selected value="{{"$college->college_id"}}">{{$college->name}}</option>
					@else
					<option value="{{"$college->college_id"}}">{{$college->name}}</option>
					@endif
				@endforeach
			@else
			@foreach($colleges as $college)
			<option  value="{{$college->college_id}}">{{$college->name}}
			</option>
		@endforeach
			@endif

			</select>
			</form>
		</div>		
		<div class="sidebar-widget">
			<h5 style='font-weight : bold'>By name</h5>
			<input type="text" class="margin-left-5 margin-right-5 nameSearch" placeholder="civil engineering">
		</div>
		</div>
		</div>
	</div>
	<!-- Full Page Sidebar / End -->
	
	
	<!-- Full Page Content -->
	<div class="full-page-content-container" data-simplebar>

		<div class="full-page-content-inner">
			<div class="listings-container grid-layout margin-top-35">
				@foreach ($majors as $major)
				<!-- major Listing -->
				<a href={{ url('majors/'. $major->major_id) }} class="job-listing element">

					<!-- Job Listing Details -->
					<div class="job-listing-details" >
						<!-- Logo -->
						<div class="background-image-container">								
							<img loading="lazy" class='majors-major-image' src={{asset("assets/images/profile/$major->image")}} alt="{{$major->major}}">
						</div>
					</div>
				<!-- Job Listing Footer -->
				<div class="job-listing-footer">
						<h4 class='majorName'><i class="icon-line-awesome-balance-scale"></i> {{$major->major}}</h4>
				</div>					
				</a>
                @endforeach

				@if (count($majors) <1)
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
		</div>
	</div>
	<!-- Full Page Content / End -->

</div>


<script>

	$(".collegeSelect").on('change' , function() {
		$("#collegeForm").submit();
	})
	$(".universitySelect").on('change' , function() {
		$("#universityForm").submit();
	})
	//search script
	$( ".nameSearch" ).keyup(function() {
		var counter = 0 ;
		var all = $(".element").map(function() {
			let text = $(this).find('.majorName').text().toLowerCase();
			let searchText = $(".nameSearch").val().toLowerCase();
			if ((text).search(searchText) < 0) {

				$(this).addClass('hideElement')
			}else {
				counter++;
				$(this).removeClass('hideElement')
			}
			$('.counter').text(counter);
		}).get();	
	});


</script>


@endsection