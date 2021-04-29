@extends('layout.admin')
@section("title")
<title>Qorrah | Add Application</title>
<meta name="description" content="Online Appointments Registeration system for book driving lessons">
@endsection
@section('adminContent')

<div class="dashboard-content-container" data-simplebar>
	<div class="dashboard-content-inner">

		<!-- Dashboard Headline -->
		<div class="dashboard-headline">
			<h3>add a Application</h3>

			<!-- Breadcrumbs -->
			<nav id="breadcrumbs" class="dark">
				<ul>
					<li><a href="/">Home</a></li>
					<li><a href="{{"/admin/dashboard"}}">Dashboard</a></li>
					<li>add Application</li>
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
						<h3><i class="icon-feather-folder-plus"></i> Application Submission Form</h3>
					</div>

					<form id="addApplication" action="/admin/application" method="post" enctype="multipart/form-data">
						{{ csrf_field() }}
						<div class="content with-padding padding-bottom-10">
							<div class="row">
								{{-- Posetion --}}
								<div class="col-xl-4">
									<div class="submit-field">
										<h5> Posetions name  <span>{{"(required)"}}</span></h5>
										<select class="selectpicker with-border" id="positionSelect" data-live-search="true" name="Position_id" id="Position_id" data-size="5" value="{{ old('Position_id') }}" title="select position" >
											<option disabled value='select major'>select position</option>
											@foreach($positions as $position)
											<option value={{$position->position_id}}>{{$position->name}}
											</option>
											@endforeach
										</select>
										@if ($errors->has('Position_id'))
										<div class="text-danger">{{ $errors->first('Position_id') }}</div>
										@endif
									</div>
								</div>	
								{{-- users --}}
								<div class="col-xl-4">
									<div class="submit-field">
										<h5>User email <span>{{"(required)"}}</span></h5>
										<select class="selectpicker with-border" id="userSelect" data-live-search="true" name="user_id" data-size="4" value="{{ old('user_id') }}" title="Select user ">
											<option disabled value='select user'>select user email</option>
											@foreach($users as $user)
											<option value={{$user->user_id}}>{{$user->email}}
											</option>
											@endforeach
										</select>
										@if ($errors->has('user_id'))
										<div class="text-danger">{{ $errors->first('user_id') }}</div>
										@endif
									</div>
								</div>								
								{{-- status--}}
								<div class="col-xl-4">
									<div class="submit-field">
										<h5>Status</h5>
										<select class="selectpicker with-border" name="status" data-size="4" value="{{ old('status') }}" title="Select Status ">
											<option disabled value='select user'>select Status</option>
											@foreach($status as $Status)
											<option value={{$Status}}>{{$Status}}
											</option>
											@endforeach
										</select>
										@if ($errors->has('status'))
										<div class="text-danger">{{ $errors->first('status') }}</div>
										@endif
									</div>
								</div>								
								{{-- coverLetter + attachments --}}
								<div class="col-xl-12">
									<div class="submit-field">
										<h5>Cover Letter</h5>
										<textarea cols="30" rows="5" name="coverLetter" class="with-border"></textarea>
										@if ($errors->has('coverLetter'))
										<div class="text-danger">{{ $errors->first('coverLetter') }}</div>
										@endif
										<div class="uploadButton margin-top-30">
											<input class="uploadButton-input" type="file" name='attachment' accept="image/*, application/pdf" id="upload" />
											<label class="uploadButton-button ripple-effect" for="upload">Add attachment</label>
											<span class="uploadButton-file-name">No file added</span>
											@if ($errors->has('attachment'))
											<div class="text-danger">{{ $errors->first('attachment') }}</div>
											@endif
										</div>
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

		$('#addApplication').submit();
	});

	$('#addApplication').submit(function() {

		if (submit == false)
			return false;
		else
			return true;
	});
</script>

@endsection