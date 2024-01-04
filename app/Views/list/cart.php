

<div class="container-fluid">
	
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title m-2">Response</h4>
                    <!-- <div class="pull-right float-end ">
		               <ul class="nav nav_filter ">
		                    <li class="nav-item text-end">
		                       <a href="javascript:void(0)" class="btn btn-primary mb-2 addlist" >response</a>
		                    </li>
		                </ul> 
		            </div> -->
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    	<!-- <div id="example3_wrapper" class="dataTables_wrapper no-footer mb-2 d-flex justify-content-start ">
							<div id="example3_filter" class="dataTables_filter input-group" >
								<input type="text" id="search" name="search" class="" placeholder=" search" aria-describedby="button-addon1" style="border-right: none; margin-right: -2%;">
								<button type="button" class="btn btn-primary ps-2" id="button-addon1" s>Search</button>
							</div>
						</div> -->
                    	<div  id="table">
                    		<table id="producttype_tbale" class="table table-responsive-md tabledata size-6">
			                <tr>
			                    <th>S.No</th>
			                    <th>List Posted by</th>
			                    <th>Product Name</th>
			                    <th>List Date</th>
			                    <th>List Type</th>
			                    <th>Prefer Location	</th>
			                    <th>Quantity </th>
			                    <th>Price </th>
			                    <th>Delivery Days</th>
			                    <th>Action</th>
			                </tr>
			               
			            <?php
			            if ($response) 
			            {$i=1;
			                foreach ($response as $value)  
			                { 
			                     	
			                    ?>	
			                    <tr id="row<?=$value['id']?>">
			                       <td class="row-id" ><?=$i;?></td>
			                       <td> <?=$value['user_name'];?> / <?=$value['phone_number'];?></td>
			                        <td> <?=$value['pname'];?></td>
			                        <td><?=$value['added_date'];?> </td>
			                        <td> <?php if($value['list_type']==1){ echo 'Sell'; } else { echo 'Buy';}?></td>
			                         <td><?=$value['product_location'];?> </td>
			                        <td> <?=$value['quantity'];?></td>
			                        <td> <?=$value['buying_rate'];?></td>
			                        <td> <?=$value['delivery_days'];?> days</td>
			                        <td>
			                        	 <!-- <a class="viewList" href="javascript:void(0)" tag="<?=$value['id'];?>"><span class="badge light badge-warning badge-text-size"><i class="fa fa-eye"></i></span></a> -->
			                        	<!--<div class="dropdown">
			                                 <button type="button" class="btn btn-success light sharp" data-toggle="dropdown">
			                                    <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
			                                </button>
			                                <div class="dropdown-menu pl-3"> -->
			                                    <!-- <a class=" editProduct" href="javascript:void(0)" tag="<?=$value['id'];?>"><span class="badge light badge-success badge-text-size"><i class="fa fa-edit"></i></span></a> -->
	                        	 			 <!-- <a class="viewList" href="javascript:void(0)" tag="<?=$value['id'];?>"><span class="badge light badge-warning badge-text-size"><i class="fa fa-eye"></i></span></a> -->
	                        	  			 <!-- <a class="deleteProduct" href="javascript:void(0)" tag="<?=$value['id'];?>"><span class="badge light badge-danger badge-text-size"><i class="fa fa-trash"></i></span></a> -->
			                                <!-- </div>
			                            </div>	 -->
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
			             </table>
                    	</div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>

