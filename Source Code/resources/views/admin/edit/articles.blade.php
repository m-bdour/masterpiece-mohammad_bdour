
@extends('layout.admin')
@section("title")
    <title>Qorrah | Edit article</title>
    <meta name="description" content="a platform that provides the link between students who are looking for specialized training
 with institutions that have training vacancies">
@endsection
@section('adminContent')

	<div class="dashboard-content-container" data-simplebar>
		<div class="dashboard-content-inner" >
			
			<!-- Dashboard Headline -->
			<div class="dashboard-headline">
				<h3>edit an article</h3>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="/">Home</a></li>
						<li><a href="{{"/admin/dashboard"}}">Dashboard</a></li>
						<li>edit article</li>
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
							<h3><i class="icon-feather-folder-plus"></i> article edit Form</h3>
						</div>
					
					<form id="addUser" action="/admin/article/{{$article->article_id}}/update" method="post" enctype="multipart/form-data">
						{{ csrf_field() }}
						@method('PATCH')
						<div class="content with-padding padding-bottom-10">
							<div class="row">
								{{-- name --}}
								<div class="col-xl-4">
									<div class="submit-field">
										<h5>article name</h5>
										<input type="text" class="with-border" name="name" value="{{$article->name}}" required>
										@if ($errors->has('name'))
										<div class="text-danger">{{ $errors->first('name') }}</div>
									@endif
									</div>
								</div>
								{{-- Ename --}}
								<div class="col-xl-4">
									<div class="submit-field">
										<h5>English name</h5>
										<input type="text" class="with-border" name="Ename" value="{{$article->Ename}}">
										@if ($errors->has('Ename'))
										<div class="text-danger">{{ $errors->first('Ename') }}</div>
										@endif
									</div>
								</div>
								{{-- just a space --}}
								<div class="col-xl-4">
									<div class="submit-field">
									</div>
								</div>								
							{{-- Profile Image --}}
							<div class=" col-xl-4 addImage">
								<div id="profile" class="image " style="background-image: url({{asset("assets/images/profile/$article->image")}})" >
								<div class="dashes"></div>
								<label style="color: #fff ; text-shadow : 0 0 3px #333" >Change</label>
								</div>
								<p class="addProfile" >Profile image</p>
								<input type="file" id="mediaFile" name="profile" class="mediaFile" />
							</div>
							{{-- cover Image --}}
							<div class=" col-xl-4 addImage">
								<div id="cover" class="image " style="background-image: url({{asset("assets/images/profile/$article->cover")}})" >
								<div class="dashes"></div>
								<label style="color: #fff ; text-shadow : 0 0 3px #333">Change</label>
								</div>
								<p>Cover image</p>
								<input type="file" id="mediaFileCover" name="cover" class="mediaFile"  />
							</div>
								{{-- just a space --}}
								<div class="col-xl-4">
									<div class="submit-field">
									</div>
								</div>								
								{{-- title --}}
								<div class="col-xl-4">
									<div class="submit-field">
										<h5>title <i class="help-icon" data-tippy-placement="right" title="For SEO"></i></h5>
										<input type="text" class="with-border" name="title" value="{{$article->title}}">
										@if ($errors->has('title'))
										<div class="text-danger">{{ $errors->first('title') }}</div>
										@endif
									</div>
								</div>
								{{-- keywords --}}
								<div class="col-xl-4">
									<div class="submit-field">
										<h5>keywords <i class="help-icon" data-tippy-placement="right" title="For SEO"></i></h5>
										<div class="keywords-container">
											<div class="keyword-input-container">
												<input type="text" class="keyword-input with-border" placeholder="e.g. program, soft skill" />
												<button class="keyword-input-button ripple-effect"><i class="icon-material-outline-add"></i></button>
											</div>
											<input type="hidden" id="hiddenInput" name="keywords" class="hiddenValue">
											<p class="hiddenValue hiddenElement" id="skills"> {{$article->keywords}} </p>
											<div class="keywords-list">
												@foreach ($keywords as $keyword)
												@if ($keyword != '')
												<span class='keyword'><span class='keyword-remove'></span><span class='keyword-text'>{{$keyword}}</span></span>
												@endif

												@endforeach
												<!-- keywords go here -->
											</div>
											<div class="clearfix"></div>
										</div>

									</div>
								</div>
								{{-- description  --}}
								<div class="col-xl-4">
									<div class="submit-field">
										<h5> description  <i class="help-icon" data-tippy-placement="right" title="For SEO"></i></h5>
										<input max="250" type="text" class="with-border" name="description" value="{{$manage->description}}" required>
										@if ($errors->has('description'))
										<div class="text-danger">{{ $errors->first('description') }}</div>
									@endif
									</div>
								</div>							
								{{-- about  --}}
								<div class="col-xl-12">
									<div class="submit-field">
										<h5>about</h5>
										<textarea name="about" class="tinymce">{{$article->about}}</textarea>
									</div>
								</div>															

							</div>
						</div>
					</div>
				</div>

				<div class="col-xl-12">
					<button type="submit" class="button ripple-effect big margin-top-30 margin-bottom-30" id="submitButton"><i class="icon-line-awesome-pencil-square"></i> Update</button>
				</div>
			</form>

			</div>
			<!-- Row / End -->

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
