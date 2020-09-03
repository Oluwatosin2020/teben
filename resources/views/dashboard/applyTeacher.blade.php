@extends('dashboard.layout.app')

@section('content')
        <!-- main content area start -->
        <ul class="breadcrumb">
           <li class="moreinfo"><i class="fa fa-home moreinfo"></i>Home</li> /
           <li class="moreinfo"><i class="fa fa-dashboard moreinfo"></i>Dashboard</li> /
           <li class="moreinfo"><i class="fa fa-user moreinfo"></i>Become a Teacher</li> 
        </ul>
            <div class="main-content-inner">
                <h5>Hello, Kindly fill the below form as correct as possible to apply!</h5>

                <div class="container">
                    <form action="{{ route('submitTeacher') }}" method="post" enctype="multipart/form-data"> {{csrf_field()}}
                        <div class="row mt-3">
                    
                                @if(empty(auth()->user()->id_card))
                                    <div class="col-md-6">
                                        <label>ID Type</label>
                                        <select type="date" name="id_type" required class="form-control" style="height:50px">
                                            <option value=">WAEC ID-Card">WAEC ID-Card</option>
                                            <option value="School ID-Card">School ID-Card</option>
                                            <option value=">Drivers License">Drivers License</option>
                                            <option value="National ID-Card">National ID-Card</option>
                                            <option value="International Passport">International Passport</option>
                                            
                                        </select>
                                        @error('id_type')
                                            <span class="form-input-error" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label>ID Card</label>
                                        <input type="file" name="id_card" required class="form-control" />
                                        @error('id_card')
                                            <span class="form-input-error" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                @endif
                            
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4 form-group">
                                <p class="required">Current Workplace </p>
                                <input type="text" name="workplace" class="form-control" id="" required>
                            </div>
                            <div class="col-md-5 form-group">
                                <p class="required">Workplace Address </p>
                                <input type="text" name="workaddress" class="form-control" id="" required>
                            </div>
                            <div class="col-md-3 form-group">
                                <p class="required">Employer`s Phone </p>
                                <input type="number" name="emp_phone" class="form-control" id="" required>
                            </div>
                            <div class="col-md-3 form-group">
                                <p class="required">Work Position</p>
                                <input type="text" name="workposition" class="form-control" id="" required>
                            </div>
                            <div class="col-md-2 form-group">
                                <p class="required">Years of Experience </p>
                                <input type="number" name="yrs_experience" class="form-control" id="" required>
                            </div>
                            <div class="col-md-4 form-group">
                                <p class="required">Qualification </p>
                                <input type="text" name="qualification" class="form-control" id="" required>
                            </div>
                            <div class="col-md-3 form-group">
                                <p class="required">Specialty </p>
                                <select  name="specialty" class="form-control" style="height: 45px" id="" required>
                                    <option value="" disabled selected>Select One</option>
                                    <option value="Kindergaten">Kindergaten</option>
                                    <option value="Nursery">Nursery</option>
                                    <option value="Early Primary">Early Primary</option>
                                    <option value="Late Primary">Late Primary</option>
                                    <option value="Junior Secondary">Junior Secondary</option>
                                    <option value="Senior Secondary">Senior Secondary</option>
                                </select>
                            </div>
                            <div class="col-md-3 form-group">
                                <p class="required">Major Subject </p>
                                <select  name="major" class="form-control" style="height: 45px" id="" required>
                                    <option value="" disabled selected>What you teach well?</option>
                                    @foreach($subjects as $subj)
                                        <option value="{{$subj->id}}">{{$subj->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3 form-group">
                                <p>Alternative Subject 1 </p>
                                <select  name="sub1" class="form-control" style="height: 45px" id="" required>
                                    <option value="" disabled selected>Other subjects you teach well?</option>
                                    @foreach($subjects as $subj)
                                        <option value="{{$subj->id}}">{{$subj->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3 form-group">
                                <p>Alternative Subject 2 </p>
                                <select  name="sub2" class="form-control" style="height: 45px" id="" required>
                                    <option value="" disabled selected>Other subjects you teach well?</option>
                                    @foreach($subjects as $subj)
                                        <option value="{{$subj->id}}">{{$subj->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3 form-group">
                                <p class="required">Language </p>
                                <input type="text" name="language" class="form-control" id="" placeholder="Language you teach with..." required>
                            </div>
                            @if(empty(auth()->user()->dob))
                            <div class="col-md-2 form-group">
                                <p class="required">Year</p>
                                <select type="text" name="dob" class="form-control" style="height: 45px" required>
                                    <option value="" disabled selected>Year of Birth</option>
                                    @for($i=0,$d=(date("Y")-18);$i<=40;$i++)
                                        <option value="{{$d-$i}}">{{$d-$i}}</option>
                                    @endfor
                                </select>
                            </div>
                            @endif
                            <div class="col-md-5 form-group">
                                <p class="required">Next of Kin </p>
                                <input type="text" name="n_o_k" class="form-control" id="" placeholder="Your next of kin e.g . Brother name" required>
                            </div>
                            <div class="col-md-2 form-group">
                                <p class="required">Relationship</p>
                                <select type="text" name="relationship" class="form-control" id="" placeholder=""  style="height: 45px" required>
                                    <option value="" disabled selected>Choose one</option>
                                    <option value="Brother">Brother</option>
                                    <option value="Sister">Sister</option>
                                    <option value="Father">Father</option>
                                    <option value="Mother">Mother</option>
                                    <option value="Son">Son</option>
                                    <option value="Daughter">Daughter</option>
                                    <option value="Relative">Relative</option>
                                    <option value="Friend">Friend</option>
                                </select>
                            </div>
                            <div class="col-md-3 form-group">
                                <p class="required">Next of Kin`s Number </p>
                                <input type="number" name="phone_n_o_k" class="form-control" id="" placeholder="" required>
                            </div>
                        </div>
                        <hr>
                        <div class="mt-3">
                            <p><b>Note:</b> You can only apply once, so make sure that all details submitted are accurate and valid. All labels in <span style="color: red">red</span> are required fields, make sure you fill them accordingly!</p>
                            <span style="float: right">
                                <button type="submit" class="btn btn-primary form-control">Submit</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        <!-- main content area end -->

@endsection