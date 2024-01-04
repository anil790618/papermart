
                    
                        
<div class="container-fluid">
    <div class="card-header">
        <h4 class="card-title m-2">Add List for bailer</h4>
        <div class="pull-right float-end ">
            <ul class="nav nav_filter ">
                <li class="nav-item text-end">
                   <a href="javascript:void(0)" class="btn btn-primary mb-2 nav-list" >Back</a>
                  
                </li>
            </ul>
        </div>
    </div>  
        
    <form class="" id="add_list_form" method="post" enctype="multipart/form-data">
        <input type="hidden" name="list_type" id="list_type"  value="<?=$dashboard_type?>"> 
        <div class="card  mb-0">
            <div class="card-body size-4">
                <div class="form-row">
                  
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
                        <label># List</label><span class="text-danger">*</span>
                        <input type="text" class="form-control" name="list_number" id="list_number" placeholder="Product Name" value="<?= $total_list?>" readonly>
                        <span class="text-danger size-7 e_list_number"></span>
                    </div>
                    
                    <div class="form-group col-md-3">
                        <label>List For <?$otype;?></label><span class="text-danger">*</span>
                        <select id="inputState" class="form-control  abcde" id="list_type" name="list_type" required >
                            <option  value="" >Choose</option>
                            <option  value="1" <?php if($dashboard_type == 1){echo 'selected';}?> >Sell</option>
                            <option  value="2" <?php if($dashboard_type == 2){echo 'selected';}?> >Buy</option>
                        </select>
                        <span class="text-danger size-7 e_list_type"></span>
                    </div>
                
                    <div class="form-group mb-0 col-md-3">
                        <label>Product </label><span class="text-danger">*</span>
                        <input type="text" class="form-control search-productl" name="txtCompany"  value="<?=$product['product_name']?>"  readonly>
                        <div class="suggestionAra product"></div>
                        <input type="hidden" name="product_id" id="product_id" value="<?=$product['id']?>" >
                        <span class="text-danger size-7 e_txtCompany1"></span>
                    </div>

                    
                    <div class="form-group col-md-3">
                        <label>Product Quality</label>
                       <select id="inputState" class="form-control " id="product_quality" name="product_quality" >
                            <option value="" selected>Choose...</option>
                             <?php
                                if ($product_quality) 
                                { foreach ($product_quality as $value)  
                                    { 
                                    ?>
                                    <option value="<?=$value['id']?>"><?=$value['product_quality']?></option>
                                    <?php }
                                }?>
                        </select>
                        <span class="text-danger size-7 e_product_quality"></span>
                    </div>
                    <div class="form-group mb-0  col-md-3">
                        <label>Qty (in <?=$product['uom']?>)</label><span class="text-danger">*</span>
                        <input type="text" class="form-control qty qtyvalidation" name="qty"  id="maxqty" >
                        <span class="text-danger size-7 e_qty1"></span>
                    </div>
                    <div class="form-group mb-0  col-md-3">
                        <label>Mill Name</label><span class="text-danger">*</span>
                        <input type="text" class="form-control " name="mill_name"  > 
                        <span class="text-danger size-7 e_mill_name"></span> 
                    </div>

                    <div class="form-group mb-0  col-md-3">
                        <label>GSM (Grams/Sq Metre)</label><span class="text-danger">*</span>
                        <input type="text" class="form-control " name="gsm"  required> 
                        <span class="text-danger size-7 e_gsm"></span> 
                    </div>

                    <div class="form-group mb-0  col-md-3">
                        <label>Size</label><span class="text-danger">*</span>
                        <input type="text" class="form-control " name="size"  required> 
                        <span class="text-danger size-7 e_size"></span> 
                    </div>
                  
                    <div class="form-group mb-0  col-md-3">
                        <label>BF (Bursting factor)</label><span class="text-danger">*</span>
                        <input type="text" class="form-control " name="bf"  required> 
                        <span class="text-danger size-7 e_bf"></span> 
                    </div>

                    <div class="form-group mb-0  col-md-3">
                        <label>Pulp</label>
                        <input type="text" class="form-control " name="pulp"  required> 
                        <span class="text-danger size-7 e_pulp"></span> 
                    </div>

                    <div class="form-group mb-0  col-md-3">
                        <label>Shade</label>
                        <input type="text" class="form-control " name="shade"  required> 
                        <span class="text-danger size-7 e_shade"></span> 
                    </div>
                    
                    <div class="form-group mb-0  col-md-3">
                        <label>Brightness</label>
                        <input type="text" class="form-control " name="brightness"  required> 
                        <span class="text-danger size-7 e_brightness"></span> 
                    </div>
                   
                    <div class="form-group mb-0  col-md-3">
                            <label>Delivery Type</label><span class="text-danger">*</span>
                                <select id="inputState" class="form-control" id="delivery_type" name="delivery_type" >

                                    <option value="0" selected >Self Pick Up</option>
                                    <option value="1" >Doorstep Delivery</option>
                                 
                                </select>
                             <span class="text-danger size-7 e_rate1"></span>
                    </div>
                    <div class="form-group mb-0  col-md-3">
                            <label>Location</label><span class="text-danger">*</span>
                            <input type="text" class="form-control" name="product_location"  id="product_location">
                            <span class="text-danger size-7 e_product_location"></span>
                    </div>
                    <div class="form-group mb-0  col-md-3">
                            <label>Payment Terms</label><span class="text-danger">*</span>
                            <select  class="form-control" name="pterm"  id="pterm" >
                                     <option value=""  >Choose Payment Term</option>
                                    <option value="0"  >Advance</option>
                                    <option value="1" >Same Day</option>
                                    <option value="2" >Next Day</option>
                                    <option value="3" >15 Day</option>
                                    <option value="4" >30 Day</option>
                                    <option value="5" >45 Day</option>
                                 
                                </select>
                    </div>
                    <div class="form-group mb-0  col-md-3">
                            <label>Delivery Days</label><span class="text-danger">*</span>
                            <input type="text" class="form-control" name="ddays"  id="ddays">
                            <span class="text-danger size-7 e_ddays1"></span>
                    </div>
                              
                               

                    </div>
                   
                    <div class="size-4">
                                <div class="form-row">    
                                    <div class="form-group mb-3  col-md-12">
                                        <label>Description</label>
                                        <textarea type="text" class="form-control" name="description"></textarea>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                            
                       
                        </div>
                    </div>
                
        </form>
</div>












