@extends('layout.admin')
@section("title")
<title>Qorrah | Users</title>
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
					<h3><i class="icon-material-outline-supervisor-account"></i> <span class="counter">{{count($users)}}</span> users</h3>

					<form action="/admin/users" method="get" id="SortBy">
					<div class="flexCenterToBlock" >
						<p class="phoneMargainTop15">  Sorted:  </p>

						<select class="selectpicker with-border margin-left-5 margin-right-5 margin-bottom-10 InstantSubmit " name="type" data-size="5" title="User type">
							@if (request()->get('type') != '' && request()->get('type') != null)
								@foreach ($userTypes as $userType)
									@if (request()->get('type')  == $userType)
										<option selected value="{{"$userType"}}">{{"$userType"}}</option>
									@else
										<option value="{{"$userType"}}">{{"$userType"}}</option>
									@endif
								@endforeach
							@else
								@foreach ($userTypes as $userType)
									<option value="{{"$userType"}}">{{"$userType"}}</option>
								@endforeach
							@endif
						</select>

						<select class="selectpicker with-border margin-left-5 margin-right-5 margin-bottom-10 InstantSubmit " name="direction" data-size="5" title="Direction">
							@if (request()->get('direction') != '' && request()->get('direction') != null)
								@foreach ($directions as $direction)
									@if (request()->get('direction')  == $direction)
										<option selected value="{{"$direction"}}">{{"$direction"}}</option>
									@else
										<option value="{{"$direction"}}">{{"$direction"}}</option>
									@endif
								@endforeach
							@else
								@foreach ($directions as $direction)
									<option value="{{"$direction"}}">{{"$direction"}}</option>
								@endforeach
							@endif
						</select>
					</div>
				</form>
					<div class="flexCenterToBlock" >
						<p class="phoneMargainTop15">Search:</p>
						<input type="text" class="margin-left-5 margin-right-5 nameSearch" placeholder="by name">
						<input type="text" class="margin-left-5 margin-right-5 emailSearch" placeholder="by email">
					</div>
				</div>
				<div class="dashboard-box margin-top-0">


					<div class="content">
						<ul class="dashboard-box-list">
							@foreach($users as $user)
							<li class="Element">
								<!-- Overview -->
								<div class="freelancer-overview manage-candidates">
									<div class="freelancer-overview-inner">

										<!-- Avatar -->
										<div class="freelancer-avatar">
											<a href="{{ route('profile', ['id'=>$user->user_id]) }}"><img src={{asset("assets/images/profile/$user->image")}} alt={{"$user->name"}}></a>
										</div>

										<!-- Name -->
										<div class="freelancer-name">
											<h4><a class="userName" href={{ route('profile', ['id'=>$user->user_id]) }}>{{$user->name}}</a></h4>

											<!-- Details -->
											<span class="freelancer-detail-item"><a href="#" class="userEmail" ><i class="icon-feather-mail"></i> {{$user->email}}</a></span>
											@if ($user->phone)
											<span class="freelancer-detail-item"><i class="icon-feather-phone"></i> {{$user->phone}}</span>
											@endif
											<span class="freelancer-detail-item"><i class="icon-material-outline-account-circle"></i>type: {{$user->type}}</span>

											<!-- Buttons -->
											<div class="buttons-to-right always-visible margin-top-5 margin-bottom-5 flexStart position-relative">
												<a href="/admin/user/{{$user->user_id}}/edit" class="button ripple-effect margin-right-15 myEditBTN" style='width: 4.5rem ;' ><i class="icon-feather-edit"></i>edit</a>


												<!-- Accordion -->
												<div class=" js-accordion">
													<!-- Accordion Item -->
													<div class="js-accordion-item">
														<div class="js-accordion-header fit-content "><button class="button gray ripple-effect toggelDelete"><i class="icon-feather-trash-2"></i> Delete</button></div>

														<!-- Accordtion Body -->
														<div class="accordion-body js-accordion-body" style=" padding-top: 0px; margin-top: 0px; padding-bottom: 0px; margin-bottom: 0px; display: none;" >
															<div class="notification error closeable">
																<p>Are you sure you want to delete this user?</p>
																<p>Will be deleted with all its applications!</p>
																<form action="{{'/admin/user/delete'}}" method="post" >
																	@csrf
																	<input type="hidden" name="id" value="{{$user->user_id}}">
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

							@if (count($users) <1)

							<li class="Element">
								<!-- Overview -->
								<div class="freelancer-overview manage-candidates">
									<div class="freelancer-overview-inner">

										<!-- Name -->
										<div class="freelancer-name" style="text-align: center" >
											<p style="font-size: 2rem">No users</p>
											<span>Please search again!</span> 

										</div>
									</div>
								</div>
							</li>
								
							@endif

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

	$(".InstantSubmit").on('change' , function() {
		$("#SortBy").submit();
	})


	//search script
	$( ".nameSearch" ).keyup(function() {
		var counter = 0 ;

		var all = $(".Element").map(function() {
			let text = $(this).find('.userName').text().toLowerCase();
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