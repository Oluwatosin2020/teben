@extends('admin.layout.app')

@section('content')

    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
          <div class="section-body">
    
                <div class="card">
                  <div class="card-header">
                    <h4>Agents Applications</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                            <th class="text-center">Action</th>
                            <th></th>
                            <th>User</th>
                            <th>Gender</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Date</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($agents as $agent)
                            

                          <tr>
                            <td class="align-middle"><a href="#" class="btn btn-success" data-toggle="modal" data-target="#viewmodal-{{$agent->id}}" >Approve</a></td>
                            <td class="align-middle">
                                @if(!empty($agent->user->avatar))
                                    <img class="avatar user-thumb" src="{{ asset('public/avatar_images/'.$agent->user->avatar) }}" alt="avatar" >
                                @else
                                    <img class="avatar user-thumb" src="{{ asset('public/user.png') }}" alt="avatar">
                                @endif
                            </td>
                            <td class="align-middle"><a href="{{ route('userinfo',$agent->user->id) }}" >{{$agent->user->name}}</a></td>
                            <td class="align-middle">{{$agent->user->gender}}</td>
                            <td class="align-middle"> {{$agent->user->role}}</td>
                            <td class="align-middle">{{$agent->status}}</td>
                            <td class="align-middle">{{ date('d-m-Y h:i:A',strtotime($agent->created_at)) }}</td>
                          </tr>
                          
                          
                           <!--Info Modal -->
                                 <div class="modal fade bd-example-modal-md" id="viewmodal-{{$agent->id}}">
                                    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Update Agent Status </h5>
                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" action="{{ route('agentstatus',$agent->id) }}">@csrf
                                                   <div class="row">
                                                        <div class="col-md-12">
                                                            <label>Status</label>
                                                            <select type="date" name="status" required class="form-control" style="height:50px">
                                                                <option disabled selected ></option>
                                                                <option value="1">Approve</option>
                                                                <option value="3">Decline</option>
                                                            </select>
                                                            @error('status')
                                                                <span class="form-input-error" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                            
                                                        
                                                        
                                                        <textarea rows="3" class="form-control mt-2 col-md-12" name="comment" placeholder="Tell the person why you are declining his/her application if you wish to reject it."></textarea>
                                                        @error('comment')
                                                            <span class="form-input-error" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                        <button type="submit" class="btn btn-success btn-sm mt-2">Apply</button>
                                                        </div>
                                                   </div>
                                               </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                               
                    
                        @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
                            
        </section>
    </div>

 <!-- JS Libraies -->
  <script src="dashboard/datatables/datatables.min.js"></script>
  <script src="dashboard/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="dashboard/jquery-ui/jquery-ui.min.js"></script>

@endsection