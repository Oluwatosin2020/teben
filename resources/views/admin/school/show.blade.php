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
                            <td class="align-middle"><a href="#" class="btn btn-success" data-toggle="modal" data-target="#viewmodal-{{$account->id}}" >View</a></td>
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
                        @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

            <!--Add account Modal -->
            <div class="modal fade bd-example-modal-md" id="addaccount">
                <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">New School Account</h5>
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="{{ route('admin.accounts.store') }}">@csrf
                                <input type="hidden" name="school_id" value="{{ $school->id}}" required>
                                <div class="form-group">
                                    <label for="">Account Name</label>
                                    <input name="name" type="text" class="form-control" placeholder="" required>
                                </div>

                                <div class="form-group">
                                    <label for="">Code</label>
                                    <input name="code" type="text" class="form-control" placeholder="" required>
                                </div>

                                <div class="form-group">
                                    <label for="">Class</label>
                                    <select name="klass_id"  class="form-control" placeholder="" required>
                                        <option value="" disabled selected> Select one</option>
                                        @foreach ($classes as $class)
                                            <option value="{{$class->id}}">{{$class->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="">Term</label>
                                    <select name="term"  class="form-control" placeholder="" required>
                                        <option value="" disabled selected> Select one</option>
                                        @foreach (getTerms() as $key => $value)
                                            <option value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="">Amount</label>
                                    <input name="amount" type="text" class="form-control" placeholder="" required>
                                </div>

                                <div class="form-group">
                                    <label for="">Downloads</label>
                                    <input name="downloads" type="number" class="form-control" placeholder="Available downloads" required>
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
