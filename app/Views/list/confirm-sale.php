
                    
                        
<div class="container-fluid">
<div class="card-header p-0">
    <h4 class="card-title m-2">Confirm List Response </h4>
    <div class="pull-right float-end ">
        <ul class="nav nav_filter ">
            <li class="nav-item text-end">
               <a href="javascript:void(0)" class="btn btn-primary mb-2 viewList" tag="<?=$listedproduct['id']??0?>" >Back</a>
              
            </li>
        </ul>
    </div>
</div>  
<?php
 
                ?>
<form class="" id="add_sale_form" method="post" enctype="multipart/form-data">
    <div class="card  mb-0">
        <div class="card-body size-4">
            <div class="form-row">
            <input type="hidden" name="list_id" value=<?=$response['list_id']?> >
            <input type="hidden" name="response_id" value=<?=$response['id']?> >
            <input type="hidden" name="deckle" value=<?=$listedproduct['deckle']??1?> >
            <?php
// if ($user_type ==4 || $user_type==5) {
//     $vl=$listedproduct['added_by'];
// }else{
//     $vl = $response['interested_id'];
// }
?>
            <input type="hidden" name="accepted_id" value=<?=$response['interested_id']?> >
          <?php 
                if($ordercount)
                {
                     
                      $total_order =  $ordercount + 1;
                      $total_order = sprintf('%04d', $total_order);
                      $total_order = 'ON-'.$total_order;

                  
                } 
                else{ $total_order =  1;
                      $total_order = sprintf('%04d', $total_order);
                      $total_order = 'ON-'.$total_order;}
                ?>

                <div class="form-group mb-0  col-md-3">
                    <label># Sale</label><span class="text-danger">*</span>
                    <input type="text" class="form-control" name="order_number" id="order_number" placeholder="Product Name" value="<?= $total_order?>" readonly>
                    
                </div>
                 <!--  -->
              
                   <input  type="hidden" class="datepicker-default form-control" id="datepicker" name="order_date" value="<?=date("d") ."  " . date("F") .", ". date("Y");?>"   >
              
                
                
                    <input type="hidden" class="form-control  form-control-sm " name="clientdetail" value="<?=$response['company_name'];?> , <?=$response['user_name'];?>" readonly>
                   
                        <input type="hidden" name="order_to_id" value="<?=$response['interested_id'];?>" >
                        <input type="hidden" name="order_to_name" value="<?=$response['company_name'];?>" >
                        <input type="hidden" name="order_to_mobile" value="<?=$response['phone_number'];?>" >
                    
                <div class="form-group mb-0  col-md-3">
                    <label>Payment Status</label><span class="text-danger">*</span>
                    <select  class="form-control" id="payment_status" name="payment_status">
                        <option value="0" selected>Un Paid</option>
                        <option value="1" >Paid</option>
                    </select>
                    <span class="text-danger size-7 e_product_category"></span>
                </div>
                <input type="hidden" name="order_type" value="2">
                <div class="form-group mb-0  col-md-3">
                    <label>Delivery Type</label><span class="text-danger">*</span>
                        <select  class="form-control" id="delivery_type" name="delivery_type" >

                        <!-- <option value="0" selected ?>Self Pick Up</option> -->
                        <!-- <option value="0" <?php if ( $response['delivery_type'] =='0'){ echo 'selected';}   ?> >Zeto Transport</option> -->
                        <option value="0" <?php if ( $response['delivery_type'] =='1'){ echo 'selected';}  ?>>Mill Transport</option>
                        <option value="0" <?php if ( $response['delivery_type'] =='2'){ echo 'selected';}  ?>>Doorstep Delivery</option>
                                                 
                            </select>
                         <span class="text-danger size-7 e_delivery_type"></span>
                </div>
                  <div class="form-group mb-0  col-md-3">
                    <label>Delivery days</label><span class="text-danger">*</span>
                    <input type="text" class="form-control" name="ddays" id="ddays"  value="<?= $listedproduct['delivery_days']??''?>" readonly>
                    
                </div>
                 <div class="form-group mb-0  col-md-3">
                    <label>Payment Terms</label><span class="text-danger">*</span>
                   <select  class="form-control" name="pterms" tag="1" id="pterms" >
                        <option value="0" <?php if($listedproduct['payment_terms']??'' == '0'){ echo 'selected'; } ?> >Advance</option>
                        <option value="1" <?php if($listedproduct['payment_terms']??'' == '1'){ echo 'selected'; } ?>>Same Day</option>
                        <option value="4" <?php if($listedproduct['payment_terms']??'' == '2'){ echo 'selected'; } ?> >30 Days</option>
                    </select>
                    
                </div>
                <!--  <div class="form-group mb-0  col-md-3">
                    <label>Transport Mode</label><span class="text-danger">*</span>
                    <select  class="form-control" id="transport_type" name="transport_type" required>
                        <option value="" selected>Choose</option>
                        <option value="1" >Self Alocation </option>
                        <option value="2" >By Transporter </option>
                    </select>
                   
                </div>
                <div class="col-md-4">
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
                </div> -->
             </div>
        </div>
    </div>
    <div class="card-header">
        <h6 class=" m-1">Product Info</h6>
        <!-- <div class="pull-right float-end ">
            <a href="javascript:void(0)" class="badge light badge-success size-7  append-product" tag="1" >Add Product</a>
        </div> -->
    </div>              
    
    <div class="card mb-2 product1">
        
        <div class="card-body size-4" style="overflow-x:auto">
                        <table id="producttype_tbale" class="table table-responsive-md tabledata size-6">
                <thead>
                    <tr>
                         <?php
                            $string = $listedproduct['specification']??'' ;
                            $string = preg_replace('/\.$/', '', $string); //Remove dot at end if exists
                            $array = explode(',', $string); //split string into array seperated by ', '
                            foreach($array as $value) //loop over values
                            {
                                if($value == 'rate' ){ }
                                else if( $value == 'quantity'){ }
                                else    { echo '<th  class="labeltext">'.str_replace("_"," ",$value).'</th>'; }

                                
                            }?>
                        <th>Quantity</th>
                        <th>Rate</th>
                        <th>Product Price</th>
                        <th>Tax </th>
                        <!-- <th>Discount </th> -->
                        <th>Insurance Cost</th>
                        <th>Est. Amount</th>
                        <th></th>
                    </tr>
                </thead>
               
                <tbody id="productdata">

                    <?php
                            if ($responsespecification) {
                                $i = 1;
                                
                                foreach ($responsespecification as $value) {
                            ?>
                                    <tr class="product<?=$i?>">
                                        <input type="hidden" name="specificationid[]" value="<?=$value['id']?>">
                                      <?php 
                                    //   print_r($array);
                                    foreach($array as $data) //loop over values
                                    {
                                        if($data == 'quantity_type'){ if($value[$data]==1){ echo '<td>Godown</td>'; } 
                                                    else if($value[$data]==2) { echo '<td>Truck Load</td>';}
                                                     else if($value[$data]==3) { echo '<td>Part Truck Load</td>';}
                                                     else{ echo '<td>NA</td>';}}
                                        else if( $data == 'product_form' ){ if($value[$data]==1){ echo '<td>Compressed</td>'; } else { echo '<td>Loose</td>';} }
                                         else if( $data == 'sub_category'){  echo '<td>'.$value['cname'].'</td>'; }
                                        else if( $data == 'quantity'){ ?>   <?php }
                                        else if( $data == 'rate'){ ?>  <?php }
                                        else{
                                             echo '<td></td>';
                                            }
                                    }?>
                        <td>
                            <input type="text" style="height:36px" class=" form-control qty qtyvalidation" name="qty[]" tag="<?=$i?>"  value="<?=$value['fquantity']?>"required readonly>
                            <span class="text-danger size-7 e_qty1"></span>
                        </td>
                        <td>
                            <input type="text" style="height:36px;width:100px" class=" form-control rate" name="rate[]" tag="<?=$i?>"  value="<?=$value['frate']?>" required readonly>
                             <span class="text-danger size-7 e_rate1"></span>
                        </td>
                        <td>
                            <input type="text" style="height:36px" class=" form-control price" name="price[]" tag="<?=$i?>"   value="<?=$value['frate']*$value['fquantity']?>" readonly>
                            <span class="text-danger size-7 e_price1"></span>
                        </td>
                        <?php 
                                // print_r($listedproduct['product_location']); 
                                // print_r($listedproduct['delivery_locations']);
                                $price=$value['frate']*$value['fquantity'];
                                $p_location = $listedproduct['product_location']??'';
                                $d_location =$listedproduct['delivery_locations']??'';
                                // if($p_location==1 || $p_location==2){
                                //     if($d_location==1){
                                //         $s_tax = ($price*12)/100; 
                                //         $t_title = "IGST";
                                //     }else{
                                //         $s_tax=($price*12)/100;
                                //         $t_title = "CGST and SGST";
                                //     }
                                // }  
                        ?>
                        <td>
                            <input type="text" style="height:36px;width:100px" class=" form-control tax" title="" name="tax[]" tag="<?=$i?>"  value="0" required>
                            <!-- <select class="form-select tax" name="tax[]" tag="<?=$i?>" required>
                            <option value='0'>Tax</option>
                            <option value="12">IGST</option>
                            <option value="12">SGST & CGST</option> 
                            </select> -->
                            <span class="text-danger size-7 e_tax1"></span>
                        </td>
                     
                       
                        <td>
                             <input type="number" style="height:36px" class="form-control insurance_cost" name="insurance_cost[]" tag="<?=$i?>"  value="0" required>
                            <span class="text-danger size-7 e_insurance_cost1"></span>
                        </td>
                        <td>
                            <input type="text" style="height:36px" class=" form-control total_price" name="total_price[]" tag="<?=$i?>"  value="<?=$value['frate']*$value['fquantity']?>"  readonly>
                            <span class="text-danger size-7 e_total_price1"></span>
                        </td>
                        <td></td>   <td>
                            <input type="text" style="display:none" class="form-control discount" name="discount[]" tag="<?=$i?>" min=0 max=100  value="0" >
                            <span class="text-danger size-7 e_discount1"></span>
                        </td>
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
                   
                </tbody>
            </table>
            
            </div>

    </div>
    <div class="product-append m-0 p-0"></div>
                
            <div class="card ">
                
                <div class="card-body size-4">
                            <div class="form-row">    
                                <div class="form-group mb-2  col-md-12">
                                    <label>Description</label>
                                    <textarea type="text" class="form-control" name="description"></textarea>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        
                   
                    </div>
                </div>
            
    </form>
</div>



