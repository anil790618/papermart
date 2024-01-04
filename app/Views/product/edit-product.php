
					
						
<div class="container-fluid">
        <div class="row">
            <div class=" col-lg-12">
                        <div class="card ">
                            <div class="card-header ">
                                <h4 class="card-title">Edit Product</h4>
                                <div class="pull-right float-end ">
                                    <ul class="nav nav_filter ">
                                        <li class="nav-item text-end">
                                           <a href="javascript:void(0)" class="btn btn-primary mb-2 nav-product" self="1" >Back</a>
                                          
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form class="" id="update_product_form" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="product_id" value="<?=$product['id']?>">
                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <label>Product   Name</label><span class="text-danger">*</span>
                                                <input type="text" class="form-control" id="product_name" name="product_name" value="<?=$product['product_name']?>" placeholder="Product Name">
                                                <span class="text-danger size-7 e_product_name"></span>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>HsnCode</label><span class="text-danger">*</span>
                                                <input type="text" class="form-control" id="hsncode" name="hsncode" placeholder="Enter Hsn Code" value="<?=$product['hsncode']?>">
                                                 <span class="text-danger size-7 e_hsncode"></span>
                                            </div>
                                       
                                            <div class="form-group col-md-3">
                                                <label>Product Type</label><span class="text-danger">*</span>
                                               <select id="inputState" class="form-control" id="product_type" name="product_type" >
                                                    <option value="" selected>Choose...</option>
                                                     <?php
                                                        if ($product_type) 
                                                        { foreach ($product_type as $value)  
                                                            { 
                                                            ?>
                                                            <option value="<?=$value['id']?>" <?php if($value['id'] == $product['product_type']) {echo 'selected';}?> ><?=$value['product_type']?></option>
                                                            <?php }
                                                        }?>
                                                   
                                                </select>
                                                <span class="text-danger size-7 e_product_type"></span>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Product Category</label><span class="text-danger">*</span>
                                                <select id="inputState" class="form-control" id="product_category" name="product_category">
                                                   <option value="" selected>Choose...</option>
                                                     <?php
                                                        if ($product_category) 
                                                        { foreach ($product_category as $value)  
                                                            { 
                                                            ?>
                                                            <option value="<?=$value['id']?>" <?php if($value['id'] == $product['product_category']) {echo 'selected';}?> ><?=$value['product_category']?></option>
                                                            <?php }
                                                        }?>
                                                </select>
                                                <span class="text-danger size-7 e_product_category"></span>
                                            </div>
                                            <div class="form-group col-md-12 ppermission">
                                                <?php if(!empty($product['buy_user']) or !empty($product['sale_user'])) { ?>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        Select users who can sell this product? 
                                                    </div>
                                                    <div class="col-md-2">
                                                         <span class="ml-3" >  <input type="checkbox" id="sale_user" name="sale_user[]" value="1" <?php if( preg_match("/1/", $product['sale_user'])   ){ echo 'checked'; }?> > Bailer </span>
                                                    </div>
                                                    <div class="col-md-2">
                                                         <span class="ml-3" >  <input type="checkbox" id="sale_user" name="sale_user[]" value="2" <?php if( preg_match("/2/", $product['sale_user'])   ){ echo 'checked'; }?> > End User </span>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <span class="ml-3" >  <input type="checkbox" id="sale_user" name="sale_user[]" value="3" <?php if( preg_match("/3/", $product['sale_user'])   ){ echo 'checked'; }?> > Paper Mill </span>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <span class="ml-3" >  <input type="checkbox" id="sale_user" name="sale_user[]" value="4" <?php if( preg_match("/4/", $product['sale_user'])   ){ echo 'checked'; }?> > Trader </span>
                                                    </div>
                                                    <div class="col-md-4">
                                                        Select users who can purchase this product? 
                                                    </div>
                                                    <div class="col-md-2">
                                                        <span class="ml-3" >  <input type="checkbox" id="buy_user" name="buy_user[]" value="1" <?php if( preg_match("/1/", $product['buy_user'])   ){ echo 'checked'; }?> > Bailer </span>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <span class="ml-3" >  <input type="checkbox" id="buy_user" name="buy_user[]" value="2" <?php if( preg_match("/2/", $product['buy_user'])   ){ echo 'checked'; }?> > End User </span>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <span class="ml-3" >  <input type="checkbox" id="buy_user" name="buy_user[]" value="3" <?php if( preg_match("/3/", $product['buy_user'])   ){ echo 'checked'; }?> > Paper Mill </span>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <span class="ml-3" >  <input type="checkbox" id="buy_user" name="buy_user[]" value="4"
                                                            <?php if( preg_match("/4/", $product['buy_user'])   ){ echo 'checked'; }?> > Trader </span>
                                                    </div>
                                                </div>
                                            <?php } else { ?><?php }?>
                                            </div>
                                             <div class="form-group col-md-3">
                                                <label>Size</label><span class="text-danger">*</span>
                                                <input type="text" class="form-control" id="size" name="size" value="<?=$product['size']?>" >
                                                <span class="text-danger size-7 e_size"></span>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>UOM</label><span class="text-danger">*</span>
                                                <input type="text" class="form-control" id="uom" name="uom" value="<?=$product['uom']?>">
                                                <span class="text-danger size-7 e_uom"></span>
                                            </div>
                                             <div class="form-group col-md-6">
                                                <label>Product Image</label>
                                                <input type="file" class="form-control" id="productimage" name="productimage" >
                                                
                                            </div>

                                             <div class="form-group col-md-3">
                                                <label>Purchase Price</label><span class="text-danger">*</span>
                                                <input type="number" class="form-control" id="purchase_price" name="purchase_price" placeholder="0.00" value="<?=$product['purchase_price']?>">
                                                <span class="text-danger size-7 e_purchase_price"></span>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Sale Price</label><span class="text-danger">*</span>
                                                <input type="number" class="form-control" id="sale_price" name="sale_price" placeholder="0.00" value="<?=$product['sale_price']?>">
                                                <span class="text-danger size-7 e_sale_price"></span>
                                            </div>
                                             <div class="form-group col-md-3">
                                                <label>Minimum Stock</label><span class="text-danger">*</span>
                                                <input type="number" class="form-control" id="minimum_stock" name="minimum_stock" placeholder="Minimum Stock" value="<?=$product['minimum_stock']?>">
                                                <span class="text-danger size-7 e_minimum_stock"></span>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Maximum Stock</label><span class="text-danger">*</span>
                                                <input type="number" class="form-control" id="maximum_stock" name="maximum_stock" placeholder="Maximum Stock" value="<?=$product['maximum_stock']?>">
                                                <span class="text-danger size-7 e_maximum_stock"></span>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Description</label>
                                                <textarea type="text" class="form-control" name="description"><?=$product['description']?></textarea>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
       
    </div>
</div>
<script src="public/public/js/plugins-init/pickadate-init.js" type="text/javascript"></script>
			













