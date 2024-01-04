<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="table-div">
                <div class="table-header-div">
                    <h4 class="tabel-title">Customer</h4>
                </div>
                <div class="tabel-body-div">
                    <div class="table-responsive ">
                    	
                    	<div  id="table">
                    		<table id="my_tbale" class="table table-responsive-md size-5">
               					<thead>
               						 <tr>
					                    <th>S.No</th>
					                    <th>Customer Name</th>
					                    <th>Mobile</th>	
					                    <th>Email</th>
					                    <th>Role</th>
					                    <th>Address</th>
					                    <th>Approval Status</th>
					                    <th>Action</th>
					                </tr>
               					</thead>
						        <tbody>
						            <?php
						            if ($query) 
						            { $i=1;
						                foreach ($query as $value)  
						                { 
						                    
						                    ?>
						                    <tr id="row<?=$value['id']?>" >
						                        <td class="row-id"><?=$i;?></td>
						                        <td><?=$value['user_name']?></td>
						                        <td><?=$value['phone_number'];?></td>
						                        
						                        <td><?=$value['email'];?></td>
						                        <td>
						                        	<?php   if($value['user_type'] == 1){echo 'Bailer';}
								                        	else if($value['user_type'] == 2){echo 'End User';}
								                        	else if($value['user_type'] == 3){echo 'Paper Mill';}
								                        	else if($value['user_type'] == 4){echo 'Trader';}
								                        	else if($value['user_type'] == 5){echo 'Transporter';}
								                        	else if($value['user_type'] == 10){echo 'Other';}
						                        	?>
						                        </td>
						                        <td style="white-space: normal;"><?=$value['address'];?>,<?=$value['state'];?>,<?=$value['city'];?></td>
						                        <td><?php  if($value['approved'] == 0){ echo 'Pending';} else if($value['approved'] == 1){ echo 'Approved';} ?></td>
						                        <td>

						                        	<?php if($value['approved'] == 0){ ?> 
						                        		<a class=" updateCustomer badge  badge-primary text-white" title="Verify Customer Details" href="javascript:void(0)" tag="<?=$value['id'];?>"><span class="  pl-2 pr-2 ">Verify</i></span></a>
						                        	<?php } else if($value['approved'] == 1){ ?>
						                        		<a class="activeCustomer cusstatus<?=$value['id']?>" title=" Customer Status" href="javascript:void(0)" tag="<?=$value['id'];?>" status="<?=$value['is_active'];?>">
						                        		<?php if($value['is_active']  == '0') { ?><span class="  pl-2 pr-2 badge light badge-danger badge-text-size"><i class="fa fa-thumbs-down"></i></span><?php } else if($value['is_active']  == '1') { ?><span class="  pl-2 pr-2 badge light badge-success badge-text-size"><i class="fa fa-thumbs-up"></i></span><?php } ?>
						                        	</a>

						                        	<a class=" updateCustomer" href="javascript:void(0)" tag="<?=$value['id'];?>"><span class="  pl-2 pr-2 badge light badge-info badge-text-size"><i class="fa fa-edit"></i></span></a>
						                        	<a class="deleteCustomer" href="javascript:void(0)" tag="<?=$value['id'];?>"><span class="  pl-2 pr-2 badge light badge-danger badge-text-size"><i class="fa fa-trash"></i></span></a>
						                        	<?php }?> 
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
								                    <td colspan="10">No Data</td>
								                </tr>
								                <?php
								            }?>
					            </tbody>     
				             </table>
                    	</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
