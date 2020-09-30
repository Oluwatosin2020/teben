@extends('admin.layout.app')

@section('content')

    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
          <div class="section-body">


                <div class="card">
                  <div class="card-header">
                    <h4>Manage Books and Videos
                    <span style="float:right"> <button class="btn-sm btn-outline-primary" data-toggle="modal" data-target="#addcoupon">Add Media</button> </span>
                    </h4>
                  </div>
                  <div class="card-body">
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

                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                            <th class="text-center">Cover</th>
                            <th>Title</th>
                            <th>Level</th>
                            <th>Subject</th>
                            <th>Type</th>
                            <th>Size</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($medias as $media)
                          <tr>
                            <td class="align-middle text-center"><img src="{{ getFileFromStorage($media->getCoverImage() , 'storage')  }}" alt="Cover Image" width="50px"/></td>
                            <td class="align-middle">{{$media->title}}</td>
                            <td class="align-middle">{{ getLevels($media->level) ?? $media->level}}</td>
                            <td class="align-middle">{{$media->subject->name ?? ''}}</td>
                            <td class="align-middle">{{$media->attachment_type}}</td>
                            <td class="align-middle">{{$media->size}}</td>
                            <td class="align-middle">NGN{{$media->price}}</td>
                            <td class="align-middle">{{$media->status}}</td>

                            <td>
                                <a href="{{ route('media.show',$media->id )}}" class="btn btn-success btn-xs" >View</a>
                            </td>
                          </tr>




                    <!-- Vertically centered modal end -->


                                 <!--Info Modal -->
                                 <div class="modal fade bd-example-modal-md" id="viewmodal-{{$media->id}}">
                                    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Coupon info</h5>
                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <p><b>Created at:</b> {{ date('D, M d Y h:i:a',strtotime($media->created_at)) }}</p>

                                            </div>
                                        </div>
                                    </div>
                                </div>


                    <!-- Vertically centered modal end -->

                        @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-center">
                  {!! $medias->links() !!}
              </div>
            <!--Add coupon Modal -->
                                 <div class="modal fade bd-example-modal-lg" id="addcoupon">
                                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">New Media</h5>
                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                            </div>
                                            <div class="modal-body">

                                                <form method="post" action="{{ route('media.store') }}" enctype="multipart/form-data">@csrf
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Title</label>
                                                            <input type="text" name="title" class="form-control" placeholder="Book or video title" required />
                                                            @error('title')
                                                                <p class="" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </p>
                                                            @enderror
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Level</label>
                                                            <select class="form-control" name="level" style="height:45px" aria-required="true">
                                                                <option disabled selected>Select One</option>
                                                                @foreach($levels as $key => $value)
                                                                    <option value="{{$key}}">{{$value}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('level')
                                                                <p class="" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </p>
                                                            @enderror
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Class</label>
                                                            <select class="form-control" name="klass_id" style="height:45px" aria-required="true">
                                                                <option disabled selected>Select One</option>
                                                                @foreach($klasses as $klass)
                                                                <option value="{{$klass->id}}">{{$klass->name}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('klass_id')
                                                                <p class="" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </p>
                                                            @enderror
                                                        </div>


                                                        <div class="form-group">
                                                            <label>Term</label>
                                                            <select class="form-control" name="term" style="height:45px" aria-required="true">
                                                                <option disabled selected>Select One</option>
                                                                @foreach($terms as $key => $value)
                                                                <option value="{{$key}}">{{$value}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('term')
                                                                <p class="" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </p>
                                                            @enderror
                                                        </div>



                                                        <div class="form-group">
                                                            <label>Subject</label>
                                                            <select class="form-control" name="subject_id" style="height:45px" aria-required="true">
                                                                <option disabled selected>Select One</option>
                                                                @foreach($subjects as $subject)
                                                                <option value="{{$subject->id}}">{{$subject->name}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('subject')
                                                                <p class="" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </p>
                                                            @enderror
                                                        </div>





                                                    </div>
                                                    <div class="col-md-6">

                                                        <div class="form-group">
                                                            <label>Download Price</label>
                                                            <input type="number" class="form-control" name="price" placeholder="Price per download" required />
                                                            @error('price')
                                                                <p class="" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </p>
                                                            @enderror
                                                        </div>

                                                         <div class="form-group">
                                                            <label>Cover Image</label>
                                                            <input type="file" class="form-control" name="image" required />
                                                            @error('image')
                                                                <p class="" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </p>
                                                            @enderror
                                                        </div>


                                                        <div class="form-group">
                                                            <label>Book or Video</label>
                                                            <input type="file" class="form-control" name="attachment" required />
                                                            @error('attachment')
                                                                <p class="" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </p>
                                                            @enderror
                                                            <p>Only upload Pdf , Docx , Mp4 files not greater than 200MB</p>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Status</label>
                                                            <select class="form-control" name="status" style="height:45px" aria-required="true">
                                                                <option disabled selected>Select One</option>
                                                                <option value="Visible">Visible</option>
                                                                <option value="Hidden">Hidden</option>
                                                            </select>
                                                        </div>



                                                    </div>

                                                </div>




                                                    <button type="submit" class="btn btn-sm btn-primary">Proceed</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
        </section>
    </div>
@endsection
