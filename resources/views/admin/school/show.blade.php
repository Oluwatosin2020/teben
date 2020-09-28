@extends('admin.layout.app')

@section('content')

    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
          <div class="section-body">

                <div class="card">
                  <div class="card-header">
                    <h4>School Accounts
                    <span style="float:right">
                        <button class="btn-sm btn-outline-primary" data-toggle="modal" data-target="#addaccount">Add School Account</button>
                     </span>
                    </h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Code</th>
                            <th>Class</th>
                            <th>Term</th>
                            <th>Amount</th>
                            <th>Downloads</th>
                            <th>Available</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($school->accounts as $account)
                          <tr>
                            <td class="align-middle">{{$account->name}}</td>
                            <td class="align-middle">{{$account->code}}</td>
                            <td class="align-middle">{{$account->klass->name }}</td>
                            <td class="align-middle">{{  getTerms($account->term) }}</td>
                            <td class="align-middle">{{$account->amount}}</td>
                            <td class="align-middle">{{$account->downloads}}</td>
                            <td class="align-middle">{{$account->available}}</td>
                            <td class="align-middle">{{$account->status == 1 ? 'Approved' : 'Not Approved' }}</td>
                            <td class="align-middle">
                                <form method="Post" action="{{ route('admin.accounts.destroy' , $account) }}">@csrf @method('delete')
                                    <a href="#" class="btn btn-info btn-xs" data-toggle="modal" data-target="#viewmodal-{{$account->id}}" >
                                        <i class="ti-eye"></i>
                                    </a>
                                    <a href="#" class="btn btn-success btn-xs" data-toggle="modal" data-target="#edit_account_{{ $account->id }}" >
                                        <i class="ti-pencil"></i>
                                    </a>
                                    <button type="submit" class="btn btn-danger btn-xs" onclick=" return confirm('Are you sure you want to delete this account?');">
                                        <i class="ti-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <div class="modal fade bd-example-modal-md" id="viewmodal-{{$account->id}}">
                            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">School Account Details</h5>
                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="body">
                                            <p><b>Password: </b> {{ decrypt($account->password)}}</p>
                                            <p><b>Created At: </b> {{ date('M d, Y' , strtotime($account->created_at)) }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @include('admin.fragments.modals.edit_school_account' , ['account' => $account])

                        @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

            <!--Add account Modal -->
           @include('admin.fragments.modals.add_school_account')
        </section>
    </div>
@endsection
