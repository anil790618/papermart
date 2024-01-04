
                    
                        
<div class="container-fluid">
<div class="card-header p-0">
    <h4 class="card-title ">Edit Vehicle</h4>
    <div class="pull-right float-end ">
        <ul class="nav nav_filter ">
            <li class="nav-item text-end">
               <a href="javascript:void(0)" class="btn btn-primary mb-2 nav-vehicle" >Back</a>
              
            </li>
        </ul>
    </div>
</div>  
        <div class="row">
        <div class="col-lg-12">
            <div class="card ">
                <div class="card-header m-3">
                    <h4 class="card-title">Vehicle Information</h4>
                </div>
                <div class="card-body">
                    <div class="form-validation">
                        <form class="" id="edit_vehicle_form" method="post">
                            <div class="row">
                                <input type="hidden" name="vehicle_id" value="<?=$vehicle['id']?>">
                                <div class="col-xl-6">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="vehicle_no">Vehicle Number
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="vehicle_no"  value="<?=$vehicle['vehicle_no']?>" name="vehicle_no" placeholder="Enter Vehicle Number">
                                            <span class="text-danger size-7 e_vehicle_no"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="vehicle_company_name">Company Name<span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="vehicle_company_name" name="vehicle_company_name" placeholder="Vehicle Company Name" value="<?=$vehicle['vehicle_company_name']?>">
                                            <span class="text-danger size-7 e_vehicle_company_name"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="transporter_name">Transporter Name
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="transporter_name" name="transporter_name" placeholder="Enter Transporter Name" value="<?=$vehicle['transporter_name']?>" >
                                            <span class="text-danger size-7 e_transporter_name"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" >Vehicle Type
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <select class="form-control" id="vehicle_type" name="vehicle_type">
                                                <option value="">Please select</option>
                                                <option value="1" <?php if($vehicle['vehicle_type'] == 1){ echo 'selected'; } ?> >Closed</option>
                                                <option value="2" <?php if($vehicle['vehicle_type'] == 2){ echo 'selected'; } ?> >Open</option>
                                                
                                            </select>
                                            <span class="text-danger size-7 e_vehicle_type"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="description">Description <span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <textarea class="form-control" id="description" name="description" rows="5" placeholder="Description Of vehicle"><?=$vehicle['description']?></textarea>
                                            <span class="text-danger size-7 e_description"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                   
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="width_vehicle">Vehicle Width
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="width_vehicle" value="<?=$vehicle['width_vehicle']?>"  name="width_vehicle" placeholder="in meter">
                                            <span class="text-danger size-7 e_width_vehicle"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="depth_vehicle"> Vehicle Depth
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="depth_vehicle" name="depth_vehicle" value="<?=$vehicle['depth_vehicle']?>" placeholder="in meter">
                                            <span class="text-danger size-7 e_depth_vehicle"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="capicity">Capacity
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="capicity" name="capicity" value="<?=$vehicle['capicity']?>" placeholder="Enter Vehicle load Capacity">
                                            <span class="text-danger size-7 e_capicity"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="time_permited">Time Permitted <span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                             <input  class="datepicker-default form-control" id="datepicker" name="time_permited" value="<?=$vehicle['time_permited']?>">
                                             <span class="text-danger size-7 e_time_permited"></span>
                                        </div>
                                        
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="areas_permited">Area Permitted<span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="areas_permited" name="areas_permited" value="<?=$vehicle['areas_permited']?>" placeholder="Enter Permited Areas ">
                                            <span class="text-danger size-7 e_areas_permited"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" >Vehicle Status
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <select class="form-control" id="vehicle_status" name="vehicle_status">
                                              
                                                <option value="1" <?php if($vehicle['vehicle_status'] == 1) { echo 'selected'; }?>>Available</option>
                                                <option value="2" <?php if($vehicle['vehicle_status'] == 2) { echo 'selected'; }?>>Damaged</option>
                                                <option value="3" <?php if($vehicle['vehicle_status'] == 3) { echo 'selected'; }?>>Not Available</option>
                                                <option value="4" <?php if($vehicle['vehicle_status'] == 4) { echo 'selected'; }?>>Occupied</option>
                                                
                                            </select>
                                            <span class="text-danger size-7 e_vehicle_status"></span>
                                        </div>
                                    </div>
                                    
                                </div>
                                 <div class="col-lg-12 ">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



                    
                
            
                <script src="<?=base_url()?>/public/public/js/plugins-init/pickadate-init.js" type="text/javascript"></script>
            













