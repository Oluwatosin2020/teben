@extends('admin.layout.app')

@section('content')

    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
          <div class="section-body">

                <div class="card">
                  <div class="card-header">
                    <h4>Schools
                    <span style="float:right">
                        <button class="btn-sm btn-outline-primary" data-toggle="modal" data-target="#addschool">Add School</button>
                     </span>
                    </h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>State</th>
                            <th>Local Gov.</th>
                            <th>Address</th>
                            <th>Principal</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($schools as $school)
                          <tr>
                            <td class="align-middle">{{$school->name}}</td>
                            <td class="align-middle">{{$school->state}}</td>
                            <td class="align-middle">{{$school->lga}}</td>
                            <td class="align-middle">{{$school->address}}</td>
                            <td class="align-middle">{{$school->principal_name}}</td>
                            <td class="align-middle">
                                <a href="{{ route('admin.schools.show' , $school)}}" class="btn btn-info btn-sm">View</a>
                            </td>
                          </tr>
                        @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

            <!--Add school Modal -->
            <div class="modal fade bd-example-modal-md" id="addschool">
                <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">New School</h5>
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="{{ route('admin.schools.store') }}">@csrf
                                <div class="form-group">
                                    <label for="">School Name</label>
                                    <input name="name" type="text" class="form-control" placeholder="" required>
                                </div>

                                <div class="form-group">
                                    <label for="">Principal Name</label>
                                    <input name="principal_name" type="text" class="form-control" placeholder="" required>
                                </div>

                                <div class="form-group">
                                    <label for="">Phone</label>
                                    <input name="phone" type="text" class="form-control" placeholder="" required>
                                </div>

                                <div class="form-group">
                                    <label for="">State</label>
                                    <input name="state" type="text" class="form-control" placeholder="" required>
                                </div>

                                <div class="form-group">
                                    <label for="">L.G.A</label>
                                    <input name="lga" type="text" class="form-control" placeholder="" required>
                                </div>

                                <div class="form-group">
                                    <label for="">Address</label>
                                    <input name="address" type="text" class="form-control" placeholder="" required>
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
