@extends('dashboard.layout.app')

@section('content')
        <!-- main content area start -->
        <ul class="breadcrumb">
           <li class="moreinfo"><i class="fa fa-home moreinfo"></i>Home</li> /
           <li class="moreinfo"><i class="fa fa-dashboard moreinfo"></i>Dashboard</li> /
           <li class="moreinfo"><i class="fa fa-recycle moreinfo"></i>My Transactions</li> 
        </ul>
            <div class="main-content-inner">
                <h4>Clean record of all your transactions in one place!</h4>
            
                <div class="row mt-4">
                    @foreach($transactions as $tran)
                    <div class="col-md-4">
                        <div class="card mb-3" style="padding:10px;">
                            <div class="text-center mb-5">{{$tran->purpose}}</div>
                            <p>Amount: NGN {{$tran->amount}} <span style="float:right">Status: <span style="color:green">{{$tran->status}}</span></span></p>
                            <p style="font-size:13px">ID #{{$tran->uuid}} <span style="float:right;">{{date('d-m-Y, h:i:A',strtotime($tran->created_at))}}</span></p>
                        </div>
                    </div>
                    @endforeach

                </div>

            </div>
        <!-- main content area end -->

@endsection