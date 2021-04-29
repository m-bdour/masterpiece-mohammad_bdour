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

				<h2>Log In</h2>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="{{ url('/') }}">Home</a></li>
						<li>Log In</li>
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
					<h3>We're glad to see you again!</h3>
					<span>Don't have an account? <a href="{{ route('register') }}">Sign Up!</a></span>
				</div>
					
				<!-- Form -->
				<form method="post" id="login-form">
					@csrf
					<div class="input-with-icon-left">
						<i class="icon-material-baseline-mail-outline"></i>
						<input type="email" class="input-text with-border @error('email') is-invalid @enderror" value="{{ old('email') }}" name="email" id="email" placeholder="Email Address" autocomplete="email" autofocus required/>
						@error('email')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
					</div>

					<div class="input-with-icon-left">
						<i class="icon-material-outline-lock"></i>
						<input type="password" class="input-text with-border @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password" autocomplete="current-password" required/>
						
						@error('password')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
					<div class="checkbox">
						<input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}  >
						<label for="remember"><span class="checkbox-icon"></span>   {{ __('Remember Me') }}</label>
					</div>
					</div>
				</form>
				
				<!-- Button -->
				<button class="button full-width button-sliding-icon ripple-effect margin-top-10" type="submit" form="login-form"> {{ __('Login') }} <i class="icon-material-outline-arrow-right-alt"></i></button>
				@if (Route::has('password.request'))
				<a href="{{ route('password.request') }}" class="forgot-password">  {{ __('Forgot Your Password?') }}</a>
			@endif
			<div class="margin-bottom-60" ></div>

				{{-- <!-- Social Login -->
				<div class="social-login-separator"><span>or</span></div>
				<div class="social-login-buttons">
					<button class="facebook-login ripple-effect"><i class="icon-brand-facebook-f"></i> Log In via Facebook</button>
					<button class="google-login ripple-effect"><i class="icon-brand-google-plus-g"></i> Log In via Google+</button>
				</div> --}}
			</div>

		</div>
	</div>
</div>


<!-- Spacer -->
<div class="margin-top-70"></div>
<!-- Spacer / End-->

   
    @endsection
 