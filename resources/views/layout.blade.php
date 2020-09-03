<!DOCTYPE html>
<html lang="en">
  <head>
    <title>@yield('title') - Teben Tutors</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Teben Tutors">
    <meta name="keywords" content="teen tutor,tutor jobs, teben,tebentutors,teben tutors,tutors,lessons,home lesson,private lesson, children, education, teachers, hire teacher,tutorials">
    <meta name="author" content="Confidence Ugolo">

    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fredericka+the+Great" rel="stylesheet">

    <link rel="stylesheet" href="{{ $web_source }}/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="{{ $web_source }}/css/animate.css">

    <link rel="stylesheet" href="{{ $web_source }}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ $web_source }}/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{ $web_source }}/css/magnific-popup.css">

    <link rel="stylesheet" href="{{ $web_source }}/css/aos.css">

    <link rel="stylesheet" href="{{ $web_source }}/css/ionicons.min.css">

    <link rel="stylesheet" href="{{ $web_source }}/css/flaticon.css">
    <link rel="stylesheet" href="{{ $web_source }}/css/icomoon.css">
    <link rel="stylesheet" href="{{ $web_source }}/css/style.css">
    <link rel="shortcut icon" href="{{ $logo_img }}" type="image/x-icon">
    <style>
        .logo{
            width:80px;
        }
    </style>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco_navbar ftco-navbar-light" id="ftco-navbar">
	    <div class="container d-flex align-items-center">
	    	<a class="navbar-brand" href="{{ url('/') }}"><img class="logo" src="{{ $logo }}" alt="Logo" title="Logo" style="width:40px;height:50px"/></a>
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


    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-2">
          <div class="col-md-6 col-lg-4">
            <div class="ftco-footer-widget mb-5">
            	<h2 class="ftco-heading-2">Have a Question?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">B13, prestige plaza, Jehovah witness junction, bogije lagos.</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+234 703 396 4406</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@tebentutors.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>


          <div class="col-md-6 col-lg-4">
            <div class="ftco-footer-widget mb-5">
            	<h2 class="ftco-heading-2">Subscribe to Newsletter!</h2>
              <form action="#" class="subscribe-form">
                <div class="form-group">
                  <input type="text" class="form-control mb-2 text-center" placeholder="Enter email address">
                  <input type="submit" value="Subscribe" class="form-control submit px-3">
                </div>
              </form>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="ftco-footer-widget mb-1 ml-md-4">
              <ul class="list-unstyled">
                <li><a href="{{ url('/') }}"><span class="ion-ios-arrow-round-forward mr-2"></span>Home</a></li>
                <li><a href="{{ route('teachers') }}"><span class="ion-ios-arrow-round-forward mr-2"></span>Teachers</a></li>
                <li><a href="{{ route('contactus') }}"><span class="ion-ios-arrow-round-forward mr-2"></span>Contact Us</a></li>
              </ul>
            </div>
            <div class="ftco-footer-widget">
            	<h2 class="ftco-heading-2 mb-0">Connect With Us</h2>
            	<ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> Teben Tutors. All rights reserved </p>
          </div>
        </div>
      </div>
    </footer>



  <!-- loader -->
  <!--<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>-->



  <script src="{{ $web_source }}/js/jquery.min.js"></script>
  <script src="{{ $web_source }}/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="{{ $web_source }}/js/popper.min.js"></script>
  <script src="{{ $web_source }}/js/bootstrap.min.js"></script>
  <script src="{{ $web_source }}/js/jquery.easing.1.3.js"></script>
  <script src="{{ $web_source }}/js/jquery.waypoints.min.js"></script>
  <script src="{{ $web_source }}/js/jquery.stellar.min.js"></script>
  <script src="{{ $web_source }}/js/owl.carousel.min.js"></script>
  <script src="{{ $web_source }}/js/jquery.magnific-popup.min.js"></script>
  <script src="{{ $web_source }}/js/aos.js"></script>
  <script src="{{ $web_source }}/js/jquery.animateNumber.min.js"></script>
  <script src="{{ $web_source }}/js/scrollax.min.js"></script>
  <script src="{{ $web_source }}/js/main.js"></script>

  </body>
</html>
