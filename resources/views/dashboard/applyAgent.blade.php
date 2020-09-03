@extends('dashboard.layout.app')

@section('content')
        <!-- main content area start -->
        <ul class="breadcrumb">
           <li class="moreinfo"><i class="fa fa-home moreinfo"></i>Home</li> /
           <li class="moreinfo"><i class="fa fa-dashboard moreinfo"></i>Dashboard</li> /
           <li class="moreinfo"><i class="fa fa-university moreinfo"></i>Become a Agent</li> 
        </ul>
            <div class="main-content-inner">
                <div class="offset-md-2 row">
                    
                    <div class="col-md-8">
                        <div class="text-center mb-5 h3">
                            Becoming an agent gives you the right to purchase and sell our coupon codes , advertise our services , promote our brand and earn extra cash from other tasks!!
                        </div>
                        <div class="mb-3">
                            <h4>Step 1</h4>
                            <p>Complete your profile</p>
                        </div>
                        
                        <div class="mb-3">
                            <h4>Step 2</h4>
                            <p>Fill in your bank details to enable withdrawal</p>
                        </div>
                        
                        <div class="mb-3">
                            <h4>Step 3</h4>
                            <p>Upload your available ID card i.e National id, Voters card and tell us why we should work with you....</p>
                            <form method="post" action="{{ route('submitAgentApplication') }}">@csrf
                               
                                <div class="row mb-2 mt-5">
                                    @if(empty(auth()->user()->dob))
                                    <div class="col-md-12 mb-2">
                                        <label>Date of Birth</label>
                                        <input type="date" name="dob" required class="form-control" />
                                        @error('dob')
                                    <span class="form-input-error" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                    </div>
                                    @endif
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
                                
                                <textarea rows="3" class="form-control mt-2" name="cover_letter" placeholder="Tell us why we should work with you......"></textarea>
                                @error('cover_letter')
                                    <span class="form-input-error" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <button type="submit" class="btn btn-success btn-sm mt-2">Apply</button>
                            </form>
                        </div
                    </div>
                </div>
            </div>
        <!-- main content area end -->

@endsection