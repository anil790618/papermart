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
                                       <td>

                                     
                                         <?php  if($value['order_status'] ==1 ){ if($value['order_type'] ==2 ){ ?> <a class="paymentRecieveData badge light badge-info badge-text-size view_btn" href="javascript:void(0)" tag="<?=$value['id'];?>" title="Payment Deatils"><i class="fa fa-credit-card"></i></a>
                                         
                                         <span class="statusdata"> <?php if($value['vehiclestatus'] >= '4'){  ?> <a class="badge light badge-warning badge-text-size  dispatch-outfordelivery" href="javascript:void(0)" tag="<?=$value['id'];?>"><i class="fa fa-truck"></i></a> <?php } else{ ?> <a class="badge light badge-warning badge-text-size  viewOrderspecification" href="javascript:void(0)" tag="<?=$value['id'];?>" title="Order Specification"><i class="fa fa-info"></i></a> <?php } ?></span>

                                          <span class="vehiclerequest<?=$value['id']?>"> <?php if($value['dtype'] == '0' and $value['vehiclestatus'] == '0'){ ?> <a class="sendVehicleRequest badge light badge-warning badge-text-size view_btn" href="javascript:void(0)" tag="<?=$value['id'];?>" lid="<?=$value['list_id'];?>" title="Generate Request to send vehicle"><i class="fa fa-send"></i></a> <?php }?></span>
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
