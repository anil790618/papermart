
	
		<div class="container-fluid">
			
            <div class="row">
                <div class="col-lg-12">
                   <div class="table-div">
                		<div class="table-header-div">
                            <h4 class="tabel-title"><?php if($user_type == 0 ){ echo 'Lab Services';} else { echo 'Book Lab Service'; }?></h4>
                           
                            <div class="tabel-link-btn">
				               <ul class="nav nav_filter ">
				               	<?php if($user_type == 0 ){ ?>
				                    <li class="nav-item text-end">
				                       <a href="javascript:void(0)" class="addpurchase-text mr-2" data-bs-toggle="modal" data-bs-target="#labserviceModal">Add Lab Service</a>
				                    </li>
				                    <li class="nav-item text-end">
				                       <a href="javascript:void(0)" class="addpurchase-text booking-placed" >Booking Placed</a>
				                    </li>
				                <?php } else { ?>
				                	 <li class="nav-item text-end">
				                       <a href="javascript:void(0)" class="addpurchase-text my-booking" >My Booking</a>
				                    </li>
				                <?php } ?>
				                </ul> 
				            </div>
				       
                        </div>
                        <div class="tabel-body-div">
                            <div class="table-responsive overflow-hidden">
                            	
                            	<div  id="table">
                            		<table id="jobservice_tbale" class="table table-responsive-md size-6">
					                <tr>
					                    <th>S.No</th>
					                    <th>Title</th>
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
					                        <td><?=$value['title']?></td>
					                      
					                        <td class="description"><?=$value['description']?></td>
					                        <td>
					                        	<?php if($user_type== 0) { ?>
					                        	<a class=" update-labservice" href="javascript:void(0)" tag="<?=$value['id']?>" ><span class="badge light badge-success badge-text-size"><i class="fa fa-edit"></i></span></a><a class="delete-labservice" href="javascript:void(0)" tag="<?=$value['id']?>" ><span class="badge light badge-danger badge-text-size"><i class="fa fa-trash"></i></span></a>
					                        <?php } else{ ?> <a class=" book-labservice" href="javascript:void(0)" tag="<?=$value['id']?>" labname= "<?=$value['title']?>" ><span class="badge light badge-warning badge-text-size">Book Lab Service</span></a> <?php } ?>
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
    
<div class="modal fade " id="labserviceModal" tabindex="-1" aria-labelledby="labserviceModalLabel" aria-hidden="true">
  	<div class="modal-dialog ">
	    <div class="modal-content">
	      	<div class="modal-header">
		        <h4 class="card-title">Add Lab Services</h4>
	      	</div>
	       	<form method="post" id="add_labservice_form" >
		      	<div class="modal-body">
		      		<div class="row">
	                    <div class="col-12  ">
	                        <label>Title<span class="text-danger"> *</span></label>
	                        <input type="text" name="title" class="form-control">
	                    	<span class="size-7 e_title text-danger"></span>
	                    </div>
	                    <div class="col-12  ">
	                        <label>Description<span class="text-danger"> *</span> </label>
	                        <textarea type="text" name="description" class="form-control"></textarea>
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


<div class="modal fade " id="updatelabserviceModal" tabindex="-1" aria-labelledby="updatelabserviceModalLabel" aria-hidden="true">
  	<div class="modal-dialog ">
	    <div class="modal-content">
	      	<div class="modal-header">
		        <h4 class="card-title">Update Lab Service</h4>
	      	</div>
	       	<form  id="update_labservice_form" >
	       		<input type="hidden" name="lid" id="lid" >
		      	<div class="modal-body">
                   <div class="row">
	                      <div class="col-12  ">
	                        <label>Title<span class="text-danger"> *</span></label>
	                        <input type="text" name="u_title" id="u_title" class="form-control">
	                    	<span class="size-7 e_u_title text-danger"></span>
	                    </div>
	                    <div class="col-12  ">
	                        <label>Description<span class="text-danger"> *</span> </label>
	                        <textarea type="text" name="u_description" id="u_description" class="form-control"></textarea>
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


<div class="modal fade " id="booklabserviceModal" tabindex="-1" aria-labelledby="booklabserviceModalLabel" aria-hidden="true">
  	<div class="modal-dialog ">
	    <div class="modal-content">
	      	<div class="modal-header">
		        <h4 class="card-title">Book Lab Service for: <span class="btitle text-primary"></span></h4>
	      	</div>
	       	<form  id="book_labservice_form" >
	       		<input type="hidden" name="blid" id="blid" >
		      	<div class="modal-body">
                   <div class="row">
	                      <div class="col-12  ">
	                        <label>Select Booking Date<span class="text-danger"> *</span></label>
	                        <input  type="datetime-local" class=" form-control" id="booking_date" name="booking_date" placeholder="DD MM YYYY">
	                    	<span class="size-7 e_booking_date text-danger"></span>
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

<!-- <script src="<?=base_url()?>/public/public/js/plugins-init/pickadate-init.js" type="text/javascript"></script> -->
