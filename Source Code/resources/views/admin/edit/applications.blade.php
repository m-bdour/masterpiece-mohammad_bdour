@extends('layout.admin')
@section("title")
<title>Qorrah | Edit Application</title>
<meta name="description" content="a platform that provides the link between students who are looking for specialized training
 with institutions that have training vacancies">
@endsection
@section('adminContent')

<div class="dashboard-content-container" data-simplebar>
	<div class="dashboard-content-inner">

		<!-- Dashboard Headline -->
		<div class="dashboard-headline">
			<h3>Edit a Application</h3>

			<!-- Breadcrumbs -->
			<nav id="breadcrumbs" class="dark">
				<ul>
					<li><a href="/">Home</a></li>
					<li><a href="{{"/admin/dashboard"}}">Dashboard</a></li>
					<li>Edit Application</li>
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
						<h3><i class="icon-feather-folder-plus"></i> Application edit Form</h3>
					</div>

					<form id="addApplication" action="/admin/application/{{$application->application_id}}/update" method="post" enctype="multipart/form-data">
						{{ csrf_field() }}
						@method('PATCH')

						<div class="content with-padding padding-bottom-10">
							<div class="row">
								{{-- Posetion --}}
								<div class="col-xl-4">
									<div class="submit-field">
										<h5> Posetions name</h5>
										<select class="selectpicker with-border" id="positionSelect" data-live-search="true" name="Position_id" id="Position_id" data-size="5" value="{{ $application->Position_id }}" >
											<option disabled value='select major'>select position</option>
											@foreach($positions as $position)

											@if ($application->Position_id == $position->position_id)
											<option selected value={{$position->position_id}}>{{$position->name}}
											</option>
											@else
											<option value={{$position->position_id}}>{{$position->name}}
											</option>
											@endif

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
										<h5>User email</h5>
										<select class="selectpicker with-border" id="userSelect" data-live-search="true" name="user_id" data-size="4" value="{{ $application->user_id }}">
											<option disabled value='select user'>select user email</option>
											@foreach($users as $user)
											@if ($application->User_id == $user->user_id)
											<option selected value={{$user->user_id}}>{{$user->email}}
											</option>
											@else
											<option value={{$user->user_id}}>{{$user->email}}
											</option>
											@endif
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
										<select class="selectpicker with-border" name="status" data-size="4" value="{{ $application->status}}">
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
										<h5>coverLetter</h5>
										<textarea cols="30" rows="5" name="coverLetter" class="with-border">{{ $application->coverLetter }}</textarea>
										@if ($errors->has('coverLetter'))
										<div class="text-danger">{{ $errors->first('coverLetter') }}</div>
										@endif
										<div class="uploadButton margin-top-30">
											<input class="uploadButton-input" type="file" name='attachment' accept="image/*, application/pdf" id="upload"  />
											<label class="uploadButton-button ripple-effect" for="upload">Change</label>
											<span class="uploadButton-file-name">{{ $application->attachment }}</span>
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
				<button type="submit" class="button ripple-effect big margin-top-30 margin-bottom-30" id="submitButton"><i class="icon-line-awesome-pencil-square"></i> Update</button>
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