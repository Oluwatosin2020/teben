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
                        <label>Role</label>
                        <select class=" form-control" type="text" name="role" id="input_role"  style="height:45px" required aria-required="true">
                            <option value="" disabled selected>Choose one</option>
                            <option value="Parent">Parent</option>
                            <option value="Student">Student</option>
                            <option value="Teacher">Teacher</option>
                        </select>
                        @error('role')
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

                     <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" type="email" name="email" placeholder="Enter your email (optional)" value="{{ old('email') }}" aria-required="false" >
                        @error('email')
                            <span class="form-input-error" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form_tab " id="tab_2" form-tab="2" tabindex="2">
                    <div class="form-group">
                        <label>State</label>
                        <select class="form-control" id="comp_profile-state" type="text" name="state"  style="height:45px" required aria-required="true">
                            <option value="" disabled selected>Choose one</option>
                             @foreach($states as $state)
                                <option value="{{$state->name}}" {{$user->state == $state->name ? 'selected' : ''}} >{{$state->name}}</option>
                            @endforeach
                        </select>
                        @error('state')
                            <span class="form-input-error" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Local Govt Area</label>
                        <select class="form-control" name="lga" id="comp_profile-lga" type="text" style="height:45px" required aria-required="true">
                            <option value="" disabled selected>Choose L.G.A</option>
                        </select>
                        @error('lga')
                            <span class="form-input-error" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Home Address</label>
                        <textarea class="form-control" rows="5" name="address" placeholder="Enter your house address" required aria-required="true">{{ old('address') }}</textarea>
                        @error('address')
                            <span class="form-input-error" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form_tab " id="tab_3" form-tab="3" tabindex="3">
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input class="form-control" type="number" name="phone" placeholder="Enter your phone number" value="{{ old('phone') }}"  required aria-required="true">
                        @error('phone')
                            <span class="form-input-error" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
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
                {{-- <div class="row">
                    <div class="col-md-4 mb-3">
                        <button type="button" class="btn btn-sm btn-danger hide mb-2" id="btn_prev">Previous</button>
                        <button type="button" class="btn btn-sm btn-primary hide mb-2" id="btn_next">Next</button>
                        <button type="submit" class="btn btn-sm btn-success hide mb-2" id="btn_submit">Sign Up</button>
                    </div>
                    <div class="col-md-8 mb-3">
                        <a href="{{route('login')}}">Already have an account?</a>
                    </div>
                </div> --}}
                <button type="submit" class="btn btn-primary theme-button mt-4">Log in</button>


            </form>
        </div>
        <p class="signup">Already a customer? <a href="{{ route('login') }}" class="signuplink">Login now</a></p>
      </div>
    </div>
  </div>
</section>
@stop