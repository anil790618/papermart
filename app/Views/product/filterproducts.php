    <div class="row m-2">
    
   

        <?php 
      if (is_null($catstatus)){        
    if ($query) 
    {$i=1;
        foreach ($query as $value)  
        {  
            ?>
           
                    <div class="col-lg-6 p-2"> 
                         <div class="card p-0">
                            <div class="card-body p-0">
                                <div class="row">
                                    
                                    <div class="col-8 p-2 size-6 ">
                                        
                                        <div class="row">
                                            <div class="col-12 mb-4">
                                                <h4 class="text-black  mt-2 font-weight-bold"><?=$value['product_name'];?><br></h4>
                                                <small><?=$value['hsncode'];?> </small>
                                            </div>
                                           
                                            <div class="col-6 mb-2">
                                               <b>Type    </b>: <?=$value['typename'];?>
                                            </div>
                                            <div class="col-6 mb-2">
                                                <b >Category       </b>: <?=$value['catname'];?> <br>
                                            </div>
                                            <?php $string = $value['specarray'] ;
                                            $string = preg_replace('/\.$/', '', $string); 
                                            $array = explode(',', $string); 
                                            foreach($array as $value1) 
                                            {?>
                                                <div class="col-6 mb-2">
                                                <b><?=$value1?>  </b>: <?=$value[$value1];?>
                                            </div>
                                                <?php
                                               
                                                   
                                               
                                            }?>
                                           <!--  <div class="col-6 mb-2">
                                                <b>Size   </b>: <?=$value['size'];?>
                                            </div>
                                            <div class="col-6 mb-2">
                                               <b>UOM </b>: <?=$value['uom'];?> 
                                            </div> -->
                                        </div>
                                         <!-- <div class="col-6 p-2 productDescription" tag="<?=$value['id'];?>" style="background-color: #CECECE;"> View Specification
                                         </div> -->
                                          <a class=" productDescription pl-2" href="javascript:void(0)" tag="<?=$value['id'];?>"><span class="btn btn-primary size-5">  View Specification</span></a>
                                        <div class="mt-4">
                                         <?php if($user_type > 0){ ?> 
                                         <?php if(($user_type<=4 or $user_type==10) and ( !empty($value['sale_user']) or !empty($value['buy_user'])) ){
                                            if( preg_match("/$user_type/", $value['buy_user'])   ){ ?> 
                                                 <?php if($user_type!=4){ ?>
                                                     <a class="  <?php if($appproved == 0 ){ echo 'registeredServices';} else { echo 'nav-ordercat';}?>  " href="javascript:void(0)"  pid="<?=$value['id'];?>" otype="2" tag="<?=$product_category['id'];?>" parent="<?=$product_category['parentid'];?>"><span class="btn btn-primary size-5"> Buy</span></a>
                                                 <?php } ?>
                                           
                                         <?php } ?> 
                                        <?php if( preg_match("/$user_type/", $value['sale_user'])   ){ ?> 
                                            <a class="  <?php if($appproved == 0 ){ echo 'registeredServices';} else { echo 'nav-ordercat';}?> ml-2" href="javascript:void(0)"  pid="<?=$value['id'];?>" otype="1" tag="<?=$product_category['id'];?>" parent="<?=$product_category['parentid'];?>"><span class="btn btn-dark size-5">Sell</span></a>
                                        <?php } } else{ ?> 
                                           <?php if($user_type!=4){ ?> 
                                            <a class="  <?php if($appproved == 0 ){ echo 'registeredServices';} else { echo 'nav-ordercat';}?>  " href="javascript:void(0)"  pid="<?=$value['id'];?>" otype="2" tag="<?=$product_category['id'];?>" parent="<?=$product_category['parentid'];?>"><span class="btn btn-primary size-5"> Buy</span></a> <?php } ?>
                                             <a class="  <?php if($appproved == 0 ){ echo 'registeredServices';} else { echo 'nav-ordercat';}?> ml-2" href="javascript:void(0)"  pid="<?=$value['id'];?>" otype="1" tag="<?=$product_category['id'];?>" parent="<?=$product_category['parentid'];?>"><span class="btn btn-dark size-5">Sell</span></a>
                                         <?php } ?>
                                           <?php } ?>
                                    </div>
                                    </div>
                                    <div class="col-4 p-2 productDescription" tag="<?=$value['id'];?>" style="background-color: #CECECE;">
                                       <img src="<?=base_url()?>/document/product/<?=$value['product_image']?>" width=100%>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                    </div>
              
            <?php
            $i++;
            
           }
        }
       ?>
            <div class="col-lg-6 p-2"> 
                         <div class="card p-0">
                            <div class="card-body p-0">
                                <div class="row">
                                    <div class="col-8 p-2 size-6 ">
                                        <div class="col-12 mb-4">
                                            <h4 class="text-black  mt-2 font-weight-bold"><?=$product_category['product_category'];?><br></h4>
                                            
                                        </div>
                                        <div class="col-12 mb-2">
                                           <b>Customie your Product Requirement</b>
                                        </div>
                                        <div class="mt-4">
                                         <?php if($user_type > 0){ ?> 
                                         <?php if(($user_type<=4 or $user_type==10) and ( !empty($product_category['sale_user']) or !empty($product_category['buy_user'])) ){
                                            if( preg_match("/$user_type/", $product_category['buy_user'])   ){ ?> 
                                                 <?php if($user_type!=4){ ?>
                                                     <a class="  <?php if($appproved == 0 ){ echo 'registeredServices';} else { echo 'nav-ordercat';}?>  " href="javascript:void(0)" pid="0" otype="2" tag="<?=$product_category['id'];?>" parent="<?=$product_category['parentid'];?>"><span class="btn btn-primary size-5"> Buy</span></a>
                                                 <?php } ?>
                                           
                                         <?php } ?> 
                                        <?php if( preg_match("/$user_type/", $product_category['sale_user'])   ){ ?> 
                                            <a class="  <?php if($appproved == 0 ){ echo 'registeredServices';} else { echo 'nav-ordercat';}?> ml-2" href="javascript:void(0)"  pid="0" otype="1" tag="<?=$product_category['id'];?>" parent="<?=$product_category['parentid'];?>"><span class="btn btn-dark size-5">Sell</span></a>
                                        <?php } } else{ ?> 
                                           <?php if($user_type!=4){ ?> 
                                            <a class="  <?php if($appproved == 0 ){ echo 'registeredServices';} else { echo 'nav-ordercat';}?>  " href="javascript:void(0)"  pid="0" otype="2" tag="<?=$product_category['id'];?>" parent="<?=$product_category['parentid'];?>"><span class="btn btn-primary size-5"> Buy</span></a> <?php } ?>
                                             <a class="  <?php if($appproved == 0 ){ echo 'registeredServices';} else { echo 'nav-ordercat';}?> ml-2" href="javascript:void(0)"  pid="0" otype="1" tag="<?=$product_category['id'];?>" parent="<?=$product_category['parentid'];?>"><span class="btn btn-dark size-5">Sell</span></a>
                                         <?php } ?>
                                           <?php } ?>
                                    </div>
                                </div>
                                <div class="col-4 p-2" style="background-color: #CECECE;">
                                       <img src="<?=base_url()?>/public/public/images/defaultproduct.png" width=100%>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            <?php
        } else { ?>
              <?php
    if ($subcat) 
    {$i=1;
        foreach ($subcat as $value)  
        {  
            ?>
            <div class="col-lg-6 p-2"> 
                <div class="card p-0 productcat" tag="<?=$value['id']?>">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-8 p-2 size-6 ">
                                <div class="col-12 mb-4">
                                    <h4 class="text-black  mt-2 font-weight-bold"><?=$value['product_category'];?><br></h4>
                                    
                                </div>
                                <div class="col-12 mb-2">
                                   <b>Customie your Product Requirement</b>
                                </div>
                            </div>
                            <div class="col-4 p-2" style="background-color: #CECECE;">
                                   <img src="<?=base_url()?>/public/public/images/defaultproduct.png" width=100%>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
              
            <?php
            $i++;
            }
           
        }
       ?>
        <?php }?>
	  </div> 