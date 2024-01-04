<div class="container-fluid">
    <div class="card-header p-0">
        <h4 class="card-title m-2">Listed Product Information  </h4>
        <div class="pull-right float-end ">
            <ul class="nav nav_filter ">
                <li class="nav-item text-end">
                   <a href="javascript:void(0)" class="btn btn-primary mb-2 nav-list" >Back</a>
                  
                </li>
            </ul>
        </div>
    </div>	
   
     <?php
    //  print_r($response);
     
    //  if (($user_type !=3 || $dashboard_type == 2) && ($listspecification_waste['sub_category']==28 || $listspecification_waste['sub_category']==29)) {
     if (($user_type !=3 ||  $dashboard_type != 2) ) {
      
    if ($interested_request) 
    {$i=1;?>
          <div class="row p-2">
        <div class="col-lg-12">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title m-2"><?php if ($listedproduct['added_by']==3) {
                       echo"Seller's";
                    } else {
                        echo"Buyer's";
                    }
                      ?>   Response  </h4>
                      <?php
 if ($user_type ==2) {
                      ?>
                       <div class="tabel-link-btn">
                         <ul class="nav nav_filter active-status">
                            <?php 
                           
                            if($response){ 
                                if (($user_type==3 || $user_type==4) && $listedproduct['list_type']==2 ){

                              
                                if($response['status'] == '0') {  if($response['counterstatus'] == '3') { ?>
                            <li class="nav-item text-end mr-3">
                               <a class="approvecounteroffer" href="javascript:void(0)" tag="<?=$response['id'];?>"><span class="badge light badge-success badge-text-size "  title="Approve Counter Offer Request"><i class="fa fa-check"></i></span></a>
                               
                            </li>
                             <li class="nav-item text-end mr-3">
                               <a class="cancelcounteroffer" href="javascript:void(0)" tag="<?=$response['id'];?>"><span class="badge light badge-danger badge-text-size "  title="Reject Counter offer Request"><i class="fa fa-times"></i></span></a>

                            </li>
                             
                        <?php  } } else if($response['counterstatus'] == 1 ) { ?><a  href="javascript:void(0)" ><span class="badge light badge-success badge-text-size">Accepted</span></a><?php } else if($response['counterstatus'] == 2 ) {  ?>
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
                            <div class="card-body">
                            <div class="table-responsive">
                       
                        <div  id="table">
                            <table id="producttype_tbale" class="table table-responsive-md tabledata size-6">
                            <thead>
                                <th>S.No</th>
                                 <th>Validity</th>
                                 <th>Delivery Days</th>
                                 <th>Counter Offer Status</th>
                                 <th id="desc" >Description </th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                            <?php foreach ($interested_request as $value)  
                            { 
                                //    print_r($user_type);
                                   $offer_value_id= $value['id'];
                                ?>  
                                <!-- view-specdetail is removed it is t close or open specific window -->
                                <tr id="row<?=$value['id']?>" class=" bg-success" tag="<?=$value['id']?>">
                                   <td class="row-id" ><?=$i;?></td>
                                   <td> <a  href="javascript:void(0)" ><span class="badge light badge-danger badge-text-size"><?php
                                         $messageTimestamp = $value['offerlimit'];
                                                    $timing = getOfferlimit($messageTimestamp);
                                                    if($timing > 0) {echo $timing; }
                                                    else{ echo 'Expired';}
                                                ?></span></a></td>
                                   <td class="text-white font-weight-bold"><?=$value['deldays']?> Days  </td>
                                    <td >  
                                        <?php if($value['counterstatus'] == 1){ echo '<a  href="javascript:void(0)" ><span class="badge light badge-success badge-text-size fs-13">Accepted</span></a>'; } else if($value['counterstatus'] == 2){ echo '<a  href="javascript:void(0)" ><span class="badge light badge-danger badge-text-size fs-13">Rejected</span></a>'; } else if($value['counterstatus'] == 3) { echo '<a  href="javascript:void(0)" ><span class="badge light badge-secondary badge-text-size fs-14">Pending</span></a>';} ?>
                                    </td>
                                    <td id="desc<?=$value['id']?>" >  <?=$value['description'];?></td>
                                   <td class="statusList<?=$value['id']?>"> 
                                    <?php if($value['sizeupdate'] > 0 ){ echo '  <a class="viewsizelist" href="javascript:void(0)" tag="'.$value['list_id'].'" userid="'.$value['added_by'].'"  title=" Post Counter Offer  "><span class="badge light badge-secondary badge-text-size fs-14">Size List</i></span></a>';}else{
                                        //  echo '<a class="updatesizelist" href="javascript:void(0)" tag="'.$value['list_id'].'" userid="'.$value['added_by'].'"  title="Request for Size"><span class="badge light badge-danger badge-text-size fs-14">Request for Size</i></span></a>';
                                        }
                                        $messageTimestamp = $value['offerlimit'];
                                        $timing = getOfferlimit($messageTimestamp);
                                        if($timing < 0) { 
                                            ?>
                                          <a href="javascript:void(0)"  id="<?=$value['id']?>"  data-bs-toggle="modal" data-bs-target="#updateValidityModal">  <span class="badge light badge-primary badge-text-size fs-14">Update Validity  </i></span></a>
                                            <?php
                                         }
                                       
                                        //  print_r($listspecification[0]['sub_category']==28 || $listspecification[0]['sub_category']==29);
                                        ?> 

                                    <?php if($timing > 0) { if($value['status']==0){ ?> 
                                       
                                        <?php 
                                         $atr='';
                                        if($listedproduct['list_type']==1){ 
                                            if($value['counterstatus'] == 3){
                                                $cl='';
                                                $atr ='data-bs-toggle="modal" data-bs-target="#pendingcounter"';
                                            }else{
                                            $cl= ' confirmSaleResponse';} } else { $cl= 'confirmPurchaseResponse';}?>
                                   
                                    <?php
                                        if ($listspecification[0]['sub_category']==28 || $listspecification[0]['sub_category']==29) { 
                                            if ($listedproduct['admin_approved']==1) {
                                               ?>
                                                 <a class="apprived_wastepapersale" <?=$atr?> href="javascript:void(0)" tag="<?=$value['id'];?>" title=" Confirm Response "><span class="badge light badge-success badge-text-size fs-14"><i class="fa fa-check"></i></span></a>
                                               <?php
                                            }else{
                                                ?> 
                                                <a class=" " <?=$atr?> href="javascript:void(0)" tag="<?=$value['id'];?>" title=" Confirm Response "><span class="badge light badge-success badge-text-size fs-14">Response Confirmed</span></a>
                                               <?php
                                            }
                                            
                                        
                                        } else {
                                        ?>
                                        <?php
                                        if ($user_type !=2) {
                                            ?>
                                        <a class="counteroffer" href="javascript:void(0)" tag="<?=$value['id'];?>" counter="<?=$value['counterid'];?>"  title=" Post Counter Offer1  "><span class="badge light badge-warning badge-text-size fs-14"><i class="fa fa-money"></i></span></a>
                                        <a class="<?=$cl?>" <?=$atr?> href="javascript:void(0)" tag="<?=$value['id'];?>" title=" Confirm Response "><span class="badge light badge-success badge-text-size fs-14"><i class="fa fa-check"></i></span></a>
                                        <a class="disapproveList" href="javascript:void(0)" tag="<?=$value['id'];?>" ><span class="badge light badge-danger badge-text-size"  title=" Reject Response "><i class="fa fa-times"></i></span></a>
                                        <?php
                                        }
                                        if ($user_type ==2){
                                            ?>
                                            <a class="productSize_buyer" href="javascript:void(0)" tag="<?=$value['list_id']?>" userid="<?=$value['added_by']?>"  title=" Upload size  "><span class="badge light badge-secondary badge-text-size fs-14">Upload Size List</i></span></a>
                                            <?php
                                            // echo $value['response_counter_status'];
if ($value['counterstatus']==1 && $value['response_counter_status']==2) {
  echo"<span class='badge light badge-success badge-text-size fs-14'>Counter Accepted</span>";
}else{
    ?>
    <a class="counteroffer" href="javascript:void(0)" tag="<?=$value['id'];?>" counter="<?=$value['counterid'];?>"  title=" Post Counter Offer1  "><span class="badge light badge-warning badge-text-size fs-14"><i class="fa fa-money"></i></span></a>
    <a class="disapproveList" href="javascript:void(0)" tag="<?=$value['id'];?>" ><span class="badge light badge-danger badge-text-size"  title=" Reject Response "><i class="fa fa-times"></i></span></a>
    <?php
     if ($value['response_counter_status']=='1') {
        echo"<span class='badge light badge-danger badge-text-size fs-14'> Wait for Saller's respnse</span>";
    }else{
        
        ?>
        <a class="confrimcounterresponse_r"   href="javascript:void(0)" tag="<?=$value['id'];?>" title=" Confirm Counter Response "><span class="badge light badge-success badge-text-size fs-14"><i class="fa fa-check"></i></span></a>
        <?php
    }
}
                                            ?>

                                         <?php
                                        //  if ($response_counter_status) { 
                                           $response_counter_status = $response_counter_status['confirm_counter_status']??0;
                                            // if ($value['response_counter_status']=='1') {
                                            //     echo"<span class='badge light badge-danger badge-text-size fs-14'> Wait for Saller's respnse</span>";
                                            // }else{
                                                
                                                ?>
                                            <!-- //     <a class="confrimcounterresponse_r"   href="javascript:void(0)" tag="<?=$value['id'];?>" title=" Confirm Counter Response "><span class="badge light badge-success badge-text-size fs-14"><i class="fa fa-check"></i></span></a> -->
                                                 <?php
                                            // }
                                        // } else{
                                        //   
                                          ?>
                                        <!-- <a class="confrimcounterresponse_r"   href="javascript:void(0)" tag="<?=$value['id'];?>" title=" Confirm Counter Response "><span class="badge light badge-success badge-text-size fs-14"><i class="fa fa-check"></i></span></a>-->
                                        <?php 
                                        // }
                                        }
                                       
                                        ?>
                                        <?php
                                        }

                                    ?>
                                   
                               

                                        <?php }  
                                        else if($value['status']==1){ ?>
                                             <a  href="javascript:void(0)" ><span class="badge light badge-success badge-text-size">Approved</span></a> 
                                             <?php } else if($value['status']==2){ ?> 
                                                <a  href="javascript:void(0)" ><span class="badge light badge-danger badge-text-size">Rejected</span></a>
                                                <?php } else if($value['status']==3){ ?> <a  href="javascript:void(0)" ><span class="badge light badge-danger badge-text-size">Cancelled</span></a>
                                                    <?php } } ?></td>
                                </tr> 
                                <tr class="">
                                    
                                        <tbody class="specification<?=$value['id']?> " tag="<?=$value['id']?>" style="display:contents" >
                                            <script>
                                                 getResponseSpecification(<?php echo $value['id'];?>);
                                            </script>
                                        </tbody>
                                    
                                </tr>



                            <?php
                             $i++; } ?>
                             </tbody>
                        </table>
                        </div>
                    </div>
                   
                </div>
                </div>
                    </div>
                   
                </div>
            <?php }
            } ?>
            <!-- <h4 class="card-title m-2 bg-white p-2">Rates offered by you</h4> -->
        <div class="row">
            <div class=" col-lg-3">
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
                                                <span class="fs-14"><?=$listedproduct['catname']??''?></span>
                                            </td>
                                        </tr>
                                         <tr>
                                             <td>
                                                <p class="text-black mb-1 font-w600">Delivery days</p>
                                            </td>
                                            <td>
                                                <span class="fs-14"><?=$listedproduct['delivery_days']??''?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                             <td>
                                                <p class="text-black mb-1 font-w600">Delivery Type</p>
                                            </td>
                                            <td>
                                                <span class="fs-14"><?php if($listedproduct['delivery_type']==0){ echo 'Self Pick Up'; } else { echo 'Doorstep Delivery';}?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                             <td>
                                                <p class="text-black mb-1 font-w600">Place of Delivery</p>
                                            </td>
                                            <td>
                                                <?php
if ($user_type != 3) {
   echo ' <span class="fs-14">'.$listedproduct['product_location'].'</span>';
}else{
    echo ' <span class="fs-14"></span>'; 
}
                                                ?>
                                                <!-- <span class="fs-14"><?=$listedproduct['product_location']?></span> -->
                                            </td>
                                        </tr>
                                        <tr>
                                             <td>
                                                <p class="text-black mb-1 font-w600">Validity</p>
                                            </td>
                                            <td>
                                                <span class="fs-14"><?=$listedproduct['validity']?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                             <td>
                                                <p class="text-black mb-1 font-w600">Rates Offered Type</p>
                                            </td>
                                            <td>
                                                <span class="fs-14"><?=$listedproduct['rates_offered']?></span>
                                            </td>
                                        </tr>
                                         <tr>
                                             <td>
                                                <p class="text-black mb-1 font-w600">Payment Terms</p>
                                            </td>
                                            <td>
                                                <span class="fs-14"> 
                                                    <?php if($listedproduct['payment_terms']== 0){ echo 'Advance';}
                                                    else if($listedproduct['payment_terms']== 1){ echo 'Same Day';}
                                                    else if($listedproduct['payment_terms']== 2){ echo '30 Days';} 
                                                    else if($listedproduct['payment_terms']== 3){ echo '15 Days';}
                                                    else if($listedproduct['payment_terms']== 4){ echo '30 Days';}
                                                    else if($listedproduct['payment_terms']== 5){ echo '45 Day';} ?>
                                               </span>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 pl-3">
                    <h4 class="card-title m-2 bg-white p-2">
                    <?php if ($listedproduct['added_by']==3) {
                       echo"Requirement posted by you";
                    } else {
                        echo" Rates offered by you";
                    }
                      ?> 
                       </h4>
                            <div class="table-div">
                                <div class="tabel-body-div">
                                    <div class="table-responsive ">

                                        <div id="table">
                                            <table id="producttype_tbale" class="table table-responsive-md tabledata size-6">
                                                <tr>
                                                    <th>S.No. </th>
                                                    <?php
                                                        $string = $listedproduct['specification'] ;
                                                        //echo $string;
                                                        if(substr($string, strlen($string)-1, 1) == '.'){ 
                                                            $string = preg_replace('/.$/', '', $string); //Remove dot at end if exists
                                                        } 
                                                        
                                                        //echo $string;
                                                        $array = explode(',', $string); //split string into array seperated by ', '
                                                        foreach($array as $value) //loop over values
                                                        {
                                                            // print_r($value);
                                                            // if($value == 'white_quality_table' ||$value == 'kraft_quality_table'){
                                                                
                                                            //     echo '<th  class="d-none"> Rate</th> ';    
                                                            // }
                                                            if($value == 'rate'){
                                                                if($dashboard_type == 1 and $user_type != 1){  echo '<th  class="labeltext">Cash Rate</th><th  class="labeltext" >Credit Rate</th> '  ;
                                                                }
                                                                else{
                                                                    if($listedproduct['catname'] == 'Kraft Paper' and $dashboard_type == 2 ){}
                                                                    else{
                                                                        echo '<th  class="labeltext"> Rate</th> ';    
                                                                    }
                                                                }
                                                            }elseif($value == 'min_quantity_uom'){
                                                                echo '';
                                                            }elseif($value == 'white_quality_table' ||$value == 'kraft_quality_table'){
                                                                echo '';
                                                            }
                                                            else{
                                                                if(( $value == 'quantity_uom' or $value == 'quantity_type' or $value == 'size' or $value == 'size_uom') and ( $dashboard_type == 1 and $user_type != 1)) {}
                                                                else{ 
                                                                     if(($listedproduct['catname'] == 'Kraft Paper' and $dashboard_type == 2 ) and  ($value == 'size' or $value == 'size_uom')){}
                                                                    else{
                                                                        $cl='';
                                                                        if($value == 'white_quality_table' ||$value == 'kraft_quality_table'){ 
                                                                            $cl='d-none';
                                                                        }
                                                                        echo '<th  class="labeltext "'. $cl.'">'.str_replace("_"," ",$value).'</th>';
                                                                    }
                                                                }
                                                            }
                                                           
                                                        }
                                                    ?>
                                                </tr>

                                                <?php
                                                if ($listspecification) {
                                                    $i = 1;
                                                    
                                                 
                                                    foreach ($listspecification as $value) {
                                                        // print_r($value);
                                                        $sub_category = $value['sub_category'];
                                                        $valid_from = $value['valid_from'];
                                                        $truck_ratio = $value['truck_ratio'];
                                                        $bundle_weight  = $value['bundle_weight']??'';
                                                ?>
                                                        <tr>
                                                            <td><?= $i; ?></td>
                                                        <?php 
                                                        
                                                        foreach($array as $data) //loop over values
                                                        {
                                                            // print_r($data);
                                                            if($data == 'quantity_type'){ 
                                                                if($dashboard_type == 2 or $user_type == 1){ 
                                                                    if($value[$data]==1){ echo '<td>Godown</td>'; } 
                                                                    else if($value[$data]==2) { echo '<td>Truck Load</td>';}
                                                                    else if($value[$data]==3) { echo '<td>Part Truck Load</td>';}
                                                                    else{ echo '<td>NA</td>';}
                                                                }
                                                            }
                                                           
                                                            else if( $data == 'quantity' ){ echo '<td>'.$value['quantity'].'</td>'; } 
                                                            else if( $data == 'product_form' ){ if($value[$data]==1){ echo '<td>Compressed</td>'; } else { echo '<td>Loose</td>';} }
                                                            else if( $data == 'brand_name' ){ echo '<td>'.$value['bname'].'</td>'; }  
                                                            else if( $data == 'sub_category' ){ echo '<td>'.$value['cname'].'</td>'; } 
                                                            else if( $data == 'white_quality_table' ){

                                                                $attr='';
                                                                if ($user_type ==3 && ($listspecification_waste['sub_category']==28 || $listspecification_waste['sub_category']==29)) {
                                                                   $attr='form="update_wastpaper_price"';
                                                                } else {
                                                                    $attr="disabled";
                                                                }
                                                                ?>
                                                             <tr><table id="wastepapertable" style="" ><tr> </tr><tr><th></th><th>ON-Report</th><th>NON-Report</th></tr>
    <form method="post" id="update_wastpaper_price">
    <input type="hidden" class="tableinput" <?=$attr?> value="<?=$listspecification_waste["id"]??""?>" name="id">
    <input type="hidden" class="tableinput" <?=$attr?> value="1" name="rowcount[]">
    <input type="hidden" class="tableinput" <?=$attr?> value="<?=$listedproduct['catname']??""?>" name="category">
    <input type="hidden" class="tableinput" <?=$attr?> value="<?=$listedproduct['delivery_days']??''?>" name="delivery_days">
    <input type="hidden" class="tableinput" <?=$attr?> value="<?=$listedproduct['delivery_type']??""?>" name="delivery_type">
    <input type="hidden" class="tableinput" <?=$attr?> value="<?=$listedproduct['product_location']??""?>" name="product_location">
    <input type="hidden" class="tableinput" <?=$attr?> value="<?=$listedproduct['validity']??""?>" name="validity">
    <input type="hidden" class="tableinput" <?=$attr?> value="<?=$listedproduct['rates_offered']??""?>" name="rates_offered">
    <input type="hidden" class="tableinput" <?=$attr?> value="<?=$listedproduct['payment_terms']??""?>" name="pterm">
    <input type="hidden" class="tableinput" <?=$attr?> value="<?=$sub_category??""?>" name="sub_category">
    <input type="hidden" class="tableinput" <?=$attr?> value="<?=$listspecification_waste["valid_from"]??""?>" name="valid_from">
    <input type="hidden" class="tableinput" <?=$attr?> value="<?=$truck_ratio??""?>" name="truck_ratio">
    <input type="hidden" class="tableinput" <?=$attr?> value="<?=$bundle_weight??""?>" name="bundle_weight">
    <?php
   
    
if ($value["sub_category"]==28) {
   ?> 
    <tr>
            <th>Scan</th>
            <td><input type="text" class="tableinput" <?=$attr?> value="<?=$listspecification_waste["w_scan_on"]??""?>" name="w_scan_on"></td>
            <td><input type="text" class="tableinput" <?=$attr?> value="<?=$listspecification_waste["w_scan_non"]??""?>" name="w_scan_non"></td>
        </tr>
        <tr>
            <th>Colour</th>
            <td><input type="text" class="tableinput" <?=$attr?> value="<?=$listspecification_waste["w_color_on"]??""?>" name="w_color_on"></td>
            <td><input type="text" class="tableinput" <?=$attr?> value="<?=$listspecification_waste["w_color_non"]??""?>" name="w_color_non"></td>
        </tr>
        <tr>
            <th>Copy</th>
            <td><input type="text" class="tableinput" <?=$attr?> value="<?=$listspecification_waste["w_copy_on"]??""?>" name="w_copy_on"></td>
            <td><input type="text" class="tableinput" <?=$attr?> value="<?=$listspecification_waste["w_copy_non"]??""?>" name="w_copy_non"></td>
        </tr>
        <tr>
            <th>Record</th>
            <td><input type="text" class="tableinput" <?=$attr?> value="<?=$listspecification_waste["w_record_on"]??""?>" name="w_record_on"></td>
            <td><input type="text" class="tableinput" <?=$attr?> value="<?=$listspecification_waste["w_record_non"]??""?>" name="w_record_non"></td>
        </tr>
        <tr>
            <th>Shorted Book</th>
            <td><input type="text" class="tableinput" <?=$attr?> value="<?=$listspecification_waste["w_short_on"]??""?>" name="w_short_on"></td>
            <td><input type="text" class="tableinput" <?=$attr?> value="<?=$listspecification_waste["w_short_non"]??""?>" name="w_short_non"></td>
        </tr>
        <tr>
            <th>White Cutting 1st Brightness 80% plus</th>
            <td><input type="text" class="tableinput" <?=$attr?> value="<?=$listspecification_waste["w_whitecutting_on"]??""?>" name="w_whitecutting_on"></td>
            <td><input type="text" class="tableinput" <?=$attr?> value="<?=$listspecification_waste["w_whitecutting_non"]??""?>" name="w_whitecutting_non"></td>
        </tr>
        <tr>
            <th>White Pepsi</th>
            <td><input type="text" class="tableinput" <?=$attr?> value="<?=$listspecification_waste["w_pepsi_on"]??""?>" name="w_pepsi_on"></td>
            <td><input type="text" class="tableinput" <?=$attr?> value="<?=$listspecification_waste["w_pepsi_non"]??""?>" name="w_pepsi_non"></td>
        </tr>
        <tr>
            <th>White Board</th>
            <td><input type="text" class="tableinput" <?=$attr?> value="<?=$listspecification_waste["w_board_on"]??""?>" name="w_board_on"></td>
            <td><input type="text" class="tableinput" <?=$attr?> value="<?=$listspecification_waste["w_board_non"]??""?>" name="w_board_non"></td>
        </tr>
        <tr>
            <th>Old Book</th>
            <td><input type="text" class="tableinput" <?=$attr?> value="<?=$listspecification_waste["w_book_on"]??""?>" name="w_book_on"></td>
            <td><input type="text" class="tableinput" <?=$attr?> value="<?=$listspecification_waste["w_book_non"]??""?>" name="w_book_non"></td>
        </tr>
        <tr>
            <th>Rulled Cutting</th>
            <td><input type="text" class="tableinput" <?=$attr?> value="<?=$listspecification_waste["w_rulled_on"]??""?>" name="w_rulled_on"></td>
            <td><input type="text" class="tableinput" <?=$attr?> value="<?=$listspecification_waste["w_rulled_non"]??""?>" name="w_rulled_non"></td>
        </tr>
        <tr>
            <th>Tick Mark Pepsi</th>
            <td><input type="text" class="tableinput" <?=$attr?> value="<?=$listspecification_waste["w_tick_on"]??""?>" name="w_tick_on"></td>
            <td><input type="text" class="tableinput" <?=$attr?> value="<?=$listspecification_waste["w_tick_non"]??""?>" name="w_tick_non"></td>
        </tr>
        <!-- <tr>
            <th></th>
            <td><input type="datetime-local" class="tableinput"  <?=$attr?>   name="valid from"></td>
            <td><button type="submit" class="btn btn-primary"  <?=$attr?> >Change Price</button></td>
        </tr>
    </table> -->
   <?php
}

?>
    <?php
if ($value["sub_category"]==29) {
   ?> 
     <tr>
            <th>Corrugation Ist</th>
            <td><input type="text" class="tableinput"  <?=$attr?> value="<?=$listspecification_waste["k_corr1_on"]??""?>" name="k_corr1_on"></td>
            <td><input type="text" class="tableinput"  <?=$attr?> value="<?=$listspecification_waste["k_corr1_non"]??""?>" name="k_corr1_non"></td>
        </tr>
        <tr>
            <th>Corrugation IInd</th>
            <td><input type="text" class="tableinput"  <?=$attr?> value="<?=$listspecification_waste["k_corr2_on"]??""?>" name="k_corr2_on"></td>
            <td><input type="text" class="tableinput"  <?=$attr?> value="<?=$listspecification_waste["k_corr2_non"]??""?>" name="k_corr2_non"></td>
        </tr>
        <tr>
            <th>Dye Cutting</th>
            <td><input type="text" class="tableinput"  <?=$attr?> value="<?=$listspecification_waste["k_dye_on"]??""?>" name="k_dye_on"></td>
            <td><input type="text" class="tableinput"  <?=$attr?> value="<?=$listspecification_waste["k_dye_non"]??""?>" name="k_dye_non"></td>
        </tr>
        <tr>
            <th>Grey Board</th>
            <td><input type="text" class="tableinput"  <?=$attr?> value="<?=$listspecification_waste["k_grey_on"]??""?>" name="k_grey_on"></td>
            <td><input type="text" class="tableinput"  <?=$attr?> value="<?=$listspecification_waste["k_grey_non"]??""?>" name="k_grey_non"></td>
        </tr>
        <tr>
            <th>Duplex</th>
            <td><input type="text" class="tableinput"  <?=$attr?> value="<?=$listspecification_waste["k_duplex_on"]??""?>" name="k_duplex_on"></td>
            <td><input type="text" class="tableinput"  <?=$attr?> value="<?=$listspecification_waste["k_duplex_non"]??""?>" name="k_duplex_non"></td>
        </tr>
        <tr>
            <th>Mill Board</th>
            <td><input type="text" class="tableinput"  <?=$attr?> value="<?=$listspecification_waste["k_mill_on"]??""?>" name="k_mill_on"></td>
            <td><input type="text" class="tableinput"  <?=$attr?> value="<?=$listspecification_waste["k_mill_non"]??""?>" name="k_mill_non"></td>
        </tr>
        <tr>
            <th>Core Pipe</th>
            <td><input type="text" class="tableinput"  <?=$attr?> value="<?=$listspecification_waste["k_core_on"]??""?>" name="k_core_on"></td>
            <td><input type="text" class="tableinput"  <?=$attr?> value="<?=$listspecification_waste["k_core_non"]??""?>" name="k_core_non"></td>
        </tr> 
        <?php
}

?>

<?php
if ($user_type ==3 && ($listspecification_waste['sub_category']==28 || $listspecification_waste['sub_category']==29)) {
  ?>
  <tr>
    <th></th>
    <td><input type="datetime-local" class="tableinput"  <?=$attr?> value="<?=$listspecification_waste["valid_from"]??""?>"  name="valid from"></td>
    <td><button type="submit" class="btn btn-primary" <?=$attr?>>Change Price</button></td>
</tr>
  <?php
}

?>

</form>
</table></tr>
                                                        <?php } 
                                                            else if( $data == 'truck_ratio' ){ $tr = $value['truck_ratio'];
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
                                                                } 
                                                                 } 
                                                            else if( $data == 'rate' ){ 
                                                                if($dashboard_type == 1 and $user_type != 1){ echo '<td>'.$value['cashrate'].'</td><td>'.$value['creditrate'].'</td>'; }
                                                                else{  
                                                                    if($listedproduct['catname'] == 'Kraft Paper' and $dashboard_type == 2 ){}
                                                                    else{
                                                                       echo '<td>'.$value['rate'].'</td>'; 
                                                                    }
                                                                } 
                                                            }else if($data =='min_quantity_uom'){
echo "";
                                                            }
                                                            else{ 
                                                                if(($data == 'quantity' or $data == 'quantity_uom' or $data == 'quantity_type' or $data == 'size' or $data == 'size_uom') and ($dashboard_type == 1 and $user_type !=1)) {}
                                                                else{
                                                                    if(($listedproduct['catname'] == 'Kraft Paper' and $dashboard_type == 2 ) and  ($data == 'size' or $data == 'size_uom')){}
                                                                    else{ 
                                                                        echo '<td>'.$value[$data] ?? "".'</td>';
                                                                    }
                                                                  
                                                                }
                                                              
                                                            }
                                                        }?>
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
                        <!--   <?php if(!empty($listedproduct['list_pimage'])) { ?><div class=" col-lg-4">
                        <div class="card ml-2">
                          
                            <div class="card-body">
                           
                               <img src="<?=base_url()?>/document/product/<?=$listedproduct['list_pimage']?>" width=100%>
                          
                            </div>
                        </div></div> <?php }  ?> -->
                        <div class=" col-lg-4">
                        <div class="card ml-2">
                          
                            <div class="card-body">
                                <?php if(!empty($listedproduct['list_pimage'])) { ?>
                                    <img src="<?=base_url()?>/document/product/<?=$listedproduct['list_pimage']?>" width=100%>
                                <?php }  ?>
                                <?php if($listedproduct['deckle'] == 1) { ?>
                                 <div class="table-responsive">
                                    <span class="text-black font-w600"> Size List </span> 
                                    <div  id="table">
                                        <table id="producttype_tbale" class="table text-center tabledata size-6">
                                        <thead>
                                            <th>S.No</th>
                                            <th>Product Specification</th>
                                            <th>Size </th>
                                            <th>Qty</th>
                                        </thead>
                                       <tbody>
                                    <?php
                                    if ($decklesize) 
                                    {$i=1;
                                        foreach ($decklesize as $value)  
                                        { 
                                                // print_r($data);
                                            ?>
                                            <tr id="row<?=$value['id']?>">
                                                <td class="row-id" ><?= $i;?></td>
                                                <td>BF : <?=$value['bf']?>; GSM : <?=$value['gsm']?>; Type: <?=$value['type']?></td>
                                                <td> <?=$value['size'];?></td>
                                                <td> <?=$value['quantity'];?> </td>
                                               
                                            </tr>
                                        <?php
                                        $i++;
                                        }
                                       
                                    }
                                    else
                                    {
                                        ?>
                                        <tr>
                                            <td colspan="3">No Data</td>
                                        </tr>
                                        <?php
                                    }?>
                                </tbody>
                                     </table>
                                    </div>
                                </div><?php }  ?>
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
                <div class="modal-body counterdata"></div>
                <div class="modal-footer counterfooter">
                    <button type="button" class="btn btn-secondary close" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
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


<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateValidityModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="updateValidityModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fs-5" id="exampleModalLabel">Update Offer Validity</h5>
        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
      </div>
      <div class="modal-body">
             <form id="offerlimitUpdateform">
                 <input type="hidden" class="form-control" id="offerid" name='offerid' value="<?=$offer_value_id??''?>"> 
                <div class="mb-3">
                    <label for="offer_validity" class="form-label">Update Validity</label>
                    <input type="datetime-local" class="form-control" id="offer_validity" name='offerlimit' > 
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






<!-- Button trigger modal
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pendingcounter">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="pendingcounter" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fs-5" id="exampleModalLabel">Counter Status</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <h1 class="modal-title fs-5 text-danger text-center" id="exampleModalLabel">Counter Pending</h1>
      </div>
      <div class="modal-footer d-flex justify-content-start">
        <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
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
                <input type="hidden" name="listproduct_id"  id="listproduct_id" value="<?=$listedproduct['id']?>" class="form-control">
                <div class="modal-body counterdatasize"></div>
                <div class="modal-footer counterfootersize">
                    <button type="button" class="btn btn-secondary close" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>  