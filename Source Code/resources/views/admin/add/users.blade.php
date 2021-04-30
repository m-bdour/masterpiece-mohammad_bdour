@extends('layout.admin')
@section("title")
<title>Qorrah | Add user</title>
<meta name="description" content="a platform that provides the link between students who are looking for specialized training
 with institutions that have training vacancies">
@endsection
@section('adminContent')

<div class="dashboard-content-container" data-simplebar>
	<div class="dashboard-content-inner">

		<!-- Dashboard Headline -->
		<div class="dashboard-headline">
			<h3>add a user</h3>

			<!-- Breadcrumbs -->
			<nav id="breadcrumbs" class="dark">
				<ul>
					<li><a href="/">Home</a></li>
					<li><a href="{{"/admin/dashboard"}}">Dashboard</a></li>
					<li>add user</li>
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
						<h3><i class="icon-feather-folder-plus"></i> User Submission Form</h3>
					</div>

					<form id="addUser" action="/admin/user" method="post" enctype="multipart/form-data">
						{{ csrf_field() }}
						<div class="content with-padding padding-bottom-10">
							<div class="row">
								{{-- email --}}
								<div class="col-xl-4">
									<div class="submit-field">
										<h5>email <span>(required)</span></h5>
										<input type="email" class="with-border" name="email" value="{{ old('email') }}" required>
										@if ($errors->has('email'))
										<div class="text-danger">{{ $errors->first('email') }}</div>
										@endif
									</div>
								</div>
								{{-- password --}}
								<div class="col-xl-4">
									<div class="submit-field">
										<h5>password <span>(required)</span></h5>
										<input type="password" class="with-border" name="password" value="{{ old('password') }}" required>
										@if ($errors->has('password'))
										<div class="text-danger">{{ $errors->first('password') }}</div>
										@endif
									</div>
								</div>
								{{-- phone --}}
								<div class="col-xl-4">
									<div class="submit-field">
										<h5>phone</h5>
										<input type="number" class="with-border" name="phone" value="{{ old('phone') }}">
										@if ($errors->has('phone'))
										<div class="text-danger">{{ $errors->first('phone') }}</div>
										@endif
									</div>
								</div>
								{{-- name --}}
								<div class="col-xl-4">
									<div class="submit-field">
										<h5>first name</h5>
										<input type="text" class="with-border" name="name" value="{{ old('name') }}">
										@if ($errors->has('name'))
										<div class="text-danger">{{ $errors->first('name') }}</div>
										@endif
									</div>
								</div>
								{{-- lname --}}
								<div class="col-xl-4">
									<div class="submit-field">
										<h5>last name</h5>
										<input type="text" class="with-border" name="lname" value="{{ old('lname') }}">
										@if ($errors->has('lname'))
										<div class="text-danger">{{ $errors->first('lname') }}</div>
										@endif
									</div>
								</div>
								{{-- title --}}
								<div class="col-xl-4">
									<div class="submit-field">
										<h5>title</h5>
										<input type="text" class="with-border" name="title" value="{{ old('title') }}">
										@if ($errors->has('title'))
										<div class="text-danger">{{ $errors->first('title') }}</div>
										@endif
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
											<p class="hiddenValue hiddenElement" id="skills"></p>
											<div class="keywords-list">
												<!-- keywords go here -->
											</div>
											<div class="clearfix"></div>
										</div>

									</div>
								</div>
								{{-- nationality --}}
								<div class="col-xl-4">
									<div class="submit-field">
										<h5>nationality</h5>
										<input type="text" class="with-border" name="nationality" value="{{ old('nationality') }}">
										@if ($errors->has('nationality'))
										<div class="text-danger">{{ $errors->first('nationality') }}</div>
										@endif
									</div>
								</div>
								{{-- linkedin --}}
								<div class="col-xl-4">
									<div class="submit-field">
										<h5>linkedin</h5>
										<input type="text" class="with-border" name="linkedin" value="{{ old('linkedin') }}">
										@if ($errors->has('linkedin'))
										<div class="text-danger">{{ $errors->first('linkedin') }}</div>
										@endif
									</div>
								</div>
								{{-- github --}}
								<div class="col-xl-4">
									<div class="submit-field">
										<h5>github</h5>
										<input type="text" class="with-border" name="github" value="{{ old('github') }}">
										@if ($errors->has('github'))
										<div class="text-danger">{{ $errors->first('github') }}</div>
										@endif
									</div>
								</div>
								{{-- twitter --}}
								<div class="col-xl-4">
									<div class="submit-field">
										<h5>twitter</h5>
										<input type="text" class="with-border" name="twitter" value="{{ old('twitter') }}">
										@if ($errors->has('twitter'))
										<div class="text-danger">{{ $errors->first('twitter') }}</div>
										@endif
									</div>
								</div>
								{{-- behance --}}
								<div class="col-xl-4">
									<div class="submit-field">
										<h5>behance</h5>
										<input type="text" class="with-border" name="behance" value="{{ old('behance') }}">
										@if ($errors->has('behance'))
										<div class="text-danger">{{ $errors->first('behance') }}</div>
										@endif
									</div>
								</div>
								{{-- portfolio --}}
								<div class="col-xl-4">
									<div class="submit-field">
										<h5>portfolio</h5>
										<input type="text" class="with-border" name="portfolio" value="{{ old('portfolio') }}">
										@if ($errors->has('portfolio'))
										<div class="text-danger">{{ $errors->first('portfolio') }}</div>
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
								{{-- city --}}
								<div class="col-xl-4">
									<div class="submit-field">
										<h5>city</h5>
										<select class="selectpicker with-border" name="city" value="{{ old('city') }}" data-size="4" data-live-search="true" title="Select user city">
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
								{{-- uni --}}
								<div class="col-xl-4">
									<div class="submit-field">
										<h5>University name</h5>
										<input type="text" class="with-border" name="uni" value="{{ old('uni') }}">
										@if ($errors->has('uni'))
										<div class="text-danger">{{ $errors->first('uni') }}</div>
										@endif
									</div>
								</div>

								{{-- major --}}
								<div class="col-xl-4">
									<div class="submit-field">
										<h5>user major</h5>
										<select class="selectpicker with-border" id="majorSelect" data-live-search="true" name="major_id" data-size="4" value="{{ old('major_id') }}" title="Select user major">
											<option disabled value='select major'>select major</option>
											@foreach($majors as $major)
											<option class="batata" value={{$major->major_id}}>{{$major->major}}
											</option>
											@endforeach
										</select>
										@if ($errors->has('major_id'))
										<div class="text-danger">{{ $errors->first('major_id') }}</div>
										@endif
									</div>
								</div>
								{{-- type --}}
								<div class="col-xl-4">
									<div class="submit-field">
										<h5>user type</h5>
										<select class="selectpicker with-border" name="type" value="{{ old('type') }}" data-size="4" title="Select user Type">
											<option value='user' selected>user</option>
											<option value='admin'>admin</option>
											<option value='company'>company</option>
											<option value='RequestCompany'>company request</option>
										</select>
										@if ($errors->has('type'))
										<div class="text-danger">{{ $errors->first('type') }}</div>
										@endif
									</div>
								</div>

							{{-- Profile Image --}}
							<div class=" col-xl-4 addImage">
								<div id="profile" class="image">
								<div class="dashes"></div>
								<label>add photo</label>
								</div>
								<p class="addProfile" >profile photo</p>
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
							{{-- About + attachments --}}
								<div class="col-xl-12">
									<div class="submit-field">
										<h5>about</h5>
										<textarea cols="30" rows="5" name="about" class="with-border"></textarea>
										<div class="uploadButton margin-top-30">
											<input class="uploadButton-input" type="file" name='cv' accept="image/*, application/pdf" id="upload" />
											<label class="uploadButton-button ripple-effect" for="upload">Add CV</label>
											<span class="uploadButton-file-name">No file added</span>
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