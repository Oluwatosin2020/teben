@extends('web.layouts.app' , ['title' => 'Account Login' , 'activePage' => 'login'])
@section('content')

  <section class="w3l-login">
  <div class="w3l-form-36-mian">
    <div class="container">
      <div class="logo text-center">
      </div>
      <div class="form-inner-cont">
        <h3>Video Account</h3>
        <h6>Login to watch videos</h6>
        <p>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
        </p>
        <form action="{{ route('account.auth') }}" method="post" class="signin-form" >@csrf
          <div class="form-input">
            <input class="form-control" type="text" name="code" placeholder="Enter code" value="{{ old('code') }}" required aria-required="true">
            @error('code')
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
          

          <button type="submit" class="btn btn-primary theme-button mt-4">Log in</button>
        </form>
        <p class="signup">Don’t have account yet? <a href="{{ route('login') }}" class="signuplink">Log in to main account</a></p>
      </div>
    </div>
  </div>
</section>
@stop