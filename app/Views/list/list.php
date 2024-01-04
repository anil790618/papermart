

<div class="container-fluid">
	
    <div class="row">
        <div class="col-lg-12">
            <div class="table-div">
                <div class="table-header-div">
                    <h4 class="tabel-title"><?php if($dashboard_type == 2){ echo 'Requirements'; } else { echo 'Listings'; }?></h4>
                    <div class="tabel-link-btn">
		               <ul class="nav nav_filter ">
		                    <li class="nav-item text-end">
		                       <a href="javascript:void(0)" class="addpurchase-text <?php if($deckle == 0) {  echo 'addlist';  } else if($deckle == 1){ echo "adddecklelist"; }?>" ><?php if($deckle == 0){  if($dashboard_type == 2){ echo ' Post Requirements'; } else { echo 'Add List'; } } else if($deckle == 1){ echo "Upload List for Deckle/ Extra Stock"; }?> </a>
		                    </li>
		                </ul> 
		            </div>
                </div>
                <div class="tabel-body-div">
                    <div class="table-responsive overflow-hidden">
                    	
                    	<div  id="table">
                    		<table id="producttype_tbale" class="table table-responsive-md tabledata size-6">
			                <thead>
			                    <th>S.No</th>
			                    <th>List Number</th>
			                    <th>List Date</th>
			                    <th>List Type</th>
			                    <th>Product Category</th>
			                    <th>Quantity </th>
			                    <th>Price </th>
			                    <th>Response </th>
			                     <th>Status </th>
			                    <th>Action</th>
			                </thead>
			               <tbody>
			            <?php
						// print_r($query[0]);
			            if ($query) 
			            {$i=1;
			                foreach ($query as $value)  
			                { 
			                     	
			                    ?>
			                    <tr id="row<?=$value['id']?>">
			                        <td class="row-id" ><?php
									if ($value['updates'] == 1 && $dashboard_type == 2) {
										echo $i;
									}else{
?>
<?php if($value['updates'] == 1){ echo '<i class="fa fa-circle text-danger mr-1"></i>'.$i; } else { echo $i;}?>
<?php
									}
									?></td>
			                        <td class="logged-in"> <?=$value['list_number'];?></td>
			                        <td> <?=$value['added_date'];?> </td>
			                        <td> <?php if($value['list_type']==1){ echo 'Sell'; } else { echo 'Buy';}?></td>
			                        <td> <?=$value['catname'];?> </td>
			                        <td> <?=$value['quantity'];?> </td>
			                        <td> <?=$value['selling_rate']??'';?> </td>
			                        <td class="text-center"> <?=$value['responsecount'];?></td>
			                        <td><?php
			                        if($dashboard_type == 2){ $status_text = 'Purchase Confirmed'; } else { $status_text = 'Sale Confirmed'; }
			                         if($value['list_status'] == '0'){ echo '<span class="badge light badge-warning ">In process</span>' ; } else if($value['list_status'] == '1'){ echo '<span class="badge light badge-success ">'.$status_text.'</span>' ; }?>
			                        	
			                        </td>
			                        <td>
			                        	<a class="viewList" title="View List Details"  href="javascript:void(0)" tag="<?=$value['id'];?>"><span class="badge light badge-warning badge-text-size"><i class="fa fa-eye"></i></span></a>
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
			        </tbody>
			             </table>
                    	</div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>

