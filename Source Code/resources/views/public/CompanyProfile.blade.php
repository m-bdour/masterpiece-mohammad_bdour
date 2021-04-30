@extends('layout.public')
@section("title")
<title>Qorrah | {{$user->name}} profile</title>
<meta name="description" content="a platform that provides the link between students who are looking for specialized training
 with institutions that have training vacancies">
 <meta name="keywords" content="Qorrah, Company, {{$user->name}} , profile">

@endsection
@section('content')



<!-- Titlebar
================================================== -->
<div class="single-page-header " data-background-image={{asset("assets/images/profile/$user->coverImage")}}>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="single-page-header-inner">
					<div class="left-side">
						<div class="header-image " style="background: none"><img src={{asset("assets/images/profile/$user->image")}} alt="{{$user->name}}"></div>
						<div class="header-details">
							<h3>{{$user->name}} <span>{{$user->title}} </span></h3>
							<ul>
								@if ($user->city)
									
								<li><i class="icon-material-outline-location-on"></i> {{$user->city}}</li>
								@endif

							</ul>
						</div>
					</div>
					<div class="right-side">
						<!-- Breadcrumbs -->
						<nav id="breadcrumbs" class="white">
							<ul>
								<li><a href="/">Home</a></li>
								<li><a href="#">Companies</a></li>
								<li>{{$user->name}}</li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- Page Content
================================================== -->
<div class="container">
	<div class="row">

		<!-- Content -->
		<div class="col-xl-8 col-lg-8 content-right-offset">

			@if (Auth::id() == $user->user_id && Auth::user()->type =='RequestCompany' )
			<div class="notification error closeable margin-bottom-25">
				<p>Please Contact us to Validate your Identity and be able to post visible vacancies <br> and access to all trainees profiles</p>
				<a class="close" href="#"></a>
			</div>
			@endif

			<div class="single-page-section">
				<h3 class="margin-bottom-25">About Company</h3>
				<p>{{$user->about}}</p>
			</div>

			<!-- Boxed List -->
			@if ($positions != null && count($positions) > 0)
			<div class="boxed-list margin-bottom-60">
				<div class="boxed-list-headline">
					<h3><i class="icon-material-outline-business-center"></i> All {{$user->name}} Positions</h3>
				</div>

				<div class="listings-container compact-list-layout">

					<!-- Job Listing -->
					@foreach ($positions as $position)

					@if (Auth::id() == $user->user_id )
					<a href="#small-dialog-3" class=" popup-with-zoom-anim gry ripple-effect  toggelDelete deleteBTN " style="position: absolute ; right: 15px ; float: right ; padding: 25px 35px 0 0;  "><i class="icon-feather-trash-2"></i> Delete</a>

					<div id="small-dialog-3" class=" small-dialog zoom-anim-dialog mfp-hide dialog-with-tabs popupForm">

						<!--Tabs -->

						<div class="notification info closeable" style="height: 14rem">
							<p style="font-size: 1.3rem; margin-right: 6px">Are you sure you want to delete this position?</p>
							<p style="font-size: 1rem; color:red">All it's applications will be deleted too!</p>
							<form style="width: 120px; float:right" action="{{'/position/delete/'. $position->position_id}}" method="get">
								<button type="submit" class="button red ripple-effect"><i class="icon-feather-trash-2"></i> confirm</button>
							</form>
						</div>
					</div>
					@endif




					<a href="{{"/jobs/$position->position_id"}}" class="job-listing">

						@if ($position->status != 'Hidden' && Auth::id() != $user->user_id)
						<!-- Job Listing Details -->
						<div class="job-listing-details">

							<!-- Details -->
							<div class="job-listing-description">
								<h3 class="job-listing-title">{{$position->name}}</h3>

								<!-- Job Listing -->
								<div class="job-listing-footer">
									<ul>
										<li><i class="icon-material-outline-location-on"></i> {{$position->city}}
										</li>
										@if ($position->type)
											
										<li><i class="icon-material-outline-business-center"></i>
											{{$position->type}}
										</li>
										@endif
										@if ( ($date = (strtotime(date("Y-m-d")) - strtotime(explode(" " ,
										$position->created_at)[0]))) < 60*60*24 ) <li><i class="icon-material-outline-access-time"></i> {{'today'}} </li>
											@else
											<li><i class="icon-material-outline-access-time"></i>
												{{ round( ($date)/(60*60*24), 0, PHP_ROUND_HALF_DOWN) . 'd'}}
											</li>
											@endif
											@if ($position->status)
												
											<li><i class="icon-line-awesome-balance-scale"></i> {{$position->status}}
											</li>
											@endif

									</ul>
								</div>
							</div>

						</div>

						@endif

						@if (Auth::id() == $user->user_id )

						<!-- Job Listing Details -->
						<div class="job-listing-details">

							<!-- Details -->
							<div class="job-listing-description">
								<h3 class="job-listing-title">{{$position->name}}</h3>

								<!-- Job Listing -->
								<div class="job-listing-footer">
									<ul>
										<li><i class="icon-material-outline-location-on"></i> {{$position->city}}
										</li>
										<li><i class="icon-material-outline-business-center"></i>
											{{$position->type}}
										</li>
										@if ( ($date = (strtotime(date("Y-m-d")) - strtotime(explode(" " ,
										$position->created_at)[0]))) < 60*60*24 ) <li><i class="icon-material-outline-access-time"></i> {{'today'}} </li>
											@else
											<li><i class="icon-material-outline-access-time"></i>
												{{ round( ($date)/(60*60*24), 0, PHP_ROUND_HALF_DOWN) . 'd'}}
											</li>
											@endif

											<li><i class="icon-feather-folder-plus"></i> {{$position->status}}
											</li>
									</ul>
								</div>
							</div>

						</div>
						@endif

						@endforeach

					</a>

				</div>

			</div>
			@endif
			<!-- Boxed List / End -->
		</div>

		<!-- Sidebar -->
		<div class="col-xl-4 col-lg-4">
			<div class="sidebar-container">

				@if ($errors->any())
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
						<p class="text-danger">{{ $error }}</p>
						@endforeach
					</ul>
				</div>
				@endif


				@if (Auth::id() == $user->user_id )


				@if (Auth::user()->type == 'RequestCompany')

				<a href="#small-dialog-2" class="apply-now-button popup-with-zoom-anim">Contact Us<i class="icon-material-outline-arrow-right-alt"></i></a>

				<div id="small-dialog-2" class="zoom-anim-dialog mfp-hide dialog-with-tabs">

					<!--Tabs -->
					<div class="sign-in-form">

						<ul class="popup-tabs-nav">
							<li><a href="#Position">Contact Us</a></li>
						</ul>

						<div class="popup-tabs-container">

							<!-- Tab -->
							<div class="popup-tab-content" id="Position">

								<!-- Form -->

								<form id="addPosition" action="{{ route('contact') }}" method="post" enctype="multipart/form-data">
									{{ csrf_field() }}
									<div class="content with-padding padding-bottom-10">
										<div class="row">
											{{-- name --}}
											<div class="col-xl-12">
												<div class="submit-field">
													<h5>Name <span>(required)</span></h5>
													<input type="text" class="with-border" name="name" value="{{ $user->name}}">
													@if ($errors->has('name'))
													<div class="text-danger">{{ $errors->first('name') }}</div>
													@endif
												</div>
											</div>
											{{-- email --}}
											<div class="col-xl-12">
												<div class="submit-field">
													<h5>email</h5>
													<input type="email" class="with-border" name="email" value="{{ $user->email }}">
													@if ($errors->has('email'))
													<div class="text-danger">{{ $errors->first('email') }}</div>
													@endif
												</div>
											</div>
											{{-- subject --}}
											<div class="col-xl-12">
												<div class="submit-field">
													<h5>subject</h5>
													<div class="input-with-icon">
														<div id="autocomplete-container">
															<input id="autocomplete-input" class="with-border" name="subject" value="{{ "Company request account" }}" type="text" placeholder="subject">
															@if ($errors->has('subject'))
															<div class="text-danger">{{ $errors->first('subject') }}
															</div>
															@endif
														</div>
														<i class="icon-material-outline-location-on"></i>
													</div>
												</div>
											</div>
											{{-- comments + attachments --}}
											<div class="col-xl-12">
												<div class="submit-field">
													<h5>Comments</h5>
													<textarea cols="30" rows="5" name="comments" class="with-border"></textarea>
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

									<!-- Button -->
									<button class="button full-width button-sliding-icon ripple-effect" id="submitButton" type="submit" form="addPosition">Send<i class="icon-material-outline-arrow-right-alt"></i></button>
								</form>
							</div>

						</div>
					</div>
				</div>

					
				@endif



				<a href="#small-dialog" class="apply-now-button popup-with-zoom-anim">Add position<i class="icon-material-outline-arrow-right-alt"></i></a>

				<div id="small-dialog" class="zoom-anim-dialog mfp-hide dialog-with-tabs popupForm">

					<!--Tabs -->
					<div class="sign-in-form">

						<ul class="popup-tabs-nav">
							<li><a href="#Position">Add Position</a></li>
						</ul>

						<div class="popup-tabs-container">

							<!-- Tab -->
							<div class="popup-tab-content" id="Position">

								<!-- Form -->

								<form id="addPosition" action="/position" method="post" enctype="multipart/form-data">
									{{ csrf_field() }}
									<div class="content with-padding padding-bottom-10">
										<div class="row">

											{{-- name --}}
											<div class="col-xl-4">
												<div class="submit-field">
													<h5>Name <span>(required)</span></h5>
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
													<h5>type </h5>
													<select class="selectpicker with-border" name="type" value="{{ old('type') }}" data-size="4" title="Select Job Type">
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
															<div class="text-danger">{{ $errors->first('address') }}
															</div>
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
													<h5> Majors <span>(required)</span></h5>
													<select class="selectpicker with-border" id="majorSelect" data-live-search="true" name="majors[]" id="majors" data-size="4" value="{{ old('majors') }}" title="select multi majors" multiple>
														<option disabled value='select major'>select multi majors
														</option>
														@foreach($majors as $major)
														<option class="batata" value="{{$major->major}}">
															{{$major->major}}
														</option>
														@endforeach
													</select>
													@if ($errors->has('majors'))
													<div class="text-danger">{{ $errors->first('majors') }}</div>
													@endif
												</div>
											</div>
											{{-- status --}}
											<div class="col-xl-4">
												<div class="submit-field">
													<h5>Status <span>(required)</span></h5>
													<select class="selectpicker with-border" name="status" data-size="4" value="{{ old('status') }}" title="Select Status ">
														<option disabled value='select Status'>select Status</option>
														@if ($user->type != 'company')
														<option class="batata" value={{'Hidden'}}>{{'Hidden'}}
														</option>

														@else

														@foreach($statuss as $Pstatus)
														<option class="batata" value={{$Pstatus}}>{{$Pstatus}}
														</option>
														@endforeach
														@endif
													</select>
													@if ($errors->has('status'))
													<div class="text-danger">{{ $errors->first('status') }}</div>
													@endif
												</div>
											</div>
											{{-- just a space --}}
											<div class="col-xl-4">
												<div class="submit-field">

												</div>
											</div>

											{{-- cover Image --}}
											<div class=" col-xl-4 addImage">
												<div id="cover" class="image">
													<div class="dashes"></div>
													<label>add cover</label>
												</div>
												<p>Add cover image</p>
												<input type="file" id="mediaFileCover" name="cover" class="mediaFile" />
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

											<input type="hidden" name="user_id" value="{{$user->user_id}}">

										</div>
									</div>

									<!-- Button -->
									<button class="button full-width button-sliding-icon ripple-effect" id="submitButton" type="submit" form="addPosition">Add Position<i class="icon-material-outline-arrow-right-alt"></i></button>
								</form>
							</div>

						</div>
					</div>
				</div>

				<a href="#small-dialog-1" class="apply-now-button popup-with-zoom-anim">Edit Profile<i class="icon-material-outline-arrow-right-alt"></i></a>

				<div id="small-dialog-1" class="zoom-anim-dialog mfp-hide dialog-with-tabs popupForm">


					<!--Tabs -->
					<div class="sign-in-form">

						<ul class="popup-tabs-nav">
							<li><a href="#tab">Edit Profile</a></li>
							<li><a href="#pass">Reset password</a></li>
							<li><a href="#images">Images </a></li>
						</ul>

						<div class="popup-tabs-container">


							<div class="popup-tab-content" id="tab">
							<!-- Form -->
							<form id="EditProfile" action="/user/{{$user->user_id}}/update" method="post" enctype="multipart/form-data">
								{{ csrf_field() }}
								@method('PATCH')
								<!-- Tab -->
									<div class="content with-padding padding-bottom-10">
										<div class="row">
											{{-- email --}}
											<div class="col-xl-4">
												<div class="submit-field">
													<h5>email <span>(required)</span></h5>
													<input type="email" class="with-border" name="email" value="{{ $user->email }}" required>
													@if ($errors->has('email'))
													<div class="text-danger">{{ $errors->first('email') }}</div>
													@endif
												</div>
											</div>
											{{-- phone --}}
											<div class="col-xl-4">
												<div class="submit-field">
													<h5>phone</h5>
													<input type="number" class="with-border" name="phone" value="{{ $user->phone }}">
													@if ($errors->has('phone'))
													<div class="text-danger">{{ $errors->first('phone') }}</div>
													@endif
												</div>
											</div>
											{{-- name --}}
											<div class="col-xl-4">
												<div class="submit-field">
													<h5>Name</h5>
													<input type="text" class="with-border" name="name" value="{{ $user->name }}">
													@if ($errors->has('name'))
													<div class="text-danger">{{ $errors->first('name') }}</div>
													@endif
												</div>
											</div>
											{{-- title --}}
											<div class="col-xl-4">
												<div class="submit-field">
													<h5>Title</h5>
													<input type="text" class="with-border" name="title" value="{{ $user->title }}">
													@if ($errors->has('title'))
													<div class="text-danger">{{ $errors->first('title') }}</div>
													@endif
												</div>
											</div>
											{{-- address --}}
											<div class="col-xl-4">
												<div class="submit-field">
													<h5>address</h5>
													<div class="input-with-icon">
														<div id="autocomplete-container">
															<input id="autocomplete-input" class="with-border" name="address" value="{{ $user->address }}" type="text" placeholder="Type Address">
															@if ($errors->has('address'))
															<div class="text-danger">{{ $errors->first('address') }}
															</div>
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
													<select class="selectpicker with-border" name="city" value="{{ $user->city }}" data-size="4" data-live-search="true" title="Select user city">
														<option disabled value='select type'>select city</option>
														@foreach ($cities as $city)
														@if ($user->city == $city)
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
											{{-- About --}}
											<div class="col-xl-12">
												<div class="submit-field">
													<h5>about</h5>
													<textarea cols="30" rows="5" name="about" class="with-border"> {{$user->about}} </textarea>
												</div>
											</div>
											<!-- Button -->
											<button class="button full-width button-sliding-icon ripple-effect" id="submitButtonTab" type="submit" form="EditProfile">Apply edit <i class="icon-material-outline-arrow-right-alt"></i></button>


										</div>
									</div>
								</form>
							</div>

							<div class="popup-tab-content" id="pass">
							<!-- Form -->
							<form id="EditPass" action="/user/{{$user->user_id}}/update" method="post" enctype="multipart/form-data">
								{{ csrf_field() }}
								@method('PATCH')

									<div class="content with-padding padding-bottom-10">
										<div class="row">

											{{-- password --}}
											<div class="col-xl-4">
												<div class="submit-field" title="Should be at least 8 characters long" data-tippy-placement="bottom">
													<h5>New password</h5>
													<input type="password" class="with-border  @error('password') is-invalid @enderror" name="password" id="password-register" autocomplete="new-password" placeholder="Password">
													<div class="text-danger" id="JSPassRepeat"></div>
													@if ($errors->has('password'))
													<div class="text-danger">{{ $errors->first('password') }}</div>
													@endif
												</div>
											</div>
											{{-- repeat password --}}
											<div class="col-xl-4">
												<div class="submit-field" title="Should be at least 8 characters long" data-tippy-placement="bottom">
													<h5>Repeat password </h5>
													<input type="password" class="with-border  @error('password') is-invalid @enderror" name="password_confirmation" id="password-repeat-register" autocomplete="new-password" placeholder="Repeat Password">
												</div>
											</div>
											<!-- Button -->
											<button class="button full-width button-sliding-icon ripple-effect" id="submitButtonPass" type="submit" form="EditPass">Reset Password <i class="icon-material-outline-arrow-right-alt"></i></button>

										</div>
									</div>

								</form>
							</div>

							<div class="popup-tab-content" id="images">
							<!-- Form -->
							<form id="EditImage" action="/user/{{$user->user_id}}/update" method="post" enctype="multipart/form-data">
								{{ csrf_field() }}
								@method('PATCH')

									<div class="content with-padding padding-bottom-10">
										<div class="row">

											{{-- Profile Image --}}
											<div class=" col-xl-4 addImage">
												<div id="profile" class="image " style="background-image: url({{asset("assets/images/profile/$user->image")}})">
													<div class="dashes"></div>
													<label style="color: #fff ; text-shadow : 0 0 3px #333">Change</label>
												</div>
												<p class="addProfile">Profile image</p>
												<input type="file" id="mediaFile" name="profile" class="mediaFile" />
											</div>
											{{-- cover Image --}}
											<div class=" col-xl-4 addImage">
												<div id="cover2" class="image " style="background-image: url({{asset("assets/images/profile/$user->coverImage")}})">
													<div class="dashes"></div>
													<label style="color: #fff ; text-shadow : 0 0 3px #333">Change</label>
												</div>
												<p>Cover image</p>
												<input type="file" id="mediaFileCover2" name="cover" class="mediaFile" />
											</div>

											<!-- Button -->
											<button class="button full-width button-sliding-icon ripple-effect" id="submitButtonImage" type="submit" form="EditImage">Apply edit <i class="icon-material-outline-arrow-right-alt"></i></button>


										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>

				@endif

				<!-- Copy URL -->
				<div class="copy-url">
					<input id="copy-url" type="text" value="" class="with-border">
					<button class="copy-url-button ripple-effect" data-clipboard-target="#copy-url" title="Copy to Clipboard" data-tippy-placement="top"><i class="icon-material-outline-file-copy"></i></button>
				</div>

			</div>
		</div>



	</div>
</div>


<!-- Spacer -->
<div class="margin-top-15"></div>
<!-- Spacer / End-->



<script>
	var submit = false;

	$('#submitButton').on("click", function() {
		console.log("batata");
		document.getElementById("hiddenInput").value = document.getElementById("skills").innerText;
		submit = true;
		$('#addPosition').submit();
	});
	$('#addPosition').submit(function() {
		console.log("kiar");

		if (submit == false)
			return false;
		else
			return true;
	});

	$('#submitButtonTab').on("click", function() {
		console.log("batata");
		submit = true;
		$('#EditTab').submit();
	});
	$('#EditTab').submit(function() {
		console.log("kiar");
		if (submit == false)
			return false;
		else
			return true;
	});

	$('#submitButtonPass').on("click", function() {
		if($("#password-repeat-register").val() == $("#password-register").val()) {
		submit = true;
		$('#EditPass').submit();
		}else {
			document.getElementById("JSPassRepeat").innerText =  'Password confirmation does not match';;
		}
	});
	$('#EditPass').submit(function() {

		if (submit == false)
			return false;
		else
			return true;
	});

	$('#submitButtonImage').on("click", function() {
		console.log("batata");
		submit = true;
		$('#EditImage').submit();
	});
	$('#EditImage').submit(function() {
		console.log("kiar");

		if (submit == false)
			return false;
		else
			return true;
	});


	$('#mediaFileCover').on('change', function() {
		let file = $('#mediaFileCover').val();
	})
	$('#mediaFileCover2').on('change', function() {
		let file = $('#mediaFileCover2').val();
	})
</script>





@endsection