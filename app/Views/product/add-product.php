
					
						
<div class="container-fluid">

    <div class="row">
        <div class=" col-lg-12">
            <div class="card ">
                <div class="card-header ">
                    <h4 class="card-title">Add Product</h4>
                    <div class="pull-right float-end ">
                        <ul class="nav nav_filter ">
                            <li class="nav-item text-end">
                               <a href="javascript:void(0)" class="btn btn-primary mb-2 nav-product" self="1" >Back</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <input type="hidden" id="subcatarray" value='<?=json_encode($subcategory);?>' >
               
                <div class="card-body">
                    <div class="basic-form">
                        <form class="" id="add_product_form" method="post" enctype="multipart/form-data">
                            <input type="hidden" id="specification" name="specification" value="" >
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label> Category</label><span class="text-danger">*</span>
                                    <select  class="form-control" id="product_category" name="product_category">
                                       <option value="" selected>Choose...</option>
                                         <?php
                                            if ($category) 
                                            { foreach ($category as $value)  
                                                { 
                                                ?>
                                                <option value="<?=$value['id']?>"  class="product_category" ><?=$value['product_category']?></option>
                                                <?php }
                                            }?>
                                    </select>
                                    <span class="text-danger size-7 e_product_category"></span>
                                </div>

                                <div class="form-group col-md-3">
                                    <label>Sub Category</label>
                                    <select  class="form-control" id="subcategory" name="subcategory">
                                       <option value="" selected>Choose...</option>
                                         <?php
                                            if ($subcategory) 
                                            { foreach ($subcategory as $value)  
                                                { 
                                                ?>
                                                <option value="<?=$value['id']?>" parent="<?=$value['parentid']?>" class="product_category" ><?=$value['product_category']?></option>
                                                <?php }
                                            }?>
                                    </select>
                                   
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
                                                <option value="<?=$value['id']?>"><?=$value['product_type']?></option>
                                                <?php }
                                            }?>
                                       
                                    </select>
                                    <span class="text-danger size-7 e_product_type"></span>
                                </div>

                                <div class="form-group col-md-3">
                                    <label>Product   Name</label><span class="text-danger">*</span>
                                    <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Product Name">
                                    <span class="text-danger size-7 e_product_name"></span>
                                </div>

                                <div class="form-group col-md-12 "><div class="product_description row"></div></div>                               
                                 <div class="form-group col-md-6">
                                    <label>Product Image</label>
                                    <input type="file" class="form-control mt-3" id="productimage" name="productimage" >
                                    
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Mill Specification</label>
                                    <input type="file" class="form-control mt-3" id="millspecification" name="millspecification" >
                                    <!-- <textarea type="text" class="form-control" name="description"></textarea> -->
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
<script src="<?=base_url()?>/public/public/js/plugins-init/pickadate-init.js" type="text/javascript"></script>
			













