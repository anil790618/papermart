// ===========================================


$(document).on('keyup','#vehicle_no',function() 
   {
      var vehicle_no = $(this).val().trim().toUpperCase();
      $(this).val(vehicle_no);
     
   })




$(document).on("submit", "#add_vehicle_form", function(e) {
   e.preventDefault();  
   e.stopImmediatePropagation();
 
   $.ajax({
         type: "POST",
         url: base_url+"submit-vehicle",
         data: new FormData(this),
        
         success: function (jsonData) {
           
            var jsonData = JSON.parse(jsonData);
            if (jsonData['error'] == true) 
               {
                  if (jsonData['vehicle_no'] !='') 
                  {
                     $('#vehicle_no').siblings(".wizard-form-error").slideDown();
                     $('.e_vehicle_no').html(jsonData['vehicle_no']);
                  }
                  else
                  {
                     $('#vehicle_no').siblings(".wizard-form-error").slideUp();
                     $('.e_vehicle_no').html('');
                  }

                  if (jsonData['vehicle_company_name'] !='') 
                  {
                     $('#vehicle_company_name').siblings(".wizard-form-error").slideDown();
                     $('.e_vehicle_company_name').html(jsonData['vehicle_company_name']);
                  }
                  else
                  {
                     $('#vehicle_company_name').siblings(".wizard-form-error").slideUp();
                     $('.e_vehicle_company_name').html('');
                  }

                  if (jsonData['transporter_name'] !='') 
                  {
                     $('#transporter_name').siblings(".wizard-form-error").slideDown();
                     $('.e_transporter_name').html(jsonData['transporter_name']);
                  }
                  else
                  {
                     $('#transporter_name').siblings(".wizard-form-error").slideUp();
                     $('.e_transporter_name').html('');
                  }

                  if (jsonData['vehicle_type'] !='') 
                  {
                     $('#vehicle_type').siblings(".wizard-form-error").slideDown();
                     $('.e_vehicle_type').html(jsonData['vehicle_type']);
                  }
                  else
                  {
                     $('#vehicle_type').siblings(".wizard-form-error").slideUp();
                     $('.e_vehicle_type').html('');
                  }

                  if (jsonData['description'] !='') 
                  {
                     $('#description').siblings(".wizard-form-error").slideDown();
                     $('.e_description').html(jsonData['description']);
                  }
                  else
                  {
                     $('#description').siblings(".wizard-form-error").slideUp();
                     $('.e_description').html('');
                  }

                  if (jsonData['width_vehicle'] !='') 
                  {
                     $('#width_vehicle').siblings(".wizard-form-error").slideDown();
                     $('.e_width_vehicle').html(jsonData['width_vehicle']);
                  }
                  else
                  {
                     $('#width_vehicle').siblings(".wizard-form-error").slideUp();
                     $('.e_width_vehicle').html('');
                  }

                  if (jsonData['depth_vehicle'] !='') 
                  {
                     $('#depth_vehicle').siblings(".wizard-form-error").slideDown();
                     $('.e_depth_vehicle').html(jsonData['depth_vehicle']);
                  }
                  else
                  {
                     $('#depth_vehicle').siblings(".wizard-form-error").slideUp();
                     $('.e_depth_vehicle').html('');
                  }

                  if (jsonData['capicity'] !='') 
                  {
                     $('#capicity').siblings(".wizard-form-error").slideDown();
                     $('.e_capicity').html(jsonData['capicity']);
                  }
                  else
                  {
                     $('#capicity').siblings(".wizard-form-error").slideUp();
                     $('.e_capicity').html('');
                  }


                  if (jsonData['time_permited'] !='') 
                  {
                     $('#time_permited').siblings(".wizard-form-error").slideDown();
                     $('.e_time_permited').html(jsonData['time_permited']);
                  }
                  else
                  {
                     $('#time_permited').siblings(".wizard-form-error").slideUp();
                     $('.e_time_permited').html('');
                  }


                  if (jsonData['areas_permited'] !='') 
                  {
                     $('#areas_permited').siblings(".wizard-form-error").slideDown();
                     $('.e_areas_permited').html(jsonData['areas_permited']);
                  }
                  else
                  {
                     $('#areas_permited').siblings(".wizard-form-error").slideUp();
                     $('.e_areas_permited').html('');
                  }

                  
                 
               }
               else
               {
                  if(jsonData['success'] == 'true')
                  { 
                     var i = $('#producttype_tbale').find('tr').length;
                     
                     $('#add_vehicle_form').trigger('reset');
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
                  }
                 
                  
               }
            
         },
         cache: false,
         contentType: false,
         processData: false
      });
});

$(document).on('click', '.vehicleAlot', function (e) {
   var oid = $(this).attr('oid');
   var id = $(this).attr('tag');
   $('#trid').val(id);
    $('#oid').val(oid);

   $('#updatetransportrequestModal').modal('show');
 
});

// ===========================================


$(document).on("submit", "#update_transportrequest_form", function (e) {

   e.preventDefault();  
   e.stopImmediatePropagation();

   $.ajax({
         type: "POST",
         url: base_url+"update-transportrequest",
         data: new FormData(this),
         beforeSend: function(){ 
            $('.disabled_submit').attr('disabled',true);
         },
         success: function (jsonData) {
           //alert(jsonData);
            var jsonData = JSON.parse(jsonData);
            if (jsonData['error'] == true) 
               { 
                  if (jsonData['vehicledetail'] !='') 
                  {
                     $('.e_vehicledetail').html(jsonData['vehicledetail']);
                  }
                  else
                  {
                     
                     if (jsonData['vehicle_id'] !='') 
                     { 
                        $('.e_vehicledetail').html(jsonData['vehicle_id']);
                        $('#vehicledetail').val('');
                       $(' .suggestionAra.vehicle').html('');
                     }
                     else
                     {
                        $('.e_vehicledetail').html('');
                     }
                  }
                 
                 
               }
               else
               {
                  if(jsonData['success'] == 'true')
                  { 
                    
                     $('#update_transportrequest_form').trigger('reset');
                     $('.close').trigger('click');
                     
                     swal("Success", jsonData['message'], "success");
                     $('.e_vehicledetail').html('');
                     location.reload();
                     
                  }
                 
                  
               }
           $('.disabled_submit').attr('disabled', false);
            
         },
         cache: false,
         contentType: false,
         processData: false
      });
});


$(document).on('click', '.sendtopickup', function (e) {

 var id = $(this).attr('tag');
  $.ajax({
      url: base_url + 'sendtopickup',
      type: 'POST',
      data: { id: id },
      success: function (data) {
         
          var data = JSON.parse(data);
          if (data['success'] == 'true') {

                swal("Success", data['message'], "success");
                $('.vehiclestatus').html('<a  href="javascript:void(0)" ><span class="badge light badge-danger badge-text-size">Out for Pickup</span></a>');
                    
          }
          else {
              swal("error", data['message'], "success");
          }
       }
   });
 
});


$(document).on('click', '.sendVehicleRequest', function (e) {
   var oid = $(this).attr('oid');
   var lid = $(this).attr('lid');
   $('#lid').val(lid);
    $('#oid').val(oid);
   
   $('#sendVehicleRequestModal').modal('show');
 
});

$(document).on('click', '.sendVehicleRequest', function (e) {
    e.preventDefault();
    e.stopImmediatePropagation();
    var oid = $(this).attr('oid');
    var lid = $(this).attr('lid'); 
    $.ajax({
      url: base_url + 'check-size-location?oid='+oid+'&lid='+lid,
      type: 'get',
      data: {},
      success: function (data) {
         console.log(data);
          
          var data = JSON.parse(data);
          if (data['status'] == 'true') {
               swal({ title: "Are You Sure !!", 
        text: "You want to Send vehicle request for this order !!", 
        type: "info", 
        showCancelButton: !0, 
        closeOnConfirm: !1, 
        showLoaderOnConfirm: !0 }).then((result)=> 
         {
          if (result.value) { 
            var id = $(this).attr('tag');
            // alert(id);
         
                 $.ajax({
                     url: base_url + 'send-vehiclerequest',
                     type: 'POST',
                     data: { id: id },
                     success: function (data) {
                         
                         var data = JSON.parse(data);
                         if (data['success'] == 'true') {
                           $('.vehiclerequest'+id).html('');
                            swal("Success", data['message'], "success");
                            location.reload();

                         }
                         else {
                             swal("Success", data['message'], "error");
                         }
            }
        });
     }
   

     })
          }
          else {
            //   swal("Size Required", data['message'], "error");
            // alert(data);
            $('#showsizeerror').modal('show');
          }
         //  location.reload();
}
});
// return false;
 
     
});



$(document).on("submit", "#edit_vehicle_form", function(e) {
   e.preventDefault();  
   e.stopImmediatePropagation();
 
   $.ajax({
         type: "POST",
         url: base_url+"update-vehicle",
         data: new FormData(this),
        
         success: function (jsonData) {
           
            var jsonData = JSON.parse(jsonData);
            if (jsonData['error'] == true) 
               {
                  if (jsonData['vehicle_no'] !='') 
                  {
                     $('#vehicle_no').siblings(".wizard-form-error").slideDown();
                     $('.e_vehicle_no').html(jsonData['vehicle_no']);
                  }
                  else
                  {
                     $('#vehicle_no').siblings(".wizard-form-error").slideUp();
                     $('.e_vehicle_no').html('');
                  }

                  if (jsonData['vehicle_company_name'] !='') 
                  {
                     $('#vehicle_company_name').siblings(".wizard-form-error").slideDown();
                     $('.e_vehicle_company_name').html(jsonData['vehicle_company_name']);
                  }
                  else
                  {
                     $('#vehicle_company_name').siblings(".wizard-form-error").slideUp();
                     $('.e_vehicle_company_name').html('');
                  }

                  if (jsonData['transporter_name'] !='') 
                  {
                     $('#transporter_name').siblings(".wizard-form-error").slideDown();
                     $('.e_transporter_name').html(jsonData['transporter_name']);
                  }
                  else
                  {
                     $('#transporter_name').siblings(".wizard-form-error").slideUp();
                     $('.e_transporter_name').html('');
                  }

                  if (jsonData['vehicle_type'] !='') 
                  {
                     $('#vehicle_type').siblings(".wizard-form-error").slideDown();
                     $('.e_vehicle_type').html(jsonData['vehicle_type']);
                  }
                  else
                  {
                     $('#vehicle_type').siblings(".wizard-form-error").slideUp();
                     $('.e_vehicle_type').html('');
                  }

                  if (jsonData['description'] !='') 
                  {
                     $('#description').siblings(".wizard-form-error").slideDown();
                     $('.e_description').html(jsonData['description']);
                  }
                  else
                  {
                     $('#description').siblings(".wizard-form-error").slideUp();
                     $('.e_description').html('');
                  }

                  if (jsonData['width_vehicle'] !='') 
                  {
                     $('#width_vehicle').siblings(".wizard-form-error").slideDown();
                     $('.e_width_vehicle').html(jsonData['width_vehicle']);
                  }
                  else
                  {
                     $('#width_vehicle').siblings(".wizard-form-error").slideUp();
                     $('.e_width_vehicle').html('');
                  }

                  if (jsonData['depth_vehicle'] !='') 
                  {
                     $('#depth_vehicle').siblings(".wizard-form-error").slideDown();
                     $('.e_depth_vehicle').html(jsonData['depth_vehicle']);
                  }
                  else
                  {
                     $('#depth_vehicle').siblings(".wizard-form-error").slideUp();
                     $('.e_depth_vehicle').html('');
                  }

                  if (jsonData['capicity'] !='') 
                  {
                     $('#capicity').siblings(".wizard-form-error").slideDown();
                     $('.e_capicity').html(jsonData['capicity']);
                  }
                  else
                  {
                     $('#capicity').siblings(".wizard-form-error").slideUp();
                     $('.e_capicity').html('');
                  }


                  if (jsonData['time_permited'] !='') 
                  {
                     $('#time_permited').siblings(".wizard-form-error").slideDown();
                     $('.e_time_permited').html(jsonData['time_permited']);
                  }
                  else
                  {
                     $('#time_permited').siblings(".wizard-form-error").slideUp();
                     $('.e_time_permited').html('');
                  }


                  if (jsonData['areas_permited'] !='') 
                  {
                     $('#areas_permited').siblings(".wizard-form-error").slideDown();
                     $('.e_areas_permited').html(jsonData['areas_permited']);
                  }
                  else
                  {
                     $('#areas_permited').siblings(".wizard-form-error").slideUp();
                     $('.e_areas_permited').html('');
                  }

                  
                 
               }
               else
               {
                  if(jsonData['success'] == 'true')
                  { 
                     var i = $('#producttype_tbale').find('tr').length;
                     
                    
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
                  }
                 
                  
               }
            
         },
         cache: false,
         contentType: false,
         processData: false
      });
});


// $(document).on('click', '.transportRateList', function (e) {
// var oid = $(this).attr('tag');
// var trid = $(this).attr('trid');
//       $.ajax({
//          type: "POST",
//          url: base_url+"get-transportRateList",
//          data: { oid: oid , trid:trid},
        
//          success: function (jsonData) {
//             //alert(jsonData);
//             var jsonData = JSON.parse(jsonData);
          
//         cdata = '<div class="text-black mb-2"> Rate Posted : <span class="float-right ">'+jsonData.orderdata['transport_cost']+'</span></div>';
//         if(jsonData.success == true)
//         { var i = 1; 
//             list = jsonData.list;

//             cdata+= '<table class="table table-responsive-sm tabledata size-6"><thead class="text-center"><th>S.no</th><th>Transporter Name</th><th>Rate Posted</th><th>Action</th></thead><tbody>';
//             for(ii in list)
//             {  
//                 cdata+= '<tr class="text-center"><td>'+i+'</td><td>'+list[ii].tname+'</td><td>'+list[ii].rate_offered+'</td><td> <a class="confirmtrRate" href="javascript:void(0)" tag="'+list[ii].id+'" ><span class="badge light badge-success badge-text-size"><i class="fa fa-check"></i></span></a> <a class="rejecttrRate" href="javascript:void(0)" tag="'+list[ii].id+'"  ><span class="badge light badge-danger badge-text-size"><i class="fa fa-times"></i></span></a></td></tr>';
//                 i++;
//             }
//             cdata+= '</tbody></table>';
           
           
//         }
//         else{
//              cdata+= 'No rate request recieved Yet';
//         }
//          $('.transportRequestRatelist').html(cdata);
         
//          },
         
//       });
  
//    $('#transportRequestRatelist').modal('show');
  
// });

// ===========================================
// $(document).on('click', '.sendOrderspecification', function (e) {
// var id = $(this).attr('tag');
//       $.ajax({
//          type: "POST",
//          url: base_url+"get-orderspecification",
//          data: { id: id},
        
//          success: function (jsonData) {
//             //alert(jsonData);
//             var jsonData = JSON.parse(jsonData);
          
//         cdata = '';
//         if(jsonData.success == true)
//         { var i = 1; 
//             list = jsonData.list;
//             cdata = '<table class="table table-responsive-sm tabledata size-6"><thead class="text-center"><th>S.no</th><th>Requested Size</th><th>Requested Quantity</th></thead><tbody>';
//             for(ii in list)
//             {  
//                 cdata+= '<tr class="text-center"><td>'+i+'</td><td>'+list[ii].size+'</td><td>'+list[ii].quantity+'</td></tr>';
//                 i++;
//             }
//             cdata+= '</tbody></table>';
//             $('.orderspecificationdata').html(cdata);
//            // $('.forderspecificationdata').html('');
//         }
         
//          },
         
//       });
//    $('#orderid').val(id);
//    $('#orderspecificationModal').modal('show');
  
// });




$(document).on('click', '.transportRateList', function (e) {
var oid = $(this).attr('tag');
var trid = $(this).attr('trid');
      $.ajax({
         type: "POST",
         url: base_url+"get-transportRateList",
         data: { oid: oid , trid:trid},
        
         success: function (jsonData) {
            //alert(jsonData);
            var jsonData = JSON.parse(jsonData);
          
        cdata = '<div class="text-black mb-2"> Rate Posted : <span class="float-right ">'+jsonData.orderdata['transport_cost']+'</span></div>';
        if(jsonData.success == true)
        { var i = 1; 
            list = jsonData.list;

            cdata+= '<table class="table  tabledata size-6"><thead class="text-center"><th>S.no</th><th>Transporter Name</th><th>Rate Posted</th><th>Action</th></thead><tbody>';
            for(ii in list)
            {  


               if(list[ii].status == 0){ var sdata = '<a class="confirmtrRate" href="javascript:void(0)" tag="'+list[ii].id+'" oid="'+oid+'" trid="'+trid+'"><span class="badge light badge-success badge-text-size"><i class="fa fa-check"></i></span></a> <a class="rejecttrRate" href="javascript:void(0)" tag="'+list[ii].id+'" oid="'+oid+'" trid="'+trid+'" ><span class="badge light badge-danger badge-text-size"><i class="fa fa-times"></i></span></a>'} 
             else   if(list[ii].status == 1){ var sdata = '<span class="text-success"> Confirmed</span>'} 
             else   if(list[ii].status == 2){ var sdata = '<span class="text-danger"> Cancelled</span>'} 
                cdata+= '<tr class="text-center"><td>'+i+'</td><td>'+list[ii].tname+'</td><td>'+list[ii].rate_offered+'</td><td> '+sdata+' </td></tr>';
                i++;
            }
            cdata+= '</tbody></table>';
           
           
        }
        else{
             cdata+= 'No rate request recieved Yet';
        }
         $('.transportRequestRatelist').html(cdata);
         
         },
         
      });
  
   $('#transportRequestRatelist').modal('show');
  
});

// ===========================================
$(document).on('click', '.sendtrPrice', function (e) {
var trid = $(this).attr('tag');
var oid = $(this).attr('oid');
$('.transportrequestratedata').html('');
      $.ajax({
         type: "POST",
         url: base_url+"get-trrate",
         data: { oid: oid ,  trid: trid},
        
         success: function (jsonData) {
            //alert(jsonData);
            var jsonData = JSON.parse(jsonData);
          
        cdata = '';

        if(jsonData.success == true)
        { var i = 1; 
             list = jsonData.list;
             if(list.status == 0){ var sdata = '<span> Pending</span>'} 
             else   if(list.status == 1){ var sdata = '<span class="text-success"> Confirmed</span>'} 
             else   if(list.status == 2){ var sdata = '<span class="text-danger"> Cancelled</span>'} 
            cdata = '<div class="modal-body  p-1"><table class="table  tabledata size-6"><thead class="text-center"><th>S.no</th><th>Transporter Name </th><th>Rate Offered</th><th>Action</th></thead><tbody><tr class="text-center"><td>'+i+'</td><td>'+list.tname+'</td><td>'+list.rate_offered+'</td><td>'+sdata+'</td></tr></tbody></table></div>';
            
            
        }
        else{
         cdata='<div class="modal-body  p-1"> <div class="mb-2">  <label>Fleet cost</label> <input  type="text" class="form-control form-control-sm"  name="transportation_cost" placeholder="Enter Fleet cost" >  <span class="text-danger size-7 e_transportation cost"></span>  </div> </div>   <div class="modal-footer "> <button type="button" class="btn btn-secondary close" data-bs-dismiss="modal">Close</button> <button type="submit" class="btn btn-primary">Submit</button> </div>';
        }

        $('.transportrequestratedata').html(cdata);
         
         },
         
      });
   $('#o_id').val(oid);
   $('#tr_id').val(trid);
   $('#sendratetransportrequestModal').modal('show');
  
});



$(document).on("submit", "#send_transportrequestrate_form", function (e) {

   e.preventDefault();  
   e.stopImmediatePropagation();

   $.ajax({
         type: "POST",
         url: base_url+"send-transportrequestrate",
         data: new FormData(this),
         beforeSend: function(){ 
            $('.disabled_submit').attr('disabled',true);
         },
         success: function (jsonData) {
           //alert(jsonData);
            var jsonData = JSON.parse(jsonData);
            if (jsonData['error'] == true) 
               { 
                  if (jsonData['vehicledetail'] !='') 
                  {
                     $('.e_vehicledetail').html(jsonData['vehicledetail']);
                  }
                 
               }
               else
               {
                  if(jsonData['success'] == 'true')
                  { 
                    
                     $('#send_transportrequestrate_form').trigger('reset');
                     $('.close').trigger('click');
                     
                     swal("Success", jsonData['message'], "success");
                     
                     
                  }
                 
                  
               }
           $('.disabled_submit').attr('disabled', false);
            
         },
         cache: false,
         contentType: false,
         processData: false
      });
});


$(document).on('click', '.confirmtrRate', function (e) {
    e.preventDefault();
    e.stopImmediatePropagation();
      swal({ title: "Are You Sure !!", 
        text: "You want to Confirm this Rate !!", 
        type: "info", 
        showCancelButton: !0, 
        closeOnConfirm: !1, 
        showLoaderOnConfirm: !0 }).then((result)=> 
         {
          if (result.value) { 
            var id = $(this).attr('tag');
           
         
                 $.ajax({
                     url: base_url + 'confirmtr-rate',
                     type: 'POST',
                     data: { id: id },
                     success: function (data) {
                         
                         var data = JSON.parse(data);
                         if (data['success'] == 'true') {
                             $('.close').trigger('click');
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



$(document).on('click', '.rejecttrRate', function (e) {
    e.preventDefault();
    e.stopImmediatePropagation();
      swal({ title: "Are You Sure !!", 
        text: "You want to Reject this Rate !!", 
        type: "info", 
        showCancelButton: !0, 
        closeOnConfirm: !1, 
        showLoaderOnConfirm: !0 }).then((result)=> 
         {
          if (result.value) { 
            var id = $(this).attr('tag');
           
         
                 $.ajax({
                     url: base_url + 'rejecttr-rate',
                     type: 'POST',
                     data: { id: id },
                     success: function (data) {
                         
                         var data = JSON.parse(data);
                         if (data['success'] == 'true') {
                             $('.close').trigger('click');
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