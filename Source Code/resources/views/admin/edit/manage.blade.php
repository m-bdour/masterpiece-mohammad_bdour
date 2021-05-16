
@extends('layout.admin')
@section("title")
    <title>Qorrah | manage</title>
    <meta name="description" content="a platform that provides the link between students who are looking for specialized training
 with institutions that have training vacancies">
@endsection
@section('adminContent')

	<div class="dashboard-content-container" data-simplebar>
		<div class="dashboard-content-inner" >
			
			<!-- Dashboard Headline -->
			<div class="dashboard-headline">
				<h3>manage</h3>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="/">Home</a></li>
						<li><a href="{{"/admin/dashboard"}}">Dashboard</a></li>
						<li>manage</li>
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
							<h3><i class="icon-feather-folder-plus"></i> manage Form</h3>
						</div>
					
					<form id="addUser" action="/admin/manage/{{$manage->id}}/update" method="post" enctype="multipart/form-data">
						{{ csrf_field() }}
						@method('PATCH')
						<div class="content with-padding padding-bottom-10">
							<div class="row">
								{{-- homedescription --}}
								<div class="col-xl-4">
									<div class="submit-field">
										<h5>home description  <i class="help-icon" data-tippy-placement="right" title="For SEO"></i></h5>
										<input type="text" max="250" class="with-border" name="homedescription" value="{{$manage->homedescription}}" required>
										@if ($errors->has('homedescription'))
										<div class="text-danger">{{ $errors->first('homedescription') }}</div>
									@endif
									</div>
								</div>
								{{-- hometitle --}}
								<div class="col-xl-4">
									<div class="submit-field">
										<h5>home title  <i class="help-icon" data-tippy-placement="right" title="For SEO"></i></h5>
										<input type="text" class="with-border" name="hometitle" value="{{$manage->hometitle}}">
										@if ($errors->has('hometitle'))
										<div class="text-danger">{{ $errors->first('hometitle') }}</div>
										@endif
									</div>
								</div>	
								{{-- lifetitle --}}
								<div class="col-xl-4">
									<div class="submit-field">
										<h5>university life title  <i class="help-icon" data-tippy-placement="right" title="For SEO"></i></h5>
										<input type="text" class="with-border" name="lifetitle" value="{{$manage->lifetitle}}">
										@if ($errors->has('lifetitle'))
										<div class="text-danger">{{ $errors->first('lifetitle') }}</div>
										@endif
									</div>
								</div>								
								{{-- homeimage --}}
								<div class=" col-xl-4 addImage">
									<div id="cover" class="image " style="background-image: url({{asset("assets/images/profile/$manage->homeimage")}})" >
									<div class="dashes"></div>
									<label style="color: #fff ; text-shadow : 0 0 3px #333">Change</label>
									</div>
									<p>Home cover</p>
									<input type="file" id="mediaFileCover" name="cover" class="mediaFile"  />
								</div>
								{{-- just a space --}}
								<div class="col-xl-4">
									<div class="submit-field">
									</div>
								</div>	
								{{-- just a space --}}
								<div class="col-xl-4">
									<div class="submit-field">
									</div>
								</div>	
								{{-- linkedin --}}
								<div class="col-xl-4">
									<div class="submit-field">
										<h5>linkedin</h5>
										<input type="text" class="with-border" name="linkedin" value="{{$manage->linkedin}}">
										@if ($errors->has('linkedin'))
										<div class="text-danger">{{ $errors->first('linkedin') }}</div>
										@endif
									</div>
								</div>
								{{-- facebook --}}
								<div class="col-xl-4">
									<div class="submit-field">
										<h5>facebook </h5>
										<input type="text" class="with-border" name="facebook" value="{{$manage->facebook}}">
										@if ($errors->has('facebook'))
										<div class="text-danger">{{ $errors->first('facebook') }}</div>
										@endif
									</div>
								</div>
								{{-- twitter --}}
								<div class="col-xl-4">
									<div class="submit-field">
										<h5>twitter </h5>
										<input type="text" class="with-border" name="twitter" value="{{$manage->twitter}}">
										@if ($errors->has('twitter'))
										<div class="text-danger">{{ $errors->first('twitter') }}</div>
										@endif
									</div>
								</div>
								{{-- instagram --}}
								<div class="col-xl-4">
									<div class="submit-field">
										<h5>instagram </h5>
										<input type="text" class="with-border" name="instagram" value="{{$manage->instagram}}">
										@if ($errors->has('instagram'))
										<div class="text-danger">{{ $errors->first('instagram') }}</div>
										@endif
									</div>
								</div>
								{{-- homekeywords --}}
								<div class="col-xl-4">
									<div class="submit-field">
										<h5>home keywords <i class="help-icon" data-tippy-placement="right" title="For SEO"></i></h5>
										<div class="keywords-container">
											<div class="keyword-input-container">
												<input type="text" class="keyword-input with-border" placeholder="e.g. program, soft skill" />
												<button class="keyword-input-button ripple-effect"><i class="icon-material-outline-add"></i></button>
											</div>
											<input type="hidden" id="hiddenInput" name="homekeywords" class="hiddenValue">
											<p class="hiddenValue hiddenElement" id="skills"> {{$manage->homekeywords}} </p>
											<div class="keywords-list">
												@foreach ($homekeywords as $keyword)
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
								{{-- lifekeywords --}}
								<div class="col-xl-4">
									<div class="submit-field">
										<h5>university life keywords <i class="help-icon" data-tippy-placement="right" title="For SEO"></i></h5>
										<div class="keywords-container2">
											<div class="keyword-input-container2">
												<input type="text" class="keyword-input2 with-border" placeholder="e.g. program, soft skill" />
												<button class="keyword-input-button2 ripple-effect"><i class="icon-material-outline-add"></i></button>
											</div>
											<input type="hidden" id="hiddenInput2" name="lifekeywords" class="hiddenValue">
											<p class="hiddenValue hiddenElement" id="skills2"> {{$manage->lifekeywords}} </p>
											<div class="keywords-list2">
												@foreach ($lifekeywords as $keyword)
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
								{{-- lifedescription --}}
								<div class="col-xl-4">
									<div class="submit-field">
										<h5>university life description  <i class="help-icon" data-tippy-placement="right" title="For SEO"></i></h5>
										<input max="250" type="text" class="with-border" name="lifedescription" value="{{$manage->lifedescription}}" required>
										@if ($errors->has('lifedescription'))
										<div class="text-danger">{{ $errors->first('lifedescription') }}</div>
									@endif
									</div>
								</div>							
								{{-- contactinfo  --}}
								<div class="col-xl-12">
									<div class="submit-field">
										<h5>contact info</h5>
										<textarea name="contactinfo" class="tinymce">{{$manage->contactinfo}}</textarea>
									</div>
								</div>								
								{{-- hometopdiscription  --}}
								<div class="col-xl-12">
									<div class="submit-field">
										<h5>home top discription</h5>
										<textarea name="hometopdiscription" class="tinymce">{{$manage->hometopdiscription}}</textarea>
									</div>
								</div>								
								{{-- homebottomdiscription  --}}
								<div class="col-xl-12">
									<div class="submit-field">
										<h5>Footer discription</h5>
										<textarea name="homebottomdiscription" class="tinymce">{{$manage->homebottomdiscription}}</textarea>
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
		document.getElementById("hiddenInput2").value = document.getElementById("skills2").innerText;
		
		$('#addUser').submit();
	});

	$('#addUser').submit(function() {

		if (submit == false)
			return false;
		else
			return true;
	});
	$('#addUser').on('keyup keypress', function(e) {
  var keyCode = e.keyCode || e.which;
  if (keyCode === 13) { 
    e.preventDefault();
    return false;
  }
});

	$('#mediaFileCover').on('change' , function() {
				let file = $('#mediaFileCover').val();
			})

</script>

@endsection
