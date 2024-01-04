<div class="container-fluid"> 
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-div">
                        <div class="table-header-div">
                            <h4 class="tabel-title">Sales</h4>
                            <div class="tabel-link-btn ">
                               <ul class="nav nav_filter ">
                                    <li class="nav-item text-end">
                                       <a href="javascript:void(0)" class="addpurchase-text addsale" >Add Sale</a>
                                      
                                    </li>
                                </ul> 
                            </div>
                        </div>
                        <div class="tabel-body-div">
                            <div class="table-responsive">
                            
                              <div  id="table" >
                                 <table id="producttype_tbale" class="table table-responsive-md tabledata size-6">
                               <tr>
                                   <th>S.No</th>
                                   <th>#Sale</th>
                                   <th>Quantity</th>
                                   <th>Total Price</th>
                                   <th>Sale Date</th>
                                   <th>Client Detail</th>
                                   <th>Delivery Date</th>
                                    <th>Vehicle No</th>
                                   <th>Driver Name</th>
                                   <th>Action</th>
                               </tr>
                              
                           <?php
                           if ($query) 
                           {$i=1;
                               foreach ($query as $value)  
                               { 
                               
                                   ?>
                                   <tr>
                                       <td><?=$i;?></td>
                                       <td><?=$value['order_number']?></td>
                                       <td><?=$value['qty'];?></td>
                                       <td><?=$value['total_price']?></td>
                                       <td><?=$value['order_date']?></td>
                                       <td><?=$value['order_to_name']  ?> </td>
                                       <td><?=$value['delivery_date']?></td>
                                       <td><?=$value['vno']?></td>
                                       <td><?=$value['driver_name']?> , <?=$value['driver_phone_number']?></td>
                                       <td><?php
                                     if(!empty($value['subcategory'])){
                                         if ($value['subcategory']==28 ||$value['subcategory'] == 29) {
                                             ?>
                                             <a class="badge light badge-secondary badge-text-size  generateVehicleRequestWastPaper" href="javascript:void(0)" subcat="<?=$value['subcategory'];?>" tag="<?=$value['id'];?>">Dispatch </a>
                                             <?php
                                         }
                                     }
                                       
                                     ?>
                                    
                                  
                                      <?php  if($value['order_status'] ==1 ){ if($value['order_type'] ==2 ){ ?>
                                         <?php 
                                         if($value['payment_terms']==0){ 
                                             $id = $value['list_id'];
                                             $oid = !empty($value['order_id'])??'';
                                             echo '<a onclick="advancePaymentRequest('.$id.','.$oid.')"  class=" advancePaymentRequest badge light badge-info badge-text-size view_btn" href="javascript:void(0)" tag="" title="Advance Payment Deatils"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 320 512"><path d="M0 64C0 46.3 14.3 32 32 32H96h16H288c17.7 0 32 14.3 32 32s-14.3 32-32 32H231.8c9.6 14.4 16.7 30.6 20.7 48H288c17.7 0 32 14.3 32 32s-14.3 32-32 32H252.4c-13.2 58.3-61.9 103.2-122.2 110.9L274.6 422c14.4 10.3 17.7 30.3 7.4 44.6s-30.3 17.7-44.6 7.4L13.4 314C2.1 306-2.7 291.5 1.5 278.2S18.1 256 32 256h80c32.8 0 61-19.7 73.3-48H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H185.3C173 115.7 144.8 96 112 96H96 32C14.3 96 0 81.7 0 64z"/></svg></a>';
                                         
                                         }else{
                                             $id = $value['list_id'];
                                             $oid = !empty($value['order_id'])??'';
                                             echo '<a onclick="askforcredit('.$id.','.$oid.')"  class="  badge light badge-info badge-text-size view_btn" href="javascript:void(0)" tag="" title="Ask for Upload Credit details Deatils"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-credit-card-2-front" viewBox="0 0 16 16">
                                                 <path d="M14 3a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12zM2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2z"/>
                                                 <path d="M2 5.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0    0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z"/>
                                             </svg> </a>';
                                         } 
                                         ?> 
                                         <?php
if ($value['added_by']==3) {
    
} else {
    ?>
 <span class="statusdata"> <?php if($value['vehiclestatus'] >= '4'){  ?> <a class="badge light badge-warning badge-text-size  dispatch-outfordelivery" href="javascript:void(0)" tag="<?=$value['id'];?>"><i class="fa fa-truck"></i></a> <?php } else{ ?> <a class="badge light badge-warning badge-text-size  viewOrderspecification" href="javascript:void(0)" tag="<?=$value['id'];?>" title="Order Specification"><i class="fa fa-info"></i></a> <?php } ?></span>

    <?php
}

                                         ?>
                                     
                                     <span class="vehiclerequest<?=$value['id']?>"> 
                                        <?php if($value['dtype'] == '0' and $value['vehiclestatus'] == '0'){ ?>
                                             <a class="generateVehicleRequest badge light badge-warning badge-text-size view_btn" href="javascript:void(0)" addedby="<?=$value['added_by']?>" tag="<?=$value['id'];?>"  lid="<?=$value['list_id'];?>" title="Generate Request to send vehicle"><i class="fa fa-send"></i></a> 
                                             <!-- <a class="sendVehicleRequest badge light badge-warning badge-text-size view_btn" href="javascript:void(0)" addedby="<?=$value['added_by']?>" tag="<?=$value['id'];?>"  lid="<?=$value['list_id'];?>" title="Generate Request to send vehicle"><i class="fa fa-send"></i></a>  -->
                                             <?php }?>
                                    </span>
                                     <!-- *********************************************************************************** -->
                                     <span class="generateVehiclerequest<?=$value['id']?>" >
                                         <?php if($value['dtype'] == '0' and $value['vehiclestatus'] == '1'){  ?> 
                                             <a class="badge light badge-secondary badge-text-size  generateVehicleRequest" href="javascript:void(0)" tag="<?=$value['id'];?>">Generate vehicle  request</a>
                                             <?php } ?>
                                         </span>
                                         <!-- *********************************************************************************** -->

                                           <?php if (!empty($value['trid'])) {  ?> <a class="badge light badge-secondary badge-text-size  transportRateList" href="javascript:void(0)" tag="<?= $value['id']; ?>" trid="<?= $value['trid']; ?>" title="view price list"><i class="fa fa-dollar"></i></a> <?php } ?>


                                        <a class="orderTracking badge light badge-info badge-text-size view_btn" href="javascript:void(0)" tag="<?=$value['id'];?>" title="Order Tracking"><i class="fa fa-map-marker"></i></a><?php } 
                                         else if($value['order_type'] ==1) {  } }  else if($value['order_status'] ==0) { echo ' <a class="badge light badge-danger badge-text-size  ConfirmSaleOrder" href="javascript:void(0)" tag="'.$value['id'].'" >Confirm Sale</a>'; } ?>
                                        <?php if($value['vehiclestatus'] ==5) { 
                                          $dimage = base_url().'/document/product/'.$value['dispatchimage']; 
                                          $gir = base_url().'/document/product/'.$value['girimage'];
                                          $ebay = base_url().'/document/product/'.$value['ebayimage'];
                                          $invoice = base_url().'/document/product/'.$value['invoiceimage'];
                                          $einvoice = base_url().'/document/product/'.$value['einvoiceimage']; 
                                          $packing = base_url().'/document/product/'.$value['packingslipimage'];
                                          ?> 
                                         <a class="viewSaleInvoice badge light badge-danger badge-text-size view_btn" href="javascript:void(0)" tag="<?=$value['id'];?>" title="View Invoice"><i class="fa fa-file-pdf-o "></i></a> <br>
                                         <a class="mt-1 badge light badge-info badge-text-size view_btn" href="<?=$dimage?>" target="_blank"  title="View Dispatch Image"><i class="fa fa-file-pdf-o "></i></a>  
                                         <a class="mt-1 badge light badge-warning badge-text-size view_btn" href="<?=$gir?>" target="_blank" title="View Gir"><i class="fa fa-file-pdf-o "></i></a> 
                                         <a class="mt-1 badge light badge-primary badge-text-size view_btn" href="<?=$ebay?>" target="_blank" title="View Ebay"><i class="fa fa-file-pdf-o "></i></a> 
                                         <a class="mt-1 badge light badge-danger badge-text-size view_btn" href="<?=$invoice?>" target="_blank" title="View Invoice"><i class="fa fa-file-pdf-o "></i></a> 
                                         <a class="mt-1 badge light badge-secondary badge-text-size view_btn" href="<?=$einvoice?>" target="_blank" title="View eInvoice"><i class="fa fa-file-pdf-o "></i></a> 
                                         <a class=" badge light badge-dark badge-text-size view_btn" href="<?=$packing?>" target="_blank" title="View Packing"><i class="fa fa-file-pdf-o "></i></a> <br>
                                       
                                         <?php } ?>
                                       </td>
                                   </tr>
                               <?php
                               $i++;
                            //    print_r($value);
                               }
                              
                           }
                           else
                           {
                               ?>
                               <tr>
                                   <td colspan="4">No Data</td>
                               </tr>
                               <?php
                           }?>

                           <!-- <?=print_r($query)?>
                           <?="***********************************************************************"?>
                           <?=print_r($query1)?> -->
                            </table>
                              </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
 <div class="modal fade " id="orderspecificationModal" tabindex="-1" aria-labelledby="orderspecificationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="overflow-x:auto">
            <div class="modal-header">
                <h4 class="card-title">Order Invoice Details</h4>
                 <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span class="text-danger" aria-hidden="true">&times;</span></button>
            </div>
            <form method="post" id="send_orderspecification_form" >
                <input type="hidden" name="orderid" id="orderid" class="form-control">
                <div class="modal-body  p-1 ">
                    <div class="orderspecificationdata"></div>
                     <div class="form-group p-3  col-md-12 osimagedata">
                           
                        </div>
                    
                </div>
                <div class="modal-footer osfooter">
                    
                </div>
            </form>
        </div>
    </div>
</div>      

<div class="modal fade " id="PaymentPayDetail" tabindex="-1" aria-labelledby="PaymentPayDetailLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="card-title"> Payment Pay Detail </h4>
                 <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span class="text-danger" aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body counterdata p-4">
                Total Billing Amount <span id="billingamount" class="float-right"></span><br>
                Total Amount Paid <span id="paidamount" class="float-right"></span><br>
                Total Discount <span id="discount" class="float-right"></span>
                 <span class="paymodelData"></span>
            </div>
        </div>
    </div>
</div>  

<div class="modal fade " id="transportRequestRatelist" tabindex="-1" aria-labelledby="transportRequestRatelistLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="card-title">Transport Request rates </h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span class="text-danger" aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body transportRequestRatelist p-4">


                <span class="paymodelData"></span>
            </div>
        </div>
    </div>
</div>


<!-- 
<div class="modal fade " id="sendVehicleRequestModal" tabindex="-1" aria-labelledby="sendVehicleRequestModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="card-title"> Payment Pay Detail </h4>
                 <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span class="text-danger" aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body counterdata p-4">
               <div class=" mb-0  ">
                    <label>Transport Mode</label><span class="text-danger">*</span>
                    <select  class="form-control" id="transport_type" name="transport_type" required>
                        <option value="" selected>Choose</option>
                        <option value="1" >Self Alocation </option>
                        <option value="2" >By Transporter </option>
                    </select>
                   
                </div>
                
                <div class="col-12 mt-2">
                    <div class="form-row transportresponse"  style="display:none;" >
                        <div class="form-group mb-0  col-md-6">
                            <label>Search Vehicle</label><span class="text-danger">*</span>
                            <input type="text" class="form-control  form-control-sm " name="vehicledetail" id="vehicledetail" tag="1"  autocomplete="off" placeholder="Enter vehicle number" >
                            <div class="suggestionAra vehicle"></div>
                                <input type="hidden" name="vehicle_id" id="vehicle_id" >
                            <span class="text-danger size-7 e_vehicledetail"></span>
                        </div>
                        <div class="form-group mb-0  col-md-6">
                            <label>Driver Name</label>
                           <input  type="text" class="form-control form-control-sm"  name="driver_name" placeholder="Enter Driver Name" >
                            <span class="text-danger size-7 e_driver_name"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->

<div class="modal fade " id="generateVehicleRequestModal" tabindex="-1" aria-labelledby="generateVehicleRequestModalLabel" aria-hidden="true">
 <div class="modal-dialog ">
     <div class="modal-content">
         <div class="modal-header">
             <h4 class="card-title">Vehicle alocation</h4>
             <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span class="text-danger" aria-hidden="true">&times;</span></button>
         </div>
         <form method="post" id="generate_vehiclerequest_form">
             <input type="hidden" name="orderid" id="order_id" class="form-control">
             <div class="modal-body  p-3">
                 <div class="   col-12">
                 
                     <label>Transport Mode</label><span class="text-danger">*</span>
                     <select class="form-control" id="transport_type" name="transport_type" required>
                         <option value="" selected>Choose</option>
                         <option value="1">Self Alocation </option>
                         <option value="2">By Transporter </option>
                     </select>

                 </div>
                 <div class="mt-2 col-12">
                     <div class="form-row transportresponse" style="display:none;">
                         <div class="mb-0 col-12">
                             <label>Search Vehicle</label><span class="text-danger">*</span>
                             <input type="text" class="form-control  form-control-sm " name="vehicledetail" id="vehicledetail" tag="1" autocomplete="off" placeholder="Enter vehicle number">
                             <div class="suggestionAra vehicle"></div>
                             <input type="hidden" name="vehicle_id" id="vehicle_id">
                             <span class="text-danger size-7 e_vehicledetail"></span>
                         </div>
                         <div class=" mb-0  col-12">
                             <label>Driver Name</label>
                             <input type="text" class="form-control form-control-sm" name="driver_name" placeholder="Enter Driver Name">
                             <span class="text-danger size-7 e_driver_name"></span>
                         </div>
                         <div class=" mb-0  col-12">
                             <label>Driver Phone number</label>
                             <input type="text" class="form-control form-control-sm" name="driver_phone_number" placeholder="Enter Driver Name">
                             <span class="text-danger size-7 e_driver_phone_number"></span>
                         </div>
                         <div class=" mb-0  col-12">
                             <label>Fleet Charges</label>
                             <input type="text" class="form-control form-control-sm" name="transport_cost" placeholder="Enter Fleet Charges">
                             <span class="text-danger size-7 e_transport_cost"></span>
                         </div>
                     </div>
                 </div>
                 
                 <div class=" mb-0  col-12">
                     <label>Pick Up Date</label>
                     <input type="date" class="form-control form-control-sm" name="transport_date" placeholder="Enter Fleet Charges">
                     <span class="text-danger size-7 e_transport_cost"></span>
                 </div>

             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary close" data-bs-dismiss="modal">Close</button>
                 <button type="submit" class="btn btn-primary">Submit</button>
             </div>
         </form>
     </div>
 </div>
</div>

 <div class="modal fade " id="orderTrackingModal" tabindex="-1" aria-labelledby="orderTrackingModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="card-title">Order Tracking</h4>
                 <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span class="text-danger" aria-hidden="true">&times;</span></button>
            </div>
           
                <input type="hidden" name="orderid" id="order_id" class="form-control">
                <div class="modal-body  tracking_data p-0">
                 

                </div>
               
            
        </div>
    </div>
</div>      


<div class="modal fade " id="vieworderspecificationModal" tabindex="-1" aria-labelledby="vieworderspecificationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
            <div class="modal-header">
                <h4 class="card-title">Order Specification Required</h4>
                 <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span class="text-danger" aria-hidden="true">&times;</span></button>
            </div>
            
                <input type="hidden" name="orderid" id="orderid" class="form-control">
                <div class="modal-body vieworderspecificationdata p-1">
                 

                </div>
               
        </div>
    </div>
</div>   
<!-- Modal -->
<div class="modal fade" id="showsizeerror" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
 <div class="modal-content">
   <div class="modal-header">
     <h5 class="modal-title fs-5" id="exampleModalLabel">Send Size Request</h5>
     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
   </div>
   <div class="modal-body">
     <!-- <a href="javascript:void(0)" class='btn btn-primary'>Send</a> -->
     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Send</button>
   </div>
   <!-- <div class="modal-footer">
     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
     <button type="button" class="btn btn-primary">Save changes</button>
   </div> -->
 </div>
</div>
</div>