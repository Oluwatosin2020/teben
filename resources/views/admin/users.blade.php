@extends('admin.layout.app')

@section('content')

    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
          <div class="section-body">

                <div class="card">
                  <div class="card-header">
                    <h4>Registered Users</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                            <th>Action</th>
                            <th class="text-center">ID</th>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Wallet</th>
                            <th>Role</th>
                            <th>Status</th>

                          </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                          <tr>
                            <td class="align-middle"><a href="#" data-toggle="modal" data-target="#usermodal-{{$user->id}}" class="btn btn-primary">Details</a> <a href="" class="btn btn-success" data-toggle="modal" data-target="#editmodal-{{$user->id}}" ><i class="fa fa-edit"></i>Edit</a></td>
                            <td class="align-middle">#{{$user->uuid}}</td>
                            <td class="align-middle">
                                @if(!empty($user->avatar))
                                    <img class="avatar user-thumb" src="{{ asset('public/avatar_images/'.$user->avatar) }}" alt="avatar">
                                @else
                                    <img class="avatar user-thumb" src="{{ asset('public/user.png') }}" alt="avatar">
                                @endif
                            </td>
                            <td class="align-middle">{{$user->name}}</td>
                            <td class="align-middle">{{$user->email}}</td>
                            <td class="align-middle">{{$user->phone}}</td>
                            <td class="align-middle">N {{$user->wallet}}</td>
                            <td class="align-middle">{{$user->role}}</td>
                            <td class="align-middle">{{$user->status}}</td>
                          </tr>

                                <!--Info Modal -->
                                <div class="modal fade bd-example-modal-md" id="usermodal-{{$user->id}}">
                                    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">{{$user->name}}`s Profile</h5>
                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6 mb-2">
                                                    @if(!empty($user->avatar))
                                                        <img class="avatar" src="{{ asset('public/avatar_images/'.$user->avatar) }}" alt="avatar" style="width:100%">
                                                    @else
                                                        <img class="avatar" src="{{ asset('public/user.png') }}" alt="avatar">
                                                    @endif
                                                </div>
                                                <div class="col-md-6">
                                                    <p><b>ID :</b> <span class="moreinfo"> {{$user->uuid}}</span></p>
                                                    <p><i class="ti-email"></i> <span class="moreinfo"> {{$user->email}}</span></p>
                                                    <p><b>Phone :</b> <span class="moreinfo"> {{$user->phone}}</span></p>
                                                    <p><b>Role :</b> <span class="moreinfo"> {{$user->role}}</span></p>
                                                    <p><b>Status :</b> <span class="moreinfo"> {{$user->status}}</span></p>
                                                    <p><b>Reg Date :</b> <span class="moreinfo"> {{ date('d-m-Y',strtotime($user->created_at)) }}</span></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                    <div class="col-md-6">
                                                        <p><b>Country :</b> <span class="moreinfo"> {{$user->country}}</span></p>
                                                        <p><b>State :</b> <span class="moreinfo"> {{$user->state}}</span></p>

                                                    </div>
                                                    <div class="col-md-6">
                                                        <p><b>LGA :</b> <span class="moreinfo"> {{$user->lga}}</span></p>
                                                        <p><b>Town :</b> <span class="moreinfo"> {{$user->town}}</span></p>

                                                    </div>
                                                    <div class="col-md-12">
                                                        <p><b>Address :</b> <span class="moreinfo"> {{$user->address}}</span></p>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <span class="fr"><a href="{{ route('userinfo',$user->id) }}" class="btn btn-primary">Go to Profile</a></span>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                 <!--Edit Modal -->
                                 <div class="modal fade bd-example-modal-md" id="editmodal-{{$user->id}}">
                                    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit {{$user->name}}`s Profile</h5>
                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <form action="{{ route('update_user',$user) }}" method="post">{{csrf_field()}}
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input type="hidden" name="user_id" value="{{$user->id}}" required>
                                                            <label>Edit wallet</label>
                                                            <input class="form-control" type="number" name="amount" value="{{$user->id}}" placeholder="Enter amount" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <div>
                                                                <span class="fr"><button type="submit" class="btn btn-primary">Save</button></span>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <form  action="{{ route('update_user',$user) }}" method="post">{{csrf_field()}}
                                                    <div class="col-md-12 mt-4">
                                                        <div class="form-group">
                                                            <label>New Password</label>
                                                            <input class="form-control" type="text" name="password" placeholder="New Password" >
                                                            <div>
                                                                <span class="fr mt-2"><button type="submit" class="btn btn-primary">Save</button></span>
                                                            </div>
                                                        </div>
                                                        </form>
                                                    </div>

                                                </div>
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
                {!! $users->links() !!}
             </div>
        </section>
    </div>

@endsection
