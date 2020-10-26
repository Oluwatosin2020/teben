<!DOCTYPE html>
<html lang="en">
<head>
	<title>@yield('title') - Teben Tutors</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<link rel="stylesheet" type="text/css" href="{{ $web_source }}/auth/css/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="{{ $web_source }}/auth/css/main.css">
</head>
<body class="bg-grey">
	<div class="container">
        <div class="homeBtn">
            <a href="{{url('/')}}" class=""> Back to Home page</a>
        </div>
	    @yield('content')
	</div>
    <script src="{{ $web_source }}/js/jquery.min.js"></script>
    <!--<script src="{{ $web_source }}/auth/js/bootstrap/bootstrap.min.js"></script>-->
    <script src="{{ $web_source }}/auth/js/script.js"></script>
</body>
</html>
