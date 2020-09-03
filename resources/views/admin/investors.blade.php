@extends('admin.layout.app')

@section('content')

    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
          <div class="section-body">
    
                <div class="card">
                  <div class="card-header">
                    <h4>Registered Investors
                    <span style="float:right"><button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#newinvest">Add Investor</button></span>
                    </h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                            <th class="text-center">ID</th>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Wallet</th>
                            <th>Invests</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                          <tr>
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
                            <td class="align-middle">N {{$user->wallet}}</td>
                            <td class="align-middle">{{$user->status}}</td>
                            <td class="align-middle"><a href="#" data-toggle="modal" data-target="#usermodal-{{$user->id}}" class="btn btn-primary">Details</a></td>
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
                                                        <span class="fr"><a href="{{ route('investments',$user->id) }}" class="btn btn-primary">See Investments</a></span>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
    @endforeach

                                <!--Info Modal -->
                                 <div class="modal fade bd-example-modal-md" id="newinvest">
                                    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Investor Information</h5>
                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <form action="{{ route('store_investor') }}" method="post">{{csrf_field()}}
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Name</label>
                                                            <input class="form-control" type="text" name="name" placeholder="Investor Name" required>
                                                            @error('name')
                                                                <span class="" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Username</label>
                                                            <input class="form-control" type="text" name="username" placeholder="Login Username" required>
                                                            @error('username')
                                                                <span class="" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Email</label>
                                                            <input class="form-control" type="email" name="email" placeholder="Investor Email">
                                                            @error('email')
                                                                <span class="" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Phone Number</label>
                                                            <input class="form-control" type="text" name="phone" placeholder="Investor Phone Number" required>
                                                            @error('phone')
                                                                <span class="" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Password</label>
                                                            <input class="form-control" type="password" name="password" required>
                                                            @error('password')
                                                                <span class="" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <div>
                                                                <span class="fr"><button type="submit" class="btn btn-primary">Save</button></span>
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
                    
                    
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
           
        </section>
    </div>

   <!-- Start datatable js -->
  <script src="{{asset('public/dashboard/datatables/datatables.min.js') }}"></script>
  <script src="{{asset('public/dashboard/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{asset('public/dashboard/jquery-ui/jquery-ui.min.js') }}"></script>

@endsection