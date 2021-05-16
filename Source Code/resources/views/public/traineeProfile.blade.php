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
<div class="single-page-header freelancer-header" data-background-image="{{asset("assets/images/profile/$user->coverImage")}}">
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

		</div>

		<!-- Sidebar -->
		<div class="col-xl-4 col-lg-4">
			<div class="sidebar-container">

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


<!-- Spacer -->
<div class="margin-top-15"></div>
<!-- Spacer / End-->

@endsection