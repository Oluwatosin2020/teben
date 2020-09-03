@extends('admin.layout.app')

@section('content')
        <!-- main content area start -->
        <ul class="breadcrumb">
           <li class="moreinfo"><i class="fa fa-home moreinfo"></i>Home</li> /
           <li class="moreinfo"><i class="fa fa-dashboard moreinfo"></i>Dashboard</li> 
        </ul>
            <div class="main-content-inner">
                <!-- sales report area start -->

                <div class="sales-report-area mt-5 mb-5">
                    <div class="row">

                    <div class="col-md-6">
                            <div class="single-report mb-xs-20">
                                <div class="s-report-inner pt--20">
                                    <div class="icon"><i class="fa fa-ball"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Available Balance</h4>
                                        <h5>NGN {{ $bals['Abal'] }}</h5>
                                    </div>
                                </div>
                                <p><b>Withdrawn :</b> <span class="moreinfo">NGN {{ $bals['Awth'] }}</span>
                                <a class="btn-success btn btn-sm fr" href="#" data-toggle="modal" data-target="#withdrawmodal"><i class="fa fa-arrow-up"></i> Withdraw</a>
                            </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="single-report mb-xs-20">
                            <div class="s-report-inner pt--20">
                                    <div class="icon"><i class="fa fa-ball"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Developer`s Share</h4>
                                        <h5>NGN {{ $bals['Dbal'] }}</h5>
                                    </div>
                                    <p><b>Withdrawn :</b> <span class="moreinfo fr">NGN {{ $bals['Dwth'] }}</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="sales-report-area mt-5 mb-5">
                    <div class="row">

                    <div class="col-md-3">
                            <div class="single-report mb-xs-20">
                                <div class="s-report-inner  pt--20 mb-3">
                                    <div class="icon"><i class="fa fa-ball"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <a href="#">
                                            <h4 class="header-title mb-0">Funds Deposited</h4>
                                        </a>
                                    </div>
                                </div>
                                    <p><b>Today :</b> <span class="moreinfo fr">NGN {{ $dep['today'] }}</span></p>
                                    <p><b>This Week :</b> <span class="moreinfo fr">NGN {{ $dep['week'] }}</span></p>
                                    <p><b>This Month :</b> <span class="moreinfo fr">NGN {{ $dep['month'] }}</span></p>
                                    <p><b>All Time :</b> <span class="moreinfo fr">NGN {{ $dep['all'] }}</span></p>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="single-report mb-xs-20">
                                <div class="s-report-inner pt--20 mb-3">
                                    <div class="icon"><i class="fa fa-ball"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <a href="#">
                                            <h4 class="header-title mb-0">Funds Withdrawn</h4>
                                        </a>
                                    </div>
                                </div>
                                    <p><b>Today :</b> <span class="moreinfo fr">NGN {{ $wth['today'] }}</span></p>
                                    <p><b>This Week :</b> <span class="moreinfo fr">NGN {{ $wth['week'] }}</span></p>
                                    <p><b>This Month :</b> <span class="moreinfo fr">NGN {{ $wth['month'] }}</span></p>
                                    <p><b>All Time :</b> <span class="moreinfo fr">NGN {{ $wth['all'] }}</span></p>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="single-report mb-xs-20">
                                <div class="s-report-inner pt--20 mb-3">
                                    <div class="icon"><i class="fa fa-ball"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <a href="#">
                                            <h4 class="header-title mb-0">Lesson Requests</h4>
                                        </a>
                                    </div>
                                </div>
                                    <p><b>Today :</b> <span class="moreinfo fr">NGN {{ $req['today'] }}</span></p>
                                    <p><b>This Week :</b> <span class="moreinfo fr">NGN {{ $req['week'] }}</span></p>
                                    <p><b>This Month :</b> <span class="moreinfo fr">NGN {{ $req['month'] }}</span></p>
                                    <p><b>All Time :</b> <span class="moreinfo fr">NGN {{ $req['all'] }}</span></p>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="single-report mb-xs-20">
                                <div class="s-report-inner pt--20 mb-3">
                                    <div class="icon"><i class="fa fa-ball"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <a href="#">
                                            <h4 class="header-title mb-0"> Profits</h4>
                                        </a>
                                    </div>
                                </div>
                                    <p><b>Today :</b> <span class="moreinfo fr">NGN {{ $prf['today'] }}</span></p>
                                    <p><b>This Week :</b> <span class="moreinfo fr">NGN {{ $prf['week'] }}</span></p>
                                    <p><b>This Month :</b> <span class="moreinfo fr">NGN {{ $prf['month'] }}</span></p>
                                    <p><b>All Time :</b> <span class="moreinfo fr">NGN {{ $prf['all'] }}</span></p>
                            </div>
                        </div>


                    </div>
                </div>

                <div class="main-content-inner">
                <!-- sales report area start -->
                <div class="sales-report-area mt-5 mb-5">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="single-report mb-xs-20">
                                <div class="s-report-inner pr--20 pt--30 mb-3">
                                    <div class="icon"><i class="fa fa-ball"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <a href="">
                                            <h4 class="header-title mb-0">Active Requests</h4>
                                        </a>
                                        <p>{{$activeReq}}</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="single-report mb-xs-20">
                            <div class="s-report-inner pr--20 pt--30 mb-3">
                                    <div class="icon"><i class="fa fa-ball"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Pending Requests</h4>
                                        <p>{{$pendingReq}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="single-report">
                            <div class="s-report-inner pr--20 pt--30 mb-3">
                                    <div class="icon"><i class="fa fa-ball"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Completed Tasks</h4>
                                        <p>{{$completeReq}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- sales report area end -->
             </div>
             </div>
        </div>
        <!-- main content area end -->

        <!-- Vertically centered modal start -->
           
        @if($user->role != "User")
                                <!-- Modal -->
                                <div class="modal fade bd-example-modal-sm" id="withdrawmodal">
                                    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Place Withdrawal</h5>
                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="text-center mb-3">
                                                    The withdrawal request would be processed and the withdrawn amount would be sent to:
                                                </div>
                                                <p>Bank Name : <span class="fr">{{$user->bank->bank_name}}</span></p> 
                                                <p>Account Number : <span class="fr">{{$user->bank->account_no}}</span></p> 
                                                <p>Account Name : <span class="fr">{{$user->bank->account_name}}</span></p>
                                            <form action="{{ route('withdraw') }}" method="post">{{csrf_field()}}
                                                <input type="text" name="amonut" value="{{ $bals['Abal'] }}"disabled required class="form-control"> 
                                            </div>
                                            <div class="modal-footer">
                                                
                                                    <button type="submit" class="btn btn-success') }}">Proceed</button>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    <!-- Vertically centered modal end -->
                    @endif

@endsection