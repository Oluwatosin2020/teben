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