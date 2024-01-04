

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title m-2">Edit Customer</h4>
                    <div class="pull-right float-end ">
		                 <ul class="nav nav_filter ">
		                    <li class="nav-item text-end">
		                       <a href="javascript:void(0)" class="btn btn-primary mb-2 nav-customer" >Back</a>
		                      
		                    </li>
		                </ul> 
		            </div>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form class="" id="update_customer_form" method="post" enctype="multipart/form-data">
                        	<input type="hidden" name="customer_id" value="<?=$customer['id']?>">
                            <div class="form-row size-5">
                                <div class="form-group col-md-3">
                                    <label>User Name</label><span class="text-danger">*</span>
                                    <input type="text" class="form-control" id="user_name" name="user_name" required value="<?=$customer['user_name']?>" >
                                    <span class="text-danger size-7 e_user_name"></span>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Email</label><span class="text-danger">*</span>
                                    <input type="text" class="form-control" id="email" name="email" required value="<?=$customer['email']?>" >
                                     <span class="text-danger size-7 e_email"></span>
                                </div>
                           
                                <div class="form-group col-md-3">
                                    <label>Phone No</label><span class="text-danger">*</span>
                                  <input type="text" class="form-control" id="phone_number" name="phone_number" required value="<?=$customer['phone_number']?>" >
                                    <span class="text-danger size-7 e_phone_number"></span>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Alternate Phone No </label>
                                    <input type="text" class="form-control" id="alternate_number" name="alternate_number"  value="<?=$customer['alternate_number']?>" >
                                    <span class="text-danger size-7 e_alternate_number"></span>
                                </div>
                                 <div class="form-group col-md-3">
                                    <label>Company Name</label><span class="text-danger">*</span>
                                    <input type="text" class="form-control" id="company_name" name="company_name" required value="<?=$customer['company_name']?>">
                                    <span class="text-danger size-7 e_company_name"></span>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Address</label><span class="text-danger">*</span>
                                    <input type="text" class="form-control" id="address" name="address" required value="<?=$customer['address']?>">
                                    <span class="text-danger size-7 e_address"></span>
                                </div>
                                 <div class="form-group col-md-3">
                                    <label>State</label><span class="text-danger">*</span>
                                    <input type="text" class="form-control" id="state" name="state" required value="<?=$customer['state']?>">
                                    
                                </div>
                                 <div class="form-group col-md-3">
                                    <label>City</label><span class="text-danger">*</span>
                                    <input type="text" class="form-control" id="city" name="city" required value="<?=$customer['city']?>">
                                    <span class="text-danger size-7 e_city"></span>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Pincode</label><span class="text-danger">*</span>
                                    <input type="text" class="form-control" id="pincode" name="pincode" required value="<?=$customer['pin_code']?>">
                                    
                                </div>
                                <div class="form-group col-md-3">
                                    <label>GST No</label><span class="text-danger">*</span>
                                    <input type="text" class="form-control" id="gst_no" name="gst_no" required value="<?=$customer['gst_number']?>">
                                    <span class="text-danger size-7 e_gst_no"></span>
                                </div>
                                 <div class="form-group col-md-3">
                                    <label>PAN No</label><span class="text-danger">*</span>
                                    <input type="text" class="form-control" id="pan_no" name="pan_no" required value="<?=$customer['pan_number']?>">
                                    <span class="text-danger size-7 e_pan_no"></span>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>User Type</label><span class="text-danger">*</span>
                                    <select class="form-control " id="user_type" name="user_type" required>
									<option  value="" >select</option>
									<option  value="1" <?php if($customer['user_type'] == '1'){ echo 'selected'; }?>>Bailer</option>
									<option  value="2" <?php if($customer['user_type'] == '2'){ echo 'selected'; }?>>End User</option>
									<option  value="3" <?php if($customer['user_type'] == '3'){ echo 'selected'; }?>>Paper Mill</option>
									<option  value="4" <?php if($customer['user_type'] == '4'){ echo 'selected'; }?>>Trader</option>
                                    <option  value="5" <?php if($customer['user_type'] == '5'){ echo 'selected'; }?>>Transporter</option>
                                    <option  value="10" <?php if($customer['user_type'] == '10'){ echo 'selected'; }?>>Others</option>
								</select>
                                    <span class="text-danger size-7 e_maximum_stock"></span>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Designation</label>
                                    <input type="text" class="form-control" name="designation"  value="<?=$customer['designation']?>" >
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Account Status</label><span class="text-danger">*</span>
                                    <select class="form-control "  name="is_active" required>
									
									<option  value="0" <?php if($customer['is_active'] == '0'){ echo 'selected'; }?>>In-Active</option>
									<option  value="1" <?php if($customer['is_active'] == '1'){ echo 'selected'; }?>>Active</option>
								</select>
                                    <span class="text-danger size-7 e_maximum_stock"></span>
                                </div>
                                 <div class="form-group col-md-3">
                                    <label>Account Status</label><span class="text-danger">*</span>
                                    <select class="form-control "  name="approved" required>
                                     <option  value="" >Choose</option>
                                    <option  value="0" <?php if($customer['approved'] == '0'){ echo 'selected'; }?>>Not Apporved</option>
                                    <option  value="1" <?php if($customer['approved'] == '1'){ echo 'selected'; }?>>Apporved</option>
                                </select>
                                    <span class="text-danger size-7 e_approved"></span>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  