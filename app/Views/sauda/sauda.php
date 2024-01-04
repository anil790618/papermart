
	
		<div class="container-fluid">
			
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-div">
                        <div class="table-header-div">
                            <h4 class="tabel-title">Sauda</h4>
                            <div class="tabel-link-btn">
				               <ul class="nav nav_filter ">
				                    <li class="nav-item text-end">
				                       <a href="javascript:void(0)" class="addpurchase-text addVendor" >Add Vendor</a>
				                      
				                    </li>
				                </ul> 
				            </div>
                        </div>
                        <div class="tabel-body-div">
                            <div class="table-responsive overflow-hidden">
                            	
                            	<div  id="table">
                            		<table id="producttype_tbale" class="table table-responsive-md tabledata size-6">
					                <tr>
					                    <th>S.No</th>
					                    <th>Name</th>
					                    <th>Phone Number</th>
					                    <th>Email</th>
					                    <th>Company Name</th>
					                    <th>Address</th>
					                    <th>Vendor Type</th>
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
					                        <td><?=$value['vendor_name']?></td>
					                        <td><?=$value['phone_number'];?></td>
					                        <td><?=$value['email']?></td>
					                        <td><?=$value['company_name']?></td>
					                        <td><?=$value['address'] ?> , <?=$value['city'] ?>, , <?=$value['state'] ?>, <?=$value['pin_code'] ?></td>
					                        <td><?=$value['vendor_type']?></td>
					                        
					                       
					                        <td>
					                        	<div class="dropdown">
					                                <button type="button" class="btn btn-success light sharp" data-toggle="dropdown">
					                                    <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
					                                </button>
					                                <div class="dropdown-menu pl-3">
					                                    <a class="badge light badge-success badge-text-size vendor-view " href="javascript:void(0)" tag="<?=$value['id'];?>"><i class="fa fa-eye"></i></a>
					                                     <a class="badge light badge-warning badge-text-size vendor-update" href="javascript:void(0)" tag="<?=$value['id'];?>"><i class="fa fa-edit"></i></a>
					                                    <a class="badge light badge-danger badge-text-size vendor-delete" href="javascript:void(0)" tag="<?=$value['id'];?>"><i class="fa fa-trash"></i></a>
					                                </div>
					                            </div>	
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
    
