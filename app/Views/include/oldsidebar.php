            <?php if($user_type <=4){ ?>
            <li >
                <a class=" ai-icon nav-dashboard " href="javascript:void(0)" aria-expanded="true">
                    <i class="fa fa-dashboard"></i>
                    <span class="nav-text"><?php if($dashboard_type == 2){ echo ' Buyer'; } else { echo ' Seller'; }?> Dashboard </span>
                </a>
            </li>
            <!--  <li >
                <a href="javascript:void(0);" class="size-5 nav-dashboard p-0 ml-4" tag="<?php if($dashboard_type == 2){ echo 1; } else { echo 2 ; }?>"> Switch to <?php if($dashboard_type == 2){ echo ' Seller'; } else { echo ' Buyer'; }?> Dashboard</a>
               
            </li> -->
             <?php if($user_type == 0){ ?>
             <li ><a class=" ai-icon nav-customer" href="javascript:void(0)" aria-expanded="false">
                    <i class="flaticon-381-network"></i>
                    <span class="nav-text">Customer</span>
                </a>
            </li>
            <?php } ?>
            <?php if($appproved == 1 ){ ?> 
             <li class="ddmenu">
                <a class="has-arrow ai-icon " href="javascript:void(0)">
                    <i class="flaticon-381-controls-3"></i>
                    <span class="nav-text">Product</span>
                </a>
                <ul>
                    <li><a href="javascript:void(0);" class="nav-product">Products</a></li>

                     <!-- <li><a href="javascript:void(0);" class="nav-stock">Product Stock</a></li> -->

                    <li><a href="javascript:void(0);" class="nav-product-category">Product Category</a></li>
                   
                    <li><a href="javascript:void(0);" class="nav-product-type">Product Type</a></li>

                    <li><a href="javascript:void(0);" class="nav-product-quality">Product Quality</a></li>
                    <li><a class="nav-stock" href="javascript:void(0)"> Stock  </a>  </li>
                </ul>
            </li>
            
            <li class="ddmenu"> <a class="has-arrow ai-icon " href="javascript:void(0)"> <i class="fa fa-shopping-cart"></i>   <span class="nav-text">Market</span> </a>
                <ul>
                    <?php if($user_type != 0 ){ ?>
                        <li ><a class=" nav-list" href="javascript:void(0)"><?php if($dashboard_type == 2){ echo 'My Requirement'; } else { echo 'My Listing'; }?>  </a> </li>
                    <?php } ?>

                    <?php if($user_type >= 3 ){ ?>
                        <li ><a class=" nav-rates" href="javascript:void(0)" >  Post Rates   </a>  </li>
                    <?php } ?>

                    <li ><a class="nav-userlist" href="javascript:void(0)" ><?php if($dashboard_type == 2){ echo 'Posted Listing '; } else { echo 'Posted Requirement'; }?></a></li>

                    <li ><a class="nav-postedrates" href="javascript:void(0)">Posted Rates</a> </li>

                    <?php if($user_type == 2 OR  $user_type == 1){ ?>
                        <li ><a class=" ai-icon nav-rates" href="javascript:void(0)">Offer Prime Rates</a></li>
                    <?php } ?>
                </ul>
            </li>
            
            <li ><a class=" ai-icon nav-vehicle" href="javascript:void(0)" aria-expanded="false">
                    <i class="fa fa-truck"></i>
                    <span class="nav-text">Vehicle</span>
                </a>
            </li>
           
           
            <?php } else { ?>
             <li ><a class=" ai-icon nav-workprofile" href="javascript:void(0)" aria-expanded="false">
                  <i class="fa fa-user"></i>
                    <span class="nav-text">Complete Work Profile</span>
                </a>
            </li>
             <?php }?>

             <li class="ddmenu">
                <a class="has-arrow ai-icon " href="javascript:void(0)" aria-expanded="false">
                  <i class="fa fa-tasks"></i>
                    <span class="nav-text">Book Keeping</span>
                </a>
                 <ul>
                   
                    <li ><a class="nav-purchase" href="javascript:void(0)" > Purchase </a> </li>
                    <li ><a class="nav-sale" href="javascript:void(0)" > Sale </a> </li>
                    <li ><a class="nav-vendor" href="javascript:void(0)" > Vendor </a> </li>
                </ul>
            </li>
            
            <li ><div class="border-bottom pt-2 mb-2"></div>
            
             
            <?php if($user_type == 2 OR  $user_type == 0){ ?>
            <li ><a class=" ai-icon nav-labservice" href="javascript:void(0)" aria-expanded="false">
                    <i class="fa fa-flask"></i>
                    <span class="nav-text">Lab Services</span>
                </a>    
            </li>
        <?php } ?>

             <li ><a class=" ai-icon " href="javascript:void(0)" aria-expanded="false">
                   <i class="fa fa-book"></i>
                    <span class="nav-text">Inventory</span>
                </a>
            </li>
            <li ><a class=" ai-icon nav-rating" href="javascript:void(0)" aria-expanded="false">
                   <i class="fa fa-address-book" aria-hidden="true"></i>
                    <span class="nav-text">Review Rating</span>
                </a>
            </li>
           
        <?php } else if($user_type == '5'){ 
            if( $appproved == '1' ){ ?> 
             <li ><a class=" ai-icon nav-orderbooklist" href="javascript:void(0)" aria-expanded="false">
                   <i class="fa fa-list" aria-hidden="true"></i>
                    <span class="nav-text">Booking Available</span>
                </a>
            </li>
            <li ><a class=" ai-icon nav-vehicle" href="javascript:void(0)" aria-expanded="false">
                    <i class="flaticon-381-archive"></i>
                    <span class="nav-text">Vehicle</span>
                </a>
            </li>
           
        <?php } else { ?> 
        <li ><a class=" ai-icon nav-workprofile" href="javascript:void(0)" aria-expanded="false">
                  <i class="fa fa-user"></i>
                    <span class="nav-text">Complete Work Profile</span>
                </a>
            </li>
        <?php } } ?>
            <li ><a class=" ai-icon " href="javascript:void(0)" aria-expanded="false">
                    <i class="flaticon-381-archive"></i>
                    <span class="nav-text">Generate Eway</span>
                </a>
            </li>
            <li ><a class=" ai-icon " href="javascript:void(0)" aria-expanded="false">
                    <i class="flaticon-381-archive"></i>
                    <span class="nav-text">Alerts</span>
                </a>
            </li>
            <li ><div class="border-bottom pt-2 mb-2"></div>
                 <li ><a class=" ai-icon " href="javascript:void(0)" aria-expanded="false">
                    <i class="fa fa-newspaper-o"></i>
                    <span class="nav-text">Market News</span>
                </a>
            </li>
            <li ><a class=" ai-icon nav-job" href="javascript:void(0)" aria-expanded="false">
                    <i class="fa fa-users"></i>
                    <span class="nav-text">Job Post</span>
                </a>
            </li>
            <li ><a class=" ai-icon " href="javascript:void(0)" aria-expanded="false">
                    <i class="flaticon-381-archive"></i>
                    <span class="nav-text">Credit Q</span>
                </a>
            </li>
            <li ><div class="border-bottom pt-2 mb-2"></div>
            </li>
             <li ><a class=" ai-icon " href="javascript:void(0)" aria-expanded="false">
                   <i class="fa fa-comments" aria-hidden="true"></i>
                    <span class="nav-text">Complaints</span>
                </a>
            </li>
            <li ><a class=" ai-icon nav-about" href="javascript:void(0)" aria-expanded="false">
                   <i class="fa fa-id-card"></i>
                    <span class="nav-text">About US</span>
                </a>
            </li>
            <li ><a class=" ai-icon nav-contact" href="javascript:void(0)" aria-expanded="false">
                   <i class="fa fa-address-book" aria-hidden="true"></i>
                    <span class="nav-text">Contact US</span>
                </a>
            </li>
            <li ><div class="border-bottom pt-2 mb-2"></div>





































                 <?php if($user_type <=4){ ?>
            <li >
                <a class=" ai-icon nav-dashboard " href="javascript:void(0)" aria-expanded="true">
                    <i class="fa fa-dashboard"></i>
                    <span class="nav-text"><?php if($dashboard_type == 2){ echo ' Buyer'; } else { echo ' Seller'; }?> Dashboard </span>
                </a>
            </li>
            <!--  <li >
                <a href="javascript:void(0);" class="size-5 nav-dashboard p-0 ml-4" tag="<?php if($dashboard_type == 2){ echo 1; } else { echo 2 ; }?>"> Switch to <?php if($dashboard_type == 2){ echo ' Seller'; } else { echo ' Buyer'; }?> Dashboard</a>
               
            </li> -->
             <?php if($user_type == 0){ ?>
             <li ><a class=" ai-icon nav-customer" href="javascript:void(0)" aria-expanded="false">
                    <i class="flaticon-381-network"></i>
                    <span class="nav-text">Customer</span>
                </a>
            </li>
            <?php } ?>
            <?php if($appproved == 1 ){ ?>
             <li class="ddmenu">
                <a class="has-arrow ai-icon " href="javascript:void(0)">
                    <i class="flaticon-381-controls-3"></i>
                    <span class="nav-text">Product</span>
                </a>
                <ul>
                    <li><a href="javascript:void(0);" class="nav-product">Products</a></li>

                     <!-- <li><a href="javascript:void(0);" class="nav-stock">Product Stock</a></li> -->

                    <li><a href="javascript:void(0);" class="nav-product-category">Product Category</a></li>
                   
                    <li><a href="javascript:void(0);" class="nav-product-type">Product Type</a></li>

                    <li><a href="javascript:void(0);" class="nav-product-quality">Product Quality</a></li>
                    <li><a class="nav-stock" href="javascript:void(0)"> Stock  </a>  </li>
                </ul>
            </li>
           
             
            
             
          
            
            <li class="ddmenu"> <a class="has-arrow ai-icon " href="javascript:void(0)"> <i class="fa fa-shopping-cart"></i>   <span class="nav-text">Market</span> </a>
                <ul>
                    <?php if($user_type != 0 ){ ?>
                        <li ><a class=" nav-list" href="javascript:void(0)"><?php if($dashboard_type == 2){ echo 'My Requirement'; } else { echo 'My Listing'; }?>  </a> </li>
                    <?php } ?>

                    <?php if($user_type >= 3 ){ ?>
                        <li ><a class=" nav-rates" href="javascript:void(0)" >  Post Rates   </a>  </li>
                    <?php } ?>

                    <li ><a class="nav-userlist" href="javascript:void(0)" ><?php if($dashboard_type == 2){ echo 'Posted Listing '; } else { echo 'Posted Requirement'; }?></a></li>

                    <li ><a class="nav-postedrates" href="javascript:void(0)">Posted Rates</a> </li>

                    <?php if($user_type == 2 OR  $user_type == 1){ ?>
                        <li ><a class=" ai-icon nav-rates" href="javascript:void(0)">Offer Prime Rates</a></li>
                    <?php } ?>
                </ul>
            </li>
            
            <li ><a class=" ai-icon nav-vehicle" href="javascript:void(0)" aria-expanded="false">
                    <i class="fa fa-truck"></i>
                    <span class="nav-text">Vehicle</span>
                </a>
            </li>
           
           
            <?php } else { ?>
             <li ><a class=" ai-icon nav-workprofile" href="javascript:void(0)" aria-expanded="false">
                  <i class="fa fa-user"></i>
                    <span class="nav-text">Complete Work Profile</span>
                </a>
            </li>
             <?php }?>

             <li class="ddmenu">
                <a class="has-arrow ai-icon " href="javascript:void(0)" aria-expanded="false">
                  <i class="fa fa-tasks"></i>
                    <span class="nav-text">Book Keeping</span>
                </a>
                 <ul>
                   
                    <li ><a class="nav-purchase" href="javascript:void(0)" > Purchase </a> </li>
                    <li ><a class="nav-sale" href="javascript:void(0)" > Sale </a> </li>
                    <li ><a class="nav-vendor" href="javascript:void(0)" > Vendor </a> </li>
                </ul>
            </li>
            
            <li ><div class="border-bottom pt-2 mb-2"></div>
            
             <li ><a class=" ai-icon " href="javascript:void(0)" aria-expanded="false">
                    <i class="flaticon-381-archive"></i>
                    <span class="nav-text">Credit Q</span>
                </a>
            </li>
            <?php if($user_type == 2 OR  $user_type == 0){ ?>
            <li ><a class=" ai-icon nav-labservice" href="javascript:void(0)" aria-expanded="false">
                    <i class="fa fa-flask"></i>
                    <span class="nav-text">Lab Services</span>
                </a>    
            </li>
        <?php } ?>

             <li ><a class=" ai-icon " href="javascript:void(0)" aria-expanded="false">
                   <i class="fa fa-book"></i>
                    <span class="nav-text">Inventory</span>
                </a>
            </li>
            <li ><a class=" ai-icon nav-rating" href="javascript:void(0)" aria-expanded="false">
                   <i class="fa fa-address-book" aria-hidden="true"></i>
                    <span class="nav-text">Review Rating</span>
                </a>
            </li>
            <li ><div class="border-bottom pt-2 mb-2"></div>
                 <li ><a class=" ai-icon " href="javascript:void(0)" aria-expanded="false">
                    <i class="fa fa-newspaper-o"></i>
                    <span class="nav-text">Market News</span>
                </a>
            </li>
            <li ><a class=" ai-icon nav-job" href="javascript:void(0)" aria-expanded="false">
                    <i class="fa fa-users"></i>
                    <span class="nav-text">Job Post</span>
                </a>
            </li>
        <?php } else if($user_type == '5'){ 
            if( $appproved == '1' ){ ?> 
             <li ><a class=" ai-icon nav-orderbooklist" href="javascript:void(0)" aria-expanded="false">
                   <i class="fa fa-list" aria-hidden="true"></i>
                    <span class="nav-text">Booking Available</span>
                </a>
            </li>
            <li ><a class=" ai-icon nav-vehicle" href="javascript:void(0)" aria-expanded="false">
                    <i class="flaticon-381-archive"></i>
                    <span class="nav-text">Vehicle</span>
                </a>
            </li>
           
        <?php } else { ?> 
        <li ><a class=" ai-icon nav-workprofile" href="javascript:void(0)" aria-expanded="false">
                  <i class="fa fa-user"></i>
                    <span class="nav-text">Complete Work Profile</span>
                </a>
            </li>
        <?php } } ?>
            <li ><div class="border-bottom pt-2 mb-2"></div>
            </li>
             <li ><a class=" ai-icon " href="javascript:void(0)" aria-expanded="false">
                   <i class="fa fa-comments" aria-hidden="true"></i>
                    <span class="nav-text">Complaints</span>
                </a>
            </li>
            <li ><a class=" ai-icon nav-about" href="javascript:void(0)" aria-expanded="false">
                   <i class="fa fa-id-card"></i>
                    <span class="nav-text">About US</span>
                </a>
            </li>
            <li ><a class=" ai-icon nav-contact" href="javascript:void(0)" aria-expanded="false">
                   <i class="fa fa-address-book" aria-hidden="true"></i>
                    <span class="nav-text">Contact US</span>
                </a>
            </li>
            <li ><div class="border-bottom pt-2 mb-2"></div>