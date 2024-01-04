 <!-- main dashboard -->
            <li class="activeclass ddmenu"> 
                <a class="has-arrow ai-icon " href="javascript:void(0)" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48">
                        <path d="M180 936q-24.75 0-42.375-17.625T120 876V276q0-24.75 17.625-42.375T180 216h600q24.75 0 42.375 17.625T840 276v600q0 24.75-17.625 42.375T780 936H180Zm230-60V606H180v270h230Zm60 0h310V606H470v270ZM180 546h600V276H180v270Z" />
                    </svg>
                    <span class="nav-text dashtext">
                        <?php if ($dashboard_type == 2) { echo ' Buyer';  }
                        elseif ($dashboard_type == 1) { echo 'Seller '; } 
                        else { echo 'Main';} ?> Dashboard 
                    </span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="drop-icon-arrow " height="48" viewBox="0 96 960 960" width="48">
                        <path d="M480 696 280 497h400L480 696Z"></path>
                    </svg>
                </a>
                <?php if ($user_type != 0) { ?>
                <ul>
                    
                    <li class="dash0" utype = "<?=$user_type?>" <?php if($dashboard_type == 0){ echo 'style="display:none";';}?>><a class="nav-dashboard" href="javascript:void(0)" tag="0"> Main Dashboard </a> </li>
                       <?php if ($user_type != 4) { ?>
                    <li class="dash2"  utype = "<?=$user_type?>" <?php if($dashboard_type == 2){ echo 'style="display:none";';}?>><a class="nav-dashboard" href="javascript:void(0);" tag="2" >Buyer Dashboard</a></li><?php } ?>
                    <li class="dash1"  utype = "<?=$user_type?>" <?php if($dashboard_type == 1){ echo 'style="display:none";';}?>><a class="nav-dashboard" href="javascript:void(0)" tag="1"> Seller Dashboard </a> </li>
                </ul>
            <?php } ?>
            </li>


            <?php if ($user_type <= 4 or $user_type == 10) { ?>
                <?php if ($dashboard_type == '0') {   ?>
                    <?php if ($user_type == 0) { ?>
                        <li><a class=" ai-icon nav-customer" href="javascript:void(0)" aria-expanded="false">
                                <i class="flaticon-381-network"></i>
                                <span class="nav-text">Customer</span>
                            </a>
                        </li>
                        <li class="ddmenu">
                            <a class="has-arrow ai-icon " href="javascript:void(0)">
                                <i class="flaticon-381-controls-3"></i>
                                <span class="nav-text">Product</span>
                            </a>
                            <ul>
                                <li><a href="javascript:void(0);" class="nav-product" self='1'> Products</a></li>

                                <!-- <li><a href="javascript:void(0);" class="nav-stock">Product Stock</a></li> -->

                                <li><a href="javascript:void(0);" class="nav-product-category">Product Category</a></li>

                                <li><a href="javascript:void(0);" class="nav-product-type">Product Type</a></li>

                                <li><a href="javascript:void(0);" class="nav-product-quality">Product Quality</a></li>
                                <?php if ($appproved == '1') { ?> <li><a class="nav-stock" href="javascript:void(0)"> Stock </a> </li> <?php } ?>
                            </ul>
                        </li>
                        <li><a class=" ai-icon nav-postedrates" href="javascript:void(0)" aria-expanded="false">
                                <i class="flaticon-381-clock"></i>
                                <span class="nav-text">Prime Rates</span>
                            </a>
                        </li>
                        
                    <?php } ?>

                    <?php if ($appproved == '1') { ?>
                        <li class="ddmenu">
                            <a class="has-arrow ai-icon " href="javascript:void(0)" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" class="bookkeep" height="48" viewBox="0 96 960 960" width="48">
                                    <path d="M248 756q53.566 0 104.283 12.5T452 806V379q-45-30-97.619-46.5Q301.763 316 248 316q-38 0-74.5 9.5T100 349v434q31-14 70.5-20.5T248 756Zm264 50q50-25 98-37.5T712 756q38 0 78.5 6t69.5 16V349q-34-17-71.822-25-37.823-8-76.178-8-54 0-104.5 16.5T512 379v427Zm-30 90q-51-38-111-58.5T248 817q-36.537 0-71.768 9Q141 835 106 848q-23.1 11-44.55-3Q40 831 40 805V342q0-15 7-27.5T68 295q42-20 87.395-29.5Q200.789 256 248 256q63 0 122.5 17T482 325q51-35 109.5-52T712 256q46.868 0 91.934 9.5Q849 275 891 295q14 7 21.5 19.5T920 342v463q0 27.894-22.5 42.447Q875 862 853 848q-34-14-69.232-22.5Q748.537 817 712 817q-63 0-121 21t-109 58ZM276 567Z" />
                                </svg>
                                <span class="nav-text">Book Keeping</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="drop-icon-arrow " height="48" viewBox="0 96 960 960" width="48">
                                    <path d="M480 696 280 497h400L480 696Z"></path>
                                </svg>
                            </a>
                            <ul>
                                <li><a href="javascript:void(0);" class="nav-product" self='1'>My Products</a></li>
                                <li><a class="nav-purchase" href="javascript:void(0)"> Purchase </a> </li>
                                <li><a class="nav-sale" href="javascript:void(0)"> Sale </a> </li>
                                <li><a class="nav-vendor" href="javascript:void(0)"> Vendor </a> </li>
                            </ul>
                        </li>

                        <?php if ($user_type == 2 or  $user_type == 0) { ?>
                            <li><a class=" ai-icon nav-labservice" href="javascript:void(0)" aria-expanded="false">
                                    <i class="fa fa-flask"></i>
                                    <span class="nav-text">Lab Services</span>
                                </a>
                            </li>
                        <?php } ?>
                        <li><a class=" ai-icon " href="javascript:void(0)" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48">
                                    <path d="M120 914V422q-14-2-27-20t-13-39V236q0-23 18-41.5t42-18.5h680q23 0 41.5 18.5T880 236v127q0 21-13 39t-27 20v492q0 23-18.5 42.5T780 976H180q-24 0-42-19.5T120 914Zm60-491v493h600V423H180Zm640-60V236H140v127h680ZM360 633h240v-60H360v60ZM180 916V423v493Z" />
                                </svg>
                                <span class="nav-text">Inventory</span>
                            </a>
                        </li>
                    <?php } else { ?>
                     <li><a class=" ai-icon nav-workprofile" href="javascript:void(0)" aria-expanded="false">
                            <i class="fa fa-user ml-2"></i>
                            <span class="nav-text">Complete Work Profile</span>
                        </a>
                    </li>
                    
                    <li class="ddmenu"> <a class="has-arrow ai-icon " href="javascript:void(0)">
                            <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48">
                                <path d="M160 316v-60h642v60H160Zm5 580V638h-49v-60l44-202h641l44 202v60h-49v258h-60V638H547v258H165Zm60-60h262V638H225v198Zm-50-258h611-611Zm0 0h611l-31-142H206l-31 142Z" />
                            </svg>
                            <span class="nav-text">Market</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="drop-icon-arrow" height="48" viewBox="0 96 960 960" width="48">
                                <path d="M480 696 280 497h400L480 696Z" />
                            </svg>
                        </a>
                        <ul>
                          
                            <li><a class="nav-userlist" href="javascript:void(0)"> View Listing</a></li>

                            <li><a class="nav-postedrates" href="javascript:void(0)">Prime Rates</a> </li>
                            <?php if ($user_type >= 3) { ?>
                                <li><a class=" nav-rates" href="javascript:void(0)"> Sauda Rates </a> </li>
                            <?php } ?>
                            <?php if (($user_type == 2 or  $user_type == 1) and $appproved == '1') { ?>
                                <!-- <li><a class=" ai-icon nav-rates" href="javascript:void(0)">Offer Prime Rates</a></li> -->
                            <?php } ?>
                        </ul>
                    </li>
                    <?php }?>
                    <!-- <li class="ddmenu"> <a class="has-arrow ai-icon " href="javascript:void(0)">
                            <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48">
                                <path d="M160 316v-60h642v60H160Zm5 580V638h-49v-60l44-202h641l44 202v60h-49v258h-60V638H547v258H165Zm60-60h262V638H225v198Zm-50-258h611-611Zm0 0h611l-31-142H206l-31 142Z" />
                            </svg>
                            <span class="nav-text">Market</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="drop-icon-arrow" height="48" viewBox="0 96 960 960" width="48">
                                <path d="M480 696 280 497h400L480 696Z" />
                            </svg>
                        </a>
                        <ul>
                          
                            <li><a class="nav-userlist" href="javascript:void(0)"> View Listing</a></li>

                            <li><a class="nav-postedrates" href="javascript:void(0)">Posted Rates</a> </li>
                            <?php if ($user_type >= 3) { ?>
                                <li><a class=" nav-rates" href="javascript:void(0)"> Sauda Rates </a> </li>
                            <?php } ?>
                            <?php if (($user_type == 2 or  $user_type == 1) and $appproved == '1') { ?>
                                <li><a class=" ai-icon nav-rates" href="javascript:void(0)">Offer Prime Rates</a></li>
                            <?php } ?>
                        </ul>
                    </li> -->
                    <li><a class=" ai-icon " href="javascript:void(0)" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48">
                                <path d="M352 876q-119-40-196-143T79 496q0-32 5-64t16-63l-64 37-30-51 173-100 100 172-52 30-58-99q-14 33-21.5 68t-7.5 71q0 116 68.5 205T383 823l-31 53Zm288-520v-60h115q-48-66-120.5-103T480 156q-69 0-128.5 25T246 250l-31-54q54-47 121-73.5T479 96q88 0 166 35.5T780 232v-76h60v200H640Zm-45 620L422 876l100-172 51 30-58 101q130-13 217.5-109.5T820 497q0-21-2.5-41t-7.5-40h62q4 20 6 40t2 40q0 143-89.5 253T562 888l63 37-30 51Z" />
                            </svg>
                            <span class="nav-text">Generate Eway</span>
                        </a>
                    </li>
                    <li><a class=" ai-icon " href="javascript:void(0)" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48">
                                <path d="M480 576Zm-400 0q0-83 31.5-156t86-127Q252 239 325 207.5T480 176q36 0 71 6t67 18q-14 10-25 22.5T574 249q-23-7-46-10t-48-3q-141 0-240.5 99T140 576q0 141 99.5 240.5T480 916q142 0 241-99.5T820 576q0-25-3-48t-10-46q14-8 26.5-19t22.5-25q12 32 18 67t6 71q0 82-31.5 155T763 858.5q-54 54.5-127 86T480 976q-82 0-155-31.5t-127.5-86Q143 804 111.5 731T80 576Zm640-130q-45 0-77.5-32.5T610 336q0-46 32.5-78t77.5-32q46 0 78 32t32 78q0 45-32 77.5T720 446Z" />
                            </svg>
                            <span class="nav-text">Alerts</span>
                        </a>
                    </li>
                    <li>
                        <div class="divider-side"></div>
                    <li><a class=" ai-icon " href="javascript:void(0)" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48">
                                <path d="M180 936q-24 0-42-18t-18-42V276q0-24 18-42t42-18h462l198 198v462q0 24-18 42t-42 18H180Zm0-60h600V447.429H609V276H180v600Zm99-111h402v-60H279v60Zm0-318h201v-60H279v60Zm0 159h402v-60H279v60Zm-99-330v171.429V276v600-600Z" />
                            </svg>
                            <span class="nav-text">Market News</span>

                        </a>
                    </li>
                    <?php if ($appproved == '1') { ?> <li><a class=" ai-icon nav-job" href="javascript:void(0)" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48">
                                    <path d="M140 936q-24 0-42-18t-18-42V396q0-24 18-42t42-18h180V236q0-24 18-42t42-18h200q24 0 42 18t18 42v100h180q24 0 42 18t18 42v480q0 24-18 42t-42 18H140Zm0-60h680V396H140v480Zm240-540h200V236H380v100ZM140 876V396v480Z" />
                                </svg>
                                <span class="nav-text">Job Post</span>
                            </a>
                        </li>
                    <?php } ?>
                    <li><a class=" ai-icon " href="javascript:void(0)" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48">
                                <path d="M600 896q-134 0-227-93t-93-227q0-134 93-227t227-93q134 0 227 93t93 227q0 134-93 227t-227 93Zm-306-12q-113-14-183.5-103.5T40 576q0-115 70.5-204.5T294 268v58q-88 16-141 87.5T100 576q0 91 53 162.5T294 826v58Zm306-308Zm0 260q107 0 183.5-76.5T860 576q0-107-76.5-183.5T600 316q-107 0-183.5 76.5T340 576q0 107 76.5 183.5T600 836Z" />
                            </svg>
                            <span class="nav-text">Credit Q</span>
                        </a>
                    </li>
                    <li>
                        <div class="divider-side"></div>
                    </li>
                    <li><a class=" ai-icon nav-staff" href="javascript:void(0)" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48">
                                <path d="M140 976q-24 0-42-18t-18-42V436q0-24 18-42t42-18h237V236q0-24 18-42t42-18h87q24 0 42 18t18 42v140h236q24 0 42 18t18 42v480q0 24-18 42t-42 18H140Zm0-60h680V436H584q0 28-18.5 44T519 496h-78q-27 0-45.5-16T377 436H140v480Zm92-107h239v-14q0-18-9-32t-23-19q-32-11-50-14.5t-35-3.5q-19 0-40.5 4.5T265 744q-15 5-24 19t-9 32v14Zm336-67h170v-50H568v50Zm-214-50q22.5 0 38.25-15.75T408 638q0-22.5-15.75-38.25T354 584q-22.5 0-38.25 15.75T300 638q0 22.5 15.75 38.25T354 692Zm214-63h170v-50H568v50ZM437 436h87V236h-87v200Zm43 240Z" />
                            </svg>
                            <span class="nav-text">Staff</span>
                        </a>
                    </li>
                    <li><a class=" ai-icon nav-vehicle" href="javascript:void(0)" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48">
                                <path d="M229.882 856Q184 856 152 823.917 120 791.833 120 746H40V366q0-28.875 20.563-49.438Q81.124 296 110 296h576l234 234v216h-80q0 45.833-32.118 77.917-32.117 32.083-78 32.083Q684 856 652 823.917 620 791.833 620 746H340q0 46-32.118 78-32.117 32-78 32ZM600 496h194L654 356h-54v140Zm-250 0h190V356H350v140Zm-250 0h190V356H100v140Zm129.859 310Q255 806 272.5 788.641t17.5-42.5Q290 721 272.641 703.5t-42.5-17.5Q205 686 187.5 703.359t-17.5 42.5Q170 771 187.359 788.5t42.5 17.5Zm500 0Q755 806 772.5 788.641t17.5-42.5Q790 721 772.641 703.5t-42.5-17.5Q705 686 687.5 703.359t-17.5 42.5Q670 771 687.359 788.5t42.5 17.5ZM100 686h37q17-26 42.5-38t50.5-12q25 0 50.5 12t42.5 38h314q17-26 42.5-38t50.5-12q25 0 50.5 12t42.5 38h37V556H100v130Zm760-130H100h760Z" />
                            </svg>
                            <span class="nav-text">Vehicle</span>
                        </a>
                    </li>
                    <li><a class=" ai-icon " href="javascript:void(0)" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48">
                                <path d="m515 976-10-110h-40q-143 0-244-101T120 521q0-143 101.5-244T467 176q71 0 131.5 25.5T704 273q45 46 70.5 108.5T800 518q0 66-19.5 132T724 776q-37 60-90 111t-119 89Zm50-108q82-69 128.5-162.5T740 518q0-124-77.5-203T467 236q-120 0-203.5 83.5T180 521q0 118 83.5 201.5T465 806h100v62Zm-98-115q16 0 27-11t11-27q0-16-11-27t-27-11q-16 0-27 11t-11 27q0 16 11 27t27 11Zm-27-136h50q0-25 8.5-41.5T534 532q27-27 38-49.5t11-48.5q0-45-30.5-74T471 331q-42 0-75 22t-49 60l46 19q11-26 30.5-38.5T468 381q30 0 47 14.5t17 38.5q0 19-11 38.5T482 521q-27 28-34.5 45t-7.5 51Zm20-65Z" />
                            </svg>
                            <span class="nav-text">Complaints</span>
                        </a>
                    </li>
                    <li><a class=" ai-icon nav-about" href="javascript:void(0)" aria-expanded="false">
                            <i class="fa fa-id-card"></i>
                            <span class="nav-text">About US</span>
                        </a>
                    </li>
                    <li><a class=" ai-icon nav-contact" href="javascript:void(0)" aria-expanded="false">
                            <i class="fa fa-address-book" aria-hidden="true"></i>
                            <span class="nav-text">Contact US</span>
                        </a>
                    </li>

                <?php
                } ?>

                <!-- //seller dashboard -->
                <?php if ($dashboard_type == '1') {
                ?>
                    <li class="ddmenu"> <a class="has-arrow ai-icon " href="javascript:void(0)">
                            <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48">
                                <path d="M160 316v-60h642v60H160Zm5 580V638h-49v-60l44-202h641l44 202v60h-49v258h-60V638H547v258H165Zm60-60h262V638H225v198Zm-50-258h611-611Zm0 0h611l-31-142H206l-31 142Z" />
                            </svg>
                            <span class="nav-text">Market</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="drop-icon-arrow" height="48" viewBox="0 96 960 960" width="48">
                                <path d="M480 696 280 497h400L480 696Z" />
                            </svg>
                        </a>
                        <ul>
                            <?php if ($user_type != 0) { ?>
                                <li><a class=" nav-list" href="javascript:void(0)"><?php if ($dashboard_type == 2) {
                                                                                        echo 'My Requirement';
                                                                                    } else {
                                                                                        echo 'Rates Posted';
                                                                                    } ?> </a> </li>
                            <?php } ?>

                            <?php if ($user_type >= 3) { ?>
                                <li><a class=" nav-rates" href="javascript:void(0)"> Sauda Rates </a> </li>
                            <?php } ?>

                            <li><a class="nav-userlist" href="javascript:void(0)"><?php if ($dashboard_type == 2) {
                                                                                        echo 'Posted Listing ';
                                                                                    } else {
                                                                                        echo 'Posted Requirement';
                                                                                    } ?></a></li>

                            <li><a class="nav-postedrates" href="javascript:void(0)">Prime Rates</a> </li>


                            <?php if ($user_type == 2 or  $user_type == 1) { ?>
                                <!-- <li><a class=" ai-icon nav-rates" href="javascript:void(0)">Offer Prime Rates</a></li> -->
                            <?php } ?>
                        </ul>
                    </li>
                    <li><a class="nav-transactionhistory ai-icon " href="javascript:void(0)" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48">
                                <path d="M222 976q-43.75 0-74.375-30.625T117 871V746h127V176l59.8 60 59.8-60 59.8 60 59.8-60 59.8 60 60-60 60 60 60-60 60 60 60-60v695q0 43.75-30.625 74.375T738 976H222Zm516-60q20 0 32.5-12.5T783 871V276H304v470h389v125q0 20 12.5 32.5T738 916ZM357 434v-60h240v60H357Zm0 134v-60h240v60H357Zm333-134q-12 0-21-9t-9-21q0-12 9-21t21-9q12 0 21 9t9 21q0 12-9 21t-21 9Zm0 129q-12 0-21-9t-9-21q0-12 9-21t21-9q12 0 21 9t9 21q0 12-9 21t-21 9ZM221 916h412V806H177v65q0 20 12.65 32.5T221 916Zm-44 0V806v110Z" />
                            </svg>
                            <span class="nav-text">Transaction History</span>
                        </a>
                    </li>
                    <li><a class=" ai-icon nav-interests" href="javascript:void(0)" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48">
                                <path d="m80 536 200-360 200 360H80Zm201 400q-66 0-113-47t-47-113q0-67 47-113.5T281 616q66 0 113 47t47 113q0 66-47 113t-113 47Zm0-60q42 0 71-29t29-71q0-42-29-71t-71-29q-42 0-71 29t-29 71q0 42 29 71t71 29Zm-99-400h196l-98-176-98 176Zm338 460V616h320v320H520Zm60-60h200V676H580v200Zm100-340q-57-48-95.5-81T523 397q-23-25-33-47t-10-47q0-45 31.5-76t78.5-31q26 0 50 12t40 35q16-23 40-35t50-12q47 0 78.5 31t31.5 76q0 25-10 47t-33 47q-23 25-61.5 58T680 536Zm0-79q85-70 112.5-100t27.5-52q0-21.966-12.857-35.483Q794.286 256 772 256q-13.103 0-25.552 7Q734 270 715 287l-35 33-35-33q-18.667-17.36-31.333-24.18Q601 256 588 256q-22.286 0-35.143 13.517T540 305q0 22 27.5 52T680 457Zm0-101Zm-400 32Zm1 388Zm399 0Z" />
                            </svg>
                            <span class="nav-text">Interests</span>
                        </a>
                    </li>
                    <li><a class=" ai-icon nav-interestlist" href="javascript:void(0)" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48">
                                <path d="m80 536 200-360 200 360H80Zm201 400q-66 0-113-47t-47-113q0-67 47-113.5T281 616q66 0 113 47t47 113q0 66-47 113t-113 47Zm0-60q42 0 71-29t29-71q0-42-29-71t-71-29q-42 0-71 29t-29 71q0 42 29 71t71 29Zm-99-400h196l-98-176-98 176Zm338 460V616h320v320H520Zm60-60h200V676H580v200Zm100-340q-57-48-95.5-81T523 397q-23-25-33-47t-10-47q0-45 31.5-76t78.5-31q26 0 50 12t40 35q16-23 40-35t50-12q47 0 78.5 31t31.5 76q0 25-10 47t-33 47q-23 25-61.5 58T680 536Zm0-79q85-70 112.5-100t27.5-52q0-21.966-12.857-35.483Q794.286 256 772 256q-13.103 0-25.552 7Q734 270 715 287l-35 33-35-33q-18.667-17.36-31.333-24.18Q601 256 588 256q-22.286 0-35.143 13.517T540 305q0 22 27.5 52T680 457Zm0-101Zm-400 32Zm1 388Zm399 0Z" />
                            </svg>
                            <span class="nav-text">Interests Recieved</span>
                        </a>
                    </li>
                    <li><a class=" ai-icon nav-sale" href="javascript:void(0)" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48">
                                <path d="M120 936v-76l60-60v136h-60Zm165 0V700l60-60v296h-60Zm165 0V640l60 61v235h-60Zm165 0V701l60-60v295h-60Zm165 0V540l60-60v456h-60ZM120 700v-85l280-278 160 160 280-281v85L560 582 400 422 120 700Z" />
                            </svg>
                            <span class="nav-text">Sale</span>
                        </a>
                    </li>

                    <?php if ($user_type == 3) { ?>
                        <li>
                            <a class=" ai-icon nav-decklelist" href="javascript:void(0)" aria-expanded="false">
                                <i class="fa fa-address-book" aria-hidden="true"></i>
                                <span class="nav-text"> Deckle/Extra Stock</span>
                            </a>
                        </li>
                    <?php } ?>
                <?php
                } ?>

                <!-- //buyer dashboard -->
                <?php if ($dashboard_type == '2') {
                ?>
                    <li class="ddmenu"> <a class="has-arrow ai-icon " href="javascript:void(0)">
                            <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48">
                                <path d="M160 316v-60h642v60H160Zm5 580V638h-49v-60l44-202h641l44 202v60h-49v258h-60V638H547v258H165Zm60-60h262V638H225v198Zm-50-258h611-611Zm0 0h611l-31-142H206l-31 142Z" />
                            </svg>
                            <span class="nav-text">Market</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="drop-icon-arrow" height="48" viewBox="0 96 960 960" width="48">
                                <path d="M480 696 280 497h400L480 696Z" />
                            </svg></a>
                        <ul>
                            <?php if ($user_type != 0) { ?>
                                <li><a class=" nav-list" href="javascript:void(0)"><?php if ($dashboard_type == 2) {
                                                                                        echo 'My Requirement';
                                                                                    } else {
                                                                                        echo 'Rates Posted';
                                                                                    } ?> </a> </li>
                            <?php } ?>

                            <?php if ($user_type >= 3) { ?>
                                <li><a class=" nav-rates" href="javascript:void(0)"> Sauda Rates </a> </li>
                            <?php } ?>

                            <li><a class="nav-userlist" href="javascript:void(0)"><?php if ($dashboard_type == 2) {
                                                                                        echo 'Posted Listing ';
                                                                                    } else {
                                                                                        echo 'Posted Requirement';
                                                                                    } ?></a></li>
                            
                             <li><a class="nav-postedrates" href="javascript:void(0)">Prime Rates</a> </li>
                            <?php if (($user_type == 2 or  $user_type == 1) and $appproved == '1') { ?>
                                <!-- <li><a class=" ai-icon nav-rates" href="javascript:void(0)">Offer Prime Rates</a></li> -->
                            <?php } ?>


                        </ul>
                    </li>
                    <li><a class=" ai-icon nav-transactionhistory" href="javascript:void(0)" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48">
                                <path d="M222 976q-43.75 0-74.375-30.625T117 871V746h127V176l59.8 60 59.8-60 59.8 60 59.8-60 59.8 60 60-60 60 60 60-60 60 60 60-60v695q0 43.75-30.625 74.375T738 976H222Zm516-60q20 0 32.5-12.5T783 871V276H304v470h389v125q0 20 12.5 32.5T738 916ZM357 434v-60h240v60H357Zm0 134v-60h240v60H357Zm333-134q-12 0-21-9t-9-21q0-12 9-21t21-9q12 0 21 9t9 21q0 12-9 21t-21 9Zm0 129q-12 0-21-9t-9-21q0-12 9-21t21-9q12 0 21 9t9 21q0 12-9 21t-21 9ZM221 916h412V806H177v65q0 20 12.65 32.5T221 916Zm-44 0V806v110Z" />
                            </svg>
                            <span class="nav-text">Transaction History</span>
                        </a>
                    </li>
                    <li><a class=" ai-icon nav-interests" href="javascript:void(0)" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48">
                                <path d="m80 536 200-360 200 360H80Zm201 400q-66 0-113-47t-47-113q0-67 47-113.5T281 616q66 0 113 47t47 113q0 66-47 113t-113 47Zm0-60q42 0 71-29t29-71q0-42-29-71t-71-29q-42 0-71 29t-29 71q0 42 29 71t71 29Zm-99-400h196l-98-176-98 176Zm338 460V616h320v320H520Zm60-60h200V676H580v200Zm100-340q-57-48-95.5-81T523 397q-23-25-33-47t-10-47q0-45 31.5-76t78.5-31q26 0 50 12t40 35q16-23 40-35t50-12q47 0 78.5 31t31.5 76q0 25-10 47t-33 47q-23 25-61.5 58T680 536Zm0-79q85-70 112.5-100t27.5-52q0-21.966-12.857-35.483Q794.286 256 772 256q-13.103 0-25.552 7Q734 270 715 287l-35 33-35-33q-18.667-17.36-31.333-24.18Q601 256 588 256q-22.286 0-35.143 13.517T540 305q0 22 27.5 52T680 457Zm0-101Zm-400 32Zm1 388Zm399 0Z" />
                            </svg>
                            <span class="nav-text">Interests</span>
                        </a>
                    </li>
                    <li><a class=" ai-icon nav-interestlist" href="javascript:void(0)" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48">
                                <path d="m80 536 200-360 200 360H80Zm201 400q-66 0-113-47t-47-113q0-67 47-113.5T281 616q66 0 113 47t47 113q0 66-47 113t-113 47Zm0-60q42 0 71-29t29-71q0-42-29-71t-71-29q-42 0-71 29t-29 71q0 42 29 71t71 29Zm-99-400h196l-98-176-98 176Zm338 460V616h320v320H520Zm60-60h200V676H580v200Zm100-340q-57-48-95.5-81T523 397q-23-25-33-47t-10-47q0-45 31.5-76t78.5-31q26 0 50 12t40 35q16-23 40-35t50-12q47 0 78.5 31t31.5 76q0 25-10 47t-33 47q-23 25-61.5 58T680 536Zm0-79q85-70 112.5-100t27.5-52q0-21.966-12.857-35.483Q794.286 256 772 256q-13.103 0-25.552 7Q734 270 715 287l-35 33-35-33q-18.667-17.36-31.333-24.18Q601 256 588 256q-22.286 0-35.143 13.517T540 305q0 22 27.5 52T680 457Zm0-101Zm-400 32Zm1 388Zm399 0Z" />
                            </svg>
                            <span class="nav-text">Interests Recieved</span>
                        </a>
                    </li>
                    <li><a class=" ai-icon nav-purchase" href="javascript:void(0)" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48">
                                <path d="M480 936q-151 0-255.5-46.5T120 776V376q0-66 105.5-113T480 216q149 0 254.5 47T840 376v400q0 67-104.5 113.5T480 936Zm0-488q86 0 176.5-26.5T773 362q-27-32-117.5-59T480 276q-88 0-177 26t-117 60q28 35 116 60.5T480 448Zm-1 214q42 0 84-4.5t80.5-13.5q38.5-9 73.5-22t63-29V438q-29 16-64 29t-74 22q-39 9-80 14t-83 5q-42 0-84-5t-80.5-14q-38.5-9-73-22T180 438v155q27 16 61 29t72.5 22q38.5 9 80.5 13.5t85 4.5Zm1 214q48 0 99-8.5t93.5-22.5q42.5-14 72-31t35.5-35V654q-28 16-63 28.5T643.5 704q-38.5 9-80 13.5T479 722q-43 0-85-4.5T313.5 704q-38.5-9-72.5-21.5T180 654v126q5 17 34 34.5t72 31q43 13.5 94 22t100 8.5Z" />
                            </svg>
                            <span class="nav-text">Purchase</span>
                        </a>
                    </li>
                    <li><a class=" ai-icon nav-guard" href="javascript:void(0)" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48">
                                <path d="M479.765 668Q433 668 400.5 635.265q-32.5-32.736-32.5-79.5Q368 509 400.735 476.5q32.736-32.5 79.5-32.5Q527 444 559.5 476.735q32.5 32.736 32.5 79.5Q592 603 559.265 635.5q-32.736 32.5-79.5 32.5ZM480 856q-146 0-264-83T40 556q58-134 176-217t264-83q143 0 259.5 79.5T916 546h-64q-54-105-154.131-167.5Q597.737 316 480 316q-121.232 0-222.616 65.5Q156 447 102 556q54 109 155.384 174.5Q358.768 796 480 796q22.5 0 45-2.5t45-7.5v61q-22 5-44.667 7-22.666 2-45.333 2Zm0-130q26.19 0 50.595-7.5Q555 711 575 697q8-34 26.5-63t45.5-49q2-8 2.5-14.5t.5-14.5q0-70.833-49.618-120.417Q550.765 386 479.882 386 409 386 359.5 435.618q-49.5 49.617-49.5 120.5Q310 627 359.583 676.5 409.167 726 480 726Zm-3-170Zm208 380q-14 0-24.5-10.5T650 901V781q0-14 11.5-24.5T690 746v-45q0-30.938 22.044-52.969 22.045-22.031 53-22.031Q796 626 818 648.031q22 22.031 22 52.969v45q17 0 28.5 10.5T880 781v120q0 14-10.5 24.5T845 936H685Zm35-190h90v-44.912Q810 682 797.088 669q-12.913-13-32-13Q746 656 733 668.938 720 681.875 720 701v45Z" />
                            </svg>
                            <span class="nav-text">Guard</span>
                        </a>
                    </li>
                    <li><a class=" ai-icon nav-qc" href="javascript:void(0)" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48">
                                <path d="M440.5 556Q378 556 334 511.938 290 467.875 290 406q0-63 44.062-106.5Q378.125 256 440 256q63 0 106.5 43.5t43.5 106q0 62.5-43.5 106.5t-106 44Zm-.5-60q38 0 64-26.438 26-26.437 26-63.562 0-38-26-64t-63.5-26q-37.5 0-64 26T350 405.5q0 37.5 26.438 64Q402.875 496 440 496Zm458 540L758 896q-23 17-47.5 23.5t-50.065 6.5q-71.015 0-120.725-49.618Q490 826.765 490 755.882 490 685 539.618 635.5q49.617-49.5 120.5-49.5Q731 586 780.5 635.71T830 756.435q0 25.565-6.5 50.065Q817 831 800 854l140 140-42 42ZM660 866q47 0 78.5-31.5T770 756q0-47-31.5-78.5T660 646q-47 0-78.5 31.5T550 756q0 47 31.5 78.5T660 866Zm-540 30v-94q0-37 17.5-63t50.5-43q47-23 122.5-43.5T464 637q-8 13-15 28.5T438 696q-78-1-136 18.5T212 750q-14 8-23 21.5t-9 30.5v34h258q11 17 20 31.5t20 28.5H120Zm320-490Zm-2 430Z" />
                            </svg>
                            <span class="nav-text">Quality Control</span>
                        </a>
                    </li>

                <?php
                }
            } else if ($user_type == '5') {
                if ($appproved == '1') { ?>
                    <li><a class=" ai-icon nav-orderbooklist" href="javascript:void(0)" aria-expanded="false">
                            <i class="fa fa-list" aria-hidden="true"></i>
                            <span class="nav-text">Booking Available</span>
                        </a>
                    </li>
                    <li><a class=" ai-icon nav-alotedbooklist" href="javascript:void(0)" aria-expanded="false">
                            <i class="fa fa-truck" aria-hidden="true"></i>
                            <span class="nav-text">Booked Vehicles</span>
                        </a>
                    </li>
                    <li><a class=" ai-icon nav-vehicle" href="javascript:void(0)" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48">
                                <path d="M229.882 856Q184 856 152 823.917 120 791.833 120 746H40V366q0-28.875 20.563-49.438Q81.124 296 110 296h576l234 234v216h-80q0 45.833-32.118 77.917-32.117 32.083-78 32.083Q684 856 652 823.917 620 791.833 620 746H340q0 46-32.118 78-32.117 32-78 32ZM600 496h194L654 356h-54v140Zm-250 0h190V356H350v140Zm-250 0h190V356H100v140Zm129.859 310Q255 806 272.5 788.641t17.5-42.5Q290 721 272.641 703.5t-42.5-17.5Q205 686 187.5 703.359t-17.5 42.5Q170 771 187.359 788.5t42.5 17.5Zm500 0Q755 806 772.5 788.641t17.5-42.5Q790 721 772.641 703.5t-42.5-17.5Q705 686 687.5 703.359t-17.5 42.5Q670 771 687.359 788.5t42.5 17.5ZM100 686h37q17-26 42.5-38t50.5-12q25 0 50.5 12t42.5 38h314q17-26 42.5-38t50.5-12q25 0 50.5 12t42.5 38h37V556H100v130Zm760-130H100h760Z" />
                            </svg>
                            <span class="nav-text">Vehicle</span>
                        </a>
                    </li>
                <?php } else { ?>
                    <li><a class=" ai-icon nav-workprofile" href="javascript:void(0)" aria-expanded="false">
                            <i class="fa fa-user"></i>
                            <span class="nav-text">Complete Work Profile</span>
                        </a>
                    </li>
                <?php }
            } else if ($user_type == '6') { ?>

                <li><a class=" ai-icon nav-guard" href="javascript:void(0)" aria-expanded="false">
                        <i class="fa fa-list" aria-hidden="true"></i>
                        <span class="nav-text">Vehicles Coming</span>
                    </a>
                </li>



            <?php } else if ($user_type == '7') { ?>

                <li><a class=" ai-icon nav-qc" href="javascript:void(0)" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48">
                            <path d="M440.5 556Q378 556 334 511.938 290 467.875 290 406q0-63 44.062-106.5Q378.125 256 440 256q63 0 106.5 43.5t43.5 106q0 62.5-43.5 106.5t-106 44Zm-.5-60q38 0 64-26.438 26-26.437 26-63.562 0-38-26-64t-63.5-26q-37.5 0-64 26T350 405.5q0 37.5 26.438 64Q402.875 496 440 496Zm458 540L758 896q-23 17-47.5 23.5t-50.065 6.5q-71.015 0-120.725-49.618Q490 826.765 490 755.882 490 685 539.618 635.5q49.617-49.5 120.5-49.5Q731 586 780.5 635.71T830 756.435q0 25.565-6.5 50.065Q817 831 800 854l140 140-42 42ZM660 866q47 0 78.5-31.5T770 756q0-47-31.5-78.5T660 646q-47 0-78.5 31.5T550 756q0 47 31.5 78.5T660 866Zm-540 30v-94q0-37 17.5-63t50.5-43q47-23 122.5-43.5T464 637q-8 13-15 28.5T438 696q-78-1-136 18.5T212 750q-14 8-23 21.5t-9 30.5v34h258q11 17 20 31.5t20 28.5H120Zm320-490Zm-2 430Z" />
                        </svg>
                        <span class="nav-text">Quality Control Reports</span>
                    </a>
                </li>



            <?php } else {
            ?>


                <?php if ($appproved == '1') { ?>
                    <li class="ddmenu">
                        <a class="has-arrow ai-icon " href="javascript:void(0)" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" class="bookkeep" height="48" viewBox="0 96 960 960" width="48">
                                <path d="M248 756q53.566 0 104.283 12.5T452 806V379q-45-30-97.619-46.5Q301.763 316 248 316q-38 0-74.5 9.5T100 349v434q31-14 70.5-20.5T248 756Zm264 50q50-25 98-37.5T712 756q38 0 78.5 6t69.5 16V349q-34-17-71.822-25-37.823-8-76.178-8-54 0-104.5 16.5T512 379v427Zm-30 90q-51-38-111-58.5T248 817q-36.537 0-71.768 9Q141 835 106 848q-23.1 11-44.55-3Q40 831 40 805V342q0-15 7-27.5T68 295q42-20 87.395-29.5Q200.789 256 248 256q63 0 122.5 17T482 325q51-35 109.5-52T712 256q46.868 0 91.934 9.5Q849 275 891 295q14 7 21.5 19.5T920 342v463q0 27.894-22.5 42.447Q875 862 853 848q-34-14-69.232-22.5Q748.537 817 712 817q-63 0-121 21t-109 58ZM276 567Z" />
                            </svg>
                            <span class="nav-text">Book Keeping</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="drop-icon-arrow bookkeep" height="48" viewBox="0 96 960 960" width="48">
                                <path d="M480 696 280 497h400L480 696Z"></path>
                            </svg>
                        </a>
                        <ul>
                            <li><a href="javascript:void(0);" class="nav-product" self="1">My Products</a></li>
                            <li><a class="nav-purchase" href="javascript:void(0)"> Purchase </a> </li>
                            <li><a class="nav-sale" href="javascript:void(0)"> Sale </a> </li>
                            <li><a class="nav-vendor" href="javascript:void(0)"> Vendor </a> </li>
                        </ul>
                    </li>

                    <li><a class=" ai-icon " href="javascript:void(0)" aria-expanded="false">
                            <i class="fa fa-book"></i>
                            <span class="nav-text">Inventory</span>
                        </a>
                    </li>
                <?php } else { ?>
                    <li><a class=" ai-icon nav-workprofile" href="javascript:void(0)" aria-expanded="false">
                            <i class="fa fa-user"></i>
                            <span class="nav-text">Complete Work Profile</span>
                        </a>
                    </li>
                <?php } ?>
                <li class="ddmenu"> <a class="has-arrow ai-icon " href="javascript:void(0)">
                        <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48">
                            <path d="M160 316v-60h642v60H160Zm5 580V638h-49v-60l44-202h641l44 202v60h-49v258h-60V638H547v258H165Zm60-60h262V638H225v198Zm-50-258h611-611Zm0 0h611l-31-142H206l-31 142Z" />
                        </svg>
                        <span class="nav-text">Market</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="drop-icon-arrow" height="48" viewBox="0 96 960 960" width="48">
                            <path d="M480 696 280 497h400L480 696Z" />
                        </svg>
                    </a>
                    <ul>

                        <li><a class="nav-userlist" href="javascript:void(0)"> View Listing</a></li>

                        <li><a class="nav-postedrates" href="javascript:void(0)">Prime Rates</a> </li>

                        <?php if ($user_type == 2 or  $user_type == 1) { ?>
                            <!-- <li><a class=" ai-icon nav-rates" href="javascript:void(0)">Offer Prime Rates</a></li> -->
                        <?php } ?>
                    </ul>
                </li>
                <li><a class=" ai-icon " href="javascript:void(0)" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48">
                            <path d="M352 876q-119-40-196-143T79 496q0-32 5-64t16-63l-64 37-30-51 173-100 100 172-52 30-58-99q-14 33-21.5 68t-7.5 71q0 116 68.5 205T383 823l-31 53Zm288-520v-60h115q-48-66-120.5-103T480 156q-69 0-128.5 25T246 250l-31-54q54-47 121-73.5T479 96q88 0 166 35.5T780 232v-76h60v200H640Zm-45 620L422 876l100-172 51 30-58 101q130-13 217.5-109.5T820 497q0-21-2.5-41t-7.5-40h62q4 20 6 40t2 40q0 143-89.5 253T562 888l63 37-30 51Z" />
                        </svg>
                        <span class="nav-text">Generate Eway</span>
                    </a>
                </li>
                <li><a class=" ai-icon " href="javascript:void(0)" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48">
                            <path d="M480 576Zm-400 0q0-83 31.5-156t86-127Q252 239 325 207.5T480 176q36 0 71 6t67 18q-14 10-25 22.5T574 249q-23-7-46-10t-48-3q-141 0-240.5 99T140 576q0 141 99.5 240.5T480 916q142 0 241-99.5T820 576q0-25-3-48t-10-46q14-8 26.5-19t22.5-25q12 32 18 67t6 71q0 82-31.5 155T763 858.5q-54 54.5-127 86T480 976q-82 0-155-31.5t-127.5-86Q143 804 111.5 731T80 576Zm640-130q-45 0-77.5-32.5T610 336q0-46 32.5-78t77.5-32q46 0 78 32t32 78q0 45-32 77.5T720 446Z" />
                        </svg>
                        <span class="nav-text">Alerts</span>
                    </a>
                </li>
                <li>
                    <div class="divider-side"></div>
                <li><a class=" ai-icon " href="javascript:void(0)" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48">
                            <path d="M180 936q-24 0-42-18t-18-42V276q0-24 18-42t42-18h462l198 198v462q0 24-18 42t-42 18H180Zm0-60h600V447.429H609V276H180v600Zm99-111h402v-60H279v60Zm0-318h201v-60H279v60Zm0 159h402v-60H279v60Zm-99-330v171.429V276v600-600Z" />
                        </svg>
                        <span class="nav-text">Market News</span>
                    </a>
                </li>
                <?php if ($appproved == '1') { ?>
                    <li><a class=" ai-icon nav-job" href="javascript:void(0)" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48">
                                <path d="M140 936q-24 0-42-18t-18-42V396q0-24 18-42t42-18h180V236q0-24 18-42t42-18h200q24 0 42 18t18 42v100h180q24 0 42 18t18 42v480q0 24-18 42t-42 18H140Zm0-60h680V396H140v480Zm240-540h200V236H380v100ZM140 876V396v480Z" />
                            </svg>
                            <span class="nav-text">Job Post</span>
                        </a>
                    </li>
                <?php } ?>
                <li><a class=" ai-icon " href="javascript:void(0)" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48">
                            <path d="M600 896q-134 0-227-93t-93-227q0-134 93-227t227-93q134 0 227 93t93 227q0 134-93 227t-227 93Zm-306-12q-113-14-183.5-103.5T40 576q0-115 70.5-204.5T294 268v58q-88 16-141 87.5T100 576q0 91 53 162.5T294 826v58Zm306-308Zm0 260q107 0 183.5-76.5T860 576q0-107-76.5-183.5T600 316q-107 0-183.5 76.5T340 576q0 107 76.5 183.5T600 836Z" />
                        </svg>
                        <span class="nav-text">Credit Q</span>
                    </a>
                </li>
                <li>
                    <div class="divider-side"></div>
                </li>
                <li><a class=" ai-icon " href="javascript:void(0)" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48">
                            <path d="m515 976-10-110h-40q-143 0-244-101T120 521q0-143 101.5-244T467 176q71 0 131.5 25.5T704 273q45 46 70.5 108.5T800 518q0 66-19.5 132T724 776q-37 60-90 111t-119 89Zm50-108q82-69 128.5-162.5T740 518q0-124-77.5-203T467 236q-120 0-203.5 83.5T180 521q0 118 83.5 201.5T465 806h100v62Zm-98-115q16 0 27-11t11-27q0-16-11-27t-27-11q-16 0-27 11t-11 27q0 16 11 27t27 11Zm-27-136h50q0-25 8.5-41.5T534 532q27-27 38-49.5t11-48.5q0-45-30.5-74T471 331q-42 0-75 22t-49 60l46 19q11-26 30.5-38.5T468 381q30 0 47 14.5t17 38.5q0 19-11 38.5T482 521q-27 28-34.5 45t-7.5 51Zm20-65Z" />
                        </svg>
                        <span class="nav-text">Complaints</span>
                    </a>
                </li>
                <li><a class=" ai-icon nav-about" href="javascript:void(0)" aria-expanded="false">
                        <i class="fa fa-id-card"></i>
                        <span class="nav-text">About US</span>
                    </a>
                </li>
                <li><a class=" ai-icon nav-contact" href="javascript:void(0)" aria-expanded="false">
                        <i class="fa fa-address-book" aria-hidden="true"></i>
                        <span class="nav-text">Contact US</span>
                    </a>
                </li>
            <?php  } ?>


<script>
    $('.ddmenu ul').hide();
    $(".ddmenu .has-arrow").click(function() {
        $('.ddmenu ul').hide();
        $(this).parent(".ddmenu").children("ul").slideToggle("0");
        //$(this).find(".right").toggleClass("fa-caret-up fa-caret-down");
    });

    $(".metismenu li").click(function () {
   $('.metismenu li').removeClass("activeclass");
   $(this).toggleClass("activeclass");
});
</script>