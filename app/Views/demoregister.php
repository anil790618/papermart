<!DOCTYPE html>
<html lang="en" class="h-100">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Registration</title>
    <meta name="description" content="Some description for the page" />
    <?php foreach ($style as $val ) :?>
    	<link href="<?=base_url('/'.$val);?>" rel="stylesheet">
    <?php endforeach ?>
	
<script type="text/javascript"> base_url="<?=base_url();?>/"; </script>
</head>

<body>
    <div class="deznav-scroll">
    </div>
    <section class="wizard-section">
		<div class="row no-gutters">
			<div class="col-lg-6 col-md-6">
				<div class="wizard-content-left d-flex justify-content-center align-items-center" id="img">
				</div>
			</div>
			<div class="col-lg-6 col-md-6">
				<div class="form-wizard">
					<form action="" id="regitser-form" role="form">
						<div class="form-wizard-header">
							<h4>Registration Form </h4>
							<ul class="list-unstyled form-wizard-steps clearfix">
								<li class="active"><span>1</span></li>
								<li><span>2</span></li>
								<li><span>3</span></li>
								<li><span>4</span></li>
							</ul>
						</div>
						<fieldset class="wizard-fieldset show">
							<h5>General Information</h5>
							<div class="form-group">
								<input type="text" class="form-control wizard-required" id="user_name" autocomplete="off">
								<label for="user_name" class="wizard-form-text-label">User Name<span class="danger"> *</span></label>
								<div class="wizard-form-error"></div>
								<span class="text-danger e_user_name"></span>
							</div>
							<div class="form-group">
								<input type="email" class="form-control wizard-required" id="email" autocomplete="off">
								<label for="email" class="wizard-form-text-label">Email<span class="danger"> *</span></label>
								<div class="wizard-form-error"></div>
								<span class="text-danger e_email"></span>
							</div>
							<div class="form-group">
								<input type="text" class="form-control wizard-required" id="phone_number" autocomplete="off">
								<label for="phone_number" class="wizard-form-text-label">Phone No <span class="danger"> *</span></label>
								<div class="wizard-form-error"></div>
								<span class="text-danger e_phone_number"></span>
							</div>
							<div class="form-group">
								<input type="text" class="form-control " id="alternate_phone_number" autocomplete="off">
								<label for="alternate_phone_number" class="wizard-form-text-label">Alternate Phone No </label>
								<div class="wizard-form-error"></div>
								<span class="text-danger e_alternate_phone_number"></span>
							</div>
							<div class="form-group">
								<input type="text" class="form-control wizard-required" id="company_name" autocomplete="off">
								<label for="company_name" class="wizard-form-text-label">Company Name <span class="danger"> *</span></label>
								<div class="wizard-form-error"></div>
								<span class="e_company_name text-danger"></span>
							</div>
							<div class="form-group clearfix" style="margin-bottom: -5px !important; margin-top: -10px !important; ">
								<a href="javascript:;" id="submit-1" class="form-wizard-next-btn float-right">Next</a>
							</div>
							 <div class="new-account mt-3 text-center">
                                <p>Already have an account? <a class="text-primary" href="<?=base_url('reglogin')?>">Login</a></p>
                            </div>
                           
						</fieldset>	
						<fieldset class="wizard-fieldset">
							<div class="row">
								<div class="col-lg-12">
									<h5 class="text-center">Location Information</h5>
								</div>

								<div class="col-lg-12">
									
									<div class="form-group">
										<textarea class="form-control wizard-required" id="address" rows="2"></textarea>
										<label for="address" class="wizard-form-text-label">Address <span class="danger"> *</span></label>
										<div class="wizard-form-error"></div>
										<span class="e_address text-danger"></span>
									</div>
									<div class="form-group">
										<input type="text" class="form-control wizard-required" id="state">
										<label for="state" class="wizard-form-text-label">State <span class="danger"> *</span></label>
										<div class="wizard-form-error"></div>
										<span class="e_state text-danger"></span>
									</div>
									
									<div class="form-group">
										<input type="text" class="form-control wizard-required" id="city">
										<label for="city" class="wizard-form-text-label">City <span class="danger"> *</span></label>
										<div class="wizard-form-error"></div>
										<span class="e_city text-danger"></span>
									</div>
									<div class="form-group">
										<input type="text" class="form-control wizard-required" id="city">
										<label for="pin_code" class="wizard-form-text-label">Pin Code <span class="danger"> *</span></label>
										<div class="wizard-form-error"></div>
										<span class="e_pin_code text-danger"></span>
									</div>
									
									<div class="form-group">
										<input type="text" class="form-control wizard-required" id="gst_no">
										<label for="gst_no" class="wizard-form-text-label">GST No <span class="danger"> *</span></label>
										<div class="wizard-form-error"></div>
										<span class="e_gst_no text-danger"></span>
									</div>
									<div class="form-group">
										<input type="text" class="form-control wizard-required" id="pan_no">
										<label for="pan_no" class="wizard-form-text-label">PAN Card <span class="danger"> *</span></label>
										<div class="wizard-form-error"></div>
										<span class="e_pan_no text-danger"></span>
									</div>
								</div>
								<div class="col-lg-12" >
									<div class="form-group clearfix" style="margin-bottom: -5px !important; margin-top: -10px !important; ">
										<a href="javascript:;" class="form-wizard-previous-btn float-left">Previous</a>
										<a href="javascript:;" id="submit-2" class="form-wizard-next-btn float-right">Next</a>
									</div>
								</div>
							</div>
							<div class="new-account mt-3 text-center">
                                <p>Already have an account? <a class="text-primary" href="<?=base_url('reglogin')?>">Login</a></p>
                            </div>
						</fieldset>	
						<fieldset class="wizard-fieldset">
							<h5>Personal Information</h5>
							<div class="">
								<label >User Type <span class="danger"> *</span></label>
								<select class="form-control " id="user_type">
									<option value="">select</option>
									<option value="1">Bailer</option>
									<option value="2">End User</option>
									<option value="3">Paper Mill</option>
									<option value="4">Trader</option>
									<option value="5">Transporter</option>
								</select>
								<div class="wizard-form-error"></div>
								<span class="text-danger e_user_type"></span>
							</div>
							<div class="form-group">
								<input type="text" class="form-control wizard-required" id="designation">
								<label for="designation" class="wizard-form-text-label">Designation <span class="danger"> *</span></label>
								<div class="wizard-form-error"></div>
								<span class="e_designation text-danger"></span>
							</div>
<!-- 
							<div class="form-group">
								<input type="file" class="form-control" id="profile">
								<label for="profile" class="wizard-form-file-label">Profile Image<span class="danger"> *</span></label>
								<div class="wizard-form-error"></div>
								<span class="e_profile text-danger"></span>
							</div> -->
							<div class="form-group">
								<input type="Password" class="form-control wizard-required" id="password">
								<label for="password" class="wizard-form-text-label">Password<span class="danger"> *</span></label>
								<div class="wizard-form-error"></div>
								<span class=""> Password must be atleast 5 charcter long with a combination of any alphanumeric symbols.</span>
								<span class="text-danger e_password"></span>
							</div>
							<div class="form-group">
								<input type="password" class="form-control wizard-required" id="cr_password">
								<label for="cr_password" class="wizard-form-text-label">Confrim Password <span class="danger"> *</span></label>
								<div class="wizard-form-error"></div>
								<span class="text-danger e_cr_password"></span>
							</div>
							<div class="form-group clearfix">
								<a href="javascript:;" class="form-wizard-previous-btn float-left">Previous</a>
								<a href="javascript:;" id="submit-3" class="form-wizard-next-btn float-right">Submit</a>
							</div>
							<div class="new-account mt-3 text-center">
                                <p>Already have an account? <a class="text-primary" href="<?=base_url('reglogin')?>">Login</a></p>
                            </div>
						</fieldset>	
						<fieldset class="wizard-fieldset">
							<div class="new-account mt-3 text-center">
                                <img src="<?=base_url()?>/public/public/images/check.png" style="width:40%">
                            </div>
							
							<h3 style="text-align: center;  "><b><span id="successmesage"></span></b></h3>
							
							 <div class="mt-4 text-center">
                                <a  class="btn btn-primary w-50" href="<?=base_url('reglogin')?>">
                                
                                    	<div class="new-account  text-center">Login </div>
                                	
                                </a>
                            </div>
							<!-- 
							<?=print_r($userDataSubmitOne);?>
							<?=print_r($userDataSubmitTwo);?>
							<?=print_r($userDataSubmitThree);?> -->
						</fieldset>	
					</form>
				</div>
			</div>
		</div>
	</section>	
</body>
<?php 
foreach ($javascript as $value)
{
	?>
<script type="text/javascript" src="<?=base_url($value)?>"></script>
<script>
	
</script>
<?php
}
?>


</html>
