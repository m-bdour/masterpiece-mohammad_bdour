@extends('layout.admin')
@section("title")
<title>Qorrah | Edit position</title>
<meta name="description" content="a platform that provides the link between students who are looking for specialized training
 with institutions that have training vacancies">
@endsection
@section('adminContent')

<div class="dashboard-content-container" data-simplebar>
	<div class="dashboard-content-inner">

		<!-- Dashboard Headline -->
		<div class="dashboard-headline">
			<h3>edit a Position</h3>

			<!-- Breadcrumbs -->
			<nav id="breadcrumbs" class="dark">
				<ul>
					<li><a href="/">Home</a></li>
					<li><a href="{{"/admin/dashboard"}}">Dashboard</a></li>
					<li>edit Position</li>
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
						<h3><i class="icon-feather-folder-plus"></i> Position edit Form</h3>
					</div>

					<form id="addPosition" action="/admin/position/{{$position->position_id}}/update" method="post" enctype="multipart/form-data">
						{{ csrf_field() }}
						@method('PATCH')
						<div class="content with-padding padding-bottom-10">
							<div class="row">

								{{-- name --}}
								<div class="col-xl-4">
									<div class="submit-field">
										<h5> name</h5>
										<input type="text" class="with-border" name="name" value="{{ $position->name }}">
										@if ($errors->has('name'))
										<div class="text-danger">{{ $errors->first('name') }}</div>
										@endif
									</div>
								</div>
								{{-- title --}}
								<div class="col-xl-4">
									<div class="submit-field">
										<h5>Title</h5>
										<input type="text" class="with-border" name="title" value="{{ $position->title }}">
										@if ($errors->has('title'))
										<div class="text-danger">{{ $errors->first('title') }}</div>
										@endif
									</div>
								</div>
								{{-- type --}}
								<div class="col-xl-4">
									<div class="submit-field">
										<h5>type</h5>
										<select class="selectpicker with-border" name="type" value="{{ $position->type }}" data-size="4"  >
											<option disabled value='select type'>select type</option>
											@foreach ($types as $type)
											@if ($position->type == $type)
											<option selected value="{{$type}}">{{$type}}</option>
											@else
											<option value="{{$type}}">{{$type}}</option>
											@endif
											@endforeach
										</select>
										@if ($errors->has('type'))
										<div class="text-danger">{{ $errors->first('type') }}</div>
										@endif
									</div>
								</div>
								{{-- city --}}
								<div class="col-xl-4">
									<div class="submit-field">
										<h5>city</h5>
										<select class="selectpicker with-border" name="city" value="{{ $position->city }}" data-size="4" data-live-search="true">
											<option disabled value='select type'>select city</option>
											@foreach ($cities as $city)
											@if ($position->city == $city)
											<option selected value="{{$city}}">{{$city}}</option>
											@else
											<option value="{{$city}}">{{$city}}</option>
											@endif
											@endforeach
										</select>
										@if ($errors->has('city'))
										<div class="text-danger">{{ $errors->first('city') }}</div>
										@endif
									</div>
								</div>
								{{-- address --}}
								<div class="col-xl-4">
									<div class="submit-field">
										<h5>address</h5>
										<div class="input-with-icon">
											<div id="autocomplete-container">
												<input id="autocomplete-input" class="with-border" name="address" value="{{ $position->address }}" type="text" placeholder="Type Address">
												@if ($errors->has('address'))
												<div class="text-danger">{{ $errors->first('address') }}</div>
												@endif
											</div>
											<i class="icon-material-outline-location-on"></i>
										</div>
									</div>
								</div>
								{{-- skills --}}
								<div class="col-xl-4">
									<div class="submit-field">
										<h5>Skills <i class="help-icon" data-tippy-placement="right" title="Maximum of 20 skills"></i></h5>
										<div class="keywords-container">
											<div class="keyword-input-container">
												<input type="text" class="keyword-input with-border" placeholder="e.g. program, soft skill" />
												<button class="keyword-input-button ripple-effect"><i class="icon-material-outline-add"></i></button>
											</div>
											<input type="hidden" id="hiddenInput" name="skills" class="hiddenValue">
											<p class="hiddenValue hiddenElement" id="skills"> {{ $position->skills }} </p>
											<div class="keywords-list">
												@foreach ($positionSkills as $skill)
												@if ($skill != '')
												<span class='keyword'><span class='keyword-remove'></span><span class='keyword-text'>{{$skill}}</span></span>
												@endif
												@endforeach
												<!-- keywords go here -->
											</div>
											<div class="clearfix"></div>
										</div>

									</div>
								</div>
								{{-- major --}}
								<div class="col-xl-4">
									<div class="submit-field">
										<h5> Majors</h5>
										<select class="selectpicker with-border" id="majorSelect" data-live-search="true" name="majors[]" id="majors" data-size="4" value="{{ $position->positionMajors }}">
											<option disabled value='select major'>select multi majors</option>
											@foreach($majors as $major)
											@if ( in_array($major->major, $positionMajors) )
												
											<option selected class="batata" value="{{$major->major}}">{{$major->major}}
											</option>
											@else
											<option class="batata" value="{{$major->major}}">{{$major->major}}
											</option>
												
											@endif
											@endforeach
										</select>
										@if ($errors->has('majors'))
										<div class="text-danger">{{ $errors->first('majors') }}</div>
										@endif
									</div>
								</div>
								{{-- companies --}}
								<div class="col-xl-4">
									<div class="submit-field">
										<h5>company</h5>
										<select class="selectpicker with-border" data-live-search="true" name="user_id" data-size="4" value="{{ $position->position_id }}">
											<option disabled value='select company'>select company</option>
											@foreach($companies as $company)
											@if ( $company->user_id == $position->User_id )
											<option selected class="batata" value={{$company->user_id}}>{{$company->name}}
											</option>
											@else
											<option class="batata" value={{$company->user_id}}>{{$company->name}}
											</option>
											@endif

											@endforeach
										</select>
										@if ($errors->has('position_id'))
										<div class="text-danger">{{ $errors->first('position_id') }}</div>
										@endif
									</div>
								</div>
								{{-- just a space --}}
								{{-- <div class="col-xl-4">
									<div class="submit-field">
							
									</div>
								</div> --}}
							{{-- cover Image --}}

								{{-- status --}}
								<div class="col-xl-4">
									<div class="submit-field">
										<h5>Status</h5>
										<select class="selectpicker with-border"    name="status" data-size="4" value="{{ $position->status }}"  >
											<option disabled value='select company'>select status</option>
											@foreach($statuss as $Pstatus)
											<option class="batata" value={{$Pstatus}}>{{$Pstatus}}
											</option>
											@endforeach
										</select>
										@if ($errors->has('status'))
										<div class="text-danger">{{ $errors->first('status') }}</div>
										@endif
									</div>
								</div>
								<div class=" col-xl-4 addImage">
									<div id="cover" class="image " style="background-image: url({{asset("assets/images/profile/$position->cover")}})" >
									<div class="dashes"></div>
									<label style="color: #fff ; text-shadow : 0 0 3px #333">Change</label>
									</div>
									<p>Cover image</p>
									<input type="file" id="mediaFileCover" name="cover" class="mediaFile"  />
								</div>
							{{-- About + attachments --}}
							<div class="col-xl-12">
								<div class="submit-field">
									<h5>about</h5>
									<textarea cols="30" rows="5" name="about" class="with-border">{{ $position->about }}</textarea>
									<div class="uploadButton margin-top-30">
										<input class="uploadButton-input" type="file" name='attachment' accept="image/*, application/pdf" id="upload" />
										<label class="uploadButton-button ripple-effect" for="upload">Change
											attachment</label>
										<span class="uploadButton-file-name">{{$position->attachment}}</span>
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