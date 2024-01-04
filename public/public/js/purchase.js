// ===========================================
$(document).on('keyup', '#clientdetail', function(){
    word   = $(this).val() || ''; 
   if(word !=''){
    
     searchClient(word);
  }
  else{
   $(' .suggestionAra.client').html('');
  }
   
})

function searchClient(word='')
{ 
    $.post(base_url+'get-clients', {search:word}, function(data){ 
      if(data){
        
        arr = JSON.parse(data);
        cdata = '';
        if(arr.success == true)
        {
            list = arr.list;
            cdata = '<ul>';
            for(ii in list)
            { 
                cdata+= '<li class="selThisCnItem client_detail" tag="'+list[ii].id+'" cname="'+list[ii].vendor_name+'" cphone="'+list[ii].phone_number+'" >'+list[ii].vendor_name+' / '+list[ii].phone_number+'<br></li>';
            }
            cdata+= '</ul>';
        } 
         else{
            cdata+= '<ul><li class="selThisCnItem " >No Data</li></ul>';
        }
         $('.suggestionAra.client').html(cdata);
        
      }
    })
}

$(document).on("click", ".client_detail", function(e) {
   var id           = $(this).attr('tag');
   var name           = $(this).attr('cname');
   var phone           = $(this).attr('cphone');

   $('#customer_id').val(id);
   $('#customer_name').val(name);
   $('#customer_mobile').val(phone);
   $('#clientdetail').val(name);

   $('.suggestionAra.client').html('');

});


$(document).on('keyup', '#vehicledetail', function(){
    word   = $(this).val() || ''; 
   if(word !=''){
    
     searchVehicle(word);
  }
  else{
   $(' .suggestionAra.vehicle').html('');
  }
   
})

function searchVehicle(word='')
{ 
    $.post(base_url+'get-vehicles', {search:word}, function(data){ 
      if(data){
        
        arr = JSON.parse(data);
        cdata = '';
        if(arr.success == true)
        {
            list = arr.list;
            cdata = '<ul>';
            for(ii in list)
            { 
                cdata+= '<li class="selThisCnItem vehicle_detail" tag="'+list[ii].id+'" vname="'+list[ii].vehicle_no+'" >'+list[ii].vehicle_no+' <br></li>';
            }
            cdata+= '</ul>';
        } 
         else{
            cdata+= '<ul><li class="selThisCnItem " >No Data</li></ul>';
        }
         $('.suggestionAra.vehicle').html(cdata);
        
      }
    })
}

$(document).on("click", ".vehicle_detail", function(e) {
   var id           = $(this).attr('tag');
   var name         = $(this).attr('vname');

   $('#vehicle_id').val(id);
   $('#vehicledetail').val(name);

   $('.suggestionAra.vehicle').html('');

});

$(document).on('keyup', '.search-product', function(){
  
    word   = $(this).val() || ''; 
    tag = $(this).attr("tag") || '';
    
    if(word !=''){
    $('.product'+tag+' #product_id').val('');
     searchProduct(word, tag);
  }
  else{
  $('.product'+tag+' .suggestionAra.product').html('');
  }
     
})

function searchProduct(word='', tag='')
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
                productdate+= '<li class="selThisCnItem product_detail" tag="'+list[ii].id+'" producttag = "'+tag+'" name="'+list[ii].product_name+'" maxqty="'+list[ii].minimum_stock+'" uom= "'+list[ii].uom+'">'+list[ii].product_name+' <br></li>';
            }
            productdate+= '</ul>';
        }
        else{
            productdate+= '<ul><li class="selThisCnItem " >No Data</li></ul>';
        } 
         $('.product'+tag+' .suggestionAra.product').html(productdate);
         $('.product'+tag+' #product_id').val('');
      }
    })
}

$(document).on("click", ".product_detail", function(e) {
   var id           = $(this).attr('tag');
   var name           = $(this).attr('name');
   var maxqty           = $(this).attr('maxqty');
   var tag           = $(this).attr('producttag');
   var uom           = $(this).attr('uom');
   
   $('.product'+tag+' #product_id').val(id);
   $('.product'+tag+' .search-product').val(name);
   $('.product'+tag+' .puom').text('( in '+uom+')');
   $('.product'+tag+' .qtyvalidation').attr('maxqty', maxqty); 
   $('.product'+tag+' .suggestionAra.product').html('');

});

// $(document).on("keyup", ".qtyvalidation", function(e) {  
   
//    var maxqty           = $(this).attr('maxqty')*1;
//    var qty              = $(this).val() * 1;
//    var tag              = $(this).attr('tag')*1;
  
//    if(maxqty){
//       if( maxqty <= qty ){
         
        
//          $(' .e_qty'+tag).html( '' );
          
         
//       }
//       else{
//           $(' .e_qty'+tag).html( ' Minimum stock should be '+maxqty );
        
//       }
         
//    }
//    else{
//       $(' .e_qty'+tag).html( 'Please Select valid Product!' );
     
//    }
      
   

// });


$(document).on("keyup", ".qty, .rate ,.tax, .discount , .insurance_cost", function(e) {
    debugger;
var tag           = $(this).attr('tag');
var qty           = $('.product'+tag+' .qty').val();
var rate          = $('.product'+tag+' .rate').val();
var tax           = $('.product'+tag+' .tax').val();
var discount      = $('.product'+tag+' .discount').val();
var insurance_cost      = $('.product'+tag+' .insurance_cost').val() * 1;

//alert(tag);

if(qty==''){var qty = 0;}
if(rate==''){var rate = 0;}
if(tax==''){var tax = 0;}
if(discount==''){var discount = 0;}
if(insurance_cost==''){var insurance_cost = 0;}

var price = qty * rate;
var total_price =   insurance_cost + price + (   (price * tax) / 100)  - (discount * price/100) ;

$('tr.product'+tag+' .price').val(price);
$('tr.product'+tag+' .total_price').val(total_price);

});


$(document).on('click', '.append-product', function(){
   
   var tag   = $(this).attr("tag") * 1 ;
   var next  = tag + 1;
   
var productappenddata = '';
   productappenddata+='<div class="card mb-2 product'+next+'"><a class="remove m-0"  type="button" style="color:red; text-align:right; font-size:20px"><i class="fa fa-close"></i></a><div class="card-body size-4"><div class="form-row"> ';  

   productappenddata+='<div class="form-group mb-0 col-md-2"><label>Product <noframes></noframes></label><span class="text-danger">*</span> <input type="text" class="form-control search-product" name="txtCompany[]" tag="'+next+'" autocomplete="off"><div class="suggestionAra product"></div><input type="hidden" name="product_id[]" tag="'+next+'" id="product_id"><span class="text-danger size-7 e_txtCompany"'+next+'""></span></div>';
   
   productappenddata+='<div class="form-group mb-0 col-md-10"><div class="form-row"><div class="form-group mb-0  col-md-2"> <label>Qty</label><span class="text-danger">*</span><span class="puom"></span><input type="text" class="form-control qty qtyvalidation" name="qty[]" tag="'+next+'" id="maxqty"><span class="text-danger size-7 e_qty"'+next+'""></span></div>';
   
   productappenddata+='<div class="form-group mb-0 col-md-2"> <label>Rate</label><span class="text-danger">*</span><input type="text" class="form-control" name="rate[]" tag="'+next+'" id="rate" > <span class="text-danger size-7 e_rate"'+next+'""></span>  </div>';

   productappenddata+='  <div class="form-group mb-0  col-md-2"> <label>Product Price</label><span class="text-danger">*</span> <input type="text" class="form-control" name="price[]" tag="'+next+'" id="price"  readonly> <span class="text-danger size-7 e_price"'+next+'""></span></div>';

   productappenddata+='<div class="form-group mb-0  col-md-2"> <label>Tax</label><span class="text-danger">*</span><input type="text" class="form-control" name="tax[]" tag="'+next+'" id="tax"><span class="text-danger size-7 e_tax"'+next+'""></span></div>';

   productappenddata+='<div class="form-group mb-0 col-md-2"><label>Discount</label><span class="text-danger">*</span><input type="text" class="form-control" name="discount[]" tag="'+next+'" id="discount"><span class="text-danger size-7 e_discount"'+next+'""></span> </div>';
    
   productappenddata+=' <div class="form-group mb-0  col-md-2"><label>Total Price</label><span class="text-danger">*</span><input type="text" class="form-control" name="total_price[]" tag="'+next+'" id="total_price"  readonly> <span class="text-danger size-7 e_total_price"'+next+'""></span> </div></div></div> </div></div></div>';


    $('.product-append').append(productappenddata);
    $('.append-product').attr("tag", next);
});


$(document).on('click','.remove',function (e)  {
  
  var child = $(this).closest('div').nextAll();
  $(this).closest('div').remove();
});



$(document).on("submit", "#add_purchase_form", function(e) {
   e.preventDefault();  
   e.stopImmediatePropagation();
  
   $.ajax({
         type: "POST",
         url: base_url+"submit-purchase",
         data: new FormData(this),
        
         success: function (jsonData) {
          // alert(jsonData);
            var jsonData = JSON.parse(jsonData);
            if (jsonData['error'] == true) 
               {
                  if (jsonData['purchase_date'] !='') 
                  {
                    
                     $('.e_purchase_date').html(jsonData['purchase_date']);
                  }
                  else
                  {
                    
                     $('.e_purchase_date').html('');
                  }

                  
                 
               }
               else
               {
                  if(jsonData['success'] == 'true')
                  { 
                     

                     $('#add_purchase_form').trigger('reset');
                      swal("Success", jsonData['message'], "success");
                      $('.e_vehicle_no').html('');
                      $('.e_vehicle_company_name').html('');
                      $('.e_transporter_name').html('');
                      $('.e_vehicle_type').html('');
                      $('.e_description').html('');
                      $('.e_width_vehicle').html('');
                      $('.e_depth_vehicle').html('');
                      $('.e_capicity').html('');
                      $('.e_time_permited').html('');
                      $('.e_areas_permited').html('');
                      var i = $('#order_number').val();
                     const chars = i.split("-");
                     var increment = chars[1] *1  + 1;
                     var formattedNumber = ("0000" + increment).slice(-4);
                     $('#order_number').val("ON-"+formattedNumber);
                     if(jsonData['data'] == '2'){
                        var newUrl = base_url+"purchase";
                        changeURL(newUrl, "purchase");
                        getPurchase();
                     }

                  }

                  else{
                       swal("Error", jsonData['message'], "error");
                  }
                 
                  
               }
            
         },
         cache: false,
         contentType: false,
         processData: false
      });
});
$(document).on("submit", "#credit_document", function(e) {
   e.preventDefault();  
   e.stopImmediatePropagation();
  
   $.ajax({
         type: "POST",
         url: base_url+"submit-credit",
         data: new FormData(this),
         cache:false,
         contentType: false,
         processData: false, 
         success: function (jsonData) {
            console.log(jsonData);
          // alert(jsonData);
            var jsonData = JSON.parse(jsonData);
            if (jsonData['error'] == true) 
               {
               
                  if (jsonData['purchase_date'] !='') 
                  {
                    
                     $('.e_purchase_date').html(jsonData['purchase_date']);
                  }
                  else
                  {
                    
                     $('.e_purchase_date').html('');
                  }

                  $('#upload_credit_doc').modal('hide');
                 
               }
               else
               {
                  if(jsonData['success'] == 'true')
                  { 
                     

                     $('#add_purchase_form').trigger('reset');
                      swal("Success", jsonData['message'], "success");
                      $('.e_vehicle_no').html('');
                      $('.e_vehicle_company_name').html('');
                      $('.e_transporter_name').html('');
                      $('.e_vehicle_type').html('');
                      $('.e_description').html('');
                      $('.e_width_vehicle').html('');
                      $('.e_depth_vehicle').html('');
                      $('.e_capicity').html('');
                      $('.e_time_permited').html('');
                      $('.e_areas_permited').html('');
                      var i = $('#order_number').val();
                     const chars = i.split("-");
                     var increment = chars[1] *1  + 1;
                     var formattedNumber = ("0000" + increment).slice(-4);
                     $('#order_number').val("ON-"+formattedNumber);
                     if(jsonData['data'] == '2'){
                        var newUrl = base_url+"purchase";
                        changeURL(newUrl, "purchase");
                        getPurchase();
                     }

                  }

                  else{
                       swal("Error", jsonData['message'], "error");
                  }
                 
                  
               }
            
         },
         cache: false,
         contentType: false,
         processData: false
      });
});

$(document).on("submit", "#add_sale_form", function(e) {
   e.preventDefault();  
   e.stopImmediatePropagation();
  
   $.ajax({
         type: "POST",
         url: base_url+"submit-sale",
         data: new FormData(this),
        
         success: function (jsonData) { 
            var jsonData = JSON.parse(jsonData);
            if (jsonData['error'] == true) 
               {
                  if (jsonData['sale_date'] !='') 
                  {
                    
                     $('.e_sale_date').html(jsonData['sale_date']);
                  }
                  else
                  {
                     
                     $('.e_sale_date').html('');
                  }

                  
                 
               }
               else
               {
                  if(jsonData['success'] == 'true')
                  { 
                     

                     $('#add_sale_form').trigger('reset');
                      swal("Success", jsonData['message'], "success");
                      $('.e_vehicle_no').html('');
                      $('.e_vehicle_company_name').html('');
                      $('.e_transporter_name').html('');
                      $('.e_vehicle_type').html('');
                      $('.e_description').html('');
                      $('.e_width_vehicle').html('');
                      $('.e_depth_vehicle').html('');
                      $('.e_capicity').html('');
                      $('.e_time_permited').html('');
                      $('.e_areas_permited').html('');
                     //  var i = $('#sale_number').val();
                     // const chars = i.split("-");
                     // var increment = chars[1] *1  + 1;
                     // var formattedNumber = ("0000" + increment).slice(-4);
                     // $('#sale_number').val("ON-"+formattedNumber);

                     if(jsonData['data'] == '2'){
                        var newUrl = base_url+"sale";
                        changeURL(newUrl, "sale");
                        getSale();
                     }
                  }
                   else{
                       swal("Error", jsonData['message'], "error");
                  }
                 
                  
               }
            
         },
         cache: false,
         contentType: false,
         processData: false
      });
});

// ===========================================

$(document).on("change", "#transport_type", function(e) {
  var tag           = $(this).val();
  if(tag == '1'){ $('.transportresponse').css('display', ''); $("#vehicledetail").attr("required", true); }
  else { $('.transportresponse').css('display', 'none'); $("#vehicledetail").attr("required", false); }
});


// ===========================================
$(document).on('click', '.sendOrderspecification', function (e) {
var id = $(this).attr('tag');
      $.ajax({
         type: "POST",
         url: base_url+"get-orderspecification",
         data: { id: id},
        
         success: function (jsonData) { 
           // alert(jsonData);
           console.log("Size option : "+jsonData);
            var jsonData = JSON.parse(jsonData);
            var vs = jsonData.orderdata['vehiclestatus'];
        cdata = '';
        if(jsonData.success == true)
        { var i = 1; 
             if(jsonData.category == 1){ var stext ='Quality';}
              else if(jsonData.category == 2){var stext ='Size';}
            list = jsonData.list;

             if(list[0]['send_quantity'] !=''){ var sdata = '<th> '+stext+' Send</th><th> Quantity send</th>';} else{ var sdata = '';}
             if(list[0]['recieve_quantity'] !='' || vs==6){  
               $('.changeidtosubmitdata').attr("id", "receive_orderspecification_form");
                var rdata = '<th> '+stext+' Recieved</th><th> Quantity Recieved</th>';}else{ var rdata = '';}
                
            cdata = '<table class="table table-responsive-sm tabledata size-6"><thead class="text-center"><th>S.no</th><th>Requested '+stext+'</th><th>Requested Quantity</th>'+sdata+' '+rdata+'</thead><tbody>';
            for(ii in list)
            {  
               if(list[ii].send_quantity !=''){ var sdata = '<td> '+list[ii].send_size+'</td><td>'+list[ii].send_quantity+'</td>';}else{ var sdata = '';}
               if(list[ii].recieve_quantity !=''){ var rdata = '<td> '+list[ii].recieve_size+'</td><td>'+list[ii].recieve_quantity+'</td>';}
               else if(vs == 6){ var rdata = '<td><input type="text" class="form-control" style="height:40px" name = "r_size[]" id="r_size" value="'+list[ii].send_size+'" required></td><td><input type="text" class="form-control" style="height:40px" name = "r_quantity[]" id="r_quantity" value="'+list[ii].send_quantity+'"required></td>';}
               else{ var rdata = '';}
                cdata+= '<input type="hidden" name="trrateid[]" value="'+list[ii].id+'"><tr class="text-center"><td>'+i+'</td><td>'+list[ii].size+'</td><td>'+list[ii].quantity+'</td>'+sdata+' '+rdata+'</tr>';
                i++;
            }
            cdata+= '</tbody></table>';
             if(list[0]['recieve_quantity'] =='' && list[0]['send_quantity'] !='' && vs==6 ){  
                 cdata+= ` <div class="m-2">Product Status <label><span class="text-danger"> *</span></label>
                 <select class="form-select form-control" id="product_status" name="product_status" onchange="productstatusChange(this.value)">
                 <option selected value="">Select Product Status</option>
                 <option value="1">Product Ok</option>
                 <option value="2">Raise Complain</option>
               </select> </div><div class="m-2 d-none" id="compleaint_issue">Complain Reason<label><span class="text-danger"> *</span></label>
               <select class="form-select form-control  " id="complain_issue" name="complain_issue" >
               <option selected value="">Select Complain Issue</option>
               <option value="size issue">Size Issue</option>
               <option value="quality issue">Quality Issue</option>
               <option value="payment issue">Payment Issue</option>
               <option value="quantity issue">Quantity Issue</option>
               <option value="other">Other</option>
             </select> </div> <div class="m-2 d-none" id="compleaint_image">Upload image   <small class='text-danger'>(Multiple image with  click CTRL + select all images you wish upload)</small><label> </label>
             <input type='file' name="complaint_image[]" class='form-control'  multiple>
             </div> <div class="m-2"> <label>Description</label><input type="text" name="description" class="form-control"> </div> <div class="m-2 d-none"> <label>Discount<span class="text-danger"> *</span></label><input type="text" name="discount" class="form-control" value="${jsonData.orderdata['discount']}"> </div>`;
              }
            //   else{
            //    cdata='hiii';
            //   }
           
            $('.orderspecificationdata').html(cdata);
           if(vs!=6  ){  $('.forderspecificationdata').html(''); }
            if(jsonData.orderdata.dispatchimage != '' ){   
              
               $('.osimagedata').html('<img src="'+base_url+'document/product/'+jsonData.orderdata['dispatchimage']+'" width=50%>');
            }
            else{
                $('.osimagedata').html('');
            }
        }
        else{
            if(jsonData.category == 1 ){
                var catdata ='';
                catdata+= '<div class="card-header"><h6 class="">Order Specification</h6></div><table id="specification_table" class="table table-responsive tabledata size-6"> <thead><tr><th>Quality</th><th>Quantity</th> <th></th> </tr></thead> <tbody class=""> ';
                 allcat = jsonData.allcategory;

                 for(ii in allcat)
                {  
                    
                    catdata += '<tr class=""> <td><input type="text" class="form-control" style="height:40px" name = "size[]" id="size" value="'+allcat[ii].quality+'" required></td> <td><input type="text" class="form-control" style="height:40px" name = "quantity[]" value="'+allcat[ii].quantity+'" id="quantity" value="0" required></td> <td></td></tr>';
                }
                catdata+='</tbody> </table>';
                $('.orderspecificationdata').html(catdata );

                 $('.forderspecificationdata').html('<button type="button" class="btn btn-secondary close" data-bs-dismiss="modal">Close</button> <button type="submit" class="btn btn-primary">Submit</button>'); 
            }
            else if(jsonData.category == 2 || jsonData.category == 5){
                $('.orderspecificationdata').html('<div class="card-header"><h6 class="">Order Specification</h6><div class="pull-right float-end "><ul class="nav nav_filter "><li class="nav-item text-end"> <a href="javascript:void(0)"  class="btn btn-primary mb-2 addorderspecification size-6" tag="1">Add </a></li></ul> </div></div><table id="specification_table" class="table table-responsive tabledata size-6"> <thead><tr><th>Size</th><th>Quantity</th> <th></th> </tr></thead> <tbody class="responsivespecification"> <tr class="specificationrow1"> <td><input type="text" class="form-control" style="height:40px" name = "size[]" id="size" required></td> <td><input type="text" class="form-control" style="height:40px" name = "quantity[]" id="quantity" required></td> <td></td></tr> </tbody> </table>'); 
                 $('.forderspecificationdata').html('<button type="button" class="btn btn-secondary close" data-bs-dismiss="modal">Close</button> <button type="submit" class="btn btn-primary">Submit</button>'); 
            }
            // cdata = "hiiiiiiii";

            $('.orderspecificationdata').html(catdata );
             
        }
         
         },
         
      });
   $('#orderid').val(id);
   $('#orderspecificationModal').modal('show');
  
});


function productstatusChange(id){
   // alert(id);
   if(id==2){
      $('#compleaint_issue').removeClass('d-none');
      $('#compleaint_image').removeClass('d-none');
   }else{
      $('#compleaint_issue').addClass('d-none');
      $('#compleaint_image').addClass('d-none');
   }
}

$(document).on("submit", "#receive_orderspecification_form", function(e) {
   debugger;
   e.preventDefault();  
   e.stopImmediatePropagation();
  
   $.ajax({
         type: "POST",
         url: base_url+"receive-orderspecification",
         data: new FormData(this),
         cache:false,
         contentType: false,
         processData: false,
         success: function (jsonData) {
           //alert(jsonData);
         //   debugger;
            var jsonData = JSON.parse(jsonData);
            if (jsonData['error'] == true) 
               {
                  if (jsonData['purchase_date'] !='') 
                  {
                     $('.e_purchase_date').html(jsonData['purchase_date']);
                  }
                  else
                  {
                     $('.e_purchase_date').html('');
                  }
               }
               else
               {
                  if(jsonData['success'] == 'true')
                  { 
                     

                     $('#receive_orderspecification_form').trigger('reset');
                      swal("Success", jsonData['message'], "success");
                     $('.statusdata').html('');
                      $('.close').trigger('click');
                  }
                 
                  
               }
            
         },
         cache: false,
         contentType: false,
         processData: false
      });
});



// ===========================================
$(document).on('click', '.dispatch-outfordelivery', function (e) {
var id = $(this).attr('tag');
      $.ajax({
         type: "POST",
         url: base_url+"get-orderspecification",
         data: { id: id},
        
         success: function (jsonData) { 
           // alert(jsonData);
           console.log(jsonData);
            var jsonData = JSON.parse(jsonData);
          
        cdata = '';
        if(jsonData.success == true)
        {
        
         var i = 1; 
            list = jsonData.list;
              if(jsonData.category == 1){ var stext ='Quality';}
              else if(jsonData.category == 2){var stext ='Size';}
           if(list[0]['send_quantity'] !=''){ var rdata = '<th> '+stext+' Recieved</th><th> Quantity Recieved</th>';}else{ var rdata = '';}
            cdata = '<table class="table table-responsive-sm tabledata size-6"><thead class="text-center"><th>S.No</th><th>GSM</th><th>Ordered Quantity(kg)</th><th>Ordered Quantity(Reels)</th><th>Actual Quantity(kg)</th><th>Actual Quantity(Reels) </th></thead><tbody>';
            // cdata = '<table class="table table-responsive-sm tabledata size-6"><thead class="text-center"><th>S.no</th><th>Requested '+stext+'</th><th>Requested Quantity</th><th> '+stext+' Send</th><th> Quantity send</th>'+rdata+'</thead><tbody>';
            for(ii in list)
            {  
                cdata+= '<input type="hidden" name="trrateid[]" value="'+list[ii].id+'"><tr class="text-center"><td>'+i+'</td><td></td><td>'+list[ii].size+'</td><td>'+list[ii].quantity+'</td>';
                if(list[ii].send_size != ''){ cdata+='<td>'+list[ii].send_size+'</td>'; }
                else{ cdata+='<td><input type="text" class="form-control" style="height:40px" name = "s_size[]" id="s_size" value="'+list[ii].size+'" required></td>'; }
                
                   if(list[ii].send_quantity != ''){ cdata+='<td>'+list[ii].send_quantity+'</td><td>'+list[ii].recieve_size+'</td><td>'+list[ii].recieve_quantity+'</td>'; }
                else{ cdata+='<td><input type="text" class="form-control" style="height:40px" name = "s_quantity[]" id="s_quantity" value="'+list[ii].quantity+'"required></td>'; }
                 
                   cdata+='</tr>';
                i++;
            }
            cdata+= '</tbody></table>';
            $('.orderspecificationdata').html(cdata);
            
             if(jsonData.orderdata.dispatchimage != ''){   
               $('.osfooter').html(''); 
               $('.osimagedata').html('<img src="'+base_url+'document/product/'+jsonData.orderdata['dispatchimage']+'" width=50%>');
            }else{  
               if(list[0]['send_quantity'] !=''){ $('.osfooter').html(''); 
              $('.osimagedata').html(' '); }
               else{  
               $('.osfooter').html('<button type="button" class="btn btn-secondary close" data-bs-dismiss="modal">Close</button> <button type="submit" class="btn btn-primary">Submit</button>')
              $('.osimagedata').html(` <div class="row"><div class="col-6"><label>Dispatch Image</label><span class="text-danger">*</span><input type="file" class="form-control  form-control-sm " name="dispatchimage" id="dispatchimage" tag="1"  autocomplete="off" placeholder="" ></div><div class="col-6"><label>Packing Slip Excel</label><span class="text-danger">*</span><a style="margin-left:100px" href="${base_url}public/packingslip.xlsx" downloadable><small class="text-primary ">Download excel</small></a><input type="file" class="form-control  form-control-sm " name="packingslipimage" id="packingslipimage" tag="1"  required ></div><div class="col-6"><label>Invoice Image</label><span class="text-danger">*</span><input type="file" class="form-control  form-control-sm " name="invoiceimage" id="invoiceimage" tag="1"  required ></div><div class="col-6"><label>E-Invoice Image</label><span class="text-danger">*</span><input type="file" class="form-control  form-control-sm " name="einvoiceimage" id="einvoiceimage" tag="1"  required ></div><div class="col-6"><label>eWay Image</label><input type="file" class="form-control  form-control-sm " name="ebayimage" id="ebayimage" tag="1"  autocomplete="off" placeholder="" ></div><div class="col-6"><label>GR Image</label><input type="file" class="form-control  form-control-sm " name="girimage" id="girimage" tag="1"  autocomplete="off" placeholder="" ></div><div class="col-6"> <label>Invoice no </label><input type="text" class="form-control  form-control-sm " name="invoiceno" id="invoiceno"  autocomplete="off" placeholder="Enter Invoice number " > </div><div class="col-6"> <label>Invoice Date </label><input type="date" class="form-control  form-control-sm " name="invoicedate" id="invoicedate"  autocomplete="off" placeholder=" " > </div> <div class="col-6"> <label>eWay Bill Number </label><input type="text" class="form-control  form-control-sm " name="ewaybillno" id="ewaybillno"  autocomplete="off" placeholder=" " > </div><div class="col-6"> <label>Freight Rate </label><input type="text" class="form-control  form-control-sm " name="freight_rate" id="freight_rate"  autocomplete="off" placeholder=" " > </div><div class="col-6"><label>IRN no. </label><input type="text" class="form-control  form-control-sm " name="gst" id="gst"  autocomplete="off" placeholder=" " > </div><div class="col-6"><label>ACK no. </label><input type="text" class="form-control  form-control-sm " name="cgst" id="cgst"  autocomplete="off" placeholder=" " > </div><div class="col-6"><label>Insurance No. </label><input type="text" class="form-control  form-control-sm " name="insurance_no" id="insurance_no"  autocomplete="off" placeholder=" " > </div><div class="col-6"><label>Quantity </label><input type="text" class="form-control  form-control-sm " name="totalquatity" id="totalquatity"  autocomplete="off" placeholder=" " > </div><div class="col-6"> <input type="hidden" class="form-control  form-control-sm " name="discount" id="discount" value="0" > </div></div>`);
               }
             }
        }
         
         },
         
      });
   $('#orderid').val(id);
   $('#orderspecificationModal').modal('show');
  
});

$(document).on("submit", "#send_orderspecification_form", function(e) {
   debugger;
   e.preventDefault();  
   e.stopImmediatePropagation();
  
   $.ajax({
         type: "POST",
         url: base_url+"send-orderspecification",
         data: new FormData(this),
         cache: false,
         contentType: false,
         processData: false,
        
         success: function (jsonData) {
          // alert(jsonData);
           console.log(jsonData);
            var jsonData = JSON.parse(jsonData);
            if (jsonData['error'] == true) 
               {
                  if (jsonData['purchase_date'] !='') 
                  {
                     $('.e_purchase_date').html(jsonData['purchase_date']);
                  }
                  else
                  {
                     $('.e_purchase_date').html('');
                  }
               }
               else
               {
                  if(jsonData['success'] == 'true')
                  { 
                     

                     $('#send_orderspecification_form').trigger('reset');
                      swal("Success", jsonData['message'], "success");
                   
                      $('.close').trigger('click');
                  }
                 
                  
               }
            
         } 
      });
});




$(document).on('click', '.addorderspecification', function (e) {
   var tag = $(this).attr('tag') * 1;
     var next = tag +1 ;
      products='';
      // alert();
     // <a  class="btn btn-danger close" data-bs-dismiss="modal"><i class="fa fa-close"></i></a>
      // $.post(base_url + "get-millspecification/" + id, { page: "view-product" }, function (data) {
      // });
      var listspecification = $('#listspecification').val();
     listspecification = JSON.parse(listspecification);
       for(ii in listspecification)
       {  
           products+= '<option value="'+listspecification[ii]['id']+'" ';
          
            products+= ' > BF :  '+listspecification[ii]['bf']+' GSM :  '+listspecification[ii]['gsm']+' Type :  '+listspecification[ii]['type']+'</option>';
           
       }
     var rdata = '<tr class="specificationrow'+next+'"><td><select class="form-control"  name = "product[]" id="size" required>'+products+'</select></td><td><div class="d-flex"> <input type="text" class="form-control"  name = "size[]" id="size"  ><select class="form-select" name="size_uom[]" ><option value="in">In</option><option value="cm">Cm</option></select></div></td><td><div class="d-flex"><input type="text" class="form-control" onchange="Addquantityfun(this.value)"  name = "quantity[]" id="quantity"  ><select class="form-select" name="quantity_uom[]"><option value="kg">Kg</option> <option value="rims">Rims</option></select></div></td> <td><a class="removespecification m-0" tag="'+next+'" type="button" style="color:red; text-align:right; font-size:20px"><i class="fa fa-close"></i></a></td></tr>';
   
      $('.responsivespecification').append(rdata);
       $('.addorderspecification').attr("tag", next);
     
   });
$(document).on('click', '.addorderspecification_godown', function (e) {
   var tag =  1;
     var next = tag +1 ;
      products='';
     // <a  class="btn btn-danger close" data-bs-dismiss="modal"><i class="fa fa-close"></i></a>
      // $.post(base_url + "get-millspecification/" + id, { page: "view-product" }, function (data) {
      // });
   //    var listspecification = $('#listspecification').val();
   //   listspecification = JSON.parse(listspecification);
   //     for(ii in listspecification)
   //     {  
   //         products+= '<option value="'+listspecification[ii]['id']+'" ';
          
   //          products+= ' > BF :  '+listspecification[ii]['bf']+' GSM :  '+listspecification[ii]['gsm']+' Type :  '+listspecification[ii]['type']+'</option>';
           
   //     }
     var rdata = '<tr class="specificationrow'+next+'"><td><select class="form-control"  name = "product[]" id="size" required><option>BF :  ; GSM :  ; Type :</option></select></td><td><div class="d-flex"> <input type="text" class="form-control"  name = "size_list[]" id="size"  ><select class="form-select" name="size_uom[]" ><option value="in">In</option><option value="cm">Cm</option></select></div></td><td><div class="d-flex"><input type="text" class="form-control" onchange="Addquantityfun(this.value)"  name = "quantity_list[]" id="quantity"  ><select class="form-select" name="quantity_uom[]"><option value="kg">Kg</option> <option value="rims">Rims</option></select></div></td> <td><a class="removespecification m-0" tag="'+next+'" type="button" style="color:red; text-align:right; font-size:20px"><i class="fa fa-close"></i></a></td></tr>';
   
      $('.responsivespecification').append(rdata);
       $('.addorderspecification').attr("tag", next);
     
   });

$(document).on('click','.removespecification',function (e)  {
  var tag = $(this).attr('tag') ;
  $('.specificationrow'+tag).remove();
});


// order out to delivery and order specifiction form
$(document).on("submit", "#add_orderspecification_form", function(e) {
  var lid = $('#listproduct_id').val();
  // alert(lid);
   e.preventDefault();  
   e.stopImmediatePropagation();
  
   $.ajax({
         type: "POST",
         url: base_url+"submit-orderspecification",
         data: new FormData(this),
        
         success: function (jsonData) {
           // alert(jsonData);
           
            var jsonData = JSON.parse(jsonData);
            if (jsonData['error'] == true) 
               {
                  if (jsonData['purchase_date'] !='') 
                  {
                     $('.e_purchase_date').html(jsonData['purchase_date']);
                  }
                  else
                  {
                     $('.e_purchase_date').html('');
                  }

                  
                 
               }
               else
               {
                  if(jsonData['success'] == 'true')
                  { 
                     

                     $('#add_orderspecification_form').trigger('reset');
                      swal("Success", jsonData['message'], "success");
                     $('.statusdata').html('');
                      $('.close').trigger('click');
                      location.reload();
                  }
                 
                  
               }
            
         },
         cache: false,
         contentType: false,
         processData: false
      });
});


// ===========================================
$(document).on('click', '.paymentPayData', function (e) {

 var id = $(this).attr('tag');
   $.ajax({
         type: "POST",
         url: base_url+"get-paydata",
         data: { id: id},
        
         success: function (jsonData) {
         
            var jsonData = JSON.parse(jsonData);
          
                  if(jsonData['success'] == 'true')
                  {  
                     if( (jsonData['orderdata']['total_price']-jsonData['orderdata']['discount']) > jsonData['amountrecieve']['payamount'])
                     {
                        $('.paymodelData').html('<form method="post" id="add_payment_form" >   <input type="hidden" name="orderid" id="orderid" class="form-control"> <input type="hidden" name="qty" id="qty" class="form-control"> <div class="mb-2"><input type="hidden" name="maxamount" id="maxamount" class="form-control"> <div class="mb-2">  <label>Amount Pay</label><span class="text-danger">*</span>  <input type="number" class="form-control" name="amount"  id="amount" min="0" max="" required>  <span class="text-danger size-7 e_amount"></span>  </div>   <div class="modal-footer">  <button type="button" class="btn btn-secondary close" data-bs-dismiss="modal">Close</button> <button type="submit" class="btn btn-primary">Submit</button></div> </form>');
                     }
                     else{
                        $('.paymodelData').html('<a class="badge light badge-success badge-text-size view_btn align-center" href="javascript:void(0)" >Amount Paid Successfully</a>');
                     }
                     $('#billingamount').html(jsonData['orderdata']['total_price']);
                     $('#paidamount').html(jsonData['amountrecieve']['payamount'] || '0');
                     $('#discount').html(jsonData['orderdata']['discount']);

                     $('#balance').html((jsonData['orderdata']['total_price'] - jsonData['orderdata']['discount']) - (jsonData['amountrecieve']['payamount'] || '0'));
                     $('#orderid').val(jsonData['orderdata']['id']);
                     $('#qty').val(jsonData['orderdata']['qty']);
                     $('#amount').attr('max', (jsonData['orderdata']['total_price']- jsonData['orderdata']['discount']) - (jsonData['amountrecieve']['payamount'] || '0'));
                     $('#maxamount').val((jsonData['orderdata']['total_price'] - jsonData['orderdata']['discount']) - (jsonData['amountrecieve']['payamount'] || '0'));
                     $('#PaymentPayDetail').modal('show');

               }
         },
       
      });
   
  
});

// ===========================================
$(document).on('click', '#creditDocBtn', function (e) {

 var id = $(this).attr('tag');

 let creditDoc =` <form id="credit_document" method="post" enctype='multipart/form-data'>   
 <div class="container mt-2">
 <div class="row">
 <div class="col-sm-6 mb-3">
 <input class="form-control" type="hidden" id="id" name="order_id" value="${id}">
         <label for="partner" class="form-label">Select Partner</label>
         <select class="form-select form-control"  name="partner" id="partner" onchange="creditFormFeildFun(this.value)">
             <option value="">Select partner</option>
             <option value="1">Proprietor</option>
             <option value="2">Partner</option>
             <option value="3">Private Limited</option>
             <option value="4">Limited</option>
             <option value="5">LLP</option>
           </select>
     </div>
     <div class="col-sm-6 mb-3" id="gst-d">
         <label for="gst_certificate" class="form-label">GST Certificate</label>
         <input class="form-control" type="file" id="gst_certificate" name="gst_certificate" >
     </div>
     <div class="col-sm-6 mb-3" id="aadhaar-d">
         <label for="aadhaar_card" class="form-label">Aadhaar Card</label>
         <input class="form-control" type="file" id="aadhaar_card" name="aadhaar_card" >
     </div> 
     <div class="col-sm-6 mb-3" id="pancard-d">
         <label for="pancard" class="form-label">Pancard</label>
         <input class="form-control" type="file" id="pancard" name="pancard" >
     </div>
     <div class="col-sm-6 mb-3" id="incorporation-d">
         <label for="incorporation" class="form-label">Certificate of Incorporation</label>
         <input class="form-control" type="file" id="incorporation" name="incorporation" >
     </div>
     <div class="col-sm-6 mb-3" id="moa-d">
         <label for="moa" class="form-label">MOA</label>
         <input class="form-control" type="file" id="moa" name="moa" >
     </div>
     <div class="col-sm-6 mb-3" id="deed-d">
         <label for="partnership_deed" class="form-label">Partnership deed</label>
         <input class="form-control" type="file" id="partnership_deed" name="partnership_deed" >
     </div>
     
 </div>
 <div class="row" id="bank-d">
      <div class="col-sm-12 ">
         <p><strong class="text-danger">Bank Details</strong></p> 
     </div>
     <div class="col-sm-6 mb-3">
         <label for="bank_name" class="form-label">Bank Name</label>
         <input type="text" class="form-control" id="bank_name" name="bank_name" placeholder="Bank name"> 
     </div>
     <div class="col-sm-6 mb-3">
         <label for="accoutn_no" class="form-label">Account No.</label>
         <input type="text" class="form-control" id="accoutn_no" name="accoutn_no" placeholder="Account no."> 
     </div>
     <div class="col-sm-6 mb-3">
         <label for="ifsc" class="form-label">IFSC</label>
         <input type="text" class="form-control" id="ifsc" name="ifsc" placeholder="Ifsc"> 
     </div>
     <div class="col-sm-6 mb-3">
         <label for="branch_name" class="form-label">Branch Name</label>
         <input type="text" class="form-control" id="branch_name" name="branch_name" placeholder="Branch name"> 
     </div>
     
     </div>
     <div class="col-sm-12 mb-3">
     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
     <button type="submit" class="btn btn-primary"  >Save changes</button>
     </div>
</div> 
   </form>`;
   $('#credit_modal').html(creditDoc);
   $('#upload_credit_doc').modal('show');
    
});

function creditFormFeildFun(value){
   // alert(value)
   if(value==1){
      $('#incorporation-d').addClass('d-none');
      $('#moa-d').addClass('d-none');
      $('#deed-d').addClass('d-none');
      $('#bank-d').removeClass('d-none');
   }else{
      $('#incorporation-d').removeClass('d-none');
      $('#moa-d').removeClass('d-none');
      $('#deed-d').removeClass('d-none');
   }
   if(value==2){
      $('#incorporation-d').addClass('d-none');
      $('#moa-d').addClass('d-none');
      $('#bank-d').addClass('d-none');
   }
   
   if(value==3){
      $('#incorporation-d').removeClass('d-none');
      $('#moa-d').removeClass('d-none');
      $('#deed-d').addClass('d-none');
      $('#bank-d').addClass('d-none');
   }
   if(value==4){
      $('#incorporation-d').removeClass('d-none');
      $('#moa-d').addClass('d-none');
      $('#deed-d').addClass('d-none');
      $('#bank-d').addClass('d-none');
   }
   if(value==5){
      $('#incorporation-d').addClass('d-none');
      $('#moa-d').addClass('d-none');
      $('#deed-d').removeClass('d-none');
      $('#bank-d').addClass('d-none');
   }
}

// ===========================================
$(document).on('click', '#ShowcreditDocBtn', function (e) {

 var id = $(this).attr('tag');

  
   // $('#credit_modal').html(creditDoc);
   // $('#upload_credit_doc').modal('show');
   $.ajax({
         type: "POST",
         url: base_url+"get-creditdata/"+id,
         data: { id: id},
        
         success: function (jsonData) {
         
            var jsonData = JSON.parse(jsonData);
            console.log(jsonData);
           let  partnerfun=(val)=>{
            let txt="";
            if (val==1) {
               // $('#partner_id').html("Proprietor");
               txt="Proprietor";
            }
            if (val==2) {
               // $('#partner_id').html("Partner");
               txt="Partner";
            }
            if (val==3) {
               // $('#partner_id').html("Private Limited");
               txt="Private Limited";
            }
            if (val==4) {
               // $('#partner_id').html("Limited");
               txt="Limited";
            }
            if (val==5) {
               // $('#partner_id').html("LLP");
               txt="LLP";
            }
            return txt;
           }
           
            let creditdoc = `  <div class="container">
            <div class="row"> 
            <div class="col-sm-12 d-flex gap-2"><h4 class="mx-2">Partner : </h4><p id="partner_id mx-2"> ${ partnerfun(jsonData.partner)} </p>
            </div>`;
            creditdoc += `    <div class="col-sm-6 p-4 border"><h4>GSt Certificate</h4><img src="${base_url}/document/credit/${jsonData.gst_certificate}" alt="" class="img-fluid   w-100" style="height: 322px;">
                </div>
                <div class="col-sm-6 p-4 border"><h4>Aadhaar Card </h4><img src="${base_url}/document/credit/${jsonData.aadhaar_card}" alt="" class="img-fluid   w-100" style="height: 322px;">
                </div>
                <div class="col-sm-6 p-4 border"><h4>Pancard </h4><img src="${base_url}/document/credit/${jsonData.pancard}" alt="" class="img-fluid   w-100" style="height: 322px;">
                </div>`;
                if (jsonData.incorporation!="") {
                  creditdoc += `  <div class="col-sm-6 p-4 border"><h4>Incorporation</h4><img src="${base_url}/document/credit/${jsonData.incorporation}" alt="" class="img-fluid   w-100" style="height: 322px;">
                  </div>`;
                }
              if (jsonData.moa !="") {
               creditdoc += `     <div class="col-sm-6 p-4 border"><h4>MOA</h4><img src="${base_url}/document/credit/${jsonData.moa}" alt="" class="img-fluid   w-100" style="height: 322px;">
               </div>`;
              }
              if (jsonData.partnership_deed !="") {
               creditdoc += `     <div class="col-sm-6 p-4 border"><h4>Partnership deed </h4><img src="${base_url}/document/credit/${jsonData.partnership_deed}" alt="" class="img-fluid  w-100" style="height: 322px;">
               </div>`;
              }
              creditdoc += ` </div>`;
              if (jsonData.bank_name !='') {
               creditdoc += ` <div class="row mt-4">  <div class="col-sm-6 d-flex gap-2"><h4 class="mx-2">Bank Name : </h4><p>${jsonData.bank_name}</p>
               </div>
               <div class="col-sm-6 d-flex gap-2"><h4 class="mx-2">Account No : </h4><p>${jsonData.accoutn_no}</p>
               </div>
               <div class="col-sm-6 d-flex gap-2"><h4 class="mx-2">IFSC : </h4><p>${jsonData.ifsc}</p>
               </div>
               <div class="col-sm-6 d-flex gap-2"><h4 class="mx-2">Branch Name : </h4><p>${jsonData.branch_name}</p>
               </div>`;
              }
               
               
                creditdoc += ` </div>
        </div>`;
        $('#credit_modal').html(creditdoc);
        $('#upload_credit_doc').modal('show');
               //    if(jsonData['success'] == 'true')
               //    {  
               //       if( (jsonData['orderdata']['total_price']-jsonData['orderdata']['discount']) > jsonData['amountrecieve']['payamount'])
               //       {
               //          $('.paymodelData').html('<form method="post" id="add_payment_form" >   <input type="hidden" name="orderid" id="orderid" class="form-control"> <input type="hidden" name="qty" id="qty" class="form-control"> <div class="mb-2"><input type="hidden" name="maxamount" id="maxamount" class="form-control"> <div class="mb-2">  <label>Amount Pay</label><span class="text-danger">*</span>  <input type="number" class="form-control" name="amount"  id="amount" min="0" max="" required>  <span class="text-danger size-7 e_amount"></span>  </div>   <div class="modal-footer">  <button type="button" class="btn btn-secondary close" data-bs-dismiss="modal">Close</button> <button type="submit" class="btn btn-primary">Submit</button></div> </form>');
               //       }
               //       else{
               //          $('.paymodelData').html('<a class="badge light badge-success badge-text-size view_btn align-center" href="javascript:void(0)" >Amount Paid Successfully</a>');
               //       }
               //       $('#billingamount').html(jsonData['orderdata']['total_price']);
               //       $('#paidamount').html(jsonData['amountrecieve']['payamount'] || '0');
               //       $('#discount').html(jsonData['orderdata']['discount']);

               //       $('#balance').html((jsonData['orderdata']['total_price'] - jsonData['orderdata']['discount']) - (jsonData['amountrecieve']['payamount'] || '0'));
               //       $('#orderid').val(jsonData['orderdata']['id']);
               //       $('#qty').val(jsonData['orderdata']['qty']);
               //       $('#amount').attr('max', (jsonData['orderdata']['total_price']- jsonData['orderdata']['discount']) - (jsonData['amountrecieve']['payamount'] || '0'));
               //       $('#maxamount').val((jsonData['orderdata']['total_price'] - jsonData['orderdata']['discount']) - (jsonData['amountrecieve']['payamount'] || '0'));
               //       $('#PaymentPayDetail').modal('show');

               // }
         },
       
      });
   
  
});

// ===========================================
$(document).on('click', '.paymentRecieveData', function (e) {

 var id = $(this).attr('tag');
   $.ajax({
         type: "POST",
         url: base_url+"get-paymentdata",
         data: { id: id},
        
         success: function (jsonData) {
         
            var jsonData = JSON.parse(jsonData);
          
                  if(jsonData['success'] == 'true')
                  {  
                     if( (jsonData['orderdata']['total_price'] - jsonData['orderdata']['discount']) != jsonData['amountrecieve']['recieveamount'])
                     { var amount = jsonData['orderdata']['total_price'] -  jsonData['amountrecieve']['recieveamount'];
                        $('.paymodelData').html('<br>Pending Amount <span  class="float-right text-danger">'+amount+'</span>');
                     }
                     else{
                        $('.paymodelData').html('<a class="badge light badge-success badge-text-size view_btn align-center" href="javascript:void(0)" >Amount Recieved Successfully</a>');
                     }
                     $('#billingamount').html(jsonData['orderdata']['total_price']);
                     $('#paidamount').html(jsonData['amountrecieve']['recieveamount'] || '0');
                     $('#discount').html(jsonData['orderdata']['discount']);
                     $('#PaymentPayDetail').modal('show');
                  }
         },
         
      });
   $('#responseid').val(id);
   $('#counterofferModal').modal('show');
  
});


$(document).on("submit", "#add_payment_form", function(e) {
   e.preventDefault();  
   e.stopImmediatePropagation();
  
   $.ajax({
         type: "POST",
         url: base_url+"submit-payment",
         data: new FormData(this),
        
         success: function (jsonData) {
           
            var jsonData = JSON.parse(jsonData);
            if (jsonData['error'] == true) 
               {
                  if (jsonData['amount'] !='') 
                  {
                     $('.e_amount').html(jsonData['amount']);
                  }
                  else
                  {
                     $('.e_amount').html('');
                  }

                 
               }
               else
               {
                  if(jsonData['success'] == 'true')
                  { 
                     

                     $('#add_payment_form').trigger('reset');
                      swal("Success", jsonData['message'], "success");
                      $('.close').trigger('click');

                  }
                 
                  
               }
            
         },
         cache: false,
         contentType: false,
         processData: false
      });
});


$(document).on('click', '.generateVehicleRequest', function (e) {
var id = $(this).attr('tag'); 
   $('#order_id').val(id);
   $('#generateVehicleRequestModal').modal('show');
  
});
$(document).on('click', '.generateVehicleRequestWastPaper', function (e) {
var id = $(this).attr('tag'); 
   $('#order_id1').val(id);
   $('#generateVehicleRequestModalWastPaper').modal('show');
  
});



$(document).on("submit", "#generate_vehiclerequest_form", function(e) {
   e.preventDefault();  
   e.stopImmediatePropagation();
   console.log(new FormData(this));
  
   $.ajax({
         type: "POST",
         url: base_url+"generate-vehiclerequest",
         data: new FormData(this),
        
         success: function (jsonData) {
          // alert(jsonData);
            var jsonData = JSON.parse(jsonData);
            if (jsonData['error'] == true) 
               {
                  // if (jsonData['sale_date'] !='') { $('.e_sale_date').html(jsonData['sale_date']); }
                  // else { $('.e_sale_date').html(''); }
               }
               else
               {
                  if(jsonData['success'] == 'true')
                  { 
                     $('.vno'+jsonData['oid']).html(jsonData['vno']);
                     $('.driver'+jsonData['oid']).html(jsonData['driver']);
                     $('.generateVehiclerequest'+jsonData['oid']).html('');
                     $('#generate_vehiclerequest_form').trigger('reset');
                      swal("Success", jsonData['message'], "success");
                       $('.close').trigger('click');
                       location.reload();
                  }
               }
         },
         cache: false,
         contentType: false,
         processData: false
      });
});



$(document).on('click', '.vehicleItemDelivered', function (e) {
    e.preventDefault();
    e.stopImmediatePropagation();
      swal({ title: "Are You Sure !!", 
        text: "You want to update recieving of this order vehicle !!", 
        type: "info", 
        showCancelButton: !0, 
        closeOnConfirm: !1, 
        showLoaderOnConfirm: !0 }).then((result)=> 
         {
          if (result.value) { 
            var id = $(this).attr('tag');
            var vid = $(this).attr('vid');
                 $.ajax({
                     url: base_url + 'update-vehicledelivery',
                     type: 'POST',
                     data: { id: id, vid:vid },
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


$(document).on('click', '.orderTracking', function (e) {
var id = $(this).attr('tag');
 $.post(base_url+'get-ordertracking', {id:id}, function(data){ 
      if(data){
       
        arr = JSON.parse(data);
        cdata = '';
        if(arr.success == true)
        {
            list = arr.list;
            cdata = '<div class="row size-5">';
            for(ii in list)
            { 
                cdata+= '<div class="col-12 size-5 text-black" >'+list[ii].description+'<span class="float-right">'+list[ii].added_date+'</span></div><br>';
            }
            cdata+= '</div>';
        } 
         else{
            cdata+= '<div><div class=" " >No Data</div></div>';
        }
         $('.tracking_data').html(cdata);
        
      }
    });
   $('#order_id').val(id);
   $('#orderTrackingModal').modal('show');
  
});

// ===========================================
$(document).on('click', '.viewOrderspecification', function (e) {
var id = $(this).attr('tag');
      $.ajax({
         type: "POST",
         url: base_url+"get-orderspecification",
         data: { id: id},
        
         success: function (jsonData) { 
            //alert(jsonData);
            var jsonData = JSON.parse(jsonData);
            var vs = jsonData.orderdata['vehiclestatus'];
        cdata = '';
        if(jsonData.success == true)
        { var i = 1; 
            list = jsonData.list;
            
            cdata = '<table class="table table-responsive-sm tabledata size-6"><thead class="text-center"><th>S.no</th><th>Requested Size</th><th>Requested Quantity</th></thead><tbody>';
            for(ii in list)
            { 
                cdata+= '<input type="hidden" name="trrateid[]" value="'+list[ii].id+'"><tr class="text-center"><td>'+i+'</td><td>'+list[ii].size+'</td><td>'+list[ii].quantity+'</td></tr>';
                i++;
            }
            cdata+= '</tbody></table>';
            
        }else{
         // $('#viewProductDescriptionModal').modal('show')
         cdata =`<a href="javascript:void(0)" class='btn btn-danger w-20 mx-auto d-block'>Size Request</a>`;
        }
          $('.vieworderspecificationdata').html(cdata);
         },
         
      });
   $('#orderid').val(id);
   $('#vieworderspecificationModal').modal('show');
  
});

$(document).on('click', '.selectlabel', function (e) {
    $(this).addClass('labelup');
    });


$(document).on('click', '.ConfirmSaleOrder', function (e) {
    e.preventDefault();
    e.stopImmediatePropagation();
      swal({ title: "Are You Sure !!", 
        text: "You want to Confirm this sale !!", 
        type: "info", 
        showCancelButton: !0, 
        closeOnConfirm: !1, 
        showLoaderOnConfirm: !0 }).then((result)=> 
         {
          if (result.value) { 
            var id = $(this).attr('tag');
         // alert(id);
                 $.ajax({
                     url: base_url + 'confirm-sale',
                     type: 'POST',
                     data: { id: id },
                     success: function (data) {
                         
                         var data = JSON.parse(data);
                         if (data['success'] == 'true') {
                             // $('#row' + id).fadeOut(1000, function () {
                             //     $('#row' + id).remove();
                             //     $(".row-id").each(function (i){
                             //    $(this).text(i+1); 
                             // });

                             // });
                            location.reload();
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




// function mynotificationfun(url){
//    let id = url.slice(17, 19);  
//    let newurl =  url.slice(0, 16); 
//    if(newurl=='view-listproduct'){
//        let title = 'view';
//        $("#r-id").val(id);
//        $("#titlev").val(title);
//        $.ajax({
//            type: "get",
//            url: base_url + "checkUserListId?id=" + id+"&title="+title,
//            data: {},
//            success: function (jsonData) {
//                console.log(jsonData);
//                var jd = JSON.parse(jsonData);
//                if (jd.is_empty == 0) {
//                    $('#userlist_request_modal').modal('show');
//                } else {
//                    let rid = jd.id;
                  
//                    if(jd.title=='view'){
//                        var id = $(this).attr('tag');
//                        var newUrl = base_url + "view-listproduct/" + rid;
//                        changeURL(newUrl, "Paper View List Product");
//                        location.reload() 
//                        getViewListProduct(id);
//                    }
//                }
//            }
//        })

//    }else{
//        window.location = base_url+url;
//    }
  
// }

$(document).on('click', '.complaintResolve', function (e) {
   e.preventDefault();
   e.stopImmediatePropagation();
     swal({ title: "Are You Sure !!", 
       text: "You want to Resolve Complain !!", 
       type: "info", 
       showCancelButton: !0, 
       closeOnConfirm: !1, 
       showLoaderOnConfirm: !0 }).then((result)=> 
        {
         if (result.value) { 
           var id = $(this).attr('tag'); 
                $.ajax({
                    url:`${base_url}/complainResolve`,
                    type: 'POST',
                    data: { id: id },
                    success: function (data) { 
                        var data = JSON.parse(data);
                        if (data['success'] == 'true') { 
                           swal("Success", data['message'], "success"); 
                        }
                        else {
                            swal("Success", data['message'], "error");
                        }
                        // location.reload();
           }
       });
    }
    // else{
    //   swal({ title: "Error", text: "Deleting Product Cancelled", timer: 2e3, showConfirmButton: !1 })
    // }

    })
    
});
$(document).on('click', '.complaintReject', function (e) {
   e.preventDefault();
   e.stopImmediatePropagation();
     swal({ title: "Are You Sure !!", 
       text: "You want to Reject Complain !!", 
       type: "info", 
       showCancelButton: !0, 
       closeOnConfirm: !1, 
       showLoaderOnConfirm: !0 }).then((result)=> 
        {
         if (result.value) { 
              let opsid = $(this).attr('tag'); 
              $('#opsId').val(opsid);
            $('#conplaintModal').modal('show');
         //        $.ajax({
         //            url:'',
         //            type: 'POST',
         //            data: { id: id, vid:vid },
         //            success: function (data) {
                        
         //                var data = JSON.parse(data);
         //                if (data['success'] == 'true') {
         //                    $('#row' + id).fadeOut(1000, function () {
         //                        $('#row' + id).remove();
         //                        $(".row-id").each(function (i){
         //                       $(this).text(i+1); 
         //                    });

         //                    });
         //                   swal("Success", data['message'], "success");

         //                }
         //                else {
         //                    swal("Success", data['message'], "error");
         //                }
         //          }
         //       });
    }
    // else{
    //   swal({ title: "Error", text: "Deleting Product Cancelled", timer: 2e3, showConfirmButton: !1 })
    // }

    })
    
});

$(document).on('submit', '#complainForm', function (e) {
   e.preventDefault();
   let id = $('#opsId').val();
   let com_rej = $('#complain_rej_reason').val();
   // alert(id);
   // alert(com_rej)
      $.ajax({
                 url:`${base_url}/complainResponse`,
                 type: 'POST',
                 data:{ id: id, com_rej:com_rej },
                 success: function (data) {
                    var data = JSON.parse(data);
                    console.log(data.success);
                     if (data['success'] == 'true') {
                          
                        swal("Success", data['message'], "success");
                        $('#conplaintModal').modal('hide');
                        $('#complainForm').trigger('reset')

                     }
                     else {
                         swal("Success", data['message'], "error");
                     }
               }
            });
});