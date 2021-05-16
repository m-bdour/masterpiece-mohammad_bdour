@extends('layout.public')
@section("title")
<title>Qorrah | articles</title>
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
		
		<div class="sidebar-widget">
			<h5 style='font-weight : bold'>By name</h5>
			<input type="text" class="margin-left-5 margin-right-5 nameSearch" placeholder="الخلايا الجذعية">
		</div>
		</div>
		</div>
	</div>
	<!-- Full Page Sidebar / End -->
	
	
	<!-- Full Page Content -->
	<div class="full-page-content-container" data-simplebar>

		<div class="full-page-content-inner">
			<div class="listings-container grid-layout margin-top-35">
				@foreach ($articles as $article)
				<!-- article Listing -->
				<a href={{ url('articles/'. $article->article_id) }} class="job-listing element">

					<!-- Job Listing Details -->
					<div class="job-listing-details" >
						<!-- Logo -->
						<div class="background-image-container">								
							<img class='majors-major-image' src={{asset("assets/images/profile/$article->image")}} alt="{{$article->name}}">
						</div>
					</div>
				<!-- Job Listing Footer -->
				<div class="job-listing-footer">
					
						<h4 class='majorName'><i class="icon-line-awesome-balance-scale"></i> {{$article->name}}</h4>
					
				</div>					
				</a>
                @endforeach

				@if (count($articles) <1)
									<!-- Job Listing -->
				<a href="#" class=" center inactiveLink">

					<!-- Job Listing Details -->
					<div class="job-listing-details">
						<!-- Logo -->
						<div class="job-listing-company-logo">								
						</div>

						<!-- Details -->
						<div class="job-listing-description">
							<h3 class="job-listing-company">Sorry, No results for this.</h3>
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