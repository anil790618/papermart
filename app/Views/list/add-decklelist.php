<div class="">
    <div class="from-div-area">
        
        <div class="card-header p-0">
            <h4 class="card-title m-2 form-main-title"> <?php if($dashboard_type == 2){ echo ' Add Requirements For buying '; } else { echo 'Add List for selling  '; }?><?=$product['product_name'] ?? ''?> <br><small>Enter the product requirement </small></h4>
            <div class="pull-right float-end ">
                <ul class="nav nav_filter ">
                    <li class="nav-item text-end">
                         <a href="javascript:void(0)" class="addpurchase-text nav-list" >Back</a>
                    </li>
                </ul>
            </div>
        </div>
        <input type="hidden" id="dtype" value="<?=$dashboard_type;?>">
        <input type="hidden" id="utype" value="<?=$user_type;?>">
    <form class="" id="add_list_form" method="post" enctype="multipart/form-data">
        <input type="hidden" name="list_type" id="list_type"  value="<?=$dashboard_type?>"> 
        <input type="hidden" name="category_id" id="category_id"   value="<?=$product['product_category'] ?? ''?>">
         <input type="hidden" name="deckle" id="deckle"  value="1"> 
         <input type="hidden" name="pid" id="pid"   value="<?=$product['id'] ?? ''?>"> 
        <div class="from-section ">
            <div class=" size-4">
                <div class="form-row">
                    <div class="col-12 from-header mb-3">
                        <h6 class="from-heading">Listing Details</h6>
                    
                    </div>
                    
                    <?php 
                    if($listcount)
                    {
                         
                          $total_list =  $listcount + 1;
                          $total_list = sprintf('%04d', $total_list);
                          $total_list = 'LO-'.$total_list;

                      
                    } 
                    else{ $total_list =  1;
                          $total_list = sprintf('%04d', $total_list);
                          $total_list = 'LO-'.$total_list;}
                    ?>

                    <div class="form-group mb-0  col-md-3">
                        <div class="purchase-div">
                            <label> List Number </label><span class="text-danger">*</span>
                            <input type="text" class="form-control" name="list_number" id="list_number" placeholder="Product Name" value="<?= $total_list?>" readonly>
                        </div>
                        <span class="text-danger size-7 e_list_number"></span>
                    </div>


                    <div class="form-group col-md-3">
                        <label>Product Category</label><span class="text-danger">*</span>
                        <select  class="form-control ratecat" id="category" name="category" >
                            <option value="">Choose....</option>
                             <?php 
                                if ($category) 
                                { foreach ($category as $value)  
                                    { 
                                    ?>

                                    <option value="<?=$value['id']?>" <?php if($catdata){ if($value['id'] == $catdata['id']){ echo 'selected';} }?> ><?=$value['product_category']?></option>
                                    <?php }
                                }?>
                        </select>
                        <span class="text-danger size-7 e_product_category"></span>
                    </div>
                    <?php if($dashboard_type == 1 and ($user_type== 3 or $user_type== 4)){ ?> 
                     <div class="col-3 p-2 "> 
                            <label>Validity</label> 
                            <input type="datetime-local" name="validity" class="form-control" required>
                            <span class="size-7 e_validity text-danger"></span> 
                        </div>
                        <div class="col-3 p-2 ">
                            <label>Rates offered<span class="text-danger"> *</span></label>
                            <select  name="rates_offered" id="rates_offered" class="form-control">
                                <option value="Ex-mill"> Ex-mill</option>
                                <option value="Ex-Godown"> Ex-Godown</option>
                                <option value="FOR"> FOR</option>
                            </select>
                            <span class="size-7 e_rates_offered text-danger"></span>
                        </div>
                    <?php }?>
                </div>
            </div>
        </div>
        
           <input type="hidden" id="pquality" name="pquality" value='<?=json_encode($pquality ?? '') ;?>'> 
           <input type="hidden" id="sub_category" name="sub_category" value='<?=json_encode($subcategory ?? '') ;?>'> 
           <input type="hidden" id="brand" name="brand" value='<?=json_encode($brand  ?? '');?>'> 
           <input type="hidden" id="specification" name="specification" value='<?=($catdata['product_specification'] ?? '');?>'>  
            
            <div class=" row list_type_description" > </div>
        
            <div class="">
                <div class="from-section size-4">
                    <div class="form-row">  
                        <div class="col-12 from-header mb-3">
                            <h6 class="from-heading">Delivery Details</h6>
                        
                        </div>
                        <div class="form-group mb-0  col-md-3">
                                <label>Delivery Type </label><span class="text-danger">*</span>
                                
                                 <select  class="form-control" name="delivery_type" tag="1" id="delivery_type" >
                                    <option value="0" disabled>Self Pick Up</option>
                                    <option value="1" selected >Doorstep Delivery</option>
                                </select>
                                <span class="text-danger size-7 e_pterm"></span>
                        </div>   
                        <div class="form-group mb-0  col-md-3">
                            <div class="field">    
                                <input type="text" class="" name="product_location" tag="1" id="product_location" placeholder=" Delivery Location">
                                 <label for="product_location"> Location</label> </div>
                                <span class="text-danger size-7 e_product_location"></span>
                           
                        </div>

                        <div class="form-group mb-0  col-md-3">
                                <label>Payment Terms</label><span class="text-danger">*</span>
                                
                                 <select  class="form-control" name="pterm" tag="1" id="pterm" >
                                         <option value="" >Choose Payment Term</option>
                                      
                                        <option value="1" >Same Day</option>
                                        <option value="2" >30 Days</option>
                                     
                                    </select>
                                <span class="text-danger size-7 e_pterm"></span>
                        </div>
                        <div class="form-group mb-0  col-md-3">
                            <div class="field">
                               
                                <input type="text" class="" name="ddays" tag="1" id="ddays" placeholder="Delivery days">
                                 <label for="ddays">Delivery Days<span class="text-danger">*</span></label>
                            </div>
                                <span class="text-danger size-7 e_ddays"></span>
                        </div>
                    </div>
                </div>
            </div>
             <div class="">

                <div class="from-section size-4">
                    <div class="form-row">
                        <div class="form-group mb-2  col-md-12">
                            <div class="textarea-dec">
                                <label class="from-heading">Description</label>
                                <!-- <span class="textarea-input">Minimum 350 words</span> -->
                                <textarea type="text" rows="4" cols="5" class="form-control p-0 prodec" name="description" placeholder="Minimum 350 words"></textarea>
                            </div>
                        </div>
                    </div>

              



                </div>
                <div class="from-submit">
                    <button type="submit" class="subbtn sublist ">Submit</button>
                </div>
            </div>
        </form>

         </div>  

</div>











