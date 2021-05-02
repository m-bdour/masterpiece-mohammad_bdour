@extends('layout.admin')
@section("title")
<title>Qorrah | Reports</title>
<meta name="description" content="a platform that provides the link between students who are looking for specialized training
 with institutions that have training vacancies">

<style>

.freelancer-overview .freelancer-avatar {
    width: 50px;
    height: 50px;
}

.freelancer-overview .freelancer-avatar img {
	border-radius: 50%;
    height: 100%;
}

</style>

@endsection
@section('adminContent')

<!-- Dashboard Content
	================================================== -->
<div class="dashboard-content-container" data-simplebar>
	<div class="dashboard-content-inner">

		<!-- Dashboard Headline -->
		<div class="dashboard-headline">
			<h3> Reports</h3>

			<!-- Breadcrumbs -->
			<nav id="breadcrumbs" class="dark">
				<ul>
					<li><a href="/">Home</a></li>
					<li><a href="{{"/admin/dashboard"}}">Dashboard</a></li>
					<li> Reports</li>
				</ul>
			</nav>
		</div>

		<!-- Row -->
		<div class="row">

			<!-- Dashboard Box -->
			<div class="col-xl-12">
				<!-- Headline -->
				<div class="headline flexbetweenToBlock">
					<h3><i class="icon-material-outline-supervisor-account"></i> <span class="counter">{{count($reports)}}</span> reports</h3>
					<div class="flexCenterToBlock" >
						<p class="phoneMargainTop15">Search:</p>
						<input type="text" class="margin-left-5 margin-right-5 nameSearch" placeholder="by page">
						<input type="text" class="margin-left-5 margin-right-5 emailSearch" placeholder="by email">
					</div>
				</div>
				<div class="dashboard-box margin-top-0 margin-bottom-30">


					<div class="content">
						<ul class="dashboard-box-list">
							@foreach($reports as $report)
							<li class="Element">
								<!-- Overview -->
								<div class="freelancer-overview manage-candidates">
									<div class="freelancer-overview-inner">


										<!-- Name -->
										<div class="freelancer-name">
											<h5>Page</h5>
											<h4 class="page" >{{$report->page}}</h4>

											<!-- Details -->
											<span class="freelancer-detail-item"><i class="icon-material-outline-desktop-windows"></i> {{$report->device}}</span>
											<span class="freelancer-detail-item"><i class="icon-line-awesome-gears"></i> {{$report->OS}}</span>
											<span class="freelancer-detail-item"><i class="icon-material-outline-language"></i> {{$report->browser}}</span>
											<span class="freelancer-detail-item"><i class="icon-line-awesome-code-fork"></i> {{$report->version}}</span>
											<span class="freelancer-detail-item"><i class="icon-material-outline-date-range"></i> {{$report->date}}</span>
											<span class="freelancer-detail-item"><i class="icon-material-outline-access-time"></i> {{$report->time}}</span>
											<span class="freelancer-detail-item userEmail"><i class="icon-feather-mail"></i>{{$report->email}}</span>

											<!-- Buttons -->
											<div class="buttons-to-right always-visible margin-top-5 margin-bottom-5 flexStart position-relative">

												<a href="#small-dialog-1" class=" button popup-with-zoom-anim gray ripple-effect " ><i class="icon-feather-trash-2"></i> Delete</a>

												<div id="small-dialog-1" class=" small-dialog zoom-anim-dialog mfp-hide dialog-with-tabs popupForm">
								
													<!--Tabs -->
												
														<div class="notification info closeable" style="height: 10rem">
															<p style="font-size: 1.3rem" >Are you sure you want to delete this report?</p>
																<form style="width: 120px; float:right" action="{{'/admin/reports/delete/'. $report->id}}" method="get" >
																	<button type="submit" class="button red ripple-effect" ><i class="icon-feather-trash-2"></i> confirm</button>
																</form>
														</div>
												</div>


												<!-- Accordion -->
												<div class=" js-accordion">
													<!-- Accordion Item -->
													<div class="js-accordion-item">
														<div class="js-accordion-header "><button class="button   ripple-effect toggelDelete"><i class="icon-line-awesome-info"></i> More</button></div>

														<!-- Accordtion Body -->
														<div class="accordion-body js-accordion-body" style=" padding-top: 0px; margin-top: 0px; padding-bottom: 0px; margin-bottom: 0px; display: none;" >
															<div class="notification closeable">
																<h4>{{"Page Link"}}</h4>
																<p>{{"$report->pageLink"}}</p>
																<hr style="width: 50% ; border: none ; border-bottom: 1px solid rgba(54, 54, 54, 0.322); text-align:left;margin-left:0">
																<h4>{{"describe"}}</h4>
																<p>{{"$report->describe"}}</p>
																<hr style="width: 50% ; border: none ; border-bottom: 1px solid rgba(54, 54, 54, 0.322); text-align:left;margin-left:0">
																<h4>{{"Any thing else"}}</h4>
																<p>{{"$report->else"}}</p>


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
							</li>
							@endforeach

						</ul>

					</div>
				</div>
			</div>

		</div>
		<!-- Row / End -->
	</div>
</div>
<!-- Dashboard Content / End -->

<script>

	//search script
	$( ".nameSearch" ).keyup(function() {
		var counter = 0 ;

		var all = $(".Element").map(function() {
			let text = $(this).find('.page').text().toLowerCase();
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
	$( ".emailSearch" ).keyup(function() {
		var counter = 0 ;


		var all = $(".Element").map(function() {
			let text = $(this).find('.userEmail').text().toLowerCase();
			let searchText = $(".emailSearch").val().toLowerCase();
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