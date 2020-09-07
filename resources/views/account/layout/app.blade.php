<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Teben Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{ $logo_img }}">
    <link rel="stylesheet" href="{{ $admin_source }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ $admin_source }}/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ $admin_source }}/css/themify-icons.css">
    <link rel="stylesheet" href="{{ $admin_source }}/css/metisMenu.css">
    <link rel="stylesheet" href="{{ $admin_source }}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ $admin_source }}/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="{{ $admin_source }}/css/typography.css">
    <link rel="stylesheet" href="{{ $admin_source }}/css/default-css.css">
    <link rel="stylesheet" href="{{ $admin_source }}/css/styles.css">
    <link rel="stylesheet" href="{{ $admin_source }}/css/responsive.css">
    <!-- modernizr css -->
    <script src="{{ $admin_source }}/js/vendor/modernizr-2.8.3.min.js"></script>
    <style>
        .moreinfo{
            padding-left: 5px;
            padding-right: 5px;
        }
        .required{
            color:red;
        }
        .logo{
            width:80px;
        }
        .logo-text{
            color:white;
            font-size:20px;
            margin-left:10px;
        }
    </style>
</head>

<body>
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="">
                    <a href="{{ url('/') }}"><img class="logo" src="{{ asset('public/logo.png') }}" alt="Logo" title="Logo" style="height:60px;width:50px"/></a> <span class="logo-text"> Dashboard </span>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu" style="margin-bottom:10vh">
                            <li class="active">
                                <a href="{{ route('index') }}"><i class="ti-home"></i><span>Home page</span></a>
                            </li>
                            <li class="active">
                            <a href="{{ route('available_books')}}" ><i class="fa fa-user"></i><span>{{ $account->name }}</span></a>
                            </li>
                            <li class="active">
                                 <a href="#"><i class="ti-phone"></i><span>Downloads ({{ $account->downloads }})</span></a>
                            </li>
                            <li class="active">
                                <a href="#"><i class="ti-arrow"></i><span>Available ({{ $account->available }})</span></a>
                            </li>
                            <br>
                            <li class="active">
                                <a href="#"><i class="ti-school"></i><span>School ({{ $account->school->name }})</span></a>
                            </li>
                            <li class="active">
                                <a href="#"><i class="ti-k"></i><span>Class ({{ $account->klass->name }})</span></a>
                            </li>
                            <li class="active">
                                <a href="#"><i class="ti-clock"></i><span>Term ({{ getTerms($account->term) }})</span></a>
                            </li>

{{--
                           <li style="margin-bottom:10vh">
                                <a href="#" class="logoutbtn "> <i class="ti-alert"></i> Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> @csrf
                                </form>
                            </li> --}}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->

        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-2 ">
                        <div class="nav-btn pull-left">
                             <b style="color:blue">Menu</b>
                        </div>

                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-10">

                    </div>
                </div>
            </div>
            <!-- header area end -->

    @yield('content')



                    </div>
@if (Session::has('error_msg'))
    <p id="alert_error" style="display:none">{!! session('error_msg') !!}</p>
@endif
@if (Session::has('success_msg'))
    <p id="alert_success" style="display:none">{!! session('success_msg') !!}</p>
@endif
@if (Session::has('notify_msg'))
    <p id="notify_msg" style="display:none">{!! session('notify_msg') !!}</p>
@endif

<!-- The actual snackbar -->
<div id="snackbar"></div>
<!-- footer area start-->
<footer>
    <div class="footer-area">
        <p>© Copyright Teben tutors 2020. All right reserved.</p>
    </div>
</footer>
<!-- footer area end-->
</div>
<!-- page container area end -->
<!-- offset area start -->

    <!-- jquery latest version -->
    <script src="{{ $admin_source }}/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- <script src="{{ $admin_source }}/js/jquery-3.3.1.js"></script> -->
    <!-- bootstrap 4 js -->
    <script src="{{ $admin_source }}/js/popper.min.js"></script>
    <script src="{{ $admin_source }}/js/bootstrap.min.js"></script>
    <script src="{{ $admin_source }}/js/owl.carousel.min.js"></script>
    <script src="{{ $admin_source }}/js/metisMenu.min.js"></script>
    <script src="{{ $admin_source }}/js/jquery.slimscroll.min.js"></script>
    <script src="{{ $admin_source }}/js/jquery.slicknav.min.js"></script>



    <!-- others plugins -->
    <script src="{{ $admin_source }}/js/plugins.js"></script>
    <script src="{{ $admin_source }}/js/scripts.js"></script>
    <script src="https://js.paystack.co/v1/inline.js"></script>

</body>

</html>
