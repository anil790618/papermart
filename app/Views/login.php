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
    <link href="<?= base_url('/' . $style); ?>" rel="stylesheet">

    <link href="<?= base_url(
        "public/public/css/newRegisterstyle.css"
    ) ?>" rel="stylesheet">
    <script type="text/javascript"> base_url = "<?= base_url() ?>/"; </script>
<style>
    .main-form{
        /* border: 1px solid red; */
        align-items: center;
        justify-content: center;
    }
    .loginlogo{
        vertical-align: middle;
        border-style: none;
        width: 250px;
        position: absolute;
        top: 23px;
        right: 16px;
    }
</style>
</head>

<body>
    <div class="deznav-scroll">
    </div>

    <?php $imgurl = base_url() . "/public/public/images/Rectangle.png"; ?>
    <div class="container-fluid mainsection d-flex align-items-center justify-content-center "
        style='background-image:url(<?= $imgurl ?>)'>
        <div class="main col-md-8  row ">
            <div class="sidebar col-md-4 py-3 "
                style="background-image:url(<?= base_url() ?>/public/images/bg-sidebar-desktop.svg)"> 
            </div>
            <div class="main-form col-md-8 p-2  ">
            <a href="#" class="brand-logo ">
                                        <img class="logo-abbr  loginlogo" id="logo" src="<?=base_url();?>/public/public/images/Medium.png" alt="" width=30%>
                                       
                                    </a>
                <div class="form-step ">
                <?php $session = session();
                                        $error = $session->getTempdata('error');
                                        if ($error != null) { ?>
                                            <p id="error" class="alert-danger text-center"><?= $error; ?></p>
                                        <?php    }
                                        ?>
                    <form class="user-input  " method='post' action="<?= base_url('reglogin'); ?>">
                        <div class="form-input-1">
                            <h1 class="title">Login </h1>  
                            <div>
                                <legend>Email Address</legend>
                                <input type="email" class="user-email wizard-required" name='email' id='email'
                                value="<?= set_value('email') ?>">
                                <div class="wizard-form-error"></div>
                                <span class="text-danger "><?= $email ?? ''; ?></span>
                            </div>   
                            <div>
                                <legend>Password</legend>
                                <input type="password" class="user-company wizard-required" id="password"
                                    name="password" value="<?= set_value('password') ?>">
                                <div class="wizard-form-error"></div>
                                <span class="text-danger"><?= $password ?? ''; ?></span>
                            </div> 
                            <div class="buttons  pt-3">
                            <div class="d-flex align-items-center justify-content-between"> 
                                <button type='submit'  name='regitser'  class="next-step">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
          
          
            <div class="new-account mt-3 text-center">
                <p>Don't have an account?  <a class="text-primary" href="<?=base_url('register')?>">Sign up</a></p>
            </div>
        </div>
    </div>
    </div>
</body>
<?php foreach ($javascript as $value) { ?>
<script type="text/javascript" src="<?= base_url($value) ?>"></script>
<?php } ?>
<script type="text/javascript" src="<?= base_url(
    "/public/public/js/newRegister.js"
) ?>"></script>

<script>
    $('#user_name').change(function () {
        let val = $('#user_name').val();
        // alert(val);
        $('.username').html(val)
    })
</script>

</html>