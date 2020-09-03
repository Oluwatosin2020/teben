<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Payment Details</title>
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
                        <h5><b>Hello</b> {{Auth::user()->name}} , you are now a verified {{strtolower(Auth::user()->role)}}!</h5>
                        <p><i>Kindly fill in your bank details to enable us process your payment when you place withdrawal!</i></p>
                            <div class="tab-content mt-3" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                  <form action="{{ route('createbank') }}" method="POST"> {{csrf_field()}}
                                    <div class="row mt-3" >
                                        <div class="offset-md-3 col-md-6">
                                            <div class="form-group">
                                                <p>Bank Name</p>
                                                <select type="text"  id="bank_code"  name="bank_name" class="form-control"  style="height: 45px"  required>
                                                    @if(count($banks) == 0)
                                                        <option value="" disabled selected>No Data Found!</option>
                                                    @else
                                                        <option value="" disabled selected>Select Bank</option>
                                                        @foreach($banks->data as $bank)
                                                            <option value="{{$bank->code.','.$bank->name}}">{{$bank->name}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                @if ($errors->has('bank_name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('bank_name') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="offset-md-3 col-md-6">
                                            <div class="form-group">
                                                <p>Account Number</p>
                                                <input type="number" name="account_no" id="account_no" class="form-control" disabled required value="{{ old('account_no') }}" placeholder="Account Number">
                                                @if ($errors->has('account_no'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('account_no') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="offset-md-3 col-md-6">
                                            <div class="form-group">
                                                <p>Account Name</p>
                                                <input type="text" name="account_name" id="account_name" class="form-control"  value="{{ old('account_name') }}" placeholder="Account Name">
                                                @if ($errors->has('account_name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('account_name') }}</strong>
                                                </span>
                                                @endif
                                                <p id="info-block"></p>
                                            </div>
                                        </div>
                                        <div id="bank_msg" class="text-center"></div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-3 pull-right" id="bankbtn">
                                        Proceed
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
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