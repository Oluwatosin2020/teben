<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('public/dashboard/css/bootstrap.min.css') }}">
    <title>My Information - Teben Tutors</title>
    <style>
    /* .content{
        background-image:url({{ asset('public/logo.jpg') }});
        background-size: 20%;
    } */

    .pl{
        padding: 30px;
    }

    .front{
        border-width: 10px;
        border-style: dashed;
        border-color: black;
        margin: 20px
    }
    </style>
</head>
<body>
    <div class="container"> 
        <div class="offset-md-3 col-md-6 ">
        <p>Front of ID card</p>
            <div class="content mt-5 front">
                <div class="row mt-4 mb-4">
                    <div class=" offset-2 col-8"><img src="{{ asset('public/avatar_images/'.$teacher->avatar) }}" alt="" style="width: 100%"/></div>
                    <div class="col-md-12  mt-3">
                        <div class="text-center">
                            <h5>{{ $user->name }}</h5>  
                            <p>-- Verified Teben Tutor --</p>
                        </div>
                       <p class="mt-2" style="padding-left:90px"><b>ID:</b> {{ $user->uuid }}</p>
                       <p class="" style="padding-left:90px"><b>Qualification:</b> {{ $user->teacher->qualification }}</p>
                       
                    </div>
                    <div class="offset-2 col-5">
                        <small><b>Note:</b> Scan this code with your phone to verify this Teacher! Dont not allow him/her into your home unless verified.</small>
                    </div>
                    <div class="col-3"><img src="{{ Storage::url('app/public/'.$user->uuid.'.png') }}" alt="" style="width: 100%"/></div>
                </div>
            </div>
        </div>

        <div class="offset-md-3 col-md-6">
        <p>Back of ID card</p>
            <div class="content mt-5 front">
                <div class="row mt-4 mb-4">
                    <div class=" offset-2 col-8">
                        <div class="text-center">
                            This is to certify that the bearer whose name, photography and Unique ID apprears overleaf is a verified teacher at:</div>
                        <img src="{{ asset('public/logo.jpg') }}" alt="" class="mt-3" style="width: 70%;margin-left:50px"/>
                    
                        <div class="text-center mt-3">
                            <p><b>Address:</b> B13, prestige plaza, Jehovah witness junction, bogije lagos.</p>
                        </div>
                       <p class="mt-2" ><b>Mobile:</b>+234 703 396 4406</p>
                       <p class="" ><b>Email:</b> info@tebentutors.com </p>
                       <p class=""><b>Website:</b> www.tebentutors.com</p>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="{{ asset('public/dashboard/js/bootstrap.min.js') }}"></script>
</body>
</html>