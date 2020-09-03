<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Complete Profile</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('public/dashboard/images/icon/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('public/dashboard/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/dashboard/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/dashboard/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('public/dashboard/css/metisMenu.css') }}">
    <link rel="stylesheet" href="{{ asset('public/dashboard/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/dashboard/css/slicknav.min.css') }}">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="{{ asset('public/dashboard/css/typography.css') }}">
    <link rel="stylesheet" href="{{ asset('public/dashboard/css/default-css.css') }}">
    <link rel="stylesheet" href="{{ asset('public/dashboard/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('public/dashboard/css/responsive.css') }}">
    <!-- modernizr css -->
    <script src="{{ asset('public/dashboard/js/vendor/modernizr-2.8.3.min.js') }}"></script>
</head>
<body style="background-image:url({{ asset('public/web/images/bg_1.jpg') }});">
  <div class="container" style="opacity: 0.9" >
        
            <!-- anchor tab start -->
            <div class="offset-md-2 col-md-8 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h5><b>Hello</b> {{Auth::user()->name}}</h5>
                        <p><i>Kindly complete your profile to proceed!</i></p>
                        <div class="tab-content mt-3" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                   <form action="{{ route('completeProfile') }}" method="POST" enctype="multipart/form-data"> {{csrf_field()}}
                                    <div class="row mt-3" >
                                        <div class="col-md-4">
                                            <div class="avatarUploaded">
                                                <img src="{{ asset('public/dashboard/images/author/user.png') }}" class="img " alt="" >   
                                            </div>
                                            <!-- <progress></progress> -->
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <p>Upload Picture</p>
                                            <input type="file" name="avatar" id="uploadAvatar" required>

                                            <div class="mt-3">
                                                <p>Gender</p>
                                                <select type="text" name="gender" id="" class="form-control"  style="height: 45px"  required>
                                                    <option value="" disabled selected>You are a ?</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>

                                            <div class="mt-3">
                                                <p>Status</p>
                                                <select type="text" name="marital_status" id="" class="form-control"  style="height: 45px"  required>
                                                    <option value="" disabled selected>Are you married ?</option>
                                                    <option value="Married">Yes</option>
                                                    <option value="Single">No</option>
                                                    <option value="Divorced">I`m divorced</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <p>Phone Number</p>
                                            <input type="number" name="phone" id="" class="form-control">

                                            <div class="mt-2">
                                                <p>I`m in ?</p>
                                                <select type="text" name="country" id="" class="form-control fc" style="height: 45px" required>
                                                    <option value="" disabled selected>Select Country</option>
                                                    <option value="Nigeria">Nigeria</option>
                                                </select>
                                            </div>

                                            <div class="mt-2">
                                                <p>What state are you in ?</p>
                                                <input type="text" name="state" id="" placeholder="Lagos" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="container">
                                            <div class="row mt-2">
                                                <div class="col-md-5">
                                                    <div class="mt-2">
                                                        <p>Local government ?</p>
                                                        <input type="text" name="lga" id="" class="form-control" placeholder="Ibeju Lekki" required>
                                                    </div>
                                                    <div class="mt-2">
                                                        <p>Town ?</p>
                                                        <input type="text" name="town" id="" class="form-control" placeholder="Bogije" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-7 mt-2">
                                                    <p>Home Address</p>
                                                    <textarea name="address" id="" cols="100" class="form-control" rows="5" placeholder="House no. , street name, town, local gov area, state, country e.g 4,Akinyemi street, Bogije, Ibeju Lekki, Lagos, Nigeria." required></textarea>
                                                </div>
                                             </div>
                                        </div>

                                        <p>The information provided would be used in finding and linking you to the right tutors or parents. Please fill correctly!</p>
                                    </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3 pull-right">
                            Proceed
                        </button>
                    </div>
                    </form>
                </div>
            </div>
            <!-- anchor tab end -->
</div>

<!-- page container area end -->
<!-- offset area start -->

    <!-- jquery latest version -->
   <script src="{{ asset('public/dashboard/js/vendor/jquery-2.2.4.min.js') }}"></script>
    <!-- <script src="{{ asset('public/dashboard/js/jquery-3.3.1.js') }}"></script> -->
    <!-- bootstrap 4 js -->
    <script src="{{ asset('public/dashboard/js/popper.min.js') }}"></script>
    <script src="{{ asset('public/dashboard/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/dashboard/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('public/dashboard/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('public/dashboard/js/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('public/dashboard/js/jquery.slicknav.min.js') }}"></script>

 

    <!-- others plugins -->
    <script src="{{ asset('public/dashboard/js/plugins.js') }}"></script>
    <script src="{{ asset('public/dashboard/js/scripts.js') }}"></script>

</body>
</html>