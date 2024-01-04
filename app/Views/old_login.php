<!DOCTYPE html>
<html lang="en" class="h-100">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Login</title>
    <meta name="description" content="Some description for the page" />
   <?php foreach ($style as $val ) :?>
        <link href="<?=base_url('/'.$val);?>" rel="stylesheet">
    <?php endforeach ?>
     <script type="text/javascript"> base_url="<?=base_url();?>/"; </script>
</head>

<body class="h-100">
    <div class="deznav-scroll">
    </div>
    <div class="authincation h-100 login-background" >

        <div class="logincontainer h-100 ">
            <div class="row  h-100 align-items-center">
                <div class=" ">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-md-12">
                                <div class="auth-form">
                                     <a href="#" class="brand-logo ">
                                        <img class="logo-abbr " id="logo" src="<?=base_url();?>/public/public/images/Medium.png" alt="" width=30%>
                                       
                                    </a>
                                    <b><h5 class=" mb-4" style="margin-top:70px; font-weight: 900;">Register</h5></b>
                                   
                                        <div class="mb-2">
                                           <!--  <label>Mobile Number<span class="text-danger"> *</span></label> -->
                                            <input type="text" name="phone_number" id="phone_number" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"  value="<?=set_value('phone_number')?>" class="form-control login-input" placeholder="Mobile Number">
                                        </div>
                                        <span class="text-danger e_pno"></span>
                                        <div class="mb-2 otpblock" style="display: none;">
                                            <label>OTP<span class="text-danger"> *</span> 
                                        <span class="text-success s_pno"></span></label>
                                            <input type="number" name="otp" id="otp" value="<?=set_value('otp')?>" class="form-control login-input">
                                        </div>
                                        <span class="text-danger e_otp" ></span>
                                        <div class="mt-4 otpsendblock" style="">
                                            <button type="submit" id="phoneregitser"
                                                class="btn btn-login w-100">Send OTP <i class="fa fa-long-arrow-right"></i></button>
                                        </div>
                                        <div class="mt-4 submitbuttonblock"  style="display: none;">
                                            <button type="submit" id="submitlogin"
                                                class="btn btn-login w-100">Let's Go <i class="fa fa-long-arrow-right"></i></button>
                                        </div></div>
                                      <div class="auth-formfooter">   
                                    <div class="new-account text-center">
                                        <p class="mb-0">Already a user? <a class="text-primary" href="<?=base_url('reglogin')?>">Login Now</a></p>
                                        <p class="mb-0">Don't have an account? <a class="text-primary" href="<?=base_url('register')?>">Sign up</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
</html>