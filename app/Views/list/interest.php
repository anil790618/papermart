

<div class="container-fluid">
    
    <div class="row">
        <div class="col-lg-12">
            <div class="table-div">
                <div class="table-header-div">
                    <h4 class="tabel-title">Interests Send</h4>
                </div>
                <div class="tabel-body-div">
                    <div class="table-responsive overflow-hidden">
                        <div  id="table">
                            <table id="producttype_tbale" class="table table-responsive-md tabledata size-6">
                            <thead>
                                <th>S.No</th>
                                <th>List Number</th>
                                <th>Response Date</th>
                                <th>List Type</th>
                                <th>Product Name</th>
                                <th>Quantity </th>
                                <th>Status</th>
                                <th>Action</th>
                            </thead>
                           
                        <?php
                        // print_r($response[0]);
                        if ($response) 
                        {$i=1;
                            foreach ($response as $value)  
                            { 
                                    
                                ?>
                                <tr id="row<?=$value['id']?>">
                                   <td class="row-id" ><?=$i;?></td>
                                    <td> <?=$value['list_number'];?></td>
                                    <td> <?=$value['added_date'];?> </td>
                                    <td> <?php if($value['list_type']==1){ echo 'Sell'; } else { echo 'Buy';}?></td>
                                    <td> <?=$value['pname'];?> </td>
                                    <td> <?=$value['quantity'];?></td>
                                    <td> <?php if($value['status']==0){ echo '<span class="badge light badge-light badge-text-size"> Pending </span>'; } else if($value['status']==1){ echo ' <span class="badge light badge-success badge-text-size"> Confirmed </span>'; } else  if($value['status']==2)  { echo '<span class="badge light badge-danger badge-text-size"> Rejected </span>';} else  if($value['status']==3)  { echo '<span class="badge light badge-danger badge-text-size"> Cancelled </span>';}?></td>
                                    <td>
                                    <?php
                                    if($value['order_status']==0){
                                        ?>
                                         <a class="badge light badge-danger badge-text-size  ConfirmSaleOrder" href="javascript:void(0)" tag="<?=$value['o_id']?>" >Confirm Sale</a>
                                        <?php
                                    }else{
                                        ?>
                                        <a class="badge light badge-secondary badge-text-size  " href="javascript:void(0)" tag="<?=$value['id'];?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                                        <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
                                        </svg></a>
 
                                        <?php
                                    }
                                    ?>
                                         <a class="sendListResponse " title='response' href="javascript:void(0)" tag="<?=$value['list_id'];?>"><span class="badge light badge-warning badge-text-size"><i class="fa fa-eye"></i></span></a>
                                        
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
                                <td colspan="8">No Data</td>
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

