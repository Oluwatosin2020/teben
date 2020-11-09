@extends('web.layouts.app' , ['title' => 'Complete Profile' , 'activePage' => 'profile'])
@section('content')


<section class="w3l-login">
  <div class="w3l-form-36-mian">
    <div class="container">
      <div class="logo text-center">
      </div>
      <div class="row">
          <div class="offset-md-2 col-md-8">
            <div class="form-inner-cont">
                <h3>You`re almost done</h3>
                <h6>Complete your profile</h6>
                <div class="form-area mt-2 mt-md-5">
                    @if($currentStatus["key"] == "role")
                        <form action="{{ route("user.profile.complete") }}" method="post" id="select_role_form">@csrf
                            <input type="hidden" name="status_key" required value="{{ $currentStatus["key"] }}">
                            <input type="hidden" name="role" required id="roleInput">
                            <div class="row">
                                <div class="col-12 text-center text-primary mb-3 h4">Who are you?</div>
                                <div class="col-md-4 mb-4 select_role" data-role="0">
                                    <div class="card p-5">
                                        <div class="text-center">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <div class="text-center">A Student</div>
                                    </div>
                                </div>

                                <div class="col-md-4 mb-4 select_role" data-role="1">
                                    <div class="card p-5">
                                        <div class="text-center">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <div class="text-center">A Parent</div>
                                    </div>
                                </div>

                                <div class="col-md-4 mb-4 select_role" data-role="2">
                                    <div class="card p-5">
                                        <div class="text-center">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <div class="text-center">A Teacher</div>
                                    </div>
                                </div>
                            </div>
                        
                        </form>
                    @else
                    @endif
                </div>
                    <p class="signup">
                        Not ready to complete profile? <button class="signuplink btn btn-link" onclick=" return $('#logout_form').trigger('submit'); ">Login Out</button>
                    </p>
              </div>
          </div>
      </div>
    </div>
  </div>
</section>

@stop