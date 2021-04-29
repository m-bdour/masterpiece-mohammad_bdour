@extends('layout.public')
@section("title")
    <title>Qorrah | Homepage</title>
    <meta name="description" content="Online Appointments Registeration system for book driving lessons">
@endsection
@section('content')

<!-- Titlebar
================================================== -->
<div id="titlebar" class="gradient">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>{{ __('Register') }}</h2>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="/">Home</a></li>
						<li>{{ __('Register') }}</li>
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
		<div class="col-xl-5 offset-xl-3">

			<div class="login-register-page">
				<!-- Welcome Text -->
				<div class="welcome-text">
					<h3 style="font-size: 26px;">Let's create your account!</h3>
					<span>Already have an account? <a href="{{ route('login') }}">Log In!</a></span>
				</div>

				<!-- Form -->
				<form method="post" id="register-account-form" action="{{ route('register') }}">
					@csrf
					<!-- Account Type -->
					<div class="account-type">
						<div>
							<input type="radio" name="type" value="user" id="freelancer-radio" class="account-type-radio" checked/>
							<label for="freelancer-radio" class="ripple-effect-dark"><i class="icon-material-outline-account-circle"></i>{{ __('Trainee') }} </label>
						</div>
	
						<div>
							<input type="radio" name="type" value="RequestCompany" id="employer-radio" class="account-type-radio"/>
							<label for="employer-radio" class="ripple-effect-dark"><i class="icon-material-outline-business-center"></i> {{ __('Employer') }} </label>
						</div>
					</div>
						
					<div class="input-with-icon-left">
						<i class="icon-material-baseline-mail-outline"></i>
						<input type="text" class="input-text with-border  @error('email') is-invalid @enderror"  name="email" id="emailaddress-register" placeholder="Email Address"  value="{{ old('email') }}" autocomplete="email" required/>
						@error('email')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
					</div>

					<div class="input-with-icon-left" title="Should be at least 8 characters long" data-tippy-placement="bottom">
						<i class="icon-material-outline-lock"></i>
						<input type="password" class="input-text with-border @error('password') is-invalid @enderror" name="password" id="password-register" autocomplete="new-password" placeholder="Password" required/>
						@error('password')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
					</div>

					<div class="input-with-icon-left">
						<i class="icon-material-outline-lock"></i>
						<input type="password" class="input-text with-border" name="password_confirmation" id="password-repeat-register" autocomplete="new-password" placeholder="Repeat Password" required/>
					</div>
					<!-- Button -->
					<button class="button full-width button-sliding-icon ripple-effect margin-top-10" type="submit" >  {{ __('Register') }} <i class="icon-material-outline-arrow-right-alt"></i></button>
				</form>
				<div class="margin-bottom-60" ></div>
				<!-- Social Login -->
				{{-- <div class="social-login-separator"><span>or</span></div>
				<div class="social-login-buttons">
					<button class="facebook-login " disabled><i class="icon-brand-facebook-f"></i> Register via Facebook</button>
					<button class="google-login " disabled><i class="icon-brand-google-plus-g"></i> Register via Google+</button>
				</div> --}}
			</div>

		</div>
	</div>
</div>


<!-- Spacer -->
<div class="margin-top-70"></div>
<!-- Spacer / End-->

   
    @endsection
 