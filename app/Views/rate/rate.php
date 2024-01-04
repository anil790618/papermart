
	
		<div class="container-fluid">
			
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-div">
                        <div class="table-header-div">
                            <h4 class="tabel-title"><?php if($user_type == 1 or $user_type == 2){ echo 'Prime Rates Offered';} else { echo 'Rates Posted'; }?></h4>
                            <div class="tabel-link-btn">
				               <ul class="nav nav_filter ">
				                    <li class="nav-item text-end">
				                       <!-- <a href="javascript:void(0)" class="addpurchase-text " data-bs-toggle="modal" data-bs-target="#ratesModal">Post Rate</a> -->
				                      <a href="javascript:void(0)" class="addpurchase-text postrate" >Post Rate </a>
				                    </li>
				                </ul> 
				            </div>
                        </div>		
                        <div class="tabel-body-div">
                            <div class="table-responsive overflow-hidden">
                            	
                            	<div  id="table">
                            		<table id="rate_tbale" class="table table-responsive-md size-6">
					                <thead>
					                    <th>S.No</th>
					                    <th>Product Name</th>
					                    <th>Rate Type</th>
					                    <th>Rate </th>
					                    <th>Validity </th>
					                    <th>Description</th>
					                    <th>Action</th>
					                </thead>
					               <tbody  class="tabledata">
					            <?php
					            if ($query) 
					            {$i=1;
					                foreach ($query as $value)  
					                { 
					                    ?>
					                    <tr id="row<?=$value['id']?>">
					                        <td class ="row-id"><?=$i;?></td>
					                        <td><?=$value['cname']?></td>
					                        <td><?php if($value['type'] == '1'){ $type='Normal';} else if($value['type'] == '2'){ $type='Sauda';} else if($value['type'] == '3'){ $type='Prime';}?> <?=$type;?> Rate</td>
					                        <td ><?=$value['rates_offered']?></td>
					                          <td ><?=$value['validity']?></td>
					                        <td class="description"><?=$value['description']?></td>
					                        <td>
					                        	<!-- <a class=" update-rate" href="javascript:void(0)" tag="<?=$value['id']?>" ><span class="badge light badge-success badge-text-size"><i class="fa fa-edit"></i></span></a> -->

					                        	<a class="view-postrate" href="javascript:void(0)" tag="<?=$value['id']?>" ><span class="badge light badge-warning badge-text-size" title="View posted rate"><i class="fa fa-eye"></i></span></a>

					                        	<a class="delete-rate" href="javascript:void(0)" tag="<?=$value['id']?>" ><span class="badge light badge-danger badge-text-size" title="Delete Posted rate"><i class="fa fa-trash"></i></span></a>
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
					                    <td colspan="6">No Data</td>
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
    
<div class="modal fade " id="ratesModal" tabindex="-1" aria-labelledby="ratesModalLabel" aria-hidden="true">
  	<div class="modal-dialog modal-lg">
	    <div class="modal-content">
	      	<div class="modal-header">
		        <h4 class="card-title"><?php if($user_type == 1 or $user_type == 2){ echo 'Add Product Prime Rates ';} else { echo 'Add Product Rates'; }?></h4>
	      	</div>
	       	<form method="post" id="add_rates_form" >
           <input type="hidden" id="pquality" name="pquality" value=''>
            <input type="hidden" id="specification" name="specification" value="<?=$product['product_specification'] ?? ''?>"> 
		      	<div class="modal-body">
		      		<div class="row">
		      			<div class="col-4 p-2 ">
	                        <label>Rate Type <span class="text-danger"> *</span></label>
	                        <select  class="form-control" id="rate_type" name="rate_type" required>
		                      
		                        <option value="1" selected>Sell</option>
		                        <option value="2" >Buy</option>
		                       
		                    </select>
	                        <span class="size-7 e_post_type text-danger"></span>
	                    </div>
	                    <div class="col-4 p-2 ">
	                        <label>Rate Posting Type <span class="text-danger"> *</span></label>
	                        <select  class="form-control" id="post_type" name="post_type" required>
		                       <?php if($user_type == 1 or $user_type == 2){ ?> 
		                       	<option value="" >Choose</option>
		                       	<option value="3" >Prime Rate</option>
		                       <?php } 
		                       else { ?> 
		                        <option value="1" selected>Normal Rate</option>
		                        <option value="2" >Sauda Rate</option>
		                        <?php } ?>
		                    </select>
	                        <span class="size-7 e_post_type text-danger"></span>
	                    </div>
		      			<div class="col-4 p-2 ">
	                        <label>Product Category</label><span class="text-danger">*</span>
	                        <select  class="form-control " id="category" name="category" >
	                        <option value="">Select product Category</option>
                             <?php
                                if ($productcategory) 
                                { foreach ($productcategory as $value)  
                                    { 
                                    ?>
                                    <option value="<?=$value['id']?>"><?=$value['product_category']?></option>
                                    <?php }
                                }?>
                        </select>
                            <span class="text-danger size-7 e_product_id"></span>
	                    </div>

	                    <div class="col-4 p-2 ">
	                        <label>Search Product Name<noframes></noframes></label><span class="text-danger">*</span>
	                        <input type="text" class="form-control list-product" name="txtCompany" id="txtCompany" tag="1" placeholder="Search proudct name" autocomplete="off" value="<?=$product['product_name'] ?? '' ?>" >
	                        <div class="suggestionAra product"></div>
	                        <input type="hidden" name="product_id" tag="1" id="product_id" value="<?=$product['id'] ?? ''?>" >
	                        <span class="text-danger size-7 e_product_id"></span>
	                    </div>
	                    <div class=" list_type_description" >
                    	</div>
	                    
	                    <div class="col-4 p-2 "> 
	                    	<label>Validity</label> 
	                    	<input type="datetime-local" name="validity" class="form-control" required>
	                    	<span class="size-7 e_validity text-danger"></span> 
	                    </div>
	                    <div class="col-4 p-2 ">
	                        <label>Rates offered<span class="text-danger"> *</span></label>
	                        <select  name="rates_offered" class="form-control">
	                        	<option value="Ex-mill"> Ex-mill</option>
	                        	<option value="Ex-Godown"> Ex-Godown</option>
	                        	<option value="FOR"> FOR</option>
	                        </select>
	                    	<span class="size-7 e_rates_offered text-danger"></span>
	                    </div>
	                    <div class="col-4 p-2 ">
	                        <label>Description</label>
	                        <input type="text" name="description" class="form-control">
	                        <span class="size-7 e_description text-danger"></span>
	                    </div>
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


<div class="modal fade " id="updaterateModal" tabindex="-1" aria-labelledby="rateModalLabel" aria-hidden="true">
  	<div class="modal-dialog modal-lg">
	    <div class="modal-content">
	      	<div class="modal-header">
		        <h4 class="card-title">Update Product Rate</h4>
	      	</div>
	       	<form  id="update_rate_form" >
	       		<input type="hidden" name="rid" id="rid" >
		      	<div class="modal-body">
                   <div class="row">
	                    <div class="col-6 p-2 ">
	                        <label>Product <noframes></noframes></label><span class="text-danger">*</span>
                            <input type="text" class="form-control find-product1" name="u_pname" id="u_pname"  >
                            <div class="suggestionAra product1"></div>
                            <input type="hidden" name="u_product_id"  id="u_product_id">
                            <span class="text-danger size-7 e_u_product_id"></span>
	                    </div>
	                    <div class="col-6 p-2 ">
	                        <label>Rate Posting Type <span class="text-danger"> *</span></label>
	                        <select  class="form-control" id="u_post_type" name="u_post_type">
		                         <?php if($user_type == 1 or $user_type == 2){ ?> 
		                       	<option value="3" selected>Prime Rate</option>
		                       <?php } 
		                       else { ?> 
		                        <option value="1" selected>Normal Rate</option>
		                        <option value="2" >Sauda Rate</option>
		                        <?php } ?>
		                    </select>
	                        <span class="size-7 e_u_post_type text-danger"></span>
	                    </div>
	                    <div class="col-12 postrateattributesdata">
	                    	
	                    </div>
	                    <div class="col-6 p-2 ">
	                        <label>Rates offered<span class="text-danger"> *</span></label>
	                        <input type="text" name="u_rates_offered" id="u_rates_offered" class="form-control">
	                    	<span class="size-7 e_u_rates_offered text-danger"></span>
	                    </div>
	                    <div class="col-6 p-2 ">
	                        <label>Description</label>
	                        <input type="text" name="u_description" id="u_description" class="form-control">
	                        <span class="size-7 e_u_description text-danger"></span>
	                    </div>
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
