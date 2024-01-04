
	
		<div class="container-fluid">
			
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-div">
                        <div class="table-header-div">
                            <h4 class="tabel-title">Jobs Posted</h4>
                            <div class="tabel-link-btn">
				               <ul class="nav nav_filter ">
				                    <li class="nav-item text-end">
				                       <a href="javascript:void(0)" class="addpurchase-text " data-bs-toggle="modal" data-bs-target="#jobModal">Add Job</a>
				                      
				                    </li>
				                </ul> 
				            </div>
                        </div>
                        <div class="tabel-body-div">
                            <div class="table-responsive overflow-hidden">
                            	<!-- <div id="example3_wrapper" class="dataTables_wrapper no-footer mb-2 d-flex justify-content-start ">
									<div id="example3_filter" class="dataTables_filter input-group" >
										<input type="text" id="search" name="search" class="" placeholder=" search" aria-describedby="button-addon1" style="border-right: none; margin-right: -2%;">
										<button type="button" class="btn btn-primary ps-2" id="button-addon1" s>Search</button>
									</div>
								</div> -->
                            	<div  id="table">
                            		<table id="job_tbale" class="table table-responsive-md size-6">
					                <tr>
					                    <th>S.No</th>
					                    <th>Post</th>
					                    <th>Description</th>
					                    <th>Action</th>
					                </tr>
					               <tbody  class="tabledata">
					            <?php
					            if ($query) 
					            {$i=1;
					                foreach ($query as $value)  
					                { 
					                    
					                    ?>
					                    <tr id="row<?=$value['id']?>">
					                        <td class ="row-id"><?=$i;?></td>
					                        <td><?=$value['post']?></td>
					                        
					                        <td class="description"><?=$value['description']?></td>
					                        
					                       
					                        <td>
					                        	<a class=" update-job" href="javascript:void(0)" tag="<?=$value['id']?>" ><span class="badge light badge-success badge-text-size"><i class="fa fa-edit"></i></span></a><a class="delete-job" href="javascript:void(0)" tag="<?=$value['id']?>" ><span class="badge light badge-danger badge-text-size"><i class="fa fa-trash"></i></span></a>
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
					                    <td colspan="8">No Data</td>
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
    
<div class="modal fade " id="jobModal" tabindex="-1" aria-labelledby="jobModalLabel" aria-hidden="true">
  	<div class="modal-dialog ">
	    <div class="modal-content">
	      	<div class="modal-header">
		        <h4 class="card-title">Add Job Post</h4>
	      	</div>
	       	<form method="post" id="add_job_form" >
		      	<div class="modal-body">
                    <div class="mb-2">
                        <label>Post<span class="text-danger"> *</span></label>
                        <input type="text" name="post" class="form-control">
                    	<span class="e_post text-danger"></span>
                    </div>
                    <div class="mb-2">
                        <label>Description<span class="text-danger"> *</span></label>
                        <input type="text" name="description" class="form-control">
                        <span class="e_description text-danger"></span>
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


<div class="modal fade " id="updatejobModal" tabindex="-1" aria-labelledby="jobModalLabel" aria-hidden="true">
  	<div class="modal-dialog ">
	    <div class="modal-content">
	      	<div class="modal-header">
		        <h4 class="card-title">Update Job Post</h4>
	      	</div>
	       	<form  id="update_job_form" >
	       		<input type="hidden" name="jpid" id="jpid" >
		      	<div class="modal-body">
                    <div class="mb-2">
                        <label>Name<span class="text-danger"> *</span></label>
                        <input type="text" name="u_post" id="u_post" class="form-control">
                    	<span class="e_u_post text-danger "></span>
                    </div>
                    <div class="mb-2">
                        <label>Description<span class="text-danger"> *</span></label>
                        <input type="taxt" name="u_description" id="u_description" class="form-control">
                        <span class="e_u_description text-danger "></span>
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
