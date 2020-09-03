<!DOCTYPE html>
<html lang="en">
  <head>
    <title>@yield('title') - Teben Tutors</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Teben Tutors">
    <meta name="keywords" content="teen tutor,tutor jobs, teben,tebentutors,teben tutors,tutors,lessons,home lesson,private lesson, children, education, teachers, hire teacher,teben login">
    <meta name="author" content="Confidence Ugolo">
    
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fredericka+the+Great" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('public/web/css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/web/css/animate.css') }}">
    
    <link rel="stylesheet" href="{{ asset('public/web/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/web/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/web/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('public/web/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('public/web/css/ionicons.min.css') }}">
    
    <link rel="stylesheet" href="{{ asset('public/web/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('public/web/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('public/web/css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('public/logo.png') }}" type="image/x-icon">
    <style>
        .logo{
            width:80px;
        }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco_navbar ftco-navbar-light" id="ftco-navbar">
	    <div class="container d-flex align-items-center">
	    	<a class="navbar-brand" href="{{ url('/') }}"><img class="logo" src="{{ asset('public/logo.png') }}" alt="Logo" title="Logo" style="width:40px;height:50px"/></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	        	<li class="nav-item active"><a href="{{ route('index') }}" class="nav-link pl-0">Home</a></li>
	        	<li class="nav-item"><a href="{{ route('teachers') }}" class="nav-link">Teachers</a></li>
              <li class="nav-item"><a href="{{ route('contactus') }}" class="nav-link">Contact Us</a></li>
              @guest
	          <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
              <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Register</a></li>
              @else
              <li class="nav-item"><a href="{{ route('home') }}" class="nav-link">Dashboard</a></li>
              @endguest
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
    
    @yield('content')

		

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>



  <script src="{{ asset('public/web/js/jquery.min.js') }}"></script>
  <script src="{{ asset('public/web/js/jquery-migrate-3.0.1.min.js') }}"></script>
  <script src="{{ asset('web/js/popper.min.js') }}"></script>
  <script src="{{ asset('public/web/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('public/web/js/jquery.easing.1.3.js') }}"></script>
  <script src="{{ asset('public/web/js/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('public/web/js/jquery.stellar.min.js') }}"></script>
  <script src="{{ asset('public/web/js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('public/web/js/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ asset('public/web/js/aos.js') }}"></script>
  <script src="{{ asset('public/web/js/jquery.animateNumber.min.js') }}"></script>
  <script src="{{ asset('public/web/js/scrollax.min.js') }}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="{{ asset('public/web/js/google-map.js') }}"></script>
  <script src="{{ asset('public/web/js/main.js') }}"></script>
    
  </body>
</html>