@extends('account.layout.app' , ['account' => $account])

@section('content')

    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
          <div class="section-body">

                <div class="card">
                  <div class="card-header">
                    <h4>Download videos or watch online
                    </h4>
                  </div>
                  <div class="card-body">
                      {{-- <h5 class="mb-2">Search for book or video</h5> --}}
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


                        @foreach($medias as $media)

                        <div class="card-header row mb-3">
                            <div class="col-md-4 text-center">
                                <img src="{{ getFileFromStorage($media->getCoverImage() , 'storage') }}" alt="Cover Image" width="100%" height="100px"/>
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
                                    <b>Level:</b> {{ getLevels($media->level) }}
                                </div>
                                <div class="mb-2">
                                    <b>Class:</b> {{$media->klass->name }}
                                </div>
                                <div class="mb-2">
                                    <b>Subject:</b> {{$media->subject->name }}
                                </div>
                                <div class="mb-3">
                                    <b>Price:</b> NGN {{$media->price}}
                                </div>
                                <div class="">

                                    <form action="{{ route('account.download') }}" method="post" onsubmit="return confirm('Downloading may cost you money! Are you sure you want to download this item?');">@csrf
                                        <input type="hidden" name="media_id" value="{{$media->id}}" required>
                                    <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#watchVideo_{{$media->id}}">Watch</a>
                                        <button type="submit" class="btn btn-sm btn-primary" >Download</button>
                                    </form>
                                </div>

                            </div>
                        </div>

                        <div class="modal fade bd-example-modal-md" id="watchVideo_{{$media->id}}">
                            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Watch Video</h5>
                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                    </div>
                                    <div class="modal-body row">
                                        <video class="col-12" width="100%" height="320" controls>
                                                <source src="{{ route('watch_video_attachment' , encrypt($media->getAttachment())) }}" type="video/mp4">
                                                Your browser does not support the video tag.
                                        </video>
                                    </div>
                                </div>
                            </div>
                        </div>


                        @endforeach

                        <div class="text-center">
                            {{-- {!! $medias->links() !!} --}}
                        </div>

                  </div>
                </div>
              </div>

        </section>
    </div>

@endsection
