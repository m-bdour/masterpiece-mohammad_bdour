@extends('layout.public')
@section("title")
<title>Qorrah | {{$major->title}}</title>
<meta name="description" content="{{$major->description}}">
<meta name="keywords" content="{{$major->keywords}}">
@endsection
@section('content')

<!-- Titlebar
================================================== -->
<div class="single-page-header " data-background-image={{asset("assets/images/profile/$major->cover")}}>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="single-page-header-inner">
					<div class="left-side">
						<div class="header-image "><img src={{asset("assets/images/profile/$major->image")}} alt="{{$major->major}}"></div>
						<div class="header-details">
							<h1>{{$major->major}}</h1>
							<p>{{$major->Ename}}</p>
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
				<h3 class="margin-bottom-25">About {{$major->major}}</h3>
				{!! $major->about !!}

			</div>

			
			<!-- Accordion -->
			<div class="accordion js-accordion margin-bottom-30">

				<!-- sectors -->
				<div class="accordion__item js-accordion-item">
					<div class="accordion-header js-accordion-header">قطاعات العمل	</div> 

					<!-- Accordtion Body -->
					<div class="accordion-body js-accordion-body">

						<!-- Accordion Content -->
						<div class="accordion-body__contents">
							{!! $major->sectors !!}
						</div>

					</div>
					<!-- Accordion Body / End -->
				</div>
				<!-- sectors / End -->
				<!-- skills -->
				<div class="accordion__item js-accordion-item">
					<div class="accordion-header js-accordion-header">المهارات الشخصية	</div> 

					<!-- Accordtion Body -->
					<div class="accordion-body js-accordion-body">

						<!-- Accordion Content -->
						<div class="accordion-body__contents">
							{!! $major->skills !!}
						</div>

					</div>
					<!-- Accordion Body / End -->
				</div>
				<!-- skills / End -->
				<!-- courses -->
				<div class="accordion__item js-accordion-item">
					<div class="accordion-header js-accordion-header"> الدورات	</div> 

					<!-- Accordtion Body -->
					<div class="accordion-body js-accordion-body">

						<!-- Accordion Content -->
						<div class="accordion-body__contents">
							{!! $major->courses !!}
						</div>

					</div>
					<!-- Accordion Body / End -->
				</div>
				<!-- courses / End -->
				<!-- findJob -->
				<div class="accordion__item js-accordion-item">
					<div class="accordion-header js-accordion-header">كيف اجد وظيفة	</div> 

					<!-- Accordtion Body -->
					<div class="accordion-body js-accordion-body">

						<!-- Accordion Content -->
						<div class="accordion-body__contents">
							{!! $major->findJob !!}
						</div>

					</div>
					<!-- Accordion Body / End -->
				</div>
				<!-- findJob / End -->
				<!-- education -->
				<div class="accordion__item js-accordion-item">
					<div class="accordion-header js-accordion-header">الدراسة</div> 

					<!-- Accordtion Body -->
					<div class="accordion-body js-accordion-body">

						<!-- Accordion Content -->
						<div class="accordion-body__contents">
							{!! $major->education !!}
						</div>

					</div>
					<!-- Accordion Body / End -->
				</div>
				<!-- education / End -->

			</div>
			<!-- Accordion / End -->


		</div>


		<!-- Sidebar -->
		<div class="col-xl-4 col-lg-4">
			<div class="sidebar-container">

				<!-- Sidebar Widget -->
				<div class="sidebar-widget">
					<div class="job-overview">
						<div class="job-overview-headline arabic">المراجع وقصص النجاح</div>
						<div class="job-overview-inner">
							<ul>
								<li class='arabic' >
									<span style="font-size: 1.2rem" >قصص النجاح</span>
									@foreach ($sstories as $sstory)
									<a href={{ url('success_story/'. $sstory->sstory_id) }}  >
									<h5 style="margin-bottom: 1rem;">{{$sstory->name}} <span> المزيد ← </span> </h5>
									</a>
									@endforeach
								</li>
								<li class='arabic' >
									<span style="font-size: 1.2rem" > المراجع</span>
									{!! $major->references !!}

								</li>
							</ul>

						</div>
					</div>
				</div>

				<!-- Copy URL -->
				<p class='arabic' style="font-size: 1.2rem; font-weight: bold" >مشاركة </p>
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