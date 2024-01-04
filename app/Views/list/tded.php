<!-- <div class="container-fluid">
    <div class="from-div-area">
        
        <div class="card-header p-0">
            <h4 class="card-title m-2 form-main-title"> <?php if($dashboard_type == 2){ echo ' Add Deckle Requirements For buying '; } else { echo 'Add Deckle List for selling  '; }?><?=$product['product_name'] ?? ''?> <br><small>Enter the product requirement </small></h4>
            <div class="pull-right float-end ">
                <ul class="nav nav_filter ">
                    <li class="nav-item text-end">
                         <a href="javascript:void(0)" class="addpurchase-text nav-list" >Back</a>
                    </li>
                </ul>
            </div>
        </div>
   
        
    <form class="" id="add_list_form" method="post" enctype="multipart/form-data">
            <input type="hidden" id="pquality" name="pquality" value=''> 
           <input type="hidden" id="specification" name="specification" value="<?=$product['product_specification'] ?? ''?>"> 
          <input type="hidden" name="deckle" id="deckle"  value="1"> 
        <input type="hidden" name="list_type" id="list_type"  value="<?=$dashboard_type?>"> 
       <!--  <input type="hidden" name="category_id" id="category_id"   value="<?=$product['product_category'] ?? ''?>">  -->
       <div class="from-section ">
            <div class=" size-4">
                <div class="form-row">
                    <div class="col-12 from-header mb-3">
                        <h6 class="from-heading">Listing Details</h6>
                    
                    </div>
                    
                    <?php 
                    if($listcount)
                    {
                         
                          $total_list =  $listcount + 1;
                          $total_list = sprintf('%04d', $total_list);
                          $total_list = 'LO-'.$total_list;

                      
                    } 
                    else{ $total_list =  1;
                          $total_list = sprintf('%04d', $total_list);
                          $total_list = 'LO-'.$total_list;}
                    ?>

                    <div class="form-group mb-0  col-md-3">
                        <div class="purchase-div">
                            <label> List Number </label><span class="text-danger">*</span>
                            <input type="text" class="form-control" name="list_number" id="list_number" placeholder="Product Name" value="<?= $total_list?>" readonly>
                        </div>
                        <span class="text-danger size-7 e_list_number"></span>
                    </div>


                    <div class="form-group col-md-3">
                        <label>Product Category</label><span class="text-danger">*</span>
                            <select  class="form-control " id="category" name="category_id" >
                            <option value="">Select product Category</option>
                             <?php
                                if ($productcategory) 
                                { foreach ($productcategory as $value)  
                                    { 
                                    ?>
                                    <option value="<?=$value['id']?>"><?=$value['product_category']?></option>
                                    <?php }
                                }?>
                        </select>
                            <span class="text-danger size-7 e_product_id"></span>
                    </div>
                    <div class="form-group mb-0 col-md-3">
                        <label>Search Product Name<noframes></noframes></label><span class="text-danger">*</span>
                        <input type="text" class="form-control list-product" name="txtCompany" id="txtCompany" tag="1" placeholder="Search proudct name" autocomplete="off" value="<?=$product['product_name'] ?? '' ?>" >
                        <div class="suggestionAra product"></div>
                        <input type="hidden" name="product_id" tag="1" id="product_id" value="<?=$product['id'] ?? ''?>" >
                        <span class="text-danger size-7 e_product_id"></span>
                    </div>

                    
                </div>
            </div>
        </div>
       
       
                   <!--  <?php
                        // $string = $product['product_specification'] ;
                        // $string = preg_replace('/\.$/', '', $string); //Remove dot at end if exists
                        // $array = explode(',', $string); //split string into array seperated by ', '
                        // foreach($array as $value) //loop over values
                        // {
                        //     echo $value . PHP_EOL; //print value
                        // }
                        ?> -->
                    <div class=" list_type_description" >
                    </div>
        
        <div class="">
            <div class="from-section size-4">
                <div class="form-row">  
                    <div class="col-12 from-header mb-3">
                        <h6 class="from-heading">Delivery Details</h6>
                    
                    </div>
                    <div class="form-group mb-0  col-md-3">
                                <label>Delivery Type</label><span class="text-danger">*</span>
                                    <select  class="form-control" id="delivery_type" name="delivery_type" >
                                        <option value="1" >Doorstep Delivery</option>
                                     
                                    </select>
                                 <span class="text-danger size-7 e_delivery_type"></span>
                        </div>
                        <div class="form-group mb-0  col-md-3">
                            <div class="field">    
                                <input type="text" class="" name="product_location" tag="1" id="product_location" placeholder="Ship to party location">
                                 <label for="product_location">Location<span class="text-danger">*</span></label> </div>
                                <span class="text-danger size-7 e_product_location"></span>
                           
                        </div>

                        <div class="form-group mb-0  col-md-3">
                                <label>Payment Terms</label><span class="text-danger">*</span>
                                
                                 <select  class="form-control" name="pterm" tag="1" id="pterm" >
                                         <option value=""  >Choose Payment Term</option>
                                        <option value="0"  >Advance</option>
                                        <option value="1" >Same Day</option>
                                        <option value="2" >Next Day</option>
                                        <option value="3" >15 Day</option>
                                        <option value="4" >30 Day</option>
                                        <option value="5" >45 Day</option>
                                     
                                    </select>
                                <span class="text-danger size-7 e_pterm"></span>
                        </div>
                        <div class="form-group mb-0  col-md-3">
                            <div class="field">
                               
                                <input type="text" class="" name="ddays" tag="1" id="ddays" placeholder="Delivery days">
                                 <label for="ddays">Delivery Days<span class="text-danger">*</span></label>
                            </div>
                                <span class="text-danger size-7 e_ddays"></span>
                        </div>
                    </div>
                </div>
            </div>
             <div class="">

                <div class="from-section size-4">
                    <div class="form-row">
                        <div class="form-group mb-2  col-md-12">
                            <div class="textarea-dec">
                                <label class="from-heading">Description</label>
                                <!-- <span class="textarea-input">Minimum 350 words</span> -->
                                <textarea type="text" rows="4" cols="5" class="form-control p-0 prodec" name="description" placeholder="Minimum 350 words"></textarea>
                            </div>
                        </div>
                    </div>

              



                </div>
                <div class="from-submit">
                    <button type="submit" class="subbtn ">Submit</button>
                </div>
            </div>
        </form>

         </div>  

</div>



                    
                
            
                <script src="<?=base_url()?>/public/public/js/plugins-init/pickadate-init.js" type="text/javascript">

                </script>
            <script >
                   $(document).ready(function  (){
                    var pquality  = $('#pquality').val();

                    var specification = $('#specification').val();
                   if(specification !=''){
                           
                         addSpecification(specification , '0', pquality);
                        }
                   });
                </script>












 -->
