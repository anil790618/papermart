<!DOCTYPE html>
<html lang="en">

<head>
   <!-- HEADER START-->
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$title?></title> 
    <style>
        @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css");
    #langselector1> .btn{
        display: none !important;
    }
    #google_element{
  /* border: 2px solid red !important; */
    overflow: hidden !important;
    height: 60px !important;
} 
.goog-te-combo{
  display: flex !important;
    flex-direction: column !important;
    font-size: 16px !important;
}
.goog-te-combo>.btn{
    padding:0 !important;
    height:25px !important;
    overflow:hidden !important;
}
.VIpgJd-ZVi9od-ORHb-OEVmcd{
    display: none !important;
}
.producttype_tbale{
    overflow-x:auto;
}
<?php if ($user_type == 0) { ?>
    .content-body {
    margin-left: 16.563rem;
    z-index: 0;
    margin-top: -69px !important;
    transition: all .2s ease;
}
.deznav {
    width: 16.563rem;
    padding-bottom: 0;
    height: 100vh;
    position: fixed;
    top: 0;
    padding-top:0px !important;
    z-index: 3;
    background-color: #FBFBFB;
    transition: all .2s ease;
    box-shadow: 18px 0px 35px 0px rgba(0, 0, 0, 0.02);
}
    <?php
}?>

</style>
    <?php
    foreach ($style as $val)
    {
        ?>
        <link rel="stylesheet" type="text/css" href="<?=base_url('/'.$val)?>">
        <?php
    }
    ?>
    <script type="text/javascript"> base_url="<?=base_url();?>/"; </script>
 <!-- HEADER END-->
</head>

<body>
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <div id="main-wrapper">