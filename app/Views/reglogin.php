<!DOCTYPE html>
<html lang="en" class="h-100">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Login</title>
    <meta name="description" content="Some description for the page" />
    <link href="<?= base_url('/' . $style); ?>" rel="stylesheet">
</head>

<body class="h-100">
    <div class="deznav-scroll">
    </div>
    <div class="authincation h-100 login-background">
        <div class="logincontainer h-100">
            <div class="row  h-100 align-items-center">
                <div class="">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="loginandlodin">


                                    <div class="auth-form">
                                        <a href="#" class="brand-logo ">
                                            <img class="logo-abbr " id="logo" src="<?= base_url(); ?>/public/public/images/Medium.png" alt="" width=30%>

                                        </a>
                                        <h4 class="ml-1 mb-4" style="margin-top:70px;">Login</h4>
                                        <?php $session = session();
                                        $error = $session->getTempdata('error');
                                        if ($error != null) { ?>
                                            <p id="error" class="alert-danger text-center"><?= $error; ?></p>
                                        <?php    }
                                        ?>
                                        <form method="post" action="<?= base_url('reglogin'); ?>">
                                            <div class="mb-2">
                                                <!--  <label>Email<span class="text-danger"> *</span></label> -->
                                                <input type="email" name="email" value="<?= set_value('email') ?>" class="form-control login-input" placeholder="Email">
                                            </div>
                                            <span class="text-danger "><?= $email ?? ''; ?></span>
                                            <div class="mb-2">
                                                <!--  <label>Password<span class="text-danger"> *</span></label> -->
                                                <input type="password" name="password" value="<?= set_value('password') ?>" class="form-control login-input" placeholder="Password">
                                            </div>
                                            <span class="text-danger"><?= $password ?? ''; ?></span>
                                            <div class="mt-4">
                                                <button type="submit" name="regitser" class="btn btn-login w-100">Let's Go <i class="fa fa-long-arrow-right"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="auth-formfooter">
                                        <div class="new-account text-center">
                                            <p>New User, Register With Phone number? <a class="text-primary" href="<?= base_url('login') ?>">Sign up</a></p>
                                            <!--  <p>Don't have an account? <a class="text-primary" href="<?= base_url('register') ?>">Sign up</a></p> -->
                                        </div>
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
foreach ($javascript as $value) {
?>
    <script type="text/javascript" src="<?= base_url($value) ?>"></script>
<?php
}
?>

</html>