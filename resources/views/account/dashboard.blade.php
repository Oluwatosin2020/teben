@extends('web.layouts.app' , ['title' => 'My Dashboard' , 'activePage' => 'profile'])
@section('content')


<!-- breadcrum -->
<section class="w3l-skill-breadcrum">
    <div class="breadcrum">
      <div class="container">
        <p><a href="#">Dashboard</a></p>
      </div>
    </div>
  </section>
  <!-- //breadcrum -->

<section class="w3l-login">
  <div class="w3l-form-36-mian">
    <div class="container">
      <div class="row">
          <div class="offset-md-2 col-md-8">
            <div class="form-inner-cont mx-100">
                <div class="mt-md-5">
                    <div class="row">
                        @if(Session::has('success'))
                            <div class="alert alert-success  btn-block">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        @if(Session::has('error'))
                            <div class="alert alert-danger  btn-block">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                {{ Session::get('error') }}
                            </div>
                        @endif
                        @if(Session::has('error_msg'))
                            <div class="alert alert-danger  btn-block">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                {{ Session::get('error_msg') }}
                            </div>
                        @endif
                        @if(Session::has('atg_error'))
                        <div class="alert alert-danger  btn-block">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            {{ Session::get('atg_error') }}
                        </div>
                    @endif
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-4 select_role">
                            <div class="card p-3">
                                <div class="row">
                                    <div class="col-md-12 mt-2">
                                        <div class="h5"><b>{{ $account->name }}</b></div>
                                        <div class="">
                                            <small>
                                                <b>School:</b> {{ $account->school->name }}
                                                <b></b>
                                            </small>
                                        </div>
                                        <div class="">
                                            <small>
                                                <b>Created On:</b> {{ $account->created_at }}
                                                <b></b>
                                            </small>
                                        </div>

                                    </div>
                                </div>
                                
                            </div>
                        </div>

                        <div class="col-md-6 mb-4 select_role">
                            <div class="card p-3">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="m-2 ">
                                            <div class="bold h5">
                                               <b> Credit Balance </b>  {{$account->available}}
                                            </div>
                                            <div class="">
                                                <small>
                                                    <b>Available Downloads:</b> {{ $account->downloads }}
                                                    <b></b>
                                                </small>
                                            </div>
                                            <div class="">
                                                <small>
                                                    <b>Total Downloads:</b> {{ $account->downloads }}
                                                    <b></b>
                                                </small>
                                            </div>
                                            
                                        </div>

                                    </div>
                                </div>
                                
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="row mt-2" >
                                <div class="col-md-10">
                                    <div class="row">
                                        <div class="col-auto">
                                                <b>Class:</b>
                                                {{ optional($account->klass)->name }}
                                        </div>
                                        
                                        <div class="col-auto">
                                                <b>Term:</b>
                                                {{ getTerms($account->term) }}
                                        </div>
                                        <div class="col-auto">
                                                <b>Code:</b>
                                                {{ $account->code }}
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <hr>
                        </div>

                        @if ($status)
                        <div class="col-md-6 mb-4 select_role">
                            <a href="{{ route('account.media.index' , "books") }}">
                                <div class="card p-4">
                                    <div class="text-center">
                                        <i class="fa fa-user fs-30"></i>
                                    </div>
                                    <div class="text-center">View Books</div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-6 mb-4 select_role">
                            <a href="{{ route('account.media.index' , "videos") }}">
                                <div class="card p-4">
                                    <div class="text-center">
                                        <i class="fa fa-user fs-30"></i>
                                    </div>
                                    <div class="text-center">Lesson Videos</div>
                                </div>
                            </a>
                        </div>

                        @else

                            <div class="col-md-6">
                                <h4 class="mt-3">Pay with coupon</h4>
                                <p class="mb-2 mt-2">
                                    Contact any of our agents or call our customer care line to get your coupon code and fill it in below
                                    or call +234 703 396 4406 for assitance.
                                </p>
                                <div class="text-center">
                                    <form action="{{ route('couponRecharge') }}" method="post" enctype="multipart/form-data"> {{csrf_field()}}
                                        <input type="text" class="form-control" name="code" required placeholder="Enter coupon code">
                                        <input type="hidden" class="form-control" name="school_account_id" value="{{ $account->id }}" required >
                                        <button type="submit" class="btn btn-success mt-2">Proceed</button>
                                    </form>
                                </div>

                            </div>

                            <div class="col-md-6">
                                <h4 class="mt-3">Pay with recharge card</h4>
                                <div class="mb-2 mt-2">
                                    <p>You can recharge your account with an MTN recharge card. Please make sure you have your airtime ready!</p>
                                    <button class="btn btn-success mt-5" onclick="callAtgPay()">Pay</button>
                                </div>
                            </div>

                    @endif

                        

                    </div>
                </div>
                
              </div>
              <p class="signup">
                Are you done with your account? <button class="signuplink btn btn-link" onclick=" return $('#account_logout_form').trigger('submit'); ">Log Out</button>
                <form id="account_logout_form" action="{{ route('account.logout') }}" method="POST" style="display: none;"> @csrf </form>
            </p>
          </div>
         
      </div>
    </div>
  </div>
</section>

@stop