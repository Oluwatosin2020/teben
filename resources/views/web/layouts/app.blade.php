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
    <style>
      .selected{
          color: #ff8f07 !important;
          border-width: 2px;
          border-color: #ff8f07 !important;
      }
  
      .select_role{
          cursor: pointer;
      }
  
      .w3l-login .form-inner-cont {
      margin: 20px auto;
      padding: 1.5rem;
      border-radius: var(--card-curve);
      box-shadow: var(--card-box-shadow);
      background: #fff;
  }
  
  .fs-30{
      font-size: 30px;
  }
  
  .w3l-login .w3l-form-36-mian {
      min-height: auto;
  }

  .form-inner-cont{
    max-width: 100% !important;
  }
  </style>
  </head>
  <body>

    @include('web.includes.header')

    @yield('content')
    
  <!-- footer -->
    @include('web.includes.footer')
    @include('web.includes.script')

  </body>

</html>