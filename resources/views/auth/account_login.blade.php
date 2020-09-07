@extends('auth.layout')

@section('title')
	Login
@endsection
@section('content')
<div class="row center">

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <!--<div class="col-md-2"></div>-->
    <div class="offset-md-2 col-md-8 bg-white style_area">
        <div class="row ">
            <div class="col-md-6">
                <div class="form_bg_img" style="background-image: url({{ asset('public/web/images/bg_3.jpg') }});"></div>
                <div class="form_header">
                    <div class="form_header_text text-center">
                    <p class="d-none d-md-block into text">Hey there, your videos await you!</p>
                        Login
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-area mt-2 mt-md-5">
                    <form action="{{route('account.auth')}}" method="post">@csrf
                        <div class="form_tab active_tab" id="tab_1" form-tab="1"  tabindex="1">

                            <div class="form-group">
                                <label>Code</label>
                                <input class="form-control" type="text" name="code" placeholder="Enter code" value="{{ old('code') }}" required aria-required="true">
        						@error('code')
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
                        </div>

                        <div class="row">
                            <div class="col-md-12 text-center mt-3">
                                <button type="submit" class="btn btn-block btn-success mb-2">Login</button>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
