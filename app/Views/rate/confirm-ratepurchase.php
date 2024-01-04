
                    
                        
<div class="container-fluid">
<div class="card-header p-0">
    <h4 class="card-title m-2">Confirm Purchase </h4>
    <div class="pull-right float-end ">
        <ul class="nav nav_filter ">
            <li class="nav-item text-end">
               <a href="javascript:void(0)" class="btn btn-primary mb-2 nav-postedrates" >Back</a>
              
            </li>
        </ul>
    </div>
</div>  
    
<form class="" id="add_purchase_form" method="post" enctype="multipart/form-data">
    <div class="card  mb-0">
        <div class="card-body size-4">
            <div class="form-row">
            <input type="hidden" name="rate_id" value=<?=$rate['id']?> >
            <input type="hidden" name="response_id" value="" >
            <input type="hidden" name="accepted_id" value=<?=$rate['added_by']?> >
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
                    <label># Purchase</label><span class="text-danger">*</span>
                    <input type="text" class="form-control" name="order_number" id="order_number" placeholder="Product Name" value="<?= $total_order?>" readonly>
                    
                </div>
                 <div class="form-group mb-0  col-md-3">
                    <label>Category Name</label><span class="text-danger">*</span>
                    <input type="text" style="height:36px" class=" form-control search-product" name="txtCompany[]" tag="1" value="<?=$rate['catname']?>" required readonly>
                            
                    <input type="hidden" name="product_id" tag="1" id="product_id" value="<?=$rate['category']?>" >
                    
                </div>
              
                   <input  type="hidden" class="datepicker-default form-control" id="datepicker" name="order_date" value="<?=date("d") ."  " . date("F") .", ". date("Y");?>"   >
              
           
               
                    <input type="hidden" class="form-control  form-control-sm " name="clientdetail" value="<?=$memberDetail['company_name'];?> , <?=$memberDetail['user_name'];?>" readonly>
                    <div class="suggestionAra client"></div>
                        <input type="hidden" name="order_to_id" value="<?=$memberDetail['id'];?>" >
                        <input type="hidden" name="order_to_name" value="<?=$memberDetail['company_name'];?>" >
                        <input type="hidden" name="order_to_mobile" value="<?=$memberDetail['phone_number'];?>" >
                   
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

                        <option value="0"  >Self Pick Up</option>
                        <option value="1" >Doorstep Delivery</option>
                     
                    </select>
                    <span class="text-danger size-7 e_delivery_type"></span>
                </div>
                

                <div class="form-group mb-0  col-md-3">
                    <label>Delivery days</label><span class="text-danger">*</span>
                    <input type="text" class="form-control" name="ddays" id="ddays" placeholder="Delivery days"  >
                    
                </div>
                 <div class="form-group mb-0  col-md-3">
                    <label>Payment Terms</label><span class="text-danger">*</span>
                   <select  class="form-control" name="pterms" tag="1" id="pterms" >
                        <option value="0"  >Advance</option>
                        <option value="1"  >Same Day</option>
                        <option value="2"  >Next Day</option>
                        <option value="3"  >15 Day</option>
                        <option value="4"  >30 Day</option>
                        <option value="5"  >45 Day</option>
                    </select>
                    
                </div>
               
             </div>
        </div>
    </div>
    <div class="card-header">
        <h6 class=" m-1">Product Info</h6>
      
    </div>              
    
    <div class="card mb-2 product1">
        
        <div class="card-body size-4">
            <table id="producttype_tbale" class="table table-responsive-md tabledata size-6">
                <thead>
                    <tr>
                         <?php
                            $string = $rate['specification'] ;
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
                        <th>Discount </th>
                        <th>Insurance Cost</th>
                        <th>Total Price</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="productdata">

                <?php
                    if ($ratespecification) {
                        $i = 1;
                        
                        foreach ($ratespecification as $value) {
                    ?>
                            <tr class="product<?=$i?>">
                                <input type="hidden" name="specificationid[]" value="<?=$value['id']?>">
                              <?php 
                            foreach($array as $data) //loop over values
                            {
                                if($data == 'quantity_type'){ if($value[$data]==1){ echo '<td>Godown</td>'; } 
                                            else if($value[$data]==2) { echo '<td>Truck Load</td>';}
                                             else if($value[$data]==3) { echo '<td>Part Truck Load</td>';}
                                             else{ echo '<td>NA</td>';}}
                                else if( $data == 'product_form' ){ if($value[$data]==1){ echo '<td>Compressed</td>'; } else { echo '<td>Loose</td>';} }
                                else if( $data == 'quantity'){ ?>   <?php }
                                else if( $data == 'rate'){ ?>  <?php }
                                else{ echo '<td>'.$value[$data].'</td>';}
                            }?>
                            <td>
                                <input type="text" style="height:36px" class=" form-control qty qtyvalidation" name="qty[]" tag="<?=$i?>"  min="<?=$value['min_qty']?>" value="<?=$value['quantity'] ?>" required >
                                <span class="text-danger size-7 e_qty1"></span>
                            </td>
                             <td>
                                <?=$value['rate']?>
                                        <input type="hidden" style="height:36px" class=" form-control rate" name="rate[]" tag="<?=$i?>"  value="<?=$value['rate']?>" required >
                                         <span class="text-danger size-7 e_rate1"></span>
                                    </td>
                              <td>
                            <input type="text" style="height:36px" class=" form-control price" name="price[]" tag="<?=$i?>" value="<?=$value['rate'] * $value['quantity'] ?>"    readonly>
                            <span class="text-danger size-7 e_price1"></span>
                        </td>
                        <td>
                            <input type="text" style="height:36px" class=" form-control tax" name="tax[]" tag="<?=$i?>"  value="0" required>
                            <span class="text-danger size-7 e_tax1"></span>
                        </td>
                        <td>
                            <input type="number" style="height:36px" class="form-control discount" name="discount[]" tag="<?=$i?>" min=0 max=100  value="0" required>
                            <span class="text-danger size-7 e_discount1"></span>
                        </td>
                       
                        <td>
                             <input type="number" style="height:36px" class="form-control insurance_cost" name="insurance_cost[]" tag="<?=$i?>"  value="0" required>
                            <span class="text-danger size-7 e_insurance_cost1"></span>
                        </td>
                        <td>
                            <input type="text" style="height:36px" class=" form-control total_price" name="total_price[]" tag="<?=$i?>"  value="<?=$value['rate'] * $value['quantity'] ?>"  readonly>
                            <span class="text-danger size-7 e_total_price1"></span>
                        </td>
                        <td></td>
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




