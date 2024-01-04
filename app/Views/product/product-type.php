
	
		<div class="container-fluid">
			
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-div">
                        <div class="table-header-div">
                            <h4 class="tabel-title">Product Type</h4>
                            <?php if($user_type == '0') { ?> 
                            <div class="tabel-link-btn">
				               <ul class="nav nav_filter ">
				                    <li class="nav-item text-end">
				                       <a href="javascript:void(0)" class="addpurchase-text" data-bs-toggle="modal" data-bs-target="#productTypeModal"> Add Type</a>
				                    </li>
				                </ul> 
				            </div>
				        <?php } ?>
                        </div>
                        <div class="tabel-body-div">
                            <div class="table-responsive overflow-hidden">
                            	<div  id="table">
                            		<table id="producttype_tbale" class="table table-responsive-md tabledata">
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
					                    <tr>
					                        <td class="row-id"><?=$i;?></td>
					                        <td><?=$value['product_type']?></td>
					                        <td><?=$value['product_description'];?></td>
					                        <td>
					                        	<?php if($user_type == '0') { ?>  <a class=" update_productType" href="javascript:void(0)" tag="<?=$value['id'];?>"><span class="badge light badge-success badge-text-size"><i class="fa fa-edit"></i></span></a>
					                        	  <a class="view_productType" href="javascript:void(0)" tag="<?=$value['id'];?>"><span class="badge light badge-warning badge-text-size"><i class="fa fa-eye"></i></span></a>
					                        	   <a class="delete_productType" href="javascript:void(0)" tag="<?=$value['id'];?>"><span class="badge light badge-danger badge-text-size"><i class="fa fa-trash"></i></span></a>
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
    


 <div class="modal fade " id="productTypeModal" tabindex="-1" aria-labelledby="productTypeModalLabel" aria-hidden="true">
  	<div class="modal-dialog ">
	    <div class="modal-content">
	      	<div class="modal-header">
		        <h4 class="card-title">Add Product Type</h4>
	      	</div>
	       	<form method="post" id="add_productType_form" >
		      	<div class="modal-body">
                    <div class="mb-2">
                        <label>Name<span class="text-danger"> *</span></label>
                        <input type="text" name="product_type" class="form-control">
                    	<span class="e_product_type text-danger"></span>
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
