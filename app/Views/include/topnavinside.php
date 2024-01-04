         <ul class="navbar-nav header-right">
                  
                    <li class="nav-item dropdown header-profile">
                        <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                            <img src="<?=base_url();?>/public/public/images/profile/17.jpg" width="20" alt=""/>
                        </a>
                        <div  class="justify-content-center nav-item m-2 profile-tags" ><span class="text-primary size-3 p-0">
                     <?php if($user_type=='0'){   echo 'Admin';}
                                    else if($user_type=='1'){   echo 'Bailer';}
                                    else if($user_type=='2'){   echo 'End User';}
                                    else if($user_type=='3'){   echo 'Paper Mill';}
                                    else if($user_type=='4'){   echo 'Trader';}
                                    else if($user_type=='5'){   echo 'Transporter';}?>  
</span>        <?php if($user_type<='4'){  ?> <span class="resnavbar"> <a href="javascript:void(0);" class=" size-7 nav-dashboard p-0 " tag="<?php if($dashboard_type == 2){ echo 1; } else { echo 2 ; }?>">Switch to <?php if($dashboard_type == 2){ echo ' Seller'; } else { echo ' Buyer'; }?> Dashboard ?</a></span> <?php }?>
                                   </div>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="javascript:void(0)" class="dropdown-item ai-icon">
                                <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                <span class="ml-2">
                                    <?php if($user_type=='0'){   echo 'Admin';}
                                    else if($user_type=='1'){   echo 'Bailer';}
                                    else if($user_type=='2'){   echo 'End User';}
                                    else if($user_type=='3'){   echo 'Paper Mill';}
                                    else if($user_type=='4'){   echo 'Trader';}
                                    else if($user_type=='5'){   echo 'Transporter';}?> 
                                </span>
                            </a>
                           <?php if( $appproved == '1' ){ ?>   <a href="javascript:void(0)" class="dropdown-item ai-icon nav-dashboard" tag="0">
                              <i class="fa fa-dashboard text-primary"></i>
                                <span class="ml-2">Main Dashboard</span>
                            </a>
                             <?php if($user_type<='4'){  ?> 
                                <a href="javascript:void(0)" class="dropdown-item ai-icon nav-dashboard" tag="2">
                                  <i class="fa fa-dashboard text-primary"></i>
                                    <span class="ml-2">Buyer Dashboard</span>
                                </a>
                                <a href="javascript:void(0)" class="dropdown-item ai-icon nav-dashboard" tag="1">
                                  <i class="fa fa-dashboard text-primary"></i>
                                    <span class="ml-2">Seller Dashboard</span>
                                </a>
                            <?php } ?>
                           
                            <?php } ?>
                             <a href="javascript:void(0);" class="dropdown-item ai-icon nav-profile">
                                <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                <span class="ml-2">Profile </span>
                            </a>
                            <a href="<?=base_url('logout');?>" class="dropdown-item ai-icon logout">
                                <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                <span class="ml-2">Logout </span>
                            </a>
                        </div>
                    </li>
                </ul>