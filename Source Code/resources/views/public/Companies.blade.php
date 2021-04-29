@extends('layout.public')
@section("title")
    <title>Qorrah | Companies</title>
    <meta name="description" content="Online Appointments Registeration system for book driving lessons">
@endsection
@section('content')

<!-- Titlebar
================================================== -->
<div id="titlebar" class="gradient">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>Browse Companies</h2>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="/">Home</a></li>
						<li><a href="#">Find job</a></li>
						<li> Companies</li>
					</ul>
				</nav>

			</div>
		</div>
	</div>
</div>


<!-- Page Content
================================================== -->
<div class="container">
	<div class="row">

		<div class="col-xl-12">
			<div class="companies-list">

				@foreach ($companies as $company)
				
				<a href={{ route('profile', ['id'=>$company->user_id]) }} class="company">
					<div class="company-inner-alignment">
						<span class="company-logo"><img src={{asset("assets/images/profile/$company->image")}} alt="{{$company->name}}"></span>
						<h4>{{$company->name}}</h4>
						<p><i class="icon-material-outline-business-center"></i> {{$company->title}}</p>
						<p><i class="icon-material-outline-location-on"></i> {{$company->city}}</p>

					</div>
				</a>
				@endforeach

			</div>
			<div class="pagination-block">
				{{  $companies->links('layout.paginationlinks') }}

			</div>
		</div>
	</div>
</div>


<!-- Spacer -->
<div class="margin-top-70"></div>
<!-- Spacer / End-->

   
    @endsection
 