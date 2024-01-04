

<div class="container-fluid">
	
    <div class="row">
        <div class="col-lg-12">
            <div class="table-div">
                <div class="table-header-div">
                    <h4 class="tabel-title">Stock</h4>
                </div>
                <div class="tabel-body-div">
                    <div class="table-responsive overflow-hidden">
                    	<div  id="table">
                    		<table id="producttype_tbale" class="table table-responsive-md tabledata">
			                <tr>
			                    <th>S.No</th>
			                    <th>Product Name</th>
			                    <th>Stock </th>
			                </tr>
			               
			            <?php
			            if ($query) 
			            {$i=1;
			                foreach ($query as $value)  
			                { 
			                    
			                    ?>
			                    <tr>
			                        <td><?=$i?></td>
			                        <td><?=$value['product_name']?></td>
			                        <td><?=$value['stock']?> <?= $value['uom']?></td>
			                    </tr>
			                <?php
			                $i++;
			                }
			               
			            }
			            else
			            {
			                ?>
			                <tr>
			                    <td colspan="3">No Data</td>
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

