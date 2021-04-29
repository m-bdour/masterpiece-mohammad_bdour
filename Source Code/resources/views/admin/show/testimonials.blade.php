@extends('layout.admin')
@section("title")
<title>Qorrah | Testimonials</title>
<meta name="description" content="Online Appointments Registeration system for book driving lessons">

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
			<h3>Manage Testimonials</h3>

			<!-- Breadcrumbs -->
			<nav id="breadcrumbs" class="dark">
				<ul>
					<li><a href="/">Home</a></li>
					<li><a href="{{"/admin/dashboard"}}">Dashboard</a></li>
					<li>Manage Testimonials</li>
				</ul>
			</nav>
		</div>

		<!-- Row -->
		<div class="row">

			<!-- Dashboard Box -->
			<div class="col-xl-12">
				<!-- Headline -->
				<div class="headline flexbetweenToBlock">
					<h3><i class="icon-material-outline-supervisor-account"></i> <span class="counter">{{count($testimonials)}}</span> testimonial</h3>
				</div>
				<div class="dashboard-box margin-top-0">


					<div class="content">
						<ul class="dashboard-box-list">
							@foreach($testimonials as $testimonial)
							<li class="Element">
								<!-- Overview -->
								<div class="freelancer-overview manage-candidates">
									<div class="freelancer-overview-inner">

										<!-- Avatar -->
										<div class="freelancer-avatar">
											@if ($testimonial->User_id)

											<a href="{{ route('profile', ['id'=>$testimonial->User_id]) }}"><img src={{asset("assets/images/profile/$user->image")}} alt={{"$user->name"}}></a>
											@else

											<img src={{asset("assets/images/profile/$testimonial->image")}} alt={{"$testimonial->name"}}>
											@endif
										</div>

										<!-- Name -->
										<div class="freelancer-name">
											@if ($testimonial->User_id)

											<h4><a class="userName" href={{ route('profile', ['id'=>$testimonial->User_id]) }}>{{$testimonial->name}}</a></h4>
											<h5><a class="userName" href={{ route('profile', ['id'=>$testimonial->User_id]) }}>{{$testimonial->title}}</a></h5>
											@else
											<h4 class="userName">{{$testimonial->name}}</h4>
											<h5 class="red">{{$testimonial->title}}</h5>
											@endif
											<p>{{$testimonial->text}}</p>
											<!-- Buttons -->
											<div class="buttons-to-right always-visible margin-top-5 margin-bottom-5 flexStart position-relative">
												<a href="/admin/Testimonial/{{$testimonial->testimonial_id }}/edit" class="button ripple-effect margin-right-15 myEditBTN" style='width: 4.5rem ;'><i class="icon-feather-edit"></i>edit</a>


												<!-- Accordion -->
												<div class=" js-accordion">
													<!-- Accordion Item -->
													<div class="js-accordion-item">
														<div class="js-accordion-header fit-content "><button class="button gray ripple-effect toggelDelete"><i class="icon-feather-trash-2"></i> Delete</button></div>

														<!-- Accordtion Body -->
														<div class="accordion-body js-accordion-body" style=" padding-top: 0px; margin-top: 0px; padding-bottom: 0px; margin-bottom: 0px; display: none;">
															<div class="notification error closeable">
																<p>Are you sure you want to delete this user?</p>
																<p>Will be deleted with all its applications!</p>
																<form action="{{'/admin/Testimonial/delete/'. $testimonial->testimonial_id }}" method="get">
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
	$(".nameSearch").keyup(function() {
		var counter = 0;

		var all = $(".Element").map(function() {
			let text = $(this).find('.userName').text().toLowerCase();
			let searchText = $(".nameSearch").val().toLowerCase();
			if ((text).search(searchText) < 0) {

				$(this).addClass('hideElement')
			} else {
				counter++;
				$(this).removeClass('hideElement')
			}
			$('.counter').text(counter);
		}).get();
	});
	$(".emailSearch").keyup(function() {
		var counter = 0;


		var all = $(".Element").map(function() {
			let text = $(this).find('.userEmail').text().toLowerCase();
			let searchText = $(".emailSearch").val().toLowerCase();
			if ((text).search(searchText) < 0) {
				$(this).addClass('hideElement')
			} else {
				counter++;
				$(this).removeClass('hideElement')
			}
			$('.counter').text(counter);
		}).get();
	});
</script>

@endsection