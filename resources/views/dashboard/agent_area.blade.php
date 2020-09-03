@extends('dashboard.layout.app')

@section('content')

    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
          <div class="section-body">
    
                <div class="card">
                  <div class="card-header">
                    <h4>Coupon Codes
                    <span style="float:right"> <button class="btn-sm btn-outline-primary" data-toggle="modal" data-target="#sellcoupons">Buy Coupons</button> </span>
                    </h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                            <th class="text-center">Info</th>
                            <th>Code</th>
                            <th>Amount</th>
                            <th>Used By</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($coupons as $coupon)
                          <tr>
                            <td class="align-middle"><a href="#" class="btn btn-success" data-toggle="modal" data-target="#viewmodal-{{$coupon->id}}" >View</a></td>
                            <td class="align-middle">{{$coupon->code}}</td>
                            <td class="align-middle">NGN {{$coupon->amount}}</td>
                            @if(empty($coupon->user_id))
                                <td class="align-middle">Not yet</td>
                            @else
                                <td class="align-middle">{{$coupon->user->name}}</td>
                            @endif
                           
                          </tr>

                

                         
                    <!-- Vertically centered modal end -->
                    
                    
                                 <!--Info Modal -->
                                 <div class="modal fade bd-example-modal-md" id="viewmodal-{{$coupon->id}}">
                                    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Coupon information</h5>
                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <p><b>Created at:</b> {{ date('D, M d Y h:i:a',strtotime($coupon->created_at)) }}</p>
                                                @if(empty($coupon->user_id))
                                                    <p><b>Used By:</b> Not yet </p>
                                                @else
                                                    <p><b>Used By:</b> {{ $coupon->user->name }}</p>
                                                    <p><b>Used On:</b> {{ date('D, M d Y h:i:a',strtotime($coupon->updated_at)) }}</p>
                                                @endif
                                                
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
           
        </section>
    </div>

   <!-- Start datatable js -->
  <script src="{{asset('public/dashboard/datatables/datatables.min.js') }}"></script>
  <script src="{{asset('public/dashboard/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{asset('public/dashboard/jquery-ui/jquery-ui.min.js') }}"></script>

@endsection