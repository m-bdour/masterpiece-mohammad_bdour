<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Basic Page Needs
    ================================================== -->
    @yield('title')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href={{asset("assets/css/style.css")}} type="text/css">
    <link rel="stylesheet" href={{asset("assets/css/colors/purple.css")}} type="text/css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <!-- Scripts
    ================================================== -->
    <script src={{asset("assets/js/jquery-3.3.1.min.js")}}></script>
    <script src={{asset("assets/js/jquery-migrate-3.0.0.min.js")}}></script>



</head>

<body>

    <!-- Wrapper -->
    <div id="wrapper">

        {{-- alerts --}}
        @if ($message = Session::get('danger'))
        <p id="dangerMessage" class="hidden">{{$message}}</p>
        @endif
        @if ($message = Session::get('success'))
        <p id="successMessage" class="hidden">{{$message}}</p>
        @endif
        @if ($message = Session::get('warning'))
        <p id="warningMessage" class="hidden">{{$message}}</p>
        @endif
        @if ($message = Session::get('info'))
        @endif
        <p id="infoMessage" class="hidden">{{$message}}</p>


        <!-- Header Container
    ================================================== -->
        <header id="header-container" class="fullwidth">

            <!-- Header -->
            <div id="header">
                <div class="container">

                    <!-- Left Side Content -->
                    <div class="left-side">

                        <!-- Logo -->
                        <div id="logo">
                            <a href="{{ url('/') }}"><img src={{asset("assets/images/logo.png")}} alt=""></a>
                        </div>

                        <!-- Main Navigation -->
                        <nav id="navigation">
                            <ul id="responsive">

                                <li class="selfAlign"><a class="selfAlign" href="{{ url('/') }}" class="current">Home</a>
                                </li>

                                @if ( Auth::user() && Auth::user()->type == 'admin')

                                <li><a href="{{"/admin/dashboard"}}" class="current">Dashboard</a>
                                    <ul class="dropdown-nav">

                                        <li><a href="{{"/admin/dashboard"}}"><i class="icon-material-outline-dashboard"></i> Dashboard</a></li>

                                        <li class="active-submenu"><a href="{{"/admin/dashboard"}}"><i class="icon-feather-database"></i> Show data</a>
                                            <ul>
                                                <li><a href="/admin/users"> Users</a></li>
                                                <li><a href="/admin/majors"> Majors</a></li>
                                                <li><a href="/admin/positions"> Positions</a></li>
                                                <li><a href="/admin/applications">applications</a></li>
                                                <li><a href="/admin/Testimonials"> Testimonials</a></li>
                                                <li><a href="/admin/reports"> Reports</a></li>
                                                <li><a href="/admin/Contacts"> Contacts</a></li>
                                            </ul>
                                        </li>

                                        <li><a href="{{"/admin/dashboard"}}"><i class="icon-material-outline-add-circle-outline"></i> Add</a>
                                            <ul>
                                                <li><a href="/admin/user"> User</a></li>
                                                <li><a href="/admin/major"> Major</a></li>
                                                <li><a href="/admin/position"> Position</a></li>
                                                <li><a href="/admin/application"> application</a></li>
                                                <li><a href="/admin/Testimonial"> Testimonial</a></li>
                                            </ul>
                                        </li>

                                    </ul>
                                </li>
                                @endif
                                @if ( Auth::user() && (Auth::user()->type == 'company' || Auth::user()->type == 'admin' ))
                                <li><a href="{{ url('/trainees') }}">trainees</a></li>
                                <li><a href="{{ route('CompanyApplications') }}">Applications</a></li>
                                @else
                                <li><a href="{{ url('/jobs') }}">Find Job</a>
                                    <ul class="dropdown-nav">
                                        <li><a href="{{ url('/jobs') }}">jobs</a></li>
                                        <li><a href="{{ url('/Companies') }}">Companies</a></li>

                                    </ul>
                                </li>
                                @endif

                                @if ( Auth::user())

                                <li><a href="{{ url('/profile') }}">Profile</a></li>

                                @endif

                                <li><a href="{{ url('/contact') }}">Contact Us</a></li>
                                {{-- <li><a href="{{ url('#') }}">ِAbout Us#</a></li> --}}


                            </ul>
                        </nav>
                        <div class="clearfix"></div>
                        <!-- Main Navigation / End -->

                    </div>
                    <!-- Left Side Content / End -->


                    <!-- Right Side Content / End -->
                    <div class="right-side flexCenter ">
                        @guest


                        <div class="signButtons">
                            <a href="{{ route('login') }}" class="button ripple-effect ">Login</a>
                            <a href="{{ route('register') }}" class="button ripple-effect">Register</a>
                        </div>
                        @else

                        <!-- User Menu -->
                        <div class="header-widget">

                            <!-- Messages -->
                            <div class="header-notifications user-menu">
                                <div class="header-notifications-trigger">
                                    <a href="#">
                                        <div class="user-avatar"><img src={{asset("assets/images/profile/". Auth::user()->image)}} alt="{{Auth::user()->name}}"></div>
                                    </a>
                                </div>

                                <!-- Dropdown -->
                                <div class="header-notifications-dropdown">

                                    <!-- User Status -->
                                    <div class="user-status">

                                        <!-- User Name / Avatar -->
                                        <a href="{{ url('/profile') }}">
                                        <div class="user-details">
                                            <div class="user-avatar status-online"><img src={{asset("assets/images/profile/". Auth::user()->image)}} alt=" {{ Auth::user()->name }}">
                                            </div>
                                            <div class="user-name">
                                                {{ Auth::user()->name }} <span>{{ Auth::user()->title }} </span>
                                            </div>
                                        </div>
                                    </a>

                                    </div>

                                    <ul class="user-menu-small-nav">
                                        <li><a href="{{ url('/profile') }}"><i class="icon-material-outline-dashboard"></i>
                                                Profile</a></li>
                                        <li>
                                            <form method="POST" action="{{ route('logout') }}">

                                                @csrf
                                                <button class="dropdown-item" type="submit">
                                                    <i class="icon-material-outline-power-settings-new"></i>
                                                    {{ __('Logout') }}
                                                </button>
                                            </form>
                                        </li>

                                    </ul>

                                </div>
                            </div>

                        </div>
                        <!-- User Menu / End -->

                        @endguest

                        <!-- Mobile Navigation Button -->
                        <span class="mmenu-trigger">
                            <button class="hamburger hamburger--collapse" type="button">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>

                        </span>


                    </div>

                    <!-- Right Side Content / End -->

                </div>
            </div>
            <!-- Header / End -->

        </header>
        <div class="clearfix"></div>
        <!-- Header Container / End -->


        @yield('content')

        <!-- Footer
    ================================================== -->
        <div id="footer">

            <!-- Footer Top Section -->
            <div class="footer-top-section">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">

                            <!-- Footer Rows Container -->
                            <div class="footer-rows-container">

                                <!-- Left Side -->
                                <div class="footer-rows-left">
                                    <div class="footer-row">
                                        <div class="footer-row-inner footer-logo">
                                            <a href="{{ url('/') }}"> <img src={{asset("assets/images/logo2.png")}} alt="Qorrah"></a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Right Side -->
                                <div class="footer-rows-right">

                                    <!-- Social Icons -->
                                    <div class="footer-row">
                                        <div class="footer-row-inner">
                                            <ul class="footer-social-links">
                                                <li>
                                                    <a target="_blank" href="{{ url('//www.facebook.com/QorrahInitiative') }}" title="Facebook" data-tippy-placement="bottom" data-tippy-theme="light">
                                                        <i class="icon-brand-facebook-f"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a target="_blank" href="{{ url('//www.twitter.com/Cesterdad') }}" title="Twitter" data-tippy-placement="bottom" data-tippy-theme="light">
                                                        <i class="icon-brand-twitter"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a target="_blank" href="{{ url('//www.instagram.com/qorrahinitiative/') }}" title="Instagram" data-tippy-placement="bottom" data-tippy-theme="light">
                                                        <i class="icon-brand-instagram"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a target="_blank" href="{{ url('//www.linkedin.com/company/cesterdad/') }}" title="LinkedIn" data-tippy-placement="bottom" data-tippy-theme="light">
                                                        <i class="icon-brand-linkedin-in"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>

                                    <!-- Language Switcher -->
                                    <div class="footer-row">
                                        <div class="footer-row-inner">
                                            <select class="selectpicker language-switcher" data-selected-text-format="count" data-size="5">
                                                <option selected>English</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- Footer Rows Container / End -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer Top Section / End -->

            <!-- Footer Middle Section -->
            <div class="footer-middle-section">
                <div class="container">
                    <div class="row">

                        <!-- Links -->
                        <div class="col-xl-2 col-lg-2 col-md-3">
                            <div class="footer-links">
                                <h3>For Candidates</h3>
                                <ul>
                                    <li><a href="{{ url('/jobs') }}"><span>Browse Jobs</span></a></li>
                                    <li><a href="{{ url('/Companies') }}"><span>Browse companies</span></a></li>
                                </ul>
                            </div>
                        </div>

                        <!-- Links -->
                        @if (Auth::check() && Auth::user()->type == 'company')
                        <div class="col-xl-2 col-lg-2 col-md-3">

                            <div class="footer-links">
                                <h3>For Employers</h3>
                                <ul>
                                    <li><a href="{{ url('#') }}"><span>Browse Candidates</span></a></li>
                                    <li><a href="{{ url('#') }}"><span>Post a Job</span></a></li>
                                </ul>
                            </div>
                        </div>
                        @endif

                        <!-- Links -->
                        <div class="col-xl-2 col-lg-2 col-md-3">
                            <div class="footer-links">
                                <h3>Helpful Links</h3>
                                <ul>
                                    <li><a href="{{ url('/contact') }}"><span>Contact us</span></a></li>
                                    <li><a href="{{ url('#') }}"><span>about us</span></a></li>
                                    <li><a href="{{ url('#') }}"><span>Privacy Policy</span></a></li>
                                    <li><a href="{{ url('#') }}"><span>Terms of Use</span></a></li>
                                    <li><a href="{{ '#small-dialog-4' }}" class="popup-with-zoom-anim"><span>Report a problem</span></a></li>

                                    <div id="small-dialog-4" class="zoom-anim-dialog mfp-hide dialog-with-tabs">

                                        <!--Tabs -->
                                        <div class="sign-in-form">

                                            <ul class="popup-tabs-nav">
                                                <li><a href="#tab">Report</a></li>
                                            </ul>

                                            <div class="popup-tabs-container">

                                                <!-- Tab -->
                                                <div class="popup-tab-content" id="tab">

                                                    <!-- Welcome Text -->
                                                    <div class="welcome-text">
                                                        <p>Report a problem with Qorrah website</p>
                                                    </div>

                                                    <!-- Form -->
                                                    <form method="post" action="{{ route('report') }}" id="ApplyJob" enctype="multipart/form-data">
                                                        @csrf

                                                        {{-- Date --}}
                                                        <div class="col-xl-12">
                                                            <div class="submit-field">
                                                                <h5>Date that the issue occurred</h5>
                                                                <input type="date" class="with-border" name="date">
                                                            </div>
                                                        </div>

                                                        {{-- time --}}
                                                        <div class="col-xl-12">
                                                            <div class="submit-field">
                                                                <h5>What time did the issue occur? (an approximate time is fine)</h5>
                                                                <input type="text" class="with-border" name="time">
                                                            </div>
                                                        </div>
                                                        {{-- page --}}
                                                        <div class="col-xl-12">
                                                            <div class="submit-field">
                                                                <h5>Which page was the issue on?</h5>
                                                                <input type="text" class="with-border" name="page">
                                                            </div>
                                                        </div>
                                                        {{-- pageLink --}}
                                                        <div class="col-xl-12">
                                                            <div class="submit-field">
                                                                <h5>If you have a link to the page, please include it here</h5>
                                                                <input type="text" class="with-border" name="pageLink">
                                                            </div>
                                                        </div>

                                                        {{-- describe --}}
                                                        <div class="col-xl-12">
                                                            <div class="submit-field">
                                                                <h5>Can you describe what happened in detail?</h5>
                                                                <textarea cols="20" rows="5" name="describe" class="with-border"> </textarea>
                                                            </div>
                                                        </div>
                                                        {{-- device --}}
                                                        <div class="col-xl-12">
                                                            <div class="submit-field">
                                                                <h5>What device were you using?</h5>
                                                                <select class="selectpicker with-border" name="device" data-size="5" title="Select a device">
                                                                    <option disabled selected value='select device'>select a device</option>
                                                                    <option value="Phone">Phone</option>
                                                                    <option value="Tablet">Tablet</option>
                                                                    <option value="Desktop computer">Desktop computer</option>
                                                                    <option value="Laptop">Laptop</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        {{-- OS --}}
                                                        <div class="col-xl-12">
                                                            <div class="submit-field">
                                                                <h5>What operating system were you using?</h5>
                                                                <select class="selectpicker with-border" name="OS" data-size="5" title="Select a system">
                                                                    <option disabled selected value='select system'>select a system</option>
                                                                    <option value="Windows">Windows</option>
                                                                    <option value="Mac">Mac</option>
                                                                    <option value="Android">Android</option>
                                                                    <option value="Linux">Linux</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        {{-- browser --}}
                                                        <div class="col-xl-12">
                                                            <div class="submit-field">
                                                                <h5>What browser were you using?</h5>
                                                                <select class="selectpicker with-border" name="browser" data-size="5" title="Select a browser">
                                                                    <option disabled selected value='select system'>select a browser</option>
                                                                    <option value="Internet Explorer">Internet Explorer</option>
                                                                    <option value="Chrome">Chrome</option>
                                                                    <option value="Safari">Safari</option>
                                                                    <option value="Microsoft Edge">Microsoft Edge</option>
                                                                    <option value="Firefox">Firefox</option>
                                                                    <option value="Brave">Brave</option>
                                                                    <option value="Opera">Opera</option>
                                                                    <option value="Samsung Internet">Samsung Internet</option>
                                                                    <option value="UC Browser">UC Browser</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        {{-- version --}}
                                                        <div class="col-xl-12">
                                                            <div class="submit-field">
                                                                <h5>What browser version were you using?</h5>
                                                                <input type="text" class="with-border" name="version">
                                                            </div>
                                                        </div>
                                                        {{-- else --}}
                                                        <div class="col-xl-12">
                                                            <div class="submit-field">
                                                                <h5>Is there anything else you'd like to tell us?</h5>
                                                                <textarea cols="30" rows="5" name="else" class="with-border"> </textarea>
                                                            </div>
                                                        </div>

                                                        {{-- email --}}
                                                        <div class="col-xl-12">
                                                            <div class="submit-field">
                                                                <h5>What is your email address? <span>(required)</span></h5>
                                                                <input type="email" class="with-border" name="email">
                                                            </div>
                                                        </div>


                                                    </form>

                                                    <!-- Button -->
                                                    <button class="button full-width button-sliding-icon ripple-effect" type="submit" form="ApplyJob">Report <i class="icon-material-outline-arrow-right-alt"></i></button>

                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                </ul>
                            </div>
                        </div>

                        <!-- Links -->
                        <div class="col-xl-2 col-lg-2 col-md-3">
                            <div class="footer-links">
                                <h3>Account</h3>
                                <ul>
                                    @if (Auth::check())

                                    <li><a href="{{ url('/profile') }}"><span>{{ __('Profile') }}</span></a></li>
                                    <li><a href="{{ route('logout') }}"><span>{{ __('Logout') }}</span></a></li>
                                    @else

                                    <li><a href="{{ route('login') }}"><span>{{ __('Log In') }}</span></a></li>
                                    <li><a href="{{ route('register') }}"><span>{{ __('Register') }}</span></a></li>
                                    @endif

                                </ul>
                            </div>
                        </div>

                        <!-- About -->
                        <div class="col-xl-4 col-lg-4 col-md-12">
                            <h3></i>Qorrah For ​specialized training​</h3>
                            <p>We match aspiring candidates with inspiring companies. </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer Middle Section / End -->

            <!-- Footer Copyrights -->
            <div class="footer-bottom-section">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            © 2021 <strong>Qorrah</strong>. All Rights Reserved.
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer Copyrights / End -->

        </div>
        <!-- Footer / End -->

    </div>
    <!-- Wrapper / End -->



    <!-- Scripts
    ================================================== -->
    <script src={{asset("assets/js/mmenu.min.js")}}></script> {{-- mobile menu --}}
    <script src={{asset("assets/js/tippy.all.min.js")}}></script> {{-- Fast load--}}
    <script src={{asset("assets/js/simplebar.min.js")}}></script> {{-- scrollbars  --}}
    <script src={{asset("assets/js/bootstrap-slider.min.js")}}></script>
    <script src={{asset("assets/js/bootstrap-select.min.js")}}></script>
    <script src={{asset("assets/js/snackbar.js")}}></script> {{-- NOTIFICATIONS  --}}
    <script src={{asset("assets/js/clipboard.min.js")}}></script>
    <script src={{asset("assets/js/counterup.min.js")}}></script>
    <script src={{asset("assets/js/magnific-popup.min.js")}}></script>
    <script src={{asset("assets/js/slick.min.js")}}></script> {{-- carousel  --}}
    <script src={{asset("assets/js/custom.js")}}></script>

    <!-- Snackbar // documentation: https://www.polonel.com/snackbar/ -->
    <script>
        // Snackbar for user status switcher
        let dangerMessage = document.getElementById("dangerMessage") || undefined;
        let warningMessage = document.getElementById("warningMessage") || undefined;
        let infoMessage = document.getElementById("infoMessage") || undefined;
        let successMessage = document.getElementById("successMessage") || undefined;

        if (typeof(dangerMessage) != 'undefined' && dangerMessage.innerText != '') {
            Snackbar.show({
                text: dangerMessage.innerText,
                pos: 'top-center',
                showAction: true,
                actionText: " X ",
                duration: 5000,
                textColor: '#de5959',
                backgroundColor: '#ffe9e9'
            });
        }
        if (typeof(warningMessage) != 'undefined' && warningMessage.innerText != '') {
            Snackbar.show({
                text: warningMessage.innerText,
                pos: 'top-center',
                showAction: true,
                actionText: " X ",
                duration: 4000,
                textColor: '#8f872e',
                backgroundColor: '#FBFADD'
            });
        }
        if (typeof(infoMessage) != 'undefined' && infoMessage.innerText != '') {
            Snackbar.show({
                text: infoMessage.innerText,
                pos: 'top-center',
                showAction: true,
                actionText: " X ",
                duration: 4000,
                textColor: '#3184ae',
                backgroundColor: '#E9F7FE'
            });
        }
        if (typeof(successMessage) != 'undefined' && successMessage.innerText != '') {
            Snackbar.show({
                text: successMessage.innerText,
                pos: 'top-center',
                showAction: true,
                actionText: " X ",
                duration: 4000,
                textColor: '#5f9025',
                backgroundColor: '#EBF6E0'
            });
        }
    </script>

    <!-- Google Autocomplete -->
    <script>
        function initAutocomplete() {
            var options = {
                types: ['(cities)'],
                // componentRestrictions: {country: "us"}
            };

            var input = document.getElementById('autocomplete-input');
            var autocomplete = new google.maps.places.Autocomplete(input, options);
        }

        // Autocomplete adjustment for homepage
        if ($('.intro-banner-search-form')[0]) {
            setTimeout(function() {
                $(".pac-container").prependTo(".intro-search-field.with-autocomplete");
            }, 300);
        }
    </script>

    {{-- add Profile photo --}}
    <script>
        // ----- On render Image -----
        $(function() {

            $('#profile').addClass('dragging').removeClass('dragging');
        });

        $('#profile').on('dragover', function() {
            $('#profile').addClass('dragging')
        }).on('dragleave', function() {
            $('#profile').removeClass('dragging')
        }).on('drop', function(e) {
            $('#profile').removeClass('dragging hasImage');

            if (e.originalEvent) {
                var file = e.originalEvent.dataTransfer.files[0];
                console.log(file);

                var reader = new FileReader();

                //attach event handlers here...

                reader.readAsDataURL(file);
                reader.onload = function(e) {
                    $('#profile').css('background-image', 'url(' + reader.result + ')').addClass('hasImage');
                }

            }
        })
        $('#profile').on('click', function(e) {
            console.log('clicked')
            $('#mediaFile').click();
        });
        window.addEventListener("dragover", function(e) {
            e = e || event;
            e.preventDefault();
        }, false);
        window.addEventListener("drop", function(e) {
            e = e || event;
            e.preventDefault();
        }, false);
        $('#mediaFile').change(function(e) {

            var input = e.target;
            if (input.files && input.files[0]) {
                var file = input.files[0];

                var reader = new FileReader();

                reader.readAsDataURL(file);
                reader.onload = function(e) {
                    $('#profile').css('background-image', 'url(' + reader.result + ')').addClass('hasImage');
                }
            }
        });
    </script>

    {{-- add Cover photo --}}
    <script>
        // ----- On render Image -----
        $(function() {

            $('#cover').addClass('dragging').removeClass('dragging');
        });

        $('#cover').on('dragover', function() {
            $('#cover').addClass('dragging')
        }).on('dragleave', function() {
            $('#cover').removeClass('dragging')
        }).on('drop', function(e) {
            $('#cover').removeClass('dragging hasImage');

            if (e.originalEvent) {
                var file = e.originalEvent.dataTransfer.files[0];
                // console.log(file);

                var reader = new FileReader();

                //attach event handlers here...

                reader.readAsDataURL(file);
                reader.onload = function(e) {
                    // console.log(reader.result);
                    $('#cover').css('background-image', 'url(' + reader.result + ')').addClass('hasImage');

                }

            }
        })
        $('#cover').on('click', function(e) {
            // console.log('clicked')
            $('#mediaFileCover').click();
        });
        window.addEventListener("dragover", function(e) {
            e = e || event;
            e.preventDefault();
        }, false);
        window.addEventListener("drop", function(e) {
            e = e || event;
            e.preventDefault();
        }, false);
        $('#mediaFileCover').change(function(e) {

            var input = e.target;
            if (input.files && input.files[0]) {
                var file = input.files[0];

                var reader = new FileReader();

                reader.readAsDataURL(file);
                reader.onload = function(e) {
                    // console.log(reader.result);
                    $('#cover').css('background-image', 'url(' + reader.result + ')').addClass('hasImage');
                }
            }
        })
    </script>
    {{-- add Cover photo 2 --}}
    <script>
        // ----- On render Image -----
        $(function() {

            $('#cover2').addClass('dragging').removeClass('dragging');
        });

        $('#cover2').on('dragover', function() {
            $('#cover2').addClass('dragging')
        }).on('dragleave', function() {
            $('#cover2').removeClass('dragging')
        }).on('drop', function(e) {
            $('#cover2').removeClass('dragging hasImage');

            if (e.originalEvent) {
                var file = e.originalEvent.dataTransfer.files[0];
                // console.log(file);

                var reader = new FileReader();

                //attach event handlers here...

                reader.readAsDataURL(file);
                reader.onload = function(e) {
                    // console.log(reader.result);
                    $('#cover2').css('background-image', 'url(' + reader.result + ')').addClass('hasImage');

                }

            }
        })
        $('#cover2').on('click', function(e) {
            // console.log('clicked')
            $('#mediaFileCover2').click();
        });
        window.addEventListener("dragover", function(e) {
            e = e || event;
            e.preventDefault();
        }, false);
        window.addEventListener("drop", function(e) {
            e = e || event;
            e.preventDefault();
        }, false);
        $('#mediaFileCover2').change(function(e) {

            var input = e.target;
            if (input.files && input.files[0]) {
                var file = input.files[0];

                var reader = new FileReader();

                reader.readAsDataURL(file);
                reader.onload = function(e) {
                    // console.log(reader.result);
                    $('#cover2').css('background-image', 'url(' + reader.result + ')').addClass('hasImage');
                }
            }
        })
    </script>



    <!-- Google API & Maps -->
    <!-- Geting an API Key: https://developers.google.com/maps/documentation/javascript/get-api-key -->
    <script src="https://maps.googleapis.com/maps/api/js?key=&libraries=places"></script>
    <script src={{asset("assets/js/infobox.min.js")}}></script>
    <script src={{asset("assets/js/markerclusterer.js")}}></script>
    <script src={{asset("assets/js/maps.js")}}></script>




</body>

</html>