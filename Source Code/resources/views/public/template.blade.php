@extends('layout.public')
@section("title")
<title>Qorrah | {{$template->title}}</title>
<meta name="description" content="{{$template->description}}">
<meta name="keywords" content="{{$template->keywords}}">
@endsection
@section('content')

<!-- Titlebar
================================================== -->
<div class="single-page-header " data-background-image={{asset("assets/images/profile/$template->cover")}}>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="single-page-header-inner">
					<div class="left-side">
						<div class="header-image "><img src={{asset("assets/images/profile/$template->image")}} alt="{{$template->name}}"></div>
						<div class="header-details">
							<h1>{{$template->name}}</h1>
							<p>{{$template->Ename}}</p>
						</div>
					</div>
					<div class="right-side">
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
				<h3 class="margin-bottom-25">About {{$template->name}}</h3>
				{!! $template->about !!}

			</div>

			
		</div>


		<!-- Sidebar -->
		<div class="col-xl-4 col-lg-4">
			<div class="sidebar-container">

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


	$('#mediaFileCover').on('change', function() {
		let file = $('#mediaFileCover').val();
	})
</script>



@endsection