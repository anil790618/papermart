<?php 
use App\Models\Main_model; 
$this->main_model = new Main_model();
?>
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-12">
            <div class="table-div">
                <div class="table-header-div">
                    <h4 class="tabel-title">Purchases</h4>
                    <div class="tabel-link-btn">
                        <ul class="nav nav_filter ">
                            <li class="nav-item text-end">
                                <a href="javascript:void(0)" class="addpurchase-text addPurchase">Add Purchase</a>

                            </li>
                        </ul>
                    </div>
                </div>
                <div class="tabel-body-div">
                    <div class="table-responsive tabel-height">

                        <div id="table">
                            <table id="producttype_tbale" class="table table-responsive-md tabledata size-6">
                                <thead>
                                    <th>S.No</th>
                                    <th>purchase</th>
                                    <th>Quantity</th>
                                    <th>Total Price</th>
                                    <th>Purchase Date</th>
                                    <th>Delivery Date</th>
                                    <!-- <th>Client Detail</th> -->
                                    <th>Vehicle No</th>
                                    <th>Driver Name</th>
                                    <th>Action</th>
                                </thead>

                                <?php
                                if ($query) {
                                    $i = 1;
                                    foreach ($query as $value) { 
                                    $pur_Id = $value['id'];

                                ?>
                                <tr>
                                    <td>
                                        <?= $i; ?>
                                    </td>
                                    <td>
                                        <?= $value['order_number']??0 ?>
                                    </td>
                                    <td>
                                        <?= $value['qty']??0; ?>
                                    </td>
                                    <td>
                                        <?= $value['total_price']??0 ?>
                                    </td>
                                    <td>
                                        <?= $value['order_date']??0 ?>
                                    </td>
                                    <td>
                                        <?= $value['delivery_date']??0 ?>
                                    </td>
                                    <!-- <td>
                                        <?= $value['order_to_name']??0  ?>
                                    </td> -->
                                    <td class="vno<?= $value['id']??0 ?>">
                                        <?= $value['vno']??0 ?>
                                    </td>
                                    <td class="driver<?= $value['id']??0 ?>">
                                        <?= $value['driver_name']??'' ?>,
                                        <?= $value['driver_phone_number']??"" ?>
                                    </td>
                                    <td>
                                        <?php if ($value['order_status']??0 == 1) { if ($value['order_type'] == 2) { ?>
                                        <?php
                                        if ($value['order_rem']??0 == 1){
                                        
                                        }
                                        if ($value['order_rem']??0 == 2){
                                         
                                        ?>
                                        <a class=" badge light badge-info badge-text-size " id="creditDocBtn"
                                            href="javascript:void(0)" tag="<?= $value['id']; ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512">
                                                <path
                                                    d="M320 464c8.8 0 16-7.2 16-16V160H256c-17.7 0-32-14.3-32-32V48H64c-8.8 0-16 7.2-16 16V448c0 8.8 7.2 16 16 16H320zM0 64C0 28.7 28.7 0 64 0H229.5c17 0 33.3 6.7 45.3 18.7l90.5 90.5c12 12 18.7 28.3 18.7 45.3V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64z" />
                                            </svg>
                                        </a>
                                        <?php
                                        }
                                    
                                    if($user_type == 0 && $value['order_rem'] == 3){
                                        ?>
                                        
                                        <a class=" badge light badge-info badge-text-size " id="ShowcreditDocBtn"
                                            href="javascript:void(0)" tag="<?= $value['id']; ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512">
                                                <path
                                                    d="M320 464c8.8 0 16-7.2 16-16V160H256c-17.7 0-32-14.3-32-32V48H64c-8.8 0-16 7.2-16 16V448c0 8.8 7.2 16 16 16H320zM0 64C0 28.7 28.7 0 64 0H229.5c17 0 33.3 6.7 45.3 18.7l90.5 90.5c12 12 18.7 28.3 18.7 45.3V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64z" />
                                            </svg>
                                        </a>
                                        <?php
                                    }else{
                                       
                                        ?>
                                       
                                        <?php
                                        
                                    }
                                    
                                    ?>
                                         
                                        <a class="paymentPayData badge light badge-info badge-text-size view_btn"
                                            href="javascript:void(0)" tag="<?= $value['id']; ?>">
                                            <i class="fa fa-credit-card"></i>
                                        </a>

                                        <span class="statusdata">
                                            <?php if($value['vehiclestatus']??0 >= '4'){  ?> 
                                                <!-- <a
                                                class="badge light badge-warning badge-text-size  dispatch-outfordelivery_purchase"
                                                href="javascript:void(0)" tag="<?=$value['id'];?>"><i
                                                    class="fa fa-truck"></i></a> -->
                                            <?php } else{ ?>
                                                 <!-- <a
                                                class="badge light badge-warning badge-text-size  viewOrderspecification"
                                                href="javascript:void(0)" tag="<?=$value['id'];?>"
                                                title="Order Specification"><i class="fa fa-info"></i></a> -->
                                            <?php } ?>
                                        </span>







                                        <span class="generateVehiclerequest<?= $value['id'] ?>">
                                            <?php if ($value['dtype'] == '0' and $value['vehiclestatus']??0 == '1') {  ?>
                                            <!-- <a class="badge light badge-secondary badge-text-size  generateVehicleRequest" href="javascript:void(0)" tag="<?= $value['id']; ?>">generate vehicle request</a>  -->
                                            <?php } ?>
                                        </span>
                                        <input type="hidden" id="listspecification" value='<?=json_encode($listspecification);?>'>
                                        <a class="badge light badge-warning badge-text-size  productSize_buyer"
                                            href="javascript:void(0)" tag="<?= $value['list_id']; ?>"><i
                                                class="fa fa-info"></i></a>
                                        <?php
                                        $listid=$value['list_id'];
                                            $is_size = $this->main_model->getQueryAllData(" select size from ordered_product_specification where list_id =$listid ");
                                            if(!$is_size){
                                        ?>
                                        <!-- <a class="badge light badge-warning badge-text-size  sendOrderspecificationedit"
                                            title="Add size" href="send-listresponse/<?= $value['list_id']; ?>"
                                            tag="<?= $value['id']; ?>"><i class="fa fa-pencil"></i></a> -->

                                        <?php
                                        }
                                    ?>

                                        <?php if (!empty($value['trid']) && $user_type !=2) {  ?> <a
                                            class="badge light badge-secondary badge-text-size  transportRateList"
                                            href="javascript:void(0)" tag="<?= $value['id']; ?>"
                                            trid="<?= $value['trid']; ?>" title="view price list"><i
                                                class="fa fa-dollar"></i></a>
                                        <?php } ?>

                                        <a class="orderTracking badge light badge-info badge-text-size view_btn"
                                            href="javascript:void(0)" tag="<?= $value['id']; ?>"
                                            title="Order Tracking"><i class="fa fa-map-marker"></i></a>
                                        <?php } else if ($value['order_type'] == 1) {     } } else if ($value['order_status']??0 == 0) {   echo ' <a class="badge light badge-danger badge-text-size  " href="javascript:void(0)">Pending For Final Approval by Seller</a>';  } ?>
                                        <?php if($value['vehiclestatus']??0 >= 5) {
                                            if (!empty($value['dispatchimage'])) {  
                                                         $dimage = base_url().'/document/product/'.$value['dispatchimage']; 
                                                         $gir = base_url().'/document/product/'.$value['girimage'];
                                                         $ebay = base_url().'/document/product/'.$value['ebayimage'];
                                                         $invoice = base_url().'/document/product/'.$value['invoiceimage'];
                                                         $einvoice = base_url().'/document/product/'.$value['einvoiceimage']; 
                                                         $packing = base_url().'/document/product/'.$value['packingslipimage']; ?> 
                                                <a class="viewpurchaseInvoice badge light badge-danger badge-text-size view_btn"
                                                    href="javascript:void(0)" tag="<?=$value['id'];?>" title="View Invoice"><i
                                                        class="fa fa-file-pdf-o "></i></a><br>
                                                <a class="mt-1 badge light badge-info badge-text-size view_btn"
                                                    href="<?=$dimage?>" target="_blank" title="View Dispatch Image"><i
                                                        class="fa fa-file-pdf-o "></i></a>
                                                <a class="mt-1 badge light badge-warning badge-text-size view_btn"
                                                    href="<?=$gir?>" target="_blank" title="View GR"><i
                                                        class="fa fa-file-pdf-o "></i></a>
                                                <a class="mt-1 badge light badge-primary badge-text-size view_btn"
                                                    href="<?=$ebay?>" target="_blank" title="View e-bay"><i
                                                        class="fa fa-file-pdf-o "></i></a>
                                                <a class="mt-1 badge light badge-secondary badge-text-size view_btn"
                                                    href="<?=$einvoice?>" target="_blank" title="View e-Invoice"><i
                                                        class="fa fa-file-pdf-o "></i></a>
                                                <a class="mt-1 badge light badge-dark badge-text-size packingslip"
                                                    href="javascript:void(0)" tag="<?=$value['id']?>"
                                                    title="View Packing Image"><i class="fa fa-file-pdf-o "></i></a>
                                        <?php }} ?>
                                    </td>
                                </tr>
                                <?php
                                        $i++;
                                        // echo "<pre>";
                                        // print_r($value);
                                        
                                    }
                                } else {
                                    ?>
                                <tr>
                                    <td colspan="10">No Data</td>
                                </tr>
                                <?php
                                } ?>
                            </table>
                            <!-- <?="***********************************************************************"?>
                           <?=print_r($query)?> -->
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <?php

        ?>
    </div>
</div>

<div class="modal fade " id="PaymentPayDetail" tabindex="-1" aria-labelledby="PaymentPayDetailLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="card-title"> Payment Pay Detail </h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span class="text-danger"
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body counterdata p-4">
                Total Billing Amount <span id="billingamount" class="float-right"></span><br>
                Total Amount Paid <span id="paidamount" class="float-right"></span><br>
                Total Discount <span id="discount" class="float-right"></span><br>
                Total Balance Amount <span id="balance" class="float-right text-danger"></span>
                <span class="paymodelData"></span>
            </div>
        </div>
    </div>
</div>



<div class="modal fade " id="generateVehicleRequestModal" tabindex="-1"
    aria-labelledby="generateVehicleRequestModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="card-title">Vehicle alocation</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span class="text-danger"
                        aria-hidden="true">&times;</span></button>
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
                                <input type="text" class="form-control  form-control-sm " name="vehicledetail"
                                    id="vehicledetail" tag="1" autocomplete="off" placeholder="Enter vehicle number">
                                <div class="suggestionAra vehicle"></div>
                                <input type="hidden" name="vehicle_id" id="vehicle_id">
                                <span class="text-danger size-7 e_vehicledetail"></span>
                            </div>
                            <div class=" mb-0  col-12">
                                <label>Driver Name</label>
                                <input type="text" class="form-control form-control-sm" name="driver_name"
                                    placeholder="Enter Driver Name">
                                <span class="text-danger size-7 e_driver_name"></span>
                            </div>
                            <div class=" mb-0  col-12">
                                <label>Driver Phone number</label>
                                <input type="text" class="form-control form-control-sm" name="driver_phone_number"
                                    placeholder="Enter Driver Name">
                                <span class="text-danger size-7 e_driver_phone_number"></span>
                            </div>
                        </div>
                    </div>
                    <div class=" mb-0  col-12">
                        <label>Fleet Charges</label>
                        <input type="text" class="form-control form-control-sm" name="transport_cost"
                            placeholder="Enter Fleet Charges">
                        <span class="text-danger size-7 e_transport_cost"></span>
                    </div>
                    <div class=" mb-0  col-12">
                        <label>Pick Up Date</label>
                        <input type="date" class="form-control form-control-sm" name="transport_date"
                            placeholder="Enter Fleet Charges">
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
<div class="modal fade " id="orderspecificationModal" tabindex="-1" aria-labelledby="orderspecificationModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
            <div class="modal-header">
                <h4 class="card-title">Order Specification Required</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span class="text-danger"
                        aria-hidden="true">&times;</span></button>
            </div>
            <form method="post" id="add_orderspecification_form" class="changeidtosubmitdata">
                <input type="hidden" name="orderid" id="orderid" class="form-control">
                <div class="modal-body orderspecificationdata p-1">

                </div>
                <div class="osimagedata text-center"></div>
                <div class="modal-footer forderspecificationdata ">

                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade " id="transportRequestRatelist" tabindex="-1" aria-labelledby="transportRequestRatelistLabel"
    aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="card-title">Transport Request rates </h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span class="text-danger"
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body transportRequestRatelist p-4">


                <span class="paymodelData"></span>
            </div>
        </div>
    </div>
</div>

<div class="modal fade " id="orderTrackingModal" tabindex="-1" aria-labelledby="orderTrackingModalLabel"
    aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="card-title">Order Tracking</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span class="text-danger"
                        aria-hidden="true">&times;</span></button>
            </div>

            <input type="hidden" name="orderid" id="order_id" class="form-control">
            <div class="modal-body tracking_data p-0">


            </div>


        </div>
    </div>
</div>




<!-- Modal -->
<div class="modal fade" id="upload_credit_doc" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-5" id="exampleModalLabel">Upload Documents Required for Credit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="credit_modal" style="padding:0 1.80rem">
                <!-- <form id="credit_document" method="post" enctype='multipart/form-data'>   
          <input class="form-control" type="text" id="id" name="id" value="<?=$pur_Id?>">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Identity proof / address proof (copy of passport/voter ID card/driving license/Aadhaar Card)</label>
                <input class="form-control" type="file" id="address_proof" name="address_proof">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Bank statement of previous 3 months (Passbook of previous 6 months)</label>
                <input class="form-control" type="file" id="bank_statement" name="bank_statement">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Two latest salary slip/current dated salary certificate with the latest Form 16</label>
                <input class="form-control" type="file" id="salary_slip" name="salary_slip">
            </div>
            
            <div class="">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary"  >Save changes</button>
      </div>
            </form> -->
            </div>

        </div>
    </div>
</div>

<div class="modal fade " id="viewProductDescriptionModal" tabindex="-1" aria-labelledby="counterofferModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="card-title"> Upload Size Details </h4>
            </div>
             <input type="hidden" id="listspecification" value='<?=json_encode($listspecification);?>'>
            <form method="post" id="add_orderspecification_form" >
                <input type="hidden" name="listproduct_id"  id="listproduct_id"   class="form-control">
                <div class="modal-body counterdatasize"></div>
                <?php
                // foreach ($query as $key => $value) {
                    // print_r($productspecification);
                //     # code...
                // }

                ?>
                <div class="modal-footer counterfootersize">
                    <button type="button" class="btn btn-secondary close" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>  