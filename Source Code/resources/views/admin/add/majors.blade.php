
@extends('layout.admin')
@section("title")
    <title>Qorrah | Add major</title>
    <meta name="description" content="a platform that provides the link between students who are looking for specialized training
 with institutions that have training vacancies">
@endsection
@section('adminContent')

	<div class="dashboard-content-container" data-simplebar>
		<div class="dashboard-content-inner" >
			
			<!-- Dashboard Headline -->
			<div class="dashboard-headline">
				<h3>add a Major</h3>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="/">Home</a></li>
						<li><a href="{{"/admin/dashboard"}}">Dashboard</a></li>
						<li>add Major</li>
					</ul>
				</nav>
			</div>
	
			<!-- Row -->
			<div class="row">

				<!-- Dashboard Box -->
				<div class="col-xl-12">
					<div class="dashboard-box margin-top-0">
						<!-- Headline -->
						<div class="headline">
							<h3><i class="icon-feather-folder-plus"></i> Major Submission Form</h3>
						</div>
					
					<form action="/admin/major" method="post" enctype="multipart/form-data">
						{{ csrf_field() }}
						<div class="content with-padding padding-bottom-10">
							<div class="row">

								<div class="col-xl-4">
									<div class="submit-field">
										<h5>Major name</h5>
										<input type="text" class="with-border" name="major" value="{{ old('major') }}" required>
										@if ($errors->has('major'))
										<div class="text-danger">{{ $errors->first('major') }}</div>
									@endif
									</div>
								</div>
								<div class="col-xl-4">
									<div class="submit-field">
										<h5>Major College</h5>
										<input type="text" class="with-border" name="College" value="{{ old('College') }}" >
										@if ($errors->has('College'))
										<div class="text-danger">{{ $errors->first('College') }}</div>
									@endif
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>

				<div class="col-xl-12">
					<button type="submit" class="button ripple-effect big margin-top-30"><i class="icon-feather-plus"></i> add</button>
				</div>
			</form>

			</div>
			<!-- Row / End -->

		</div>
	</div>

@endsection
