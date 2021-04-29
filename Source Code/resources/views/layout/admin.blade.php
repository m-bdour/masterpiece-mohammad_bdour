@extends('layout.public')
@section('content')

<div class="dashboard-container">


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

							<li class="active-submenu" ><a href="#"><i class="icon-feather-database"></i> Show data</a>
									<ul>
								<li ><a href="/admin/users"><i class="icon-material-outline-account-circle"></i> Users</a></li>
								<li ><a href="/admin/majors"><i class="icon-feather-book-open"></i> Majors</a></li>
								<li ><a href="/admin/positions"><i class="icon-material-outline-business-center"></i> Positions</a></li>
								<li ><a href="/admin/applications"><i class="icon-material-outline-assignment"></i> applications</a></li>
								<li ><a href="/admin/Testimonials"><i class="icon-material-outline-thumb-up"></i> Testimonials</a></li>
								<li ><a href="/admin/reports"><i class="icon-line-awesome-bullhorn"></i> Reports</a></li>
								<li ><a href="/admin/contacts"><i class="icon-material-baseline-mail-outline"></i> Contacts</a></li>
									</ul>	
							</li>

							<li><a href="#"><i class="icon-material-outline-add-circle-outline"></i> Add</a>
								<ul>
									<li ><a href="/admin/user"><i class="icon-material-outline-account-circle"></i> User</a></li>
									<li ><a href="/admin/major"><i class="icon-feather-book-open"></i> Major</a></li>
									<li ><a href="/admin/position"><i class="icon-material-outline-business-center"></i> Position</a></li>
									<li ><a href="/admin/application"><i class="icon-material-outline-assignment"></i> application</a></li>
									<li ><a href="/admin/Testimonial"><i class="icon-material-outline-thumb-up"></i> Testimonial</a></li>
								</ul>	
							</li>
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
    
@endsection
