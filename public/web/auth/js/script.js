(function($) {
    "use strict";

 $.ajaxSetup({
     headers:{
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     }
 });

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
    
    
    $(document).ready(function(){
    var rawForms = $('.form_tab');
    var activeTab = $('.form_tab.active_tab').attr('form-tab');
    var currentTab = parseInt(activeTab);
    var prevBtn = $('#btn_prev') , nextBtn = $('#btn_next') , submitBtn = $('#btn_submit');
    var tabCount = rawForms.length;

    initializeForm();
    function initializeForm(){
    checkState();
        rawForms.each(function(){
            var thisTab = $(this);
            thisTab.removeClass('active_tab');
            if(thisTab.attr('form-tab') == currentTab){
                thisTab.addClass('active_tab');
                // thisTab.attr('skip',false);
            } 
        });
    }
    
    $('#input_role').change(function(){
        console.log('here');
        var option = $(this);
        if(option.val() == 'Student'){
            $('#tab_2').attr('skip',true);
            // prevBtn.addClass('hide');
            // nextBtn.addClass('hide');
            // submitBtn.removeClass('hide');
        }
        else{
            $('#tab_2').attr('skip',false);
            // checkState();
        }
        console.log(currentTab);
        
    });
    
    submitBtn.click(function(e){
        var option = $('#input_role');
        if(option.val() == 'Student'){
            e.preventDefault();
            $('#reg_form').submit();
        }
    });


    function checkState(){
        
        if(currentTab == 1){
            prevBtn.addClass('hide');
            nextBtn.removeClass('hide');
            submitBtn.addClass('hide');
        }
        else if(currentTab == tabCount){
            prevBtn.removeClass('hide');
            nextBtn.addClass('hide');
            submitBtn.removeClass('hide');
        }
        else{
            prevBtn.removeClass('hide');
            nextBtn.removeClass('hide');
            submitBtn.addClass('hide');
        }

    }
    prevBtn.click(function(){
        if(currentTab != 1){
            if($('#tab_'+(currentTab-1)).attr('skip')  === 'true'){
                currentTab--;
            }
            currentTab--;
        }
        initializeForm();
    });
    nextBtn.click(function(){
        checkState();
        var thisTab = $('#tab_'+currentTab);
        var errorCounts = 0;

        thisTab.find('.form-group').each( function(){
            validateInput($(this));
        });

        if(errorCounts < 1){
            if($('#tab_'+(currentTab+1)).attr('skip')  === 'true'){
                currentTab++;
            }
            currentTab++;
            initializeForm();
        }
    $('input , textarea').keyup(function(){
        // console.log(this);
       var parent = $(this).parent();
       validateInput(parent);
    });
    
    $('select').change(function(){
       var parent = $(this).parent();
       validateInput(parent);
    });
    

    function validateInput(form_group){
        var thisInput = form_group.find('input , textarea , select');
        var thisLabel = form_group.find('label').text();
        var thisError = form_group.find('.form-input-error');
        
        
        if(thisInput.get(0).tagName.toUpperCase() == 'SELECT'){
            try{
            if(thisInput.attr('aria-required') == 'true' && thisInput.val() === null){
                errorCounts++;
                thisInput.addClass('input-error');
                thisError.text(thisLabel+' is required!');
                if(thisError.length == 0){
                    form_group.append('<span class="form-input-error">'+thisLabel+' is required!</span>');
                }
            }
            else{
                thisInput.removeClass('input-error');
                thisError.text('');
            }
            }catch(e){
                errorCounts++;
            }
        }
        else{

            try{
                if(thisInput.attr('aria-required') == 'true' && thisInput.val().trim() === ''){
                    errorCounts++;
                    thisInput.addClass('input-error');
                    thisError.text(thisLabel+' is required!');
                    if(thisError.length == 0){
                        form_group.append('<span class="form-input-error">'+thisLabel+' is required!</span>')
                    }
                }
                else{
                    thisInput.removeClass('input-error');
                    thisError.text('');
                }
            }catch(e){
                errorCounts++;
            }
        }
        
    }

});

    
});
    

})(jQuery);