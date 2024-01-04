<div class="nav-header">
    <a href="#" class="brand-logo">
        <img class="logo-abbr " id="logo" src="<?= base_url(); ?>\public\public\images\fill-logo.png" alt="">

    </a>

    <div class="close-btn-sidebar">
        <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 96 960 960" width="20">
            <path d="m249 849-42-42 231-231-231-231 42-42 231 231 231-231 42 42-231 231 231 231-42 42-231-231-231 231Z" />
        </svg>
    </div>


<!-- <div class="resopon-show-pro">
        <ul>
            <li class="nav-item dropdown header-profile p-2 d-flex">
                <a class="nav-link p-1" href="#" role="button" data-toggle="dropdown">
                    <img src="<?= base_url(); ?>/public/public/images/profile/17.jpg" width="20" alt="" />
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="javascript:void(0)" class="dropdown-item ai-icon">
                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        <span class="ml-2">
                            <?php if ($user_type == '0') {
                                echo 'Admin';
                            } else if ($user_type == '1') {
                                echo 'Bailer';
                            } else if ($user_type == '2') {
                                echo 'End User';
                            } else if ($user_type == '3') {
                                echo 'Paper Mill';
                            } else if ($user_type == '4') {
                                echo 'Trader';
                            } else if ($user_type == '5') {
                                echo 'Transporter';
                            } else {
                                echo 'Guest User';
                            } ?>
                        </span>
                    </a>
                    <a href="javascript:void(0)" class="dropdown-item ai-icon nav-dashboard" tag="0">
                        <i class="fa fa-dashboard text-primary"></i>
                        <span class="ml-2">Main Dashboard</span>
                    </a>
                    <?php if ($user_type <= '4' or $user_type == 10) {  ?>
                         <?php if ($user_type != '4' ) {  ?>
                        <a href="javascript:void(0)" class="dropdown-item ai-icon nav-dashboard" tag="2">
                            <i class="fa fa-dashboard text-primary"></i>
                            <span class="ml-2">Buyer Dashboard</span>
                        </a>
                    <?php } ?>
                        <a href="javascript:void(0)" class="dropdown-item ai-icon nav-dashboard" tag="1">
                            <i class="fa fa-dashboard text-primary"></i>
                            <span class="ml-2">Seller Dashboard</span>
                        </a>
                    <?php } ?>
                    <a href="javascript:void(0)" class="dropdown-item ai-icon nav-profile">
                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        <span class="ml-2">Profile </span>
                    </a>

                    <a href="<?= base_url('logout'); ?>" class="dropdown-item ai-icon logout">
                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                            <polyline points="16 17 21 12 16 7"></polyline>
                            <line x1="21" y1="12" x2="9" y2="12"></line>
                        </svg>
                        <span class="ml-2">Logout </span>
                    </a>
                </div>
            </li>
            <li class="nav-item mt-1 profile-tags p-2 ">
                <span class="company-name">Bhanwati paper Pvt. Ltd.</span>
               
                <span class="text-primary d-none">
                    <?php if ($user_type == '0') {
                        echo 'Admin';
                    } else if ($user_type == '1') {
                        echo 'Bailer';
                    } else if ($user_type == '2') {
                        echo 'End User';
                    } else if ($user_type == '3') {
                        echo 'Paper Mill';
                    } else if ($user_type == '4') {
                        echo 'Trader';
                    } else if ($user_type == '5') {
                        echo 'Transporter';
                    } else if ($user_type == '10') {
                        echo 'Guest User';
                    } ?>
                </span>
                <?php if ($user_type <= '4' or $user_type == 10) {  ?>
                    <span class="resnavbar switch-tabs">
                        <a href="javascript:void(0);" class=" size-5 nav-dashboard p-0 " tag="<?php if ($dashboard_type == 2) {
                                                                                                    echo 1;
                                                                                                } else {
                                                                                                    echo 2;
                                                                                                } ?>">Switch to <?php if ($dashboard_type == 2) {
                                                                                                                    echo ' Seller';
                                                                                                                } else {
                                                                                                                    echo ' Buyer';
                                                                                                                } ?> Dashboard
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M15.125 21.1L6.7 12.7q-.15-.15-.213-.325T6.425 12q0-.2.062-.375T6.7 11.3l8.425-8.425q.35-.35.875-.35t.9.375q.375.375.375.875t-.375.875L9.55 12l7.35 7.35q.35.35.35.863t-.375.887q-.375.375-.875.375t-.875-.375Z" />
                            </svg>
                        </a>
                    </span>
                <?php } ?>
            </li>
        </ul>
    </div> -->
</div>

<div class="header">
    <div class="header-content">
        <div class="empity-div"></div>
        <nav class="navbar navbar-expand">
            <div class="collapse navbar-collapse justify-content-between posdiv">
                <div class="header-left">
                    <div class="dashboard_bar"></div>
                </div>
                <div class="open-menu">
                    <svg xmlns="http://www.w3.org/2000/svg" height="28" viewBox="0 96 960 960" width="28">
                        <path d="M120 816v-60h720v60H120Zm0-210v-60h720v60H120Zm0-210v-60h720v60H120Z" />
                    </svg>
                </div>
                <div class="logo-gra">
                    <img src="<?= base_url(); ?>\public\public\images\logo-white.png" alt="logo">
                </div>
                <div class="dropdown main-nav-div">

                    <div class="two-ul">
                        <ul class="navbar-nav header-left protrafli">
                            <li class="nav-item pro-down dropdown  header-profile">
                                <button class=" dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="invt-svg">
                                        <!-- <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 96 960 960" width="20">
                                            <path d="M120 914V422q-14-2-27-20t-13-39V236q0-23 18-41.5t42-18.5h680q23 0 41.5 18.5T880 236v127q0 21-13 39t-27 20v492q0 23-18.5 42.5T780 976H180q-24 0-42-19.5T120 914Zm60-491v493h600V423H180Zm640-60V236H140v127h680ZM360 633h240v-60H360v60ZM180 916V423v493Z" />
                                        </svg> -->
                                        <img src="<?= base_url(); ?>\public\public\images\category.png" alt="logo">
                                    </span>
                                    <span class="pro-txt">
                                        Products
                                    </span>
                                    <span class="arrow-down">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24">
                                            <path fill="currentColor" d="M15.125 21.1L6.7 12.7q-.15-.15-.213-.325T6.425 12q0-.2.062-.375T6.7 11.3l8.425-8.425q.35-.35.875-.35t.9.375q.375.375.375.875t-.375.875L9.55 12l7.35 7.35q.35.35.35.863t-.375.887q-.375.375-.875.375t-.875-.375Z" />
                                        </svg>
                                    </span>
                                </button>
                                <div class="dropdown-menu dropproduct">
                                    <div class="row">
                                        <?php
                                        if(!empty($productcategory)){
                                            if ($productcategory) {
                                                $i = 1;
                                                foreach ($productcategory as $value) {

                                            ?>
                                       
                                                <div class="col-sm-6 col-md-6 col-lg-4 productcat" tag="<?= $value['id'] ?>">
                                                    <div class="drop-con">
                                                        <div class="drop-icon-div">
                                                            <img src="<?= base_url(); ?>\public\public\images\note.png" alt="notification" />
                                                        </div>
                                                        <div class="drop-list-txt">
                                                            <p class="drop-hewad">
                                                               <?= $value['product_category']; ?>
                                                            </p>
                                                            <p class="drop-subhead">
                                                                <?= $value['product_description']; ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                                $i++;
                                            }
                                        } 
                                        }?>
                                        <!-- <div class="col-sm-6 col-md-6 col-lg-4">
                                            <div class="drop-con">
                                                <div class="drop-icon-div">
                                                    <img src="<?= base_url(); ?>\public\public\images\note.png" alt="notification" />
                                                </div>
                                                <div class="drop-list-txt">
                                                    <p class="drop-hewad">
                                                        Paper for food packaging
                                                    </p>
                                                    <p class="drop-subhead">
                                                        It is a long established fact
                                                        that a reader will be
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-4">
                                            <div class="drop-con">
                                                <div class="drop-icon-div cycle-img-drop">
                                                    <img src="<?= base_url(); ?>\public\public\images\cycle.png" alt="notification" />
                                                </div>
                                                <div class="drop-list-txt">
                                                    <p class="drop-hewad">
                                                        Newsprint paper
                                                    </p>
                                                    <p class="drop-subhead">
                                                        It is a long established fact
                                                        that a reader will be
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-4">
                                            <div class="drop-con">
                                                <div class="drop-icon-div">
                                                    <img src="<?= base_url(); ?>\public\public\images\note.png" alt="notification" />
                                                </div>
                                                <div class="drop-list-txt">
                                                    <p class="drop-hewad">
                                                        Speciality papers
                                                    </p>
                                                    <p class="drop-subhead">
                                                        It is a long established fact
                                                        that a reader will be
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-4">
                                            <div class="drop-con">
                                                <div class="drop-icon-div">
                                                    <img src="<?= base_url(); ?>\public\public\images\note.png" alt="notification" />
                                                </div>
                                                <div class="drop-list-txt">
                                                    <p class="drop-hewad">
                                                        Coated Papers
                                                    </p>
                                                    <p class="drop-subhead">
                                                        It is a long established fact
                                                        that a reader will be
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-4">
                                            <div class="drop-con">
                                                <div class="drop-icon-div">
                                                    <img src="<?= base_url(); ?>\public\public\images\note.png" alt="notification" />
                                                </div>
                                                <div class="drop-list-txt">
                                                    <p class="drop-hewad">
                                                        Packaging Board
                                                    </p>
                                                    <p class="drop-subhead">
                                                        It is a long established fact
                                                        that a reader will be
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-4">
                                            <div class="drop-con">
                                                <div class="drop-icon-div">
                                                    <img src="<?= base_url(); ?>\public\public\images\note.png" alt="notification" />
                                                </div>
                                                <div class="drop-list-txt">
                                                    <p class="drop-hewad">
                                                        Writing and printing paper
                                                    </p>
                                                    <p class="drop-subhead">
                                                        It is a long established fact
                                                        that a reader will be
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-4">
                                            <div class="drop-con">
                                                <div class="drop-icon-div">
                                                    <img src="<?= base_url(); ?>\public\public\images\note.png" alt="notification" />
                                                </div>
                                                <div class="drop-list-txt">
                                                    <p class="drop-hewad">
                                                        Kraft Paper
                                                    </p>
                                                    <p class="drop-subhead">
                                                        It is a long established fact
                                                        that a reader will be
                                                    </p>
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="col-sm-6 col-md-6 col-lg-4">
                                            <div class="drop-con">
                                                <div class="drop-icon-div">
                                                    <img src="<?= base_url(); ?>\public\public\images\note.png" alt="notification" />
                                                </div>
                                                <div class="drop-list-txt">
                                                    <p class="drop-hewad">
                                                        Waste Paper
                                                    </p>
                                                    <p class="drop-subhead">
                                                        It is a long established fact
                                                        that a reader will be
                                                    </p>
                                                </div>
                                            </div>
                                        </div>-->
                                    </div>
                                    <!-- <ul>
                                        <li><a class="dropdown-item" href="#">Paper for food packaging</a></li>
                                        <li><a class="dropdown-item" href="#">Newsprint </a></li>
                                        <li><a class="dropdown-item" href="#">Speciality papers</a></li>
                                        <li><a class="dropdown-item" href="#">Coated Papers</a></li>
                                        <li><a class="dropdown-item" href="#">Packaging Board</a></li>
                                        <li><a class="dropdown-item" href="#">Writing and printing paper </a></li>
                                        <li><a class="dropdown-item" href="#">Kraft Paper</a></li>
                                        <li><a class="dropdown-item" href="#">Waste Paper</a></li>
                                    </ul> -->
                                </div>
                            </li>

                            <li class="nav-item reslocation text-primary <?php if ($dashboard_type == 2) {
                                                                                echo ' nav-purchase';
                                                                            } else {
                                                                                echo ' nav-sale';
                                                                            } ?> header-profile p-2" style="font-size:35px">
                                <div class="track-order-div">
                                    <img src="<?= base_url(); ?>\public\public\images\location_searching.png" alt="notification" />
                                    <span>Track Order</span>
                                </div>
                            </li>

                            <li class="filter-link ml-4">
                                <div class="fliter-sidebar">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 96 960 960" width="20">
                                        <path d="M440 896q-17 0-28.5-11.5T400 856V616L161 311q-14-17-4-36t31-19h584q21 0 31 19t-4 36L560 616v240q0 17-11.5 28.5T520 896h-80Zm40-276 240-304H240l240 304Zm0 0Z" />
                                    </svg>
                                    <span>filter</span>
                                </div>
                            </li>
                        </ul>

                        <ul class="navbar-nav header-right">
                            <li class="notification-icon dropdown">
                                <div class="notibell dropdown-toggle" type="button" id="notification-aria" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="noto-signal"></div>
                                    <img src="<?= base_url(); ?>\public\public\images\notifications_active.png" alt="notification" />
                                </div>
                                <div class="dropdown-menu notidrop" aria-labelledby="notification-aria">
                                    <div class="noti-main-div">
                                       <!--  <div class="noti-message">
                                            <div class="noti-me-icon">
                                                <img src="<?= base_url(); ?>\public\public\images\admin.png" alt="notification" />
                                            </div>
                                            <div class="noti-me-con">
                                                <p class="noti-head">Complete Profile Registration</p>
                                                <p class="not-tag">ADMIN</p>
                                                <p class="noti-time">08:25pm</p>
                                            </div>
                                        </div> -->
                                       
                                 
                                    <?php
                                        if ($notification) 
                                        {   $i=1;
                                        //    if(($user_type==0) ){
                                            foreach ($notification as $value)  
                                            { 
                                                    
                                                ?>
                                                <a href="<?=base_url()?>/<?=$value['url']?>">
                                                    <div class="noti-message">
                                                        <div class="noti-me-icon">
                                                            <img src="<?= base_url(); ?>\public\public\images\work.png" alt="notification" />
                                                        </div>
                                                        <div class="noti-me-con">
                                                            <p class="noti-head"><?=$value['title']?></p>
                                                            <!-- <p class="noti-head"><?=$user_type?></p> -->
                                                            <p class="notimessage"><?=$value['description']?></p>
                                                            <p class="noti-time"><?=date('H:i:s', strtotime($value['added_date']));?></p>
                                                            <div class="right-click">
                                                                <img src="<?= base_url(); ?>\public\public\images\right-click.png" alt="notification" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                        <?php
                            
                                            }
                                    //    }
                                           
                                        }
                                        ?>
                                       <!--  <div class="noti-message">
                                            <div class="noti-me-icon">
                                                <img src="<?= base_url(); ?>\public\public\images\payment.png" alt="notification" />
                                            </div>
                                            <div class="noti-me-con">
                                                <p class="noti-head">Complete Profile Registration</p>
                                                <p class="notimessage">Customer : We have received the order thanks</p>
                                                <p class="noti-time">08:25pm</p>
                                                <div class="right-click">
                                                    <img src="<?= base_url(); ?>\public\public\images\right-click.png" alt="notification" />
                                                </div>
                                            </div>
                                        </div> -->
                                        <!-- <div class="noti-message">
                                            <div class="noti-me-icon">
                                                <img src="<?= base_url(); ?>\public\public\images\steve-parker.png" alt="notification" />
                                            </div>
                                            <div class="noti-me-con">
                                                <p class="steve-para"><span>Steve O’ Parker</span> Shown interest over the listing of <span>50kg waste paper</span> </p>
                                                <p class="noti-time">08:25pm</p>

                                            </div>
                                        </div> -->
                                       <!--  <div class="noti-message">
                                            <div class="noti-me-icon">
                                                <img src="<?= base_url(); ?>\public\public\images\work.png" alt="notification" />
                                            </div>
                                            <div class="noti-me-con">
                                                <p class="noti-head">Complete Profile Registration</p>
                                                <p class="notimessage">Customer : We have received the order thanks</p>
                                                <p class="noti-time">08:25pm</p>
                                                <div class="right-click">
                                                    <img src="<?= base_url(); ?>\public\public\images\right-click.png" alt="notification" />
                                                </div>
                                            </div>
                                        </div> -->
                                        <!--<div class="noti-message">
                                             <div class="noti-me-icon">
                                                <img src="<?= base_url(); ?>\public\public\images\payment.png" alt="notification" />
                                            </div>
                                            <div class="noti-me-con">
                                                <p class="noti-head">Complete Profile Registration</p>
                                                <p class="notimessage">Customer : We have received the order thanks</p>
                                                <p class="noti-time">08:25pm</p>
                                                <div class="right-click">
                                                    <img src="<?= base_url(); ?>\public\public\images\right-click.png" alt="notification" />
                                                </div>
                                            </div>
                                        </div> -->
                                        <!-- <div class="noti-message">
                                            <div class="noti-me-icon">
                                                <img src="<?= base_url(); ?>\public\public\images\steve-parker.png" alt="notification" />
                                            </div>
                                            <div class="noti-me-con">
                                                <p class="steve-para"><span>Steve O’ Parker</span> Shown interest over the listing of <span>50kg waste paper</span> </p>
                                                <p class="noti-time">08:25pm</p>

                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item dropdown header-profile p-2 respon-sm-none">
                                <a class="nav-link p-1" href="#" role="button" data-toggle="dropdown">
                                    <img src="<?= base_url(); ?>/public/public/images/profile/17.jpg" width="20" alt="" />
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="javascript:void(0)" class="dropdown-item ai-icon">
                                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>
                                        <span class="ml-2">
                                            <?php if ($user_type == '0') {
                                                echo 'Admin';
                                            } else if ($user_type == '1') {
                                                echo 'Bailer';
                                            } else if ($user_type == '2') {
                                                echo 'End User';
                                            } else if ($user_type == '3') {
                                                echo 'Paper Mill';
                                            } else if ($user_type == '4') {
                                                echo 'Trader';
                                            } else if ($user_type == '5') {
                                                echo 'Transporter';
                                            } else {
                                                echo 'Guest User';
                                            } ?>
                                        </span>
                                    </a>
                                    <a href="javascript:void(0)" class="dropdown-item ai-icon nav-dashboard" tag="0">
                                        <i class="fa fa-dashboard text-primary"></i>
                                        <span class="ml-2">Main Dashboard</span>
                                    </a>
                                    <?php if (( $user_type <= '4' or $user_type == 10) and $user_type != 0 and $appproved == 1) {  ?>
                                        <?php if ($user_type != '4' ) {  ?>
                                            <a href="javascript:void(0)" class="dropdown-item ai-icon nav-dashboard" tag="2">
                                                <i class="fa fa-dashboard text-primary"></i>
                                                <span class="ml-2">Buyer Dashboard</span>
                                            </a>
                                        <?php } ?>
                                        <a href="javascript:void(0)" class="dropdown-item ai-icon nav-dashboard" tag="1">
                                            <i class="fa fa-dashboard text-primary"></i>
                                            <span class="ml-2">Seller Dashboard</span>
                                        </a>
                                    <?php } ?>
                                    <a href="javascript:void(0)" class="dropdown-item ai-icon nav-profile">
                                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>
                                        <span class="ml-2">Profile </span>
                                    </a>

                                    <a href="<?= base_url('logout'); ?>" class="dropdown-item ai-icon logout">
                                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                            <polyline points="16 17 21 12 16 7"></polyline>
                                            <line x1="21" y1="12" x2="9" y2="12"></line>
                                        </svg>
                                        <span class="ml-2">Logout </span>
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item mt-1 profile-tags p-2 respon-sm-none">
                                <span class="company-name"><?= $memberDetail['company_name']??'' ?></span>
                                <!-- I ADD CLASS D-NONE FOR HIDE THIS SPAN -->
                                <span class="text-primary d-none">
                                    <?php if ($user_type == '0') {
                                        echo 'Admin';
                                    } else if ($user_type == '1') {
                                        echo 'Bailer';
                                    } else if ($user_type == '2') {
                                        echo 'End User';
                                    } else if ($user_type == '3') {
                                        echo 'Paper Mill';
                                    } else if ($user_type == '4') {
                                        echo 'Trader';
                                    } else if ($user_type == '5') {
                                        echo 'Transporter';
                                    } else if ($user_type == '10') {
                                        echo 'Guest User';
                                    } ?>
                                </span>
                                <?php if ($user_type <= '4' or $user_type == 10) {  ?>
                                    <span class="resnavbar switch-tabs">
                                        <a href="javascript:void(0);" class=" size-5 p-0 "> <?php if ($dashboard_type == 2) {
                                                                                                echo ' Buyer';
                                                                                            } elseif ($dashboard_type == 1) {
                                                                                                echo 'Seller ';
                                                                                            } else {
                                                                                                echo 'Main';
                                                                                            } ?> Dashboard

                                        </a>
                                    </span>
                                <?php } ?>
                            </li>
                        </ul>
                        <div id="google_element"></div>
                    </div>

                </div>
        </nav>
    </div>
</div>

 