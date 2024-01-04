
   
      <div class="container-fluid">
         
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-div">
                        <div class="table-header-div">
                            <h4 class="tabel-title">Upcoming Vehicles <?=$title?></h4>
                          
                        </div>
                        <div class="tabel-body-div">
                            <div class="table-responsive overflow-hidden">
                              <!-- <div id="example3_wrapper" class="dataTables_wrapper no-footer mb-2 d-flex justify-content-start ">
                           <div id="example3_filter" class="dataTables_filter input-group" >
                              <input type="text" id="search" name="search" class="" placeholder=" search" aria-describedby="button-addon1" style="border-right: none; margin-right: -2%;">
                              <button type="button" class="btn btn-primary ps-2" id="button-addon1" s>Search</button>
                           </div>
                        </div> -->
                              <div  id="table">
                                 <table id="producttype_tbale" class="table table-responsive-md tabledata size-6">
                               <tr>
                                   <th>S.No</th>
                                   <th>#purchase</th>
                                   <th>Quantity</th>
                                   <th>Total Price</th>
                                   <th>Purchase Date</th>
                                   <th>Delivery Date</th>
                                   <th>Client Detail</th>
                                   <th>Vehicle No</th>
                                   <th>Driver Name</th>
                                   <th>Action</th>
                               </tr>
                              
                           <?php
                           if ($query) 
                           {$i=1;
                               foreach ($query as $value)  
                               { 
                                   
                                   ?>
                                   <tr id="row<?=$value['id']?>">
                                       <td class="row-id"><?=$i;?></td>
                                       <td><?=$value['order_number']?></td>
                                       <td><?=$value['qty'];?></td>
                                       <td><?=$value['total_price']?></td>
                                       <td><?=$value['order_date']?></td>
                                       <td><?=$value['delivery_date']?></td>
                                       <td><?=$value['order_to_name']  ?> </td>
                                       <td class="vno<?=$value['id']?>"><?=$value['vno']?></td>
                                       <td class="driver<?=$value['id']?>"><?=$value['driver_name']?>, <?=$value['driver_phone_number']?></td>
                                       <td>
                                           
                                        <a class="badge light badge-success badge-text-size  vehicleItemDelivered" href="javascript:void(0)" tag="<?=$value['id'];?>" vid="<?=$value['vehicle_id'];?>"><i class="fa fa-check"></i></a>
                                      
                                       </td>
                                   </tr>
                               <?php
                               $i++;
                               }
                              
                           }
                           else
                           {
                               ?>
                               <tr>
                                   <td colspan="10">No Data</td>
                               </tr>
                               <?php
                           }?>
                            </table>
                              </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>

      