<div class="">
    <div class="from-div-area">
        
        <div class="card-header p-0">
            <h4 class="card-title m-2 form-main-title"> Post Rates</h4>
            <div class="pull-right float-end ">
                <ul class="nav nav_filter ">
                    <li class="nav-item text-end">
                         <a href="javascript:void(0)" class="addpurchase-text nav-rates" >Back</a>
                    </li>
                </ul>
            </div>
        </div>
    <form class="" id="add_rates_form" method="post" enctype="multipart/form-data">
        <input type="hidden" name="list_type" id="list_type"  value="<?=$dashboard_type?>"> 
        <input type="hidden" name="category_id" id="category_id"   value="<?=$product['product_category'] ?? ''?>">
        <input type="hidden" id="pdata" value='<?=json_encode($product);?>'>
        <input type="hidden" id="subcatid" value="<?=$subcatid;?>" > 
         <input type="hidden" name="pid" id="pid"   value="<?=$product['id'] ?? ''?>"> 
        <div class="from-section ">
            <div class=" size-4">
                <div class="form-row">
                    <div class="col-12 from-header mb-3">
                        <h6 class="from-heading">Post Rate Details</h6>
                    
                    </div>
                    <div class="col-3 p-2 ">
                        <label>Rate Posting Type <span class="text-danger"> *</span></label>
                        <select  class="form-control" id="post_type" name="post_type" required>
                           <?php if($user_type == 1 or $user_type == 2){ ?> 
                            <option value="" >Choose</option>
                            <option value="3" >Prime Rate</option>
                           <?php } 
                           else { ?> 
                          
                            <option value="2" selected >Sauda Rate</option>
                            <?php } ?>
                        </select>
                        <span class="size-7 e_post_type text-danger"></span>
                    </div>
                    <div class="form-group col-md-3 p-2">
                        <label>Product Category</label><span class="text-danger">*</span>
                        <select  class="form-control ratecat" id="category" name="category" >
                            <option value="" > Choose category</option>
                             <?php
                                if ($category) 
                                { foreach ($category as $value)  
                                    { 
                                    ?>
                                    <option value="<?=$value['id']?>" <?php if($catdata){  if($value['id'] == $catdata['id']){ echo 'selected';} }?> ><?=$value['product_category']?></option>
                                    <?php }
                                }?>
                        </select>
                        <span class="text-danger size-7 e_product_category"></span>
                    </div>
                    
                         <div class="col-3 p-2 "> 
                            <label>Validity</label> 
                            <input type="datetime-local" name="validity" class="form-control" required>
                            <span class="size-7 e_validity text-danger"></span> 
                        </div>
                        <div class="col-3 p-2 ">
                            <label>Rates offered<span class="text-danger"> *</span></label>
                            <select  name="rates_offered" class="form-control">
                                <option value="Ex-mill"> Ex-mill</option>
                                <option value="Ex-Godown"> Ex-Godown</option>
                                <option value="FOR"> FOR</option>
                            </select>
                            <span class="size-7 e_rates_offered text-danger"></span>
                        </div>
                   
                </div>
            </div>
        </div>

           <input type="hidden" id="pquality" name="pquality"> 
           <input type="hidden" id="sub_category" name="sub_category" > 
           <input type="hidden" id="brand" name="brand" > 
           <input type="hidden" id="specification" name="specification" > 
                    <?php
                       // $string = $product['product_specification'] ;
                      //  $string = preg_replace('/\.$/', '', $string); //Remove dot at end if exists
                        // $array = explode(',', $string); //split string into array seperated by ', '
                        // foreach($array as $value) //loop over values
                        // {
                        //     echo $value . PHP_EOL; //print value
                        // }?> 
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
                                 <label for="product_location">Prefered Location<span class="text-danger">*</span></label> </div>
                                <span class="text-danger size-7 e_product_location"></span>
                           
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

<script src="<?=base_url()?>/public/public/js/plugins-init/pickadate-init.js" type="text/javascript"></script>
            <script >
                   // $(document).ready(function  (){
                   //  var pquality  = $('#pquality').val();
                   //  var sub_category  = $('#sub_category').val();
                   //  var specification = $('#specification').val();
                   //  var subcatid = $('#subcatid').val();
                   //  var pid = $('#pid').val();
                   //  if(specification !=''){
                        
                   //       addSpecification(specification , '1', pquality, sub_category, subcatid);
                   //      }
                   //  if(pid !=''){
                       
                   //   getproductdata('1',pid);
                   //  }
                   //  if(subcatid > 0 ){
                        
                   //   checkresponsivespec(1, subcatid,pid)
                   // }
                   // });
// $(document).on("change", ".ratecat", function(e) {
//   alert();
   
// });
                  
                </script>













