@extends('layout.admin')
@section("title")
<title>Qorrah | Majors</title>
<meta name="description" content="a platform that provides the link between students who are looking for specialized training
 with institutions that have training vacancies">
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
					<h3><i class="icon-material-outline-supervisor-account"></i> <span class="counter">{{count($majors)}}</span> majors</h3>
					<div class="flexCenterToBlock">
						<p class="phoneMargainTop15">Search:</p>
						<input type="text" class="margin-left-5 margin-right-5 majorSearch" placeholder="by name">
					</div>
				</div>
				<div class="dashboard-box margin-top-0">


					<div class="content">
						
						<table class="basic-table">

							<tr>
								<th>major_id </th>
								<th>College</th>
								<th>major</th>
								<th  >Delete | Edit</th>

							</tr>
							@foreach($majors as $major)

							<tr class="Element">
								<td>{{$major->major_id }}</td>
								<td class="majorCut" >{{$major->College }}</td>
								<td class="majorName">{{$major->major }} name</td>
								<td class="tableBotton" >
									<div class="cardButtons flexStart" >
										<button class="button red ripple-effect toggelDelete" value="{{$major->major_id}}"><i class="icon-feather-trash-2"></i> Delete</button>
										<form method="GET" >
											<button formaction="/admin/major/{{$major->major_id }}/edit" class="button gray ripple-effect "><i class="icon-feather-edit"></i> Edit</button>
										</form>
									</div>
									<div class=" js-accordion">
										<!-- Accordion Item -->
										<div class="js-accordion-item">
											<div class="js-accordion-header fit-content hiddenElement " style="float: right ; display : inline"><button id="{{$major->major_id}}" class="button red ripple-effect deleteClick" style="float: right ; display : inline" ><i class="icon-feather-trash-2"></i> Delete</button></div>
		
											<!-- Accordtion Body -->
											<div class="accordion-body js-accordion-body" style=" padding-top: 0px; margin-top: 0px; padding-bottom: 0px; margin-bottom: 0px; display: none;" >
												<div class="notification error closeable">
													<p>Are you sure you want to delete this application?</p>
														<form action="{{'/admin/major/delete/'. $major->major_id }}" method="get" >
															<button type="submit" class="button red ripple-effect"><i class="icon-feather-trash-2"></i> confirm</button>
														</form>
												</div>
											</div>
											<!-- Accordion Body / End -->
										</div>
										<!-- Accordion Item / End -->
		
									</div>
								</td>

							</tr>
							@endforeach

						</table>
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
	$(".majorSearch").keyup(function() {

		var counter = 0 ;
		 $(".Element").map(function() {
			let text = $(this).find('.majorName').text().toLowerCase();
			let searchText = $(".majorSearch").val().toLowerCase();
			if ((text).search(searchText) < 0) {

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