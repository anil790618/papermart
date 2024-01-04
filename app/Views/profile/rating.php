

<div class="container-fluid">
	
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title m-2">Rating Reviews</h4>
                   
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    	<!-- <div id="example3_wrapper" class="dataTables_wrapper no-footer mb-2 d-flex justify-content-start ">
							<div id="example3_filter" class="dataTables_filter input-group" >
								<input type="text" id="search" name="search" class="" placeholder=" search" aria-describedby="button-addon1" style="border-right: none; margin-right: -2%;">
								<button type="button" class="btn btn-primary ps-2" id="button-addon1" s>Search</button>
							</div>
						</div> -->
                    	<div  id="table">
                    		<table id="producttype_tbale" class="table table-responsive-md tabledata">
			                <thead>
			                	<tr>
				                    <th>S.No</th>
				                    <th>Customer Name</th>
				                    <th>Rating</th>
				                    <th>Description</th>
				                </tr>
			                </thead>
			                <tbody>
			                	 <?php
						            if ($query) 
						            {$i=1;
						                foreach ($query as $value)  
						                { 
						                    
						                    ?>
						                    <tr>
						                        <td><?=$i?></td>
						                        <td><?=$value['product_name']?></td>
						                        <td><?=$value['tstock']?> <?=$value['uom']?></td>
						                        
						                       
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
			                </tbody>
			             </table>
                    	</div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>

