@extends('web.layouts.app' , ['title' => 'Register' , 'activePage' => 'register'])
@section('content')

<section class="w3l-login">
  <div class="w3l-form-36-mian">
    <div class="container">
      <div class="logo text-center">
      </div>
      <div class="form-inner-cont">
        <h3>Sign up</h3>
        <h6>To continue with Us</h6>
        <div class="form-area mt-2 mt-md-5">
            <form action="{{route('register')}}" method="post" id="reg_form">@csrf
                <div class="form_tab active_tab" id="tab_1" form-tab="1"  tabindex="1">
                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" placeholder="Enter your name" name="name" value="{{ old('name') }}" id="input-name" class="form-control" required aria-required="true">
                        @error('name')
                            <span class="form-input-error" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Username</label>
                        <input class="form-control" type="text" name="username" placeholder="Enter username" value="{{ old('username') }}" required aria-required="true">
                        @error('username')
                            <span class="form-input-error" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input class="form-control" type="password" name="password" placeholder="Enter password" required aria-required="true">
                        @error('password')
                            <span class="form-input-error" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input class="form-control" type="password"name="password_confirmation"  placeholder="Confirm password" required aria-required="true">
                        @error('password')
                            <span class="form-input-error" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
               
                <button type="submit" class="btn btn-primary theme-button mt-4">Sign Up</button>


            </form>
        </div>
        <p class="signup">Already a customer? <a href="{{ route('login') }}" class="signuplink">Login now</a></p>
      </div>
    </div>
  </div>
</section>
@stop