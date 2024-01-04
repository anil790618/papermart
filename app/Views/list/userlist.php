<div class="container-fluid">

    <h4 class="card-title m-2"><?php if ($dashboard_type == 2) {
                                    echo 'Posted Listing ';
                                } else {
                                    echo 'Posted Requirement';
                                } ?></a></h4>

    <div class="row">
        <div class=" col-sm-4 col-md-4 col-lg-3 col-xl-3">
            <div class="fliter-div-uerlist ">
                <div class="card-body ">
                    <h4 class="text-black mb-4 mt-2 font-weight-bold">Quantity</h4>
                    <input type="checkbox" class="mr-3 mb-3"> 0kg - 50kg<br>
                    <input type="checkbox" class="mr-3 mb-3"> 50kg - 100kg <br>
                    <input type="checkbox" class="mr-3 mb-3"> 100kg - 150kg <br>
                    <input type="checkbox" class="mr-3 mb-3"> 150kg - 200kg <br>
                    <input type="checkbox" class="mr-3 mb-3"> 200kg - 250kg <br>


                    <h4 class="text-black mb-4 mt-4 font-weight-bold">Quality</h4>
                    <input type="checkbox" class="mr-3 mb-3"> Grade A<br>
                    <input type="checkbox" class="mr-3 mb-3"> Grade B <br>
                    <input type="checkbox" class="mr-3 mb-3"> Grade C <br>
                    <input type="checkbox" class="mr-3 mb-3"> Grade D <br>
                    <input type="checkbox" class="mr-3 mb-3"> Grade E <br>

                    <h4 class="text-black mb-4 mt-4 font-weight-bold">Rate</h4>
                    <input type="checkbox" class="mr-3 mb-3"> Rs 500 - Rs 1000 <br>
                    <input type="checkbox" class="mr-3 mb-3"> Rs 1000 - Rs 1500 <br>
                    <input type="checkbox" class="mr-3 mb-3"> Rs 1500 - Rs 2000 <br>
                    <input type="checkbox" class="mr-3 mb-3"> Rs 2000 - Rs 2500 <br>
                </div>
            </div>
        </div>
        <div class="col-sm-8 col-md-8 col-lg-9 col-xl-9">
            <div class="row m-2">

           
            <?php
            if ($listposted) {
                $i = 1;
                foreach ($listposted as $value) {

            ?>
                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-12">
                        <div class="col-lg-12">
                            <div class="product-card-userlist mr-3">
                                <div class="card-body p-0">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-3"> 
                                            <div class="product-images">
                                                 <?php if (!empty($value['list_pimage'])) { ?>
                                                <img src="<?= base_url() ?>/document/product/<?= $value['list_pimage'] ?>">
                                                <?php } else { ?> 
                                                <img src="<?=base_url()?>/public/public/images/defaultproduct.png" width=100%>
                                                <?php } ?>
                                            </div>

                                        </div>
                                     
                                      
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-9">
                                            <div class="userlist-pro-el">
                                               <!--  <div class="deluser-div"> -->

                                                    <h4 class="text-black font-weight-bold"><?= $value['pcatname']; ?> <?php if($value['list_type'] == 1){ echo '<span class="badge badge-secondary">Sell</span>'; } else { echo '<span class="badge badge-warning">Buy</span>';  }?> <br><small class="text-danger">

                                                    <?php 
                                                    // $cdate = date('Y-m-d H:i:s');
                                                    // $datetime1 = new DateTime($value['added_date']);
                                                    // $datetime2 = new DateTime($cdate);
                                                    // $interval = $datetime1->diff($datetime2);
                                                    // echo $interval->format(' %d days %h hour  %i minutes'); 
                                                   // echo  $value['added_date'];
                                                   //  echo $cdate ;
                                                    // $messageTimestamp = "2022-05-12 10:30:00";
                                                     $messageTimestamp = $value['added_date'];
                                                    $timing = getMessageTiming($messageTimestamp);
                                                    echo $timing; // Output: "2 hour ago"
                                                    ?>
                                                       
                                                    </small><br>
                                                    <?php if($value['interested_id']) { echo '<strong><small class="text-success"> Request Sent </small></strong>';}?>
                                                    <?php if ($value['deckle'] == 1) { ?>
                                                        <small class="text-danger">Offer On Extra Stock and Deckle Stock</small><?php } ?></h4>
                                                    <div class="inner-con-user-list">
                                                        <div class="row">
                                                        <?php
                                                        if ( $value['category'] ==1) {
                                                          ?>
                                                            <div class="col-6 list-col-userlist">
                                                                <span class="list-fea"><span class="feahead">Sub category </span> : <?php
                                                                if ($value['subcategory']==29) {
                                                                   echo "Kraft waste Paper";
                                                                }else{
                                                                    echo "White waste Paper";
                                                                }
                                                                ?></span>
                                                            </div>
                                                            
                                                            <div class="col-6 list-col-userlist">
                                                                <span class="list-fea"><span class="feahead">Valid from </span> : <?= $value['valid_from']??''; ?> </span>
                                                            </div>
                                                            <div class="col-6 list-col-userlist">
                                                                <span class="list-fea"><span class="feahead">Mill Name</span> : <?=$value['mill_name'] ?></span>
                                                            </div>
                                                            <div class="col-6 list-col-userlist">
                                                                <span class="list-fea"><span class="feahead">Location</span> : <?= $value['product_location'] ??''; ?></span>
                                                            </div>
                                                            
                                                          <?php
                                                        }else{
                                                            // print_r($value);
                                                                ?>
                                                            <div class="col-6 list-col-userlist">
                                                                <span class="list-fea"><span class="feahead">Category </span> : <?= $value['pcatname']; ?> </span>
                                                            </div>
                                                            
                                                            <div class="col-6 list-col-userlist">
                                                                <span class="list-fea"><span class="feahead">Delivery Days </span> : <?= $value['delivery_days']; ?> Days</span>
                                                            </div>
                                                            <div class="col-6 list-col-userlist">
                                                                <span class="list-fea"><span class="feahead">Mill Name</span> : <?=$mill_name['company_name']??'' ?></span>
                                                            </div>
                                                            <div class="col-6 list-col-userlist">
                                                               
                                                                <?php
                                            if ($value['added_by']==3) {
                                                echo' <span class="list-fea"><span class="feahead">Location1</span> :';
                                                echo $value['product_location'];
                                              
                                              
                                            }else{
                                                if ($user_type!=2) {
                                                    echo' <span class="list-fea"><span class="feahead">Location1</span> :';
                                                if ($value['product_location']==1) {
                                                    echo "Alipur/Kheda";
                                                    }
                                                    if ($value['product_location']==2) {
                                                    echo "Nangloi";
                                                    } 
                                                }
                                            }
                                            ?> </span>
                                                            </div>
                                                            <?php
                                                                if ($value['added_by']!=3) {
                                                                ?>
                                                                <div class="col-6 list-col-userlist">
                                                                <span class="list-fea"><span class="feahead"> Payment Terms</span> :   
                                                                <?php if($value['payment_terms']==0){ echo 'Cash/Credit'; } 
                                                                 else if($value['payment_terms']==1) { echo 'Same Day';}
                                                                 else if($value['payment_terms']==2) { echo '30 Days';}?>
                                                             </span>
                                                            </div>
                                                            <?php
                                                            }
                                                            ?>
                                                          
                                                            <?php
                                                        }

                                                            ?>
                                                  
                                                        </div>
                                                        <div class="">
                                                        <!-- <a class="sendListResponse main-link-userlist" href="javascript:void(0)" title='response' tag="<?= $value['id']; ?>">
                                                                <span class=""> Send Response</span>
                                                            </a> -->
                                                            <?php 
                                                            if($value['interested_id']) {
                                                                $viewLink = 'sendListResponse';
                                                            }
                                                            else{
                                                                $viewLink = 'viewresponselist';
                                                            } ?>
                                                            <!-- $viewLink = 'viewListedProduct'; -->
                                                            <!-- viewresponselist -->
                                                            <a class="  <?=$viewLink?>  main-link-userlist " addedby="<?=$value['added_by']?>" subcat="<?=$value['subcategory']??''?>" title='view'  href="javascript:void(0)" tag="<?= $value['id']; ?>">
                                                                <span class="">View</span>
                                                            </a>
                                                        </div>
                                                    </div> 
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                    $i++;
                }
            } else {
                ?>
                <div class="card">
                    <div class="card-body">
                        No Data
                    </div>
                </div>
            <?php
            } ?>
             </div>
        </div>
    </div>
</div>
 

 <!--Customer Care Modal -->
<div class="modal fade" id="customercaremodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fs-5" id="exampleModalLabel">Call To Customer Care For freight Price</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        +9999999999
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>
 