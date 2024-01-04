<div class="container-fluid p-0">
   
  <div class="row mt-4">
        <div class="col-md-3">
            
        </div>
        <div class="col-md-6 ">
            <div class="card" style="border: 1px solid #f0f1f5 !important;">
                <div class="card-body p-2">
                    <div class=" text-center" >
                        <img src="<?=base_url()?>/public/public/images/profile.png" style="width: 15%">
                    </div><br>
                    <h4 class=" uname text-center mb-4" ><?=$userdata['user_name']?></h4>
                      <h5 class="ucompany text-center mb-3" ><?=$userdata['company_name']?></h5>
                   <h6 class="umobile text-center" ><?=$userdata['phone_number']?></h6>
                </div>
            </div>  
        </div>
       
        <div class="col-md-3 ">
          
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-3">
            
        </div>
        <div class="col-md-6 ">
            <div class="card" style="border: 1px solid #f0f1f5 !important;">
                <div class="card-header p-2">
                       
                         <a href="javascript:void(0)" class="edit-profile" > Edit Profile</a>
                  </div> 
                <div class="card-body p-2">
                         <a href="javascript:void(0)"  data-bs-toggle="modal" data-bs-target="#resetpasswordModal" >Change Password</a>
                  </div> 
                </div>
            </div>  
        </div>
       
        <div class="col-md-3 ">
          
        </div>
    </div>
</div>


<div class="modal fade " id="resetpasswordModal" tabindex="-1" aria-labelledby="resetpasswordModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="card-title m-0">Change Password</h4>
            </div>
            <form method="post" id="reset_password_form" >
                <div class="modal-body p-2">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label>Old Password</label><span class="text-danger">*</span>
                            <input type="password" class="form-control" id="oldpassword" name="oldpassword"   >
                            <span class="text-danger size-7 e_oldpassword"></span>
                        </div>
                        <div class="form-group col-md-12">
                            <label>New Password</label><span class="text-danger">*</span>
                            <input type="password" class="form-control" id="newpassword" name="newpassword"   >
                            <span class="text-danger size-7 e_newpassword"></span>
                        </div>
                         <div class="form-group col-md-12">  
                            <label>Confirm Password</label><span class="text-danger">*</span>
                            <input type="password" class="form-control" id="cr_password" name="cr_password"   >
                            <span class="text-danger size-7 e_cr_password"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="closepass" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>