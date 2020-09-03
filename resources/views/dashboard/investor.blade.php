@extends('dashboard.layout.app')

@section('content')
        <!-- main content area start -->
        <ul class="breadcrumb">
           <li class="moreinfo"><i class="fa fa-home moreinfo"></i>Home</li> /
           <li class="moreinfo"><i class="fa fa-dashboard moreinfo"></i>Dashboard</li> 
        </ul>
            <div class="main-content-inner">
                <!-- sales report area start -->
                <div class="sales-report-area mt-5 mb-5">
                    <div class="row mb-3">
                        <div class="col-md-9"><h5> Your Active Investments </h5> </div>
                        
                        <span class="col-md-3"  style="float:right"><button  style="float:right" class="btn btn-outline-dark btn-sm" data-toggle="modal" data-target="#newinvest">Make Investment</button></span>
                    </div>
                    
                    <div class="row">
                    @foreach($invests as $invest)
                        <div class="col-md-4">
                            <div class="single-report mb-xs-20" style="border-style:solid;border-width:medium;border-color:blue">
                                <div class="s-report-inner pr--20 pt--30 mb-3">
                                    <div class="icon"><i class="ti-user"></i></div> 
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h5 class="header-title mb-0"><small> Invested: </small>{{ $invest->amount }}</h5>
                                        <p>Profit: {{ $invest->percent }}%</p>
                                    </div>
                                    <div><small>{{ date('M d,Y',strtotime($invest->created_at)) }}</small> <span style="float:right"><small> Get: </small> <b>{{ $invest->amount + $invest->profit }}</b></span></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                        
                    </div>
                </div>
                <!-- sales report area end -->
             </div>
        </div>
        <!-- main content area end -->
        
        
        <!-- Modal -->
                                <div class="modal fade bd-example-modal-sm" id="newinvest">
                                    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Make Investment</h5>
                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                
                                            <form action="{{ route('makeInvestment') }}" method="post" enctype="multipart/form-data"> {{csrf_field()}}
                                            
                                                <div class="form-group">
                                                    <label>Investment Amount</label>
                                                    <select type="text" class="form-control" name="amount" id="invest-amt" style="height:45px" required>
                                                        <option value="" disabled selected></option>
                                                        <option value="20000">NGN 20,000</option>
                                                        <option value="50000">NGN 50,000</option>
                                                        <option value="100000">NGN 100,000</option>
                                                        <option value="200000">NGN 200,000</option>
                                                        <option value="500000">NGN 500,000</option>
                                                        <option value="1000000">NGN 1,000,000</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Investment Period</label>
                                                    <select type="text" class="form-control" name="duration" id="invest-period"  style="height:45px" required>
                                                        <option value="6">6 Months</option>
                                                        <option value="12">12 Months</option>
                                                    </select>
                                                </div>
                                                <p class="text-center mb-2" id="invest_summary" style="color:green"></p>
                                                <div class="form-group">
                                                    <input type="hidden" class="form-control" name="percent" id="invest-perc" value="" required>
                                                    <input type="hidden" class="form-control" name="profit" id="invest-prof" value="" required>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <p class="text-center" id="invest_bal" style="color:red"></p>
                                                <button type="submit" class="btn btn-success" id="invest_btn" style="display:none">Proceed</button>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

@endsection