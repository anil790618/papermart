
					
						
<div class="container-fluid">
<div class="card-header">
    <h4 class="card-title m-2">Product Information</h4>
    <div class="pull-right float-end responsive">
        <ul class="nav nav_filter ">
            <li class="nav-item text-end">
               <a href="javascript:void(0)" class="btn btn-primary mb-2 nav-product" self = "1" >Back</a>
              
            </li>
        </ul>
    </div>
</div>	
        <div class="row">
            <div class=" col-lg-4">
                        <div class="card ">
                          
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table shadow-hover">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <p class="text-black mb-1 font-w600">Product   Name</p>
                                                </td>
                                                <td>
                                                    <span class="fs-14"><?=$product['product_name']?></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                 <td>
                                                    <p class="text-black mb-1 font-w600">HsnCode</p>
                                                </td>
                                                <td>
                                                    <span class="fs-14"><?=$product['hsncode']?></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                 <td>
                                                    <p class="text-black mb-1 font-w600">Product Type</p>
                                                </td>
                                                <td>
                                                    <span class="fs-14"> <?php
                                                        if ($product_type) 
                                                        { foreach ($product_type as $value)  
                                                            { 
                                                            ?>
                                                             <?php if($value['id'] == $product['product_type']) {echo $value['product_type'] ;}?> 
                                                            <?php }
                                                        }?></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p class="text-black mb-1 font-w600">Product Category</p>
                                                </td>
                                                <td>
                                                    <span class="fs-14"> <?php
                                                        if ($product_category) 
                                                        { foreach ($product_category as $value)  
                                                            { 
                                                            if($value['id'] == $product['product_category']) {echo $value['product_category'];}
                                                            }
                                                        }?></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                 <td>
                                                    <p class="text-black mb-1 font-w600">Size</p>
                                                </td>
                                                <td>
                                                    <span class="fs-14"><?=$product['size']?></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p class="text-black mb-1 font-w600">UOM</p>
                                                </td>
                                                <td>
                                                    <span class="fs-14"><?=$product['uom']?></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                 <td>
                                                    <p class="text-black mb-1 font-w600">Purchase Price</p>
                                                </td>
                                                <td>
                                                    <span class="fs-14"><?=$product['purchase_price']?></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                 <td>
                                                    <p class="text-black mb-1 font-w600">Sale Price</p>
                                                </td>
                                                <td>
                                                    <span class="fs-14"><?=$product['sale_price']?></span>
                                                </td>
                                            </tr>
                                             <tr>
                                                 <td>
                                                    <p class="text-black mb-1 font-w600">Minimum Stock</p>
                                                </td>
                                                <td>
                                                    <span class="fs-14"><?=$product['minimum_stock']?></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                 <td>
                                                    <p class="text-black mb-1 font-w600">Maximum Stock</p>
                                                </td>
                                                <td>
                                                    <span class="fs-14"><?=$product['maximum_stock']?></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                 <td>
                                                    <p class="text-black mb-1 font-w600">Description</p>
                                                </td>
                                                <td>
                                                    <span class="fs-14"><?=$product['description']?></span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=" col-lg-4">
                        <div class="card ml-3">
                          
                            <div class="card-body">
                                <?php if(!empty($product['product_image'])) { ?>
                               <img src="<?=base_url()?>/document/product/<?=$product['product_image']?>" width=100%>
                           <?php } else { ?> Product Image Not Available<?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class=" col-lg-4">
                        <div class="card ml-3">
                          
                            <div class="card-body">
                                <?php if(!empty($product['millspecification'])) { ?>
                               <img src="<?=base_url()?>/document/product/specification/<?=$product['millspecification']?>" width=100%>
                           <?php } else { ?> Mill Specification Not Available<?php } ?>
                            </div>
                        </div>
                    </div>
       
    </div>
</div>













