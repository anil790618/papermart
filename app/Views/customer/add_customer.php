<!DOCTYPE html>
<html lang="en" class="h-100">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Customer</title>
    <meta name="description" content="Some description for the page" />
    <link href="<?=base_url('/'.$style);?>" rel="stylesheet">
</head>

<body class="h-100">
    <div class="deznav-scroll">
    </div>
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <h4 class="text-center mb-4">Customer</h4>
                                    <form method="post" id="login_form" action="<?=base_url('customer');?>">
                                        <div class="mb-2">
                                            <label>Customer Name<span class="text-danger"> *</span></label>
                                            <input type="text" name="customer_name"
                                                value="<?=set_value('customer_name')?>" class="form-control">
                                        </div>
                                        <span class="text-danger "><?=$customer_name??''?></span>
                                        <div class="mb-2">
                                            <label>Payment For<span class="text-danger"> *</span></label>
                                            <input type="taxt" name="payment" value="<?=set_value('payment')?>" class="form-control">
                                            <span class="text-danger"><?=$payment??''?></span>
                                        </div>
                                        <div class="mb-2">
                                            <label>Environment IN<span class="text-danger"> *</span></label>
                                            <input type="text" name="environment_in" value="<?=set_value('environment_in')?>" class=" form-control">
                                            <span class="text-danger"><?=$environment_in??''?></span>
                                        </div>
                                        <div class="mb-2">
                                            <label>Environment Amount<span class="text-danger"> *</span></label>
                                            <input type="text" name="environment_amount" value="<?=set_value('environment_amount')?>" class="form-control">
                                            <span class="text-danger"><?=$environment_amount??''?></span>
                                        </div>
                                        <div class="mb-2">
                                            <label>Amount<span class="text-danger"> *</span></label>
                                            <input type="text" name="amount" value="<?=set_value('amount')?>" class="form-control">
                                            <span class="text-danger"><?=$amount??''?></span>
                                        </div>
                                        <div class="mb-2">
                                            <label>Comment<span class="text-danger"> *</span></label>
                                            <input type="text" name="comment" value="<?=set_value('comment')?>" class="form-control">
                                            <span class="text-danger"><?=$comment??''?></span>
                                        </div>
                                        <small class="text-danger"></small>
                                        <div class="mt-4">
                                            <button type="submit" name="regitser"
                                                class="btn btn-primary w-100">Submit</button>
                                        </div>
                                    </form>
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
<script>
$(function() {
    setTimeout(function() {
        $('#error').remove();
    }, 2000);
})
</script>

</html>