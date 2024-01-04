
	
		<div class="container-fluid">
			
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-div">
                        <div class="table-header-div">
                            <h4 class="tabel-title"><?php if($user_type == 0 ){ echo 'All Lab Service Bookings';} else { echo 'Lab Service Bookings'; }?></h4>
                           
                            <div class="tabel-link-btn">
				               <ul class="nav nav_filter ">
				               
				                	 <li class="nav-item text-end">
				                       <a href="javascript:void(0)" class="addpurchase-text nav-labservice" >Back</a>
				                    </li>
				              
				                </ul> 
				            </div>
				       
                        </div>
                        <div class="tabel-body-div">
                            <div class="table-responsive overflow-hidden">
                            	
                            	<div  id="table">
                            		<table id="jobservice_tbale" class="table table-responsive-md size-6">
					                <tr>
					                    <th>S.No</th>
					                    <th>Title</th>
					                    <th>Book Date</th>
					                    <th>Status</th>
					                    <th>Action</th>
					                </tr>
					               <tbody  class="tabledata">
					            <?php
					            if ($query) 
					            {$i=1;
					                foreach ($query as $value)  
					                { 
					                    ?>
					                    <tr id="row<?=$value['id']?>">
					                        <td class ="row-id"><?=$i;?></td>
					                        <td><?=$value['labtitle']?></td>
					                      	 <td ><?=$value['book_date']?></td>
					                        <td ><?php if($value['status'] == '0'){ $stext = 'Pending' ; $scolor='badge-secondary';}
					                    		  else if($value['status'] == '1'){ $stext = 'Confirmed' ; $scolor='badge-warning';}
					                    		  else if($value['status'] == '2'){ $stext = 'Completed' ; $scolor='badge-success';}
					                    		  else if($value['status'] == '3'){ $stext = 'Canceled' ; $scolor='badge-danger';}?>
					                    		  <span class="badge light <?=$scolor?> badge-text-size"><?=$stext?></span>
					                    		  </td>
					                        <td>
					                        	<?php if ($user_type == 0){ ?><a class="confirm-labservice" href="javascript:void(0)" tag="<?=$value['id']?>" ><span class="badge light badge-success badge-text-size"><i class="fa fa-check"></i></span></a>
					                        	<a class="cancel-labservice" href="javascript:void(0)" tag="<?=$value['id']?>" ><span class="badge light badge-danger badge-text-size"><i class="fa fa-times"></i></span></a>
					                      		<?php } 
					                      		else if ($user_type == 2){ ?><a class="cancel-labservice" href="javascript:void(0)" tag="<?=$value['id']?>" ><span class="badge light badge-danger badge-text-size"><i class="fa fa-times"></i></span></a>
					                      		<?php } ?>
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
					                    <td colspan="6">No Data</td>
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
    

