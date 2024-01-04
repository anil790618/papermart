// ===========================================


$(document).on("submit", "#add_product_form", function(e) {

   e.preventDefault();  
   e.stopImmediatePropagation();
 
   $.ajax({
         type: "POST",
         url: base_url+"submit-product",
         data: new FormData(this),
        
         success: function (jsonData) {
            // alert(jsonData);
            var jsonData = JSON.parse(jsonData);
            if (jsonData['error'] == true) 
               {
                  if (jsonData['product_name'] !='') 
                  {
                     $('.e_product_name').html(jsonData['product_name']);
                  }
                  else
                  {
                     $('.e_product_name').html('');
                  }
                  if (jsonData['product_type'] !='')  
                  {
                     $('.e_product_type').html(jsonData['product_type']);
                  }
                  else
                  {
                     $('.e_product_type').html('');
                  }

                  if (jsonData['product_category'] !='')  
                  {
                     $('.e_product_category').html(jsonData['product_category']);
                  }
                  else
                  {
                     $('.e_product_category').html('');
                  }
               }
               else
               {
                  if(jsonData['success'] == 'true')
                  { 
                     var i = $('#producttype_tbale').find('tr').length;
                     
                     $('#add_product_form').trigger('reset');
                     swal("Success", jsonData['message'], "success");
                     $('.e_product_name').html('');
                     $('.e_product_type').html('');
                     $('.e_product_category').html('');
                  }
                 
                  
               }
            
         },
         cache: false,
         contentType: false,
         processData: false
      });
});




$(document).on("submit", "#add_productType_form", function(e) {
   e.preventDefault();  
   e.stopImmediatePropagation();
 
   $.ajax({
         type: "POST",
         url: base_url+"submit-productType",
         data: new FormData(this),
        
         success: function (jsonData) {
            // alert(jsonData);
            var jsonData = JSON.parse(jsonData);
            if (jsonData['error'] == true) 
               {
                  if (jsonData['product_type'] !='') 
                  {
                     $('#product_type').siblings(".wizard-form-error").slideDown();
                     $('.e_product_type').html(jsonData['product_type']);
                  }
                  else
                  {
                     $('#product_type').siblings(".wizard-form-error").slideUp();
                     $('.e_product_type').html('');
                  }
                  if (jsonData['product_description'] !='')  
                  {
                     $('#product_description').siblings(".wizard-form-error").slideDown();
                     $('.e_product_description').html(jsonData['product_description']);
                  }
                  else
                  {
                     $('#product_description').siblings(".wizard-form-error").slideUp();
                     $('.e_product_description').html('');
                  }
                 
               }
               else
               {
                  if(jsonData['success'] == 'true')
                  { 
                     var i = $('#producttype_tbale').find('tr').length;
                     
                     $('#add_productType_form').trigger('reset');
                     $('.close').trigger('click');
                     $('.tabledata').prepend('<tr><td class="row-id">'+i+'</td><td>'+jsonData['type']+'</td><td>'+jsonData['desc']+'</td> <td> <a class=" update_productType" href="javascript:void(0)" ><span class="badge light badge-success badge-text-size"><i class="fa fa-edit"></i></span></a><a class="view_productType" href="javascript:void(0)" ><span class="badge light badge-warning badge-text-size"><i class="fa fa-eye"></i></span></a><a class="delete_productType" href="javascript:void(0)" ><span class="badge light badge-danger badge-text-size"><i class="fa fa-trash"></i></span></a></td></tr>');
                     swal("Success", jsonData['message'], "success");
                     $('.e_product_description').html('');
                      $('.e_product_type').html('');
                      $('.noptype').html('');
                      $(".row-id").each(function (i){
                        
                                $(this).text(i+1); 
                             });
                  }
                 
                  
               }
            
         },
         cache: false,
         contentType: false,
         processData: false
      });
});

// ===========================================

$(document).on("submit", "#add_productCategory_form", function(e) {
   e.preventDefault();  
   e.stopImmediatePropagation();

   $.ajax({
         type: "POST",
         url: base_url+"submit-productCategory",
         data: new FormData(this),
         beforeSend: function(){ 
            $('.disabled_submit').attr('disabled',true);
         },
         success: function (jsonData) {
          
            var jsonData = JSON.parse(jsonData);
            if (jsonData['error'] == true) 
               { 
                  if (jsonData['product_category'] !='') 
                  {

                     $('#product_category').siblings(".wizard-form-error").slideDown();
                     $('.e_product_category').html(jsonData['product_category']);
                  }
                  else
                  {
                     $('#product_category').siblings(".wizard-form-error").slideUp();
                     $('.e_product_category').html('');
                  }
                  if (jsonData['product_description'] !='')  
                  {
                     $('#product_description').siblings(".wizard-form-error").slideDown();
                     $('.e_product_description').html(jsonData['product_description']);
                  }
                  else
                  {
                     $('#product_description').siblings(".wizard-form-error").slideUp();
                     $('.e_product_description').html('');
                  }
                 
               }
               else
               {
                  if(jsonData['success'] == 'true')
                  { 
                     var i = $('#productcat_tbale').find('tr').length;
                     
                     $('#add_productCategory_form').trigger('reset');
                     $('.close').trigger('click');
                     $('.tabledatacat').prepend('<tr id="row'+jsonData['cid']+'" ><td class="row-id" >'+i+'</td><td class="view-subcat" tag = "'+jsonData['cid']+'">'+jsonData['type']+'</td><td>'+jsonData['desc']+'</td> <td> <a class=" update-productCategory" tag="'+jsonData['cid']+'" href="javascript:void(0)" ><span class="badge light badge-success badge-text-size"><i class="fa fa-edit"></i></span></a><a class="delete-productCategory" tag="'+jsonData['cid']+'" href="javascript:void(0)" ><span class="badge light badge-danger badge-text-size"><i class="fa fa-trash"></i></span></a></td></tr>');
                     swal("Success", jsonData['message'], "success");
                     $('.e_product_description').html('');
                     $('.e_product_category').html('');
                     $(".row-id").each(function (i){
                        
                                $(this).text(i+1); 
                             });
                  }
                 
                  
               }
           $('.disabled_submit').attr('disabled', false);
            
         },
         cache: false,
         contentType: false,
         processData: false
      });
});


$(document).on("submit", "#add_productQuality_form", function(e) {
   e.preventDefault();  
   e.stopImmediatePropagation();
    
 
   $.ajax({
         type: "POST",
         url: base_url+"submit-productQuality",
         data: new FormData(this),
        
         success: function (jsonData) {
            
            var jsonData = JSON.parse(jsonData);
            if (jsonData['error'] == true) 
               {
                  if (jsonData['product_quality'] !='') 
                  {
                     $('#product_quality').siblings(".wizard-form-error").slideDown();
                     $('.e_product_quality').html(jsonData['product_quality']);
                  }
                  else
                  {
                     $('#product_quality').siblings(".wizard-form-error").slideUp();
                     $('.e_product_quality').html('');
                  }
                  if (jsonData['product_description'] !='')  
                  {
                     $('#product_description').siblings(".wizard-form-error").slideDown();
                     $('.e_product_description').html(jsonData['product_description']);
                  }
                  else
                  {
                     $('#product_description').siblings(".wizard-form-error").slideUp();
                     $('.e_product_description').html('');
                  }
                 
               }
               else
               {
                  if(jsonData['success'] == 'true')
                  { 
                     var i = $('#productQuality_table').find('tr').length;
                     
                     $('#add_productQuality_form').trigger('reset');
                     $('.close').trigger('click');
                     $('.tabledata').prepend('<tr><td class="row-id">'+i+'</td><td>'+jsonData['type']+'</td><td>'+jsonData['desc']+'</td> <td> <a class=" update_productQuality" tag="'+jsonData['id']+'" href="javascript:void(0)" ><span class="badge light badge-success badge-text-size"><i class="fa fa-edit"></i></span></a><a class="delete_productQuality" tag="'+jsonData['id']+'" href="javascript:void(0)" ><span class="badge light badge-danger badge-text-size"><i class="fa fa-trash"></i></span></a></td></tr>');
                     $(".row-id").each(function (i){
                                $(this).text(i+1); 
                             });
                     swal("Success", jsonData['message'], "success");
                     $('.e_product_description').html('');
                      $('.e_product_type').html('');
                      $('.nopquality').html('');
                  }
                 
                  
               }
            
         },
         cache: false,
         contentType: false,
         processData: false
      });
});

// ===========================================


$(document).on("submit", "#update_product_form", function(e) {
   e.preventDefault();  
   e.stopImmediatePropagation();
 
   $.ajax({
         type: "POST",
         url: base_url+"update-product",
         data: new FormData(this),
        
         success: function (jsonData) {
            
            var jsonData = JSON.parse(jsonData);
            if (jsonData['error'] == true) 
               {
                  if (jsonData['product_name'] !='') 
                  {
                     $('#product_name').siblings(".wizard-form-error").slideDown();
                     $('.e_product_name').html(jsonData['product_name']);
                  }
                  else
                  {
                     $('#product_name').siblings(".wizard-form-error").slideUp();
                     $('.e_product_name').html('');
                  }
                  if (jsonData['hsncode'] !='')  
                  {
                     $('#hsncode').siblings(".wizard-form-error").slideDown();
                     $('.e_hsncode').html(jsonData['hsncode']);
                  }
                  else
                  {
                     $('#hsncode').siblings(".wizard-form-error").slideUp();
                     $('.e_hsncode').html('');
                  }

                  if (jsonData['product_type'] !='')  
                  {
                     $('#product_type').siblings(".wizard-form-error").slideDown();
                     $('.e_product_type').html(jsonData['product_type']);
                  }
                  else
                  {
                     $('#product_type').siblings(".wizard-form-error").slideUp();
                     $('.e_product_type').html('');
                  }

                  if (jsonData['product_category'] !='')  
                  {
                     $('#product_category').siblings(".wizard-form-error").slideDown();
                     $('.e_product_category').html(jsonData['product_category']);
                  }
                  else
                  {
                     $('#product_category').siblings(".wizard-form-error").slideUp();
                     $('.e_product_category').html('');
                  }

                  if (jsonData['size'] !='')  
                  {
                     $('#size').siblings(".wizard-form-error").slideDown();
                     $('.e_size').html(jsonData['size']);
                  }
                  else
                  {
                     $('#size').siblings(".wizard-form-error").slideUp();
                     $('.e_size').html('');
                  }

                  if (jsonData['uom'] !='')  
                  {
                     $('#uom').siblings(".wizard-form-error").slideDown();
                     $('.e_uom').html(jsonData['uom']);
                  }
                  else
                  {
                     $('#uom').siblings(".wizard-form-error").slideUp();
                     $('.e_uom').html('');
                  }

                  if (jsonData['purchase_price'] !='')  
                  {
                     $('#purchase_price').siblings(".wizard-form-error").slideDown();
                     $('.e_purchase_price').html(jsonData['purchase_price']);
                  }
                  else
                  {
                     $('#purchase_price').siblings(".wizard-form-error").slideUp();
                     $('.e_purchase_price').html('');
                  }

                  if (jsonData['sale_price'] !='')  
                  {
                     $('#sale_price').siblings(".wizard-form-error").slideDown();
                     $('.e_sale_price').html(jsonData['sale_price']);
                  }
                  else
                  {
                     $('#sale_price').siblings(".wizard-form-error").slideUp();
                     $('.e_sale_price').html('');
                  }
                 
                  if (jsonData['minimum_stock'] !='')  
                  {
                     $('#minimum_stock').siblings(".wizard-form-error").slideDown();
                     $('.e_minimum_stock').html(jsonData['minimum_stock']);
                  }
                  else
                  {
                     $('#minimum_stock').siblings(".wizard-form-error").slideUp();
                     $('.e_minimum_stock').html('');
                  }
                 
                  if (jsonData['maximum_stock'] !='')  
                  {
                     $('#maximum_stock').siblings(".wizard-form-error").slideDown();
                     $('.e_maximum_stock').html(jsonData['maximum_stock']);
                  }
                  else
                  {
                     $('#maximum_stock').siblings(".wizard-form-error").slideUp();
                     $('.e_maximum_stock').html('');
                  }
                 
                 
               }
               else
               {
                  if(jsonData['success'] == 'true')
                  { 
                    
                     swal("Success", jsonData['message'], "success");
                     $('.e_product_name').html('');
                     $('.e_hsncode').html('');
                     $('.e_product_type').html('');
                     $('.e_product_category').html('');
                     $('.e_size').html('');
                     $('.e_uom').html('');
                     $('.e_purchase_price').html('');
                     $('.e_sale_price').html('');
                     $('.e_minimum_stock').html('');
                     $('.e_maximum_stock').html('');
                     
                  }
                 
                  
               }
            
         },
         cache: false,
         contentType: false,
         processData: false
      });
});

$(document).on('click', '.deleteProduct', function (e) {
    e.preventDefault();
    e.stopImmediatePropagation();
      swal({ title: "Are You Sure !!", 
        text: "You want to delete this product !!", 
        type: "info", 
        showCancelButton: !0, 
        closeOnConfirm: !1, 
        showLoaderOnConfirm: !0 }).then((result)=> 
         {
          if (result.value) { 
            var id = $(this).attr('tag');
         
                 $.ajax({
                     url: base_url + 'delete-product',
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
     // else{
     //   swal({ title: "Error", text: "Deleting Product Cancelled", timer: 2e3, showConfirmButton: !1 })
     // }

     })
     
});

$(document).on('click', '.update-productCategory', function (e) {

 var id = $(this).attr('tag');
  $.ajax({
      url: base_url + 'get-pcat',
      type: 'POST',
      data: { id: id },
      success: function (data) {
          $('#update_productCategory_form').trigger('reset');
          var data = JSON.parse(data);
          if (data['success'] == 'true') {

               $('#pcatid').val(id);
               $('#u_product_category').val(data['name']);
               $('#u_product_description').val(data['description']);
               if(data['default'] == 1)
               { 
                  $('#u_default_category').prop('checked', true);
               } 
               else{
                  $('#u_default_category').prop('checked', false);
               }

               const buyUser = data['buy_user'].split(",");
               for(var i = 0; i < buyUser.length; i++) {
       
                  buyUser[i] = buyUser[i].replace(/^\s*/, "").replace(/\s*$/, "");
                   $("input[name='buy_user[]'][value='"+buyUser[i]+"']").prop('checked', true);
                 
               }
               
               const saleUser = data['sale_user'].split(",");
               for(var i = 0; i < saleUser.length; i++) {
       
                  saleUser[i] = saleUser[i].replace(/^\s*/, "").replace(/\s*$/, "");
                   $("input[name='sale_user[]'][value='"+saleUser[i]+"']").prop('checked', true);
                 
               }
               const productSpec = data['product_specification'].split(",");
               for(var i = 0; i < productSpec.length; i++) {
       
                  productSpec[i] = productSpec[i].replace(/^\s*/, "").replace(/\s*$/, "");
                   $("input[name='product_specification[]'][value='"+productSpec[i]+"']").prop('checked', true);
                 
               }

               const productReq = data['required'].split(",");
               for(var i = 0; i < productReq.length; i++) {
       
                  productReq[i] = productReq[i].replace(/^\s*/, "").replace(/\s*$/, "");
                   $("input[name='required[]'][value='"+productReq[i]+"']").prop('checked', true);
                 
               }

               const pfilled = data['pre_filled'].split(",");
               for(var i = 0; i < pfilled.length; i++) {
       
                  pfilled[i] = pfilled[i].replace(/^\s*/, "").replace(/\s*$/, "");
                   $("input[name='prefilled[]'][value='"+pfilled[i]+"']").prop('checked', true);
                 
               }
                

               $('#updateproductCategoryModal').modal('show');
          }
          else {
              swal("Success", data['message'], "success");
          }
       }
   });
 
});

$(document).on('click', '.edit-subCategory', function (e) {
$('.close').trigger('click');
 var id = $(this).attr('tag');
  $.ajax({
      url: base_url + 'get-pcat',
      type: 'POST',
      data: { id: id },
      success: function (data) {
          
          var data = JSON.parse(data);
          if (data['success'] == 'true') {
           
               $('#subcatid').val(id);
               $('#subcatname').val(data['name']);
               $('#sub_product_description').val(data['description']);
               $('#subcatparent_id').val(data['parentid']);
               var pspecification = data['parent_specification'];
               var specification = data['product_specification'];
               var req = data['required'];
               var prefill = data['pre_filled'];
               var otherdata='';
               var str_array = pspecification.split(',');

              for(var i = 0; i < str_array.length; i++) {
       
               str_array[i] = str_array[i].replace(/^\s*/, "").replace(/\s*$/, "");
               
               var catspecification = specification.indexOf(str_array[i]) != -1; // true
               if(catspecification == true){ var cspecification = 'checked';} else { var cspecification = '';}

               var required = req.indexOf(str_array[i]) != -1; // true
               if(required == true){ var reqs = 'checked';} else { var reqs = '';}

               var prefilled = prefill.indexOf(str_array[i]) != -1; // true
               if(prefilled == true){ var prefills = 'checked';} else { var prefills = '';}

               otherdata+='<tr><td class="p-0">'+str_array[i].replace(/_/g," ")+'</td> <td class="p-0"> <input type="checkbox" value="'+str_array[i]+'"  name="product_specification[]" class="mr-3" '+cspecification+'> </td> <td class="p-0"> <input type="checkbox" value="'+str_array[i]+'"  name="required[]" class="mr-3" '+reqs+'> </td><td class="p-0"> <input type="checkbox" value="'+str_array[i]+'"  name="prefilled[]" class="mr-3" '+prefills+'> </td> </tr>';
               }
                
               $('.subcat_specification').html(otherdata);
               $('#editSubCategoryModal').modal('show');
          }
          else {
              swal("Success", data['message'], "success");
          }
       }
   });
 
});


$(document).on('click', '.update_productQuality', function (e) {

 var id = $(this).attr('tag');
  $.ajax({
      url: base_url + 'get-pquality',
      type: 'POST',
      data: { id: id },
      success: function (data) {
         
          var data = JSON.parse(data);
          if (data['success'] == 'true') {

               $('#pqualityid').val(id);
               $('#u_product_quality').val(data['name']);
               $('#u_product_description').val(data['description']);
               $('#product_category  option[value="'+data['category']+'"]').prop("selected", true);
              
               $('#updateproductQualityModal').modal('show');
          }
          else {
              swal("Success", data['message'], "success");
          }
       }
   });
 
});


// ===========================================

$(document).on("submit", "#update_productCategory_form", function(e) {
   e.preventDefault();  
   e.stopImmediatePropagation();

   $.ajax({
         type: "POST",
         url: base_url+"update-productCategory",
         data: new FormData(this),
         beforeSend: function(){ 
            $('.disabled_submit').attr('disabled',true);
         },
         success: function (jsonData) {
          // alert(jsonData);
            var jsonData = JSON.parse(jsonData);
            if (jsonData['error'] == true) 
               { 
                  if (jsonData['u_product_category'] !='') 
                  {

                     $('#u_product_category').siblings(".wizard-form-error").slideDown();
                     $('.e_u_product_category').html(jsonData['u_product_category']);
                  }
                  else
                  {
                     $('#u_product_category').siblings(".wizard-form-error").slideUp();
                     $('.e_u_product_category').html('');
                  }
                  if (jsonData['u_product_description'] !='')  
                  {
                     $('#u_product_description').siblings(".wizard-form-error").slideDown();
                     $('.e_u_product_description').html(jsonData['u_product_description']);
                  }
                  else
                  {
                     $('#u_product_description').siblings(".wizard-form-error").slideUp();
                     $('.e_u_product_description').html('');
                  }
                 
               }
               else
               {
                  if(jsonData['success'] == 'true')
                  {  
                             
                     $('.productcat'+jsonData['cid']).html(jsonData['type']);
                     
                    
                     $('.close').trigger('click');
                     
                     swal("Success", jsonData['message'], "success");
                     $('.e_u_product_description').html('');
                     $('.e_u_product_category').html('');
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

// ===========================================

$(document).on("submit", "#update_productQuality_form", function(e) {
    e.preventDefault();  
   e.stopImmediatePropagation();

   $.ajax({
         type: "POST",
         url: base_url+"update-productQuality",
         data: new FormData(this),
         beforeSend: function(){ 
            $('.disabled_submit').attr('disabled',true);
         },
         success: function (jsonData) {
           //alert(jsonData);
            var jsonData = JSON.parse(jsonData);
            if (jsonData['error'] == true) 
               { 
                  if (jsonData['u_product_category'] !='') 
                  {

                     $('#u_product_category').siblings(".wizard-form-error").slideDown();
                     $('.e_u_product_category').html(jsonData['u_product_category']);
                  }
                  else
                  {
                     $('#u_product_category').siblings(".wizard-form-error").slideUp();
                     $('.e_u_product_category').html('');
                  }
                  if (jsonData['u_product_description'] !='')  
                  {
                     $('#u_product_description').siblings(".wizard-form-error").slideDown();
                     $('.e_u_product_description').html(jsonData['u_product_description']);
                  }
                  else
                  {
                     $('#u_product_description').siblings(".wizard-form-error").slideUp();
                     $('.e_u_product_description').html('');
                  }
                 
               }
               else
               {
                  if(jsonData['success'] == 'true')
                  {  var i = $('#productQuality_table').find('tr').length;
                    
                     $('#row' + jsonData['cid']).replaceWith('<tr id="row'+jsonData['cid']+'" ><td class="row-id" >'+i+'</td><td>'+jsonData['type']+'</td><td>'+jsonData['desc']+'</td> <td> <a class=" update_productQuality" tag="'+jsonData['cid']+'" href="javascript:void(0)" ><span class="badge light badge-success badge-text-size"><i class="fa fa-edit"></i></span></a><a class="delete_productQuality" tag="'+jsonData['cid']+'" href="javascript:void(0)" ><span class="badge light badge-danger badge-text-size"><i class="fa fa-trash"></i></span></a></td></tr>');
                             
                     $(".row-id").each(function (i){
                                $(this).text(i+1); 
                             });
                    
                    
                     $('.close').trigger('click');
                     
                     swal("Success", jsonData['message'], "success");
                     $('.e_u_product_description').html('');
                     $('.e_u_product_category').html('');
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


$(document).on('click', '.delete-productCategory', function (e) {
    e.preventDefault();
    e.stopImmediatePropagation();
      swal({ title: "Are You Sure !!", 
        text: "You want to delete this product Category!!", 
        type: "info", 
        showCancelButton: !0, 
        closeOnConfirm: !1, 
        showLoaderOnConfirm: !0 }).then((result)=> 
         {
          if (result.value) { 
            var id = $(this).attr('tag');
         
                 $.ajax({
                     url: base_url + 'delete-productcategory',
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

                             $('.close').trigger('click');
                            swal("Success", data['message'], "success");

                         }
                         else {
                             swal("Success", data['message'], "error");
                         }
            }
        });
     }
     else{
       swal({ title: "Error", text: "Deleting Product Cancelled", timer: 2e3, showConfirmButton: !1 })
     }

     })
     
});

$(document).on('change', '#product_category', function (e) {
  // debugger;
   var a = $(this).val();

  // $("#product_category option[attr='"+a+"']"). remove();
   var subcatarray = $('#subcatarray').val();
   arr = JSON.parse(subcatarray);
   var otherdata = '<option value="" selected>Choose...</option>';
   for(ii in arr)
   { 
      if(arr[ii].parentid == a ){
       otherdata+= '<option value="'+arr[ii].id+'" parent="'+arr[ii].parentid+'">'+arr[ii].product_category+'</option>';
      }
     
   }

   $('#subcategory').html(otherdata);
   getproductspecification(a);
});

$(document).on('change', '#subcategory', function (e) {
   var catname = $("#subcategory").find(':selected').attr('parent');
   $('#product_category').val(catname);
   var a = $(this).val();
   getproductspecification(a);

});

$(document).on('click', '.add-subcat', function (e) {
   
   var i = $('#subcat_tbale').find('tr').length;
   $('.subcatdata').append('<tr class="row'+i+'"><td class="row-id">'+i+'</td> <td> <input type="text" name="subactname[]" class="form-control"> </td> <td> <a class="cancel-subcat text-danger" tag="'+i+'"><i class="fa fa-close"></i></a></td> </tr>');

});

function getproductspecification(id='')
{     $.post(base_url+'get-qualityspec', {id:id}, function(data){ 
      if(data){
      
        var cat  = $("#product_category option:selected").text();
        arr = JSON.parse(data);
        cdata = '';
        if(arr.success == true)
        {
            list = arr.list;
            specification = arr.specification;
            filled = arr.filled;
            if(filled == ''){
                var str_array = specification.split(',');
            }
            else{
                var str_array = filled.split(',');
            }
            
            var otherdata = '';
            var sarray='';
            for(var i = 0; i < str_array.length; i++) {
             
               
               str_array[i] = str_array[i].replace(/^\s*/, "").replace(/\s*$/, "");
                
               if(str_array[i] == 'quantity_uom') {
                     otherdata+='';
                 } 
               else if(str_array[i] == 'quantity') {
                     otherdata+='';
                 }
               else if(str_array[i] == 'quantity_type') {
                     otherdata+='';
                 }
               else if(str_array[i] == 'sub_category') {
                     otherdata+='';
                 }
               else if(str_array[i] == 'rate') {
                     otherdata+='';
                 }
               else if(str_array[i] == 'size') {
                     otherdata+='';
                 }
               else if(str_array[i] == 'size_uom') {
                     otherdata+='';
                 }
                else if(str_array[i] == 'brand_name') {
                     otherdata+='';
                 }
               else if(str_array[i] == 'pulp') {
                  
                    if(sarray != '' ) { sarray      += ',';   }
                    sarray      +=  str_array[i]; 
                  if(cat == 'Speciality  papers'){ 
                   otherdata+='<div class="form-group mb-0  col-md-3"><div class="field drop-select">  <select  class="form-control seleinput" id="'+str_array[i]+'" name="'+str_array[i]+'" > <option value="Virgin">Virgin</option><option value="Recycle">Recycle</option></select>   <label for="'+str_array[i]+'" class="selectlabel labeltext">'+str_array[i].replace(/_/g," ")+'</label></div></div>';
                    }
                  else{  otherdata+='<div class="form-group mb-0  col-md-3"><div class="field drop-select">  <select  class="form-control seleinput" id="'+str_array[i]+'" name="'+str_array[i]+'" > <option value="Virgin">Virgin</option><option value="Agro">Agro</option><option value="Recycle">Recycle</option><option value="Any">Any</option></select>   <label for="'+str_array[i]+'" class="selectlabel labeltext">'+str_array[i].replace(/_/g," ")+'</label></div></div>'; }

                   
                  }
               
               else if(str_array[i] == 'shade') {
                    if(sarray != '' ) { sarray      += ',';   }
                    sarray      +=  str_array[i]; 
                     otherdata+='<div class="form-group mb-0  col-md-3"><div class="field drop-select">  <select  class="form-control seleinput" id="'+str_array[i]+'" name="'+str_array[i]+'" > <option value="White">White</option><option value="Offwhite">Offwhite</option><option value="NS">NS</option><option value="GY">GY</option></select>   <label for="'+str_array[i]+'" class="selectlabel labeltext">'+str_array[i].replace(/_/g," ")+'</label></div></div>';
               }
               else if(str_array[i] == 'ss_nss') {
                    if(sarray != '' ) { sarray      += ',';   }
                    sarray      +=  str_array[i]; 
                     otherdata+='<div class="form-group mb-0  col-md-3"><div class="field drop-select">  <select  class="form-control seleinput" id="'+str_array[i]+'" name="'+str_array[i]+'" > <option value="SS">SS</option><option value="NSS">NSS</option></select><label for="'+str_array[i]+'" class="selectlabel labeltext">'+str_array[i].replace(/_/g," ")+'</label></div></div>';
               }
               else if(str_array[i] == 'tear') {
                    if(sarray != '' ) { sarray      += ',';   }
                    sarray      +=  str_array[i]; 
                     otherdata+='<div class="form-group mb-0  col-md-3"><div class="field drop-select">  <select  class="form-control seleinput" id="'+str_array[i]+'" name="'+str_array[i]+'" > <option value="MD">MD</option><option value="CD">CD</option></select><label for="'+str_array[i]+'" class="selectlabel labeltext">'+str_array[i].replace(/_/g," ")+'</label></div></div>';
               }
               else if(str_array[i] == 'coating') {
                    if(sarray != '' ) { sarray      += ',';   }
                    sarray      +=  str_array[i]; 
                  if(cat == 'Paper for food packaging'){
                     otherdata+='<div class="form-group mb-0  col-md-3"><div class="field drop-select">  <select  class="form-control seleinput" id="'+str_array[i]+'" name="'+str_array[i]+'" > <option value="PE">PE</option><option value="Aqueous">Aqueous</option></select>   <label for="'+str_array[i]+'" class="selectlabel labeltext">'+str_array[i].replace(/_/g," ")+'</label></div></div>';
                  }
                  else{

                       otherdata+='<div class="form-group mb-0  col-md-3"><div class="field drop-select">  <select  class="form-control seleinput" id="'+str_array[i]+'" name="'+str_array[i]+'" > <option value="Gloss">Gloss</option><option value="Matt">Matt</option><option value="Silk">Silk</option></select>   <label for="'+str_array[i]+'" class="selectlabel labeltext">'+str_array[i].replace(/_/g," ")+'</label></div></div>';
                  }
               }
                else if(str_array[i] == 'gsm') {
                    if(sarray != '' ) { sarray      += ',';   }
                    sarray      +=  str_array[i]; 
                  if(cat == 'Photocopier Paper'){
                     otherdata+='<div class="form-group mb-0  col-md-3"><div class="field drop-select">  <select  class="form-control seleinput" id="'+str_array[i]+'" name="'+str_array[i]+'" > <option value="70">70</option><option value="75">75</option><option value="80">80</option></select>   <label for="'+str_array[i]+'" class="selectlabel labeltext">'+str_array[i].replace(/_/g," ")+'</label></div></div>';
                  }
                  else{
                       otherdata+='<div class="form-group mb-0  col-md-3"><div class="field">  <input type="text" class=" " placeholder="'+str_array[i]+'" id="'+str_array[i]+'" name="'+str_array[i]+'"  > <label for="'+str_array[i]+'" class="labeltext">'+str_array[i].replace(/_/g," ")+'</label></div></div>';
                  }
               }
               else if(str_array[i] == 'packing_per_ream') {
                    if(sarray != '' ) { sarray      += ',';   }
                    sarray      +=  str_array[i]; 
                     otherdata+='<div class="form-group mb-0  col-md-3"><div class="field drop-select">  <select  class="form-control seleinput" id="'+str_array[i]+'" name="'+str_array[i]+'" > <option value="100">100</option><option value="250">250</option><option value="500">500</option></select><label for="'+str_array[i]+'" class="selectlabel labeltext">'+str_array[i].replace(/_/g," ")+'</label></div></div>';
               }
               else if (str_array[i] == 'quality'){
                    if(sarray != '' ) { sarray      += ',';   }
                    sarray      +=  str_array[i]; 
                  otherdata+= '<div class="form-group mb-0  col-md-3"><div class="field drop-select">  <select  class="form-control seleinput" id="'+str_array[i]+'" name="'+str_array[i]+'" >';
                  if(list){
                    for(ii in list)
                     { 
                         otherdata+= '<option value="'+list[ii].product_quality+'" >'+list[ii].product_quality+'</option>';
                     } 
                  }
                  else{
                      otherdata+= '<option value="0" >No Quality is available</option>';
                  }
                  
                  otherdata+='</select><label for="'+str_array[i]+'" class="selectlabel labeltext">'+str_array[i].replace(/_/g," ")+'</label></div></div>';
               }
               else if(str_array[i] == 'product_form') { 
                    if(sarray != '' ) { sarray      += ',';   }
                    sarray      +=  str_array[i]; 
                  otherdata+='<div class="form-group mb-0  col-md-3"><div class="field drop-select">  <select  class="form-control seleinput" id="'+str_array[i]+'" name="'+str_array[i]+'" > <option value="0">Loose</option><option value="1">Compressed</option></select>   <label for="'+str_array[i]+'" class="selectlabel labeltext">'+str_array[i].replace(/_/g," ")+'</label></div></div>';}
              else{
                 if(sarray != '' ) { sarray      += ',';   }
                 sarray      +=  str_array[i]; 
               otherdata+='<div class="form-group mb-0  col-md-3"><div class="field">  <input type="text" class=" " placeholder="'+str_array[i]+'" id="'+str_array[i]+'" name="'+str_array[i]+'"  > <label for="'+str_array[i]+'" class="labeltext">'+str_array[i].replace(/_/g," ")+'</label></div></div>';
           }
       
          }
    
    otherdata+='</div></div> </div>';
    
        
       $('.product_description').html(otherdata);
       $('#specification').val(sarray);
          
        } 
      }
   })
    
}

   $(document).on('click', '.cancel-subcat', function (e) {
      var id = $(this).attr('tag');
      $('.row' + id).fadeOut(500, function () {
         $('.row' + id).remove();
        //  $(".row-id").each(function (i){
        // $(this).text(i+1); 
        //  });

      });
   });



$(document).on('click', '.view-subcat', function (e) {

 var id = $(this).attr('tag');
   $.post(base_url+'get-subcat', {id:id}, function(data){ 
      if(data){
       
        arr = JSON.parse(data);
        cdata = '';
        if(arr.success == true)
        {
            list = arr.list;
            var i = 1;
            for(ii in list)
            { 
                cdata+= '<tr ><td>'+i +'</td><td>'+list[ii].product_category+'</td><td>';
                 if( arr.user_type == '0') {   
                 cdata+= ' <a class=" edit-subCategory" href="javascript:void(0)" tag="'+list[ii].id+'"><span class="badge light badge-success badge-text-size"><i class="fa fa-edit"></i></span></a> <a class="delete-productCategory" href="javascript:void(0)" tag="'+list[ii].id+'"><span class="badge light badge-danger badge-text-size"><i class="fa fa-trash"></i></span></a>';
                                           }
                  cdata+= ' </td></tr>';
                i++;
            }
            $('.subcatbutton').css("display","");
        } 
         else{
            cdata+= '<tr ><td colspan="3">No Data</td></tr>';
             $('.subcatbutton').css('display','none');
        }
         $('.viewsubcat').html(cdata);
         $('#viewSubCategoryModal').modal('show');
      }
   })
 
});

$(document).on('click', '.add-productsubcat', function (e) {

   var id = $(this).attr('tag');
   var specification = $(this).attr('specification');
   var req = $(this).attr('req');
   var prefill = $(this).attr('prefill');
   var buy_user = $(this).attr('buy_user');
   var sale_user = $(this).attr('sale_user');

   var str_array = specification.split(',');
   var otherdata='';
   for(var i = 0; i < str_array.length; i++) {
       
      str_array[i] = str_array[i].replace(/^\s*/, "").replace(/\s*$/, "");
      
      var required = req.indexOf(str_array[i]) != -1; // true
      if(required == true){ var reqs = 'checked';} else { var reqs = '';}

      var prefilled = prefill.indexOf(str_array[i]) != -1; // true
      if(prefilled == true){ var prefills = 'checked';} else { var prefills = '';}

      otherdata+='<tr><td class="p-0">'+str_array[i].replace(/_/g," ")+'</td> <td class="p-0"> <input type="checkbox" value="'+str_array[i]+'"  name="product_specification[]" class="mr-3" checked> </td> <td class="p-0"> <input type="checkbox" value="'+str_array[i]+'"  name="required[]" class="mr-3" '+reqs+'> </td><td class="p-0"> <input type="checkbox" value="'+str_array[i]+'"  name="prefilled[]" class="mr-3" '+prefills+'> </td> </tr>';
   }

   $('.cat_specification').html(otherdata);

   $('#parent_id').val(id);
   $('#buy_user').val(buy_user);
   $('#sale_user').val(sale_user);

   $('#specification').val(specification);

   $('#req').val(req);
   $('#addSubCategoryModal').modal('show');

});


// ===========================================
// ===========================================

$(document).on("submit", "#update_subCategory_form", function(e) {
   e.preventDefault();  
   e.stopImmediatePropagation();
   
   $.ajax({
         type: "POST",
         url: base_url+"update-subCategory",
         data: new FormData(this),
         beforeSend: function(){ 
            $('.disabled_submit').attr('disabled',true);
         },
         success: function (jsonData) {
          // alert(jsonData);
            var jsonData = JSON.parse(jsonData);

                  if(jsonData['success'] == 'true')
                  {  
                    
                     $('.close').trigger('click');
                     
                     swal("Success", jsonData['message'], "success");
                    
                     
                  }
                 
                  
               
           $('.disabled_submit').attr('disabled', false);
            
         },
         cache: false,
         contentType: false,
         processData: false
      });
});

// ===========================================

$(document).on("submit", "#add_subCategory_form", function(e) {
   e.preventDefault();  
   e.stopImmediatePropagation();
   
   $.ajax({
         type: "POST",
         url: base_url+"add-subCategory",
         data: new FormData(this),
         beforeSend: function(){ 
            $('.disabled_submit').attr('disabled',true);
         },
         success: function (jsonData) {
          // alert(jsonData);
            var jsonData = JSON.parse(jsonData);
               if(jsonData['success'] == 'true')
               {  
                  $('.close').trigger('click');
                  $('#add_subCategory_form').trigger('reset');
                  swal("Success", jsonData['message'], "success");
               }
           $('.disabled_submit').attr('disabled', false);
            
         },
         cache: false,
         contentType: false,
         processData: false
      });
});


$(document).on("submit", "#edit_subCategory_form", function(e) {
   e.preventDefault();  
   e.stopImmediatePropagation();
   
   $.ajax({
         type: "POST",
         url: base_url+"update-subCategory",
         data: new FormData(this),
         beforeSend: function(){ 
            $('.disabled_submit').attr('disabled',true);
         },
         success: function (jsonData) {
          // alert(jsonData);
            var jsonData = JSON.parse(jsonData);
               if(jsonData['success'] == 'true')
               {  
                  $('.close').trigger('click');
                  $('#edit_subCategory_form').trigger('reset');
                  swal("Success", jsonData['message'], "success");
               }
           $('.disabled_submit').attr('disabled', false);
            
         },
         cache: false,
         contentType: false,
         processData: false
      });
});



// $(document).on('click', '.productDescription', function () {
//    var id = $(this).attr('tag');
  
//    $.post(base_url + "get-millspecification/" + id, { page: "view-product" }, function (data) {
//       $('.productDescriptiondata').html('<div class=" col-lg-12">  <div class="card ml-3"> <div class="card-body"> <img src="'+base_url+'/document/product/specification/'+data+'" width=100%>   </div>  </div> </div>');
//       $('#viewProductDescriptionModal').modal('show');
//       // $('.card-header .pull-right').css('display','none');
//        $('.card-header .responsive').html(' <a  class="btn btn-danger close" data-bs-dismiss="modal"><i class="fa fa-close"></i></a>');
//    });
// });

$(document).on('click', '.productDescription', function () {
   var id = $(this).attr('tag');
  
   $.post(base_url + "get-millspecification/" + id, { page: "view-product" }, function (data) {
      $('.productDescriptiondata').html('<div class=" col-lg-12">  <div class="card ml-3"> <div class="card-body"> <img src="'+base_url+'/document/product/specification/'+data+'" width=100%>   </div>  </div> </div>');
      $('#viewProductDescriptionModal').modal('show');
      // $('.card-header .pull-right').css('display','none');
       $('.card-header .responsive').html(' <a  class="btn btn-danger close" data-bs-dismiss="modal"><i class="fa fa-close"></i></a>');
   });
});

$(document).on('keyup', '#search-category', function () {
   var search = $(this).val();
   var id = $(this).attr('tag');
   
   $.post(base_url + "get-filterproductcat", { id: id ,  search :search }, function (data) {

      $('.productsearchdata').html(data);

   });
});
