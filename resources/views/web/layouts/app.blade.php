<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Teben Tutors">
    <meta name="keywords" content="teen tutor,tutor jobs, teben,tebentutors,teben tutors,tutors,lessons,home lesson,private lesson, children, education, teachers, hire teacher,tutorials">
    <meta name="author" content="Confidence Ugolo">
    <title>{{ $title ?? '' }} - Teben Tutors</title>

    <link href="http://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&amp;display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ $web_source }}/css/style-liberty.css">
  </head>
  <body>

    @include('web.includes.header')

    @yield('content')
    
  <!-- footer -->
    @include('web.includes.footer')
    @include('web.includes.script')

  </body>

</html>