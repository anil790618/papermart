
					
						
<div class="container-fluid">
    <div class="card-header p-0">
        <h4 class="card-title m-2">Posted Rate Product Information</h4>
        <div class="pull-right float-end ">
            <ul class="nav nav_filter ">
                <li class="nav-item text-end">
                   <a href="javascript:void(0)" class="btn btn-primary mb-2 nav-rates" >Back</a>
                  
                </li>
            </ul>
        </div>
    </div>	 
     <?php
    if ($interested_request) 
    {$i=1;?>
          <div class="row p-2">
        <div class="col-lg-12">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title m-2">Response</h4>
                    
                </div>
                            <div class="card-body">
                            <div class="table-responsive">
                        <!-- <div id="example3_wrapper" class="dataTables_wrapper no-footer mb-2 d-flex justify-content-start ">
                            <div id="example3_filter" class="dataTables_filter input-group" >
                                <input type="text" id="search" name="search" class="" placeholder=" search" aria-describedby="button-addon1" style="border-right: none; margin-right: -2%;">
                                <button type="button" class="btn btn-primary ps-2" id="button-addon1" s>Search</button>
                            </div>
                        </div> -->
                        <div  id="table">
                            <table id="producttype_tbale" class="table table-responsive-md tabledata size-6">
                            <tr>
                                <th>S.No</th>
                                 <th>Counter Offer Status</th>
                                 <th colspan="3">Description </th>
                                <th>Action</th>
                            </tr>
                            <?php foreach ($interested_request as $value)  
                            { 
                                    
                                ?>  
                                <tr id="row<?=$value['id']?>" class="view-specdetail" tag="<?=$value['id']?>">
                                   <td class="row-id" ><?=$i;?></td>
                                    <td >  <?php if($value['counterstatus'] == 1){ echo '<a  href="javascript:void(0)" ><span class="badge light badge-success badge-text-size">Accepted</span></a>'; } else if($value['counterstatus'] == 2){ echo '<a  href="javascript:void(0)" ><span class="badge light badge-danger badge-text-size">Rejected</span></a>'; } else if($value['counterstatus'] == 3) { echo '<a  href="javascript:void(0)" ><span class="badge light badge-secondary badge-text-size">Pending</span></a>';} ?></td>
                                    <td colspan="3">  <?=$value['description'];?></td>
                                   <td class="statusList"><?php if($value['status']==0){ ?> 
                                    <a class="<?php if($rate['list_type']==1){ echo ' confirmSaleResponse'; } else { echo 'confirmPurchaseResponse';}?>" href="javascript:void(0)" tag="<?=$value['id'];?>" title=" Confirm Response "><span class="badge light badge-success badge-text-size"><i class="fa fa-check"></i></span></a>
                                    
                                    <a class="counteroffer" href="javascript:void(0)" tag="<?=$value['id'];?>" counter="<?=$value['counterid'];?>"  title=" Post Counter Offer  "><span class="badge light badge-warning badge-text-size"><i class="fa fa-money"></i></span></a>
                               
                                        <a class="disapproveList" href="javascript:void(0)" tag="<?=$value['id'];?>" ><span class="badge light badge-danger badge-text-size"  title=" Reject Response "><i class="fa fa-times"></i></span></a>

                                        <?php }  else if($value['status']==1){ ?> <a  href="javascript:void(0)" ><span class="badge light badge-success badge-text-size">Approved</span></a> <?php } else if($value['status']==2){ ?> <a  href="javascript:void(0)" ><span class="badge light badge-danger badge-text-size">Rejected</span></a><?php } else if($value['status']==3){ ?> <a  href="javascript:void(0)" ><span class="badge light badge-danger badge-text-size">Cancelled</span></a><?php }?></td>
                                </tr> 
                                <tr>
                                <tbody class="specification<?=$value['id']?>" tag="<?=$value['id']?>" style="display:none" >
                                    <script>
                                        getResponseSpecification(<?php echo $value['id'];?>);
                                    </script>
                                </tbody>
                                </tr>



                            <?php
                             $i++; } ?>
                        </table>
                        </div>
                    </div>
                   
                </div>
                </div>
                    </div>
                   
                </div>
            <?php } ?>
        <div class="row">
            <div class=" col-lg-4">
                        <div class="card ">
                          
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table shadow-hover">
                                        <tbody>
                                           
                                        
                                        <tr>
                                             <td>
                                                <p class="text-black mb-1 font-w600">Category Name</p>
                                            </td>
                                            <td>
                                                <span class="fs-14"><?=$rate['catname']?></span>
                                            </td>
                                        </tr>
                                         <tr>
                                             <td>
                                                <p class="text-black mb-1 font-w600">Rate  Type</p>
                                            </td>
                                            <td>
                                                <span class="fs-14"><?php if($rate['type'] == '1'){ $type='Normal';} else if($rate['type'] == '2'){ $type='Sauda';} else if($rate['type'] == '3'){ $type='Prime';}?> <?=$type;?> Rate</span>
                                            </td>
                                        </tr>
                                        <tr>
                                             <td>
                                                <p class="text-black mb-1 font-w600">Validity</p>
                                            </td>
                                            <td>
                                                <span class="fs-14"><?=$rate['validity'];?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                             <td>
                                                <p class="text-black mb-1 font-w600">Rate Offered</p>
                                            </td>
                                            <td>
                                                <span class="fs-14"><?=$rate['rates_offered']?></span>
                                            </td>
                                        </tr>
                                         <tr>
                                             <td>
                                                <p class="text-black mb-1 font-w600">Description</p>
                                            </td>
                                            <td>
                                                <span class="fs-14"> 
                                                  <?=$rate['description']?>
                                               </span>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 pl-3">
                            <div class="table-div">
                                <div class="tabel-body-div">
                                    <div class="table-responsive overflow-hidden">

                                        <div id="table">
                                            <table id="producttype_tbale" class="table table-responsive tabledata size-6">
                                                <tr>
                                                    <th>S.No. </th>
                                                    <?php
                                                    $string = $rate['specification'] ;
                                                    $string = preg_replace('/\.$/', '', $string); //Remove dot at end if exists
                                                    $array = explode(',', $string); //split string into array seperated by ', '
                                                    foreach($array as $value) //loop over values
                                                    {
                                                        echo '<th  class="labeltext">'.str_replace("_"," ",$value).'</th>';
                                                    }?>
                                                    <th>Min Qty</th>
                                                </tr>

                                                <?php
                                                if ($ratespecification) {
                                                    $i = 1;
                                                    
                                                    foreach ($ratespecification as $value) {
                                                ?>
                                                        <tr>
                                                            <td><?= $i; ?></td>
                                                          <?php 
                                                        foreach($array as $data) //loop over values
                                                        {
                                                            if($data == 'quantity_type'){ if($value[$data]==1){ echo '<td>Godown</td>'; } 
                                                                        else if($value[$data]==2) { echo '<td>Truck Load</td>';}
                                                                         else if($value[$data]==3) { echo '<td>Part Truck Load</td>';}
                                                                         else{ echo '<td>NA</td>';}}
                                                            else if( $data == 'product_form' ){ if($value[$data]==1){ echo '<td>Compressed</td>'; } else { echo '<td>Loose</td>';} }
                                                            else{ echo '<td>'.$value[$data].'</td>';}
                                                        }?>
                                                         <td><?=$value['min_qty']; ?></td>
                                                        </tr>
                                                    <?php
                                                        $i++;
                                                    }
                                                } else {
                                                    ?>
                                                    <tr>
                                                        <td colspan="10">No Data</td>
                                                    </tr>
                                                <?php
                                                } ?>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!--   <?php if(!empty($rate['list_pimage'])) { ?><div class=" col-lg-4">
                        <div class="card ml-2">
                          
                            <div class="card-body">
                           
                               <img src="<?=base_url()?>/document/product/<?=$rate['list_pimage']?>" width=100%>
                          
                            </div>
                        </div> <?php }  ?> -->
                        <div class=" col-lg-4">
                        <div class="card ml-2">
                          
                            <div class="card-body">
                                <?php if(!empty($rate['list_pimage'])) { ?>
                                    <img src="<?=base_url()?>/document/product/<?=$rate['list_pimage']?>" width=100%>
                                <?php }  ?>
                               
                            </div>
                        </div> 
                    </div>
                           
    </div>
  
   
             
</div>

 <div class="modal fade " id="counterofferModal" tabindex="-1" aria-labelledby="counterofferModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="card-title"> Post Counter Offer </h4>
            </div>
            <form method="post" id="add_counteroffer_form" >
                <input type="hidden" name="responseid" id="responseid" class="form-control">
                <div class="modal-body counterdata">    </div>
                <div class="modal-footer counterfooter">
                    <button type="button" class="btn btn-secondary close" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>		













