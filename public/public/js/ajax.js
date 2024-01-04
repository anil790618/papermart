$(document).on("submit", "#add_staff_form", function(e) {
   e.preventDefault();  
   e.stopImmediatePropagation();

   $.ajax({
         type: "POST",
         url: base_url+"submit-staff",
         data: new FormData(this),
        
         success: function (jsonData) {
           // alert(jsonData);
            var jsonData = JSON.parse(jsonData);
            if (jsonData['error'] == true) 
               {
                  if (jsonData['post'] !='')  { $('.e_post').html(jsonData['post']); } else { $('.e_post').html(''); }
                  if (jsonData['description'] !='')  { $('.e_description').html(jsonData['description']); } else { $('.e_description').html(''); }
                    swal("Error", 'Enter Unique phone number', "error");
               }
               else
               {

                  if(jsonData['success'] == 'true')
                  { 
                    
                     
                     $('#add_staff_form').trigger('reset');
                     
                     swal("Success", jsonData['message'], "success");
                   
                  }
                 
                  
               }
            
         },
         cache: false,
         contentType: false,
         processData: false
      });
});


$(document).on("submit", "#add_job_form", function(e) {
   e.preventDefault();  
   e.stopImmediatePropagation();
    
 
   $.ajax({
         type: "POST",
         url: base_url+"submit-job",
         data: new FormData(this),
        
         success: function (jsonData) {
            
            var jsonData = JSON.parse(jsonData);
            if (jsonData['error'] == true) 
               {
                  if (jsonData['post'] !='')  { $('.e_post').html(jsonData['post']); } else { $('.e_post').html(''); }
                  if (jsonData['description'] !='')  { $('.e_description').html(jsonData['description']); } else { $('.e_description').html(''); }
                 
               }
               else
               {

                  if(jsonData['success'] == 'true')
                  { 
                     var i = $('#job_table').find('tr').length;
                     
                     $('#add_job_form').trigger('reset');
                     $('.close').trigger('click');
                     $('.tabledata').prepend('<tr id="row'+jsonData['jpid']+'"><td class="row-id">'+i+'</td><td>'+jsonData['post']+'</td><td>'+jsonData['description']+'</td> <td> <a class=" update-job" href="javascript:void(0)" tag="'+jsonData['jpid']+'" ><span class="badge light badge-success badge-text-size"><i class="fa fa-edit"></i></span></a><a class="delete-job" href="javascript:void(0)" tag="'+jsonData['jpid']+'" ><span class="badge light badge-danger badge-text-size"><i class="fa fa-trash"></i></span></a></td></tr>');
                     $(".row-id").each(function (i){
                                $(this).text(i+1); 
                             });
                     swal("Success", jsonData['message'], "success");
                     $('.e_description').html('');
                      $('.e_post').html('');
                      $('.nopquality').html('');
                  }
                 
                  
               }
            
         },
         cache: false,
         contentType: false,
         processData: false
      });
});



$(document).on('click', '.update-job', function (e) {

 var id = $(this).attr('tag');
  $.ajax({
      url: base_url + 'get-jobdata',
      type: 'POST',
      data: { id: id },
      success: function (data) {
         
          var data = JSON.parse(data);
          if (data['success'] == 'true') {

               $('#jpid').val(id);
               $('#u_post').val(data['post']);
               $('#u_description').val(data['description']);
               $('#updatejobModal').modal('show');

          }
          else {
              swal("Success", data['message'], "success");
          }
       }
   });
 
});


// ===========================================

$(document).on("submit", "#update_job_form", function(e) {
   e.preventDefault();  
   e.stopImmediatePropagation();

   $.ajax({
         type: "POST",
         url: base_url+"update-job",
         data: new FormData(this),
         beforeSend: function(){ 
            $('.disabled_submit').attr('disabled',true);
         },
         success: function (jsonData) {
          // alert(jsonData);
            var jsonData = JSON.parse(jsonData);
            if (jsonData['error'] == true) 
               { 
                  if (jsonData['post'] !='')  { $('.e_u_post').html(jsonData['post']); } else { $('.e_u_post').html(''); }
                  if (jsonData['description'] !='')  { $('.e_u_description').html(jsonData['description']); } else { $('.e_u_description').html(''); }
                 
               }
               else
               {
                  if(jsonData['success'] == 'true')
                  {  var i = $('#job_tbale').find('tr').length;
                   
                     $('#row'+ jsonData['jpid']).replaceWith('<tr id="row'+jsonData['jpid']+'" ><td class="row-id" >'+i+'</td><td>'+jsonData['post']+'</td><td>'+jsonData['description']+'</td> <td> <a class=" update-job" tag="'+jsonData['jpid']+'" href="javascript:void(0)" ><span class="badge light badge-success badge-text-size"><i class="fa fa-edit"></i></span></a><a class="delete-job" tag="'+jsonData['jpid']+'" href="javascript:void(0)" ><span class="badge light badge-danger badge-text-size"><i class="fa fa-trash"></i></span></a></td></tr>');
                             
                     $(".row-id").each(function (i){
                                $(this).text(i+1); 
                             });
                    
                     $('#update_job_form').trigger('reset');
                     $('.close').trigger('click');
                     
                     swal("Success", jsonData['message'], "success");
                     $('.e_u_description').html('');
                     $('.e_u_post').html('');
                     $('.nopcat').html('');
                     
                  }
                 
                  
               }
           $('.disabled_submit').attr('disabled', false);
            
         },
         cache: false,
         contentType: false,
         processData: false
      });
});


$(document).on('click', '.delete-job', function (e) {
    e.preventDefault();
    e.stopImmediatePropagation();
      swal({ title: "Are You Sure !!", 
        text: "You want to delete this Job Posted!!", 
        type: "info", 
        showCancelButton: !0, 
        closeOnConfirm: !1, 
        showLoaderOnConfirm: !0 }).then((result)=> 
         {
          if (result.value) { 
            var id = $(this).attr('tag');
         
                 $.ajax({
                     url: base_url + 'delete-job',
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
                             swal("Error", data['message'], "error");
                         }
            }
        });
     }
    

     })
     
});


$(document).on('keyup', '.find-product', function(){
  
    word   = $(this).val() || ''; 
    
    
    if(word !=''){
    $('#product_id').val('');
     FindProduct(word);
  }
  else{
  $('.suggestionAra.product').html('');
  }
     
})

function FindProduct(word='')
{ 
    $.post(base_url+'get-searchproducts', {search:word}, function(data){ 
      if(data){
        arr = JSON.parse(data);
        productdate = '';
        if(arr.success == true)
        {
            list = arr.list;
            productdate = '<ul>';
            for(ii in list)
            { 
                productdate+= '<li class="selThisCnItem p_detail" tag="'+list[ii].id+'" name="'+list[ii].product_name+'" maxqty="'+list[ii].minimum_stock+'" uom= "'+list[ii].uom+'">'+list[ii].product_name+' <br></li>';
            }
            productdate+= '</ul>';
        }
        else{
            productdate+= '<ul><li class="selThisCnItem " >No Data</li></ul>';
        } 
         $('.suggestionAra.product').html(productdate);
         $('#product_id').val('');
      }
    })
}

$(document).on("click", ".p_detail", function(e) {
   var id           = $(this).attr('tag');
   var name           = $(this).attr('name');
   var maxqty           = $(this).attr('maxqty');
   var tag           = $(this).attr('producttag');
   var uom           = $(this).attr('uom');
   
   $('#product_id').val(id);
   $('.find-product').val(name);
   $('.puom').text('( in '+uom+')');
   $('.suggestionAra.product').html('');

});



// ===========================================


$(document).on("submit", "#add_rates_form", function(e) {
   e.preventDefault();  
   e.stopImmediatePropagation();
    
 
   $.ajax({
         type: "POST",
         url: base_url+"submit-rates",
         data: new FormData(this),
        
         success: function (jsonData) {
             //alert(jsonData);
            var jsonData = JSON.parse(jsonData);
            if (jsonData['error'] == true) 
               {
                  if (jsonData['product_id'] !='')  { $('.e_product_id').html(jsonData['product_id']); } else { $('.e_product_id').html(''); }
                  if (jsonData['post_type'] !='')  { $('.e_post_type').html(jsonData['post_type']); } else { $('.e_post_type').html(''); }
                  if (jsonData['rates_offered'] !='')  { $('.e_rates_offered').html(jsonData['rates_offered']); } else { $('.e_rates_offered').html(''); }
                  if (jsonData['description'] !='')  { $('.e_description').html(jsonData['description']); } else { $('.e_description').html(''); }
                 
               }
               else
               {

                  if(jsonData['success'] == 'true')
                  { 
                     var i = $('#rate_table').find('tr').length;
                     
                     $('#add_rates_form').trigger('reset');
                     $('.close').trigger('click');
                     $('.tabledata').prepend('<tr id="row'+jsonData['rid']+'"><td class="row-id">'+i+'</td><td>'+jsonData['pname']+'</td><td>'+jsonData['post_type']+'</td><td>'+jsonData['rates_offered']+'</td><td>'+jsonData['qty']+'</td> <td>'+jsonData['validity']+'</td><td>'+jsonData['description']+'</td>  <td> <a class=" update-rate" href="javascript:void(0)" tag="'+jsonData['rid']+'" ><span class="badge light badge-success badge-text-size"><i class="fa fa-edit"></i></span></a><a class="delete-rate" href="javascript:void(0)" tag="'+jsonData['rid']+'" ><span class="badge light badge-danger badge-text-size"><i class="fa fa-trash"></i></span></a></td></tr>');
                     $(".row-id").each(function (i){
                                $(this).text(i+1); 
                             });
                     swal("Success", jsonData['message'], "success");
                     $('.e_description').html('');
                      $('.e_post').html('');
                      $('.nopquality').html('');
                  }
                 
                  
               }
            
         },
         cache: false,
         contentType: false,
         processData: false
      });
});


$(document).on('click', '.update-rate', function (e) {

 var id = $(this).attr('tag');
  $.ajax({
      url: base_url + 'get-ratedata',
      type: 'POST',
      data: { id: id },
      success: function (data) {
         
          var data = JSON.parse(data);
          if (data['success'] == 'true') {
               
               $('#rid').val(data['id']);
               $('#u_rates_offered').val(data['rates_offered']);
               $('#u_pname').val(data['pname']);
               $('#u_product_id').val(data['product_id']);
               $('#u_post_type').val(data['type']);
               $('#u_description').val(data['description']);
               
               if(data['type'] !=1){
                var data='<div class="row"><div class="col-6 p-2 "><label>Min Qty<span class="text-danger"> *</span></label><input type="text" name="u_qty" id="u_qty"  value="'+data['qty']+'" class="form-control" required><span class="size-7 e_qty text-danger"></span> </div><div class="col-6 p-2 "> <label>Validity</label> <input type="datetime-local" name="u_validity"  id="u_validity" class="form-control"  value="'+data['validity']+'"  required><span class="size-7 e_validity text-danger"></span> </div></div>';
                $('.postrateattributesdata').html(data);
               
             }
             else{
                 $('.postrateattributesdata').html('');
             }
             $('#updaterateModal').modal('show');
          }
          else {
              swal("Success", data['message'], "success");
          }
       }
   });
 
});




// ===========================================

$(document).on("submit", "#update_rate_form", function(e) {
   
   e.preventDefault();  
   e.stopImmediatePropagation();

   $.ajax({
         type: "POST",
         url: base_url+"update-rate",
         data: new FormData(this),
         beforeSend: function(){ 
            $('.disabled_submit').attr('disabled',true);
         },
         success: function (jsonData) {
          
            var jsonData = JSON.parse(jsonData);
            if (jsonData['error'] == true) 
               { 
                  if (jsonData['post'] !='')  { $('.e_u_post').html(jsonData['post']); } else { $('.e_u_post').html(''); }
                  if (jsonData['description'] !='')  { $('.e_u_description').html(jsonData['description']); } else { $('.e_u_description').html(''); }
                 
               }
               else
               {
                  if(jsonData['success'] == 'true')
                  {  var i = $('#job_tbale').find('tr').length;
                   
                       $('#row'+ jsonData['rid']).replaceWith('<tr id="row'+jsonData['rid']+'"><td class="row-id">'+i+'</td><td>'+jsonData['pname']+'</td><td>'+jsonData['post_type']+'Rate </td><td>'+jsonData['rates_offered']+'</td><td>'+jsonData['qty']+'</td> <td>'+jsonData['validity']+'</td> <td>'+jsonData['description']+'</td>  <td> <a class=" update-rate" href="javascript:void(0)" tag="'+jsonData['rid']+'" ><span class="badge light badge-success badge-text-size"><i class="fa fa-edit"></i></span></a><a class="delete-rate" href="javascript:void(0)" tag="'+jsonData['rid']+'" ><span class="badge light badge-danger badge-text-size"><i class="fa fa-trash"></i></span></a></td></tr>');
                             
                     $(".row-id").each(function (i){
                                $(this).text(i+1); 
                             });
                    
                     $('#update_job_form').trigger('reset');
                     $('.close').trigger('click');
                     
                     swal("Success", jsonData['message'], "success");
                     $('.e_u_description').html('');
                     $('.e_u_post').html('');
                     $('.nopcat').html('');
                     
                  }
                 
                  
               }
           $('.disabled_submit').attr('disabled', false);
            
         },
         cache: false,
         contentType: false,
         processData: false
      });
});


$(document).on('keyup', '.find-product1', function(){
  
    word   = $(this).val() || ''; 
    
    
    if(word !=''){
    $('#u_product_id').val('');
     FindProduct1(word);
  }
  else{
  $('.suggestionAra.product1').html('');
  }
     
})

function FindProduct1(word='')
{ 
    $.post(base_url+'get-searchproducts', {search:word}, function(data){ 
      if(data){
        arr = JSON.parse(data);
        productdate = '';
        if(arr.success == true)
        {
            list = arr.list;
            productdate = '<ul>';
            for(ii in list)
            { 
                productdate+= '<li class="selThisCnItem p_detail1" tag="'+list[ii].id+'" name="'+list[ii].product_name+'" maxqty="'+list[ii].minimum_stock+'" uom= "'+list[ii].uom+'">'+list[ii].product_name+' <br></li>';
            }
            productdate+= '</ul>';
        }
        else{
            productdate+= '<ul><li class="selThisCnItem " >No Data</li></ul>';
        } 
         $('.suggestionAra.product1').html(productdate);
         $('#product_id').val('');
      }
    })
}

$(document).on("click", ".p_detail1", function(e) {
   var id           = $(this).attr('tag');
   var name           = $(this).attr('name');
   var maxqty           = $(this).attr('maxqty');
   var tag           = $(this).attr('producttag');
   var uom           = $(this).attr('uom');
   
   $('#u_product_id').val(id);
   $('.find-product1').val(name);
   $('.puom').text('( in '+uom+')');
   $('.suggestionAra.product1').html('');

});




$(document).on('click', '.delete-rate', function (e) {
    e.preventDefault();
    e.stopImmediatePropagation();
      swal({ title: "Are You Sure !!", 
        text: "You want to delete this Rates Posted!!", 
        type: "info", 
        showCancelButton: !0, 
        closeOnConfirm: !1, 
        showLoaderOnConfirm: !0 }).then((result)=> 
         {
          if (result.value) { 
            var id = $(this).attr('tag');
         
                 $.ajax({
                     url: base_url + 'delete-rate',
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
                             swal("Error", data['message'], "error");
                         }
            }
        });
     }
    

     })
     
});


$(document).on("submit", "#add_labservice_form", function(e) {
   e.preventDefault();  
   e.stopImmediatePropagation();
    
 
   $.ajax({
         type: "POST",
         url: base_url+"submit-labservice",
         data: new FormData(this),
        
         success: function (jsonData) {
            
            var jsonData = JSON.parse(jsonData);
            if (jsonData['error'] == true) 
               {
                  if (jsonData['title'] !='')  { $('.e_title').html(jsonData['title']); } else { $('.e_title').html(''); }
                  if (jsonData['description'] !='')  { $('.e_description').html(jsonData['description']); } else { $('.e_description').html(''); }
                 
               }
               else
               {

                  if(jsonData['success'] == 'true')
                  { 
                     var i = $('#labservice_table').find('tr').length;
                     
                     $('#add_labservice_form').trigger('reset');
                     $('.close').trigger('click');
                     $('.tabledata').prepend('<tr id="row'+jsonData['lid']+'"><td class="row-id">'+i+'</td><td>'+jsonData['title']+'</td><td>'+jsonData['description']+'</td> <td> <a class=" update-labservice" href="javascript:void(0)" tag="'+jsonData['lid']+'" ><span class="badge light badge-success badge-text-size"><i class="fa fa-edit"></i></span></a><a class="delete-labservice" href="javascript:void(0)" tag="'+jsonData['lid']+'" ><span class="badge light badge-danger badge-text-size"><i class="fa fa-trash"></i></span></a></td></tr>');
                     $(".row-id").each(function (i){
                                $(this).text(i+1); 
                             });
                     swal("Success", jsonData['message'], "success");
                     $('.e_description').html('');
                      $('.e_title').html('');
                     
                  }
                 
                  
               }
            
         },
         cache: false,
         contentType: false,
         processData: false
      });
});


$(document).on('click', '.update-labservice', function (e) {

 var id = $(this).attr('tag');
  $.ajax({
      url: base_url + 'get-labservicedata',
      type: 'POST',
      data: { id: id },
      success: function (data) {
         
          var data = JSON.parse(data);
          if (data['success'] == 'true') {

               $('#lid').val(id);
               $('#u_title').val(data['title']);
               $('#u_description').html(data['description']);
               $('#updatelabserviceModal').modal('show');

          }
          else {
              swal("Success", data['message'], "success");
          }
       }
   });
 
});


// ===========================================

$(document).on("submit", "#update_labservice_form", function(e) {
   e.preventDefault();  
   e.stopImmediatePropagation();

   $.ajax({
         type: "POST",
         url: base_url+"update-labservice",
         data: new FormData(this),
         beforeSend: function(){ 
            $('.disabled_submit').attr('disabled',true);
         },
         success: function (jsonData) {
          // alert(jsonData);
            var jsonData = JSON.parse(jsonData);
            if (jsonData['error'] == true) 
               { 
                  if (jsonData['title'] !='')  { $('.e_u_title').html(jsonData['title']); } else { $('.e_u_title').html(''); }
                  if (jsonData['description'] !='')  { $('.e_u_description').html(jsonData['description']); } else { $('.e_u_description').html(''); }
                 
               }
               else
               {
                  if(jsonData['success'] == 'true')
                  {  var i = $('#labservice_tbale').find('tr').length;
                   
                     $('#row'+ jsonData['lid']).replaceWith('<tr id="row'+jsonData['lid']+'" ><td class="row-id" >'+i+'</td><td>'+jsonData['title']+'</td><td>'+jsonData['description']+'</td> <td> <a class=" update-labservice" tag="'+jsonData['lid']+'" href="javascript:void(0)" ><span class="badge light badge-success badge-text-size"><i class="fa fa-edit"></i></span></a><a class="delete-labservice" tag="'+jsonData['lid']+'" href="javascript:void(0)" ><span class="badge light badge-danger badge-text-size"><i class="fa fa-trash"></i></span></a></td></tr>');
                             
                     $(".row-id").each(function (i){
                                $(this).text(i+1); 
                             });
                    
                     $('#update_labservice_form').trigger('reset');
                     $('.close').trigger('click');
                     
                     swal("Success", jsonData['message'], "success");
                     $('.e_u_description').html('');
                     $('.e_u_title').html('');
                     $('.nopcat').html('');
                     
                  }
                 
                  
               }
           $('.disabled_submit').attr('disabled', false);
            
         },
         cache: false,
         contentType: false,
         processData: false
      });
});

$(document).on('click', '.delete-labservice', function (e) {
    e.preventDefault();
    e.stopImmediatePropagation();
      swal({ title: "Are You Sure !!", 
        text: "You want to delete this lab service!!", 
        type: "info", 
        showCancelButton: !0, 
        closeOnConfirm: !1, 
        showLoaderOnConfirm: !0 }).then((result)=> 
         {
          if (result.value) { 
            var id = $(this).attr('tag');
         
                 $.ajax({
                     url: base_url + 'delete-labservice',
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
                             swal("Error", data['message'], "error");
                         }
            }
        });
     }
    

     })
     
});



$(document).on('click', '.book-labservice', function (e) {

 var id = $(this).attr('tag');
 var title = $(this).attr('labname');
   $('#blid').val(id);
   $('.btitle').html(title);
   $('#booklabserviceModal').modal('show');
   $('.date-class').addClass('datepicker-default');
});


$(document).on("submit", "#book_labservice_form", function(e) {
   e.preventDefault();  
   e.stopImmediatePropagation();
    
 
   $.ajax({
         type: "POST",
         url: base_url+"book-labservice",
         data: new FormData(this),
        
         success: function (jsonData) {
            
            var jsonData = JSON.parse(jsonData);
            if (jsonData['error'] == true) 
               {
                  if (jsonData['booking_date'] !='')  { $('.e_booking_date').html(jsonData['booking_date']); } else { $('.e_booking_date').html(''); }
                  
               }
               else
               {

                  if(jsonData['success'] == 'true')
                  { 
                     
                     
                     $('#add_job_form').trigger('reset');
                     $('.close').trigger('click');
                     
                     swal("Success", jsonData['message'], "success");
                    
                    
                  }
                 
                  
               }
            
         },
         cache: false,
         contentType: false,
         processData: false
      });
});

$(document).on('click', '.cancel-labservice', function (e) {
    e.preventDefault();
    e.stopImmediatePropagation();
      swal({ title: "Are You Sure !!", 
        text: "You want to Cancel this lab service Booking!!", 
        type: "info", 
        showCancelButton: !0, 
        closeOnConfirm: !1, 
        showLoaderOnConfirm: !0 }).then((result)=> 
         {
          if (result.value) { 
            var id = $(this).attr('tag');
         
                 $.ajax({
                     url: base_url + 'cancel-labservice',
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
                             swal("Error", data['message'], "error");
                         }
            }
        });
     }
    

     })
     
});


$(document).on('click', '.confirm-labservice', function (e) {
    e.preventDefault();
    e.stopImmediatePropagation();
      swal({ title: "Are You Sure !!", 
        text: "You want to confirm this lab service Booking!!", 
        type: "info", 
        showCancelButton: !0, 
        closeOnConfirm: !1, 
        showLoaderOnConfirm: !0 }).then((result)=> 
         {
          if (result.value) { 
            var id = $(this).attr('tag');
         
                 $.ajax({
                     url: base_url + 'confirm-labservice',
                     type: 'POST',
                     data: { id: id },
                     success: function (data) {
                         
                         var data = JSON.parse(data);
                         if (data['success'] == 'true') {
                             
                            swal("Success", data['message'], "success");
                            location.reload();
                         }
                         else {
                             swal("Error", data['message'], "error");
                         }
            }
        });
     }
    

     })
     
});


$(document).on("change", "#post_type", function(e) {
 var tag = $(this).val();
 if(tag!=1){
    var data='<div class="row"><div class="col-6 p-2 "><label>Min Qty<span class="text-danger"> *</span></label><input type="text" name="qty" class="form-control" required><span class="size-7 e_qty text-danger"></span> </div><div class="col-6 p-2 "> <label>Validity</label> <input type="datetime-local" name="validity" class="form-control" required><span class="size-7 e_validity text-danger"></span> </div></div>';
    $('.postrateattributesdata').html(data);
 }
 else{
     $('.postrateattributesdata').html('');
 }
});


















