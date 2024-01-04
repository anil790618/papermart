
					
<style>
    .infobtn .bi{
        font-size: 20px;
    text-align: center;
    display: block;
} 
</style>					
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
                                    <span class="feahead">Delivery Type</span> :<?php if($listedproduct['delivery_type']==0){ echo 'Zeto Transport'; } else { echo 'Doorstep Delivery';}?>
                                </span>
                            </div>    
                             <div class="col-6 mb-2">
                             <?php
                                if ($listedproduct['subcategory'] == 29 || $listedproduct['subcategory']==28) {
                                ?> <span class="feahead"><b> Mill Name </b></span> : <?=substr($listedproduct['product_location'],0,10);?>
                                    <?php 
                                }   
                            ?>
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
                                   
                                    
                                    <span class="feahead"> Place of Delivery</span> : <?php
                                            if ($listedproduct['subcategory'] == 29 || $listedproduct['subcategory']==28) {
                                            echo $listedproduct['product_location'];
                                            } else {
                                                if ($listedproduct['added_by']==3) {
                                                    echo $listedproduct['product_location'];
                                                  
                                                }else{
                                                    echo $lc;

                                                }
                                            } 
                                        ?>
                                </span>
                            </div>  
                            <?php
                            if ($listedproduct['subcategory'] == 29 || $listedproduct['subcategory']==28) {
                               
                            }else{
                                ?>
                                 <div class="col-6 mb-2">
                                <span class="list-fea">
                                    <span class="feahead">Delivery Days</span> :<?=$listedproduct['delivery_days']?>
                                </span>
                            </div>    
                            <?php
                            if ($listedproduct['added_by']==3) {
                            ?>
                                <div class="col-6 mb-2 d-none" >
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
                            <?php
                            
                            }else{
                            ?>
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
                            <?php 
                            }
                            ?>
                            
                                <?php
                            }
                            
                            ?>
                            
                        </div>
                    </div>
                </div>
            </div>
            <?php if(!empty($requestedsize)) { ?>
            <div class="col-5 p-2">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <span class="text-black font-w600"> Size List </span> 
                            <div  id="table">
                                <table id="producttype_tbale" class="table text-center tabledata size-6">
                                <thead>
                                    <th>S.No</th>
                                    <th>Specification</th>
                                    <th>Size</th>
                                    <th>Qty</th>
                                    <th>Available Qty</th>
                                    <!-- <th>Deckle</th> -->
                                </thead>
                                <tbody>
                                    <?php
                                    if ($requestedsize) {
                                        $i = 1;
                                        
                                        foreach ($requestedsize as $value) {
                                           
                                    ?>
                                    <tr>
                                        <td><?=$i?></td>
                                        <td>BF : <?=$value['bf']?>; GSM : <?=$value['gsm']?>; Type: <?=$value['type']?></td>
                                        <td><?=$value['size']?></td>
                                        <td class='required'><?=$value['quantity']?></td>
                                        <td class=''><?=$value['avail_size']?></td>
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
                if ($listedproduct['subcategory'] == 29 || $listedproduct['subcategory']==28) {
                ?>
                <table id="wastepapertable" style="" ><tr> </tr><tr><th></th><th>ON-Report</th><th>NON-Report</th></tr>
                    
                    <?php
                if ($listspecification_waste['sub_category']==28) {
                ?>
                
                    <tr>
                            <th>Scan</th>
                            <td><input type="text" class="tableinput" disabled readonly value="<?=$listspecification_waste['w_scan_on']??''?>" name="w_scan_on"></td>
                            <td><input type="text" class="tableinput" disabled readonly value="<?=$listspecification_waste['w_scan_non']??''?>" name="w_scan_non"></td>
                        </tr>
                        <tr>
                            <th>Colour</th>
                            <td><input type="text" class="tableinput" disabled readonly value="<?=$listspecification_waste['w_color_on']??''?>" name="w_color_on"></td>
                            <td><input type="text" class="tableinput" disabled readonly value="<?=$listspecification_waste['w_color_non']??''?>" name="w_color_non"></td>
                        </tr>
                        <tr>
                            <th>Copy</th>
                            <td><input type="text" class="tableinput" disabled readonly value="<?=$listspecification_waste['w_copy_on']??''?>" name="w_copy_on"></td>
                            <td><input type="text" class="tableinput" disabled readonly value="<?=$listspecification_waste['w_copy_non']??''?>" name="w_copy_non"></td>
                        </tr>
                        <tr>
                            <th>Record</th>
                            <td><input type="text" class="tableinput" disabled readonly value="<?=$listspecification_waste['w_record_on']??''?>" name="w_record_on"></td>
                            <td><input type="text" class="tableinput" disabled readonly value="<?=$listspecification_waste['w_record_non']??''?>" name="w_record_non"></td>
                        </tr>
                        <tr>
                            <th>Shorted Book</th>
                            <td><input type="text" class="tableinput" disabled readonly value="<?=$listspecification_waste['w_short_on']??''?>" name="w_short_on"></td>
                            <td><input type="text" class="tableinput" disabled readonly value="<?=$listspecification_waste['w_short_non']??''?>" name="w_short_non"></td>
                        </tr>
                        <tr>
                            <th>White Cutting 1st Brightness 80% plus</th>
                            <td><input type="text" class="tableinput" disabled readonly value="<?=$listspecification_waste['w_whitecutting_on']??''?>" name="w_whitecutting_on"></td>
                            <td><input type="text" class="tableinput" disabled readonly value="<?=$listspecification_waste['w_whitecutting_non']??''?>" name="w_whitecutting_non"></td>
                        </tr>
                        <tr>
                            <th>White Pepsi</th>
                            <td><input type="text" class="tableinput" disabled readonly value="<?=$listspecification_waste['w_pepsi_on']??''?>" name="w_pepsi_on"></td>
                            <td><input type="text" class="tableinput" disabled readonly value="<?=$listspecification_waste['w_pepsi_non']??''?>" name="w_pepsi_non"></td>
                        </tr>
                        <tr>
                            <th>White Board</th>
                            <td><input type="text" class="tableinput" disabled readonly value="<?=$listspecification_waste['w_board_on']??''?>" name="w_board_on"></td>
                            <td><input type="text" class="tableinput" disabled readonly value="<?=$listspecification_waste['w_board_non']??''?>" name="w_board_non"></td>
                        </tr>
                        <tr>
                            <th>Old Book</th>
                            <td><input type="text" class="tableinput" disabled readonly value="<?=$listspecification_waste['w_book_on']??''?>" name="w_book_on"></td>
                            <td><input type="text" class="tableinput" disabled readonly value="<?=$listspecification_waste['w_book_non']??''?>" name="w_book_non"></td>
                        </tr>
                        <tr>
                            <th>Rulled Cutting</th>
                            <td><input type="text" class="tableinput" disabled readonly value="<?=$listspecification_waste['w_rulled_on']??''?>" name="w_rulled_on"></td>
                            <td><input type="text" class="tableinput" disabled readonly value="<?=$listspecification_waste['w_rulled_non']??''?>" name="w_rulled_non"></td>
                        </tr>
                        <tr>
                            <th>Tick Mark Pepsi</th>
                            <td><input type="text" class="tableinput" disabled readonly value="<?=$listspecification_waste['w_tick_on']??''?>" name="w_tick_on"></td>
                            <td><input type="text" class="tableinput" disabled readonly value="<?=$listspecification_waste['w_tick_non']??''?>" name="w_tick_non"></td>
                        </tr>
                        <!-- <tr>
                            <th></th>
                            <td><input type="datetime-local" class="tableinput"  disabled readonly   name="valid from"></td>
                            <td><button type="submit" class="btn btn-primary"  disabled readonly >Change Price</button></td>
                        </tr>
                    </table> -->
                <?php
                }

                ?>
                    <?php
                if ($listspecification_waste['sub_category']==29) {
                ?>
                    
                    <!-- <form method="post" id="update_wastpaper_price">
                    <input type="hidden" class="tableinput"  disabled readonly value="<?=$listspecification_waste['id']??''?>" name="id">
                <table id="wastepapertable" style="" ><tr> </tr><tr><th></th><th>ON-Report</th><th>NON-Report</th></tr> -->
                <tr>
                            <th>Corrugation Ist</th>
                            <td><input type="text" class="tableinput"  disabled readonly value="<?=$listspecification_waste['k_corr1_on']??''?>" name="k_corr1_on"></td>
                            <td><input type="text" class="tableinput"  disabled readonly value="<?=$listspecification_waste['k_corr1_non']??''?>" name="k_corr1_non"></td>
                        </tr>
                        <tr>
                            <th>Corrugation IInd</th>
                            <td><input type="text" class="tableinput"  disabled readonly value="<?=$listspecification_waste['k_corr2_on']??''?>" name="k_corr2_on"></td>
                            <td><input type="text" class="tableinput"  disabled readonly value="<?=$listspecification_waste['k_corr2_non']??''?>" name="k_corr2_non"></td>
                        </tr>
                        <tr>
                            <th>Dye Cutting</th>
                            <td><input type="text" class="tableinput"  disabled readonly value="<?=$listspecification_waste['k_dye_on']??''?>" name="k_dye_on"></td>
                            <td><input type="text" class="tableinput"  disabled readonly value="<?=$listspecification_waste['k_dye_non']??''?>" name="k_dye_non"></td>
                        </tr>
                        <tr>
                            <th>Grey Board</th>
                            <td><input type="text" class="tableinput"  disabled readonly value="<?=$listspecification_waste['k_grey_on']??''?>" name="k_grey_on"></td>
                            <td><input type="text" class="tableinput"  disabled readonly value="<?=$listspecification_waste['k_grey_non']??''?>" name="k_grey_non"></td>
                        </tr>
                        <tr>
                            <th>Duplex</th>
                            <td><input type="text" class="tableinput"  disabled readonly value="<?=$listspecification_waste['k_duplex_on']??''?>" name="k_duplex_on"></td>
                            <td><input type="text" class="tableinput"  disabled readonly value="<?=$listspecification_waste['k_duplex_non']??''?>" name="k_duplex_non"></td>
                        </tr>
                        <tr>
                            <th>Mill Board</th>
                            <td><input type="text" class="tableinput"  disabled readonly value="<?=$listspecification_waste['k_mill_on']??''?>" name="k_mill_on"></td>
                            <td><input type="text" class="tableinput"  disabled readonly value="<?=$listspecification_waste['k_mill_non']??''?>" name="k_mill_non"></td>
                        </tr>
                        <tr>
                            <th>Core Pipe</th>
                            <td><input type="text" class="tableinput"  disabled readonly value="<?=$listspecification_waste['k_core_on']??''?>" name="k_core_on"></td>
                            <td><input type="text" class="tableinput"  disabled readonly value="<?=$listspecification_waste['k_core_non']??''?>" name="k_core_non"></td>
                        </tr>
                    
                        <?php
                }

                ?>

                
                
                </table>
                <?php

                }else{ 
                    if ($listedproduct['added_by']!=3) {
                      
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
             } 
            }
            }?>
          
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
                <input type='hidden' id='userType' value="<?=$user_type?>">
                    <?php
                    
                    if (($user_type==3 || $user_type==4) && $listedproduct['list_type']==2 ) { 
                        if(!empty($response['id'])){
                            if($response['counterstatus'] == '3') {
                              ?>
                              <div class='d-flex'>
                             <li class="nav-item text-end mr-3">
                                <a class="counterofferresponse" href="javascript:void(0)" tag="<?=$response['id'];?>" counter="<?=$response['counterid'];?>"  title=" Post Counter Offer Response  "><span class="badge light badge-warning badge-text-size fs-14"><i class="fa fa-money"></i></span></a>
                             </li>
                             <?php
                             $cstatus= $counter_status['response_counter_status'];
                             if ($cstatus) { 
                                if ($response['response_counter_status'] == '2' && $cstatus!=1 ) {  
                                        ?>
                                          <a class="approvecounteroffer" href="javascript:void(0)" tag="<?=$response['id'];?>"><span class="badge light badge-info badge-text-size "  title="Approve Counter Offer Request">Approve counter</span></a>
                                        <?php 
                                } 
                            }
                             ?>
                             
                             
                            </div>
                              <?php
                            }  elseif ($response['counterstatus'] == 1) {
                               echo '<a  href="javascript:void(0)" ><span class="badge light badge-success badge-text-size">Accepted</span></a>';
                            }elseif ($response['counterstatus'] == 2) {
                                echo ' <a  href="javascript:void(0)" ><span class="badge light badge-danger badge-text-size">Rejected</span></a>';
                            }
                            
                            ?>
                            <div> 
                            <a class="viewsizelist" href="javascript:void(0)" tag="<?=$listedproduct['id']?>" userid="<?=$listedproduct['added_by']?>"  title=" Post Counter Offer  "><span class="badge light badge-secondary badge-text-size fs-14">Size List</i></span></a> 
                            <?php
                                if ($response['response_counter_status'] == '1' ) {  
                                        ?>
                                        <span class="badge light badge-success badge-text-size fs-14">Accepted by buyer</span>
                                         <a class="confirmSaleResponse"   href="javascript:void(0)" tag="<?=$response['id']??0;?>" title=" Confirm Response "><span class="badge light badge-success badge-text-size fs-14"><i class="fa fa-check"></i></span></a>
                                     <a class="disapproveList" href="javascript:void(0)" tag="<?=$response['id'];?>" ><span class="badge light badge-danger badge-text-size"  title=" Reject Response "><i class="fa fa-times"></i></span></a>
                                         <?php 
                                } 
                                if ($response['response_counter_status'] == '2' ) {  
                                        ?>
                                         <a class="confirmSaleResponse"   href="javascript:void(0)" tag="<?=$response['id']??0;?>" title=" Confirm Response "><span class="badge light badge-success badge-text-size fs-14"><i class="fa fa-check"></i></span></a>
                                      <a class="disapproveList" href="javascript:void(0)" tag="<?=$response['id'];?>" ><span class="badge light badge-danger badge-text-size"  title=" Reject Response "><i class="fa fa-times"></i></span></a>
                                         <?php 
                                } 
                             ?>
                          <?php
                             
                         if ($response['counterstatus']==3  ){  
                                if ($response['counterstatus'] == '3' ) {
                                    // $is_order =1;
                                    if ($is_order) {
                                         ?>
                                          <a class=""   href="javascript:void(0)" tag="<?=$response['id']??0;?>" title=" Confirm Response "><span class="badge light badge-success badge-text-size fs-14">Sale confirmed</span></a>
                                         <?php
                                    }else{
                                        // 
                               
                                   }
                                }  
                            }
                           
                            ?>

                            </div>             
                            <?php
                        }
                    }else{
                    ?>
                    <div class="tabel-link-btn">
                         <ul class="nav nav_filter active-status">
                        
                            <?php 
                            if ($response) { 
                             if ($response['counterstatus'] == '1' ) { 
                                if ($is_order) {
                                     ?>
                                      <a class=""   href="javascript:void(0)"   title="Sale Confirmed"><span class="badge light badge-success badge-text-size fs-14">Sale confirmed</span></a>
                                     <?php
                                }else{
                                    // 
                           
                               }
                            } 
                             if ($response['counterstatus'] == '2' ) { 
                                if ($is_order) {
                                     ?>
                                      <a class=""   href="javascript:void(0)"   title=" Order Rejected  "><span class="badge light badge-danger badge-text-size fs-14"> Order Rejected</span></a>
                                     <?php
                                }else{
                                    // 
                           
                               }
                            } 
                        }
                            if($response){ 
                                if($response['status'] == '0') {  if($response['counterstatus'] == '3') { ?>
                            <li class="nav-item text-end mr-3">
                               <a class="approvecounteroffer" href="javascript:void(0)" tag="<?=$response['id'];?>"><span class="badge light badge-success badge-text-size "  title="Approve Counter Offer Request"><i class="fa fa-check"></i></span></a>
                               
                            </li>
                             <li class="nav-item text-end mr-3">
                               <a class="cancelcounteroffer" href="javascript:void(0)" tag="<?=$response['id'];?>"><span class="badge light badge-danger badge-text-size "  title="Reject Counter offer Request"><i class="fa fa-times"></i></span></a>

                            </li>
                             
                        <?php } else if($response['counterstatus'] == 1 ) { ?><a  href="javascript:void(0)" ><span class="badge light badge-info badge-text-size">Wait for Seller's Response</span></a><?php } else if($response['counterstatus'] == 2 ) {  ?>
                            <a  href="javascript:void(0)" ><span class="badge light badge-danger badge-text-size">Rejected</span></a><?php }else if($response['counterstatus'] == 0){
                                if($listedproduct['added_by']==3){
                                    $rs = "Buyer's";
                                }else{
                                    $rs = "Seller's";
                                }
                                echo '<a  href="javascript:void(0)" ><span class="badge light badge-warning badge-text-size">Wait For '.$rs.' response</span></a>';} } else if( $response['status'] == '2') { echo '<a  href="javascript:void(0)" ><span class="badge light badge-danger badge-text-size">Rejected</span></a>';} } 
                            ?>

                            
                        </ul>
                    </div>
                    <?php
                    }?>
                </div>
                    <div class="tabel-body-div">
                        <div class="table-responsive ">
                            <div id="table">
                                <table id="producttype_tbale" class="table  fs-13 table-bordered">
                                    <tr>
                                        <th></th> 
                                        <?php
                                        $string = $listedproduct['specification'] ;
                                        $string = preg_replace('/\.$/', '', $string); //Remove dot at end if exists
                                        $array = explode(',', $string); //split string into array seperated by ', '
                                        // echo $string;
                                        
                                        $stringReq = $listedproduct['required'] ;
                                        $stringReq = preg_replace('/\.$/', '', $stringReq);  
                                        $arrayRequired = explode(',', $stringReq);  
                                        foreach($array as $value) //loop over values
                                        {
                                        //    print_r($value);
                                            $rq="";
                                            if($value=='quantity_type'){  echo''; }
                                            // elseif(in_array($value, $arrayRequired)){
                                            //         $rq="<span class='text-danger'>*</span>";
                                            //         $cls="quantityclass";
                                            // }
                                            elseif($value == 'rate'){ echo '<th>Cash <br> Rate</th>';  } 
                                            elseif($value == 'product_form'){ }
                                            elseif($value == 'mill_name'){ }
                                            elseif($value == 'size_uom') { echo ''; } 
                                             elseif ($value=='quantity_uom') { echo ''; }
                                             elseif ($value=='min_quantity_uom') { echo ''; }
                                            elseif($value=='sub_category'){echo  '<th  class="labeltext text-center">'.str_replace("_","<br> ",$value).'</th>';} 
                                            elseif($value=='brand_name'){echo  '<th  class="labeltext text-center">'.str_replace("_","<br> ",$value).'</th>';} 
                                            elseif($value=='min_quantity_per_gsm'){ 
                                                $string = str_replace("_"," ",$value); 
                                                $firstSpacePos = strpos($string, ' '); 
                                                $secondSpacePos = strpos($string, ' ', $firstSpacePos + 1); 
                                                $modifiedString = substr_replace($string, '<br>', $secondSpacePos, 1); 
                                                echo  '<th style="vertical-align:middle"  class="labeltext text-center">'.$modifiedString.'</th>';} 
                                            elseif($value=='min_quantity_pertruck'){ 
                                                $string = str_replace("_"," ",$value); 
                                                $firstSpacePos = strpos($string, ' '); 
                                                $secondSpacePos = strpos($string, ' ', $firstSpacePos + 1); 
                                                $modifiedString = substr_replace($string, '<br>', $secondSpacePos, 1); 
                                                echo  '<th  style="vertical-align:middle" class="labeltext text-center">'.$modifiedString.'</th>';} 
                                            elseif($value=='packing_per_ream'){ 
                                                $string = str_replace("_"," ",$value); 
                                                $firstSpacePos = strpos($string, ' '); 
                                                $secondSpacePos = strpos($string, ' ', $firstSpacePos + 1); 
                                                $modifiedString = substr_replace($string, '<br>', $secondSpacePos, 1); 
                                                echo  '<th style="vertical-align:middle"  class="labeltext text-center">'.$modifiedString.'</th>';}  
                                            else{
                                                  echo '<th  class="labeltext  ">'.str_replace("_"," ",$value). $rq.'</th>'; 
                                                 }
                                        }
                                      
                                        ?>
                                        <!-- <th> Rate offer </th> -->
                                          <!-- <th></th> -->
                                          <!-- <th> Cash Rate </th> -->
                                           <th>Credit <br> Rate </th>
                                           <!-- <th></th> -->
                                           
                                           <?php
                                                if ($user_type==3) {
                                                echo "<th style='text-align:center'>freight <br> perkg </th>";
                                                }
                                           ?>
                                        <?php
                                        if($response){
                                            if($response['counterstatus'] != 0 ){
                                                echo '<th style="text-align:center">Counter<br> Qty </th>
                                                        <th style="text-align:center">Counter <br> Rate </th>
                                                       ';
                                            }
                                            if($response['counterstatus'] == 1 ){
                                                echo '<th style="text-align:center">Final <br> Qty </th>
                                                         <th style="text-align:center">Final <br> Rate </th>';
                                            }
                                        } 
                                        ?>
                                         
                                    </tr>

                                    <?php
                                    // print_r($listspecification);
                                    if ($listspecification) {
                                        $i = 1;
                                        
                                        foreach ($listspecification as $value) {
                                            $responsespecification = $responsespecificationArr[$value['id']] ?? '';
                                            $sid=$value['response_id'];
                                    ?>
                                            <tr class=" bg-lightprimary">
                                           <?php
                                                if ($listedproduct['added_by']==3 ||$listedproduct['subcategory'] == 29 || $listedproduct['subcategory']==28) {
                                                ?>
                                                <td><input type="checkbox" onclick="return false" class="checked_item" value="<?=$value['id']?>" tag="<?=$value['id']?>" name="checked[]" checked></td>
                                                <?php
                                                } else {
                                                    ?>
                                                <td class="d-flex align-items-center justify-content-evenly" ><input type="checkbox" onclick="return false"  checked class="checked_item" value="<?=$value['id']?>" tag="<?=$value['id']?>" name="checked[]">
                                                <a tabindex="0" class="infobtn mx-2" role="button" data-bs-toggle="popover" data-bs-trigger="focus" data-bs-title="Discription" data-bs-content="<?=$listedproduct['description']?>"> <i class="bi bi-info-circle"></i></a></td>
                                                    <?php
                                                }

                                           ?>
                                               
                                                
                                                
                                                    <!-- <div class="" title='Click To View Description'>
                                                <span class=" infobtn ">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info" viewBox="0 0 16 16">
                                                    <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
                                                </svg>
                                                </span>
                                                <ul class="infoDropdown" style="z-index:1100">
                                                    <li class="p-3"><p><b>Description: </b></p> <span  ><?=$listedproduct['description']?></span></li> 
                                                </ul>
                                                </div> -->
                                           

                                              <?php 
                                            foreach($array as $data) //loop over values
                                            { 
                                                if($data == 'quantity_type'){
                                                    //  if($value[$data]==1){ echo '<td>Godown</td>'; } 
                                                    // else if($value[$data]==2) { echo '<td>Truck Load</td>';}
                                                    //     else if($value[$data]==3) { echo '<td>Part Truck Load</td>';}
                                                    //     else{ echo '<td>NA</td>';}
                                                    echo'';
                                                    }
                                                else if( $data == 'product_form' ){ if($value[$data]==1){ echo '<td>Compressed</td>'; } else { echo '<td>Loose</td>';} }

                                                 else if( $data == 'brand_name' ){ echo '<td>'.$value['bname'].'</td>'; } 
                                                 else if( $data == 'mill_name' ){ echo ''; }  
                                                else if( $data == 'sub_category' ){ echo '<td>'.$value['cname'].'</td>'; }
                                                else if( $data=='quantity_uom' ||  $data=='min_quantity_uom' ){ echo ''; }

                                                else if( $data == 'truck_ratio' ){  $tr = $value['truck_ratio'];
                                                    if ($tr==1) {
                                                        echo "<td>100% Corrugation 1st</td>";
                                                    } elseif ($tr==2) {
                                                        echo "<td>90% Corrugation 1st, 10% Corr 2nd</td>";
                                                    } elseif ($tr==3) {
                                                        echo "<td>80% Corrugation 1st, 20% Corr 2nd</td>";
                                                    } elseif ($tr==4) {
                                                        echo "<td>70% Corrugation 1st, 30% Corr 2nd </td>";
                                                    } elseif ($tr==5) {
                                                        echo "<td>70% Corrugation 1st, 15-25% Corr 2nd,5% Mill board,Duplex,Grey board etc </td>";
                                                    } elseif ($tr==6) {
                                                        echo "<td>65-70% Corrugation 1st, 25-35% Corr 2nd,5% Mill board,Duplex,Grey board etc</td>";
                                                    } elseif ($tr==7) {
                                                        echo "<td>Grey board</td>";
                                                    }  } 
                                                else if( $data == 'bundle_weight' ){  $bundlew = $value['bundle_weight'];
                                                if ($bundlew ==30) {
                                                    echo "<td>30Kg</td>";
                                                } elseif ($bundlew ==100) {
                                                    echo "<td>100Kg</td>";
                                                }elseif ($bundlew ==500) {
                                                    echo "<td>500Kg</td>";
                                                }elseif ($bundlew ==700) {
                                                    echo "<td>700Kg</td>";
                                                }
                                                 else {
                                                    echo "<td>Any</td>";
                                                }
                                                
                                                
                                                } 
                                                else if( $data == 'rate' ){  } 
                                                else if( $data == 'size_uom' ){} 
                                                else if( $data == 'size' ){
                                                    echo '<td>'.$value[$data].'</td>';
                                                } 
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
                                             if($listedproduct['delivery_locations']==14){
                                             $pr=2000;
                                             } 
                                            }?> 
                                            <!-- <td><?=$value['rate']?></td> papermart04-01-2024.zip -->
                                            <td><?=$value['cashrate']?></td> 
                                            <td><?=$value['creditrate']?></td>  
                                           
                                            <td style="display:none"><?=$pr?></td>
                                             <?php if($responsespecification != ''){
                                                if($responsespecification['crate'] != ''){
                                                    echo '';
                                                }
                                             } 
                                            ?>  
                                        </tr>
                                        <!-- <tr><td></td> <td></td><th>Description : </th><td colspan='8'><?=$listedproduct['description']?></td></tr> -->

                                            <tr class="resinput<?=$value['id']?> " tag="<?=$value['id']?>"  style="display:contents">
                                            <!-- <td></td> -->
                                                <?php if($responsespecification != ''){
                                                    ?>
                                                     <td class="text-primary font-weight-bold">Response</td>
                                              <?php 
                                            //   print_r($array);
                                            foreach($array as $data) //loop over values
                                            {
                                                
                                                if($data == 'quantity_type'){ 
                                                //     if($responsespecification[$data]==1){ echo '<td class="dd6">Godown</td>'; } 
                                                // else if($responsespecification[$data]==2) { echo '<td class="dd6">Truck Load</td>';}
                                                // else if($responsespecification[$data]==3) { echo '<td class="dd6">Part Truck Load</td>';}
                                                // else{ echo '<td class="dd6">NA</td>';}
                                                echo'';
                                                }
                                                else if( $data == 'product_form' ){ if($responsespecification[$data]==1){ echo '<td class="dd4">Compressed</td>'; } else { echo '<td class="dd5">Loose</td>';} }

                                                 else if( $data == 'brand_name' ){ echo '<td class="dd3">'.$responsespecification['bname'].'</td>'; } 
                                                
                                                else if( $data == 'sub_category' ){ echo '<td class="dd2">'.$responsespecification['cname'].'</td>'; }
                                                else if( $data == 'mill_name' ){ echo ''; }
                                                else if( $data == 'size_uom' ){ echo ''; }

                                                else if( $data == 'quantity' ){ echo '<td class="dd2">'.$responsespecification['quantity'].'</td>'; }
                                                else if( $data == 'quantity_uom' ){ echo ''; }
                                                else if( $data == 'min_quantity_uom' ){ echo ''; } 
                                                else{ echo '<td class="dd">'.$responsespecification[$data].'</td>';}
                                            } 
                                            //  echo '<td class="dd0">'.$responsespecification['rate_uom'].'</td>';freight_rate  <td class="dd">'.$responsespecification['cashrate'].'</td>
                                            echo '<td class="dd">'.$responsespecification['creditrate'].'</td>';
                                            if ($user_type==3) {
                                                echo '<td class="dd">'.$responsespecification['freight_rate'].'</td>';
                                            }


                                               if($responsespecification['cqty']){ echo '<td class="dd">'.$responsespecification['cqty']. '</td>' ; } 
                                               if($responsespecification['crate']){ echo '<td class="dd">'.$responsespecification['crate']. '</td>' ; } 
                                            
                                               if($response){
                                                   if($response['counterstatus'] == 1 ){
                                                    if($responsespecification['fquantity']){ echo '<td class="dd">'.$responsespecification['fquantity']. '</td>' ; } 
                                                    if($responsespecification['frate']){ echo '<td class="dd">'.$responsespecification['frate']. '</td>' ; } 
                                                    } 
                                               }
                                            //   if($responsespecification['cashrate']){ echo ' <td>'.$responsespecification['cashrate'].'</td>';  }
                                            //   if($responsespecification['creditrate']){ echo ' <td>'.$responsespecification['creditrate'].'</td>';  }
                                                
                                                } else { ?>
                                                <input type="hidden" id ="resdata<?=$value['id']?>" value="1">
                                               <script> 
                                                    getResponsedata(<?php echo $value['id'];?>);
                                                </script>
                                        <?php } 
                                         ?>
                                        </tr>

                                        <?php
                                            $i++;
                                        }
                                    } else
                                     {  
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
                
                <!-- <input type="text" name="listid" id="listid" value="<?=$listedproduct['list_id']?>"> -->
                <input type="hidden" name="list_id" id="list_id" value="<?=$listedproduct['id']?>">
                <input type="hidden" name="list_type" id="list_type" value="<?=$listedproduct['list_type']?>">

                <div class="card-body size-4">
                    <input type="hidden" name="delivery_type" value="<?=$listedproduct['delivery_type']?>">
                    <div class="form-row"> 
                    <!-- subcategory   product_location -->
                        <?php
                        // print_r($listedproduct);
if ($listedproduct['subcategory']==28 || $listedproduct['subcategory']==29) {
    ?>
                        <div class="form-group mb-3  col-md-3">
                            <label>Quantity Offered </label> 
                            <input type="text" class="form-control" name="quantity[]"  >
                        </div>
                        
                        <div class="form-group mb-3  col-md-3">
                            <label>Delivery Location</label> 
                            <input type="text" class="form-control" name="dellocation" value="<?=$listedproduct['product_location']?>" readonly>
                        </div>
                        <div class="form-group mb-3  col-md-3 d-none">
                            <label>Offer Limit</label>
                            <input type="datetime-local" class="form-control" name="offerlimit" onclick="this.showPicker()" id="indianDateTime">
                        </div>
                      
                        <div class="form-group mb-3  col-md-3 d-none">
                             <label>Payment Terms </label>
                             <select  class="form-control" name="pterm" tag="1" id="pterm" >
                                    <option value="" >Choose Payment Term</option>
                                    <option value="0" <?php if($listedproduct['payment_terms']==0){ echo 'selected'; }  ?> >Advance</option>
                                    <option value="1" <?php if($listedproduct['payment_terms']==1){ echo 'selected'; }  ?>> On Delivery</option>
                                    <option value="2" <?php if($listedproduct['payment_terms']==2){ echo 'selected'; }  ?>>50% Advance & 50 % On Delivery</option>
                                    <option value="3" <?php if($listedproduct['payment_terms']==3){ echo 'selected'; }  ?> >15 Days</option>
                                    <option value="4" <?php if($listedproduct['payment_terms']==4){ echo 'selected'; }  ?>>30 Days</option>
                                </select> 
                            </div>    
                            <div class="form-group mb-3  col-md-3 d-none">
                            <label>Delivery Days</label>
                            <input type="text" class="form-control" name="deldays" value="1">
                        </div>
    <?php
} else {
    ?>
 <div class="form-group mb-3  col-md-3">
                            <label>Delivery Days</label>
                            <input type="text" class="form-control" name="deldays">
                        </div>
                        <div class="form-group mb-3  col-md-3">
                            <label>Delivery Location</label>
                            <?php
                              if ($listedproduct['added_by']==3) {
                                // echo $listedproduct['product_location'];
                                ?>
                                  <input type="text" class="form-control" name="dellocation" value="<?=$listedproduct['product_location']?>">
                                <?php
                              
                            }else{
                                ?> 
                                <input type="text" class="form-control" name="dellocation" value="<?=$lc?>">
                                <?php
                            }
                            ?> 
                        </div>
                        <?php

if ($listedproduct['added_by']==3) {
?>
 <div class="form-group mb-3  col-md-3 d-none">
                                 <label>Payment Terms</label>
                                 <select  class="form-control" name="pterm" tag="1" id="pterm" >
                                        <option value="" >Choose Payment Term</option>
                                        <option value="0" <?php if($listedproduct['payment_terms']==0){ echo 'selected'; }  ?> >Advance</option>
                                        <option value="1" <?php if($listedproduct['payment_terms']==1){ echo 'selected'; }  ?>> On Delivery</option>
                                        <option value="2" <?php if($listedproduct['payment_terms']==2){ echo 'selected'; }  ?>>50% Advance & 50 % On Delivery</option>
                                        <option value="3" <?php if($listedproduct['payment_terms']==3){ echo 'selected'; }  ?> >15 Days</option>
                                        <option value="4" <?php if($listedproduct['payment_terms']==4){ echo 'selected'; }  ?>>30 Days</option>
                                    </select> 
                                </div> 
<?php
}else{
    ?>
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
                                </div>    
       <?php
}
?>
                        
                        <div class="form-group mb-3  col-md-3">
                            <label>Offer Limit</label>
                            <input type="datetime-local" class="form-control" name="offerlimit" onclick="this.showPicker()" id="indianDateTime">
                        </div>
    <?php 
} 
?>
                          
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













<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateproductsize">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="updateproductsize" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fs-5" id="exampleModalLabel">Update size</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form id="updatesizeform">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <input type="hidden" class="form-control" id="sid" name='sid' value="<?=$sid??''?>"> 
                    <div class="mb-3">
                        <label for="size" class="form-label">Size</label>
                        <input type="text" class="form-control" id="size" name='size'> 
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label for="size_uom" class="form-label">Size Uom</label>
                            <select class="form-select form-control" id='size_uom' name="size_uom" >
                                <option value=''>Select size uom</option>
                                <option value="0">Inch</option>
                                <option value="1">Cm</option> 
                            </select> 
                    </div>
                </div>
            </div>
        </div>
        
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        </form>
      </div>
    
    </div>
  </div>
</div>


<div class="modal fade " id="sizelistModal" tabindex="-1" aria-labelledby="sizelistModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="card-title"> Size Details </h4>
            </div>

            <div class="modal-body ">
                <div class="table-responsive">
                    <span class="text-black font-w600"> Order Specification </span> 
                    <form id="avail_size_function" method='post'>
                    <div  id="table">
                        <table id="producttype_tbale" class="table text-center tabledata size-6">
                        <thead>
                            <th>S.No</th>
                            <th>Specification</th>
                            <th>Size </th>
                            <th>Qty </th>
                            <th>Available Qty </th>
                        </thead>
                       
                        <tbody class="sizelistdata">
                           
                        </tbody>
                        
                     </table>
                    </div>
                </form>
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
            <form action="<?=base_url()?>/submit-counteroffer_response"  method="post" id="add_counteroffer_form_response" >
                <input type="hidden" name="responseid" id="responseid" class="form-control">
                <div class="modal-body counterdatar"></div>
                <div class="modal-footer counterrfooter d-flex justify-content-end" >
                    <button type="button" class="btn btn-secondary close" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>	

<script>
    const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))
//       $('.infobtn').click(function(){ 
//       $('.infobtn').closest('.infoDropdown').toggle()
//   })
  const popover = new bootstrap.Popover('.popover-dismiss', {
  trigger: 'focus'
})
</script>