
	
		<div class="container-fluid">
			
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-div">
                        <div class="table-header-div">
                            <h4 class="tabel-title">Vehicles</h4>
                            <div class="tabel-link-btn">
				               <ul class="nav nav_filter ">
				                    <li class="nav-item text-end">
				                       <a href="javascript:void(0)" class="addpurchase-text addVehicle" >Add Vehicle</a>
				                      
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
					                    <th> Vehicle No</th>
					                    <th>Company Name</th>
					                    <th>Transporter Name</th>
					                    <th>Vehicle Type</th>
					                    <th>Dimension</th>
					                    <th>Capicity</th>
					                    <th>Time Permited</th>
					                    <th>Area Permited</th>
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
					                        <td><?=$value['vehicle_no']?></td>
					                        <td><?=$value['vehicle_company_name'];?></td>
					                        <td><?=$value['transporter_name']?></td>
					                        <td><?php if($value['vehicle_type']==1){ echo 'Closed';} else { echo 'Open';}?></td>
					                        <td><?=$value['width_vehicle'] ?> X <?=$value['depth_vehicle'] ?></td>
					                        <td><?=$value['capicity']?></td>
					                        <td><?=$value['time_permited']?></td>
					                        <td><?=$value['areas_permited']?></td>
					                        
					                       
					                        <td>
					                        	<div class="dropdown">
					                                <button type="button" class="btn btn-success light sharp" data-toggle="dropdown">
					                                    <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
					                                </button>
					                                <div class="dropdown-menu p-3">
					                                    <a class="badge light badge-success badge-text-size view_btn" href="javascript:void(0)" tag="<?=$value['id'];?>"><i class="fa fa-eye"></i></a>
					                                     <a class="badge light badge-warning badge-text-size editVehicle" href="javascript:void(0)" tag="<?=$value['id'];?>"><i class="fa fa-edit"></i></a>
					                                    <a class="badge light badge-danger badge-text-size delete_btn" href="javascript:void(0)" tag="<?=$value['id'];?>"><i class="fa fa-trash"></i></a>
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
					                    <td colspan="4">No Data</td>
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
    
