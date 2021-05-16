@extends('layout.admin')
@section("title")
<title>Qorrah | Add college</title>
<meta name="description" content="a platform that provides the link between students who are looking for specialized training
 with institutions that have training vacancies">
@endsection
@section('adminContent')

<div class="dashboard-content-container" data-simplebar>
	<div class="dashboard-content-inner">

		<!-- Dashboard Headline -->
		<div class="dashboard-headline">
			<h3>add a college</h3>

			<!-- Breadcrumbs -->
			<nav id="breadcrumbs" class="dark">
				<ul>
					<li><a href="/">Home</a></li>
					<li><a href="{{"/admin/dashboard"}}">Dashboard</a></li>
					<li>add college</li>
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
						<h3><i class="icon-feather-folder-plus"></i> college Submission Form</h3>
					</div>

					<form id="addUser" action="/admin/college" method="post" enctype="multipart/form-data">
						{{ csrf_field() }}
						<div class="content with-padding padding-bottom-10">
							<div class="row">
								{{-- name --}}
								<div class="col-xl-4">
									<div class="submit-field">
										<h5>college name</h5>
										<input type="text" class="with-border" name="name" value="{{ old('name') }}">
										@if ($errors->has('name'))
										<div class="text-danger">{{ $errors->first('name') }}</div>
										@endif
									</div>
								</div>
								{{-- Ename --}}
								<div class="col-xl-4">
									<div class="submit-field">
										<h5>English name</h5>
										<input type="text" class="with-border" name="Ename" value="{{ old('Ename') }}">
										@if ($errors->has('Ename'))
										<div class="text-danger">{{ $errors->first('Ename') }}</div>
										@endif
									</div>
								</div>
								{{-- just a space --}}
								<div class="col-xl-4">
									<div class="submit-field">
									</div>
								</div>
								{{--  Image --}}
								<div class=" col-xl-4 addImage">
									<div id="profile" class="image">
									<div class="dashes"></div>
									<label>add photo</label>
									</div>
									<p class="addProfile" > photo</p>
									<input type="file" id="mediaFile" name="profile" class="mediaFile" />
								</div>
								{{-- cover Image --}}
								<div class=" col-xl-4 addImage">
									<div id="cover" class="image">
									<div class="dashes"></div>
									<label>add cover</label>
									</div>
									<p>cover image</p>
									<input type="file" id="mediaFileCover" name="cover" class="mediaFile"  />
								</div>
								{{-- just a space --}}
								<div class="col-xl-4">
									<div class="submit-field">
									</div>
								</div>								
								{{-- title --}}
								<div class="col-xl-4">
									<div class="submit-field">
										<h5>title <i class="help-icon" data-tippy-placement="right" title="For SEO"></i></h5>
										<input type="text" class="with-border" name="title" value="{{ old('title') }}">
										@if ($errors->has('title'))
										<div class="text-danger">{{ $errors->first('title') }}</div>
										@endif
									</div>
								</div>
								{{-- keywords --}}
								<div class="col-xl-4">
									<div class="submit-field">
										<h5>keywords <i class="help-icon" data-tippy-placement="right" title="For SEO"></i></h5>
										<div class="keywords-container">
											<div class="keyword-input-container">
												<input type="text" class="keyword-input with-border" placeholder="e.g. program, soft skill" />
												<button class="keyword-input-button ripple-effect"><i class="icon-material-outline-add"></i></button>
											</div>
											<input type="hidden" id="hiddenInput" name="keywords" class="hiddenValue">
											<p class="hiddenValue hiddenElement" id="skills"></p>
											<div class="keywords-list">
												<!-- keywords go here -->
											</div>
											<div class="clearfix"></div>
										</div>

									</div>
								</div>
								{{-- description  --}}
								<div class="col-xl-12">
									<div class="submit-field">
										<h5>description <i class="help-icon" data-tippy-placement="right" title="For SEO"></i></h5>
										<textarea name="description" class="tinymce"></textarea>
									</div>
								</div>
								{{-- about  --}}
								<div class="col-xl-12">
									<div class="submit-field">
										<h5>about</h5>
										<textarea name="about" class="tinymce"></textarea>
									</div>
								</div>

							</div>
						</div>
				</div>
			</div>

			<div class="col-xl-12">
				<button type="submit" class="button ripple-effect big margin-top-30 margin-bottom-30" id="submitButton"><i class="icon-feather-plus"></i> add</button>
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