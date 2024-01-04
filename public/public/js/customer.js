


$(document).on('keyup','#pan_no',function() 
	{
		var pan_no = $(this).val().trim().toUpperCase();
		var regpan = /^([A-Z]){5}([0-9]){4}([A-Z]){1}?$/;
		$(this).val(pan_no);
		if (pan_no.match(regpan)) 
		{
			$('#pan_no').siblings(".wizard-form-error").slideUp();
			$('.e_pan_no').html('');
		}
		else
		{
			$('#pan_no').siblings(".wizard-form-error").slideDown();
			$('.e_pan_no').html('The PAN No field is not in the correct format.');
		}
	})


	$(document).on('keyup','#gst_no',function() 
	{
		var gst_no = $(this).val().trim().toUpperCase();
		var reggst = /^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[0-9a-zA-Z]{1}[0-9a-zA-Z]{1}[0-9a-zA-Z]{1}$/;
		$(this).val(gst_no);
		if (gst_no.match(reggst)) 
		{
			$('#gst_no').siblings(".wizard-form-error").slideUp();
			$('.e_gst_no').html('');
		}
		else
		{
			$('#gst_no').siblings(".wizard-form-error").slideDown();
			$('.e_gst_no').html('The GST No field is not in the correct format.');
		}
	})



$(document).on("submit", "#update_customer_form", function(e) {
   e.preventDefault();  
   
   $.ajax({
         type: "POST",
         url: base_url+"submit-updateCustomer",
         data: new FormData(this),
        
         success: function (jsonData) {
         // alert(jsonData);
            var jsonData = JSON.parse(jsonData);
           if(jsonData['success'] == true)
                  { 
                     $('.workprofilemessage').html('<div class="alert alert-info mb-2" role="alert"> Your Work Profile is submitted. Pending for Approval. </div> ');
                     
                     $('#add_product_form').trigger('reset');
                     swal("Success", jsonData['message'], "success");
                  } 
               else
               {
                  swal("Error", 'invalid username', "error");
               }
            
         },
         cache: false,
         contentType: false,
         processData: false
      });
});


$(document).on('click', '.deleteCustomer', function (e) {
    e.preventDefault();
    e.stopImmediatePropagation();
      swal({ title: "Are You Sure !!", 
        text: "You want to delete this Customer!!", 
        type: "info", 
        showCancelButton: !0, 
        closeOnConfirm: !1, 
        showLoaderOnConfirm: !0 }).then((result)=> 
         {
          if (result.value) { 
            var id = $(this).attr('tag');
         
                 $.ajax({
                     url: base_url + 'delete-customer',
                     type: 'POST',
                     data: { id: id },
                     success: function (data) {
                         
                         var data = JSON.parse(data);
                         if (data['success'] == 'true') {
                             $('#row' + id).fadeOut(1000, function () {
                                 $('#row' + id).remove();
                                 $(".row-id").each(function (i){
                                $(this).text(i+1); 
                             });

                             });
                            swal("Success", data['message'], "success");

                         }
                         else {
                             swal("Success", data['message'], "error");
                         }
            }
        });
     }
    

     })
     
});

$(document).on('click', '.activeCustomer', function (e) {
    e.preventDefault();
    e.stopImmediatePropagation();
    var status = $(this).attr('status');
    if(status == 0 ){ var statustext = 'Activate'; var fstatus = '1';}
    else if(status == 1 ){ var statustext = 'Deactivate'; var fstatus = '0';}
      swal({ title: "Are You Sure !!", 
        text: "You want to "+ statustext +" this Customer Account!!", 
        type: "info", 
        showCancelButton: !0, 
        closeOnConfirm: !1, 
        showLoaderOnConfirm: !0 }).then((result)=> 
         {
          if (result.value) { 
            var id = $(this).attr('tag');
         
                 $.ajax({
                     url: base_url + 'customer-statusupdate',
                     type: 'POST',
                     data: { id: id , fstatus:fstatus },
                     success: function (data) {
                     	//alert(data);
                        if(fstatus == 1){ var text = '<span class="  pl-2 pr-2 badge light badge-success badge-text-size"><i class="fa fa-thumbs-up"></i></span>';}
                        else if(fstatus == 0){ var text = '<span class="  pl-2 pr-2 badge light badge-danger badge-text-size"><i class="fa fa-thumbs-down"></i></span>';}

                         var data = JSON.parse(data);
                         if (data['success'] == 'true') {
                             $('.cusstatus'+ id).html(text);
                            swal("Success", data['message'], "success");
                             $('.cusstatus'+ id).attr('status', fstatus); 
                         }
                         else {
                             swal("Success", data['message'], "error");
                         }
            }
        });
     }
    

     })
     
});

$(document).on("submit", "#reset_password_form", function(e) {
   e.preventDefault();  
   
   $.ajax({
         type: "POST",
         url: base_url+"reset-password",
         data: new FormData(this),
        
         success: function (jsonData) {
           // alert(jsonData);
            var jsonData = JSON.parse(jsonData);
            if(jsonData['success'] == true)
            { 
                $('#reset_password_form').trigger('reset');
               $('#closepass').trigger('click');
               swal("Success", jsonData['message'], "success");
               $('.e_oldpassword').html('');
               $('.e_newpassword').html('');
               $('.e_cr_password').html('');
               
            } 
            else
            {
               if (jsonData['oldpassword'] !='') 
               {
                  $('.e_oldpassword').html(jsonData['oldpassword']);
               }
               else
               {
                  $('.e_oldpassword').html('');
               }
               if (jsonData['newpassword'] !='')  
               {
                  $('.e_newpassword').html(jsonData['newpassword']);
               }
               else
               {
                  $('.e_newpassword').html('');
               }
               if (jsonData['cr_password'] !='')  
               {
                  $('.e_cr_password').html(jsonData['cr_password']);
               }
               else
               {
                  $('.e_cr_password').html('');
               }
              
              
               
            }
            
         },
         cache: false,
         contentType: false,
         processData: false
      });
});
