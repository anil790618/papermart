		<div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-div">
                        <div class="table-header-div">
                            <h4 class="tabel-title">Product Category</h4>
                            <?php if($user_type == '0') { ?> <div class="tabel-link-btn ">
				               <ul class="nav nav_filter ">
				                    <li class="nav-item text-end">
				                      <!--  <a href="javascript:void(0)" class="addpurchase-text " data-bs-toggle="modal" data-bs-target="#productCategoryModal">Add Category</a> -->
				                        <a href="javascript:void(0)" class="addpurchase-text addCategory" >Add Category</a>
				                    </li>
				                </ul> 
				            </div><?php }?>
                        </div>
                        <div class="tabel-body-div">
                            <div class="table-responsive overflow-hidden">
                            	
                            	<div  id="table">
                            		<table id="productcat_tbale" class="table table-responsive-md tabledatacat size-5">
					                <thead>
					                    <th>S.No</th>
					                    <th> Name</th>
					                    <th>status</th>
					                    <th>Action</th>
					                </thead>
					               <tbody>
					            <?php
					            if ($query) 
					            {$i=1;
					                foreach ($query as $value)  
					                { 
					                    
					                    ?>
					                    <tr id="row<?=$value['id']?>" >
					                        <td class="row-id"><?=$i;?></td>
					                        <td class="productcat<?=$value['id']?>"><?=$value['product_category']?></td>
					                        <td><?php if($value['default'] == 1){ echo 'Default Category' ; } else{ echo ' -';  }?></td>
					                        
					                       
					                        <td>
					                        	<a class="add-productsubcat" href="javascript:void(0)" tag="<?=$value['id'];?>" specification="<?=$value['product_specification'];?>" req="<?=$value['required'];?>" prefill="<?=$value['pre_filled'];?>" buy_user="<?=$value['buy_user'];?>" sale_user="<?=$value['sale_user'];?>"><span class="badge  badge-primary badge-text-size size-5" title=" Add Subcategory">Add Sub Category</span></a>

					                        	 <?php if($user_type == '0') { ?>  <a class=" update-productCategory" href="javascript:void(0)" tag="<?=$value['id'];?>"><span class="badge light badge-success badge-text-size"><i class="fa fa-edit"></i></span></a>

					                        	 <a class="view-subcat" href="javascript:void(0)" tag="<?=$value['id'];?>"><span class="badge light badge-warning badge-text-size" title=" View Subcategory"><i class="fa fa-eye"></i></span></a>

					                        	   <a class="delete-productCategory" href="javascript:void(0)" tag="<?=$value['id'];?>"><span class="badge light badge-danger badge-text-size"><i class="fa fa-trash"></i></span></a>
					                         	<?php }?>
					                        </td>
					                    </tr>
					                <?php
					                $i++;
					                }
					               
					            }
						            else
						            {
						                ?>
						                <tr>
						                    <td colspan="4">No Data</td>
						                </tr>
						                <?php
						            }?>
						        </tbody>
						             </table>
                            	</div>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    

<div class="modal fade " id="updateproductCategoryModal" tabindex="-1" aria-labelledby="productCategoryModalLabel" aria-hidden="true">
  	<div class="modal-dialog modal-xl">
	    <div class="modal-content">
	      	<div class="modal-header">
		        <h4 class="card-title">Update Product Category</h4>
	      	</div>
	       	<form  id="update_productCategory_form" >
	       		<input type="hidden" name="pcatid" id="pcatid" >
		      	<div class="modal-body">
                    <div class="mb-2">
                        <label>Name<span class="text-danger"> *</span></label>
                        <input type="text" name="u_product_category" id="u_product_category" class="form-control">
                    	<span class="e_u_product_category text-danger "></span>
                    </div>
                    <div class="mb-2">
                       
                        <input type="checkbox" name="u_default_category" id="u_default_category" class="" value="1"> Set As Default Category
                    	
                    </div>
                    <div class="row mt-4 mb-4">  
                        <div class="col-md-4 fs-14">  <label> Select users who can sell this category product? </label> </div>
                        <div class="col-md-2">  
                            <span class="ml-3" >  
                                <input type="checkbox" class="" id="sale_user1" name="sale_user[]" value="1"> Bailer 
                            </span>
                        </div> 
                        <div class="col-md-2">
                            <span class="ml-3" >  
                                <input type="checkbox" class="" id="sale_user2" name="sale_user[]" value="2"> End User 
                            </span>
                        </div>
                        <div class="col-md-2">
                            <span class="ml-3" >  
                                <input type="checkbox" class="" id="sale_user3" name="sale_user[]" value="3"> Paper Mill 
                            </span> 
                        </div>
                        <div class="col-md-2">
                            <span class="ml-3" >  
                                <input type="checkbox" class="" id="sale_user4" name="sale_user[]" value="4"> Trader 
                            </span> 
                        </div> 
                        <div class="col-md-4 fs-14"> <label>Select users who can buy this category product? </label> </div>
                        <div class="col-md-2"> 
                            <span class="ml-3" >  
                                <input type="checkbox" id="buy_user1" name="buy_user[]" value="1"> Bailer 
                            </span> 
                        </div>  
                        <div class="col-md-2"> 
                            <span class="ml-3" >  
                                <input type="checkbox" id="buy_user2" name="buy_user[]" value="2"> End User 
                            </span>
                        </div> 
                        <div class="col-md-2"> 
                            <span class="ml-3" >  
                                <input type="checkbox" id="buy_user3" name="buy_user[]" value="3"> Paper Mill 
                            </span>  
                        </div> 
                        <div class="col-md-2"> 
                            <span class="ml-3" >  
                                <input type="checkbox" id="buy_user4" name="buy_user[]" value="4"> Trader 
                            </span> 
                        </div>
                    </div>
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
                                            <td class="p-0">Pulp</td>
                                            <td class="p-0"> <input type="checkbox" value="pulp"  name="product_specification[]" class="mr-3"> </td>
                                            <td class="p-0"> <input type="checkbox" value="pulp"  name="required[]" class="mr-3"> </td>
                                            <td class="p-0"><input type="checkbox" value="pulp"  name="prefilled[]" class="mr-3">  </td>
                                        </tr> 
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
                                            <td class="p-0">Minimum Quantity Per GSM</td>
                                            <td class="p-0"><input type="checkbox" value="min_quantity_per_gsm"  name="product_specification[]" class="mr-3"> </td>
                                            <td class="p-0"><input type="checkbox" value="min_quantity_per_gsm"  name="required[]" class="mr-3"></td>
                                            <td class="p-0"><input type="checkbox" value="min_quantity_per_gsm"  name="prefilled[]" class="mr-3">  </td>
                                        </tr>
                                        <tr>
                                            <td class="p-0">Minimum Quantity UOM</td>
                                            <td class="p-0"> <input type="checkbox" value="min_quantity_uom"  name="product_specification[]" class="mr-3"> </td>
                                            <td class="p-0"><input type="checkbox" value="min_quantity_uom"  name="required[]" class="mr-3">  </td>
                                            <td class="p-0"><input type="checkbox" value="min_quantity_uom"  name="prefilled[]" class="mr-3">  </td>
                                        </tr>
                                        <tr>
                                            <td class="p-0">Minimum Order Quantity Per Truck</td>
                                            <td class="p-0">   <input type="checkbox" value="min_quantity_pertruck"  name="product_specification[]" class="mr-3"> </td>
                                            <td class="p-0"> <input type="checkbox" value="min_quantity_pertruck"  name="required[]" class="mr-3"></td>
                                            <td class="p-0"><input type="checkbox" value="min_quantity_pertruck"  name="prefilled[]" class="mr-3">  </td>
                                        </tr>
                                        <tr>
                                            <td class="p-0">No. of Trucks</td>
                                            <td class="p-0">   <input type="checkbox" value="truck_no"  name="product_specification[]" class="mr-3"> </td>
                                            <td class="p-0"> <input type="checkbox" value="truck_no"  name="required[]" class="mr-3"></td>
                                            <td class="p-0"><input type="checkbox" value="truck_no"  name="prefilled[]" class="mr-3">  </td>
                                        </tr>
                                         <tr>
                                            <td class="p-0">Rate</td>
                                            <td class="p-0"><input type="checkbox" value="rate"  name="product_specification[]" class="mr-3">  </td>
                                            <td class="p-0"> <input type="checkbox" value="rate"  name="required[]" class="mr-3"> </td>
                                            <td class="p-0"><input type="checkbox" value="rate"  name="prefilled[]" class="mr-3">  </td>
                                        </tr>
                                         <tr>
                                            <td class="p-0">Truck Ratio</td>
                                            <td class="p-0"><input type="checkbox" value="truck_ratio"  name="product_specification[]" class="mr-3">  </td>
                                            <td class="p-0"> <input type="checkbox" value="truck_ratio"  name="required[]" class="mr-3"> </td>
                                            <td class="p-0"><input type="checkbox" value="truck_ratio"  name="prefilled[]" class="mr-3">  </td>
                                        </tr>
                                         <tr>
                                            <td class="p-0">White paper Quality Table</td>
                                            <td class="p-0"><input type="checkbox" value="white_quality_table"  name="product_specification[]" class="mr-3">  </td>
                                            <td class="p-0"> <input type="checkbox" value="white_quality_table"  name="required[]" class="mr-3"> </td>
                                            <td class="p-0"><input type="checkbox" value="white_quality_table"  name="prefilled[]" class="mr-3">  </td>
                                        </tr>
                                         <tr>
                                            <td class="p-0">Craft paper Quality Table</td>
                                            <td class="p-0"><input type="checkbox" value="kraft_quality_table"  name="product_specification[]" class="mr-3">  </td>
                                            <td class="p-0"> <input type="checkbox" value="kraft_quality_table"  name="required[]" class="mr-3"> </td>
                                            <td class="p-0"><input type="checkbox" value="kraft_quality_table"  name="prefilled[]" class="mr-3">  </td>
                                        </tr>
                                         <tr>
                                            <td class="p-0">Bundle weight</td>
                                            <td class="p-0"><input type="checkbox" value="bundle_weight"  name="product_specification[]" class="mr-3">  </td>
                                            <td class="p-0"> <input type="checkbox" value="bundle_weight"  name="required[]" class="mr-3"> </td>
                                            <td class="p-0"><input type="checkbox" value="bundle_weight"  name="prefilled[]" class="mr-3">  </td>
                                        </tr>
                                         <tr>
                                            <td class="p-0"> Valid From</td>
                                            <td class="p-0"><input type="checkbox" value="valid_from"  name="product_specification[]" class="mr-3">  </td>
                                            <td class="p-0"> <input type="checkbox" value="valid_from"  name="required[]" class="mr-3"> </td>
                                            <td class="p-0"><input type="checkbox" value="valid_from"  name="prefilled[]" class="mr-3">  </td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                           
                        </div>
                        
                    </div>
                    <div class="mb-2 edit-pspecification">
                    </div>

                  
		      	</div>
		      	<div class="modal-footer">
			        <button type="button" class="btn btn-secondary close" data-bs-dismiss="modal">Close</button>
			        <button type="submit" class="btn btn-primary">Submit</button>
		      	</div>
	      	</form>
	    </div>
  	</div>
</div>
	

<div class="modal fade " id="viewSubCategoryModal" tabindex="-1" aria-labelledby="viewSubCategoryModalLabel" aria-hidden="true">
  	<div class="modal-dialog modal-lg">
	    <div class="modal-content">
	      	<div class="modal-header">
		        <h4 class="card-title"> Product Sub Category</h4>
		        <button type="button" class=" close" data-bs-dismiss="modal"><i class="fa fa-times"></i></button>
	      	</div>
	       	<form  id="update_subCategory_form" >
	       		
		      	<div class="modal-body">
                    <table class="table table-responsive-sm  size-5" >
                    	<thead>
                    		<th>S.no </th>
                    		<th>Sub Category</th>
                    		<th>Action</th>
                    	</thead>
                    	<tbody class="viewsubcat">
                    		
                    	</tbody>
                    </table>

		      	</div>
		      	<!-- <div class="modal-footer subcatbutton">
			        <button type="button" class="btn btn-secondary close" data-bs-dismiss="modal">Close</button>
			        <button type="submit" class="btn btn-primary">Submit</button>
		      	</div> -->
	      	</form>
	    </div>
  	</div>
</div>


<div class="modal fade " id="addSubCategoryModal" tabindex="-1" aria-labelledby="addSubCategoryModalLabel" aria-hidden="true">
  	<div class="modal-dialog modal-lg">
	    <div class="modal-content">
	      	<div class="modal-header">
		        <h4 class="card-title"> Add Sub Category</h4>
		        <!-- <a href="javascript:void(0)" class="badge light badge-success size-7 add-subcat float-right">Add More</a> -->
	      	</div>
	       	<form  id="add_subCategory_form" >
	       		<input type="hidden" name="parent_id"  id="parent_id">
	       		<input type="hidden" name="buy_user"  id="buy_user">
	       		<input type="hidden" name="sale_user"  id="sale_user">
		      	<div class="modal-body">
               		<div class="mb-2">
                        <label>Sub Category Name<span class="text-danger"> *</span></label>
                        <input type="text" name="product_category" class="form-control" required>
                        <span class="e_product_category text-danger "></span>
                    </div>
                    <div class="mb-4">
                        <label>Select Product Specifiction<span class="text-danger"> *</span></label>
                        <div class="row mt-4">
                            <div class="col-12">
                                <table class="table  size-7">
                                    <thead >
                                        <th class="p-0">Specification</th>
                                        <th class="p-0">Category Includes</th>
                                        <th class="p-0">Required</th>
                                        <th class="p-0">Product Tile</th>
                                    </thead>
                                    <tbody class="cat_specification">
                                    
                                         
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
                       		
                       

		      	</div>
		      	<div class="modal-footer ">
			        <button type="button" class="btn btn-secondary close" data-bs-dismiss="modal">Close</button>
			        <button type="submit" class="btn btn-primary">Submit</button>
		      	</div>
	      	</form>
	    </div>
  	</div>
</div>


<div class="modal fade " id="editSubCategoryModal" tabindex="-1" aria-labelledby="editSubCategoryModalLabel" aria-hidden="true">
  	<div class="modal-dialog modal-lg">
	    <div class="modal-content">
	      	<div class="modal-header">
		        <h4 class="card-title"> Edit Sub Category</h4>
		        <!-- <a href="javascript:void(0)" class="badge light badge-success size-7 add-subcat float-right">Add More</a> -->
	      	</div>
	       	<form  id="edit_subCategory_form" >
	       		<input type="hidden" name="id"  id="subcatid">
	       		<input type="hidden" name="subcatparent_id"  id="subcatparent_id">
		      	<div class="modal-body">
               		<div class="mb-2">
                        <label>Sub Category Name<span class="text-danger"> *</span></label>
                        <input type="text" name="product_category" id="subcatname" class="form-control" required>
                        <span class="e_product_category text-danger "></span>
                    </div>
                    <div class="mb-4">
                        <label>Select Product Specifiction<span class="text-danger"> *</span></label>
                        <div class="row mt-4">
                            <div class="col-12">
                                <table class="table  size-7">
                                    <thead >
                                        <th class="p-0">Specification</th>
                                        <th class="p-0">Category Includes</th>
                                        <th class="p-0">Required</th>
                                        <th class="p-0">Product Tile</th>
                                    </thead>
                                    <tbody class="subcat_specification">
                                    
                                         
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                    </div>

                    <div class="mb-2">
                        <label>Description<span class="text-danger"> *</span></label>
                        <input type="taxt" name="product_description" id="sub_product_description" class="form-control">
                        <span class="e_product_description text-danger "></span>
                    </div>
                       		
                       

		      	</div>
		      	<div class="modal-footer ">
			        <button type="button" class="btn btn-secondary close" data-bs-dismiss="modal">Close</button>
			        <button type="submit" class="btn btn-primary">Submit</button>
		      	</div>
	      	</form>
	    </div>
  	</div>
</div>
		