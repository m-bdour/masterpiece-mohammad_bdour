@extends('layout.admin')
@section("title")
<title>Qorrah | Contacts</title>
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
					<h3><i class="icon-material-outline-supervisor-account"></i> <span class="counter">{{count($contacts)}}</span> contacts</h3>
					<div class="flexCenterToBlock" >
						<p class="phoneMargainTop15">Search:</p>
						<input type="text" class="margin-left-5 margin-right-5 nameSearch" placeholder="by subject">
						<input type="text" class="margin-left-5 margin-right-5 emailSearch" placeholder="by email">
					</div>
				</div>
				<div class="dashboard-box margin-top-0 margin-bottom-30">


					<div class="content">
						<ul class="dashboard-box-list">
							@foreach($contacts as $contact)
							<li class="Element">
								<!-- Overview -->
								<div class="freelancer-overview manage-candidates">
									<div class="freelancer-overview-inner">


										<!-- Name -->
										<div class="freelancer-name">
											<div class="freelancer-detail-item" style="margin: 0 20px 0 0" >
												<h5>Name</h5>
												<h4 class="page" >{{$contact->name}}</h4>
											</div>
											<div class="freelancer-detail-item " style="margin: 0 20px">
												<h5>subject</h5>
												<h4 class="subject" >{{$contact->subject}}</h4>
											</div>

											<!-- Details -->
											<span class="freelancer-detail-item userEmail"><i class="icon-feather-mail"></i>{{$contact->email}}</span>
											@if ($contact->attachment )
												
											<form class="inline margin-right-30" method="GET" >
												<input type="hidden" name="id" value="{{$contact->attachment }}">
												<button formaction={{ route('download') }}>
													<li><i class="icon-material-outline-attach-file">
													</i>
														Attachments
													</button>
											</form>
											@endif
											<div>
												<hr style="width: 50% ; border: none ; border-bottom: 1px solid rgba(54, 54, 54, 0.322); text-align:left;margin-left:0">
												<h5>{{"Comment"}}</h5>
												<p>{{"$contact->comments"}}</p>
											</div>




											<!-- Buttons -->
											<div class="buttons-to-right always-visible margin-top-5 margin-bottom-5 flexStart position-relative">

												<a href="#small-dialog-1" class=" button popup-with-zoom-anim gray ripple-effect " ><i class="icon-feather-trash-2"></i> Delete</a>

												<div id="small-dialog-1" class=" small-dialog zoom-anim-dialog mfp-hide dialog-with-tabs popupForm">
								
													<!--Tabs -->
												
														<div class="notification info closeable" style="height: 10rem">
															<p style="font-size: 1.3rem" >Are you sure you want to delete this contact?</p>
																<form style="width: 120px; float:right" action="{{'/admin/contacts/delete/'. $contact->id}}" method="get" >
																	<button type="submit" class="button red ripple-effect" ><i class="icon-feather-trash-2"></i> confirm</button>
																</form>
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
			let text = $(this).find('.subject').text().toLowerCase();
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