@extends('dashboard.layout.app')

@section('content')
        <!-- main content area start -->
        <ul class="breadcrumb">
           <li class="moreinfo"><i class="fa fa-home moreinfo"></i>Home</li> /
           <li class="moreinfo"><i class="fa fa-dashboard moreinfo"></i>Dashboard</li> /
           <li class="moreinfo"><i class="fa fa-groups moreinfo"></i>Quick Tutors</li> 
        </ul>
            <div class="main-content-inner">
                <div class="container">
                    <h4>Get a Qualified Tutor for your kids ASAP!</h4>

                    <form action="{{ route('requestTeacher') }}" id="tutorForm" method="POST"> {{csrf_field() }}

                    <div class="row mt-3">
                        <div class="col-md-4 form-group">
                            <p>Select A Subject</p>
                            <select type="text" name="subject" id="subject" class="form-control" style="height: 45px" required>
                                <option value="" disabled selected>Select a subject</option>
                                @foreach($subjects as $subj)
                                    <option value="{{$subj->id}}">{{$subj->name}}</option>
                                @endforeach
                            </select>
<!-- d-none d-sm-block -->
                            <div class="mt-10  mt-3">
                                <p>How long do you want the class to last?</p>
                                <div class="form-group">
                                    <select type="text" name="duration" id="duration" class="form-control userOptions" style="height: 45px" required>
                                <option value="" disabled selected>Select Class Duration</option>
                                        <option value="15">15 Minutes</option>
                                        <option value="20">20 Minutes</option>
                                        <option value="30">30 Minutes</option>
                                        <option value="40">40 Minutes</option>
                                        <option value="60">60 Minutes</option>
                                    </select>
                                .</div>
                                <div class="form-group">
                                    <p class="mb-2">Select Curriculum</p>
                                    <div class="row">
                                        <div class="col-6">
                                            <p class="person_id" id="selected_teacher"></p>
                                            <input type="radio" name="curriculum" class="userOptions" value="Nigerian" class="form-radio"checked required>
                                            <label for="">Nigerian</label>
                                        </div>
                                        <div class="col-6">
                                            <input type="radio" name="curriculum" value="British" class="userOptions" required>
                                            <label for="">British</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <p class="mt-2">Choose Date and Time</p>
                                        <div class="row">
                                        <div class="col-6">
                                            <p class="person_id" id="selected_teacher"></p>
                                            <input type="date" id="choiceDate" name="date" class="form-control customoption userOptions"  required>
                                        </div>
                                        <div class="col-6">
                                            <input type="time" name="time" id="choiceTime" class="form-control customoption userOptions" required>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="row mt-2">
                                        <h5><b>Price :</b> <span id="price"></span></h5>
                                        <input type="hidden" name="amount" id="amount" required>
                                        <input type="hidden" name="receiver_id" id="receiver_id" required>
                                    </div>

                                    <p class="messagealert text-center mt-2"></p>

                                    <p class="text-center mt-3">
                                        <button class="btn btn-primary" type="submit" id="paybtn">Pay</button>
                                    </p>
                                    
                                </div>
                            </form>

                            </div>

                         </div>

                        <div class="col-md-7 form-group custom-control">
                            <div class="row mb-3">
                                <div class="col-md-6 mt-1 mb-1">
                                    <h5 class="text-center">Available Teachers </h5>
                                </div>
                                <div class="col-md-6 mt-1 mb-1">
                                    <input type="text"  class="searchbar" placeholder="Search by name , Age , etc...">
                                </div>
                            </div>
                           <div class="searchcount mb-2"></div>
                           <div class="row list-teachers">
                               <div class="container padit">
                                   <p class="text-center" >
                                        <b> No information available! </b>
                                    </p>
                                   <p class="text-center">
                                       Choose a subject to see related tutors...
                                    </p>
                               </div>
                            </div>
                            <div class="no-match"></div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- main content area end -->

            <!-- Modal -->
           



@endsection