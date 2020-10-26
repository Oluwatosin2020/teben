@extends('account.layout.app' , ['account' => $account])

@section('content')

    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
          <div class="section-body">

                <div class="card">
                  <div class="card-header">
                    <h4>Download videos or watch online
                    </h4>
                  </div>
                  <div class="card-body">
                      {{-- <h5 class="mb-2">Search for book or video</h5> --}}
                        <div class="row">
                            @if(Session::has('success'))
                                <div class="alert alert-success  btn-block">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                            @if(Session::has('error'))
                                <div class="alert alert-danger  btn-block">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    {{ Session::get('error') }}
                                </div>
                            @endif
                            @if(Session::has('atg_error'))
                            <div class="alert alert-danger  btn-block">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                {{ Session::get('atg_error') }}
                            </div>
                        @endif
                        </div>

                        @if (!$status)
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="mt-3">Pay with coupon</h4>
                                    <p class="mb-2 mt-2">
                                        Contact any of our agents or call our customer care line to get your coupon code and fill it in below
                                    </p>
                                    <p>or</p>
                                    <p class="mb-1">Call +234 703 396 4406 for assitance</p>
                                    <div class="text-center">
                                        <form action="{{ route('couponRecharge') }}" method="post" enctype="multipart/form-data"> {{csrf_field()}}
                                            <label>Use Coupon Code</label>
                                            <input type="text" class="form-control" name="code" required>
                                            <input type="hidden" class="form-control" name="school_account_id" value="{{ $account->id }}" required>
                                            <button type="submit" class="btn btn-success mt-2">Proceed</button>
                                        </form>
                                    </div>

                                </div>

                                <div class="col-md-6">
                                    <h4 class="mt-3">Pay with recharge card</h4>
                                    <br>
                                    <div class="text-center">
                                        <p>You can recharge your account with an MTN recharge card. Please make sure you have your airtime ready!</p>
                                        <button class="btn btn-success mt-2" onclick="callAtgPay()">Pay</button>
                                    </div>
                                </div>
                            </div>

                        @endif


                        @foreach($medias as $media)

                        <div class="card-header row mb-3">
                            <div class="col-md-4 text-center">
                                <img src="{{ getFileFromStorage($media->getCoverImage() , 'storage') }}" alt="Cover Image" width="100%" height="100px"/>
                            </div>
                            <div class="col-md-8 mt-2 mt-md-3">
                                <div class="h4"><b>{{$media->title}}</b></div>
                                <div class="mb-2">
                                    <b>Media Type:</b> {{$media->attachment_type}}
                                </div>
                                <div class="mb-2">
                                    <b>File Size:</b> {{$media->size}}
                                </div>
                                <div class="mb-2">
                                    <b>Level:</b> {{ getLevels($media->level) }}
                                </div>
                                <div class="mb-2">
                                    <b>Class:</b> {{$media->klass->name }}
                                </div>
                                <div class="mb-2">
                                    <b>Subject:</b> {{$media->subject->name }}
                                </div>
                                <div class="mb-3">
                                    <b>Price:</b> NGN {{$media->price}}
                                </div>
                                <div class="">

                                    <form id="downloadForm" action="{{ route('account.download') }}" method="post" onsubmit="return confirm('Downloading may cost you money! Are you sure you want to download this item?');">@csrf
                                        <input type="hidden" name="media_id" value="{{$media->id}}" required>
                                    <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#watchVideo_{{$media->id}}">Watch</a>
                                        <button type="submit" class="btn btn-sm btn-primary" >Download</button>
                                    </form>
                                </div>

                            </div>
                        </div>

                        <div class="modal fade bd-example-modal-md" id="watchVideo_{{$media->id}}">
                            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Watch Video</h5>
                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                    </div>
                                    <div class="modal-body row">
                                        <video class="col-12" width="100%" height="320" controls>
                                                <source src="{{ route('account.watch_video_attachment' , encrypt($media->getAttachment())) }}" type="video/mp4">
                                                Your browser does not support the video tag.
                                        </video>
                                    </div>
                                </div>
                            </div>
                        </div>


                        @endforeach

                        <div class="text-center">
                            {{-- {!! $medias->links() !!} --}}
                        </div>

                  </div>
                </div>
              </div>

        </section>
    </div>

@endsection
@section('script')
<script src="https://aimtoget.com/assets/webpay/inline.js"></script>
<script>
    function callAtgPay(e) {
    // e.preventDefault()
        AtgPayment.pay({
            //customer's email address
            email: 'payment@tebentutors.com',

            //Customer's phone number (Optional)
            phone: '+2347036331480',

            //customer's description
            description: 'Pay for video subscription',

            // Amount to pay in naira
            amount: '{{ $account->amount }}',

            //Payment reference
            //If not specified, a reference will be generated for you
            reference: '',

            // Merchant's aimotget PUBLIC KEY
            key: {{ env('AIMTOGEt_PUBLIC_KEY') }},

            //Url to the logo you want displayed on the payment modal
            logo_url: 'https://tebentutors.com/public/logo.png',

            onclose: function () {
                //do something when modal is closed
            },

            onerror: function (data) {
                let reference = data.reference
                //payment failed, do something with reference
            },

            onsuccess: function (data) {
                let reference = data.reference
                //get reference and verify payment before awarding value
                AtgPaybackProcess(reference);
            }
        });
    }


    function AtgPaybackProcess(reference){
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "{{ route('account.atg_callback') }}",
            type: "POST",
            data: {reference:reference},
                success:function(data){
                    window.location.href = '';
                }
        });
    }

    $('#downloadForm').submit(function(){
        $(this).find('button').attr('disabled', true);
        // alertNotify('Download in progress', "green");
        setTimeout(function(){
            window.location.reload(true);
        },2000);
    })
</script>
@stop
