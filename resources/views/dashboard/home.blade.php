@extends('dashboard.layout.app')

@section('content')
        <!-- main content area start -->
        <ul class="breadcrumb">
           <li class="moreinfo"><i class="fa fa-home moreinfo"></i>Home</li> /
           <li class="moreinfo"><i class="fa fa-dashboard moreinfo"></i>Dashboard</li> 
        </ul>
            <div class="main-content-inner">
                
                <div class="row mt-3">
                    
                    <div class="col-md-4">
                        <div class="user-avatar-name">
                            @if(!empty(auth()->user()->avatar))
                              <img class="user-avatar"  src="{{ asset('public/avatar_images/'.auth()->user()->avatar) }}" style="margin-left:30px;width:220px;height:225px" alt="avatar">
                            @else
                                <img class="user-avatar " src="{{ asset('public/user.png') }}" style="width:230px;margin-left:30px"alt="avatar">
                            @endif
                                
                        </div>
                    </div>
                    
                    <div class="col-md-8">
                        <h3 class=" mt-2" id="username"><b>{{auth()->user()->name}}</b></h3>
                        <div class="row">
                                    <div class="col-md-6">
                                    <!--    <div class="col-md-6">-->
                                    <!--</div>-->
                                        <h5 class="mt-5 mb-2">Wallet Balance <i class="fa fa-money"></i></h5>
                                        <p><span value="{{auth()->user()->wallet}}" class="walletBal" style="color:green">{{auth()->user()->wallet}}</span> <span>
                                        @if( in_array(auth()->user()->role ,array('Teacher','Investor')) || auth()->user()->role == 'Agent')
                                            <button class="btn-danger wthbtn" data-toggle="modal" data-target="#withdrawmodal"><i class="fa fa-arrow-up"></i> Withdraw</button></span> </p>
                                        @endif
                                    </div>
                                </div>
                            
                    </div>
                </div>
                <!-- sales report area start -->
                <div class="sales-report-area mt-5 mb-5">
                    <div class="row">
                        
                        @if(auth()->user()->role == "Teacher")
                            <div class="col-md-4">
                                <div class="single-report mb-xs-20" style="border-style:solid;border-width:medium;border-color:blue">
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
                                <div class="single-report mb-xs-20" style="border-style:solid;border-width:medium;border-color:red">
                                <div class="s-report-inner pr--20 pt--30 mb-3">
                                        <div class="icon"><i class="fa fa-ball"></i></div>
                                        <div class="s-report-title d-flex justify-content-between  btn-outline-primary btn-block">
                                            <h4 class="header-title mb-0">Pending Requests</h4>
                                            <p>{{$pendingReq}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="single-report mb-xs-20" style="border-style:solid;border-width:medium;border-color:green">
                                <div class="s-report-inner pr--20 pt--30 mb-3">
                                        <div class="icon"><i class="fa fa-ball"></i></div>
                                        <div class="s-report-title d-flex justify-content-between">
                                            <h4 class="header-title mb-0">Completed Tasks</h4>
                                            <p>{{$completeReq}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            @if(empty(auth()->user()->teacher))
                            <div class="col-md-4 mt-2 mb-2">
                                <div class="single-report" style="border-style:solid;border-width:medium;border-color:teal">
                                <div class="s-report-inner pt--20 mb-3">
                                    <div class="icon"><i class="fa fa-users"></i></div>
                                        <div class="s-report-title d-flex justify-content-between">
                                            <h4 class="header-title text-center mb-0"><a href="{{ route('applyteacher') }}">Become a Tutor</a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="col-md-4 mt-2 mb-2">
                                <div class="single-report" style="border-style:solid;border-width:medium;border-color:teal">
                                <div class="s-report-inner pt--20 mb-3">
                                    <div class="icon"><i class="fa fa-check"></i></div>
                                        <div class="s-report-title d-flex justify-content-between">
                                            <h4 class="header-title text-center mb-0">Teacher Status: {{auth()->user()->teacher->status}}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        @endif
                        
                        
                        <div class="col-md-4 mt-2 mb-2">
                            <div class="single-report" style="border-style:solid;border-width:medium;border-color:blue">
                            <div class="s-report-inner pt--20 mb-3">
                                <div class="icon"><i class="fa fa-book"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title text-center mb-0"><a href="{{ route('available_books')}}">Download Books and Videos</a></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        @if(auth()->user()->role == 'Parent')
                        <div class="col-md-4 mt-2 mb-2">
                            <div class="single-report" style="border-style:solid;border-width:medium;border-color:orange">
                            <div class="s-report-inner pt--20 mb-3">
                                <div class="icon"><i class="fa fa-search"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title text-center mb-0"><a href="{{ route('quicktutors') }}">Get a Tutor</a></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        
                        <div class="col-md-4 mt-2 mb-2">
                            <div class="single-report" style="border-style:solid;border-width:medium;border-color:purple">
                            <div class="s-report-inner pt--20 mb-3">
                                <div class="icon"><i class="fa fa-money"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title text-center mb-0"><a href="#" data-toggle="modal" data-target="#depositmodal">Make Deposit</a></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4 mt-2 mb-2">
                            <div class="single-report" style="border-style:solid;border-width:medium;border-color:brown">
                            <div class="s-report-inner pt--20 mb-3">
                                <div class="icon"><i class="fa fa-edit"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title text-center mb-0"><a href="#" class="settings-btn">Complete Profile</a></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- sales report area end -->
             </div>
        </div>
        <!-- main content area end -->

@endsection