
	
		<div class="container-fluid">
			
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-div">
                        <div class="table-header-div">
                            <h4 class="tabel-title">Product Quality</h4>
                           <?php if($user_type == '0') { ?>  <div class="tabel-link-btn">
				               <ul class="nav nav_filter ">
				                    <li class="nav-item text-end">
				                       <a href="javascript:void(0)" class="addpurchase-text" data-bs-toggle="modal" data-bs-target="#productQualityModal">Add</a>
				                      
				                    </li>
				                </ul> 
				            </div>
				        <?php } ?>
                        </div>
                        <div class="tabel-body-div">
                            <div class="table-responsive overflow-hidden">
                            	
                            	<div  id="table">
                            		<table id="productQuality_table" class="table table-responsive-md tabledata">
					                <thead>
					                    <th>S.No</th>
					                    <th> Name</th>
					                    <th>Description</th>
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
							                        <td><?=$value['product_quality']?></td>
							                        <td><?=$value['product_description'];?></td>
							                        <td>
							                        	<?php if($user_type == '0') { ?>  <a class=" update_productQuality" href="javascript:void(0)" tag="<?=$value['id'];?>"><span class="badge light badge-success badge-text-size"><i class="fa fa-edit"></i></span></a>
							                        	  
							                        	   <a class="delete_productQuality" href="javascript:void(0)" tag="<?=$value['id'];?>"><span class="badge light badge-danger badge-text-size"><i class="fa fa-trash"></i></span></a>
							                         <?php } ?>
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
 
 <div class="modal fade " id="productQualityModal" tabindex="-1" aria-labelledby="productQualityModalLabel" aria-hidden="true">
  	<div class="modal-dialog ">
	    <div class="modal-content">
	      	<div class="modal-header">
		        <h4 class="card-title">Add Product Quality</h4>
	      	</div>
	      	<input type="hidden" id="subcatarray" value='<?=json_encode($subcategory);?>' >
               
	       	<form method="post" id="add_productQuality_form" >
		      	<div class="modal-body">
		      		<div class="mb-2">
                        <label>Product Category<span class="text-danger"> *</span></label>
                        <select name="product_category"  id="product_category" class="form-control"  required>
                        	<option value=""> Choose Product Category</option>
                        	<?php
					            if ($productcategory) 
					            { $i=1;
					                foreach ($productcategory as $value)  
					                { ?>
					                	<option value="<?=$value['id']?>"> <?=$value['product_category']?></option>
				                <?php }
				            	}
				            ?>
                        </select>  
                    	<span class="e_product_category text-danger"></span>
                    </div>
                    <div class="form-group col-md-12">
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
                    <div class="mb-2">
                        <label>Product Quality<span class="text-danger"> *</span></label>
                        <input type="text" name="product_quality" class="form-control">
                    	<span class="e_product_quality text-danger"></span>
                    </div>
                    <div class="mb-2">
                        <label>Description<span class="text-danger"> *</span></label>
                        <input type="taxt" name="product_description" class="form-control">
                        <span class="e_product_description text-danger"></span>
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
<div class="modal fade " id="updateproductQualityModal" tabindex="-1" aria-labelledby="productQualityModalLabel" aria-hidden="true">
  	<div class="modal-dialog modal-lg">
	    <div class="modal-content">
	      	<div class="modal-header">
		        <h4 class="card-title">Update Product Quality</h4>
	      	</div>
	       	<form  id="update_productQuality_form" >
	       		<input type="hidden" name="pqualityid" id="pqualityid" >
		      	<div class="modal-body">
		      		 <div class="mb-2">
                        <label>Product Category<span class="text-danger"> *</span></label>
                        <select name="u_product_category" id="product_category" class="form-control"  required>
                        	<option value=""> Choose Product Category</option>
                        	<?php
					            if ($productcategory) 
					            { $i=1;
					                foreach ($productcategory as $value)  
					                { ?>
					                	<option value="<?=$value['id']?>"> <?=$value['product_category']?></option>
				                <?php }
				            	}
				            ?>
                        </select>  
                    	<span class="e_product_category text-danger"></span>
                    </div> 

                    <div class="mb-2">
                        <label>Product Quality Name<span class="text-danger"> *</span></label>
                        <input type="text" name="u_product_quality" id="u_product_quality" class="form-control">
                    	<span class="e_u_product_quality text-danger "></span>
                    </div>
                    
                   

                    <div class="mb-2">
                        <label>Description<span class="text-danger"> *</span></label>
                        <input type="taxt" name="u_product_description" id="u_product_description" class="form-control">
                        <span class="e_u_product_description text-danger "></span>
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
	