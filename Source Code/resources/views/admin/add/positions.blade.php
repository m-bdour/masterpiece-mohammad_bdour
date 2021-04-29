@extends('layout.admin')
@section("title")
<title>Qorrah | Add position</title>
<meta name="description" content="Online Appointments Registeration system for book driving lessons">
@endsection
@section('adminContent')

<div class="dashboard-content-container" data-simplebar>
	<div class="dashboard-content-inner">

		<!-- Dashboard Headline -->
		<div class="dashboard-headline">
			<h3>add a Position</h3>

			<!-- Breadcrumbs -->
			<nav id="breadcrumbs" class="dark">
				<ul>
					<li><a href="/">Home</a></li>
					<li><a href="{{"/admin/dashboard"}}">Dashboard</a></li>
					<li>add Position</li>
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
						<h3><i class="icon-feather-folder-plus"></i> Position Submission Form</h3>
					</div>

					<form id="addPosition" action="/admin/position" method="post" enctype="multipart/form-data">
						{{ csrf_field() }}
						<div class="content with-padding padding-bottom-10">
							<div class="row">

								{{-- name --}}
								<div class="col-xl-4">
									<div class="submit-field">
										<h5> name <span>{{"(required)"}}</span> </h5>
										<input type="text" class="with-border" name="name" value="{{ old('name') }}">
										@if ($errors->has('name'))
										<div class="text-danger">{{ $errors->first('name') }}</div>
										@endif
									</div>
								</div>
								{{-- title --}}
								<div class="col-xl-4">
									<div class="submit-field">
										<h5>Title</h5>
										<input type="text" class="with-border" name="title" value="{{ old('title') }}">
										@if ($errors->has('title'))
										<div class="text-danger">{{ $errors->first('title') }}</div>
										@endif
									</div>
								</div>
								{{-- type --}}
								<div class="col-xl-4">
									<div class="submit-field">
										<h5>type</h5>
										<select class="selectpicker with-border" name="type" value="{{ old('type') }}" data-size="4" data-live-search="true" title="Select Job Type">
											<option disabled value='select type'>select type</option>
											<option value='Full time Paid'>Full time Paid</option>
											<option value='Full time Unpaid'>Full time Unpaid</option>
											<option value='Part time Paid'>Part time Paid</option>
											<option value='Part time Unpaid'>Part time Unpaid</option>
										</select>
										@if ($errors->has('city'))
										<div class="text-danger">{{ $errors->first('city') }}</div>
										@endif
									</div>
								</div>
								{{-- city --}}
								<div class="col-xl-4">
									<div class="submit-field">
										<h5>city</h5>
										<select class="selectpicker with-border" name="city" value="{{ old('city') }}" data-size="4" data-live-search="true" title="Select Job Type">
											<option disabled value='select type'>select type</option>
											<option value='Amman'>Amman</option>
											<option value='Irbid'>Irbid</option>
											<option value='Zarqa'>Zarqa</option>
											<option value='Ajloun'>Ajloun</option>
											<option value='Jerash'>Jerash</option>
											<option value='Salt'>Salt</option>
											<option value='Mafraq'>Mafraq</option>
											<option value='Karak'>Karak</option>
											<option value="Ma'an">Ma'an</option>
											<option value='Madaba'>Madaba</option>
											<option value='Tafilah'>Tafilah</option>
											<option value='Aqaba'>Aqaba</option>
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
												<input id="autocomplete-input" class="with-border" name="address" value="{{ old('address') }}" type="text" placeholder="Type Address">
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
											<p class="hiddenValue hiddenElement" id="skills">hi</p>
											<div class="keywords-list">
												<!-- keywords go here -->
											</div>
											<div class="clearfix"></div>
										</div>

									</div>
								</div>
								{{-- major --}}
								<div class="col-xl-4">
									<div class="submit-field">
										<h5> Majors  <span>{{"(required)"}}</span></h5>
										<select class="selectpicker with-border" id="majorSelect" data-live-search="true" name="majors[]" id="majors" data-size="4" value="{{ old('majors') }}" title="select multi majors" multiple>
											<option disabled value='select major'>select multi majors</option>
											@foreach($majors as $major)
											<option class="batata" value="{{$major->major}}">{{$major->major}}
											</option>
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
										<h5>company  <span>{{"(required)"}}</span></h5>
										<select class="selectpicker with-border" id="majorSelect" data-live-search="true" name="user_id" data-size="4" value="{{ old('user_id') }}" title="Select company ">
											<option disabled value='select company'>select company</option>
											@foreach($companies as $company)
											<option class="batata" value={{$company->user_id}}>{{$company->name}}
											</option>
											@endforeach
										</select>
										@if ($errors->has('user_id'))
										<div class="text-danger">{{ $errors->first('user_id') }}</div>
										@endif
									</div>
								</div>
								{{-- status --}}
								<div class="col-xl-4">
									<div class="submit-field">
										<h5>Status</h5>
										<select class="selectpicker with-border"  data-live-search="true" name="status" data-size="4" value="{{ old('status') }}" title="Select Status ">
											<option disabled value='select Status'>select Status</option>
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
								{{-- cover Image --}}
								<div class=" col-xl-4 addImage">
									<div id="cover" class="image">
									<div class="dashes"></div>
									<label>add cover</label>
									</div>
									<p>Add cover image</p>
									<input type="file" id="mediaFileCover" name="cover" class="mediaFile"  />
								</div>								
								{{-- About + attachments --}}
								<div class="col-xl-12">
									<div class="submit-field">
										<h5>about</h5>
										<textarea cols="30" rows="5" name="about" class="with-border"></textarea>
										<div class="uploadButton margin-top-30">
											<input class="uploadButton-input" type="file" name='attachment' accept="image/*, application/pdf" id="upload" />
											<label class="uploadButton-button ripple-effect" for="upload">Add
												attachment</label>
											<span class="uploadButton-file-name">No file added</span>
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