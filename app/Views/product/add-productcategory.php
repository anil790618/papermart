
					
						
<div class="container-fluid">

    <div class="row">
        <div class=" col-lg-12">
            <div class="card ">
                <div class="card-header ">
                    <h4 class="card-title">Add Product Category</h4>
                    <div class="pull-right float-end ">
                        <ul class="nav nav_filter ">
                            <li class="nav-item text-end">
                               <a href="javascript:void(0)" class="btn btn-primary mb-2 nav-product-category" >Back</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                            <form method="post" id="add_productCategory_form" >
               
                    <div class="mb-2">
                        <label>Category Name<span class="text-danger"> *</span></label>
                        <input type="text" name="product_category" class="form-control">
                        <span class="e_product_category text-danger "></span>
                    </div>
                    <div class="mb-2">
                        <!-- <input type="checkbox" name="default_category" class="" value="1"> Set As Default Category -->
                        <input type="hidden" name="default_category" value="1"> 
                    </div>
                    <div class="row mt-4 mb-4">  
                        <div class="col-md-4 ">  <label> Select users who can sell this category product? </label> </div>
                        <div class="col-md-2">  
                            <span class="ml-3" >  
                                <input type="checkbox" class="" id="sale_user" name="sale_user[]" value="1"> Bailer 
                            </span>
                        </div> 
                        <div class="col-md-2">
                            <span class="ml-3" >  
                                <input type="checkbox" class="" id="sale_user" name="sale_user[]" value="2"> End User 
                            </span>
                        </div>
                        <div class="col-md-2">
                            <span class="ml-3" >  
                                <input type="checkbox" class="" id="sale_user" name="sale_user[]" value="3"> Paper Mill 
                            </span> 
                        </div>
                        <div class="col-md-2">
                            <span class="ml-3" >  
                                <input type="checkbox" class="" id="sale_user" name="sale_user[]" value="4"> Trader 
                            </span> 
                        </div> 
                        <div class="col-md-4 "> <label>Select users who can buy this category product? </label> </div>
                        <div class="col-md-2"> 
                            <span class="ml-3" >  
                                <input type="checkbox" id="buy_user" name="buy_user[]" value="1"> Bailer 
                            </span> 
                        </div>  
                        <div class="col-md-2"> 
                            <span class="ml-3" >  
                                <input type="checkbox" id="buy_user" name="buy_user[]" value="2"> End User 
                            </span>
                        </div> 
                        <div class="col-md-2"> 
                            <span class="ml-3" >  
                                <input type="checkbox" id="buy_user" name="buy_user[]" value="3"> Paper Mill 
                            </span>  
                        </div> 
                        <div class="col-md-2"> 
                            <span class="ml-3" >  
                                <input type="checkbox" id="buy_user" name="buy_user[]" value="4"> Trader 
                            </span> 
                        </div>
                    </div>
                    <!-- <div class="row mt-3">
                        <div class="col-12">
                             <label>Add Sub Category </label><a href="javascript:void(0)" class="badge light badge-success size-7 add-subcat float-right">Add</a>
                            <table id="subcat_tbale" class="table table-responsive-sm tabledata">
                                <thead>
                                    <td>S. No.</td>
                                    <td>subcategory Name</td>
                                    <td></td>
                                </thead>
                                <tbody class="subcatdata">
                                    <tr class="row-id">
                                        <td class="row-id">1</td>
                                        <td><input type="text" name="subactname[]" class="form-control"></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                       
                    </div> -->
                    <div class="mb-4">
                        <label>Select Product Specifiction<span class="text-danger"> *</span></label>
                        <div class="row mt-4">
                            <div class="col-5">
                                <table class="table table-responsive-sm  size-7">
                                    <thead >
                                        <th class="p-0">Specification</th>
                                        <th class="p-0">Category Includes</th>
                                        <th class="p-0">Required</th>
                                        <th class="p-0">Product Tile</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="p-0">Sub Category</td>
                                            <td class="p-0"><input type="checkbox" value="sub_category"  name="product_specification[]" class="mr-3"> </td>
                                            <td class="p-0"><input type="checkbox" value="sub_category"  name="required[]" class="mr-3"> </td>
                                            <td class="p-0"><input type="checkbox" value="sub_category"  name="prefilled[]" class="mr-3">  </td>
                                        </tr>
                                        <tr>
                                            <td class="p-0">Brand Name</td>
                                            <td class="p-0"> <input type="checkbox" value="brand_name"  name="product_specification[]" class="mr-3"> </td>
                                            <td class="p-0"> <input type="checkbox" value="brand_name"  name="required[]" class="mr-3"> </td>
                                             <td class="p-0"> <input type="checkbox" value="brand_name"  name="prefilled[]" class="mr-3"> </td>
                                        </tr>
                                        <tr>
                                            <td class="p-0">Mill Name</td>
                                            <td class="p-0"> <input type="checkbox" value="mill_name"  name="product_specification[]" class="mr-3"> </td>
                                            <td class="p-0"> <input type="checkbox" value="mill_name"  name="required[]" class="mr-3"> </td>
                                            <td class="p-0"> <input type="checkbox" value="mill_name"  name="prefilled[]" class="mr-3"> </td>
                                        </tr>
                                        
                                        <tr>
                                            <td class="p-0">Size</td>
                                            <td class="p-0"><input type="checkbox" value="size"  name="product_specification[]" class="mr-3"> </td>
                                            <td class="p-0"><input type="checkbox" value="size"  name="required[]" class="mr-3">  </td>
                                            <td class="p-0"><input type="checkbox" value="size"  name="prefilled[]" class="mr-3">  </td>
                                        </tr>
                                         <tr>
                                            <td class="p-0">Size UOM</td>
                                            <td class="p-0"> <input type="checkbox" value="size_uom"  name="product_specification[]" class="mr-3"> </td>
                                            <td class="p-0"> <input type="checkbox" value="size_uom"  name="required[]" class="mr-3"> </td>
                                            <td class="p-0"><input type="checkbox" value="size_uom"  name="prefilled[]" class="mr-3">  </td>
                                        </tr>
                                       
                                       
                                        
                                        <tr>
                                            <td class="p-0">Quality</td>
                                            <td class="p-0"><input type="checkbox" value="quality"  name="product_specification[]" class="mr-3"> </td>
                                            <td class="p-0"> <input type="checkbox" value="quality"  name="required[]" class="mr-3"> </td>
                                            <td class="p-0"><input type="checkbox" value="quality"  name="prefilled[]" class="mr-3">  </td>
                                        </tr>
                                        
                                        <tr>
                                            <td class="p-0">BF</td>
                                            <td class="p-0"> <input type="checkbox" value="bf"  name="product_specification[]" class="mr-3">  </td>
                                            <td class="p-0"> <input type="checkbox" value="bf"  name="required[]" class="mr-3"> </td>
                                            <td class="p-0"><input type="checkbox" value="bf"  name="prefilled[]" class="mr-3">  </td>
                                        </tr>
                                          <tr>
                                            <td class="p-0">GSM</td>
                                            <td class="p-0"> <input type="checkbox" value="gsm"  name="product_specification[]" class="mr-3"> </td>
                                            <td class="p-0"> <input type="checkbox" value="gsm"  name="required[]" class="mr-3"></td>
                                            <td class="p-0"><input type="checkbox" value="gsm"  name="prefilled[]" class="mr-3">  </td>
                                        </tr>

                                        <tr>
                                            <td class="p-0">Color</td>
                                            <td class="p-0">  <input type="checkbox" value="color"  name="product_specification[]" class="mr-3">  </td>
                                            <td class="p-0"> <input type="checkbox" value="color"  name="required[]" class="mr-3"> </td>
                                            <td class="p-0"><input type="checkbox" value="color"  name="prefilled[]" class="mr-3">  </td>
                                        </tr>
                                         <tr>
                                            <td class="p-0">Product Form</td>
                                            <td class="p-0"><input type="checkbox" value="product_form"  name="product_specification[]" class="mr-3">  </td>
                                            <td class="p-0"> <input type="checkbox" value="product_form"  name="required[]" class="mr-3"> </td>
                                            <td class="p-0"><input type="checkbox" value="product_form"  name="prefilled[]" class="mr-3">  </td>
                                        </tr>
                                         <tr>
                                            <td class="p-0">Type</td>
                                            <td class="p-0"><input type="checkbox" value="type"  name="product_specification[]" class="mr-3"> </td>
                                            <td class="p-0"><input type="checkbox" value="type"  name="required[]" class="mr-3">  </td>
                                            <td class="p-0"><input type="checkbox" value="type"  name="prefilled[]" class="mr-3">  </td>
                                        </tr>
                                         <tr>
                                            <td class="p-0">Shade</td>
                                            <td class="p-0"><input type="checkbox" value="shade"  name="product_specification[]" class="mr-3">  </td>
                                            <td class="p-0"><input type="checkbox" value="shade"  name="required[]" class="mr-3"> </td>
                                            <td class="p-0"><input type="checkbox" value="shade"  name="prefilled[]" class="mr-3">  </td>
                                        </tr>
                                         <tr>
                                            <td class="p-0">Pulp</td>
                                            <td class="p-0"> <input type="checkbox" value="pulp"  name="product_specification[]" class="mr-3"> </td>
                                            <td class="p-0"> <input type="checkbox" value="pulp"  name="required[]" class="mr-3"> </td>
                                            <td class="p-0"><input type="checkbox" value="pulp"  name="prefilled[]" class="mr-3">  </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                           <div class="col-1">
                           </div>
                          <div class="col-5">
                                <table class="table table-responsive-sm  size-7">
                                    <thead >
                                        <th class="p-0">Specification</th>
                                        <th class="p-0">Category Includes</th>
                                        <th class="p-0">Required</th>
                                        <th class="p-0">Product Tile</th>
                                    </thead>
                                    <tbody> 
                                        
                                       
                                         <tr>
                                            <td class="p-0">Brightness</td>
                                            <td class="p-0">  <input type="checkbox" value="brightness"  name="product_specification[]" class="mr-3">  </td>
                                            <td class="p-0"> <input type="checkbox" value="brightness"  name="required[]" class="mr-3"> </td>
                                            <td class="p-0"><input type="checkbox" value="brightness"  name="prefilled[]" class="mr-3">  </td>
                                        </tr>
                                        <tr>
                                            <td class="p-0">Opacity</td>
                                            <td class="p-0">  <input type="checkbox" value="opacity"  name="product_specification[]" class="mr-3">  </td>
                                            <td class="p-0"> <input type="checkbox" value="opacity"  name="required[]" class="mr-3"> </td>
                                            <td class="p-0"><input type="checkbox" value="opacity"  name="prefilled[]" class="mr-3">  </td>
                                        </tr>
                                        <tr>
                                            <td class="p-0">SS / NSS</td>
                                            <td class="p-0">  <input type="checkbox" value="ss_nss"  name="product_specification[]" class="mr-3">  </td>
                                            <td class="p-0"> <input type="checkbox" value="ss_nss"  name="required[]" class="mr-3"> </td>
                                            <td class="p-0"><input type="checkbox" value="ss_nss"  name="prefilled[]" class="mr-3">  </td>
                                        </tr>
                                         <tr>
                                            <td class="p-0">Coating</td>
                                            <td class="p-0">  <input type="checkbox" value="coating"  name="product_specification[]" class="mr-3">  </td>
                                            <td class="p-0"> <input type="checkbox" value="coating"  name="required[]" class="mr-3"> </td>
                                            <td class="p-0"><input type="checkbox" value="coating"  name="prefilled[]" class="mr-3">  </td>
                                        </tr>
                                        <tr>
                                            <td class="p-0">Tear</td>
                                            <td class="p-0">  <input type="checkbox" value="tear"  name="product_specification[]" class="mr-3">  </td>
                                            <td class="p-0"> <input type="checkbox" value="tear"  name="required[]" class="mr-3"> </td>
                                            <td class="p-0"><input type="checkbox" value="tear"  name="prefilled[]" class="mr-3">  </td>
                                        </tr>
                                        <tr>
                                            <td class="p-0">Cobb</td>
                                            <td class="p-0">  <input type="checkbox" value="cobb"  name="product_specification[]" class="mr-3">  </td>
                                            <td class="p-0"> <input type="checkbox" value="cobb"  name="required[]" class="mr-3"> </td>
                                            <td class="p-0"><input type="checkbox" value="cobb"  name="prefilled[]" class="mr-3">  </td>
                                        </tr>
                                        <tr>
                                            <td class="p-0">Kit Value</td>
                                            <td class="p-0">  <input type="checkbox" value="kitvalue"  name="product_specification[]" class="mr-3">  </td>
                                            <td class="p-0"> <input type="checkbox" value="kitvalue"  name="required[]" class="mr-3"> </td>
                                            <td class="p-0"><input type="checkbox" value="kitvalue"  name="prefilled[]" class="mr-3">  </td>
                                        </tr> <tr>
                                            <td class="p-0">Packing Per Ream</td>
                                            <td class="p-0">  <input type="checkbox" value="packing_per_ream"  name="product_specification[]" class="mr-3">  </td>
                                            <td class="p-0"> <input type="checkbox" value="packing_per_ream"  name="required[]" class="mr-3"> </td>
                                            <td class="p-0"><input type="checkbox" value="packing_per_ream"  name="prefilled[]" class="mr-3">  </td>
                                        </tr><tr>
                                            <td class="p-0">Deckle Size</td>
                                            <td class="p-0">  <input type="checkbox" value="deckle_size"  name="product_specification[]" class="mr-3">  </td>
                                            <td class="p-0"> <input type="checkbox" value="deckle_size"  name="required[]" class="mr-3"> </td>
                                            <td class="p-0"><input type="checkbox" value="deckle_size"  name="prefilled[]" class="mr-3">  </td>
                                        </tr>
                                         <tr>
                                            <td class="p-0">Quantity Type</td>
                                            <td class="p-0"> <input type="checkbox" value="quantity_type"  name="product_specification[]" class="mr-3">  </td>
                                            <td class="p-0"><input type="checkbox" value="quantity_type"  name="required[]" class="mr-3"> </td>
                                            <td class="p-0"><input type="checkbox" value="quantity_type"  name="prefilled[]" class="mr-3">  </td>
                                        </tr>
                                         <tr>
                                            <td class="p-0">Quantity</td>
                                            <td class="p-0">   <input type="checkbox" value="quantity"  name="product_specification[]" class="mr-3"> </td>
                                            <td class="p-0"> <input type="checkbox" value="quantity"  name="required[]" class="mr-3"></td>
                                            <td class="p-0"><input type="checkbox" value="quantity"  name="prefilled[]" class="mr-3">  </td>
                                        </tr>
                                         <tr>
                                            <td class="p-0">Quantity UOM</td>
                                            <td class="p-0"> <input type="checkbox" value="quantity_uom"  name="product_specification[]" class="mr-3"> </td>
                                            <td class="p-0"><input type="checkbox" value="quantity_uom"  name="required[]" class="mr-3">  </td>
                                            <td class="p-0"><input type="checkbox" value="quantity_uom"  name="prefilled[]" class="mr-3">  </td>
                                        </tr>
                                         <tr>
                                            <td class="p-0">Rate</td>
                                            <td class="p-0"><input type="checkbox" value="rate"  name="product_specification[]" class="mr-3">  </td>
                                            <td class="p-0"> <input type="checkbox" value="rate"  name="required[]" class="mr-3"> </td>
                                            <td class="p-0"><input type="checkbox" value="rate"  name="prefilled[]" class="mr-3">  </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                           
                        </div>
                        
                    </div>

                    <div class="mb-2">
                        <label>Description<span class="text-danger"> *</span></label>
                        <input type="taxt" name="product_description" class="form-control">
                        <span class="e_product_description text-danger "></span>
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
			













