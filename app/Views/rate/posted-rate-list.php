
	
		<div class="container-fluid">
			
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-div">
                        <div class="table-header-div">
                            <h4 class="tabel-title "> Posted Rate List</h4>
                            
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
                            		<table id="rate_tbale" class="table table-responsive-md size-6">
					                <tr>
					                    <th>S.No</th>
					                    <th>Posted By</th>
					                    <th>Category Name</th>
					                    <th>List Type</th>
					                    <th>Rate Type</th>
					                    <th>Rate </th>
					                    <th>Description</th>
					                    <th>Action</th>
					                </tr>
					               <tbody  class="tabledata">
					            <?php
					            if ($query) 
					            {$i=1;
					                foreach ($query as $value)  
					                { 
					                    ?>
					                    <?php if($appproved == 0 ){ $action =  'registeredServices';} else { if($value['rate_type'] == 2){$action = 'confirmSaleRate';} else{ $action = 'confirmPurchaseRate'; } }?>
					                    <tr id="row<?=$value['id']?>">
					                        <td class ="row-id"><?=$i;?></td>
					                         <td ><?=$value['user_name'];?> </td>
					                        <td><?=$value['cname']?></td>
					                        <td > <?php if($value['rate_type'] == 1){ echo '<span class="badge badge-secondary">Sell</span>'; } else { echo '<span class="badge badge-warning">Buy</span>';  }?> </td>
					                        <td><?php if($value['type'] == '1'){ $type='Normal';} else if($value['type'] == '2'){ $type='Sauda';} else if($value['type'] == '3'){ $type='Prime';}?> <?=$type;?> Rate</td>
					                        <?php if($appproved == 0){echo '<td id="blur" class="edit-profile">Register First</td>';} else{ ?>
					                        <td ><?=$value['rates_offered']?></td><?php } ?>
					                        <td class="description"><?=$value['description']?></td>
					                        <td >  
					                        <?php if($value['rate_type'] == 2){ echo '<span tag="'.$value['id'].'" class="badge badge-secondary '.$action.' ">Sale</span>'; } else { echo '<span tag="'.$value['id'].'"class="badge badge-warning  '.$action.' ">Purchase</span>';  }?> </td>
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
					        </tbody>
					             </table>
                            	</div>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    

