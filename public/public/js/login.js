
$(function() {
    setTimeout(function() {
        $('#error').remove();
    }, 2000);
});


$(document).on('click', '#phoneregitser', function (e) {

    var pno = $('#phone_number').val(); 
    var regpno = /^([5-9]){1}([0-9]){9}?$/;
        
    if (pno.match(regpno)) 
    {
        $('.s_pno').html('OTP Sent');
        $('#phone_number').prop('readonly', true);
        $('.otpblock').css('display', '');
        $('.otpsendblock').css('display', 'none');
        $('.submitbuttonblock').css('display', '');
    }
    else
    {
       $('.e_pno').html('Enter valid Phone Number');
    }

  
});


$(document).on('click', '#submitlogin', function (e) {

    var pno = $('#phone_number').val(); 
    var otp = $('#otp').val(); 
    if(otp.length =='4'){
         $.post(base_url+"get-plogin",{pno:pno},function(data){
            location.reload();
         });  
    }
    else{
         $('.e_otp').html('OTP  not matched');
    }

 
});

