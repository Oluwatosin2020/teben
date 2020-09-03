
(function($) {
    "use strict";

    let username = $('#username').text();
    let userUname = $('#userUname').text().trim();
    let useremail = $('#useremail').text().trim();
        if(useremail === ""){
            useremail = userUname+'@gmail.com';
        }
    let userphone = $('#userphone').text().trim();
    let selected_teacher = "";
    var msg = $('.messagealert');
    let formatter = new Intl.NumberFormat('en-US', {style:'currency', currency:'NGN'});
    let success_msg = $('#alert_success').text().trim();
    let error_msg = $('#alert_error').text().trim();
    let notify_msg = $('#notify_msg').text().trim();
    let notification_bar = $('#snackbar');
    notification_bar.css('color','white');
    let searchbar = $('.searchbar');
    let wallet = $('.walletBal');
    let totalDep = 0;
    let notification_loading = 0;
    let last_id = 0;



    /*================================
    Preloader
    ==================================*/

    var preloader = $('#preloader');
    $(window).on('load', function() {
        preloader.fadeOut('slow', function() { $(this).remove(); });
    });

    /*================================
    sidebar collapsing
    ==================================*/
    $('.nav-btn').on('click', function() {
        $('.page-container').toggleClass('sbar_collapsed');
    });

    /*================================
    Start Footer resizer
    ==================================*/
    var e = function() {
        var e = (window.innerHeight > 0 ? window.innerHeight : this.screen.height) - 5;
        (e -= 67) < 1 && (e = 1), e > 67 && $(".main-content").css("min-height", e + "px")
    };
    $(window).ready(e), $(window).on("resize", e);

    /*================================
    sidebar menu
    ==================================*/
    $("#menu").metisMenu();

    /*================================
    slimscroll activation
    ==================================*/
    $('.menu-inner').slimScroll({
        height: 'auto'
    });
    $('.nofity-list').slimScroll({
        height: '435px'
    });
    $('.timeline-area').slimScroll({
        height: '500px'
    });
    $('.recent-activity').slimScroll({
        height: 'calc(100vh - 114px)'
    });
    $('.settings-list').slimScroll({
        height: 'calc(100vh - 158px)'
    });

    /*================================
    stickey Header
    ==================================*/
    $(window).on('scroll', function() {
        var scroll = $(window).scrollTop(),
            mainHeader = $('#sticky-header'),
            mainHeaderHeight = mainHeader.innerHeight();

        // console.log(mainHeader.innerHeight());
        if (scroll > 1) {
            $("#sticky-header").addClass("sticky-menu");
        } else {
            $("#sticky-header").removeClass("sticky-menu");
        }
    });

    /*================================
    form bootstrap validation
    ==================================*/
    $('[data-toggle="popover"]').popover()

    /*------------- Start form Validation -------------*/
    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);

    /*================================
    datatable active
    ==================================*/
    // if ($('#dataTable').length) {
    //     $('#dataTable').DataTable({
    //         responsive: true
    //     });
    // }
    // if ($('#dataTable2').length) {
    //     $('#dataTable2').DataTable({
    //         responsive: true
    //     });
    // }
    // if ($('#dataTable3').length) {
    //     $('#dataTable3').DataTable({
    //         responsive: true
    //     });
    // }


    /*================================
    Slicknav mobile menu
    ==================================*/
    $('ul#nav_menu').slicknav({
        prependTo: "#mobile_menu"
    });

    /*================================
    login form
    ==================================*/
    $('.form-gp input').on('focus', function() {
        $(this).parent('.form-gp').addClass('focused');
    });
    $('.form-gp input').on('focusout', function() {
        if ($(this).val().length === 0) {
            $(this).parent('.form-gp').removeClass('focused');
        }
    });

    /*================================
    slider-area background setting
    ==================================*/
    $('.settings-btn, .offset-close').on('click', function() {
        $('.offset-area').toggleClass('show_hide');
        $('.settings-btn').toggleClass('active');
    });

    /*================================
    Owl Carousel
    ==================================*/
    function slider_area() {
        var owl = $('.testimonial-carousel').owlCarousel({
            margin: 50,
            loop: true,
            autoplay: false,
            nav: false,
            dots: true,
            responsive: {
                0: {
                    items: 1
                },
                450: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1000: {
                    items: 2
                },
                1360: {
                    items: 1
                },
                1600: {
                    items: 2
                }
            }
        });
    }
    slider_area();

    /*================================
    Fullscreen Page
    ==================================*/

    if ($('#full-view').length) {

        var requestFullscreen = function(ele) {
            if (ele.requestFullscreen) {
                ele.requestFullscreen();
            } else if (ele.webkitRequestFullscreen) {
                ele.webkitRequestFullscreen();
            } else if (ele.mozRequestFullScreen) {
                ele.mozRequestFullScreen();
            } else if (ele.msRequestFullscreen) {
                ele.msRequestFullscreen();
            } else {
                console.log('Fullscreen API is not supported.');
            }
        };

        var exitFullscreen = function() {
            if (document.exitFullscreen) {
                document.exitFullscreen();
            } else if (document.webkitExitFullscreen) {
                document.webkitExitFullscreen();
            } else if (document.mozCancelFullScreen) {
                document.mozCancelFullScreen();
            } else if (document.msExitFullscreen) {
                document.msExitFullscreen();
            } else {
                console.log('Fullscreen API is not supported.');
            }
        };

        var fsDocButton = document.getElementById('full-view');
        var fsExitDocButton = document.getElementById('full-view-exit');

        fsDocButton.addEventListener('click', function(e) {
            e.preventDefault();
            requestFullscreen(document.documentElement);
            $('body').addClass('expanded');
        });

        fsExitDocButton.addEventListener('click', function(e) {
            e.preventDefault();
            exitFullscreen();
            $('body').removeClass('expanded');
        });
    }



        $('.textbtn').click(function() {
            alert('hihhhh');
        });

        $(document).ready(function(){

            // console.log('loaded');

            // console.log(username);


            //Format wallet balance
            var walletVal = wallet.text();
            wallet.text(formatter.format(walletVal));

            if(success_msg !== ""){
                alertNotify(success_msg,"green");
            }
            else if(error_msg !== ""){
                alertNotify(error_msg,"red");
            }
            else if(notify_msg !== ""){
                alertNotify(notify_msg,"blue");
            }

            $.ajaxSetup({
                     headers:{
                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     }
                 });

                 $('#uploadAvatar:file').change(function(){
                     var file = this.files[0];
                    //  console.log(file);
                     if(file.size > 3000000){
                         alert('Image file too large');
                     }
                     else{
                         var formdata = new FormData();
                         formdata.append("image",file);

                        $.ajax({
                            url: "/upload-avatar",
                            type: "POST",
                            enctype: 'multipart/form-data',
                            cache: false,
                            contentType: false,
                            processData: false,
                            data: formdata ,
                                success:function(data){
                                    // console.log(data[0]);
                                    $('.avatarUploaded').html(' <img src="public/avatar_images/'+data[0]+'" class="img " alt="" required>');
                                }

                            });
                
                     }
                 });
        
                 $('#subject').change(function(){
                     
                     var subject = $('#subject').val();
                     var list =  $('.list-teachers');

                    //  console.log(subject);
                    selected_teacher = "";
                    list.html('<div class="container mb-5"><img src="91.svg" style="margin-left:35%;margin-top:40px;width:25%"></div>');
        
                        $.ajax({
                                url: "/get-tutors",
                                type: "GET",
                                data: {subject:subject},
                                    success:function(data){
                                       
                                            // alert('succes');
                                            // console.log(data.length);
                                            list.html('<div class="container padit">'+
                                                            '<p class="text-center" ><b> No teacher available for selected subject or network failed! </b></p>'+
                                                            '<p class="text-center">Refresh page or choose another subject...</p>'+
                                                        '</div>'
                                                    );
                                            list.html("");
                                            $.each(data,function(index,values){
                                                $.each(values,function(key,value){
                                                    console.log(key);
                                                    console.log(value);
                                                    
                                                    list.append('<div class="col-md-4 card">'+
                                                                '<div class="select_me" id="'+value[9]+'">'+
                                                                    '<img src="public/avatar_images/'+value[1]+'" class="img mt-3" alt="Teacher`s image" title="Teacher`s image" style="width:100%">'+
                                                                    '<p class="h5 mt-2 mb-0">'+value[0]+'</p>'+
                                                                    '<p class="mt-0 text-center"><span class="age"><i>Age: '+value[2]+'</i></span><i>+'+value[4]+'yrs Exp</i></p>'+
                                                                    '<p class=" text-center"><i class="ti-graduate">'+value[3]+'</i></p>'+
                                                                '</div>'+
                                                                
                                                                '<div class="modal fade bd-example-modal-md" id="thisTeacher-'+value[9]+'">'+
                                                                    '<div class="modal-dialog modal-dialog-centered modal-md" role="document">'+
                                                                        '<div class="modal-content">'+
                                                                            '<div class="modal-header">'+
                                                                                '<h5 class="modal-title">'+value[0]+'</h5>'+
                                                                                '<button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>'+
                                                                            '</div>'+
                                                                            '<div class="modal-body">'+
                                                                                '<div class="row">'+
                                                                                    '<img src="public/avatar_images/'+value[1]+'" class="img" alt="Teacher`s image" title="Teacher`s image" style="margin-left:15px;margin-right:15px;width:100%;">'+
                                                                                '</div>'+
                                                                                '<div class="row mt-2">'+
                                                                                    '<div class="col-md-6">'+
                                                                                        '<p class="b-text">Age : <span class="unb-text">'+value[2]+'</span></p>'+
                                                                                        '<p class="b-text">Location : <span class="unb-text">'+value[5]+'</span></p>'+
                                                                                        '<p class="b-text">Language : <span class="unb-text">'+value[6]+'</span></p>'+
                                                                                    '</div>'+
                                                                                    '<div class="col-md-6">'+
                                                                                        '<p class="b-text">Yrs of Exp : <span class="unb-text">'+value[4]+'</span></p>'+
                                                                                        '<p class="b-text">Qualification : <span class="unb-text">'+value[3]+'</span></p>'+
                                                                                        '<p class="b-text">Completed Lessons : <span class="unb-text">'+value[7]+'</span></p>'+
                                                                                    '</div>'+
                                                                                '</div>'+
                                                                            '</div>'+
                                                                            '<div class="modal-footer">'+
                                                                                '<span class="b-text" style="float:left">ID : #'+value[8]+'</span>'+
                                                                                '<button type="submit" class="btn btn-success choosebtn" id="'+value[9]+'">Choose</button>'+
                                                                            '</div>'+
                                                                        '</div>'+
                                                                    '</div>'+
                                                                '</div>'+
                                                            '</div>'
                                            );
                                    });
                                });

                        },
                        error:function(){
                            list.html('<div class="container padit">'+
                                    '<p class="text-center" ><b> An error occurred or network failed! </b></p>'+
                                    '<p class="text-center">Refresh page or choose another subject...</p>'+
                                '</div>'
                            );
                        }
                    });
                    
                 });
        });

        $(document).on('click', '.select_me',function(){
            var list = $('.list-teachers');

            if(list.hasClass('selected')){
                list.removeClass('selected');
            }
            $('.modal').modal('hide');
            $('#thisTeacher-'+$(this).attr("id")+'').modal('show');
            // console.log('selected');
        });

            $(document).on('click', '.choosebtn',function(){
                var topParent = $(this).parent().parent().parent().parent().parent();
                
                // var selectDiv = topParent.find('.select_me');

                selected_teacher = $(this).attr("id");
                //  console.log(selected_teacher);
                $('#receiver_id').val(selected_teacher);
                $('.modal').modal('hide');
                topParent.addClass('selected');

                if(msg.text().trim() == "Please select a tutor!"){
                    msg.text('');
                }
            });

 
        $('.userOptions').change(function(){
            trackchange();
        });

        function trackchange(){
           var curriculum = $("form input[type='radio']:checked").val();
           var time = $("#duration").val()
           var subject = $('#subject').val();
           var setPrice = $('#price');
           var amount = $('#amount');
           var cDate = $('#choiceDate').val().trim();
           var cTime = $('#choiceTime').val().trim();

           var price;
           console.log(curriculum);
           console.log(time);

           if(time !== ""){

                if(curriculum == 'Nigerian'){
                    switch(time){
                        case '15':
                            price = 340;
                            break;
            
                        case '20':
                                price = 450;
                                break;
                            
                            case '30':
                                price = 675;
                                break;
                            
                            case '40':
                                price = 900;
                                break;
                            
                            case '60':
                                price = 1350;
                                break;
                            
                    }
                }
                else{
                    switch(time){
                        case '15':
                            price = 625;
                            break;
        
                        case '20':
                            price = 840;
                            break;
                        
                        case '30':
                            price = 1250;
                            break;
                        
                        case '40':
                            price = 1670;
                            break;
                        
                        case '60':
                            price = 2500;
                            break;
                    }
                }

                setPrice.text(formatter.format(price));
                amount.val(price);
                console.log(price);

           }
           else{
               msg.text('Please select Class duration');
           }

        $(document).on('click', '#paybtn',function(e){
            // alert(selected_teacher);

            if(subject === ""){
                msg.text('Please select subject!');
                msg.css('color','red');
            }
            if(time === ""){
                msg.text('Please select class duration!');
                msg.css('color','red');
            }
            else if(cDate === "" || cTime === ""){
                msg.text('Please select a date and time');
                msg.css('color','red');
            }
            else if(selected_teacher === ""){
                e.preventDefault();
                msg.text('Please select a tutor!');
                msg.css('color','red');
            }
            else{
                msg.text('');
                console.log('Processing');
            }
        }); 

    }

    function alertNotify(msg,bgcolor){
        notification_bar.css('background_color',bgcolor);
        notification_bar.text(msg);
        notification_bar.addClass("show");

        setTimeout(function(){
             notification_bar.removeClass('show');
             }, 7000);
        console.log('Message shown!');
    }

    searchbar.keyup(function(){
        var searchword , content_list , count;
        searchword = searchbar.val().toLowerCase();
        content_list = $('.list-teachers > div');
        count = 0

        content_list.each(function(){
            var currDiv = $(this).text().toLowerCase();
            // console.log(currDiv);

            if(currDiv.indexOf(searchword) == -1){
                console.log(" not found");
                $(this).css('display','none');
                if($(this).hasClass('selected')){
                    $(this).removeClass('selected');
                    selected_teacher = "";
                }
            }
            else{
                console.log("found");
                $(this).css('display','block');
                count++;
            }

            if(count < 1){
                $('.list-teachers').css('display','none');
                $('.no-match').html('<div class="container padit">'+
                                        '<p class="text-center" ><b> No match found! </b></p>'+
                                        '<p class="text-center">Try another Name or Age or Certification...</p>'+
                                    '</div>'
                                );
                    }
            else{  
                $('.no-match').html('');
                $('.list-teachers').css('display','block');
            }
            $('.searchcount').html('<p class="text-center mt-3"><i class="ti-search"></i>Search results found: '+count+'</p>');


            if(searchword.trim() === ""){
                $('.searchcount').html('');
            }

        });

        console.log(content_list.length);
    })

    $('.acceptbtn').click(function(e){
        e.preventDefault();
        var btn = $(this);
        var thisParent = btn.parent().parent().parent();
        var thisOpp = thisParent.find('.rejectbtn');
        var thisId = btn.attr('id')
        var msg = "Request accepted successfully";
        // console.log(thisParent);
        btn.text('Loading');
        btn.attr('disabled',true);
        thisOpp.css('display','none');
        alert('clicked');
        

        

        // $.ajax({
        //     url: "/get-tutors",
        //     type: "POST",
        //     data: {id:thisId},
        //         success:function(data){
        //             alertNotify(msg,'green');
        //             btn.text('Accepted');
        //         }

        // });
});

$('#depositamount').keyup(function(){
    var dVal = $('#depositamount').val();
    var dValText = $('#depositText');
    var dValFee = $('#depositFee');
    var dMsg = $('#depositMsg');
    var dBtn = $('#depositbtn');
    var fee = dVal*0.02;
    var total = parseInt(dVal)+parseFloat(fee);

    if(dVal.length > 0){
        $('#depositInfo').css('display','block');
        dValText.text(formatter.format(dVal));
        
        dValFee.text(formatter.format(fee));
    }

    if(dVal < 0){
        dBtn.attr('disabled',true);
        dMsg.html('<span style="color:red">Minimum deposit value is NGN 500!</span>');
    }
    else{
        dBtn.attr('disabled',false);
        dMsg.html('<span style="color:green">Total: '+formatter.format(total)+'</span>');
        totalDep = total;
    }

    
})

$('#depositbtn').click(function(e){
    var dVal = $('#depositamount').val();
    if(dVal !== ""){
        e.preventDefault();
    }
    

                    var handler = PaystackPop.setup({
                    key: 'pk_live_e8feb8788581b0311f5d64db991269f0201a6dca',
                    email: useremail,
                    amount: (totalDep*10),
                    currency: "NGN",
                    ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
                    metadata: {
                        custom_fields: [
                            {
                                display_name: username,
                                variable_name: username,
                                value: userphone,
                            }
                        ]
                    },
                    callback: function(response){
                        $('#formRef').val(response.reference);
                        console.log('Payment made!');
                        $('#depositform').submit();
                        
                    },
                    onClose: function(){
                        $('#depositMsg').html('<span style="color:red">Transaction Cancelled!</span>');
                    }
                    });
                    handler.openIframe();

                    
});

    $('#bank_code').change(function(){
            $('#account_no').attr('disabled',false)
        get_name();

    });

    $('#bankbtn').click(function(e){
        var acct_name = $('#account_name').val().trim();
        var acct_no = $('#account_no').val().trim();
        console.log('hit');

        if(acct_no === null){
            e.preventDefault();
            $('#bank_msg').html('<span style="color:red">Account number required!</span>');
        }
        if(acct_name === null){
            e.preventDefault();
            $('#bank_msg').html('<span style="color:red">Account name required!</span>');
        }
    });
    $('#account_no').keyup(function(){
        get_name();
    });

    function get_name(){
        var bank_ = $('#bank_code').val();
            bank_ = bank_.split(",");
        var bank_name = bank_[1];
        var bank_code = bank_[0];
        var acct_no = $('#account_no').val().trim();
        var acct_name = $('#account_name');
        if(bank_code === null){
            $('#account_no').val('');
            $('#account_no').attr('disabled',true)
            $('#bank_msg').html('<span style="color:red">Select a bank!</span>');
        }
        else{
            $('#bank_msg').html('');
        }
        

        if(acct_no.length == 10){
             $('#info-block').html('<strong class="text-center">Loading...</strong>');

            
            $.ajax({
                url: "/verify-bank",
                type: "POST",
                data: {bank_name:bank_code,account_no:acct_no},
                    success:function(data){
                        // console.log(data);
                        if(data.status){
                            acct_name.val(data.name);
                            // $('#bank_name').val(bank_name);
                            $('#bankbtn').attr('disabled',false);
                            $('#info-block').html('<strong class="text-center">You may proceed!</strong>');
                        }
                        else{
                            $('#bankbtn').attr('disabled',true);
                            $('#info-block').html('<strong class="text-center">Invalid account details or error occurred!..Try again</strong>');
                        }
                    }
    
            });
        }
    }

    $.fn.isInViewport = function(){
        var elementTop = $(this).offset().top;
        var elementBottom = elementTop + $(this).outerHeight();
        var viewportTop = $(window).scrollTop();
        var viewportBottom = viewportTop + $(window).height();
        // console.log(elementTop);

        return (elementBottom > viewportTop) && (elementTop < viewportBottom - $(this).height());
    }

    $('.nofity-list').scroll(function(){
        var bot = $('.bottomcontent')
        console.log(notification_loading);

        if (bot.isInViewport()){

            if(notification_loading === 0){
                bot.css('display','block');
                notification_loading = 1;
                console.log(notification_loading);

                notifications(last_id);
            }
            
        }
        else{
            bot.css('display','none');
            console.log('im not here');
        }
    });

    function notifications(id){
        
        $.ajax({
            url: "/my-notifications",
            type: "GET",
            data: {last:id},
                success:function(data){
                    
                    console.log(data);
                    $.each(data,function(index,values){
                        $.each(values,function(key,value){
                            var color,icon;
                            if(data.type === 'Password'){
                                type = 'ti-key btn-danger';
                            }
                            else if(data.type === 'Teacher Approved'){
                                type = 'ti-user btn-green';
                            }
                    
                            $('.notify-content').append('<a href="#" class="notify-item">'+
                                                '<div class="notify-thumb"><i class="'+type+'"></i></div>'+
                                                '<div class="notify-text">'+
                                                    '<p>Added</p>'+
                                                    '<span>Just Now</span>'+
                                                '</div>'+
                                            '</a>'
                                            );
                        });
                    });
                    setTimeout(function(){
                        notification_loading = 0;
                        console.log('Loaded');
                    }, 5000);
                // bot.css('display','none');
                },
                error:function(){
                    notification_loading = 0;
                    console.log('error');
                }
        });
    }
    
    
    $('#comp_profile-state').change(function(){
        var state = $(this).val();
        console.log(state);
        $.ajax({
            url: "/lgas/"+state,
            type: "GET",
            data: {},
                success:function(data){
                    $('#comp_profile-lga').html('<option value="" disabled selected>Select L.G.A</option>');
                    $.each(data,function(index,values){
                        $.each(values,function(key,value){
                            $('#comp_profile-lga').append('<option value="'+value+'" >'+value+'</option>');
                        });
                    });
                },
                error:function(){
                    console.log('error');
                }
        });
    });
    
    
    $('#invest-amt').change(function(){
        calculate_invest();
    });
    
    $('#invest-period').change(function(){
        calculate_invest();
    });
    
    function calculate_invest(){
        var amt = parseFloat($('#invest-amt').val()), period = parseFloat($('#invest-period').val()), profit , total , perc , walbal = parseFloat(wallet.attr('value'));
        
        if(period == 6){
            switch (amt){
                case 20000: perc = 14; break;
                case 50000: perc = 22; break;
                case 100000: perc = 25; break;
                case 200000: perc = 28; break;
                case 500000: perc = 31; break;
                case 1000000: perc = 32; break;
            }
        }
        if(period == 12){
            switch (amt){
                case 20000: perc = 17; break;
                case 50000: perc = 25; break;
                case 100000: perc = 28; break;
                case 200000: perc = 31; break;
                case 500000: perc = 34; break;
                case 1000000: perc = 35; break;
            }
        }
        
        profit = ((amt * perc) / 100);
        total = amt+profit
        $('#invest_summary').html("Profit: "+ formatter.format(profit) +'<br> Total: '+ formatter.format(total) +'</span>');
        $('#invest-perc').val(perc);
        $('#invest-prof').val(profit);
        
        if(walbal < amt){
            $('#invest_bal').html('Sorry, you do not have enough money in your wallet. <a href="#" data-toggle="modal" data-target="#depositmodal"><i class="fa fa-inbox"></i><span>Make Deposit</span></a>');
            $('#invest_btn').css('display','none');
        }
        else{
            $('#invest_bal').css('display','none');
            $('#invest_btn').css('display','block');
        }
    }
    
    
    
    
    
    

$('.logoutbtn').click(function(e){
    e.preventDefault();
    document.getElementById('logout-form').submit();
})


})(jQuery);


// end