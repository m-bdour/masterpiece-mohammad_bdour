@extends('layout.admin')
@section("title")
<title>Qorrah | Majors</title>
<meta name="description" content="a platform that provides the link between students who are looking for specialized training
 with institutions that have training vacancies">
@endsection
@section('adminContent')

<!-- Dashboard Content
	================================================== -->

<div class="dashboard-content-container" data-simplebar>
	<div class="dashboard-content-inner">

		<!-- Dashboard Headline -->
		<div class="dashboard-headline">
			<h3>Manage majors</h3>

			<!-- Breadcrumbs -->
			<nav id="breadcrumbs" class="dark">
				<ul>
					<li><a href="/">Home</a></li>
					<li><a href="{{"/admin/dashboard"}}">Dashboard</a></li>
					<li>Manage majors</li>
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
								<th>name</th>
								<th>الاسم</th>
								<th  >Delete | Edit</th>

							</tr>
							@foreach($majors as $major)

							<tr class="Element">
								<td>{{$major->major_id }}</td>
								<td class="majorEname" >{{$major->Ename }}</td>
								<td class="majorName">{{$major->major }}</td>
								<td class="tableBotton" >
									<div class="cardButtons flexStart" >

										<a href=".{{$major->major_id }}" class=" button popup-with-zoom-anim red ripple-effect " ><i class="icon-feather-trash-2"></i> Delete</a>

										<div id="small-dialog-1" class=" {{$major->major_id }} small-dialog zoom-anim-dialog mfp-hide dialog-with-tabs popupForm">
						
											<!--Tabs -->
										
												<div class="notification error closeable" style="height: 15rem">
													<p style="font-size: 1.3rem" >Are you sure you want to delete this major?</p>
													<p style="font-size: 1rem" >All its Reference and success stories will be deleted too!</p>
														<form style="width: 120px; float:right" action="{{'/admin/major/delete/'. $major->major_id}}" method="get" >
															<button type="submit" class="button red ripple-effect" ><i class="icon-feather-trash-2"></i> confirm</button>
														</form>
												</div>
										</div>
										<form method="GET" >
											<button formaction="/admin/major/{{$major->major_id }}/edit" class="button gray ripple-effect "><i class="icon-feather-edit"></i> Edit</button>
										</form>
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
			let text2 = $(this).find('.majorEname').text().toLowerCase();
			let searchText = $(".majorSearch").val().toLowerCase();
			if ((text).search(searchText) < 0 && (text2).search(searchText) < 0) {

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