<div class="container-fluid">
    <div class="from-div-area">
        <div class="card-header p-0">
            <h4 class="card-title m-2  form-main-title">Add sale </h4>
            <div class="pull-right float-end ">
                <ul class="nav nav_filter ">
                    <li class="nav-item text-end">
                       <a href="javascript:void(0)" class="btn btn-primary mb-2 nav-sale" >Back</a>
                      
                    </li>
                </ul>
            </div>
        </div>	
    
        <form class="" id="add_sale_form" method="post" enctype="multipart/form-data">
            <div class="from-section ">
                <div class=" size-4">
                    <div class="form-row">
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
                    <div class="form-group mb-0  col-md-3   ">
                        <label># Sale</label><span class="text-danger">*</span>
                        <input type="text" class="form-control" name="order_number" id="order_number"  value="<?= $total_order?>" readonly>
                        
                    </div>
                    <div class="form-group mb-0  col-md-3   ">
                       <div class="field purdate">
                            <input  type="text" class="datepicker-default form-control" id="datepicker" name="order_date" placeholder="Purchase Date"    required>
                            <label for="datepicker" class="date-felids-op0">Sale Date <span class="text-danger">*</span></label>
                        </div>
                        <span class="text-danger size-7 e_order_date"></span>
                    </div>
               
                    <div class="form-group mb-0  col-md-3">
                        <div class="field">
                           
                            <input type="text" class="" name="clientdetail" id="clientdetail" tag="1"  autocomplete="off" placeholder="Enter name / phone number" required>
                            <label for="clientdetail">Search Vendor<span class="text-danger">*</span></label>
                        </div>
                            <div class="suggestionAra client"></div>
                                <input type="hidden" name="order_to_id" id="customer_id" >
                                <input type="hidden" name="order_to_name" id="customer_name" >
                                <input type="hidden" name="order_to_mobile" id="customer_mobile" >
                            <span class="text-danger size-7 e_product_type"></span>
                        
                    </div>
                    <input type="hidden" name="order_type" value="1">
                    <input type="hidden" name="transport_type" value="1">
                     <div class="form-group mb-0  col-md-3">
                        <div class="field">
                            <input type="text" class="" name="vehicledetail" id="vehicledetail" tag="1"  autocomplete="off" placeholder="Enter vehicle number" required>
                            <label for="vehicledetail">Search Vehicle<span class="text-danger">*</span></label>
                        </div>
                        <div class="suggestionAra vehicle"></div>
                            <input type="hidden" name="vehicle_id" id="vehicle_id" >
                        <span class="text-danger size-7 e_vehicledetail"></span>
                    </div>
                    <div class="form-group mb-0  col-md-3">
                        <div class="field">
                            <input  type="text" class=""  name="driver_name" id="driver_name"  placeholder="Enter Driver Name" >
                            <label for="driver_name">Driver Name</label>
                        </div>
                        <span class="text-danger size-7 e_driver_name"></span>
                    </div>

                    <div class="form-group mb-0  col-md-3 paystatus">
                        <div class="field drop-select">
                            <select id="inputState" class="form-control seleinput" id="payment_status" name="payment_status">
                                 <option value="" selected></option>
                                <option value="0" >Un Paid</option>
                                <option value="1" >Paid</option>
                            </select>
                            <label for="inputState">Payment Status <span class="text-danger">*</span></label>
                        </div>
                        <span class="text-danger size-7 e_product_category"></span>
                    </div>  
                </div>
            </div>
        </div>
        <div class="from-section product1">
            <div class="from-header">
                <h6 class="from-heading">Product Info</h6>
                <div class="">
                    <a href="javascript:void(0)" class="badge light badge-success size-7  append-product" tag="1">Add Product</a>
                </div>
            </div>
            <div class=" size-4">
                <div class="form-row">   
                 
                
                     <input type="hidden" style="height:36px" class="form-control" name="transport_cost[]" tag="1" id="transport_cost"   value="0" required>
                 
                     <input type="hidden" style="height:36px" class="form-control" name="insurance_cost[]" tag="1" id="insurance_cost"   value="0" required>
                      
                     <div class="form-group mb-0 col-md-3">
                        <div class="field">
                            <input type="text" id="search-pro" class="search-product"  placeholder="search-product" name="txtCompany[]"  tag="1" required autocomplete="off">
                            <label for="search-pro">Product <noframes></noframes><span class="text-danger">*</span> </label>
                        </div>
                        <div class="suggestionAra product"></div>
                        <input type="hidden" name="product_id[]" tag="1" id="product_id">
                        <span class="text-danger size-7 e_txtCompany1"></span>
                    </div>
                   
                    <div class="form-group mb-0  col-md-3">
                        <div class="field">
                            <input type="text" class="qty" name="qty[]" tag="1" id="maxqty" placeholder="Quantity" required>
                            <label for="maxqty">Qty<span class="text-danger">*</span><span class="puom"></span></label>
                        </div>
                        <span class="text-danger size-7 e_qty1"></span>
                    </div>
                     <div class="form-group mb-0 col-md-3">
                        <div class="field">
                            <input type="text" class="" name="rate[]" tag="1" id="rate" placeholder="Rate" required>
                            <label for = "rate">Rate<span class="text-danger">*</span></label>
                        </div>
                        <span class="text-danger size-7 e_rate1"></span>
                    </div>

                     <div class="form-group mb-0  col-md-3">
                        <div class="field">
                            <input type="text" class="" name="price[]" tag="1" id="price" placeholder="Product Price" readonly>
                            <label for="price" >Product Price<span class="text-danger">*</span></label>
                        </div>
                        <span class="text-danger size-7 e_price1"></span>
                    </div>
                    <div class="form-group mb-0  col-md-3">
                        <div class="field">
                            <input type="text" class="" name="tax[]" tag="1" id="tax" placeholder="tax" required>
                            <label for="tax">Tax<span class="text-danger">*</span></label>
                        </div>
                        <span class="text-danger size-7 e_tax1"></span>
                    </div>
                     <div class="form-group mb-0 col-md-3">
                        <div class="field">
                            <input type="number" class="" name="discount[]" tag="1" id="discount" placeholder="discount" min=0 max=100 required>
                            <label for="discount">Discount<span class="text-danger">*</span></label>
                        </div>
                        <span class="text-danger size-7 e_discount1"></span>
                    </div>
                   
                    <div class="form-group mb-0  col-md-3">
                        <div class="field">
                            <input type="text" class="" name="total_price[]" tag="1" id="total_price" placeholder="Total Price" readonly>
                            <label for="total_price">Total Price<span class="text-danger">*</span></label>
                        </div>
                        <span class="text-danger size-7 e_total_price1"></span>
                    </div>
                       
            </div>
        </div>
     </div>
    <div class="product-append m-0 p-0"></div>
                
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
            <button type="submit" class="subbtn ">Submit</button>
        </div>
    </div>
            
    </form>
</div>
</div>

        <script src="public/public/js/plugins-init/pickadate-init.js" type="text/javascript"></script>














