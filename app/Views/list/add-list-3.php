<script>
 
$(document).ready(function  (){
var product_category = $('#category_id').val();
var list_type = $('#list_type').val();
var pid = $('#product_id').val();


if(product_category == '1'){ 
 
    $('.pquality').css('display', '');
   $('.list_type_description').html(' <div class="form-group mb-0 col-md-6">   <label>Product Form</label><span class="text-danger">*</span><select id="inputState" class="form-control" id="waste_product_type" name="waste_product_type" >  <option value="0" selected >Loose</option> <option value="1" >Compressed</option> </select> <span class="text-danger size-7 e_rate1"></span> </div><div class="form-group mb-0  col-md-6"><label>Quantity Type</label><span class="text-danger">*</span><select class="form-control " name="quantity_type" id="quantity_type"> <option value="1"> Godown</option><option value="2"> Truck Load</option><option value="3">Part Load</option></select><span class="text-danger size-7 e_size"></span> </div>') }
else if(product_category == '2'){
 
$('.pquality').css('display', 'none');
   var buydata = '';
   buydata+='<div class="form-group mb-0  col-md-2"><label>Mill Name</label><input type="text" class="form-control " name="mill_name" tag="1" > <span class="text-danger size-7 e_mill_name"></span> </div>';

   buydata+='<div class="form-group mb-0  col-md-2"><label>BF (Bursting factor)</label><span class="text-danger">*</span><input type="text" class="form-control " name="bf" tag="1" required> <span class="text-danger size-7 e_bf"></span> </div>';

   buydata+='<div class="form-group mb-0  col-md-2"><label>GSM (Grams/Sq Metre)</label><span class="text-danger">*</span><input type="text" class="form-control " name="gsm" tag="1" required> <span class="text-danger size-7 e_gsm"></span> </div>';

   buydata+='<div class="form-group mb-0  col-md-2"><label>Type</label><span class="text-danger">*</span><input type="text" class="form-control " name="type" tag="1" required> <span class="text-danger size-7 e_type"></span> </div>';

   buydata+='<div class="form-group mb-0  col-md-2"><label>Size</label><span class="text-danger">*</span><input type="text" class="form-control " name="psize" tag="1" required> <span class="text-danger size-7 e_size"></span> </div>';

   buydata+='<div class="form-group mb-0  col-md-2"><label>Quantity Type</label><span class="text-danger">*</span><select class="form-control " name="quantity_type" id="quantity_type"> <option value="1"> Godown</option><option value="2"> Truck Load</option><option value="3">Part Load</option></select><span class="text-danger size-7 e_size"></span> </div>';

   $('.list_type_description').html(buydata);
}
else if(product_category == ''){
    if(list_type == '2'){ 
      $('#txtCompany'). val('Waste Paper');
    $('#product_id'). val('1');
    $('.pquality').css('display', '');
   $('.list_type_description').html('<div class="form-group mb-0 col-md-6">   <label>Product Form</label><span class="text-danger">*</span><select id="inputState" class="form-control" id="waste_product_type" name="waste_product_type" >  <option value="0" selected >Loose</option> <option value="1" >Compressed</option> </select> <span class="text-danger size-7 e_rate1"></span> </div><div class="form-group mb-0  col-md-6"><label>Quantity Type</label><span class="text-danger">*</span><select class="form-control " name="quantity_type" id="quantity_type"> <option value="1"> Godown</option><option value="2"> Truck Load</option><option value="3">Part Load</option></select><span class="text-danger size-7 e_size"></span> </div>') }
else if(list_type == '1'){
   $('#txtCompany'). val('Kraft Paper');
    $('#product_id'). val('3');
$('.pquality').css('display', 'none');
   var buydata = '';
   buydata+='<div class="form-group mb-0  col-md-2"><label>Mill Name</label><input type="text" class="form-control " name="mill_name" tag="1" > <span class="text-danger size-7 e_mill_name"></span> </div>';

   buydata+='<div class="form-group mb-0  col-md-2"><label>BF (Bursting factor)</label><span class="text-danger">*</span><input type="text" class="form-control " name="bf" tag="1" required> <span class="text-danger size-7 e_bf"></span> </div>';

   buydata+='<div class="form-group mb-0  col-md-2"><label>GSM (Grams/Sq Metre)</label><span class="text-danger">*</span><input type="text" class="form-control " name="gsm" tag="1" required> <span class="text-danger size-7 e_gsm"></span> </div>';

   buydata+='<div class="form-group mb-0  col-md-2"><label>Type</label><span class="text-danger">*</span><input type="text" class="form-control " name="type" tag="1" required> <span class="text-danger size-7 e_type"></span> </div>';

   buydata+='<div class="form-group mb-0  col-md-2"><label>Size</label><span class="text-danger">*</span><input type="text" class="form-control " name="psize" tag="1" required> <span class="text-danger size-7 e_size"></span> </div>';

   buydata+='<div class="form-group mb-0  col-md-2"><label>Quantity Type</label><span class="text-danger">*</span><select class="form-control " name="quantity_type" id="quantity_type"> <option value="1"> Godown</option><option value="2"> Truck Load</option><option value="3">Part Load</option></select><span class="text-danger size-7 e_size"></span> </div>';

   $('.list_type_description').html(buydata);
}
}
else{
    var otherdata = '';
   otherdata+=' <div class="form-group mb-0  col-md-3"> <label>Mill Name</label><span class="text-danger">*</span> <input type="text" class="form-control " name="mill_name"  >   <span class="text-danger size-7 e_mill_name"></span> </div>';

    otherdata+=' <div class="form-group mb-0  col-md-3"><label>GSM (Grams/Sq Metre)</label><span class="text-danger">*</span><input type="text" class="form-control " name="gsm"  required> <span class="text-danger size-7 e_gsm"></span>   </div>';

    otherdata+='<div class="form-group mb-0  col-md-3"><label>Size</label><span class="text-danger">*</span><input type="text" class="form-control " name="psize"  required>  <span class="text-danger size-7 e_size"></span>  </div>';
                  
    otherdata+='<div class="form-group mb-0  col-md-3"><label>BF (Bursting factor)</label><span class="text-danger">*</span><input type="text" class="form-control " name="bf"  required><span class="text-danger size-7 e_bf"></span>  </div>';

    otherdata+='<div class="form-group mb-0  col-md-3"><label>Pulp</label><input type="text" class="form-control " name="pulp"  required>  <span class="text-danger size-7 e_pulp"></span>  </div>';

    otherdata+='<div class="form-group mb-0  col-md-3"> <label>Shade</label> <input type="text" class="form-control " name="shade"  required> <span class="text-danger size-7 e_shade"></span> </div>';
                    
    otherdata+='<div class="form-group mb-0  col-md-3"> <label>Brightness</label>  <input type="text" class="form-control " name="brightness"  required>   <span class="text-danger size-7 e_brightness"></span>  </div>';

  

    $('.pquality').css('display', '');
   $('.list_type_description').html(otherdata);
}
    });
   
</script>                                 
                        
<div class="container-fluid">
    <div class="card-header p-0">
        <h4 class="card-title m-2"><?php if($dashboard_type == 2){ echo ' Add Requirements For buying '; } else { echo 'Add List for selling  '; }?> <?=$product['product_name']?></h4>
        <div class="pull-right float-end ">
            <ul class="nav nav_filter ">
                <li class="nav-item text-end">
                   <a href="javascript:void(0)" class="btn btn-primary mb-2 nav-list" >Back</a>
                  
                </li>
            </ul>
        </div>
    </div>  
        
    <form class="" id="add_list_form" method="post" enctype="multipart/form-data">
         <input type="hidden" name="list_type" id="list_type"  value="<?=$dashboard_type?>"> 
         <input type="hidden" name="category_id" id="category_id"  value="<?=$product['product_category']?>"> 
        <div class="card  mb-0">
            <div class="card-body size-4">
                <div class="form-row">
                  
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
                        <label># List</label><span class="text-danger">*</span>
                        <input type="text" class="form-control" name="list_number" id="list_number" placeholder="Product Name" value="<?= $total_list?>" readonly>
                        <span class="text-danger size-7 e_list_number"></span>
                    </div>
                   
                
                             <div class="form-group mb-0 col-md-3">
                                <label>Product <noframes></noframes></label><span class="text-danger">*</span>
                                <input type="text" class="form-control list-product" name="txtCompany" id="txtCompany"  tag="1" autocomplete="off" value="<?=$product['product_name']?>" readonly>
                                <div class="suggestionAra product"></div>
                                <input type="hidden" name="product_id" tag="1" id="product_id" value="<?=$product['id']?>">
                                <span class="text-danger size-7 e_product_id"></span>
                            </div>

                            
                                    <div class="form-group col-md-2 pquality">
                                        <label>Product Quality</label><span class="text-danger">*</span>
                                       <select id="inputState" class="form-control " id="product_quality" name="product_quality" >
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
                                    <div class="form-group mb-0  col-md-2">
                                        <label>Qty</label><span class="text-danger">*</span>
                                        <input type="text" class="form-control qty qtyvalidation" name="qty" tag="1" id="maxqty" >
                                        <span class="text-danger size-7 e_qty"></span>
                                    </div>
                                   
                                 
                                    <div class="form-group mb-0  col-md-2">
                                            <label><?php if($dashboard_type == 2){ echo ' Buying'; } else { echo ' Selling '; }?> Rate</label><span class="text-danger">*</span>
                                            <input type="text" class="form-control" name="buying_rate" tag="1" id="buying_rate"  >
                                            <span class="text-danger size-7 e_buying_rate"></span>
                                    </div>
                                   
                                   
                                <div class="form-row list_type_description">    
                      
                    </div>
                                
                    <div class="form-group mb-0 col-md-3">
                        <label>Delivery Type</label><span class="text-danger">*</span>
                        <select  class="form-control" id="delivery_type" name="delivery_type" >
                             <!-- <option value="0" selected >Self Pick Up</option> -->
                           <option value="1" selected>Doorstep Delivery</option>
                        </select>
                        <span class="text-danger size-7 e_rate1"></span>
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
               
                  
                             
                   

                    <div class="card-body size-4">
                                <div class="form-row">    
                                    <div class="form-group mb-3  col-md-12">
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
            













