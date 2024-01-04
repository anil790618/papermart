
					
						
<div class="container-fluid">
<div class="card-header">
    <h4 class="card-title m-2">Add Vehicle</h4>
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
                        <form class="" id="add_vehicle_form" method="post">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="vehicle_no">Vehicle Number
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="vehicle_no" name="vehicle_no" placeholder="Enter Vehicle Number">
                                            <span class="text-danger size-7 e_vehicle_no"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="vehicle_company_name">Company Name<span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="vehicle_company_name" name="vehicle_company_name" placeholder="Vehicle Company Name">
                                            <span class="text-danger size-7 e_vehicle_company_name"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="transporter_name">Transporter Name
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="transporter_name" name="transporter_name" placeholder="Enter Transporter Name" >
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
                                                <option value="1">Closed</option>
                                                <option value="2">Open</option>
                                                
                                            </select>
                                            <span class="text-danger size-7 e_vehicle_type"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="description">Description <span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <textarea class="form-control" id="description" name="description" rows="5" placeholder="Description Of vehicle"></textarea>
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
                                            <input type="text" class="form-control" id="width_vehicle" name="width_vehicle" placeholder="in meter">
                                            <span class="text-danger size-7 e_width_vehicle"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="depth_vehicle"> Vehicle Depth
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="depth_vehicle" name="depth_vehicle" placeholder="in meter">
                                            <span class="text-danger size-7 e_depth_vehicle"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="capicity">Capacity
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="capicity" name="capicity" placeholder="Enter Vehicle load Capacity">
                                            <span class="text-danger size-7 e_capicity"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="time_permited">Time Permitted <span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                             <input  class="datepicker-default form-control" id="datepicker" name="time_permited">
                                             <span class="text-danger size-7 e_time_permited"></span>
                                        </div>
                                        
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="areas_permited">Area Permitted<span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="areas_permited" name="areas_permited" placeholder="Enter Permited Areas ">
                                            <span class="text-danger size-7 e_areas_permited"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="trnasport_t">Transport type<span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <!-- <input type="text" class="form-control" id="areas_permited" name="areas_permited" placeholder="Enter Permited Areas "> -->
                                            <!-- <span class="text-danger size-7 e_areas_permited"></span> -->
                                            <select class="form-select form-control" id='trnasport_t' name="transport_type">
                                               
                                                <option value="1">Local Transport</option>
                                                <option value="2">Out Side Delhi Transport</option> 
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <div class="col-lg-8 ml-auto">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



					
				
			
				<script src="public/public/js/plugins-init/pickadate-init.js" type="text/javascript"></script>
			













