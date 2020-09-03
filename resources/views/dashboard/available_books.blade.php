@extends('dashboard.layout.app')

@section('content')

    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
          <div class="section-body">
    
                <div class="card">
                  <div class="card-header">
                    <h4>Download Books and Videos
                    <span style="float:right"> <button class="btn-sm btn-outline-primary" data-toggle="modal" data-target="#sellcoupons">Request Book</button> </span>
                    </h4>
                  </div>
                  <div class="card-body">
                      <h5 class="mb-2">Search for book or video</h5>
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
					</div>
    
                      <form method="get" action="{{ route('search_media') }}">
                        <div class="row">
                          <div class="col-md-4">
                              <div class="form-group">
                                <label>Level</label>
                                <select class="form-control" name="level" style="height:45px" required>
                                    <option disabled selected>Select Level</option>
                                    @foreach($levels as $level)
                                        <option value="{{$level}}">{{$level}}</option>
                                    @endforeach
                                </select>
                            </div>
                                                        
                          </div>
                          <div class="col-md-4">
                              <div class="form-group">
                                <label>Subject</label>
                                <select class="form-control" name="subject" style="height:45px" required>
                                    <option disabled selected>Select Subject</option>
                                    @foreach($subjects as $subject)
                                    <option value="{{$subject->name}}">{{$subject->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control" placeholder="Enter book or video title here..(optional)" />
                                
                            </div>
                          </div>
                          
                        </div>
                        @csrf
                        <div class="text-center mb-5">
                              <button type="submit" class="btn btn-sm btn-success">
                                  Search 
                              </button>
                          </div>
                    </form>
                    
                        @foreach($medias as $media)
                        
                        <div class="card-header row mb-3">
                            <div class="col-md-4 text-center">
                                <img src="{{asset('public/media_cover_images'.'/'.$media->image)}}" alt="Cover Image" width="100%" height="100px"/>
                            </div>
                            <div class="col-md-8 mt-2 mt-md-3">
                                <div class="h4"><b>{{$media->title}}</b></div>
                                <div class="mb-2">
                                    <b>Media Type:</b> {{$media->attachment_type}}
                                </div>
                                <div class="mb-2">
                                    <b>File Size:</b> {{$media->size}}
                                </div>
                                <div class="mb-2">
                                    <b>Level:</b> {{$media->level}}
                                </div>
                                <div class="mb-2">
                                    <b>Subject:</b> {{$media->subject}}
                                </div>
                                <div class="mb-3">
                                    <b>Price:</b> NGN {{$media->price}}
                                </div>
                                <div class="">
                                    <form action="{{ route('user_download_attachment') }}" method="post" onsubmit="return confirm('Downloading may cost you money! Are you sure you want to download this item?');">@csrf
                                        <input type="hidden" name="media_id" value="{{$media->id}}" required>
                                        <input type="hidden" name="name" value="{{$media->title}}" required>
                                        <button type="submit" class="btn btn-sm btn-primary" >Download</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                          
                    
                        @endforeach
                        
                        <div class="text-center">
                            {!! $medias->render() !!}
                        </div>
                       
                  </div>
                </div>
              </div>
           
        </section>
    </div>

@endsection