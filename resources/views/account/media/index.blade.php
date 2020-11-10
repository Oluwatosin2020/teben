@extends('web.layouts.app' , ['title' => 'My Dashboard' , 'activePage' => 'profile'])
@section('content')


<!-- breadcrum -->
<section class="w3l-skill-breadcrum">
    <div class="breadcrum">
      <div class="container">
        <p><a href="{{ route("account.dashboard") }}">Dashboard</a> / Media</p>
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
                        <div class="col-md-2 h4"><b>{{ $title ?? '' }}</b></div>
                        <div class="col-md-10">
                            <form action="{{ $url ?? '' }}" >
                                <div class="form-row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="keyword" value="{{ $requestData['keyword'] ?? ''  }}" placeholder="Search subject or title">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-md">Filter</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>

                    <div class="media_playlist">
                        @foreach ($media as $medium)
                            <div class="row mt-2" data-target="#download_media{{ $medium->id }}" data-toggle="modal">
                            <div class="col-md-2">
                                <img src="{{ getFileFromStorage($medium->getCoverImage() , "storage") }}" class="img-fluid" height="50" alt="">
                            </div>
                            <div class="col-md-10">
                                <div class="row">
                                    <div class="col-12 h5">{{ $medium->title }}</div>
                                    <div class="col-auto">
                                        <small>
                                            <b>Subject:</b>
                                            {{ optional($medium->subject)->name }}
                                        </small>
                                    </div>

                                    <div class="col-auto">
                                        <small>
                                            <b>Term:</b>
                                            {{ getTerms($medium->term) }}
                                        </small>
                                    </div>
                                    <div class="col-auto">
                                        <small>
                                            <b>Size:</b>
                                            {{ $medium->size }}
                                        </small>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <hr>
                            <!--Download Modal -->
                            <div class="modal fade bd-example-modal-md downloading_media_modal_parent" id="download_media{{ $medium->id }}">
                                <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                                    <div class="modal-content">
                                        <div class="m-5">
                                            <div class="text-center">
                                                Downloading this {{ strtolower( $medium->attachment_type) }} may cost you some money! 
                                            </div>
                                        
                                        </div>
                                        <div class="modal-footer">
                                            <div class="form-row">
                                                <div class="col-auto fr">
                                                    <button type="button" data-dismiss="modal" class="btn btn-sm btn-danger" >Cancel</button>
                                                </div>
                                                <div class="col-auto fr">
                                                    <button type="button" data-dismiss="modal"  data-toggle="modal" data-target="#watchVideo_{{$medium->id}}" class="btn btn-sm btn-info" >Watch</button>
                                                </div>
                                                <div class="col-auto fr">
                                                    <form action="{{ route("account.media.download") }}" method="post" class="downloading_media">@csrf
                                                        <input type="hidden" name="media_id" value="{{$medium->id}}" required>
                                                        <button type="submit" class="btn btn-sm btn-success text-white" >Download</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                
                                </div>
                            </div>
                            {{-- Download end --}}
                            {{-- Watch --}}
                            <div class="modal fade bd-example-modal-md" id="watchVideo_{{$medium->id}}">
                                <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">{{ $medium->title }}</h5>
                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                        </div>
                                        <div class="modal-body row">
                                            <video class="col-12" width="100%" height="320" controls>
                                                    <source src="{{ route("account.media.watch.video" , encrypt($medium->getAttachment())) }}" type="video/mp4">
                                                    Your browser does not support the video tag.
                                            </video>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Watch --}}
                        @endforeach
                    </div>
                    
                </div>
                <div class="text-center">
                    {{ $media->appends($requestData ?? '')->links() }}
                </div>
            </div>
      </div>

       <!--Download in progress Modal -->
       <div class="modal fade bd-example-modal-md" id="download_media_progress">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="m-5">
                    <div class="text-center">
                        Downloading in progress.....
                    </div>
                   
                </div>
                <div class="modal-footer">
                    <div class="form-row">
                        <div class="col-auto fr">
                            <button type="button" data-dismiss="modal" class="btn btn-sm btn-info" >Ok</button>
                        </div>
                        
                    </div>
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
</section>

@stop