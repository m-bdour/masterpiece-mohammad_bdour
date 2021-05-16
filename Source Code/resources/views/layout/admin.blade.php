@extends('layout.public')
@section('content')

<div class="dashboard-container">

    {{-- tiny.cloud Text area --}}
    <script src="https://cdn.tiny.cloud/1/dgwanhgbh6a5ez506fz5yut6v5038vafe8l1ck79j4uodr2w/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>


	<!-- Dashboard Sidebar
	================================================== -->
	<div class="dashboard-sidebar">
		<div class="dashboard-sidebar-inner" data-simplebar>
			<div class="dashboard-nav-container">

				<!-- Responsive Navigation Trigger -->
				<a href="#" class="dashboard-responsive-nav-trigger">
					<span class="hamburger hamburger--collapse" >
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</span>
					<span class="trigger-title">Dashboard Navigation</span>
				</a>
				
				<!-- Navigation -->
				<div class="dashboard-nav">
					<div class="dashboard-nav-inner">

						<ul data-submenu-title="Admin Dashbord">

							<li ><a href="{{"/admin/dashboard"}}"><i class="icon-material-outline-dashboard"></i> Dashboard</a></li>

							<li ><a href="#"><i class="icon-material-outline-add-circle-outline"></i> Add</a>
								<ul>
									<li ><a href="/admin/user"><i class="icon-material-outline-account-circle"></i> User</a></li>
									<li ><a href="/admin/college"><i class="icon-material-outline-account-circle"></i> college</a></li>
									<li ><a href="/admin/success_story"><i class="icon-material-outline-account-circle"></i> success story</a></li>
									<li ><a href="/admin/major_vs_major"><i class="icon-material-outline-account-circle"></i> majors vs majors</a></li>
									<li ><a href="/admin/article"><i class="icon-material-outline-account-circle"></i> article</a></li>
									<li ><a href="/admin/uni_live"><i class="icon-material-outline-account-circle"></i> uni_live</a></li>
									<li ><a href="/admin/major"><i class="icon-feather-book-open"></i> Major</a></li>
									<li ><a href="/admin/Testimonial"><i class="icon-material-outline-thumb-up"></i> Testimonial</a></li>
								</ul>	
							</li>

							<li class="active-submenu " ><a href="#"><i class="icon-feather-database"></i> Show data</a>
									<ul>
								<li ><a href="/admin/users"><i class="icon-material-outline-account-circle"></i> Users</a></li>
								<li ><a href="/admin/colleges"><i class="icon-material-outline-account-circle"></i> colleges</a></li>
								<li ><a href="/admin/success_stories"><i class="icon-material-outline-account-circle"></i> success stories</a></li>
								<li ><a href="/admin/majors_vs_majors"><i class="icon-material-outline-account-circle"></i> majors vs majors</a></li>
								<li ><a href="/admin/articles"><i class="icon-material-outline-account-circle"></i> articles</a></li>
								<li ><a href="/admin/references"><i class="icon-material-outline-account-circle"></i> references</a></li>
								<li ><a href="/admin/uni_lives"><i class="icon-material-outline-account-circle"></i> uni_lives</a></li>
								<li ><a href="/admin/majors"><i class="icon-feather-book-open"></i> Majors</a></li>
								<li ><a href="/admin/Testimonials"><i class="icon-material-outline-thumb-up"></i> Testimonials</a></li>
								<li ><a href="/admin/contacts"><i class="icon-material-baseline-mail-outline"></i> Contacts</a></li>
								<li ><a href="/admin/reports"><i class="icon-line-awesome-bullhorn"></i> Reports</a></li>
									</ul>	
							</li>

							<li class='margin-bottom-90' ><a href="{{"/admin/manage/1/edit"}}"><i class="icon-material-outline-dashboard"></i> manage qorrah</a></li>
						</ul>


					</div>
				</div>
				<!-- Navigation / End -->

			</div>
		</div>
	</div>
	<!-- Dashboard Sidebar / End -->


	<!-- Dashboard Content
	================================================== -->
			
            @yield('adminContent')

	<!-- Dashboard Content / End -->

</div>

{{-- text arwa tiny.cloud --}}
<script>
    tinymce.init({
      selector: '.tinymce',
      plugins: 'a11ychecker advcode formatpainter linkchecker lists link directionality',
      toolbar: 'undo redo |  bullist numlist |  ltr rtl | alignleft aligncenter alignright alignjustify | bold italic  forecolor backcolor formatpainter | link ',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
	  menubar: ' edit format tools '
   });
  </script>

    
@endsection
