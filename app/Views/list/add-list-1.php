
<script>
 
    $(document).ready(function  (){
    var product_category = $('#category_id').val();
    var list_type = $('#list_type').val();
    var pid = $('#product_id').val();
    if(pid == ''){
        $('#txtCompany'). val('Waste Paper');
        $('#product_id'). val('1');
    }
    if(product_category == '1' || product_category == ''){ 

    if(list_type == '1'){ 
       $('.list_type_description').html('<div class="form-inline mb-3 col-md-12 border-bottom"><h4 class="text-primary mr-2">Sale Specification </h4> </div> <div class="form-group mb-0 col-md-4"> <label>Product Form</label><span class="text-danger">*</span> <select  class="form-control" id="waste_product_type" name="waste_product_type" > <option value="0" selected >Loose</option>  <option value="1" >Compressed</option> </select> <span class="text-danger size-7 e_waste_product_type"></span>  </div> <div class="form-group mb-0  col-md-4"> <label> Selling  Rate</label><span class="text-danger">*</span> <input type="text" class="form-control" name="buying_rate" tag="1" id="buying_rate"  ><span class="text-danger size-7 e_buying_rate"></span></div><div class="form-group mb-0  col-md-4"><label>Product Image</label><span class="text-danger">*</span><input type="file" class="form-control " name="pimage" tag="1" > <span class="text-danger size-7 e_qty"></span></div> ') ;
       $('.quantity_type').html('<label>Quantity Type</label><span class="text-danger">*</span><select class="form-control " name="quantity_type" id="quantity_type"> <option value="0"> NA</option><option value="2"> Truck Load</option></select><span class="text-danger size-7 e_quantity_type"></span> ') ;
      
        }
        else if(list_type == '2'){
           $('.list_type_description').html(' <div class="form-inline mb-3 col-md-12 border-bottom"><h4 class="text-primary mr-2">Purchase Specification </h4> </div><div class="form-group mb-0 col-md-4"> <label>Product Form</label><span class="text-danger">*</span> <select  class="form-control" id="waste_product_type" name="waste_product_type" > <option value="0" selected >Loose</option>  <option value="1" >Compressed</option> </select> <span class="text-danger size-7 e_waste_product_type"></span>  </div> <div class="form-group mb-0  col-md-4"> <label> Buying  Rate</label><span class="text-danger">*</span> <input type="text" class="form-control" name="buying_rate" tag="1" id="buying_rate"  ><span class="text-danger size-7 e_buying_rate"></span></div> <div class="form-group mb-0 col-md-4"><label>Quantity Type</label><span class="text-danger">*</span><select class="form-control " name="quantity_type" id="quantity_type"> <option value="0"> NA</option><span class="text-danger size-7 e_quantity_type"></span></div') ;
        
        }
    }
    else {  
        var otherdata = '';
        otherdata+='<div class="form-inline mb-3 col-md-12 border-bottom"><h4 class="text-primary mr-2">Product Specification </h4> </div> <div class="form-group mb-0  col-md-3"> <label>Mill Name</label><span class="text-danger">*</span> <input type="text" class="form-control " name="mill_name"  >   <span class="text-danger size-7 e_mill_name"></span> </div>';

        otherdata+=' <div class="form-group mb-0  col-md-3"><label>GSM (Grams/Sq Metre)</label><span class="text-danger">*</span><input type="text" class="form-control " name="gsm"  required> <span class="text-danger size-7 e_gsm"></span>   </div>';

        otherdata+='<div class="form-group mb-0  col-md-3"><label>Size</label><span class="text-danger">*</span><input type="text" class="form-control " name="psize"  required>  <span class="text-danger size-7 e_size"></span>  </div>';
                      
        otherdata+='<div class="form-group mb-0  col-md-3"><label>BF (Bursting factor)</label><span class="text-danger">*</span><input type="text" class="form-control " name="bf"  required><span class="text-danger size-7 e_bf"></span>  </div>';

        otherdata+='<div class="form-group mb-0  col-md-3"><label>Pulp</label><input type="text" class="form-control " name="pulp"  required>  <span class="text-danger size-7 e_pulp"></span>  </div>';

        otherdata+='<div class="form-group mb-0  col-md-3"> <label>Shade</label> <input type="text" class="form-control " name="shade"  required> <span class="text-danger size-7 e_shade"></span> </div>';
                        
        otherdata+='<div class="form-group mb-0  col-md-3"> <label>Brightness</label>  <input type="text" class="form-control " name="brightness"  required>   <span class="text-danger size-7 e_brightness"></span>  </div>';

      

        $('.quantity_type').css('display', 'none');
       $('.list_type_description').html(otherdata);
      
    }
    });
   
</script>
                    
                        
<div class="container-fluid">
    <div class="table-div">
        <div class="table-header-div">
            <h4 class="table-title "> <?php if($dashboard_type == 2){ echo ' Add Requirements For buying '; } else { echo 'Add List for selling  '; }?><?=$product['product_name'] ?? ''?> <br><small>Enter the product requirement </small></h4>
            
            <div class="tabel-link-btn ">
                <ul class="nav nav_filter ">
                    <li class="nav-item text-end">
                       <a href="javascript:void(0)" class="addpurchase-text nav-list" >Back</a>
                      
                    </li>
                </ul>
            </div>
        </div> 
    </div>  
        
    <form class="" id="add_list_form" method="post" enctype="multipart/form-data">
        <input type="hidden" name="list_type" id="list_type"  value="<?=$dashboard_type?>"> 
        <input type="hidden" name="category_id" id="category_id"  value="<?=$product['product_category'] ?? ''?>"> 
        <div class="card  mb-2">
            <div class="card-body size-4">
                <div class="form-row">
                     <div class="form-inline mb-3 col-md-12 border-bottom "><h4 class="text-primary mr-2">Listing Details </h4><small>Basic Listing Information  </small> </div>  
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
                        <label> List Number </label><span class="text-danger">*</span>
                        <input type="text" class="form-control" name="list_number" id="list_number" placeholder="Product Name" value="<?= $total_list?>" readonly>
                        <span class="text-danger size-7 e_list_number"></span>
                    </div>
                    <div class="form-group mb-0 col-md-3">
                        <label>Search Product Name<noframes></noframes></label><span class="text-danger">*</span>
                        <input type="text" class="form-control list-product" name="txtCompany" id="txtCompany" tag="1" autocomplete="off" value="<?=$product['product_name'] ?? '' ?>" readonly>
                        <div class="suggestionAra product"></div>
                        <input type="hidden" name="product_id" tag="1" id="product_id" value="<?=$product['id'] ?? ''?>" >
                        <span class="text-danger size-7 e_product_id"></span>
                    </div>

                            
                    <div class="form-group col-md-3">
                        <label>Product Quality</label><span class="text-danger">*</span>
                       <select  class="form-control " id="product_quality" name="product_quality" >
                            <option value="" selected>Choose...</option>
                             <?php
                                if ($product_quality) 
                                { foreach ($product_quality as $value)  
                                    { 
                                    ?>
                                    <option value="<?=$value['id']?>"><?=$value['product_quality']?></option>
                                    <?php }
                                }?>
                        </select>
                        <span class="text-danger size-7 e_product_quality"></span>
                    </div>
                    <div class="form-group mb-0  col-md-3">
                        <label>Qty ( in Kg )</label><span class="text-danger">*</span>
                        <input type="text" class="form-control qty qtyvalidation" name="qty" tag="1" id="maxqty" >
                        <span class="text-danger size-7 e_qty"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card  mb-2">
            <div class="card-body size-4">
                <div class="form-row">              
                    
                    <div class="form-row mb-0  col-md-12  list_type_description  ">
                      
                    </div>
                 </div>
            </div>
        </div>
        <div class="card  mb-2">
            <div class="card-body size-4">
                <div class="form-row">  
                    <div class="form-inline mb-3 col-md-12 border-bottom"><h4 class="text-primary mr-2">Delivery Details </h4> <small> Enter Product delivery Specification required  </small> </div>  
                    <div class="form-group mb-0  col-md-3">
                                <label>Delivery Type</label><span class="text-danger">*</span>
                                    <select  class="form-control" id="delivery_type" name="delivery_type" >
                                        <?php if($product['product_category'] ){ if($product['product_category'] =='1' ){ ?><option value="0" selected >Self Pick Up</option> <?php } }else{ ?> <option value="0" selected >Self Pick Up</option> <?php } ?>
                                        <option value="1" >Doorstep Delivery</option>
                                     
                                    </select>
                                 <span class="text-danger size-7 e_delivery_type"></span>
                        </div>
                        <div class="form-group mb-0  col-md-3">
                                <label>Location</label><span class="text-danger">*</span>
                                <input type="text" class="form-control" name="product_location" tag="1" id="product_location">
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
                                <label>Delivery Days</label><span class="text-danger">*</span>
                                <input type="text" class="form-control" name="ddays" tag="1" id="ddays">
                                <span class="text-danger size-7 e_ddays"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card  mb-0">
                <div class="card-body size-4">
                   
                        <div class="form-row">    
                            <div class="form-group mb-3  col-md-12 border-bottom">
                                <label>Description</label>
                                <textarea type="text" class="form-control" name="description"></textarea>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                     
                </div>
            </div>    
        </form>
</div>



                    
                
            
                <script src="public/public/js/plugins-init/pickadate-init.js" type="text/javascript"></script>
            













