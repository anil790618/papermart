
	
		<div class="row">
                <div class="col-lg-12 m-3">
                       	<h4 class="ml-2">Product Category</h4>
					            <?php
					            if ($query) 
					            {$i=1;
					                foreach ($query as $value)  
					                { 
					                    
					                    ?>
					                    <button class="btn btn-primary m-2 productcat" tag="<?=$value['id']?>" href="javascript:void(0)" tag="<?=$value['id'];?>"><span ><?=$value['product_category'];?></span></button>
					                <?php
					                $i++;
					                }
					               
					            }
						            else
						            {
						                ?>
						               No Data
						                <?php
						            }?>
						        
                    </div>
                </div>
           
    


 <div class="modal fade " id="productCategoryModal" tabindex="-1" aria-labelledby="productCategoryModalLabel" aria-hidden="true">
  	<div class="modal-dialog ">
	    <div class="modal-content">
	      	<div class="modal-header">
		        <h4 class="card-title">Add Product Category</h4>
	      	</div>
	       	<form method="post" id="add_productCategory_form" >
		      	<div class="modal-body">
                    <div class="mb-2">
                        <label>Name<span class="text-danger"> *</span></label>
                        <input type="text" name="product_category" class="form-control">
                    	<span class="e_product_category text-danger "></span>
                    </div>
                    <div class="mb-2">
                        <label>Description<span class="text-danger"> *</span></label>
                        <input type="taxt" name="product_description" class="form-control">
                        <span class="e_product_description text-danger "></span>
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
