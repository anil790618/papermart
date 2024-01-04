<style>
    #profileImage {
  font-family: Arial, Helvetica, sans-serif;
  width: 8rem;
  height: 8rem;
  border-radius: 50%;
  background: #004D3C;
  font-size: 3.5rem;
  color: #fff;
  text-align: center;
  line-height: 8rem;
}
</style>
<script>
 
    // $(document).ready(function  (){
    //     const fullName = document.getElementById('fullName').textContent;
    //     const intials = fullName.split(' ').map(name => name[0]).join('').toUpperCase();
    //     document.getElementById('profileImage').innerHTML = intials;
    // });
   
</script>
					
						<?php
// print_r($listedproduct);
                        ?>
<div class="container-fluid">
    <div class="card-header">
        <h4 class="card-title ">Listed Product Information</h4>
        <div class="pull-right float-end ">
            <ul class="nav nav_filter ">
                <li class="nav-item text-end">
                      <a class=" mb-2 mr-2 sendListResponse1" href="javascript:void(0)" title='response' addby="<?=$listedproduct['added_by']?>"  subcat="<?=$listspecification_waste['sub_category']??''?>" tag="<?=$listedproduct['id']?>"><span class="badge light badge-info badge-text-size"><i class="fa fa-send"></i> Send Response</span></a>
                   <!-- <a href="javascript:void(0)" class="btn btn-primary mb-2 addCart mr-2" tag="<?=$listedproduct['id']?>"><i class="fa fa-shopping-cart"></i>Add to Cart</a> -->
                 
                </li>
                <li class="nav-item text-end">
                   <a href="javascript:void(0)" class="btn btn-primary mb-2 nav-userlist" >Back</a>
                  
                </li>
            </ul>
        </div>
    </div>	
    <div class="row" >
            <div class=" col-lg-12">
                        <div class="card ">
                          
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 "><h5 class="card-title text-primary">Listing Details</h5></div>
                                    <div class="col-4">
                                        <span class="list-fea"> 
                                            <span class="feahead">Category Name</span> :<?=$listedproduct['catname']?>
                                        </span>
                                    </div>
                                    <div class="col-4">
                                        <span class="list-fea">
                                            <span class="feahead">Delivery Days </span> :<?=$listedproduct['delivery_days']; ?> Days
                                        </span>
                                    </div>
                                    <div class="col-4">
                                        <span class="list-fea">
                                            <span class="feahead">Delivery Type </span> :<?php if($listedproduct['delivery_type']==0){ echo 'Self Pick Up'; } else { echo 'Doorstep Delivery';}?>
                                        </span>
                                    </div>
                                    <div class="col-4 pt-2">
                                         <span class="list-fea">
                                            <span class="feahead">Location </span> :
                                            <?php
                                            if ($listedproduct['added_by']==3) {
                                                echo $listedproduct['product_location'];
                                              
                                            }else{
                                                if ($listedproduct['product_location']==1) {
                                                    echo "Alipur/Kheda";
                                                    }
                                                    if ($listedproduct['product_location']==2) {
                                                    echo "Nangloi";
                                                    } 
                                            }
                                            ?>
                                          
                                        </span>
                                    </div>
                                    <div class="col-4 pt-2">
                                         <span class="list-fea">
                                            <span class="feahead">Validity </span> :<?=$listedproduct['validity']?>
                                        </span>
                                    </div>
                                    <div class="col-4 pt-2">
                                         <span class="list-fea">
                                            <span class="feahead">Mill Name </span> :<?=$userdata['company_name']?>
                                        </span>
                                    </div>
                                    <?php
                                    $offer_rate = $listedproduct['rates_offered'];
                                    if ($offer_rate) {
                                         ?>
                                         <div class="col-4 pt-2">
                                            <span class="list-fea">
                                                <span class="feahead">Rates Offered Type </span> :<?=$listedproduct['rates_offered']?>
                                            </span>
                                        </div>
                                         <?php
                                    }
                                    
                                    ?>
                                    
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 ">
                            <div class="table-div">
                                <div class="tabel-body-div">
                                    <div class="table-responsive ">

                                        <div id="table">
                                            <table id="producttype_tbale" class="table table-responsive-md tabledata size-6">
                                                <tr class='text-center ' style='vertical-align:middle'>
                                                    <th> </th>
                                                    <?php
                                                    $string = $listedproduct['specification'] ;
                                                    $string = preg_replace('/\.$/', '', $string); //Remove dot at end if exists
                                                    $array = explode(',', $string); //split string into array seperated by ', '
                                                    foreach($array as $value) //loop over values
                                                    {
                                                        if ($value=='mill_name') {
                                                            echo '';
                                                        }
                                                        elseif($value=='quantity_uom'){echo'';}
                                                        elseif($value=='min_quantity_uom'){echo'';} 
                                                        elseif($value=='sub_category'){echo  '<th  class="labeltext text-center">'.str_replace("_","<br> ",$value).'</th>';} 
                                                        elseif($value=='min_quantity_per_gsm'){ 
                                                            $string = str_replace("_"," ",$value); 
                                                            $firstSpacePos = strpos($string, ' '); 
                                                            $secondSpacePos = strpos($string, ' ', $firstSpacePos + 1); 
                                                            $modifiedString = substr_replace($string, '<br>', $secondSpacePos, 1); 
                                                            echo  '<th style="vertical-align:middle"  class="labeltext text-center">'.$modifiedString.'</th>';} 
                                                        elseif($value=='min_quantity_pertruck'){ 
                                                            $string = str_replace("_"," ",$value); 
                                                            $firstSpacePos = strpos($string, ' '); 
                                                            $secondSpacePos = strpos($string, ' ', $firstSpacePos + 1); 
                                                            $modifiedString = substr_replace($string, '<br>', $secondSpacePos, 1); 
                                                            echo  '<th  style="vertical-align:middle" class="labeltext text-center">'.$modifiedString.'</th>';} 
                                                        elseif($value=='packing_per_ream'){ 
                                                            $string = str_replace("_"," ",$value); 
                                                            $firstSpacePos = strpos($string, ' '); 
                                                            $secondSpacePos = strpos($string, ' ', $firstSpacePos + 1); 
                                                            $modifiedString = substr_replace($string, '<br>', $secondSpacePos, 1); 
                                                            echo  '<th style="vertical-align:middle"  class="labeltext text-center">'.$modifiedString.'</th>';} 
                                                        elseif($value == 'rate' and $listedproduct['catname'] != 'Waste Paper'){
                                                            echo '<th style="vertical-align:middle"   class="labeltext">Rate offer</th> ';
                                                        }
                                                        else
                                                        {
                                                            echo '<th  class="labeltext" style="vertical-align:middle">'.str_replace("_"," ",$value).'</th>';
                                                        }
                                                        
                                                    }

                                                    // $string = 'Min Quantity Per Gsm'; 
                                                    // $firstSpacePos = strpos($string, ' '); 
                                                    // $secondSpacePos = strpos($string, ' ', $firstSpacePos + 1); 
                                                    // $modifiedString = substr_replace($string, '-', $secondSpacePos, 1); 
                                                    // echo $modifiedString;
                                                    
                                                    ?>
                                                    
                                                </tr>

                                                <?php
                                                if ($listspecification) {
                                                    $i = 1;
                                                    
                                                    foreach ($listspecification as $value) {
                                                ?>
                                                        <tr>
                                                           <td><input type="checkbox" class="checked_item" value="<?=$value['id']?>" name="checked[]"></td> 
                                                          <?php 
                                                           $pr='';
                                                           if($listedproduct['delivery_locations']){ 
                                                            if($listedproduct['delivery_locations']==1 &&(($listedproduct['d_pincode'] ==110020)||($listedproduct['d_pincode'] ==110043)) ){
                                                            $pr=1500;
                                                            }else{
                                                               $pr=1200;
                                                            }
                                                            if($listedproduct['delivery_locations']==2 || $listedproduct['delivery_locations']==3||$listedproduct['delivery_locations']==4||$listedproduct['delivery_locations']==5 ){
                                                            $pr=1200;
                                                            } 
                                                            if($listedproduct['delivery_locations']==6 || $listedproduct['delivery_locations']==7||$listedproduct['delivery_locations']==8||$listedproduct['delivery_locations']==9 ||$listedproduct['delivery_locations']==10||$listedproduct['delivery_locations']==11||$listedproduct['delivery_locations']==12 ){
                                                            $pr=3000;
                                                            } 
                                                            if($listedproduct['delivery_locations']==13){
                                                            $pr=2000;
                                                            } 
                                                            if($listedproduct['delivery_locations']==14){
                                                            $pr=2000;
                                                            } 
                                                           }
                                                        foreach($array as $data) //loop over values
                                                        {  
                                                            // print_r($data);
                                                            if($data == 'quantity_type'){ if($value[$data]==1){ echo '<td>Godown</td>'; } 
                                                                        else if($value[$data]==2) { echo '<td>Truck Load</td>';}
                                                                         else if($value[$data]==3) { echo '<td>Part Truck Load</td>';}
                                                                         else{ echo '<td>NA</td>';} }
                                                            else if( $data == 'product_form' ){ if($value[$data]==1){ echo '<td>Compressed</td>'; } else { echo '<td>Loose</td>';} }
                                                            else if( $data == 'brand_name' ){ echo '<td>'.$value['bname'].'</td>'; } 
                                                            else if( $data == 'sub_category' ){ echo '<td>'.$value['cname'].'</td>'; }
                                                             else if( $data == 'rate' ){
                                                                  if( $listedproduct['catname'] == 'Waste Paper' ){echo '<td> '.$value['rate'].' </td>';}
                                                                   else{
                                                                 $totalr = (int)$value['cashrate']+(int)$pr;
                                                                 echo '<td> '.$totalr.' ₹ </td>';
                                                             }   }else if( $data == 'mill_name'){}elseif($data=='quantity'){echo  '<td>'.$value[$data].' kg</td>';}elseif($data=='min_quantity_per_gsm'){echo  '<td>'.$value[$data].' kg</td>';}elseif($data=='min_quantity_pertruck'){echo  '<td>'.$value[$data].' kg</td>';}elseif($data=='quantity_uom'){echo'';}
                                                             elseif($data=='min_quantity_uom'){echo'';}
                                                             elseif($data=='rate_offer'){echo '<td>'.$value[$data].' </td>';}
                                                              else{ echo '<td>'.$value[$data].'</td>';}
                                                        }?>
                                                      
    
    <?php
if ( !empty($listspecification_waste['sub_category']) && $listspecification_waste['sub_category']==28) {
   ?>
     <table id="wastepapertable" style="" ><tr> </tr><tr><th></th><th>ON-Report</th><th>NON-Report</th></tr>
    <tr>
            <th>Scan</th>
            <td><input type="text" class="tableinput" disabled readonly  value="<?=$listspecification_waste['w_scan_on']??''?>" name="w_scan_on"></td>
            <td><input type="text" class="tableinput" disabled readonly  value="<?=$listspecification_waste['w_scan_non']??''?>" name="w_scan_non"></td>
        </tr>
        <tr>
            <th>Colour</th>
            <td><input type="text" class="tableinput" disabled readonly  value="<?=$listspecification_waste['w_color_on']??''?>" name="w_color_on"></td>
            <td><input type="text" class="tableinput" disabled readonly  value="<?=$listspecification_waste['w_color_non']??''?>" name="w_color_non"></td>
        </tr>
        <tr>
            <th>Copy</th>
            <td><input type="text" class="tableinput" disabled readonly  value="<?=$listspecification_waste['w_copy_on']??''?>" name="w_copy_on"></td>
            <td><input type="text" class="tableinput" disabled readonly  value="<?=$listspecification_waste['w_copy_non']??''?>" name="w_copy_non"></td>
        </tr>
        <tr>
            <th>Record</th>
            <td><input type="text" class="tableinput" disabled readonly  value="<?=$listspecification_waste['w_record_on']??''?>" name="w_record_on"></td>
            <td><input type="text" class="tableinput" disabled readonly  value="<?=$listspecification_waste['w_record_non']??''?>" name="w_record_non"></td>
        </tr>
        <tr>
            <th>Shorted Book</th>
            <td><input type="text" class="tableinput" disabled readonly  value="<?=$listspecification_waste['w_short_on']??''?>" name="w_short_on"></td>
            <td><input type="text" class="tableinput" disabled readonly  value="<?=$listspecification_waste['w_short_non']??''?>" name="w_short_non"></td>
        </tr>
        <tr>
            <th>White Cutting 1st Brightness 80% plus</th>
            <td><input type="text" class="tableinput" disabled readonly  value="<?=$listspecification_waste['w_whitecutting_on']??''?>" name="w_whitecutting_on"></td>
            <td><input type="text" class="tableinput" disabled readonly  value="<?=$listspecification_waste['w_whitecutting_non']??''?>" name="w_whitecutting_non"></td>
        </tr>
        <tr>
            <th>White Pepsi</th>
            <td><input type="text" class="tableinput" disabled readonly  value="<?=$listspecification_waste['w_pepsi_on']??''?>" name="w_pepsi_on"></td>
            <td><input type="text" class="tableinput" disabled readonly  value="<?=$listspecification_waste['w_pepsi_non']??''?>" name="w_pepsi_non"></td>
        </tr>
        <tr>
            <th>White Board</th>
            <td><input type="text" class="tableinput" disabled readonly  value="<?=$listspecification_waste['w_board_on']??''?>" name="w_board_on"></td>
            <td><input type="text" class="tableinput" disabled readonly  value="<?=$listspecification_waste['w_board_non']??''?>" name="w_board_non"></td>
        </tr>
        <tr>
            <th>Old Book</th>
            <td><input type="text" class="tableinput" disabled readonly  value="<?=$listspecification_waste['w_book_on']??''?>" name="w_book_on"></td>
            <td><input type="text" class="tableinput" disabled readonly  value="<?=$listspecification_waste['w_book_non']??''?>" name="w_book_non"></td>
        </tr>
        <tr>
            <th>Rulled Cutting</th>
            <td><input type="text" class="tableinput" disabled readonly  value="<?=$listspecification_waste['w_rulled_on']??''?>" name="w_rulled_on"></td>
            <td><input type="text" class="tableinput" disabled readonly  value="<?=$listspecification_waste['w_rulled_non']??''?>" name="w_rulled_non"></td>
        </tr>
        <tr>
            <th>Tick Mark Pepsi</th>
            <td><input type="text" class="tableinput" disabled readonly  value="<?=$listspecification_waste['w_tick_on']??''?>" name="w_tick_on"></td>
            <td><input type="text" class="tableinput" disabled readonly  value="<?=$listspecification_waste['w_tick_non']??''?>" name="w_tick_non"></td>
        </tr>
        </table>
   <?php
}

?>
    <?php
if (!empty($listspecification_waste['sub_category']) && $listspecification_waste['sub_category']==29) {
   ?>
     <table id="wastepapertable" style="" ><tr> </tr><tr><th></th><th>ON-Report</th><th>NON-Report</th></tr>
   
   <tr>
            <th>Corrugation Ist</th>
            <td><input type="text" class="tableinput"  form="update_wastpaper_price" value="<?=$listspecification_waste['k_corr1_on']??''?>" name="k_corr1_on"></td>
            <td><input type="text" class="tableinput"  form="update_wastpaper_price" value="<?=$listspecification_waste['k_corr1_non']??''?>" name="k_corr1_non"></td>
        </tr>
        <tr>
            <th>Corrugation IInd</th>
            <td><input type="text" class="tableinput"  form="update_wastpaper_price" value="<?=$listspecification_waste['k_corr2_on']??''?>" name="k_corr2_on"></td>
            <td><input type="text" class="tableinput"  form="update_wastpaper_price" value="<?=$listspecification_waste['k_corr2_non']??''?>" name="k_corr2_non"></td>
        </tr>
        <tr>
            <th>Dye Cutting</th>
            <td><input type="text" class="tableinput"  form="update_wastpaper_price" value="<?=$listspecification_waste['k_dye_on']??''?>" name="k_dye_on"></td>
            <td><input type="text" class="tableinput"  form="update_wastpaper_price" value="<?=$listspecification_waste['k_dye_non']??''?>" name="k_dye_non"></td>
        </tr>
        <tr>
            <th>Grey Board</th>
            <td><input type="text" class="tableinput"  form="update_wastpaper_price" value="<?=$listspecification_waste['k_grey_on']??''?>" name="k_grey_on"></td>
            <td><input type="text" class="tableinput"  form="update_wastpaper_price" value="<?=$listspecification_waste['k_grey_non']??''?>" name="k_grey_non"></td>
        </tr>
        <tr>
            <th>Duplex</th>
            <td><input type="text" class="tableinput"  form="update_wastpaper_price" value="<?=$listspecification_waste['k_duplex_on']??''?>" name="k_duplex_on"></td>
            <td><input type="text" class="tableinput"  form="update_wastpaper_price" value="<?=$listspecification_waste['k_duplex_non']??''?>" name="k_duplex_non"></td>
        </tr>
        <tr>
            <th>Mill Board</th>
            <td><input type="text" class="tableinput"  form="update_wastpaper_price" value="<?=$listspecification_waste['k_mill_on']??''?>" name="k_mill_on"></td>
            <td><input type="text" class="tableinput"  form="update_wastpaper_price" value="<?=$listspecification_waste['k_mill_non']??''?>" name="k_mill_non"></td>
        </tr>
        <tr>
            <th>Core Pipe</th>
            <td><input type="text" class="tableinput"  form="update_wastpaper_price" value="<?=$listspecification_waste['k_core_on']??''?>" name="k_core_on"></td>
            <td><input type="text" class="tableinput"  form="update_wastpaper_price" value="<?=$listspecification_waste['k_core_non']??''?>" name="k_core_non"></td>
        </tr>
        </table>
        <?php
}

?>

 

                                                        </tr>
                                                    <?php
                                                        $i++;
                                                    }
                                                } else {
                                                    if ($listspecification_waste) {
                                                        // print_r($listspecification_waste);
                                                         ?>
<tr>
    <td>1</td>
    <td> <?php
    if ($listspecification_waste['sub_category']==29) {
       echo "Kraft waste Paper";
    }else{
echo "White waste Paper";
    }
    
    ?></td>
    <td> 
<?php
$tr = $listspecification_waste['truck_ratio'];
if ($tr==1) {
    echo "100% Corrugation 1st";
} elseif ($tr==2) {
    echo "90% Corrugation 1st, 10% Corr 2nd";
} elseif ($tr==3) {
    echo "80% Corrugation 1st, 20% Corr 2nd";
} elseif ($tr==4) {
    echo "70% Corrugation 1st, 30% Corr 2nd ";
} elseif ($tr==5) {
    echo "70% Corrugation 1st, 15-25% Corr 2nd,5% Mill board,Duplex,Grey board etc ";
} elseif ($tr==6) {
    echo "65-70% Corrugation 1st, 25-35% Corr 2nd,5% Mill board,Duplex,Grey board etc";
} elseif ($tr==7) {
    echo "Grey board";
} 


?>
</td>
    <td></td><td></td>
    <td><?=$listspecification_waste['bundle_weight'] ?></td>
    <td><?=$listspecification_waste['valid_from'] ?></td> 
</tr>
<tr>


</tr>
                                                         <?php
                                                    }else{
?>
 <tr>
                                                        <td colspan="10">No Data</td>
                                                    </tr>
<?php
                                                    }
                                                    ?>
                                                <?php
                                                } ?>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                       
                           
        <?php if(!empty($listedproduct['list_pimage'])) { ?>
        <div class=" col-lg-7">
            <div class="row">
                <div class="col-12">
                     <div class="card ">
                      
                        <div class="card-body">
                           
                           <img src="<?=base_url()?>/document/product/<?=$listedproduct['list_pimage']?>" width=100%>
                       
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php }  ?>
       
        <?php if($listedproduct['deckle'] == 1) { ?>
        <div class=" col-lg-5 ">
            <div class="row ">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <span class="text-black font-w600"> Order Specification </span> 
                                    <div  id="table">
                                        <table id="producttype_tbale" class="table text-center tabledata size-6">
                                       <thead>
                                            <th>S.No</th>
                                            <th>Product Specification</th>
                                            <th>Size  </th>
                                            <th>Qty  </th>
                                        </thead>
                                       <tbody>
                                    <?php
                                    if ($decklesize) 
                                    {$i=1;
                                        foreach ($decklesize as $value)  
                                        { 
                                                
                                            ?>
                                            <tr id="row<?=$value['id']?>">
                                                <td class="row-id" ><?= $i;?></td>
                                                <td>BF : <?=$value['bf']?>; GSM : <?=$value['gsm']?>; Type: <?=$value['type']?></td>
                                                <td> <?=$value['size'];?></td>
                                                <td> <?=$value['quantity'];?> </td>
                                               
                                            </tr>
                                        <?php
                                        $i++;
                                        }
                                       
                                    }
                                    else
                                    {
                                      
                                        ?>
                                        <tr>
                                            <td colspan="3">No Data </td>
                                        </tr>
                                        <?php
                                    }?>
                                </tbody>
                                     </table>
                                    </div>
                                </div>
                                
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
        <?php }  ?>
                
            
       
    </div>
</div>

			

<script>
   
    $(document).on('click', '.sendListResponse1', function (e) {
    e.preventDefault();
    let id = $(this).attr('tag');
    let title = $(this).attr('title');
    let addby = $(this).attr('addby');
    $("#r-id").val(id);
    $("#titlev").val(title);
    $.ajax({
        type: "get",
        url: base_url + "checkUserListId?id=" + id+"&title="+title,
        data: {},
        success: function (jsonData) {
            console.log(jsonData);
            var jd = JSON.parse(jsonData);
            if (jd.is_empty == 0 && addby !=3) 
            {
                $('#userlist_request_modal').modal('show');
            } else 
            {
                let rid = jd.id;
                // let title=js.title;
                // const checkedValue = getCheckedValues();
                // var checkedValues = '"' + checkedValue + '"';
                // var newUrl = base_url + "send-listresponse/" + rid;
                // changeURL(newUrl, "Paper Send List Response");
                // location.reload()
                // getSendListResponse(id, checkedValues);
                if (jd.title == 'response') {
                    const checkedValue = getCheckedValues();
                    var checkedValues = '"' + checkedValue + '"';
                    var newUrl = base_url + "send-listresponse/" + rid;
                    changeURL(newUrl, "Paper Send List Response");
                    //location.reload()
                    getSendListResponse(rid, checkedValues);
                }
                if(jd.title=='view'){
                    var id = $(this).attr('tag');
                    var newUrl = base_url + "view-listproduct/" + rid;
                    changeURL(newUrl, "Paper View List Product");
                    //location.reload() 
                    getViewListProduct(rid);
                }
            }
        }
    })
});
</script>












