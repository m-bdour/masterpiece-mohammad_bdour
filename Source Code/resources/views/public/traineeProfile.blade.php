@extends('layout.public')
@section("title")
<title>Qorrah | {{$user->name}} Profile</title>
<meta name="description" content="a platform that provides the link between students who are looking for specialized training
 with institutions that have training vacancies">
 <meta name="keywords" content="Qorrah, Profile, {{$user->name}} , Training">

@endsection
@section('content')


<!-- Titlebar
================================================== -->
<div class="single-page-header freelancer-header" data-background-image={{asset("assets/images/profile/$user->coverImage")}}>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="single-page-header-inner">
					<div class="left-side">
						<div class="header-image freelancer-avatar"><img src={{asset("assets/images/profile/$user->image")}} alt="{{$user->name}}"></div>
						<div class="header-details">
							<h3> {{$user->name}} {{$user->lname}} <span>{{$user->title}} </span></h3>
							<ul>
								@if ($user->city)
								<li><i class="icon-material-outline-location-on"></i> {{$user->city}}</li>
								@endif
								@if ($user->uni)
								<li><i class="icon-line-awesome-university"></i> {{$user->uni}}</li>
								@endif
								@foreach ($myMajor as $Major)

								@if ($Major->major)
								<li><i class="icon-material-outline-school"></i> {{$Major->major}}</li>
								@endif
								@endforeach
							</ul>
						</div>
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

			<!-- Page Content -->
			<div class="single-page-section">
				<h3 class="margin-bottom-25">About Me</h3>
				<p>{{$user->about}}</p>
			</div>

			@if (Auth::id() == $user->user_id)

			<!-- Boxed List -->
			@if (count($applications) >0 )
			<div class="boxed-list margin-bottom-60">
				<div class="boxed-list-headline">
					<h3><i class="icon-material-outline-business-center"></i> All my {{count($applications)}} applications</h3>
				</div>

				<div class="listings-container compact-list-layout">

					<!-- Job Listing -->
					@foreach ($applications as $application)


					@if (Auth::id() == $user->user_id )
					<a href="#small-dialog-1" class=" popup-with-zoom-anim gry ripple-effect  toggelDelete deleteBTN " style="position: absolute ; right: 15px ; float: right ; padding: 25px 35px 0 0;  "><i class="icon-feather-trash-2"></i> Delete</a>

					<div id="small-dialog-1" class=" small-dialog zoom-anim-dialog mfp-hide dialog-with-tabs popupForm">

						<!--Tabs -->

						<div class="notification info closeable" style="height: 10rem">
							<p style="font-size: 1.3rem">Are you sure you want to delete this application?</p>
							<form style="width: 120px; float:right" action="{{'/application/delete/'. $application->application_id}}" method="get">
								<button type="submit" class="button red ripple-effect"><i class="icon-feather-trash-2"></i> confirm</button>
							</form>
						</div>
					</div>
					@endif


					<a class="job-listing">
						<!-- Job Listing Details -->
						<div class="job-listing-details">

							<!-- Details -->
							<div class="job-listing-description">
								<h3 class="job-listing-title">{{$application->position_name}}</h3>

								<!-- Job Listing -->
								<div class="job-listing-footer">
									<ul>
										<li><i class="icon-material-outline-business-center"></i> {{$application->position_type}}</li>
										@if ( ($date = (strtotime(date("Y-m-d")) - strtotime(explode(" " , $application->created_at)[0]))) < 60*60*24 ) <li><i class="icon-material-outline-access-time"></i> {{'today'}} </li>
											@else
											<li><i class="icon-material-outline-access-time"></i> {{ round( ($date)/(60*60*24), 0, PHP_ROUND_HALF_DOWN) . 'd'}}</li>
											@endif
											<li><i class="icon-line-awesome-balance-scale"></i> {{$application->status}}</li>

											@if ($application->attachment)

											<form class="inline" method="GET">
												<input type="hidden" name="id" value="{{$application->attachment }}">
												<button formaction={{ route('download') }}>
													<li><i class="icon-material-outline-attach-file">
														</i>
														Attachments
												</button>
											</form>
											@endif


											</li>


									</ul>

									<!-- About -->
									<div class="accordion js-accordion margin-top-10">

										<div class="accordion__item js-accordion-item">
											<div class="accordion-header js-accordion-header">{{"Cover Letter"}}</div>

											<!-- Accordtion Body -->
											<div class="accordion-body js-accordion-body">

												<!-- Accordion Content -->
												<div class="accordion-body__contents">
													{{$application->coverLetter}}
												</div>

											</div>
											<!-- Accordion Body / End -->
										</div>
									</div>
									<!-- About / End -->


								</div>
							</div>

						</div>

						@endforeach

					</a>

				</div>

			</div>
			@endif
			<!-- Boxed List / End -->

			@endif

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

				<a href="#small-dialog" class="apply-now-button popup-with-zoom-anim">Edit Profile<i class="icon-material-outline-arrow-right-alt"></i></a>

				<div id="small-dialog" class="zoom-anim-dialog mfp-hide dialog-with-tabs popupForm">


					<!--Tabs -->
					<div class="sign-in-form">

						<ul class="popup-tabs-nav">
							<li><a href="#tab">Personal </a></li>
							<li><a href="#pass">General</a></li>
							<li><a href="#About">About </a></li>
							<li><a href="#Social">Social </a></li>
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

											{{-- name --}}
											<div class="col-xl-4">
												<div class="submit-field">
													<h5>first name</h5>
													<input type="text" class="with-border" name="name" value="{{ $user->name }}">
													@if ($errors->has('name'))
													<div class="text-danger">{{ $errors->first('name') }}</div>
													@endif
												</div>
											</div>
											{{-- lname --}}
											<div class="col-xl-4">
												<div class="submit-field">
													<h5>last name</h5>
													<input type="text" class="with-border" name="lname" value="{{ $user->lname }}">
													@if ($errors->has('lname'))
													<div class="text-danger">{{ $errors->first('lname') }}</div>
													@endif
												</div>
											</div>
											{{-- title --}}
											<div class="col-xl-4">
												<div class="submit-field">
													<h5>title</h5>
													<input type="text" class="with-border" name="title" value="{{ $user->title }}">
													@if ($errors->has('title'))
													<div class="text-danger">{{ $errors->first('title') }}</div>
													@endif
												</div>
											</div>
											{{-- nationality --}}
											<div class="col-xl-4">
												<div class="submit-field">
													<h5>nationality</h5>
													<input type="text" class="with-border" name="nationality" value="{{ $user->nationality }}">
													@if ($errors->has('nationality'))
													<div class="text-danger">{{ $errors->first('nationality') }}</div>
													@endif
												</div>
											</div>


											<!-- Button -->
											<button class="button full-width button-sliding-icon ripple-effect" id="submitButtonTab" type="submit" form="EditProfile">Update<i class="icon-material-outline-arrow-right-alt"></i></button>


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
											{{-- just a space --}}
											<div class="col-xl-4">
												<div class="submit-field">

												</div>
											</div>
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
											<button class="button full-width button-sliding-icon ripple-effect" id="submitButtonPass" type="submit" form="EditPass">Update<i class="icon-material-outline-arrow-right-alt"></i></button>

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
												<div id="cover" class="image " style="background-image: url({{asset("assets/images/profile/$user->coverImage")}})">
													<div class="dashes"></div>
													<label style="color: #fff ; text-shadow : 0 0 3px #333">Change</label>
												</div>
												<p>Cover image</p>
												<input type="file" id="mediaFileCover" name="cover" class="mediaFile" />
											</div>

											<!-- Button -->
											<button class="button full-width button-sliding-icon ripple-effect" id="submitButtonImage" type="submit" form="EditImage">Update<i class="icon-material-outline-arrow-right-alt"></i></button>


										</div>
									</div>
								</form>
							</div>
							<div class="popup-tab-content" id="About">
								<!-- Form -->
								<form id="EditAbout" action="/user/{{$user->user_id}}/update" method="post" enctype="multipart/form-data">
									{{ csrf_field() }}
									@method('PATCH')

									<div class="content with-padding padding-bottom-10">
										<div class="row">

											{{-- address --}}
											<div class="col-xl-4">
												<div class="submit-field">
													<h5>address</h5>
													<div class="input-with-icon">
														<div id="autocomplete-container">
															<input id="autocomplete-input" class="with-border" name="address" value="{{ $user->address }}" type="text" placeholder="Type Address">
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
											{{-- major --}}
											<div class="col-xl-4">
												<div class="submit-field">
													<h5>user major </h5>
													<select class="selectpicker with-border" id="majorSelect" value="{{ $user->major_id }}" data-live-search="true" name="major_id" data-size="4" title="Select user major">
														<option disabled value='select major'>select major</option>
														@foreach($majors as $major)
														@if ($user->major_id == $major->major_id)
														<option selected class="batata" value={{$major->major_id}}>{{$major->major}}</option>
														@else
														<option class="batata" value={{$major->major_id}}>{{$major->major}} </option>
														@endif
														@endforeach
													</select>
													@if ($errors->has('major_id'))
													<div class="text-danger">{{ $errors->first('major_id') }}</div>
													@endif
												</div>
											</div>
											{{-- uni --}}
											<div class="col-xl-4">
												<div class="submit-field">
													<h5>University name</h5>
													<input type="text" class="with-border" name="uni" value="{{ $user->uni }}">
													@if ($errors->has('uni'))
													<div class="text-danger">{{ $errors->first('uni') }}</div>
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
														<p class="hiddenValue hiddenElement" id="skills"> {{$user->skills}} </p>
														<div class="keywords-list">
															@foreach ($userSkills as $skill)
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
											{{-- About + attachments --}}
											<div class="col-xl-12">
												<div class="submit-field">
													<h5>about</h5>
													<textarea cols="30" rows="5" name="about" class="with-border"> {{$user->about}} </textarea>
													<div class="uploadButton margin-top-30">
														<input class="uploadButton-input" type="file" name='cv' accept="image/*, application/pdf" id="upload" />
														@if ($user->cv)
														<label class="uploadButton-button ripple-effect" for="upload">Change CV</label>
														<span class="uploadButton-file-name"> {{$user->cv}} </span>
														@else
														<label class="uploadButton-button ripple-effect" for="upload">Add CV</label>
														<span class="uploadButton-file-name"> No file added</span>
														@endif
													</div>
												</div>
											</div>


											<!-- Button -->
											<button class="button full-width button-sliding-icon ripple-effect" id="submitButtonAbout" type="submit" form="EditAbout">Update <i class="icon-material-outline-arrow-right-alt"></i></button>


										</div>
									</div>
								</form>
							</div>
							<div class="popup-tab-content" id="Social">
								<!-- Form -->
								<form id="EditSocial" action="/user/{{$user->user_id}}/update" method="post" enctype="multipart/form-data">
									{{ csrf_field() }}
									@method('PATCH')

									<div class="content with-padding padding-bottom-10">
										<div class="row">

											{{-- linkedin --}}
											<div class="col-xl-4">
												<div class="submit-field">
													<h5>linkedin</h5>
													<input type="text" class="with-border" name="linkedin" value="{{ $user->linkedin }}">
													@if ($errors->has('linkedin'))
													<div class="text-danger">{{ $errors->first('linkedin') }}</div>
													@endif
												</div>
											</div>
											{{-- github --}}
											<div class="col-xl-4">
												<div class="submit-field">
													<h5>github</h5>
													<input type="text" class="with-border" name="github" value="{{ $user->github }}">
													@if ($errors->has('github'))
													<div class="text-danger">{{ $errors->first('github') }}</div>
													@endif
												</div>
											</div>
											{{-- twitter --}}
											<div class="col-xl-4">
												<div class="submit-field">
													<h5>twitter</h5>
													<input type="text" class="with-border" name="twitter" value="{{ $user->twitter }}">
													@if ($errors->has('twitter'))
													<div class="text-danger">{{ $errors->first('twitter') }}</div>
													@endif
												</div>
											</div>
											{{-- behance --}}
											<div class="col-xl-4">
												<div class="submit-field">
													<h5>behance</h5>
													<input type="text" class="with-border" name="behance" value="{{ $user->behance }}">
													@if ($errors->has('behance'))
													<div class="text-danger">{{ $errors->first('behance') }}</div>
													@endif
												</div>
											</div>
											{{-- portfolio --}}
											<div class="col-xl-4">
												<div class="submit-field">
													<h5>portfolio</h5>
													<input type="text" class="with-border" name="portfolio" value="{{ $user->portfolio }}">
													@if ($errors->has('portfolio'))
													<div class="text-danger">{{ $errors->first('portfolio') }}</div>
													@endif
												</div>
											</div>


											<!-- Button -->
											<button class="button full-width button-sliding-icon ripple-effect" id="submitButtonSocial" type="submit" form="EditSocial">Update<i class="icon-material-outline-arrow-right-alt"></i></button>


										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>



				@endif

				<!-- Widget -->
				<div class="sidebar-widget">
					<h3>Social Profiles</h3>
					<div class="freelancer-socials margin-top-25">
						<ul>
							@if($user->portfolio)
							<li><a target="_blank" href={{"//$user->coverImage"}} title="portfolio" data-tippy-placement="top"><i class="icon-feather-globe"></i></a></li>
							@endif
							@if($user->linkedin)
							<li><a target="_blank" href="{{"//$user->linkedin"}}" title="linkedin" data-tippy-placement="top"><i class="icon-brand-linkedin"></i></a></li>
							@endif
							@if($user->twitter)
							<li><a target="_blank" href="{{"//$user->twitter"}}" title="Twitter" data-tippy-placement="top"><i class="icon-brand-twitter"></i></a></li>
							@endif
							@if($user->behance)
							<li><a target="_blank" href="{{"//$user->behance"}}" title="Behance" data-tippy-placement="top"><i class="icon-brand-behance"></i></a></li>
							@endif
							@if($user->github)
							<li><a target="_blank" href="{{"//$user->github"}}" title="GitHub" data-tippy-placement="top"><i class="icon-brand-github"></i></a></li>
							@endif

						</ul>
					</div>
				</div>
				@if ($userSkills)

				<!-- Widget -->
				<div class="sidebar-widget">
					<h3>Skills</h3>
					<div class="task-tags">
						@foreach ($userSkills as $skill)
						@if ($skill !='')

						<span>{{$skill}}</span>
						@endif
						@endforeach

					</div>
				</div>

				@endif


				<!-- Widget -->

				@if ($user->cv)
				<div class="sidebar-widget">
					<h3>Attachments</h3>
					<div class="attachments-container">
						<a href={{ route('download', ['id'=> $user->cv ]) }} class="attachment-box ripple-effect"><span>CV</span><i>PDF</i></a>
					</div>
				</div>
				@endif

				<!-- Copy URL -->
				<div class="copy-url">
					<input id="copy-url" type="text" value="" class="with-border">
					<button class="copy-url-button ripple-effect" data-clipboard-target="#copy-url" title="Copy to Clipboard" data-tippy-placement="top"><i class="icon-material-outline-file-copy"></i></button>
				</div>

				<!-- Share Buttons -->
				{{-- <div class="share-buttons margin-top-25">
						<div class="share-buttons-trigger"><i class="icon-feather-share-2"></i></div>
						<div class="share-buttons-content">
							<span>Interesting? <strong>Share It!</strong></span>
							<ul class="share-buttons-icons">
								<li><a href="#" data-button-color="#3b5998" title="Share on Facebook" data-tippy-placement="top"><i class="icon-brand-facebook-f"></i></a></li>
								<li><a href="#" data-button-color="#1da1f2" title="Share on Twitter" data-tippy-placement="top"><i class="icon-brand-twitter"></i></a></li>
								<li><a href="#" data-button-color="#dd4b39" title="Share on Google Plus" data-tippy-placement="top"><i class="icon-brand-google-plus-g"></i></a></li>
								<li><a href="#" data-button-color="#0077b5" title="Share on LinkedIn" data-tippy-placement="top"><i class="icon-brand-linkedin-in"></i></a></li>
							</ul>
						</div>
					</div> --}}
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
	$('#submitButtonTab').on("click", function() {
		console.log("batata");
		document.getElementById("hiddenInput").value = document.getElementById("skills").innerText;

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
		if ($("#password-repeat-register").val() == $("#password-register").val()) {
			submit = true;
			$('#EditPass').submit();
		} else {
			document.getElementById("JSPassRepeat").innerText = 'Password confirmation does not match';;
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

	$('#submitButtonAbout').on("click", function() {
		console.log("batata");
		document.getElementById("hiddenInput").value = document.getElementById("skills").innerText;
		submit = true;
		$('#EditAbout').submit();
	});
	$('#EditAbout').submit(function() {

		if (submit == false)
			return false;
		else
			return true;
	});

	$('#submitButtonSocial').on("click", function() {
		console.log("batata");
		submit = true;
		$('#EditSocial').submit();
	});
	$('#EditSocial').submit(function() {

		if (submit == false)
			return false;
		else
			return true;
	});


	$('#mediaFileCover').on('change', function() {
		let file = $('#mediaFileCover').val();
	})
</script>


@endsection