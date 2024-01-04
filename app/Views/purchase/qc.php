
   
      <div class="container-fluid">
         
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-div">
                        <div class="table-header-div">
                            <h4 class="tabel-title">Purchases</h4>
                           
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
                                   <tr>
                                       <td><?=$i;?></td>
                                       <td><?=$value['order_number']?></td>
                                       <td><?=$value['qty'];?></td>
                                       <td><?=$value['total_price']?></td>
                                       <td><?=$value['order_date']?></td>
                                       <td><?=$value['delivery_date']?></td>
                                       <td><?=$value['order_to_name']  ?> </td>
                                       <td class="vno<?=$value['id']?>"><?=$value['vno']?></td>
                                       <td class="driver<?=$value['id']?>"><?=$value['driver_name']?>, <?=$value['driver_phone_number']?></td>
                                       <td>
                                        <?php
                                        if ($value['product_status']==2) {
                                          if ($value['complain_status']==1) {
                                            echo"<span class='text-success'>Resolved </span>";
                                          }
                                          if ($value['complain_status']==2) {
                                            $cr = $value['complain_reject_reason'];
                                            echo"<h5 class='text-danger'>Not Resolved</h5><span class='text-danger'>$cr </span>";
                                          }
                                        }else{
                                            ?>
                                            <br><a class="badge light badge-warning badge-text-size  sendOrderspecification" href="javascript:void(0)" tag="<?=$value['id'];?>"><i class="fa fa-info"></i></a>
                                            <?php
                                        }

                                        ?>
                                           
                                            
                                            <!-- <a class="badge light badge-delete badge-text-size  vehicleItemDelivered12" href="javascript:void(0)" title='Raise complaint' data-bs-toggle="modal" data-bs-target="#resignModal" tag="<?=$value['id'];?>"  ><i class="fa fa-pencil"></i></a> -->
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
    

 <div class="modal fade " id="orderspecificationModal" tabindex="-1" aria-labelledby="orderspecificationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style='overflow:hidden'>
        <div class="modal-content ">
            <div class="modal-header">
                <h4 class="card-title">Order Specification Required</h4>
            </div>
            <form method="post" id="receive_orderspecification_form" enctype="multipart/form-data">
                <input type="hidden" name="orderid" id="orderid" class="form-control">
                <div class="modal-body orderspecificationdata p-1">
                    <div class="card-header">
                            <h6 class="">Order Specification</h6>
                            <div class="pull-right float-end ">
                           <ul class="nav nav_filter ">
                                <li class="nav-item text-end">
                                   <a href="javascript:void(0)" class="btn btn-primary mb-2 addorderspecification size-6" tag="1">Add </a>
                                  
                                </li>
                            </ul> 
                        </div>
                        </div>
                    <table id="specification_table" class="table table-responsive tabledata size-6">
                        <thead>
                            <tr>
                                
                                <th>Size</th>
                                <th>Quantity</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="responsivespecification">
                            <tr class="specificationrow1">
                               
                                <td><input type="text" class="form-control" style="height:40px" name = "size[]" id="size" required></td>
                                <td><input type="text" class="form-control" style="height:40px" name = "quantity[]" id="quantity" required></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer forderspecificationdata">
                    <button type="button" class="btn btn-secondary close" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>   

  <!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#resignModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="resignModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fs-5" id="exampleModalLabel"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">Complaint Reasion
      <form>
        <div class="container">
            <div class="row">
                <div class="col-12">
                <div class="mb-3 col-12">
                    <select class="form-select" aria-label="Default select example">
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                    </select>
                </div> 
                <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
       
        </form>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>