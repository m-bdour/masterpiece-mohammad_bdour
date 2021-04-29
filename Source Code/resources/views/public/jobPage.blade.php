@extends('layout.public')
@section("title")
    <title>Qorrah | {{$position->name}} page</title>
    <meta name="description" content="Online Appointments Registeration system for book driving lessons">
@endsection
@section('content')

<!-- Titlebar
================================================== -->
<div class="single-page-header " data-background-image={{asset("assets/images/profile/$position->cover")}}>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="single-page-header-inner">
					<div class="left-side">
						<div class="header-image "><img src={{asset("assets/images/profile/$company->image")}} alt="{{$company->name}}"></div>
						<div class="header-details">
							<h3>{{$position->name}}</h3>
							<p>{{$position->title}}</p>
							<h5>The Employer</h5>
							<ul>
								<li><a href={{ route('profile', ['id'=>$position->User_id]) }}><i class="icon-material-outline-business"></i> {{$company->name}}</a></li>
								<li><i class="icon-material-outline-location-on"></i> {{$company->city}}, {{$company->address}}</li>
								<li><i class="icon-line-awesome-balance-scale"></i> {{$position->status}}</li>
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

			<div class="single-page-section">
				<h3 class="margin-bottom-25">Job Description</h3>
<p>{{$position->about}}</p>

			</div>

			<div class="single-page-section">
				<h3 class="margin-bottom-25">Similar Jobs</h3>

				<!-- Listings Container -->
				<div class="listings-container grid-layout">

					@foreach ($similarPositions as $similar)

						<!-- Job Listing -->
						<a href="{{ route('job', ['id'=>$similar->position_id]) }}" class="job-listing">

							<!-- Job Listing Details -->
							<div class="job-listing-details">
								<!-- Logo -->
								<div class="job-listing-company-logo">
									<img src={{asset("assets/images/profile/$company->image")}} alt="{{$company->name}}">
								</div>

								<!-- Details -->
								<div class="job-listing-description">
									<h4 class="job-listing-company">{{$similar->name}}</h4>
									<h3 class="job-listing-title">{{$similar->title}}</h3>
								</div>
							</div>

							<!-- Job Listing Footer -->
							<div class="job-listing-footer">
								<ul>
									<li><i class="icon-material-outline-location-on"></i> {{$similar->city}}</li>
									<li><i class="icon-material-outline-business-center"></i> {{$similar->type}}</li>
									@if ( ($date = (strtotime(date("Y-m-d"))  - strtotime(explode(" " , $similar->created_at)[0]))) < 60*60*24 )
									<li><i class="icon-material-outline-access-time"></i> {{'today'}} </li>
									@else 
									<li><i class="icon-material-outline-access-time"></i> {{ round( ($date)/(60*60*24), 0, PHP_ROUND_HALF_DOWN) . 'd'}}</li>
									@endif
									<li><i class="icon-line-awesome-balance-scale"></i> {{$position->status}}</li>
								</ul>
							</div>
						</a>						
					@endforeach



					</div>
					<!-- Listings Container / End -->

				</div>
		</div>
		

		<!-- Sidebar -->
		<div class="col-xl-4 col-lg-4">
			<div class="sidebar-container">

				@if (isset($errors) && count($errors))

                <ul>
                    @foreach($errors->all() as $error)
						
			<div class="notification error closeable">
				<p>{{ $error }}</p>
				<a class="close" href="#"></a>
			</div>
                    @endforeach
                </ul>

        @endif

				@if (Auth::check() && Auth::user()->type == 'user')

				@if ($position->status == 'Closed')
				<a href="" class="apply-now-button inactiveLink">Closed</a>
				@else 
				<a href="#small-dialog" class="apply-now-button popup-with-zoom-anim">Apply Now <i class="icon-material-outline-arrow-right-alt"></i></a>
				@endif

					
					<div id="small-dialog" class="zoom-anim-dialog mfp-hide dialog-with-tabs">

						<!--Tabs -->
						<div class="sign-in-form">
					
							<ul class="popup-tabs-nav">
								<li><a href="#tab">Apply Now</a></li>
							</ul>
					
							<div class="popup-tabs-container">
					
								<!-- Tab -->
								<div class="popup-tab-content" id="tab">
									
									<!-- Welcome Text -->
									<div class="welcome-text">
										<p>For</p>
										<h3> {{$position->name}}</h3>
									</div>
										
									<!-- Form -->
									<form method="post" action="{{ route('apply') }}" id="ApplyJob"  enctype="multipart/form-data">
										@csrf
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

												<input type="hidden" name="user_id" value="{{Auth::id()}}">
												<input type="hidden" name="Position_id" value="{{$position->position_id}}">
											</div>
										</div>
									</div>													
									</form>
									
									<!-- Button -->
									<button class="button full-width button-sliding-icon ripple-effect" type="submit" form="ApplyJob">Apply <i class="icon-material-outline-arrow-right-alt"></i></button>
					
								</div>
					
							</div>
						</div>
					</div>
				@endif

				@if (Auth::check() && Auth::id() == $position->User_id)


					<a href="#small-dialog-2" class="apply-now-button popup-with-zoom-anim">Edit Position<i class="icon-material-outline-arrow-right-alt"></i></a>
				
					<div id="small-dialog-2" class="zoom-anim-dialog mfp-hide dialog-with-tabs popupForm">
	
						<!--Tabs -->
						<div class="sign-in-form">
					
							<ul class="popup-tabs-nav">
								<li><a href="#tab">Edit </a></li>
							</ul>
					
							<div class="popup-tabs-container">
					
								<!-- Tab -->
								<div class="popup-tab-content" id="tab">
										
									<!-- Form -->
									<form id="addUser" action="/position/{{$position->position_id}}/update" method="post" enctype="multipart/form-data">
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
													<select class="selectpicker with-border" name="type" value="{{ $position->type }}" data-size="4" data-live-search="true">
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
													<select class="selectpicker with-border" id="majorSelect" data-live-search="true" name="majors[]" id="majors" data-size="4" value="{{ $position->positionMajors }}" multiple>
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
											{{-- status --}}
											<div class="col-xl-4">
												<div class="submit-field">
													<h5>Status</h5>
													<select class="selectpicker with-border"  data-live-search="true" name="status" data-size="4" value="{{ $position->status }}"  >
														<option disabled value='select company'>select status</option>
														@if (Auth::user()->type != 'company')
														<option class="batata" value={{'Hidden'}}>{{'Hidden'}}
														</option>
														@else 
														@foreach($statuss as $Pstatus)
														@if ($position->status == $Pstatus)
															
														<option selected class="batata" value={{$Pstatus}}>{{$Pstatus}}
														</option>
														@else
														<option class="batata" value={{$Pstatus}}>{{$Pstatus}}
														</option>
															
														@endif
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
										<input type="hidden" name="user_id" value="{{Auth::user()->user_id}}">
	

										</div>
									</div>
									
									<!-- Button -->
									<button class="button full-width button-sliding-icon ripple-effect" id="submitButton" type="submit" form="addUser">Apply Changes<i class="icon-material-outline-arrow-right-alt"></i></button>
					
								</div>
					
							</div>
						</div>
					</div>


				@endif

				@if (!(Auth::check()))
				<a href="{{ route('register') }}" class="apply-now-button " >Register Now <i class="icon-material-outline-arrow-right-alt"></i></a>

				@endif


				<!-- Sidebar Widget -->
				<div class="sidebar-widget">
					<div class="job-overview">
						<div class="job-overview-headline">Job Summary</div>
						<div class="job-overview-inner">
							<ul>
								<li>
									<i class="icon-material-outline-location-on"></i>
									<span>Location</span>
									@if ($position->city)
									<h5>{{$position->city}}, {{$position->address}}</h5>
									@else
									<h5>{{$company->city}}, {{$company->address}}</h5>
										
									@endif
								</li>
								<li>
									<i class="icon-material-outline-business-center"></i>
									<span>Job Type</span>
									<h5>{{$position->type}}</h5>
								</li>
								
								<li>
									<i class="icon-material-outline-access-time"></i>
									<span>Date Posted</span>
									@if ( ($date = (strtotime(date("Y-m-d"))  - strtotime(explode(" " , $position->created_at)[0]))) < 60*60*24 )
									<h5>{{'today'}}</h5>
									@else 
									<h5>{{ round( ($date)/(60*60*24), 0, PHP_ROUND_HALF_DOWN) . ' d'}}</h5>
									
									@endif									
								</li>
								<li>
									<i class="icon-feather-award"></i>
									<span>Skills</span>

								</li>
							</ul>
								@if ($positionSkills)
								<div class="sidebar-widget">
									<div class="task-tags">
										@foreach ($positionSkills as $skill)
										@if ($skill !='')
										<span>{{$skill}}</span>
										@endif
										@endforeach

									</div>
								</div>
								@endif

							@if ($positionMajors)

							<!-- Widget -->
							<div class="sidebar-widget">
								<h3>Majors</h3>
								<div class="task-tags">
									@foreach ($positionMajors as $Major)
									@if ($Major !='')
										
									<span>{{$Major}}</span>
									@endif
									@endforeach
			
								</div>
							</div>
			
							@endif


						</div>
					</div>
				</div>

					<!-- Copy URL -->
					<div class="copy-url">
						<input id="copy-url" type="text" value="" class="with-border">
						<button class="copy-url-button ripple-effect" data-clipboard-target="#copy-url" title="Copy to Clipboard" data-tippy-placement="top"><i class="icon-material-outline-file-copy"></i></button>
					</div>
				</div>

			</div>
		</div>

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


	$('#mediaFileCover').on('change' , function() {
				let file = $('#mediaFileCover').val();
			})

</script>


   
    @endsection
 