@extends('layout.admin')
@section("title")
<title>Qorrah | Users</title>
<meta name="description" content="Online Appointments Registeration system for book driving lessons">
@endsection
@section('adminContent')

<!-- Dashboard Content
	================================================== -->

{{-- <div id="deletePopup" class="deletePopup">
		<div class="notification error closeable " >
			<p>write the name <span id="conmajorName" ></span> to confairm</p>
			<input type="text" class="inputconmajorName" >
			<button class="button red " disabled ><i class="icon-feather-trash-2"></i> Delete</button>
		</div>
	</div> --}}


<div class="dashboard-content-container" data-simplebar>
	<div class="dashboard-content-inner">

		<!-- Dashboard Headline -->
		<div class="dashboard-headline">
			<h3>Manage users</h3>

			<!-- Breadcrumbs -->
			<nav id="breadcrumbs" class="dark">
				<ul>
					<li><a href="/">Home</a></li>
					<li><a href="{{"/admin/dashboard"}}">Dashboard</a></li>
					<li>Manage users</li>
				</ul>
			</nav>
		</div>

		<!-- Row -->
		<div class="row">

			<!-- Dashboard Box -->
			<div class="col-xl-12">

				<!-- Headline -->
				<div class="headline flexbetweenToBlock">
					<h3><i class="icon-material-outline-supervisor-account"></i> <span class="counter">{{count($applications)}}</span> applications</h3>
					<div class="flexCenterToBlock">
						<p class="phoneMargainTop15">Search:</p>
						<input type="text" class="margin-left-5 margin-right-5 positionSearch" placeholder="by name">
					</div>
				</div>

				<div class="listings-container grid-layout">


					@foreach($applications as $application)

					<!-- Job Listing -->
					<a href="single-job-page.html" class="job-listing Element">

						<!-- Job Listing Details -->
						<div class="job-listing-details">
							<!-- Logo -->
							<div class="job-listing-company-logo">
								<img src={{asset("assets/images/profile/$application->user_image")}} alt={{$application->name}}>
							</div>

							<!-- Details -->
							<div class="job-listing-description">
								<h4 class="job-listing-company companyName">{{$application->user_name}}</h4>
								<h3 class="job-listing-title positionName">{{$application->name}}</h3>
							</div>
						</div>

						<!-- Job Listing Footer -->
						<div class="job-listing-footer">
							{{-- <span class="bookmark-icon"></span> --}}
							<ul>
								<li><i class="icon-material-outline-location-on"></i> {{$application->city}}</li>
								<li><i class="icon-material-outline-business-center"></i> {{$application->status}}</li>
								@if ( ($date = (strtotime(date("Y-m-d"))  - strtotime(explode(" " , $application->created_at)[0]))) < 60*60*24 )
								<li><i class="icon-material-outline-access-time"></i> {{'today'}} </li>
								@else 
								<li><i class="icon-material-outline-access-time"></i> {{ round( ($date)/(60*60*24), 0, PHP_ROUND_HALF_DOWN) . 'd'}}</li>
								@endif

							</ul>
							<div class="cardButtons flexStart" >
								<button class="button red ripple-effect toggelDelete " value="{{$application->application_id}}"><i class="icon-feather-trash-2"></i> Delete</button>
								<form method="GET" class="">
									<button formaction="/admin/application/{{$application->application_id}}/edit" class="button gray ripple-effect "><i class="icon-feather-edit"></i> Edit</button>
								</form>
							</div>
							<div class=" js-accordion">
								<!-- Accordion Item -->
								<div class="js-accordion-item">
									<div class="js-accordion-header fit-content hiddenElement " style="float: right ; display : inline"><button id="{{$application->application_id}}" class="button red ripple-effect deleteClick" style="float: right ; display : inline" ><i class="icon-feather-trash-2"></i> Delete</button></div>

									<!-- Accordtion Body -->
									<div class="accordion-body js-accordion-body" style=" padding-top: 0px; margin-top: 0px; padding-bottom: 0px; margin-bottom: 0px; display: none;" >
										<div class="notification error closeable">
											<p>Are you sure you want to delete this application?</p>
												<form action="{{'/admin/application/delete/'. $application->application_id}}" method="get" >
													<button type="submit" class="button red ripple-effect"><i class="icon-feather-trash-2"></i> confirm</button>
												</form>
										</div>
									</div>
									<!-- Accordion Body / End -->
								</div>
								<!-- Accordion Item / End -->

							</div>


						</div>
					</a>

					@endforeach

				</div>
			</div>

		</div>
		<!-- Row / End -->
	</div>
</div>
<!-- Dashboard Content / End -->

<script>
	//search script
	$(".positionSearch").keyup(function() {

		var counter = 0;
		$(".Element").map(function() {
			let companyName = $(this).find('.companyName').text().toLowerCase();
			let positionName = $(this).find('.positionName').text().toLowerCase();
			let searchText = $(".positionSearch").val().toLowerCase();
			if ((positionName).search(searchText) < 0 && (companyName).search(searchText) < 0) {

				$(this).addClass('hideElement')
			} else {
				counter++;
				$(this).removeClass('hideElement')
			}
			$('.counter').text(counter);
		}).get();
	});

	$(".toggelDelete").on('click',function(e) {
		e.preventDefault();
		let id = this.value;
		$(`#${id}`).click();
	})
	$(".deleteClick").on('click',function(e) {
		e.preventDefault();
	})
</script>

@endsection