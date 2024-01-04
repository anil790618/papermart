

<div class="container-fluid">
	
    <div class="row">
        <div class="col-lg-12">
            <div class="table-div">
                <div class="table-header-div">
                    <h4 class="tabel-title">Products</h4>
                    <?php   if( $appproved == '1' ){ ?>  
                    <div class="tabel-link-btn ">
		               <ul class="nav nav_filter ">
		                    <li class="nav-item text-end">
		                       <a href="javascript:void(0)" class="addpurchase-text  add-product" >Add</a>
		                    </li>
		                </ul> 
		            </div>
		             <?php }?>
                </div>
                <div class="tabel-body-div">
                    <div class="table-responsive overflow-hidden">
                    
                    	<div  id="table">
                    		<table id="producttype_tbale" class="table table-responsive-md tabledata size-6">
			                <thead>
			                	<tr>
				                    <th>S.No</th>
				                    <th> Name</th>
				                    <th>HSN CODE</th>
				                    <th>Type</th>
				                    <th>Category</th>
				                    <th>Size</th>
				                    <th>UOM</th>
				                    <th>Purchase Price</th>
				                    <th>Sale Price</th>
				                    <th>Min. Stock</th>
				                    <th>Max Stock</th>
				                    <th>Action</th>
				                </tr>
				            </thead>
			              	<tbody>
			            <?php
			            if ($query) 
			            {$i=1;
			                foreach ($query as $value)  
			                { 
			                    
			                    ?>
			                    <tr id="row<?=$value['id']?>">
			                        <td class="row-id" ><?=$i;?></td>
			                        <td><?=$value['product_name']?></td>
			                        <td><?=$value['hsncode'];?></td>
			                        <td><?=$value['typename'];?></td>
			                        <td><?=$value['catname'];?></td>
			                        <td><?=$value['size'];?></td>
			                        <td><?=$value['uom'];?></td>
			                        <td><?=$value['purchase_price'];?></td>
			                        <td><?=$value['sale_price'];?></td>
			                        <td><?=$value['minimum_stock'];?></td>
			                        <td><?=$value['maximum_stock'];?></td>
			                        
			                       
			                        <td>
			                        	<?php if($value['added_by'] == $user_id) { ?> 
			                        	 <!-- <a class=" editProduct" href="javascript:void(0)" tag="<?=$value['id'];?>"><span class="badge light badge-success badge-text-size"><i class="fa fa-edit"></i></span></a> -->
	                        	 			 <a class="viewProduct" href="javascript:void(0)" tag="<?=$value['id'];?>"><span class="badge light badge-warning badge-text-size"><i class="fa fa-eye"></i></span></a>
	                        	  			 <a class="deleteProduct" href="javascript:void(0)" tag="<?=$value['id'];?>"><span class="badge light badge-danger badge-text-size"><i class="fa fa-trash"></i></span></a>
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

