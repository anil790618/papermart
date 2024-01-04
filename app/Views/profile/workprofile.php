<div class="container-fluid">

     <div class="row ">
        <div class="col-12">
            <div class="card">
               <div class="card-header">
                  <h4> Complete  Work Profile </h4>
                </div>
                <div class="card-body">
                                        <div class="basic-form">
                        <form class="" id="update_customer_form" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="customer_id" value="<?=$userdata['id']?>">
                             <input type="hidden" name="approved" value="0">
                            <div class="form-row size-5">
                                <div class="form-group col-md-3">
                                    <label>Name</label><span class="text-danger">*</span>
                                    <input type="text" class="form-control" id="user_name" name="user_name" required value="<?=$userdata['user_name']?>" >
                                    <span class="text-danger size-7 e_user_name"></span>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Email</label><span class="text-danger">*</span>
                                    <input type="text" class="form-control" id="email" name="email" required value="<?=$userdata['email']?>" >
                                     <span class="text-danger size-7 e_email"></span>
                                </div>
                           
                                <div class="form-group col-md-3">
                                    <label>Phone No</label><span class="text-danger">*</span>
                                  <input type="text" class="form-control" id="phone_number" name="phone_number" required value="<?=$userdata['phone_number']?>" >
                                    <span class="text-danger size-7 e_phone_number"></span>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Alternate Phone No </label>
                                    <input type="text" class="form-control" id="alternate_number" name="alternate_number"  value="<?=$userdata['alternate_number']?>" >
                                    <span class="text-danger size-7 e_alternate_number"></span>
                                </div>
                                 <div class="form-group col-md-3">
                                    <label>Company Name</label><span class="text-danger">*</span>
                                    <input type="text" class="form-control" id="company_name" name="company_name" required value="<?=$userdata['company_name']?>">
                                    <span class="text-danger size-7 e_company_name"></span>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Address</label><span class="text-danger">*</span>
                                    <input type="text" class="form-control" id="address" name="address" required value="<?=$userdata['address']?>">
                                    <span class="text-danger size-7 e_address"></span>
                                </div>
                                 <div class="form-group col-md-3">
                                    <label>State</label><span class="text-danger">*</span>
                                    <input type="text" class="form-control" id="state" name="state" required value="<?=$userdata['state']?>">
                                    
                                </div>
                                 <div class="form-group col-md-3">
                                    <label>City</label><span class="text-danger">*</span>
                                    <input type="text" class="form-control" id="city" name="city" required value="<?=$userdata['city']?>">
                                    <span class="text-danger size-7 e_city"></span>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Pincode</label><span class="text-danger">*</span>
                                    <input type="text" class="form-control" id="pincode" name="pincode" required value="<?=$userdata['pin_code']?>">
                                    
                                </div>
                                <div class="form-group col-md-3">
                                    <label>GST No</label><span class="text-danger">*</span>
                                    <input type="text" class="form-control" id="gst_no" name="gst_no" required value="<?=$userdata['gst_number']?>">
                                    <span class="text-danger size-7 e_gst_no"></span>
                                </div>
                                 <div class="form-group col-md-3">
                                    <label>PAN No</label><span class="text-danger">*</span>
                                    <input type="text" class="form-control" id="pan_no" name="pan_no" required value="<?=$userdata['pan_number']?>">
                                    <span class="text-danger size-7 e_pan_no"></span>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>User Type</label><span class="text-danger">*</span>
                                    <select class="form-control " id="user_type" name="user_type" required>
                                    <option  value="" >select</option>
                                    <option  value="1" <?php if($userdata['user_type'] == '1'){ echo 'selected'; }?>>Bailer</option>
                                    <option  value="2" <?php if($userdata['user_type'] == '2'){ echo 'selected'; }?>>End User</option>
                                    <option  value="3" <?php if($userdata['user_type'] == '3'){ echo 'selected'; }?>>Paper Mill</option>
                                    <option  value="4" <?php if($userdata['user_type'] == '4'){ echo 'selected'; }?>>Trader</option>
                                    <option  value="5" <?php if($userdata['user_type'] == '5'){ echo 'selected'; }?>>Transporter</option>
                                     <option  value="10" <?php if($userdata['user_type'] == '5'){ echo 'selected'; }?>>Other</option>
                                </select>
                                    <span class="text-danger size-7 e_maximum_stock"></span>
                                </div>

                                <input type="hidden" id="role" value="<?=$userdata['user_type'];?>">
                                <div class="form-group col-md-3">
                                    <label>Designation</label>
                                    <input type="text" class="form-control" name="designation"  value="<?=$userdata['designation']?>" >
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password"   >
                                </div>
                                <input type="hidden" name = "is_active" value="1">
                               
                            </div>


                            <div class="userprofile"></div>
                            <button type="submit" class="btn btn-primary mt-3">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
<script>
     $(document).ready(function  (){
        var id  = $('#role').val();
        if(id < 5 && id > 0){
            getuserworkprofile(id);
        }
    });

</script>