// ===========================================

$(document).on("submit", "#add_vendor_form", function(e) {
   e.preventDefault();  
   e.stopImmediatePropagation();
 
   $.ajax({
         type: "POST",
         url: base_url+"submit-vendor",
         data: new FormData(this),
        
         success: function (jsonData) {
          
            var jsonData = JSON.parse(jsonData);
            if (jsonData['error'] == true) 
               {
                  
                  if (jsonData['vendor_name'] !='')   { $('.e_vendor_name').html(jsonData['vendor_name']);   }
                  else  { $('.e_vendor_name').html('');  }

                  if (jsonData['email'] !='')  { $('.e_email').html(jsonData['email']);  }
                  else   { $('.e_email').html('');  }

                  if (jsonData['phone_number'] !='')   {  $('.e_phone_number').html(jsonData['phone_number']);   }
                  else  { $('.e_phone_number').html('');  }

                  if (jsonData['vendor_type'] !='')    {  $('.e_vendor_type').html(jsonData['vendor_type']);   }
                  else   { $('.e_vendor_type').html('');   }

                  if (jsonData['company_name'] !='')   { $('.e_company_name').html(jsonData['company_name']);   }
                  else   { $('.e_company_name').html(''); }

                  if (jsonData['address'] !='')   { $('.e_address').html(jsonData['address']);    }
                  else  { $('.e_address').html(''); }

                  if (jsonData['state'] !='') { $('.e_state').html(jsonData['state']);  }
                  else  { $('.e_state').html(''); }


                  if (jsonData['city'] !='')  { $('.e_city').html(jsonData['city']);  }
                  else  { $('.e_city').html(''); }


                  if (jsonData['pin_code'] !='')  { $('.e_pin_code').html(jsonData['pin_code']); }
                  else { $('.e_pin_code').html('');}

                  
                 
               }
               else
               {
                  if(jsonData['success'] == 'true')
                  { 
                     
                     $('#add_vendor_form').trigger('reset');
                      swal("Success", jsonData['message'], "success");
                      $('.e_vendor_name').html('');
                      $('.e_email').html('');
                      $('.e_phone_number').html('');
                      $('.e_vendor_type').html(''); 
                      $('.e_company_name').html(''); 
                      $('.e_address').html('');
                      $('.e_state').html('');
                      $('.e_city').html('');
                      $('.e_pin_code').html('');
                  }
                 
                  
               }
            
         },
         cache: false,
         contentType: false,
         processData: false
      });
});



// ===========================================


