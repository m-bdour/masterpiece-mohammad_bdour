@extends('layout.admin')
@section("title")
<title>Qorrah | Edit University life</title>
<meta name="description" content="a platform that provides the link between students who are looking for specialized training
 with institutions that have training vacancies">
@endsection
@section('adminContent')

<div class="dashboard-content-container" data-simplebar>
	<div class="dashboard-content-inner">

		<!-- Dashboard Headline -->
		<div class="dashboard-headline">
			<h3>Edit a University life</h3>

			<!-- Breadcrumbs -->
			<nav id="breadcrumbs" class="dark">
				<ul>
					<li><a href="/">Home</a></li>
					<li><a href="{{"/admin/dashboard"}}">Dashboard</a></li>
					<li>Edit University life</li>
				</ul>
			</nav>
		</div>

		<!-- Row -->
		<div class="row">

			<!-- Dashboard Box -->
			<div class="col-xl-12">
				<div class="dashboard-box margin-top-0">
					<!-- Headline -->
					<div class="headline">
						<h3><i class="icon-feather-folder-plus"></i> University life edit Form</h3>
					</div>

					<form id="addUser" action="/admin/uni_live/{{$uniLife->uniLife_id  }}/update" method="post" enctype="multipart/form-data">
						{{ csrf_field() }}
						@method('PATCH')
						<div class="content with-padding padding-bottom-10">
							<div class="row">
								{{-- name --}}
								<div class="col-xl-4">
									<div class="submit-field">
										<h5>name</h5>
										<input type="text" class="with-border" name="name" value="{{$uniLife->name}}">
										@if ($errors->has('name'))
										<div class="text-danger">{{ $errors->first('name') }}</div>
										@endif
									</div>
								</div>
								{{-- link --}}
								<div class="col-xl-4">
									<div class="submit-field">
										<h5> link <span>starts with https://</span> </h5>
										<input type="text" class="with-border" name="link" value="{{$uniLife->link}}">
										@if ($errors->has('link'))
										<div class="text-danger">{{ $errors->first('link') }}</div>
										@endif
									</div>
								</div>
							</div>
						</div>
				</div>
			</div>

			<div class="col-xl-12">
				<button type="submit" class="button ripple-effect big margin-top-30 margin-bottom-30" id="submitButton"><i class="icon-feather-plus"></i> update</button>
			</div>
			</form>

		</div>
		<!-- Row / End -->

	</div>
</div>

<script>
	var submit = false;
	$('#submitButton').on("click", function() {
		submit = true;
		document.getElementById("hiddenInput").value = document.getElementById("skills").innerText;

		$('#addUser').submit();
	});

	$('#addUser').submit(function() {

		if (submit == false)
			return false;
		else
			return true;
	});
</script>

@endsection