@extends('web.layouts.app' , ['title' => 'Login' , 'activePage' => 'login'])
@section('content')

  <section class="w3l-login">
  <div class="w3l-form-36-mian">
    <div class="container">
      <div class="logo text-center">
      </div>
      <div class="form-inner-cont">
        <h3>Login</h3>
        <h6>To continue with Us</h6>
        <form action="{{ route('login') }}" method="post" class="signin-form" >@csrf
          <div class="form-input">
            <input type="text" name="username" placeholder="Email your username" required autofocus>
            @error('username')
                <span class="form-input-error" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="form-input">
            <input type="password" name="password" placeholder="Password" required >
            @error('password')
                <span class="form-input-error" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <label class="check-remaind">
            <input type="checkbox">
            <span class="checkmark"></span>
            <p class="remember">Remember me</p>

          </label>

          <button type="submit" class="btn btn-primary theme-button mt-4">Log in</button>
          <div class="new-signup">
            <a href="{{ route('password.request') }}" class="signuplink">Forgot username or password?</a>
          </div>
          <div class="signup text-center mt-2">
            <a href="{{ route('account.login') }}" class="signuplink">Video Account?</a>
          </div>
        </form>
        <p class="signup">Don’t have account yet? <a href="{{ route('register') }}" class="signuplink">Get it now</a></p>
      </div>
    </div>
  </div>
</section>
@stop