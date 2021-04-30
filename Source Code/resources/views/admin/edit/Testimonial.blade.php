@extends('layout.admin')
@section("title")
<title>Qorrah | Edit testimonial</title>
<meta name="description" content="a platform that provides the link between students who are looking for specialized training
 with institutions that have training vacancies">
@endsection
@section('adminContent')

<div class="dashboard-content-container" data-simplebar>
	<div class="dashboard-content-inner">

		<!-- Dashboard Headline -->
		<div class="dashboard-headline">
			<h3>Edit testimonial</h3>

			<!-- Breadcrumbs -->
			<nav id="breadcrumbs" class="dark">
				<ul>
					<li><a href="/">Home</a></li>
					<li><a href="{{"/admin/dashboard"}}">Dashboard</a></li>
					<li>Edit testimonial</li>
				</ul>
			</nav>
		</div>

		<!-- Row -->
		<div class="row">

			<!-- Dashboard Box -->
			<div class="col-xl-12">
				<div class="dashboard-box margin-top-0 margin-bottom-30">
					<!-- Headline -->
					<div class="headline">
						<h3><i class="icon-feather-folder-plus"></i> Testimonials edit form</h3>
					</div>

						<form id="addPosition" action="/admin/Testimonial/{{$Testimonial->testimonial_id}}/update" method="post" enctype="multipart/form-data">
							{{ csrf_field() }}
							@method('PATCH')

						<div class="content with-padding padding-bottom-10">
							<div class="row">

								{{-- name --}}
								<div class="col-xl-4">
									<div class="submit-field">
										<h5> name <span>{{"(required)"}}</span> </h5>
										<input type="text" class="with-border" name="name" value="{{ $Testimonial->name }}">
										@if ($errors->has('name'))
										<div class="text-danger">{{ $errors->first('name') }}</div>
										@endif
									</div>
								</div>
								{{-- title --}}
								<div class="col-xl-4">
									<div class="submit-field">
										<h5>Title</h5>
										<input type="text" class="with-border" name="title" value="{{ $Testimonial->title }}">
										@if ($errors->has('title'))
										<div class="text-danger">{{ $errors->first('title') }}</div>
										@endif
									</div>
								</div>
								{{-- just a space --}}
								<div class="col-xl-4">
									<div class="submit-field">

									</div>
								</div>
							{{-- Profile Image --}}
							<div class=" col-xl-4 addImage">
								<div id="profile" class="image" style="background-image: url({{asset("assets/images/profile/$Testimonial->image")}})" >
								<div class="dashes"></div>
								<label style="color: #fff ; text-shadow : 0 0 3px #333" >Change</label>
								</div>
								<p class="addProfile" >image</p>
								<input type="file" id="mediaFile" name="profile" class="mediaFile" />
							</div>
								{{-- text --}}
								<div class="col-xl-12">
									<div class="submit-field">
										<h5>Testimonial text</h5>
										<textarea cols="30" rows="5" name="text" class="with-border">{{ $Testimonial->text }}</textarea>
									</div>


								</div>
							</div>

							<div class="col-xl-12">
								<button type="submit" class="button ripple-effect big margin-top-30 margin-bottom-30" id="submitButton"><i class="icon-line-awesome-pencil-square"></i> Update</button>
							</div>
					</form>

				</div>
				<!-- Row / End -->

			</div>
		</div>

			</div>

		<script>
			var submit = false;
			$('#submitButton').on("click", function() {
				submit = true;

				$('#addPosition').submit();
			});

			$('#addPosition').submit(function() {

				if (submit == false)
					return false;
				else
					return true;
			});
		</script>

		@endsection