@extends('layout.admin')
@section("title")
<title>Qorrah | Dashboard</title>
<meta name="description" content="Online Appointments Registeration system for book driving lessons">
@endsection
@section('adminContent')


<!-- Dashboard Content
	================================================== -->
	<div class="dashboard-content-container" data-simplebar>
		<div class="dashboard-content-inner" >


			
			<!-- Dashboard Headline -->
			<div class="dashboard-headline">
				<h3>Howdy, Tom!</h3>
				<span>We are glad to see you again!</span>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="/">Home</a></li>
						<li><a href="{{"/admin/dashboard"}}">Dashboard</a></li>
					</ul>
				</nav>
			</div>
				{{--         return view('Admin.show.dashboard', compact('Companies', 'majors', 'users', 'admins', 'RequestCompanies', 'positions', 'applications'));
 --}}
			<!-- Fun Facts Container -->
			<div class="fun-facts-container">
		
				{{-- users --}}
				<div class="fun-fact" data-fun-fact-color="#b81b7f">
					<div class="fun-fact-text">
						<span>Trainees</span>
						<h4>{{$users}}</h4>
					</div>
					<div class="fun-fact-icon"><i class="icon-material-outline-school"></i></div>
				</div>				
				{{-- Companies --}}
				<div class="fun-fact" data-fun-fact-color="#36bd78">
					<div class="fun-fact-text">
						<span>Companies</span>
						<h4>{{$Companies}}</h4>
					</div>
					<div class="fun-fact-icon"><i class="icon-material-outline-business"></i></div>
				</div>
				{{-- RequestCompanies --}}
				<div class="fun-fact" data-fun-fact-color="#efa80f">
					<div class="fun-fact-text">
						<span>Request Companies</span>
						<h4>{{$RequestCompanies}}</h4>
					</div>
					<div class="fun-fact-icon"><i class="icon-material-outline-rate-review"></i></div>
				</div>				

				{{-- positions --}}
				<div class="fun-fact" data-fun-fact-color="#36bd78">
					<div class="fun-fact-text">
						<span>positions</span>
						<h4>{{$positions}}</h4>
					</div>
					<div class="fun-fact-icon"><i class="icon-material-outline-business-center"></i></div>
				</div>
				{{-- majors --}}
				<div class="fun-fact" data-fun-fact-color="#36bd78">
					<div class="fun-fact-text">
						<span>majors</span>
						<h4>{{$majors}}</h4>
					</div>
					<div class="fun-fact-icon"><i class="icon-material-outline-account-balance"></i></div>
				</div>	
				{{-- Applications --}}
				<div class="fun-fact" data-fun-fact-color="#b81b7f">
					<div class="fun-fact-text">
						<span>Applications</span>
						<h4>{{$applications}}</h4>
					</div>
					<div class="fun-fact-icon"><i class="icon-feather-book-open"></i></div>
				</div>	
				{{-- admins --}}
				<div class="fun-fact" data-fun-fact-color="#b81b7f">
					<div class="fun-fact-text">
						<span>admins</span>
						<h4>{{$admins}}</h4>
					</div>
					<div class="fun-fact-icon"><i class="icon-material-outline-face"></i></div>
				</div>

				<!-- Last one has to be hidden below 1600px, sorry :( -->
				<div class="fun-fact" data-fun-fact-color="#2a41e6">
					<div class="fun-fact-text">
						<span>users</span>
						<h4>{{$users}}</h4>
					</div>
					<div class="fun-fact-icon"><i class="icon-feather-trending-up"></i></div>
				</div>
			</div>
			
		</div>
	</div>
	<!-- Dashboard Content / End -->


@endsection