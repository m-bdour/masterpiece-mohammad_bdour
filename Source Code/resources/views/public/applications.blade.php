@extends('layout.public')
@section("title")
<title>Qorrah | Applications</title>
<meta name="description" content="a platform that provides the link between students who are looking for specialized training
 with institutions that have training vacancies">
 <meta name="keywords" content="Qorrah, Applications, Training">


<style>
	#wrapper {
		padding-top: 0 !important;
	}

	.dashboard-box .freelancer-overview {
		padding: 0% !important;
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
			<form method="get" action="{{ route('CompanyApplications') }}">
				<div class="sidebar-container">
					<!-- major Field -->
					<div class="sidebar-widget">
						<h3>{{"Applications"}}</h3>
						<select class="selectpicker default" data-selected-text-format="count" name="id" data-live-search="true" data-size="5" title="All majors">
							<option selected value='All'>All</option>
							@foreach($positions as $position)
							<option value="{{$position->position_id}}">{{$position->name}}
							</option>
							@endforeach
						</select>
					</div>


				</div>
				<!-- Sidebar Container / End -->

				<!-- Search Button -->
				<div class="sidebar-search-button-container">
					<button type="submit" class="button ripple-effect">Search</button>
					<a href="{{ url('/applications') }}"><button class="button ripple-effect margin-top-20">All applications</button></a>

				</div>
				<!-- Search Button / End-->

			</form>
		</div>
	</div>
	<!-- Full Page Sidebar / End -->

	<!-- Full Page Content -->
	<div class="full-page-content-container" data-simplebar>
		<div class="full-page-content-inner">

			<div class="col-xl-12">

				<div class="dashboard-box margin-top-0">
					<div class="boxed-list-headline">
						<h3><i class="icon-material-outline-business-center"></i> {{count($applications)}} Applications</h3>
					</div>

					
				@if ($errors->any())
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
							<p class="text-danger">{{ $error }}</p>
						@endforeach
					</ul>
				</div>
			@endif
			

					<div class="content">
						<ul class="dashboard-box-list">
							@foreach($applications as $application)
							<li class="Element">
								<!-- Overview -->
								<div class="freelancer-overview manage-candidates">
									<div class="freelancer-overview-inner">

										<!-- Avatar -->
										<div class="freelancer-avatar">
											<a href="{{ route('profile', ['id'=>$application->User_id]) }}"><img src={{asset("assets/images/profile/$application->user_image")}} alt={{"$application->user_name"}}></a>
										</div>

										<!-- Name -->
										<div class="freelancer-name">
											<h4><a class="userName" href="{{ route('profile', ['id'=>$application->User_id]) }}">{{"$application->user_name"}} {{"$application->user_lname"}}</a></h4>

											<!-- Details -->
											<span class="freelancer-detail-item"><i class="icon-feather-mail"></i> {{$application->user_email}}</span>

											@if ($application->user_cv )
												
											<form class="inline margin-right-30" method="GET" >
												<input type="hidden" name="id" value="{{$application->user_cv }}">
												<button formaction={{ route('download') }}>
													<li><i class="icon-material-outline-attach-file">
													</i>
														CV
													</button>
											</form>
											@endif

											@if ($application->attachment )
												
											<form class="inline margin-right-30" method="GET" >
												<input type="hidden" name="id" value="{{$application->attachment }}">
												<button formaction={{ route('download') }}>
													<li><i class="icon-material-outline-attach-file">
													</i>
														Attachments
													</button>
											</form>
											@endif
											<span class="freelancer-detail-item"><i class="icon-line-awesome-balance-scale"></i>status: {{$application->status}}</span>

											<!-- Buttons -->
											<div class="buttons-to-right always-visible margin-top-5 margin-bottom-5  ">
												<!-- About -->
												<div class="accordion js-accordion margin-top-10">

													<div class="accordion__item js-accordion-item">
														<div class="accordion-header js-accordion-header">{{"Cover Letter"}}</div>

														<!-- Accordtion Body -->
														<div class="accordion-body js-accordion-body">

															<!-- Accordion Content -->
															<div class="accordion-body__contents">
																{{$application->coverLetter}}
															</div>

														</div>
														<!-- Accordion Body / End -->
													</div>
												</div>
												<!-- About / End -->
												<a href="#small-dialog" class="button gray ripple-effect margin-top-15 popup-with-zoom-anim "><i class="icon-feather-edit"></i>action</a>
												<div id="small-dialog" class="zoom-anim-dialog mfp-hide dialog-with-tabs">

													<!--Tabs -->
													<div class="sign-in-form">

														<div class="popup-tabs-container">

															<!-- Tab -->
															<div class="popup-tab-content" id="tab">

																<!-- Welcome Text -->
																<div class="welcome-text">
																	<p>For</p>
																	<h3> {{$application->user_name}}</h3>
																</div>

																<!-- Form -->
																<form method="post" action="/application/{{$application->application_id}}/update" id="ApplyJob">
																	{{ csrf_field() }}
																	@method('PATCH')

																	{{-- major --}}
																	<div class="col-xl-6">
																		<div class="submit-field">
																			<h5>user major </h5>
																			<select class="selectpicker with-border" id="majorSelect" value="{{ $application->status}}" name="applications" data-size="4" required>
																				<option disabled value='select major'>select Status</option>
																				@foreach($statuses as $status)
																				@if ($application->status== $status)
																				<option selected class="batata" value={{$status}}>{{$status}}</option>
																				@else
																				<option class="batata" value={{$status}}>{{$status}}</option>
																				@endif
																				@endforeach
																			</select>
																			@if ($errors->has('applications'))
																			<div class="text-danger">{{ $errors->first('applications') }}</div>
																			@endif
																		</div>
																	</div>
																</form>

																<!-- Button -->
																<button class="button full-width button-sliding-icon ripple-effect" type="submit" form="ApplyJob">Apply <i class="icon-material-outline-arrow-right-alt"></i></button>
												<!-- Accordion -->
												<div class=" js-accordion">
													<!-- Accordion Item -->
													<div class="js-accordion-item">
														<div class="js-accordion-header "><button class="button gray full-width ripple-effect"><i class="icon-feather-trash-2"></i> Delete</button></div>

														<!-- Accordtion Body -->
														<div class="accordion-body js-accordion-body" style=" padding-top: 0px; margin-top: 0px; padding-bottom: 0px; margin-bottom: 0px; display: none;" >
															<div class="notification error closeable">
																<p>Are you sure you want to delete this application?</p>
																<p>It will be deleted permanently!</p>
																<form action="{{'/application/delete/'. $application->application_id}}" method="get" >
																	@csrf
																	<button type="submit" class="button red ripple-effect"><i class="icon-feather-trash-2"></i> confirm</button>
																</form>
															</div>
														</div>
														<!-- Accordion Body / End -->
													</div>
													<!-- Accordion Item / End -->

												</div>
												<!-- Accordion / End -->

															</div>

														</div>
													</div>
												</div>

											</div>
										</div>
									</div>
							</li>
							@endforeach

						</ul>

					</div>




				</div>


				@if (count($applications ) <1) <!-- No Job Listing -->
					<a href={{ route('CompanyApplications') }} class="job-listing">

						<!-- No Job Listing Details -->
						<div class="job-listing-details">
							<!-- Logo -->
							<div class="job-listing-company-logo">
							</div>

							<!-- Details -->
							<div class="job-listing-description">
								<h4 class="job-listing-company">No applications with this search</h4>
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
		</div>
	</div>
	<!-- Full Page Content / End -->

</div>


@endsection