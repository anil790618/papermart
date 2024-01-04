                              
                        
<div class="container-fluid">
    <div class="card-header p-0">
        <h4 class="card-title m-2"><?php if($dashboard_type == 2){ echo ' Add Requirements For buying '; } else { echo 'Add List for selling  '; }?> <?=$product['product_name']?></h4>
        <div class="pull-right float-end ">
            <ul class="nav nav_filter ">
                <li class="nav-item text-end">
                   <a href="javascript:void(0)" class="btn btn-primary mb-2 nav-decklelist" >Back</a>
                  
                </li>
            </ul>
        </div>
    </div>  
        
    <form class="" id="add_list_form" method="post" enctype="multipart/form-data">
         <input type="hidden" name="list_type" id="list_type"  value="<?=$dashboard_type?>"> 
        
        <div class="card  mb-0">
            <div class="card-body size-4">
                <div class="row">
                    <div class="col-8 p-2">
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
                           
                        
                            <div class="form-group mb-0 col-md-3">
                                <label>Product <noframes></noframes></label><span class="text-danger">*</span>
                                <input type="text" class="form-control list-product" name="txtCompany" id="txtCompany"  tag="1" autocomplete="off" value="Kraft Paper" readonly>
                                <div class="suggestionAra product"></div>
                                <input type="hidden" name="product_id" tag="1" id="product_id" value="3">
                                <span class="text-danger size-7 e_product_id"></span>
                            </div>

                            <div class="form-group mb-0  col-md-3">
                                <label>Qty</label><span class="text-danger">*</span>
                                <input type="text" class="form-control qty qtyvalidation" name="qty" tag="1" id="maxqty" >
                                <span class="text-danger size-7 e_qty"></span>
                            </div>
                                   
                                 
                            <div class="form-group mb-0  col-md-3">
                                    <label><?php if($dashboard_type == 2){ echo ' Buying'; } else { echo ' Selling '; }?> Rate</label><span class="text-danger">*</span>
                                    <input type="text" class="form-control" name="buying_rate" tag="1" id="buying_rate"  >
                                    <span class="text-danger size-7 e_buying_rate"></span>
                            </div>
                                   
                                   
                            <div class="form-group mb-0  col-md-2"><label>Mill Name</label><input type="text" class="form-control " name="mill_name" tag="1" > <span class="text-danger size-7 e_mill_name"></span> </div>
                            
                            <div class="form-group mb-0  col-md-2"><label>BF </label><span class="text-danger">*</span><input type="text" class="form-control " name="bf" tag="1" required> <span class="text-danger size-7 e_bf"></span> </div>

                            <div class="form-group mb-0  col-md-2"><label>GSM </label><span class="text-danger">*</span><input type="text" class="form-control " name="gsm" tag="1" required> <span class="text-danger size-7 e_gsm"></span> </div>

                            <div class="form-group mb-0  col-md-2"><label>Type</label><span class="text-danger">*</span><input type="text" class="form-control " name="type" tag="1" required> <span class="text-danger size-7 e_type"></span> </div>

                            <div class="form-group mb-0  col-md-2"><label>Size</label><span class="text-danger">*</span><input type="text" class="form-control " name="psize" tag="1" required> <span class="text-danger size-7 e_size"></span> </div>

                            <div class="form-group mb-0  col-md-2"><label>Quantity Type</label><span class="text-danger">*</span><select class="form-control " name="quantity_type" id="quantity_type"> <option value="1"> Godown</option><option value="2"> Truck Load</option><option value="3">Part Load</option></select><span class="text-danger size-7 e_size"></span> </div>
                           
                                        
                            <div class="form-group mb-0 col-md-3">
                                <label>Delivery Type</label><span class="text-danger">*</span>
                                <select  class="form-control" id="delivery_type" name="delivery_type" >
                                    <!-- <option value="0" selected >Self Pick Up</option> -->
                                    <option value="1" selected>Doorstep Delivery</option>
                                </select>
                                <span class="text-danger size-7 e_rate1"></span>
                            </div>
                            <div class="form-group mb-0  col-md-3">
                                    <label>Location</label><span class="text-danger">*</span>
                                    <input type="text" class="form-control" name="product_location" tag="1" id="product_location">
                                    <span class="text-danger size-7 e_product_location"></span>
                            </div>
                            <div class="form-group mb-0  col-md-3">
                                <label>Payment Terms</label><span class="text-danger">*</span>
                                
                                 <select  class="form-control" name="pterm" tag="1" id="pterm" >
                                        <option value=""  >Choose Payment Term</option>
                                        <option value="0"  >Advance</option>
                                        <option value="1" >Same Day</option>
                                        <option value="2" >Next Day</option>
                                        <option value="3" >15 Day</option>
                                        <option value="4" >30 Day</option>
                                        <option value="5" >45 Day</option>
                                </select>
                                <span class="text-danger size-7 e_pterm"></span>
                            </div>
                            <div class="form-group mb-0  col-md-3">
                                    <label>Delivery Days</label><span class="text-danger">*</span>
                                    <input type="text" class="form-control" name="ddays" tag="1" id="ddays">
                                    <span class="text-danger size-7 e_ddays"></span>
                            </div>
                        </div>   
                    </div>
                    <div class="col-4 bg-light  p-2 ">
                         <div class="card-header">
                            <h6 class="">Product Specification</h6>
                            <div class="pull-right float-end ">
                           <ul class="nav nav_filter ">
                                <li class="nav-item text-end">
                                   <a href="javascript:void(0)" class="btn btn-primary mb-2 addorderspecification size-6" tag="1">Add </a>
                                  
                                </li>
                            </ul> 
                        </div>
                        </div>
                    <table id="specification_table" class="table table-responsive tabledata size-6">
                        <thead>
                            <tr>
                                
                                <th>Size (in inch)</th>
                                <th>Quantity</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="responsivespecification">
                            <tr class="specificationrow1">
                               
                                <td><input type="text" class="form-control" style="height:40px" name = "size[]" id="size" required></td>
                                <td><input type="text" class="form-control" style="height:40px" name = "quantity[]" id="quantity" required></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
                  
                             
                   

                    <div class="card-body size-4 p-0">
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
<script src="public/public/js/plugins-init/pickadate-init.js" type="text/javascript"></script>
            













