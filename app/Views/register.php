<!DOCTYPE html>
<html lang="en" class="h-100">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
	<!-- Option 1: Include in HTML -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <title>Registration</title>
    <meta name="description" content="Some description for the page" />
    <?php foreach ($style as $val ) :?>
    	<link href="<?=base_url('/'.$val);?>" rel="stylesheet">
		<?php endforeach ?>
		
    <link href="<?=base_url('public/public/css/newRegisterstyle.css');?>" rel="stylesheet">
	 <script type="text/javascript"> base_url="<?=base_url();?>/"; </script>
 
</head>

<body>
    <div class="deznav-scroll">
    </div>

	<?php
$imgurl = base_url()."/public/public/images/Rectangle.png";
	?>
	<div class="container-fluid mainsection d-flex align-items-center justify-content-center "  style='background-image:url(<?=$imgurl?>)'>
    <div class="main col-md-8  row"> 
      <div class="sidebar col-md-4 py-3 " style="background-image:url(<?=base_url()?>/public/images/bg-sidebar-desktop.svg)"> 
        <div class="step   ">
          <div class="step-1">
            <h2 class="number step-indicator">1</h2>
            <div class="flex-steps">
              <p>Step 1</p>
              <h3>Personal Details</h3>
            </div>
          </div>
          <div class="step-2">
            <h2 class="number step-indicator">2</h2>
            <div class="flex-steps">
              <p>Step 2</p>
              <h3>Business Details</h3>
            </div>
          </div>
          <div class="step-3">
            <h2 class="number step-indicator">3</h2>
            <div class="flex-steps">
              <p>Step 3</p>
              <h3>Login Details</h3>
            </div>
          </div>
          <div class="step-4 ">
            <h2 class="number step-indicator">4</h2>
            <div class="flex-steps">
              <p>Step 4</p>
              <h3>Complete</h3>
            </div>
          </div>
        </div>
      </div>
      <div class="main-form col-md-8 p-2  ">
        <div class="alertcls">
          A simple primary alert—check it out!
        </div>
        <div class="form-step" index="1">
			<form class="user-input">
          <div class="form-input-1">
            <h1 class="title">Personal Details</h1>
            <p class="step-description">Please provide your name, email address, and phone number.</p>
			<div>
				<legend>Name</legend>
				<input type="text" class="user-name wizard-required wizard-required" id='user_name' placeholder="e.g. Stephen King" required> 
				<div class="wizard-form-error"></div> 
				<span class="text-danger e_user_name"> </span>
			</div>
			<div>
				<legend>Email Address</legend>
				<input type="email" class="user-email wizard-required" id='email' placeholder="e.g. stephenking@lorem.com" required>
				<div class="wizard-form-error"></div> 
				<span class="text-danger e_email"> </span> 
			</div>
			<div class='emailotp'>
				<legend class='text-danger'>Email Otp</legend>
				<input type="text" class="user-email wizard-required" id='emailotp' placeholder="email otp" > 
				<span class="text-danger e_email_otp"> </span> 
			</div>
			<div>
				<legend>Phone Number</legend>
				<input type="tel" class="user-phone wizard-required" id='phone_number' placeholder="e.g. +1 234 567 890" name="phone" required> <span class="addno"><i class="bi bi-plus  " title='Add alternate no.'></i></span>  
				<div class="wizard-form-error"></div> 
				<span class="text-danger e_phone_number"> </span> 
			</div>
      <div class='phoneotp'>
				<legend class='text-danger'>Phone Otp</legend>
				<input type="text" class="user-email wizard-required" id='phoneotp' placeholder="phone otp" > 
				<span class="text-danger e_email_otp"> </span> 
			</div>
			  <div class=' alternateno'>
				  <legend>Alternate Phone Number</legend>
				  <input type="tel" class="user-alternatephone wizard-required" id='alternate_phone_number' placeholder="e.g. +1 234 567 890" name="alternatephone" required>
				  <div class="wizard-form-error"></div>  
				  <span class="text-danger e_alternate_phone_number"> </span>
			  </div>
			  <div>
				  <legend>Company Name</legend>
				  <input type="text" class="user-company wizard-required" id="company_name" placeholder="e.g. Maxmite" name="company" required>
				  <div class="wizard-form-error"></div> 
				  <span class="text-danger e_company_name"> </span> 
			  </div>
			  
            </form>
          </div>
        </div>
        <div class="form-step " index="2" id="form-step-2">
          <div class="form-input-2">
            <h1 class="title">Business Details</h1> 
            <p class="step-description"> 👋 Hi  <b class='  username '  style='text-transform: capitalize'>user name</b>, pls  Share Business Details.</p>
            <form class="user-input">
              <legend>Address</legend>
              <input type="text" class="user-name"id='address' placeholder="address" required>
			  <span class="e_address text-danger"></span>
              <legend>State</legend>
              <input type="text" class="user-name" id='state' placeholder="state" required>
			  <span class="e_state text-danger"></span>
              <legend>City</legend>
              <input type="text" class="user-name" id='city' placeholder="city" required>
			  <span class="e_city text-danger"></span>
              <legend>Pin Code </legend>
              <input type="text" class="user-name" id='pin_code' placeholder="pincode" required>
			  <span class="e_pin_code text-danger"></span>
              <legend>GST No </legend>
              <input type="text" class="user-name" id='gst_no' placeholder="gst no" required>
			  <span class="e_gst_no text-danger"></span>
              <legend>PAN Card </legend>
              <input type="text" class="user-name" id='pan_no' placeholder="pancard" required> 
			  <span class="e_pan_no text-danger"></span>
            </form>
          </div> 
        </div>
        <div class="form-step" index="3"> 
           <div class="form-input-2">
            <h1 class="title">Login Details</h1> 
            <form class="user-input">
              <legend>User Type</legend>
              <!-- <input type="text" class="user-name" id='' placeholder="e.g. Stephen King" required> -->
			  <select class="form-control user-name " id="user_type">
				<option value="">select</option>
				<option value="1">Bailer</option>
				<option value="2">End User</option>
				<option value="3">Paper Mill</option>
				<option value="4">Trader</option>
				<option value="5">Transporter</option>
			</select> 
			<span class="text-danger e_user_type"></span>
              <legend>Designation</legend>
              <input type="text" class="user-email" id='designation' placeholder="e.g. stephenking@lorem.com" required>
			  <span class="text-danger e_designation"></span>
              <legend>Password</legend>
              <input type="tel" class="user-email" id='password' placeholder="e.g. +1 234 567 890" name="phone" required>
			  <span class="text-danger e_password"></span>
              <legend>Confirm Password</legend>
              <input type="tel" class="user-email" id='cr_password' placeholder="e.g. +1 234 567 890" name="phone" required>
			  <span class="text-danger e_cr_password"></span>
            </form>
          </div> 
        </div> 
        <div class="form-step" index="4">
          <div class="thank">
            <img src="<?=base_url()?>/public/images/icon-thank-you.svg" style='width:20%' alt="thanks">
            <h1 class="thanksu">Registration Successful!</h1>
            <p>
			Thank you for joining Zeto. our account has been created successfully. You can now log in and explore our features. Welcome aboard! 
            </p>
          </div>
        </div>  
        <div class="buttons px-4 pt-3">
          <div class="d-flex align-items-center justify-content-between">
            <button class="go-back-button"> Go Back</button>
            <button class="next-step">Next Step</button>
          </div>
        </div>
		<div class="new-account mt-3 text-center">
			<p>Already have an account? <a class="text-primary" href="<?=base_url('reglogin')?>">Login</a></p>
		</div>
      </div>
    </div>
  </div> 	
</body>
<?php 
foreach ($javascript as $value)
{
	?>
<script type="text/javascript" src="<?=base_url($value)?>"></script>
<?php
}
?>
<script type="text/javascript" src="<?=base_url('/public/public/js/newRegister.js')?>"></script>
 
<script>
  $('#user_name').change(function(){
  let val = $('#user_name').val();
  // alert(val);
  $('.username').html(val)
})
</script>
</html>
