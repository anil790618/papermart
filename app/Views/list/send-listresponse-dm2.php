
					
						
<div class="container-fluid">
    <div class="card-header">
        <h4 class="card-title">Listed Product Information </h4>
        <div class="pull-right float-end ">
            <ul class="nav nav_filter ">
                <li class="nav-item text-end">
                  
                </li>

                <?php  if($response){ if($response['status'] == 0){ $url = 'nav-userlist'; } else{ $url = 'nav-interests';} } else{ $url = 'nav-userlist';}?>
                <li class="nav-item text-end">  
                   <a href="javascript:void(0)" class="btn btn-primary mb-2 <?=$url;?>" >Back</a>
                  
                </li>
            </ul>
        </div>
    </div>	

    <form class="" id="submit_response_form" method="post" enctype="multipart/form-data">
        <input type="hidden" value="<?=$listedproduct['specification']?>" name="specification">
        <div class="row">
            <div class=" col-lg-7 ">
                <div class="card ">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 "><h5 class="card-title text-primary">Product Details</h5></div>
                            <?php 
                            if($listedproduct['catname']){ ?>
                            <div class="col-6 mb-2">
                                <span class="list-fea">
                                    <span class="feahead">Product Category</span> :<?=$listedproduct['catname']?>
                                    <input type="hidden" id="catname" value="<?=$listedproduct['catname']?>">
                                </span>
                            </div>
                            <?php }  ?>           
                        </div>
                        <div class="row">
                            <div class="col-12 "><h5 class="card-title text-primary">Delivery Details</h5></div>
                             <div class="col-6 mb-2">
                                <span class="list-fea">
                                    <span class="feahead">Delivery Type</span> :<?php if($listedproduct['delivery_type']==0){ echo 'Self Pick Up'; } else { echo 'Doorstep Delivery';}?>
                                </span>
                            </div>    
                             <div class="col-6 mb-2">
                                <span class="list-fea">
                                    <?php
                                    $lc='';
                                if($listedproduct['delivery_locations']){
                                    if($listedproduct['delivery_locations']==1){ $lc = "Delhi";  }
                                    if($listedproduct['delivery_locations']==2){  $lc = "Noida";  }
                                    if($listedproduct['delivery_locations']==3){  $lc = "Kundli";  }
                                    if($listedproduct['delivery_locations']==4){  $lc = "Sahibabad";  }
                                    if($listedproduct['delivery_locations']==5){  $lc = "Tronica city";  }
                                    if($listedproduct['delivery_locations']==6){  $lc = "Faridabad";  }
                                    if($listedproduct['delivery_locations']==7){  $lc = "Gurgaon";  }
                                    if($listedproduct['delivery_locations']==8){  $lc = "Manesar";  }
                                    if($listedproduct['delivery_locations']==9){  $lc = "Noida-II";  }
                                    if($listedproduct['delivery_locations']==10){  $lc = "G. Noida";  }
                                    if($listedproduct['delivery_locations']==11){  $lc = "Jhajjar";  }
                                    if($listedproduct['delivery_locations']==12){  $lc = "Bahadurgarh & Ballabhgarh";  }
                                    if($listedproduct['delivery_locations']==13){  $lc = "Other";  }
                                }

                                        ?>
                                    <span class="feahead"> Place of Delivery</span> :<?=$lc?>
                                </span>
                            </div>    
                             <div class="col-6 mb-2">
                                <span class="list-fea">
                                    <span class="feahead">Delivery Days</span> :<?=$listedproduct['delivery_days']?>
                                </span>
                            </div>    
                             <div class="col-6 mb-2">
                                <span class="list-fea">
                                    <span class="feahead">Payment Terms</span> :
                                        <?php if($listedproduct['payment_terms']==0){ echo 'Advance'; } 
                                         else if($listedproduct['payment_terms']==1) { echo ' On Delivery';}
                                         else if($listedproduct['payment_terms']==2) { echo '50% Advance & 50 % On Delivery';}
                                         else if($listedproduct['payment_terms']==3) { echo '15 Days';}
                                         else if($listedproduct['payment_terms']==4) { echo '30 Days';}
                                         ?>
                                </span>
                                 
                            </div>    
                        </div>
                    </div>
                </div>
            </div>
            <?php if(!empty($requestedsize)) { 
                
                ?>
            <div class="col-5 p-2">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <span class="text-black font-w600"> Size List <?=$listedproduct['added_by']?></span> 
                            <div  id="table">
                                <table id="producttype_tbale" class="table text-center tabledata size-6">
                                <thead>
                                    <th>S.No</th>
                                    <th>Specification</th>
                                    <th>Size</th>
                                    <th>Qty</th>
                                    <th>Deckle</th>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($requestedsize) {
                                        $i = 1;
                                        
                                        foreach ($requestedsize as $value) {
                                           
                                    ?>
                                    <tr>
                                        <td><?=$i?></td>
                                        <td>BF : <?=$value['bf']?>; GSM : <?=$value['gsm']?>; Deckle: <?=$value['type']?></td>
                                        <td><?=$value['size']?></td>
                                        <td><?=$value['quantity']?></td>
                                    </tr>
                                    <?php $i++; } }?>
                                </tbody>
                             </table>
                            </div>
                        </div>
                        
                    </div>
                </div>  
            </div>
             <?php } else{
                ?>
                <div class="col-5 p-2">
                <div class="card">
                    <div class="card-body">
                        <span class="list-fea">
                                    <span class="feahead">Upload Customized size specifications if Required</span> 
                                </span>
                        <a href="javascript:void(0)" class="btn btn-secondary mt-2 mb-2 productSize" tag="<?=$listedproduct['id']?>" >Upload Size list</a>
                        
                    </div>
                </div>  
            </div>
                <?php
             } ?>
          
            <?php if(!empty($listedproduct['list_pimage'])) { ?>
             <div class=" col-lg-3 p-2">
                <div class="card ">
                  
                    <div class="card-body">
                       
                       <img src="<?=base_url()?>/document/product/<?=$listedproduct['list_pimage']?>" width=100%>
                   
                    </div>
                </div>
            </div>
            <?php }   ?>
 
            <div class="col-lg-12">
                <div class="table-div">
                    <div class="table-header-div">
                    <h4 class="tabel-title">Response Details  </h4>
                    <div class="tabel-link-btn">
                         <ul class="nav nav_filter active-status">
                            <?php if($response){ 
                                if($response['status'] == '0') {  if($response['counterstatus'] == '3') { ?>
                            <li class="nav-item text-end mr-3">
                               <a class="approvecounteroffer" href="javascript:void(0)" tag="<?=$response['id'];?>"><span class="badge light badge-success badge-text-size "  title="Approve Counter Offer Request"><i class="fa fa-check"></i></span></a>
                               
                            </li>
                             <li class="nav-item text-end mr-3">
                               <a class="cancelcounteroffer" href="javascript:void(0)" tag="<?=$response['id'];?>"><span class="badge light badge-danger badge-text-size "  title="Reject Counter offer Request"><i class="fa fa-times"></i></span></a>

                            </li>
                        <?php } else if($response['counterstatus'] == 1 ) { ?><a  href="javascript:void(0)" ><span class="badge light badge-success badge-text-size">Accepted</span></a><?php } else if($response['counterstatus'] == 2 ) {  ?>
                            <a  href="javascript:void(0)" ><span class="badge light badge-danger badge-text-size">Rejected</span></a><?php } } else if( $response['status'] == '2') { echo '<a  href="javascript:void(0)" ><span class="badge light badge-danger badge-text-size">Rejected</span></a>';} } ?>
                        </ul>
                    </div>
                </div>
                    <div class="tabel-body-div">
                        <div class="table-responsive ">
                            <div id="table">
                                <table id="producttype_tbale" class="table  fs-13">
                                    <tr>
                                        <th>S.No. </th>
                                        <?php
                                        $string = $listedproduct['specification'] ;
                                        $string = preg_replace('/\.$/', '', $string); //Remove dot at end if exists
                                        $array = explode(',', $string); //split string into array seperated by ', '
                                        foreach($array as $value) //loop over values
                                        {
                                           
                                            if($value == 'rate'){ }
                                            else{  echo '<th  class="labeltext">'.str_replace("_"," ",$value).'</th>';  }
                                        }?>
                                          <!-- <th></th> -->
                                          <th> Price </th>
                                           <th style='display:none'>Credit Rate </th>
                                        <?php
                                        if($response){
                                            if($response['counterstatus'] != 0 ){
                                                echo '<th>Counter Qty </th>
                                                        <th>Counter Rate </th>';
                                            }
                                        } 
                                        ?>
                                        <!-- <th>Response Qty </th>
                                         <th>Response Rate </th> -->
                                    </tr>

                                    <?php
                                    if ($listspecification) {
                                        $i = 1;
                                        
                                        foreach ($listspecification as $value) {
                                            $responsespecification = $responsespecificationArr[$value['id']] ?? '';
                                    ?>
                                            <tr class=" bg-lightprimary">
                                                <td><?= $i; ?> </td>
                                              <?php 
                                            foreach($array as $data) //loop over values
                                            {
                                                if($data == 'quantity_type'){ if($value[$data]==1){ echo '<td>Godown</td>'; } 
                                                                            else if($value[$data]==2) { echo '<td>Truck Load</td>';}
                                                                             else if($value[$data]==3) { echo '<td>Part Truck Load</td>';}
                                                                             else{ echo '<td>NA</td>';}}
                                                else if( $data == 'product_form' ){ if($value[$data]==1){ echo '<td>Compressed</td>'; } else { echo '<td>Loose</td>';} }

                                                 else if( $data == 'brand_name' ){ echo '<td>'.$value['bname'].'</td>'; } 
                                                
                                                else if( $data == 'sub_category' ){ echo '<td>'.$value['cname'].'</td>'; }

                                                else if( $data == 'rate' ){  }

                                                else{ echo '<td>'.$value[$data].'</td>';}
                                            }
                                            $pr='';
                                            if($listedproduct['delivery_locations']){ 
                                             if($listedproduct['delivery_locations']==1 &&(($listedproduct['d_pincode'] ==110020)||($listedproduct['d_pincode'] ==110043)) ){
                                             $pr=1500;
                                             }else{
                                                $pr=1200;
                                             }
                                             if($listedproduct['delivery_locations']==2 || $listedproduct['delivery_locations']==3||$listedproduct['delivery_locations']==4||$listedproduct['delivery_locations']==5 ){
                                             $pr=1200;
                                             } 
                                             if($listedproduct['delivery_locations']==6 || $listedproduct['delivery_locations']==7||$listedproduct['delivery_locations']==8||$listedproduct['delivery_locations']==9 ||$listedproduct['delivery_locations']==10||$listedproduct['delivery_locations']==11||$listedproduct['delivery_locations']==12 ){
                                             $pr=3000;
                                             } 
                                             if($listedproduct['delivery_locations']==13){
                                             $pr=2000;
                                             } 
                                            }?>
                                            <!-- <td></td> -->
                                            <td><?=$value['cashrate']?></td>
                                            <td style="display:none"><?=$pr?></td>
                                             <?php if($responsespecification != ''){
                                                if($responsespecification['crate'] != ''){
                                                    echo '<td></td><td></td>';
                                                }
                                             }
                                            ?> 

                                            
                                        </tr>

                                            <tr class="resinput<?=$value['id']?> " tag="<?=$value['id']?>"  style="display:contents">
                                                <?php if($responsespecification != ''){
                                                    ?>
                                                     <td class="text-primary font-weight-bold">Response</td>
                                              <?php 
                                            foreach($array as $data) //loop over values
                                            {
                                                if($data == 'quantity_type'){ if($responsespecification[$data]==1){ echo '<td class="dd6">Godown</td>'; } 
                                                                            else if($responsespecification[$data]==2) { echo '<td class="dd6">Truck Load</td>';}
                                                                             else if($responsespecification[$data]==3) { echo '<td class="dd6">Part Truck Load</td>';}
                                                                             else{ echo '<td class="dd6">NA</td>';}}
                                                else if( $data == 'product_form' ){ if($responsespecification[$data]==1){ echo '<td class="dd4">Compressed</td>'; } else { echo '<td class="dd5">Loose</td>';} }

                                                 else if( $data == 'brand_name' ){ echo '<td class="dd3">'.$responsespecification['bname'].'</td>'; } 
                                                
                                                else if( $data == 'sub_category' ){ echo '<td class="dd2">'.$responsespecification['cname'].'</td>'; }

                                                else if( $data == 'rate' ){  }

                                                else{ echo '<td class="dd1 2">'.$responsespecification[$data].'</td>';}
                                            } 
                                            //  echo '<td class="dd0">'.$responsespecification['rate_uom'].'</td>';
                                            echo '<td class="dd">'.$responsespecification['rate'].'</td>';


                                               if($responsespecification['cqty']){ echo '<td class="dd">'.$responsespecification['cqty']. '</td>' ; } 
                                              
                                              if($responsespecification['crate']){ echo ' <td>'.$responsespecification['crate'].'</td>';  }
                                                
                                                } else { ?>
                                                <input type="hidden" id ="resdata<?=$value['id']?>" value="1">
                                               <script>
               
                getResponsedata(<?php echo $value['id'];?>);
            </script>
                                        <?php } ?>
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
        </div>
       

        <div class="card  mt-2">
            <div class="card-body responsedata size-4">
                <?php if(empty($response)){ ?>
                
                <input type="hidden" name="list_id" id="list_id" value="<?=$listedproduct['id']?>">
                <input type="hidden" name="list_type" id="list_type" value="<?=$listedproduct['list_type']?>">

                <div class="card-body size-4">
                    <input type="hidden" name="delivery_type" value="<?=$listedproduct['delivery_type']?>">
                    <div class="form-row"> 
                        <div class="form-group mb-3  col-md-3">
                            <label>Delivery Days</label>
                            <input type="text" class="form-control" name="deldays">
                        </div>
                        <div class="form-group mb-3  col-md-3">
                            <label>Delivery Location</label>
                            <input type="text" class="form-control" name="dellocation" value="<?=$lc?>">
                        </div>
                        <div class="form-group mb-3  col-md-3">
                             <label>Payment Terms</label>
                             <select  class="form-control" name="pterm" tag="1" id="pterm" >
                                    <option value="" >Choose Payment Term</option>
                                    <option value="0" <?php if($listedproduct['payment_terms']==0){ echo 'selected'; }  ?> >Advance</option>
                                    <option value="1" <?php if($listedproduct['payment_terms']==1){ echo 'selected'; }  ?>> On Delivery</option>
                                    <option value="2" <?php if($listedproduct['payment_terms']==2){ echo 'selected'; }  ?>>50% Advance & 50 % On Delivery</option>
                                    <option value="3" <?php if($listedproduct['payment_terms']==3){ echo 'selected'; }  ?> >15 Days</option>
                                    <option value="4" <?php if($listedproduct['payment_terms']==4){ echo 'selected'; }  ?>>30 Days</option>
                                </select>
                                <!-- <select  class="form-control" name="pterm" tag="1" id="pterm" >
                                    <option value="" >Choose Payment Term</option>
                                    <option value="0" >Advance</option>
                                    <option value="1" > On Delivery</option>
                                    <option value="2" >50% Advance & 50 % On Delivery</option>
                                    <option value="3" >15 Days</option>
                                    <option value="4" >30 Days</option>
                                </select> -->
                            </div>    
                        <div class="form-group mb-3  col-md-3">
                            <label>Offer Limit</label>
                            <input type="datetime-local" class="form-control" name="offerlimit" onclick="this.showPicker()" id="indianDateTime">
                        </div>   
                        <div class="form-group mb-3  col-md-12">
                            <label>Description</label>
                            <textarea type="text" class="form-control" name="description"></textarea>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            <?php } else { if ($response['description']){ ?> <h4>Description</h4> <?=$response['description']?> <?php } } ?>
            </div>
         </div>       
    </form>
</div>
			
 <div class="modal fade " id="viewProductDescriptionModal" tabindex="-1" aria-labelledby="counterofferModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="card-title"> Upload Size Details </h4>
            </div>
             <input type="hidden" id="listspecification" value='<?=json_encode($listspecification);?>'>
            <form method="post" id="add_orderspecification_form" >
                <input type="hidden" name="listproduct_id"  id="listproduct_id" value="<?=$listedproduct['id']?>" class="form-control">
                <div class="modal-body counterdata"></div>
                <div class="modal-footer counterfooter">
                    <button type="button" class="btn btn-secondary close" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>  












