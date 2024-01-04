

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title m-2">Add Staff</h4>
                    <div class="pull-right float-end ">
		                 <ul class="nav nav_filter ">
		                    <li class="nav-item text-end">
		                       <a href="javascript:void(0)" class="btn btn-primary mb-2 nav-staff" >Back</a>
		                      
		                    </li>
		                </ul> 
		            </div>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form class="" id="add_staff_form" method="post" enctype="multipart/form-data">
                        	
                            <div class="form-row size-5">
                                <div class="form-group col-md-3">
                                    <label>User Name</label><span class="text-danger">*</span>
                                    <input type="text" class="form-control" id="user_name" name="user_name" required >
                                    <span class="text-danger size-7 e_user_name"></span>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Email</label><span class="text-danger">*</span>
                                    <input type="text" class="form-control" id="email" name="email" required >
                                     <span class="text-danger size-7 e_email"></span>
                                </div>
                           
                                <div class="form-group col-md-3">
                                    <label>Phone No</label><span class="text-danger">*</span>
                                  <input type="text" class="form-control" id="phone_number" name="phone_number" required  >
                                    <span class="text-danger size-7 e_phone_number"></span>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Alternate Phone No </label>
                                    <input type="text" class="form-control" id="alternate_number" name="alternate_number"   >
                                    <span class="text-danger size-7 e_alternate_number"></span>
                                </div>
                                
                                <div class="form-group col-md-3">
                                    <label>Address</label><span class="text-danger">*</span>
                                    <input type="text" class="form-control" id="address" name="address" required >
                                    <span class="text-danger size-7 e_address"></span>
                                </div>
                                 <div class="form-group col-md-3">
                                    <label>State</label><span class="text-danger">*</span>
                                    <input type="text" class="form-control" id="state" name="state" required >
                                    
                                </div>
                                 <div class="form-group col-md-3">
                                    <label>City</label><span class="text-danger">*</span>
                                    <input type="text" class="form-control" id="city" name="city" required >
                                    <span class="text-danger size-7 e_city"></span>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Pincode</label><span class="text-danger">*</span>
                                    <input type="text" class="form-control" id="pincode" name="pincode" required >
                                    
                                </div>
                               
                                <div class="form-group col-md-3">
                                    <label>User Type</label><span class="text-danger">*</span>
                                    <select class="form-control " id="user_type" name="user_type" required>
									<option  value="" >select</option>
									<option  value="6">Guard</option>
									<option  value="7" >Quality Control</option>
								</select>
                                    <span class="text-danger size-7 e_maximum_stock"></span>
                                </div>
                               
                                <div class="form-group col-md-3">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password"   >
                                </div>
                                 <div class="form-group col-md-3">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="cpassword"   >
                                </div>
                                

                                <input type="hidden" name = "is_active" value="1">
                              
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  