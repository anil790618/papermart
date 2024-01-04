
<div class="modal fade " id="updatetransportrequestModal" tabindex="-1" aria-labelledby="productCategoryModalLabel" aria-hidden="true">
  	<div class="modal-dialog ">
	    <div class="modal-content">
	      	<div class="modal-header">
		        <h4 class="card-title">Alot Vehicle To Order</h4>
	      	</div>
	       	<form  id="update_transportrequest_form" >
	       		<input type="hidden" name="trid" id="trid" >
	       		<input type="hidden" name="oid" id="oid" >
		      	<div class="modal-body">
                    <div class="mb-2">
                        <label>Search Vehicle</label><span class="text-danger">*</span>
                    <input type="text" class="form-control  form-control-sm " name="vehicledetail" id="vehicledetail" tag="1"  autocomplete="off" placeholder="Enter vehicle number" >
                    <div class="suggestionAra vehicle"></div>
                        <input type="hidden" name="vehicle_id" id="vehicle_id" >
                    <span class="text-danger size-7 e_vehicledetail"></span>
                    </div>
                    <div class="mb-2">
                        <label>Driver Name</label>
                   		<input  type="text" class="form-control form-control-sm"  name="driver_name" placeholder="Enter Driver Name" >
                    	<span class="text-danger size-7 e_driver_name"></span>
                    </div>
                     <div class="mb-2">
                        <label>Driver Mobile Number</label>
                   		<input  type="text" class="form-control form-control-sm"  name="driver_phone_number" placeholder="Enter Driver Name" >
                    	<span class="text-danger size-7 e_driver_phone_number"></span>
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



<div class="modal fade " id="sendratetransportrequestModal" tabindex="-1" aria-labelledby="sendratetransportrequestModalLabel" aria-hidden="true">
  	<div class="modal-dialog ">
	    <div class="modal-content">
	      	<div class="modal-header">
		        <h4 class="card-title">Update Price List for the transport Request</h4>
	      	</div>
	       	<form  id="send_transportrequestrate_form" >
	       		<input type="hidden" name="tr_id" id="tr_id" >
	       		<input type="hidden" name="o_id" id="o_id" >
	       		<div class="transportrequestratedata">
			      	
		      	</div>
	      	</form>
	    </div>
  	</div>
</div>	
		<div class="container-fluid">
			
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title m-2"><?=$title?></h4>
                            
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            	
                            	<div  id="table">
                            		<table id="" class="table table-responsive-md tabledata size-6">
					                <tr>
					                    <th>S.No</th>
					                    <th>Order Number</th>
					                    <th>Location To</th>
					                    <th>Location From</th>
					                    <th>Quantity</th>
					                    <th>Quantity Type</th>
					                     <th>Rate Offered</th>
					                    <th>Vehicle no </th>
					                    <th>Driver Name</th>
					                     <th>Delivery date </th>
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
					                        <td><?=$value['loction_to'];?></td>
					                        <td><?=$value['location_from']?></td>
					                       
					                        <td><?=$value['qty']?></td>
					                        <td>
					                        	<?php if($value['quantity_type'] == '1'){echo 'Godown';}
					                        	 else if($value['quantity_type'] == '2'){echo 'Truck Load';} 
					                        	 else if($value['quantity_type'] == '3'){echo 'Part Load';}
					                        	 else if($value['quantity_type'] == '0'){echo 'NA';} ?>
					                        		
					                        </td> 
					                         <td><?=$value['transport_cost']?></td>
					                        <td><?=$value['vno'];?></td>
					                        <td><?=$value['driver_name']?> , <?=$value['driver_phone_number']?></td>
					                        <td><?=$value['transport_date']?></td>
					                        <td>
					                        	<div class="vehiclestatus">
					                         <?php if($value['status'] ==0 ){ ?>
					                            <a class="badge light badge-warning badge-text-size view_btn size-5 sendtrPrice" href="javascript:void(0)" tag="<?=$value['id'];?>" oid="<?=$value['order_id'];?>"><b>Send Price</b></a>
					                        <?php } else if($value['status'] ==1 and  $value['transporter_id'] == $userid ){ ?>
					                            <a class="badge light badge-warning badge-text-size view_btn size-5 vehicleAlot" href="javascript:void(0)" tag="<?=$value['id'];?>" oid="<?=$value['order_id'];?>"><b>Alot Vehicle</b></a>
					                        <?php } else if($value['status'] ==2 ){ ?>
					                            <a class="badge light badge-success badge-text-size view_btn size-5 sendtopickup" href="javascript:void(0)" tag="<?=$value['id'];?>" oid="<?=$value['order_id'];?>"><b>Dispatch</b></a>
					                        <?php } else if($value['status'] ==3 ){ ?>
					                            <a class="badge light badge-danger badge-text-size view_btn size-5" href="javascript:void(0)" tag="<?=$value['id'];?>" oid="<?=$value['order_id'];?>"><b>Out for Pickup</b></a>
					                        <?php }?>
					                                   
					                               </div>
					                        </td>
					                    </tr>
					                <?php
					                $i++;
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
					             </table>
                            	</div>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    

	